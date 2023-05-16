@inject('status', 'App\Library\Status')

@push('modals') 
    <div class="modal fade" tabindex="-1" id="{{$id}}">
        <div class="modal-dialog">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
                <div class="modal-header">
                    <h5 class="modal-title">Create a New Admin</h5>
                </div>
                <form action="{{isset($admin) ? route('admins.update', [
                    'user' => $admin->id]) : route('admins.store')}}" method="post">
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
                                <input name="firstname" id="firstname" value="{{$admin->firstname ?? ''}}" placeholder="First Name" class="form-control form-control-lg" />
                                <x-input-error key="firstname" />
                            </div>
                            <div class="col-md-6">
                                <label for="lastname" class="form-label">Last Name</label>
                                <input name="lastname" id="lastname" value="{{$admin->lastname ?? ''}}" placeholder="Last Name" class="form-control form-control-lg" />
                                <x-input-error key="lastname" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="text" id="email" name="email" value="{{$admin->email ?? ''}}" placeholder="Email Address" class="form-control form-control-lg">
                            <x-input-error key="email" />
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" name="phone" id="phone" value="{{$admin->phone ?? ''}}" placeholder="Phone Number" class="form-control form-control-lg">
                                <x-input-error key="phone" />
                            </div>
    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="password">Default Password</label>
                                    <div class="form-control-wrap">
                                        <a href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                        </a>
                                        <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Enter your password">
                                        <x-input-error key="password" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button class="btn btn-primary">Create Admin</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endpush