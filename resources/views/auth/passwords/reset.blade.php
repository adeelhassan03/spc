@extends('backend.auth.master')

@section('auth-content')

<div class="row">
    <div class="col-md-6">
        <div class="auth-wrapper d-flex justify-content-center align-items-center" style="background:url({{ asset('public/assets/backend/images/big/auth-bg.jpg') }}) no-repeat center center; background-size: cover; height: 100vh;">
 
        </div>
    </div>  
    <div class="col-md-6 d-flex justify-content-center align-items-center">
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center">
            <div class="auth-box">
                <div id="resetform">
                    <div class="logo">
                        <span class="db"><img width="290px" src="{{ asset('public/assets/images/logo/logo.png')}}" alt="logo" /></span>
                        <h5 class="font-medium m-b-20">Add New Password</h5>
                    </div>
                    @include('backend.layouts.partials.messages')
                    <form class="form-horizontal m-t-20" method="post" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="ti-user"></i></span>
                            </div>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2"><i class="ti-pencil"></i></span>
                            </div>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Password" autocomplete="new-password">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2"><i class="ti-pencil"></i></span>
                            </div>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">                        
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
                        {{-- <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div> --}}
                        <div class="row justify-content-center">
                            <div class="col-md-12 text-center"> 
                                <a class="btn hb-hover text-white" href="{{ route('admin.login') }}">Login Now</a>
                            </div>
                        </div>



                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
