<div class="padding-item col-lg-12 col-md-12 col-sm-12">

    <ul class="items flex-box blur-hover table-body-item">
        <div class="glow"></div>
        <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">
        <li class="child1" data-label=" ">
            <h5 class="no-margin grey-text">
                ۷۸۹۸۲۳۴
            </h5>
        </li>
        <li class="child1 position-relative" data-label="نوع  ">
            <div class="flex-box justify-content-start kind-items">
                @if($transaction instanceof \App\Models\Withdraw)
                    <img src="{{asset('assets/icon/bardasht.svg')}}">
                    <p class="white-text no-margin">
                        برداشت
                    </p>
                @else
                    <img src="{{asset('assets/icon/daryaft.svg')}}">
                    <p class="white-text no-margin">
                        دریافت
                    </p>
                @endif
            </div>
        </li>
        <li class="child1  " data-label="زمان">
            <div class="date">
                <span>{{ $transaction->persian_date }}</span>
            </div>
        </li>
        <li class="child1 price" data-label=" میزان">
            <h5 class="no-margin text-center white-text">
                {{ $transaction->amount }}
                <span>
                    {{ strtoupper($transaction->coin->symbol) }}
                </span>
            </h5>
        </li>
        <li class="child1 price" data-label=" وضعیت">
            <div class="flex-box">
                @if($transaction->status === 'waiting')
                    <p class="yellow-item no-margin bold-text">
                        در حال انتظار
                    </p>
                    <img class="margin-left2" src="{{asset('assets/icon/wait.svg')}}">
                @elseif($transaction->status === 'sent')
                    <p class="yellow-item no-margin bold-text">
                        ارسال شده
                    </p>
                    <img class="margin-left2" src="{{asset('assets/icon/wait.svg')}}">
                @elseif($transaction->status === 'confirmed')
                    <p class="green-item no-margin bold-text">
                        موفق
                    </p>
                    <img class="margin-left2" src="{{asset('assets/icon/pay-su.svg')}}">
                @elseif($transaction->status === 'rejected')
                    <p class="red-item no-margin bold-text">
                        ناموفق
                    </p>
                    <img class="margin-left2" src="{{asset('assets/icon/fail.svg')}}">
                @endif
            </div>
        </li>
        <li data-label="">
            <a class="flex-box black-button" href="{{ $transaction instanceof \App\Models\Withdraw ? route('wallet_coin_withdraw_result' , $transaction->id) : '' }}">
                جزییات
            </a>
        </li>
    </ul>
</div>
