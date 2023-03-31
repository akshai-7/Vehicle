@extends('layouts.user')
@section('content')
    <div class="userContainer">
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Reported Incidents</h3>
                </div>
                <table class="table table-bordered mt-3" style="border: 1px solid lightgrey;">

                    <tbody>
                        <thead class="text-primary">
                            <th style="text-align:center;">Id</th>
                            <th style="text-align:center;">Driver Name</th>
                            </th>
                            <th style="text-align:center;">Number_plate</th>
                            </th>
                            <th style="text-align:center;">Date</th>
                            <th style="text-align:center;">Location</th>
                            <th style="text-align:center;">Statement</th>
                            <th style="text-align:center;">Image</th>
                            <th style="text-align:center;">Action</th>
                        </thead>
                        @foreach ($reports as $report)
                            <tr class="table_row">
                                <td style="text-align:center;" class="table_data">{{ $report->id }}</td>
                                <td style="text-align:center;" class="table_data">{{ $report->assign->name }}</td>
                                <td style="text-align:center;" class="table_data">{{ $report->assign->number_plate }}</td>
                                <td style="text-align:center;" class="table_data">{{ $report->date }}
                                </td>
                                <td style="text-align:center;" class="table_data">{{ $report->location }}
                                </td>
                                <td style="text-align:center;width:300px;" class="table_data">{{ $report->statement }}
                                </td>
                                <td style="text-align:center;" class="table_data">
                                    <a href="/reportimages/{{ $report->id }}">
                                        <img src="{{ url('images/' . explode(',', $report->image)[0]) }}"
                                            class="rounded-0 border border-secondary" width="50px" height="50px">
                                    </a>
                                </td>
                                <td style="text-align:center;" class="table_data">
                                    <a href="/updatereport/{{ $report->id }}" class="tool"><i
                                            class="fa-solid fa-eye btn  text-white" style="background:#06064b "
                                            data-toggle="tooltip" data-placement="top" title="View"></i></a>
                                    <a href="/deletereport/{{ $report->id }}" data-toggle="tooltip" data-placement="top"
                                        title="Delete"><i class="fa-solid fa-trash btn btn-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                @if (isset($reports))
                    @if (count($reports) < 1)
                        <div id="dataNotFound">
                            <p>Data not found</p>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
@endsection
