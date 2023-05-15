<x-dashboard-layout>
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card">
                        <div class="card-aside-wrap">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head nk-block-head-lg">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h4 class="nk-block-title">{{$title}}</h4>
                                            <div class="nk-block-des">
                                                <p>{{$subtitle}}</p>
                                            </div>
                                        </div>
                                        <div class="nk-block-head-content align-self-start d-lg-none">
                                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                        </div>
                                    </div>
                                </div>

                                {{$slot}}

                            </div>
                            <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                                <div class="card-inner-group" data-simplebar>
                                    <div class="card-inner">
                                        <div class="user-card">
                                            <div class="user-avatar bg-primary">
                                                @if (isset($user->image))
                                                    <img src="{{$user->image}}" alt="">
                                                @else                                                
                                                    <span>AB</span>
                                                @endif
                                            </div>
                                            <div class="user-info">
                                                <span class="lead-text">{{$user->firstname}} {{$user->lastname}}</span>
                                                <span class="sub-text">{{$user->email}}</span>
                                            </div>
                                            <div class="user-action">
                                                <div class="dropdown">
                                                    <a class="btn btn-icon btn-trigger mr-n2" data-toggle="dropdown" href="#"><em class="icon ni ni-more-v"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li><a href="#"><em class="icon ni ni-camera-fill"></em><span>Change Photo</span></a></li>
                                                            <li><a href="#"><em class="icon ni ni-edit-fill"></em><span>Update Profile</span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .user-card -->
                                    </div><!-- .card-inner -->
                                    <div class="card-inner">
                                        <div class="user-account-info py-0">
                                            <h6 class="overline-title-alt">Account Balance</h6>
                                            <div class="user-balance"><small class="currency currency-btc">$</small> {{$user->wallet->main_bal}}</div>
                                            <!-- <div class="user-balance-sub">Main Balance: <span>$ {{$user->wallet->main_bal}}</span></div> -->
                                        </div>
                                    </div><!-- .card-inner -->
                                    <div class="card-inner p-0">
                                        <ul class="link-list-menu">
                                            <li><a class="active" href="{{route('profile.edit')}}"><em class="icon ni ni-user-c"></em><span>Personal Infomation</span></a></li>
                                            <li><a href="{{route('profile.wallet')}}"><em class="icon ni ni-wallet"></em><span>Wallet</span></a></li>
                                            <li><a href="{{route('profile.referral')}}"><em class="icon ni ni-users"></em><span>Referrals</span></a></li>
                                            <li><a href="html/user-profile-setting.html"><em class="icon ni ni-lock-alt-fill"></em><span>Security Settings</span></a></li>
                                        </ul>
                                    </div><!-- .card-inner -->
                                </div><!-- .card-inner-group -->
                            </div><!-- card-aside -->
                        </div><!-- .card-aside-wrap -->
                    </div><!-- .card -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>

    @push('modals')
        <div class="modal fade" tabindex="-1" role="dialog" id="profile-edit">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                    <div class="modal-body modal-body-lg">
                        <form action="{{route('profile.update')}}" method="POST" >
                            @csrf()

                            <h5 class="title mb-3">Update Profile</h5>
                            <div class="mb-3">
                                <p class="mb-2 fs-16px">Personal Information</p>
                                <div class="row gy-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="firstname">First Name</label>
                                            <input type="text" class="form-control form-control-lg" id="firstname" name="firstname" value="{{$user->firstname}}" placeholder="Enter First name">
                                            <x-input-error key="firstname" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="lastname">Last Name</label>
                                            <input type="text" class="form-control form-control-lg" id="lastname" name="lastname" value="{{$user->lastname}}" placeholder="Enter Last name">
                                            <x-input-error key="lastname" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="email">Email Address</label>
                                            <input type="text" class="form-control form-control-lg" id="email" name="email" value="{{$user->email}}" placeholder="Email Address">
                                            <x-input-error key="email" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="phone">Phone Number</label>
                                            <input type="text" class="form-control form-control-lg" id="phone" name="phone" value="{{$user->phone}}" placeholder="Phone Number">
                                            <x-input-error key="phone" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">   
                                <p class="mb-2 fs-16px">Social Media Handles</p>
                                
                                <div class="row gy-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="facebook">Facebook Username</label>
                                            <input type="text" class="form-control form-control-lg" name="facebook" id="facebook"  placeholder="Facebook">
                                            <x-input-error key="facebook" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="twitter">Twitter Username</label>
                                            <input type="text" class="form-control form-control-lg" id="twitter" name="twitter" value="{{$user->twitter}}" placeholder="Twitter">
                                            <x-input-error key="twitter" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="instagram">Instagram Username</label>
                                            <input type="text" class="form-control form-control-lg" id="instagram" name="instagram" value="{{$user->instagram}}" placeholder="Instagram">
                                            <x-input-error key="instagram" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="tiktok">Tiktok Username</label>
                                            <input type="text" class="form-control form-control-lg" id="tiktok" value="{{$user->tiktok}}" name="tiktok" placeholder="Tiktok">
                                            <x-input-error key="tiktok" />
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                <li>
                                    <button class="btn btn-lg btn-primary">Update Profile</button>
                                </li>
                                <li>
                                    <a href="#" data-dismiss="modal" class="link link-light">Cancel</a>
                                </li>
                            </ul>
                        </form>
                    </div><!-- .modal-body -->
                </div><!-- .modal-content -->
            </div><!-- .modal-dialog -->
        </div><!-- .modal -->
    @endpush
</x-dashboard-layout>