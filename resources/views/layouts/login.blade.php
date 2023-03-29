<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LogIn</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.8.2/dist/alpine.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <script src="{{ asset('js/style.js') }}" defer></script>

</head>

<body>
    <div>
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
        @yield('content')
    </div>
</body>

</html>
