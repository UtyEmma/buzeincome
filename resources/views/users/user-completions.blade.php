<x-users.user-layout :user="$user">
    <div class="nk-block">
    <table class="table table-tranx is-compact">
            <thead>
                <tr class="tb-tnx-head">
                    <th class="tb-tnx-id"><span class="">Task</span></th>
                    <th class="">Date Completed</th>
                    <th class="">Status</th>
                    <th class="">Action</th>
                    <th class=""></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($user->taskCompletions as $completion)                    
                    <tr class="tb-tnx-item">
                        <td class="tb-tnx-id">
                            <a href="#"><span>{{$completion->task}}</span></a>
                        </td>
                        <td class=""><span class="amount">{{Date::parse($completion->created_at)->format('jS M, Y h:m A')}}</span>
                        </td>
                        <td class="">
                            <span class="badge badge-dot badge-warning">{{$completion->status}}</span>
                        </td>
                        <td>
                            @if (!$completion->verified_at)        
                                <a href="{{route('tasks.verify', [
                                    'task' => $completion->task_id,
                                    'taskCompletion' => $completion->id
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
                                                        'task' => $completion->task_id,
                                                        'taskCompletion' => $completion->id
                                                    ])" ><em class="icon ni ni-trash"></em><span>Delete Task</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </td>
                    </tr>
                @empty
                    <h4>No Task Completions found!</h4>
                @endforelse
            </tbody>
        </table>
    </div>
</x-users.user-layout>