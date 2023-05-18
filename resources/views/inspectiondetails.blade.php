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
        <div id="Visual" class="table-datas tabcontent">
            <div class="" id="table-data">
                <div class="head">
                    <h3>Inspection Details</h3>
                    <a href="/inspectionform"><input type="submit" value="Add-Inspection" id="add1"></a>
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
                    </form>`
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

                                    <td style="text-align:center;">
                                        <button type="button" class="btn btn-success btn-sm">Passed</button>
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

            <div class="table-datas" id="table-data">
                <div class="head">
                    <h3>Inspection Pending</h3>
                </div>
                <div class="order">
                    <table class="table table-bordered mt-3" style="border: 1px solid lightgrey">
                        <thead class="text-primary">
                            <th style="text-align:center;">S.No</th>
                            <th style="text-align:center;">Driver Name</th>
                            <th style="text-align:center;">Email</th>
                            <th style="text-align:center;">Number Plate</th>
                            <th style="text-align:center;">Next Inspection</th>
                            <th style="text-align:center;">Status</th>
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
                                            class="btn btn-danger btn-sm">Failed</button>
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
    </div>
@endsection
