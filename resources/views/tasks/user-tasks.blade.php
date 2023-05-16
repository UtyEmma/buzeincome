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