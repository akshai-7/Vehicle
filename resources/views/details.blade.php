@extends('layouts.user')
@section('content')
    <div class="button">
        <button class="tablinks " onclick="openCheck(event, 'Visual')" id="defaultOpen">
            <h6>Visual Damage</h6>
        </button>
        <button class="tablinks" onclick="openCheck(event, 'Vehicle')">
            <h6>Vehicle Check</h6>
        </button>
        <button class="tablinks" onclick="openCheck(event,'Cabin')">
            <h6>Cabin Checks</h6>
        </button>
    </div>
    <div id="Visual" class="tabcontent">
        <div class="table-data" id="table-data">
            <table class="table table-bordered mt-3" style="border: 1px solid lightgrey;width1000px;">
                <thead>
                    <th style="text-align:center;">S.No</th>
                    <th style="text-align:center;">View</th>
                    <th style="text-align:center;">Image</th>
                    <th style="text-align:center;">Feed Back</th>
                    <th style="text-align:center;">Status</th>
                    <th style="text-align:center;">Action</th>
                </thead>
                <tbody>
                    @foreach ($visual as $visual)
                        <tr class="table_row">
                            <td style="text-align:center;" class="table_data">{{ $loop->iteration }}</td>
                            <td style="text-align:center;" class="table_data">{{ $visual->view }}</td>
                            <td style="width:0px;">
                                <a href="/visualimages/{{ $visual->id }}">
                                    <img src="{{ url('images/' . explode(',', $visual->image)[0]) }}"
                                        class="rounded-0 border border-secondary" width="50px" height="50px">
                                </a>
                            </td>
                            <td style="text-align:center;" class="table_data">{{ $visual->feedback }}</td>
                            <td style="text-align:center;" class="table_data">{{ $visual->action }}</td>
                            <td style="text-align:center;" class="table_data">
                                <a href="/updatevisualcheck/{{ $visual->id }}" data-toggle="tooltip" data-placement="top"
                                    title="Edit"><i class="fa-solid fa-edit btn btn-success"></i></a>
                                <a href="/deletevisual/{{ $visual->id }}" data-toggle="tooltip" data-placement="top"
                                    title="Delete"><i class="fa-solid fa-trash btn btn-danger"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                <a href="/summary/{{ $visual->inspection_id }}"><input type="submit" id="add" value="Summary"
                        class="text-white mt-4" style="margin-left:1000px;"></a>
            </div>
        </div>
    </div>
    <div id="Vehicle" class="tabcontent">
        <div class="table-data" id="table-data">
            <table class="table table-bordered mt-3" style="border: 1px solid lightgrey;width1000px;">
                <thead>
                    <th style="text-align:center;">S.No</th>
                    <th style="text-align:center;">View</th>
                    <th style="text-align:center;">Image</th>
                    <th style="text-align:center;">Feed Back</th>
                    <th style="text-align:center;">Status</th>
                    <th style="text-align:center;">Action</th>
                </thead>
                <tbody>
                    @foreach ($vehicle as $vehicle)
                        <tr class="table_row">
                            <td style="text-align:center;" class="table_data">{{ $loop->iteration }}</td>
                            <td style="text-align:center;" class="table_data">{{ $vehicle->view }}</td>
                            <td style="width:0px;" onclick="popUpImage('')">
                                <a href="/vehicleimages/{{ $vehicle->id }}">
                                    <img src="{{ url('images/' . explode(',', $vehicle->image)[0]) }}"
                                        class="rounded-0 border border-secondary" width="50px" height="50px">
                                </a>
                            </td>
                            <td style="text-align:center;" class="table_data">{{ $vehicle->feedback }}
                            </td>
                            <td style="text-align:center;" class="table_data">{{ $vehicle->action }}</td>
                            <td style="text-align:center;" class="table_data">
                                <a href="/updatevehiclecheck/{{ $vehicle->id }}" data-toggle="tooltip"
                                    data-placement="top" title="Edit"><i class="fa-solid fa-edit btn btn-success"></i></a>
                                <a href="/deletevehicle/{{ $vehicle->id }}" data-toggle="tooltip" data-placement="top"
                                    title="Delete"><i class="fa-solid fa-trash btn btn-danger"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                <a href="/summary/{{ $vehicle->inspection_id }}"><input type="submit" id="add" value="Summary"
                        class="text-white mt-4" style="margin-left:1000px;"></a>
            </div>
        </div>
    </div>
    <div id="Cabin" class="tabcontent">
        <div class="table-data" id="table-data">
            <table class="table table-bordered mt-3" style="border: 1px solid lightgrey;">
                <thead>
                    <th style="text-align:center;">S.No</th>
                    <th style="text-align:center;">View</th>
                    <th style="text-align:center;">Image</th>
                    <th style="text-align:center;">Feed Back</th>
                    <th style="text-align:center;">Status</th>
                    <th style="text-align:center;">Action</th>
                </thead>
                <tbody>
                    @foreach ($cabin as $cabin)
                        <tr class="table_row">
                            <td style="text-align:center;" class="table_data">{{ $loop->iteration }}</td>
                            <td style="text-align:center;" class="table_data">{{ $cabin->view }}</td>
                            <td style="width:0px;" onclick="popUpImage('')">
                                <a href="/cabinimages/{{ $cabin->id }}">
                                    <img src="{{ url('images/' . explode(',', $cabin->image)[0]) }}"
                                        class="rounded-0 border border-secondary" width="50px" height="50px">
                                </a>
                            </td>
                            <td style="text-align:center;" class="table_data">{{ $cabin->feedback }}</td>
                            <td style="text-align:center;" class="table_data">{{ $cabin->action }}</td>
                            <td style="text-align:center;" class="table_data">
                                <a href="/updatecabincheck/{{ $cabin->id }}" data-toggle="tooltip"
                                    data-placement="top" title="Edit"><i
                                        class="fa-solid fa-edit btn btn-success"></i></a>
                                <a href="/deletecabin/{{ $cabin->id }}" data-toggle="tooltip" data-placement="top"
                                    title="Delete"><i class="fa-solid fa-trash btn btn-danger"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                <a href="/summary/{{ $cabin->inspection_id }}"><input type="submit" id="add" value="Summary"
                        class="text-white mt-4" style="margin-left:1000px;"></a>
            </div>
        </div>

    </div>
@endsection
