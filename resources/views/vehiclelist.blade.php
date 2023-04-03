@extends('layouts.user')
@section('content')
    <div class="userContainer">
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Vehicle Details</h3>
                    <a style="margin-right: 20px;"><input type="submit" value="Add-Vehicle" id="add"
                            onclick="show('sam')"></a>
                </div>
                <table class="table table-bordered mt-3" style="border: 1px solid lightgrey">
                    <thead>
                        <th style="text-align:center;">Id</th>
                        <th style="text-align:center;">Number plate</th>
                        <th style="text-align:center;">Vehicle Type</th>
                        <th style="text-align:center;">Vehicle Model</th>
                        <th style="text-align:center;">Mileage</th>
                        <th style="text-align:center;">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($vehicles as $vehicle)
                            <tr class="table_row">
                                <td style="text-align:center;" class="table_data">{{ $vehicle->id }}</td>
                                <td style="text-align:center;" class="table_data">{{ $vehicle->number_plate }}
                                </td>
                                <td style="text-align:center;" class="table_data">{{ $vehicle->vehicle_type }}
                                </td>
                                <td style="text-align:center;" class="table_data">{{ $vehicle->vehicle_model }}
                                </td>
                                <td style="text-align:center;" class="table_data">{{ $vehicle->mileage }}</td>
                                <td style="text-align:center;" class="table_data">
                                    <a onclick=" check1({{ $vehicle }})"><i
                                            class="fa-solid fa-edit btn btn-success"></i></a>
                                    <a href="/remove/{{ $vehicle->id }}" data-toggle="tooltip" data-placement="top"
                                        title="Delete"><i class="fa-solid fa-trash btn btn-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="active">
                {!! $vehicles->links() !!}
            </div>
            <div id="sam">
                <div class="vehiclePopUp">
                    <form action="/createvehicle" method="POST" autocomplete="off">
                        @csrf
                        <div id="userHeading">
                            <h5><i class="fa-solid fa-user"></i> Create Vehicle</h5>
                            <a onclick="hide('sam')">
                                <h4 style="color:#bf0e3a;"> <i class="fa-sharp fa-regular fa-circle-xmark"></i></h4>
                            </a>
                        </div>
                        <div class="vehicle">
                            <div class="form-group row mt-4">
                                <label class="col-sm-2 col-form-label">Number_Plate</label>
                                <div class="col-sm-9">
                                    <input type="text" name="number_plate" class="form-control">
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('number_plate')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mt-4 ">
                                <label class="col-sm-2 col-form-label">Vehicle_Type</label>
                                <div class="col-sm-9">
                                    <select name="vehicle_type" class="form-select">
                                        <option value="">Select</option>
                                        <option value="Van">Van</option>
                                        <option value="Truck">Truck</option>
                                        <option value="Car">Car</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mt-4 ">
                                <label class="col-sm-2 col-form-label">Vehicle_Model</label>
                                <div class="col-sm-9">
                                    <input type="text" name="vehicle_model" class="form-control">
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('vehicle_model')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mt-4 ">
                                <label class="col-sm-2 col-form-label"> Mileage</label>
                                <div class="col-sm-9">
                                    <input type="text" name="mileage" class="form-control">
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('mileage')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                    <input type="submit" name="" value="Submit" id="add"
                                        class="btn text-white mt-4" style="float:right;">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div id="sam1">
                <div class="vehiclePopUp1">
                    <div class=>
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
                                <div class="form-group row mt-4">
                                    <label class="col-sm-2 col-form-label">Id</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="id" class="form-control" id="id">
                                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('id')
                                                *{{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mt-4">
                                    <label class="col-sm-2 col-form-label">Number_Plate</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="number_plate" class="form-control"
                                            id="number_plate">
                                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('number_plate')
                                                *{{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mt-4 ">
                                    <label class="col-sm-2 col-form-label">Vehicle_Type</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="vehicle_type" class="form-control"
                                            id="vehicle_type">
                                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('vehicle_type')
                                                *{{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mt-4 ">
                                    <label class="col-sm-2 col-form-label">Vehicle_Model</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="vehicle_model" class="form-control"
                                            id="vehicle_model">
                                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('vehicle_model')
                                                *{{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mt-4">
                                    <label class="col-sm-2 col-form-label"> Mileage</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="mileage" class="form-control" id="mileage">
                                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('mileage')
                                                *{{ $message }}
                                            @enderror
                                        </div>
                                        <input type="submit" name="" id="add" value="Submit"
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
