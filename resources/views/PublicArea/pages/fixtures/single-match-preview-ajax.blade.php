<style>
    .standing-table img {
        width: 20px;
    }
    
    .msrd{
        background: #D63A4B;
  color: #fff;
        display: inline-block;
  padding: .25em .4em;
  font-size: 75%;
  font-weight: 700;
  line-height: 1;
  text-align: center;
  white-space: nowrap;
  vertical-align: baseline;
  border-radius: .25rem;
  transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }
    
    .msblu{
        background: #299FB4;
  color: #fff;
        display: inline-block;
  padding: .25em .4em;
  font-size: 75%;
  font-weight: 700;
  line-height: 1;
  text-align: center;
  white-space: nowrap;
  vertical-align: baseline;
  border-radius: .25rem;
  transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }

    /* Styles for the standings table */
    :root {
        --font: "Raleway", sans-serif;
        --background-color: #fff;
        --background-color-header: #e9ecef;
        --color-text: #000;
        --color-text-header: #000;
        --color-green: #01d099;
        --color-red: #f64e60;
        --color-yellow: #ffa800;
        --primary-font-size: 11px;
        --secondary-font-size: 10px;
        --header-font-size: 11px;
        --header-text-transform: uppercase;
        --header-link-text-transform: none;
        --border-bottom: 0.5px solid var(--background-color-header);
        --primary-padding: 3px 3px;
        --primary-line-height: 13px;
        --secondary-padding: .3rem;
        --button-info-font-size: 9px;
        --button-info-line-height: 16px;
        --toolbar-font-size: var(--header-font-size);
        --modale-background-overlay: rgba(0, 0, 0, 0.4);
        --modale-close-size: 28px;
        --modale-score-size: 36px;
        --modale-teams-size: 13px;
        --standings-team-form-font-size: 9px;
        --standings-team-form-line-height: 16px;
        --flags-size: 16px;
        --teams-logo-size: 16px;
        --teams-logo-modal-size: 90%;
        --teams-logo-block-modal-size: 85px;
        --teams-logo-block-radius-modal: 5px;
        --teams-logo-block-background-modal: var(--background-color-header);
    }

    .wg-table {
        font-family: var(--font);
        width: 100%;
        /* border-collapse: collapse; */
    }

    .standing-table thead {
        display: table-header-group;
        vertical-align: middle;
        border-color: inherit;
    }

    .standing-table tbody {
        display: table-row-group;
        vertical-align: middle;
        border-color: inherit;
    }

    .standing-table table {
        display: table;
        border-collapse: separate;
        box-sizing: border-box;
        text-indent: initial;
        border-spacing: 2px;
        border-color: gray;
    }

    .standing-table table,
    table td,
    table tr {
        border-top: 0px solid #dee2e6 !important;
    }

    .standing-table tr {
        display: table-row;
        vertical-align: inherit;
        border-color: inherit;
    }

    .standing-table td {
        padding: var(--primary-padding) !important;
        font-size: var(--primary-font-size);
        letter-spacing: 0;
        line-height: var(--primary-line-height);
        vertical-align: middle;
        background: var(--background-color);
        color: var(--color-text);
        border-bottom: var(--border-bottom);
    }

    .standing-table .wg_width_20 {
        width: 20px;
    }

    .standing-table .wg_width_90 {
        width: 90px;
    }

    .standing-table .wg_bolder {
        font-weight: 700;
    }

    .standing-table .wg_bolder {
        font-weight: 700;
    }

    .standing-table .wg_text_center {
        text-align: center;
    }

    .standing-table .wg_nowrap {
        white-space: nowrap;
    }

    .standing-table .wg_logo {
        width: var(--teams-logo-size);
        vertical-align: middle;
    }

    .standing-table img {
        overflow-clip-margin: content-box;
        overflow: clip;
        width: 16px;
        height: 16px;
    }

    .standing-table td {
        display: table-cell;
        vertical-align: inherit;
    }

    .standing-table .wg_form {
        display: inline-block;
        /* margin: 1px; */
        width: 14px;
        height: 14px;
        line-height: var(--standings-team-form-line-height);
        font-size: var(--standings-team-form-font-size);
        text-align: center;
        position: relative;
        color: #fff;
    }

    .standing-table .wg_form_lose {
        background: var(--color-red);
    }

    .standing-table .wg_form_win {
        background: var(--color-green);
    }

    .standing-table .wg_form_draw {
        background: var(--color-yellow);
    }

    .standing-table .wg_header {
        padding: var(--secondary-padding);
        font-size: var(--header-font-size);
        font-weight: 600;
        background: var(--background-color-header);
        color: var(--color-text-header);
        text-transform: var(--header-text-transform);
    }

   

    .standing-table .wg_tooltip {
        cursor: pointer;
    }

    .standing-table .wg_text_center {
        text-align: center;
    }

    .standing-table .wg_tooltip.wg_tooltip_left:before {
        left: initial;
        margin: initial;
        right: 100%;
        margin-right: 0;
    }

    .standing-table .wg_tooltip:before {
        content: attr(data-text);
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        left: 100%;
        margin-left: 0;
        min-width: 80px;
        max-width: 200px;
        width: auto;
        padding: 5px;
        border-radius: 3px;
        background: var(--color-text);
        color: var(--background-color);
        text-align: center;
        display: none;
        z-index: 99999;
    }

    .standing-table .wg_info {
        display: inline-block;
        border-radius: 14px;
        margin: 1px;
        width: 14px;
        height: 14px;
        line-height: var(--button-info-line-height);
        font-size: var(--button-info-font-size);
        text-align: center;
        position: relative;
        color: #fff;
        background: var(--background-color-header);
    }

    .standing-table .wg_flag {
        width: var(--flags-size);
        vertical-align: middle;
    }

    @media only screen and (max-width: 482px) {
        .standing-table .wg_hide_xs {
            display: none;
        }
    }

    @media only screen and (max-width: 320px) {
        .standing-table .wg_hide_xxs {
            display: none;
        }
    }

    /* end Styles for the standings table */

    .title-band {
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
            url("https://football.bitbotlab.com/PublicArea/img/soccer-bg.png");
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

    #fixture_info {
        min-height: 75vh;
    }

    .team-logo {
        width: 40%;
    }

    .team-logo-h2h {
        width: 100%;
    }

    .team-logo-standing {
        width: 7%;
    }

    .scorer-name {
        min-width: 7rem;
    }

    .h2h_table td,
    .h2h_table th {
        vertical-align: middle !important;
        font-size: 1.3rem;
    }

    @media (max-width: 780.98px) {
        .team-logo {
            width: 100%;
        }

        .team-logo-standing {
            width: 15%;
        }

        .mobile-resp {
            max-width: 30%;
        }

        .team-text {
            font-size: 1rem;
        }

        .score-text {
            font-size: 1rem;
        }

        .time-text {
            font-size: 1.2rem;
        }

        .stats-table td,
        .stats-table th {
            padding: 0.35rem !important;
        }

        .h2h_table td,
        .h2h_table th {
            vertical-align: middle !important;
            font-size: 0.8rem;
        }
    }

    .player_link {
        text-decoration: none;
        color: #000;
    }

    .player_link:hover {
        text-decoration: none;
        color: #000;
    }

    .table td,
    .table th {
        padding: .75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
        border-bottom: 1px solid #dee2e6;
    }

    /* Styles for the standings table */
    :root {
        --font: "Raleway", sans-serif;
        --background-color: #fff;
        --background-color-header: #e9ecef;
        --color-text: #000;
        --color-text-header: #000;
        --color-green: #01d099;
        --color-red: #f64e60;
        --color-yellow: #ffa800;
        --primary-font-size: 11px;
        --secondary-font-size: 10px;
        --header-font-size: 11px;
        --header-text-transform: uppercase;
        --header-link-text-transform: none;
        --border-bottom: 0.5px solid var(--background-color-header);
        --primary-padding: 3px 3px;
        --primary-line-height: 13px;
        --secondary-padding: .3rem;
        --button-info-font-size: 9px;
        --button-info-line-height: 16px;
        --toolbar-font-size: var(--header-font-size);
        --modale-background-overlay: rgba(0, 0, 0, 0.4);
        --modale-close-size: 28px;
        --modale-score-size: 36px;
        --modale-teams-size: 13px;
        --standings-team-form-font-size: 9px;
        --standings-team-form-line-height: 16px;
        --flags-size: 16px;
        --teams-logo-size: 16px;
        --teams-logo-modal-size: 90%;
        --teams-logo-block-modal-size: 85px;
        --teams-logo-block-radius-modal: 5px;
        --teams-logo-block-background-modal: var(--background-color-header);
    }

    .wg-table {
        font-family: var(--font);
        width: 100%;
        /* border-collapse: collapse; */
    }

    .wg-table thead {
        display: table-header-group;
        vertical-align: middle;
        border-color: inherit;
    }

    .wg-table tbody {
        display: table-row-group;
        vertical-align: middle;
        border-color: inherit;
    }

    table.wg-table {
        display: table;
        border-collapse: separate;
        box-sizing: border-box;
        text-indent: initial;
        border-spacing: 2px;
        border-color: gray;
    }

    table.wg-table,
    table.wg-table td,
    table.wg-table tr {
        border-top: 0px solid #dee2e6 !important;
    }

    .wg-table tr {
        display: table-row;
        vertical-align: inherit;
        border-color: inherit;
    }

    .wg-table td {
        padding: var(--primary-padding) !important;
        font-size: var(--primary-font-size);
        letter-spacing: 0;
        line-height: var(--primary-line-height);
        vertical-align: middle;
        background: var(--background-color);
        color: var(--color-text);
        border-bottom: var(--border-bottom);
    }

    .wg_width_20 {
        width: 20px;
    }

    .wg_width_90 {
        width: 90px;
    }

    .wg_bolder {
        font-weight: 700;
    }

    .wg_bolder {
        font-weight: 700;
    }

    .wg_text_center {
        text-align: center;
    }

    .wg_nowrap {
        white-space: nowrap;
    }

    .wg_logo {
        width: var(--teams-logo-size);
        vertical-align: middle;
    }

    .wg-table img {
        overflow-clip-margin: content-box;
        overflow: clip;
        width: 16px;
        height: 16px;
    }

    .wg-tabletd {
        display: table-cell;
        vertical-align: inherit;
    }

    .wg_form {
        display: inline-block;
        /* margin: 1px; */
        width: 14px;
        height: 14px;
        line-height: var(--standings-team-form-line-height);
        font-size: var(--standings-team-form-font-size);
        text-align: center;
        position: relative;
        color: #fff;
    }

    .wg_form_lose {
        background: var(--color-red);
    }

    .wg_form_win {
        background: var(--color-green);
    }

    .wg_form_draw {
        background: var(--color-yellow);
    }

    .wg_header {
        padding: var(--secondary-padding);
        font-size: var(--header-font-size);
        font-weight: 600;
        background: var(--background-color-header);
        color: var(--color-text-header);
        text-transform: var(--header-text-transform);
    }

    .wg_tooltip {
        cursor: pointer;
    }

    .wg_text_center {
        text-align: center;
    }

    .wg_tooltip.wg_tooltip_left:before {
        left: initial;
        margin: initial;
        right: 100%;
        margin-right: 0;
    }

    .wg_tooltip:before {
        content: attr(data-text);
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        left: 100%;
        margin-left: 0;
        min-width: 80px;
        max-width: 200px;
        width: auto;
        padding: 5px;
        border-radius: 3px;
        background: var(--color-text);
        color: var(--background-color);
        text-align: center;
        display: none;
        z-index: 99999;
    }

    .wg_info {
        display: inline-block;
        border-radius: 14px;
        margin: 1px;
        width: 14px;
        height: 14px;
        line-height: var(--button-info-line-height);
        font-size: var(--button-info-font-size);
        text-align: center;
        position: relative;
        color: #fff;
        background: var(--background-color-header);
    }

    .wg_flag {
        width: var(--flags-size);
        vertical-align: middle;
    }

    @media only screen and (max-width: 482px) {
        .wg_hide_xs {
            display: none;
        }
    }

    @media only screen and (max-width: 320px) {
        .wg_hide_xxs {
            display: none;
        }
    }

    .player-stats {
        cursor: pointer;
    }

    /* end Styles for the standings table */

    .bg-12{
        background: #F6F8FA;
    }

    .bg-gre{
        background: #DCF0E5;
    }

    .table-row{
        width: 100%;
        float: left;
        border: 1px solid #E1E1E1;
    }

    .table-row h2{
        font-size: 12px;
        color: #747476;
        font-weight: 500;
        text-transform: capitalize;
        margin: 0;
    }

    .font-number{
        font-weight: 700;
    }

    .table-12{
        margin-top: 35px;
    }

    .table-row table th{
        font-size: 15px;
  color: #747476;
  font-weight: 600;
    }

    .table-row table tr td:first-child,
    .table-row table tr td:nth-child(4){
        font-weight: 700;
    }

    @media only screen and (min-width:200px) and (max-width:767px){
        .col-right-x {
            text-align: left !important;
            margin-top: 20px;
        }

        .table-row .col-md-6 img{
            width: 30px !important;
            height: 30px !important;
        }

        .table-row table{
            display: block;
            width: 100%;
            overflow-x: auto;
        }
    }
