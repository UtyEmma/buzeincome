<div class="nk-tb-item">
    <div class="nk-tb-col nk-tb-col-check">
        <div class="custom-control custom-control-sm custom-checkbox notext">
            <input type="checkbox" class="custom-control-input" id="uid1">
            <label class="custom-control-label" for="uid1"></label>
        </div>
    </div>
    <div class="nk-tb-col tb-col-md">
        <p class="tb-lead mb-0 lh-0"><a href="#">{{$vendor->firstname}} {{$vendor->lastname}}</a></p>
        <p class="tb-lead lh-0 mt-0"><a href="mailto:{{$vendor->email}}">{{$vendor->email}}</a></p> 
    </div>
    <div class="nk-tb-col tb-col-md">
        <span class="tb-sub">{{$vendor->active_coupons_count}}</span>
    </div>
    <div class="nk-tb-col">
        <span class="tb-sub">{{$vendor->coupons_count}}</span>
    </div>
    <div class="nk-tb-col tb-col-sm">
        <span class="tb-sub">{{$vendor->status}}</span>
    </div>
    <div class="nk-tb-col nk-tb-col-tools">
        <ul class="nk-tb-actions gx-1">
            <li>
                <div class="drodown mr-n1">
                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <ul class="link-list-opt no-bdr">
                            <li><a href="#"><em class="icon ni ni-money"></em><span>Assign Coupons</span></a></li>
                            <li><a href="#"><em class="icon ni ni-pen"></em><span>Edit Vendor</span></a></li>
                            <li><a href="{{route('vendors.destroy', ['user' => $vendor->id])}}" ><em class="icon ni ni-trash"></em><span>Delete Vendor</span></a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>