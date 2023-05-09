<h1>Password Reset</h1>
<a href="http://127.0.0.1:8000/password/reset/{{ $data['token'] }}?email={{ $data['email'] }}">Reset Password</a>


# Contact Form

You have received a new message from {{ $data['token'] }} ({{ $data['email'] }}):



Thanks,<br>
{{ config('app.name') }}
