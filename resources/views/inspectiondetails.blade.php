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
        <div id="Visual" class="tabcontent">
            <div class="table-data" id="table-data">
                <form action="/search" method="GET" autocomplete="off">
                    <div id="filterDiv">
                        <div class="col-md-3" id="filter">
                            <label>Filter by Date</label>
                            <input type="date" name="date" class="form-control">
                        </div>
                        <div class="col-md-3" id="">
                            <label>Filter by Name</label>
                            <select class="form-select form-control" name="name">
                                <option>Select</option>
                                @foreach ($assigns as $assign)
                                    <option value="{{ $assign->name }}">{{ $assign->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-5">
                            <br />
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                </form>
                <div class="order">
                    <table class="table table-bordered mt-3" style="border: 1px solid lightgrey;">
                        <tbody>
                            <thead class="text-primary">
                                <th style="text-align:center;">Id</th>
                                <th style="text-align:center;">Report.no</th>
                                <th style="text-align:center;">Inspected_by</th>
                                <th style="text-align:center;">Driver Name</th>
                                <th style="text-align:center;">Number plate</th>
                                <th style="text-align:center;">Mileage</th>
                                <th style="text-align:center;">Inspection_date</th>
                                <th style="text-align:center;">Status</th>
                                <th style="text-align:center;">Action</th>
                            </thead>
                            @foreach ($inspections as $inspection)
                                <tr class="table_row">
                                    <td style="text-align:center;" class="table_data">{{ $inspection->id }}</td>
                                    <td style="text-align:center;" class="table_data">{{ $inspection->report_no }}
                                    </td>
                                    <td style="text-align:center;" class="table_data">
                                        {{ ucfirst(strtolower($inspection->inspected_by)) }}
                                    </td>
                                    <td style="text-align:center;" class="table_data">{{ $inspection->name }}</td>
                                    <td style="text-align:center;" class="table_data">
                                        {{ $inspection->number_plate }}</td>
                                    <td style="text-align:center;" class="table_data">{{ $inspection->mileage }}
                                    </td>
                                    <td style="text-align:center;" class="table_data">{{ $inspection->date }}
                                    </td>
                                    <td style="text-align:center;" class="table_data"><button type="button"
                                            class="btn btn-success btn-sm">Completed</button>
                                    </td>
                                    <td style="text-align:center;" class="table_data">
                                        <a href="/details/{{ $inspection->id }}"><i class="fa-solid fa-eye btn  text-white"
                                                style="background:#06064b " data-toggle="tooltip" data-placement="top"
                                                title="View"></i></a>
                                        <a href="/deleteinspection/{{ $inspection->id }}"><i
                                                class="fa-solid fa-trash btn btn-danger" data-toggle="tooltip"
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
            {{-- <div class="active">
            {!! $inspections->links() !!}
        </div> --}}
        </div>
        <div id="Vehicle" class="tabcontent">

            <div class="table-data" id="table-data">
                {{-- <form action="/search" method="GET" class="filter" autocomplete="off">
            <div class="col-md-5">
                <label>Filter by Date</label>
                <input type="date" name="date" value="{{ date('Y-m-d') }}" class="form-control">
            </div>
            <div class="col-md-5">
                <br />
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </form> --}}
                <div class="order">
                    <table class="table table-bordered mt-3" style="border: 1px solid lightgrey">
                        <thead class="text-primary">
                            <th style="text-align:center;">Id</th>
                            <th style="text-align:center;">Driver Name</th>
                            <th style="text-align:center;">Email</th>
                            <th style="text-align:center;">Number plate</th>
                            <th style="text-align:center;">Next_inspection</th>
                            <th style="text-align:center;">status</th>
                            <th style="text-align:center;">Over Due</th>
                        </thead>
                        <tbody>
                            @foreach ($assigns as $assign)
                                <tr class="table_row">
                                    <td style="text-align:center;" class="table_data">{{ $assign->id }}</td>
                                    <td style="text-align:center;" class="table_data">{{ $assign->name }}</td>
                                    <td style="text-align:center;" class="table_data">{{ $assign->email }}</td>
                                    <td style="text-align:center;" class="table_data">{{ $assign->number_plate }}
                                    </td>
                                    <td style="text-align:center;" class="table_data">{{ $assign->next_inspection }}
                                    </td>
                                    <td style="text-align:center;" class="table_data"><button type="button"
                                            class="btn btn-danger btn-sm">Pending</button>
                                    </td>
                                    <td style="text-align:center;" class="table_data">
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
            {{-- <div class="active">
            {!! $assigns->links() !!}
        </div> --}}
        </div>
    </div>
@endsection
