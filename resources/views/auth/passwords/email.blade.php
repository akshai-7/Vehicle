@extends('layouts.login')
@section('content')
    <div class="message" id="message">
        @if (session('status'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" style="width: 400px;height:20px">
                <div div class="alert alert-success">
                    <i class="fa-regular fa-circle-check"></i> {{ session('status') }}
                </div>
            </div>
        @endif
    </div>
    <div class="main1 card">
        <div>
            <h5 class="card-header">Reset Password</h5>
            <form method="POST" action="/passwordreset">
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
