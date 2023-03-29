@extends('layouts.user')
@section('content')
    <div class="userContainer">
        <div id="updatePopup" class="table-data">
            <div class="updatePopup">
                <form action="/updatevehicle/{id}" method="POST" autocomplete="off">
                    @csrf
                    <a href="/vehiclelist" style="color:black;" class="close"><i class="fa-solid fa-xmark"></i></a>
                    <h5 class=""><i class="fa-solid fa-user"></i> Update Vehicle</h5>
                    @foreach ($vehicle as $vehicle)
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
                                    <input type="text" name="number_plate" class="form-control"
                                        value="{{ $vehicle->number_plate }}">
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
                                        value="{{ $vehicle->vehicle_type }}">
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('vehicle_type')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <label class="col-sm-2 col-form-label"> Mileage</label>
                                <div class="col-sm-9">
                                    <input type="text" name="mileage" class="form-control"
                                        value="{{ $vehicle->mileage }}">
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('mileage')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                    <input type="submit" name="" id="add" value="Submit"
                                        class="btn text-white mt-4" style="float:right;">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </form>
            </div>
        </div>
    </div>
@endsection
