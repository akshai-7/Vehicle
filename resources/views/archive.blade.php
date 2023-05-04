@extends('layouts.user')


@section('content')
    <div class="userContainer">
        <div id="Visual" class="tabcontent">
            <div class="table-data" id="table-data">
                <div class="head">
                    <h3>Inspection Details</h3>
                </div>
                {{-- <div class="serachbar">
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
                </div> --}}
                <div class="order">
                    <table class="table table-bordered mt-3" style="border: 1px solid lightgrey;">
                        <tbody>
                            <thead class="text-primary">
                                <th style="text-align:center;">S.No</th>
                                <th style="text-align:center;">Report.no</th>
                                <th style="text-align:center;">Inspected_by</th>
                                <th style="text-align:center;">Driver Name</th>
                                <th style="text-align:center;">Number plate</th>
                                <th style="text-align:center;">Mileage</th>
                                <th style="text-align:center;">Inspection_date</th>
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
                                        {{ Carbon\Carbon::parse($inspection->date)->format('d/m/Y') }}
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
        </div>
    </div>
@endsection
