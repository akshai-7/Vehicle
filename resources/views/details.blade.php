@extends('layouts.user')
@section('content')
    <div class="userContainer">
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
                <table class="table table-bordered mt-3" style="border: 1px solid lightgrey;">
                    <thead>
                        <th style="text-align:center;">S.No</th>
                        <th style="text-align:center;">View</th>
                        <th style="text-align:center;">Image</th>
                        <th style="text-align:center;">Feedback</th>
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
                                    <a onclick=" visual({{ $visual }})" data-toggle="tooltip" data-placement="top"
                                        title="Edit"><i class="bi bi-pencil-square  btn btn-success btn-sm"></i></a>
                                    <a href="/deletevisual/{{ $visual->id }}" data-toggle="tooltip" data-placement="top"
                                        title="Delete"><i class="bi bi-trash-fill btn btn-danger btn-sm"></i></a>
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
                <table class="table table-bordered mt-3" style="border: 1px solid lightgrey;">
                    <thead>
                        <th style="text-align:center;">S.No</th>
                        <th style="text-align:center;">View</th>
                        <th style="text-align:center;">Image</th>
                        <th style="text-align:center;">Feedback</th>
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
                                        @if ($vehicle->image != null)
                                            <img src="{{ url('images/' . explode(',', $vehicle->image)[0]) }}"
                                                class="rounded-0 border border-secondary" width="50px" height="50px">
                                        @endif
                                        @if ($vehicle->image == null)
                                            <p style="text-align:center;">--</p>
                                        @endif
                                    </a>
                                </td>
                                <td style="text-align:center;" class="table_data">{{ $vehicle->feedback }}
                                </td>
                                <td style="text-align:center;" class="table_data">{{ $vehicle->action }}</td>
                                <td style="text-align:center;" class="table_data">
                                    <a onclick=" vehicle({{ $vehicle }})" data-toggle="tooltip" data-placement="top"
                                        title="Edit"><i class="bi bi-pencil-square  btn btn-success btn-sm"></i></a>
                                    <a href="/deletevehicle/{{ $vehicle->id }}" data-toggle="tooltip" data-placement="top"
                                        title="Delete"><i class="bi bi-trash-fill btn btn-danger btn-sm"></i></a>
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
                        <th style="text-align:center;">Feedback</th>
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
                                        @if ($cabin->image != null)
                                            <img src="{{ url('images/' . explode(',', $cabin->image)[0]) }}"
                                                class="rounded-0 border border-secondary" width="50px" height="50px">
                                        @endif
                                        @if ($cabin->image == null)
                                            <p style="text-align:center;">--</p>
                                        @endif
                                    </a>
                                </td>
                                <td style="text-align:center;" class="table_data">{{ $cabin->feedback }}</td>
                                <td style="text-align:center;" class="table_data">{{ $cabin->action }}</td>
                                <td style="text-align:center;" class="table_data">
                                    <a onclick=" cabin({{ $cabin }})" data-toggle="tooltip" data-placement="top"
                                        title="Edit"><i class="bi bi-pencil-square  btn btn-success btn-sm"></i></a>
                                    <a href="/deletecabin/{{ $cabin->id }}" data-toggle="tooltip"
                                        data-placement="top" title="Delete"><i
                                            class="bi bi-trash-fill btn btn-danger btn-sm"></i></a>
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
        <div id="updatePopup1">
            <div class="updateassignPopup">
                <form action="/visualupdate/{id}" method="POST" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div id="userHeading">
                        <h4 style="margin-top: 2%">
                            Update Visual Damage
                        </h4>
                        <a href="">
                            <h4 style="color:#bf0e3a;"> <i class="fa-sharp fa-regular fa-circle-xmark"></i></h4>
                        </a>
                    </div>
                    <div class="vehicle">
                        <div class="form-group row mt-4">
                            <label class="col-sm-2 col-form-label">Id</label>
                            <div class="col-sm-9">
                                <input type="text" name="id" class="form-control" id="id" readonly>
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('id')
                                        *{{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label class="col-sm-2 col-form-label"> Inspection_id</label>
                            <div class="col-sm-9">
                                <input type="text" name="inspection_id" class="form-control" id="inspection_id"
                                    readonly>
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('inspection_id')
                                        *{{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label class="col-sm-2 col-form-label">View</label>
                            <div class="col-sm-9">
                                <input type="text" name="view" class="form-control" id="view">
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('view')
                                        *{{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-4 ">
                            <label class="col-sm-2 col-form-label">Current_Image</label>
                            <div class="col-sm-9">
                                <img class="rounded-0 border border-secondary" width="50px" height="50px"
                                    id="image">
                            </div>
                        </div>
                        <div class="form-group row mt-4 ">
                            <label class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="image[]" class="form-control" placeholder="image" multiple>
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('image')
                                        *{{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-4 ">
                            <label class="col-sm-2 col-form-label">Feedback</label>
                            <div class="col-sm-9">
                                <input type="text" name="feedback" class="form-control" id="feedback">
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('feedback')
                                        *{{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label class="col-sm-2 col-form-label"> Status</label>
                            <div class="col-sm-9">
                                <input type="text" name="action" class="form-control" id="action">
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('action')
                                        *{{ $message }}
                                    @enderror
                                </div>
                                <input type="submit" name="" value="Submit" class="btn text-white mt-4"
                                    id="add" style="float:right;">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="updatePopup2">
            <div class="updateassignPopup">
                <form action="/vehicleupdate/{id}" method="POST" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div id="userHeading">
                        <h4 style="margin-top: 2%">
                            Update Vehicle Check
                        </h4>
                        <a href="">
                            <h4 style="color:#bf0e3a;"> <i class="fa-sharp fa-regular fa-circle-xmark"></i></h4>
                        </a>
                    </div>
                    <div class="vehicle">
                        <div class="form-group row mt-4">
                            <label class="col-sm-2 col-form-label">Id</label>
                            <div class="col-sm-9">
                                <input type="text" name="id" class="form-control" readonly id="id1">
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('id')
                                        *{{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label class="col-sm-2 col-form-label">Inspection_id</label>
                            <div class="col-sm-9">
                                <input type="text" name="inspection_id" class="form-control" readonly
                                    id="inspection_id1">
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('inspection_id')
                                        *{{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label class="col-sm-2 col-form-label">View</label>
                            <div class="col-sm-9">
                                <input type="text" name="view" class="form-control" id="view1">
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('view')
                                        *{{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-4 ">
                            <label class="col-sm-2 col-form-label">Current_Image</label>
                            <div class="col-sm-9">
                                <img class="rounded-0 border border-secondary" width="50px" height="50px"
                                    id="image1">
                            </div>
                        </div>
                        <div class="form-group row mt-4 ">
                            <label class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="image[]" class="form-control" multiple id="image1">
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('image')
                                        *{{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-4 ">
                            <label class="col-sm-2 col-form-label">Feedback</label>
                            <div class="col-sm-9">
                                <input type="text" name="feedback" class="form-control" id="feedback1">
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('feedback')
                                        *{{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label class="col-sm-2 col-form-label"> Status</label>
                            <div class="col-sm-9">
                                <input type="text" name="action" class="form-control" id="action1">
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('action')
                                        *{{ $message }}
                                    @enderror
                                </div>
                                <input type="submit" name="" value="Submit" class="btn text-white mt-4"
                                    id="add" style="float:right;">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="updatePopup3">
            <div class="updateassignPopup">
                <form action="/cabinupdate/{id}" method="POST" autocomplete="off" enctype="multipart/form-data">
                    @csrf

                    <div id="userHeading">
                        <h4 style="margin-top: 2%">
                            Update Cabin Check
                        </h4>
                        <a href="">
                            <h4 style="color:#bf0e3a;"> <i class="fa-sharp fa-regular fa-circle-xmark"></i></h4>
                        </a>
                    </div>
                    <div class="vehicle">
                        <div class="form-group row mt-4">
                            <label class="col-sm-2 col-form-label">Id</label>
                            <div class="col-sm-9">
                                <input type="text" name="id" class="form-control" readonly id="id2">
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('id')
                                        *{{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label class="col-sm-2 col-form-label">Inspection_id</label>
                            <div class="col-sm-9">
                                <input type="text" name="inspection_id" class="form-control" readonly
                                    id="inspection_id2">
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('inspection_id')
                                        *{{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label class="col-sm-2 col-form-label">View</label>
                            <div class="col-sm-9">
                                <input type="text" name="view" class="form-control" id="view2">
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('view')
                                        *{{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-4 ">
                            <label class="col-sm-2 col-form-label">Current_Image</label>
                            <div class="col-sm-9">
                                <img class="rounded-0 border border-secondary" width="50px" height="50px"
                                    id="image2">
                            </div>
                        </div>
                        <div class="form-group row mt-4 ">
                            <label class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="image[]" multiple class="form-control" id="image2">
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('image')
                                        *{{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-4 ">
                            <label class="col-sm-2 col-form-label">Feedback</label>
                            <div class="col-sm-9">
                                <input type="text" name="feedback" class="form-control" id="feedback2">
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('feedback')
                                        *{{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label class="col-sm-2 col-form-label"> Status</label>
                            <div class="col-sm-9">
                                <input type="text" name="action" class="form-control" id="action2">
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('action')
                                        *{{ $message }}
                                    @enderror
                                </div>
                                <input type="submit" name="" value="Submit" class="btn text-white mt-4"
                                    id="add" style="float:right;">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
