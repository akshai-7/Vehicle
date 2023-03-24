@extends('layouts.user')
@section('content')
    <main class="main">




        <div class="popup5" id="popup5">
            <a href="/details/{{ $visual->inspection_id }}" style="color:black;" class="close"><i
                    class="fa-solid fa-xmark"></i></a>
            <div>
                @foreach (explode(',', $visual->image) as $image)
                    <img src="{{ url('images/' . $image) }}" class="rounded-0 border border-secondary" width="150px"
                        height="120px">
                    <span></span>
                @endforeach
            </div>
        </div>



    </main>
@endsection
