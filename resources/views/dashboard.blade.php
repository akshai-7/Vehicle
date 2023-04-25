@extends('layouts.user')
@section('content')
    <div id="dashboardContainer">
        <div class="head">
            <h3>Dashboard</h3>
        </div>
        <div class="box mt-3">
            <div class="box1">
                <a href="/user" class="boxContainer">
                    <div class="boxContainerValue">
                        <h2><i class="fa-solid fa-user"></i></h2>
                        <h4> Total Drivers</h4>
                    </div>
                    <div class="boxContainertext ">
                        <h1>{{ $user }}</h1>
                    </div>
                </a>
            </div>
            <div class="box1">
                <a href="/vehiclelist" class="boxContainer">

                    <div class="boxContainerValue">
                        <h2><i class="fa-solid fa-car  "></i></h2>
                        <h4> Total Vehicles</h4>
                    </div>
                    <div class="boxContainertext">
                        <h1>{{ $vehicle }}</h1>
                    </div>
                </a>
            </div>
            <div class="box1">
                <a href="/vehicleassignedlist" class="boxContainer">

                    <div class="boxContainerValue">
                        <h2><i class="fa-solid fa-link  "></i></h2>
                        <h4> Assigned Vehicles</h4>
                    </div>
                    <div class="boxContainertext ">
                        <h1>{{ $assign }}</h1>
                    </div>
                </a>
            </div>
        </div>
        <div class="box mt-3">
            <div class="box1">
                <a href="/inspectiondetails" class="boxContainer">

                    <div class="boxContainerValue">
                        <h2><i class="fa-solid fa-list "></i></h2>
                        <h4> Total Inspections</h4>
                    </div>
                    <div class="boxContainertext ">
                        <h1>{{ $inspection }}</h1>
                    </div>
                </a>
            </div>
            <div class="box1">
                <a href="/inspectiondetails" class="boxContainer">

                    <div class="boxContainerValue">
                        <h2><i class="fa-solid fa-list"></i></h2>
                        <h4>Pending Inspections</h4>
                    </div>
                    <div class="boxContainertext">
                        <h1>{{ $assign }}</h1>
                    </div>
                </a>
            </div>
            <div class="box1">
                <a href="/reportlist" class="boxContainer">
                    <div class="boxContainerValue">
                        <h2><i class="fa-solid fa-file  "></i></h2>
                        <h4>Reported Incidents</h4>
                    </div>
                    <div class="boxContainertext">
                        <h1>{{ $report }}</h1>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
