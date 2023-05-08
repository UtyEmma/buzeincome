<x-auth-layout>
    <div class="card">
        <div class="card-inner card-inner-lg">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title">Register</h4>
                    <div class="nk-block-des">
                        <p>Create New Dashlite Account</p>
                    </div>
                </div>
            </div>
            
            <form action="{{route('register')}}" method="POST">
                @csrf
                <div class="row form-group">
                    <div class="col-6">
                        <label class="form-label" for="firstname">First Name</label>
                        <input type="text" class="form-control form-control-lg" id="firstname" name="firstname" placeholder="Enter your First Name">
                        <x-input-error key="firstname" />
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="lastname">Last Name</label>
                        <input type="text" class="form-control form-control-lg" id="lastname" name="lastname" placeholder="Enter your Last Name">
                        <x-input-error key="lastname" />
                    </div>

                </div>

                <div class="form-group">
                    <label class="form-label" for="email">Email Address</label>
                    <input type="text" class="form-control form-control-lg" id="email" name="email" placeholder="Enter your email address">
                    <x-input-error key="email" />
                </div>

                <div class="form-group">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" class="form-control form-control-lg" id="email" placeholder="Enter your email address or username" required autofocus autocomplete="email" name="email">
                </div>

                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <div class="form-control-wrap">
                        <a href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                        </a>
                        <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Enter your password">
                        <x-input-error key="password" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="coupon">Coupon Code</label>
                    <input type="text" class="form-control form-control-lg" id="coupon" name="coupon_code" placeholder="Enter your Coupon Code">
                    <x-input-error key="coupon_code" />
                </div>

                <div class="form-group">
                    <label class="form-label" for="referral_code">Referral Code (Optional) </label>
                    <input type="text" class="form-control form-control-lg" id="referral_code" name="referral_code" placeholder="Enter your Referral Code">
                    <x-input-error key="referral_code" />
                </div>

                <div class="form-group">
                    <div class="custom-control custom-control-xs custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="terms" id="checkbox">
                        <label class="custom-control-label" for="checkbox">I agree to Dashlite <a href="#">Privacy Policy</a> &amp; <a href="#"> Terms.</a></label>
                    </div>
                    <x-input-error key="terms" />
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-lg btn-primary btn-block">Register</button>
                </div>
            </form>
            <div class="form-note-s2 text-center pt-4"> Already have an account? <a href="{{route('login')}}"><strong>Sign in instead</strong></a>
            </div>
            <div class="text-center pt-4 pb-3">
                <h6 class="overline-title overline-title-sap"><span>OR</span></h6>
            </div>
            <ul class="nav justify-center gx-8">
                <li class="nav-item"><a class="nav-link" href="#">Facebook</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Google</a></li>
            </ul>
        </div>
    </div>
</x-auth-layout>