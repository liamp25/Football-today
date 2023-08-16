<div class="col-md-12 mb-2">
    <div class="card align-middle title-band text-white">
        <div class="row px-2 pt-4">
            <div class="col-md text-left">
                <h4>{{$league->country->name}} - {{$league->league->name}}</h4>
            </div>
            <div class="col-md-2 text-right select-col">
                <div class="form-group">
                    <select class="form-control-sm" name="season" id="season" onchange="setSeason(this.value)">
                        @foreach ($seasons as $single_season)
                        <option {{$single_season == $season ? 'selected' : ''}}>{{$single_season}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12 mb-2">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link" id="pills-table-tab" data-toggle="pill" href="#pills-table" role="tab"
                aria-controls="pills-table" aria-selected="true">Table</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-fixtures-tab" data-toggle="pill" href="#pills-fixtures" role="tab"
                aria-controls="pills-fixtures" aria-selected="false">Fixtures</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-team-stats-tab" data-toggle="pill" href="#pills-team-stats" role="tab"
                aria-controls="pills-team-stats" aria-selected="false">Team Stats</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-player-stats-tab" data-toggle="pill" href="#pills-player-stats" role="tab"
                aria-controls="pills-player-stats" aria-selected="false">Player Stats</a>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade" id="pills-table" role="tabpanel" aria-labelledby="pills-table-tab">
            
            {{-- Table --}}
            <div class="col-md-12 mb-2 px-0">
                
                <div class="card align-middle bg-dark text-white">
                    <h5 class="text-left p-2">Table</h5>
                </div>
                
                <div class="card">
                    <div class="card-body">
                        @forelse ($standings as $single_standing)
                        <div class="table-responsive">
                            <table class="table wg-table">
                                <thead></thead>
                                <tbody>
                                    <tr>
                                        <td class="wg_header" colspan="11" style="text-align: left;">
                                            <img class="wg_flag" src="{{$league->country->flag}}" loading="lazy" onerror="this.style.display=&quot;none&quot;"> {{$league->country->name}}: {{$league->league->name}}
                                        </td>
                                    </tr>
                                    <tr>
                                        
                                        <td class="wg_header" colspan="2"></td>
                                        <td class="wg_header wg_text_center wg_tooltip wg_tooltip_left" data-toggle="tooltip" data-placement="left" title="MATCHES PLAYED">MP</td>
                                        <td class="wg_header wg_text_center wg_tooltip wg_tooltip_left" data-toggle="tooltip" data-placement="left" title="WIN">W</td>
                                        <td class="wg_header wg_text_center wg_tooltip wg_tooltip_left" data-toggle="tooltip" data-placement="left" title="DRAW">D</td>
                                        <td class="wg_header wg_text_center wg_tooltip wg_tooltip_left" data-toggle="tooltip" data-placement="left" title="LOSE">L</td>
                                        <td class="wg_header wg_text_center wg_tooltip wg_tooltip_left wg_hide_xxs" data-toggle="tooltip" data-placement="left" title="GOALS FOR:GOALS AGAINST">G</td>
                                        <td class="wg_header wg_text_center wg_tooltip wg_tooltip_left wg_hide_xs" data-toggle="tooltip" data-placement="left" title="DIFFERENCE" >+/-</td>
                                        <td class="wg_header wg_text_center wg_tooltip wg_tooltip_left" data-toggle="tooltip" data-placement="left" title="POINTS">P</td>
                                        <td class="wg_header wg_hide_xs" colspan="2"></td>
                                    </tr>
                                    @forelse ($single_standing as $standing)
                                    @php
                                        $rowColor = '';
                                        if(isset($standing->description) && !empty($standing->description)){
                                            $rowColor = 'lightblue';
                                        }
                                    @endphp
                                    <tr>
                                        <td class="wg_text_center wg_bolder wg_width_20" style="background-color: {{$rowColor}};">
                                            {{$standing->rank}}
                                        </td>
                                        <td class="wg_nowrap" style="text-align: left; background-color:{{$rowColor}};">
                                            <img class="wg_logo" src="{{$standing->team->logo}}" alt="">
                                            {{$standing->team->name}}
                                        </td>
                                        <td class="wg_text_center wg_width_20" style="background-color: {{$rowColor}};">
                                            {{$standing->all->played}}
                                        </td>
                                        <td class="wg_text_center wg_width_20" style="background-color: {{$rowColor}};">
                                            {{$standing->all->win}}
                                        </td>
                                        <td class="wg_text_center wg_width_20" style="background-color: {{$rowColor}};">
                                            {{$standing->all->draw}}
                                        </td>
                                        <td class="wg_text_center wg_width_20" style="background-color: {{$rowColor}};">
                                            {{$standing->all->lose}}
                                        </td>
                                        <td class="wg_text_center wg_width_20 wg_hide_xxs" style="background-color: {{$rowColor}};">
                                            {{$standing->all->goals->for}}:{{$standing->all->goals->against}}
                                        </td>
                                        <td class="wg_text_center wg_width_20 wg_hide_xs" style="background-color: {{$rowColor}};">
                                            {{$standing->goalsDiff}}
                                        </td>
                                        <td class="wg_text_center wg_width_20" style="background-color: {{$rowColor}};">
                                            <span class="<?php echo isset($standing->description) && !empty($standing->description)? 'wg_tooltip wg_tooltip_left' : ''; ?>" data-toggle="tooltip" data-placement="left" title="{{$standing->description}}">
                                            {{$standing->points}}
                                            </span>
                                        </td>
                                        <td class="wg_text_center wg_width_90 wg_hide_xs" style="text-align: left; background-color: {{$rowColor}};">
                                            @php
                                                $str = $standing->form;
                                                $strCount = strlen($str);
                                            @endphp
                                            @if ($strCount > 0)
                                                @for ($i = 0 ; $i < $strCount ; $i++)
                                                    @switch($str[$i])
                                                        @case('W')
                                                            <span class="wg_form wg_form_win">W</span>
                                                            @break
                                                        @case('L')
                                                            <span class="wg_form wg_form_lose">L</span>
                                                            @break
                                                        @case('D')
                                                            <span class="wg_form wg_form_draw">D</span>
                                                            @break
                                                        @default
                                                            
                                                    @endswitch
                                                @endfor    
                                            @endif
                                        </td>
                                        <td class="wg_text_center wg_width_20 wg_hide_xs">
                                            @if (isset($standing->description) && !empty($standing->description))
                                            <span class="wg_info wg_tooltip wg_tooltip_left" data-toggle="tooltip" data-placement="left" title="{{$standing->description}}" >?</span>    
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="11">
                                            No information Available
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        @empty
                        <table class="table wg-table">
                            <thead></thead>
                            <tbody>
                                <tr>
                                    <td colspan="11">
                                        No Standings Available
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        @endforelse
                    </div>
                </div>
            </div>
            {{-- End of Table --}}
        </div>
        <div class="tab-pane fade" id="pills-fixtures" role="tabpanel" aria-labelledby="pills-fixtures-tab">
            {{-- Fixtures --}}
            <div class="col-md-12 mb-2 px-0">
                <div class="card align-middle bg-dark text-white">
                    <h5 class="text-left p-2">Fixtures</h5>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-md-auto col-form-label">Round&nbsp;</label>
                            <div class="col-md-auto">
                                <select class="form-control" name="round" id="round" onchange="setRound(this.value)">
                                    @foreach ($rounds as $single_round)
                                    <option {{$single_round == $round ? 'selected' : ''}}>{{$single_round}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div id="fixture_list">
                            @forelse ($dates as $key => $date)
                            <div class="card">
                                <div class="card-header p-0" id="heading{{$key}}">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link text-center" data-toggle="collapse"
                                            data-target="#collapse{{$key}}" aria-expanded="true"
                                            aria-controls="collapse{{$key}}" style="width: 100%">
                                            {{\carbon\carbon::parse($fixtures[$date][0]->fixture->timestamp)->setTimezone($timezone)->format('l d/m/Y')}}
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapse{{$key}}" class="collapse show" aria-labelledby="heading{{$key}}">
                                    <div class="card-body p-0 table-responsive">
                                        <table class="matches_new">
                                            <tbody>
                                                @foreach ($fixtures[$date] as $fixture)
                                                <tr class="match  border no-date-repetition">
                                                    @switch($fixture->fixture->status->short)
                                                    @case("CANC")
                                                    <td class="minute novis">
                                                        <div class="match-card match-current-minute">&nbsp;</div>
                                                    </td>
                                                    @break
                                                    @case("NS")
                                                    <td class="minute novis">
                                                        <div class="match-card match-current-minute">&nbsp;</div>
                                                    </td>
                                                    @break
                                                    @case("PST")
                                                    <td class="minute novis">
                                                        <div class="match-card match-current-minute">&nbsp;</div>
                                                    </td>
                                                    @break
                                                    @case("TBD")
                                                    <td class="minute novis">
                                                        <div class="match-card match-current-minute">&nbsp;</div>
                                                    </td>
                                                    @break
                                                    @case("1H")
                                                    <td class="minute visible">
                                                        <div class="match-card match-current-minute">
                                                            {{$fixture->fixture->status->elapsed}}'
                                                        </div>
                                                    </td>
                                                    @break
                                                    @case("2H")
                                                    <td class="minute visible">
                                                        <div class="match-card match-current-minute">
                                                            {{$fixture->fixture->status->elapsed}}'
                                                        </div>
                                                    </td>
                                                    @break
                                                    @case("ET")
                                                    <td class="minute visible">
                                                        <div class="match-card match-current-minute">
                                                            {{$fixture->fixture->status->elapsed}}'
                                                        </div>
                                                    </td>
                                                    @break
                                                    @case("HT")
                                                    <td class="minute visible">
                                                        <div class="match-card match-current-minute">
                                                            {{$fixture->fixture->status->short}}
                                                        </div>
                                                    </td>
                                                    @break
                                                    @default
                                                    <td class="minute visible-2">
                                                        <div class="match-card match-current-minute">
                                                            {{$fixture->fixture->status->short}}
                                                        </div>
                                                    </td>
                                                    @endswitch

                                                    <td class="team team-a">
                                                        <a href="{{route('public.team.get', [
                                                        'nation' => str_replace('/','-',str_replace(' ', '_', $league->country->name)),
                                                        'id' => $fixture->teams->home->id,
                                                        'club' => str_replace('/','-',str_replace(' ', '_', $fixture->teams->home->name))]
                                                        )}}" class="flag_16 right_16 belize_16_right" title="Belize">
                                                            <span
                                                                class="team-title">{{$fixture->teams->home->name}}</span>
                                                            <img class="team-logo" src="{{$fixture->teams->home->logo}}"
                                                                alt="">
                                                        </a>
                                                    </td>

                                                    <td class="score-time status">
                                                        <a
                                                            href="{{route('public.fixture.get', $fixture->fixture->id)}}">
                                                            @switch($fixture->fixture->status->short)
                                                            @case("CANC")
                                                            {{$fixture->fixture->status->short}}
                                                            @break
                                                            @case("PST")
                                                            {{$fixture->fixture->status->short}}
                                                            @break
                                                            @case("TBD")
                                                            {{$fixture->fixture->status->short}}
                                                            @break
                                                            @case("NS")
                                                            {{\carbon\carbon::parse($fixture->fixture->timestamp)->setTimezone($timezone)->format('H:i')}}
                                                            @break
                                                            @default
                                                            {{$fixture->goals->home}} - {{$fixture->goals->away}}
                                                            @endswitch
                                                        </a>
                                                    </td>
                                                    <td class="team team-b text-left">
                                                        <a href="{{route('public.team.get', [
                                'nation' => str_replace('/','-',str_replace(' ', '_', $league->country->name)),
                                'id' => $fixture->teams->away->id,
                                'club' => str_replace('/','-',str_replace(' ', '_', $fixture->teams->away->name))]
                                )}}" class="flag_16 left_16 st-lucia_16_left" title="St. Lucia">
                                                            <img class="team-logo" src="{{$fixture->teams->away->logo}}"
                                                                alt="">
                                                            <span
                                                                class="team-title">{{$fixture->teams->away->name}}</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @empty

                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
            {{-- End of Fixtures --}}
        </div>
        <div class="tab-pane fade" id="pills-team-stats" role="tabpanel" aria-labelledby="pills-team-stats-tab">
            {{-- Team Statistics --}}
            <div class="col-md-12 mb-2 px-0">
                <div class="card align-middle bg-dark text-white">
                    <h5 class="text-left p-2">Team Stats</h5>
                </div>
                <div class="card">
                    <div class="card-body" >
                        <div class="form-group row">
                            <label for="name" class="col-md-auto col-form-label">Team&nbsp;</label>
                            <div class="col-md-auto">
                                <select class="form-control" name="team" id="team" onchange="setTeam(this.value)">
                                    @foreach ($teams as $single_team)
                                    <option {{$single_team->team->id == $team ? 'selected' : ''}} value="{{$single_team->team->id}}">{{$single_team->team->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="table-responsive" id="team-stats">
                            <table class="table table-bordered" style="width: 100%;">
                                {{-- <thead>
                                    <th colspan="4" class="text-center">
                                        {{$team->team->name}}
                                    </th>
                                </thead> --}}
                                <tbody >
                                    @if (!empty($team_statistics))
                                    <tr class="thead-light">
                                        <th colspan="4" class="text-left">Fixtures</th>
                                    </tr>
                                    <tr class="thead-light">
                                        <th></th>
                                        <th>Home</th>
                                        <th>Away</th>
                                        <th>All</th>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Played</td>
                                        <td>{{$team_statistics->fixtures->played->home}}</td>
                                        <td>{{$team_statistics->fixtures->played->away}}</td>
                                        <td>{{$team_statistics->fixtures->played->total}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Wins</td>
                                        <td>{{$team_statistics->fixtures->wins->home}}</td>
                                        <td>{{$team_statistics->fixtures->wins->away}}</td>
                                        <td>{{$team_statistics->fixtures->wins->total}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Draws</td>
                                        <td>{{$team_statistics->fixtures->draws->home}}</td>
                                        <td>{{$team_statistics->fixtures->draws->away}}</td>
                                        <td>{{$team_statistics->fixtures->draws->total}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Losses</td>
                                        <td>{{$team_statistics->fixtures->loses->home}}</td>
                                        <td>{{$team_statistics->fixtures->loses->away}}</td>
                                        <td>{{$team_statistics->fixtures->loses->total}}</td>
                                    </tr>
                                    <tr class="thead-light">
                                        <th colspan="4" class="text-left">Goals For</th>
                                    </tr>
                                    <tr class="thead-light">
                                        <th></th>
                                        <th>Home</th>
                                        <th>Away</th>
                                        <th>All</th>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Total</td>
                                        <td>{{$team_statistics->goals->for->total->home}}</td>
                                        <td>{{$team_statistics->goals->for->total->away}}</td>
                                        <td>{{$team_statistics->goals->for->total->total}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Average</td>
                                        <td>{{$team_statistics->goals->for->average->home}}</td>
                                        <td>{{$team_statistics->goals->for->average->away}}</td>
                                        <td>{{$team_statistics->goals->for->average->total}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Minute</th>
                                                        <th>Total</th>
                                                        <th>Percentage</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($team_statistics->goals->for->minute as $k=>$v)
                                                    <tr>
                                                        <td>{{$k}}</td>
                                                        <td><?php echo !empty($v->total) ? $v->total : '0'; ?></td>
                                                        <td><?php echo !empty($v->percentage) ? $v->percentage : '0%'; ?></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    
                                   
                                    <tr class="thead-light">
                                        <th colspan="4" class="text-left">Goals Against</th>
                                    </tr>
                                    <tr class="thead-light">
                                        <th></th>
                                        <th>Home</th>
                                        <th>Away</th>
                                        <th>All</th>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Total</td>
                                        <td>{{$team_statistics->goals->against->total->home}}</td>
                                        <td>{{$team_statistics->goals->against->total->away}}</td>
                                        <td>{{$team_statistics->goals->against->total->total}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Average</td>
                                        <td>{{$team_statistics->goals->against->average->home}}</td>
                                        <td>{{$team_statistics->goals->against->average->away}}</td>
                                        <td>{{$team_statistics->goals->against->average->total}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Minute</th>
                                                        <th>Total</th>
                                                        <th>Percentage</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($team_statistics->goals->against->minute as $k=>$v)
                                                    <tr>
                                                        <td>{{$k}}</td>
                                                        <td><?php echo !empty($v->total) ? $v->total : '0'; ?></td>
                                                        <td><?php echo !empty($v->percentage) ? $v->percentage : '0%'; ?></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
    
                                    <tr class="thead-light">
                                        <th colspan="4" class="text-left">Biggest Strak</th>
                                    </tr>
                                    <tr class="thead-light">
                                        <th></th>
                                        <th>Wins</th>
                                        <th>Draws</th>
                                        <th>Loses</th>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>{{$team_statistics->biggest->streak->wins}}</td>
                                        <td>{{$team_statistics->biggest->streak->draws}}</td>
                                        <td>{{$team_statistics->biggest->streak->loses}}</td>
                                    </tr>
    
                                    <tr class="thead-light">
                                        <th colspan="4" class="text-left">Biggest</th>
                                    </tr>
                                    <tr class="thead-light">
                                        <th colspan="2"></th>
                                        <th colspan="1">Home</th>
                                        <th colspan="1">Away</th>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Wins</td>
                                        <td colspan="1">{{!empty($team_statistics->biggest->wins->home) ? $team_statistics->biggest->wins->home : 0 }}</td>
                                        <td colspan="1">{{!empty($team_statistics->biggest->wins->away) ? $team_statistics->biggest->wins->away : 0 }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Loese</td>
                                        <td colspan="1">{{!empty($team_statistics->biggest->loese->home) ? $team_statistics->biggest->loese->home : 0 }}</td>
                                        <td colspan="1">{{!empty($team_statistics->biggest->loese->away) ? $team_statistics->biggest->loese->away : 0 }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Goals For</td>
                                        <td colspan="1">{{!empty($team_statistics->biggest->goals->for->home) ? $team_statistics->biggest->goals->for->home : 0 }}</td>
                                        <td colspan="1">{{!empty($team_statistics->biggest->goals->for->away) ? $team_statistics->biggest->goals->for->away : 0 }}</td>
                                    </tr>
    
                                    <tr>
                                        <td colspan="2">Goals Against</td>
                                        <td colspan="1">{{!empty($team_statistics->biggest->goals->against->home) ? $team_statistics->biggest->goals->against->home : 0 }}</td>
                                        <td colspan="1">{{!empty($team_statistics->biggest->goals->against->away) ? $team_statistics->biggest->goals->against->away : 0 }}</td>
                                    </tr>
    
                                    <tr class="thead-light">
                                        <th ></th>
                                        <th >Home</th>
                                        <th >Away</th>
                                        <th>Total</th>
                                    </tr>
                                    <tr>
                                        <th>Clean Sheet</th>
                                        <td>{{!empty($team_statistics->clean_sheet->home) ? $team_statistics->clean_sheet->home : 0 }}</td>
                                        <td>{{!empty($team_statistics->clean_sheet->away) ? $team_statistics->clean_sheet->away : 0 }}</td>
                                        <td>{{!empty($team_statistics->clean_sheet->total) ? $team_statistics->clean_sheet->total : 0 }}</td>
                                    </tr>
                                    <tr>
                                        <th>Failed to Score</th>
                                        <td>{{!empty($team_statistics->failed_to_score->home) ? $team_statistics->failed_to_score->home : 0 }}</td>
                                        <td>{{!empty($team_statistics->failed_to_score->away) ? $team_statistics->failed_to_score->away : 0 }}</td>
                                        <td>{{!empty($team_statistics->failed_to_score->total) ? $team_statistics->failed_to_score->total : 0 }}</td>
                                    </tr>
    
                                    <tr class="thead-light">
                                        <th colspan="4" class="text-left">Penalty</th>
                                    </tr>
                                    <tr class="thead-light">
                                        <th colspan="2"></th>
                                        <th>Total</th>
                                        <th>Percentage</th>
                                    </tr>
                                    <tr>
                                        <th colspan="2" class="text-left">Scored</th>
                                        <td>{{!empty($team_statistics->penalty->scored->total) ? $team_statistics->penalty->scored->total : 0 }}</td>
                                        <td>{{!empty($team_statistics->penalty->scored->percentage) ? !empty($team_statistics->penalty->scored->percentage) : "0%" }}</td>
                                    </tr>
                                    <tr>
                                        <th colspan="2" class="text-left">Missed</th>
                                        <td>{{!empty($team_statistics->penalty->msissed->total) ? $team_statistics->penalty->missed->total : 0 }}</td>
                                        <td>{{!empty($team_statistics->penalty->missed->percentage) ? !empty($team_statistics->penalty->missed->percentage) : "0%" }}</td>
                                    </tr>
    
                                    <tr class="thead-light">
                                        <th colspan="4" class="text-left">Lineups</th>
                                    </tr>
                                    <tr class="thead-light">
                                        <th colspan="2">Formation</th>
                                        <th colspan="2">Played</th>
                                    </tr>
                                    @foreach ($team_statistics->lineups as $k=>$v)
                                    <tr>
                                        <td colspan="2">{{$v->formation}}</td>
                                        <td colspan="2">{{$v->played}}</td>
                                    </tr>
                                    @endforeach
    
    
                                    <tr class="thead-light">
                                        <th colspan="4" class="text-left">Cards Yellow</th>
                                    </tr>
                                    <tr class="thead-light">
                                        <th colspan="2">Time</th>
                                        <th>Total</th>
                                        <th>Percentage</th>
                                    </tr>
                                    @php
                                    $grand_total_yellow = 0;    
                                    @endphp
                                    @foreach ($team_statistics->cards->yellow as $k=>$v)
                                    @php
                                    $grand_total_yellow += !empty($v->total) ? $v->total : 0;    
                                    @endphp
                                    <tr>
                                        <td colspan="2" class="text-left">{{$k}}</td>
                                        <td >{{!empty($v->total) ? $v->total : 0;}}</td>
                                        <td >{{!empty($v->percentage) ? $v->percentage : "0%";}}</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <th colspan="2" >Grand Total</th>
                                        <th>{{$grand_total_yellow}}</th>
                                        <td></td>
                                    </tr>
    
                                    <tr class="thead-light">
                                        <th colspan="4" class="text-left">Cards Red</th>
                                    </tr>
                                    <tr class="thead-light">
                                        <th colspan="2">Time</th>
                                        <th>Total</th>
                                        <th>Percentage</th>
                                    </tr>
                                    @php
                                    $grand_total_red = 0;    
                                    @endphp
                                    @foreach ($team_statistics->cards->red as $k=>$v)
                                    @php
                                    $grand_total_red += !empty($v->total) ? $v->total : 0;    
                                    @endphp
                                    <tr>
                                        <td colspan="2" class="text-left">{{$k}}</td>
                                        <td >{{!empty($v->total) ? $v->total : 0;}}</td>
                                        <td >{{!empty($v->percentage) ? $v->percentage : "0%";}}</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <th colspan="2">Grand Total</th>
                                        <th>{{$grand_total_red}}</th>
                                        <td></td>
                                    </tr>
                                    
                                    @else
                                    <tr>
                                        <td colspan="4" class="text-center">
                                            No data available
                                        </td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{-- End Team Statistics --}}
        </div>

        <div class="tab-pane fade" id="pills-player-stats" role="tabpanel" aria-labelledby="pills-player-stats-tab">
            <div class="col-md-12 mb-2 px-0">
                <div class="row">
                    {{-- Top Scorers --}}
                    <div class="col-md-6">
                        <div class="card align-middle bg-dark text-white">
                            <h5 class="text-left p-2">Top Scorers</h5>
                        </div>
                        <div class="card">
                            <div class="card-body table-responsive">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th class="text-left" scope="col">Player</th>
                                            <th class="text-center" scope="col">G</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($top_scorers as $key => $top_scorer)
                                        <tr>
                                            <td>
                                                {{$key + 1}}
                                            </td>
                                            <td class="text-left" style="white-space: nowrap;">
                                                <a class="no-underline" href="{{route('public.team.get', [
                                    'nation' => str_replace(' ', '_', $league->country->name),
                                    'id' => $top_scorer->statistics[0]->team->id,
                                    'club' => str_replace(' ', '_', $top_scorer->statistics[0]->team->name)]
                                    )}}">
                                                    <img class="team-logo"
                                                        src="{{$top_scorer->statistics[0]->team->logo}}" alt="">
                                                </a>
                                                <a class="no-underline" href="">
                                                    <span class="team-title">{{$top_scorer->player->name}}</span>
                                                </a>
                                            </td>
                                            <td>
                                                {{$top_scorer->statistics[0]->goals->total}}
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3" class="text-center">
                                                No Data Available
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- End of Top scorers --}}

                    {{-- Top Assists --}}
                    <div class="col-md-6">
                        <div class="card align-middle bg-dark text-white">
                            <h5 class="text-left p-2">Top Assists</h5>
                        </div>
                        <div class="card">
                            <div class="card-body table-responsive">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th class="text-left" scope="col">Player</th>
                                            <th class="text-center" scope="col">A</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($top_assists as $key => $top_assist)
                                        <tr>
                                            <td>
                                                {{$key + 1}}
                                            </td>
                                            <td class="text-left" style="white-space: nowrap;">
                                                <a class="no-underline" href="{{route('public.team.get', [
                                    'nation' => str_replace(' ', '_', $league->country->name),
                                    'id' => $top_assist->statistics[0]->team->id,
                                    'club' => str_replace(' ', '_', $top_assist->statistics[0]->team->name)]
                                    )}}">
                                                    <img class="team-logo"
                                                        src="{{$top_assist->statistics[0]->team->logo}}" alt="">
                                                </a>
                                                <a class="no-underline" href="">
                                                    <span class="team-title">{{$top_assist->player->name}}</span>
                                                </a>
                                            </td>
                                            <td>
                                                {{$top_assist->statistics[0]->goals->assists}}
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3" class="text-center">
                                                No Data Available
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- End of Top Assists --}}

                    {{-- Most Yellow Cards --}}
                    <div class="col-md-6 mt-5">
                        <div class="card align-middle bg-dark text-white">
                            <h5 class="text-left p-2">Most Yellow Cards</h5>
                        </div>
                        <div class="card">
                            <div class="card-body table-responsive">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th class="text-left" scope="col">Player</th>
                                            <th class="text-center" scope="col">Y</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($top_yellow_cards as $key => $top_yellow_card)
                                        <tr>
                                            <td>
                                                {{$key + 1}}
                                            </td>
                                            <td class="text-left" style="white-space: nowrap;">
                                                <a class="no-underline" href="{{route('public.team.get', [
                                'nation' => str_replace(' ', '_', $league->country->name),
                                'id' => $top_yellow_card->statistics[0]->team->id,
                                'club' => str_replace(' ', '_', $top_yellow_card->statistics[0]->team->name)]
                                )}}">
                                                    <img class="team-logo"
                                                        src="{{$top_yellow_card->statistics[0]->team->logo}}" alt="">
                                                </a>
                                                <a class="no-underline" href="">
                                                    <span class="team-title">{{$top_yellow_card->player->name}}</span>
                                                </a>
                                            </td>
                                            <td>
                                                {{$top_yellow_card->statistics[0]->cards->yellow}}
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3" class="text-center">
                                                No Data Available
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- End of Most Yellow Cards --}}

                    {{-- Most Red Cards --}}
                    <div class="col-md-6 mt-5">
                        <div class="card align-middle bg-dark text-white">
                            <h5 class="text-left p-2">Most Red Cards</h5>
                        </div>
                        <div class="card">
                            <div class="card-body table-responsive">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th class="text-left" scope="col">Player</th>
                                            <th class="text-center" scope="col">R</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($top_red_cards as $key => $top_red_card)
                                        <tr>
                                            <td>
                                                {{$key + 1}}
                                            </td>
                                            <td class="text-left" style="white-space: nowrap;">
                                                <a class="no-underline" href="{{route('public.team.get', [
                                'nation' => str_replace(' ', '_', $league->country->name),
                                'id' => $top_red_card->statistics[0]->team->id,
                                'club' => str_replace(' ', '_', $top_red_card->statistics[0]->team->name)]
                                )}}">
                                                    <img class="team-logo"
                                                        src="{{$top_red_card->statistics[0]->team->logo}}" alt="">
                                                </a>
                                                <a class="no-underline" href="">
                                                    <span class="team-title">{{$top_red_card->player->name}}</span>
                                                </a>
                                            </td>
                                            <td>
                                                {{$top_red_card->statistics[0]->cards->red}}
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3" class="text-center">
                                                No Data Available
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- End of Most Red Cards --}}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.title = 'Football-Today | ' + "{{$league->country->name}}" + ' - ' + "{{$league->league->name}}";
    retrieveSelected();

    $('.nav-link').on('click', function () {
        localStorage.setItem("tagSelectedLeague", this.id);
        return true;
    });

    function retrieveSelected() {
        var curTag = localStorage.getItem("tagSelectedLeague");

        if (!curTag) {
            curTag = "pills-table-tab"
        }

        $('#' + curTag).addClass('active');

        var tabContentId = $('#' + curTag).attr('aria-controls')

        $('#' + tabContentId).addClass('active')
        $('#' + tabContentId).addClass('show')
    }

</script>
