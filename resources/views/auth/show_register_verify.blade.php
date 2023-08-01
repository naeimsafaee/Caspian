@extends('auth.index')

@section('content')
    <div class="form-group flex-box">
        <a class="back web-item" href="{{ route('register') }}">
            <img src="{{asset('assets/icon/back.svg')}}">
        </a>
        <div class="blur web-item">
            <div class="circle-one"></div>
        </div>
        @if ($is_phone)
            <form class="position-relative" method="GET" action="{{ route('submit_register_verify') }}">
                <div class="row">
                    <div class="mobile-item flex-box col-lg-12 col-md-12 col-sm-12">
                        <div class="space"></div>
                    </div>
                    <div class="flex-box col-lg-12 col-md-12 col-sm-12">
                        <img src="{{asset('assets/icon/check-email.svg')}}">
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h2 class="bold-text margin ">
                            برای ادامه شماره موبایل خود را تایید کنید
                        </h2>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <p class="no-margin">
                            پیامی حاوی کد تایید به شماره موبایل شما به شماره تلفن زیر ارسال شد
                        </p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h5 class="margin-item bold-text">
                            {{ $client->phone }}
                        </h5>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <p class="no-margin">
                            لطفا با مراجعه به صندوق پیام خود و وارد کردن کد ، شماره تلفن خود را تایید کنید.
                        </p>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="row">
                            <div class="input-row input-group">
                                <label>کد تایید</label>
                                <input name="code" type="text" placeholder="لطفا کد ارسال شده را وارد نمایید">
                            </div>

                            <div class="col-lg-12 ">
                                <div class="input-row">
                                    <button type="submit" class="p-button button flex-box">تایید</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="margin-top flex-box justify-content-start col-lg-12 col-md-12 col-sm-12">
                        <a class="margin-item flex-box login justify-content-start">
                            پیامکی دریافت نکردید؟
                            <span class="blue-text">
                                دوباره بفرست
                              </span>
                        </a>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <a style="width: 100%; text-align: center" href="{{ route('home') }}" class="button p-button d-block margin">
                            بازگشت به سایت
                        </a>
                    </div>

                </div>
            </form>
        @else
            <form class="position-relative">
                <div class="row">
                    <div class="mobile-item flex-box col-lg-12 col-md-12 col-sm-12">
                        <div class="space"></div>
                    </div>
                    <div class="flex-box col-lg-12 col-md-12 col-sm-12">
                        <img src="{{asset('assets/icon/check-email.svg')}}">
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h2 class="bold-text margin ">
                            رای ادامه اکانت خود را تایید کنید
                        </h2>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <p class="no-margin">
                            پیامی حاوی لینک تایید به ایمیل شما به آدرس زیر ارسال شد
                        </p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h5 class="margin-item bold-text">
                            {{ $client->email }}
                        </h5>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <p class="no-margin">
                            لطفا با مراجعه به صندوق پیام خود و کلیک بر روی لینک حساب خود را تایید کنید
                        </p>
                    </div>
                    <div class="margin-top flex-box justify-content-start col-lg-12 col-md-12 col-sm-12">
                        <a class="margin-item flex-box login justify-content-start">
                            ایمیلی دریافت نکردید؟
                            <span class="blue-text">
                    دوباره بفرست
                  </span>
                        </a>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <a style="width: 100%; text-align: center" href="{{ route('home') }}" class="button p-button d-block margin">
                            بازگشت به سایت
                        </a>
                    </div>

                </div>
            </form>

        @endif
    </div>

@endsection

