@if($client_coin->coin->symbol === 'USDT')
    @php return false; @endphp
@endif

<ul class="z-index-1 card-table">
    <li class="card-table-items child-3 ">
        <div class="flex-box wallet-items">
            <img class="margin-left" src="{{ $client_coin->coin->icon }}" style="width: 30px;height:30px">
            <div>
                <div>{{ $client_coin->coin->persian_name }}</div>
                <div class="grey-text">{{ fa_number(number_format($client_coin->coin->price)) }} $</div>
            </div>
        </div>
    </li>
    <li class="card-table-items child-3">
        <div class="Inventory">
            <div>
                <span class="amount_coin">{{ fa_number($client_coin->amount) }}</span>

                {{--                <span>تومان</span>--}}

            </div>
            <div class="grey">

                <span>{{ fa_number(number_format($client_coin->dollar_value)) }}</span>

                <span>$</span>
            </div>
        </div>
    </li>
    <li class="card-table-items child-5">
        <div class="flex-box buttons-row">
            <a href="{{ route('exchange_buy' , ['Tether' , $client_coin->coin->name ]) }}">
                <img src="{{asset('assets/icon/card-back.svg')}}">
            </a>
            <a class="margin-left coin_update" data-id="{{ $client_coin->coin->id }}"><img src="{{asset('assets/icon/refresh.svg')}}"></a>
            <a class="deposit" href="{{ route('wallet_coin_deposit' , $client_coin->coin->name) }}">واریز</a>
            <a class="harvest" href="{{ route('wallet_coin_withdraw' , $client_coin->coin->name) }}">برداشت</a>
        </div>
    </li>
</ul>
