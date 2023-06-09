@extends('layouts.user')
@section('content')
    <div class="userContainer">
        <div class="table-datas">
            <div class="head">
                <a href="/archive"> <button class="tablinks ">
                        <h6>Inspection Details</h6>
                    </button></a>
                <li {{ Request::is('archivereport') ? 'class=active' : '' }}>
                    <a href="/archivereport"> <button class="tablinks active">
                            <h6>Reported Incidents </h6>
                        </button></a>
                </li>
                <div class="serachbar1">
                    <form action="/searcharchivereport" method="GET" autocomplete="off" style="margin-left:-5px">
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
                                <button type="submit" class="btn btn-primary btn-sm mt-1"><i
                                        class="fa fa-filter"></i></button>
                                <a href="/archivereport" class="btn btn-success btn-sm mt-1"><i
                                        class="fa-solid fa fa-refresh"></i></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="order">
                <table class="table table-bordered mt-3" style="border: 1px solid lightgrey;">
                    <tbody>
                        <thead class="text-primary">
                            <th style="text-align:center;">S.No</th>
                            <th style="text-align:center;">Driver Name</th>
                            </th>
                            <th style="text-align:center;">Number Plate</th>
                            </th>
                            <th style="text-align:center;">Date</th>
                            <th style="text-align:center;" class=" col-md-2">Location</th>
                            <th style="text-align:center;" class=" col-md-2">Statement</th>
                            <th style="text-align:center;">Image</th>
                            <th style="text-align:center;">Action</th>
                        </thead>
                        @foreach ($reports as $report)
                            <tr class="table_row">
                                <td style="text-align:center;" class="table_data">
                                    @php
                                        $date = $report->created_at;
                                        $fiscalYearStart = date('01-04-Y');
                                        $diff = strtotime($date) - strtotime($fiscalYearStart);
                                        $weekNumber = ceil($diff / (7 * 24 * 60 * 60));
                                    @endphp
                                    {{ \Carbon\Carbon::now()->format('y') }}W{{ $weekNumber }}{{ $report->id }}
                                </td>
                                <td style="text-align:center;" class="table_data">{{ $report->assign->name }}</td>
                                <td style="text-align:center;" class="table_data">{{ $report->assign->number_plate }}
                                </td>
                                <td style="text-align:center;" class="table_data">
                                    {{ Carbon\Carbon::parse($report->date)->format('d/m/Y') }}
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
                                            class="bi bi-eye-fill btn-sm btn btn-success" data-toggle="tooltip"
                                            data-placement="top" title="View"></i></a>
                                    <a href="/deletereport/{{ $report->id }}" data-toggle="tooltip" data-placement="top"
                                        title="Delete"
                                        onclick="event.preventDefault(); deletereport('{{ $report->id }}');"><i
                                            class="bi bi-trash-fill btn btn-danger btn-sm"></i></a>
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
                    <a href="/archivereport">
                        <h4 style="color:#bf0e3a;"> <i class="fa-sharp fa-regular fa-circle-xmark"></i></h4>
                    </a>
                </div>
                <div class="incident">
                    <div class="form-group  mt-4">
                        <label class="col-sm-3 col-form-label">Assign ID</label>
                        <div class="col-sm-9">
                            <input class="form-control-plaintext" id="id1">
                        </div>
                    </div>
                    <div class="form-group  mt-4">
                        <label class="col-sm-2 col-form-label ">Date</label>
                        <div class="col-sm-9">
                            <input class="form-control-plaintext" id="date">
                        </div>
                    </div>
                    <div class="form-group  mt-4 ">
                        <label class="col-sm-2 col-form-label">Location</label>
                        <div class="col-sm-9">
                            <input class="form-control-plaintext" id="location">
                        </div>
                    </div>
                    <div class="form-group  mt-4 ">
                        <label class="col-sm-3 col-form-label"> Witnessed by</label>
                        <div class="col-sm-9">
                            <input class="form-control-plaintext" id="witnessed_by">
                        </div>
                    </div>
                    <div class="form-group  mt-4 ">
                        <label class="col-sm-2 col-form-label">Mobile.no</label>
                        <div class="col-sm-9">
                            <input class="form-control-plaintext" id="mobile">
                        </div>
                    </div>
                    <div class="form-group  mt-4 ">
                        <label class="col-sm-2 col-form-label">Statement</label>
                        <div class="col-sm-9">
                            <input class="form-control-plaintext" id="statement">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
