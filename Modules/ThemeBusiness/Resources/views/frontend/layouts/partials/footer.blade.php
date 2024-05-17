<footer id="footer-sec">
    <div class="container">
        <div class="in-footer">
            <div class="footer-top">
                <h2>LOGIN</h2>
                <div class="links my-5">
                    <ul>
                        <li><a href="#" class="btn button mx-lg-3">Distributors</a></li>
                        <li><a href="#" class="btn button mx-lg-3">SPC Reps</a></li>
                        <li><a href="#" class="btn button footer-btn button mx-lg-3">Customer Services</a></li>
                        <li><a href="#" class="btn button mx-lg-3 ">Vendors</a></li>
                    </ul>
                </div>
            </div>
            <div class="row footer-bottom">
                <div class="col-md-6 col-12">
                    <div class="logo">
                        @if (!empty($settings->general->logo))
                        <img src="{{ asset('public/assets/images/logo/' . $settings->general->footer_logo) }}"
                            alt="error404" />
                        @endif

                    </div>

                    <h2 class="phone">
                        @if($settings->contact->contact_no)
                        <a href="tel:{{ $settings->contact->contact_no }}" style="color: #ed1c24; text-decoration: none;">{{ $settings->contact->contact_no }}</a>
                        @endif
                    </h2>
                    <small
                        class="date-time">@if($settings->contact->working_day_hours){{$settings->contact->working_day_hours}}@endif</small>
                    <div class="social-icons">
                        <ul>
                            @if($settings->social->facebook)
                            <li><a href="{!! $settings->social->facebook !!}" class="footer-icon"><i
                                        class="fa fa-facebook"></i></a></li>
                            @endif
                            @if($settings->social->youtube)
                            <li><a href="{!! $settings->social->youtube !!}" class="footer-icon"><i
                                        class="fa fa-youtube-play"></i></a></li>
                            @endif
                            @if($settings->social->instagram)
                            <li><a href="{!! $settings->social->instagram !!}" class="footer-icon"><i
                                        class="fa fa-instagram"></i></a></li>
                            @endif
                            @if($settings->social->twitter)
                            <li><a href="{!! $settings->social->twitter !!}" class="footer-icon"><svg
                                        xmlns="http://www.w3.org/2000/svg" style="fill: #410000;" height="32px"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
                                    </svg></a></li>
                            @endif
                        </ul>
                    </div>
                    <div class="location">
                        <small>@if($settings->contact->location){!! $settings->contact->location !!}@endif</small>
                    </div>
                    <div class="copyright">
                        <small>
                            @if($settings->general->copyright_text){!! $settings->general->copyright_text !!}@endif
                            @if($settings->contact->address){!! $settings->contact->address !!}@endif
                        </small>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="nav ps-lg-5 ps-md-5">
                        <ul class="hb-footer-nav-links">
                            <li><a href="#">About SPC </a></li>
                            <li><a href="#">Emploment</a></li>
                            <li><a href="#">Quality & Saftey</a></li>
                            <li><a href="#">Manufacturing & Machine</a></li>
                            <li><a href="#">Terms and MAPP Policy</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">BoxTop Program</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>