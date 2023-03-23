@extends('layouts.user')
@section('content')
    <main>
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Report an Incident</h3>
                </div>
                <table class="table table-bordered mt-3" style="border: 1px solid lightgrey;">
                    <thead class="text-primary">
                        <th style="text-align:center;">Id</th>
                        <th style="text-align:center;">Name</th>
                        </th>
                        <th style="text-align:center;">Number_plate</th>
                        </th>
                        <th style="text-align:center;width:100px;">Date</th>
                        <th style="text-align:center;width:80px;">Location</th>
                        <th style="text-align:center;width:80px;">Witnessed_by</th>
                        <th style="text-align:center;width:100px;">Mobile.no</th>
                        <th style="text-align:center;">Statement</th>
                        <th style="text-align:center;width:80px;">Image</th>
                        <th style="text-align:center;width:100px;">Action</th>
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
                                <td style="text-align:center;" class="table_data">{{ $report->witnessed_by }}
                                </td>
                                <td style="text-align:center;" class="table_data">{{ $report->mobile }}
                                </td>
                                <td style="text-align:center;" class="table_data">{{ $report->statement }}
                                </td>
                                <td style="text-align:center;" class="table_data"><img
                                        src="{{ url('images/' . $report->image) }}"
                                        class="rounded-0 border border-secondary" width="50px" height="50px"></td>
                                <td style="text-align:center;" class="table_data">
                                    <a href="/deletereport/{{ $report->id }}"><i
                                            class="fa-solid fa-trash btn btn-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
