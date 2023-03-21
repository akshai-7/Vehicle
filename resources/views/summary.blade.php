<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.8.2/dist/alpine.min.js"></script>
    <title>M&D Foundations</title>
    {{-- <link href="{{ asset('css/update.css') }}" rel="stylesheet"> --}}

</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=EB+Garamond&display=swap');

    :root {
        --header-height: 3rem;
        --first-color: #ddddfc;
        --first-color-light: black;
        --white-color: #F7F6FB;
        --z-fixed: 100;
        --light: #F9F9F9;
        --grey: #f8efef;
        --dark-grey: #AAAAAA;
        --dark: #342E37;

    }

    html {
        overflow-x: hidden;
    }

    body {
        font-family: 'EB Garamond', serif;
        overflow: hidden;
        background: var(--grey);
    }

    a {
        text-decoration: none;
    }

    #container {
        width: 100%;
        height: 100vh;
        display: flex;
        flex-direction: row
    }

    #div-1 {
        width: 15%;
        height: 200;
        background: #f0d6d6;
    }

    #div-2 {
        width: 85%;
        height: 200;
    }

    #headers {
        width: 100%;
        padding: 10px;
        display: flex;
        justify-content: space-between;
        align-content: center;
        background: #f0d6d6;
    }

    .icon-name {
        justify-content: center;
        align-items: center;
        align-content: center;
        display: flex;
        flex: 1
    }

    .nav_name {
        flex: 2;
        display: block;
    }

    .header {
        width: inherit;
        height: var(--header-height);
        position: fixed;
        top: 0;
        left: 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 1rem;
        background-color: var(--white-color);
        z-index: var(--z-fixed);
        transition: .5s
    }

    .header_toggle {
        color: black;
        font-size: 1.5rem;
        cursor: pointer
    }

    .img {
        width: 100px;
    }

    #img-container {
        width: 100%;
        height: 100px;
        display: flex;
        justify-content: center;
        align-items: center
    }

    #img-logo {
        width: 60%;
    }

    .nav_list {
        width: 100%;
        height: 7vh;
        display: flex;
        margin: 5px;
        padding: 0.875em 2em;
        font-family: inherit;
        color: #000;
        text-decoration: none;
        transition: 0.3s;
        place-content: center;
    }

    .nav_list:hover {
        width: 100%;
        padding: 0 10px;
        box-sizing: border-box;
        margin: 5px;
        height: 7vh;
        display: flex;
        justify-content: space-evenly;
        border-radius: 10px;
        box-shadow: 4px 7px 5px 0px #F7D4D4;
        align-items: center;
        background: linear-gradient(90deg, #b53f3f, transparent) #f18e8e;
        color: #fff;

    }

    .nav_icon {
        font-size: 1.25rem
    }

    .main2 {
        position: relative;
        width: 60%;
        left: 180px;
        height: 75%;
        overflow: scroll;
    }

    .table-data2 {
        padding: 7px;
        background: var(--light);
        overflow-x: auto;
    }

    h3 {
        color: #06064b;
        margin-top: 1%;
        margin-left: 1%;
    }

    .order table {
        width: 100%;
        margin-top: 2%;
    }

    .order table th {
        padding-bottom: 12px;
        font-size: 17px;
        color: black;
        border-bottom: 1px solid var(--grey);
    }

    .order table td {
        padding: 8px 0;
    }



    .table_row {
        background: rgb(237, 233, 233);
    }

    .table_row:hover {
        background: white
    }

    .table_row:hover .table_data {
        color: black;
    }

    .main2::-webkit-scrollbar {
        display: none;
    }

    .print {
        float: right;
        margin-right: 100px;
        margin-top: 20px;
    }

    #message {
        position: fixed;
        top: 70px;
        right: 10px;
        animation-duration: 1s;
    }
</style>

