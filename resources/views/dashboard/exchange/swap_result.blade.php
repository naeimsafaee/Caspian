@extends('dashboard.index')


@section('content_head')
    <div class="history-item flex-box">
        <h5 class="no-margin">
            تبادل {{ $coin->persian_name }} با {{ $vs_coin->persian_name }}
        </h5>
    </div>
@endsection

@section('content')
    <div class="padding-item col-lg-12 col-md-12 col-sm-12">
        <div class="items  position-relative overflow-visible">
            <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">
            <div class="row">
                <div class="col-lg-12 ">
                    <h5 class="no-margin">
                        خلاصه تراکنش
                    </h5>

                </div>
                <div class="col-lg-12 ">
                    <div class="gradient-line">

                    </div>
                </div>
                <div class="margin-bottom mobile-item flex-box padding-item col-lg-7 col-md-12 col-sm-12">
                    <img src="{{asset('assets/icon/credit-card%201.svg')}}">
                </div>
                <div class="padding-item col-lg-5 col-md-12 col-sm-12">
                    <div class="row ">
                        <div class="col-lg-12 ">
                            <div class="margin-bottom flex-box justify-content-between">
                                <h6 class="no-margin grey-text">نوع ارز </h6>
                                <h6 class="no-margin white-text">{{ $vs_coin->persian_name }} ( {{ $vs_coin->symbol }} )</h6>

                            </div>
                            <div class="margin-bottom flex-box justify-content-between">
                                <h6 class="no-margin grey-text">میزان</h6>
                                <h6 class="no-margin white-text ltr-direct">
                                    <span>{{ fa_number(number_format($swap->vs_coin_amount)) }}</span>
                                    <span>{{ $vs_coin->symbol }}</span>
                                </h6>

                            </div>
                            <div class="margin-bottom flex-box justify-content-between">
                                <h6 class="no-margin grey-text">پرداختی</h6>
                                <h6 class="no-margin white-text ltr-direct">
                                    <span>{{ fa_number(number_format($swap->coin_amount)) }}</span>
                                    <span>{{ $coin->symbol }}</span>
                                </h6>
                            </div>
                           {{-- <div class=" margin-bottom flex-box justify-content-between">
                                <h6 class="no-margin grey-text">درکل</h6>
                                <h6 class="no-margin white-text ltr-direct">
                                    <span>۵۷۳.۵۷.۴۲ </span>
                                    <span>T</span>
                                </h6>
                            </div>--}}
                        </div>

                        <div class="col-lg-12 ">
                            <a class="p-button button flex-box" href="{{ route('transactions_with_data' , ['swap' , $swap->id]) }}">
                                مشاهده تمام تراکنش ها
                                <img class="margin-right" src="{{asset('assets/icon/left-arrow.svg')}}">
                            </a>

                        </div>
                    </div>

                </div>
                <div class="web-item flex-box padding-item col-lg-7 col-md-12 col-sm-12">
                    <img src="{{asset('assets/icon/credit-card%201.svg')}}">
                </div>
            </div>
        </div>
    </div>
@endsection
