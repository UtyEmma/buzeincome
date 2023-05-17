@inject('status', 'App\Library\Status')

<x-dashboard-layout>
<div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Withdrawals</h3>
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
                                                        <li><a href="{{route('withdrawals', [
                                                            'status' => $status::NEW    
                                                        ])}}"><span>{{$status::NEW}}</span></a></li>
                                                        <li><a href="{{route('withdrawals', [
                                                            'status' => $status::DENIED    
                                                        ])}}"><span>{{$status::DENIED}}</span></a></li>
                                                        <li><a href="{{route('withdrawals', [
                                                            'status' => $status::COMPLETED   
                                                        ])}}" ><span>{{$status::COMPLETED}}</span></a></li>
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

                <div class="card card-preview">
                    <div class="card-inner">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <!-- <th scope="col">#</th> -->
                                        <th scope="col">Reference</th>
                                        <th scope="col">User</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Account Details</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($withdrawals as $withdrawal)
                                        <tr>
                                            <!-- <th scope="row">1</th> -->
                                            <td>{{$withdrawal->reference}}</td>
                                            <td>{{$withdrawal->user->firstname}} {{$withdrawal->user->lastname}} </td>
                                            <td>$ {{number_format($withdrawal->amount)}}</td>
                                            <td>{{$withdrawal->user->bankAccount->bankInfo->name}} - {{$withdrawal->user->bankAccount->account_number}} <span class="ml-1" role="button" onclick="window.navigator.clipboard.writeText('{{$withdrawal->user->bankAccount->account_number}}')"><em class="ni ni-copy"></em></span> <br /> {{$withdrawal->user->bankAccount->account_name}}</td>
                                            <td>{{$withdrawal->status}}</td>
                                            <td>
                                                @if ($withdrawal->status === $status::NEW)
                                                    <x-swal href="{{route('withdrawal.approve', [
                                                            'status' => $status::COMPLETED,
                                                            'withdrawal' => $withdrawal->id
                                                        ])}}" class="btn btn-sm btn-success">Approve</x-swal>
                                                    <x-swal href="{{route('withdrawal.approve', [
                                                            'status' => $status::DENIED,
                                                            'withdrawal' => $withdrawal->id
                                                        ])}}" class="btn btn-danger btn-sm">Decline</x-swal>
                                                @endif
                                            </td>
                                            <td>
                                                <ul class="nk-tb-actions gx-1 my-n1">
                                                    <li>
                                                        <div class="drodown">
                                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger mr-n1" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><x-swal href="{{route('withdrawal.delete', ['withdrawal' => $withdrawal->id])}}"><em class="icon ni ni-trash"></em><span>Delete</span></x-swal></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
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
                                {{$withdrawals->links()}}
                            </div>
                        </div><!-- .nk-block-between -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>