<body>
    <section id="container">
        <div id="div-1">
            <div id="img-container">
                <img id="img-logo" src="{{ url('images/m-d-foundation.png') }}">
            </div>
            <a class="nav_list" href="/user">
                <div class="icon-name"><i class="fa-solid fa-user nav_icon"></i></div>
                <div class="nav_name">Drivers </div>
            </a>
            <a class="nav_list" href="/vehiclelist">
                <div class="icon-name"> <i class="fa-solid fa-car"></i> </div><span class="nav_name">Vehicles</span>
            </a>
            <a class="nav_list" href="/vehicleassign">
                <div class="icon-name"><i class="fa-solid fa-folder-open"></i></div><span class="nav_name"> Vehicle
                    Assign</span>
            </a>
            <a class="nav_list" href="/vehicleassignedlist">
                <div class="icon-name"> <i class="fa-solid fa-list"></i> </div><span class="nav_name">Assigned
                    List</span>
            </a>
            <a class="nav_list" href="/inspectiondetails">
                <div class="icon-name"> <i class="fa-solid fa-list-check"></i> </div><span class="nav_name"> Inspection
                    List</span>
            </a>
            <a class="nav_list gradient-hover-effect" href="/reportlist">
                <div class="icon-name"> <i class="fa-solid fa-list-check"></i> </div><span class="nav_name"> Report
                    List</span>
            </a>
            <a class="nav_list"href="/">
                <div class="icon-name"><i class='bx bx-log-out nav_icon'></i> </div><span
                    class="nav_name">SignOut</span>
            </a>
        </div>
        <div id="div-2">
            <div class="headers" id="headers">
                <div class="header_toggle" id="toggle-container"> <i class='bx bx-x ' id="header-toggle"></i> </div>
            </div>


            {{-- @extends('layouts.user')
@section('content') --}}
            <div class="head">
                <h3> Report Summary</h3>
            </div>
            <main class="main2">
                <div class="table-data2">
                    <div class="order">
                        <table class="table table-bordered">
                            <div class="check">
                                <h5>Visual Damage</h5>
                            </div>
                            <thead class=" col-md-1">
                                <th style="text-align:center;" class="text-black col-md-2">View</th>
                                <th style="text-align:center;" class="text-black col-md-2">Action</th>
                            </thead>
                            <tbody>
                                @foreach ($visual as $visual)
                                    <tr class="table_row">
                                        <td style="text-align:center;" class="col-md-2 table_data">{{ $visual->view }}
                                        </td>
                                        <td style="text-align:center;" class="col-md-2 table_data">{{ $visual->action }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="table-data2">
                    <div class="order">
                        <table class="table table-bordered">
                            <div class="check">
                                <h5> Vehicle Check</h5>
                            </div>
                            <tbody>
                                @foreach ($vehicle as $vehicle)
                                    <tr class="table_row">
                                        <td style="text-align:center;" class="col-md-2 table_data">{{ $vehicle->view }}
                                        </td>
                                        <td style="text-align:center;" class="col-md-2 table_data">
                                            {{ $vehicle->action }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="table-data2">
                    <div class="order">
                        <table class="table table-bordered">
                            <div class="check">
                                <h5>Cabin Check</h5>
                            </div>
                            <tbody>
                                @foreach ($cabin as $cabin)
                                    <tr class="table_row">
                                        <td style="text-align:center;" class="col-md-2 table_data">{{ $cabin->view }}
                                        </td>
                                        <td style="text-align:center;" class="col-md-2 table_data">{{ $cabin->action }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </main>
            <div class="print">
                <a href="/pdf/{{ $cabin->assign_id }}"><i class="fa-solid fa-print btn btn-danger"></i></a>
                <a href="/send-email-using-gmail/{{ $cabin->assign_id }}"><i
                        class="fa-solid fa-envelope btn btn-success"></i></a>

                <a href="/edit/{{ $cabin->assign_id }}"><i class="fa-solid fa-edit btn btn-success"></i></a>
            </div>
            {{-- @endsection --}}
    </section>
    <script>
        var toggleBtn = document.getElementById("toggle-container");
        var isOpen = true;
        toggleBtn.addEventListener("click", () => {
            if (isOpen) {
                var divsToHide = document.getElementsByClassName("nav_name");
                document.getElementById("div-1").style.width = "5%";
                document.getElementById("div-1").style.transition = "0.6s";
                document.getElementById("div-2").style.width = "95%"; //divsToHide is an array

                document.getElementById("toggle-container").innerHTML =
                    "<i class='bx bx-menu' id='header-toggle'></i>";
                for (var i = 0; i < divsToHide.length; i++) {

                    divsToHide[i].style.display = "none"; // depending on what you're doing
                }

                isOpen = !isOpen;
            } else {

                document.getElementById("div-1").style.width = "15%";
                document.getElementById("div-2").style.transition = "0.6s";
                var divsToHide = document.getElementsByClassName("nav_name"); //divsToHide is an array
                document.getElementById("toggle-container").innerHTML =
                    "<i class='bx bx-x' id='header-toggle'></i>";

                for (var i = 0; i < divsToHide.length; i++) {
                    divsToHide[i].style.display = "block"; // depending on what you're doing
                }
                document.getElementById("div-2").style.width = "85%";
                isOpen = !isOpen;
            }
        })
    </script>
</body>

</html>
