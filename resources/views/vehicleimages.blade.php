@extends('layouts.user')
@section('content')
    <main class="main">
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Update Vehicle Check</h3>
                </div>
                <table class="table table-bordered mt-3" style="border: 1px solid lightgrey">
                    <thead>
                        <th style="text-align:center;">S.No</th>
                        <th style="text-align:center;">View</th>
                        <th style="text-align:center;">Image</th>
                        <th style="text-align:center;">FeedBack</th>
                        <th style="text-align:center;">Status</th>
                        <th style="text-align:center;">Action</th>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <div class="popup6" id="popup6">
        <a href="/details/{{ $vehicle->inspection_id }}" style="color:black;" class="close"><i
                class="fa-solid fa-xmark"></i></a>
        <div>
            @foreach (explode(',', $vehicle->image) as $image)
                <img src="{{ url('images/' . $image) }}" class="rounded-0 border border-secondary" width="150px"
                    height="120px">
                <span></span>
            @endforeach
        </div>
    </div>
@endsection
