@extends('layouts.user')
@section('content')
    <div class="box">
        <a href="">
            <div class="box1">
                <div class="driver">
                    <h5><i class="fa-solid fa-user "></i></h5>
                    <h5> Total Drivers</h5>
                </div>
                <div class="count">
                    <h1>{{ $user }}</h1>
                </div>
            </div>
        </a>
        <a href="/vehiclelist">
            <div class="box1">
                <div class="driver">
                    <h5><i class="fa-solid fa-car "></i></h5>
                    <h5> Total Vehicles</h5>
                </div>
                <div class="count">
                    <h1>{{ $vehicle }}</h1>
                </div>
            </div>
        </a>
        <a href="/vehicleassignedlist">
            <div class="box1">
                <div class="driver1">
                    <h5><i class="fa-solid fa-link "></i></h5>
                    <h5> Assigned Vehicles</h5>
                </div>
                <div class="count">
                    <h1>{{ $assign }}</h1>
                </div>
            </div>
        </a>
        <a href="/inspectiondetails">
            <div class="box1">
                <div class="driver1">
                    <h5><i class="fa-solid fa-list"></i></h5>
                    <h5> Total Inspections</h5>
                </div>
                <div class="count">
                    <h1>{{ $inspection }}</h1>
                </div>
            </div>
        </a>
        <a href="/inspectiondetails">
            <div class="box1">
                <div class="driver1">
                    <h5><i class="fa-solid fa-list "></i></h5>
                    <h5>Pending Inspections</h5>
                </div>
                <div class="count">
                    <h1>{{ $assign }}</h1>
                </div>
            </div>
        </a>

    </div>
@endsection
