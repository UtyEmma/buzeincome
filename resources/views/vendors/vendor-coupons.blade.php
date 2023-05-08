<x-dashboard-layout>
    <div class="mb-4 d-flex justify-content-between">
        <h3 class="nk-block-title page-title">Active Coupons</h3>

        <button class="btn btn-primary">Coupon History</button>
    </div>

    <div class="row g-3">
        @forelse ($coupons as $coupon)
            <div x-data="{show: false}" class="col-md-3 col-2">
                <div class="card">
                    <div  class="card-body text-center">
                        <div  class="bg-lighter rounded p-1">
                            <code x-transition x-show="show == false" class="fs-22px fw-bold">**********</code>
                            <code x-transition x-show="show" class="fs-22px fw-bold">{{$coupon->code}}</code>
                        </div>

                        <div class="mt-2 d-flex gx-3 justify-content-center">
                            <button @click="show = !show" class="btn mr-2 btn-sm btn-light btn-icon btn-clipboard">
                                <em class="icon ni "  :class="show ? 'ni-eye-off' : 'ni-eye'" ></em>
                            </button>
                            <button onclick="navigator.clipboard.writeText('{{$coupon->code}}')" class="btn mr-2 btn-sm btn-light btn-icon btn-clipboard">
                                <em class="icon ni ni-copy" ></em>
                            </button>
                            <button onclick="window.navigator.share('{{$coupon->code}}')" class="btn btn-sm btn-light btn-icon btn-clipboard">
                                <em class="icon ni ni-share" ></em>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @empty

        @endforelse
    </div>
</x-dashboard-layout>