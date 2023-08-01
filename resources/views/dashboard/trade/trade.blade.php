<!DOCTYPE html>
<html lang="en">
@include('layout.head')

<body>
<div class="container-fluid index">

    <div class="modal fade" id="add-crypto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content ">
                <div class="modal-headers flex-box justify-content-center">
                    <h5> جستجو ارز </h5>
                    <img data-dismiss="modal" src="{{asset('assets/icon/modal-close.svg')}}">

                </div>
                <div class="row padding">
                    <div class="col-12">
                        <form class="search-form ">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.7138 6.8382C18.1647 9.28913 18.1647 13.2629 15.7138 15.7138C13.2629 18.1647 9.28913 18.1647 6.8382 15.7138C4.38727 13.2629 4.38727 9.28913 6.8382 6.8382C9.28913 4.38727 13.2629 4.38727 15.7138 6.8382"
                                      stroke="#D7D4ED" stroke-width="1.5" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                                <path d="M19 19L15.71 15.71" stroke="#D7D4ED" stroke-width="1.5" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>
                            <input class="modalSearchCoin" placeholder=" جستجو کنید">
                        </form>

                    </div>
                    <div class="col-12 ltr-direct">
                        <a class="crypto-tags active" data-value="">All</a>
                        <a class="crypto-tags" data-value='["usdt","usd"]'>fiat</a>
                        <a class="crypto-tags" data-value='["btc"]'>BTC</a>
                        <a class="crypto-tags" data-value='["eth"]'>ETH</a>

                    </div>
                    <div class="col-12">
                        <table class="ltr-direct modalShowCoinItem">
                            <thead>
                            <tr>
                                <th>Symbol</th>
                                <th>DESCRIPTION</th>
                                <th>
                                    <a class="flex-box blue-text justify-content-end">
                                        <img src="{{ asset('assets/icon/all.svg') }}">
                                        All sources
{{--                                        <img src="{{ asset('assets/icon/blur-arrow.svg') }}">--}}
                                    </a>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Models\Pair::all() as $_pair)
                                <tr class="chooseAddCoinRow"
                                    data-coin="{{ strtoupper($_pair->coin->symbol) }}{{ strtoupper($_pair->vs_coin->symbol) }}"
                                    data-coin_with_dash="{{ strtoupper($_pair->coin->symbol) }}-{{ strtoupper($_pair->vs_coin->symbol) }}"
                                    data-pair_first_coin="{{ strtoupper($_pair->coin->symbol) }}"
                                    data-pair_vs_coin="{{ strtoupper($_pair->vs_coin->symbol) }}"
                                    data-coin_name="{{ strtoupper($_pair->coin->name) }}"
                                    data-vs_coin_name="{{ strtoupper($_pair->vs_coin->name) }}"
                                >
                                    <td class="blue-text" data-column="Symbol">{{ strtoupper($_pair->coin->symbol) }}
                                        -{{ strtoupper($_pair->vs_coin->symbol) }}</td>
                                    <td class="white-text"
                                        data-column="DESCRIPTION">{{ strtoupper($_pair->coin->name) }}
                                        / {{ strtoupper($_pair->vs_coin->name) }} </td>
                                    <td>
                                        <div class="flex-box justify-content-end">
                                            <p class="no-margin grey-text littel-text">Crypto</p>
                                            <p class=" crypto-name">
                                                BINANCE
                                            </p>
                                            <img src="/assets/icon/Filled%20outline.svg">
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="overlay"></div>

    @include('layout.mobile_menu')

    <div class="row main-row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="container">
                <img class="position-absolute left-cloud" src="{{asset('assets/icon/clods3.svg')}}">
                <div class="row">

                    @include('layout.header')

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <section class="main position-relative">
                            <div class="blur-circle big-blur right-bottom"></div>
                            <div class="blur-circle big-blur left-bottom"></div>
                            <img class="clouds position-absolute right-bottom"
                                 src="{{asset('assets/icon/cloud2.svg')}}">
                            <div class="row margin-bottom">
                                <div class="flex-box justify-content-start padding-item col-lg-12 col-md-12 col-sm-12">
                                    <h2 class="bold-text no-margin margin-left">موقعیت </h2>
                                    <div class=" flex-box justify-content-start" id="pairs_container">

                                        <a class="margin-left flex-box remove-chart">
                                            <img class="margin-left" src="{{asset('assets/icon/close-btn.svg')}}">
                                            <p class="white-text no-margin">
                                                {{ strtoupper(str_replace("-" , '' ,$pair)) }}
                                            </p>
                                        </a>

                                        <div class="flex-box tags-row"></div>
                                        <a data-toggle="modal" data-target="#add-crypto" class=" flex-box add-chart">
                                            <img src="{{asset('assets/icon/white-pluse.svg')}}">
                                            <p class="white-text no-margin new_coin">
                                                ارز جدید
                                            </p>
                                        </a>

                                    </div>

                                </div>
                                <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                                    <div class="items flex-box justify-content-between  position-relative">
                                        {{--<img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">--}}
                                        <div class="trades-items">
                                            <div class="flex-box justify-content-end">

                                                <img class="cryoto-image coin_icon" style="width:39px;height: 63px"
                                                     src="{{ $coins[0]->icon }}">

                                                <span class="no-margin crypto-name bold-text ">
                                                    <span class="persian_name">{{ $coins[0]->persian_name }}</span>
                                                    <span class="coin_symbol">({{ strtoupper($coins[0]->symbol) }})</span>
                                                </span>
                                                <span class="no-margin grey-text littel-text">{{ strtoupper($coins[1]->symbol) }}</span>

                                            </div>
                                        </div>
                                        <div class="trades-items">
                                            <div class="green-text">
                                            </div>
                                            <div class="grey-text" dir="ltr">
                                                <span class="coin_price">{{ $price }}</span>
                                                <span class="vs_coin_symbol">{{ strtoupper($coins[1]->symbol)  }}</span>
                                            </div>
                                        </div>
                                        <div class="trades-items">
                                            <div class="white-text bold-text">
                                                ۲۴ ساعت
                                            </div>
                                            <div class="grey-text">
                                                گذشته
                                            </div>
                                        </div>
                                        <div class="trades-items">
                                            <div class="grey-text">
                                                تغییرات
                                            </div>
                                            <div class="{{ $today_change_percent >= 0 ? 'green-text' : 'red-text' }}"
                                                 dir="rtl">
                                                <span>{{ round($today_change_percent , 4) }}</span>
                                                <span>%</span>

                                            </div>
                                        </div>
                                        <div class="trades-items">
                                            <div class="grey-text">
                                                بالاترین قیمت
                                            </div>
                                            <div class="grey-text" dir="rtl">
                                                <span>{{ fa_number(round($today_high , 4)) }}</span>
                                                {{--<span>{{ strtoupper($coins[1]->symbol) }}</span>--}}

                                            </div>
                                        </div>
                                        <div class="trades-items">
                                            <div class="grey-text">
                                                پایین‌ترین قیمت
                                            </div>
                                            <div class="grey-text" dir="rtl">
                                                <span>{{ fa_number(round($today_low , 4)) }}</span>
                                                {{--<span>{{ strtoupper($coins[1]->symbol) }}</span>--}}

                                            </div>
                                        </div>
                                        {{--<div class="trades-items">
                                            <div class="grey-text">
                                                قیمت جهانی
                                            </div>
                                            <div class="green-text" dir="ltr">
                                                <span>۲۰۹.۵</span>
                                                <span>$</span>

                                            </div>
                                        </div>--}}
                                        <div class="trades-items">
                                            <div class="grey-text">
                                                میانگین قیمت
                                            </div>
                                            <div class="grey-text" dir="rtl">
                                                <span>{{ fa_number(round($today_average , 4)) }}</span>
                                                {{--<span>{{ strtoupper($coins[1]->symbol) }}</span>--}}

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class=" col-lg-12 col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                                        </div>
                                        <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                                            <div class="no-padding items justify-content-start  position-relative">
                                                <div class="tradingview-widget-container">
                                                    <div id="tradingview_e692f" style="height: 610px"></div>
                                                    <div class="tradingview-widget-copyright">
                                                        <a href="https://www.tradingview.com/symbols/{{ strtoupper(str_replace("-" , '' ,$pair)) }}/"
                                                           rel="noopener" target="_blank">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                                            <div class="items justify-content-start  position-relative">
                                                <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">
                                                <div class="row">
                                                    <div class="position-relative padding-item col-lg-12 col-md-12 col-sm-12">
                                                    </div>
                                                    <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                                                        <form id="title-tab" class="position-relative">
                                                            <!-- Nav tabs -->
                                                            <ul class="nav nav-tabs nav-justified no-border"
                                                                role="tablist">

                                                                <div class="slider slider1"></div>

                                                                <li class="nav-item">
                                                                    <a class="nav-link active" id="email-tab"
                                                                       data-toggle="tab" href="#email" role="tab"
                                                                       aria-controls="home" aria-selected="true">
                                                                        <i class="fas fa-home"></i>
                                                                        فروش
                                                                    </a>
                                                                </li>

                                                                <li class="nav-item">
                                                                    <a class="nav-link" id="mobile-tab"
                                                                       data-toggle="tab" href="#mobile" role="tab"
                                                                       aria-controls="profile" aria-selected="false">
                                                                        <i class="fas fa-id-card"></i>
                                                                        خرید
                                                                    </a>
                                                                </li>
                                                            </ul>

                                                            <!-- Tab panes -->
                                                            <div class="tab-content">
                                                                <div class="tab-pane fade show active" id="email"
                                                                     role="tabpanel" aria-labelledby="email-tab">
                                                                    <form class="position-relative">
                                                                        <div class="row">

                                                                            <div class="padding-item col-lg-3 col-md-3 col-sm-12">
                                                                                <div class="drop-down no-margin select-price">

                                                                                    <div class="selected ">
                                                                                        <a class="purple-item flex-box justify-content-between">
                                                                                            <span class="chose">  قیمت انتخابی </span>
                                                                                            <img src="{{asset('assets/icon/arrow s.svg')}}">

                                                                                        </a>
                                                                                    </div>

                                                                                    <div class="options">
                                                                                        <ul>
                                                                                            <img class="z-index-0 bg"
                                                                                                 src="{{asset('assets/photo/input-blur.png')}}">

                                                                                            <li onclick="set_market_sell(false)">
                                                                                                <a>
                                                                                                    <p class="white-text no-margin text-center">
                                                                                                        قیمت انتخابی
                                                                                                    </p>
                                                                                                </a>
                                                                                            </li>
                                                                                            <li onclick="set_market_sell(true)">
                                                                                                <a>
                                                                                                    <p class="white-text no-margin text-center">
                                                                                                        قیمت مارکت
                                                                                                    </p>
                                                                                                </a>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-lg-12 col-md-12 col-sm-12">

                                                                                <div class="row">
                                                                                    <div class="padding-item col-lg-4 col-md-6 col-sm-12">
                                                                                        <div class="input-row">
                                                                                            <label>حجم</label>
                                                                                            <input class="padding-right ltr-direct padding-left "
                                                                                                   id="amount_sell_input"
                                                                                                   value="0%">
                                                                                            <div class="currency-item">
                                                                                                حجم
                                                                                            </div>
                                                                                            <div class="currency-item a-left-item coin_symbol">
                                                                                                {{ strtoupper($coins[0]->symbol) }}
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="padding-item col-lg-4 col-md-6 col-sm-12">
                                                                                        <div class="input-row">
                                                                                            <label>
                                                                                                قیمت
                                                                                            </label>
                                                                                            <input class="padding-right ltr-direct padding-left"
                                                                                                   id="price_sell_input"
                                                                                                   value="{{ round($coins[0]->price / $coins[1]->price , 8)  }}">
                                                                                            <div class="currency-item">
                                                                                                قیمت
                                                                                            </div>
                                                                                            <div class="currency-item a-left-item vs_coin_symbol">
                                                                                                {{ strtoupper($coins[1]->symbol) }}
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>

                                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                                <div class="row">
                                                                                    <div class="Buy ranger-row position-relative padding-item col-lg-4 col-md-6 col-sm-12">
                                                                                        <div class="no-ui-slider">
                                                                                            <div class="slider"></div>
                                                                                            <ul class="slider-labels eleven-columns">
                                                                                                <li class="active sell_percent"
                                                                                                    data-percent="0">
                                                                                                    <span></span>0%
                                                                                                </li>
                                                                                                <li class="sell_percent"
                                                                                                    data-percent="20">
                                                                                                    <span></span>20%
                                                                                                </li>
                                                                                                <li class="sell_percent"
                                                                                                    data-percent="50">
                                                                                                    <span></span>50%
                                                                                                </li>
                                                                                                <li class="sell_percent"
                                                                                                    data-percent="75">
                                                                                                    <span></span>75%
                                                                                                </li>
                                                                                                <li class="sell_percent"
                                                                                                    data-percent="100">
                                                                                                    <span></span>100%
                                                                                                </li>

                                                                                            </ul>
                                                                                        </div>

                                                                                        <div class="flex-box justify-content-between">
                                                                                            <div class="flex-box">
                                                                                                <p class="grey-text margin-left no-margin">
                                                                                                    هزینه
                                                                                                </p>
                                                                                                <div class="ltr-direct flex-box white-text">
                                                                                                    <span style="margin-right: 5px"
                                                                                                          id="total_amount_sell">
                                                                                                        0
                                                                                                    </span>
                                                                                                    <span class="vs_coin_symbol">

                                                                                                    </span>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="flex-box">
                                                                                                <p class="grey-text margin-left no-margin">
                                                                                                    فروش
                                                                                                </p>
                                                                                                <div class="ltr-direct flex-box white-text">
                                                                                                    <span style="margin-right: 5px"
                                                                                                          id="total_amount_of_coin_sell">
                                                                                                        0
                                                                                                    </span>
                                                                                                    <span class="coin_symbol">

                                                                                                    </span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="flex-box justify-content-between">
                                                                                            <div class="flex-box">
                                                                                                <p class="grey-text margin-left no-margin">
                                                                                                    ماکزیمم
                                                                                                </p>
                                                                                                <div class="ltr-direct flex-box white-text">
                                                                                                    <span style="margin-right: 5px"
                                                                                                          id="max_sell">

                                                                                                    </span>
                                                                                                    <span class="coin_symbol">

                                                                                                    </span>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="flex-box">
                                                                                                <p class="grey-text margin-left no-margin">
                                                                                                    موجودی
                                                                                                </p>
                                                                                                <div class="ltr-direct flex-box white-text">
                                                                                                    <span style="margin-right: 5px"
                                                                                                          id="account_amount_sell">
                                                                                                        0
                                                                                                    </span>
                                                                                                    <span class="coin_symbol">

                                                                                                    </span>
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="padding-item col-lg-4 col-md-6 col-sm-12">
                                                                                        <label class="container-checkbox">

                                                                                            <input type="checkbox"
                                                                                                   class="profitCheckInSell">
                                                                                            <span class="checkmark"></span>
                                                                                            حد سود
                                                                                        </label>

                                                                                        <div class="padding-item col-lg-12 col-md-12 col-sm-12 hidden profitAmountInSellBox">
                                                                                            <div class="input-row">
                                                                                                {{--<label>
                                                                                                    قیمت
                                                                                                </label>--}}
                                                                                                <input class="padding-right ltr-direct padding-left"
                                                                                                       id="profitAmountInSell"
                                                                                                       value="">
                                                                                                <div class="currency-item">
                                                                                                    قیمت
                                                                                                </div>
                                                                                                <div class="currency-item a-left-item vs_coin_symbol">
                                                                                                    {{ strtoupper($coins[1]->symbol) }}
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="input-row">
                                                                                                {{--<label>
                                                                                                    قیمت
                                                                                                </label>--}}
                                                                                                <input class="padding-right ltr-direct padding-left"
                                                                                                       id="profitAmountInSellPercentage"
                                                                                                       value="">
                                                                                                <div class="currency-item">
                                                                                                    درصد
                                                                                                </div>
{{--                                                                                                vs_coin_symbol--}}
                                                                                                <div class="currency-item a-left-item ">
                                                                                                    %
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="w-bg summery justify-content-between average-price flex-box margin"
                                                                                             style="display: none">
                                                                                            <p class="grey-text margin-left no-margin">
                                                                                                به تومان
                                                                                            </p>
                                                                                            <div class="ltr-direct flex-box white-text">
                                                                                            <span style="margin-right: 5px">
                                                                                              ۳۰۰۰
                                                                                            </span>
                                                                                                <span>
                                                                                                T
                                                                                            </span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="w-bg summery justify-content-between average-price flex-box margin"
                                                                                             style="display: none">
                                                                                            <p class="grey-text margin-left no-margin">
                                                                                                به درصد
                                                                                            </p>
                                                                                            <div class="ltr-direct flex-box white-text">
                                                                                            <span style="margin-right: 5px">
                                                                                             ۴۵٪
                                                                                            </span>

                                                                                            </div>
                                                                                        </div>
                                                                                        <label class="container-checkbox">

                                                                                            <input type="checkbox"
                                                                                                   class="lossCheckInSell">
                                                                                            <span class="checkmark"></span>
                                                                                            حد ضرر
                                                                                        </label>

                                                                                        <div class="padding-item col-lg-12 col-md-12 col-sm-12 hidden lossAmountInSellBox">
                                                                                            <div class="input-row">
                                                                                                {{--<label>
                                                                                                    قیمت
                                                                                                </label>--}}
                                                                                                <input class="padding-right ltr-direct padding-left"
                                                                                                       id="lossAmountInSell"
                                                                                                       value="">
                                                                                                <div class="currency-item">
                                                                                                    قیمت
                                                                                                </div>
                                                                                                <div class="currency-item a-left-item vs_coin_symbol">
                                                                                                    {{ strtoupper($coins[1]->symbol) }}
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="input-row">
                                                                                                {{--<label>
                                                                                                    قیمت
                                                                                                </label>--}}
                                                                                                <input class="padding-right ltr-direct padding-left"
                                                                                                       id="lossAmountInSellPercentage"
                                                                                                       value="">
                                                                                                <div class="currency-item">
                                                                                                    درصد
                                                                                                </div>
{{--                                                                                                vs_coin_symbol--}}
                                                                                                <div class="currency-item a-left-item ">
                                                                                                    %
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>

                                                                                    </div>
                                                                                </div>

                                                                            </div>

                                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                                <a class="p-button button b-w-w flex-box red-button"
                                                                                   onclick="sell()">
                                                                                    فروش
                                                                                </a>
                                                                                <div class="w-bg summery justify-content-between average-price flex-box margin">
                                                                                    <p class="grey-text margin-left no-margin">
                                                                                        کارمزد معامله
                                                                                    </p>
                                                                                    <div class="ltr-direct flex-box white-text">
                                                                                        <span style="margin-right: 5px">
                                                                                       {{ fa_number(setting('static.trade_fee')) }}
                                                                                        </span>
                                                                                        <span>
                                                                                            T
                                                                                        </span>

                                                                                    </div>
                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="tab-pane fade" id="mobile" role="tabpanel"
                                                                     aria-labelledby="mobile-tab">
                                                                    <form class="position-relative">
                                                                        <div class="row">

                                                                            <div class="padding-item col-lg-3 col-md-3 col-sm-12">
                                                                                <div class="drop-down no-margin select-price">
                                                                                    <div class="selected ">
                                                                                        <a class="purple-item flex-box justify-content-between">
                                                                                            <span class="chose">  قیمت انتخابی </span>
                                                                                            <img src="{{asset('assets/icon/arrow s.svg')}}">
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="options">
                                                                                        <ul>
                                                                                            <img class="z-index-0 bg"
                                                                                                 src="{{asset('assets/photo/input-blur.png')}}">

                                                                                            <li onclick="set_market_buy(false)">
                                                                                                <a>
                                                                                                    <p class="white-text no-margin text-center">
                                                                                                        قیمت انتخابی
                                                                                                    </p>
                                                                                                </a>
                                                                                            </li>

                                                                                            <li onclick="set_market_buy(true)">
                                                                                                <a>
                                                                                                    <p class="white-text no-margin text-center">
                                                                                                        قیمت مارکت
                                                                                                    </p>
                                                                                                </a>
                                                                                            </li>


                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                                <div class="row">
                                                                                    <div class="padding-item col-lg-4 col-md-6 col-sm-12">
                                                                                        <div class="input-row">
                                                                                            <label>حجم</label>
                                                                                            <input class="padding-right ltr-direct padding-left "
                                                                                                   value="0%"
                                                                                                   id="amount_buy_input">
                                                                                            <div class="currency-item">
                                                                                                حجم
                                                                                            </div>
                                                                                            <div class="currency-item a-left-item coin_symbol">
                                                                                                {{ strtoupper($coins[0]->symbol) }}
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="padding-item col-lg-4 col-md-6 col-sm-12">
                                                                                        <div class="input-row">
                                                                                            <label>
                                                                                                قیمت
                                                                                            </label>
                                                                                            <input class="padding-right ltr-direct padding-left"
                                                                                                   id="price_buy_input"
                                                                                                   value="{{ round($coins[0]->price / $coins[1]->price , 8)  }}">
                                                                                            <div class="currency-item">
                                                                                                قیمت
                                                                                            </div>
                                                                                            <div class="currency-item a-left-item vs_coin_symbol">
                                                                                                {{ strtoupper($coins[1]->symbol) }}
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>

                                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                                <div class="row">
                                                                                    <div class="sell ranger-row position-relative padding-item col-lg-4 col-md-6 col-sm-12">
                                                                                        <div class="no-ui-slider">
                                                                                            <div id="sellSliderTradeRange" class="slider"></div>
                                                                                            <ul class="slider-labels eleven-columns">
                                                                                                <li class="active buy_percent"
                                                                                                    data-percent="0">
                                                                                                    <span></span>
                                                                                                    0%
                                                                                                </li>
                                                                                                <li class=" buy_percent"
                                                                                                    data-percent="20">
                                                                                                    <span></span>20%
                                                                                                </li>
                                                                                                <li class=" buy_percent"
                                                                                                    data-percent="50">
                                                                                                    <span></span>50%
                                                                                                </li>
                                                                                                <li class=" buy_percent"
                                                                                                    data-percent="75">
                                                                                                    <span></span>75%
                                                                                                </li>
                                                                                                <li class=" buy_percent"
                                                                                                    data-percent="100">
                                                                                                    <span></span>100%
                                                                                                </li>

                                                                                            </ul>
                                                                                        </div>

                                                                                        <div class="flex-box justify-content-between">
                                                                                            <div class="flex-box">
                                                                                                <p class="grey-text margin-left no-margin">
                                                                                                    هزینه
                                                                                                </p>
                                                                                                <div class="ltr-direct flex-box white-text">
                                                                                                    <span style="margin-right: 5px"
                                                                                                          id="total_amount_buy">
                                                                                                        0
                                                                                                    </span>
                                                                                                    <span class="vs_coin_symbol">
                                                                                                        {{ strtoupper($coins[1]->symbol) }}
                                                                                                    </span>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="flex-box">
                                                                                                <p class="grey-text margin-left no-margin">
                                                                                                    خرید
                                                                                                </p>
                                                                                                <div class="ltr-direct flex-box white-text">
                                                                                                    <span style="margin-right: 5px"
                                                                                                          id="total_amount_of_coin">
                                                                                                        0
                                                                                                    </span>
                                                                                                    <span class="coin_symbol">
                                                                                                        {{ strtoupper($coins[0]->symbol) }}
                                                                                                    </span>
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>

                                                                                        <div class="flex-box justify-content-between">
                                                                                            <div class="flex-box">
                                                                                                <p class="grey-text margin-left no-margin">
                                                                                                    ماکزیمم
                                                                                                </p>
                                                                                                <div class="ltr-direct flex-box white-text">
                                                                                                <span style="margin-right: 5px"
                                                                                                      id="max_buy">

                                                                                                </span>
                                                                                                    <span class="coin_symbol">
                                                                                                    {{ strtoupper($coins[0]->symbol) }}
                                                                                                </span>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="flex-box">
                                                                                                <p class="grey-text margin-left no-margin">
                                                                                                    موجودی
                                                                                                </p>
                                                                                                <div class="ltr-direct flex-box white-text">
                                                                                                    <span style="margin-right: 5px"
                                                                                                          id="account_amount_buy">
                                                                                                        0
                                                                                                    </span>
                                                                                                    <span class="vs_coin_symbol">

                                                                                                    </span>
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="padding-item col-lg-4 col-md-6 col-sm-12">
                                                                                        <label class="container-checkbox">

                                                                                            <input type="checkbox"
                                                                                                   class="profitCheckInBuy">
                                                                                            <span class="checkmark"></span>
                                                                                            حد سود
                                                                                        </label>

                                                                                        <div class="padding-item col-lg-12 col-md-12 col-sm-12 hidden profitAmountInBuyBox">
                                                                                            <div class="input-row">
                                                                                                {{--<label>
                                                                                                    قیمت
                                                                                                </label>--}}
                                                                                                <input class="padding-right ltr-direct padding-left"
                                                                                                       id="profitAmountInBuy"
                                                                                                       value="">
                                                                                                <div class="currency-item">
                                                                                                    قیمت
                                                                                                </div>
                                                                                                <div class="currency-item a-left-item vs_coin_symbol">
                                                                                                    {{ strtoupper($coins[1]->symbol) }}
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="input-row">
                                                                                                {{--<label>
                                                                                                    قیمت
                                                                                                </label>--}}
                                                                                                <input class="padding-right ltr-direct padding-left"
                                                                                                       id="profitAmountInBuyPercentage"
                                                                                                       value="">
                                                                                                <div class="currency-item">
                                                                                                    درصد
                                                                                                </div>
{{--                                                                                                vs_coin_symbol--}}
                                                                                                <div class="currency-item a-left-item ">
                                                                                                    %
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="w-bg summery justify-content-between average-price flex-box margin"
                                                                                             style="display: none">
                                                                                            <p class="grey-text margin-left no-margin">
                                                                                                به تومان
                                                                                            </p>
                                                                                            <div class="ltr-direct flex-box white-text">
                                                                                            <span style="margin-right: 5px">
                                                                                              ۳۰۰۰
                                                                                            </span>
                                                                                                <span>
                                                                                                T
                                                                                            </span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="w-bg summery justify-content-between average-price flex-box margin"
                                                                                             style="display: none">
                                                                                            <p class="grey-text margin-left no-margin">
                                                                                                به درصد
                                                                                            </p>
                                                                                            <div class="ltr-direct flex-box white-text">
                                                                                            <span style="margin-right: 5px">
                                                                                             ۴۵٪
                                                                                            </span>

                                                                                            </div>
                                                                                        </div>

                                                                                        <label class="container-checkbox">

                                                                                            <input type="checkbox"
                                                                                                   class="lossCheckInBuy">
                                                                                            <span class="checkmark"></span>
                                                                                            حد ضرر
                                                                                        </label>

                                                                                        <div class="padding-item col-lg-12 col-md-12 col-sm-12 hidden lossAmountInBuyBox">
                                                                                            <div class="input-row">
                                                                                                {{--<label>
                                                                                                    قیمت
                                                                                                </label>--}}
                                                                                                <input class="padding-right ltr-direct padding-left"
                                                                                                       id="lossAmountInBuy"
                                                                                                       value="">
                                                                                                <div class="currency-item">
                                                                                                    قیمت
                                                                                                </div>
                                                                                                <div class="currency-item a-left-item vs_coin_symbol">
                                                                                                    {{ strtoupper($coins[1]->symbol) }}
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="input-row">
                                                                                                {{--<label>
                                                                                                    قیمت
                                                                                                </label>--}}
                                                                                                <input class="padding-right ltr-direct padding-left"
                                                                                                       id="lossAmountInBuyPercentage"
                                                                                                       value="">
                                                                                                <div class="currency-item">
                                                                                                    درصد
                                                                                                </div>
{{--                                                                                                vs_coin_symbol--}}
                                                                                                <div class="currency-item a-left-item ">
                                                                                                    %
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>

                                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                                <a class="p-button button b-w-w flex-box red-button"
                                                                                   onclick="buy()">
                                                                                    خرید
                                                                                </a>
                                                                                <div class="w-bg summery justify-content-between average-price flex-box margin">
                                                                                    <p class="grey-text margin-left no-margin">
                                                                                        کارمزد معامله
                                                                                    </p>
                                                                                    <div class="ltr-direct flex-box white-text">
                                                                                        <span style="margin-right: 5px">
                                                                                            {{ fa_number(setting('static.trade_fee')) }}
                                                                                        </span>
                                                                                        <span>
                                                                                            T
                                                                                        </span>
                                                                                    </div>

                                                                                    <p class="form-error-text"
                                                                                       id="buy_error">

                                                                                    </p>

                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="margin-top padding-item col-lg-12 col-md-12 col-sm-12">
                                                        <div class="tile" id="tile-1">

                                                            <!-- Nav tabs -->
                                                            <ul class="nav nav-tabs nav-justified" role="tablist">
                                                                <div class="slider slider2"></div>

                                                                <li class="nav-item">
                                                                    <a class="nav-link active" id="tab1"
                                                                       data-toggle="tab" href="#tab-content1" role="tab"
                                                                       aria-controls="home" aria-selected="true"><i
                                                                                class="fas fa-home"></i>سفارشات</a>
                                                                </li>

                                                                {{--
                                                                <li class="nav-item">
                                                                    <a class="nav-link" id="tab2" data-toggle="tab"
                                                                       href="#tab-content2" role="tab"
                                                                       aria-controls="profile" aria-selected="false"><i
                                                                                class="fas fa-id-card"></i> سفارشات</a>
                                                                </li>--}}

                                                                <li class="nav-item">
                                                                    <a class="nav-link" id="tab3" data-toggle="tab"
                                                                       href="#tab-content3" role="tab"
                                                                       aria-controls="contact" aria-selected="false"><i
                                                                                class="fas fa-map-signs"></i> تاریخچه
                                                                        سفارشات</a>
                                                                </li>

                                                                <li class="nav-item">
                                                                    <a class="nav-link" id="tab4" data-toggle="tab"
                                                                       href="#tab-content4" role="tab"
                                                                       aria-controls="setting" aria-selected="false"><i
                                                                                class="fas fa-cogs"></i> تاریخچه
                                                                        تبادل</a>
                                                                </li>

                                                                <li class="nav-item">
                                                                    <a class="nav-link" id="tab5" data-toggle="tab"
                                                                       href="#tab-content5" role="tab"
                                                                       aria-controls="setting" aria-selected="false"><i
                                                                                class="fas fa-cogs"></i> تاریخچه تراکنش</a>
                                                                </li>

                                                               {{-- <li class="nav-item">
                                                                    <a class="nav-link" id="tab6" data-toggle="tab"
                                                                       href="#tab-content6" role="tab"
                                                                       aria-controls="setting" aria-selected="false"><i
                                                                                class="fas fa-cogs"></i>ابزارها</a>
                                                                </li>
--}}
                                                            </ul>

                                                            <!-- Tab panes -->
                                                            <div class="tab-content">

                                                                <div class="tab-pane fade show active" id="tab-content1"
                                                                     role="tabpanel" aria-labelledby="home-tab">
                                                                    <div class="inner-box">

                                                                        <table>
                                                                            <thead>
                                                                            <tr>
                                                                                <th>لغو</th>
                                                                                <th>میزان</th>
                                                                                <th>قیمت</th>
                                                                                <th>خرید/فروش</th>
                                                                                <th>نوع ارز</th>
                                                                                <th>حدضرر / حدسود</th>
                                                                                <th>زمان</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody id="position_table">

                                                                            @php
                                                                                $open_positions = $positions->filter(function($item){
                                                                                    return $item->status === 'active';
                                                                                })
                                                                            @endphp

                                                                            @each('components.open_positions' , $open_positions , 'position')

                                                                            </tbody>
                                                                        </table>

                                                                    </div>
                                                                </div>

                                                                <div class="tab-pane fade" id="tab-content3"
                                                                     role="tabpanel" aria-labelledby="contact-tab">
                                                                    <div class="inner-box">
                                                                        <table>
                                                                            <thead>
                                                                            <tr>
                                                                                <th>لغو</th>
                                                                                <th>میزان</th>
                                                                                <th>قیمت</th>
                                                                                <th>خرید/فروش</th>
                                                                                <th>نوع ارز</th>
                                                                                <th>زمان</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody id="order_history_table">

                                                                            @php
                                                                                $closed_positions = $positions->filter(function($item){
                                                                                    return $item->status === 'filled' || $item->status === 'canceled';
                                                                                })
                                                                            @endphp

                                                                            @each('components.closed_positions' , $closed_positions , 'position')

                                                                            </tbody>
                                                                        </table>
                                                                    </div>

                                                                </div>

                                                                <div class="tab-pane fade" id="tab-content4"
                                                                     role="tabpanel" aria-labelledby="setting-tab">
                                                                    <div class="inner-box">
                                                                        <table>
                                                                            <thead>
                                                                            <tr>
                                                                                <th>میزان</th>
                                                                                <th>قیمت</th>
                                                                                <th>نوع ارز</th>
                                                                                <th>زمان</th>

                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>

                                                                            @each('components.swapped_positions' , $swap_history , 'swap')

                                                                            </tbody>
                                                                        </table>
                                                                    </div>

                                                                </div>

                                                                <div class="tab-pane fade" id="tab-content5"
                                                                     role="tabpanel" aria-labelledby="setting-tab">
                                                                    <div class="inner-box">
                                                                        <table>
                                                                            <thead>
                                                                            <tr>
                                                                                <th>میزان</th>
                                                                                <th>شبکه</th>
                                                                                <th>واریز/برداشت</th>
                                                                                <th>نوع ارز</th>
                                                                                <th>زمان</th>

                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>

                                                                            @each('components.deposit_history' , $histories , 'history')

                                                                            </tbody>
                                                                        </table>
                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" col-lg-12 col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class=" padding-item col-lg-6 col-md-6 col-sm-12">
                                            <div class="items justify-content-start  position-relative">
                                                <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">
                                                <h6 class="white-text">
                                                    سفارشات فروش
                                                </h6>

                                                <div class="flex-box justify-content-start order-list-tab">
                                                    <a class="active">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path class="path" d="M11 4H20" stroke-width="1.5"
                                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path class="path" d="M11.15 9H20" stroke-width="1.5"
                                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path class="path2" d="M5.25 9V4L4 5.25" stroke="#FF3A44"
                                                                  stroke-width="1.5" stroke-linecap="round"
                                                                  stroke-linejoin="round"/>
                                                            <path class="path" d="M11 14H20" stroke-width="1.5"
                                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path class="path" d="M11.15 19H20" stroke-width="1.5"
                                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path class="path3"
                                                                  d="M4 15C4 14.4477 4.44772 14 5 14H5.61448C6.1433 14 6.61278 14.3384 6.78 14.8401V14.8401C6.91647 15.2495 6.82812 15.7005 6.54727 16.0282L4 19H7"
                                                                  stroke="#1DB954" stroke-width="1.5"
                                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path class="path2" d="M4 9H6.5" stroke="#FF3A44"
                                                                  stroke-width="1.5" stroke-linecap="round"
                                                                  stroke-linejoin="round"/>
                                                        </svg>
                                                    </a>
                                                    <a>
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path class="path" d="M11 4H20" stroke-width="1.5"
                                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path class="path" d="M11.15 9H20" stroke-width="1.5"
                                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path class="path2" d="M5.25 9V4L4 5.25" stroke="#FF3A44"
                                                                  stroke-width="1.5" stroke-linecap="round"
                                                                  stroke-linejoin="round"/>
                                                            <path class="path" d="M11 14H20" stroke-width="1.5"
                                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path class="path" d="M11.15 19H20" stroke-width="1.5"
                                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path class="path3"
                                                                  d="M4 15C4 14.4477 4.44772 14 5 14H5.61448C6.1433 14 6.61278 14.3384 6.78 14.8401V14.8401C6.91647 15.2495 6.82812 15.7005 6.54727 16.0282L4 19H7"
                                                                  stroke="#1DB954" stroke-width="1.5"
                                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path class="path2" d="M4 9H6.5" stroke="#FF3A44"
                                                                  stroke-width="1.5" stroke-linecap="round"
                                                                  stroke-linejoin="round"/>
                                                        </svg>
                                                    </a>
                                                    <a>
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path class="path" d="M11 4H20" stroke-width="1.5"
                                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path class="path" d="M11.15 9H20" stroke-width="1.5"
                                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path class="path2" d="M5.25 9V4L4 5.25" stroke="#FF3A44"
                                                                  stroke-width="1.5" stroke-linecap="round"
                                                                  stroke-linejoin="round"/>
                                                            <path class="path" d="M11 14H20" stroke-width="1.5"
                                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path class="path" d="M11.15 19H20" stroke-width="1.5"
                                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path class="path3"
                                                                  d="M4 15C4 14.4477 4.44772 14 5 14H5.61448C6.1433 14 6.61278 14.3384 6.78 14.8401V14.8401C6.91647 15.2495 6.82812 15.7005 6.54727 16.0282L4 19H7"
                                                                  stroke="#1DB954" stroke-width="1.5"
                                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path class="path2" d="M4 9H6.5" stroke="#FF3A44"
                                                                  stroke-width="1.5" stroke-linecap="round"
                                                                  stroke-linejoin="round"/>
                                                        </svg>
                                                    </a>
                                                </div>

                                                <div class="order-list">

                                                    <ul class="order-list-title">
                                                        <li class="text-right" scope="col"><span>جمع</span> (<span
                                                                    class="coin_symbol"></span>)
                                                        </li>
                                                        <li class="text-center" scope="col"><span>اندازه</span> (<span
                                                                    class="coin_symbol"></span>)
                                                        </li>
                                                        <li class="text-left" scope="col"><span>قیمت</span> (<span
                                                                    class="vs_coin_symbol"></span>)
                                                        </li>
                                                    </ul>

                                                    <div id="offer_book">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class=" padding-item col-lg-6 col-md-6 col-sm-12">
                                            <div class="items justify-content-start  position-relative">
                                                <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">
                                                <h6 class="white-text">
                                                    سفارشات خرید
                                                </h6>
                                                <div class="order-list">
                                                    <ul class="order-list-title">
                                                        <li class="text-right" scope="col">
                                                            <span>جمع</span> (<span class="coin_symbol"></span>)
                                                        </li>
                                                        <li class="text-center" scope="col"><span>اندازه</span> (<span
                                                                    class="coin_symbol"></span>)
                                                        </li>
                                                        <li class="text-left" scope="col">

                                                            <span>قیمت</span> (<span class="vs_coin_symbol"></span>)
                                                        </li>
                                                    </ul>
                                                    <div id="bid_book">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @if($biggest->count() > 0)
                                            <div class=" padding-item col-lg-6 col-md-6 col-sm-12">
                                                <div class="items justify-content-start  position-relative">
                                                    <img class="z-index-0 bg"
                                                         src="{{asset('assets/photo/row-item.png')}}">
                                                    <h6 class="white-text">
                                                        بزرگترین معاملات روز
                                                    </h6>
                                                    <div class="order-list">
                                                        <ul class="order-list-title">
                                                            <li class="text-right" scope="col">
                                                                <span>جمع</span> (<span class="coin_symbol"></span>)
                                                            </li>
                                                            <li class="text-left" scope="col">
                                                                <span>قیمت</span> (<span class="vs_coin_symbol"></span>)
                                                            </li>
                                                        </ul>

                                                        @each('components.biggest' ,$biggest , 'big')

                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                </div>


                            </div>
                        </section>
                    </div>

                    @include('layout.footer')
                </div>
            </div>
        </div>

    </div>

    <div style="position:fixed;bottom: 20px;left: 20px">
        <img class="d-block margin-left-auto"
             src="{{asset('assets/icon/mobile.svg')}}">
    </div>
</div>


<style>
    .chooseAddCoinRow {
        cursor: pointer;
    }
</style>

<script src="{{asset('assets/js/master.js')}}"></script>
<script src="{{asset('assets/js/socail-hover.js')}}"></script>
<script src="{{asset('assets/js/drop-down.js')}}"></script>

<script type="text/javascript" src="{{ asset('assets/js/mahsa_trade_page.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/helper.js') }}"></script>


{{--MARKET--}}

<script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/underscore@1.13.2/underscore-umd-min.js"></script>

<script type="text/javascript">
    const node_url = "{{config('app.node_url')}}";

    let price = parseFloat("{{ round($coins[0]->price / $coins[1]->price , 8)  }}")
    let account_amount = parseFloat("{{ $account_amount }}")
    let account_vs_amount = parseFloat("{{ $account_vs_amount }}")
    let coin = @json($coins[0]);
    let vs_coin = @json($coins[1]);

    let bids = @json($bids);
    let offers = @json($offers);

    let all_coin = $('.chooseAddCoinRow');
    let filter_coin_item = [];
    let last_pairs = JSON.parse(getCookie('pairs') ?? "[]")

    $(".profitCheckInSell").change(function () {
        if ($(this).is(":checked")) {
            $('.profitAmountInSellBox').slideDown(400)
        } else {
            $('.profitAmountInSellBox').slideUp(400)
        }
    })

    function handleCalcPercentageAndPrice (typeOrder = 'sell' , typeResponse = 'percentage' , inputVal , profit = true) {
        let orderPrice = 0;
        let sellPrice = 0;
        let sellPercentage = 0;


        if(typeOrder == 'sell'){
            orderPrice = parseFloat($("#price_sell_input").val());
        }else{
            orderPrice = parseFloat($("#price_buy_input").val());
        }

        if(typeResponse == 'percentage'){

            if(typeOrder == 'sell'){

                sellPercentage = ((inputVal / orderPrice) ) * 100;

            }else{
                sellPercentage = ((inputVal / orderPrice) - 1) * 100;
            }


            return sellPercentage.toFixed(2)
        }else{
            if(typeOrder == 'sell'){
                if(profit){
                    sellPrice = orderPrice - ((orderPrice * inputVal) / 100);
                }else {
                    sellPrice = orderPrice + ((orderPrice * inputVal) / 100);
                }
            }else{
                sellPrice = orderPrice + ((orderPrice * inputVal) / 100);

            }

            return sellPrice
        }


    }

    $("#profitAmountInSellPercentage").keyup(function (){

        $("#profitAmountInSell").val(handleCalcPercentageAndPrice('sell' , 'price' , $(this).val()));

    })

    $("#profitAmountInSell").keyup(function (){

        $("#profitAmountInSellPercentage").val(handleCalcPercentageAndPrice('sell' , 'percentage' , $(this).val()))

    })

    $("#lossAmountInSellPercentage").keyup(function (){

        $("#lossAmountInSell").val(handleCalcPercentageAndPrice('sell' , 'price' , $(this).val() , false));

    })

    $("#lossAmountInSell").keyup(function (){

        $("#lossAmountInSellPercentage").val(handleCalcPercentageAndPrice('sell' , 'percentage' , $(this).val() , false))

    })

    $("#profitAmountInBuyPercentage").keyup(function (){

        $("#profitAmountInBuy").val(handleCalcPercentageAndPrice('buy' , 'price' , $(this).val()));

    })

    $("#profitAmountInBuy").keyup(function (){

        $("#profitAmountInBuyPercentage").val(handleCalcPercentageAndPrice('buy' , 'percentage' , $(this).val()))

    })

    $("#lossAmountInBuyPercentage").keyup(function (){

        $("#lossAmountInBuy").val(handleCalcPercentageAndPrice('buy' , 'price' , $(this).val() , false));

    })

    $("#lossAmountInBuy").keyup(function (){

        $("#lossAmountInBuyPercentage").val(handleCalcPercentageAndPrice('buy' , 'percentage' , $(this).val() , false))

    })

    $(".lossCheckInSell").change(function () {
        if ($(this).is(":checked")) {
            $('.lossAmountInSellBox').slideDown(400)
        } else {
            $('.lossAmountInSellBox').slideUp(400)
        }
    })

    $(".profitCheckInBuy").change(function () {
        if ($(this).is(":checked")) {
            $('.profitAmountInBuyBox').slideDown(400)
        } else {
            $('.profitAmountInBuyBox').slideUp(400)
        }
    })

    $(".lossCheckInBuy").change(function () {
        if ($(this).is(":checked")) {
            $('.lossAmountInBuyBox').slideDown(400)
        } else {
            $('.lossAmountInBuyBox').slideUp(400)
        }
    })

    $(document).on('input', '.modalSearchCoin', function () {
        let itemSearch = filter_coin(filter_coin_item, $(this).val(), 'search');
        let result = '';

        for (let i = 0; i < itemSearch.length; i++) {
            result += $(itemSearch[i])[0].outerHTML;
        }

        $('.modalShowCoinItem').children('tbody').html(result);
    })

    $(document).on('click', '.crypto-tags', function () {
        let itemSearch = [];
        let filterMethod = $(this).data('value');
        let result = '';

        $('.crypto-tags').removeClass('active');
        $(this).addClass('active');

        if (filterMethod == "" || filterMethod == "all") {
            itemSearch = filter_coin(filter_coin_item, last_pairs);
        } else {
            itemSearch = filter_coin(filter_coin_item, filterMethod, 'search');
        }

        for (let i = 0; i < itemSearch.length; i++) {
            result += $(itemSearch[i])[0].outerHTML;
        }

        $('.modalShowCoinItem').children('tbody').html(result);
    })

    function get_coin(pair) {

        change_pair(pair, "{{ route('trade') }}")

        $.ajax({
            type: "POST",
            url: "{{ route('get_coin') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                'pair': pair
            },
            success: function (data) {

                coin = data.coins[0]
                vs_coin = data.coins[1]
                account_amount = data.account_amount
                account_vs_amount = data.account_vs_amount
                price = Number((coin.price / vs_coin.price).toFixed(8))
                bids = data.bids
                offers = data.offers

                re_run()

                emit_order_book()

            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {

            }
        });
    }

    function buy() {

        const amount = $("#amount_buy_input").val()
        const coin_id = coin.id
        const vs_coin_id = vs_coin.id
        let ajaxData = {
            "_token": "{{ csrf_token() }}",
            "price": get_updated_price(true),
            'amount': amount,
            'coin_id': coin_id,
            'vs_coin_id': vs_coin_id
        }

        if ($(".lossCheckInBuy").is(":checked") && $("#lossAmountInBuy").val().trim() != '') {
            ajaxData['loss_price'] = $("#lossAmountInBuy").val();
        }

        if ($(".profitCheckInBuy").is(":checked") && $("#profitAmountInBuy").val().trim() != '') {
            ajaxData['profit_price'] = $("#profitAmountInBuy").val();
        }

        $.ajax({
            type: "POST",
            url: "{{ route('place_buy') }}",
            data: ajaxData,
            success: function (data) {

                account_vs_amount -= parseFloat(data.amount) * parseFloat(data.price)

                reset_all()
                configure_buy()
                detect_range_slider_trade(0, true);
                $('#amount_buy_input').val(0);
                $('#price_buy_input').val(0);


                $("#position_table").append(`
                    <tr data-id="${data.id}">
                        <td class="blue-text" data-column="لغو">
                            لغو
                        </td>
                        <td class="" data-column="میزان">
                            ${parseFloat(data.amount).toFixed(6)}
                        </td>
                        <td class="ltr-direct"
                            data-column="قیمت">
                            ${data.price}
                            <span>${data.pair.vs_coin.symbol}</span>
                        </td>
                        <td class="" data-column="خرید/فروش ">
                            خرید
                        </td>
                        <td class="" data-column="نوع ارز ">
                            ${data.pair.coin.symbol}/${data.pair.vs_coin.symbol}
                        </td>
                        <td class="" data-column=" حدضرر / حدسود	 ">
                            <span>${data.profit_price ? data.profit_price : "-"}</span>
                            <span>/</span>
                            <span>${data.loss_price ? data.loss_price : "-"}  </span>
                        </td>
                        <td class="" data-column="زمان  ">
                            ${data.persian_date}
                        </td>
                    </tr>`)

            },
            error: function (response) {

                $.each(response.responseJSON.errors, function (field_name, error) {
                    $("#buy_error").text(error)
                })

            }
        });
    }

    function reset_all() {
        $("#price_buy_input").val()
        $("#amount_buy_input").val()

        $("#price_sell_input").val()
        $("#amount_sell_input").val()
    }

    function sell() {

        const amount = $("#amount_sell_input").val()
        const coin_id = coin.id
        const vs_coin_id = vs_coin.id
        let profit = 0;
        let loss = 0;
        let ajaxData = {
            "_token": "{{ csrf_token() }}",
            "price": get_updated_price(false),
            'amount': amount,
            'coin_id': coin_id,
            'vs_coin_id': vs_coin_id
        }
        if ($(".lossCheckInSell").is(":checked") && $("#lossAmountInSell").val().trim() != '') {
            ajaxData['loss_price'] = $("#lossAmountInSell").val();
        }

        if ($(".profitCheckInSell").is(":checked") && $("#profitAmountInSell").val().trim() != '') {
            ajaxData['profit_price'] = $("#profitAmountInSell").val();
        }

        $.ajax({
            type: "POST",
            url: "{{ route('place_sell') }}",
            data: ajaxData,
            success: function (data) {

                account_amount -= parseFloat(data.amount)

                reset_all()
                configure_sell()
                detect_range_slider_trade(0, false);
                $('#amount_sell_input').val(0);
                $('#price_sell_input').val(0);

                $("#position_table").append(`
                    <tr data-id="${data.id}">
                        <td class="blue-text" data-column="لغو">
                            لغو
                        </td>
                        <td class="" data-column="میزان">
                            ${parseFloat(data.amount).toFixed(6)}
                        </td>
                        <td class="ltr-direct"
                            data-column="قیمت">
                            ${data.price}
                            <span>${data.pair.vs_coin.symbol}</span>
                        </td>
                        <td class="" data-column="خرید/فروش ">
                            فروش
                        </td>
                        <td class="" data-column="نوع ارز ">
                            ${data.pair.coin.symbol}/${data.pair.vs_coin.symbol}
                        </td>
                        <td class="" data-column=" حدضرر / حدسود ">
                            <span>${data.profit_price ? data.profit_price : "-"}</span>
                            <span>/</span>
                            <span>${data.loss_price ? data.loss_price : "-"}  </span>
                        </td>
                        <td class="" data-column="زمان  ">
                            ${data.persian_date}
                        </td>
                    </tr>`)

            },
            error: function (response) {

                $.each(response.responseJSON.errors, function (field_name, error) {
                    $("#buy_error").text(error)
                })

            }
        });
    }

    function filter_coin(array1, item2, type = 'filter') {
        let result = [];

        for (let i = 0; i < array1.length; i++) {
            const array1_item = array1[i];
            if (type == 'filter') {

                let index_array2 = item2.length;
                for (let j = 0; j < item2.length; j++) {
                    const array2_item = item2[j];
                    if ($(array1_item).data("coin_with_dash") != array2_item.toUpperCase()) {
                        index_array2--;
                    }

                    if (index_array2 == 0) {
                        result.push(array1_item);
                    }
                }

            } else if (type == 'search') {
                if (typeof item2 == 'object') {
                    for (let j = 0; j < item2.length; j++) {
                        const array2_item = item2[j];
                        if ($(array1_item).data("pair_first_coin").toUpperCase() == (array2_item.toUpperCase()) || $(array1_item).data("pair_vs_coin").toUpperCase() == (array2_item.toUpperCase())) {
                            result.push(array1_item);
                        }
                    }
                } else {

                    if ($(array1_item).data("coin").toUpperCase().search(item2.toUpperCase()) > -1 ||
                        $(array1_item).data("coin_name").toUpperCase().search(item2.toUpperCase()) > -1 ||
                        $(array1_item).data("vs_coin_name").toUpperCase().search(item2.toUpperCase()) > -1
                    ) {
                        result.push(array1_item);
                    }

                }
            }
        }


        return result;

    }

    function show_filter_item_coin() {
        filter_coin_item = filter_coin(all_coin, last_pairs, 'filter');
        let result = '';

        for (let i = 0; i < filter_coin_item.length; i++) {
            result += $(filter_coin_item[i])[0].outerHTML;
        }

        $('.modalShowCoinItem').children('tbody').html(result);

    }

    function add_coin(coin_name) {

        const new_pair = coin_name


        last_pairs = JSON.parse(getCookie('pairs') ?? "[]")
        last_pairs.push(new_pair)

        setCookie('pairs', JSON.stringify(last_pairs))

        $('#add-crypto').find(".modal-headers img").click();

        show_filter_item_coin();

        get_coin(new_pair)
    }

    $(document).ready(re_run);

    $(document).ready(function () {
        show_filter_item_coin();
    })

    function re_run() {


        update_symbol()
        update_price()

        load_coins_list()

        load_trading_view_chart()

        merge_bids(bids)

        merge_offers(offers)

        document.title = `${price} | ${coin.symbol.toUpperCase()}-${vs_coin.symbol.toUpperCase()} | Caspian Crypto`
    }

    $(document).on("click", ".chooseAddCoinRow", function () {
        add_coin($(this).data("coin_with_dash"))
    })

    function fill_order(order_id) {
        let exist_positions = $("#position_table tr");
        let fill_position = null;

        for(let i = 0 ; i < exist_positions.length ; i++){
            const position = exist_positions[i];
            if($(position).data("id") === order_id){
                fill_position = $(position)[0].outerHTML;
                $(position).remove();
                break;
            }
        }

        if(fill_position != null){
            $("#order_history_table").prepend(`
                <tr>
                    <td class="blue-text" data-column="لغو">
                        تکمیل شده
                    </td>
                    <td class="" data-column="میزان">
                        ${$(fill_position).children("td").eq(1).text()}
                    </td>
                    <td class="ltr-direct" data-column="قیمت">
                        ${$(fill_position).children("td").eq(2).html()}
                    </td>
                    <td class="" data-column="خرید/فروش ">
                        ${$(fill_position).children("td").eq(3).text()}
                    </td>
                    <td class="" data-column="نوع ارز ">
                       ${$(fill_position).children("td").eq(4).text()}
                    </td>
                    <td class="" data-column="زمان  ">
                      ${$(fill_position).children("td").eq(6).text()}
                    </td>
                </tr>
            `)
        }

    }

</script>

<script src="{{asset('assets/js/trade_helper.js')}}"></script>

<script src="{{asset('assets/js/client-dist/socket.io.js')}}"></script>
<script src="{{asset('assets/js/trade_socket.js')}}"></script>

</body>
</html>
