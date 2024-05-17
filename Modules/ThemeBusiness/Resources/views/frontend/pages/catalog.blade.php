@extends('themebusiness::frontend.layouts.master')
@section('title')
    Catalog | {{ config('app.name') }}
@endsection

@section('main-content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf_viewer.css">
<div class="hb-product-detail-page">
@include('themebusiness::frontend.pages.partials.header_contact_banner')
  <main>
  @include('themebusiness::frontend.layouts.partials.messages')
    <section class="products-section catalog-sec">
      <div class="container">
        <div class="row">
          <div class="col">
            <h2 class="mt-2 mb-3 hb-product-heading col-md-12 col-sm-8 ms-0 ms-auto">Catalog</h2>
            <div class="products d-flex justify-content-md-start justify-content-center">
                @foreach($catalogData as $catalog)
                  <div class="product col-12 mb-2">
                      <div class="d-flex box flex-row align-items-center justify-content-md-start justify-content-center  flex-md-nowrap flex-wrap">
                          <div class="img my-2 col-lg-2 md-3">
                              <img src="{{ asset('public/assets/images/catalog/' . $catalog->image) }}" alt="{{ $catalog->title }}">
                          </div>
                          <div class="content col-lg-10 col-md-9 flex-md-nowrap flex-wrap">
                              <div class="heading">
                                  <h2>{{ $catalog->title }}</h2>
                                  <p>{!! $catalog->description !!}</p>
                                  <h2>Part No. {{ $catalog->part_no }}</h2>
                              </div>
                              <div class="hb-btn-box">
                                  @if($catalog->pdf)
                                      <!-- <a href="{{ asset('public/assets/pdf/catalog/' . $catalog->pdf) }}" class="btn button" onclick="openPdfInNewTab('{{ asset('public/assets/pdf/catalog/' . $catalog->pdf) }}')">Online Catalog</a> -->
                                      <a type="button" class="btn button" data-bs-toggle="modal" data-bs-target="#exampleModal">Order Now</a>
                                      <a href="{{ asset('public/assets/pdf/catalog/' . $catalog->pdf) }}" class="btn button" @if(!$catalog->pdf) style="display: none;" @endif download>Download PDF</a>
                                    
                                  @else
                                      <a type="button" class="btn button" data-bs-toggle="modal" data-bs-target="#exampleModal">Order Now</a>
                                  @endif
                              </div>
                          </div>
                      </div>
                  </div>
                @endforeach

            </div>
          </div>
        </div>
    </section>
    <section class="catalog-form-sec">
      <div class="container">
        <h3 class="my-3">If you want to order your new 2023 catalog and have it sent to you - please fill out the form
          below.</h3>
        <p class>Specialty Products takes your privacy seriously. For our complete privacy policy.</p>
        <button type="button" class="btn button" data-bs-toggle="modal" data-bs-target="#exampleModal">Order
          Now</button>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Catalog Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
    <form id="orderForm" method="post" action="{{ route('spc.order') }}">
        @csrf 
        <div class="row mb-4">
            <div class="col">
                <div class="form-outline">
                    <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First name" required/>
                </div>
            </div>
            <div class="col">
                <div class="form-outline">
                    <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last name" required/>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-6">
                <p class="m-0 mb-2 p-0">Are you a...?</p>
            </div>
            <div class="col-6">
                <div class="form-outline mb-2">
                    <input type="radio" id="technician" name="areYou" value="Technician" class="me-2" required >
                    <label for="technician">Technician</label>
                </div>
                <div class="form-outline mb-2">
                    <input type="radio" id="service_manager" name="areYou" value="Service Manager" class="me-2">
                    <label for="service_manager">Service Manager</label>
                </div>
                <div class="form-outline mb-2">
                    <input type="radio" id="owner" name="areYou" value="Owner" class="me-2">
                    <label for="owner">Owner</label>
                </div>
                <div class="form-outline mb-2">
                    <input type="radio" id="other" name="areYou" value="Other" class="me-2">
                    <label for="other">Other</label>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <label class="col-12 mb-2">Phone Number(shop):</label>
            <div class="col-4">
                <div class="form-outline">
                    <input type="number" id="shop_phone_area_code" name="shop_phone_area_code" class="form-control" placeholder="Area code" required/>
                </div>
            </div>
            <div class="col-8">
                <div class="form-outline">
                    <input type="tel" id="shop_phone_number" name="shop_phone_number" class="form-control" placeholder="Phone number(XXX-XXX-XXXX)" required/>
                </div>
            </div>
        </div>
        <div class="form-outline mb-4">
            <input type="email" id="email" name="email" class="form-control" placeholder="Email" required />
        </div>
        <div class="form-outline mb-4">
            <input type="text" id="company_name" name="company_name" class="form-control" placeholder="Company name" required/>
        </div>
        <div class="form-outline mb-4">
            <input type="text" id="address" name="address" class="form-control" placeholder="Address" required />
        </div>
        <div class="row mb-4">
            <div class="col-6">
                <div class="form-outline">
                    <input type="text" id="street" name="street" class="form-control" placeholder="Street" required/>
                </div>
            </div>
            <div class="col-6">
                <div class="form-outline">
                    <input type="text" id="state_province_region" name="state_province_region" class="form-control" placeholder="State / Province / Region" required/>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-6">
                <div class="form-outline">
                    <input type="text" id="postal_zip_code" name="postal_zip_code" class="form-control" placeholder="Postal / Zip Code" required/>
                </div>
            </div>
            <div class="col-6">
                <div class="form-outline">
                    <select id="country" name="country" class="form-select" aria-label="Default select example" required>
                        <option selected>Country</option>
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
        </div>
        <div class="row mb-4 align-items-center">
            <div class="col">
                <div class="form-outline">
                    <label for="byParts">I buy my parts from...</label>
                </div>
            </div>
            <div class="col">
                <div class="form-outline">
                    <input type="text" id="byParts" name="buy_parts_from" class="form-control" required/>
                </div>
            </div>
        </div>
        <div class="row mb-4 align-items-center">
            <div class="col-12">
                <p class="m-0 mb-2 p-0">Most of my alignment work is on:</p>
                <div class="form-outline mb-2">
                    <input type="checkbox" id="passenger_car_lt_truck" name="alignment_work_type[]" value="Passenger Car / Lt Truck" class="me-2" required>
                    <label for="passenger_car_lt_truck">Passenger Car / Lt Truck</label>
                </div>
                <div class="form-outline mb-2">
                    <input type="checkbox" id="modified_trucks" name="alignment_work_type[]" value="Modified Trucks" class="me-2">
                    <label for="modified_trucks">Modified Trucks</label>
                </div>
                <div class="form-outline mb-2">
                    <input type="checkbox" id="performance_racing" name="alignment_work_type[]" value="Performance / Racing" class="me-2">
                    <label for="performance_racing">Performance / Racing</label>
                </div>
                <div class="form-outline mb-2">
                    <input type="checkbox" id="heavy_duty_fleet" name="alignment_work_type[]" value="Heavy Duty / Fleet" class="me-2">
                    <label for="heavy_duty_fleet">Heavy Duty / Fleet</label>
                </div>
            </div>
        </div>
        <div class="row mb-4 align-items-center">
            <!-- <div class="col">
                <div class="form-outline">
                    <label for="captcha">Word Verification:</label>
                </div>
            </div>
            <div class="col">
                <div class="form-outline">
                    <input type="text" id="captcha" name="captcha" class="form-control" />
                </div>
            </div> -->
        </div>
        <div class="row align-items-center">
            <div class="col">
                <button type="submit" class="btn button w-100">Submit</button>
            </div>
            <div class="col">
        <a href="#" onclick="resetForm()" class="btn button btn-second w-100">Reset</a>
    </div>
        </div>
    </form>
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
            <p class="bottom-section-red"><span>These parts should only be installed by personal who have the necessary
                skill, training and
                tools to do the job correctly and safely.Incorrect installation can result in personal
                injury, vehicle damage and / or loss of vehicle control.</span></p>
            <h2 class="bottom-section-heading">ON-SITE SERVICE </h2>
            <p class="bottom-section-brown"><span>Please Note: While SPC does not offer direct on-site service of
                vehicles, our
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


<script>
  function openPdfInNewTab(pdfUrl) {
      window.open(pdfUrl, '_blank');
  }

  function resetForm() {
          document.getElementById("orderForm").reset(); 
      }

</script>