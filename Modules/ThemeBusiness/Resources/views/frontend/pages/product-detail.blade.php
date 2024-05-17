@extends('themebusiness::frontend.layouts.master')
@section('title')
    Product Detail | {{ config('app.name') }}
@endsection
@section('main-content')
<div class="hb-product-detail-page">
@include('themebusiness::frontend.pages.partials.header_contact_banner')
<main>
        <section class="product-detail">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="hb-pd-contact-box">
                            <h3 class="py-3 hb-pd-heading">13412 - RIGHT FRONT ADJ UPPER ARM</h3>
                            <p>
                                This direct-fit front right upper control arm adds strength, on-car
                                adjustability and articulation flexibility to your stock-height or ‘lifted’
                                suspension Wrangler. The dual-threaded adjuster and jam nut makes
                                caster/pinion angle adjustments quick and easy without the need to
                                disconnect the arm or mess with cams and slotted hole knock-outs. Use
                                with #13411 for the Left Front to complete the front axle set.
                            </p>
                            <p>
                                Front Adjustment range: Caster and Pinon +2.0°<br>
                                Required: 1 per wheel
                            </p>5
                        </div>
                        <div class="content my-2 py-2">
                            <h4>ASSOCIATED PARTS:</h4>
                            <a class="span-link" href="#"> 13411,</a>
                            <a class="span-link" href="#"> 13421,</a>
                            <a class="span-link" href="#"> 13426</a>
                        </div>
                        <div class="content my-2 py-2">
                            <h4>LTD Lifetime Warranty</h4>
                            <p class="hb-p"><b>For more on our warranties:</b><a class="span-link fw-bold" href="#">
                                    https://www.specprod.com/warranties</a></p>
                        </div>
                        <div class="d-md-block d-none">
                            <div class="video">
                                <video src=""></video>
                                <!-- this part will remove after adding video -->
                                <div>
                                    <img class="youtube-img" src="{{ asset('public/modules/spc/images/youtube.png') }}" alt="">
                                </div>
                                <h2 class="mb-5">Youtube video player link <br> (If applicable)</h2>
                                <!-- .. -->
                            </div>
                            <div class="my-4">
                                <h2>VEHICLE FITMENTS:</h2>
                                <ul class="d-block">
                                    <li>2018 Jeep Wrangler</li>
                                    <li>2019 Jeep Wrangler</li>
                                    <li>2020 Jeep Wrangler, Gladiator</li>
                                    <li>2021 Jeep Wrangler, Gladiator</li>
                                    <li>2022 Jeep Wrangler, Gladiator</li>
                                    <li>2023 Jeep Wrangler, Gladiator</li>
                                </ul>
                            </div>
                        </div>  
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="mt-4">
                            <div class="hori-slider d-flex">
                                <div class="w-25">
                                    <div class="slider-nav">
                                        <div class="w-100"><img src="{{ asset('public/modules/spc/images/slider.jpg') }}" alt=""></div>
                                        <div class="w-100"><img src="{{ asset('public/modules/spc/images/slider2.jpg') }}" alt=""></div>
                                        <div class="w-100"><img src="{{ asset('public/modules/spc/images/slider3.jpg') }}" alt=""></div>
                                    </div>
                                </div>
                                <div class="w-75">
                                    <div class="slider-for">
                                        <div class="img-container">
                                           <div id="zoom"> <img src="{{ asset('public/modules/spc/images/slider.jpg') }}" alt=""></div>
                                        </div>
                                        <div class="img-container">
                                            <div id="zoom"> <img src="{{ asset('public/modules/spc/images/slider2.jpg') }}" alt=""></div>
                                         </div>
                                         <div class="img-container">
                                            <div id="zoom"> <img src="{{ asset('public/modules/spc/images/slider3.jpg') }}" alt=""></div>
                                         </div>
                                    </div>
                                </div>
                            </div>
                            <p class="my-2 hover-p col-md-9 px-0 ms-auto">
                                <span>
                                    <img style="width: 24px;" src="{{ asset('public/modules/spc/images/icons8-search-64.png') }}" alt="">
                                </span> Hover over image to view larger
                            </p>
                        </div>
                        <div>
                            <div class="d-flex price-and-button pt-2">
                                <div class="order col-lg-auto">
                                    <a href="#" class="btn button my-4"> Buy Now</a>
                                </div>
                                <div class="mx-3 my-auto">
                                    <p class="price">$271.69 MSRP <span>(Plus Tax, Shipping & Handling)</span></p>
                                </div>
                            </div>
                            <div>
                                <p class="p-col">"Buy Now" pricing is at MSRP-USA only. For better pricing, please
                                    contact us for distributors or retailers for your area.</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between flex-md-nowrap flex-wrap">
                            <a href="#" class="btn button bg-brown my-md-4 m-lg-1 my-2 ms-0">Instructions</a>
                            <a href="#" class="btn button bg-brown my-md-4 m-lg-1 my-2">CAD Model</a>
                            <a href="#" class="btn button bg-brown my-md-4 m-lg-1 my-2">Technical</a>
                            <a href="#" class="btn button bg-brown my-md-4 m-lg-1 my-2">FAQ</a>
                        </div>
                        <div class="d-flex installer">
                            <div class="col-md-auto col-12">
                                <a href="#" class="btn button my-4"> Find Installer</a>
                            </div>
                            <div class="mx-md-3 my-auto">
                                <p class="p text-capitalize">Want To Have This Part Installed?</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bottom-section my-5 d-md-none d-block ">
            <div class="container">
            <div class="product-detail pt-5">
                            <div class="video">
                                <video src=""></video>
                                <!-- this part will remove after adding video -->
                                <div>
                                    <img class="youtube-img" src="{{ asset('public/modules/spc/images/youtube.png') }}" alt="">
                                </div>
                                <h2 class="mb-5">Youtube video player link <br> (If applicable)</h2>
                                <!-- .. -->
                            </div>
                            <div class="my-4">
                                <h2>VEHICLE FITMENTS:</h2>
                                <ul class="d-block hb-ul">
                                    <li>2018 Jeep Wrangler</li>
                                    <li>2019 Jeep Wrangler</li>
                                    <li>2020 Jeep Wrangler, Gladiator</li>
                                    <li>2021 Jeep Wrangler, Gladiator</li>
                                    <li>2022 Jeep Wrangler, Gladiator</li>
                                    <li>2023 Jeep Wrangler, Gladiator</li>
                                </ul>
                            </div>
                        </div>
            </div>
        </section>
        <section class="bottom-section my-4">
            <div class="container">
                <div class="row">
                    <div class=col-12>
                    <hr>
                    <p class="bottom-section-red"><span>These parts should only be installed by personal who have the necessary skill, training and
                            tools to do the job correctly and safely.Incorrect installation can result in personal
                            injury, vehicle damage and / or loss of vehicle control.</span></p>
                    <h2 class="bottom-section-heading">ON-SITE SERVICE </h2>
                    <p class="bottom-section-brown"><span>Please Note: While SPC does not offer direct on-site service of vehicles, our
                            experienced techs are here to help answer any alignment questions you may have through our
                            email form and FAQ section.</span></p>
                    </div>
                </div>
            </div>
        </section>
        <section class="image-banner hb-form-list-md position-static d-md-none d-block">
            <div class="hb-banner-box">
                <div class="container">
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
`       </section>
    </main>
</div>
@endsection