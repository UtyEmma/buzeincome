<div class="nk-tb-item">
    <div class="nk-tb-col nk-tb-col-check">
        <div class="custom-control custom-control-sm custom-checkbox notext">
            <input type="checkbox" class="custom-control-input" id="uid1">
            <label class="custom-control-label" for="uid1"></label>
        </div>
    </div>
    <div class="nk-tb-col tb-col-md">
        <span class="tb-sub mb-0" >{{$coupon->code}}</span>
        <button class="btn btn-sm btn-icon ml-1" onclick="navigator.clipboard.writeText('{{$coupon->code}}')"><i class="ni icon-sm icon ni-copy"></i></button>
    </div>
    <div class="nk-tb-col">
        <span class="tb-sub">{{Date::parse($coupon->created_at)->format('jS M, Y h:m A')}}</span>
    </div>
    <div class="nk-tb-col">
        <span class="tb-sub">{{Date::parse($coupon->used_at)->format('jS M, Y h:m A')}}</span>
    </div>
    <div class="nk-tb-col tb-col-md">
        <p class="tb-lead mb-0 lh-0"><a href="#">
            @if ($coupon->user)
                {{$coupon->user->firstname}} {{$coupon->user->lastname}}
            @else
                <span>N/A</span>            
            @endif
        </a></p>
        <p class="tb-lead lh-0 mt-0"><a href="mailto:{{$coupon->user->email ?? ''}}">{{$coupon->user->email ?? "N/A"}}</a></p> 
    </div>
    <div class="nk-tb-col nk-tb-col-tools">
        <ul class="nk-tb-actions gx-1">
            <li>
                <div class="drodown mr-n1">
                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <ul class="link-list-opt no-bdr">
                            <li><a href="#"><em class="icon ni ni-chat"></em><span>Make A Report</span></a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>