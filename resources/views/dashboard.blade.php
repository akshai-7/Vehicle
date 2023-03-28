@extends('layouts.user')
@section('content')
    <div id="dashboardContainer">
        <div class="head">
            <h3>Dashboard</h3>
        </div>
        <div class="box">


            <div class="box1">
                <a href="/user" class="boxContainer">
                    <div class="boxContainerValue">
                        <h5><i class="fa-solid fa-user "></i></h5>
                        <h5> Total Drivers</h5>
                    </div>
                    <div class="boxContainerValue">
                        <h2>{{ $user }}</h2>
                    </div>
                </a>

            </div>
            <div class="box1">
                <a href="/vehiclelist" class="boxContainer">

                    <div class="boxContainerValue">
                        <h5><i class="fa-solid fa-car "></i></h5>
                        <h5> Total Vehicles</h5>
                    </div>
                    <div class="boxContainerValue">
                        <h2>{{ $vehicle }}</h2>
                    </div>
                </a>
            </div>
            <div class="box1">
                <a href="/vehicleassignedlist" class="boxContainer">

                    <div class="boxContainerValue">
                        <h5><i class="fa-solid fa-link "></i></h5>
                        <h5> Assigned Vehicles</h5>
                    </div>
                    <div class="boxContainerValue">
                        <h2>{{ $assign }}</h2>
                    </div>
                </a>
            </div>


        </div>
        <div class="box">
            <div class="box1">
                <a href="/inspectiondetails" class="boxContainer">

                    <div class="boxContainerValue">
                        <h5><i class="fa-solid fa-list"></i></h5>
                        <h5> Total Inspections</h5>
                    </div>
                    <div class="boxContainerValue">
                        <h2>{{ $inspection }}</h2>
                    </div>
                </a>
            </div>
            <div class="box1">
                <a href="/inspectiondetails" class="boxContainer">

                    <div class="boxContainerValue">
                        <h5><i class="fa-solid fa-list "></i></h5>
                        <h5>Pending Inspections</h5>
                    </div>
                    <div class="boxContainerValue">
                        <h2>{{ $assign }}</h2>
                    </div>
                </a>
            </div>

            <div class="box1">
                <a href="/reportlist" class="boxContainer">

                    <div class="boxContainerValue">
                        <h5><i class="fa-solid fa-file "></i></h5>
                        <h5>Report an Incident</h5>
                    </div>
                    <div class="boxContainerValue">

                    </div>
                </a>
            </div>





        </div>
    </div>
@endsection
