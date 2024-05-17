@extends('themebusiness::frontend.layouts.master')

@section('title')
Contact Us | {{ config('app.name') }}
@endsection

@section('main-content')
@php
$contact_page = \Modules\Article\Entities\Page::where('slug', 'contact-us')->first();
@endphp
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

.hb-hyper-link {
    color: #000;
}

.hb-hyper-link.active,
.hb-hyper-link:hover {
    color: rgb(237, 28, 36);
}

.hb-main {
    padding-top: 130px;
}
</style>
@endsection
<div role="main" class="main hb-main">
    <section class="page-header page-header-modern page-header-lg bg-tertiary border-0 my-0 ">
        <div class="container my-3">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="font-weight-bold text-10">Contact Us</h1>
                    <p>Thank you for using our web site. We hope you have found our site helpful. <br>Suggestions and
                        comments are always appreciated and will help us to improve the site.</p>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <!-- Contact Form -->
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-md-4 mb-4">
                    <div class="card card-body h-100 contact-card">
                        <i class="fa fa-map-marker icon-style" aria-hidden="true"></i>
                        <h5 class="card-title">Address</h5>
                        <p class="card-text">
                            @if($settings->contact->location)
                            {!! str_replace(', ', ',<br>', $settings->contact->location) !!}
                            @endif
                        </p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card card-body h-100 contact-card">
                        <i class="fa fa-phone icon-style"></i>
                        <h5 class="card-title">Phone</h5>
                        <p class="card-text">Voice: <a href="tel: 303-772-2103"
                                class="hb-hyper-link">303-772-2103</a><br>
                                Fax: <a href="tel: 303-772-1918"
                                class="hb-hyper-link">303-772-1918</a><br>
                                Toll Free: <a href="tel:1-800-525-6505"
                                class="hb-hyper-link">1-800-525-6505</a></p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card card-body h-100 contact-card">
                        <i class="fa fa-envelope icon-style"></i>
                        <h5 class="card-title">Email Address</h5>
                        <p class="card-text"><a href="mailto:custserv@specprod.com"
                                class="hb-hyper-link">custserv@specprod.com</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6099.773439124168!2d-104.978862!3d40.144807!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x876c0629688b06a3%3A0xc5326af5803639e1!2s4045%20Specialty%20Pl%2C%20Longmont%2C%20CO%2080504!5e0!3m2!1sen!2sus!4v1710774093723!5m2!1sen!2sus"
                        height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('public/assets/images/contactmontage.jpg') }}" style="width:78%;" alt="error404" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <span style="font-family: arial,helvetica,sans-serif; font-size: 12pt;"><br>Or, email us! Do you have a
                    comment about any of our products or our service? List them in the comments/suggestions box and we
                    will personally get back to you within 48 hours.<br><br>Specialty Products takes your privacy
                    seriously. For our complete privacy policy <a href="/page/privacy-policy">click
                        here</a>.<br></span>
            </div>
        </div>
        <div class="contact-form hb-contact-form" id="contact">
            @include('themebusiness::frontend.layouts.partials.messages')
            <form id="contactForm" method="post" action="{{ route('spc.contact') }}">
                @csrf
                <div class="row justify-content-between">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="control-label">Your name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name"
                                required />
                        </div>
                        <div class="form-group">
                            <label for="phone" class="control-label">Your phone no <span
                                    class="text-danger">*</span></label>
                            <input type="tel" name="phone" id="phone" class="form-control"
                                placeholder="Enter phone no (Please use XXX-XXX-XXXX)" required />
                            <span id="phoneError" class="error"></span>
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label">Your email <span
                                    class="text-danger">*</span></label>
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="Enter your email" required />
                            <span id="emailError" class="error"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="subject" class="control-label">Company Name: <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="company_name" id="company_name" class="form-control"
                                placeholder="Enter company name" required />
                        </div>
                        <div class="form-group">
                            <label for="street_address" class="control-label">Street Address <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="street_address" id="street_address" class="form-control"
                                placeholder="Enter street address" required>
                        </div>

                        <div class="form-group">
                            <label for="street_address_line2" class="control-label">Street Address Line 2</label>
                            <input type="text" name="street_address_line2" id="street_address_line2"
                                class="form-control" placeholder="Enter street address line 2">
                        </div>
                        <div class="form-group d-none">
                            <label for="subject" class="control-label">Subject <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="subject" value="subject" class="form-control"
                                placeholder="Enter your subject" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="message" class="control-label">Comments/suggestions: <span
                            class="text-danger">*</span></label>
                    <textarea name="message" id="message" class="form-control" placeholder="Enter your message"
                        style="width: 100%; height: 120px;" required></textarea>
                </div>
                <div class="form-group row align-items-end">
                    <div class="col-lg-3 col-sm-6" style="display: inline-block;">
                        <label for="city" class="control-label">City <span class="text-danger">*</span></label>
                        <input type="text" name="city" id="city" class="form-control" placeholder="Enter city" required>
                    </div>
                    <div class="col-lg-3 col-sm-6" style="display: inline-block;">
                        <label for="state_province_region" class="control-label">State / Province /
                            Region</label>
                        <input type="text" name="state_province_region" id="state_province_region" class="form-control"
                            placeholder="Enter state/province/region">
                    </div>
                    <div class="col-lg-3 col-sm-6" style="display: inline-block;">
                        <label for="postal_zip_code" class="col-form-label">Postal / Zip Code</label>
                        <input type="text" name="postal_zip_code" id="postal_zip_code" class="form-control"
                            placeholder="Enter postal/zip code">
                    </div>
                    <div class="col-lg-3 col-sm-6" style="display: inline-block;">
                        <label for="country" class="col-form-label">Country <span class="text-danger">*</span></label>
                        <select name="country" id="country" class="form-control" required>
                            <option value="" selected="selected"></option>
                            <option value="Afghanistan">Afghanistan</option>
                            <option value="Albania">Albania</option>
                            <option value="Algeria">Algeria</option>
                            <option value="Andorra">Andorra</option>
                            <option value="Angola">Angola</option>
                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Armenia">Armenia</option>
                            <option value="Australia">Australia</option>
                            <option value="Austria">Austria</option>
                            <option value="Azerbaijan">Azerbaijan</option>
                            <option value="Bahamas">Bahamas</option>
                            <option value="Bahrain">Bahrain</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Barbados">Barbados</option>
                            <option value="Belarus">Belarus</option>
                            <option value="Belgium">Belgium</option>
                            <option value="Belize">Belize</option>
                            <option value="Benin">Benin</option>
                            <option value="Bhutan">Bhutan</option>
                            <option value="Bolivia">Bolivia</option>
                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                            <option value="Botswana">Botswana</option>
                            <option value="Brazil">Brazil</option>
                            <option value="Brunei">Brunei</option>
                            <option value="Bulgaria">Bulgaria</option>
                            <option value="Burkina Faso">Burkina Faso</option>
                            <option value="Burundi">Burundi</option>
                            <option value="Cambodia">Cambodia</option>
                            <option value="Cameroon">Cameroon</option>
                            <option value="Canada">Canada</option>
                            <option value="Cape Verde">Cape Verde</option>
                            <option value="Central African Republic">Central African Republic</option>
                            <option value="Chad">Chad</option>
                            <option value="Chile">Chile</option>
                            <option value="China">China</option>
                            <option value="Colombi">Colombi</option>
                            <option value="Comoros">Comoros</option>
                            <option value="Congo (Brazzaville)">Congo (Brazzaville)</option>
                            <option value="Congo">Congo</option>
                            <option value="Costa Rica">Costa Rica</option>
                            <option value="Cote d'Ivoire">Cote d'Ivoire</option>
                            <option value="Croatia">Croatia</option>
                            <option value="Cuba">Cuba</option>
                            <option value="Cyprus">Cyprus</option>
                            <option value="Czech Republic">Czech Republic</option>
                            <option value="Denmark">Denmark</option>
                            <option value="Djibouti">Djibouti</option>
                            <option value="Dominica">Dominica</option>
                            <option value="Dominican Republic">Dominican Republic</option>
                            <option value="East Timor (Timor Timur)">East Timor (Timor Timur)</option>
                            <option value="Ecuador">Ecuador</option>
                            <option value="Egypt">Egypt</option>
                            <option value="El Salvador">El Salvador</option>
                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                            <option value="Eritrea">Eritrea</option>
                            <option value="Estonia">Estonia</option>
                            <option value="Ethiopia">Ethiopia</option>
                            <option value="Fiji">Fiji</option>
                            <option value="Finland">Finland</option>
                            <option value="France">France</option>
                            <option value="Gabon">Gabon</option>
                            <option value="Gambia, The">Gambia, The</option>
                            <option value="Georgia">Georgia</option>
                            <option value="Germany">Germany</option>
                            <option value="Ghana">Ghana</option>
                            <option value="Greece">Greece</option>
                            <option value="Grenada">Grenada</option>
                            <option value="Guatemala">Guatemala</option>
                            <option value="Guinea">Guinea</option>
                            <option value="Guinea-Bissau">Guinea-Bissau</option>
                            <option value="Guyana">Guyana</option>
                            <option value="Haiti">Haiti</option>
                            <option value="Honduras">Honduras</option>
                            <option value="Hungary">Hungary</option>
                            <option value="Iceland">Iceland</option>
                            <option value="India">India</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Iran">Iran</option>
                            <option value="Iraq">Iraq</option>
                            <option value="Ireland">Ireland</option>
                            <option value="Israel">Israel</option>
                            <option value="Italy">Italy</option>
                            <option value="Jamaica">Jamaica</option>
                            <option value="Japan">Japan</option>
                            <option value="Jordan">Jordan</option>
                            <option value="Kazakhstan">Kazakhstan</option>
                            <option value="Kenya">Kenya</option>
                            <option value="Kiribati">Kiribati</option>
                            <option value="Korea, North">Korea, North</option>
                            <option value="Korea, South">Korea, South</option>
                            <option value="Kuwait">Kuwait</option>
                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                            <option value="Laos">Laos</option>
                            <option value="Latvia">Latvia</option>
                            <option value="Lebanon">Lebanon</option>
                            <option value="Lesotho">Lesotho</option>
                            <option value="Liberia">Liberia</option>
                            <option value="Libya">Libya</option>
                            <option value="Liechtenstein">Liechtenstein</option>
                            <option value="Lithuania">Lithuania</option>
                            <option value="Luxembourg">Luxembourg</option>
                            <option value="Macedonia">Macedonia</option>
                            <option value="Madagascar">Madagascar</option>
                            <option value="Malawi">Malawi</option>
                            <option value="Malaysia">Malaysia</option>
                            <option value="Maldives">Maldives</option>
                            <option value="Mali">Mali</option>
                            <option value="Malta">Malta</option>
                            <option value="Marshall Islands">Marshall Islands</option>
                            <option value="Mauritania">Mauritania</option>
                            <option value="Mauritius">Mauritius</option>
                            <option value="Mexico">Mexico</option>
                            <option value="Micronesia">Micronesia</option>
                            <option value="Moldova">Moldova</option>
                            <option value="Monaco">Monaco</option>
                            <option value="Mongolia">Mongolia</option>
                            <option value="Morocco">Morocco</option>
                            <option value="Mozambique">Mozambique</option>
                            <option value="Myanmar">Myanmar</option>
                            <option value="Namibia">Namibia</option>
                            <option value="Nauru">Nauru</option>
                            <option value="Nepa">Nepa</option>
                            <option value="Netherlands">Netherlands</option>
                            <option value="New Zealand">New Zealand</option>
                            <option value="Nicaragua">Nicaragua</option>
                            <option value="Niger">Niger</option>
                            <option value="Nigeria">Nigeria</option>
                            <option value="Norway">Norway</option>
                            <option value="Oman">Oman</option>
                            <option value="Pakistan">Pakistan</option>
                            <option value="Palau">Palau</option>
                            <option value="Panama">Panama</option>
                            <option value="Papua New Guinea">Papua New Guinea</option>
                            <option value="Paraguay">Paraguay</option>
                            <option value="Peru">Peru</option>
                            <option value="Philippines">Philippines</option>
                            <option value="Poland">Poland</option>
                            <option value="Portugal">Portugal</option>
                            <option value="Qatar">Qatar</option>
                            <option value="Romania">Romania</option>
                            <option value="Russia">Russia</option>
                            <option value="Rwanda">Rwanda</option>
                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                            <option value="Saint Lucia">Saint Lucia</option>
                            <option value="Saint Vincent">Saint Vincent</option>
                            <option value="Samoa">Samoa</option>
                            <option value="San Marino">San Marino</option>
                            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                            <option value="Saudi Arabia">Saudi Arabia</option>
                            <option value="Senegal">Senegal</option>
                            <option value="Serbia and Montenegro">Serbia and Montenegro</option>
                            <option value="Seychelles">Seychelles</option>
                            <option value="Sierra Leone">Sierra Leone</option>
                            <option value="Singapore">Singapore</option>
                            <option value="Slovakia">Slovakia</option>
                            <option value="Slovenia">Slovenia</option>
                            <option value="Solomon Islands">Solomon Islands</option>
                            <option value="Somalia">Somalia</option>
                            <option value="South Africa">South Africa</option>
                            <option value="Spain">Spain</option>
                            <option value="Sri Lanka">Sri Lanka</option>
                            <option value="Sudan">Sudan</option>
                            <option value="Suriname">Suriname</option>
                            <option value="Swaziland">Swaziland</option>
                            <option value="Sweden">Sweden</option>
                            <option value="Switzerland">Switzerland</option>
                            <option value="Syria">Syria</option>
                            <option value="Taiwan">Taiwan</option>
                            <option value="Tajikistan">Tajikistan</option>
                            <option value="Tanzania">Tanzania</option>
                            <option value="Thailand">Thailand</option>
                            <option value="Togo">Togo</option>
                            <option value="Tonga">Tonga</option>
                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                            <option value="Tunisia">Tunisia</option>
                            <option value="Turkey">Turkey</option>
                            <option value="Turkmenistan">Turkmenistan</option>
                            <option value="Tuvalu">Tuvalu</option>
                            <option value="Uganda">Uganda</option>
                            <option value="Ukraine">Ukraine</option>
                            <option value="United Arab Emirates">United Arab Emirates</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="United States">United States</option>
                            <option value="Uruguay">Uruguay</option>
                            <option value="Uzbekistan">Uzbekistan</option>
                            <option value="Vanuatu">Vanuatu</option>
                            <option value="Vatican City">Vatican City</option>
                            <option value="Venezuela">Venezuela</option>
                            <option value="Vietnam">Vietnam</option>
                            <option value="Yemen">Yemen</option>
                            <option value="Zambia">Zambia</option>
                            <option value="Zimbabwe">Zimbabwe</option>
                        </select>
                    </div>
                </div>
                <div class="form-group py-4">
                    <label class="control-label">Send me a catalog <span class="text-danger">*</span></label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="send_catalog" id="send_catalog_yes" value="1"
                            checked>
                        <label class="form-check-label" for="send_catalog_yes">
                            Yes
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="send_catalog" id="send_catalog_no" value="0">
                        <label class="form-check-label" for="send_catalog_no">
                            No
                        </label>
                    </div>
                </div>
                <div class="form-group row justify-content-center pt-4">
                    <button type="submit" name="btnSubmit" id="btnSubmit" class="btn button my-2">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.contact-form -->
        <div id="messageContainer"></div>
        <div class="on_site_service">
            <h3>On-site Service</h3>
            <div class="module">


                <div class="custom">
                    <p style="color: #7a2116;"><strong>Please Note: While SPC does not offer direct on-site service of
                            vehicles, our experienced techs are here to help answer any alignment questions you may have
                            through our email form and FAQ section.</strong></p>
                    <p>&nbsp;</p>
                </div>
            </div>
        </div>

    </div>
