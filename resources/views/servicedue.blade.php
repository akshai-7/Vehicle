@extends('layouts.user')
@section('content')
    {{-- <div>
        <div class="card card-1"></div>
        <div class="card card-2"></div>
    </div>
    <div>
        <div class="card card-3"></div>
        <div class="card card-4"></div>
    </div> --}}
    <div class="button mt-3">
        <button class="tablinks " onclick="openCheck(event, 'Pending')" id="defaultOpen">
            {{-- <h6>Pending Vehicle Inspection-{{ $asigncounts }} --}}
            </h6>
        </button>
        <button class="tablinks" onclick="openCheck(event, 'ServiceDue')">
            {{-- <h6>Service Due-{{ $vehiclecount }}</h6> --}}
        </button>
        <button class="tablinks" onclick="openCheck(event, 'Inspection')">
            {{-- <h6>Damaged Vehicle Details-{{ $inspectionListscount }} </h6> --}}
        </button>
        <button class="tablinks" onclick="openCheck(event, 'Reported')">
            {{-- <h6>Reported Incidents-{{ $reportcount }}</h6> --}}
        </button>
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
                                {{ Carbon\Carbon::parse($vehicle->nextservice)->format('d/m/Y') }}</td>
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
            @if (count($vehicles) < 1)
                <div id="dataNotFound">
                    <p>Data not found</p>
                </div>
            @endif
        </div>
    </div>
    <div id="sam1">
        <div class="vehiclePopUp2">
            <div>
                <form action="/updatevehicle/{id}" method="POST" autocomplete="off">
                    @csrf
                    <div id="userHeading">
                        <h5 class="" style="color:#bf0e3a;"><i class="bi bi-calendar-date"></i> Update Service
                            Date
                        </h5>
                        <a href="/dashboard">
                            <h4 style="color:#bf0e3a;"> <i class="fa-sharp fa-regular fa-circle-xmark"></i></h4>
                        </a>
                    </div>
                    <div class="form-group  mt-5 ">
                        <label class="col-sm-3 mt-2">Service Date</label>
                        <div class="col-sm-9">
                            <input type="hidden" name="path" class="form-control" value="Dashboard">
                            <input type="text" name="service" class="form-control flatdate" placeholder="Select Date"
                                id="service">
                            <input type="submit" name="" value="Submit" id="add" class="btn text-white mt-4"
                                style="float:right;">
                        </div>
                    </div>
                    <div class="vehicle">
                        <div class="form-group row mt-3">
                            <div class="col-sm-9">
                                <input type="hidden" name="id" class="form-control" id="id" readonly>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            {{-- <label class="col-sm-3 col-form-label">Number Plate</label> --}}
                            <div class="col-sm-9">
                                <input type="hidden" name="number_plate" class="form-control" id="number_plate" readonly>
                            </div>
                        </div>
                        <div class="form-group row mt-3 ">
                            {{-- <label class="col-sm-3 col-form-label">Vehicle Type</label> --}}
                            <div class="col-sm-9">
                                <input type="hidden" name="vehicle_type" class="form-control" id="vehicle_type" readonly>
                            </div>
                        </div>
                        <div class="form-group row mt-3 ">
                            {{-- <label class="col-sm-2 col-form-label">Make</label> --}}
                            <div class="col-sm-9">
                                <input type="hidden" name="make" class="form-control" id="make" readonly>
                            </div>
                        </div>
                        <div class="form-group row mt-3 ">
                            {{-- <label class="col-sm-2 col-form-label">Model</label> --}}
                            <div class="col-sm-9">
                                <input type="hidden" name="vehicle_model" class="form-control" id="vehicle_model"
                                    readonly>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            {{-- <label class="col-sm-2 col-form-label"> Mileage</label> --}}
                            <div class="col-sm-9">
                                <input type="hidden" name="mileage" class="form-control" id="mileage" readonly>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
