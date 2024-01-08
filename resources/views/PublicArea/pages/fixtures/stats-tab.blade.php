<div class="row table-row m-0">
    <div class="col-md-12 bg-12 py-2 px-0">
        <div class="row m-0">
            <div class="col-md-6 col-left-x text-left">
                <h2><img class="team-logo-h2h" src="{{ $teams->home->logo }}" alt="home" style="width:50px;height:50px"> {{ $teams->home->name }}  overall stats </h2>
            </div>
            <div class="col-md-6 col-right-x text-right">
                <h2><img class="team-logo-h2h" src="{{ $teams->away->logo }}" alt="home" style="width:50px;height:50px"> {{ $teams->away->name }} overall stats </h2>
            </div>
            </div>
    </div>
    {{--  <div class="col-md-12 text-center py-2">
        <h2>Played: <span class="font-number">10</span></h2>
    </div>
    <div class="col-md-12 text-center p-0 bg-12">
        <div class="row m-0">
            <div class="col-md-4 text-center bg-gre py-2">
                <h2>Wins<br><span class="font-number">8</span></h2>
            </div>
            <div class="col-md-4 text-center py-2">
                <h2>Draws<br><span class="font-number">1</span></h2>
            </div>
            <div class="col-md-4 text-center py-2">
                <h2>Wins<br><span class="font-number">1</span></h2>
            </div>
        </div>
    </div>  --}} 



    <div class="col-md-12 p-0 table-12">
        <table class="table table-striped table-hover">
            <thead class="bg-12">
                <tr>
                    <th>Total</th>
                    <th>Per Match</th>
                    <th></th>
                    <th>Per Macth</th>
                    <th>Total</th>
                    
                </tr>
            </thead>
            
            <tbody>
                

                <tr>
                    <td>{{ $team_statistics['home']->fixtures->played->total }}</td>
                    <td>-</td>
                    <td>Total Match</td>
                    <td>{{ $team_statistics['away']->fixtures->played->total }}</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td>{{ $team_statistics['home']->fixtures->wins->total }}</td>
                    <td>-</td>
                    <td>Total Win</td>
                    <td>{{ $team_statistics['away']->fixtures->wins->total }}</td>
                    <td>-</td>
                </tr>

                <tr>
                    <td>{{ $team_statistics['home']->fixtures->loses->total }}</td>
                    <td>-</td>
                    <td>Total lost</td>
                    <td>{{ $team_statistics['away']->fixtures->loses->total }}</td>
                    <td>-</td>
                </tr>

                <tr>
                    <td>{{ $team_statistics['home']->fixtures->draws->total }}</td>
                    <td>-</td>
                    <td>Total draw</td>
                    <td>{{ $team_statistics['away']->fixtures->draws->total }}</td>
                    <td>-</td>
                </tr>

                <tr>
                    <td>{{ $team_statistics['home']->goals->for->total->total }}</td>
                    <td>{{ $team_statistics['home']->goals->for->average->total }}</td>
                    <td>Goals</td>
                    <td>{{ $team_statistics['away']->goals->for->average->total }}</td>
                    <td>{{ $team_statistics['away']->goals->for->total->total }}</td>
                </tr>

                
                <tr>
                    <td>{{ $team_statistics['home']->goals->against->total->total }}</td>
                    <td>{{ $team_statistics['home']->goals->against->average->total }}</td>
                    <td>Goals Conceded</td>
                    <td>{{ $team_statistics['away']->goals->against->average->total }}</td>
                    <td>{{ $team_statistics['away']->goals->against->total->total }}</td>
                </tr>
                
                <tr>
                    <td>{{ !empty($team_statistics['home']->clean_sheet->home) ? $team_statistics['home']->clean_sheet->home : 0 }}</td>
                    <td>-</td>
                    <td>Clean Sheets</td>
                    <td>{{ !empty($team_statistics['away']->clean_sheet->home) ? $team_statistics['away']->clean_sheet->home : 0 }}</td>
                    <td>-</td>
                </tr>

                     

            </tbody>
        </table>
        
    </div>

</div> 

