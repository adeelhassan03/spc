@extends('themebusiness::frontend.layouts.master')

@section('title')
   SPC Alignment | Page Not Found
@endsection
@section('main-content')
    <div class="container-fluid text-center">
        <div class="error-box">
            <div class="error-body text-center" style="padding-top: 100px;">
                <div class="col-md-12">
                    <div class="pt-5 pb-5">
                        <img src="{{ asset('public/assets/images/404.png') }}" alt="error404" class="img-responsive center-block" style="max-width: 50%; margin-top: 20px;"/>
                        <h3 class="text-uppercase error-subtitle mt-4 mb-4">PAGE NOT FOUND ERROR!</h3>
                        <p class="text-muted mt-3 mb-3">THE PAGE YOU'RE LOOKING FOR IS NOT AVAILABLE !</p>
                        <a href="{{ route('spc.index') }}" class="btn button">Back to home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
