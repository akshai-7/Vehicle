@extends('layouts.login')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-header">{{ __('M&d Foundations') }}</div>
                    <div class="card-body">
                        @if (session('message3'))
                            <div role="alert" class="alert alert-success" x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)"
                                x-show="show">
                                <i class="fa-regular fa-circle-check"></i> {{ session('message3') }}
                            </div>
                        @endif
                        <a href="/">{{ __('Log Out') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
