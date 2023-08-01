@extends('dashboard.index')


@section('content_head')
    <div class="history-item flex-box">
        <h5 class="no-margin">
            فروش بیت کوین
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
                                <h6 class="no-margin white-text">بیت کوین ( BTC ) </h6>

                            </div>
                            <div class="margin-bottom flex-box justify-content-between">
                                <h6 class="no-margin grey-text">میزان</h6>
                                <h6 class="no-margin white-text ltr-direct">
                                    <span>۵۷۳.۵۷.۴۲ </span>
                                    <span>T</span>
                                </h6>

                            </div>
                            <div class="margin-bottom flex-box justify-content-between">
                                <h6 class="no-margin grey-text"> هزینه تراکنش</h6>
                                <h6 class="no-margin white-text ltr-direct">
                                    <span>۵۷۳.۵۷.۴۲ </span>
                                    <span>T</span>
                                </h6>
                            </div>
                            <div class=" margin-bottom flex-box justify-content-between">
                                <h6 class="no-margin grey-text">درکل</h6>
                                <h6 class="no-margin white-text ltr-direct">
                                    <span>۵۷۳.۵۷.۴۲ </span>
                                    <span>T</span>
                                </h6>
                            </div>
                        </div>

                        <div class="col-lg-12 ">
                            <a class="p-button button  flex-box">
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
