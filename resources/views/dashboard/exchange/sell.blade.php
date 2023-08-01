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
                <div class="padding-item col-lg-6 col-md-12 col-sm-12">
                    <form>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="margin-bottom flex-box justify-content-between sell-coin-details">
                                    <div class="flex-box">
                                        <div class="image-box flex-box">
                                            <img src="{{asset('assets/icon/bitcoin-icon.svg')}}">
                                        </div>
                                        <p class="no-margin white-text">
                                            بیت کوین ( BTC )
                                        </p>
                                    </div>
                                    <p class="no-margin">
                                        <span class=" grey-text margin-left">فروش </span>
                                        <span class="white-text">۳۲۱.۳۲</span>
                                    </p>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="input-row">
                                    <label>
                                        میزان خرید
                                    </label>
                                    <input class="padding-right" value="200.000" placeholder=" ">
                                    <div class="currency-item">
                                        TMN
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="input-row">
                                    <label>
                                        توضیحات
                                    </label>
                                    <textarea placeholder="توضیحات"></textarea>
                                </div>
                            </div>
                            <div class="padding-item col-lg-12">
                                <p class="white-text no-margin">
                                    هزینه تراکنش :
                                    <span> ۵۰۰۰ </span>
                                    تومان
                                </p>
                            </div>
                            <div class="padding-item col-lg-12">
                                <p class="white-text no-margin">
                                    درکل :
                                    <span> ۵۰۰۰ </span>
                                    تومان
                                </p>
                            </div>
                            <div class="col-lg-12 ">
                                <div class="input-row">
                                    <a class="red-button button b-w-w flex-box"> فروش </a>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="position-relative padding-right-items padding-item col-lg-6 col-md-12 col-sm-12">
                    <img class="line-right" src="{{asset('assets/icon/line.png')}}">
                    <div class=" error-box d-block no-margin">
                        <p>
                            جزییات !
                        </p>
                        <p class="grey-text">
                            برای کپی تریدینگ باید هرسه مرحله احراز هویت را تکمیل کرده باشد لورم ایپسوم متن ساختگی با تولید سادگی نامفهوماز صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در برای کپی تریدینگ باید هرسه مرحله احراز هویت را تکمیل کرده باشد لورم ایپسوم متن ساختگی با تولید سادگی نامفهوماز صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در
                        </p>

                    </div>

                </div>


            </div>
        </div>
    </div>




@endsection
