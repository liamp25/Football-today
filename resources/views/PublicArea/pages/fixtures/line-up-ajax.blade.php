{{-- Lineups --}}
<div class="mb-2">
    <div class="card align-middle bg-dark text-white">
        <h5 class="text-left p-2">Lineups</h5>
    </div>
    <div class="card">
        <div class="card-body table-responsive">
            <table class="table" style="width: 100%;">
                <thead>
                    <th colspan="2" style="border-right: 28px solid rgb(96 96 96 / 28%);width:50%">
                        {{ $teams->home->name }} | {{ !empty($lineups) ? $lineups[0]->formation : '-' }}
                    </th>
                    <th colspan="2" style="width:50%">
                        {{ $teams->away->name }} | {{ !empty($lineups) ? $lineups[1]->formation : '-' }}
                    </th>
                </thead>
                <tbody>
                    @if (!empty($lineups))
                        {{-- Starting XI --}}
                        <tr class="thead-light">
                            <th colspan="2" class="text-left"
                                style="border-right: 28px solid rgb(96 96 96 / 28%);width:50%">Starting
                                XI</th>
                            <th colspan="2" class="text-left">Starting XI</th>
                        </tr>
                        @foreach ($lineups[0]->startXI as $key => $startXI)
                            <tr>
                                <td>{{ $lineups[0]->startXI[$key]->player->number }}</td>
                                <td class="text-left" style="border-right: 28px solid rgb(96 96 96 / 28%);width:50%">
                                    {{ $lineups[0]->startXI[$key]->player->name }}
                                </td>
                                <td>{{ $lineups[1]->startXI[$key]->player->number }}</td>
                                <td class="text-left">
                                    {{ $lineups[1]->startXI[$key]->player->name }}
                                </td>
                            </tr>
                        @endforeach
                        {{-- Substitutes --}}
                        <tr class="thead-light">
                            <th colspan="2" class="text-left"
                                style="border-right: 28px solid rgb(96 96 96 / 28%);width:50%">
                                Substitutes</th>
                            <th colspan="2" class="text-left">Substitutes</th>
                        </tr>
                        @foreach ($lineups[0]->substitutes as $key => $subs)
                            <tr>
                                <td>{{ $lineups[0]->substitutes[$key]->player->number }}</td>
                                <td class="text-left" style="border-right: 28px solid rgb(96 96 96 / 28%);width:50%">
                                    {{ $lineups[0]->substitutes[$key]->player->name }}
                                </td>
                                <td>
                                    @if (isset($lineups[1]->substitutes[$key]))
                                        {{ $lineups[1]->substitutes[$key]->player->number }}
                                    @endif
                                </td>
                                <td class="text-left">
                                    @if (isset($lineups[1]->substitutes[$key]))
                                        {{ $lineups[1]->substitutes[$key]->player->name }}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        <tr class="thead-light">
                            <th colspan="2" class="text-left"
                                style="border-right: 28px solid rgb(96 96 96 / 28%);width:50%">Coach
                            </th>
                            <th colspan="2" class="text-left">Coach</th>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-left"
                                style="border-right: 28px solid rgb(96 96 96 / 28%);width:50%">
                                {{ $lineups[0]->coach->name }}
                            </td>
                            <td colspan="2" class="text-left">
                                {{ $lineups[1]->coach->name }}
                            </td>
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
{{-- End of lineups --}}
