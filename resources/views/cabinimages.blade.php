@extends('layouts.user')
@section('content')
    <div class="popup7" id="popup7">
        <a href="/details/{{ $cabin->inspection_id }}" style="color:black;" class="close"><i class="fa-solid fa-xmark"></i></a>
        <div>
            @foreach (explode(',', $cabin->image) as $image)
                <img src="{{ url('images/' . $image) }}" class="rounded-0 border border-secondary" width="150px"
                    height="120px">
                <span></span>
            @endforeach
        </div>
    </div>
@endsection
