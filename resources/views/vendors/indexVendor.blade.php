@extends('ui_layout.main')
@section('contents')
<main class="main-content site-wrapper-reveal">

<!--== Start Team Divider Area ==-->
<section class="team-area team-divider-area">
  <div class="container-fluid pl-0 pr-0">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-title text-center">
          <h5 class="mb-3">30 years of SEO expertise</h5>
          <h2 class="title">Trusted Vendors</h2>
          <div class="desc">
            <!-- <p>From trust to dedication and integrity, we have selected vendors you can trust.</p> -->
          </div>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="team-content-area">
          <img src="assets/img/team/bg01.jpg" alt="Boseo-HasTech">
        </div>
      </div>
    </div>
  </div>
</section>
<!--== End Team Divider Area ==-->

<!--== Start Team Area ==-->
<section class="team-area">
  <div class="container pt-170 pt-md-100 pb-130 pb-md-60">
    <div class="row gutter-40">
      @forelse ($vendors as $vendor)
      <div class="col-sm-6 col-lg-4">
        <div class="team-member">
          <div class="thumb">
            <img src="assets/img/team/01.jpg" alt="Boseo-HasTech">
          </div>
          <div class="content">
            <div class="member-info">
              <h4 class="name"><a href="#/">{{$vendor->firstname}} {{$vendor->lastname}}</a></h4>
              <p class="designation">Lead Analyst</p>
            </div>
          </div>
          <a class="icon team-btn-active" href="#/">
            <img src="assets/img/icons/eye.png" alt="Icon-Image">
          </a>
          <div class="hover-content">
            <div class="member-info">
              <a class="icon team-btn-close" href="#/">
                <i class="lnr lnr-cross"></i>
              </a>
              <h4 class="name"><a href="#/">{{$vendor->firstname}} {{$vendor->lastname}}</a></h4>
              <p class="designation">Lead Analyst</p>
              <p class="desc">Seth has over 14 years of direct, hands-on internet marketing experi- ence. He has been the SEO Manager for a top interactive agency as well as several large e-commerce sites</p>
              <div class="social-icons">
                <a href="#"><i class="social social_facebook"></i></a>
                <a href="#"><i class="social social_twitter"></i></a>
                <a href="#"><i class="social social_vimeo"></i></a>
                <a href="#"><i class="social social_share"></i></a>
                <a href="#"><i class="social social_skype"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      @empty
        
      @endforelse
    </div>
  </div>
</section>
<!--== End Team Area ==-->
</main>
@endsection