@extends('layouts.user')
@section('content')
    <main class="main">
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Vehicle Inspection Details</h3>
                </div>
                <table class="table table-bordered mt-3" style="border: 1px solid lightgrey;">
                    <thead class="text-primary">
                        <th style="text-align:center;">Id</th>
                        <th style="text-align:center;">Report.no</th>
                        <th style="text-align:center;">Inspected_by</th>
                        <th style="text-align:center;">Driver Name</th>
                        <th style="text-align:center;">Number plate</th>
                        <th style="text-align:center;">Mileage</th>
                        <th style="text-align:center;">Inspection_date</th>
                        <th style="text-align:center;">Next_inspection</th>
                        <th style="text-align:center;">Over_due</th>
                        <th style="text-align:center;">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($inspection as $inspection)
                            <tr class="table_row">
                                <td style="text-align:center;" class="table_data">{{ $inspection->id }}</td>
                                <td style="text-align:center;" class="table_data">{{ $inspection->report_no }}
                                </td>
                                <td style="text-align:center;" class="table_data">{{ $inspection->inspected_by }}
                                </td>
                                <td style="text-align:center;" class="table_data">{{ $inspection->name }}</td>
                                <td style="text-align:center;" class="table_data">
                                    {{ $inspection->number_plate }}</td>
                                <td style="text-align:center;" class="table_data">{{ $inspection->mileage }}
                                </td>
                                <td style="text-align:center;" class="table_data">{{ $inspection->date }}
                                </td>
                                <td style="text-align:center;" class="table_data">
                                    {{ $inspection->next_inspection }}</td>
                                <td style="text-align:center;" class="table_data">
                                    @if ($inspection->next_inspection >= date('Y-m-d'))
                                        <button type="button" class="btn btn-success btn-sm">No</button>
                                    @else
                                        <button type="button" class="btn btn-danger btn-sm">Yes</button>
                                    @endif
                                </td>
                                <td style="text-align:center;" class="table_data">
                                    <a href="/details/{{ $inspection->id }}"><i class="fa-solid fa-eye btn  text-white"
                                            style="background:#06064b " data-toggle="tooltip" data-placement="top"
                                            title="View"></i></a>
                                    <a href="/deleteinspection/{{ $inspection->id }}"><i
                                            class="fa-solid fa-trash btn btn-danger" data-toggle="tooltip"
                                            data-placement="right" title="Delete"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
