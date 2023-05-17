<x-users.user-layout :user="$user">
    <div class="nk-block">
    <table class="table table-tranx is-compact">
            <thead>
                <tr class="tb-tnx-head">
                    <th class="tb-tnx-id"><span class="">Reference</span></th>
                    <th class="">Amount</th>
                    <th class="">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($user->withdrawals as $withdrawal)                    
                    <tr class="tb-tnx-item">
                        <td class="tb-tnx-id">
                            <a href="#"><span>{{$withdrawal->reference}}</span></a>
                        </td>
                        <td class=""><span class="amount">${{$withdrawal->amount}}</span>
                        </td>
                        <td class="">
                            <span class="badge badge-dot badge-warning">{{$withdrawal->status}}</span>
                        </td>
                    </tr>
                @empty
                    <h4>No withdrawals found!</h4>
                @endforelse
            </tbody>
        </table>
    </div>
</x-users.user-layout>