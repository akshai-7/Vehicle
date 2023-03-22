@extends('layouts.user')
@section('content')
    <div class="popreport" id="popreport">
        <form action="/reportonincident/{id}" method="POST" autocomplete="off">
            @csrf
            <a href="/vehicleassignedlist" style="color:black;" class="close"><i class="fa-solid fa-xmark"></i></a>

            <h5 class="" style="color:#06064b;"> Report On Incident</h5>

            <div class="vehicle">
                <div class="form-group row mt-4">
                    <label class="col-sm-2 col-form-label">Assign_ID</label>
                    <div class="col-sm-9">
                        <input type="text" name="assign_id" value="{{ $report->id }}" class="form-control">
                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('assign_id')
                                *{{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row mt-4">
                    <label class="col-sm-2 col-form-label">Date</label>
                    <div class="col-sm-9">
                        <input type="text" name="date" value="{{ date('d.m.y') }}" class="form-control">
                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('date')
                                *{{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row mt-4 ">
                    <label class="col-sm-2 col-form-label">Location</label>
                    <div class="col-sm-9">
                        <input type="text" name="location" class="form-control">
                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('location')
                                *{{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row mt-4 ">
                    <label class="col-sm-2 col-form-label"> Witnessed_by</label>
                    <div class="col-sm-9">
                        <input type="text" name="witnessed_by" class="form-control">
                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('witnessed_by')
                                *{{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row mt-4 ">
                    <label class="col-sm-2 col-form-label">Mobile.no</label>
                    <div class="col-sm-9">
                        <input type="text" name="mobile" class="form-control">
                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('mobile')
                                *{{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row mt-4 ">
                    <label class="col-sm-2 col-form-label">Statement</label>
                    <div class="col-sm-9">
                        <input type="text" name="statement" class="form-control">
                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('statement')
                                *{{ $message }}
                            @enderror
                        </div>

                    </div>
                </div>
                <div class="form-group row mt-4 ">
                    <label class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-9">
                        <input type="file" name="image" class="form-control">
                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('image')
                                *{{ $message }}
                            @enderror
                        </div>
                        <input type="submit" name="" value="Submit" class="btn text-white mt-4"
                            style="float:right;background:#06064b;">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
