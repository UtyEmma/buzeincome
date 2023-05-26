<x-auth-layout>
    <div class="card">
        <div class="card-inner card-inner-lg">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h5 class="nk-block-title">Set your new password</h5>
                    <div class="nk-block-des">
                        <p>Please set a new password for your account below.</p>
                    </div>

                    @if (session('status'))
                        <div class="mt-4 mb-0 text-success">
                            <p>{{session('status') ?? ''}}</p>
                        </div>
                    @endif
                </div>
            </div>
            <form method="POST" action="{{route('password.store', ['token' => request()->token])}}">
                @csrf

                <div class="form-group">
                    <div class="form-label-group">
                        <label class="form-label" for="email">Email</label>
                    </div>
                    <input type="text" value='{{request()->email}}' class="form-control form-control-lg" id="email" name="email" placeholder="Enter your email address">
                    <x-input-error key='email' />
                </div>
                
                
                <div class="form-group">
                    <div class="form-label-group">
                        <label class="form-label" for="email">New Password</label>
                    </div>
                    <input type="password"  class="form-control form-control-lg" id="email" name="password" placeholder="Enter your new password">
                    <x-input-error key='password' />
                </div>
                
                <div class="form-group">
                    <div class="form-label-group">
                        <label class="form-label" for="email">Confirm Password</label>
                    </div>
                    <input type="password"  class="form-control form-control-lg" id="email" name="password_confirmation" placeholder="Enter your new password">
                
                </div>
                
                <div class="form-group">
                    <button class="btn btn-lg btn-primary btn-block">Reset Password</button>
                </div>
            </form>
            <div class="form-note-s2 text-center pt-4">
                <a href="{{route('login')}}"><strong>Return to login</strong></a>
            </div>
        </div>
    </div>
</x-auth-layout>