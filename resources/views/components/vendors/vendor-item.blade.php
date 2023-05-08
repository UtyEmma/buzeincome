<div class="nk-tb-item">
    <div class="nk-tb-col nk-tb-col-check">
        <div class="custom-control custom-control-sm custom-checkbox notext">
            <input type="checkbox" class="custom-control-input" id="uid1">
            <label class="custom-control-label" for="uid1"></label>
        </div>
    </div>
    <div class="nk-tb-col tb-col-md">
        <span class="tb-lead"><a href="#">{{$vendor->firstname}} {{$vendor->lastname}}</a></span>
    </div>
    <div class="nk-tb-col tb-col-md">
        <span class="tb-sub">Jun 4, 2020</span>
    </div>
    <div class="nk-tb-col">
        <span class="dot bg-warning d-mb-none"></span>
        <span class="badge badge-sm badge-dot has-bg badge-warning d-none d-mb-inline-flex">On Hold</span>
    </div>
    <div class="nk-tb-col tb-col-sm">
        <span class="tb-sub">Arnold Armstrong</span>
    </div>
    <div class="nk-tb-col tb-col-sm">
        <span class="tb-sub">Arnold Armstrong</span>
    </div>
    <div class="nk-tb-col nk-tb-col-tools">
        <ul class="nk-tb-actions gx-1">
            <li class="nk-tb-action-hidden"><a href="#" class="btn btn-icon btn-trigger btn-tooltip" title="Mark as Delivered" data-toggle="dropdown">
                    <em class="icon ni ni-truck"></em></a></li>
            <li class="nk-tb-action-hidden"><a href="#" class="btn btn-icon btn-trigger btn-tooltip" title="View Order" data-toggle="dropdown">
                    <em class="icon ni ni-eye"></em></a></li>
            <li>
                <div class="drodown mr-n1">
                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <ul class="link-list-opt no-bdr">
                            <li><a href="#"><em class="icon ni ni-eye"></em><span>Order Details</span></a></li>
                            <li><a href="#"><em class="icon ni ni-truck"></em><span>Mark as Delivered</span></a></li>
                            <li><a href="#"><em class="icon ni ni-money"></em><span>Mark as Paid</span></a></li>
                            <li><a href="#"><em class="icon ni ni-report-profit"></em><span>Send Invoice</span></a></li>
                            <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Order</span></a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>