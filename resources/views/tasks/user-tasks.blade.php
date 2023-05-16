<x-dashboard-layout>
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Tasks of the Day</h3>
                            <div class="nk-block-des text-soft">
                                <p>You have {{count($tasks)}} pending tasks.</p>
                            </div>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li>
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-white btn-dim btn-outline-light" data-toggle="dropdown"><em class="d-none d-sm-inline icon ni ni-filter-alt"></em><span>Filtered By</span><em class="dd-indc icon ni ni-chevron-right"></em></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#"><span>Open</span></a></li>
                                                        <li><a href="#"><span>Closed</span></a></li>
                                                        <li><a href="#"><span>Onhold</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nk-block-tools-opt"><a href="#" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add Project</span></a></li>
                                    </ul>
                                </div>
                            </div><!-- .toggle-wrap -->
                        </div><!-- .nk-block-head-content -->
                    </div>
                </div>

                <div class="nk-block">
                    <div class="row g-gs">
                        @forelse ($tasks as $task)
                            <div class="col-sm-6 col-lg-4">
                                <x-tasks.user-task-item :task="$task" />
                            </div>
                        @empty
                            
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>