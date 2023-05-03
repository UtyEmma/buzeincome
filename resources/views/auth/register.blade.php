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
            
            <form action="html/pages/auths/auth-success-v2.html">
                <div class="form-group">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" class="form-control form-control-lg" id="name" placeholder="Enter your name">
                </div>
                <div class="form-group">
                    <label class="form-label" for="email">Email or Username</label>
                    <input type="text" class="form-control form-control-lg" id="email" placeholder="Enter your email address or username">
                </div>
                <div class="form-group">
                    <label class="form-label" for="password">Passcode</label>
                    <div class="form-control-wrap">
                        <a href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                        </a>
                        <input type="password" class="form-control form-control-lg" id="password" placeholder="Enter your passcode">
                    </div>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-control-xs custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="checkbox">
                        <label class="custom-control-label" for="checkbox">I agree to Dashlite <a href="#">Privacy Policy</a> &amp; <a href="#"> Terms.</a></label>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-lg btn-primary btn-block">Register</button>
                </div>
            </form>
            <div class="form-note-s2 text-center pt-4"> Already have an account? <a href="html/pages/auths/auth-login-v2.html"><strong>Sign in instead</strong></a>
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