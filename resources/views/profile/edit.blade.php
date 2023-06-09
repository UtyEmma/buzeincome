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
            </div>
        </div><!-- data-list -->
        
        <div class="nk-data data-list">
            <div class="data-head">
                <h6 class="overline-title">Social Media Handles</h6>
                <!-- <button class="btn-sm btn btn-link">Edit</button> -->
            </div>

            <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                <div class="data-col">
                    <span class="data-label">Twitter</span>
                    <span class="data-value text-soft">{{$user->twitter ?? 'Not Added Yet'}}</span>
                </div>
                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
            </div>
            <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                <div class="data-col">
                    <span class="data-label">Facebook</span>
                    <span class="data-value text-soft">{{$user->facebook ?? 'Not Added Yet'}}</span>
                </div>
                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
            </div>

            <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                <div class="data-col">
                    <span class="data-label">Instagram</span>
                    <span class="data-value text-soft">{{$user->instagram ?? 'Not Added Yet'}}</span>
                </div>
                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
            </div>
            <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                <div class="data-col">
                    <span class="data-label">TikTok</span>
                    <span class="data-value text-soft">{{$user->tiktok ?? 'Not Added Yet'}}</span>
                </div>
                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
            </div>
        </div>

        @if ($user->isUser())
            <div class="nk-data data-list">
                <div class="data-head">
                    <h6 class="overline-title">Bank Account Information</h6>
                    <!-- <button class="btn-sm btn btn-link">Edit</button> -->
                </div>

                @if ($user->bankAccount()->exists())
                    <div class="data-item">
                        <div class="data-col">
                            <span class="data-label">Bank</span>
                            <span class="data-value">{{$user->bankAccount->bankInfo->name}}</span>
                        </div>
                        <div class="data-col data-col-end"><a href="#" data-toggle="modal" data-target="#update-bank-info" class="link link-primary">Update</a></div>
                    </div>
                    <div class="data-item">
                        <div class="data-col">
                            <span class="data-label">Account Name</span>
                            <span class="data-value">{{$user->bankAccount->account_name}}</span>
                        </div>
                        <div class="data-col data-col-end"><a href="#" data-toggle="modal" data-target="#profile-language" class="link link-primary"></a></div>
                    </div>
                    <div class="data-item">
                        <div class="data-col">
                            <span class="data-label">Account Number</span>
                            <span class="data-value">{{$user->bankAccount->account_number}}</span>
                        </div>
                        <div class="data-col data-col-end"><a href="#" data-toggle="modal" data-target="#profile-language" class="link link-primary"></a></div>
                    </div>
                @else
                    <div class="border p-5 text-center">
                        <h5>Add your Bank Account Details</h5>
                        <a href="#" data-toggle="modal" data-target="#update-bank-info" class="btn btn-primary">Add BankAccount</a>
                    </div>
                @endif
            </div>
        @endif
    </div>

    @include('profile.partials.update-bank-modal', [
        'banks' => $banks
        ])
</x-profile-layout>