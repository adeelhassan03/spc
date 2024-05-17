<header class="hb-header fixed-top">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a href="{{ route('spc.index') }}">
            @if (empty($settings->general->logo))
                {{ $settings->general->name }}
            @else
                <img src="{{ asset('public/assets/images/logo/' . $settings->general->logo) }}"
                    class="img-fluid" alt="" style="top: 0px; height: 52px; width: auto;">
            @endif
        </a>
        <div class="d-lg-none d-block">
          <ul class="align-items-center hb-icon-box">
            <li>
              <a href="#">
                <svg fill="#000000" height="800px" width="800px" version="1.1" id="Capa_1" style="fill:#fff;"
                  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                  viewBox="0 0 495.003 495.003" xml:space="preserve">
                  <g id="XMLID_51_">
                    <path id="XMLID_53_" d="M164.711,456.687c0,2.966,1.647,5.686,4.266,7.072c2.617,1.385,5.799,1.207,8.245-0.468l55.09-37.616
		l-67.6-32.22V456.687z" />
                    <path id="XMLID_52_" d="M492.431,32.443c-1.513-1.395-3.466-2.125-5.44-2.125c-1.19,0-2.377,0.264-3.5,0.816L7.905,264.422
		c-4.861,2.389-7.937,7.353-7.904,12.783c0.033,5.423,3.161,10.353,8.057,12.689l125.342,59.724l250.62-205.99L164.455,364.414
		l156.145,74.4c1.918,0.919,4.012,1.376,6.084,1.376c1.768,0,3.519-0.322,5.186-0.977c3.637-1.438,6.527-4.318,7.97-7.956
		L494.436,41.257C495.66,38.188,494.862,34.679,492.431,32.443z" />
                  </g>
                </svg>
              </a>
            </li>
            <li>
              <a href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
`              </svg>
              </a>
            </li>
            <li>
              <a href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
              </a>
            </li>
            <li>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
            </li>
          </ul>
        </div>
        
        <div class="collapse navbar-collapse flex-column align-items-end w-75" id="navbarSupportedContent">
          <h2 class="nav-heading d-lg-block d-none">The World Leader in Alignment Parts, Tools & Education</h2>
          <div class="hb-form-box w-100">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 me-auto justify-content-end d-lg-flex d-none">
            
            <ul id="menuContainer" class="navbar-nav  mb-2 mb-lg-0 justify-content-end d-lg-flex d-none">
            </ul>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="https://spc.devstags.com/catalog">
                  Catalog
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  Vehicle
                </a>
                <div class="dropdown-menu hb-bg-trans-color" aria-labelledby="navbarDropdown">
                <form class="hb-search-menu">
                    <ul class="row">
                      <li class="col-2">
                          <select class="region">
                                <option value="value1">Region</option>
                                <option value="value2">1</option>
                                <option value="value3">2</option>
                                <option value="value4">3</option>
                            </select>
                        </li>
                        <li class="col-2">
                          <select class="region">
                                <option value="value1">Year</option>
                                <option value="value2">1</option>
                                <option value="value3">2</option>
                                <option value="value4">3</option>
                            </select>
                        </li>
                        <li class="col-2">
                          <select class="region">
                                <option value="value1">Make</option>
                                <option value="value2">1</option>
                                <option value="value3">2</option>
                                <option value="value4">3</option>
                            </select>
                        </li>
                        <li class="col-2">
                          <select class="region">
                                <option value="value1">Model</option>
                                <option value="value2">1</option>
                                <option value="value3">2</option>
                                <option value="value4">3</option>
                            </select>
                        </li>
                        <p class="col-2 mb-0">
                          <a href="#" class="btn button w-100">Search</a>
                        </p>
                    </ul>
                  </form>
                </div>
              </li>
              <li class="hb-search-box">
                <input type="text" id="hb-search" placeholder="Search by Part #" name="search">
                <label for="hb-search"><i class="fa fa-search"></i></label>
              </li>
              <li class="nav-item pe-0">
                <button type="submit" class="btn hb-btn">Search</button>
              </li>
            </ul>
            <div class="hb-mob-menu d-lg-none d-block">
              <ul class="navbar-nav">
                <li class="nav-item dropdown position-relative">
                  <div class="position-absolute hb-crose"><i id="hb-close" onclick="hb_close()"
                      class="fa fa-close float-end"></i></div>
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Products
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <div class="hb-inner-nav">
                      <ul>
                        <li><a href="https://www.w3schools.com/howto/tryit.asp?filename=tryhow_custom_select">Performance</a></li>
                        <li><a href="#">Alignment Parts</a></li>
                        <li><a href="#">Heavy Duty</a></li>
                        <li><a href="#">Tools & Accessories</a></li>
                        <li><a href="#">Race & Builders Components</a></li>
                        <li><a href="#">Jounce Shocks</a></li>
                        <li><a href="#">Brake & CV</a></li>
                        <li><a href="#">SPC Gear</a></li>
                        <li><a href="#">AlignGuide™</a></li>
                      </ul>
                    </div>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Training
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <div class="hb-inner-nav">
                      <ul>
                        <li><a href="#">Online Training</a></li>
                        <li><a href="#">InHouse Training</a></li>
                        <li><a href="#">Field Training</a></li>
                        <li><a href="#">Instructor Profiles</a></li>
                        <li><a href="#">Installer Resources</a></li>
                        <li><a href="#">Tech Articles</a></li>
                        <li><a href="#">FAQ’s</a></li>
                        <li><a href="#">Installation Videos</a></li>
                        <li><a href="#">Consumer Alignment Basics</a></li>
                      </ul>
                    </div>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="https://spc.devstags.com/catalog" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Catalog
                  </a>
                  
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Certified Installer Program
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Box Tops Program
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <div class="d-lg-none d-block hb-dark-txt">
      <h2 class="nav-heading">The World Leader in Aligment Parts, Tools & Education</h2>
    </div>
  </header>