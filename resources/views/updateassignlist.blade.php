@extends('layouts.user')
@section('content')
    <main class="main">
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Vehicle Assigned List</h3>

                </div>
                <table class="table table-bordered mt-3" style="border: 1px solid lightgrey">
                    <thead class="text-primary">
                        <th style="text-align:center;">Id</th>
                        <th style="text-align:center;">Driver Name</th>
                        <th style="text-align:center;">Email</th>
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
                            <p>{{ $assign->id }}</p>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-sm-2 col-form-label">DriverName</label>
                        <div class="col-sm-9">
                            <p>{{ $assign->name }}</p>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <p>{{ $assign->email }}</p>
                        </div>
                    </div>
                    <div class="form-group row mt-4 ">
                        <label class="col-sm-2 col-form-label">Mobile.no</label>
                        <div class="col-sm-9">
                            <p>{{ $assign->mobile }}</p>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-sm-2 col-form-label">Vehicle_Id</label>
                        <div class="col-sm-9">
                            <p>{{ $assign->vehicle_id }}</p>
                        </div>
                    </div>
                    <div class="form-group row mt-4 ">
                        <label class="col-sm-2 col-form-label">Number_plate</label>
                        <div class="col-sm-9">
                            <p>{{ $assign->number_plate }}</p>
                        </div>
                    </div>

                    <div class="form-group row mt-4">
                        <label class="col-sm-2 col-form-label"> Mileage</label>
                        <div class="col-sm-9">
                            <p>{{ $assign->mileage }}</p>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-sm-2 col-form-label"> Assigned_Date</label>
                        <div class="col-sm-9">
                            <p>{{ $assign->created_at }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </form>

    </div>
@endsection
