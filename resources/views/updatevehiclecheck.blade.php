@extends('layouts.user')
@section('content')
    <div class="userContainer">
        <div id="updatePopup" class="table-data">
            <div class="updateassignPopup">
                <form action="/vehicleupdate/{id}" method="POST" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    @foreach ($vehicle as $vehicle)
                        <div id="userHeading">
                            <h4 style="margin-top: 2%">
                                Update Vehicle Check
                            </h4>
                            <a href="/details/{{ $vehicle->inspection_id }}">
                                <h4 style="color:#bf0e3a;"> <i class="fa-sharp fa-regular fa-circle-xmark"></i></h4>
                            </a>
                        </div>
                        <div class="vehicle">
                            <div class="form-group row mt-4">
                                <label class="col-sm-2 col-form-label">Id</label>
                                <div class="col-sm-9">
                                    <input type="text" name="id" class="form-control" value="{{ $vehicle->id }}"
                                        readonly>
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
                                        value="{{ $vehicle->inspection_id }}" readonly>
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
                                    <input type="file" name="image[]" class="form-control" value="{{ $vehicle->image }}"
                                        multiple>
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('image')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mt-4 ">
                                <label class="col-sm-2 col-form-label">Feedback</label>
                                <div class="col-sm-9">
                                    <input type="text" name="feedback" class="form-control"
                                        value="{{ $vehicle->feedback }}">
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('feedback')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <label class="col-sm-2 col-form-label"> Status</label>
                                <div class="col-sm-9">
                                    <input type="text" name="action" class="form-control"
                                        value="{{ $vehicle->action }}">
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('action')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                    <input type="submit" name="" value="Submit" class="btn text-white mt-4"
                                        id="add" style="float:right;">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </form>
            </div>
        </div>
    </div>
@endsection
