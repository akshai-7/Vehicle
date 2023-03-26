@extends('layouts.user')
@section('content')
    <main class="main">
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Vehicle Assign</h3>
                </div>
                <form action="/vehicleassignlist" method="POST">
                    @csrf
                    <div class="select">
                        <select class="form-select" style="width: 500px;" name="name">
                            <option>Please Select Driver</option>
                            @foreach ($user as $user)
                                <option value="{{ $user->name }}" name="name">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <select class="form-select" id="select" name="number_plate" style="width: 500px;">
                            <option>Please Select Vehicle</option>
                            @foreach ($vehicle as $vehicle)
                                <option value="{{ $vehicle->number_plate }}" name="number_plate">
                                    {{ $vehicle->number_plate }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="submit" name="" value="Submit" id="add" class="btn text-white mt-4"
                        style="float:right;">
                </form>
            </div>
        </div>
    </main>

    </div>
@endsection
