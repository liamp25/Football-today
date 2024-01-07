
@foreach ($leagues as $key => $league)

<div class="match_list container">
    <p class="match__title"> {{$fixtures[$key][0]->league->country}} - {{$fixtures[$key][0]->league->name}}</p>

    <div class="matchloop">
        @foreach ($fixtures[$key] as $fixture)
            <div class="card mb-2">
                <div class="card-header p-0" id="heading{{$fixture->fixture->id}}">
                    <h5 class="mb-0">
                        <button class="btn btn__match_list matchbtn" data-id="{{ $fixture->fixture->id }}" data-toggle="collapse" data-target="#collapse{{$fixture->fixture->id}}"
                        aria-expanded="true" aria-controls="collapse{{$fixture->fixture->id}}">
                            <div class="">
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
                                        <div class="match-card match-current-minute">{{$fixture->fixture->status->elapsed}}'</div>
                                    </td>
                                    @break
                                    @case("2H")
                                    <td class="minute visible">
                                        <div class="match-card match-current-minute">{{$fixture->fixture->status->elapsed}}'</div>
                                    </td>
                                    @break
                                    @case("ET")
                                    <td class="minute visible">
                                        <div class="match-card match-current-minute">{{$fixture->fixture->status->elapsed}}'</div>
                                    </td>
                                    @break
                                    @case("HT")
                                    <td class="minute visible">
                                        <div class="match-card match-current-minute">{{$fixture->fixture->status->short}}</div>
                                    </td>
                                    @break
                                    @default
                                    <td class="minute visible-2">
                                        <div class="match-card match-current-minute">{{$fixture->fixture->status->short}}</div>
                                    </td>
                                    @endswitch

                                <div class="d-flex align-items-center">
                                    <span>
                                        <img width="20" class="mr-1" src="{{$fixture->teams->home->logo}}" alt="">{{$fixture->teams->home->name}}
                                    </span>
                                    <span class="mx-2">vs</span>
                                    <span>
                                        <img width="20" class="mr-1" src="{{$fixture->teams->away->logo}}" alt="">{{$fixture->teams->away->name}}
                                    </span>
                                </div>
                                @switch($fixture->fixture->status->short)
                                @case("CANC")
                                <div class="schedule match_live">{{$fixture->fixture->status->short}}</div>
                                @break
                                @case("PST")
                                <div class="schedule match_live">{{$fixture->fixture->status->short}}</div>
                                @break
                                @case("TBD")
                                <div class="schedule match_live">{{$fixture->fixture->status->short}}</div>
                                @break
                                @case("NS")
                                <div class="schedule match_live">{{\carbon\carbon::parse($fixture->fixture->timestamp)->setTimezone($timezone)->format('H:i')}}</div>
                                @break
                                @default
                                <div class="schedule match_live">{{$fixture->goals->home}} - {{$fixture->goals->away}}</div>
                                @endswitch

                            </div>
                        </button>
                    </h5>
                </div>

                <div id="collapse{{$fixture->fixture->id}}" class="collapse" aria-labelledby="heading{{$fixture->fixture->id}}">
                    <div class="text-center my-3" id="fixture-spinner">
                        <div class="spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                   
                </div>
            </div>
        @endforeach
    </div>

 </div>
@endforeach
