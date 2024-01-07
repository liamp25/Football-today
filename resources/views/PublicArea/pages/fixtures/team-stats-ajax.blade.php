{{-- match stats --}}
<div class="col-md-6 mb-2">
    <div class="card align-middle bg-dark text-white">
        <h5 class="text-left p-2">Match Statistics</h5>
    </div>
    <div class="card">
        <div class="card-body table-responsive">
            <table class="table" style="width: 100%;">
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
</div>
{{-- End of match stats --}}