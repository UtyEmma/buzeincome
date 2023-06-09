<x-auth-layout>
    <div class="card">
        <div class="card-inner card-inner-lg">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title">Sign-In</h4>
                    <div class="nk-block-des">
                        <p>Access the CryptoLite panel using your email and passcode.</p>
                    </div>
                </div>
            </div>
            <form action="{{route('login')}}" method="POST">
                @csrf
                <div class="form-group">
                    <div class="form-label-group">
                        <label class="form-label" for="email">Email Address</label>
                    </div>
                    <input type="text" class="form-control form-control-lg" id="email" name="email" placeholder="Enter your email address or username">
                    <x-input-error key="email" />
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <label class="form-label" for="password">Password</label>
                        <a class="link link-primary link-sm" href="{{route('password.request')}}">Forgot Password?</a>
                    </div>
                    <div class="form-control-wrap">
                        <a href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                        </a>
                        <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Enter your passcode">
                    </div>
                    <x-input-error key="password" />
                </div>
                <div class="form-group">
                    <button class="btn btn-lg btn-primary btn-block">Sign in</button>
                </div>
            </form>
            <div class="form-note-s2 text-center pt-4"> New on our platform? <a href="{{route('register')}}">Create an account</a>
            </div>
            <div class="text-center pt-4 pb-3">
                <h6 class="overline-title overline-title-sap"><span>OR</span></h6>
            </div>
            <ul class="nav justify-center gx-4">
                <li class="nav-item"><a class="nav-link" href="#">Facebook</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Google</a></li>
            </ul>
        </div>
    </div>
</x-auth-layout>