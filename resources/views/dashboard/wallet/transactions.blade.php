@extends('dashboard.index')

@section('banner')
    @if (\Session::has('swap'))

        @php
            $swap = \App\Models\SwapHistory::query()->find(\Session::get('swap'));

            $vs_coin = \App\Models\Coin::query()->where('symbol', $swap->vs_coin)->first();
            if (!$vs_coin)
                $vs_coin = \App\Models\Currency::query()->where('symbol', $swap->vs_coin)->first();

        @endphp

        @if($swap && $vs_coin)
            <div class="padding-item col-lg-12 col-md-12 col-sm-12" style="margin-top: 11px;">
                <div class="flex-box justify-content-between green-box">
                    <h5 class="no-margin">
                        کیف پول شما به میزان {{ $swap->vs_coin_amount }} {{ $vs_coin->persian_name }} شارژ شد
                    </h5>
                    <a href="{{ route('exchange_buy' , ['bitcoin' , 'tether']) }}">
                        بازگشت به تبادل
                    </a>
                </div>
            </div>
        @endif
    @endif

@endsection

@section('content_head')
    @if($transactions->count() !== 0)
        <div class="history-item flex-box">
            <h5 class="no-margin">
                تراکنش ها
            </h5>
        </div>
    @endif
@endsection

@section('content')

    @if($transactions->count() !== 0)
        <div class="padding-item col-lg-12 col-md-12 col-sm-12 web-item" style="margin-top: -60px">
            <ul class="items flex-box blur-hover table-title-item">

                <li class="child1" data-label=" ">

                </li>
                <li class="child1" data-label=" ">
                    <div class="flex-box">
                        نوع
                        <img src="{{asset('assets/icon/triangle.svg')}}">
                    </div>
                </li>
                <li class="child1 position-relative" data-label="  ">
                    <div class="flex-box">
                        زمان
                        <img src="{{asset('assets/icon/triangle.svg')}}">
                    </div>

                </li>
                <li class=" child1 " data-label=" ">
                    <div class="flex-box">
                        میزان
                        <img src="{{asset('assets/icon/triangle.svg')}}">
                    </div>
                </li>
                <li class="child1 " data-label="">
                    <div class="flex-box">
                        وضعیت
                        <img src="{{asset('assets/icon/triangle.svg')}}">
                    </div>
                </li>
                <li class="child1" data-label="">

                </li>
            </ul>
        </div>

        @each('components.transaction' , $transactions , 'transaction')
    @endif


    @if($swaps->count() !== 0)
        <div class="history-item flex-box" style="margin-right: 10px;margin-top: 60px">
            <h5 class="no-margin">
                تبادل ها
            </h5>
        </div>

        <div class="padding-item col-lg-12 col-md-12 col-sm-12 web-item">
            <ul class="items flex-box blur-hover table-title-item">


                <li class="child1 position-relative" data-label="  ">
                    <div class="flex-box">
                        زمان
                        <img src="{{asset('assets/icon/triangle.svg')}}">
                    </div>
                </li>

                <li class=" child1 " data-label=" ">
                    <div class="flex-box">
                        هزینه
                        <img src="{{asset('assets/icon/triangle.svg')}}">
                    </div>
                </li>

                <li class="child1 " data-label="">
                    <div class="flex-box">
                        دریافتی
                        <img src="{{asset('assets/icon/triangle.svg')}}">
                    </div>
                </li>

            </ul>
        </div>

        @each('components.swap' , $swaps , 'swap')

    @endif


    @if($deposit_cache->count() !== 0)
        <div class="history-item flex-box" style="margin-right: 10px;margin-top: 60px">
            <h5 class="no-margin">
                واریزی ها
            </h5>
        </div>

        <div class="padding-item col-lg-12 col-md-12 col-sm-12 web-item">
            <ul class="items flex-box blur-hover table-title-item">
                <li class="child1 position-relative" data-label="  ">
                    <div class="flex-box">
                        زمان
                        <img src="{{asset('assets/icon/triangle.svg')}}">
                    </div>

                </li>
                <li class=" child1 " data-label=" ">
                    <div class="flex-box">
                        میزان
                        <img src="{{asset('assets/icon/triangle.svg')}}">
                    </div>
                </li>
                <li class="child1 " data-label="">
                    <div class="flex-box">
                        وضعیت
                        <img src="{{asset('assets/icon/triangle.svg')}}">
                    </div>
                </li>
            </ul>
        </div>

        @each('components.deposit_cache' , $deposit_cache , 'deposit')
    @endif


    @if($withdraw_cache->count() !== 0)
        <div class="history-item flex-box" style="margin-right: 10px;margin-top: 60px">
            <h5 class="no-margin">
                برداشت ها
            </h5>
        </div>

        <div class="padding-item col-lg-12 col-md-12 col-sm-12 web-item">
            <ul class="items flex-box blur-hover table-title-item">
                <li class="child1 position-relative" data-label="  ">
                    <div class="flex-box">
                        زمان
                        <img src="{{asset('assets/icon/triangle.svg')}}">
                    </div>

                </li>
                <li class=" child1 " data-label=" ">
                    <div class="flex-box">
                        میزان
                        <img src="{{asset('assets/icon/triangle.svg')}}">
                    </div>
                </li>
                <li class="child1 " data-label="">
                    <div class="flex-box">
                        وضعیت
                        <img src="{{asset('assets/icon/triangle.svg')}}">
                    </div>
                </li>
            </ul>
        </div>

        @each('components.withdraw_cache' , $withdraw_cache , 'withdraw')
    @endif

@endsection
