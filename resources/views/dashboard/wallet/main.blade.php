@extends('dashboard.index')


@section('content_head')
    <div class="history-item flex-box">
        <h5 class="no-margin">
            کیف پول‌های من
        </h5>
    </div>
@endsection


@section('content')

    <div class="padding-item col-lg-12 col-md-12 col-sm-12">
        <div class="cards-row items  position-relative overflow-visible">
            <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">
            <ul class="z-index-1  card-table-title">
                <li class="card-table-title-items child-3 "> کیف پول/قیمت جهانی</li>
                <li class="card-table-title-items child-3"> موجودی</li>
                <li class="card-table-title-items child-5"></li>
            </ul>

            <ul class="z-index-1 card-table">
                <li class="card-table-items child-3 ">
                    <div class="flex-box wallet-items">
                        <img class="margin-left" src="{{asset('assets/icon/iran.svg')}}">
                        <div>
                            <div>ریال</div>
                        </div>
                    </div>
                </li>
                <li class="card-table-items child-3">
                    <div class="Inventory">
                        <div>
                            <span>{{ fa_number(number_format(auth()->guard('clients')->user()->wallet)) }}</span>
                            <span>تومان</span>
                        </div>
                    </div>
                </li>
                <li class="card-table-items child-5">
                    <div class="flex-box buttons-row">
                        <a><img src="{{asset('assets/icon/card-back.svg')}}"></a>
                        <a class="deposit" href="{{ route('wallet_cash_deposit') }}">واریز</a>
                        <a class="harvest" href="{{ route('wallet_cash_withdraw') }}">برداشت</a>
                    </div>
                </li>
            </ul>

            <ul class="z-index-1 card-table">
                <li class="card-table-items child-3 ">
                    <div class="flex-box wallet-items">
                        <img class="margin-left" src="{{asset('assets/crypto/white/usdt.svg')}}"
                             style="width: 30px;height:30px">
                        <div>
                            <div>تتر</div>
                            <div class="grey-text">{{ fa_number(number_format($tether_price)) }} تومان</div>
                        </div>
                    </div>
                </li>
                <li class="card-table-items child-3">
                    <div class="Inventory">
                        <div>
                            <span>{{ $tether_amount }}</span>
                        </div>
                        <div class="grey">
                            <span>$ {{ $tether_amount }}</span>
                        </div>
                    </div>
                </li>
                <li class="card-table-items child-5">
                    <div class="flex-box buttons-row">
                        <a><img src="{{asset('assets/icon/card-back.svg')}}"></a>
                        <a class="deposit" href="{{ route('wallet_coin_deposit' , 'tether') }}">واریز</a>
                        <a class="harvest" href="{{ route('wallet_coin_withdraw' , 'tether') }}">برداشت</a>
                    </div>
                </li>
            </ul>

            @each('components.client_coin' , $client_coins , 'client_coin')

        </div>
    </div>

@endsection

@section('scripts')

    <script>

        $('.coin_update').click(function (){
            const coin_id = $(this).data('id');

            $.ajax({
                url: '{{ route('update_coin_amount') }}',
                method: 'get',
                data: {_token: "{{ csrf_token() }}" , coin_id: coin_id}
            }).then((res) => {

                $(this).parent().parent().parent().find('.amount_coin').text(res.amount)

            }).catch((err) => {

            })

        })

    </script>

@endsection