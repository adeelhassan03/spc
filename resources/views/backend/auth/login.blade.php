@extends('backend.auth.master')

@section('auth-content')
<div class="row">
    <!-- First Column for Image -->
    <div class="col-md-6">
    <div class="auth-wrapper d-flex justify-content-center align-items-center" style="background:url({{ request()->is('admin/*') ? asset('public/assets/backend/images/big/auth-bg.jpg') : asset('public/admin/assets/backend/images/big/auth-bg.jpg') }}) no-repeat center center; background-size: cover; height: 100vh;">
    <!-- Image Content -->
</div>

    <!-- Image Content -->
</div>
    <!-- Second Column for Login Form -->
    <div class="col-md-6 d-flex justify-content-center align-items-center">
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center">
    <div class="auth-box">
        <div id="loginform">
            <div class="logo">
                <span class="db"><img width="290px" src="{{ asset('public/assets/images/logo/logo.png')}}" alt="logo" /></span>
                <h5 class="font-medium m-b-20">Sign In to Admin</h5>
            </div>
            <!-- Form -->
            <div class="row">
                <div class="col-12">
                    @include('backend.layouts.partials.messages')
                    <form class="form-horizontal m-t-20" method="post" id="loginform" action="{{ route('admin.login.submit') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="ti-user"></i></span>
                            </div>
                            <input type="text" class="form-control form-control-lg @error('username') is-invalid @enderror" name="username" placeholder="Email Address" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2"><i class="ti-pencil"></i></span>
                            </div>
                            <input type="password" class="form-control form-control-lg" name="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="remember" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="remember">Remember me</label>  
                                    <a href="{{ route('admin.password.request') }}" class="text-white float-right hb-hover"><i class="fa fa-lock m-r-5"></i>Forgot password?</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="col-xs-12 pb-2">
                                <button class="btn btn-block btn-lg hb-btn" type="submit">Log In</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
    </div>
</div>
@endsection
