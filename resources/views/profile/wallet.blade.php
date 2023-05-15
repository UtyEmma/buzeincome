<x-profile-layout :user="$user" :title="'Wallet'" :subtitle="'Manage your account earnings and withdrawals'">


    <div class="mb-3">
        <div class="row mb-3">
            <div class="col-md-3 col-8">
                <div class="border p-2 rounded border-primary">
                    <em class="text-primary ni ni-wallet fs-22px"></em>
                    <h3 class="text-primary fs-22px mb-0">$ <span class="fs-24px">{{$user->wallet->main_bal}}</span></h3>
                    <p>Available Balance</p>
                </div>
            </div>
            <div class="col-md-3 col-8">
                <div class="border p-2 rounded border-primary">
                    <em class="text-primary ni ni-money fs-22px"></em>
                    <h3 class="text-primary fs-22px mb-0">$ <span class="fs-24px">{{$user->wallet->escrow_bal}}</span></h3>
                    <p>Pending Withdrawal</p>
                </div>
            </div>
        </div>
    
        <x-wallet.withdrawal-modal />
    </div>


    <div class="nk-block nk-block-lg">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h5 class="nk-block-title">Withdrawals</h5>
                <div class="nk-block-des">
                    <p>Using the most basic table markup, here’s how <code class="code-class">.table</code> based tables look by default.</p>
                </div>
            </div>
        </div>

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
</x-profile-layout>