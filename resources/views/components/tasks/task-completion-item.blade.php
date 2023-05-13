<div class="nk-tb-item">
    <div class="nk-tb-col nk-tb-col-check">
        <div class="custom-control custom-control-sm custom-checkbox notext">
            <input type="checkbox" class="custom-control-input" id="uid1">
            <label class="custom-control-label" for="uid1"></label>
        </div>
    </div>
    <div class="nk-tb-col tb-col-md">
        <a href="" class="tb-lead link mb-0 lh-0">{{$completed->user->firstname}} {{$completed->user->lastname}}</a>
    </div>
    <div class="nk-tb-col tb-col-md">
        <span class="tb-sub"><a href=""></a></span>
    </div>
    <div class="nk-tb-col">
        <span class="tb-sub">{{Date::parse($completed->created_at)->format('jS M, Y h:m A')}}</span>
    </div>
    <div class="nk-tb-col">
        <span class="tb-sub">{{$completed->verified_at ? 'Verified' : 'Unverified'}}</span>
    </div>
    <div class="nk-tb-col tb-col-sm">
        <span class="tb-sub"></span>
        @if (!$completed->verified_at)        
            <a href="{{route('tasks.verify', [
                'task' => $completed->task_id,
                'taskCompletion' => $completed->id
            ])}}" class="btn btn-sm btn-success">Approve</a>
        @endif
    </div>
    <div class="nk-tb-col nk-tb-col-tools">
        <ul class="nk-tb-actions gx-1">
            <li>
                <div class="drodown mr-n1">
                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <ul class="link-list-opt no-bdr">
                            <li><a href="#"><em class="icon ni ni-money"></em><span>Assign Coupons</span></a></li>
                            <li><a href="#"><em class="icon ni ni-pen"></em><span>Edit Task</span></a></li>
                            <!-- <li><a href="" ><em class="icon ni ni-trash"></em><span>Delete Task</span></a></li> -->
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>