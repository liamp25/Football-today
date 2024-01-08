{{-- match stats --}}
<div class="mb-2">
    <div class="card align-middle bg-dark text-white">
        <h5 class="text-left p-2">Match Statistics</h5>
    </div>
    <div class="card">
        <div class="card-body table-responsive">
            <table class="table" style="width: 100%;">
                <thead>
                    <th>
                        {{$teamstats['home_name']}}
                    </th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>
                        {{$teamstats['away_name']}}
                    </th>
                </thead>
                <tbody>
                    @if (!empty($teamstats))
                        @foreach ($teamstats['home'] as $key => $val)
                            <tr>
                                <td class="text-center">
                                    <span class="badge badge-info">
                                        {{ $teamstats['home'][$key] }}
                                    </span>
                                </td>
                                <td>{{ $teamstats['home_total'] > 0 ? round($teamstats['home'][$key] / $teamstats['home_total'], 2) : 0 }}</td>
                                <td class="text-center">{{ $key }}</td>
                                <td>{{ $teamstats['away_total'] > 0 ? round($teamstats['away'][$key] / $teamstats['away_total'], 2) : 0 }}</td>
                                <td class="text-center">
                                    <span class="badge badge-danger">
                                        {{ $teamstats['away'][$key] }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
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
</div>
{{-- End of match stats --}}