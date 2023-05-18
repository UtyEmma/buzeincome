@inject('status', 'App\Library\Status')

<x-dashboard-layout>
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Admins</h3>
                        </div>
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li>
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-right">
                                                    <em class="icon ni ni-search"></em>
                                                </div>
                                                <input type="text" class="form-control" id="default-04" placeholder="Quick search by id">
                                            </div>
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
                                            <a href="#" class="btn btn-primary d-inline-flex" data-toggle="modal" data-target="#add-new-admin"><em class="icon ni ni-plus"></em><span>Create Admin</span></a>
                                        </li>


                                        <x-admin.create-admin-modal id="add-new-admin" />
                                    </ul>
                                </div>
                            </div>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsvive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class=""><span>Name</span></th>
                                            <th class=""><span>Email Address</span></th>
                                            <th class=""><span class="d-none d-mb-block">Status</span></th>
                                            <th class=""></th>
                                        </tr>
                                    </thead>
            
                                    @forelse ($admins as $admin)
                                        <x-admin.admin-item :admin="$admin" />
                                    @empty
                                        <div class="nk-tb-item ">
                                            <div>
            
                                            </div>
                                        </div>
                                    @endforelse
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>