@extends('layouts.user')
@section('content')
    <main class="main">
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Vehicle Assigned List</h3>
                    <a style="margin-right: 10px;" type="" onclick="show('popup8')"><i
                            class="fa-solid fa-plus btn btn-secondary"></i></a>
                    <a style="margin-right: 10px;" type="" onclick="show('popreport')"><i
                            class="fa-solid fa-file btn btn-primary"></i></a>
                </div>
                <table class="table table-bordered mt-3" style="border: 1px solid lightgrey">
                    <thead class="text-primary">
                        <th style="text-align:center;">Id</th>
                        {{-- <th style="text-align:center;">Driver_Id</th> --}}
                        <th style="text-align:center;">Driver Name</th>
                        {{-- <th style="text-align:center;">Email</th> --}}
                        {{-- <th style="text-align:center;">Mobile.No</th> --}}
                        {{-- <th style="text-align:center;">Vehicle_Id</th> --}}
                        <th style="text-align:center;">Number plate</th>
                        <th style="text-align:center;">Mileage</th>
                        <th style="text-align:center;">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($assign as $assign)
                            {{-- @dd($assign); --}}
                            <tr class="table_row">
                                <td style="text-align:center;" class="table_data">{{ $assign->id }}</td>
                                {{-- <td style="text-align:center;" class="table_data">{{$assign->driver_id}}</td> --}}
                                <td style="text-align:center;" class="table_data">{{ $assign->name }}</td>
                                <td style="text-align:center;" class="table_data">{{ $assign->email }}</td>
                                {{-- <td style="text-align:center;" class="table_data">{{ $assign->mobile }}</td> --}}
                                {{-- <td style="text-align:center;" class="table_data">{{$assign->vehicle_id}}</td> --}}
                                <td style="text-align:center;" class="table_data">{{ $assign->number_plate }}
                                </td>
                                <td style="text-align:center;" class="table_data">{{ $assign->mileage }}
                                </td>
                                <td style="text-align:center;" class="table_data">
                                    <a href="/updateassignlist/{{ $assign->id }}" onclick="show('popup9')"><i
                                            class="fa-solid fa-eye btn btn-success"></i></a>
                                    <a href="/deleteId/{{ $assign->id }}"><i
                                            class="fa-solid fa-trash btn btn-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    </div>
    <div class="popup8" id="popup8">
        <section id="container">

            <div id="">
                <a href="#" onclick="hide('popup8')" style="color:black;margin-left:1200px;" class="close"><i
                        class="fa-solid fa-xmark"></i></a>
                <h5> Inspection Details</h5>

                <form action="/store/{id}" method="POST" autocomplete="off" class=" main form">
                    @csrf
                    <main class="mainid">
                        <div class="">

                            <div class="report1">


                                <div class="form-group row mt-5 select ">
                                    <select class="form-select form-control" style="width: 400px;" name="name">
                                        <option>Please Select Driver</option>
                                        @foreach ($assigns as $assign)
                                            <option value="{{ $assign->name }}">{{ $assign->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <div class="report">
                                    <div class="form-group row mt-5 ">
                                        <label for="" class="col-sm-2 col-form-label"> Report.no</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="reportno"
                                                value="{{ $assigns->number_plate }}-{{ date('d.m.Y') }}"
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
                                </div> --}}
                                <div class="subreport">
                                    {{-- <div class="form-group row mt-5">
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
                                    </div> --}}
                                    <div class="form-group row mt-5 ">
                                        {{-- <label for="" class="col-sm-2 col-form-label"> Mileage</label> --}}
                                        <div class="col-sm-9">
                                            <input type="text" name="mileage" placeholder="Current Mileage"
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
                                <h5 class="mt-5">Visual Check</h5>
                            </div>
                            <div class="form-control1">
                                <table class="table table-bordered mt-3" style="border: 1px solid grey;width:1000px;">
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
                                                    id='action' placeholder=""></td>
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
                                                    id='action' placeholder=""></td>
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
                                                    id='action' placeholder=""></td>
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
                                                    id='action' placeholder=""></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="">
                            <div class="head">
                                <h5 class="">Vehicle Check</h5>
                            </div>
                            <div class="form-control1">
                                <table class="table table-bordered mt-3" style="border: 1px solid grey;width:1000px;">
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
                                                    id='action' placeholder=""></td>
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
                                                    id='action' placeholder=""></td>
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
                                                    id='action' placeholder=""></td>
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
                                                    id='action' placeholder=""></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="">
                            <div class="head">
                                <h5 class="">Cabin Check</h5>
                            </div>
                            <div class="form-control1">
                                <div>
                                    <table class="table table-bordered mt-3" style="border: 1px solid grey;width:1000px;">
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
                                                        id='action' placeholder=""></td>
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
                                                        id='action' placeholder=""></td>
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
                                                        id='action' placeholder=""></td>
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
                                                        id='action' placeholder=""></td>
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
                                                        id='action' placeholder=""></td>
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
                                                        id='action' placeholder=""></td>
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
                                                        id='action' placeholder=""></td>
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
                                                        id='action' placeholder=""></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <a href="#"><input type="submit" value="Submit" class="text-white" id="add"
                                    style="margin-left:1000px;"></a>
                    </main>

                </form>
            </div>
        </section>
    </div>
    <div class="popreport" id="popreport">
        <form action="/reportonincident/{id}" method="POST" autocomplete="off">
            @csrf
            <a href="/vehicleassignedlist" style="color:black;" class="close"><i class="fa-solid fa-xmark"></i></a>

            <h5 class=""> Report On Incident</h5>

            <div class="vehicle">

                <div class="form-group row  select ">
                    <label class="col-sm-2 col-form-label">User</label>
                    <select class="form-select" style="width: 350px;" name="name">
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
                        <input type="file" name="image" class="form-control">
                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('image')
                                *{{ $message }}
                            @enderror
                        </div>
                        <input type="submit" name="" value="Submit" class="btn text-white mt-4" id="add"
                            style="float:right;">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
