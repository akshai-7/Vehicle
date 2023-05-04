@extends('layouts.user')
@section('content')
    <div class="userContainer">
        <div class="table-data">
            <div class="head">
                <h3>Archive Details</h3>
            </div>
            <div class="serachbar">
                <form action="/searcharchive" method="GET" autocomplete="off" style="margin-left:-5px">
                    <div id="filterDiv1">
                        <div class="col-md-7" id="">
                            <label></label>
                            <select name="year" class="form-select form-control">
                                @if (isset($_GET['year']))
                                    <option value="{{ $_GET['year'] }}">{{ $_GET['year'] }}</option>
                                    @for ($year = date('Y'); $year >= 2000; $year--)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                @else
                                    <option>Select Year</option>
                                    @for ($year = date('Y'); $year >= 2000; $year--)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                @endif
                            </select>
                        </div>
                        <div class="col-md-7" id="" style="margin-left:5px">
                            <label></label>
                            <select class="form-select form-control" name="month">
                                @if (isset($_GET['month']))
                                    <option value="{{ $_GET['month'] }}">{{ $_GET['month'] }}</option>
                                    @foreach (range(1, 12) as $month)
                                        <option value="{{ $month }}">
                                            {{ date('F', mktime(0, 0, 0, $month, 1)) }}-{{ $month }}
                                        </option>
                                    @endforeach
                                @else
                                    <option>Select Month</option>
                                    @foreach (range(1, 12) as $month)
                                        <option value="{{ $month }}">
                                            {{ date('F', mktime(0, 0, 0, $month, 1)) }}-{{ $month }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>

                        </div>
                        <div class="col-md-5" style="margin-left: 6px">
                            <br />
                            <button type="submit" class="btn btn-primary btn-sm mt-1"><i class="fa fa-filter"></i></button>
                            <a href="/archive" class="btn btn-success btn-sm mt-1"><i
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
                            <th style="text-align:center;">Inspection date</th>
                            <th style="text-align:center;">Report.no</th>
                            <th style="text-align:center;">Inspected by</th>
                            <th style="text-align:center;">Driver Name</th>
                            <th style="text-align:center;">Number plate</th>
                            <th style="text-align:center;">Mileage</th>
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

    </div>
@endsection
