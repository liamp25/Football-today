<?php

namespace services\TeamService;

use Carbon\Carbon;
use services\Callers\CurlCaller;
use services\Callers\LeagueCaller;

class TeamService
{
    protected $important_league_list;

    const URL = 'https://v3.football.api-sports.io';

    public function __construct()
    {
        $this->important_league_list = config('app.important_league_list');
    }

    public function getTeam(int $id)
    {
        $seasons = [];
        $team = [];
        $leagues = [];
        $fixtures = [];
        $standings = [];
        $players = [];
        $team_statistics = [];
        $lineups = [];
        $transferYears = [];
        $transfers = [];
        $transfersByYear = [];

        $leagues = $this->getLeagues($id);
        $transfersData = $this->getTeamTransfers($id);
        $transferYears = $transfersData['transferYears'];
        $transfers = $transfersData['transfers'];

        if (isset($_COOKIE["league"])) {
            $league = $_COOKIE["league"];
        } else {
            $league = $leagues[0]->league->id;
        }

        if (isset($_COOKIE["season_team"])) {
            $season = $_COOKIE["season_team"];
        } else {
            $season = LeagueCaller::getCurrentSeason($league);
        }

        if (isset($_COOKIE["transferYear"])) {
            $transferYear = $_COOKIE["transferYear"];
        } else {
            if (!empty($transferYears)) {
                $transferYear = $transferYears[0];
            }else{
                $transferYear = date("Y");
            }
        }

        $url = self::URL . '/teams?id=' . $id;

        $resp = CurlCaller::get($url, []);
        if ($resp) {
            $team = $resp->response[0];
            $fixtures = $this->getFixtures($id, $league, $season);
            $standings = $this->getStandings($id, $league, $season);
            $players = $this->getPlayers($id, $league, $season, 1, []);
            $team_statistics = $this->getTeamStatistics($id, $league, $season);
            if(!empty($transfers) && isset($transfers[$transferYear])){
                $transfersByYear = $transfers[$transferYear];
            }
            
            usort($players, function($a, $b) {
                // Compare the 'appearence' property of $a and $b
                return $b->statistics[0]->games->appearences - $a->statistics[0]->games->appearences;
            });
            
            
            $playersByPosition = [    
                'Goalkeeper'=>array(),
                'Defender'=>array(),
                'Midfielder'=>array(),
                'Attacker'=>array()
            ];
           
            foreach ($players as $k => $playerData) {
                $position = $playerData->statistics[0]->games->position;           
                if (!isset($playersByPosition[$position])) {
                    $playersByPosition[$position][] = $playerData;
                }
                
                $playersByPosition[$position][] = $playerData;
            }

            $lineups = $this->getFixtureLineups($id);
        }
        // else {
        //     return $this->getTeam($id);
        // }

        $seasons = LeagueCaller::getSeasons();

        return [
            'status' => true,
            'season' => $season,
            'seasons' => $seasons,
            'leagues' => $leagues,
            'league' => $league,
            'team' => $team,
            'fixtures' => $fixtures,
            'standings' => $standings,
            'players' => $players,
            'playersByPosition' => $playersByPosition,
            'lineups' => $lineups,
            'team_statistics' => $team_statistics,
            'transferYears'=>$transferYears,
            'transfers'=>$transfers,
            'transferYear'=>$transferYear,
            'transfersByYear'=>$transfersByYear,
        ];
    }

    public function getFixtureLineups($id){
        $lineups = [];

        $url = self::URL . '/fixtures/lineups?fixture=' . $id;

        $resp = CurlCaller::get($url, []);

        if ($resp) {
            $lineups = $resp->response;
        }
        
        return $lineups;
    }

    public function getLeagues($id)
    {
        $leagues = [];

        $url = self::URL . '/leagues?team=' . $id;

        $resp = CurlCaller::get($url, []);

        if ($resp) {
            $leagues = $resp->response;
        }
        // else {
        //     return $this->getLeagues($id);
        // }

        return $leagues;
    }
    public function getStandings($id, $league, $season)
    {
        $standings = [];

        $url = self::URL . '/standings?league=' . $league . '&season=' . $season;

        $resp = CurlCaller::get($url, []);

        if ($resp) {
            if ($resp->results > 0) {
                $standings = $resp->response[0]->league->standings;
            }
        }
        // else {
        //     return $this->getStandings($id, $league, $season);
        // }

        return $standings;
    }

