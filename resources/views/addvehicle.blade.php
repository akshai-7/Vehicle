@extends('layouts.user')
@section('content')
    <div class="">
        <form action="/createvehicle" method="POST" autocomplete="off">
            @csrf
            <div id="userHeading" class="mt-5">
                <h5 style="color:#bf0e3a;"><i class="fa-solid fa-user"></i> Create Vehicle</h5>
                <a href="/vehiclelist">
                    <h4 style="color:#bf0e3a;"> <i class="fa-sharp fa-regular fa-circle-xmark"></i></h4>
                </a>
            </div>
            <div class="report1 mt-4">
                <div class="report">
                    <div class="form-group row mt-4">
                        <label class="col-sm-2 col-form-label">Numberplate</label>
                        <div class="col-sm-9">
                            <input type="text" name="number_plate" class="form-control">
                            <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('number_plate')
                                    *{{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mt-4 ">
                        <label class="col-sm-2 col-form-label">Vehicletype</label>
                        <div class="col-sm-9">
                            <select name="vehicle_type" class="form-select">
                                <option value="">Select</option>
                                <option value="Van">Van</option>
                                <option value="Truck">Truck</option>
                                <option value="Car">Car</option>
                            </select>
                            <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('vehicle_type')
                                    *{{ $message }}
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="form-group row mt-4 ">
                        <label class="col-sm-2 col-form-label">Make</label>
                        <div class="col-sm-9">
                            <input type="text" name="make" class="form-control">
                            <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('make')
                                    *{{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>
                <div class="subreport">
                    <div class="form-group row mt-4 ">
                        <label class="col-sm-2 col-form-label">Model</label>
                        <div class="col-sm-9">
                            <input type="text" name="vehicle_model" class="form-control">
                            <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('vehicle_model')
                                    *{{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mt-4 ">
                        <label class="col-sm-2 col-form-label">Mileage</label>
                        <div class="col-sm-9">
                            <input type="text" name="mileage" class="form-control">
                            <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('mileage')
                                    *{{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mt-4 ">
                        <label class="col-sm-2 col-form-label">Servicedate</label>
                        <div class="col-sm-9">
                            <input type="text" name="service" class="form-control flatdate" placeholder="Select Date">
                            <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('service')
                                    *{{ $message }}
                                @enderror
                            </div>
                            <input type="submit" name="" value="Submit" id="add" class="btn text-white mt-5"
                                style="float:right;">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
