@inject('status', 'App\Library\Status')

<li class="nk-block-tools-opt">
    <a href="#" class="btn btn-primary d-inline-flex" data-toggle="modal" data-target="#add-new-vendor"><em class="icon ni ni-plus"></em><span>Create Vendor</span></a>
</li>


@push('modals') 
    <div class="modal fade" tabindex="-1" id="add-new-vendor">
        <div class="modal-dialog">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
                <div class="modal-header">
                    <h5 class="modal-title">Create a New Vendor</h5>
                </div>
                <form action="{{route('vendors.store')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" class="form-select form-select-lg" id="status">
                                    <option value="{{$status::ACTIVE}}">{{$status::ACTIVE}}</option>
                                    <option value="{{$status::SUSPENDED}}">{{$status::SUSPENDED}}</option>
                                    <option value="{{$status::BANNED}}">{{$status::BANNED}}</option>
                                </select>
                                <x-input-error key="status" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="firstname" class="form-label">First Name</label>
                                <input name="firstname" id="firstname" placeholder="First Name" class="form-control form-control-lg" />
                                <x-input-error key="firstname" />
                            </div>
                            <div class="col-md-6">
                                <label for="lastname" class="form-label">Last Name</label>
                                <input name="lastname" id="lastname" placeholder="Last Name" class="form-control form-control-lg" />
                                <x-input-error key="lastname" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="text" id="email" name="email" placeholder="Email Address" class="form-control form-control-lg">
                            <x-input-error key="email" />
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="phone" class="form-label">WhatsApp Phone Number</label>
                                <input type="tel" name="phone" id="phone" placeholder="WhatsApp Phone Number" class="form-control form-control-lg">
                                <x-input-error key="phone" />
                            </div>
    
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Coupons</label>
                                <input type="number" name="coupons" id="coupons" value="10" placeholder="No. of Coupons" class="form-control form-control-lg">
                                <x-input-error key="coupons" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button class="btn btn-primary">Create Vendor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endpush