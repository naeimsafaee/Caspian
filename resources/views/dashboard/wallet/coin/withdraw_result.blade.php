@extends('dashboard.index')


@section('content_head')
    <div class="history-item flex-box">
        <h5 class="no-margin">
            برداشت {{ $withdraw->coin->persian_name }}
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
                                <h6 class="no-margin white-text">{{ $withdraw->coin->persian_name }} ({{ strtoupper($withdraw->coin->symbol) }}) </h6>

                            </div>
                            <div class="margin-bottom flex-box justify-content-between">
                                <h6 class="no-margin grey-text">میزان</h6>
                                <h6 class="no-margin white-text ltr-direct">
                                    <span>{{ $withdraw->amount }}</span>
                                    <span>{{ strtoupper($withdraw->coin->symbol) }}</span>
                                </h6>
                            </div>
                            <div class="margin-bottom flex-box justify-content-between">
                                <h6 class="no-margin grey-text">آدرس مقصد</h6>
                                <h6 class="no-margin white-text ltr-direct">
                                    <span>{{ substr($withdraw->address , 0 , 10) }}.....{{ substr($withdraw->address , -6 ) }}</span>
                                </h6>
                            </div>
                            <div class="margin-bottom flex-box justify-content-between">
                                <h6 class="no-margin grey-text">شبکه جابجایی</h6>
                                <h6 class="no-margin white-text ltr-direct">
                                    <span>{{ $withdraw->network->persian_name }}</span>
                                </h6>
                            </div>
                            <div class="margin-bottom flex-box justify-content-between">
                                <h6 class="no-margin grey-text"> هزینه تراکنش</h6>
                                <h6 class="no-margin white-text ltr-direct">
                                    <span>{{ $withdraw->fee }}</span>
                                    <span>{{ $withdraw->coin->symbol }}</span>
                                </h6>
                            </div>
                            <div class=" margin-bottom flex-box justify-content-between">
                                <h6 class="no-margin grey-text">درکل</h6>
                                <h6 class="no-margin white-text ltr-direct">
                                    <span>{{ $withdraw->amount + $withdraw->fee}}</span>
                                    <span>{{ $withdraw->coin->symbol }}</span>
                                </h6>
                            </div>
                        </div>

                        <div class="col-lg-12 ">
                            <a class="p-button button flex-box" href="{{ route('wallet_transactions') }}">
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
