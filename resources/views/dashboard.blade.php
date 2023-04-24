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
                        <h3><i class="fa-solid fa-user mt-5 "></i></h3>
                        <h3> Total_Drivers</h3>
                    </div>
                    <div class="boxContainerValue mb-5">
                        <h1>{{ $user }}</h1>
                    </div>
                </a>
            </div>
            <div class="box1">
                <a href="/vehiclelist" class="boxContainer">

                    <div class="boxContainerValue">
                        <h3><i class="fa-solid fa-car  mt-5"></i></h3>
                        <h3> Total_Vehicles</h3>
                    </div>
                    <div class="boxContainerValue mb-5">
                        <h1>{{ $vehicle }}</h1>
                    </div>
                </a>
            </div>
            <div class="box1">
                <a href="/vehicleassignedlist" class="boxContainer">

                    <div class="boxContainerValue">
                        <h3><i class="fa-solid fa-link mt-5 "></i></h3>
                        <h3> Assigned_Vehicles</h3>
                    </div>
                    <div class="boxContainerValue mb-5">
                        <h1>{{ $assign }}</h1>
                    </div>
                </a>
            </div>
        </div>
        <div class="box mt-3">
            <div class="box1">
                <a href="/inspectiondetails" class="boxContainer">

                    <div class="boxContainerValue">
                        <h3><i class="fa-solid fa-list mt-5"></i></h3>
                        <h3> Total_Inspections</h3>
                    </div>
                    <div class="boxContainerValue mb-5">
                        <h1>{{ $inspection }}</h1>
                    </div>
                </a>
            </div>
            <div class="box1">
                <a href="/inspectiondetails" class="boxContainer">

                    <div class="boxContainerValue">
                        <h3><i class="fa-solid fa-list mt-5"></i></h3>
                        <h3>Pending_Inspections</h3>
                    </div>
                    <div class="boxContainerValue mb-5">
                        <h1>{{ $assign }}</h1>
                    </div>
                </a>
            </div>
            <div class="box1">
                <a href="/reportlist" class="boxContainer">
                    <div class="boxContainerValue">
                        <h3><i class="fa-solid fa-file mt-4 "></i></h3>
                        <h3>Reported_Incidents</h3>
                    </div>
                    <div class="boxContainerValue mb-5">
                        <h1>{{ $report }}</h1>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
