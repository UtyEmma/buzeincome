<x-profile-layout :user="$user" title="Referrals" subtitle="View your referrals and referral earnings!">

    <div class="row mb-3 g-3">
        <div class="col-md-3 col-8">
            <div class="border p-2 rounded border-primary">
                <em class="text-primary ni ni-wallet fs-22px"></em>
                <h3 class="text-primary fs-22px mb-0">$ <span class="fs-24px">{{$user->referrals_sum_amount ?? 0}}</span></h3>
                <p>Total Referral Earnings</p>
            </div>
        </div>

        <div class="col-md-7 col-12">
            <div class="d-flex g-2">
                <div class="flex-fill">
                    <input type="text" readonly style="user-select: all;" value="{{route('register', ['ref' => $user->referral_id])}}" class="form-control">
                </div>
                <div>
                    <button onclick="window.navigator.clipboard.writeText(`{{route('register', ['ref' => $user->referral_id])}}`)" class="btn btn-icon btn-primary"><em class="ni ni-copy icon"></em></button>
                </div>
            </div>
        </div>
    </div>

    <div class="nk-block nk-block-lg mt-3">
        <!-- <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h5 class="nk-block-title">Referrals</h5>
                <div class="nk-block-des">
                    <p>Using the most basic table markup, here’s how <code class="code-class">.table</code> based tables look by default.</p>
                </div>
            </div>
        </div> -->

        <table class="table table-tranx is-compact">
            <thead>
                <tr class="tb-tnx-head">
                    <th class="tb-tnx-id"><span class="">User</span></th>
                    <th class="">Amount Earned</th>
                    <th class="">Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($user->referrals as $referral)                    
                    <tr class="tb-tnx-item">
                        <td class="tb-tnx-id">
                            <a href="#"><span>{{$referral->user->firstname}} {{$referral->user->lastname}}</span></a>
                        </td>
                        <td class=""><span class="amount">${{$referral->amount}}</span>
                        </td>
                        <td class="">
                            {{$referral->created_at}}
                        </td>
                    </tr>
                @empty
                    <h4>No referrals found!</h4>
                @endforelse
            </tbody>
        </table>
    </div>
</x-profile-layout>