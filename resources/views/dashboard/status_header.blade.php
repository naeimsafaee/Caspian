@php

    $client = auth()->guard('clients')->user();

    $btc_value = \App\Models\ClientCoin::query()->where('client_id' , $client->id)->available()->get()->sum('btc_value');
    $bitcoin = \App\Models\Coin::query()->where('symbol', 'btc')->firstOrFail();
    $tether_coin1 = \App\Models\Coin::query()->where('symbol' , 'usdt')->firstOrFail();
    $tether_currency1 = \App\Models\Currency::query()->where('symbol', 'usdt')->first();

    $btc_pair = \App\Models\Pair::query()->where([
        'coin_id' => $bitcoin->id,
        'vs_coin_id' => $tether_coin1->id
    ])->first();


    $btc_changes = \App\Models\Change::query()->where('pair_id' , $btc_pair->id)
        ->whereDate('created_at' , '>=' , \Carbon\Carbon::today()->subDay())
        ->whereDate('created_at' , '<=' , \Carbon\Carbon::now())
        ->orderByDesc('price')
        ->select(\Illuminate\Support\Facades\DB::raw('hour(created_at)'),'price')
        ->groupBy(\Illuminate\Support\Facades\DB::raw('hour(created_at)'))
        ->get();


    $lowest_btc = 0;
    $highest_btc = 0;

    if($btc_changes->count() > 0){
        $lowest_btc = $btc_changes->first()->price * $tether_currency1->price;
        $highest_btc = $btc_changes->last()->price * $tether_currency1->price;
    }


@endphp

<div class="padding-item col-lg-12 col-md-12 col-sm-12">
    <div class="trades-items-row items flex-box justify-content-between  position-relative">
        <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">
        <div class="trades-items">
            <div class="flex-box justify-content-end">
                <span class="no-margin  bold-text">
                     موجودی :
                    <span>{{ fa_number(round($btc_value , 4)) }}</span>
                    <span>بیت کوین</span>
{{--                    <span class="green-text">٪۲.۹۸</span>--}}
                </span>
            </div>
        </div>
        <div class="trades-items z-index-1">
            <div class="grey-text">
                آخرین قیمت
            </div>
            <div class="grey-text" dir="ltr">
                <span>{{ fa_number(round($bitcoin->price , 4)) }}</span>
                <span>تومان</span>

            </div>
        </div>
        <div class="trades-items z-index-1">
            <div class="white-text bold-text">
                حداقل
            </div>
            <div class="green-text">
                <span>{{ fa_number(number_format($lowest_btc)) }}</span>
                <span>تومان</span>

            </div>
        </div>
        <div class="trades-items z-index-1">
            <div class="grey-text">
                حداکثر
            </div>
            <div class="red-item" dir="rtl">
                <span>{{ fa_number(number_format($highest_btc)) }}</span>
                <span>تومان</span>

            </div>
        </div>
        <div class="trades-items z-index-1">
            <a class="button p-button flex-box " href="{{ route('security') }}">
                تایید شده‌ی سطح
                {{ fa_number(auth()->guard('clients')->user()->level , false , true) }}
            </a>
        </div>

    </div>
</div>
