@extends('layouts.login')
@section('content')
    <div class="main">
        <div>
            <img id="" src="{{ url('images/m-d-foundation.png') }}">`
            <h5 class="loginh5">Login to your account</h5>
            <form class="login" action="/user" method="POST" autocomplete="off">
                @csrf
                <div class="login__field">
                    <label for="">Email</label>
                    <input type="text" class="login__inpt form-control" placehlder="Enter Your Email" name="email"
                        required>
                </div>
                <div class="login__field">
                    <label for="">Password</label>
                    <input type="password" class="login__inpu form-control" placehoder=" Enter Your Password"
                        name="password" required id="myInput">
                    <label class="check"><input type="checkbox" onclick="myFunction()"> Show Password</label>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
                <button class="button login__submit" type="submit">
                    <span class="button__text">Log In Now</span>
                    <i class="button__icon fas fa-chevron-right"></i>
                </button>
            </form>
        </div>
    </div>
@endsection
