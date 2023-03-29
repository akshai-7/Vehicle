@extends('layouts.user')
@section('content')
    <div class="userContainer">
        <div id="updatePopup" class="table-data">
            <div class="updateassignPopup">
                <a href="/details/{{ $visual->inspection_id }}" style="color:black;"><i class="fa-solid fa-xmark"></i></a>
                <div>
                    @foreach (explode(',', $visual->image) as $image)
                        <img src="{{ url('images/' . $image) }}" class="rounded-0 border border-secondary" width="150px"
                            height="120px">
                        <span></span>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
@endsection
