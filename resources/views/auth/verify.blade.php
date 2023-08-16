@extends('layouts.base')
@include('layouts.nav')
@section('body')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12" style="border: 3px solid white; background-color: #00abed;border-radius: 10px; padding-top: 24px">
            <div class="card" style="text-align:center;">
                <div class="card-header" style="color:  white">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body" style="color:white;">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
