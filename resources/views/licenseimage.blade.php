@extends('layouts.user')


@section('content')
    <div class="userContainer">
        <div id="updatePopup" class="table-data">
            <div class="updateassignPopup">
                <div id="userHeading">
                    <a href="/user">
                        <h4 style="color:#bf0e3a;margin-left:560px"> <i class="fa-sharp fa-regular fa-circle-xmark"></i></h4>
                    </a>
                </div>
                <div id="popUpimgae" class="">
                    @foreach (explode(',', $user->license) as $image)
                        <div>
                            <img src="{{ url('images/' . $image) }}" class="rounded-0 border border-secondary"
                                width="500px" height="300px" style="margin-top:80px;margin-left:40px;">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
