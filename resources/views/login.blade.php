@extends('layouts.login')
@section('content')
    <div class="main">
        <div class="">

            <img id="img-logo" src="{{ url('images/m-d-foundation.png') }}">

            <form class="login" action="/user" method="POST" autocomplete="off">
                @csrf
                <div class="login__field">
                    <i class="login__icon fas fa-user"></i>
                    <input type="text" class="login__input" placeholder="Enter Your Email" name="email" required>
                </div>
                <div class="login__field">
                    <i class="login__icon fas fa-lock"></i>
                    <input type="password" class="login__input" placeholder=" Enter Your Password" name="password" required
                        id="myInput">
                    <label class="check"><input type="checkbox" onclick="myFunction()"> Show Password</label>
                </div>
                <button class="button login__submit" type="submit">
                    <span class="button__text">Log In Now</span>
                    <i class="button__icon fas fa-chevron-right"></i>
                </button>
            </form>
        </div>

    </div>
@endsection
