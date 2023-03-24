@extends('layouts.user')
@section('content')
    <div class="head">
        <h3> Report Summary</h3>
    </div>

    <main class="main2">
        <div class="table-data2">
            <div class="order">
                <table class="table table-bordered mt-5">

                    <thead class=" col-md-1">
                        <th style="text-align:center;color:#bf0e3a;" class=" col-md-2">Inspection_Id</th>
                        <th style="text-align:center;color:#bf0e3a;" class=" col-md-2">Driver Name</th>
                        <th style="text-align:center;color:#bf0e3a;" class="col-md-2">Number_plate</th>
                    </thead>
                    <tbody>
                        @foreach ($inspection as $inspection)
                            <tr class="table_row">
                                <td style="text-align:center;" class="col-md-2 table_data">{{ $inspection->id }}
                                </td>
                                <td style="text-align:center;" class="col-md-2 table_data">
                                    {{ $inspection->name }}
                                </td>
                                <td style="text-align:center;" class="col-md-2 table_data">
                                    {{ $inspection->number_plate }}
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <table class="table table-bordered">
                    <div class="check">
                        <h5>Visual Damage</h5>
                    </div>
                    <thead class=" col-md-1">
                        <th style="text-align:center;" class=" col-md-2">View</th>
                        <th style="text-align:center;" class=" col-md-2">Image</th>
                        <th style="text-align:center;" class=" col-md-2">Feed Back</th>
                        <th style="text-align:center;" class="col-md-2">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($visual as $visual)
                            <tr class="table_row">
                                <td style="text-align:center;" class="col-md-2 table_data">{{ $visual->view }}
                                </td>
                                <td style="text-align:center;" class=" col-md-2 table_data"><img
                                        src="{{ url('images/' . explode(',', $visual->image)[0]) }}" width="50px"
                                        height="50px" alt="" class="rounded-0 border border-secondary "></td>
                                <td style="text-align:center;" class="col-md-2 table_data">
                                    {{ $visual->feedback }}
                                </td>
                                <td style="text-align:center;" class="col-md-2 table_data">
                                    {{ $visual->action }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="table-data2">
            <div class="order">
                <table class="table table-bordered">
                    <div class="check">
                        <h5> Vehicle Check</h5>
                    </div>
                    <tbody>
                        @foreach ($vehicle as $vehicle)
                            <tr class="table_row">
                                <td style="text-align:center;" class="col-md-2 table_data">
                                    {{ $vehicle->view }}
                                </td>
                                <td style="text-align:center;" class=" col-md-2 table_data"><img
                                        src="{{ url('images/' . explode(',', $vehicle->image)[0]) }}" width="50px"
                                        height="50px" alt="" class="rounded-0 border border-secondary "></td>
                                <td style="text-align:center;" class="col-md-2 table_data">
                                    {{ $vehicle->feedback }}
                                </td>
                                <td style="text-align:center;" class="col-md-2 table_data">
                                    {{ $vehicle->action }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="table-data2">
            <div class="order">
                <table class="table table-bordered">
                    <div class="check">
                        <h5>Cabin Check</h5>
                    </div>
                    <tbody>
                        @foreach ($cabin as $cabin)
                            <tr class="table_row">
                                <td style="text-align:center;" class="col-md-2 table_data">
                                    {{ $cabin->view }}
                                </td>
                                <td style="text-align:center;" class="col-md-2 table_data"><img
                                        src="{{ url('images/' . explode(',', $cabin->image)[0]) }}" width="50px"
                                        height="50px" alt="" class="rounded-0 border border-secondary "></td>
                                <td style="text-align:center;" class="col-md-2 table_data">
                                    {{ $cabin->feedback }}
                                </td>
                                <td style="text-align:center;" class="col-md-2 table_data">
                                    {{ $cabin->action }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </main>
    <div class="print">
        <a href="/pdf/{{ $cabin->inspection_id }}" data-toggle="tooltip" data-placement="top" title="Print"><i
                class="fa-solid fa-print btn btn-danger"></i></a>
        <a href="/edit/{{ $cabin->inspection_id }}"><i class="fa-solid fa-edit btn btn-success"></i></a>
    </div>
@endsection
