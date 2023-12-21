@foreach ($leagues as $key => $league)
<div class="match_list container">
    <p class="match__title"> {{$fixtures[$key][0]->league->country}} - {{$fixtures[$key][0]->league->name}}</p>

    @foreach ($fixtures[$key] as $fixture)
    <div class="card mb-2">
       <div class="card-header p-0" id="heading{{$key}}">
          <h5 class="mb-0">
             <button class="btn btn__match_list" data-toggle="collapse" data-target="#collapse{{$key}}"
             aria-expanded="true" aria-controls="collapse{{$key}}">
                <div class="">
                    {{$fixture->teams->home->name}} vs  {{$fixture->teams->away->name}}
                   <div class="schedule match_live">LIVE</div>
                </div>
             </button>
          </h5>
       </div>
       <div id="collapse{{$key}}" class="collapse" aria-labelledby="heading{{$key}}">
          <div class="card-body px-0">
             <!-- Team logos start -->
             <div class="team__vs_t">
                <div class="team1">
                   <img src="/images/team1.png" alt="team_logo" />
                </div>
                <div class="team_score">
                   <div class="scr_highlight">
                      <span>1</span>-<span>0</span>
                   </div>
                </div>
                <div class="team2">
                   <img src="/images/team2.png" alt="team_logo" />
                </div>
             </div>
             <!-- Team logos End -->

             <!-- Submenu button start -->
             <div class="sub_view_btn">
                <div class="container">
                   <nav>
                      <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                         <a class="nav-item nav-link active" id="nav-overview-tab" data-toggle="tab" href="#nav-overview" role="tab" aria-controls="nav-overview" aria-selected="true">overview</a>
                         <a class="nav-item nav-link" id="nav-match-tab" data-toggle="tab" href="#nav-match" role="tab" aria-controls="nav-match" aria-selected="false">match Center</a>
                         <a class="nav-item nav-link" id="nav-lineups-tab" data-toggle="tab" href="#nav-lineups" role="tab" aria-controls="nav-lineups" aria-selected="false">lineups</a>
                      </div>
                   </nav>
                   <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">

                      <!-- overview tab content -->
                      <div class="tab-pane fade show active" id="nav-overview" role="tabpanel" aria-labelledby="nav-overview-tab">
                         Graph

                      </div>

                      <!-- match stats tab content -->
                      <div class="tab-pane fade" id="nav-match" role="tabpanel" aria-labelledby="nav-match-tab">
                         <p class="display-4 text-center">Events endpoint</p>

                         <div class="evnt_endpoint">

                            <div class="table-responsive">
                               <table class="table table-bordered">
                                  <tbody>
                                     <tr>
                                        <td>10’ Goal 1-0 watkins</td>
                                        <td>16 Goal 1-1 Brown</td>
                                     </tr>
                                     <tr>
                                        <td>87’ yellow card kamara </td>
                                        <td>90’ yellow card Lewis</td>
                                     </tr>

                                  </tbody>
                               </table>

                            </div>


                            <div class="table-responsive">
                               <table class="table table-bordered">
                                  <tbody>
                                     <tr>
                                        <td>60</td>
                                        <td>possession</td>
                                        <td>40</td>
                                     </tr>
                                     <tr>
                                        <td>500</td>
                                        <td>Passes</td>
                                        <td>336</td>
                                     </tr>
                                     <tr>
                                        <td>10</td>
                                        <td>shots</td>
                                        <td>8</td>
                                     </tr>
                                     <tr>
                                        <td>5</td>
                                        <td>shots on target</td>
                                        <td>4</td>
                                     </tr>
                                     <tr>
                                        <td>5</td>
                                        <td>shots off target</td>
                                        <td>4</td>
                                     </tr>
                                     <tr>
                                        <td>5</td>
                                        <td>corners</td>
                                        <td>4</td>
                                     </tr>
                                     <tr>
                                        <td>6</td>
                                        <td>offside</td>
                                        <td>6</td>
                                     </tr>
                                     <tr>
                                        <td>8</td>
                                        <td>fouls</td>
                                        <td>6</td>
                                     </tr>

                                  </tbody>
                               </table>

                            </div>


                         </div>
                      </div>

                      <!-- lineups tab content -->
                      <div class="tab-pane fade" id="nav-lineups" role="tabpanel" aria-labelledby="nav-lineups-tab">

                         <div class="table-responsive">
                            <table class="table table-bordered">
                               <thead>
                                  <tr>
                                     <td><b>Team A</b></td>
                                     <td><b>Team B</b></td>
                                  </tr>
                               </thead>
                               <tbody>
                                  <tr>
                                     <td>Gk</td>
                                     <td>Gk</td>
                                  </tr>
                                  <tr>
                                     <td>rb</td>
                                     <td>rb</td>
                                  </tr>
                                  <tr>
                                     <td>cb</td>
                                     <td>cb</td>
                                  </tr>
                                  <tr>
                                     <td>lb</td>
                                     <td>lb</td>
                                  </tr>


                               </tbody>
                            </table>

                         </div>

                      </div>

                   </div>

                </div>
             </div>

             <!-- Submenu button end -->


             <!-- win probiblity start-->
             <p class="Progress_title text-center">Win probability </p>
             <div class="px-5">
                <div class="progress ">
                   <div class="progress-bar bg-success" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"><span class="progress-bar-text">70%</span></div>
                   <div class="progress-bar bg-danger" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"><span class="progress-bar-text">30%</span></div>
                </div>
             </div>
             <!-- win probiblity End -->



          </div>
          <div class="match__list_footer">
             <a href="#" type="button" data-toggle="collapse" data-target="#match_preivew"> Match preview ❯ </a>
          </div>

          <div class="collapse" id="match_preivew">

             <div class="sub_view_btn">
                <div class="container">
                   <nav>
                      <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                         <a class="nav-item nav-link active" id="nav-summary-tab" data-toggle="tab" href="#nav-summary" role="tab" aria-controls="nav-summary" aria-selected="true">summary</a>
                         <a class="nav-item nav-link" id="nav-stats-tab" data-toggle="tab" href="#nav-stats" role="tab" aria-controls="nav-stats" aria-selected="false">Team stats</a>
                         <a class="nav-item nav-link" id="nav-Player-tab" data-toggle="tab" href="#nav-Player" role="tab" aria-controls="nav-Player" aria-selected="false">Player stats</a>
                      </div>
                   </nav>
                   <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">

                      <!-- summary tab content -->
                      <div class="tab-pane fade show active" id="nav-summary" role="tabpanel" aria-labelledby="nav-summary-tab">

                         <div class="table-responsive">
                            <table class="table table-bordered">
                               <thead>
                                  <tr>
                                     <td><b>Team A</b></td>
                                     <td><b>Team B</b></td>
                                  </tr>
                               </thead>
                               <tbody>
                                  <tr>
                                     <td>team a 1-0 team c</td>
                                     <td>Team B 2-0 Team E</td>
                                  </tr>
                                  <tr>
                                     <td>Team D 2-2 Team A </td>
                                     <td>Team F 4-2 Team B</td>
                                  </tr>

                               </tbody>
                            </table>
                         </div>

                         <p class="display-4 text-center mt-2">Head 2 Head</p>

                         <div class="table-responsive">
                            <table class="table table-bordered">
                               <thead>
                                  <tr>
                                     <td class="text-left"><b>Team A</b></td>
                                     <td class="text-center"><b>2-2</b></td>
                                     <td class="text-right"><b>Team B</b></td>
                                  </tr>
                               </thead>

                            </table>
                         </div>

                         <p class="display-4 text-center mt-2">injuires</p>

                         <div class="table-responsive">
                            <table class="table table-bordered">
                               <thead>
                                  <tr>
                                     <td><b>Team A</b></td>
                                     <td><b>Team B</b></td>
                                  </tr>
                               </thead>
                               <tbody>
                                  <tr>
                                     <td>H. Lozano</td>
                                     <td>G. Martinelli</td>
                                  </tr>
                                  <tr>
                                     <td>J. Teze</td>
                                     <td></td>
                                  </tr>

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


                      </div>

                      <!-- Team stats tab content -->
                      <div class="tab-pane fade" id="nav-stats" role="tabpanel" aria-labelledby="nav-stats-tab">

                         Team stats

                      </div>

                      <!-- Player tab content -->
                      <div class="tab-pane fade" id="nav-Player" role="tabpanel" aria-labelledby="nav-Player-tab">

                         Player Tab

                      </div>

                   </div>

                </div>
             </div>

          </div>

       </div>
    </div>
    @endforeach

 </div>
@endforeach
