<?php

namespace App\Http\Controllers\PublicArea;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
// use GuzzleHttp\Psr7\Request;
use services\Callers\FixtureCaller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Cache;

class FixtureController extends Controller
{
    public function fixtures(Request $request)
    {
        $token = $request->get("token");
        // if(isset($token) && !empty($token)){
        //     echo "<pre>"; print_r($token); die;
        // }
        setcookie('date', Carbon::now()->format('Y-m-d'), time() + (86400 * 30), "/");

        return view('PublicArea.pages.fixtures.all-fixtures');
    }

    public function fixturesAjax()
    {
        $response['leagues'] = [];
        $response['fixtures'] = [];

        $data = FixtureCaller::getAllFixtures();

        $response['leagues'] = $data['leagues'];
        $response['fixtures'] = $data['fixtures'];
        $response['timezone'] = get_local_time();

        return view('PublicArea.pages.fixtures.all-fixtures-ajax')->with($response);
    }

    public function getFixture(int $id)
    {
        $response['id'] = $id;

        $data = FixtureCaller::getPredictions($id);

        $response['predictions'] = $data['predictions'];
        $response['predictions_array'] = $data['predictions_array'];

        return view('PublicArea.pages.fixtures.single-fixture')->with($response);
    }

    public function getFixtureAjax(int $id)
    {
        $data = FixtureCaller::getSingleFixture($id);

        if (!$data['status']) {
            return '<div class="col-md-12 mb-2">No results found</div>';
        }

        $response['fixture'] = $data['fixture'];
        $response['league'] = $data['league'];
        $response['teams'] = $data['teams'];
        $response['goals'] = $data['goals'];
        $response['score'] = $data['score'];
        $response['events'] = $data['events'];
        $response['lineups'] = $data['lineups'];
        $response['match_statistics'] = $data['match_statistics'];
        // $response['team_statistics'] = $data['team_statistics'];
        // $response['h2h'] = $data['h2h'];
        $response['predictions'] = $data['predictions'];
        // $response['standings'] = $data['standings'];
        // $response['form'] = $data['form'];
        $response['timezone'] = get_local_time();

        return view('PublicArea.pages.fixtures.single-fixture-ajax')->with($response);
    }

    public function getMatchInfo($id)
    {
        $response['id'] = $id;
        $response['api_key'] = config('app.football_api_key');

        return view('PublicArea.pages.fixtures.match-info')->with($response);
    }

    public function getMatchPreview(int $id)
    {
        $response['id'] = $id;
        $data = FixtureCaller::getPredictions($id);
        $response['predictions'] = $data['predictions'];
        $response['predictions_array'] = $data['predictions_array'];

        return view('PublicArea.pages.fixtures.single-match-preview')->with($response);
    }

    public function getMatchPreviewAjax(int $id)
    {
        $data = FixtureCaller::getMatchFixture($id);

        if (!$data['status']) {
            return '<div class="col-md-12 mb-2">No results found</div>';
        }

        $response['fixture'] = $data['fixture'];
        $response['league'] = $data['league'];
        $response['teams'] = $data['teams'];
        $response['goals'] = $data['goals'];
        $response['score'] = $data['score'];
        $response['events'] = $data['events'];
        $response['lineups'] = $data['lineups'];
        $response['match_statistics'] = $data['match_statistics'];
        // $response['team_statistics'] = $data['team_statistics'];
        $response['h2h'] = $data['h2h'];
        // $response['predictions'] = $data['predictions'];
        $response['standings'] = $data['standings'];
        $response['form'] = $data['form'];
        $response['timezone'] = get_local_time();
        // $response['injuries'] = $data['injuries'];
        // $response['players'] = $data['players'];

        return view('PublicArea.pages.fixtures.single-match-preview-ajax')->with($response);
    }

    public function getTeamStats($league_id){

        $season = request("season");
        $home_id = request("home_id");
        $away_id = request("away_id");

        $data['teamstats'] = FixtureCaller::getTeamStats($league_id, $season, $home_id, $away_id);

        return view('PublicArea.pages.fixtures.team-stats-ajax')->with($data);

    }

    public function getMatchStats($league_id){

        $season = request("season");
        $home_id = request("home_id");
        $away_id = request("away_id");

        $data['overallstats'] = FixtureCaller::getTeamStats($league_id, $season, $home_id, $away_id);
        $data['teamstats'] = FixtureCaller::getTeamMatchStats($league_id, $season, $home_id, $away_id);
        $data['homestats'] = $data['teamstats']['home_stats'];
        $data['awaystats'] = $data['teamstats']['away_stats'];
        return view('PublicArea.pages.fixtures.team-stats-ajax-2')->with($data);

    }

    public function getPlayerStats($league_id){

        $season = request("season");
        $home_id = request("home_id");
        $away_id = request("away_id");

        $data['playerstats'] = FixtureCaller::getPlayerStats($league_id, $season, $home_id, $away_id);

        return view('PublicArea.pages.fixtures.player-stats-tab')->with($data);

    }
}
