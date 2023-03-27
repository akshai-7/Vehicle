@extends('layouts.user')
@section('content')
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Driver Details</h3>
                <a style="margin-right:20px;"><input type="submit" value="Add-Driver" id="add"
                        onclick="show('popup1')"></a>
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
                                <a href="/updateuser/{{ $user->id }}" data-toggle="tooltip" data-placement="top"
                                    title="Edit"><i class="fa-solid fa-edit btn btn-success"></i></a>
                                <a href="/delete/{{ $user->id }}" data-toggle="tooltip" data-placement="top"
                                    title="Delete"><i class="fa-solid fa-trash btn btn-danger"></i></a>
                            </td>
                            <p></p>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- <div class="active">
        {!! $users->links() !!}
    </div> --}}
    <div class="popup1" id="popup1">
        <form action="/createuser" method="POST" autocomplete="off">
            @csrf
            <a href="#" onclick="hide('popup1')" style="color:black;" class="close"><i
                    class="fa-solid fa-xmark"></i></a>
            <h5 class="" style="color:#bf0e3a;"><i class="fa-solid fa-user"></i> Create Driver</h5>
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
                            <input type="Date" name="date_of_birth" class="form-control">
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
                        <label for="" class="col-sm-2 col-form-label"> Mobile</label>
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
@endsection
