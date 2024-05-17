@extends('backend.auth.master')

@section('auth-content')
<div class="row">
 
    <div class="col-md-6">
        <div class="auth-wrapper d-flex justify-content-center align-items-center" style="background:url({{ asset('public/assets/backend/images/big/auth-bg-2.jpg') }}) no-repeat center center; background-size: cover; height: 100vh;">
        </div>
    </div>
    <div class="col-md-6 d-flex justify-content-center align-items-center">
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center">
            <div class="auth-box">
                <div id="resetform">
                    <div class="logo">
                        <span class="db"><img width="290px" src="{{ asset('public/assets/images/logo/logo.png')}}" alt="logo" /></span>
                        <h5 class="font-medium m-b-20">Reset Password</h5>
                    </div>
                    
                    @include('backend.layouts.partials.messages')
                    <form class="form-horizontal m-t-20" method="post" action="{{ route('password.email') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="ti-user"></i></span>
                            </div>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address" autofocus>
                        </div>
                        <div class="form-group row mb-6">
                            <div class="col-md-12">
                                <div class="form-group text-center">
                                    <div class="col-xs-12 pb-2">
                                        <button class="btn btn-block btn-lg hb-btn" type="submit"> {{ __('Reset Password') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection