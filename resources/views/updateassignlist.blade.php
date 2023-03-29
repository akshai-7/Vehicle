@extends('layouts.user')
@section('content')
    <div class="userContainer">
        <div id="updatePopup" class="table-data">
            <div class="updateassignPopup">

                <form action="#" method="POST" autocomplete="off">
                    @csrf
                    <a href="/vehicleassignedlist" style="color:black;"><i class="fa-solid fa-xmark"></i></a>

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
        </div>
    </div>
@endsection
