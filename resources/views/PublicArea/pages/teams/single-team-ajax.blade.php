<style>
.player-stats:hover{
    background-color: #12e5fa;
    cursor: pointer;
}
.player-position h5{
    float: left;
    margin-top:10px;
}
</style>
    <div class="col-md-12 mb-2">
        <div class="card align-middle title-band text-white">
            <div class="row px-2 pt-4 justify-content-between">
                <div class="col-md text-left">
                    <h4 class="text-uppercase">{{$team->team->name}}</h4>
                </div>
                <div class="col-md text-right select-col">
                    <div class="form-group">
                        <select class="form-control-sm" name="league" id="league" onchange="setLeague(this.value)">
                            @php
                            $league_key = null;
                            @endphp
                            @foreach ($leagues as $key => $single_league)
                            @php
                            if ($single_league->league->id == $league) {
                            # code...
                            $league_key = $key;
                            }
                            @endphp
                            <option value="{{$single_league->league->id}}"
                                {{$single_league->league->id == $league ? 'selected' : ''}}>
                                {{$single_league->league->name}}
                            </option>
                            @endforeach
                        </select>
                        <select class="form-control-sm" name="season" id="season" onchange="setSeason(this.value)">
                            @foreach ($seasons as $single_season)
                            <option {{$single_season == $season ? 'selected' : ''}}>
                                {{$single_season}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="team-details" class="col-md-12">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="pills-fixtures-tab" data-toggle="pill" href="#pills-fixtures" role="tab"
                    aria-controls="pills-fixtures" aria-selected="false">Fixtures</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-table-tab" data-toggle="pill" href="#pills-table" role="tab"
                    aria-controls="pills-table" aria-selected="true">Table</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-statistics-tab" data-toggle="pill" href="#pills-statistics" role="tab"
                    aria-controls="pills-statistics" aria-selected="false">Statistics</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-players-tab" data-toggle="pill" href="#pills-players" role="tab"
                    aria-controls="pills-players" aria-selected="false">Players</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-transfers-tab" data-toggle="pill" href="#pills-transfers" role="tab"
                    aria-controls="pills-transfers" aria-selected="false">Transfers</a>
            </li>
        </ul>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade" id="pills-fixtures" role="tabpanel" aria-labelledby="pills-fixtures-tab">
                {{-- Fixtures --}}
                <div class="col-md-12 mb-2 px-0">
                    <div class="card align-middle bg-dark text-white">
                        <h5 class="text-left p-2">Fixtures</h5>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div id="fixture_list">
                                @forelse ($fixtures as $key => $value)
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="h3 float-left">{{date("F Y",strtotime($key))}}</p>
                                        </div>
                                    </div>
                                   
                                    @forelse ($value as $k => $fixture)
                                    <div class="card">
                                        <div class="card-header p-0" id="heading{{$key}}">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link text-center" data-toggle="collapse"
                                                    data-target="#collapse{{$k."-".$key}}" aria-expanded="true"
                                                    aria-controls="collapse{{$k."-".$key}}" style="width: 100%; background-color:lightblue; color:white; font-weight:bolder;">
                                                    {{\carbon\carbon::parse($fixture->fixture->timestamp)->setTimezone($timezone)->format('l jS F')}}
                                                </button>
                                            </h5>

                                            <h5 class="mb-0">
                                                <button class="btn btn-link text-center" data-toggle="collapse"
                                                    data-target="#collapse{{$k."-".$key}}" aria-expanded="true"
                                                    aria-controls="collapse{{$k."-".$key}}" style="width: 100%; background-color:#eaeaea; color:black; font-weight:bolder;"">
                                                   {{$fixture->league->name}}
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapse{{$k."-".$key}}" class="collapse show" aria-labelledby="heading{{$k."-".$key}}">
                                            <div class="card-body p-0 table-responsive">
                                                <table class="matches_new">
                                                    <tbody>
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
                                    'nation' => str_replace('/','-',str_replace(' ', '_', $leagues[$league_key]->country->name)),
                                    'id' => $fixture->teams->home->id,
                                    'club' => str_replace('/','-',str_replace(' ', '_', $fixture->teams->home->name))]
                                    )}}" class="flag_16 right_16 belize_16_right" title="Belize">
                                                                    <span
                                                                        class="team-title">{{$fixture->teams->home->name}}</span>
                                                                    <img class="team-logo"
                                                                        src="{{$fixture->teams->home->logo}}" alt="">
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
                                                                <br>
                                                                <a href="{{route('public.fixture.match-info.get', $fixture->fixture->id)}}"  class="label label-secondary" title="Match-Info">
                                                                    Match Info
                                                                </a>
                                                                <br>
                                                                <a href="{{route('public.fixture.match-preview.get', $fixture->fixture->id)}}"  class="label label-secondary" title="Match-Info">
                                                                    Match Preview
                                                                </a>
                                                            </td>
                                                            <td class="team team-b text-left">
                                                                <a href="{{route('public.team.get', [
                                    'nation' => str_replace('/','-',str_replace(' ', '_', $leagues[$league_key]->country->name)),
                                    'id' => $fixture->teams->away->id,
                                    'club' => str_replace('/','-',str_replace(' ', '_', $fixture->teams->away->name))]
                                    )}}" class="flag_16 left_16 st-lucia_16_left" title="St. Lucia">
                                                                    <img class="team-logo"
                                                                        src="{{$fixture->teams->away->logo}}" alt="">
                                                                    <span
                                                                        class="team-title">{{$fixture->teams->away->name}}</span>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    @empty 
                                    @endforelse
                                @empty
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End of Fixtures --}}
            </div>
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
                                                <img class="wg_flag" src="{{$team_statistics->league->flag}}" loading="lazy"> {{$team_statistics->league->country}}: {{$team_statistics->league->name}}
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
            <div class="tab-pane fade" id="pills-statistics" role="tabpanel" aria-labelledby="pills-statistics-tab">
                {{-- Team Statistics --}}
                <div class="col-md-12 mb-2 px-0">
                    <div class="card align-middle bg-dark text-white">
                        <h5 class="text-left p-2">Team Statistics</h5>
                    </div>
                    <div class="card">
                        <div class="card-body table-responsive">
                            <table class="table table-bordered" style="width: 100%;">
                                <thead>
                                    <th colspan="4" class="text-center">
                                        {{$team->team->name}}
                                    </th>
                                </thead>
                                <tbody>
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
                                        <td class="text-left">Loses</td>
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
                                        <td colspan="2">Loses</td>
                                        <td colspan="1">{{!empty($team_statistics->biggest->loses->home) ? $team_statistics->biggest->loses->home : 0 }}</td>
                                        <td colspan="1">{{!empty($team_statistics->biggest->loses->away) ? $team_statistics->biggest->loses->away : 0 }}</td>
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
                {{-- End Team Statistics --}}
            </div>
            <div class="tab-pane fade" id="pills-players" role="tabpanel" aria-labelledby="pills-players-tab">
                
                {{-- List of Players --}}
                <div class="col-md-12 mb-2 px-0">
                    <div class="accordion" id="accordionExample">
                        @foreach ($playersByPosition as $k=>$v)
                        <div class="row">
                            <div class="col-md-12 player-position">
                                <h5>{{$k}}<hr></h5>
                                
                            </div>
    
                            @foreach ($v as $pk=>$pv)
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="player-stats card-header" id="heading-{{$k."-".$pk}}" data-toggle="collapse" data-target="#collapse-{{$k."-".$pk}}" aria-expanded="true" aria-controls="collapse-{{$k."-".$pk}}">
                                        <div class="media">
                                            <img src="{{$pv->player->photo}}" alt="User Image" class="mr-3 user-image rounded-circle">
                                            <div class="media-body">
                                              <h5 class="mt-0">{{$pv->player->name}}</h5>
                                              <p>{{$pv->player->nationality}}</p>
                                              <p><a href="{{route('public.team.player.transfers.get', ['team'=>$team->team->id,'player'=>$pv->player->id])}}">Transfers</a></p>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div id="collapse-{{$k."-".$pk}}" class="collapse" aria-labelledby="heading-{{$k."-".$pk}}" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th colspan="2">TEAM</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>Logo</th>
                                                        <td><img src="{{$pv->statistics[0]->team->logo}}" alt="" class="mr-3 user-image"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Name</th>
                                                        <td><b>{{$pv->statistics[0]->team->name}}</b></td>
                                                    </tr>
                                                </tbody>
                                            </table>
    
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th colspan="2">LEAGUE</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>Name</th>
                                                        <td>{{$pv->statistics[0]->league->name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Country</th>
                                                        <td>{{$pv->statistics[0]->league->country}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Logo</th>
                                                        <td><img src="{{$pv->statistics[0]->league->logo}}" alt="" class="mr-3 user-image"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Flag</th>
                                                        <td><img src="{{$pv->statistics[0]->league->flag}}" alt="" class="mr-3 img img-fluid user-image"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Season</th>
                                                        <td>{{$pv->statistics[0]->league->season}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
    
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th colspan="2">GAMES</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>Appearences</th>
                                                        <td>{{$pv->statistics[0]->games->appearences}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Lineups</th>
                                                        <td>{{$pv->statistics[0]->games->lineups}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Minutes</th>
                                                        <td>{{$pv->statistics[0]->games->minutes}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Number</th>
                                                        <td>{{$pv->statistics[0]->games->number}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Rating</th>
                                                        <td>{{$pv->statistics[0]->games->rating}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Captain</th>
                                                        <td>{{$pv->statistics[0]->games->captain}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
    
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th colspan="2">Substitutes</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>In</th>
                                                        <td>{{$pv->statistics[0]->substitutes->in}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Out</th>
                                                        <td>{{$pv->statistics[0]->substitutes->out}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Bench</th>
                                                        <td>{{$pv->statistics[0]->substitutes->bench}}</td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
    
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th colspan="2">Shots</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>Total</th>
                                                        <td>{{$pv->statistics[0]->shots->total}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>On</th>
                                                        <td>{{$pv->statistics[0]->shots->on}}</td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
    
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th colspan="2">Goals</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>Total</th>
                                                        <td>{{$pv->statistics[0]->goals->total}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Conceded</th>
                                                        <td>{{$pv->statistics[0]->goals->conceded}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Assists</th>
                                                        <td>{{$pv->statistics[0]->goals->assists}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Saves</th>
                                                        <td>{{$pv->statistics[0]->goals->saves}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th colspan="2">PASSES</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>Total</th>
                                                        <td>{{$pv->statistics[0]->passes->total}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Key</th>
                                                        <td>{{$pv->statistics[0]->passes->key}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Accuracy</th>
                                                        <td>{{$pv->statistics[0]->passes->accuracy}}</td>
                                                    </tr>
                                                   
                                                </tbody>
                                            </table>
    
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th colspan="2">TACKLES</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>Total</th>
                                                        <td>{{$pv->statistics[0]->tackles->total}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Blocks</th>
                                                        <td>{{$pv->statistics[0]->tackles->blocks}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Interceptions</th>
                                                        <td>{{$pv->statistics[0]->tackles->interceptions}}</td>
                                                    </tr>
                                                   
                                                </tbody>
                                            </table>
    
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th colspan="2">DUELS</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>Total</th>
                                                        <td>{{$pv->statistics[0]->duels->total}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Won</th>
                                                        <td>{{$pv->statistics[0]->duels->won}}</td>
                                                    </tr>
                                                   
                                                </tbody>
                                            </table>
    
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th colspan="2">DRIBBLES</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>Attempts</th>
                                                        <td>{{$pv->statistics[0]->dribbles->attempts}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Success</th>
                                                        <td>{{$pv->statistics[0]->dribbles->success}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Past</th>
                                                        <td>{{$pv->statistics[0]->dribbles->past}}</td>
                                                    </tr>
                                                   
                                                </tbody>
                                            </table>
    
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th colspan="2">FOULS</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>Drawn</th>
                                                        <td>{{$pv->statistics[0]->fouls->drawn}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Committed</th>
                                                        <td>{{$pv->statistics[0]->fouls->committed}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
    
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th colspan="2">CARDS</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>Yellow</th>
                                                        <td>{{$pv->statistics[0]->cards->yellow}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Yellowred</th>
                                                        <td>{{$pv->statistics[0]->cards->yellowred}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Red</th>
                                                        <td>{{$pv->statistics[0]->cards->red}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
    
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th colspan="2">PENALTY</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>Won</th>
                                                        <td>{{$pv->statistics[0]->penalty->won}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Commited</th>
                                                        <td>{{$pv->statistics[0]->penalty->commited}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Scored</th>
                                                        <td>{{$pv->statistics[0]->penalty->scored}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Missed</th>
                                                        <td>{{$pv->statistics[0]->penalty->missed}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Saved</th>
                                                        <td>{{$pv->statistics[0]->penalty->saved}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
    
                        </div>    
                        @endforeach
                    </div>
                </div>
                {{-- End of List of Players --}}

            </div>
            <div class="tab-pane fade" id="pills-transfers" role="tabpanel" aria-labelledby="pills-transfers-tab">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="transfers_from_date">From Date</label>
                            <input type="date" value="{{$transfers['fromDate']}}" class="form-control" name="transfers_from_date" id="transfers_from_date">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="transfers_to_date">To Date</label>
                            <input type="date" value="{{$transfers['toDate']}}" class="form-control" name="transfers_to_date" id="transfers_to_date">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="btn-get-transfers">&nbsp;</label>
                            <button class="btn btn-info" type="button" onclick="setTransferDates()" id="btn-get-transfers">Get Transfers</button>
                        </div>
                    </div>
                </div>

                <div id="transfers-container">
                    {{-- List of Transfers --}}
                    @if(!empty($transfers['transfers']))
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <table class="table table-bordered table-striped" style="text-align:left;">
                                <thead>
                                    <tr>
                                        <th colspan="5">TRANSFERS {{$transfers['fromDate']}} - {{$transfers['toDate']}}</th>
                                    </tr>
                                    <tr>
                                        <th>SR#</th>
                                        <th>Player</th>
                                        <th>Left</th>
                                        <th>Joined</th>
                                        <th>Fee</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $sr = 0;
                                    @endphp
                                    @foreach ($transfers['transfers'] as $k=>$v)
                                    <tr>
                                        <td>{{++$sr}}</td>
                                        <td>{{$v['player']->name}}</td>
                                        <td>
                                            <span><img src="{{$v['transfer']->teams->out->logo}}" width="20px; height:20px;" alt="team-img"></span>
                                            <span>{{$v['transfer']->teams->out->name}}</span>
                                        </td>
                                        <td>
                                            <span><img src="{{$v['transfer']->teams->in->logo}}" width="20px; height:20px;" alt="team-img"></span>
                                            <span>{{$v['transfer']->teams->in->name}}</span>
                                        </td>
                                        <td>{{$v['transfer']->type}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                    {{-- End of List of Players --}}
                </div>
            </div>
        </div>
    </div>
    
    

    <script>
        document.title = 'Football-Today | ' + "{{$team->team->name}}";

        retrieveSelected();

        $('.nav-link').on('click', function () {
            localStorage.setItem("tagSelectedTeam", this.id);
            return true;
        });

        function retrieveSelected() {
            var curTag = localStorage.getItem("tagSelectedTeam");

            if (!curTag) {
                curTag = "pills-fixtures-tab"
            }

            $('#' + curTag).addClass('active');

            var tabContentId = $('#' + curTag).attr('aria-controls')

            $('#' + tabContentId).addClass('active')
            $('#' + tabContentId).addClass('show')
        }

    </script>
