@inject('status', 'App\Library\Status')

<button class="btn mt-4 mt-md-0 btn-primary btn-lg" data-toggle="modal" data-target="#create-new-task"><em class="icon ni ni-plus"></em> <span>Withdraw Funds</span></button>


@push('modals') 
    <div class="modal fade" tabindex="-1" id="create-new-task">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
                <div class="modal-header">
                    <h5 class="modal-title">Withdraw Funds</h5>
                </div>
                <form action="{{route('wallet.withdraw')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="amount" class="form-label">Select Wallet</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-left">
                                    <em class="icon ni ni-sign-dollar"></em>
                                </div>
                                <select name="type" id="" class="form-select form-select-lg">
                                    <option value="main_bal">Main Wallet</option>
                                    <option value="ref_bal">Referral Wallet</option>
                                </select>
                            </div>
                            <x-input-error key="type" />
                        </div>

                        <div class="form-group">
                            <label for="amount" class="form-label">Amount ($)</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-left">
                                    <em class="icon ni ni-sign-dollar"></em>
                                </div>
                                <input type="number" class="form-control form-control-lg appearance-none w-100" name="amount" id="amount" placeholder="Amount">
                            </div>
                            <x-input-error key="amount" />
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button class="btn btn-primary">Withdraw</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endpush