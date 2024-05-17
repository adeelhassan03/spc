@include('common.frontend.header')
<div class="hb-product-detail-page">
@include('common.frontend.header_contact_banner')
<main>
        <section class="products-section">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h2 class="mt-2 mb-3 hb-product-heading col-md-12 col-sm-8 ms-0 ms-auto">Search Results</h2>
                        <div class="products d-flex justify-content-md-start justify-content-center">
                            <div class="product col-lg-3 col-md-6 col-sm-8 col-12">
                                <div class="box">
                                    <div class="content d-flex flex-lg-column justify-content-between align-items-lg-start align-items-center h-100">
                                        <div class="heading">
                                            <h2>#99918 <br>WHEEL SPREADER</h2>
                                        </div>
                                        <div class="img my-2">
                                            <img src="{{ asset('frontend/image/rode.jpg') }}" alt="error404">
                                        </div>
                                    </div>
                                    <div class="ms-md-2 btn button">Learn More</div>
                                </div>
                            </div>
                            <div class="product col-lg-3 col-md-6 col-sm-8 col-12">
                                <div class="box hb-mr-box">
                                    <div class="content d-flex flex-lg-column justify-content-between align-items-center h-100">
                                        <div class="heading">
                                            <h2>#99361 <br>TOE MEASURING GAUGE</h2>
                                        </div>
                                        <div class="img">
                                            <img src="{{ asset('frontend/image/rode2.jpg') }}" alt="error404">
                                        </div>
                                    </div>
                                    <div class="ms-md-2 btn button">Learn More</div>
                                </div>
                            </div>
                            <div class="product col-lg-3 col-md-6 col-sm-8 col-12">
                                <div class="box">
                                    <div class="content d-flex flex-lg-column justify-content-between align-items-center h-100">
                                        <div class="heading">
                                            <h2>#99374 <br>TOE MEASURING GAUGE</h2>
                                        </div>
                                        <div class="img">
                                            <img src="{{ asset('frontend/image/rode2.jpg') }}" alt="error404">
                                        </div>
                                    </div>
                                    <div class="ms-md-2 btn button">Learn More</div>
                                </div>
                            </div>
                             <div class="product col-lg-3 col-md-6 col-sm-8 col-12">
                                <div class="box me-0">
                                    <div class="content d-flex flex-lg-column justify-content-between align-items-center h-100">
                                        <div class="heading">
                                            <h2>#99374 <br>TOE MEASURING GAUGE</h2>
                                        </div>
                                        <div class="img">
                                            <img src="{{ asset('frontend/image/rode.jpg') }}" alt="error404">
                                        </div>
                                    </div>
                                    <div class="ms-md-2 btn button">Learn More</div>
                                </div>
                            </div>
                            <div class="product col-lg-3 col-md-6 col-sm-8 col-12">
                                <div class="box p-md-4">
                                    <div class="content d-flex flex-lg-column justify-content-between align-items-center h-100">
                                        <div class="heading">
                                            <h2>#99918 <br>STEERING WHEEL HOLDER</h2>
                                        </div>
                                        <div class="img">
                                            <img src="{{ asset('frontend/image/rode4.jpg') }}" alt="error404">
                                        </div>
                                    </div>
                                    <div class="ms-md-2 btn button">Learn More</div>
                                </div>
                            </div> 
                    </div>
                </div>
            </div>
        </section>
        <section class="bottom-section my-4">
            <div class="container">
                <div class="row">
                    <div class=col-12>
                    <div class="pagination">
                         <a href="#">1</a>
                         <a class="active" href="#">2</a>
                         <a href="#">3</a>
                         <a href="#">></a>
                     </div>
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
    </section>
</main>
@include('common.frontend.footer')
</div>
