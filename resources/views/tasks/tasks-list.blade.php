@inject('status', 'App\Library\Status')

<x-dashboard-layout>
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Tasks</h3>
                        </div>

                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li>
                                            <!-- action="{{route('tasks.list')}}" -->
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
                                                        <li><a href="{{route('vendors.list', [
                                                            'status' => $status::ACTIVE    
                                                        ])}}"><span>{{$status::ACTIVE}}</span></a></li>
                                                        <li><a href="{{route('vendors.list', [
                                                            'status' => $status::BANNED    
                                                        ])}}"><span>{{$status::BANNED}}</span></a></li>
                                                        <li><a href="{{route('vendors.list', [
                                                            'status' => $status::SUSPENDED   
                                                        ])}}" ><span>{{$status::SUSPENDED}}</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="nk-block-tools-opt">
                                            <a href="#" class="btn btn-primary d-inline-flex" data-toggle="modal" data-target="#create-new-task"><em class="icon ni ni-plus"></em><span>Create New Task</span></a>
                                        </li>

                                        <x-tasks.create-task-modal id="create-new-task" />
                                    </ul>
                                </div>
                            </div>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <!-- <th scope="col">#</th> -->
                                            <th scope="col">Title</th>
                                            <th scope="col">Link</th>
                                            <th scope="col">Reward</th>
                                            <th scope="col">Completions</th>
                                            <th scope="col">Status</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($tasks as $task)
                                            <x-tasks.task-item :task="$task" />
                                        @empty
                                            <div class="nk-tb-item ">
                                                <div>
                
                                                </div>
                                            </div>
                                        @endforelse                                
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-inner">
                            <div class="nk-block-between-md g-3">
                                <div class="g">
                                    {{$tasks->links()}}
                                </div>
                            </div><!-- .nk-block-between -->
                        </div>
                    </div>
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</x-dashboard-layout>