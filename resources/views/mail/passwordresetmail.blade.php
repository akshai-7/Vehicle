<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-header">{{ __(' Password Reset') }}</div>
                <h2>Hello!</h2>
                <h4>You are receiving this email because we received a password reset request for your account.</h4>
                <div class="card-body">
                    <a href="http://127.0.0.1:8000/password/reset/{{ $data['token'] }}?email={{ $data['email'] }}"
                        class="btn btn-primary">Reset
                        Password</a>
                    <br>
                    Regards,<br>
                    <div class="card-header">{{ __('M&d Foundations ') }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
