@extends('layouts.user')
@section('content')
    <div class="userContainer">
        <div class="table-data">
            <div class="order">
                {{-- <form method="POST" action="/users">
                    @csrf
                    <input type="text" name="name" value="" required>
                    <button type="submit">Submit</button>
                </form> --}}


                <div class="head">
                    <h3>Driver Details</h3>
                    <a style="margin-right:20px;"><input type="submit" value="Add-Driver" id="add"
                            onclick="show('sam')"></a>
                </div>
                <form action="/users" method="GET" autocomplete="off">
                    <div id="filterDiv1">
                        <div class="col-md-3" id="filter">
                            <label>Filter by Date</label>
                            @if (isset($_GET['date']))
                                <input type="date" name="date" class="form-control" value="{{ $_GET['date'] }}">
                            @else
                                <input type="date" name="date" class="form-control">
                            @endif
                        </div>
                        <div class="col-md-3" id="">
                            <label>Filter by Name</label>
                            <select class="form-select form-control" name="name">
                                @if (isset($_GET['name']))
                                    <option value="{{ $_GET['name'] }}">{{ $_GET['name'] }}</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->name }}">
                                            {{ $user->name }}</option>
                                    @endforeach
                                @else
                                    <option>Select</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->name }}">
                                            {{ $user->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-md-5" style="margin-left: 6px">
                            <br />
                            <button type="submit" class="btn btn-primary btn-sm mt-1"><i class="fa fa-filter"></i></button>
                            <a href="/user" class="btn btn-success btn-sm mt-1"><i
                                    class="fa-solid fa-arrow-rotate-right"></i></a>
                        </div>

                    </div>
                </form>
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
                                <a href="/delete/{{ $user->id }}" data-toggle="tooltip" data-placement="top"
                                    title="Delete"><i class="fa-solid fa-trash btn btn-danger"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            @if (count($users) < 1)
                <div id="dataNotFound">
                    <p>Data not found</p>
                </div>
            @endif
            <div class="active">
                {!! $users->links() !!}
            </div>
        </div>
    </div>

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
                                <input type="text" name="company" class="form-control" value="M&D foundations">
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
                                <input type="text" name="id" class="form-control" id="id">
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('id')
                                        *{{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-4 ">
                            <label for="" class="col-sm-2  col-form-label"> Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" id="name">
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('name')
                                        *{{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-4 ">
                            <label for="" class="col-sm-2  col-form-label"> Gender</label>
                            <div class="col-sm-9">
                                <input type="text" name="gender" class="form-control" id="gender">
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('gender')
                                        *{{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mt-4 ">
                            <label for="" class="col-sm-2  col-form-label"> D.O.B</label>
                            <div class="col-sm-9">
                                <input type="date" name="date_of_birth" class="form-control" id="date_of_birth">
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
                                <input type="text" name="company" class="form-control" id="company">
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('company')
                                        *{{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-4 ">
                            <label for="" class="col-sm-2 col-form-label"> Address</label>
                            <div class="col-sm-9">
                                <input type="text" name="address" class="form-control" id="address">
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('address')
                                        *{{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label for="" class="col-sm-2  col-form-label"> Email</label>
                            <div class="col-sm-9">
                                <input type="text" name="email" class="form-control" id="email">
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('email')
                                        *{{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-4 ">
                            <label for="" class="col-sm-2 col-form-label"> Mobile</label>
                            <div class="col-sm-9">
                                <input type="text" name="mobile" class="form-control" id="mobile">
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
