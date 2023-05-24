@extends('layouts.user')
@section('content')
    <div>
        <form action="/reportonincident/{id}" method="POST" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <div id="userHeading" class=" mt-5">
                <h4>
                    Report On Incident
                </h4>
                <a href="/reportlist">
                    <h4 style="color:#bf0e3a;"> <i class="fa-sharp fa-regular fa-circle-xmark"></i></h4>
                </a>
            </div>
            <div class="report1 mt-5">
                <div class="report">
                    <div class="form-group">
                        <label class="col-sm-3 col-form-label">Driver Name</label>
                        <select class="form-select " style="width: 370px;" name="name" value="{{ old('name') }}">
                            <option value="">Please Select Driver</option>
                            @foreach ($assigns as $assign)
                                <option value="{{ $assign->name }}">{{ $assign->name }}</option>
                            @endforeach
                        </select>
                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('name')
                                *{{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-sm-2 col-form-label">Date</label>
                        <div class="col-sm-9">
                            <input type="text" name="date" class="form-control flatdate" id="flatate"
                                placeholder="Select Date" value="{{ old('date_of_birth') }}">
                            <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('date')
                                    *{{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mt-4 ">
                        <label class="col-sm-2 col-form-label">Location</label>
                        <div class="col-sm-9">
                            <input type="text" name="location" class="form-control" value="{{ old('location') }}">
                            <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('location')
                                    *{{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mt-4 ">
                        <label class="col-sm-3 col-form-label">Witnessed by</label>
                        <div class="col-sm-9">
                            <input type="text" name="witnessed_by" class="form-control"
                                value="{{ old('witnessed_by') }}">
                            <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('witnessed_by')
                                    *{{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="subreport">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mobile.no</label>
                        <div class="col-sm-9">
                            <input type="text" name="mobile" class="form-control" value="{{ old('mobile') }}">
                            <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('mobile')
                                    *{{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mt-4 ">
                        <label class="col-sm-2 col-form-label">Statement</label>
                        <div class="col-sm-9">
                            <input type="text" name="statement" class="form-control" value="{{ old('statement') }}">
                            <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('statement')
                                    *{{ $message }}
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="form-group row mt-4 ">
                        <label class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-9">
                            <input type="file" name="image[]" class="form-control" multiple
                                value="{{ old('image[]') }}">
                            <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('image')
                                    *{{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="divClose">
                            <a href="#"><input type="submit" value="Submit" class="text-white mt-4"
                                    id="add"></a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
