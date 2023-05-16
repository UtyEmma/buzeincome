<div class="nk-tb-item">
    <div class="nk-tb-col nk-tb-col-check">
        <div class="custom-control custom-control-sm custom-checkbox notext">
            <input type="checkbox" class="custom-control-input" id="uid1">
            <label class="custom-control-label" for="uid1"></label>
        </div>
    </div>
    <div class="nk-tb-col tb-col-md">
        <p class="tb-lead mb-0 lh-0">{{$admin->firstname}} {{$admin->lastname}}</p>
    </div>
    <div class="nk-tb-col tb-col-md">
        <span class="tb-sub"><a href="mailto:{{$admin->email}}">{{$admin->email}}</a></span>
    </div>
    <div class="nk-tb-col tb-col-sm">
        <span class="tb-sub">{{$admin->status}}</span>
    </div>
    <div class="nk-tb-col nk-tb-col-tools">
        <ul class="nk-tb-actions gx-1">
            <li>
                <div class="drodown mr-n1">
                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <ul class="link-list-opt no-bdr">
                            <li><a href="#" data-toggle="modal" data-target="#add-new-admin-{{$admin->id}}"><em class="icon ni ni-pen"></em><span>Edit Vendor</span></a></li>
                            <li><x-swal href="{{route('admin.destroy', ['user' => $admin->id])}}" ><em class="icon ni ni-trash"></em><span>Delete Vendor</span></x-swal></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>

</div>

<x-admin.create-admin-modal id="add-new-admin-{{$admin->id}}" :admin="$admin" />