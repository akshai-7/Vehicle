@extends('layouts.user')
@section('content')
    <div class="button mt-3">
        <button class="tablinks " onclick="openCheck(event, 'Pending')" id="defaultOpen">
            <h6>Pending Vehicle Inspection-{{ $asigncounts }}
            </h6>
        </button>
        <button class="tablinks" onclick="openCheck(event, 'ServiceDue')">
            <h6>Service Due-{{ $vehiclecount }}</h6>
        </button>
        <button class="tablinks" onclick="openCheck(event, 'Inspection')">
            <h6>Damaged Vehicle Details-{{ $inspectionListscount }} </h6>
        </button>
        <button class="tablinks" onclick="openCheck(event, 'Reported')">
            <h6>Reported Incidents-{{ $reportcount }}</h6>
        </button>
    </div>
    <div class="table-datas  mt-4 tabcontent" id="Pending">
        <div class="order">
            <div class="head">
                <h3>Pending Vehicle Inspection</h3>
            </div>
            <table class="table table-bordered mt-3" style="border: 1px solid lightgrey">
                <thead class="text-primary">
                    <th style="text-align:center;">S.No</th>
                    <th style="text-align:center;">Report No</th>
                    <th style="text-align:center;">Driver Name</th>
                    <th style="text-align:center;">Number Plate</th>
                    <th style="text-align:center;">Next Inspection</th>
                    <th style="text-align:center;">Over Due</th>
                </thead>
                <tbody>
                    @foreach ($assigns as $assign)
                        @if ($assign->next_inspection <= Carbon\Carbon::today())
                            <tr class="table_row">
                                <td style="text-align:center;">
                                    @php
                                        $date = $assign->created_at;
                                        $dates = $date->weekOfYear;
                                        $fiscalYearStart = date('01-04-Y');
                                        $diff = strtotime($date) - strtotime($fiscalYearStart);
                                        $weekNumber = ceil($diff / (7 * 24 * 60 * 60));
                                    @endphp
                                    {{ \Carbon\Carbon::now()->format('y') }}W{{ $weekNumber }}{{ $assign->id }}
                                </td>
                                <td style="text-align:center;">{{ $assign->report_no }}</td>
                                <td style="text-align:center;">{{ $assign->name }}</td>
                                <td style="text-align:center;">{{ $assign->number_plate }}
                                </td>
                                <td style="text-align:center;">
                                    {{ Carbon\Carbon::parse($assign->next_inspection)->format('d/m/Y') }}
                                </td>
                                <td style="text-align:center;">
                                    @if ($assign->next_inspection >= Carbon\Carbon::today())
                                        <button type="button" class="btn btn-success btn-sm">No</button>
                                    @else
                                        <button type="button" class="btn btn-danger btn-sm">Yes</button>
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="table-datas mt-4 tabcontent" id="ServiceDue">
        <div class="order">
            <div class="head">
                <h3>Service Due</h3>
            </div>
            <table class="table table-bordered mt-3" style="border: 1px solid lightgrey">
                <thead>
                    <th style="text-align:center;">S.No</th>
                    <th style="text-align:center;">NumberPlate</th>
                    <th style="text-align:center;">Vehicle Type</th>
                    <th style="text-align:center;">Make</th>
                    <th style="text-align:center;">Model</th>
                    <th style="text-align:center;">Service Date</th>
                    <th style="text-align:center;">Next Service Date</th>
                    <th style="text-align:center;">Over Due</th>
                    <th style="text-align:center;">Action</th>
                </thead>
                <tbody>
                    @foreach ($vehicles as $vehicle)
                        <tr class="table_row">
                            <td style="text-align:center;" class="table_data">
                                @php
                                    $date = $vehicle->created_at;
                                    $dates = $date->weekOfYear;
                                    $fiscalYearStart = date('01-04-Y');
                                    $diff = strtotime($date) - strtotime($fiscalYearStart);
                                    $weekNumber = ceil($diff / (7 * 24 * 60 * 60));
                                @endphp
                                {{ \Carbon\Carbon::now()->format('y') }}W{{ $weekNumber }}{{ $vehicle->id }}
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
                            <td style="text-align:center;" class="table_data">
                                @if ($vehicle->servicestatus == 'YES')
                                    <button type="button" class="btn btn-danger btn-sm">Yes</button>
                                @endif
                            </td>
                            <td style="text-align:center;" class="table_data">
                                <a onclick=" check1({{ $vehicle }})"><i
                                        class="bi bi-pencil-square  btn btn-success btn-sm"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="table-datas mt-4 tabcontent" id="Inspection">
        <div class="order">
            <div class="head">
                <h3> Damaged Vehicle Details</h3>
            </div>
            <table class="table table-bordered mt-3" style="border: 1px solid lightgrey;">
                <tbody>
                    <thead class="text-primary">
                        <th style="text-align:center;">S.No</th>
                        <th style="text-align:center;">Report.no</th>
                        <th style="text-align:center;">Driver Name</th>
                        <th style="text-align:center;">Number Plate</th>
                    </thead>
                    @foreach ($inspectionLists as $inspection)
                        <tr class="table_row">
                            <td style="text-align:center;">
                                @php
                                    $date = $inspection->created_at;
                                    $dates = $date->weekOfYear;
                                    $fiscalYearStart = date('01-04-Y');
                                    $diff = strtotime($date) - strtotime($fiscalYearStart);
                                    $weekNumber = ceil($diff / (7 * 24 * 60 * 60));
                                @endphp
                                {{ \Carbon\Carbon::now()->format('y') }}W{{ $weekNumber }}{{ $inspection->id }}
                            </td>
                            <td style="text-align:center;">{{ $inspection->report_no }}
                            </td>
                            <td style="text-align:center;">{{ $inspection->name }}</td>
                            <td style="text-align:center;">
                                {{ $inspection->number_plate }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if (count($inspectionLists) < 1)
                <div id="dataNotFound">
                    <p>Data not found</p>
                </div>
            @endif
        </div>
    </div>
    <div class="table-datas mt-4 tabcontent" id="Reported">
        <div class="order">
            <div class="head">
                <h3>Reported Incidents</h3>
            </div>
            <table class="table table-bordered mt-3" style="border: 1px solid lightgrey;">
                <tbody>
                    <thead class="text-primary">
                        <th style="text-align:center;">S.No</th>
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
                            <td style="text-align:center;" class="table_data">
                                @php
                                    $date = $report->created_at;
                                    $dates = $date->weekOfYear;
                                    $fiscalYearStart = date('01-04-Y');
                                    $diff = strtotime($date) - strtotime($fiscalYearStart);
                                    $weekNumber = ceil($diff / (7 * 24 * 60 * 60));
                                @endphp
                                {{ \Carbon\Carbon::now()->format('y') }}W{{ $weekNumber }}{{ $report->id }}
                            </td>
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
    </div>
    <div id="sam1">
        <div class="vehiclePopUp1">
            <div>
                <form action="/updatevehicle/{id}" method="POST" autocomplete="off">
                    @csrf
                    <div id="userHeading">
                        <h5 class="" style="color:#bf0e3a;"><i class="fa-solid fa-car"></i> Update Vehicle
                        </h5>
                        <a href="/dashboard">
                            <h4 style="color:#bf0e3a;"> <i class="fa-sharp fa-regular fa-circle-xmark"></i></h4>
                        </a>
                    </div>
                    <div class="vehicle">
                        <div class="form-group row mt-3">
                            <label class="col-sm-2 col-form-label">Id</label>
                            <div class="col-sm-9">
                                <input type="text" name="id" class="form-control" id="id" readonly>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label class="col-sm-3 col-form-label">Number Plate</label>
                            <div class="col-sm-9">
                                <input type="text" name="number_plate" class="form-control" id="number_plate"
                                    readonly>
                            </div>
                        </div>
                        <div class="form-group row mt-3 ">
                            <label class="col-sm-3 col-form-label">Vehicle Type</label>
                            <div class="col-sm-9">
                                <input type="text" name="vehicle_type" class="form-control" id="vehicle_type"
                                    readonly>
                            </div>
                        </div>
                        <div class="form-group row mt-3 ">
                            <label class="col-sm-2 col-form-label">Make</label>
                            <div class="col-sm-9">
                                <input type="text" name="make" class="form-control" id="make" readonly>
                            </div>
                        </div>
                        <div class="form-group row mt-3 ">
                            <label class="col-sm-2 col-form-label">Model</label>
                            <div class="col-sm-9">
                                <input type="text" name="vehicle_model" class="form-control" id="vehicle_model"
                                    readonly>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label class="col-sm-2 col-form-label"> Mileage</label>
                            <div class="col-sm-9">
                                <input type="text" name="mileage" class="form-control" id="mileage" readonly>
                            </div>
                        </div>
                        <div class="form-group row mt-3 ">
                            <label class="col-sm-3 col-form-label">Service Date</label>
                            <div class="col-sm-9">
                                <input type="hidden" name="path" class="form-control" value="Dashboard">
                                <input type="text" name="service" class="form-control flatdate"
                                    placeholder="Select Date" id="service">
                                <input type="submit" name="" value="Submit" id="add"
                                    class="btn text-white mt-4" style="float:right;">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
