@extends('layouts.user')
@section('content')
    <div id="dashboardContainer">
        <div class="head">
            <h3>Dashboard</h3>
        </div>
        <div class="box mt-3">
            <div class="box1">
                <a href="/user" class="boxContainer">
                    <div class="boxContainerValue">
                        <h2><i class="fa-solid fa-user"></i></h2>
                        <h4> Total Drivers</h4>
                    </div>
                    <div class="boxContainertext ">
                        <h1>{{ $user }}</h1>
                    </div>
                </a>
            </div>
            <div class="box1">
                <a href="/vehiclelist" class="boxContainer">

                    <div class="boxContainerValue">
                        <h2><i class="fa-solid fa-car  "></i></h2>
                        <h4> Total Vehicles</h4>
                    </div>
                    <div class="boxContainertext">
                        <h1>{{ $vehicle }}</h1>
                    </div>
                </a>
            </div>
            <div class="box1">
                <a href="/vehicleassignedlist" class="boxContainer">

                    <div class="boxContainerValue">
                        <h2><i class="fa-solid fa-link  "></i></h2>
                        <h4> Assigned Vehicles</h4>
                    </div>
                    <div class="boxContainertext ">
                        <h1>{{ $assign }}</h1>
                    </div>
                </a>
            </div>
        </div>
        <div class="box mt-3">
            <div class="box1">
                <a href="/inspectiondetails" class="boxContainer">

                    <div class="boxContainerValue">
                        <h2><i class="fa-solid fa-list "></i></h2>
                        <h4> Total Inspections</h4>
                    </div>
                    <div class="boxContainertext ">
                        <h1>{{ $inspection }}</h1>
                    </div>
                </a>
            </div>
            <div class="box1">
                <a href="/inspectiondetails" class="boxContainer">

                    <div class="boxContainerValue">
                        <h2><i class="fa-solid fa-list"></i></h2>
                        <h4>Pending Inspections</h4>
                    </div>
                    <div class="boxContainertext">
                        <h1>{{ $assign }}</h1>
                    </div>
                </a>
            </div>
            <div class="box1">
                <a href="/reportlist" class="boxContainer">
                    <div class="boxContainerValue">
                        <h2><i class="fa-solid fa-file  "></i></h2>
                        <h4>Reported Incidents</h4>
                    </div>
                    <div class="boxContainertext">
                        <h1>{{ $report }}</h1>
                    </div>
                </a>
            </div>
        </div>
    </div>
    {{-- <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Driver Details</h3>
            </div>
        </div>
        <table class="table table-bordered mt-3" style="border: 1px solid lightgrey;">
            <thead>
                <th style="text-align:center;">S.No</th>
                <th style="text-align:center;">Driver Name</th>
                <th style="text-align:center;">Email</th>
                <th style="text-align:center;">Mobile.no</th>
                <th style="text-align:center;">Address</th>
                <th style="text-align:center;">Company</th>
                <th style="text-align:center;">License</th>
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
                        <td style="text-align:center;" class="table_data col-md-2">{{ $user->address }},
                            {{ $user->city }},{{ $user->country }},{{ $user->postcode }}
                        </td>
                        <td style="text-align:center;" class="table_data">{{ $user->company }}</td>
                        <td style="text-align:center;" class="table_data">
                            @if ($user->license != null)
                                <a href="/licenseimage/{{ $user->id }}">
                                    <img src="{{ url('images/' . explode(',', $user->license)[0]) }}"
                                        class="rounded-0 border border-secondary" width="50px" height="50px">
                                </a>
                            @endif
                            @if ($user->license == null)
                                <p style="text-align:center;">--</p>
                            @endif
                        </td>
                        <td style="text-align:center;" class="table_data">{{ $user->role }}</td>
                        <td style="text-align:center;" class="table_data">
                            {{ $user->created_at->format('d-m-Y') }}</td>
                        <td style="text-align:center;" class="table_data">
                            <a onclick=" check({{ $user }})"><i class="fa-solid fa-edit btn btn-success"></i></a>
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
    </div> --}}
@endsection
