<x-profile-layout :user="$user" :title="'Personal Information'" :subtitle="'Basic info, like your name and address, that you use on Nio Platform.'">
    <div class="nk-block">
        <div class="nk-data data-list">
            <div class="data-head">
                <h6 class="overline-title">Basics</h6>
            </div>
            <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                <div class="data-col">
                    <span class="data-label">Full Name</span>
                    <span class="data-value">{{$user->firstname}} {{$user->lastname}}</span>
                </div>
                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
            </div>
            <div class="data-item">
                <div class="data-col">
                    <span class="data-label">Email</span>
                    <span class="data-value">{{$user->email}}</span>
                </div>
                <div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div>
            </div><!-- data-item -->
            <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                <div class="data-col">
                    <span class="data-label">Phone Number</span>
                    <span class="data-value text-soft">{{$user->phone ?? 'Not Added Yet'}}</span>
                </div>
                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
            </div><!-- data-item -->
            <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                <div class="data-col">
                    <span class="data-label">Date of Birth</span>
                    <span class="data-value">29 Feb, 1986</span>
                </div>
                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
            </div><!-- data-item -->
            <div class="data-item" data-toggle="modal" data-target="#profile-edit" data-tab-target="#address">
                <div class="data-col">
                    <span class="data-label">Address</span>
                    <span class="data-value">2337 Kildeer Drive,<br>Kentucky, Canada</span>
                </div>
                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
            </div><!-- data-item -->
        </div><!-- data-list -->
        <div class="nk-data data-list">
            <div class="data-head">
                <h6 class="overline-title">Preferences</h6>
            </div>
            <div class="data-item">
                <div class="data-col">
                    <span class="data-label">Language</span>
                    <span class="data-value">English (United State)</span>
                </div>
                <div class="data-col data-col-end"><a href="#" data-toggle="modal" data-target="#profile-language" class="link link-primary">Change Language</a></div>
            </div><!-- data-item -->
            <div class="data-item">
                <div class="data-col">
                    <span class="data-label">Date Format</span>
                    <span class="data-value">M d, YYYY</span>
                </div>
                <div class="data-col data-col-end"><a href="#" data-toggle="modal" data-target="#profile-language" class="link link-primary">Change</a></div>
            </div><!-- data-item -->
            <div class="data-item">
                <div class="data-col">
                    <span class="data-label">Timezone</span>
                    <span class="data-value">Bangladesh (GMT +6)</span>
                </div>
                <div class="data-col data-col-end"><a href="#" data-toggle="modal" data-target="#profile-language" class="link link-primary">Change</a></div>
            </div><!-- data-item -->
        </div><!-- data-list -->
    </div>
</x-profile-layout>