@inject('status', 'App\Library\Status')

<li class="nk-block-tools-opt">
    <a href="#" class="btn btn-primary d-inline-flex" data-toggle="modal" data-target="#create-new-task"><em class="icon ni ni-plus"></em><span>Create New Task</span></a>
</li>


@push('modals') 
    <div class="modal fade" tabindex="-1" id="create-new-task">
        <div class="modal-dialog">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
                <div class="modal-header">
                    <h5 class="modal-title">Create a New Task</h5>
                </div>
                <form action="{{route('tasks.store')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" class="form-select form-select-lg" id="status">
                                    <option value="{{$status::ACTIVE}}">{{$status::ACTIVE}}</option>
                                    <option value="{{$status::EXPIRED}}">{{$status::EXPIRED}}</option>
                                    <option value="{{$status::SUSPENDED}}">{{$status::SUSPENDED}}</option>
                                </select>
                                <x-input-error key="status" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="form-label">Title</label>
                            <input name="title" id="title" placeholder="Task Title" class="form-control form-control-lg" />
                            <x-input-error key="title" />
                        </div>

                        <div class="form-group">
                            <label for="description" class="form-label">Description</label>
                            <textarea type="text" id="description" name="description" placeholder="Task Description" class="form-control form-control-lg"></textarea>
                            <x-input-error key="description" />
                        </div>

                        <div class="form-group">
                            <label for="image" class="form-label">Image</label>
                            <div class="form-control-wrap">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="image">
                                    <label class="custom-file-label" for="image">Choose File</label>
                                </div>
                            </div>
                            <x-input-error key="image" />
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="link" class="form-label">Link</label>
                                    <input name="link" id="link" type="url" placeholder="Task Link" class="form-control form-control-lg" />
                                    <x-input-error key="link" />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="reward" class="form-label">Reward ($)</label>
                                    <div class="form-control-wrap">
                                        <div class="form-icon form-icon-left">
                                            <em class="icon ni ni-sign-dollar"></em>
                                        </div>
                                        <input type="number" class="form-control form-control-lg appearance-none" name="reward" id="reward" placeholder="Task Reward">
                                    </div>
                                    <x-input-error key="reward" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button class="btn btn-primary">Create Task</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endpush