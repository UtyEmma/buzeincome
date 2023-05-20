@inject('status', 'App\Library\Status')

@push('modals') 
    <div class="modal fade" tabindex="-1" id="update-bank-info">
        <div class="modal-dialog">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
                <div class="modal-header">
                    <h5 class="modal-title">Update Bank Account</h5>
                </div>
                <form action="{{route('profile.update-bank_account')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="">
                            <div class="form-group">
                                <label for="" class="form-label">Bank</label>
                                <select name="bank" data-search="true" data-ui="lg" id="" class="form-select">
                                    @forelse ($banks as $bank)
                                        <option  value="{{$bank->code}}">{{$bank->name}}</option>
                                    @empty
                                        
                                    @endforelse
                                </select>
                                <x-input-error key="bank" />
                            </div>

                            <div class="form-group">
                                <label for="account_number" class="form-label">Account Number</label>
                                <input type="number" class="form-control form-control-lg appearance-none w-100" name="account_number" id="account_number" placeholder="Account Number">
                                <x-input-error key="account_number" />
                            </div>

                            <div class="form-group">
                                <label for="account_name" class="form-label">Account Name</label>
                                <input type="text" class="form-control form-control-lg appearance-none w-100" name="account_name" id="account_name" placeholder="Account Name">
                                <x-input-error key="account_name" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button class="btn btn-primary">Update Bank Account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endpush