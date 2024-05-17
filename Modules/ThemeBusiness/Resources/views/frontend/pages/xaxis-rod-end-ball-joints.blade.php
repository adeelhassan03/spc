@extends('themebusiness::frontend.layouts.master')
@section('title')
    Xasis | {{ config('app.name') }}
@endsection
@section('main-content')
<div class="hb-product-detail-page">
@include('themebusiness::frontend.pages.partials.header_contact_banner')
  <main>
    <section class="new-letter newletter-rod-ball py-md-5 d-md-block d-none">
      <div class="rod-ball-sec">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <h2>RACE & BUILDERS COMPONENTS</h2>
              <p>Specialty Products is always looking for suggestions from Alignment professionals. Let us know what you
                are working on and what parts you need to be more productive</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="product-detail hb-xix-detail">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-12 mb-3">
          <h2 class="my-4 hb-heading"> xAxis™ ROD END BALL JOINTS</h2>
            <hr class="m-0">
            <p>
              xAxis™ flex seal joints were designed to excel where rubber bushings fall
              short regarding articulation and severe use applications.
            </p>
            <ul class="d-block my-3">
              <h2>FEATURES</h2>
              <li>Sealed joint retains grease and excludes contaminants</li>
              <li> Highly polished electroless-nickel finish on ball maximizes durability</li>
              <li> Up to 45° angularity for high mis-alignment requirements</li>
              <li>Common sizes that builders, fabricators and racers need</li>
            </ul>
            <ul class="d-block my-3">
              <h2>BENEFITS</h2>
              <li> Reduced compliance and deflections vs rubber and poly joints</li>
              <li> Improved durability vs spherical bearings and poly style bushings</li>
              <li> Increased angularity compares to rubber and poly bushings</li>
              <li> Precision engineered to be a direct fit for many popular street/race or HD
                and off-road applications</li>
            </ul>
            <button class="btn button bg-brown w-auto px-3 hb-btn mt-md-5 mt-3"> xAxis™ Brochure</button>
            <div class="content pt-md-5">
              <h2>LTD Lifetime Warranty</h2>
              <p class="hb-p"><b>For more on our warranties:</b><a class="span-link fw-bold" href="#">
                                    https://www.specprod.com/warranties</a></p>
            </div>
          </div>
          <div class="col-lg-6 col-12 mt-lg-0 mt-3">
            <div>
              <img class="mx-auto" src="{{ asset('public/modules/spc/images/picture.png') }}" alt="error404">
            </div>
            <div class="form-and-text">
              <div class="row">
                <div class="mt-1 col-sm-8 col-12 d-flex justify-content-between">
                  <p>Bolt Size (A)</p>
                  <p>Width (B)</p>
                  <p>Thread (C)</p>
                  <p>Length (D)</p>
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
              <div class="mb-2">
                <img src="{{ asset('public/modules/spc/images/tool.png') }}" alt="error404">
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