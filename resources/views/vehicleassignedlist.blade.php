@extends('layouts.user')
@section('content')
    <main>
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Vehicle Assigned List</h3>
                </div>
                <table class="table table-bordered mt-3" style="border: 1px solid lightgrey">
                    <thead class="text-primary">
                        <th style="text-align:center;">Id</th>
                        {{-- <th style="text-align:center;">Driver_Id</th> --}}
                        <th style="text-align:center;">Driver Name</th>
                        <th style="text-align:center;">Email</th>
                        <th style="text-align:center;">Mobile.No</th>
                        {{-- <th style="text-align:center;">Vehicle_Id</th> --}}
                        <th style="text-align:center;">Number plate</th>
                        <th style="text-align:center;">Mileage</th>
                        <th style="text-align:center;">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($assign as $assign)
                            {{-- @dd($assign); --}}
                            <tr class="table_row">
                                <td style="text-align:center;" class="table_data">{{ $assign->id }}</td>
                                {{-- <td style="text-align:center;" class="table_data">{{$assign->driver_id}}</td> --}}
                                <td style="text-align:center;" class="table_data">{{ $assign->name }}</td>
                                <td style="text-align:center;" class="table_data">{{ $assign->email }}</td>
                                <td style="text-align:center;" class="table_data">{{ $assign->mobile }}</td>
                                {{-- <td style="text-align:center;" class="table_data">{{$assign->vehicle_id}}</td> --}}
                                <td style="text-align:center;" class="table_data">{{ $assign->number_plate }}
                                </td>
                                <td style="text-align:center;" class="table_data">{{ $assign->mileage }}
                                </td>
                                <td style="text-align:center;" class="table_data">
                                    <a href="/inspection/{{ $assign->id }}"><i
                                            class="fa-solid fa-plus btn btn-secondary"></i></a>
                                    <a href="/report/{{ $assign->id }}"><i
                                            class="fa-solid fa-file btn btn-primary"></i></a>

                                    <a href="/deleteId/{{ $assign->id }}"><i
                                            class="fa-solid fa-trash btn btn-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    </div>
@endsection
