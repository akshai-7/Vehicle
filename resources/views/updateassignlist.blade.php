@extends('layouts.user')
@section('content')
    <main class="main">
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Vehicle Assigned List</h3>
                    <a style="margin-right: 10px;" type="" onclick="show('popup8')"><i
                            class="fa-solid fa-plus btn btn-secondary"></i></a>
                    <a style="margin-right: 10px;" type="" onclick="show('popreport')"><i
                            class="fa-solid fa-file btn btn-primary"></i></a>
                </div>
                <table class="table table-bordered mt-3" style="border: 1px solid lightgrey">
                    <thead class="text-primary">
                        <th style="text-align:center;">Id</th>
                        {{-- <th style="text-align:center;">Driver_Id</th> --}}
                        <th style="text-align:center;">Driver Name</th>
                        <th style="text-align:center;">Email</th>
                        {{-- <th style="text-align:center;">Mobile.No</th> --}}
                        {{-- <th style="text-align:center;">Vehicle_Id</th> --}}
                        <th style="text-align:center;">Number plate</th>
                        <th style="text-align:center;">Mileage</th>
                        <th style="text-align:center;">Action</th>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </main>
    </div>
    <div class="popup9" id="popup9">
        <form action="#" method="POST" autocomplete="off">
            @csrf
            <a href="/vehicleassignedlist" style="color:black;" class="close"><i class="fa-solid fa-xmark"></i></a>

            <h5 class="">Vehicle Assigned Details</h5>

            <div class="vehicle">
                @foreach ($assign as $assign)
                    <div class="form-group row mt-4">
                        <label class="col-sm-2 col-form-label">User_Id</label>
                        <div class="col-sm-9">
                            <input type="text" name="" class="form-control" value="{{ $assign->user_id }}">
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" class="form-control" value="{{ $assign->name }}">
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="text" name="" class="form-control" value="{{ $assign->email }}">
                        </div>
                    </div>
                    <div class="form-group row mt-4 ">
                        <label class="col-sm-2 col-form-label">Mobile.no</label>
                        <div class="col-sm-9">
                            <input type="text" name="mobile" class="form-control" value="{{ $assign->mobile }}">
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-sm-2 col-form-label">Vehicle_Id</label>
                        <div class="col-sm-9">
                            <input type="text" name="" class="form-control" value="{{ $assign->vehicle_id }}">
                        </div>
                    </div>
                    <div class="form-group row mt-4 ">
                        <label class="col-sm-2 col-form-label">Number_plate</label>
                        <div class="col-sm-9">
                            <input type="text" name="" class="form-control" value="{{ $assign->number_plate }}">
                        </div>
                    </div>

                    <div class="form-group row mt-4">
                        <label class="col-sm-2 col-form-label"> Mileage</label>
                        <div class="col-sm-9">
                            <input type="text" name="mileage" class="form-control" value="{{ $assign->mileage }}">
                        </div>
                        <div class="form-group row mt-4">
                            <label class="col-sm-2 col-form-label"> Assigned_Date</label>
                            <div class="col-sm-9">
                                <input type="text" name="mileage" class="form-control" value="{{ $assign->created_at }}">
                            </div>
                        </div>
                @endforeach
            </div>
        </form>

    </div>
@endsection