<h2 class="mt-3">Home & away stats</h2>
<div class="row table-row m-0">
    <div class="col-md-12 bg-12 py-2 px-0">
        
        <div class="row m-0">
            <div class="col-md-6 col-left-x text-left">
                <h2><img class="team-logo-h2h" src="{{ $teams->home->logo }}" alt="home" style="width:50px;height:50px"> {{ $teams->home->name }} Home stats</h2>
            </div>
            <div class="col-md-6 col-right-x text-right">
                <h2><img class="team-logo-h2h" src="{{ $teams->away->logo }}" alt="home" style="width:50px;height:50px"> {{ $teams->away->name }} Away stats</h2>
            </div>
            </div>
    </div>
    <div class="col-md-12 p-0 table-12">
        <table class="table table-striped table-hover">
            <thead class="bg-12">
                <tr>
                    <th>Total</th>
                    <th>Per Match</th>
                    <th></th>
                    <th>Per Macth</th>
                    <th>Total</th>
                    
                </tr>
            </thead>
            <tbody>
                

                <tr>
                    <td>{{ $team_statistics['home']->fixtures->played->home }}</td>
                    <td>-</td>
                    <td>Total Match</td>
                    <td>{{ $team_statistics['away']->fixtures->played->away }}</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td>{{ $team_statistics['home']->fixtures->wins->home }}</td>
                    <td>-</td>
                    <td>Total Win</td>
                    <td>{{ $team_statistics['away']->fixtures->wins->away }}</td>
                    <td>-</td>
                </tr>

                <tr>
                    <td>{{ $team_statistics['home']->fixtures->loses->home }}</td>
                    <td>-</td>
                    <td>Total lost</td>
                    <td>{{ $team_statistics['away']->fixtures->loses->away }}</td>
                    <td>-</td>
                </tr>

                <tr>
                    <td>{{ $team_statistics['home']->fixtures->draws->home }}</td>
                    <td>-</td>
                    <td>Total draw</td>
                    <td>{{ $team_statistics['away']->fixtures->draws->away }}</td>
                    <td>-</td>
                </tr>

                <tr>
                    <td>{{ $team_statistics['home']->goals->for->total->home }}</td>
                    <td>{{ $team_statistics['home']->goals->for->average->home }}</td>
                    <td>Goals</td>
                    <td>{{ $team_statistics['away']->goals->for->average->away }}</td>
                    <td>{{ $team_statistics['away']->goals->for->total->away }}</td>
                </tr>

                
                <tr>
                    <td>{{ $team_statistics['home']->goals->against->total->home }}</td>
                    <td>{{ $team_statistics['home']->goals->against->average->home }}</td>
                    <td>Goals Conceded</td>
                    <td>{{ $team_statistics['away']->goals->against->average->away }}</td>
                    <td>{{ $team_statistics['away']->goals->against->total->away }}</td>
                </tr>
                
                <tr>
                    <td>{{ !empty($team_statistics['home']->clean_sheet->home) ? $team_statistics['home']->clean_sheet->home : 0 }}</td>
                    <td>-</td>
                    <td>Clean Sheets</td>
                    <td>{{ !empty($team_statistics['away']->clean_sheet->away) ? $team_statistics['away']->clean_sheet->away : 0 }}</td>
                    <td>-</td>
                </tr>
                
      
            </tbody>
        </table>
    </div>

</div>


<script>
    document.title = 'Football-Today | ' + "{{ $teams->home->name }} " + ' vs ' + " {{ $teams->away->name }}";
    // retrieveSelected();
    barCharts();
    pieCharts();
    predictionChart();

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
            document.getElementById('home_goals_bar{{ $fixture->id }}'),
            home_config
        );

        var h_homeChartDiagram = new Chart(
            document.getElementById('h_home_goals_bar{{ $fixture->id }}'),
            h_home_config
        );

        var awayChartDiagram = new Chart(
            document.getElementById('away_goals_bar{{ $fixture->id }}'),
            away_config
        );

        var a_awayChartDiagram = new Chart(
            document.getElementById('a_away_goals_bar{{ $fixture->id }}'),
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
            document.getElementById('home_res_pie{{ $fixture->id }}'),
            home_config
        );

        var awayChartDiagram = new Chart(
            document.getElementById('away_res_pie{{ $fixture->id }}'),
            away_config
        );

        var h_homeChartDiagram = new Chart(
            document.getElementById('h_home_res_pie{{ $fixture->id }}'),
            h_home_config
        );

        var a_awayChartDiagram = new Chart(
            document.getElementById('a_away_res_pie{{ $fixture->id }}'),
            a_away_config
        );

        var home_clean_sheetChartDiagram = new Chart(
            document.getElementById('home_clean_sheet_pie{{ $fixture->id }}'),
            home_clean_sheet_config
        );

        var away_clean_sheetChartDiagram = new Chart(
            document.getElementById('away_clean_sheet_pie{{ $fixture->id }}'),
            away_clean_sheet_config
        );

        var home_failed_to_scoreChartDiagram = new Chart(
            document.getElementById('home_failed_to_score_pie{{ $fixture->id }}'),
            home_failed_to_score_config
        );

        var away_failed_to_scoreChartDiagram = new Chart(
            document.getElementById('away_failed_to_score_pie{{ $fixture->id }}'),
            away_failed_to_score_config
        );

    }


    function predictionChart() {

        const labels = ['Strength', 'Attacking Potential', 'Defensive Potential', 'Poisson Distribution',
            'Strength H2H',
            'Goals H2H', 'Wins the Game'
        ];

        var home_data = @json($predictions['predictions_array']['home']);
        var away_data = @json($predictions['predictions_array']['away']);

        const data = {
            labels: labels,
            datasets: [{
                    label: "{{ $predictions['predictions'][0]->teams->home->name }}",
                    data: home_data,
                    borderColor: '#12e5fa',
                    backgroundColor: 'rgba(18, 229, 250, 0.5)',
                },
                {
                    label: '{{ $predictions['predictions'][0]->teams->away->name }}',
                    data: away_data,
                    borderColor: '#dc3545',
                    backgroundColor: 'rgba(220, 53, 69, 0.5)',
                }
            ]
        };

        const config = {
            type: 'radar',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: false,
                        text: ''
                    }
                }
            },
        };

        var predictionChartDiagram = new Chart(
            document.getElementById("predictionChart{{ $fixture->id }}"),
            config
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