</div>
@section('scripts')
<script>
$(document).ready(function() {
    $('#contactForm').submit(function(e) {
        e.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData,
            success: function(response) {
                $('#messageContainer').html(
                    '<div class="alert alert-success">Message sent successfully!</div>'
                );
                window.location.reload();
            },
            error: function(xhr, status, error) {

                $('#messageContainer').html('<div class="alert alert-danger">' + xhr
                    .responseText + '</div>');
            }
        });
    });

    // Email validation
    $('#email').on('input', function() {
        var emailInput = $(this);
        var emailError = $('#emailError');
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!emailPattern.test(emailInput.val())) {
            emailError.text('Invalid email format. Please enter a valid email address.');
            emailError.css('display', 'inline');
        } else {
            emailError.text('');
            emailError.css('display', 'none');
        }
    });

    // Phone number validation
    $('#phone').on('input', function() {
        var phoneInput = $(this);
        var phoneError = $('#phoneError');
        var phoneNumber = phoneInput.val().replace(/\D/g, ''); // Remove non-numeric characters

        // Format phone number as XXX-XXX-XXXX
        if (phoneNumber.length > 0) {
            phoneNumber = phoneNumber.replace(/^(\d{3})?(\d{3})?(\d{4})?/, function(match, p1, p2,
                p3) {
                return [p1, p2, p3].filter(Boolean).join('-');
            });
        }

        phoneInput.val(phoneNumber);

        // Validate formatted phone number
        var phonePattern = /^\d{3}-\d{3}-\d{4}$/; // Customize as per your phone number format

        if (!phonePattern.test(phoneNumber)) {
            phoneError.text('Invalid phone number format. Please use XXX-XXX-XXXX.');
            phoneError.css('display', 'inline');
        } else {
            phoneError.text('');
            phoneError.css('display', 'none');
        }
    });
});
</script>
@endsection
@endsection