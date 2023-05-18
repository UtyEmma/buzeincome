<x-dashboard-layout>
@inject('status', 'App\Library\Status')

<div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Users</h3>
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
                                                        <li><a href="{{route('users.list', [
                                                            'status' => $status::ACTIVE    
                                                        ])}}"><span>{{$status::ACTIVE}}</span></a></li>
                                                        <li><a href="{{route('users.list', [
                                                            'status' => $status::SUSPENDED    
                                                        ])}}"><span>{{$status::SUSPENDED}}</span></a></li>
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
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone/Email</th>
                                        <th scope="col">Task Completed</th>
                                        <th scope="col">Account Details</th>
                                        <th scope="col">Status</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $user)
                                        <tr>
                                            <!-- <th scope="row">1</th> -->
                                            <td>
                                                {{$user->firstname}} {{$user->lastname}} 
                                                <br>
                                                <a href="{{$user->twitter}}"><em class="icon ni ni-twitter"></em></a>
                                                <a href="{{$user->facebook}}"><em class="icon ni ni-facebook-alt"></em></a>
                                                <a href="{{$user->instagram}}"><em class="icon ni ni-instagram"></em></a>
                                                <a href="{{$user->tiktok}}"><em class="icon ni ni-tiktok"></em></a>
                                            </td>
                                            <td>{{$user->email}} <br /> {{$user->phone}} </td>
                                            <td>{{number_format($user->task_completions_count)}}</td>
                                            <td>
                                                @if ($user->bankAccount)                                                
                                                    {{$user->bankAccount->bankInfo->name}} - {{$user->bankAccount->account_number}} <span class="ml-1" role="button" onclick="window.navigator.clipboard.writeText('{{$user->bankAccount->account_number}}')"><em class="ni ni-copy"></em></span> <br /> {{$user->bankAccount->account_name}}
                                                @else
                                                    Not Yet Set
                                                @endif
                                            </td>
                                            <td>{{$user->status}}</td>
                                            <td>
                                                <ul class=" gx-1 my-n1">
                                                    <li>
                                                        <div class="drodown">
                                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger mr-n1" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><x-swal href="{{route('users.delete', ['user' => $user->id])}}"><em class="icon ni ni-trash"></em><span>Edit User</span></x-swal></li>
                                                                    <li><x-swal href="{{route('users.delete', ['user' => $user->id])}}"><em class="icon ni ni-trash"></em><span>Delete</span></x-swal></li>
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
                                {{$users->links()}}
                            </div>
                        </div><!-- .nk-block-between -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>