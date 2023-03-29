@extends('layouts.user')
@section('content')
    <div class="userContainer">
        <div id="updatePopup" class="table-data">
            <div class="updateassignPopup">
                <div id="userHeading">
                    <a href="/details/{{ $vehicle->inspection_id }}">
                        <h4 style="color:#bf0e3a;margin-left:560px"> <i class="fa-sharp fa-regular fa-circle-xmark"></i></h4>
                    </a>
                </div>
                <div>
                    @foreach (explode(',', $vehicle->image) as $image)
                        <img src="{{ url('images/' . $image) }}" class="rounded-0 border border-secondary" width="150px"
                            height="120px">
                        <span></span>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
@endsection
