<div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a href="html/index.html" class="logo-link nk-sidebar-logo">
                <img class="logo-light logo-img" src="./images/logo.png" srcset="./images/logo2x.png 2x" alt="logo">
                <img class="logo-dark logo-img" src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
                <img class="logo-small logo-img logo-img-small" src="./images/logo-small.png" srcset="./images/logo-small2x.png 2x" alt="logo-small">
            </a>
        </div>
        <div class="nk-menu-trigger mr-n2">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
            <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
        </div>
    </div><!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar="init"><div class="simplebar-wrapper" style="margin: -16px 0px -40px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 16px 0px 40px;">
                <ul class="nk-menu">
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Dashboards</h6>
                    </li>
                    <li class="nk-menu-item active current-page">
                        <a href="{{route('dashboard')}}" class="nk-menu-link" data-original-title="" title="">
                            <span class="nk-menu-icon"><em class="icon ni ni-home-alt"></em></span>
                            <span class="nk-menu-text">Overview</span>
                        </a>
                    </li>

                    @if (auth()->user()->isUser())
                        <li class="nk-menu-item">
                            <a href="{{route('tasks')}}" class="nk-menu-link" data-original-title="" title="">
                                <span class="nk-menu-icon"><em class="icon ni ni-list"></em></span>
                                <span class="nk-menu-text">Tasks</span>
                            </a>
                        </li>
                    @endif

                    @if (auth()->user()->isAnyAdmin())
                        <li class="nk-menu-heading">
                            <h6 class="overline-title text-primary-alt">Admin</h6>
                        </li>

                        <li class="nk-menu-item">
                            <a href="{{route('users.list')}}" class="nk-menu-link" data-original-title="" title="">
                                <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                                <span class="nk-menu-text">Users</span>
                            </a>
                        </li>

                        <li class="nk-menu-item">
                            <a href="{{route('vendors.list')}}" class="nk-menu-link" data-original-title="" title="">
                                <span class="nk-menu-icon"><em class="icon ni ni-user-list"></em></span>
                                <span class="nk-menu-text">Vendors</span>
                            </a>
                        </li>

                        <li class="nk-menu-item">
                            <a href="{{route('tasks.list')}}" class="nk-menu-link" data-original-title="" title="">
                                <span class="nk-menu-icon"><em class="icon ni ni-task-c"></em></span>
                                <span class="nk-menu-text">Tasks</span>
                            </a>
                        </li>

                        <li class="nk-menu-item">
                            <a href="html/index-sales.html" class="nk-menu-link" data-original-title="" title="">
                                <span class="nk-menu-icon"><em class="icon ni ni-briefcase"></em></span>
                                <span class="nk-menu-text">Admins</span>
                            </a>
                        </li>

                        <li class="nk-menu-item">
                            <a href="html/index-analytics.html" class="nk-menu-link" data-original-title="" title="">
                                <span class="nk-menu-icon"><em class="icon ni ni-setting-alt"></em></span>
                                <span class="nk-menu-text">Settings</span>
                            </a>
                        </li>
                    @endif

                    @if (auth()->user()->isVendor())
                        <li class="nk-menu-heading">
                            <h6 class="overline-title text-primary-alt">Vendor</h6>
                        </li>

                        <li class="nk-menu-item">
                            <a href="{{route('coupons.vendor-coupons')}}" class="nk-menu-link" data-original-title="" title="">
                                <span class="nk-menu-icon"><em class="icon ni ni-money"></em></span>
                                <span class="nk-menu-text">Coupons</span>
                            </a>
                            <a href="{{route('coupons.vendor-coupon-history')}}" class="nk-menu-link" data-original-title="" title="">
                                <span class="nk-menu-icon"><em class="icon ni ni-histroy"></em></span>
                                <span class="nk-menu-text">Coupon History</span>
                            </a>
                            <a href="html/index-sales.html" class="nk-menu-link" data-original-title="" title="">
                                <span class="nk-menu-icon"><em class="icon ni ni-sign-dollar"></em></span>
                                <span class="nk-menu-text">Earnings</span>
                            </a>
                        </li>
                    @endif
                    
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Account</h6>
                    </li>

                    <li class="nk-menu-item">
                        <a href="{{route('profile.wallet')}}" class="nk-menu-link" data-original-title="" title="">
                            <span class="nk-menu-icon"><em class="icon ni ni-wallet"></em></span>
                            <span class="nk-menu-text">Wallet</span>
                        </a>
                    </li>

                    <li class="nk-menu-item">
                        <a href="{{route('profile.edit')}}" class="nk-menu-link" data-original-title="" title="">
                            <span class="nk-menu-icon"><em class="icon ni ni-user-alt"></em></span>
                            <span class="nk-menu-text">Profile</span>
                        </a>
                    </li>

                    

                    @if (auth()->user()->isVendor() || auth()->user()->isUser())
                        <li class="nk-menu-item">
                            <a href="html/index-analytics.html" class="nk-menu-link" data-original-title="" title="">
                                <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                                <span class="nk-menu-text">Referrals</span>
                            </a>
                        </li>
                    @endif

                    <li class="nk-menu-item">
                        <a href="{{route('logout')}}" class="nk-menu-link" data-original-title="" title="">
                            <span class="nk-menu-icon"><em class="icon ni ni-signout"></em></span>
                            <span class="nk-menu-text">Logout</span>
                        </a>
                    </li>
                </ul>
            </div></div></div></div><div class="simplebar-placeholder" style="width: auto; height: 1314px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 398px; transform: translate3d(0px, 0px, 0px); display: block;"></div></div></div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>