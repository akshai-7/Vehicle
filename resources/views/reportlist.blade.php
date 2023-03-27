@extends('layouts.user')
@section('content')
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Report an Incident</h3>
            </div>
            <table class="table table-bordered mt-3" style="border: 1px solid lightgrey;">
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
                <tbody>
                    @foreach ($report as $report)
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
                            <td style="text-align:center;" class="table_data"><img
                                    src="{{ url('images/' . $report->image) }}" class="rounded-0 border border-secondary"
                                    width="50px" height="50px"></td>
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
        </div>
    </div>
@endsection
