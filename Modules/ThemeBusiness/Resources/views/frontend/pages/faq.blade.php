@extends('themebusiness::frontend.layouts.master')
@section('title')
    FAQ | {{ config('app.name') }}
@endsection
@section('styles')
<style>
    .error {
        color: red;
    }

    .contact-card {
        border: 1px solid #ccc;
        border-radius: 5px;
        transition: background-color 0.3s ease;
        padding: 20px;
        text-align: center;
    }

    .contact-card:hover {
        background-color: #f5f5f5;
    }

    .icon-style {
        font-size: 36px;
        margin-bottom: 10px;
        color: #333;
    }

    .hb-contact-form {
        font-size: 20px;
        padding: 30px 0 50px;
    }

    .hb-contact-form .control-label {
        padding: 10px 0;
    }

    .hb-contact-form .form-group {
        padding-top: 15px;
    }

    .hb-contact-form .form-control {
        font-size: 20px;
        padding: 10px;
    }

    .hb-contact-form .form-check-input:checked {
        background-color: rgb(237, 28, 36);
        border-color: rgb(237, 28, 36);
    }
    .hb-brown{color: brown;}
   .hb-link-list li{padding-bottom: 5px; font-size: 20px; font-weight: bold; border-bottom: 1px solid #000;}
   .hb-faq-section-main a:hover{text-decoration: underline !important; color: brown;}
   .hb-faq-section-main .accordion-button:focus{border-color: brown; box-shadow: inherit;}
   .hb-faq-section-main .accordion-button{font-weight: bold; color: brown;}
   .hb-faq-section-main .accordion-button.collapsed{color: #000;}
   .hb-faq-section-main .accordion-button:not(.collapsed)::after{background-image: var(--bs-accordion-btn-icon);}
   .hb-faq-section-main .hb-text-link{width: 24%; display: inline-block; padding: 5px;}
   @media screen and (max-width: 767px){
    .hb-contact-form{padding-top: 0;}
   }

</style>
@endsection
@section('main-content')
<div class="hb-product-detail-page">
@include('themebusiness::frontend.pages.partials.header_contact_banner')
    <main>
    @include('themebusiness::frontend.layouts.partials.messages')
        <section class="hb-faq-section-main pt-md-5 pt-3">
                    <div class="container">
                        <div class="hb-content-box">
                        <h2 class="py-4"><strong>FAQ</strong></h2>
                        <h3 class="my-3 hb-brown">Note: When using above search function type in proper names, such as Makes and Models with initial capital letter. Example: Toyota, not toyota.</h3>
                        <p>Do you have a question on how our adjustable ball joints work? Need to know if our techs have any hints on how to install a #67455 Jeep Rear Arm or if that EZ Shim will work on a Honda Fit? This is the place for answers.</p>
                        <p>Click on the links below for a listing of all our FAQs in those categories, or use the search feature above to find answers on the subject you need to know more about.
                            Can’t find the answer to your question? Our techs can help. Use the email form below to get in touch with them, and get answers to your install questions.</p>
                        <p class="hb-brown pt-2">While SPC does not offer direct on-site service of vehicles, our experienced techs are constantly working with new and older vehicles and are here to help save you time on the rack.<br> Check out the articles below for quick tips on general alignment problems along with SPC part specific information.
                            Can’t find the answer to your question? Our techs can help. Use the email form below to get in touch with them, and get answers to your install questions.
                            </p>
                        <div class="hb-link-box py-3">
                            <!-- <ul class="hb-link-list d-block">
                                <li><a href="#" class="hb-brown"> FAQ By Part Number</a></li>
                                <li><a href="#" class="hb-brown">FAQ By Vehicle</a></li>
                                <li><a href="#" class="hb-brown">FAQ By Subject</a></li>
                            </ul> -->

                            <ul class="hb-link-list d-block">
                                @foreach($faqsByCategory as $category => $faqs)
                                <li><a class="hb-brown" onclick="openAccordion('{{ $category }}')"> {{ $category }}</a></li>
                                @endforeach
                            </ul>

                        </div>
                        </div>
                        <div class="accordion py-md-5 py-2" id="accordionExample">
                            @foreach($faqsByCategory as $category => $faqs)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{$loop->iteration}}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$loop->iteration}}" aria-expanded="false" aria-controls="collapse{{$loop->iteration}}" data-category="{{ $category }}">
                                        {{$category}}
                                    </button>
                                </h2>
                                <div id="collapse{{$loop->iteration}}" class="accordion-collapse collapse" aria-labelledby="heading{{$loop->iteration}}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        @php
                                            $sortedFaqs = $faqs->sortBy('pdf');
                                            $chunks = $sortedFaqs->chunk(4);
                                        @endphp
                                        @foreach($chunks as $chunk)
                                        <div class="row">
                                            @foreach($chunk as $faq)
                                            <div class="col-md-3">
                                                <ul class="faq-pdf-links d-block">
                                                    <li class="hb-text-link w-100 d-block"><a href="{{ asset('assets/images/faq_pdfs/' . $faq->pdf) }}" class="hb-brown" target="_blank" > {{ basename($faq->pdf) }}</a></li>
                                                </ul>
                                            </div>
                                            @endforeach
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endforeach

                         </div>

                    </div>
        </section>
        <section class="bottom-section my-4">
                    <div class="container">
                        <div class="row">
                            <div class=col-12>
                                <hr>
                                <p class="bottom-section-red"><span>These parts should only be installed by personal who
                                        have the necessary
                                        skill, training and
                                        tools to do the job correctly and safely.Incorrect installation can result in
                                        personal
                                        injury, vehicle damage and / or loss of vehicle control.</span></p>
                                <h2 class="bottom-section-heading">ON-SITE SERVICE </h2>
                                <p class="bottom-section-brown"><span>Please Note: While SPC does not offer direct
                                        on-site service of
                                        vehicles, our
                                        experienced techs are here to help answer any alignment questions you may have
                                        through our
                                        email form and FAQ section.</span></p>
                            </div>
                        </div>
                    </div>
        </section>
        <section class="hb-faq-form">
                    <div class="container">
                        <div class="contact-form hb-contact-form" id="faq_form">
                            <div class="form-text">
                                <h4 class="hb-brown">*Note: Type in proper names, such as Makes and Models with initial capital letter. Example: Toyota, not toyota.</h4>
                                <p>Can't find the answer to your question? Our techs can help. Use the email form below to get in touch with them, and get answers to your install questions.</p>
                            </div>
                            <form id="FaqForm" method="post" action="{{ route('spc.faqMessage') }}">
                            @csrf     
                            
                                <div class="row justify-content-between">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="f-name" class="control-label">First Name <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="f-name" id="f-name" class="form-control"
                                                placeholder="First Name" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="subject" class="control-label">Company Name<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="company_name" id="company_name" class="form-control"
                                                placeholder="Enter company name" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="l-name" class="control-label">Last Name<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="l-name" id="l-name" class="form-control"
                                                placeholder="Last Name" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="control-label">Your email <span
                                                    class="text-danger">*</span></label>
                                            <input type="email" name="email" id="email" class="form-control"
                                                placeholder="Enter your email" required="">
                                            <span id="emailError" class="error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="question" class="control-label">Question <span
                                            class="text-danger">*</span></label>
                                    <textarea name="question" id="question" class="form-control"
                                        placeholder="Enter your Question" style="width: 100%; height: 120px;"
                                        required=""></textarea>
                                </div>
                                <div class="form-group py-4">
                                    <label class="control-label">Confirm <span
                                            class="text-danger">*</span></label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="confirm"
                                            id="confirm_yes" value="1" checked="">
                                        <label class="form-check-label" for="confirm_yes">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="confirm"
                                            id="confirm_no" value="0">
                                        <label class="form-check-label" for="confirm_no">
                                            No
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center pt-md-4 gap-5">
                                    <button type="submit" name="Cancel" id="faq-cancel"
                                        class="btn button my-2">Cancle</button>
                                    <button type="submit" name="btnSubmit" id="btnSubmit"
                                        class="btn button my-2">Submit</button>
                                </div>
                            </form>
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

<script>
    function openAccordion(category) {
        var accordionButton = document.querySelector(`button[data-category="${category}"]`);
        if (accordionButton) {
            accordionButton.click();
        }
    }
</script>
