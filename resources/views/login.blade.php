<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LogIn</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.8.2/dist/alpine.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=EB+Garamond&display=swap');

    .main {
        background: linear-gradient(90deg, #eed9d9, #edc7c7);
        width: 400px;
        height: 500px;
        margin: 7em auto;
        border-radius: 1.5em;
        box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
    }

    body {
        font-family: 'EB Garamond', serif;
        overflow: hidden;
        background: linear-gradient(90deg, rgb(239, 231, 231), transparent) #e0c1c1;
    }

    .container {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
    }

    #message {
        position: fixed;
        top: 60px;
        right: 10px;
        animation-duration: 1s;
    }

    .login {
        width: 350px;
        padding: 30px;
        padding-top: 156px;
        margin-top: -130px;
        margin-left: 60px;
    }

    .login__field {
        padding: 20px 0px;
        position: relative;
    }

    .login__icon {
        position: absolute;
        top: 30px;
        /* color: #f57777; */
        color: black;
    }

    .login__input {
        border: none;
        border-bottom: 2px solid #ee8f8f;
        background: none;
        padding: 10px;
        padding-left: 24px;
        font-weight: 700;
        width: 75%;
        transition: .2s;
    }

    .login__input:active,
    .login__input:focus,
    .login__input:hover {
        outline: none;
        border-bottom-color: #ee8f8f;
    }

    .login__submit {
        background: #fff;
        font-size: 14px;
        margin-top: 30px;
        padding: 13px 17px;
        border-radius: 26px;
        border: 1px solid #ebebf7;
        text-transform: uppercase;
        font-weight: 700;
        display: flex;
        align-items: center;
        width: 80%;
        color: #f57777;
        box-shadow: 0px 2px 2px #f29f9f;
        cursor: pointer;
        transition: .2s;
    }

    .login__submit:active,
    .login__submit:focus,
    .login__submit:hover {
        border-color: #f57777;
        background: #eedddd;
        outline: none;
        color: black;
    }

    .button__icon {
        font-size: 20px;
        margin-left: auto;
        color: #f57777;
    }

    img {
        width: 150px;
        margin-top: 50px;
        margin-left: 120px;
        border: 1px solid black;
        border-radius: 4px;
        padding: 10px;
    }

    .check {
        margin-top: 10px;
    }
</style>


<body>
    <div class="container">

        <div class="message" id="message">
            @if (session()->has('message'))
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" style="width: 400px;height:20px">
                    <div div class="alert alert-success">
                        <i class="fa-regular fa-circle-check"></i> {{ session('message') }}
                    </div>
                </div>
            @endif
        </div>
        <div class="message1" id="message">
            @if (session()->has('message1'))
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" style="width: 400px;height:20px;">
                    <div class="alert alert-danger">
                        <i class="fa-regular fa-circle-x"></i>{{ session('message1') }}
                    </div>
                </div>
            @endif
        </div>
        <div class="main">
            <div class="">

                <img id="img-logo" src="{{ url('images/m-d-foundation.png') }}">

                <form class="login" action="/user" method="POST" autocomplete="off">
                    @csrf
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" class="login__input" placeholder="Enter Your Email" name="email"
                            required>
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" class="login__input" placeholder=" Enter Your Password" name="password"
                            required id="myInput">
                        <label class="check"><input type="checkbox" onclick="myFunction()"> Show Password</label>
                    </div>
                    <button class="button login__submit" type="submit">
                        <span class="button__text">Log In Now</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>
                </form>
            </div>

        </div>
    </div>
    </div>
    <script>
        function myFunction() {
            var x = document.getElementById("myInput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>

</html>
