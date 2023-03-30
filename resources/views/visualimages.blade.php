@extends('layouts.user')
@section('content')
    <div class="userContainer">
        <div id="updatePopup" class="table-data">
            <div class="updateassignPopup">
                <div id="userHeading">
                    <a href="/details/{{ $visual->inspection_id }}">
                        <h4 style="color:#bf0e3a;margin-left:560px"> <i class="fa-sharp fa-regular fa-circle-xmark"></i></h4>
                    </a>
                </div>
                <div id="popUpimgae">
                    @foreach (explode(',', $visual->image) as $image)
                        <img src="{{ url('images/' . $image) }}" class="rounded-0 border border-secondary" width="190px"
                            height="120px">
                        <span></span>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
@endsection
