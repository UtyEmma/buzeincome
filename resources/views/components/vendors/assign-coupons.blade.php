@push('modals') 
    <div class="modal fade" tabindex="-1" id="{{$id}}">
        <div class="modal-dialog">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
                <div class="modal-header">
                    <h5 class="modal-title">Assign Coupons</h5>
                </div>
                <form action="{{route('vendors.coupons.assign', [
                    'user' => $user->id])}}" method="post">
                    @csrf
                    
                    <div class="modal-body">
                        <h6>Assign Coupons to {{$user->firstname}} {{$user->lastname}}</h6>
                        <div class="form-group">
                            <label for="phone" class="form-label">Number of Coupons</label>
                            <input type="number" name="coupons" value="10" class="form-control form-control-lg w-50">
                            <x-input-error key="coupons" />
                        </div>
                    </div>

                    <div class="modal-footer bg-light">
                        <button class="btn btn-primary">Assign Coupons</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endpush