    public function getPlayers($id, $league, $season, $page, $players)
    {
        $url = self::URL . '/players?team=' . $id . '&season=' . $season . '&league=' . $league . '&page=' . $page;

        $resp = CurlCaller::get($url, []);

        if ($resp) {
          
            if ($resp->results > 0) {
                $players = array_merge($players, $resp->response);
            }
            if ($resp->paging->current != $resp->paging->total) {
                $page++;
                return $this->getPlayers($id, $league, $season, $page, $players);
            }
        }
        // else {
        //     return $this->getPlayers($id, $league, $season, $page, $players);
        // }

        return $players;
    }

    public function getFixtures($id, $league, $season)
    {
        $fixtures = [];
        $reverseFixtures = [];
        $fixturesByMY = [];

        $url = self::URL . '/fixtures?team=' . $id . '&season=' . $season . '&league=' . $league;

        $resp = CurlCaller::get($url, []);

        if ($resp) {
            $fixtures = $resp->response;
            if(count($fixtures) > 0){
                for($i = (count($fixtures)-1) ; $i >= 0 ; $i--){
                    $reverseFixtures[] = $fixtures[$i];
                }

                foreach ($reverseFixtures as $k=>$v) {
                    $YearMonth = date("Y-m",$v->fixture->timestamp);
                    $fixturesByMY[$YearMonth][] = $v;
                }

               
            }
        }
        // else {
        //     return $this->getFixtures($id, $league, $season);
        // }

        return $fixturesByMY;
    }

    public function getTeamStatistics($id, $league, $season)
    {
        $team_statistics = [];

        $url = self::URL . '/teams/statistics?league=' . $league . '&season=' . $season . '&team=' . $id;

        $resp = CurlCaller::get($url, []);

        if ($resp) {
            $team_statistics = $resp->response;
        }
        // else {
        //     return $this->getTeamStatistics($id, $league, $season);
        // }

        return $team_statistics;
    }

    public function getTeamByNLC($nation, $league, $club, $season)
    {
        $team = null;

        $league_obj = LeagueCaller::getLeagueFromLeagueName($nation, $league);

        $nation = str_replace('_', '', $nation);
        $league = str_replace('_', ' ', $league);
        $club = str_replace('_', ' ', $club);

        $url = self::URL . '/teams?country=' . $nation . '&league=' . $league_obj->id . '&name=' . $club . '&season=' . $season;

        $resp = CurlCaller::get($url, []);

        if ($resp && isset($resp->response[0])) {
            $team = $resp->response[0]->team;
        }
        // else {
        //     $season--;
        //     return $this->getTeamByNLC($nation, $league, $club, $season);
        // }

        return $team;
    }

    public function getTeamById($id)
    {
        $team = null;

        $url = self::URL . '/teams?id=' . $id;

        $resp = CurlCaller::get($url, []);

        if ($resp && isset($resp->response[0])) {
            $team = $resp->response[0]->team;
        }
        // else {
        //     return $this->getTeamById($id);
        // }

        return $team;
    }

    public function getTeamTransfers($team){
        $transfers = [];
        $transferYears = [];

        $url = self::URL . '/transfers?team=' . $team;

        $resp = CurlCaller::get($url, []);

        if ($resp && isset($resp->response[0])) {
            $transfers = $resp->response;
            $yearlyData = [];
            foreach ($transfers as $index => $item) {
                // $updateYear = date('Y', strtotime($item['update']));

                foreach ($item->transfers as $transfer) {
                    $transferYear = date('Y', strtotime($transfer->date));
                    if(!in_array($transferYear,$transferYears)){
                        $transferYears[] = $transferYear;
                    }
                    

                    if (!isset($yearlyData[$transferYear][$index])) {
                        $yearlyData[$transferYear][$index]['transfers_data'] = [];
                        $yearlyData[$transferYear][$index]['player'] = $item->player;
                    }
                    
                    $yearlyData[$transferYear][$index]['transfers_data'][] = $transfer;
                }
            }

            rsort($transferYears);
            $transfers = $yearlyData; 
        }
        // else {
        //     return $this->getTeamById($id);
        // }

        return [
            'transfers'=>$transfers,
            'transferYears'=>$transferYears
        ];        
    }

}
