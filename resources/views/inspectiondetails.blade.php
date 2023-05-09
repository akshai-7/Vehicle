@extends('layouts.user')
@section('content')
    <div class="userContainer">
        <div class="button">
            <button class="tablinks " onclick="openCheck(event, 'Visual')" id="defaultOpen">
                <h6>Completed Vehicle Inspection </h6>
            </button>
            <button class="tablinks" onclick="openCheck(event, 'Vehicle')">
                <h6>Pending Vehicle Inspection </h6>
            </button>
        </div>
        <div id="Visual" class="table-data tabcontent">
            <div class="" id="table-data">
                <div class="head">
                    <h3>Inspection Details</h3>
                    <a onclick="show('inspectionFrom')"><input type="submit" value="Add-Inspection" id="add1"></a>
                </div>
                <div class="serachbar">
                    <form action="/search" method="GET" autocomplete="off" style="margin-left:-5px">
                        <div id="filterDiv1">
                            <div class="col-md-7" id="filter">
                                <label></label>
                                @if (isset($_GET['date']))
                                    <input type="text1" name="date" class="form-control" value="{{ $_GET['date'] }}">
                                @else
                                    <input type="text1" name="date" class="form-control" value="Select Date">
                                @endif
                            </div>
                            <div class="col-md-7" id="" style="margin-left:5px">
                                <label></label>
                                <select class="form-select form-control" name="name">
                                    @if (isset($_GET['name']))
                                        <option value="{{ $_GET['name'] }}">{{ $_GET['name'] }}</option>
                                        @foreach ($assigns as $assign)
                                            <option value="{{ $assign->name }}">
                                                {{ $assign->name }}</option>
                                        @endforeach
                                    @else
                                        <option>Select Name</option>
                                        @foreach ($assigns as $assign)
                                            <option value="{{ $assign->name }}">
                                                {{ $assign->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-5" style="margin-left: 6px">
                                <br />
                                <button type="submit" class="btn btn-primary btn-sm mt-1"><i
                                        class="fa fa-filter"></i></button>
                                <a href="/inspectiondetails" class="btn btn-success btn-sm mt-1"><i
                                        class="fa-solid fa fa-refresh"></i></a>
                            </div>
                        </div>
                    </form>
                    <form action="/inspectionsearchbar" method="GET" style="margin-left:32%" autocomplete="off">
                        <div id="filterDiv1">
                            <div class="col-md-9">
                                <label></label>
                                <input type="text" name="query" placeholder="Inspected_by/Number Plate/Report.no"
                                    class="form-control">
                            </div>
                            <div class="col-md-5" style="margin-left: 6px">
                                <br />
                                <button type="submit" class="btn btn-primary btn-sm mt-1"><i
                                        class="fa-solid fa-magnifying-glass"></i></i></button>
                                <a href="/inspectiondetails" class="btn btn-success btn-sm mt-1"><i
                                        class="fa-solid fa fa-refresh"></i></a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="order">
                    <table class="table table-bordered mt-3" style="border: 1px solid lightgrey;">
                        <tbody>
                            <thead class="text-primary">
                                <th style="text-align:center;">S.No</th>
                                <th style="text-align:center;">Inspection Date</th>
                                <th style="text-align:center;">Report.no</th>
                                <th style="text-align:center;">Inspected by</th>
                                <th style="text-align:center;">Driver Name</th>
                                <th style="text-align:center;">Number Plate</th>
                                <th style="text-align:center;">Mileage</th>
                                <th style="text-align:center;">Status</th>
                                <th style="text-align:center;">Action</th>
                            </thead>
                            @foreach ($inspections as $inspection)
                                <tr class="table_row">
                                    <td style="text-align:center;">
                                        @php
                                            $date = $inspection->created_at;
                                            $dates = $date->weekOfYear;
                                            $fiscalYearStart = date('01-04-Y');
                                            $diff = strtotime($date) - strtotime($fiscalYearStart);
                                            $weekNumber = ceil($diff / (7 * 24 * 60 * 60));
                                        @endphp
                                        {{ \Carbon\Carbon::now()->format('y') }}W{{ $weekNumber }}{{ $inspection->id }}
                                    </td>
                                    <td style="text-align:center;">
                                        {{ Carbon\Carbon::parse($inspection->date)->format('d/m/Y') }}
                                    </td>
                                    <td style="text-align:center;">{{ $inspection->report_no }}
                                    </td>
                                    <td style="text-align:center;">
                                        {{ ucfirst(strtolower($inspection->inspected_by)) }}
                                    </td>
                                    <td style="text-align:center;">{{ $inspection->name }}</td>
                                    <td style="text-align:center;">
                                        {{ $inspection->number_plate }}</td>
                                    <td style="text-align:center;">{{ $inspection->mileage }}
                                    </td>

                                    <td style="text-align:center;"><button type="button"
                                            class="btn btn-success btn-sm">Completed</button>
                                    </td>
                                    <td style="text-align:center;">
                                        <a href="/details/{{ $inspection->id }}"><i
                                                class="bi bi-eye-fill btn-sm btn btn-success" data-toggle="tooltip"
                                                data-placement="top" title="View"></i></a>
                                        <a href="/deleteinspection/{{ $inspection->id }}"><i
                                                class="bi bi-trash-fill btn btn-danger btn-sm" data-toggle="tooltip"
                                                data-placement="right" title="Delete"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if (count($inspections) < 1)
                        <div id="dataNotFound">
                            <p>Data not found</p>
                        </div>
                    @endif
                </div>
            </div>
            <div class="active">
                {!! $inspections->links() !!}
            </div>
        </div>
        <div id="Vehicle" class="tabcontent">
            <div class="table-data" id="table-data">
                {{-- <div class="serachbar">
                    <form action="/search" method="GET" autocomplete="off" style="margin-left:-5px">
                        <div id="filterDiv1">
                            <div class="col-md-7" id="filter">
                                <label></label>
                                @if (isset($_GET['date']))
                                    <input type="text1" name="date" class="form-control"
                                        value="{{ $_GET['date'] }}">
                                @else
                                    <input type="text1" name="date" class="form-control" value="Select Date">
                                @endif
                            </div>
                            <div class="col-md-7" id="" style="margin-left:5px">
                                <label></label>
                                <select class="form-select form-control" name="name">
                                    @if (isset($_GET['name']))
                                        <option value="{{ $_GET['name'] }}">{{ $_GET['name'] }}</option>
                                        @foreach ($assigns as $assign)
                                            <option value="{{ $assign->name }}">
                                                {{ $assign->name }}</option>
                                        @endforeach
                                    @else
                                        <option>Select Name</option>
                                        @foreach ($assigns as $assign)
                                            <option value="{{ $assign->name }}">
                                                {{ $assign->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-5" style="margin-left: 6px">
                                <br />
                                <button type="submit" class="btn btn-primary btn-sm mt-1"><i
                                        class="fa fa-filter"></i></button>
                                <a href="/inspectiondetails" class="btn btn-success btn-sm mt-1"><i
                                        class="fa-solid fa fa-refresh"></i></a>
                            </div>
                        </div>
                    </form>
                    <form action="/inspectionsearchbar" method="GET" style="margin-left:32%" autocomplete="off">
                        <div id="filterDiv1">
                            <div class="col-md-9">
                                <label></label>
                                <input type="text" name="query" placeholder="Inspected_by/Number Plate/Report.no"
                                    class="form-control">
                            </div>
                            <div class="col-md-5" style="margin-left: 6px">
                                <br />
                                <button type="submit" class="btn btn-primary btn-sm mt-1"><i
                                        class="fa-solid fa-magnifying-glass"></i></i></button>
                                <a href="/inspectiondetails" class="btn btn-success btn-sm mt-1"><i
                                        class="fa-solid fa fa-refresh"></i></a>
                            </div>
                        </div>
                    </form>
                </div> --}}
                <div class="order">
                    <table class="table table-bordered mt-3" style="border: 1px solid lightgrey">
                        <thead class="text-primary">
                            <th style="text-align:center;">S.No</th>
                            <th style="text-align:center;">Driver Name</th>
                            <th style="text-align:center;">Email</th>
                            <th style="text-align:center;">Number Plate</th>
                            <th style="text-align:center;">Next Inspection</th>
                            <th style="text-align:center;">status</th>
                            <th style="text-align:center;">Over Due</th>
                        </thead>
                        <tbody>
                            @foreach ($assigns as $assign)
                                <tr class="table_row">
                                    <td style="text-align:center;">
                                        @php
                                            $date = $assign->created_at;
                                            $dates = $date->weekOfYear;
                                            $fiscalYearStart = date('01-04-Y');
                                            $diff = strtotime($date) - strtotime($fiscalYearStart);
                                            $weekNumber = ceil($diff / (7 * 24 * 60 * 60));
                                        @endphp
                                        {{ \Carbon\Carbon::now()->format('y') }}W{{ $weekNumber }}{{ $assign->id }}
                                    </td>
                                    <td style="text-align:center;">{{ $assign->name }}</td>
                                    <td style="text-align:center;">{{ $assign->email }}</td>
                                    <td style="text-align:center;">{{ $assign->number_plate }}
                                    </td>
                                    <td style="text-align:center;">
                                        {{ Carbon\Carbon::parse($assign->next_inspection)->format('d/m/Y') }}
                                    </td>
                                    <td style="text-align:center;"><button type="button"
                                            class="btn btn-danger btn-sm">Pending</button>
                                    </td>
                                    <td style="text-align:center;">
                                        @if ($assign->next_inspection >= Carbon\Carbon::today())
                                            <button type="button" class="btn btn-success btn-sm">No</button>
                                        @else
                                            <button type="button" class="btn btn-danger btn-sm">Yes</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if (count($assigns) < 1)
                        <p>Data not found</p>
                    @endif
                </div>
            </div>
            <div class="active">
                {!! $assigns->links() !!}
            </div>
        </div>
        <div id="inspectionFrom">
            <section id="inspectionFromPopUp">
                <div id="userHeading">
                    <h4 style="margin-top: 2%">
                        Inspection Details
                    </h4>
                    <a href="#" onclick="hide('inspectionFrom')">
                        <h4 style="color:#bf0e3a;"> <i class="fa-sharp fa-regular fa-circle-xmark"></i></h4>
                    </a>
                </div>
                <form action="/store/{id}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="report1">
                        <div class="form-group row mt-5 select ">
                            <select class="form-select form-control" style="width: 400px;background:rgb(230, 230, 236)"
                                name="name">
                                <option>Please Select Driver</option>
                                @foreach ($assigns as $assign)
                                    <option value="{{ $assign->name }}">{{ $assign->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="subreport">
                            <div class="form-group row mt-5 ">
                                <div class="col-sm-9">
                                    <input type="text" name="mileage" placeholder="Current Mileage"
                                        class="form-control" style="background:rgb(230, 230, 236)">
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('mileage')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="inspected_by" value="Admin">
                    </div>
                    <div class="head">
                        <h5 class="mt-5">Visual Check</h5>
                    </div>
                    <div>
                        <table class="table table-bordered mt-3" style="border: 1px solid grey;">
                            <thead>
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
                                <tr class="list">
                                    <td class="col-md-1"><input type="" name="sno[]"
                                            class="form-control col-md-1 border-0" style="text-align:center;"
                                            value="1" id="sno" readonly></td>
                                    <td><input type="" name="view[]" class="form-control view border-0"
                                            style="text-align:center;" id='view' value="Front" readonly>
                                    </td>
                                    <td><input type="file" name="Front[]" class="form-control "
                                            style="text-align:center;" id='image' multiple>
                                    </td>
                                    <td><input type="text" name="feedback[]" class="form-control feedback border-0"
                                            style="text-align:center;" id='feedback'></td>
                                    <td><input type="text" name="notes[]" class="form-control notes border-0"
                                            style="text-align:center; width;10px;" id='notes'></td>
                                    <td>
                                        <input type="text" name="action[]" class="form-control action border-0"
                                            style="text-align:center;" id='action' placeholder="">
                                        {{-- <input type="radio" id='good' name="action[]" value="Good">
                                        <label for="good">Good</label><br>
                                        <input type="radio" id='bad' name="action[]" value="Bad">
                                        <label for="bad">Bad</label><br> --}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-1"><input type="" name="sno[]"
                                            class="form-control col-md-1 border-0" style="text-align:center;"
                                            value="2" id="sno" readonly></td>
                                    <td><input type="" name="view[]" class="form-control view border-0"
                                            style="text-align:center;" id='view' value="Near-Side" readonly>
                                    </td>
                                    <td><input type="file" name="Near-Side[]" class="form-control "
                                            style="text-align:center;" id='image' multiple></td>
                                    <td><input type="text" name="feedback[]" class="form-control feedback border-0"
                                            style="text-align:center;" id='feedback'></td>
                                    <td><input type="text" name="notes[]" class="form-control notes border-0"
                                            style="text-align:center;" id='notes'></td>
                                    <td><input type="text" name="action[]" class="form-control action border-0"
                                            style="text-align:center;" id='action' placeholder=""></td>
                                </tr>
                                <tr>
                                    <td class="col-md-1"><input type="text" name="sno[]"
                                            class="form-control col-md-1 border-0" style="text-align:center;"
                                            value="3" id="sno" readonly></td>
                                    <td><input type="text" name="view[]" class="form-control view border-0"
                                            style="text-align:center;" id='view' value="Rear" readonly>
                                    </td>
                                    <td><input type="file" name="Rear[]" class="form-control image "
                                            style="text-align:center;" id='image' multiple></td>
                                    <td><input type="text" name="feedback[]" class="form-control feedback border-0"
                                            style="text-align:center;" id='feedback'></td>
                                    <td><input type="text" name="notes[]" class="form-control notes border-0"
                                            style="text-align:center;" id='notes'></td>
                                    <td><input type="text" name="action[]" class="form-control action border-0"
                                            style="text-align:center;" id='action' placeholder=""></td>
                                </tr>
                                <tr>
                                    <td class="col-md-1"><input type="text" name="sno[]"
                                            class="form-control col-md-1 border-0" style="text-align:center;"
                                            value="4" id="sno readonly"></td>
                                    <td><input type="text" name="view[]" class="form-control view border-0"
                                            style="text-align:center;" id='view' value="Off-side" readonly>
                                    </td>
                                    <td><input type="file" name="Off-side[]" class="form-control image "
                                            style="text-align:center;" id='image' multiple></td>
                                    <td><input type="text" name="feedback[]" class="form-control feedback border-0"
                                            style="text-align:center;" id='feedback'></td>
                                    <td><input type="text" name="notes[]" class="form-control notes border-0"
                                            style="text-align:center;" id='notes'></td>
                                    <td><input type="text" name="action[]" class="form-control action border-0"
                                            style="text-align:center;" id='action' placeholder=""></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <div class="head">
                            <h5 class="">Vehicle Check</h5>
                        </div>
                        <div>
                            <table class="table table-bordered mt-3" style="border: 1px solid grey;">
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
                                                value="1" id="sno" readonly></td>
                                        <td><input type="text" name="view1[]" class="form-control view border-0"
                                                style="text-align:center;" id='view' value="Adblue-levels" readonly>
                                        </td>
                                        <td><input type="file" name="Adblue-levels[]" class="form-control image "
                                                style="text-align:center;" id='image' multiple></td>
                                        <td><input type="text" name="feedback1[]"
                                                class="form-control feedback border-0" style="text-align:center;"
                                                id='feedback'></td>
                                        <td><input type="text" name="notes1[]" class="form-control notes border-0"
                                                style="text-align:center;" id='notes'></td>
                                        <td><input type="text" name="action1[]" class="form-control action border-0"
                                                style="text-align:center;" id='action' placeholder=""></td>
                                    </tr>
                                    <tr class="list">
                                        <td class="col-md-1"><input type="text" name="sno[]"
                                                class="form-control col-md-1 border-0" style="text-align:center;"
                                                value="2" id="sno" readonly></td>
                                        <td><input type="text" name="view1[]" class="form-control view border-0"
                                                style="text-align:center;" id='view' value="Fuel&Oil-Leaks"
                                                readonly>
                                        </td>
                                        <td><input type="file" name="Fuel&Oil-Leaks[]" class="form-control image"
                                                style="text-align:center;" id='image' multiple></td>
                                        <td><input type="text" name="feedback1[]"
                                                class="form-control feedback border-0" style="text-align:center;"
                                                id='feedback'></td>
                                        <td><input type="text" name="notes1[]" class="form-control notes border-0"
                                                style="text-align:center;" id='notes'></td>
                                        <td><input type="text" name="action1[]" class="form-control action border-0"
                                                style="text-align:center;" id='action' placeholder=""></td>
                                    </tr>
                                    <tr class="list">
                                        <td class="col-md-1"><input type="text" name="sno[]"
                                                class="form-control col-md-1 border-0" style="text-align:center;"
                                                value="3" id="sno" readonly></td>
                                        <td><input type="text" name="view1[]" class="form-control view border-0"
                                                style="text-align:center;" id='view' value="Lights" readonly>
                                        </td>
                                        <td><input type="file" name="Lights[]" class="form-control image "
                                                style="text-align:center;" id='image' multiple></td>
                                        <td><input type="text" name="feedback1[]"
                                                class="form-control feedback border-0" style="text-align:center;"
                                                id='feedback'></td>
                                        <td><input type="text" name="notes1[]" class="form-control notes border-0"
                                                style="text-align:center;" id='notes'></td>
                                        <td><input type="text" name="action1[]" class="form-control action border-0"
                                                style="text-align:center;" id='action' placeholder=""></td>
                                    </tr>
                                    <tr class="list">
                                        <td class="col-md-1"><input type="text" name="sno[]"
                                                class="form-control col-md-1 border-0" style="text-align:center;"
                                                value="4" id="sno" readonly></td>
                                        <td><input type="text" name="view1[]" class="form-control view border-0"
                                                style="text-align:center;" id='view' value="Indicators/Signals"
                                                readonly>
                                        </td>
                                        <td><input type="file" name="Indicators/Signals[]" class="form-control image "
                                                style="text-align:center;" id='image' multiple></td>
                                        <td><input type="text" name="feedback1[]"
                                                class="form-control feedback border-0" style="text-align:center;"
                                                id='feedback'></td>
                                        <td><input type="text" name="notes1[]" class="form-control notes border-0"
                                                style="text-align:center;" id='notes'></td>
                                        <td><input type="text" name="action1[]" class="form-control action border-0"
                                                style="text-align:center;" id='action' placeholder=""></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div>
                        <div class="head">
                            <h5 class="">Cabin Check</h5>
                        </div>
                        <div>
                            <div>
                                <table class="table table-bordered mt-3" style="border: 1px solid grey;">
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
                                                    value="1" id="sno" readonly></td>
                                            <td><input type="text" name="view2[]" class="form-control view border-0"
                                                    style="text-align:center;" id='view' value="Steering" readonly>
                                            </td>
                                            <td><input type="file" name="Steering[]" class="form-control image "
                                                    style="text-align:center;" id='image' multiple></td>
                                            <td><input type="text" name="feedback2[]"
                                                    class="form-control feedback border-0" style="text-align:center;"
                                                    id='feedback'></td>
                                            <td><input type="text" name="notes2[]" class="form-control notes border-0"
                                                    style="text-align:center;" id='notes'></td>
                                            <td><input type="text" name="action2[]"
                                                    class="form-control action border-0" style="text-align:center;"
                                                    id='action' placeholder="">
                                            </td>
                                        </tr>
                                        <tr class="list">
                                            <td class="col-md-1"><input type="text" name="sno[]"
                                                    class="form-control col-md-1 border-0" style="text-align:center;"
                                                    value="2" id="sno" readonly></td>
                                            <td><input type="text" name="view2[]" class="form-control view border-0"
                                                    style="text-align:center;" id='view' value="Wipers" readonly>
                                            </td>
                                            <td><input type="file" name="Wipers[]" class="form-control image "
                                                    style="text-align:center;" id='image' multiple></td>
                                            <td><input type="text" name="feedback2[]"
                                                    class="form-control feedback border-0" style="text-align:center;"
                                                    id='feedback'></td>
                                            <td><input type="text" name="notes2[]" class="form-control notes border-0"
                                                    style="text-align:center;" id='notes'></td>
                                            <td><input type="text" name="action2[]"
                                                    class="form-control action border-0" style="text-align:center;"
                                                    id='action' placeholder="">
                                            </td>
                                        </tr>
                                        <tr class="list">
                                            <td class="col-md-1"><input type="text" name="sno[]"
                                                    class="form-control col-md-1 border-0" style="text-align:center;"
                                                    value="3" id="sno" readonly></td>
                                            <td><input type="text" name="view2[]" class="form-control view border-0"
                                                    style="text-align:center;" id='view' value="Washers" readonly>
                                            </td>
                                            <td><input type="file" name="Washers[]" class="form-control image "
                                                    style="text-align:center;" id='image' multiple></td>
                                            <td><input type="text" name="feedback2[]"
                                                    class="form-control feedback border-0" style="text-align:center;"
                                                    id='feedback'></td>
                                            <td><input type="text" name="notes2[]" class="form-control notes border-0"
                                                    style="text-align:center;" id='notes'></td>
                                            <td><input type="text" name="action2[]"
                                                    class="form-control action border-0" style="text-align:center;"
                                                    id='action' placeholder="">
                                            </td>
                                        </tr>
                                        <tr class="list">

                                            <td class="col-md-1"><input type="" name="sno[]"
                                                    class="form-control col-md-1 border-0" style="text-align:center;"
                                                    value="4" id="sno" readonly></td>
                                            <td><input type="text" name="view2[]" class="form-control view border-0"
                                                    style="text-align:center;" id='view' value="Horn" readonly>
                                            </td>
                                            <td><input type="file" name="Horn[]" class="form-control image "
                                                    style="text-align:center;" id='image' multiple></td>
                                            <td><input type="text" name="feedback2[]"
                                                    class="form-control feedback border-0" style="text-align:center;"
                                                    id='feedback'></td>
                                            <td><input type="text" name="notes2[]" class="form-control notes border-0"
                                                    style="text-align:center;" id='notes'></td>
                                            <td><input type="text" name="action2[]"
                                                    class="form-control action border-0" style="text-align:center;"
                                                    id='action' placeholder="">
                                            </td>
                                        </tr>
                                        <tr class="list">
                                            <td class="col-md-1"><input type="text" name="sno[]"
                                                    class="form-control col-md-1 border-0" style="text-align:center;"
                                                    value="5" id="sno" readonly></td>
                                            <td><input type="text" name="view2[]" class="form-control view border-0"
                                                    style="text-align:center;" id='view' value="Breakes-inc-ABS/EBS"
                                                    readonly></td>
                                            <td><input type="file" name="Breakes-inc-ABS/EBS[]"
                                                    class="form-control image " style="text-align:center;" id='image'
                                                    multiple></td>
                                            <td><input type="text" name="feedback2[]"
                                                    class="form-control feedback border-0" style="text-align:center;"
                                                    id='feedback'></td>
                                            <td><input type="text" name="notes2[]" class="form-control notes border-0"
                                                    style="text-align:center;" id='notes'></td>
                                            <td><input type="text" name="action2[]"
                                                    class="form-control action border-0" style="text-align:center;"
                                                    id='action' placeholder="">
                                            </td>
                                        </tr>
                                        <tr class="list">
                                            <td class="col-md-1"><input type="text" name="sno[]"
                                                    class="form-control col-md-1 border-0" style="text-align:center;"
                                                    value="6" id="sno" readonly></td>
                                            <td><input type="text" name="view2[]" class="form-control view border-0"
                                                    style="text-align:center;" id='view'
                                                    value="Mirrors/Glass/Visibility" readonly>
                                            </td>
                                            <td><input type="file" name="Mirrors/Glass/Visibility[]"
                                                    class="form-control image " style="text-align:center;" id='image'
                                                    multiple></td>
                                            <td><input type="text" name="feedback2[]"
                                                    class="form-control feedback border-0" style="text-align:center;"
                                                    id='feedback'></td>
                                            <td><input type="text" name="notes2[]" class="form-control notes border-0"
                                                    style="text-align:center;" id='notes'></td>
                                            <td><input type="text" name="action2[]"
                                                    class="form-control action border-0" style="text-align:center;"
                                                    id='action' placeholder="">
                                            </td>
                                        </tr>
                                        <tr class="list">
                                            <td class="col-md-1"><input type="text" name="sno[]"
                                                    class="form-control col-md-1 border-0" style="text-align:center;"
                                                    value="7" id="sno" readonly></td>
                                            <td><input type="text" name="view2[]" class="form-control view border-0"
                                                    style="text-align:center;" id='view'
                                                    value="Truck-Interior/SeatBelt">
                                            </td>
                                            <td><input type="file" name="Truck-Interior/SeatBelt[]"
                                                    class="form-control image " style="text-align:center;" id='image'
                                                    multiple></td>
                                            <td><input type="text" name="feedback2[]"
                                                    class="form-control feedback border-0" style="text-align:center;"
                                                    id='feedback'></td>
                                            <td><input type="text" name="notes2[]" class="form-control notes border-0"
                                                    style="text-align:center;" id='notes'></td>
                                            <td><input type="text" name="action2[]"
                                                    class="form-control action border-0" style="text-align:center;"
                                                    id='action' placeholder="">
                                            </td>
                                        </tr>
                                        <tr class="list">
                                            <td class="col-md-1"><input type="text" name="sno[]"
                                                    class="form-control col-md-1 border-0" style="text-align:center;"
                                                    value="8" id="sno" readonly></td>
                                            <td><input type="text" name="view2[]" class="form-control view border-0"
                                                    style="text-align:center;" id='view' value="WariningLamps/MIL"
                                                    readonly>
                                            </td>
                                            <td><input type="file" name="WariningLamps/MIL[]"
                                                    class="form-control image " style="text-align:center;" id='image'
                                                    multiple></td>
                                            <td><input type="text" name="feedback2[]"
                                                    class="form-control feedback border-0" style="text-align:center;"
                                                    id='feedback'></td>
                                            <td><input type="text" name="notes2[]" class="form-control notes border-0"
                                                    style="text-align:center;" id='notes'></td>
                                            <td><input type="text" name="action2[]"
                                                    class="form-control action border-0" style="text-align:center;"
                                                    id='action' placeholder="">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="divClose">
                            <a href="#" style="margin-left:750px;"><input type="submit" value="Submit"
                                    class="text-white mt-4" id="add"></a>
                        </div>
                </form>
        </div>
    </div>
@endsection
