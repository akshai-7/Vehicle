@extends('layouts.user')
@section('content')
    <div class="head">
        <h3>Dashboard</h3>
    </div>
    <div class="box">

        <a href="/user">
            <div class="box1">
                <div class="driver">
                    <h5><i class="fa-solid fa-user "></i></h5>
                    <h5> Total Drivers</h5>
                </div>
                <div class="count">
                    <h2>{{ $user }}</h2>
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
                    <h2>{{ $vehicle }}</h2>
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
                    <h2>{{ $assign }}</h2>
                </div>
            </div>
        </a>
    </div>
    <div class="box">
        <a href="/inspectiondetails">
            <div class="box1">
                <div class="driver1">
                    <h5><i class="fa-solid fa-list"></i></h5>
                    <h5> Total Inspections</h5>
                </div>
                <div class="count">
                    <h2>{{ $inspection }}</h2>
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
                    <h2>{{ $assign }}</h2>
                </div>
            </div>
        </a>
        <a href="/reportlist">
            <div class="box1">
                <div class="driver1">
                    <h5><i class="fa-solid fa-file "></i></h5>
                    <h5>Report an Incident</h5>
                </div>
                <div class="count">
                    <h2>{{ $report }}</h2>
                </div>
            </div>
        </a>


    </div>
@endsection
