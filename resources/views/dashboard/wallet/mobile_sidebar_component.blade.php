<div class="flex-box justify-content-start">
    <img class="margin-left" src="{{asset('assets/icon/wallet.svg')}}">
    <h5 class="no-margin bold-text">
        کیف پول
    </h5>

</div>
<div class="gradient-line"></div>
<p class="grey-text">
    موجودی کلی
</p>
<div class="flex-box justify-content-start">
    <img class="margin-left" src="{{asset('assets/icon/t.svg')}}">
    <h5 style="direction: ltr" class="no-margin bold-text">
        <span>{{ fa_number(number_format(auth()->guard('clients')->user()->wallet)) }}</span>
        <span>T</span>
    </h5>

</div>
<div class="gradient-line"></div>

<a class="margin-bottom button p-button flex-box " href="{{ route('wallet') }}">
    <img class="margin-left"  src="{{asset('assets/icon/card-wallet.svg')}}">
    کیف پول‌های من
</a>

<div class="flex-box justify-content-between">
    <a class="flex-box" href="{{ route('wallet_cash_deposit') }}">
        <img class="margin-left" src="{{asset('assets/icon/daryaft.svg')}}">
        <h5 class="no-margin bold-text">
            واریز
        </h5>
    </a>
    <a class="flex-box" href="{{ route('wallet_cash_withdraw') }}">
        <img class="margin-left" src="{{asset('assets/icon/bardasht.svg')}}">
        <h5 class="no-margin bold-text">
            برداشت
        </h5>
    </a>
</div>
