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
    {{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --}}
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!------image---------->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
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

            <li {{ Request::is('user', 'users', 'driversearchbar', 'adduser') ? 'class=active' : '' }}>
                <a class="nav_list" href="/user" id="myButton">
                    <div class="icon-name"><i class="fa-solid fa-user nav_icon"></i></div>
                    <div class="nav_name">Drivers </div>
                </a>
            </li>
            <li {{ Request::is('vehiclelist', 'vehiclelists', 'searchbar', 'addvehicle') ? 'class=active' : '' }}>
                <a class="nav_list " href="/vehiclelist">
                    <div class="icon-name"> <i class="fa-solid fa-car nav_icon"></i> </div><span
                        class="nav_name">Vehicles</span>
                </a>
            </li>
            <li {{ Request::is('vehicleassignedlist', 'assignsearch', 'assignsearchbar') ? 'class=active' : '' }}>
                <a class="nav_list gradient-hover-effect" href="/vehicleassignedlist">
                    <div class="icon-name"> <i class="fa-solid fa-link nav_icon"></i> </div><span class="nav_name">
                        Vehicle
                        Assign</span>
                </a>
            </li>
            <li
                {{ Request::is('inspectiondetails', 'search', 'inspectionsearchbar', 'inspectionform') ? 'class=active' : '' }}>
                <a class="nav_list gradient-hover-effect" href="/inspectiondetails">
                    <div class="icon-name"> <i class="fa-solid fa-list-check nav_icon"></i> </div><span
                        class="nav_name">
                        Inspection
                        List</span>
                </a>
            </li>
            <li
                {{ Request::is('reportlist', 'reportsearchbar', 'incidentform', 'searchreport') ? 'class=active' : '' }}>
                <a class="nav_list gradient-hover-effect" href="/reportlist">
                    <div class="icon-name"> <i class="fa-solid fa-file nav_icon"></i> </div><span class="nav_name">
                        Reported Incidents
                    </span>
                </a>
            </li>
            <li
                {{ Request::is('archive', 'searcharchive', 'archivereport', 'searcharchivereport') ? 'class=active' : '' }}>
                <a class="nav_list gradient-hover-effect" href="/archive">
                    <div class="icon-name"> <i class='bx bxs-archive-in nav_icon'></i> </div><span class="nav_name">
                        Archive
                    </span>
                </a>
            </li>
            <li {{ Request::is('admin', 'adminsearch', 'addadmin') ? 'class=active' : '' }}>
                <a class="nav_list" href="/admin" id="myButton">
                    <div class="icon-name"><i class="fa-solid fa-shield-halved nav_icon"></i></div>
                    <div class="nav_name">Admin Portal </div>
                </a>
            </li>
            <a class="nav_list gradient-hover-effect"href="/">
                <div class="icon-name"><i class='bx bx-log-out nav_icon'></i> </div><span class="nav_name">Sign
                    Out</span>
            </a>
        </div>
        <div id="div-2">
            <div id="headers">
                {{-- <div id="toggle-container"><i class="fa-solid fa-chevron-left"></i>
                </div> --}}

                {{-- <div id="popup1">
                    <ul class="mt-3">
                        <li class="name">
                            <a><img src="{{ url('images/host.png') }}" id="img-logo1"></a>
                            <p class="button1"> {{ ucfirst(strtolower(Auth::user()->name)) }}</p>
                        </li>
                        <li class="mt-4">
                            <i class='bx bxl-gmail icon'></i><a class="button">{{ Auth::user()->email }}</a>
                        </li>
                        <li class="mt-4">
                            <i class='bx bx-building-house icon'></i><a href="/createhouse" class="button ">Properties<i
                                    class="button__icon fas fa-chevron-right  button"></i></a>
                        </li>
                        <li class="mt-4">
                            <i class='bx bxs-bookmarks icon'></i><a href="/bookinglist" class="button mt-4">Booking <i
                                    class="button__icon fas fa-chevron-right  button"></i></a>
                        </li>
                        <li class="mt-4">
                            <i class="bx bx-log-out icon"></i><a href="/" class="button">Log Out<i
                                    class="button__icon fas fa-chevron-right  button"></i></a>
                        </li>
                        <hr style="border-top:1px solid rgb(131, 126, 126);">
                        <li>
                            <p onclick="hide('popup1')" class="button2">close</p>
                        </li>
                    </ul>
                </div> --}}
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
                    {{-- <a href="{{ URL::previous() }}" class="btn btn-default"> <i class="fas fa-arrow-left"></i> Go
                        Back</a> --}}
                    <a href="javascript:history.back()" class="btn btn-default"><i class="fas fa-arrow-left"></i> Go
                        Back</a>
                    @yield('content')
                </div>
            </div>
    </section>
</body>
<script>
    flatpickr(".flatdate", {
        dateFormat: "d/m/Y", // Set the desired date format
        // Other options and configurations can be added here
    });

    $('.flatemonth').flatpickr({
        dateFormat: "F Y", // set date format to only display month and year
        enableTime: false

    });
</script>

</html>
