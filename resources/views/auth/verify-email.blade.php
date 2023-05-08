<x-auth-layout>
    <div class="nk-block-head text-center">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Please verify your Email Address!</h4>
            <div class="nk-block-des fs-16px">
                <p>We have sent an email to <span class="text-primary">{{auth()->user()->email}}</span> to complete your account setup!</p>

                <a href="{{route('verification.send')}}" class="btn btn-primary">Resend Verification Link</a> 
                <br/>
                <a href="{{route('logout')}}" class="mt-4 btn ">Logout</a>
            </div>
        </div>
    </div>
</x-auth-layout>