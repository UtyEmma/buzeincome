<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from htmldemo.net/boseo/boseo/index-digital-marketer.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 May 2023 20:36:28 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>{{config('global.sitename')}}</title>

    <!--== Favicon ==-->
    <link rel="shortcut icon" href="./images/fav-icon.png" type="image/x-icon" />

    <!--== Google Fonts ==-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,700" rel="stylesheet">


    <!--== Bootstrap Min CSS ==-->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <!--== Font Awesome Min CSS ==-->
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet"/>
    <!--== ElegantIcons CSS ==-->
    <link href="{{ asset('assets/css/elegantIcons.css') }}" rel="stylesheet"/>
    <!--== Linearicons CSS ==-->
    <link href="{{ asset('assets/css/linearicons.css') }}" rel="stylesheet"/>
    <!--== Animate CSS ==-->
    <link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet"/>
    <!--== Countdown CSS ==-->
    <link href="{{ asset('assets/css/jquery.countdown.css') }}" rel="stylesheet"/>
    <!--== Leaflet CSS ==-->
    <link href="{{ asset('assets/css/leaflet.css') }}" rel="stylesheet"/>
    <!--== Owl Carousel CSS ==-->
    <link href="{{ asset('assets/css/owl-carousel.css') }}" rel="stylesheet"/>
    <!--== Owl Theme CSS ==-->
    <link href="{{ asset('assets/css/owl-theme.css') }}" rel="stylesheet"/>
    <!--== Slick Slider CSS ==-->
    <link href="{{ asset('assets/css/slick-slider.css') }}" rel="stylesheet"/>
    <!--== Fancybox CSS ==-->
    <link href="{{ asset('assets/css/fancybox.css') }}" rel="stylesheet"/>

    
   

    <!--== Main Style CSS ==-->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    

    
</head>

<body>

<!--wrapper start-->
<div class="wrapper">

<!--wrapper start-->
<div class="wrapper home-digital-marketer-wrapper">

  <!--== Start Preloader Content ==-->
  <div class="preloader-wrap">
    <div class="preloader">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!--== End Preloader Content ==-->

  <!--== Start Header Wrapper ==-->
  <header class="header-area header-right-align header-style sticky-header">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-7 col-sm-7 col-lg-2">
              <div class="header-logo-area">
                <a href="/">
                  <img
                    class="logo-main"
                    src="{{ asset('assets/img/brizzlentLogo.png') }}"
                    alt="Logo"
                  />
                  <img
                    class="logo-light"
                    src="{{ asset('assets/img/brizzlentLogo.png') }}"
                    alt="Logo"
                  />
                </a>
              </div>
            </div>
            <div class="col-5 col-sm-5 col-lg-10">
              <div class="header-right">
                <div class="header-navigation-area">
                  <ul class="main-menu nav justify-content-center">
                    <li class="has-submenu active"><a href="/">Home</a>
                      <ul class="submenu-nav">
                        <li><a href="/how-it-works">How It Works</a></li>
                      </ul>
                    </li>
                    <li><a href="{{route('vendors')}}">Coupon Vendors</a>
                    </li>
                    <li><a href="{{route('verifyCoupon')}}">Verify Coupon</a></li>
                    <li><a href="contact-us">Contact</a></li>
    
                    @if (Auth()->check())
                    <li><a href="dashboard">Dashboard</a></li>
                    @else
                    <li><a href="login">Login</a></li>
                    <li><a href="register">Register</a></li>
                    @endif
    
                  </ul>
                </div>
                <div class="header-action-area">
                  <!-- <button class="btn-search">
                    <span class="icon-search lnr lnr-magnifier"></span>
                    <span class="icon-search-close lnr lnr-cross"></span>
                  </button>
                  <div class="btn-search-content">
                    <form action="#" method="post">
                      <div class="form-input-item">
                        <label for="search" class="sr-only">Search...</label>
                        <input
                          type="text"
                          id="search"
                          placeholder="Search..."
                        />
                        <button type="submit" class="btn-src">
                          <i class="lnr lnr-magnifier"></i>
                        </button>
                      </div>
                    </form>
                  </div> -->

                  @if (Auth()->check())
                  <a class="btn-theme" href="/wallet">View Earnings</a>
                  @else
                  <a class="btn-theme" href="/login">Start Earning</a>
                  @endif
                  <button class="btn-menu d-lg-none">
                    <span></span>
                    <span></span>
                    <span></span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>
  <!--== End Header Wrapper ==-->