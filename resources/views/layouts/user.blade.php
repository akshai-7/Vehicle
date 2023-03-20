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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/app.css">
    <script src="{{ asset('js/style.js') }}" defer></script>
    <link href="{{ asset('css/update.css') }}" rel="stylesheet">

</head>

<body>
    <section id="container">
        <div id="div-1">
            <div id="img-container">
                <img id="img-logo" src="{{ url('images/m-d-foundation.png') }}">
            </div>
            <a class="nav_list gradient-hover-effect" href="/user">
                <div class="icon-name"><i class="fa-solid fa-user nav_icon"></i></div>
                <div class="nav_name">Drivers </div>
            </a>
            <a class="nav_list gradient-hover-effect" href="/vehiclelist">
                <div class="icon-name"> <i class="fa-solid fa-car"></i> </div><span class="nav_name">Vehicles</span>
            </a>
            <a class="nav_list gradient-hover-effect" href="/vehicleassign">
                <div class="icon-name"><i class="fa-solid fa-user-pen"></i></div><span class="nav_name"> Vehicle
                    Assign</span>
            </a>
            <a class="nav_list gradient-hover-effect" href="/vehicleassignedlist">
                <div class="icon-name"> <i class="fa-solid fa-list"></i> </div><span class="nav_name"> Assigned
                    List</span>
            </a>
            <a class="nav_list gradient-hover-effect" href="/inspectiondetails">
                <div class="icon-name"> <i class="fa-solid fa-list-check"></i> </div><span class="nav_name"> Inspection
                    List</span>
            </a>
            <a class="nav_list gradient-hover-effect" href="/reportlist">
                <div class="icon-name"> <i class="fa-solid fa-list-check"></i> </div><span class="nav_name"> Report
                    List</span>
            </a>
            <a class="nav_list gradient-hover-effect"href="/">
                <div class="icon-name"><i class='bx bx-log-out nav_icon'></i> </div><span
                    class="nav_name">SignOut</span>
            </a>
        </div>
        <div id="div-2">
            <header class="headers" id="headers">
                <div class="header_toggle" id="toggle-container"><i class='bx bx-x' id='header-toggle'></i></div>
                <a href="#" class="open-button" onclick="openForm()"><img id="img-logo1"
                        src="{{ url('images/user-2.png') }}"></a>
                <div class="form-popup" id="myForm">
                    <div class="container">
                        <a type="button" onclick="closeForm()" style="color:black;margin-left:140px;"><i
                                class='bx bx-x ' id="header-toggle"></i></i></a>
                        <div class="cls" style="margin-top:-20px;color:black">
                            {{-- <tr> <i class="fa-solid fa-user"></i> {{ $user1->name }}</tr><br>
                            <tr> <i class="fa-solid fa-envelope"></i> {{ $user1->email }}</tr><br> --}}
                            <a href="/" style="color:black;"> <i class="fa-solid fa-arrow-right-from-bracket"
                                    style="color:black"></i> Log Out</a><br>
                        </div>
                    </div>
                </div>
            </header>
            <div class="message" id="message">
                @if (session()->has('message'))
                    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
                        style="width: 300px;height:20px">
                        <div div class="alert alert-success">
                            <i class="fa-regular fa-circle-check"></i> {{ session('message') }}
                        </div>
                    </div>
                @endif
            </div>
            <div class="message1" id="message">
                @if (session()->has('message1'))
                    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
                        style="width: 300px;height:20px;">
                        <div class="alert alert-danger">
                            <i class="fa-regular fa-circle-x"></i>{{ session('message1') }}
                        </div>
                    </div>
                @endif
            </div>
            <main class="py-4">
                @yield('content')
            </main>
    </section>

</body>

</html>