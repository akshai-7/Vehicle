@extends('layouts.user')
@section('content')
    <div class="userContainer">
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Vehicle Details</h3>
                    <a href="/addvehicle" style="margin-right: 20px;"><input type="submit" value="AddVehicle"
                            id="add"></a>
                </div>
                <div class="serachbar">
                    <form action="/vehiclelists" method="GET" autocomplete="off" style="margin-left:-5px">
                        <div id="filterDiv1">
                            <div class="col-md-11">
                                <label></label>
                                <select class="form-select form-control" name="number_plate">
                                    @if (isset($_GET['number_plate']))
                                        <option value="{{ $_GET['number_plate'] }}">{{ $_GET['number_plate'] }}</option>
                                        @foreach ($datas as $data)
                                            <option value="{{ $data->number_plate }}">
                                                {{ $data->number_plate }}</option>
                                        @endforeach
                                    @else
                                        <option>Select Number plate</option>
                                        @foreach ($datas as $data)
                                            <option value="{{ $data->number_plate }}">
                                                {{ $data->number_plate }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-5" style="margin-left: 6px">
                                <br />
                                <button type="submit" class="btn btn-primary btn-sm mt-1"><i
                                        class="bi bi-funnel-fill"></i></button>
                                <a href="/vehiclelist" class="btn btn-success btn-sm mt-1"><i
                                        class="fa-solid fa fa-refresh"></i></a>
                            </div>
                        </div>
                    </form>
                    <form action="/searchbar" method="GET" style="margin-left:46%" autocomplete="off">
                        <div id="filterDiv1">
                            <div class="col-md-9">
                                <label></label>
                                @if (isset($_GET['query']))
                                    <input type="text" name="query" placeholder="Vehicle Type/Make/Model"
                                        class="form-control" value="{{ $_GET['query'] }}">
                                @else
                                    <input type="text" name="query" placeholder="Vehicle Type/Make/Model"
                                        class="form-control">
                                @endif
                            </div>
                            <div class="col-md-5" style="margin-left: 6px">
                                <br />
                                <button type="submit" class="btn btn-primary btn-sm mt-1"><i
                                        class="fa-solid fa-magnifying-glass"></i></i></button>
                                <a href="/vehiclelist" class="btn btn-success btn-sm mt-1"><i
                                        class="fa-solid fa fa-refresh"></i></a>
                            </div>
                        </div>
                    </form>
                </div>
                <table class="table table-bordered mt-3" style="border: 1px solid lightgrey">
                    <thead>
                        <th style="text-align:center;">S.No</th>
                        <th style="text-align:center;">Number plate</th>
                        <th style="text-align:center;">Vehicle Type</th>
                        <th style="text-align:center;">Make</th>
                        <th style="text-align:center;">Model</th>
                        <th style="text-align:center;">Mileage</th>
                        <th style="text-align:center;">Service Date</th>
                        <th style="text-align:center;">Next Service Date</th>
                        <th style="text-align:center;">Service Due</th>
                        <th style="text-align:center;">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($vehicles as $vehicle)
                            <tr class="table_row">
                                <td style="text-align:center;" class="table_data">
                                    @php
                                        $date = $vehicle->created_at;
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
                                <td style="text-align:center;" class="table_data">{{ $vehicle->mileage }}</td>
                                <td style="text-align:center;" class="table_data">
                                    {{ Carbon\Carbon::parse($vehicle->servicedate)->format('d/m/Y') }}</td>
                                <td style="text-align:center;" class="table_data">
                                    {{ Carbon\Carbon::parse($vehicle->nextservice)->format('d/m/Y') }}</td>
                                </td>
                                <td style="text-align:center;">
                                    @if ($vehicle->servicestatus == 'YES')
                                        <button type="button" class="btn btn-danger btn-sm">Yes</button>
                                    @else
                                        <button type="button" class="btn btn-success btn-sm">No</button>
                                    @endif
                                </td>
                                <td style="text-align:center;" class="table_data">
                                    <a onclick=" check1({{ $vehicle }})"><i
                                            class="bi bi-pencil-square  btn btn-success btn-sm"></i></a>
                                    <a href="/remove/{{ $vehicle->id }}" data-toggle="tooltip" data-placement="top"
                                        title="Delete"
                                        onclick="event.preventDefault(); deletevehicle('{{ $vehicle->id }}');"><i
                                            class="bi bi-trash-fill btn btn-danger btn-sm"></i></a>
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
            <div class="active">
                {!! $vehicles->links() !!}
            </div>
            <div id="sam1">
                <div class="vehiclePopUp1">
                    <div>
                        <form action="/updatevehicle/{id}" method="POST" autocomplete="off">
                            @csrf
                            <div id="userHeading">
                                <h5 class="" style="color:#bf0e3a;"><i class="fa-solid fa-car"></i> Update Vehicle
                                </h5>
                                <a href="/vehiclelist">
                                    <h4 style="color:#bf0e3a;"> <i class="fa-sharp fa-regular fa-circle-xmark"></i></h4>
                                </a>
                            </div>
                            <div class="vehicle">
                                <div class="form-group row mt-3">
                                    <label class="col-sm-2 col-form-label">Id</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="id" class="form-control" id="id">
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <label class="col-sm-3 col-form-label">Number Plate</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="number_plate" class="form-control"
                                            id="number_plate">
                                    </div>
                                </div>
                                <div class="form-group row mt-3 ">
                                    <label class="col-sm-3 col-form-label">Vehicle Type</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="vehicle_type" class="form-control"
                                            id="vehicle_type">
                                    </div>
                                </div>
                                <div class="form-group row mt-3 ">
                                    <label class="col-sm-2 col-form-label">Make</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="make" class="form-control" id="make">
                                    </div>
                                </div>
                                <div class="form-group row mt-3 ">
                                    <label class="col-sm-2 col-form-label">Model</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="vehicle_model" class="form-control"
                                            id="vehicle_model">
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <label class="col-sm-2 col-form-label"> Mileage</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="mileage" class="form-control" id="mileage">
                                    </div>
                                </div>
                                <div class="form-group row mt-3 ">
                                    <label class="col-sm-3 col-form-label">Service Date</label>
                                    <div class="col-sm-9">
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
        </div>
    </div>
@endsection
