<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.8.2/dist/alpine.min.js"></script>
    <title>M&D Foundations</title>
    <script src="{{ asset('js/style.js') }}" defer></script>
    <link href="{{ asset('css/style1.css') }}" rel="stylesheet">


</head>

<body>
    <section id="container">
        <div id="div-1">
            <div id="img-container">
                <img id="img-logo" src="{{ url('images/m-d-foundation.png') }}">
            </div>
            <li {{ Request::is('dashboard') ? 'class=active' : '' }}>
                <a class="nav_list" href="/dashboard" id="myButton">
                    <div class="icon-name"><i class='bx bxs-dashboard'></i></div>
                    <div class="nav_name">Dashboard </div>
                </a>
            </li>
            <li {{ Request::is('user') ? 'class=active' : '' }}>
                <a class="nav_list" href="/user" id="myButton">
                    <div class="icon-name"><i class="fa-solid fa-user nav_icon"></i></div>
                    <div class="nav_name">Drivers </div>
                </a>
            </li>
            <li {{ Request::is('vehiclelist') ? 'class=active' : '' }}>
                <a class="nav_list " href="/vehiclelist">
                    <div class="icon-name"> <i class="fa-solid fa-car nav_icon"></i> </div><span
                        class="nav_name">Vehicles</span>
                </a>
            </li>
            <li {{ Request::is('vehicleassign') ? 'class=active' : '' }}>
                <a class="nav_list gradient-hover-effect" href="/vehicleassign">
                    <div class="icon-name"><i class="fa-solid fa-link nav_icon"></i></div><span class="nav_name">
                        Vehicle
                        Assign</span>
                </a>
            </li>
            <li {{ Request::is('vehicleassignedlist') ? 'class=active' : '' }}>
                <a class="nav_list gradient-hover-effect" href="/vehicleassignedlist">
                    <div class="icon-name"> <i class="fa-solid fa-list nav_icon"></i> </div><span class="nav_name">
                        Assigned
                        List</span>
                </a>
            </li>
            <li {{ Request::is('inspectiondetails') ? 'class=active' : '' }}>
                <a class="nav_list gradient-hover-effect" href="/inspectiondetails">
                    <div class="icon-name"> <i class="fa-solid fa-list-check nav_icon"></i> </div><span
                        class="nav_name">
                        Inspection
                        List</span>
                </a>
            </li>
            <li {{ Request::is('reportlist') ? 'class=active' : '' }}>
                <a class="nav_list gradient-hover-effect" href="/reportlist">
                    <div class="icon-name"> <i class="fa-solid fa-file nav_icon"></i> </div><span class="nav_name">
                        Reported Incidents
                    </span>
                </a>
            </li>
            <a class="nav_list gradient-hover-effect"href="/">
                <div class="icon-name"><i class='bx bx-log-out nav_icon'></i> </div><span
                    class="nav_name">SignOut</span>
            </a>
        </div>
        <div id="div-2">
            <div id="headers">
                <div id="toggle-container"><i class="fa-solid fa-chevron-left"></i>
                </div>
            </div>
            <div id="mainContainer">
                <div id="tabContainer">
                    <div class="message" id="message">
                        @if (session()->has('message'))
                            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show"
                                style="width: 300px;height:20px">
                                <div div class="alert alert-success">
                                    <i class="fa-regular fa-circle-check"></i> {{ session('message') }}
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="message1" id="message">
                        @if (session()->has('message1'))
                            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show"
                                style="width: 300px;height:20px;">
                                <div class="alert alert-danger">
                                    <i class="fa-regular fa-circle-x"></i>{{ session('message1') }}
                                </div>
                            </div>
                        @endif

                    </div>
                    <a href="{{ URL::previous() }}" class="btn btn-default"> <i class="fas fa-arrow-left"></i> Go
                        Back</a>
                    @yield('content')
                </div>

            </div>

    </section>

</body>

</html>
