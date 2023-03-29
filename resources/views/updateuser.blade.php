@extends('layouts.user')
@section('content')
    <div class="userContainer">
        <div id="updatePopup" class="table-data">
            <div class="updatePopup">
                <form action="/updateuserdetails/{id}" method="POST" autocomplete="off">
                    @csrf
                    <a href="/user" style="color:black;" class="close"><i class="fa-solid fa-xmark"></i></a>
                    <h5 class=""><i class="fa-solid fa-user"></i> Update Driver</h5>
                    @foreach ($user as $user)
                        <div class="report1">
                            <div class="report">
                                <div class="form-group row mt-4 ">
                                    <label for="" class="col-sm-2  col-form-label"> Id</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="id" class="form-control"
                                            value="{{ $user->id }}">
                                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('id')
                                                *{{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mt-4 ">
                                    <label for="" class="col-sm-2  col-form-label"> Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control"
                                            value="{{ $user->name }}">
                                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('name')
                                                *{{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mt-4 ">
                                    <label for="" class="col-sm-2  col-form-label"> Gender</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="gender" class="form-control"
                                            value="{{ $user->gender }}">
                                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('gender')
                                                *{{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mt-4 ">
                                    <label for="" class="col-sm-2  col-form-label"> D.O.B</label>
                                    <div class="col-sm-9">
                                        <input type="date" name="date_of_birth" class="form-control"
                                            value="{{ $user->date_of_birth }}">
                                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('date_of_birth')
                                                *{{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="subreport">
                                <div class="form-group row mt-4 ">
                                    <label for="" class="col-sm-2 col-form-label"> Company</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="company" class="form-control"
                                            value="{{ $user->company }}">
                                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('company')
                                                *{{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mt-4 ">
                                    <label for="" class="col-sm-2 col-form-label"> Address</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="address" class="form-control"
                                            value="{{ $user->address }}">
                                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('address')
                                                *{{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mt-4">
                                    <label for="" class="col-sm-2  col-form-label"> Email</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="email" class="form-control"
                                            value="{{ $user->email }}">
                                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('email')
                                                *{{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mt-4 ">
                                    <label for="" class="col-sm-2 col-form-label"> Mobile</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="mobile" class="form-control"
                                            value="{{ $user->mobile }}">
                                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('mobile')
                                                *{{ $message }}
                                            @enderror
                                        </div>
                                        <input type="submit" name="" value="Submit" class="btn text-white mt-4"
                                            id="add" style="float:right;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </form>
            </div>
        </div>
    </div>
@endsection
