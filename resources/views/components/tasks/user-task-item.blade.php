@inject('status', "App\Library\Status")

<div class="card h-100">
    <div class="card-inner">
        <div class="project">
            <div class="project-head">
                <a href="html/apps-kanban.html" class="project-title">
                    <div class="user-avatar sq bg-white">
                        <img src="{{$task->image}}" style="border-radius: 5px;"/>
                    </div>
                    <div class="project-info">
                        <h6 class="title">{{$task->title}}</h6>
                        <!-- <span class="sub-text">{{$task->status}}</span> -->
                        <span class="badge badge-dim badge-warning"><em class="icon ni ni-clock"></em><span>Expires {{Date::parse($task->starts_at)->addDays($task->duration)->shortRelativeDiffForHumans()}}</span></span>
                    </div>
                </a>

                <div>
                    <p class="fs-20px fw-bold">${{$task->reward}}</p>
                </div>
            </div>
            <div class="project-details">
                <p>{{$task->description}}</p>
                <span class="badge badge-dim badge-primary"><em class="icon ni ni-link mr-1"></em> {{$task->link}}</span></span>
            </div>

            <div class="project-meta">
                <ul class="project-users g-1">
                    <li>
                        <button onclick="navigator.clipboard.writeText('{{$task->link}}')" class="btn btn-icon btn-light"><em class="icon ni ni-copy"></em></button>
                    </li>
                    <li>
                        <button onclick="window.navigator.share({
                            title: '{{$task->title}}',
                            text: '{{$task->description}}',
                            url: '{{$task->link}}'
                        })" class="btn btn-icon btn-light"><em class="icon ni ni-share"></em></button>
                    </li>
                    <li>
                        <a href="{{$task->link}}" target="_blank" class="btn btn-icon btn-light"><em class="icon ni ni-external"></em></a>
                    </li>
                </ul>

                <div>
                    @if ($task->completion && !$task->completion->verified_at)
                        <span class="badge badge-warning badge-dim badge-md">Pending Verification</span>
                    @endif

                    @if ($task->completion && $task->completion->verified_at)
                        <span class="badge badge-success badge-dim badge-md">Task Completed</span>
                    @endif
                    
                    @if (!$task->completion)
                        <a href="{{route('tasks.complete', [ 'task' => $task->id ])}}" class="btn btn-outline-primary">Mark as Completed</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>