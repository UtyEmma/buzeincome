<tr>
    <td>
        <a href="" class="link link-primary mb-0 lh-0">{{$completed->user->firstname}} {{$completed->user->lastname}}</a>
    </td>
    <td>

        @if ($completed->user->twitter || $completed->user->facebook || $completed->user->instagram || $completed->user->tiktok)
            @if ($completed->user->twitter)
                <a href="{{$completed->user->twitter}}"><em class="icon fs-22px ni ni-twitter"></em></a>
            @endif

            @if ($completed->user->facebook)
                <a href="{{$completed->user->facebook}}"><em class="icon fs-22px ni ni-facebook-f"></em></a>
            @endif
    
            @if ($completed->user->instagram)        
                <a href="{{$completed->user->instagram}}"><em class="icon fs-22px ni ni-instagram"></em></a>
            @endif
    
            @if ($completed->user->tiktok)        
                <a href="{{$completed->user->tiktok}}"><em class="icon fs-22px ni ni-tiktok"></em></a>
            @endif
        @else
            <p>Not Added Yet</p>
        @endif


    </td>
    <td>
        <span class="tb-sub">{{Date::parse($completed->created_at)->format('jS M, Y h:m A')}}</span>
    </td>
    <td>
        <span class="tb-sub">{{$completed->verified_at ? 'Verified' : 'Unverified'}}</span>
    </td>
    <td>
        @if (!$completed->verified_at)        
            <a href="{{route('tasks.verify', [
                'task' => $completed->task_id,
                'taskCompletion' => $completed->id
            ])}}" class="btn btn-sm btn-success">Approve</a>
        @endif
    </td>
    <td>
        <ul class="nk-tb-actions gx-1">
            <li>
                <div class="drodown mr-n1">
                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <ul class="link-list-opt no-bdr">
                            <li><a href="{{route('tasks.completion.delete', [
                                    'task' => $completed->task_id,
                                    'taskCompletion' => $completed->id
                                ])}}" ><em class="icon ni ni-trash"></em><span>Delete Task</span></a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </td>
</tr>