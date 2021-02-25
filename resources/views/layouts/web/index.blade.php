<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="author" content="M_Adnan" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Document Title -->
        <title>Smart Tech - Ecommerce HTML5 Template</title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/web/images/products/favicon.ico') }}" type="image/x-icon">
        <link rel="icon" href="{{ asset('assets/web/images/products/favicon.ico') }}" type="image/x-icon">

        <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/web/css/rs-plugin/css/settings.css') }}" media="screen" />

        <!-- StyleSheets -->
        <link rel="stylesheet" href="{{ asset('assets/web/css/system/ionicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/web/css/system/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/web/css/system/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/web/css/system/main.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/web/css/system/style.css') }}">
        {{-- <link rel="stylesheet" href="{{ asset('assets/css/owlcarousel/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/owlcarousel/owl.theme.default.min.css') }}"> --}}
        <link rel="stylesheet" href="{{ asset('assets/web/css/system/responsive.css') }}">
        <link rel="stylesheet" href="{{ mix('assets/web/css/custom/web.css') }}">

        <!-- Fonts Online -->
        <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
        <!-- JavaScripts -->
        <script src="{{ asset('assets/js/vendors/modernizr.js') }}"></script>
        <script>
          window.web = {!! json_encode([
                'api_url' => config('common.api_url'),
            ]) !!};
        </script>
    </head>
    <body>

    <!-- Page Wrapper -->
    <div id="wrap" class="layout-1"> 
    
    <!-- Top bar -->
    <div class="top-bar" id="top-bar">
        <div class="container">
        <p>Welcome to Technology Shop!</p>
        <div class="right-sec">
            <ul>
            <li><a href="#.">Store Location </a></li>
            <li><a href="#.">FAQ </a></li>
            <li><a href="#.">Newsletter </a></li>
            <li>
                <select class="selectpicker">
                <option>French</option>
                <option>German</option>
                <option>Italian</option>
                <option>Japanese</option>
                </select>
            </li>
            <li>
                <select class="selectpicker">
                <option>(USD)Dollar</option>
                <option>GBP</option>
                <option>Euro</option>
                <option>JPY</option>
                </select>
            </li>
            </ul>
            <div class="social-top">
              @if(!Auth::check())
              <div class="login-with" id="login-with">Login with </div>
              <a href="{{ route('login.index') }}" id="login-line">
                <img class="line_login_icon" src="{{ asset('assets/web/images/login/line.jpg') }}" alt="" >
              </a>

              <div>Register</div>
              @else
                <div class="welcome" id="welcome-user">Welcome, {{ Auth::user()->username }} </div>
              @endif
             
              {{-- <a href="#."><i class="fab fa-line"></i></a> 
              <a href="#."><i class="fa fa-facebook"></i></a>
              <a href="#."><i class="fa fa-twitter"></i></a> 
              <a href="#."><i class="fa fa-linkedin"></i></a> 
              <a href="#."><i class="fa fa-dribbble"></i></a> 
              <a href="#."><i class="fa fa-pinterest"></i></a> --}}
              
            </div>
            @if(Auth::check())
            <a href="{{ route('logout') }}" class="logout">Log Out</a>
          @endif
        </div>
        </div>
    </div>
    
    <!-- Header -->
    <header>
      <div class="container">
        <div class="logo"> <a href="{{ route('web.index') }}"><img src="{{ asset('assets/web/images/products/logo.png') }}" alt="" ></a> </div>
        <div class="search-cate">
          <form method="POST" action="{{ route('list_products') }}">
            {{ csrf_field() }}
                <select class="selectpicker">
                  <option> All Categories</option>
                  <option> Home Audio & Theater</option>
                  <option> TV & Video</option>
                  <option> Camera, Photo & Video</option>
                  <option> Cell Phones & Accessories</option>
                  <option> Headphones</option>
                  <option> Video Games</option>
                  <option> Bluetooth & Wireless </option>
                  <option> Gaming Console</option>
                  <option> Computers & Tablets</option>
                  <option> Monitors </option>
                </select>
                <input type="search" placeholder="Search entire store here...">
                <button class="submit" type="submit"><i class="icon-magnifier"></i></button>

          </form>
        </div>
        <!-- Cart Part -->
        @if(Auth::check())
        <ul class="nav navbar-right cart-pop">
            <li class="dropdown"> 
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <span class="itm-cont">3</span>
                 <i class="flaticon-shopping-bag"></i> 
                 <strong>My Cart</strong> <br>
              <span>3 item(s) - $500.00</span></a>
              <ul class="dropdown-menu">
                  <li>
                  <div class="media-left"> <a href="#." class="thumb"> <img src="{{ asset('assets/web/images/products/item-img-1-1.jpg') }}" class="img-responsive" alt="" > </a> </div>
                  <div class="media-body"> <a href="#." class="tittle">Funda Para Ebook 7" 128GB full HD</a> <span>250 x 1</span> </div>
                  </li>
                  <li>
                  <div class="media-left"> <a href="#." class="thumb"> <img src="{{ asset('assets/web/images/products/item-img-1-2.jpg') }}" class="img-responsive" alt="" > </a> </div>
                  <div class="media-body"> <a href="#." class="tittle">Funda Para Ebook 7" full HD</a> <span>250 x 1</span> </div>
                  </li>
                  <li class="btn-cart"> <a href="#." class="btn-round">View Cart</a> </li>
              </ul>
            </li>
        </ul>
        @endif
      </div>
        
        <!-- Nav -->
        <nav class="navbar ownmenu">
          <div class="container"> 
              
              <!-- Categories -->
              {{-- <div class="cate-lst"> 
                <a  data-toggle="collapse" class="cate-style" href="#cater"><i class="fa fa-list-ul"></i> Our Categories </a>
                <div class="cate-bar-in">
                    <div id="cater" class="collapse">
                    <ul>
                        <li><a href="#."> Home Audio & Theater</a></li>
                        <li><a href="#."> TV & Video</a></li>
                        <li><a href="#."> Camera, Photo & Video</a></li>
                        <li class="sub-menu"><a href="#."> Cell Phones & Accessories</a>
                            <ul>
                            <li><a href="#."> TV & Video</a></li>
                            <li><a href="#."> Camera, Photo & Video</a></li>
                            <li><a href="#."> Cell Phones & Accessories</a>
                            </ul>
                        </li>
                        <li><a href="#."> Headphones</a></li>
                        <li><a href="#."> Video Games</a></li>
                        <li class="sub-menu"><a href="#."> Bluetooth & Wireless Speakers</a>
                            <ul>
                            <li><a href="#."> TV & Video</a></li>
                            <li><a href="#."> Camera, Photo & Video</a></li>
                            <li><a href="#."> Cell Phones & Accessories</a>
                            </ul>
                        </li>
                        <li class="sub-menu"><a href="#."> Gaming Console</a>
                            <ul>
                            <li><a href="#."> TV & Video</a></li>
                            <li><a href="#."> Camera, Photo & Video</a></li>
                            <li><a href="#."> Cell Phones & Accessories</a>
                            </ul>
                        </li>
                        <li><a href="#."> Computers & Tablets</a></li>
                        <li><a href="#."> Monitors</a></li>
                        <li><a href="#."> Home Appliances</a></li>
                        <li><a href="#."> Office Supplies</a></li>
                        </ul>
                    </div>
                </div>
              </div> --}}
              
              <!-- Navbar Header -->
            <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-open-btn" aria-expanded="false"> <span><i class="fa fa-navicon"></i></span> </button>
            </div>
            <!-- NAV -->
            <div class="big-nsv" id="category-nav">
              <div class="container">
                @php
                  $arrIcon = [
                    'flaticon-gamepad-1',
                    'flaticon-smartphone',
                    'flaticon-laptop',
                    'flaticon-computer',
                    'flaticon-computer-1',
                    'flaticon-keyboard'
                  ];
                @endphp
    
                <ul class="nav" >
                  @foreach($categoryComposers as $key => $category)
                    <li class="dropdown"><a href="#" class="category" data-toggle="dropdown"><i class="{{ $arrIcon[$key] }}"></i>{{ $category->name }}</a>
                      @if($category->subCategories->count())
                        <ul class="dropdown-menu multi-level animated-2s fadeInUpHalf">
                          @foreach($category->subCategories as $subCategory)
                            <li><a href="About.html" class="sub-category"> {{ $subCategory->name }} </a></li>
                          @endforeach
                          {{-- <li class="dropdown-submenu"><a href="#."> Dropdown Level </a>
                            <ul class="dropdown-menu animated-2s fadeInRight">
                              <li><a href="#.">Level 1</a></li>
                            </ul>
                          </li> --}}
                        </ul>
                      @endif
                    </li>
                  @endforeach
                  
                </ul>
              </div>
            </div>
          </div>
        </nav>
    </header>
    @yield('content')
    <footer>
        <div class="container"> 
          
          <!-- Footer Upside Links -->
          <div class="foot-link">
            <ul>
              <li><a href="#."> About us </a></li>
              <li><a href="#."> Customer Service </a></li>
              <li><a href="#."> Privacy Policy </a></li>
              <li><a href="#."> Site Map </a></li>
              <li><a href="#."> Search Terms </a></li>
              <li><a href="#."> Advanced Search </a></li>
              <li><a href="#."> Orders and Returns </a></li>
              <li><a href="#."> Contact Us</a></li>
            </ul>
          </div>
          <div class="row"> 
            
            <!-- Contact -->
            <div class="col-md-4">
              <h4>Contact SmartTech!</h4>
              <p>Address: 45 Grand Central Terminal New York, NY 1017
                United State USA</p>
              <p>Phone: (+100) 123 456 7890</p>
              <p>Email: Support@smarttech.com</p>
              <div class="social-links"> <a href="#."><i class="fa fa-facebook"></i></a> <a href="#."><i class="fa fa-twitter"></i></a> <a href="#."><i class="fa fa-linkedin"></i></a> <a href="#."><i class="fa fa-pinterest"></i></a> <a href="#."><i class="fa fa-instagram"></i></a> <a href="#."><i class="fa fa-google"></i></a> </div>
            </div>
            
            <!-- Categories -->
            <div class="col-md-3">
              <h4>Categories</h4>
              <ul class="links-footer">
                <li><a href="#.">Home Audio & Theater</a></li>
                <li><a href="#."> TV & Video</a></li>
                <li><a href="#."> Camera, Photo & Video</a></li>
                <li><a href="#."> Cell Phones & Accessories</a></li>
                <li><a href="#."> Headphones</a></li>
                <li><a href="#."> Video Games</a></li>
                <li><a href="#."> Bluetooth & Wireless</a></li>
              </ul>
            </div>
            
            <!-- Categories -->
            <div class="col-md-3">
              <h4>Customer Services</h4>
              <ul class="links-footer">
                <li><a href="#.">Shipping & Returns</a></li>
                <li><a href="#."> Secure Shopping</a></li>
                <li><a href="#."> International Shipping</a></li>
                <li><a href="#."> Affiliates</a></li>
                <li><a href="#."> Contact </a></li>
              </ul>
            </div>
            
            <!-- Categories -->
            <div class="col-md-2">
              <h4>Information</h4>
              <ul class="links-footer">
                <li><a href="#.">Our Blog</a></li>
                <li><a href="#."> About Our Shop</a></li>
                <li><a href="#."> Secure Shopping</a></li>
                <li><a href="#."> Delivery infomation</a></li>
                <li><a href="#."> Store Locations</a></li>
                <li><a href="#."> FAQs</a></li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
      
      <!-- Rights -->
      <div class="rights">
        <div class="container">
          <div class="row">
            <div class="col-sm-6">
              <p>Copyright © 2017 <a href="#." class="ri-li"> SmartTech </a>HTML5 template. All rights reserved</p>
            </div>
            <div class="col-sm-6 text-right"> <img src="{{ asset('assets/web/images/products/card-icon.png') }}" alt=""> </div>
          </div>
        </div>
      </div>
      
      <!-- End Footer --> 
      
      <!-- GO TO TOP  --> 
      <a href="#" class="cd-top"><i class="fa fa-angle-up"></i></a> 
      <!-- GO TO TOP End --> 
    </div>
    <!-- End Page Wrapper --> 
    
    <!-- JavaScripts --> 
    <script src="{{ asset('assets/js/vendors/jquery/jquery.min.js') }}"></script> 
    <script src="{{ asset('assets/js/vendors/wow.min.js') }}"></script> 
    <script src="{{ asset('assets/js/vendors/bootstrap.min.js') }}"></script> 
    <script src="{{ asset('assets/js/vendors/own-menu.js') }}"></script> 
    <script src="{{ asset('assets/js/vendors/jquery.sticky.js') }}"></script> 
    <script src="{{ asset('assets/js/vendors/owl.carousel.min.js') }}"></script> 
    
    <!-- SLIDER REVOLUTION 4.x SCRIPTS  --> 
    <script type="text/javascript" src="{{ asset('assets/web/css/rs-plugin/js/jquery.tp.t.min.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('assets/web/css/rs-plugin/js/jquery.tp.min.js') }}"></script> 
    <script src="{{ asset('assets/web/js/main.js') }}"></script>
    @yield('web.script')
    <script src="{{ mix('js/web.js') }}" type="text/javascript"></script> 
    </body>
    
    <!-- Mirrored from event-theme.com/themes/html/smarttech/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Jan 2018 03:27:23 GMT -->
</html>