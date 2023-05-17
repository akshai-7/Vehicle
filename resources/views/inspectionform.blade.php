@extends('layouts.user')
@section('content')
    <div>
        <div id="userHeading" class="mt-4">
            <h4>
                Inspection Details
            </h4>
            <a href="/inspectiondetails">
                <h4 style="color:#bf0e3a;"> <i class="fa-sharp fa-regular fa-circle-xmark"></i></h4>
            </a>
        </div>
        <form action="/store/{id}" method="POST" enctype="multipart/form-data" autocomplete="off" id="form"
            style="width: 1050px">
            @csrf
            <div class="report1">
                <div class="form-group row mt-5 select ">
                    <select class="form-select form-control" style="width: 500px;background: rgb(236, 236, 239);"
                        name="name">
                        <option>Please Select Driver</option>
                        @foreach ($assigns as $assign)
                            <option value="{{ $assign->name }}">{{ $assign->name }}
                            </option>
                        @endforeach
                    </select>

                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('name')
                            *{{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="subreport">
                    <div class="form-group row mt-5 ">
                        <div class="col-sm-9">
                            <input type="text" name="mileage" placeholder="Current Mileage" class="form-control"
                                style="width: 500px;background: rgb(236, 236, 239);" value="{{ old('mileage') }}">
                            <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('mileage')
                                    *{{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="inspected_by" value="Admin">
            </div>
            <div>
                <div class="head">
                    <h5 class="mt-5">Visual Check</h5>
                </div>
                <div>
                    <table class="table table-bordered mt-3" style="border: 1px solid grey;width">
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
                                        class="form-control col-md-1 border-0" style="text-align:center;" value="1"
                                        id="sno" readonly>
                                </td>
                                <td><input type="" name="view[]" class="form-control view border-0"
                                        style="text-align:center;" id='view' value="Front" readonly>
                                </td>
                                <td><input type="file" name="Front[]" class="form-control " style="text-align:center;"
                                        id='image' multiple>
                                </td>
                                <td><input type="text" name="feedback[]" class="form-control feedback border-0"
                                        style="text-align:center;" id='feedback' value="{{ old('feedback[]') }}">
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('feedback[]')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                </td>
                                <td><input type="text" name="notes[]" class="form-control notes border-0"
                                        style="text-align:center; width;10px;" id='notes'>
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('notes[]')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                </td>
                                <td>
                                    <input type="text" name="action[]" class="form-control action border-0"
                                        style="text-align:center;" id='action' placeholder="Good/Bad">
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('action[]')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-md-1"><input type="" name="sno[]"
                                        class="form-control col-md-1 border-0" style="text-align:center;" value="2"
                                        id="sno" readonly></td>
                                <td><input type="" name="view[]" class="form-control view border-0"
                                        style="text-align:center;" id='view' value="Near-Side" readonly>
                                </td>
                                <td><input type="file" name="Near-Side[]" class="form-control "
                                        style="text-align:center;" id='image' multiple>
                                </td>
                                <td><input type="text" name="feedback[]" class="form-control feedback border-0"
                                        style="text-align:center;" id='feedback'>
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('feedback[]')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                </td>
                                <td><input type="text" name="notes[]" class="form-control notes border-0"
                                        style="text-align:center; width;10px;" id='notes'>
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('notes[]')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                </td>
                                <td>
                                    <input type="text" name="action[]" class="form-control action border-0"
                                        style="text-align:center;" id='action' placeholder="Good/Bad">
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('action[]')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-md-1"><input type="text" name="sno[]"
                                        class="form-control col-md-1 border-0" style="text-align:center;" value="3"
                                        id="sno" readonly></td>
                                <td><input type="text" name="view[]" class="form-control view border-0"
                                        style="text-align:center;" id='view' value="Rear" readonly>
                                </td>
                                <td><input type="file" name="Rear[]" class="form-control image "
                                        style="text-align:center;" id='image' multiple></td>
                                <td><input type="text" name="feedback[]" class="form-control feedback border-0"
                                        style="text-align:center;" id='feedback'>
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('feedback[]')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                </td>
                                <td><input type="text" name="notes[]" class="form-control notes border-0"
                                        style="text-align:center; width;10px;" id='notes'>
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('notes[]')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                </td>
                                <td>
                                    <input type="text" name="action[]" class="form-control action border-0"
                                        style="text-align:center;" id='action' placeholder="Good/Bad">
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('action[]')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-md-1"><input type="text" name="sno[]"
                                        class="form-control col-md-1 border-0" style="text-align:center;" value="4"
                                        id="sno readonly"></td>
                                <td><input type="text" name="view[]" class="form-control view border-0"
                                        style="text-align:center;" id='view' value="Off-side" readonly>
                                </td>
                                <td><input type="file" name="Off-side[]" class="form-control image "
                                        style="text-align:center;" id='image' multiple></td>
                                <td><input type="text" name="feedback[]" class="form-control feedback border-0"
                                        style="text-align:center;" id='feedback'>
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('feedback[]')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                </td>
                                <td><input type="text" name="notes[]" class="form-control notes border-0"
                                        style="text-align:center; width;10px;" id='notes'>
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('notes[]')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                </td>
                                <td>
                                    <input type="text" name="action[]" class="form-control action border-0"
                                        style="text-align:center;" id='action' placeholder="Good/Bad">
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('action[]')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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
                                        class="form-control col-md-1 border-0" style="text-align:center;" value="1"
                                        id="sno" readonly></td>
                                <td><input type="text" name="view1[]" class="form-control view border-0"
                                        style="text-align:center;" id='view' value="Adblue-levels" readonly>
                                </td>
                                <td><input type="file" name="Adblue-levels[]" class="form-control image "
                                        style="text-align:center;" id='image' multiple>
                                </td>
                                <td><input type="text" name="feedback1[]" class="form-control feedback border-0"
                                        style="text-align:center;" id='feedback'>
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('feedback1[]')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                </td>
                                <td><input type="text" name="notes1[]" class="form-control notes border-0"
                                        style="text-align:center;" id='notes'>
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('notes1[]')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                </td>
                                <td><input type="text" name="action1[]" class="form-control action border-0"
                                        style="text-align:center;" id='action' placeholder="Good/Bad">
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('action1[]')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                </td>
                            </tr>
                            <tr class="list">
                                <td class="col-md-1"><input type="text" name="sno[]"
                                        class="form-control col-md-1 border-0" style="text-align:center;" value="2"
                                        id="sno" readonly></td>
                                <td><input type="text" name="view1[]" class="form-control view border-0"
                                        style="text-align:center;" id='view' value="Fuel&Oil-Leaks" readonly>
                                </td>
                                <td><input type="file" name="Fuel&Oil-Leaks[]" class="form-control image"
                                        style="text-align:center;" id='image' multiple></td>
                                <td><input type="text" name="feedback1[]" class="form-control feedback border-0"
                                        style="text-align:center;" id='feedback'>
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('feedback1[]')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                </td>
                                <td><input type="text" name="notes1[]" class="form-control notes border-0"
                                        style="text-align:center;" id='notes'>
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('notes1[]')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                </td>
                                <td><input type="text" name="action1[]" class="form-control action border-0"
                                        style="text-align:center;" id='action' placeholder="Good/Bad">
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('action1[]')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                </td>
                            </tr>
                            <tr class="list">
                                <td class="col-md-1"><input type="text" name="sno[]"
                                        class="form-control col-md-1 border-0" style="text-align:center;" value="3"
                                        id="sno" readonly></td>
                                <td><input type="text" name="view1[]" class="form-control view border-0"
                                        style="text-align:center;" id='view' value="Lights" readonly>
                                </td>
                                <td><input type="file" name="Lights[]" class="form-control image "
                                        style="text-align:center;" id='image' multiple></td>
                                <td><input type="text" name="feedback1[]" class="form-control feedback border-0"
                                        style="text-align:center;" id='feedback'>
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('feedback1[]')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                </td>
                                <td><input type="text" name="notes1[]" class="form-control notes border-0"
                                        style="text-align:center;" id='notes'>
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('notes1[]')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                </td>
                                <td><input type="text" name="action1[]" class="form-control action border-0"
                                        style="text-align:center;" id='action' placeholder="Good/Bad">
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('action1[]')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                </td>
                            </tr>
                            <tr class="list">
                                <td class="col-md-1"><input type="text" name="sno[]"
                                        class="form-control col-md-1 border-0" style="text-align:center;" value="4"
                                        id="sno" readonly></td>
                                <td><input type="text" name="view1[]" class="form-control view border-0"
                                        style="text-align:center;" id='view' value="Indicators/Signals" readonly>
                                </td>
                                <td><input type="file" name="Indicators/Signals[]" class="form-control image "
                                        style="text-align:center;" id='image' multiple></td>
                                <td><input type="text" name="feedback1[]" class="form-control feedback border-0"
                                        style="text-align:center;" id='feedback'>
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('feedback1[]')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                </td>
                                <td><input type="text" name="notes1[]" class="form-control notes border-0"
                                        style="text-align:center;" id='notes'>
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('notes1[]')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                </td>
                                <td><input type="text" name="action1[]" class="form-control action border-0"
                                        style="text-align:center;" id='action' placeholder="Good/Bad">
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('action1[]')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                </td>
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
                                    <td><input type="text" name="feedback2[]" class="form-control feedback border-0"
                                            style="text-align:center;" id='feedback'>
                                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('feedback2[]')
                                                *{{ $message }}
                                            @enderror
                                        </div>
                                    </td>
                                    <td><input type="text" name="notes2[]" class="form-control notes border-0"
                                            style="text-align:center;" id='notes'>
                                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('notes2[]')
                                                *{{ $message }}
                                            @enderror
                                        </div>
                                    </td>
                                    <td><input type="text" name="action2[]" class="form-control action border-0"
                                            style="text-align:center;" id='action' placeholder="Good/Bad">
                                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('action2[]')
                                                *{{ $message }}
                                            @enderror
                                        </div>
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
                                    <td><input type="text" name="feedback2[]" class="form-control feedback border-0"
                                            style="text-align:center;" id='feedback'>
                                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('feedback2[]')
                                                *{{ $message }}
                                            @enderror
                                        </div>
                                    </td>
                                    <td><input type="text" name="notes2[]" class="form-control notes border-0"
                                            style="text-align:center;" id='notes'>
                                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('notes2[]')
                                                *{{ $message }}
                                            @enderror
                                        </div>
                                    </td>
                                    <td><input type="text" name="action2[]" class="form-control action border-0"
                                            style="text-align:center;" id='action' placeholder="Good/Bad">
                                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('action2[]')
                                                *{{ $message }}
                                            @enderror
                                        </div>
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
                                    <td><input type="text" name="feedback2[]" class="form-control feedback border-0"
                                            style="text-align:center;" id='feedback'>
                                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('feedback2[]')
                                                *{{ $message }}
                                            @enderror
                                        </div>
                                    </td>
                                    <td><input type="text" name="notes2[]" class="form-control notes border-0"
                                            style="text-align:center;" id='notes'>
                                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('notes2[]')
                                                *{{ $message }}
                                            @enderror
                                        </div>
                                    </td>
                                    <td><input type="text" name="action2[]" class="form-control action border-0"
                                            style="text-align:center;" id='action' placeholder="Good/Bad">
                                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('action2[]')
                                                *{{ $message }}
                                            @enderror
                                        </div>
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
                                    <td><input type="text" name="feedback2[]" class="form-control feedback border-0"
                                            style="text-align:center;" id='feedback'>
                                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('feedback2[]')
                                                *{{ $message }}
                                            @enderror
                                        </div>
                                    </td>
                                    <td><input type="text" name="notes2[]" class="form-control notes border-0"
                                            style="text-align:center;" id='notes'>
                                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('notes2[]')
                                                *{{ $message }}
                                            @enderror
                                        </div>
                                    </td>
                                    <td><input type="text" name="action2[]" class="form-control action border-0"
                                            style="text-align:center;" id='action' placeholder="Good/Bad">
                                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('action2[]')
                                                *{{ $message }}
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr class="list">
                                    <td class="col-md-1"><input type="text" name="sno[]"
                                            class="form-control col-md-1 border-0" style="text-align:center;"
                                            value="5" id="sno" readonly></td>
                                    <td><input type="text" name="view2[]" class="form-control view border-0"
                                            style="text-align:center;" id='view' value="Breakes-inc-ABS/EBS"
                                            readonly></td>
                                    <td><input type="file" name="Breakes-inc-ABS/EBS[]" class="form-control image "
                                            style="text-align:center;" id='image' multiple></td>
                                    <td><input type="text" name="feedback2[]" class="form-control feedback border-0"
                                            style="text-align:center;" id='feedback'>
                                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('feedback2[]')
                                                *{{ $message }}
                                            @enderror
                                        </div>
                                    </td>
                                    <td><input type="text" name="notes2[]" class="form-control notes border-0"
                                            style="text-align:center;" id='notes'>
                                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('notes2[]')
                                                *{{ $message }}
                                            @enderror
                                        </div>
                                    </td>
                                    <td><input type="text" name="action2[]" class="form-control action border-0"
                                            style="text-align:center;" id='action' placeholder="Good/Bad">
                                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('action2[]')
                                                *{{ $message }}
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr class="list">
                                    <td class="col-md-1"><input type="text" name="sno[]"
                                            class="form-control col-md-1 border-0" style="text-align:center;"
                                            value="6" id="sno" readonly></td>
                                    <td><input type="text" name="view2[]" class="form-control view border-0"
                                            style="text-align:center;" id='view' value="Mirrors/Glass/Visibility"
                                            readonly>
                                    </td>
                                    <td><input type="file" name="Mirrors/Glass/Visibility[]"
                                            class="form-control image " style="text-align:center;" id='image'
                                            multiple></td>
                                    <td><input type="text" name="feedback2[]" class="form-control feedback border-0"
                                            style="text-align:center;" id='feedback'>
                                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('feedback2[]')
                                                *{{ $message }}
                                            @enderror
                                        </div>
                                    </td>
                                    <td><input type="text" name="notes2[]" class="form-control notes border-0"
                                            style="text-align:center;" id='notes'>
                                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('notes2[]')
                                                *{{ $message }}
                                            @enderror
                                        </div>
                                    </td>
                                    <td><input type="text" name="action2[]" class="form-control action border-0"
                                            style="text-align:center;" id='action' placeholder="Good/Bad">
                                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('action2[]')
                                                *{{ $message }}
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr class="list">
                                    <td class="col-md-1"><input type="text" name="sno[]"
                                            class="form-control col-md-1 border-0" style="text-align:center;"
                                            value="7" id="sno" readonly></td>
                                    <td><input type="text" name="view2[]" class="form-control view border-0"
                                            style="text-align:center;" id='view' value="Truck-Interior/SeatBelt">
                                    </td>
                                    <td><input type="file" name="Truck-Interior/SeatBelt[]"
                                            class="form-control image " style="text-align:center;" id='image'
                                            multiple></td>
                                    <td><input type="text" name="feedback2[]" class="form-control feedback border-0"
                                            style="text-align:center;" id='feedback'>
                                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('feedback2[]')
                                                *{{ $message }}
                                            @enderror
                                        </div>
                                    </td>
                                    <td><input type="text" name="notes2[]" class="form-control notes border-0"
                                            style="text-align:center;" id='notes'>
                                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('notes2[]')
                                                *{{ $message }}
                                            @enderror
                                        </div>
                                    </td>
                                    <td><input type="text" name="action2[]" class="form-control action border-0"
                                            style="text-align:center;" id='action' placeholder="Good/Bad">
                                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('action2[]')
                                                *{{ $message }}
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr class="list">
                                    <td class="col-md-1"><input type="text" name="sno[]"
                                            class="form-control col-md-1 border-0" style="text-align:center;"
                                            value="8" id="sno" readonly></td>
                                    <td><input type="text" name="view2[]" class="form-control view border-0"
                                            style="text-align:center;" id='view' value="WariningLamps/MIL" readonly>
                                    </td>
                                    <td><input type="file" name="WariningLamps/MIL[]" class="form-control image "
                                            style="text-align:center;" id='image' multiple></td>
                                    <td><input type="text" name="feedback2[]" class="form-control feedback border-0"
                                            style="text-align:center;" id='feedback'>
                                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('feedback2[]')
                                                *{{ $message }}
                                            @enderror
                                        </div>
                                    </td>
                                    <td><input type="text" name="notes2[]" class="form-control notes border-0"
                                            style="text-align:center;" id='notes'>
                                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('notes2[]')
                                                *{{ $message }}
                                            @enderror
                                        </div>
                                    </td>
                                    <td><input type="text" name="action2[]" class="form-control action border-0"
                                            style="text-align:center;" id='action' placeholder="Good/Bad">
                                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('action2[]')
                                                *{{ $message }}
                                            @enderror
                                        </div>
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
@endsection
