<tr>
    <!-- <th scope="col">#</th> -->
    <th scope="col">
        <a href="{{route('tasks.single', [
                'task' => $task->id
            ])}}" class="tb-lead link mb-0 lh-0">{{$task->title}}</a>
    </th>
    <th scope="col">        
        <a href="{{$task->link}}">{{$task->link}}</a>
    </th>
    <th scope="col">{{$task->reward}}</th>
    <th scope="col">{{$task->completions_count}}</th>
    <th scope="col">{{$task->status}}</th>
    <th scope="col">
        <ul class="nk-tb-actions gx-1">
            <li>
                <div class="drodown mr-n1">
                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <ul class="link-list-opt no-bdr">
                            <li><a href="#" data-toggle="modal" data-target="#edit-task-modal-{{$task->id}}"><em class="icon ni ni-pen"></em><span>Edit Task</span></a></li>

                            <x-tasks.create-task-modal :task="$task" id="edit-task-modal-{{$task->id}}" />
                            <li><x-swal href="{{route('tasks.destroy', ['task' => $task->id])}}" ><em class="icon ni ni-trash"></em><span>Delete Task</span></x-swal></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </th>
</tr>