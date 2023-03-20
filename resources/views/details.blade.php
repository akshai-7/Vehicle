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
        /* font-family: 'Times New Roman', Times, serif; */
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

    #message {
        position: fixed;
        top: 70px;
        right: 10px;
        animation-duration: 1s;
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
        /* height:40px; */
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
        margin-top: 70px;
    }

    .table-data {
        border-radius: 8px;
        background: var(--light);
        padding: 24px;
        overflow-x: auto;
    }

    table {
        width: 100%;
        margin-top: 2%;
    }

    table th {
        padding-bottom: 12px;
        font-size: 17px;
        color: black;
        border-bottom: 1px solid var(--grey);
    }

    table td {
        padding: 15px;
    }

    #add {
        background: #06064b;
        border-radius: 5px;
        border: 1px solid #06064b;
        cursor: pointer;
        top: 50px;
        height: 30px;
        position: relative;
        width: 80px;
        float: right;
        margin-right: 100px;
        text-decoration: none;
    }

    .table_row {
        background: rgb(237, 233, 233);
    }

    .table_row:hover {
        background: white;
    }

    .table_row:hover .table_data {
        color: black;
    }

    .tablinks {
        padding: 5px 5px;
        border: none;
        border-radius: 4px;
        outline: none;
        cursor: pointer;
        transition: 0.6s;
    }

    button.active {
        background: linear-gradient(90deg, #fba6a6, transparent) #df9d9d;
        color: white
    }

    .main {
        margin-top: 50px;

    }

    .tabcontent {
        margin-top: 20px;
    }

    #Cabin {
        overflow: scroll;
        height: 65%;
        position: relative;
        width: 85%;
        left: 120px;
        margin-top: 20px;
    }

    #Cabin::-webkit-scrollbar {
        display: none;
    }
</style> --}}

@extends('layouts.user')
@section('content')
    <main class="main">
        <div class="button">
            <button class="tablinks " onclick="openCheck(event, 'Visual')" id="defaultOpen">
                <h5>Visual Damage</h5>
            </button>
            <button class="tablinks" onclick="openCheck(event, 'Vehicle')">
                <h5>Vehicle Check</h5>
            </button>
            <button class="tablinks" onclick="openCheck(event,'Cabin')">
                <h5>Cabin Checks</h5>
            </button>
        </div>
        <div id="Visual" class="tabcontent">
            <div class="table-data">
                <table class="table table-bordered mt-3" style="border: 1px solid lightgrey">
                    <thead>
                        <th style="text-align:center;">S.No</th>
                        <th style="text-align:center;">View</th>
                        <th style="text-align:center;">Image</th>
                        <th style="text-align:center;">Feed Back</th>
                        <th style="text-align:center;">Status</th>
                        <th style="text-align:center;">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($visual as $visual)
                            <tr class="table_row">
                                <td style="text-align:center;" class="table_data">{{ $loop->iteration }}</td>
                                <td style="text-align:center;" class="table_data">{{ $visual->view }}</td>
                                <td style="text-align:center;" class="table_data"><img
                                        src="{{ url('images/' . $visual->image) }}"
                                        class="rounded-0 border border-secondary" width="50px" height="50px"></td>
                                <td style="text-align:center;" class="table_data">{{ $visual->feedback }}</td>
                                <td style="text-align:center;" class="table_data">{{ $visual->action }}</td>
                                <td style="text-align:center;" class="table_data">
                                    <a href="/updatevisualcheck/{{ $visual->id }}"><i
                                            class="fa-solid fa-edit btn btn-success"></i></a>
                                    <a href="/deletevisual/{{ $visual->id }}"><i
                                            class="fa-solid fa-trash btn btn-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div id="Vehicle" class="tabcontent">
            <div class="table-data">
                <table class="table table-bordered mt-3" style="border: 1px solid lightgrey">
                    <thead>
                        <th style="text-align:center;">S.No</th>
                        <th style="text-align:center;">View</th>
                        <th style="text-align:center;">Image</th>
                        <th style="text-align:center;">Feed Back</th>
                        <th style="text-align:center;">Status</th>
                        <th style="text-align:center;">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($vehicle as $vehicle)
                            <tr class="table_row">
                                <td style="text-align:center;" class="table_data">{{ $loop->iteration }}</td>
                                <td style="text-align:center;" class="table_data">{{ $vehicle->view }}</td>
                                <td style="text-align:center;" class="table_data"><img
                                        src="{{ url('images/' . $vehicle->image) }}" width="50px" height="50px"
                                        alt="" class="rounded-0 border border-secondary "></td>
                                <td style="text-align:center;" class="table_data">{{ $vehicle->feedback }}
                                </td>
                                <td style="text-align:center;" class="table_data">{{ $vehicle->action }}</td>
                                <td style="text-align:center;" class="table_data">
                                    <a href="/updatevehiclecheck/{{ $vehicle->id }}"><i
                                            class="fa-solid fa-edit btn btn-success"></i></a>
                                    <a href="/deletevehicle/{{ $vehicle->id }}"><i
                                            class="fa-solid fa-trash btn btn-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <div id="Cabin" class="tabcontent">
        <div class="table-data">
            <table class="table table-bordered mt-3" style="border: 1px solid lightgrey">
                <thead>
                    <th style="text-align:center;">S.No</th>
                    <th style="text-align:center;">View</th>
                    <th style="text-align:center;">Image</th>
                    <th style="text-align:center;">Feed Back</th>
                    <th style="text-align:center;">Status</th>
                    <th style="text-align:center;">Action</th>
                </thead>
                <tbody>
                    @foreach ($cabin as $cabin)
                        <tr class="table_row">
                            <td style="text-align:center;" class="table_data">{{ $loop->iteration }}</td>
                            <td style="text-align:center;" class="table_data">{{ $cabin->view }}</td>
                            <td style="text-align:center;" class="table_data"><img
                                    src="{{ url('images/' . $cabin->image) }}" width="50px" height="50px" alt=""
                                    class="rounded-0 border border-secondary"></td>
                            <td style="text-align:center;" class="table_data">{{ $cabin->feedback }}</td>
                            <td style="text-align:center;" class="table_data">{{ $cabin->action }}</td>
                            <td style="text-align:center;" class="table_data">
                                <a href="/updatecabincheck/{{ $cabin->id }}"><i
                                        class="fa-solid fa-edit btn btn-success"></i></a>
                                <a href="/deletecabin/{{ $cabin->id }}"><i
                                        class="fa-solid fa-trash btn btn-danger"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div>
        <a href="/summary/{{ $cabin->assign_id }}"><input type="submit" value="Summary" class="text-white"
                style="background: #06064b;margin-left:900px;"></a>
    </div>
    </div>
@endsection
