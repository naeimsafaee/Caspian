<div class="col-lg-12 col-md-12 col-sm-12">
    <div class="items justify-content-start  position-relative">
        <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">
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
                    دریافت
                </h5>
            </a>
            <a class="flex-box" href="{{ route('wallet_cash_withdraw') }}">
                <img class="margin-left" src="{{asset('assets/icon/bardasht.svg')}}">
                <h5 class="no-margin bold-text">
                    برداشت
                </h5>
            </a>
        </div>

        <a class="see-all margin-top flex-box ask-me" href="{{ route('wallet_transactions') }}">
            مشاهده تمام تراکنش ها
            <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <path d="M5.5 12.7852H19.5" stroke="#7A7982" stroke-width="1.5"
                      stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M10.5 7.78516L5.5 12.7852" stroke="#7A7982" stroke-width="1.5"
                      stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M10.5 17.7852L5.5 12.7852" stroke="#7A7982" stroke-width="1.5"
                      stroke-linecap="round" stroke-linejoin="round"/>
            </svg>

        </a>
    </div>
</div>
