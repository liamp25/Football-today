<style>
    .standing-table img {
        width: 20px;
    }
</style>
<div class="sub_view_btn">
    <div class="container">
        <nav>
            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-summary-tab" data-toggle="tab"
                    href="#nav-summary{{ $fixture->id }}" role="tab" aria-controls="nav-summary"
                    aria-selected="true">summary</a>
                <a class="nav-item nav-link" id="nav-stats-tab" data-toggle="tab" href="#nav-stats{{ $fixture->id }}"
                    role="tab" aria-controls="nav-stats" aria-selected="false">Team stats</a>
                <a class="nav-item nav-link" id="nav-Player-tab" data-toggle="tab" href="#nav-Player{{ $fixture->id }}"
                    role="tab" aria-controls="nav-Player" aria-selected="false">Player stats</a>
            </div>
        </nav>
        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">

            <!-- summary tab content -->
            <div class="tab-pane fade show active" id="nav-summary{{ $fixture->id }}" role="tabpanel"
                aria-labelledby="nav-summary-tab">

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td><b>{{ $teams->home->name }}</b></td>
                                <td><b>{{ $teams->away->name }}</b></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @php
                                    $formHomeCount = count($form['home']);
                                    $formAwayCount = count($form['away']);
                                    $large = $formHomeCount > $formAwayCount ? $formHomeCount : $formAwayCount;
                                @endphp
                                @for ($i = 0; $i < $large; $i++)
                            <tr>
                                @php
                                    try {
                                        $homeName = $form['home'][$i]->teams->home->name;
                                        $homeGoal = $form['home'][$i]->goals->home;
                                        $awayName = $form['home'][$i]->teams->away->name;
                                        $awayGoal = $form['home'][$i]->goals->away;
                                        echo "<td>$homeName $homeGoal - $awayGoal $awayName</td>";
                                    } catch (\Exception $e) {
                                        echo '<td></td>';
                                    }

                                    try {
                                        $homeName = $form['away'][$i]->teams->home->name;
                                        $homeGoal = $form['away'][$i]->goals->home;
                                        $awayName = $form['away'][$i]->teams->away->name;
                                        $awayGoal = $form['away'][$i]->goals->away;
                                        echo "<td>$homeName $homeGoal - $awayGoal $awayName</td>";
                                    } catch (\Exception $e) {
                                        echo '<td></td>';
                                    }
                                @endphp
                            </tr>
                            @endfor
                            </tr>
                        </tbody>
                    </table>
                </div>

                <p class="display-4 text-center mt-2">Head 2 Head</p>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            @forelse ($h2h as $h2h_single)
                                <tr>
                                    <td class="text-left"><b>{{ $h2h_single->teams->home->name }}</b></td>
                                    <td class="text-center">
                                        <b>{{ $h2h_single->goals->home }}-{{ $h2h_single->goals->away }}</b>
                                    </td>
                                    <td class="text-right"><b>{{ $h2h_single->teams->away->name }}</b></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">
                                        No data available
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>

                <p class="display-4 text-center mt-2">injuires</p>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td><b>{{ $teams->home->name }}</b></td>
                                <td><b>{{ $teams->away->name }}</b></td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $injuriesHomeCount = count($injuries['home']);
                                $injuriesAwayCount = count($injuries['away']);
                                $large = $injuriesHomeCount > $injuriesAwayCount ? $injuriesHomeCount : $injuriesAwayCount;
                            @endphp
                            @for ($i = 0; $i < $large; $i++)
                                <tr>
                                    @php
                                        try {
                                            $homeInjury = $injuries['home'][$i]->player->name;
                                            echo "<td>$homeInjury</td>";
                                        } catch (\Exception $e) {
                                            echo '<td></td>';
                                        }

                                        try {
                                            $awayInjury = $injuries['away'][$i]->player->name;
                                            echo "<td>$awayInjury</td>";
                                        } catch (\Exception $e) {
                                            echo '<td></td>';
                                        }
                                    @endphp
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td><b>Team A</b></td>
                                <td>6666</td>
                            </tr>
                            <tr>
                                <td><b>Team B</b></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><b>Team C</b></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><b>Team D</b></td>
                                <td></td>
                            </tr>
                        </tbody>

                    </table>
                </div>

                <div>
                    <div class="card align-middle bg-dark text-white">
                        <h5 class="text-left p-2">Table</h5>
                    </div>
                    <div class="card standing-table">
                        <div class="">
                            <div class="table-responsive">
                                @forelse ($standings as $single_standing)
                                <table class="table wg-table">
                                    <thead></thead>
                                    <tbody>
                                        <tr>
                                            <td class="wg_header" colspan="11" style="text-align: left;">
                                                <img class="wg_flag" src="{{ $league->flag }}" loading="lazy">
                                                {{ $league->country }}: {{ $league->name }}
                                            </td>
                                        </tr>
                                        <tr>

                                            <td class="wg_header" colspan="2"></td>
                                            <td class="wg_header wg_text_center wg_tooltip wg_tooltip_left"
                                                data-toggle="tooltip" data-placement="left" title="MATCHES PLAYED">
                                                MP</td>
                                            <td class="wg_header wg_text_center wg_tooltip wg_tooltip_left"
                                                data-toggle="tooltip" data-placement="left" title="WIN">W</td>
                                            <td class="wg_header wg_text_center wg_tooltip wg_tooltip_left"
                                                data-toggle="tooltip" data-placement="left" title="DRAW">D</td>
                                            <td class="wg_header wg_text_center wg_tooltip wg_tooltip_left"
                                                data-toggle="tooltip" data-placement="left" title="LOSE">L</td>
                                            <td class="wg_header wg_text_center wg_tooltip wg_tooltip_left wg_hide_xxs"
                                                data-toggle="tooltip" data-placement="left"
                                                title="GOALS FOR:GOALS AGAINST">G</td>
                                            <td class="wg_header wg_text_center wg_tooltip wg_tooltip_left wg_hide_xs"
                                                data-toggle="tooltip" data-placement="left" title="DIFFERENCE">
                                                +/-</td>
                                            <td class="wg_header wg_text_center wg_tooltip wg_tooltip_left"
                                                data-toggle="tooltip" data-placement="left" title="POINTS">P</td>
                                            <td class="wg_header wg_hide_xs" colspan="2"></td>
                                        </tr>
                                        @forelse ($single_standing as $standing)
                                            @php
                                                $rowColor = '';
                                                if (isset($standing->description) && !empty($standing->description)) {
                                                    $rowColor = 'lightblue';
                                                }
                                            @endphp
                                            <tr>
                                                <td class="wg_text_center wg_bolder wg_width_20"
                                                    style="background-color: {{ $rowColor }};">
                                                    {{ $standing->rank }}
                                                </td>
                                                <td class="wg_nowrap"
                                                    style="text-align: left; background-color:{{ $rowColor }};">
                                                    <img class="wg_logo" src="{{ $standing->team->logo }}"
                                                        alt="">
                                                    {{ $standing->team->name }}
                                                </td>
                                                <td class="wg_text_center wg_width_20"
                                                    style="background-color: {{ $rowColor }};">
                                                    {{ $standing->all->played }}
                                                </td>
                                                <td class="wg_text_center wg_width_20"
                                                    style="background-color: {{ $rowColor }};">
                                                    {{ $standing->all->win }}
                                                </td>
                                                <td class="wg_text_center wg_width_20"
                                                    style="background-color: {{ $rowColor }};">
                                                    {{ $standing->all->draw }}
                                                </td>
                                                <td class="wg_text_center wg_width_20"
                                                    style="background-color: {{ $rowColor }};">
                                                    {{ $standing->all->lose }}
                                                </td>
                                                <td class="wg_text_center wg_width_20 wg_hide_xxs"
                                                    style="background-color: {{ $rowColor }};">
                                                    {{ $standing->all->goals->for }}:{{ $standing->all->goals->against }}
                                                </td>
                                                <td class="wg_text_center wg_width_20 wg_hide_xs"
                                                    style="background-color: {{ $rowColor }};">
                                                    {{ $standing->goalsDiff }}
                                                </td>
                                                <td class="wg_text_center wg_width_20"
                                                    style="background-color: {{ $rowColor }};">
                                                    <span class="<?php echo isset($standing->description) && !empty($standing->description) ? 'wg_tooltip wg_tooltip_left' : ''; ?>" data-toggle="tooltip"
                                                        data-placement="left"
                                                        title="{{ $standing->description }}">
                                                        {{ $standing->points }}
                                                    </span>
                                                </td>
                                                <td class="wg_text_center wg_width_90 wg_hide_xs"
                                                    style="text-align: left; background-color: {{ $rowColor }};">
                                                    @php
                                                        $str = $standing->form;
                                                        $strCount = strlen($str);
                                                    @endphp
                                                    @if ($strCount > 0)
                                                        @for ($i = 0; $i < $strCount; $i++)
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
                                                        <span class="wg_info wg_tooltip wg_tooltip_left"
                                                            data-toggle="tooltip" data-placement="left"
                                                            title="{{ $standing->description }}">?</span>
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
                    {{-- End of league table --}}

                </div>


            </div>


            <!-- Team stats tab content -->
            <div class="tab-pane fade" id="nav-stats{{ $fixture->id }}" role="tabpanel" aria-labelledby="nav-stats-tab">

                <div class="row">
                    {{-- team stats --}}
                    <div class="col-md-12 mb-2">
                        <div class="card align-middle bg-dark text-white">
                            <h5 class="text-left p-2">Team Statistics</h5>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row my-3 text-left">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="card-title">{{ $teams->home->name }} Goals</h6>
                                                <small class="card-text my-2">
                                                    {{ $teams->home->name }} have scored
                                                    <strong>{{ $team_statistics['home']->goals->for->total->total }}</strong>
                                                    goals from
                                                    <strong>{{ $team_statistics['home']->fixtures->played->total }}</strong>
                                                    matches. This gives
                                                    us an
                                                    average of
                                                    <strong>{{ $team_statistics['home']->goals->for->average->total }}</strong>
                                                    total
                                                    goals scored. {{ $teams->home->name }} have conceded
                                                    <strong>{{ $team_statistics['home']->goals->against->total->total }}</strong>
                                                    goals
                                                    which works out an average of
                                                    <strong>{{ $team_statistics['home']->goals->against->average->total }}</strong>
                                                    goals
                                                    conceded per match.
                                                </small>
                                                <canvas id="home_goals_bar" class="mt-2"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="card-title">{{ $teams->away->name }} Goals</h6>
                                                <small class="card-text my-2">
                                                    {{ $teams->away->name }} have scored
                                                    <strong>{{ $team_statistics['away']->goals->for->total->total }}</strong>
                                                    goals from
                                                    <strong>{{ $team_statistics['away']->fixtures->played->total }}</strong>
                                                    matches. This gives
                                                    us an
                                                    average of
                                                    <strong>{{ $team_statistics['away']->goals->for->average->total }}</strong>
                                                    total
                                                    goals scored. {{ $teams->away->name }} have conceded
                                                    <strong>{{ $team_statistics['away']->goals->against->total->total }}</strong>
                                                    goals
                                                    which works out an average of
                                                    <strong>{{ $team_statistics['away']->goals->against->average->total }}</strong>
                                                    goals
                                                    conceded per match.
                                                </small>
                                                <canvas id="away_goals_bar" class="mt-2"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row my-3 text-left">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="card-title">{{ $teams->home->name }} Home Goals</h6>
                                                <small class="card-text my-2">
                                                    {{ $teams->home->name }} have scored
                                                    <strong>{{ $team_statistics['home']->goals->for->total->home }}</strong>
                                                    goals from
                                                    <strong>{{ $team_statistics['home']->fixtures->played->home }}</strong>
                                                    home matches. This gives
                                                    us an
                                                    average of
                                                    <strong>{{ $team_statistics['home']->goals->for->average->home }}</strong>
                                                    home goals scored. {{ $teams->home->name }} have conceded
                                                    <strong>{{ $team_statistics['home']->goals->against->total->home }}</strong>
                                                    goals
                                                    which works out an average of
                                                    <strong>{{ $team_statistics['home']->goals->against->average->home }}</strong>
                                                    goals
                                                    conceded per match.
                                                </small>
                                                <canvas id="h_home_goals_bar" class="mt-2"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="card-title">{{ $teams->away->name }} Away Goals</h6>
                                                <small class="card-text my-2">
                                                    {{ $teams->away->name }} have scored
                                                    <strong>{{ $team_statistics['away']->goals->for->total->away }}</strong>
                                                    goals from
                                                    <strong>{{ $team_statistics['away']->fixtures->played->away }}</strong>
                                                    away matches. This gives
                                                    us an
                                                    average of
                                                    <strong>{{ $team_statistics['away']->goals->for->average->away }}</strong>
                                                    away goals scored. {{ $teams->away->name }} have conceded
                                                    <strong>{{ $team_statistics['away']->goals->against->total->away }}</strong>
                                                    goals
                                                    which works out an average of
                                                    <strong>{{ $team_statistics['away']->goals->against->average->away }}</strong>
                                                    goals
                                                    conceded per match.
                                                </small>
                                                <canvas id="a_away_goals_bar" class="mt-2"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row text-left">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="card-title">{{ $teams->home->name }} Results</h6>
                                                <small class="card-text my-2">
                                                    {{ $teams->home->name }} have won
                                                    <strong>{{ $team_statistics['home']->fixtures->wins->total }}</strong>
                                                    matches drawn
                                                    <strong>{{ $team_statistics['home']->fixtures->draws->total }}</strong>
                                                    and
                                                    lost
                                                    <strong>{{ $team_statistics['home']->fixtures->loses->total }}</strong>
                                                    from
                                                    <strong>{{ $team_statistics['home']->fixtures->played->total }}</strong>
                                                    matches.
                                                </small>
                                                <canvas id="h_home_res_pie" class="mt-2"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="card-title">{{ $teams->away->name }} Results</h6>
                                                <small class="card-text my-2">
                                                    {{ $teams->away->name }} have won
                                                    <strong>{{ $team_statistics['away']->fixtures->wins->total }}</strong>
                                                    matches drawn
                                                    <strong>{{ $team_statistics['away']->fixtures->draws->total }}</strong>
                                                    and
                                                    lost
                                                    <strong>{{ $team_statistics['away']->fixtures->loses->total }}</strong>
                                                    from
                                                    <strong>{{ $team_statistics['away']->fixtures->played->total }}</strong>
                                                    matches.
                                                </small>
                                                <canvas id="a_away_res_pie" class="mt-2"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row text-left my-2">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="card-title">{{ $teams->home->name }} Home Results</h6>
                                                <small class="card-text my-2">
                                                    {{ $teams->home->name }} have won
                                                    <strong>{{ $team_statistics['home']->fixtures->wins->home }}</strong>
                                                    matches drawn
                                                    <strong>{{ $team_statistics['home']->fixtures->draws->home }}</strong> and
                                                    lost
                                                    <strong>{{ $team_statistics['home']->fixtures->loses->home }}</strong>
                                                    matches at home.
                                                </small>
                                                <canvas id="home_res_pie" class="mt-2"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="card-title">{{ $teams->away->name }} Away Results</h6>
                                                <small class="card-text my-2">
                                                    {{ $teams->away->name }} have won
                                                    <strong>{{ $team_statistics['away']->fixtures->wins->away }}</strong>
                                                    matches drawn
                                                    <strong>{{ $team_statistics['away']->fixtures->draws->away }}</strong> and
                                                    lost
                                                    <strong>{{ $team_statistics['away']->fixtures->loses->away }}</strong>
                                                    matches away.
                                                </small>
                                                <canvas id="away_res_pie" class="mt-2"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row text-left my-2">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="card-title">{{ $teams->home->name }} Clean Sheet</h6>
                                                <small class="card-text my-2">
                                                    {{ $teams->home->name }} home
                                                    <strong>{{ !empty($team_statistics['home']->clean_sheet->home) ? $team_statistics['home']->clean_sheet->home : 0 }}</strong>
                                                    away
                                                    <strong>{{ !empty($team_statistics['home']->clean_sheet->away) ? $team_statistics['home']->clean_sheet->away : 0 }}</strong>
                                                    and
                                                    total
                                                    <strong>{{ !empty($team_statistics['home']->clean_sheet->total) ? $team_statistics['home']->clean_sheet->total : 0 }}</strong>

                                                </small>
                                                <canvas id="home_clean_sheet_pie" class="mt-2"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="card-title">{{ $teams->away->name }} Clean Sheet</h6>
                                                <small class="card-text my-2">
                                                    {{ $teams->away->name }} home
                                                    <strong>{{ !empty($team_statistics['away']->clean_sheet->home) ? $team_statistics['away']->clean_sheet->home : 0 }}</strong>
                                                    away
                                                    <strong>{{ !empty($team_statistics['away']->clean_sheet->away) ? $team_statistics['away']->clean_sheet->away : 0 }}</strong>
                                                    and
                                                    total
                                                    <strong>{{ !empty($team_statistics['away']->clean_sheet->total) ? $team_statistics['away']->clean_sheet->total : 0 }}</strong>

                                                </small>
                                                <canvas id="away_clean_sheet_pie" class="mt-2"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row text-left my-2">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="card-title">{{ $teams->home->name }} Failed to Score</h6>
                                                <small class="card-text my-2">
                                                    {{ $teams->home->name }} home
                                                    <strong>{{ !empty($team_statistics['home']->failed_to_score->home) ? $team_statistics['home']->failed_to_score->home : 0 }}</strong>
                                                    away
                                                    <strong>{{ !empty($team_statistics['home']->failed_to_score->away) ? $team_statistics['home']->failed_to_score->away : 0 }}</strong>
                                                    and
                                                    total
                                                    <strong>{{ !empty($team_statistics['home']->failed_to_score->total) ? $team_statistics['home']->failed_to_score->total : 0 }}</strong>

                                                </small>
                                                <canvas id="home_failed_to_score_pie" class="mt-2"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="card-title">{{ $teams->away->name }} Failed to Score</h6>
                                                <small class="card-text my-2">
                                                    {{ $teams->away->name }} home
                                                    <strong>{{ !empty($team_statistics['away']->failed_to_score->home) ? $team_statistics['away']->failed_to_score->home : 0 }}</strong>
                                                    away
                                                    <strong>{{ !empty($team_statistics['away']->failed_to_score->away) ? $team_statistics['away']->failed_to_score->away : 0 }}</strong>
                                                    and
                                                    total
                                                    <strong>{{ !empty($team_statistics['away']->failed_to_score->total) ? $team_statistics['away']->failed_to_score->total : 0 }}</strong>

                                                </small>
                                                <canvas id="away_failed_to_score_pie" class="mt-2"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- End of team stats --}}
                </div>

            </div>

            <!-- Player tab content -->
            <div class="tab-pane fade" id="nav-Player{{ $fixture->id }}" role="tabpanel" aria-labelledby="nav-Player-tab">

                <div class="row">
                    {{-- Top home --}}
                    <div class="col-md-6 mb-2">
                        <div class="card align-middle bg-dark text-white">
                            <h5 class="text-left p-2">
                                <img src="{{ $teams->home->logo }}" alt="team-logo" class="img img-fluid"
                                    style="width:30px; height:30px;">
                                {{ $teams->home->name }}
                            </h5>
                        </div>
                        <div class="card">
                            <div class="card-body table-responsive" id="accordionExample">

                                {{--  --}}
                                <div class="card mt-2">
                                    <div class="player-stats card-header" id="heading-top-goals-total" data-toggle="collapse"
                                        data-target="#collapse-top-goals-total" aria-expanded="true"
                                        aria-controls="collapse-top-goals-total">
                                        Top Goals Total
                                    </div>

                                    <div id="collapse-top-goals-total" class="collapse" aria-labelledby="heading-top-goals-total"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            @forelse ($players['home']['top_goals_total'] as $k=>$v)
                                                <div class="media">
                                                    <img src="{{ $v->player->photo }}" alt="User Image"
                                                        class="mr-3 user-image rounded-circle" width="70">
                                                    <div class="media-body">
                                                        <h5 class="mt-0">{{ $v->player->name }}</h5>
                                                        <p>{{ $v->statistics[0]->goals->total }}</p>
                                                    </div>
                                                </div>
                                                <hr>
                                            @empty
                                                <h5>No Data</h5>
                                            @endforelse

                                        </div>
                                    </div>
                                </div>

                                <div class="card mt-2">
                                    <div class="player-stats card-header" id="heading-top-goals-assists" data-toggle="collapse"
                                        data-target="#collapse-top-goals-assists" aria-expanded="true"
                                        aria-controls="collapse-top-goals-assists">
                                        Top Goals Assists
                                    </div>

                                    <div id="collapse-top-goals-assists" class="collapse"
                                        aria-labelledby="heading-top-goals-assists" data-parent="#accordionExample">
                                        <div class="card-body">
                                            @forelse ($players['home']['top_goals_assists'] as $k=>$v)
                                                <div class="media">
                                                    <img src="{{ $v->player->photo }}" alt="User Image"
                                                        class="mr-3 user-image rounded-circle" width="70">
                                                    <div class="media-body">
                                                        <h5 class="mt-0">{{ $v->player->name }}</h5>
                                                        <p>{{ $v->statistics[0]->goals->assists }}</p>
                                                    </div>
                                                </div>
                                                <hr>
                                            @empty
                                                <h5>No Data</h5>
                                            @endforelse

                                        </div>
                                    </div>
                                </div>

                                <div class="card mt-2">
                                    <div class="player-stats card-header" id="heading-top-shots-total" data-toggle="collapse"
                                        data-target="#collapse-top-shots-total" aria-expanded="true"
                                        aria-controls="collapse-top-shots-total">
                                        Top Shots Total
                                    </div>

                                    <div id="collapse-top-shots-total" class="collapse" aria-labelledby="heading-top-shots-total"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            @forelse ($players['home']['top_shots_total'] as $k=>$v)
                                                <div class="media">
                                                    <img src="{{ $v->player->photo }}" alt="User Image"
                                                        class="mr-3 user-image rounded-circle" width="70">
                                                    <div class="media-body">
                                                        <h5 class="mt-0">{{ $v->player->name }}</h5>
                                                        <p>{{ $v->statistics[0]->shots->total }}</p>
                                                    </div>
                                                </div>
                                                <hr>
                                            @empty
                                                <h5>No Data</h5>
                                            @endforelse

                                        </div>
                                    </div>
                                </div>

                                <div class="card mt-2">
                                    <div class="player-stats card-header" id="heading-top-shots-on" data-toggle="collapse"
                                        data-target="#collapse-top-shots-on" aria-expanded="true"
                                        aria-controls="collapse-top-shots-on">
                                        Top Shots On
                                    </div>

                                    <div id="collapse-top-shots-on" class="collapse" aria-labelledby="heading-top-shots-on"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            @forelse ($players['home']['top_shots_on'] as $k=>$v)
                                                <div class="media">
                                                    <img src="{{ $v->player->photo }}" alt="User Image"
                                                        class="mr-3 user-image rounded-circle">
                                                    <div class="media-body">
                                                        <h5 class="mt-0">{{ $v->player->name }}</h5>
                                                        <p>{{ $v->statistics[0]->shots->on }}</p>
                                                    </div>
                                                </div>
                                                <hr>
                                            @empty
                                                <h5>No Data</h5>
                                            @endforelse

                                        </div>
                                    </div>
                                </div>

                                <div class="card mt-2">
                                    <div class="player-stats card-header" id="heading-top-games-rating" data-toggle="collapse"
                                        data-target="#collapse-top-games-rating" aria-expanded="true"
                                        aria-controls="collapse-top-games-rating">
                                        Top Games Rating
                                    </div>

                                    <div id="collapse-top-games-rating" class="collapse"
                                        aria-labelledby="heading-top-games-rating" data-parent="#accordionExample">
                                        <div class="card-body">
                                            @forelse ($players['home']['top_games_rating'] as $k=>$v)
                                                <div class="media">
                                                    <img src="{{ $v->player->photo }}" alt="User Image"
                                                        class="mr-3 user-image rounded-circle">
                                                    <div class="media-body">
                                                        <h5 class="mt-0">{{ $v->player->name }}</h5>
                                                        <p>{{ $v->statistics[0]->games->rating }}</p>
                                                    </div>
                                                </div>
                                                <hr>
                                            @empty
                                                <h5>No Data</h5>
                                            @endforelse

                                        </div>
                                    </div>
                                </div>

                                <div class="card mt-2">
                                    <div class="player-stats card-header" id="heading-top-passes-key" data-toggle="collapse"
                                        data-target="#collapse-top-passes-key" aria-expanded="true"
                                        aria-controls="collapse-top-passes-key">
                                        Top Passes Key
                                    </div>

                                    <div id="collapse-top-passes-key" class="collapse" aria-labelledby="heading-top-passes-key"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            @forelse ($players['home']['top_passes_key'] as $k=>$v)
                                                <div class="media">
                                                    <img src="{{ $v->player->photo }}" alt="User Image"
                                                        class="mr-3 user-image rounded-circle">
                                                    <div class="media-body">
                                                        <h5 class="mt-0">{{ $v->player->name }}</h5>
                                                        <p>{{ $v->statistics[0]->passes->key }}</p>
                                                    </div>
                                                </div>
                                                <hr>
                                            @empty
                                                <h5>No Data</h5>
                                            @endforelse

                                        </div>
                                    </div>
                                </div>

                                <div class="card mt-2">
                                    <div class="player-stats card-header" id="heading-top-tackles-total" data-toggle="collapse"
                                        data-target="#collapse-top-tackles-total" aria-expanded="true"
                                        aria-controls="collapse-top-tackles-total">
                                        Top Tackles Total
                                    </div>

                                    <div id="collapse-top-tackles-total" class="collapse"
                                        aria-labelledby="heading-top-tackles-total" data-parent="#accordionExample">
                                        <div class="card-body">
                                            @forelse ($players['home']['top_tackles_total'] as $k=>$v)
                                                <div class="media">
                                                    <img src="{{ $v->player->photo }}" alt="User Image"
                                                        class="mr-3 user-image rounded-circle">
                                                    <div class="media-body">
                                                        <h5 class="mt-0">{{ $v->player->name }}</h5>
                                                        <p>{{ $v->statistics[0]->tackles->total }}</p>
                                                    </div>
                                                </div>
                                                <hr>
                                            @empty
                                                <h5>No Data</h5>
                                            @endforelse

                                        </div>
                                    </div>
                                </div>

                                <div class="card mt-2">
                                    <div class="player-stats card-header" id="heading-top-fouls-committed" data-toggle="collapse"
                                        data-target="#collapse-top-fouls-committed" aria-expanded="true"
                                        aria-controls="collapse-top-fouls-committed">
                                        Top Fouls Committed
                                    </div>

                                    <div id="collapse-top-fouls-committed" class="collapse"
                                        aria-labelledby="heading-top-fouls-committed" data-parent="#accordionExample">
                                        <div class="card-body">
                                            @forelse ($players['home']['top_fouls_committed'] as $k=>$v)
                                                <div class="media">
                                                    <img src="{{ $v->player->photo }}" alt="User Image"
                                                        class="mr-3 user-image rounded-circle">
                                                    <div class="media-body">
                                                        <h5 class="mt-0">{{ $v->player->name }}</h5>
                                                        <p>{{ $v->statistics[0]->fouls->committed }}</p>
                                                    </div>
                                                </div>
                                                <hr>
                                            @empty
                                                <h5>No Data</h5>
                                            @endforelse

                                        </div>
                                    </div>
                                </div>

                                <div class="card mt-2">
                                    <div class="player-stats card-header" id="heading-top-cards-yellow" data-toggle="collapse"
                                        data-target="#collapse-top-cards-yellow" aria-expanded="true"
                                        aria-controls="collapse-top-cards-yellow">
                                        Top Cards Yellow
                                    </div>

                                    <div id="collapse-top-cards-yellow" class="collapse"
                                        aria-labelledby="heading-top-cards-yellow" data-parent="#accordionExample">
                                        <div class="card-body">
                                            @forelse ($players['home']['top_cards_yellow'] as $k=>$v)
                                                <div class="media">
                                                    <img src="{{ $v->player->photo }}" alt="User Image"
                                                        class="mr-3 user-image rounded-circle">
                                                    <div class="media-body">
                                                        <h5 class="mt-0">{{ $v->player->name }}</h5>
                                                        <p>{{ $v->statistics[0]->cards->yellow }}</p>
                                                    </div>
                                                </div>
                                                <hr>
                                            @empty
                                                <h5>No Data</h5>
                                            @endforelse

                                        </div>
                                    </div>
                                </div>
                                {{--  --}}
                            </div>
                        </div>
                    </div>
                    {{-- End of Top home --}}

                    {{-- Top away --}}
                    <div class="col-md-6 mb-2">
                        <div class="card align-middle bg-dark text-white">
                            <h5 class="text-left p-2">
                                <img src="{{ $teams->away->logo }}" alt="team-logo" class="img img-fluid"
                                    style="width:30px; height:30px;">
                                {{ $teams->away->name }}
                            </h5>
                        </div>
                        <div class="card">
                            <div class="card-body table-responsive" id="accordionExample2">
                                {{--  --}}
                                <div class="card mt-2">
                                    <div class="player-stats card-header" id="heading-top-goals-total2" data-toggle="collapse"
                                        data-target="#collapse-top-goals-total2" aria-expanded="true"
                                        aria-controls="collapse-top-goals-total2">
                                        Top Goals Total
                                    </div>

                                    <div id="collapse-top-goals-total2" class="collapse"
                                        aria-labelledby="heading-top-goals-total2" data-parent="#accordionExample2">
                                        <div class="card-body">
                                            @forelse ($players['away']['top_goals_total'] as $k=>$v)
                                                <div class="media">
                                                    <img src="{{ $v->player->photo }}" alt="User Image"
                                                        class="mr-3 user-image rounded-circle">
                                                    <div class="media-body">
                                                        <h5 class="mt-0">{{ $v->player->name }}</h5>
                                                        <p>{{ $v->statistics[0]->goals->total }}</p>
                                                    </div>
                                                </div>
                                                <hr>
                                            @empty
                                                <h5>No Data</h5>
                                            @endforelse

                                        </div>
                                    </div>
                                </div>

                                <div class="card mt-2">
                                    <div class="player-stats card-header" id="heading-top-goals-assists2" data-toggle="collapse"
                                        data-target="#collapse-top-goals-assists2" aria-expanded="true"
                                        aria-controls="collapse-top-goals-assists2">
                                        Top Goals Assists
                                    </div>

                                    <div id="collapse-top-goals-assists2" class="collapse"
                                        aria-labelledby="heading-top-goals-assists2" data-parent="#accordionExample2">
                                        <div class="card-body">
                                            @forelse ($players['away']['top_goals_assists'] as $k=>$v)
                                                <div class="media">
                                                    <img src="{{ $v->player->photo }}" alt="User Image"
                                                        class="mr-3 user-image rounded-circle">
                                                    <div class="media-body">
                                                        <h5 class="mt-0">{{ $v->player->name }}</h5>
                                                        <p>{{ $v->statistics[0]->goals->assists }}</p>
                                                    </div>
                                                </div>
                                                <hr>
                                            @empty
                                                <h5>No Data</h5>
                                            @endforelse

                                        </div>
                                    </div>
                                </div>

                                <div class="card mt-2">
                                    <div class="player-stats card-header" id="heading-top-shots-total2" data-toggle="collapse"
                                        data-target="#collapse-top-shots-total2" aria-expanded="true"
                                        aria-controls="collapse-top-shots-total2">
                                        Top Shots Total
                                    </div>

                                    <div id="collapse-top-shots-total2" class="collapse"
                                        aria-labelledby="heading-top-shots-total2" data-parent="#accordionExample2">
                                        <div class="card-body">
                                            @forelse ($players['away']['top_shots_total'] as $k=>$v)
                                                <div class="media">
                                                    <img src="{{ $v->player->photo }}" alt="User Image"
                                                        class="mr-3 user-image rounded-circle">
                                                    <div class="media-body">
                                                        <h5 class="mt-0">{{ $v->player->name }}</h5>
                                                        <p>{{ $v->statistics[0]->shots->total }}</p>
                                                    </div>
                                                </div>
                                                <hr>
                                            @empty
                                                <h5>No Data</h5>
                                            @endforelse

                                        </div>
                                    </div>
                                </div>

                                <div class="card mt-2">
                                    <div class="player-stats card-header" id="heading-top-shots-on2" data-toggle="collapse"
                                        data-target="#collapse-top-shots-on2" aria-expanded="true"
                                        aria-controls="collapse-top-shots-on2">
                                        Top Shots On
                                    </div>

                                    <div id="collapse-top-shots-on2" class="collapse" aria-labelledby="heading-top-shots-on2"
                                        data-parent="#accordionExample2">
                                        <div class="card-body">
                                            @forelse ($players['away']['top_shots_on'] as $k=>$v)
                                                <div class="media">
                                                    <img src="{{ $v->player->photo }}" alt="User Image"
                                                        class="mr-3 user-image rounded-circle">
                                                    <div class="media-body">
                                                        <h5 class="mt-0">{{ $v->player->name }}</h5>
                                                        <p>{{ $v->statistics[0]->shots->on }}</p>
                                                    </div>
                                                </div>
                                                <hr>
                                            @empty
                                                <h5>No Data</h5>
                                            @endforelse

                                        </div>
                                    </div>
                                </div>

                                <div class="card mt-2">
                                    <div class="player-stats card-header" id="heading-top-games-rating2" data-toggle="collapse"
                                        data-target="#collapse-top-games-rating2" aria-expanded="true"
                                        aria-controls="collapse-top-games-rating2">
                                        Top Games Rating
                                    </div>

                                    <div id="collapse-top-games-rating2" class="collapse"
                                        aria-labelledby="heading-top-games-rating2" data-parent="#accordionExample2">
                                        <div class="card-body">
                                            @forelse ($players['away']['top_games_rating'] as $k=>$v)
                                                <div class="media">
                                                    <img src="{{ $v->player->photo }}" alt="User Image"
                                                        class="mr-3 user-image rounded-circle">
                                                    <div class="media-body">
                                                        <h5 class="mt-0">{{ $v->player->name }}</h5>
                                                        <p>{{ $v->statistics[0]->games->rating }}</p>
                                                    </div>
                                                </div>
                                                <hr>
                                            @empty
                                                <h5>No Data</h5>
                                            @endforelse

                                        </div>
                                    </div>
                                </div>

                                <div class="card mt-2">
                                    <div class="player-stats card-header" id="heading-top-passes-key2" data-toggle="collapse"
                                        data-target="#collapse-top-passes-key2" aria-expanded="true"
                                        aria-controls="collapse-top-passes-key2">
                                        Top Passes Key
                                    </div>

                                    <div id="collapse-top-passes-key2" class="collapse" aria-labelledby="heading-top-passes-key2"
                                        data-parent="#accordionExample2">
                                        <div class="card-body">
                                            @forelse ($players['away']['top_passes_key'] as $k=>$v)
                                                <div class="media">
                                                    <img src="{{ $v->player->photo }}" alt="User Image"
                                                        class="mr-3 user-image rounded-circle">
                                                    <div class="media-body">
                                                        <h5 class="mt-0">{{ $v->player->name }}</h5>
                                                        <p>{{ $v->statistics[0]->passes->key }}</p>
                                                    </div>
                                                </div>
                                                <hr>
                                            @empty
                                                <h5>No Data</h5>
                                            @endforelse

                                        </div>
                                    </div>
                                </div>

                                <div class="card mt-2">
                                    <div class="player-stats card-header" id="heading-top-tackles-total2" data-toggle="collapse"
                                        data-target="#collapse-top-tackles-total2" aria-expanded="true"
                                        aria-controls="collapse-top-tackles-total2">
                                        Top Tackles Total
                                    </div>

                                    <div id="collapse-top-tackles-total2" class="collapse"
                                        aria-labelledby="heading-top-tackles-total2" data-parent="#accordionExample2">
                                        <div class="card-body">
                                            @forelse ($players['away']['top_tackles_total'] as $k=>$v)
                                                <div class="media">
                                                    <img src="{{ $v->player->photo }}" alt="User Image"
                                                        class="mr-3 user-image rounded-circle">
                                                    <div class="media-body">
                                                        <h5 class="mt-0">{{ $v->player->name }}</h5>
                                                        <p>{{ $v->statistics[0]->tackles->total }}</p>
                                                    </div>
                                                </div>
                                                <hr>
                                            @empty
                                                <h5>No Data</h5>
                                            @endforelse

                                        </div>
                                    </div>
                                </div>

                                <div class="card mt-2">
                                    <div class="player-stats card-header" id="heading-top-fouls-committed2"
                                        data-toggle="collapse" data-target="#collapse-top-fouls-committed2" aria-expanded="true"
                                        aria-controls="collapse-top-fouls-committed2">
                                        Top Fouls Committed
                                    </div>

                                    <div id="collapse-top-fouls-committed2" class="collapse"
                                        aria-labelledby="heading-top-fouls-committed2" data-parent="#accordionExample2">
                                        <div class="card-body">
                                            @forelse ($players['away']['top_fouls_committed'] as $k=>$v)
                                                <div class="media">
                                                    <img src="{{ $v->player->photo }}" alt="User Image"
                                                        class="mr-3 user-image rounded-circle">
                                                    <div class="media-body">
                                                        <h5 class="mt-0">{{ $v->player->name }}</h5>
                                                        <p>{{ $v->statistics[0]->fouls->committed }}</p>
                                                    </div>
                                                </div>
                                                <hr>
                                            @empty
                                                <h5>No Data</h5>
                                            @endforelse

                                        </div>
                                    </div>
                                </div>

                                <div class="card mt-2">
                                    <div class="player-stats card-header" id="heading-top-cards-yellow2" data-toggle="collapse"
                                        data-target="#collapse-top-cards-yellow2" aria-expanded="true"
                                        aria-controls="collapse-top-cards-yellow2">
                                        Top Cards Yellow
                                    </div>

                                    <div id="collapse-top-cards-yellow2" class="collapse"
                                        aria-labelledby="heading-top-cards-yellow2" data-parent="#accordionExample2">
                                        <div class="card-body">
                                            @forelse ($players['away']['top_cards_yellow'] as $k=>$v)
                                                <div class="media">
                                                    <img src="{{ $v->player->photo }}" alt="User Image"
                                                        class="mr-3 user-image rounded-circle">
                                                    <div class="media-body">
                                                        <h5 class="mt-0">{{ $v->player->name }}</h5>
                                                        <p>{{ $v->statistics[0]->cards->yellow }}</p>
                                                    </div>
                                                </div>
                                                <hr>
                                            @empty
                                                <h5>No Data</h5>
                                            @endforelse

                                        </div>
                                    </div>
                                </div>
                                {{--  --}}
                            </div>
                        </div>
                    </div>
                    {{-- End of top away --}}

                </div>

            </div>

        </div>

        </div>
        </div>

        <script>
            document.title = 'Football-Today | ' + "{{ $teams->home->name }} " + ' vs ' + " {{ $teams->away->name }}";
            retrieveSelected();
            barCharts();
            pieCharts();

            $('.nav-link').on('click', function() {
                localStorage.setItem("tagSelectedFixture", this.id);
                return true;
            });

            function retrieveSelected() {
                var curTag = localStorage.getItem("tagSelectedFixture");

                if (!curTag) {
                    curTag = "pills-match-preview-tab"
                }

                $('#' + curTag).addClass('active');

                var tabContentId = $('#' + curTag).attr('aria-controls')

                $('#' + tabContentId).addClass('active')
                $('#' + tabContentId).addClass('show')
            }

            function barCharts() {
                const labels = ['Goals'];

                var home_score_data = ["{{ $team_statistics['home']->goals->for->total->total }}"];
                var home_conceded_data = ["{{ $team_statistics['home']->goals->against->total->total }}"];
                var h_home_score_data = ["{{ $team_statistics['home']->goals->for->total->home }}"];
                var h_home_conceded_data = ["{{ $team_statistics['home']->goals->against->total->home }}"];
                var away_score_data = ["{{ $team_statistics['away']->goals->for->total->total }}"];
                var away_conceded_data = ["{{ $team_statistics['away']->goals->against->total->total }}"];
                var a_away_score_data = ["{{ $team_statistics['away']->goals->for->total->away }}"];
                var a_away_conceded_data = ["{{ $team_statistics['away']->goals->against->total->away }}"];

                const home_data = {
                    labels: labels,
                    datasets: [{
                            label: "Scored",
                            data: home_score_data,
                            borderColor: '#12e5fa',
                            backgroundColor: '#12e5fa',
                            barPercentage: 0.5,
                            categoryPercentage: 0.6,
                        },
                        {
                            label: 'Conceded',
                            data: home_conceded_data,
                            borderColor: '#dc3545',
                            backgroundColor: '#dc3545',
                            barPercentage: 0.5,
                            categoryPercentage: 0.6,
                        }
                    ]
                };

                const h_home_data = {
                    labels: labels,
                    datasets: [{
                            label: "Scored",
                            data: h_home_score_data,
                            borderColor: '#12e5fa',
                            backgroundColor: '#12e5fa',
                            barPercentage: 0.5,
                            categoryPercentage: 0.6,
                        },
                        {
                            label: 'Conceded',
                            data: h_home_conceded_data,
                            borderColor: '#dc3545',
                            backgroundColor: '#dc3545',
                            barPercentage: 0.5,
                            categoryPercentage: 0.6,
                        }
                    ]
                };

                const away_data = {
                    labels: labels,
                    datasets: [{
                            label: "Scored",
                            data: away_score_data,
                            borderColor: '#12e5fa',
                            backgroundColor: '#12e5fa',
                            barPercentage: 0.5,
                            categoryPercentage: 0.6,
                        },
                        {
                            label: 'Conceded',
                            data: away_conceded_data,
                            borderColor: '#dc3545',
                            backgroundColor: '#dc3545',
                            barPercentage: 0.5,
                            categoryPercentage: 0.6,
                        }
                    ]
                };

                const a_away_data = {
                    labels: labels,
                    datasets: [{
                            label: "Scored",
                            data: a_away_score_data,
                            borderColor: '#12e5fa',
                            backgroundColor: '#12e5fa',
                            barPercentage: 0.5,
                            categoryPercentage: 0.6,
                        },
                        {
                            label: 'Conceded',
                            data: a_away_conceded_data,
                            borderColor: '#dc3545',
                            backgroundColor: '#dc3545',
                            barPercentage: 0.5,
                            categoryPercentage: 0.6,
                        }
                    ]
                };

                const home_config = {
                    type: 'bar',
                    data: home_data,
                    options: {
                        indexAxis: 'y',
                        elements: {
                            bar: {
                                borderWidth: 1,
                            }
                        },
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            title: {
                                display: false
                            }
                        }
                    }
                };

                const h_home_config = {
                    type: 'bar',
                    data: h_home_data,
                    options: {
                        indexAxis: 'y',
                        elements: {
                            bar: {
                                borderWidth: 1,
                            }
                        },
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            title: {
                                display: false
                            }
                        }
                    }
                };

                const away_config = {
                    type: 'bar',
                    data: away_data,
                    options: {
                        indexAxis: 'y',
                        elements: {
                            bar: {
                                borderWidth: 1,
                            }
                        },
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            title: {
                                display: false
                            }
                        }
                    }
                };

                const a_away_config = {
                    type: 'bar',
                    data: a_away_data,
                    options: {
                        indexAxis: 'y',
                        elements: {
                            bar: {
                                borderWidth: 1,
                            }
                        },
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            title: {
                                display: false
                            }
                        }
                    }
                };


                var homeChartDiagram = new Chart(
                    document.getElementById('home_goals_bar'),
                    home_config
                );

                var h_homeChartDiagram = new Chart(
                    document.getElementById('h_home_goals_bar'),
                    h_home_config
                );

                var awayChartDiagram = new Chart(
                    document.getElementById('away_goals_bar'),
                    away_config
                );

                var a_awayChartDiagram = new Chart(
                    document.getElementById('a_away_goals_bar'),
                    a_away_config
                );
            }

            function pieCharts() {
                const labels = ['Wins', 'Draws', 'Loses'];

                var home_res_data = [
                    "{{ $team_statistics['home']->fixtures->wins->home }}",
                    "{{ $team_statistics['home']->fixtures->draws->home }}",
                    "{{ $team_statistics['home']->fixtures->loses->home }}"
                ];
                var away_res_data = [
                    "{{ $team_statistics['away']->fixtures->wins->away }}",
                    "{{ $team_statistics['away']->fixtures->draws->away }}",
                    "{{ $team_statistics['away']->fixtures->loses->away }}"
                ];

                var h_home_res_data = [
                    "{{ $team_statistics['home']->fixtures->wins->total }}",
                    "{{ $team_statistics['home']->fixtures->draws->total }}",
                    "{{ $team_statistics['home']->fixtures->loses->total }}"
                ];
                var a_away_res_data = [
                    "{{ $team_statistics['away']->fixtures->wins->total }}",
                    "{{ $team_statistics['away']->fixtures->draws->total }}",
                    "{{ $team_statistics['away']->fixtures->loses->total }}"
                ];

                var home_clean_sheet_res_data = [
                    "{{ !empty($team_statistics['home']->clean_sheet->home) ? $team_statistics['home']->clean_sheet->home : 0 }}",
                    "{{ !empty($team_statistics['home']->clean_sheet->away) ? $team_statistics['home']->clean_sheet->away : 0 }}",
                    "{{ !empty($team_statistics['home']->clean_sheet->total) ? $team_statistics['home']->clean_sheet->total : 0 }}"
                ];

                var away_clean_sheet_res_data = [
                    "{{ !empty($team_statistics['away']->clean_sheet->home) ? $team_statistics['away']->clean_sheet->home : 0 }}",
                    "{{ !empty($team_statistics['away']->clean_sheet->away) ? $team_statistics['away']->clean_sheet->away : 0 }}",
                    "{{ !empty($team_statistics['away']->clean_sheet->total) ? $team_statistics['away']->clean_sheet->total : 0 }}"
                ];

                var home_failed_to_score_res_data = [
                    "{{ !empty($team_statistics['home']->failed_to_score->home) ? $team_statistics['home']->failed_to_score->home : 0 }}",
                    "{{ !empty($team_statistics['home']->failed_to_score->away) ? $team_statistics['home']->failed_to_score->away : 0 }}",
                    "{{ !empty($team_statistics['home']->failed_to_score->total) ? $team_statistics['home']->failed_to_score->total : 0 }}"
                ];

                var away_failed_to_score_res_data = [
                    "{{ !empty($team_statistics['away']->failed_to_score->home) ? $team_statistics['away']->failed_to_score->home : 0 }}",
                    "{{ !empty($team_statistics['away']->failed_to_score->away) ? $team_statistics['away']->failed_to_score->away : 0 }}",
                    "{{ !empty($team_statistics['away']->failed_to_score->total) ? $team_statistics['away']->failed_to_score->total : 0 }}"
                ];

                const home_data = {
                    labels: labels,
                    datasets: [{
                        label: "Results",
                        data: home_res_data,
                        backgroundColor: ['#12e5fa', '#d4d9de', '#dc3545'],
                        hoverOffset: 4
                    }]
                };

                const away_data = {
                    labels: labels,
                    datasets: [{
                        label: "Results",
                        data: away_res_data,
                        backgroundColor: ['#12e5fa', '#d4d9de', '#dc3545'],
                        hoverOffset: 4
                    }]
                };

                const h_home_data = {
                    labels: labels,
                    datasets: [{
                        label: "Results",
                        data: h_home_res_data,
                        backgroundColor: ['#12e5fa', '#d4d9de', '#dc3545'],
                        hoverOffset: 4
                    }]
                };


                const a_away_data = {
                    labels: labels,
                    datasets: [{
                        label: "Results",
                        data: a_away_res_data,
                        backgroundColor: ['#12e5fa', '#d4d9de', '#dc3545'],
                        hoverOffset: 4
                    }]
                };

                const home_clean_sheet_data = {
                    labels: ['home', 'away', 'total'],
                    datasets: [{
                        label: "Results",
                        data: home_clean_sheet_res_data,
                        backgroundColor: ['#12e5fa', '#d4d9de', '#dc3545'],
                        hoverOffset: 4
                    }]
                };

                const away_clean_sheet_data = {
                    labels: ['home', 'away', 'total'],
                    datasets: [{
                        label: "Results",
                        data: away_clean_sheet_res_data,
                        backgroundColor: ['#12e5fa', '#d4d9de', '#dc3545'],
                        hoverOffset: 4
                    }]
                };

                const home_failed_to_score_data = {
                    labels: ['home', 'away', 'total'],
                    datasets: [{
                        label: "Results",
                        data: home_failed_to_score_res_data,
                        backgroundColor: ['#12e5fa', '#d4d9de', '#dc3545'],
                        hoverOffset: 4
                    }]
                };

                const away_failed_to_score_data = {
                    labels: ['home', 'away', 'total'],
                    datasets: [{
                        label: "Results",
                        data: away_failed_to_score_res_data,
                        backgroundColor: ['#12e5fa', '#d4d9de', '#dc3545'],
                        hoverOffset: 4
                    }]
                };

                const home_config = {
                    type: 'doughnut',
                    data: home_data,
                    options: {
                        aspectRatio: 2,
                    }
                };

                const away_config = {
                    type: 'doughnut',
                    data: away_data,
                    options: {
                        aspectRatio: 2,
                    }
                };

                const h_home_config = {
                    type: 'doughnut',
                    data: h_home_data,
                    options: {
                        aspectRatio: 2,
                    }
                };

                const a_away_config = {
                    type: 'doughnut',
                    data: a_away_data,
                    options: {
                        aspectRatio: 2,
                    }
                };

                const home_clean_sheet_config = {
                    type: 'doughnut',
                    data: home_clean_sheet_data,
                    options: {
                        aspectRatio: 2,
                    }
                };

                const away_clean_sheet_config = {
                    type: 'doughnut',
                    data: away_clean_sheet_data,
                    options: {
                        aspectRatio: 2,
                    }
                };

                const home_failed_to_score_config = {
                    type: 'doughnut',
                    data: home_failed_to_score_data,
                    options: {
                        aspectRatio: 2,
                    }
                };

                const away_failed_to_score_config = {
                    type: 'doughnut',
                    data: away_failed_to_score_data,
                    options: {
                        aspectRatio: 2,
                    }
                };


                var homeChartDiagram = new Chart(
                    document.getElementById('home_res_pie'),
                    home_config
                );

                var awayChartDiagram = new Chart(
                    document.getElementById('away_res_pie'),
                    away_config
                );

                var h_homeChartDiagram = new Chart(
                    document.getElementById('h_home_res_pie'),
                    h_home_config
                );

                var a_awayChartDiagram = new Chart(
                    document.getElementById('a_away_res_pie'),
                    a_away_config
                );

                var home_clean_sheetChartDiagram = new Chart(
                    document.getElementById('home_clean_sheet_pie'),
                    home_clean_sheet_config
                );

                var away_clean_sheetChartDiagram = new Chart(
                    document.getElementById('away_clean_sheet_pie'),
                    away_clean_sheet_config
                );

                var home_failed_to_scoreChartDiagram = new Chart(
                    document.getElementById('home_failed_to_score_pie'),
                    home_failed_to_score_config
                );

                var away_failed_to_scoreChartDiagram = new Chart(
                    document.getElementById('away_failed_to_score_pie'),
                    away_failed_to_score_config
                );

            }

            $(document).on("click", ".team-link", function(e) {
                e.preventDefault();
                var url = $(this).attr("href");
                $.ajax({
                    url: url,
                    type: "get",
                    success: function(response) {
                        // alert(response)
                        $("#screen-modal-body").html(response);
                        $("#screenModal").modal("show");
                    }
                });
            })
        </script>
