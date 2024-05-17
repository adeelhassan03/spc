@extends('themebusiness::frontend.layouts.master')

@section('title')
    Home | {{ config('app.name') }}
@endsection

@section('main-content')
<section class="image-banner">
    <div>
    <div class="p-0 img-div" id="img-div">
            <div class="img-box">
                <div class="img-box">
                    <img src="{{ $bannerImagePath}}" alt="">
               
                </div>
            </div>
        </div> 
        <div class="hb-banner-box">
            <div class="container position-relative">
                <div class="col-12 content py-5 py-lg-0">
                    <h2>SEARCH PRODUCT BY VEHICLE</h2>
                    <form action="">
                <ul class="forms-list">
                    <li class="my-2">
                        <select class="region">
                            <option value="value1">Region</option>
                            <option value="value2">1</option>
                            <option value="value3">2</option>
                            <option value="value4">3</option>
                        </select>
                    </li>
                    <li class="my-2">
                        <select class="year">
                            <option value="val1">Year</option>
                            <option value="val2">1</option>
                            <option value="val3">2</option>
                            <option value="val4">3</option>
                        </select>
                    </li>
                    <li class="my-2">
                        <select class="Make">
                            <option value="v1">Make</option>
                            <option value="v2">1</option>
                            <option value="v3">2</option>
                            <option value="v4">3</option>
                        </select>
                    </li>
                    <li class="my-2">
                        <select class="model">
                            <option value="m1">Model</option>
                            <option value="m2">1</option>
                            <option value="m3">2</option>
                            <option value="m4">3</option>
                        </select>
                    </li>
                    <button class="btn button my-2" type="submit">Search</button>
                </ul>
                     </form>
                    <p class="date">12.09.23</p>
                </div>
             </div>
        </div>
        </div>


</section>
@include('themebusiness::frontend.pages.partials.header_contact_banner')
<section class="slider-section">
<div class="container">
    <div class="d-block">
        <h2 class="text-slider">WHAT'S NEW</h2>
        <div class=" slider d-flex">
            <div class="col-md-3">
                <div class="boxes">
                    <div class="heading">
                        <h2>#78130 <br> HR-V REAR SHIM SET (18)</h2>
                    </div>
                    <div class="img">
                        <img src="{{ asset('public/modules/spc/images/dumm.png') }}" alt="">
                    </div>
                    <div class="content">
                        <p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Neque alias
                            ducimus earum
                            omnis.
                        </p>
                        <button class="btn button">Learn More</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="boxes">
                    <div class="heading">
                        <h2>#116583 <br>  HR-V REAR SHIM SET (18)</h2>
                    </div>
                    <div class="img">
                        <img src="{{ asset('public/modules/spc/images/dumm.png') }}" alt="">
                    </div>
                    <div class="content">
                        <p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Neque alias
                            ducimus earum
                            omnis.
                        </p>
                        <button class="btn button">Learn More</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="boxes">
                    <div class="heading">
                        <h2> EMPOLYMENT <br>OPPORTUNITIES </h2>
                    </div>
                    <div class="img">
                        <img src="{{ asset('public/modules/spc/images/dumm.png') }}" alt="">
                    </div>
                    <div class="content">
                        <p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Neque alias
                            ducimus earum
                            omnis.
                        </p>
                        <button class="btn button">Learn More</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="boxes">
                    <div class="heading">
                        <h2>#78130 <br> HR-V REAR SHIM SET (18)</h2>
                    </div>
                    <div class="img">
                        <img src="{{ asset('public/modules/spc/images/dumm.png') }}" alt="">
                    </div>
                    <div class="content">
                        <p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Neque alias
                            ducimus earum
                            omnis.
                        </p>
                        <button class="btn button">Learn More</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="boxes">
                    <div class="heading">
                        <h2>#78130 <br> HR-V REAR SHIM SET (18)</h2>
                    </div>
                    <div class="img">
                        <img src="{{ asset('public/modules/spc/images/dumm.png') }}" alt="">
                    </div>
                    <div class="content">
                        <p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Neque alias
                            ducimus earum
                            omnis.
                        </p>
                        <button class="btn button">Learn More</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
