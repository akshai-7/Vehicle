@extends('layouts.user')
@section('content')
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
