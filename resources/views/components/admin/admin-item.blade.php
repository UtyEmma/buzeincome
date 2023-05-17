<tr class="nk-tb-item">
    <td class="nk-tb-col tb-col-md">
        <p class="tb-lead mb-0 lh-0">{{$admin->firstname}} {{$admin->lastname}}</p>
    </td>
    <td class="nk-tb-col tb-col-md">
        <span class="tb-sub"><a href="mailto:{{$admin->email}}">{{$admin->email}}</a></span>
    </td>
    <td class="nk-tb-col tb-col-sm">
        <span class="tb-sub">{{$admin->status}}</span>
    </td>
    <td class="nk-tb-col nk-tb-col-tools">
        <ul class="nk-tb-actions gx-1">
            <li>
                <div class="drodown mr-n1">
                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <ul class="link-list-opt no-bdr">
                            <li><a href="#" data-toggle="modal" data-target="#add-new-admin-{{$admin->id}}"><em class="icon ni ni-pen"></em><span>Edit Admin</span></a></li>
                            <li><x-swal href="{{route('admin.destroy', ['user' => $admin->id])}}" ><em class="icon ni ni-trash"></em><span>Delete Admin</span></x-swal></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </td>

</tr>

<x-admin.create-admin-modal id="add-new-admin-{{$admin->id}}" :admin="$admin" />