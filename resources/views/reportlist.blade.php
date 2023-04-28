@extends('layouts.user')
@section('content')
    <div class="userContainer">
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Reported Incidents</h3>
                    <a onclick="show('incidentFrom')"><input type="submit" value="Add-Incident" id="add1"></a>
                </div>
                <form action="/searchreport" method="GET" autocomplete="off">
                    <div id="filterDiv1">
                        <div class="col-md-3" id="filter">
                            <label></label>
                            @if (isset($_GET['date']))
                                <input type="text1" name="date" class="form-control" value="{{ $_GET['date'] }}">
                            @else
                                <input type="text1" name="date" class="form-control" value="Select Date">
                            @endif
                        </div>
                        <div class="col-md-3" id="">
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
                            <button type="submit" class="btn btn-primary btn-sm mt-1"><i class="fa fa-filter"></i></button>
                            <a href="/reportlist" class="btn btn-success btn-sm mt-1"><i
                                    class="fa-solid fa-arrow-rotate-right"></i></a>
                        </div>

                    </div>
                </form>

                <table class="table table-bordered mt-3" style="border: 1px solid lightgrey;">

                    <tbody>
                        <thead class="text-primary">
                            <th style="text-align:center;">Id</th>
                            <th style="text-align:center;">Driver Name</th>
                            </th>
                            <th style="text-align:center;">Number_plate</th>
                            </th>
                            <th style="text-align:center;">Date</th>
                            <th style="text-align:center;">Location</th>
                            <th style="text-align:center;">Statement</th>
                            <th style="text-align:center;">Image</th>
                            <th style="text-align:center;">Action</th>
                        </thead>

                        @foreach ($reports as $report)
                            <tr class="table_row">
                                <td style="text-align:center;" class="table_data">{{ $report->id }}</td>
                                <td style="text-align:center;" class="table_data">{{ $report->assign->name }}</td>
                                <td style="text-align:center;" class="table_data">{{ $report->assign->number_plate }}</td>
                                <td style="text-align:center;" class="table_data">
                                    {{ Carbon\Carbon::parse($report->date)->format('d-m-Y') }}
                                </td>
                                <td style="text-align:center;" class="table_data">{{ $report->location }}
                                </td>
                                <td style="text-align:center;width:300px;" class="table_data">{{ $report->statement }}
                                </td>
                                <td style="text-align:center;" class="table_data">
                                    <a href="/reportimages/{{ $report->id }}">
                                        <img src="{{ url('images/' . explode(',', $report->image)[0]) }}"
                                            class="rounded-0 border border-secondary" width="50px" height="50px">
                                    </a>
                                </td>
                                <td style="text-align:center;" class="table_data">
                                    <a onclick="report({{ $report }})" class="tool"><i
                                            class="fa-solid fa-eye btn  text-white" style="background:#06064b "
                                            data-toggle="tooltip" data-placement="top" title="View"></i></a>
                                    <a href="/deletereport/{{ $report->id }}" data-toggle="tooltip" data-placement="top"
                                        title="Delete"><i class="fa-solid fa-trash btn btn-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if (isset($reports))
                    @if (count($reports) < 1)
                        <div id="dataNotFound">
                            <p>Data not found</p>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
    <div id="updatePopup5">
        <div class="updateassignPopup">
            <form action="#" method="POST" autocomplete="off">
                @csrf
                <div id="userHeading">
                    <h4 style="margin-top: 2%">
                        Report an Incident
                    </h4>
                    <a href="/reportlist">
                        <h4 style="color:#bf0e3a;"> <i class="fa-sharp fa-regular fa-circle-xmark"></i></h4>
                    </a>
                </div>
                <div class="incident">
                    <div class="form-group row mt-4">
                        <label class="col-sm-2">Assign_ID</label>
                        <div class="col-sm-9">
                            <input class="form-control-plaintext" id="id">
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-sm-2 ">Date</label>
                        <div class="col-sm-9">
                            <input class="form-control-plaintext" id="date">
                        </div>
                    </div>
                    <div class="form-group row mt-4 ">
                        <label class="col-sm-2">Location</label>
                        <div class="col-sm-9">
                            <input class="form-control-plaintext" id="location">
                        </div>
                    </div>
                    <div class="form-group row mt-4 ">
                        <label class="col-sm-2 "> Witnessed_by</label>
                        <div class="col-sm-9">
                            <input class="form-control-plaintext" id="witnessed_by">
                        </div>
                    </div>
                    <div class="form-group row mt-4 ">
                        <label class="col-sm-2 ">Mobile.no</label>
                        <div class="col-sm-9">
                            <input class="form-control-plaintext" id="mobile">
                        </div>
                    </div>
                    <div class="form-group row mt-4 ">
                        <label class="col-sm-2 ">Statement</label>
                        <div class="col-sm-9">
                            <input class="form-control-plaintext" id="statement">
                        </div>
                    </div>
                </div>
            </form>
        </div>

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
                        <label class="col-sm-2 col-form-label">Driver_Name</label>
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
                            <a href="#"><input type="submit" value="Submit" class="text-white mt-4"
                                    id="add"></a>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection
