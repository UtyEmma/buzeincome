<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from htmldemo.net/boseo/boseo/index-digital-marketer.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 May 2023 20:36:28 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>{{config('global.sitename')}}</title>

    <!--== Favicon ==-->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon" />

    <!--== Google Fonts ==-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,700" rel="stylesheet">

    <!--== Bootstrap Min CSS ==-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
    <!--== Font Awesome Min CSS ==-->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet"/>
    <!--== ElegantIcons CSS ==-->
    <link href="assets/css/elegantIcons.css" rel="stylesheet"/>
    <!--== Linearicons CSS ==-->
    <link href="assets/css/linearicons.css" rel="stylesheet"/>
    <!--== Animate CSS ==-->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>
    <!--== Countdown CSS ==-->
    <link href="assets/css/jquery.countdown.css" rel="stylesheet"/>
    <!--== Leaflet CSS ==-->
    <link href="assets/css/leaflet.css" rel="stylesheet"/>
    <!--== Owl Carousel CSS ==-->
    <link href="assets/css/owl-carousel.css" rel="stylesheet"/>
    <!--== Owl Theme CSS ==-->
    <link href="assets/css/owl-theme.css" rel="stylesheet"/>
    <!--== Slick Slider CSS ==-->
    <link href="assets/css/slick-slider.css" rel="stylesheet"/>
    <!--== Fancybox CSS ==-->
    <link href="assets/css/fancybox.css" rel="stylesheet"/>

    <!--== Main Style CSS ==-->
    <link href="assets/css/style.css" rel="stylesheet" />

</head>

<body>

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
  <header class="header-area transparent header-transparent header-right-align sticky-header">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 col-xl-12 col-grid">
          <div class="header-right">
            <div class="header-logo-area">
              <a href="index.html">
                <img class="logo-main" src="assets/img/logo.png" alt="Logo" />
                <img class="logo-light" src="assets/img/logo.png" alt="Logo" />
              </a>
            </div>
            <div class="header-navigation-area">
              <ul class="main-menu nav justify-content-center">
                <li class="has-submenu active"><a href="/">Home</a>
                  <ul class="submenu-nav">
                    <li><a href="/">How It Works</a></li>
                  </ul>
                </li>
                <li><a href="/vendors">Coupon Vendors</a>
                </li>
                <li><a href="/verify-coupon">Verify Coupon</a></li>
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
              <!-- <div class="header-contact-info">
                <span>{{config('global.site_phone1')}}</span>
                <span>{{config('global.site_email1')}}</span>
              </div> -->
              
              <!-- <a class="btn-theme" href="#/">Dashboard</a>
              <a class="btn-theme" href="#/">Register</a>
              <a class="btn-theme" href="#/">Login</a> -->
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