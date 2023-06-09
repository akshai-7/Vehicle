@extends('layouts.user')
@section('content')
    <div class="userContainer">
        <div class="table-data">
            <div>
                <div class="head mt-2">
                    <h3>Vehicle Assign</h3>
                </div>
                <form action="/vehicleassignlist" method="POST">
                    @csrf
                    <div class="select" style="margin-top:20px;">
                        <select class="form-select" style="width:450px;" name="name">
                            <option>Please Select Driver</option>
                            @foreach ($user as $user)
                                <option value="{{ $user->name }}" name="name">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <select class="form-select" name="number_plate" style="width:450px;margin-right:150px;">
                            <option>Please Select Vehicle</option>
                            @foreach ($vehicle as $vehicle)
                                <option value="{{ $vehicle->number_plate }}" name="number_plate">
                                    {{ $vehicle->number_plate }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="submit" value="Submit" id="add2" class="btn text-white" style="float:right;">
                </form>
            </div>
            <div class="order">
                <div class="head">
                    <div style="display:flex;margin-top:20px;">
                        <h3>Vehicle Assigned List</h3>
                    </div>
                </div>
                <div class="serachbar">
                    <form action="/assignsearch" method="GET" autocomplete="off" style="margin-left:-5px">
                        <div id="filterDiv1">
                            <div class="col-md-11">
                                <label></label>
                                <select class="form-select form-control" name="number_plate">
                                    @if (isset($_GET['number_plate']))
                                        <option value="{{ $_GET['number_plate'] }}">{{ $_GET['number_plate'] }}</option>
                                        @foreach ($datas as $data)
                                            <option value="{{ $data->number_plate }}">
                                                {{ $data->number_plate }}</option>
                                        @endforeach
                                    @else
                                        <option>Select Number plate</option>
                                        @foreach ($datas as $data)
                                            <option value="{{ $data->number_plate }}">
                                                {{ $data->number_plate }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-5" style="margin-left: 6px">
                                <br />
                                <button type="submit" class="btn btn-primary btn-sm mt-1"><i
                                        class="bi bi-funnel-fill"></i></button>
                                <a href="/vehicleassignedlist" class="btn btn-success btn-sm mt-1"><i
                                        class="fa-solid fa fa-refresh"></i></a>
                            </div>
                        </div>
                    </form>
                    <form action="/assignsearchbar" method="GET" style="margin-left:46%" autocomplete="off">
                        <div id="filterDiv1">
                            <div class="col-md-9">
                                <label></label>
                                @if (isset($_GET['query']))
                                    <input type="text" name="query" placeholder="Name/Email/Id" class="form-control"
                                        value="{{ $_GET['query'] }}">
                                @else
                                    <input type="text" name="query" placeholder="Name/Email/Id" class="form-control">
                                @endif
                            </div>
                            <div class="col-md-5" style="margin-left: 6px">
                                <br />
                                <button type="submit" class="btn btn-primary btn-sm mt-1"><i
                                        class="fa-solid fa-magnifying-glass"></i></i></button>
                                <a href="/vehicleassignedlist" class="btn btn-success btn-sm mt-1"><i
                                        class="fa-solid fa fa-refresh"></i></a>
                            </div>
                        </div>
                    </form>
                </div>
                <table class="table table-bordered mt-3" style="border: 1px solid lightgrey">
                    <thead class="text-primary">
                        <th style="text-align:center;">S.No</th>
                        <th style="text-align:center;">Driver Name</th>
                        <th style="text-align:center;">Email</th>
                        <th style="text-align:center;">Number plate</th>
                        <th style="text-align:center;">Mileage</th>
                        <th style="text-align:center;">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($assigns as $assign)
                            <tr class="table_row">
                                <td style="text-align:center;" class="table_data">
                                    @php
                                        $date = $assign->created_at;
                                        $fiscalYearStart = date('01-04-Y');
                                        $diff = strtotime($date) - strtotime($fiscalYearStart);
                                        $weekNumber = ceil($diff / (7 * 24 * 60 * 60));
                                    @endphp
                                    {{ \Carbon\Carbon::now()->format('y') }}W{{ $weekNumber }}{{ $assign->id }}
                                </td>
                                <td style="text-align:center;" class="table_data">{{ $assign->name }}</td>
                                <td style="text-align:center;" class="table_data">{{ $assign->email }}</td>
                                <td style="text-align:center;" class="table_data">{{ $assign->number_plate }}
                                </td>
                                <td style="text-align:center;" class="table_data">{{ $assign->mileage }}
                                </td>
                                <td style="text-align:center;" class="table_data">
                                    <a onclick="assign({{ $assign }})"
                                        class="bi bi-eye-fill btn btn-success btn-sm"></a>
                                    <a href="/deleteId/{{ $assign->id }}" data-toggle="tooltip" data-placement="top"
                                        onclick="event.preventDefault(); deleteassign('{{ $assign->id }}');"
                                        title="Delete"><i class="bi bi-trash-fill btn btn-danger btn-sm"></i></a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                @if (isset($assigns))
                    @if (count($assigns) < 1)
                        <div id="dataNotFound">
                            <p>Data not found</p>
                        </div>
                    @endif
                @endif
                <div class="active">
                    {!! $assigns->links() !!}
                </div>
            </div>
        </div>
    </div>
    <div id="updatePopup4">
        <div class="updateassignPopup">
            <form action="#" method="POST" autocomplete="off">
                @csrf
                <div id="userHeading">
                    <h4 style="margin-top: 2%">
                        Vehicle Assigned Details
                    </h4>
                    <a href="/vehicleassignedlist">
                        <h4 style="color:#bf0e3a;"> <i class="fa-sharp fa-regular fa-circle-xmark"></i></h4>
                    </a>
                </div>
                <div class="vehicle">
                    <div class="form-group  mt-4">
                        <label class="col-sm-3  col-form-label">User Id</label>
                        <div class="col-sm-8">
                            <input id="user_id" class="form-control-plaintext" readonly />
                        </div>
                    </div>
                    <div class="form-group  mt-4">
                        <label class="col-sm-3 col-form-label">Driver Name</label>
                        <div class="col-sm-8">
                            <input id="name" class="form-control-plaintext" readonly />
                        </div>
                    </div>
                    <div class="form-group  mt-4">
                        <label class="col-sm-2 col-form-label ">Email</label>
                        <div class="col-sm-8">
                            <input id="email" class="form-control-plaintext" readonly />
                        </div>
                    </div>
                    <div class="form-group  mt-4 ">
                        <label class="col-sm-2 col-form-label">Mobile.no</label>
                        <div class="col-sm-8">
                            <input id="mobile" class="form-control-plaintext" readonly />
                        </div>
                    </div>
                    <div class="form-group  mt-4">
                        <label class="col-sm-3 col-form-label">Vehicle Id</label>
                        <div class="col-sm-8">
                            <input id="vehicle_id" class="form-control-plaintext" readonly />
                        </div>
                    </div>
                    <div class="form-group  mt-4 ">
                        <label class="col-sm-3  col-form-label ">Number Plate</label>
                        <div class="col-sm-8">
                            <input id="number_plate" class="form-control-plaintext" readonly />
                        </div>
                    </div>

                    <div class="form-group  mt-4">
                        <label class="col-sm-2   col-form-label"> Mileage</label>
                        <div class="col-sm-8">
                            <input id="mileage" class="form-control-plaintext" readonly />
                        </div>
                    </div>
                    <div class="form-group  mt-4">
                        <label class="col-sm-4  col-form-label"> Assigned Date</label>
                        <div class="col-sm-8">
                            <input id="date" class="form-control-plaintext" readonly />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
