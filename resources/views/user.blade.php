@extends('layouts.user')
@section('content')
    <div class="userContainer">
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Driver Details</h3>
                    <a style="margin-right:20px;"><input type="submit" value="Add-Driver" id="add"
                            onclick="show('sam')"></a>
                </div>
                <table class="table table-bordered mt-3" style="border: 1px solid lightgrey">
                    <thead>
                        <th style="text-align:center;">S.No</th>
                        <th style="text-align:center;">Driver Name</th>
                        <th style="text-align:center;">Email</th>
                        <th style="text-align:center;">Mobile.no</th>
                        <th style="text-align:center;">Address</th>
                        <th style="text-align:center;">Company</th>
                        <th style="text-align:center;">Role</th>
                        <th style="text-align:center;">Creation Date</th>
                        <th style="text-align:center;">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="table_row">
                                <td style="text-align:center;" class="table_data">{{ $loop->iteration }}</td>
                                <td style="text-align:center;" class="table_data">{{ ucfirst(strtolower($user->name)) }}
                                </td>
                                <td style="text-align:center;" class="table_data">{{ $user->email }}</td>
                                <td style="text-align:center;" class="table_data">{{ $user->mobile }}</td>
                                <td style="text-align:center;" class="table_data">{{ $user->address }}</td>
                                <td style="text-align:center;" class="table_data">{{ $user->company }}</td>
                                <td style="text-align:center;" class="table_data">{{ $user->role }}</td>
                                <td style="text-align:center;" class="table_data">
                                    {{ $user->created_at->format('Y-m-d') }}</td>
                                <td style="text-align:center;" class="table_data">
                                    <a onclick=" check({{ $user }})"><i
                                            class="fa-solid fa-edit btn btn-success"></i></a>
                                    {{-- <a href="{{ route('update', $user->id) }}" data-toggle="tooltip" data-placement="top"
                                        title="Edit"><i class="fa-solid fa-edit btn btn-success"></i></a> --}}
                                    <a href="/delete/{{ $user->id }}" data-toggle="tooltip" data-placement="top"
                                        title="Delete"><i class="fa-solid fa-trash btn btn-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    @if (count($users) < 1)
                        <p>Data not found</p>
                    @endif
                </table>
            </div>
        </div>
        {{-- <div class="active">
        {!! $users->links() !!}
    </div> --}}
        <div id="sam">
            <div class="userPopUp">
                <form action="/createuser" method="POST" autocomplete="off">
                    @csrf
                    <div id="userHeading">
                        <h5 class="" style="color:#bf0e3a;"><i class="fa-solid fa-user"></i> Create Driver</h5>
                        <a onclick="hide('sam')">
                            <h4 style="color:#bf0e3a;"> <i class="fa-sharp fa-regular fa-circle-xmark"></i></h4>
                        </a>
                    </div>

                    <div class="report1">
                        <div class="report">
                            <div class="form-group row mt-4 ">
                                <label for="" class="col-sm-2  col-form-label"> Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control">
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('name')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mt-4 ">
                                <label for="" class="col-sm-2  col-form-label">Gender</label>
                                <div class="col-sm-9">
                                    <input type="text" name="gender" class="form-control" value="Male">
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('gender')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mt-4 ">
                                <label for="" class="col-sm-2  col-form-label"> D.O.B</label>
                                <div class="col-sm-9">
                                    <input type="Date" name="date_of_birth" class="form-control" value="M&D foundations">
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('date_of_birth')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mt-4 ">
                                <label for="" class="col-sm-2 col-form-label"> Address</label>
                                <div class="col-sm-9">
                                    <input type="text" name="address" class="form-control">
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('address')
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
                                    <input type="text" name="company" class="form-control">
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('company')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <label for="" class="col-sm-2  col-form-label"> Email</label>
                                <div class="col-sm-9">
                                    <input type="text" name="email" class="form-control">
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('email')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <label for="" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="text" name="password" class="form-control">
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('password')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mt-4 ">
                                <label class="col-sm-2 col-form-label"> Mobile</label>
                                <div class="col-sm-9">
                                    <input type="text" name="mobile" class="form-control">
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('mobile')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                    <input type="submit" name="" value="Submit" class="btn text-white mt-4"
                                        style="float:right;background:#bf0e3a;">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="sam1">
            <div class="userPopUp1">
                <form action="/updateuserdetails/{id}" method="POST" autocomplete="off">
                    @csrf
                    <div id="userHeading">
                        <h5 class="" style="color:#bf0e3a;"><i class="fa-solid fa-user"></i> Update Driver</h5>
                        <a href="/user">
                            <h4 style="color:#bf0e3a;"> <i class="fa-sharp fa-regular fa-circle-xmark"></i></h4>
                        </a>
                    </div>

                    <div class="report1">
                        <div class="report">
                            <div class="form-group row mt-4 ">
                                <label for="" class="col-sm-2  col-form-label"> Id</label>
                                <div class="col-sm-9">
                                    <input type="text" name="id" class="form-control" id="tag">
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('id')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mt-4 ">
                                <label for="" class="col-sm-2  col-form-label"> Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" id="tag1">
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('name')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mt-4 ">
                                <label for="" class="col-sm-2  col-form-label"> Gender</label>
                                <div class="col-sm-9">
                                    <input type="text" name="gender" class="form-control" id="tag2">
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('gender')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mt-4 ">
                                <label for="" class="col-sm-2  col-form-label"> D.O.B</label>
                                <div class="col-sm-9">
                                    <input type="date" name="date_of_birth" class="form-control" id="tag3">
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
                                    <input type="text" name="company" class="form-control" id="tag4">
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('company')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mt-4 ">
                                <label for="" class="col-sm-2 col-form-label"> Address</label>
                                <div class="col-sm-9">
                                    <input type="text" name="address" class="form-control" id="tag5">
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('address')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <label for="" class="col-sm-2  col-form-label"> Email</label>
                                <div class="col-sm-9">
                                    <input type="text" name="email" class="form-control" id="tag6">
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('email')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mt-4 ">
                                <label for="" class="col-sm-2 col-form-label"> Mobile</label>
                                <div class="col-sm-9">
                                    <input type="text" name="mobile" class="form-control" id="tag7">
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

                </form>
            </div>
        </div>
    </div>
@endsection
