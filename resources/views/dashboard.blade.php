@extends('layouts.user')
@section('content')
    <div class="table-datas">
        <div class="order">
            <div class="head">
                <h3>Pending Vehicle Inspection</h3>
            </div>
            <table class="table table-bordered mt-3" style="border: 1px solid lightgrey">
                <thead class="text-primary">
                    <th style="text-align:center;">Id</th>
                    <th style="text-align:center;">Report No</th>
                    <th style="text-align:center;">Driver Name</th>
                    <th style="text-align:center;">Number Plate</th>
                    <th style="text-align:center;">Next Inspection</th>
                    {{-- <th style="text-align:center;">Over Due</th> --}}
                </thead>
                <tbody>
                    @foreach ($assigns as $assign)
                        <tr class="table_row">
                            <td style="text-align:center;">{{ $assign->id }}</td>
                            <td style="text-align:center;">{{ $assign->report_no }}</td>
                            <td style="text-align:center;">{{ $assign->name }}</td>
                            <td style="text-align:center;">{{ $assign->number_plate }}
                            </td>
                            <td style="text-align:center;">
                                {{ Carbon\Carbon::parse($assign->next_inspection)->format('d/m/Y') }}
                            </td>
                            {{-- <td style="text-align:center;">
                                @if ($assign->next_inspection >= Carbon\Carbon::today())
                                    <button type="button" class="btn btn-success btn-sm">No</button>
                                @else
                                    <button type="button" class="btn btn-danger btn-sm">Yes</button>
                                @endif
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="active">
            {!! $assigns->links() !!}
        </div>
    </div>
    <div class="table-datas mt-5">
        <div class="order">
            <div class="head">
                <h3>Service Due</h3>
            </div>
            <table class="table table-bordered mt-3" style="border: 1px solid lightgrey">
                <thead>
                    <th style="text-align:center;">ID</th>
                    <th style="text-align:center;">NumberPlate</th>
                    <th style="text-align:center;">Vehicle Type</th>
                    <th style="text-align:center;">Make</th>
                    <th style="text-align:center;">Model</th>
                    <th style="text-align:center;">Service Date</th>
                    <th style="text-align:center;">Next Service Date</th>
                </thead>
                <tbody>
                    @foreach ($vehicles as $vehicle)
                        <tr class="table_row">
                            <td style="text-align:center;" class="table_data">{{ $vehicle->id }}
                            </td>
                            <td style="text-align:center;" class="table_data">{{ $vehicle->number_plate }}
                            </td>
                            <td style="text-align:center;" class="table_data">{{ $vehicle->vehicle_type }}
                            </td>
                            <td style="text-align:center;" class="table_data">{{ $vehicle->make }}
                            </td>
                            <td style="text-align:center;" class="table_data">{{ $vehicle->vehicle_model }}
                            </td>
                            <td style="text-align:center;" class="table_data">
                                {{ Carbon\Carbon::parse($vehicle->servicedate)->format('d/m/Y') }}</td>
                            <td style="text-align:center;" class="table_data">
                                {{ Carbon\Carbon::parse($vehicle->servicedate)->addYear(1)->format('d/m/Y') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="active">
            {!! $vehicles->links() !!}
        </div>
    </div>
    <div class="table-datas mt-5">
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
                        <th style="text-align:center;">Number Plate</th>
                        </th>
                        <th style="text-align:center;">Date</th>
                        <th style="text-align:center;">Statement</th>
                        <th style="text-align:center;">Mobile.no</th>
                    </thead>
                    @foreach ($reports as $report)
                        <tr class="table_row">
                            <td style="text-align:center;" class="table_data">{{ $report->id }}</td>
                            <td style="text-align:center;" class="table_data">{{ $report->assign->name }}</td>
                            <td style="text-align:center;" class="table_data">{{ $report->assign->number_plate }}
                            </td>
                            <td style="text-align:center;" class="table_data">
                                {{ Carbon\Carbon::parse($report->date)->format('d/m/Y') }}
                            </td>
                            <td style="text-align:center;width:300px;" class="table_data">{{ $report->statement }}
                            </td>
                            <td style="text-align:center;width:300px;" class="table_data">{{ $report->mobile }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="active">
            {!! $reports->links() !!}
        </div>
    </div>
@endsection
