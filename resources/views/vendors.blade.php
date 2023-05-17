@inject('status', 'App\Library\Status')

<x-dashboard-layout>
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Vendors</h3>
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

                                        <x-vendors.create-vendor-modal />
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="nk-block">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table mb-3">
                                    <thead class="">
                                        <td class=""><span>Vendor</span></td>
                                        <td class=""><span>Active Coupons</span></td>
                                        <td class=""><span>Total Coupons</span></td>
                                        <td class=""><span>Sales</span></td>
                                        <td class=""><span >Status</span></td>
                                        <td class="">
                                            <!-- <ul class="nk-tb-actions gx-1 my-n1">
                                                <li>
                                                    <div class="drodown">
                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger mr-n1" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li><a href="#"><em class="icon ni ni-edit"></em><span>Update Status</span></a></li>
                                                                <li><a href="#"><em class="icon ni ni-truck"></em><span>Mark as Delivered</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul> -->
                                        </td>
                                    </thead>
            
                                    @forelse ($vendors as $vendor)
                                        <x-vendors.vendor-item :vendor="$vendor" />
                                    @empty
                                        <div class="nk-tb-item "></div>
                                    @endforelse
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</x-dashboard-layout>