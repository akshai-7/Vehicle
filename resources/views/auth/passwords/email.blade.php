@extends('layouts.login')
@section('content')
    <div class="main1 card">
        <div>
            <h5 class="card-header">Reset Password</h5>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="row  mt-5">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <button class="reset mt-4" type="submit">
                    {{ __('Send Password Reset Link') }}
                </button>
            </form>
        </div>
    </div>
@endsection
