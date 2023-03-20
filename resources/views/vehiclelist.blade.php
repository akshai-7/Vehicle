@extends('layouts.user')

@section('content')
    <main>
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Vehicle Details</h3>
                </div>
                <table class="table table-bordered mt-3" style="border: 1px solid lightgrey">
                    <thead>
                        <th style="text-align:center;">Id</th>
                        <th style="text-align:center;">Number plate</th>
                        <th style="text-align:center;">Vehicle Type</th>
                        <th style="text-align:center;">Mileage</th>
                        <th style="text-align:center;">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($vehicle as $vehicle)
                            <tr class="table_row">
                                <td style="text-align:center;" class="table_data">{{ $vehicle->id }}</td>
                                <td style="text-align:center;" class="table_data">{{ $vehicle->number_plate }}
                                </td>
                                <td style="text-align:center;" class="table_data">{{ $vehicle->vehicle_type }}
                                </td>
                                <td style="text-align:center;" class="table_data">{{ $vehicle->mileage }}Km</td>
                                <td style="text-align:center;" class="table_data">
                                    <a href="/updatevehicles/{{ $vehicle->id }}"><i
                                            class="fa-solid fa-edit btn btn-success"></i></a>
                                    <a href="/remove/{{ $vehicle->id }}"><i
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
