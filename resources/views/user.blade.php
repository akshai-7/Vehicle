@extends('layouts.user')

@section('content')
    <main class="main">
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Driver Details</h3>
                    <a style="margin-right:20px;"><input type="submit" value="Add-Driver" id="add"
                            onclick="show('popup')"></a>
                    <a style="margin-right: 20px;"><input type="submit" value="Add-Vehicle" id="add"
                            onclick="show('popup2')"></a>
                </div>
                <table class="table table-bordered mt-3" style="border: 1px solid lightgrey">
                    <thead>
                        <th style="text-align:center;">S.No</th>
                        <th style="text-align:center;">Name</th>
                        <th style="text-align:center;">Gender</th>
                        <th style="text-align:center;">D.O.B</th>
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
                                <td style="text-align:center;" class="table_data">{{ $user->name }}</td>
                                <td style="text-align:center;" class="table_data">{{ $user->gender }}</td>
                                <td style="text-align:center;" class="table_data">{{ $user->date_of_birth }}
                                </td>
                                <td style="text-align:center;" class="table_data">{{ $user->email }}</td>
                                <td style="text-align:center;" class="table_data">{{ $user->mobile }}</td>
                                <td style="text-align:center;" class="table_data">{{ $user->address }}</td>
                                <td style="text-align:center;" class="table_data">{{ $user->company }}</td>
                                <td style="text-align:center;" class="table_data">{{ $user->role }}</td>
                                <td style="text-align:center;" class="table_data">
                                    {{ $user->created_at->format('d.m.Y') }}</td>
                                <td style="text-align:center;" class="table_data">
                                    <a href="/updateuser/{{ $user->id }}"><i
                                            class="fa-solid fa-edit btn btn-success"></i></a>
                                    <a href="/delete/{{ $user->id }}"><i
                                            class="fa-solid fa-trash btn btn-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
        {{-- <div class="col-sm-12" style="margin-left: 500px;">
            {!! $users->links() !!}
        </div> --}}
    </main>

    <div class="popup" id="popup">
        <form action="/createuser" method="POST" autocomplete="off">
            @csrf
            <a href="#" onclick="hide('popup')" style="color:black;" class="close"><i
                    class="fa-solid fa-xmark"></i></a>
            <h5 class="" style="color:#06064b;"><i class="fa-solid fa-user"></i> Create Driver</h5>
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
                            <input type="text" name="date_of_birth" class="form-control">
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
                                style="float:right;background:#06064b;">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    {{-- <div class="popup" id="popup1">
        <form action="/updateuserdetails/{id}" method="POST" autocomplete="off">
            @csrf
            <a href="#" onclick="hide('popup1')" style="color:black;" class="close"><i
                    class="fa-solid fa-xmark"></i></a>
            <h5 class="" style="color:#06064b;"><i class="fa-solid fa-user"></i> Update Driver</h5>
            <div class="report1">
                <div class="report">
                    <div class="form-group row mt-4 ">
                        <label for="" class="col-sm-2  col-form-label"> Id</label>
                        <div class="col-sm-9">
                            <input type="text" name="id" class="form-control" value="{{ $user->id }}">
                            <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('id')
                                    *{{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mt-4 ">
                        <label for="" class="col-sm-2  col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                            <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('name')
                                    *{{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mt-4 ">
                        <label for="" class="col-sm-2  col-form-label"> Gender</label>
                        <div class="col-sm-9">
                            <input type="text" name="gender" class="form-control" value="{{ $user->gender }}">
                            <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('gender')
                                    *{{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mt-4 ">
                        <label for="" class="col-sm-2  col-form-label"> D.O.B</label>
                        <div class="col-sm-9">
                            <input type="text" name="date_of_birth" class="form-control"
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
                        <label for="" class="col-sm-2 col-form-label"> Address</label>
                        <div class="col-sm-9">
                            <input type="text" name="address" class="form-control" value="{{ $user->address }}">
                            <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('address')
                                    *{{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label for="" class="col-sm-2  col-form-label"> Email</label>
                        <div class="col-sm-9">
                            <input type="text" name="email" class="form-control" value="{{ $user->email }}">
                            <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('email')
                                    *{{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mt-4 ">
                        <label for="" class="col-sm-2 col-form-label"> Mobile</label>
                        <div class="col-sm-9">
                            <input type="text" name="mobile" class="form-control" value="{{ $user->mobile }}">
                            <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('mobile')
                                    *{{ $message }}
                                @enderror
                            </div>
                            <input type="submit" name="" value="Submit" class="btn text-white mt-4"
                                style="float:right;background:#06064b;">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div> --}}
    <div class="popup" id="popup2">
        <form action="/createvehicle" method="POST" autocomplete="off">
            @csrf
            <a href="#" onclick="hide('popup2')" style="color:black;" class="close"><i
                    class="fa-solid fa-xmark"></i></a>

            <h5 class="" style="color:#06064b;"><i class="fa-solid fa-user"></i> Create Vehicle</h5>

            <div class="vehicle">
                <div class="form-group row mt-4">
                    <label class="col-sm-2 col-form-label">Number_Plate</label>
                    <div class="col-sm-9">
                        <input type="text" name="number_plate" class="form-control">
                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('number_plate')
                                *{{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row mt-4 ">
                    <label class="col-sm-2 col-form-label">Vehicle_Type</label>
                    <div class="col-sm-9">
                        <select name="vehicle_type" class="form-select">
                            <option value="Car">Car</option>
                            <option value="Truck">Truck</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row mt-4 ">
                    <label class="col-sm-2 col-form-label"> Mileage</label>
                    <div class="col-sm-9">
                        <input type="text" name="mileage" class="form-control">
                        <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('mileage')
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
    </div>
@endsection
