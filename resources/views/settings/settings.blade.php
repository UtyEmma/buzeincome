<x-dashboard-layout>
<div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">App Settings</h3>
                        </div>
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('settings.update')}}" method="POST" class="col-md-7 mx-auto">
                                @csrf
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        
                                        <div class="form-group">
                                            <label for="" class="form-label">First Level Referral Comission</label>
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-left">
                                                    <em class="icon ni ni-sign-dollar"></em>
                                                </div>
                                                <input type="text" name="refferal_comission" value="{{$settings->refferal_comission}}" class="form-control form-control-lg" />
                                            </div>
                                            <x-input-error key="refferal_comission" />
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" class="form-label">Second Level Referral Comission</label>
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-left">
                                                    <em class="icon ni ni-sign-dollar"></em>
                                                </div>
                                                <input type="text" name="second_level_refferal_comission" value="{{$settings->second_level_refferal_comission}}" class="form-control form-control-lg" />
                                            </div>
                                            <x-input-error key="second_level_refferal_comission" />
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" class="form-label">Default User Balance</label>
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-left">
                                                    <em class="icon ni ni-sign-dollar"></em>
                                                </div>
                                                <input type="text" name="default_user_bal" value="{{$settings->default_user_bal}}" class="form-control form-control-lg" />
                                            </div>
                                            <x-input-error key="default_user_bal" />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" class="form-label">Withdrawal Threshold</label>
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-left">
                                                    <em class="icon ni ni-sign-dollar"></em>
                                                </div>
                                                <input type="text" name="limit" value="{{$settings->limit}}" class="form-control form-control-lg" />
                                            </div>
                                            <x-input-error key="limit" />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" class="form-label">Referral Withdrawal Threshold</label>
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-left">
                                                    <em class="icon ni ni-sign-dollar"></em>
                                                </div>
                                                <input type="text" name="ref_limit" value="{{$settings->ref_limit}}" class="form-control form-control-lg" />
                                            </div>
                                            <x-input-error key="ref_limit" />
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end mt-4">
                                    <button class="btn btn-primary btn-lg">Update Settings</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</x-dashboard-layout>