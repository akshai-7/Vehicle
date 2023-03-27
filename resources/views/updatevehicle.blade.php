@extends('layouts.user')
@section('content')
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Vehicle Details</h3>
            </div>
            <table class="table table-bordered mt-3" style="border: 1px solid lightgrey">
                <thead class="text-primary">
                    <th style="text-align:center;">Id</th>
                    <th style="text-align:center;">Number plate</th>
                    <th style="text-align:center;">Vehicle Type</th>
                    <th style="text-align:center;">Mileage</th>
                    <th style="text-align:center;">Action</th>
                </thead>
                <tbody>
                    @foreach ($vehicle as $vehicle)
                        <tr class="table_row">
                            <td style="text-align:center;" class="table_data">{{ $vehicle->id }}</td>
                            <td style="text-align:center;" class="table_data">{{ $vehicle->number_plate }}
                            <td style="text-align:center;" class="table_data">{{ $vehicle->vehicle_type }}
                            </td>
                            <td style="text-align:center;" class="table_data">{{ $vehicle->mileage }}Km
                            </td>
                            <td style="text-align:center;" class="table_data">
                                <a onclick="show('popup4')"><i class="fa-solid fa-edit btn btn-success"></i></i></a>
                                <a href="/remove/{{ $vehicle->id }}"><i class="fa-solid fa-trash btn btn-danger"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="popup4" id="popup4">
        <form action="/updatevehicle/{id}" method="POST" autocomplete="off">
            @csrf
            <a href="/vehiclelist" style="color:black;" class="close"><i class="fa-solid fa-xmark"></i></a>
            <h5 class=""><i class="fa-solid fa-user"></i> Update Vehicle</h5>
            <div class="vehicle">
                <div class="form-group row mt-4">
                    <label class="col-sm-2 col-form-label">Id</label>
                    <div class="col-sm-9">
                        <input type="text" name="id" class="form-control" value="{{ $vehicle->id }}">
                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('id')
                                *{{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row mt-4">
                    <label class="col-sm-2 col-form-label">Number_Plate</label>
                    <div class="col-sm-9">
                        <input type="text" name="number_plate" class="form-control" value="{{ $vehicle->number_plate }}">
                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('number_plate')
                                *{{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row mt-4 ">
                    <label class="col-sm-2 col-form-label">Vehicle_Type</label>
                    <div class="col-sm-9">
                        <input type="text" name="vehicle_type" class="form-control" value="{{ $vehicle->vehicle_type }}">
                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('vehicle_type')
                                *{{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row mt-4">
                    <label class="col-sm-2 col-form-label"> Mileage</label>
                    <div class="col-sm-9">
                        <input type="text" name="mileage" class="form-control" value="{{ $vehicle->mileage }}">
                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('mileage')
                                *{{ $message }}
                            @enderror
                        </div>
                        <input type="submit" name="" id="add" value="Submit" class="btn text-white mt-4"
                            style="float:right;">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
