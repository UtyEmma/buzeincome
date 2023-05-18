@inject('status', 'App\Library\Status')

<x-dashboard-layout>
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">

                <div>

                </div>

                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Task Completions</h3>
                        </div>

                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li>
                                            <form  method="get"  class="form-control-wrap">
                                                <div class="form-icon form-icon-right">
                                                    <em class="icon ni ni-search"></em>
                                                </div>
                                                <input type="text" name="search" class="form-control" id="default-04" placeholder="Quick search by id">
                                            </form>
                                        </li>
                                        <li>
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white" data-toggle="dropdown">Status</a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="{{route('tasks.single', [
                                                            'task' => $task->id,
                                                            'status' => $status::VERIFIED    
                                                        ])}}"><span>{{$status::VERIFIED}}</span></a></li>
                                                        <li><a href="{{route('tasks.single', [
                                                            'task' => $task->id,
                                                            'status' => $status::UNVERIFIED    
                                                        ])}}"><span>{{$status::UNVERIFIED}}</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-3">
                                <tr class="">
                                    <th>User</th>
                                    <th class=""><span>Social Handles</span></th>
                                    <th class=""><span>Completed At</span></th>
                                    <th class=""><span class="d-none d-mb-block">Status</span></th>
                                    <th class=""></th>
                                </tr>
        
                                @forelse ($completions as $completed)
                                    <x-tasks.task-completion-item :completed="$completed" />
                                @empty
                                    <div class="nk-tb-item ">
                                        <div>
        
                                        </div>
                                    </div>
                                @endforelse
                            </table>
                        </div>

                        {{$completions->links()}}
                    </div>
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</x-dashboard-layout>