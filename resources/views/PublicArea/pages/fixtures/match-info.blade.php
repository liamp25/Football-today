@extends('PublicArea.layouts.app')
@section('title')
Football-Today
@endsection
@section('content')

<div class="row mt-3">
    <div class="col-md-12">
        <div id="team_info" class="row">
            <div class="col-md-12 text-center my-2">
                <div id="wg-api-football-fixture"
                    data-host="v3.football.api-sports.io"
                    data-id="{{$id}}"
                    data-key="{{$api_key}}"
                    data-theme=""
                    data-show-errors="false"
                    class="api_football_loader">
                </div>
                
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script type="module" src="https://widgets.api-sports.io/football/1.1.8/widget.js"></script>
@endsection
@section('css')
<style>
    .title-band {
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
        url("{{asset('PublicArea/img/soccer-bg.png')}}");
        background-size: cover;
        background-position: center;
    }

    .nav-pills .nav-link {
        color: #000;
    }

    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        color: #fff;
        background-color: #12e5fa;
    }

    #team_info {
        min-height: 75vh;
    }

    .team-logo {
        width: 7%;
    }

    .team-title {
        font-size: 1rem;
    }

    @media (max-width: 780.98px) {
        .team-logo {
            width: 15%;
        }

        .team-title {
            font-size: 0.9rem;
        }

        .select-col {
            width: 30%;
        }

        .stats-col {
            width: 50% !important;
        }
    }

    #fixture_list {
        /* overflow-y: scroll; */
        height: min-content;
        max-height: 100% !important; /* it was 700px*/
    }

    div ::-webkit-scrollbar {
        width: 4px;
        height: 4px;
    }

    div ::-webkit-scrollbar-track {
        border-radius: 5px;
        box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.25);
    }

    div ::-webkit-scrollbar-thumb {
        border-radius: 5px;
        background-color: #12e5fa;
    }

    div ::-webkit-scrollbar-thumb:hover {
        border-radius: 5px;
        background-color: #12e5fa;
    }

    .card-header {
        background-color: rgba(0, 0, 0, .6);
    }

    .btn-link {
        color: #fff;
        text-decoration: none !important;
    }

    .btn-link:hover {
        color: #fff;
        text-decoration: none !important;
    }

    tr.match {
        border-top: 1px solid #d3d3d3;
    }

    .matches_new td.minute {
        width: 58px;
        text-align: center;
    }

    table.matches_new th,
    table.matches_new td {
        padding: 3px 5px;
    }

    .minute.novis .match-card.match-current-minute {
        background-color: transparent !important;
        margin-right: 4px;
    }

    .minute.visible .match-card.match-current-minute {
        background-color: #12e5fa;
    }

    .minute.visible-2 .match-card.match-current-minute {
        background-color: rgba(0, 0, 0, .8);
    }

    .match .match-card {
        padding: 0 5px;
        background: #4a4a4a;
        color: #fff;
        text-align: center;
        min-width: 48px;
        line-height: 23px;
        font-size: 12px;
        display: inline-block;
    }

    td.team-a {
        text-align: right;
    }

    td.team {
        width: 50%;
        max-width: 50px;
        overflow: hidden;
        overflow-x: hidden;
        overflow-y: hidden;
        text-overflow: ellipsis;
    }

    td.score-time {
        width: 45px;
        white-space: nowrap;
        text-align: center;
        background: #dadada;
        font-weight: bold;
    }

    table.matches_new th,
    table.matches_new td {
        padding: 3px 5px;
    }

    td>a {
        text-decoration: none !important;
        color: #000;
    }

    td>a:hover {
        text-decoration: none !important;
        color: #000;
    }

    .stats-col {
        text-align: left;
    }

</style>
@endsection
