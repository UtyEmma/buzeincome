@extends('ui_layout.main')
@section('contents')

<main class="main-content site-wrapper-reveal">
    <!--== Start Contact Map Area ==-->
    <!-- <div class="contact-map-area">
        <div id="map_content" class="h-100" data-lat="-37.8174713" data-lng="144.9591896" data-zoom="18"></div>
    </div> -->
    <!--== End Contact Map Area ==-->

    <!--== Start Contact Form Area Wrapper ==-->
    <section class="contact-form-area">
      <div class="container pb-40">
        <div class="row">
          <!-- <div class="col-md-3">
            <h2 class="title mb-md-50">INFORMATION</h2>
            <ul class="contact-info-item info-item-style2">
              <li class="info-address-title"><span>London,</span> United Kingdom</li>
              <li class="info-address">258 Orchad St, London, United</li>
              <li class="info-address">Kingdom</li>
              <li class="info-mail">sayhello@boseo.com</li>
              <li class="info-phone">(605) 230-5253</li>
            </ul>
          </div> -->
          <div class="col-lg-8 offset-lg-1">
            <h2 class="title">Get In Touch</h2>
            <div class="contact-form-content">
              <form id="contact-form" action="https://whizthemes.com/mail-php/other/mail.php" method="post">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input class="form-control" type="text" name="con_name" placeholder="Enter your name">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input class="form-control" type="email" name="con_email" placeholder="Enter your email">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <textarea name="con_message" placeholder="Message"></textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group mb-0">
                      <button class="btn btn-theme" type="submit">Send Message</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <!-- Message Notification -->
            <div class="form-message"></div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Contact Form Area Wrapper ==-->
  </main>

  @endsection