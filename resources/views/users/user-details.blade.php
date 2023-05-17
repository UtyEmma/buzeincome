<x-users.user-layout :user="$user">
    <div class="nk-block">
        <div class="nk-block-head">
            <h5 class="title">Personal Information</h5>
            <p>Basic info, like your name and address, that you use on Nio Platform.</p>
        </div><!-- .nk-block-head -->
        <div class="profile-ud-list">
            <div class="profile-ud-item">
                <div class="profile-ud wider">
                    <span class="profile-ud-label">Full Name</span>
                    <span class="profile-ud-value">{{$user->firstname}} {{$user->lastname}}</span>
                </div>
            </div>
            <div class="profile-ud-item">
                <div class="profile-ud wider">
                    <span class="profile-ud-label">Mobile Number</span>
                    <span class="profile-ud-value">{{$user->phone}}</span>
                </div>
            </div>
            <div class="profile-ud-item">
                <div class="profile-ud wider">
                    <span class="profile-ud-label">Email Address</span>
                    <span class="profile-ud-value">{{$user->email}}</span>
                </div>
            </div>

            <div class="profile-ud-item">
                <div class="profile-ud wider">
                    <span class="profile-ud-label">Task Completions</span>
                    <span class="profile-ud-value">{{$user->task_completions_count}}</span>
                </div>
            </div>
        </div>
    </div>
</x-users.user-layout>