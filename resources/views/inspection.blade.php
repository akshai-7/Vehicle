<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <title>M&D Foundations</title>
    <link href="{{ asset('css/update.css') }}" rel="stylesheet">

</head>
{{-- <style>
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
        s
    }

    html {
        overflow-x: hidden;
    }

    body {
        font-family: 'EB Garamond', serif;
        background: var(--grey);
        overflow: hidden;
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
        width: 80%;
        border: 2px solid rgba(187, 17, 56, 255);
        border-radius: 4px;
        padding: 10px;
    }

    .nav_list {
        width: 100%;
        height: 7vh;
        display: flex;
        margin: 5px;
        padding: 0.875em 2em;
        font-family: inherit;
        color: #2d0404;
        text-decoration: none;
        transition: 0.3s;
        place-content: center;
    }

    .nav_list:hover {
        width: 100%;
        height: 7vh;
        display: flex;
        margin: 5px;
        padding: 0.875em 2em;
        font-family: inherit;
        color: #2d0404;
        text-decoration: none;
        transition: 0.3s;
        place-content: center;
        border-radius: 10px;
        box-shadow: 2px 5px 3px 0px #9d9a9a;
        background: linear-gradient(90deg, #fba6a6, transparent) #fbd6d6;
        color: rgba(187, 17, 56, 255);
    }

    .nav_icon {
        font-size: 1.25rem
    }

    main {
        position: relative;
        width: 85%;
        left: 120px;

    }

    .table-data {
        /* background: var(--light); */
        padding: 24px;
    }

    h3 {
        margin-left: 20px;
        margin-top: 20px;
        color: #d05572;
    }

    .order table {
        width: 100%;
        margin-top: 2%;
    }

    .th {
        padding-bottom: 12px;
        font-size: 17px;
        color: #06064b;

    }

    .order table td {
        padding: 16px 0;
    }

    .form-control {
        background: var(--grey);
    }

    #add {
        background: #06064b;
        border-radius: 5px;
        border: 1px solid#06064b;
        cursor: pointer;
        top: 20px;
        height: 30px;
        position: relative;
        width: 80px;
        float: right;
        margin-right: 100px;
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

    #main {
        display: flex;
    }

    .main {
        margin-top: 20px;
        height: 75%;
        overflow: scroll;
    }

    .main::-webkit-scrollbar {
        display: none;
    }

    .form-group {
        display: flex;
        justify-content: space-between;
    }

    .report1 {
        display: flex;
    }

    .report {
        width: 40%;
    }

    .subreport {
        margin-left: 50px;
        width: 40%;
    }
</style> --}}

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


            <a class="nav_list"href="/">
                <div class="icon-name"><i class='bx bx-log-out nav_icon'></i> </div><span
                    class="nav_name">SignOut</span>
            </a>
        </div>
        <div id="div-2">
            <h3> Inspection Details</h3>
            <form action="/store/{id}" method="POST" autocomplete="off" class="main form">
                @csrf
                <input type="hidden" name="id" value="{{ $assign->id }}">
                <main class="mainid">
                    <div class="">
                        <div class="report1">
                            <div class="report">
                                <div class="form-group row mt-5 ">
                                    <label for="" class="col-sm-2 col-form-label"> Report.no</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="reportno"
                                            value="{{ $assign->number_plate }}-{{ date('d.m.Y') }}"
                                            class="form-control">
                                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('report')
                                                *{{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mt-5 ">
                                    <label for="" class="col-sm-2  col-form-label"> Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" value="{{ $assign->name }}"
                                            class="form-control">
                                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('name')
                                                *{{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mt-5 ">
                                    <label for="" class="col-sm-2  col-form-label"> Email</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="email" value="{{ $assign->email }}"
                                            class="form-control">
                                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('email')
                                                *{{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mt-5 ">
                                    <label for="" class="col-sm-2 col-form-label"> Phone</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="mobile" value="{{ $assign->mobile }}"
                                            class="form-control">
                                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('mobile')
                                                *{{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="subreport">
                                <div class="form-group row mt-5">
                                    <label for="" class="col-sm-2  col-form-label"> Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" name="date" class="form-control">
                                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('date')
                                                *{{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mt-5">
                                    <label for="" class="col-sm-2 col-form-label">NumberPlate</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="number_plate"
                                            value="{{ $assign->number_plate }}" class="form-control">
                                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('number_plate')
                                                *{{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mt-5 ">
                                    <label for="" class="col-sm-2 col-form-label"> Mileage</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="mileage" placeholder="Current Reading"
                                            class="form-control">
                                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('mileage')
                                                *{{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="head">
                            <h5 class="mt-5" style="color:#06064b;">Visual Check</h5>
                        </div>
                        <div class="form-control1">
                            <table class="table table-bordered mt-3" style="border: 1px solid grey">
                                <thead class="">
                                    <tr class="th">
                                        <th class="col-md-1" style="text-align:center;">S.no</th>
                                        <th style="text-align:center;" class="col-md-2 ">View</th>
                                        <th style="text-align:center;" class="col-md-2 ">Image</th>
                                        <th style="text-align:center;" class="col-md-2 ">Feed Back</th>
                                        <th style="text-align:center;" class="col-md-2 ">Notes</th>
                                        <th style="text-align:center;" class="col-md-2 ">Action</th>
                                    </tr>
                                </thead>
                                <tbody id='row'>
                                    <tr class="">
                                        <td class="col-md-1"><input type="text" name="sno[]"
                                                class="form-control col-md-1 border-0" style="text-align:center;"
                                                value="1" id="sno"></td>
                                        <td><input type="text" name="view[]" class="form-control view border-0"
                                                style="text-align:center;" id='view' value="Front"></td>
                                        <td><input type="file" name="image[]" class="form-control image border-0"
                                                style="text-align:center;" id='image'></td>
                                        <td><input type="text" name="feedback[]"
                                                class="form-control feedback border-0" style="text-align:center;"
                                                id='feedback'></td>
                                        <td><input type="text" name="notes[]" class="form-control notes border-0"
                                                style="text-align:center;" id='notes'></td>
                                        <td><input type="text" name="action[]"
                                                class="form-control action border-0" style="text-align:center;"
                                                id='action' placeholder="Good/Bad"></td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-1"><input type="text" name="sno[]"
                                                class="form-control col-md-1 border-0" style="text-align:center;"
                                                value="2" id="sno"></td>
                                        <td><input type="text" name="view[]" class="form-control view border-0"
                                                style="text-align:center;" id='view' value="Near Side"></td>
                                        <td><input type="file" name="image[]" class="form-control image border-0"
                                                style="text-align:center;" id='image'></td>
                                        <td><input type="text" name="feedback[]"
                                                class="form-control feedback border-0" style="text-align:center;"
                                                id='feedback'></td>
                                        <td><input type="text" name="notes[]" class="form-control notes border-0"
                                                style="text-align:center;" id='notes'></td>
                                        <td><input type="text" name="action[]"
                                                class="form-control action border-0" style="text-align:center;"
                                                id='action' placeholder="Good/Bad"></td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-1"><input type="text" name="sno[]"
                                                class="form-control col-md-1 border-0" style="text-align:center;"
                                                value="3" id="sno"></td>
                                        <td><input type="text" name="view[]" class="form-control view border-0"
                                                style="text-align:center;" id='view' value="Rear"></td>
                                        <td><input type="file" name="image[]" class="form-control image border-0"
                                                style="text-align:center;" id='image'></td>
                                        <td><input type="text" name="feedback[]"
                                                class="form-control feedback border-0" style="text-align:center;"
                                                id='feedback'></td>
                                        <td><input type="text" name="notes[]" class="form-control notes border-0"
                                                style="text-align:center;" id='notes'></td>
                                        <td><input type="text" name="action[]"
                                                class="form-control action border-0" style="text-align:center;"
                                                id='action' placeholder="Good/Bad"></td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-1"><input type="text" name="sno[]"
                                                class="form-control col-md-1 border-0" style="text-align:center;"
                                                value="4" id="sno"></td>
                                        <td><input type="text" name="view[]" class="form-control view border-0"
                                                style="text-align:center;" id='view' value="Off-side"></td>
                                        <td><input type="file" name="image[]" class="form-control image border-0"
                                                style="text-align:center;" id='image'></td>
                                        <td><input type="text" name="feedback[]"
                                                class="form-control feedback border-0" style="text-align:center;"
                                                id='feedback'></td>
                                        <td><input type="text" name="notes[]" class="form-control notes border-0"
                                                style="text-align:center;" id='notes'></td>
                                        <td><input type="text" name="action[]"
                                                class="form-control action border-0" style="text-align:center;"
                                                id='action' placeholder="Good/Bad"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="">
                        <div class="head">
                            <h5 class="" style="color:#06064b;">Vehicle Check</h5>
                        </div>
                        <div class="form-control1">
                            <table class="table table-bordered mt-3" style="border: 1px solid grey">
                                <thead class="">
                                    <tr class="th">
                                        <th class="col-md-1" style="text-align:center;">S.no</th>
                                        <th style="text-align:center;" class="col-md-2 ">View</th>
                                        <th style="text-align:center;" class="col-md-2 ">Image</th>
                                        <th style="text-align:center;" class="col-md-2 ">Feed Back</th>
                                        <th style="text-align:center;" class="col-md-2 ">Notes</th>
                                        <th style="text-align:center;" class="col-md-2 ">Action</th>
                                    </tr>
                                </thead>
                                <tbody id='row1'>
                                    <tr class="list">
                                        <td class="col-md-1"><input type="text" name="sno[]"
                                                class="form-control col-md-1 border-0" style="text-align:center;"
                                                value="1" id="sno"></td>
                                        <td><input type="text" name="view1[]" class="form-control view border-0"
                                                style="text-align:center;" id='view' value="Adblue levels"></td>
                                        <td><input type="file" name="image1[]" class="form-control image border-0"
                                                style="text-align:center;" id='image'></td>
                                        <td><input type="text" name="feedback1[]"
                                                class="form-control feedback border-0" style="text-align:center;"
                                                id='feedback'></td>
                                        <td><input type="text" name="notes1[]" class="form-control notes border-0"
                                                style="text-align:center;" id='notes'></td>
                                        <td><input type="text" name="action1[]"
                                                class="form-control action border-0" style="text-align:center;"
                                                id='action' placeholder="Good/Bad"></td>
                                    </tr>
                                    <tr class="list">
                                        <td class="col-md-1"><input type="text" name="sno[]"
                                                class="form-control col-md-1 border-0" style="text-align:center;"
                                                value="2" id="sno"></td>
                                        <td><input type="text" name="view1[]" class="form-control view border-0"
                                                style="text-align:center;" id='view' value="Fuel/oil Leaks">
                                        </td>
                                        <td><input type="file" name="image1[]" class="form-control image border-0"
                                                style="text-align:center;" id='image'></td>
                                        <td><input type="text" name="feedback1[]"
                                                class="form-control feedback border-0" style="text-align:center;"
                                                id='feedback'></td>
                                        <td><input type="text" name="notes1[]" class="form-control notes border-0"
                                                style="text-align:center;" id='notes'></td>
                                        <td><input type="text" name="action1[]"
                                                class="form-control action border-0" style="text-align:center;"
                                                id='action' placeholder="Good/Bad"></td>
                                    </tr>
                                    <tr class="list">
                                        <td class="col-md-1"><input type="text" name="sno[]"
                                                class="form-control col-md-1 border-0" style="text-align:center;"
                                                value="3" id="sno"></td>
                                        <td><input type="text" name="view1[]" class="form-control view border-0"
                                                style="text-align:center;" id='view' value="Lights"></td>
                                        <td><input type="file" name="image1[]" class="form-control image border-0"
                                                style="text-align:center;" id='image'></td>
                                        <td><input type="text" name="feedback1[]"
                                                class="form-control feedback border-0" style="text-align:center;"
                                                id='feedback'></td>
                                        <td><input type="text" name="notes1[]" class="form-control notes border-0"
                                                style="text-align:center;" id='notes'></td>
                                        <td><input type="text" name="action1[]"
                                                class="form-control action border-0" style="text-align:center;"
                                                id='action' placeholder="Good/Bad"></td>
                                    </tr>
                                    <tr class="list">
                                        <td class="col-md-1"><input type="text" name="sno[]"
                                                class="form-control col-md-1 border-0" style="text-align:center;"
                                                value="4" id="sno"></td>
                                        <td><input type="text" name="view1[]" class="form-control view border-0"
                                                style="text-align:center;" id='view' value="Indicators/Signals">
                                        </td>
                                        <td><input type="file" name="image1[]" class="form-control image border-0"
                                                style="text-align:center;" id='image'></td>
                                        <td><input type="text" name="feedback1[]"
                                                class="form-control feedback border-0" style="text-align:center;"
                                                id='feedback'></td>
                                        <td><input type="text" name="notes1[]" class="form-control notes border-0"
                                                style="text-align:center;" id='notes'></td>
                                        <td><input type="text" name="action1[]"
                                                class="form-control action border-0" style="text-align:center;"
                                                id='action' placeholder="Good/Bad"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="">
                        <div class="head">
                            <h5 class="" style="color:#06064b;">Cabin Check</h5>
                        </div>
                        <div class="form-control1">
                            <div>
                                <table class="table table-bordered mt-3" style="border: 1px solid grey">
                                    <thead class="">
                                        <tr class="th">
                                            <th class="col-md-1" style="text-align:center;">S.no</th>
                                            <th style="text-align:center;" class="col-md-2 ">View</th>
                                            <th style="text-align:center;" class="col-md-2 ">Image</th>
                                            <th style="text-align:center;" class="col-md-2 ">Feed Back</th>
                                            <th style="text-align:center;" class="col-md-2 ">Notes</th>
                                            <th style="text-align:center;" class="col-md-2 ">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id='row2'>
                                        <tr class="list">
                                            <td class="col-md-1"><input type="text" name="sno[]"
                                                    class="form-control col-md-1 border-0" style="text-align:center;"
                                                    value="1" id="sno"></td>
                                            <td><input type="text" name="view2[]"
                                                    class="form-control view border-0" style="text-align:center;"
                                                    id='view' value="Steering"></td>
                                            <td><input type="file" name="image2[]"
                                                    class="form-control image border-0" style="text-align:center;"
                                                    id='image'></td>
                                            <td><input type="text" name="feedback2[]"
                                                    class="form-control feedback border-0" style="text-align:center;"
                                                    id='feedback'></td>
                                            <td><input type="text" name="notes2[]"
                                                    class="form-control notes border-0" style="text-align:center;"
                                                    id='notes'></td>
                                            <td><input type="text" name="action2[]"
                                                    class="form-control action border-0" style="text-align:center;"
                                                    id='action' placeholder="Good/Bad"></td>
                                        </tr>
                                        <tr class="list">
                                            <td class="col-md-1"><input type="text" name="sno[]"
                                                    class="form-control col-md-1 border-0" style="text-align:center;"
                                                    value="2" id="sno"></td>
                                            <td><input type="text" name="view2[]"
                                                    class="form-control view border-0" style="text-align:center;"
                                                    id='view' value="Wipers"></td>
                                            <td><input type="file" name="image2[]"
                                                    class="form-control image border-0" style="text-align:center;"
                                                    id='image'></td>
                                            <td><input type="text" name="feedback2[]"
                                                    class="form-control feedback border-0" style="text-align:center;"
                                                    id='feedback'></td>
                                            <td><input type="text" name="notes2[]"
                                                    class="form-control notes border-0" style="text-align:center;"
                                                    id='notes'></td>
                                            <td><input type="text" name="action2[]"
                                                    class="form-control action border-0" style="text-align:center;"
                                                    id='action' placeholder="Good/Bad"></td>
                                        </tr>
                                        <tr class="list">
                                            <td class="col-md-1"><input type="text" name="sno[]"
                                                    class="form-control col-md-1 border-0" style="text-align:center;"
                                                    value="3" id="sno"></td>
                                            <td><input type="text" name="view2[]"
                                                    class="form-control view border-0" style="text-align:center;"
                                                    id='view' value="Washers"></td>
                                            <td><input type="file" name="image2[]"
                                                    class="form-control image border-0" style="text-align:center;"
                                                    id='image'></td>
                                            <td><input type="text" name="feedback2[]"
                                                    class="form-control feedback border-0" style="text-align:center;"
                                                    id='feedback'></td>
                                            <td><input type="text" name="notes2[]"
                                                    class="form-control notes border-0" style="text-align:center;"
                                                    id='notes'></td>
                                            <td><input type="text" name="action2[]"
                                                    class="form-control action border-0" style="text-align:center;"
                                                    id='action' placeholder="Good/Bad"></td>
                                        </tr>
                                        <tr class="list">

                                            <td class="col-md-1"><input type="text" name="sno[]"
                                                    class="form-control col-md-1 border-0" style="text-align:center;"
                                                    value="4" id="sno"></td>
                                            <td><input type="text" name="view2[]"
                                                    class="form-control view border-0" style="text-align:center;"
                                                    id='view' value="Horn"></td>
                                            <td><input type="file" name="image2[]"
                                                    class="form-control image border-0" style="text-align:center;"
                                                    id='image'></td>
                                            <td><input type="text" name="feedback2[]"
                                                    class="form-control feedback border-0" style="text-align:center;"
                                                    id='feedback'></td>
                                            <td><input type="text" name="notes2[]"
                                                    class="form-control notes border-0" style="text-align:center;"
                                                    id='notes'></td>
                                            <td><input type="text" name="action2[]"
                                                    class="form-control action border-0" style="text-align:center;"
                                                    id='action' placeholder="Good/Bad"></td>
                                        </tr>
                                        <tr class="list">
                                            <td class="col-md-1"><input type="text" name="sno[]"
                                                    class="form-control col-md-1 border-0" style="text-align:center;"
                                                    value="5" id="sno"></td>
                                            <td><input type="text" name="view2[]"
                                                    class="form-control view border-0" style="text-align:center;"
                                                    id='view' value="Breakes inc.ABS/EBS"></td>
                                            <td><input type="file" name="image2[]"
                                                    class="form-control image border-0" style="text-align:center;"
                                                    id='image'></td>
                                            <td><input type="text" name="feedback2[]"
                                                    class="form-control feedback border-0" style="text-align:center;"
                                                    id='feedback'></td>
                                            <td><input type="text" name="notes2[]"
                                                    class="form-control notes border-0" style="text-align:center;"
                                                    id='notes'></td>
                                            <td><input type="text" name="action2[]"
                                                    class="form-control action border-0" style="text-align:center;"
                                                    id='action' placeholder="Good/Bad"></td>
                                        </tr>
                                        <tr class="list">
                                            <td class="col-md-1"><input type="text" name="sno[]"
                                                    class="form-control col-md-1 border-0" style="text-align:center;"
                                                    value="6" id="sno"></td>
                                            <td><input type="text" name="view2[]"
                                                    class="form-control view border-0" style="text-align:center;"
                                                    id='view' value="Mirrors/Glass/Visibility">
                                            </td>
                                            <td><input type="file" name="image2[]"
                                                    class="form-control image border-0" style="text-align:center;"
                                                    id='image'></td>
                                            <td><input type="text" name="feedback2[]"
                                                    class="form-control feedback border-0" style="text-align:center;"
                                                    id='feedback'></td>
                                            <td><input type="text" name="notes2[]"
                                                    class="form-control notes border-0" style="text-align:center;"
                                                    id='notes'></td>
                                            <td><input type="text" name="action2[]"
                                                    class="form-control action border-0" style="text-align:center;"
                                                    id='action' placeholder="Good/Bad"></td>
                                        </tr>
                                        <tr class="list">
                                            <td class="col-md-1"><input type="text" name="sno[]"
                                                    class="form-control col-md-1 border-0" style="text-align:center;"
                                                    value="7" id="sno"></td>
                                            <td><input type="text" name="view2[]"
                                                    class="form-control view border-0" style="text-align:center;"
                                                    id='view' value="Truck Interior/Seat Belt">
                                            </td>
                                            <td><input type="file" name="image2[]"
                                                    class="form-control image border-0" style="text-align:center;"
                                                    id='image'></td>
                                            <td><input type="text" name="feedback2[]"
                                                    class="form-control feedback border-0" style="text-align:center;"
                                                    id='feedback'></td>
                                            <td><input type="text" name="notes2[]"
                                                    class="form-control notes border-0" style="text-align:center;"
                                                    id='notes'></td>
                                            <td><input type="text" name="action2[]"
                                                    class="form-control action border-0" style="text-align:center;"
                                                    id='action' placeholder="Good/Bad"></td>
                                        </tr>
                                        <tr class="list">
                                            <td class="col-md-1"><input type="text" name="sno[]"
                                                    class="form-control col-md-1 border-0" style="text-align:center;"
                                                    value="8" id="sno"></td>
                                            <td><input type="text" name="view2[]"
                                                    class="form-control view border-0" style="text-align:center;"
                                                    id='view' value="Warining Lamps/MIL">
                                            </td>
                                            <td><input type="file" name="image2[]"
                                                    class="form-control image border-0" style="text-align:center;"
                                                    id='image'></td>
                                            <td><input type="text" name="feedback2[]"
                                                    class="form-control feedback border-0" style="text-align:center;"
                                                    id='feedback'></td>
                                            <td><input type="text" name="notes2[]"
                                                    class="form-control notes border-0" style="text-align:center;"
                                                    id='notes'></td>
                                            <td><input type="text" name="action2[]"
                                                    class="form-control action border-0" style="text-align:center;"
                                                    id='action' placeholder="Good/Bad"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </main>
                <a href="#"><input type="submit" value="Submit" class="text-black" id="add"
                        style="margin-left:1000px;"></a>
            </form>
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
