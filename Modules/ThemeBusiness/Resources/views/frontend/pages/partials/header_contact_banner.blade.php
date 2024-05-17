<section class="second">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="content-box">
                    <div class="rw">
                        <img src="{{ asset('public/modules/spc/images/contact (1).png') }}" alt="error404">
                        <a href="{{ url('contact-us') }}" class="contact">Contact Us</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="content-box">
                    <div class="rw">
                        <img src="{{ asset('public/modules/spc/images/phone1.png') }}" alt="error404">
                        <a class="talk"
                            href="tel:@if($settings->contact->contact_no){{$settings->contact->contact_no}}@endif">Talk
                            To an Expert <br> <span
                                class="hb-td-clr">@if($settings->contact->contact_no){{$settings->contact->contact_no}}@endif</span></a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12 ">
                <div class="content-box">
                    <div class="rw">
                        <img class="third m-auto"
                                src="{{ asset('public/modules/spc/images/hhh.png') }}" alt="error404">
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="content-box">
                    <div class="rw">
                        <img src="{{ asset('public/modules/spc/images/Capture.PNG') }}" class="second-image"
                                alt="error404">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<hr class="redd my-2">