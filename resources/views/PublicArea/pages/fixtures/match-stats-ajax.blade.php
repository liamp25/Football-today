<p class="display-4 text-center">Events endpoint</p>

        <div class="evnt_endpoint">

            <div class="table-responsive">

            <table class="table table-bordered">
                <tbody>
                    @if (!empty($events))

                    @php
                    $home_goals = 0;
                    $away_goals = 0;
                    @endphp

                    @foreach ($events as $event)
                    @php
                    if (in_array($event->detail, ['Normal Goal', 'Own Goal', 'Penalty'])) {
                    if($event->team->id == $teams->home->id){
                    $home_goals++;
                    } else {
                    $away_goals++;
                    }
                    }
                    @endphp

                    @switch($event->type)

                    @case("Goal")
                    @if ($event->detail != "Missed Penalty")
                    <tr>
                        @if ($event->team->id == $teams->home->id)
                        <td class="text-left">
                            <span style="display: inline-block">
                                <i class="far fa-futbol text-success"></i>&nbsp;
                                <span
                                    class="text-xs
                        text-muted">{{$event->time->elapsed}}'</span>&nbsp;<strong>{{$home_goals}}-{{$away_goals}}</strong>&nbsp;{{$event->player->name}}&nbsp;
                                <small class="text-xs text-muted">
                                    @if ($event->assist->name)
                                    Assit: {{$event->assist->name}}
                                    @endif
                                </small>
                            </span>
                        </td>
                        @else
                        <td class="text-right">
                            <span style="display: inline-block">
                                <small class="text-xs text-muted">
                                    @if ($event->assist->name)
                                    Assit: {{$event->assist->name}}
                                    @endif
                                </small>&nbsp;{{$event->player->name}}&nbsp;
                                <strong>{{$home_goals}}-{{$away_goals}}</strong>&nbsp;
                                <span class="text-xs text-muted">{{$event->time->elapsed}}'</span>&nbsp;
                                <i class="far fa-futbol text-success"></i>
                            </span>
                        </td>
                        @endif
                    </tr>
                    @endif
                    @break

                    @case("Card")
                    <tr>
                        {{-- inside switch --}}
                        @switch($event->detail)
                        @case("Yellow Card")
                        @if ($event->team->id == $teams->home->id)
                        <td class="text-left">
                            <span style="display: inline-block">
                                <svg width="13" height="18">
                                    <rect width="300" height="100" style="fill:#ffc107" />
                                </svg>&nbsp;
                                <span class="text-xs text-muted">{{$event->time->elapsed}}'</span>&nbsp;
                                {{$event->player->name}}
                            </span>
                        </td>
                        @else
                        <td class="text-right">
                            <span style="display: inline-block">
                                {{$event->player->name}}&nbsp;
                                <span class="text-xs text-muted">{{$event->time->elapsed}}'</span>&nbsp;
                                <svg width="13" height="18">
                                    <rect width="300" height="100" style="fill:#ffc107" />
                                </svg>
                            </span>
                        </td>
                        @endif
                        @break
                        @case("Red card")
                        @if ($event->team->id == $teams->home->id)
                        <td class="text-left">
                            <span style="display: inline-block">
                                <svg width="13" height="18">
                                    <rect width="300" height="100" style="fill:#dc3545" />
                                </svg>&nbsp;
                                <span class="text-xs text-muted">{{$event->time->elapsed}}'</span>&nbsp;
                                {{$event->player->name}}
                            </span>
                        </td>
                        @else
                        <td class="text-right">
                            <span style="display: inline-block">
                                {{$event->player->name}}&nbsp;
                                <span class="text-xs text-muted">{{$event->time->elapsed}}'</span>&nbsp;
                                <svg width="13" height="18">
                                    <rect width="300" height="100" style="fill:#dc3545" />
                                </svg>
                            </span>
                        </td>
                        @endif
                        @break
                        @case("Second Yellow card")
                        @if ($event->team->id == $teams->home->id)
                        <td class="text-left">
                            <span style="display: inline-block">
                                <svg width="16" height="16" viewBox="180 180 680 680" fill="#404040"
                                    style="min-width: 16px; display: inline-block;">
                                    <title>2nd Yellow card (Red)</title>
                                    <path fill="#ecaa02" d="M243.2 275.2h428.8v588.8h-428.8v-588.8z">
                                    </path>
                                    <path fill="#a72018" d="M352 160h428.8v588.8h-428.8v-588.8z"></path>
                                </svg>&nbsp;
                                <span class="text-xs text-muted">{{$event->time->elapsed}}'</span>&nbsp;
                                {{$event->player->name}}
                            </span>
                        </td>
                        @else
                        <td class="text-right">
                            <span style="display: inline-block">
                                {{$event->player->name}}&nbsp;
                                <span class="text-xs text-muted">{{$event->time->elapsed}}'</span>&nbsp;
                                <svg width="16" height="16" viewBox="180 180 680 680" fill="#404040"
                                    style="min-width: 16px; display: inline-block;">
                                    <title>2nd Yellow card (Red)</title>
                                    <path fill="#ecaa02" d="M243.2 275.2h428.8v588.8h-428.8v-588.8z">
                                    </path>
                                    <path fill="#a72018" d="M352 160h428.8v588.8h-428.8v-588.8z"></path>
                                </svg>
                            </span>
                        </td>
                        @endif
                        @break
                        @default
                        @endswitch
                        {{-- end inside switch --}}
                    </tr>
                    @break

                    @case("subst")
                    <tr>
                        @if ($event->team->id == $teams->home->id)
                        <td class="text-left">
                            <span style="display: inline-block">
                                <i class="fas fa-exchange-alt text-newinfo"></i>&nbsp;
                                <span
                                    class="text-xs text-muted">{{$event->time->elapsed}}'</span>&nbsp;{{$event->player->name}}&nbsp;
                                <small class="text-xs text-muted">Out: {{$event->assist->name}}</small>
                            </span>
                        </td>
                        @else
                        <td class="text-right">
                            <span style="display: inline-block">
                                <small class="text-xs text-muted">Out:
                                    {{$event->assist->name}}</small>&nbsp;{{$event->player->name}}&nbsp;
                                <span class="text-xs text-muted">{{$event->time->elapsed}}'</span>&nbsp;
                                <i class="fas fa-exchange-alt text-newinfo"></i>
                            </span>
                        </td>
                        @endif
                    </tr>
                    @break

                    @default
                    @endswitch

                    @endforeach

                    @else
                    <tr>
                        <td class="text-center" colspan="2">
                            No data available
                        </td>
                    </tr>
                    @endif

                </tbody>
            </table>

            </div>


            <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <th>
                        {{$teams->home->name}}
                    </th>
                    <th></th>
                    <th>
                        {{$teams->away->name}}
                    </th>
                </thead>
                <tbody>
                    @if (!empty($match_statistics))
                    <tr>
                        <td class="text-center">
                            <span class="badge badge-newinfo">
                                {{$match_statistics[0]->statistics[9]->value ? $match_statistics[0]->statistics[9]->value : '0%'}}
                            </span>
                        </td>
                        <td class="text-center">Posession</td>
                        <td class="text-center">
                            <span class="badge badge-danger">
                                {{$match_statistics[1]->statistics[9]->value ? $match_statistics[1]->statistics[9]->value : '0%'}}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <span class="badge badge-newinfo">
                                {{$match_statistics[0]->statistics[13]->value ? $match_statistics[0]->statistics[13]->value : '0'}}
                            </span>
                        </td>
                        <td class="text-center">Total passes</td>
                        <td class="text-center">
                            <span class="badge badge-danger">
                                {{$match_statistics[1]->statistics[13]->value ? $match_statistics[1]->statistics[13]->value : '0'}}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <span class="badge badge-newinfo">
                                {{$match_statistics[0]->statistics[2]->value ? $match_statistics[0]->statistics[2]->value : '0'}}
                            </span>
                        </td>
                        <td class="text-center">Total shots</td>
                        <td class="text-center">
                            <span class="badge badge-danger">
                                {{$match_statistics[1]->statistics[2]->value ? $match_statistics[1]->statistics[2]->value : '0'}}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <span class="badge badge-newinfo">
                                {{$match_statistics[0]->statistics[0]->value ? $match_statistics[0]->statistics[0]->value : '0'}}
                            </span>
                        </td>
                        <td class="text-center">Shots on target</td>
                        <td class="text-center">
                            <span class="badge badge-danger">
                                {{$match_statistics[1]->statistics[0]->value ? $match_statistics[1]->statistics[0]->value : '0'}}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <span class="badge badge-newinfo">
                                {{$match_statistics[0]->statistics[1]->value ? $match_statistics[0]->statistics[1]->value : '0'}}
                            </span>
                        </td>
                        <td class="text-center">Shots off target</td>
                        <td class="text-center">
                            <span class="badge badge-danger">
                                {{$match_statistics[1]->statistics[1]->value ? $match_statistics[1]->statistics[1]->value : '0'}}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <span class="badge badge-newinfo">
                                {{$match_statistics[0]->statistics[7]->value ? $match_statistics[0]->statistics[7]->value : '0'}}
                            </span>
                        </td>
                        <td class="text-center">Corner kicks</td>
                        <td class="text-center">
                            <span class="badge badge-danger">
                                {{$match_statistics[1]->statistics[7]->value ? $match_statistics[1]->statistics[7]->value : '0'}}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <span class="badge badge-newinfo">
                                {{$match_statistics[0]->statistics[8]->value ? $match_statistics[0]->statistics[8]->value : '0'}}
                            </span>
                        </td>
                        <td class="text-center">Offsides</td>
                        <td class="text-center">
                            <span class="badge badge-danger">
                                {{$match_statistics[1]->statistics[8]->value ? $match_statistics[1]->statistics[8]->value :'0'}}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <span class="badge badge-newinfo">
                                {{$match_statistics[0]->statistics[6]->value ? $match_statistics[0]->statistics[6]->value : '0'}}
                            </span>
                        </td>
                        <td class="text-center">Fouls</td>
                        <td class="text-center">
                            <span class="badge badge-danger">
                                {{$match_statistics[1]->statistics[6]->value ? $match_statistics[1]->statistics[6]->value : '0'}}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <span class="badge badge-newinfo">
                                {{$match_statistics[0]->statistics[10]->value ? $match_statistics[0]->statistics[10]->value : '0'}}
                            </span>
                        </td>
                        <td class="text-center">Yellow cards</td>
                        <td class="text-center">
                            <span class="badge badge-danger">
                                {{$match_statistics[1]->statistics[10]->value ? $match_statistics[1]->statistics[10]->value : '0'}}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <span class="badge badge-newinfo">
                                {{$match_statistics[0]->statistics[11]->value ? $match_statistics[0]->statistics[11]->value : '0'}}
                            </span>
                        </td>
                        <td class="text-center">Red cards</td>
                        <td class="text-center">
                            <span class="badge badge-danger">
                                {{$match_statistics[1]->statistics[11]->value ? $match_statistics[1]->statistics[11]->value : '0'}}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <span class="badge badge-newinfo">
                                {{$match_statistics[0]->statistics[12]->value ? $match_statistics[0]->statistics[12]->value : '0'}}
                            </span>
                        </td>
                        <td class="text-center">Goalkeeper saves</td>
                        <td class="text-center">
                            <span class="badge badge-danger">
                                {{$match_statistics[1]->statistics[12]->value ? $match_statistics[1]->statistics[12]->value : '0'}}
                            </span>
                        </td>
                    </tr>
                    @else
                    <tr>
                        <td class="text-center" colspan="3">
                            No data available
                        </td>
                    </tr>
                    @endif

                </tbody>
            </table>

            </div>


        </div>