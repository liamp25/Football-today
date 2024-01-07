<div class="card-body px-0">
        <!-- Team logos start -->
        <div class="team__vs_t">
            <div class="team1">
            <img src="{{$teams->home->logo}}" alt="team_logo" />
            </div>
            <div class="team_score">
            <div class="scr_highlight">
                @switch($fixture->status->short)
                @case("CANC")
                    <span>{{$fixture->status->short}}</span>
                @break
                @case("PST")
                    <span>{{$fixture->status->short}}</span>
                @break
                @case("TBD")
                    <span>{{$fixture->status->short}}</span>
                @break
                @case("NS")
                    <span>{{\carbon\carbon::parse($fixture->timestamp)->setTimezone($timezone)->format('H:i')}}</span>
                @break
                @default
                    <span>{{$goals->home}}</span>-<span>{{$goals->away}}</span>
                @endswitch

            </div>
            </div>
            <div class="team2">
            <img src="{{$teams->away->logo}}" alt="team_logo" />
            </div>
        </div>
        <!-- Team logos End -->

        <!-- Submenu button start -->
        <div class="sub_view_btn">
            <div class="container">
            <nav>
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-overview-tab" data-toggle="tab" href="#nav-overview{{$fixture->id}}" role="tab" aria-controls="nav-overview" aria-selected="true">overview</a>
                    <a class="nav-item nav-link" id="nav-stats-tab{{ $fixture->id }}" data-id="{{ $fixture->id }}" data-toggle="tab" href="#nav-stats{{$fixture->id}}" role="tab" aria-controls="team-stats" aria-selected="true">Team Stats</a>
                    <a class="nav-item nav-link" id="nav-match-tab" data-toggle="tab" href="#nav-match{{$fixture->id}}" role="tab" aria-controls="nav-match" aria-selected="false">match Center</a>
                    <a class="nav-item nav-link" id="nav-lineups-tab" data-toggle="tab" href="#nav-lineups{{$fixture->id}}" role="tab" aria-controls="nav-lineups" aria-selected="false">lineups</a>
                </div>
            </nav>
            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">

                <!-- overview tab content -->
                <div class="tab-pane fade show active" id="nav-overview{{$fixture->id}}" role="tabpanel" aria-labelledby="nav-overview-tab">
                    Overview

                </div>

                <!-- nav stats tab content -->
                <div class="tab-pane fade show" id="nav-stats{{$fixture->id}}" role="tabpanel" aria-labelledby="nav-stats-tab">
                    <div class="text-center my-3" id="fixture-spinner">
                        <div class="spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>

                </div>

                <!-- match stats tab content -->
                <div class="tab-pane fade" id="nav-match{{$fixture->id}}" role="tabpanel" aria-labelledby="nav-match-tab">
                    <div class="text-center my-3" id="fixture-spinner">
                        <div class="spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                    
                </div>

                <!-- lineups tab content -->
                <div class="tab-pane fade" id="nav-lineups{{$fixture->id}}" role="tabpanel" aria-labelledby="nav-lineups-tab">
                    <div class="text-center my-3" id="fixture-spinner">
                        <div class="spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                   

                </div>

            </div>

            </div>
        </div>

        <!-- Submenu button end -->





    </div>
    <div class="match__list_footer">
        <a href="#" class="match-preview-btn" data-id="{{ $fixture->id }}" type="button" data-toggle="collapse" data-target="#match_preivew{{ $fixture->id }}"> Match preview ❯ </a>
    </div>

    <div class="collapse" id="match_preivew{{ $fixture->id }}">
        <div class="text-center my-3" id="match-spinner">
            <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>


<script>
    $(document).ready(function(){

        $(document).on("click", "#nav-stats-tab{{ $fixture->id }}", function(){

            const id = $(this).data('id');
            $.ajax({
                url: "/fixture/team-stats/ajax/{{ $league->id }}?season={{$league->season}}&home_id={{ $teams->home->id }}&away_id={{ $teams->away->id }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'GET',
                dataType: 'html',
                success: function (response) {
                    // console.log(response);
                    $('#nav-stats'+id).html(response);
                  
                }
            });
            
        });
    });    
</script>