</style>




<div class="sub_view_btn">
    <div class="container">
        <nav>
            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-summary-tab" data-toggle="tab"
                    href="#nav-summary{{ $fixture->id }}" role="tab" aria-controls="nav-summary"
                    aria-selected="true">summary</a>
                <a class="nav-item nav-link match-stats-tab" id="nav-stats-tab" data-toggle="tab" href="#nav-stats{{ $fixture->id }}"
                    role="tab" aria-controls="nav-stats" aria-selected="false" data-id="{{ $fixture->id }}"
                        data-route="{{ route('public.matchstats', ['id' => $league->id, 'season' => $league->season, 'home_id' => $teams->home->id, 'away_id' => $teams->away->id]) }}">Team stats</a>
                <a class="nav-item nav-link" id="nav-Player-tab" data-toggle="tab" href="#nav-Player{{ $fixture->id }}"
                    role="tab" aria-controls="nav-Player" aria-selected="false">Player stats</a>
            </div>
        </nav>
        <div class="tab-content py-3 px-sm-0" id="nav-tabContent">

            <!-- summary tab content -->
            <div class="tab-pane fade show active" id="nav-summary{{ $fixture->id }}" role="tabpanel"
                aria-labelledby="nav-summary-tab">

                {{-- recent form --}}
                <div class="mb-2">
                    <div class="card align-middle bg-dark text-white">
                        <h5 class="text-left p-2">Previous Fixtures</h5>
                    </div>
                    <div class="row my-3 text-left">
                        <div class="col-md-6 mb-2 pr-1">
                            <div class="card">
                                <div class="card-body p-0 table-responsive">
                                    <h6 class="card-title mb-0 px-3 py-2">{{ $teams->home->name }}</h6>
                                    <table class="table" style="width: 100%;">
                                        <tbody>
                                            @forelse ($form["home"] as $home_fixture)
                                                <tr class="thead-light">
                                                    <th colspan="5">
                                                        {{ \carbon\carbon::parse($home_fixture->fixture->timestamp)->setTimezone($timezone)->format('d/m/Y') }}
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td class="text-left" style="width: 15%">
                                                        <a class="no-underline"
                                                            href="{{ route('public.team.get', [
                                                                'nation' => str_replace(' ', '_', $league->country),
                                                                'id' => $home_fixture->teams->home->id,
                                                                'club' => str_replace(' ', '_', $home_fixture->teams->home->name),
                                                            ]) }}">
                                                            <img class="team-logo-h2h"
                                                                src="{{ $home_fixture->teams->home->logo }}"
                                                                alt="home">
                                                        </a>

                                                    </td>
                                                    <td class="text-left">
                                                        <a class="no-underline"
                                                            href="{{ route('public.team.get', [
                                                                'nation' => str_replace(' ', '_', $league->country),
                                                                'id' => $home_fixture->teams->home->id,
                                                                'club' => str_replace(' ', '_', $home_fixture->teams->home->name),
                                                            ]) }}">
                                                            {{ $home_fixture->teams->home->name }}
                                                        </a>
                                                    </td>
                                                    <td style="white-space: nowrap; centered-links" align="center">
                                                        <p>{{ $home_fixture->goals->home }}-{{ $home_fixture->goals->away }}
                                                        </p>
                                                    </td>
                                                    <td class="text-right">
                                                        <a class="no-underline"
                                                            href="{{ route('public.team.get', [
                                                                'nation' => str_replace(' ', '_', $league->country),
                                                                'id' => $home_fixture->teams->away->id,
                                                                'club' => str_replace(' ', '_', $home_fixture->teams->away->name),
                                                            ]) }}">
                                                            {{ $home_fixture->teams->away->name }}
                                                        </a>
                                                    </td>
                                                    <td class="text-right" style="width: 15%">
                                                        <a class="no-underline"
                                                            href="{{ route('public.team.get', [
                                                                'nation' => str_replace(' ', '_', $league->country),
                                                                'id' => $home_fixture->teams->away->id,
                                                                'club' => str_replace(' ', '_', $home_fixture->teams->away->name),
                                                            ]) }}">
                                                            <img class="team-logo-h2h"
                                                                src="{{ $home_fixture->teams->away->logo }}"
                                                                alt="home">
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-center">
                                                        No data available
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3 pl-1">
                            <div class="card">
                                <div class="card-body p-0 table-responsive">
                                    <h6 class="card-title mb-0 px-3 py-2">{{ $teams->away->name }}</h6>
                                    <table class="table" style="width: 100%;">
                                        <tbody>
                                            @forelse ($form["away"] as $away_fixture)
                                                <tr class="thead-light">
                                                    <th colspan="5">
                                                        {{ \carbon\carbon::parse($away_fixture->fixture->timestamp)->setTimezone($timezone)->format('d/m/Y') }}
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td class="text-left" style="width: 15%">
                                                        <a class="no-underline"
                                                            href="{{ route('public.team.get', [
                                                                'nation' => str_replace(' ', '_', $league->country),
                                                                'id' => $away_fixture->teams->home->id,
                                                                'club' => str_replace(' ', '_', $away_fixture->teams->home->name),
                                                            ]) }}">
                                                            <img class="team-logo-h2h"
                                                                src="{{ $away_fixture->teams->home->logo }}"
                                                                alt="home">
                                                        </a>
                                                    </td>
                                                    <td class="text-left">
                                                        <a class="no-underline"
                                                            href="{{ route('public.team.get', [
                                                                'nation' => str_replace(' ', '_', $league->country),
                                                                'id' => $away_fixture->teams->home->id,
                                                                'club' => str_replace(' ', '_', $away_fixture->teams->home->name),
                                                            ]) }}">
                                                            {{ $away_fixture->teams->home->name }}
                                                        </a>
                                                    </td>
                                                    <td style="white-space: nowrap; centered-links" align="center">
                                                        <p>{{ $away_fixture->goals->home }}-{{ $away_fixture->goals->away }}
                                                        </p>
                                                    </td>
                                                    <td class="text-right">
                                                        <a class="no-underline"
                                                            href="{{ route('public.team.get', [
                                                                'nation' => str_replace(' ', '_', $league->country),
                                                                'id' => $away_fixture->teams->away->id,
                                                                'club' => str_replace(' ', '_', $away_fixture->teams->away->name),
                                                            ]) }}">
                                                            {{ $away_fixture->teams->away->name }}
                                                        </a>
                                                    </td>
                                                    <td class="text-right" style="width: 15%">
                                                        <a class="no-underline"
                                                            href="{{ route('public.team.get', [
                                                                'nation' => str_replace(' ', '_', $league->country),
                                                                'id' => $away_fixture->teams->away->id,
                                                                'club' => str_replace(' ', '_', $away_fixture->teams->away->name),
                                                            ]) }}">
                                                            <img class="team-logo-h2h"
                                                                src="{{ $away_fixture->teams->away->logo }}"
                                                                alt="home">
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-center">
                                                        No data available
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end of recent form --}}

                {{-- h2h --}}
                <div class="mb-2">
                    <div class="card align-middle bg-dark text-white">
                        <h5 class="text-left p-2">Head To Head</h5>
                    </div>
                    <div class="card">
                        <div class="card-body table-responsive">
                            <table class="h2h_table table" style="width: 100%;">
                                <tbody>
                                    @forelse ($h2h as $h2h_single)
                                        <tr class="thead-light">
                                            <th colspan="5">
                                                {{ \carbon\carbon::parse($h2h_single->fixture->timestamp)->setTimezone($timezone)->format('d/m/Y') }}
                                            </th>
                                        </tr>
                                        <tr>
                                            <td class="text-left" style="width: 15%">
                                                <a class="no-underline"
                                                    href="{{ route('public.team.get', [
                                                        'nation' => str_replace(' ', '_', $league->country),
                                                        'id' => $h2h_single->teams->home->id,
                                                        'club' => str_replace(' ', '_', $h2h_single->teams->home->name),
                                                    ]) }}">
                                                    <img class="team-logo-h2h"
                                                        src="{{ $h2h_single->teams->home->logo }}" alt="home">
                                                </a>
                                            </td>
                                            <td class="text-left">
                                                <a class="no-underline"
                                                    href="{{ route('public.team.get', [
                                                        'nation' => str_replace(' ', '_', $league->country),
                                                        'id' => $h2h_single->teams->home->id,
                                                        'club' => str_replace(' ', '_', $h2h_single->teams->home->name),
                                                    ]) }}">
                                                    {{ $h2h_single->teams->home->name }}
                                                </a>
                                            </td>
                                            <td style="white-space: nowrap centered-links" align="center">
                                                <p>{{ $h2h_single->goals->home }}-{{ $h2h_single->goals->away }}</p>

                                            </td>
                                            <td class="text-right">
                                                <a class="no-underline"
                                                    href="{{ route('public.team.get', [
                                                        'nation' => str_replace(' ', '_', $league->country),
                                                        'id' => $h2h_single->teams->away->id,
                                                        'club' => str_replace(' ', '_', $h2h_single->teams->away->name),
                                                    ]) }}">
                                                    {{ $h2h_single->teams->away->name }}
                                                </a>
                                            </td>
                                            <td class="text-right" style="width: 15%">
                                                <a class="no-underline"
                                                    href="{{ route('public.team.get', [
                                                        'nation' => str_replace(' ', '_', $league->country),
                                                        'id' => $h2h_single->teams->away->id,
                                                        'club' => str_replace(' ', '_', $h2h_single->teams->away->name),
                                                    ]) }}">
                                                    <img class="team-logo-h2h"
                                                        src="{{ $h2h_single->teams->away->logo }}" alt="home">
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">
                                                No data available
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- End of h2h --}}

                {{-- league table --}}
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
                                                    data-toggle="tooltip" data-placement="left"
                                                    title="MATCHES PLAYED">
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
                        </div>
                        {{-- end league table --}}

                        
                    </div>



                    <!-- Team stats tab content -->
                    
                    <div class="tab-pane fade" id="nav-stats{{ $fixture->id }}" role="tabpanel"
                        aria-labelledby="nav-stats-tab">

                        <div class="text-center my-3" id="fixture-spinner">
                            <div class="spinner-border" role="status">
                                <span class="sr-only">Loading...</span>
                                
                            </div>
                        </div>
                    </div>

                    <!-- Player tab content -->
                    <div class="tab-pane fade" id="nav-Player{{ $fixture->id }}" role="tabpanel"
                        aria-labelledby="nav-Player-tab">

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
                                            <div class="player-stats card-header text-white" id="heading-top-goals-total"
                                                data-toggle="collapse"
                                                data-target="#collapse-top-goals-total{{ $fixture->id }}"
                                                aria-expanded="true" aria-controls="collapse-top-goals-total">
                                                Top Goals Total
                                            </div>

                                            <div id="collapse-top-goals-total{{ $fixture->id }}" class="collapse"
                                                aria-labelledby="heading-top-goals-total" data-parent="#accordionExample">
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
                                            <div class="player-stats card-header text-white" id="heading-top-goals-assists"
                                                data-toggle="collapse"
                                                data-target="#collapse-top-goals-assists{{ $fixture->id }}"
                                                aria-expanded="true" aria-controls="collapse-top-goals-assists">
                                                Top Goals Assists
                                            </div>

                                            <div id="collapse-top-goals-assists{{ $fixture->id }}" class="collapse"
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
                                            <div class="player-stats card-header text-white" id="heading-top-shots-total"
                                                data-toggle="collapse"
                                                data-target="#collapse-top-shots-total{{ $fixture->id }}"
                                                aria-expanded="true" aria-controls="collapse-top-shots-total">
                                                Top Shots Total
                                            </div>

                                            <div id="collapse-top-shots-total{{ $fixture->id }}" class="collapse"
                                                aria-labelledby="heading-top-shots-total" data-parent="#accordionExample">
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
                                            <div class="player-stats card-header text-white" id="heading-top-shots-on"
                                                data-toggle="collapse"
                                                data-target="#collapse-top-shots-on{{ $fixture->id }}" aria-expanded="true"
                                                aria-controls="collapse-top-shots-on">
                                                Top Shots On
                                            </div>

                                            <div id="collapse-top-shots-on{{ $fixture->id }}" class="collapse"
                                                aria-labelledby="heading-top-shots-on" data-parent="#accordionExample">
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
                                            <div class="player-stats card-header text-white" id="heading-top-games-rating"
                                                data-toggle="collapse"
                                                data-target="#collapse-top-games-rating{{ $fixture->id }}"
                                                aria-expanded="true" aria-controls="collapse-top-games-rating">
                                                Top Games Rating
                                            </div>

                                            <div id="collapse-top-games-rating{{ $fixture->id }}" class="collapse"
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
                                            <div class="player-stats card-header text-white" id="heading-top-passes-key"
                                                data-toggle="collapse"
                                                data-target="#collapse-top-passes-key{{ $fixture->id }}"
                                                aria-expanded="true" aria-controls="collapse-top-passes-key">
                                                Top Passes Key
                                            </div>

                                            <div id="collapse-top-passes-key{{ $fixture->id }}" class="collapse"
                                                aria-labelledby="heading-top-passes-key" data-parent="#accordionExample">
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
                                            <div class="player-stats card-header text-white" id="heading-top-tackles-total"
                                                data-toggle="collapse"
                                                data-target="#collapse-top-tackles-total{{ $fixture->id }}"
                                                aria-expanded="true" aria-controls="collapse-top-tackles-total">
                                                Top Tackles Total
                                            </div>

                                            <div id="collapse-top-tackles-total{{ $fixture->id }}" class="collapse"
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
                                            <div class="player-stats card-header text-white" id="heading-top-fouls-committed"
                                                data-toggle="collapse"
                                                data-target="#collapse-top-fouls-committed{{ $fixture->id }}"
                                                aria-expanded="true" aria-controls="collapse-top-fouls-committed">
                                                Top Fouls Committed
                                            </div>

                                            <div id="collapse-top-fouls-committed{{ $fixture->id }}" class="collapse"
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
                                            <div class="player-stats card-header text-white" id="heading-top-cards-yellow"
                                                data-toggle="collapse"
                                                data-target="#collapse-top-cards-yellow{{ $fixture->id }}"
                                                aria-expanded="true" aria-controls="collapse-top-cards-yellow">
                                                Top Cards Yellow
                                            </div>

                                            <div id="collapse-top-cards-yellow{{ $fixture->id }}" class="collapse"
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
                                            <div class="player-stats card-header text-white" id="heading-top-goals-total2"
                                                data-toggle="collapse"
                                                data-target="#collapse-top-goals-total2{{ $fixture->id }}"
                                                aria-expanded="true" aria-controls="collapse-top-goals-total2">
                                                Top Goals Total
                                            </div>

                                            <div id="collapse-top-goals-total2{{ $fixture->id }}" class="collapse"
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
                                            <div class="player-stats card-header text-white" id="heading-top-goals-assists2"
                                                data-toggle="collapse"
                                                data-target="#collapse-top-goals-assists2{{ $fixture->id }}"
                                                aria-expanded="true" aria-controls="collapse-top-goals-assists2">
                                                Top Goals Assists
                                            </div>

                                            <div id="collapse-top-goals-assists2{{ $fixture->id }}" class="collapse"
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
                                            <div class="player-stats card-header text-white" id="heading-top-shots-total2"
                                                data-toggle="collapse"
                                                data-target="#collapse-top-shots-total2{{ $fixture->id }}"
                                                aria-expanded="true" aria-controls="collapse-top-shots-total2">
                                                Top Shots Total
                                            </div>

                                            <div id="collapse-top-shots-total2{{ $fixture->id }}" class="collapse"
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
                                            <div class="player-stats card-header text-white" id="heading-top-shots-on2"
                                                data-toggle="collapse"
                                                data-target="#collapse-top-shots-on2{{ $fixture->id }}"
                                                aria-expanded="true" aria-controls="collapse-top-shots-on2">
                                                Top Shots On
                                            </div>

                                            <div id="collapse-top-shots-on2{{ $fixture->id }}" class="collapse"
                                                aria-labelledby="heading-top-shots-on2" data-parent="#accordionExample2">
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
                                            <div class="player-stats card-header text-white" id="heading-top-games-rating2"
                                                data-toggle="collapse"
                                                data-target="#collapse-top-games-rating2{{ $fixture->id }}"
                                                aria-expanded="true" aria-controls="collapse-top-games-rating2">
                                                Top Games Rating
                                            </div>

                                            <div id="collapse-top-games-rating2{{ $fixture->id }}" class="collapse"
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
                                            <div class="player-stats card-header text-white" id="heading-top-passes-key2"
                                                data-toggle="collapse"
                                                data-target="#collapse-top-passes-key2{{ $fixture->id }}"
                                                aria-expanded="true" aria-controls="collapse-top-passes-key2">
                                                Top Passes Key
                                            </div>

                                            <div id="collapse-top-passes-key2{{ $fixture->id }}" class="collapse"
                                                aria-labelledby="heading-top-passes-key2" data-parent="#accordionExample2">
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
                                            <div class="player-stats card-header text-white" id="heading-top-tackles-total2"
                                                data-toggle="collapse"
                                                data-target="#collapse-top-tackles-total2{{ $fixture->id }}"
                                                aria-expanded="true" aria-controls="collapse-top-tackles-total2">
                                                Top Tackles Total
                                            </div>

                                            <div id="collapse-top-tackles-total2{{ $fixture->id }}" class="collapse"
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
                                            <div class="player-stats card-header text-white" id="heading-top-fouls-committed2"
                                                data-toggle="collapse"
                                                data-target="#collapse-top-fouls-committed2{{ $fixture->id }}"
                                                aria-expanded="true" aria-controls="collapse-top-fouls-committed2">
                                                Top Fouls Committed
                                            </div>

                                            <div id="collapse-top-fouls-committed2{{ $fixture->id }}" class="collapse"
                                                aria-labelledby="heading-top-fouls-committed2"
                                                data-parent="#accordionExample2">
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
                                            <div class="player-stats card-header text-white" id="heading-top-cards-yellow2"
                                                data-toggle="collapse"
                                                data-target="#collapse-top-cards-yellow2{{ $fixture->id }}"
                                                aria-expanded="true" aria-controls="collapse-top-cards-yellow2">
                                                Top Cards Yellow
                                            </div>

                                            <div id="collapse-top-cards-yellow2{{ $fixture->id }}" class="collapse"
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
