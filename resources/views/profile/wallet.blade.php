<x-profile-layout :user="$user" :title="'Wallet'" :subtitle="'Manage your account earnings and withdrawals'">


    <div class="mb-3">
        <div class="row mb-3 g-2">
            <div class="col-md-3 col-6">
                <div class="border p-2 rounded border-primary">
                    <em class="text-primary ni ni-wallet fs-22px"></em>
                    <h3 class="text-primary fs-22px mb-0">$ <span class="fs-24px">{{$user->wallet->main_bal}}</span></h3>
                    <p>Main Balance</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="border p-2 rounded border-primary">
                    <em class="text-primary ni ni-wallet-saving fs-22px"></em>
                    <h3 class="text-primary fs-22px mb-0">$ <span class="fs-24px">{{$user->wallet->ref_bal}}</span></h3>
                    <p>Referral Balance</p>
                </div>
            </div>
            <div class="col-md-3 col-12">
                <div class="border p-2 rounded border-primary">
                    <em class="text-primary ni ni-money fs-22px"></em>
                    <h3 class="text-primary fs-22px mb-0">$ <span class="fs-24px">{{$user->wallet->escrow_bal}}</span></h3>
                    <p>Pending Withdrawal</p>
                </div>
            </div>
        </div>
    
        <div class="mt-3">
            <x-wallet.withdrawal-modal />
        </div>
    </div>


    <div class="nk-block nk-block-lg">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h5 class="nk-block-title">Withdrawals</h5>
                <div class="nk-block-des">
                    <p>View all your recent transactions here.</p>
                </div>
            </div>
        </div>

        <table class="table table-tranx is-compact">
            <thead>
                <tr class="">
                    <th><span class="">Reference</span></th>
                    <th class="">Amount</th>
                    <th class="">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($withdrawals as $withdrawal)                    
                    <tr >
                        <td >
                            <a href="#"><span>{{$withdrawal->reference}}</span></a>
                        </td>
                        <td class="">
                            <span class="amount">${{$withdrawal->amount}}</span>
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

        <div>
            {{$withdrawals->links()}}
        </div>
    </div>
</x-profile-layout>