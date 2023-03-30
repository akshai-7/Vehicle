@extends('layouts.user')
@section('content')
    <div class="userContainer">
        <div id="updatePopup" class="table-data">
            <div class="updateassignPopup">

                <form action="#" method="POST" autocomplete="off">
                    @csrf
                    <div id="userHeading">
                        <h4 style="margin-top: 2%">
                            Vehicle Assigned Details
                        </h4>
                        <a href="/vehicleassignedlist">
                            <h4 style="color:#bf0e3a;"> <i class="fa-sharp fa-regular fa-circle-xmark"></i></h4>
                        </a>
                    </div>

                    <div class="vehicle">
                        @foreach ($assign as $assign)
                            <div class="form-group row mt-4">
                                <label class="col-sm-2 ">User_Id</label>
                                <div class="col-sm-9">
                                    <p>{{ $assign->id }}</p>
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <label class="col-sm-2 ">DriverName</label>
                                <div class="col-sm-9">
                                    <p>{{ $assign->name }}</p>
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <label class="col-sm-2 ">Email</label>
                                <div class="col-sm-9">
                                    <p>{{ $assign->email }}</p>
                                </div>
                            </div>
                            <div class="form-group row mt-4 ">
                                <label class="col-sm-2 ">Mobile.no</label>
                                <div class="col-sm-9">
                                    <p>{{ $assign->mobile }}</p>
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <label class="col-sm-2 ">Vehicle_Id</label>
                                <div class="col-sm-9">
                                    <p>{{ $assign->vehicle_id }}</p>
                                </div>
                            </div>
                            <div class="form-group row mt-4 ">
                                <label class="col-sm-2 ">Number_plate</label>
                                <div class="col-sm-9">
                                    <p>{{ $assign->number_plate }}</p>
                                </div>
                            </div>

                            <div class="form-group row mt-4">
                                <label class="col-sm-2 "> Mileage</label>
                                <div class="col-sm-9">
                                    <p>{{ $assign->mileage }}</p>
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <label class="col-sm-2 "> Assigned_Date</label>
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
