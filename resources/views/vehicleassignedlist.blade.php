@extends('layouts.user')
@section('content')
    <div class="userContainer">
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <div style="display:flex;">
                        <h3>Vehicle Assigned List</h3>
                        <a style="margin-left:30px;margin-top:10px;" onclick="show('inspectionFrom')"><input type="submit"
                                value="Inspection" id="add"></a>
                        <a style="margin-left:20px;margin-top:10px;" onclick="show('incidentFrom')"><input type="submit"
                                value="Incident" id="add"></a>
                    </div>
                </div>
                <table class="table table-bordered mt-3" style="border: 1px solid lightgrey">
                    <thead class="text-primary">
                        <th style="text-align:center;">Id</th>
                        <th style="text-align:center;">Driver Name</th>
                        <th style="text-align:center;">Email</th>
                        <th style="text-align:center;">Number plate</th>
                        <th style="text-align:center;">Mileage</th>
                        <th style="text-align:center;">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($assign as $assign)
                            <tr class="table_row">
                                <td style="text-align:center;" class="table_data">{{ $assign->id }}</td>
                                <td style="text-align:center;" class="table_data">{{ $assign->name }}</td>
                                <td style="text-align:center;" class="table_data">{{ $assign->email }}</td>
                                <td style="text-align:center;" class="table_data">{{ $assign->number_plate }}
                                </td>
                                <td style="text-align:center;" class="table_data">{{ $assign->mileage }}
                                </td>
                                <td style="text-align:center;" class="table_data">
                                    <a href="/updateassignlist/{{ $assign->id }}" onclick="show('popup9')"
                                        data-toggle="tooltip" data-placement="top" title="Edit"><i
                                            class="fa-solid fa-eye btn btn-success"></i></a>
                                    <a href="/deleteId/{{ $assign->id }}" data-toggle="tooltip" data-placement="top"
                                        title="Delete"><i class="fa-solid fa-trash btn btn-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
                            <select class="form-select form-control" style="width: 400px;" name="name">
                                <option>Please Select Driver</option>
                                @foreach ($assigns as $assign)
                                    <option value="{{ $assign->name }}">{{ $assign->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="subreport">
                            <div class="form-group row mt-5 ">
                                <div class="col-sm-9">
                                    <input type="text" name="mileage" placeholder="Current Mileage" class="form-control">
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
                                    <td><input type="text" name="action[]" class="form-control action border-0"
                                            style="text-align:center;" id='action' placeholder=""></td>
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
                            <a href="#"><input value="Close" type="button"
                                    onclick="hide('inspectionFrom')"class="text-white mt-4" id="add"
                                    style="margin-left:650px;"></a>
                            <a href="#"><input type="submit" value="Submit" class="text-white mt-4"
                                    id="add"></a>
                        </div>
                </form>
        </div>
        </section>
    </div>
    <div id="incidentFrom">
        <section id="incidentFromPopUp">
            <form action="/reportonincident/{id}" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div id="userHeading">
                    <h4 style="margin-top: 2%">
                        Report On Incident
                    </h4>
                    <a href="#" onclick="hide('incidentFrom')">
                        <h4 style="color:#bf0e3a;"> <i class="fa-sharp fa-regular fa-circle-xmark"></i></h4>
                    </a>
                </div>
                <div class="vehicle">
                    <div class="form-group mt-5">
                        <label class="col-sm-2 col-form-label">User</label>
                        <select class="form-select " style="width: 370px;" name="name">
                            <option>Please Select Driver</option>
                            @foreach ($assigns as $assign)
                                <option value="{{ $assign->name }}">{{ $assign->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-sm-2 col-form-label">Date</label>
                        <div class="col-sm-9">
                            <input type="date" name="date" class="form-control">
                            <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('date')
                                    *{{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mt-4 ">
                        <label class="col-sm-2 col-form-label">Location</label>
                        <div class="col-sm-9">
                            <input type="text" name="location" class="form-control">
                            <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('location')
                                    *{{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mt-4 ">
                        <label class="col-sm-2 col-form-label"> Witnessed_by</label>
                        <div class="col-sm-9">
                            <input type="text" name="witnessed_by" class="form-control">
                            <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('witnessed_by')
                                    *{{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mt-4 ">
                        <label class="col-sm-2 col-form-label">Mobile.no</label>
                        <div class="col-sm-9">
                            <input type="text" name="mobile" class="form-control">
                            <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('mobile')
                                    *{{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mt-4 ">
                        <label class="col-sm-2 col-form-label">Statement</label>
                        <div class="col-sm-9">
                            <input type="text" name="statement" class="form-control">
                            <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('statement')
                                    *{{ $message }}
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="form-group row mt-4 ">
                        <label class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-9">
                            <input type="file" name="image[]" class="form-control" multiple>
                            <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('image')
                                    *{{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="divClose">
                            <a href="#"><input value="Close" type="button"
                                    onclick="hide('incidentFrom')"class="text-white mt-4" id="add"
                                    style="margin-left:300px;"></a>
                            <a href="#"><input type="submit" value="Submit" class="text-white mt-4"
                                    id="add"></a>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
    </div>
@endsection
