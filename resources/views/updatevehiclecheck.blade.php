@extends('layouts.user')
@section('content')
    {{-- <main class="main">
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Update Vehicle Check</h3>
                </div>
                <table class="table table-bordered mt-3" style="border: 1px solid lightgrey">
                    <thead>
                        <th style="text-align:center;">S.No</th>
                        <th style="text-align:center;">View</th>
                        <th style="text-align:center;">Image</th>
                        <th style="text-align:center;">FeedBack</th>
                        <th style="text-align:center;">Status</th>
                        <th style="text-align:center;">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($vehicle as $vehicle)
                            <tr class="table_row">
                                <td style="text-align:center;" class="table_data">{{ $loop->iteration }}</td>
                                <td style="text-align:center;" class="table_data">{{ $vehicle->view }}</td>

                                <td style="text-align:center;" class="table_data"><img
                                        src="{{ url('images/' . $vehicle->image) }}"
                                        class="rounded-0 border border-secondary" width="50px" height="50px">
                                </td>
                                <td style="text-align:center;" class="table_data">{{ $vehicle->feedback }}
                                </td>
                                <td style="text-align:center;" class="table_data">{{ $vehicle->action }}</td>
                                <td style="text-align:center;" class="table_data">
                                    <a href="/updatevehiclecheck/{{ $vehicle->id }}"><i
                                            class="fa-solid fa-edit btn btn-success"></i></a>
                                    <a href="/deletevisual/{{ $vehicle->id }}"><i
                                            class="fa-solid fa-trash btn btn-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main> --}}
    <div class="popup6" id="popup6">
        <form action="/vehicleupdate/{id}" method="POST" autocomplete="off">
            @csrf
            @foreach ($vehicle as $vehicle)
                <a href="/details/{{ $vehicle->inspection_id }}" style="color:black;" class="close"><i
                        class="fa-solid fa-xmark"></i></a>
                <h5 class=""> Update Vehicle Check
                </h5>
                <div class="vehicle">
                    <div class="form-group row mt-4">
                        <label class="col-sm-2 col-form-label">Id</label>
                        <div class="col-sm-9">
                            <input type="text" name="id" class="form-control" value="{{ $vehicle->id }}">
                            <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('id')
                                    *{{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-sm-2 col-form-label">Inspection_id</label>
                        <div class="col-sm-9">
                            <input type="text" name="inspection_id" class="form-control"
                                value="{{ $vehicle->inspection_id }}">
                            <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('inspection_id')
                                    *{{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-sm-2 col-form-label">View</label>
                        <div class="col-sm-9">
                            <input type="text" name="view" class="form-control" value="{{ $vehicle->view }}">
                            <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('view')
                                    *{{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mt-4 ">
                        <label class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-9">
                            <input type="file" name="image" class="form-control" value="{{ $vehicle->image }}">
                            <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('image')
                                    *{{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mt-4 ">
                        <label class="col-sm-2 col-form-label">Feedback</label>
                        <div class="col-sm-9">
                            <input type="text" name="feedback" class="form-control" value="{{ $vehicle->feedback }}">
                            <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('feedback')
                                    *{{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-sm-2 col-form-label"> Status</label>
                        <div class="col-sm-9">
                            <input type="text" name="action" class="form-control" value="{{ $vehicle->action }}">
                            <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('action')
                                    *{{ $message }}
                                @enderror
                            </div>
                            <input type="submit" name="" value="Submit" class="btn text-white mt-4" id="add"
                                style="float:right;">
                        </div>
                    </div>
                </div>
            @endforeach
        </form>
    </div>
@endsection
