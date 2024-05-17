@extends('themebusiness::frontend.layouts.master')
@section('title')
    Search Results | {{ config('app.name') }}
@endsection
@section('main-content')
<div class="hb-product-detail-page">
@include('themebusiness::frontend.pages.partials.header_contact_banner')
    <main class="search-result-main">
        <section class="table-section">
            <div class="container">
                <div class="hb-tbl-main mb-4">
                    <h2 class="my-3">APPLICATION SEARCH RESULTS</h2>
                    <div class="table-top">
                        <span>Make</span>
                        <span>Model</span>
                        <span>Sub Model</span>
                        <span>Year(s)</span>
                        <span>Drive Type</span>
                    </div>
                    <table class="hb-table">
                        <thead>
                            <tr>
                                <th class="w-10">Rear Camer</th>
                                <th>Rear Camer Tool</th>
                                <th>Rear Toe</th>
                                <th>Rear Toe Tool</th>
                                <th>Front Caster</th>
                                <th>Front Caster Tool</th>
                                <th>Front Camber</th>
                                <th>Front Camber Tool</th>
                                <th class="w-10">OE</th>
                                <th class="w-25">Notes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td data-label="Rear Camer">N/A</td>
                                <td data-label="Rear Camer Tool"></td>
                                <td data-label="Rear Toe">N/A</td>
                                <td data-label="Rear Toe Tool"></td>
                                <td data-label="Front Caster"><span class="hb-td-clr">47700(*)</span>,<br><span class="hb-td-clr"> 95336(22)</span>,<span class="hb-td-clr"> 97302</span></td>
                                <td data-label="Front Caster Tool"> </td>
                                <td data-label="Front Camber"><span class="hb-td-clr"> 47700(*)</span>,<span class="hb-td-clr"> 97140<span></td>
                                <td data-label="Front Camber Tool"> </td>
                                <td data-label="OE"> </td>
                                <td data-label="Notes"><span class="hb-td-clr">4390</span> , Pro Springs Avaiable,<br><span class="hb-td-clr"> 94006</span>, repl upper ball joint,<br><span class="hb-td-clr"> 94011</span>, lower joint</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <section class="new-letter py-5 ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-md-12 col-12">
                        <h3>DON'T SEE A PART FOR THE VEHICLE YOU ARE SEARCHING?</h3>
                        <p class="pb-2">Specialty Products is always looking for suggestions from Alignment professionals, Let us know what you are working on and what parts you need to be more productive.</p>
                            <button type="submit" class="btn button m-auto">Part Request</button>
                    </div>
                </div>
            </div>
        </section>
        <section class="footnotes-section">
            <div class="container">
                <div class="row mx-0">
                    <h2 class="my-3 ps-0">ALIGNMENT FOOTNOTES:</h2>
                    <div class="content pt-md-3 pb-md-5 pb-3 ps-0">
                        <p class="m-0"><b>N/A = No Avaiable Adjuster</b></p>
                        <p class="m-0"><b>(*) = Series P/N - View serires for correct  size</b></p>
                    </div>
                    <div class="row px-0">
                    <div class="col-md-4 col-12">
                        <ul class="d-block py-4 hb-border">
                            <li><b>(1)</b> CAUTION: Check for caliper to rotor clear - ance with disc brakes. Use spacer set <span>75970 </span>as necessary to keep caliper centered on rotor. </li>
                            <li><b>(2)</b> All except RWD 1500 and LD2500 (7200 GVWR).</li>
                            <li><b>(3)</b> Honda S2000 Ball Joint - Rear Application - Only for 17" rims or larger.</li>
                            <li><b>(4)</b> Check Bolt Length BEFORE Cutting Hole</li>
                            <li><b>(5)</b> Shims</li>
                            <li><b>(6)</b> LH Tie Rod Adjusting Sleeve Replacement</li>
                            <li><b>(7)</b> Bolts, <span>73415</span>  , are necessary for changes greater than 3/4° </li>
                            <li><b>(8)</b> Recommended for vehicles lowered more than 1.5</li>
                            <li><b>(9)</b> Will not work on 1988-89 models with welded-in ball joint</li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-12">
                        <ul class="d-block bor hb-border py-4">
                            <li><b>(10)</b> M3 Only, caster will decrease by 2 degrees. </li>
                            <li><b>(11)</b> Pinion Angle Adj. Part No. <span>82370</span></li>
                            <li><b>(12)</b> Limited camber range of +/-1.0°</li>
                            <li><b>(13)</b>  Center stock camber and toe adjusters before calculating shim change</li>
                            <li><b>(14)</b>  <span>69330 </span> or <span>69330 </span> included w/ <span>69400</span> </li>
                            <li><b>(15)</b> Not for use w/disc brakes</li>
                            <li><b>(16)</b> Can be used for Caster or Pinion Angle</li>
                            <li><b>(17)</b> Footnotes 1 and 13</li>
                            <li><b>(18)</b> Preferred</li>
                            <li><b>(19)</b> Rear Pinion Angle</li>
                            <li><b>(20)</b> Except Sti</li>
                            <li><b>(21)</b> Series P/N, Not for use with ABS </li>
                            <li><b>(22)</b> Lower Arm </li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-12">
                        <ul class="d-block bor pb-md-0 py-4 mb-3 mb-md-0">
                            <li><b>(23)</b> Except Type R Lower Arm</li>
                            <li><b>(24)</b> Rear Wheel Drive Only</li>
                            <li><b>(25)</b> 92-96 Only</li>
                            <li><b>(26)</b> 92-98 Only</li>
                            <li><b>(27)</b> C10 and C15</li>
                            <li><b>(28)</b> Footnote 1, include the next part number</li>
                            <li><b>(29)</b> Include the next part number</li>
                            <li><b>(30)</b> With 10mm Bolt</li>
                            <li><b>(31)</b> With 12mm Bolt</li>
                            <li><b>(32)</b> All Except AMG models</li>
                            <li><b>(33)</b> 1988-91 1500-43mm Bushings ONLY</li>
                            <li><b>(34)</b> Models equipped with taller hydraulic bushings must be pressed out and reused from the original control arm or the <span>72360</span> trailling link can be used if applied.</li>
                            <li><b>(35)</b> Except stamped sheet metal upper control arms</li>
                            <li><b>(36)</b> Without Front Ride Height Sensor </li>
                            <li><b>(SW)</b> Station Wagon </li>
                            <li><b>(L)</b> Lower </li>
                        </ul>
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
`       </section>
    </main>
</div>
@endsection