@extends('layouts.user')
@section('content')
    <div class="userContainer">
        <div class="table-data">
            <div>
                <h3> Report Summary</h3>
            </div>
            <div class="order">
                <table class="table table-bordered mt-5">
                    <thead class=" col-md-1">
                        <th style="text-align:center;" class=" col-md-2">Inspection_Id</th>
                        <th style="text-align:center;" class=" col-md-2">Driver Name</th>
                        <th style="text-align:center;" class="col-md-2">Number_plate</th>
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
                    <div>
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
                                <td style="text-align:center;" class=" col-md-2 table_data">
                                    @foreach (explode(',', $visual->image) as $image)
                                        <img src="{{ url('images/' . $image) }}" class="rounded-0 border border-secondary"
                                            width="70px" height="80px">
                                        <span></span>
                                    @endforeach
                                </td>
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
            <div class="order">
                <table class="table table-bordered">
                    <div>
                        <h5> Vehicle Check</h5>
                    </div>
                    <tbody>
                        @foreach ($vehicle as $vehicle)
                            <tr class="table_row">
                                <td style="text-align:center;" class="col-md-2 table_data">
                                    {{ $vehicle->view }}
                                </td>
                                <td style="text-align:center;" class=" col-md-2 table_data">
                                    @if ($vehicle->image != null)
                                        @foreach (explode(',', $vehicle->image) as $image)
                                            <img src="{{ url('images/' . $image) }}"
                                                class="rounded-0 border border-secondary" width="70px" height="80px">
                                            <span></span>
                                        @endforeach
                                    @endif
                                    @if ($vehicle->image == null)
                                        <p style="text-align:center;">--</p>
                                    @endif

                                </td>
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
            <div class="order">
                <table class="table table-bordered">
                    <div>
                        <h5>Cabin Check</h5>
                    </div>
                    <tbody>
                        @foreach ($cabin as $cabin)
                            <tr class="table_row">
                                <td style="text-align:center;" class="col-md-2 table_data">
                                    {{ $cabin->view }}
                                </td>
                                <td style="text-align:center;" class="col-md-2 table_data">
                                    @if ($cabin->image != null)
                                        @foreach (explode(',', $cabin->image) as $image)
                                            <img src="{{ url('images/' . $image) }}"
                                                class="rounded-0 border border-secondary" width="70px" height="80px">
                                            <span></span>
                                        @endforeach
                                    @endif
                                    @if ($cabin->image == null)
                                        <p style="text-align:center;">--</p>
                                    @endif
                                </td>
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
            <div class="print">
                <a href="/pdf/{{ $cabin->inspection_id }}" data-toggle="tooltip" data-placement="top" title="Print"><i
                        class="fa-solid fa-print btn btn-danger"></i></a>
                <a href="/edit/{{ $cabin->inspection_id }}"><i class="fa-solid fa-edit btn btn-success"></i></a>
            </div>
        </div>
    </div>
@endsection
