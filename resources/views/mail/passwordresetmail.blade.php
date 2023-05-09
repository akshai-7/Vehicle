<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-header">{{ __(' Password Reset') }}</div>
                <div class="card-body">
                    <a href="http://127.0.0.1:8000/password/reset/{{ $data['token'] }}?email={{ $data['email'] }}">Reset
                        Password</a><br>
                    Thanks,<br>
                    <div class="card-header">{{ __('M&d Foundations ') }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
