@extends('themebusiness::frontend.layouts.master')
@section('title')
    Truck Axale Shims | {{ config('app.name') }}
@endsection

@section('main-content')
<div class="hb-product-detail-page">
@include('themebusiness::frontend.pages.partials.header_contact_banner')
  <main>
    <section class="new-letter py-md-5 d-md-block d-none">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h2>HEAVY DUTY ALIGNMENT</h2>
            <p>From fleet trucks to over-the-road tractors, SPC has the parts and tools needed to keep your
              heavy duty truck
              on the road. Select a category to view our heavy duty products from shims</p>
          </div>
        </div>
      </div>
    </section>
    <section class="hb-truck-section">
      <div class="container">
        <div class="row">
          <h2 class="my-4 hb-heading">TRUCK AXLE SHIMS</h2>
          <div class="col-lg-6 col-12 mb-3">
            <hr class="m-0">
            <p>
              Specialty Products offers a wide range of truck axle shims for both heavy
              duty and fleet vehicle use. SPC Shims come six to a box and are available
              in many different configurations of both size and material.Specialty
              Products carries Truck Axle Caster Shims in three different alloys, giving
              the technician the opportunity to match price point and mechanical
              requirements to meet their customer's needs
            </p>
            <button class="btn button bg-brown my-4"> HD Brochure</button>
            <div class="content my-4">
              <h3 class="mb-0">LTD Lifetime Warranty</h3>
              <p class="hb-p"><b>For more on our warranties:</b><a class="span-link fw-bold" href="#">
                                    https://www.specprod.com/warranties</a></p>
            </div>
            <div class="my-3">
              <h5>Aluminum Alloy Shims (2 1/2” - 4” Spring Width)</h5>
              <hr class="m-0">
              <div>
                <img src="{{ asset('public/modules/spc/images/2.jpg') }}" alt="error404">
              </div>
              <div class="form-and-text my-md-5 mb-5">
                <div class="row">
                    <div class="mt-1 col-sm-8 col-12 d-flex justify-content-between">
                        <p>Width</p>
                        <p>Degree</p>
                        <p>Length</p>
                    </div>
                    <form class="col-sm-8 col-12">
                        <select class="h-100">
                            <option value="value1">Select Size</option>
                            <option value="value2">Bolt Size (A)</option>
                            <option value="value3">Width (B)</option>
                            <option value="value4">Thread (C)</option>
                            <option value="value4">Length (D)</option>
                        </select>
                  </form>
                  <div class="col-sm-4 col-12">
                        <button class="btn button w-100">Go</button>
                    </div>
                </div>
              </div>
            </div>
            <div class="my-4">
              <h5>Zinc Alloy Shims (2 1/2” - 4” Spring Width)</h5>
              <hr class="m-0">
              <div>
                <img src="{{ asset('public/modules/spc/images/2.jpg') }}" alt="error404">
              </div>
              <div class="form-and-text my-md-5 mb-5">
                <div class="row">
                    <div class="mt-1 col-sm-8 col-12 d-flex justify-content-between">
                        <p>Width</p>
                        <p>Degree</p>
                        <p>Length</p>
                    </div>
                    <form class="col-sm-8 col-12">
                        <select class="h-100">
                            <option value="value1">Select Size</option>
                            <option value="value2">Bolt Size (A)</option>
                            <option value="value3">Width (B)</option>
                            <option value="value4">Thread (C)</option>
                            <option value="value4">Length (D)</option>
                        </select>
                  </form>
                  <div class="col-sm-4 col-12">
                        <button class="btn button w-100">Go</button>
                    </div>
                </div>
              </div>
            </div>
            <div class="my-5">
              <h5>Managanese Bronze Shims (2 1/2” - 4” Spring Width)</h5>
              <hr class="m-0">
              <div>
                <img src="{{ asset('public/modules/spc/images/4.jpg') }}" alt="error404">
              </div>
              <div class="form-and-text my-md-5 mb-5">
                <div class="row">
                    <div class="mt-1 col-sm-8 col-12 d-flex justify-content-between">
                        <p>Width</p>
                        <p>Degree</p>
                        <p>Length</p>
                    </div>
                    <form class="col-sm-8 col-12">
                        <select class="h-100">
                            <option value="value1">Select Size</option>
                            <option value="value2">Bolt Size (A)</option>
                            <option value="value3">Width (B)</option>
                            <option value="value4">Thread (C)</option>
                            <option value="value4">Length (D)</option>
                        </select>
                  </form>
                  <div class="col-sm-4 col-12">
                        <button class="btn button w-100">Go</button>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-12">
            <h5>Uni-Wedge Shims (3"- 3½"- 4" Spring Width)</h5>
            <hr class="m-0">
            <div>
              <img src="{{ asset('public/modules/spc/images/1.jpg') }}" alt="error404">
            </div>
            <div class="form-and-text my-md-5 mb-5">
                <div class="row">
                    <div class="mt-1 col-sm-8 col-12 d-flex justify-content-between">
                        <p>Width</p>
                        <p>Degree</p>
                    </div>
                    <form class="col-sm-8 col-12">
                        <select class="h-100">
                            <option value="value1">Select Size</option>
                            <option value="value2">Bolt Size (A)</option>
                            <option value="value3">Width (B)</option>
                            <option value="value4">Thread (C)</option>
                            <option value="value4">Length (D)</option>
                        </select>
                  </form>
                  <div class="col-sm-4 col-12">
                        <button class="btn button w-100">Go</button>
                    </div>
                </div>
              </div>
            <div class="my-5">
              <h5>HD Zinc Alloy Shims (2 1/4” - 2 1/2” Spring Width)</h5>
              <hr class="m-0">
              <div>
                <img src="{{ asset('public/modules/spc/images/5.jpg') }}" alt="error404">
              </div>
              <div class="form-and-text my-md-5 mb-5">
                <div class="row">
                    <div class="mt-1 col-sm-8 col-12 d-flex justify-content-between">
                        <p>Width</p>
                        <p>Degree</p>
                    </div>
                    <form class="col-sm-8 col-12">
                        <select class="h-100">
                            <option value="value1">Select Size</option>
                            <option value="value2">Bolt Size (A)</option>
                            <option value="value3">Width (B)</option>
                            <option value="value4">Thread (C)</option>
                            <option value="value4">Length (D)</option>
                        </select>
                  </form>
                  <div class="col-sm-4 col-12">
                        <button class="btn button w-100">Go</button>
                    </div>
                </div>
              </div>
            </div>
            <div class="my-5">
              <h5>Hendrickson HD Shims</h5>
              <hr class="m-0">
              <div>
                <img src="{{ asset('public/modules/spc/images/6.jpg') }}" alt="error404">
              </div>
              <div class="form-and-text my-md-5 mb-5">
                <div class="row justify-content-end">
                  <div class="col-sm-4 col-12">
                        <button class="btn button w-100">Go</button>
                    </div>
                </div>
            </div>
            <div class="my-5">
              <h5>Hendrickson Walking Beam Shims</h5>
              <hr class="m-0">
              <div>
                <img src="{{ asset('public/modules/spc/images/7.jpg') }}" alt="error404">
              </div>
              <div class="form-and-text my-md-5 mb-5">
                <div class="row justify-content-end">
                  <div class="col-sm-4 col-12">
                        <button class="btn button w-100">Go</button>
                    </div>
                </div>
              </div>
            </div>
            <div class="my-5">
              <h5>Sprinter Van Shims</h5>
              <hr class="m-0">
              <div>
                <img src="{{ asset('public/modules/spc/images/8.jpg') }}" alt="error404">
              </div>
              <div class="form-and-text my-md-5 mb-5">
                <div class="row">
                    <div class="mt-1 col-sm-8 col-12 d-flex justify-content-between">
                        <p>Width</p>
                        <p>Degree</p>
                    </div>
                    <form class="col-sm-8 col-12">
                        <select class="h-100">
                            <option value="value1">Select Size</option>
                            <option value="value2">Bolt Size (A)</option>
                            <option value="value3">Width (B)</option>
                            <option value="value4">Thread (C)</option>
                            <option value="value4">Length (D)</option>
                        </select>
                  </form>
                  <div class="col-sm-4 col-12">
                        <button class="btn button w-100">Go</button>
                    </div>
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
</div>
@endsection