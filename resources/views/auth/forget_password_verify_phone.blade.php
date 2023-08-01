@extends('auth.index')

@section('content')
    <div class="form-group flex-box">
        <a class="back web-item">
            <img src="{{asset('assets/icon/back.svg')}}">
        </a>
        <div class="blur web-item">
            <div class="circle-one"></div>
        </div>
        <form class="position-relative" method="POST" action="{{ route('forget_code_phone') }}">
            @csrf
            <div class="row">
                <div class="mobile-item flex-box col-lg-12 col-md-12 col-sm-12">
                    <div class="space"></div>
                </div>
                <div class="flex-box col-lg-12 col-md-12 col-sm-12">
                    <img src="{{asset('assets/icon/check-email.svg')}}">
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2 class="bold-text margin ">
                        موبایل خود را چک کنید
                    </h2>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <p class="no-margin">
                        پیامی حاوی کد بازگردانی کلمه عبور به
                        موبایل شما با شماره زیر ارسال شد
                    </p>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h5 class="margin-item bold-text">
                        {{ \Illuminate\Support\Facades\Session::get('phone') }}
                    </h5>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <p class="no-margin">
                        لطفا با مراجعه به صندوق پیام خود کد بازگردانی را در باکس زیر وارد نمایید.
                    </p>
                </div>
                <div class="left circle-blur mobile-item"></div>
                <img class="cloud-in-form mobile-item" src="{{asset('assets/icon/cloud2.svg')}}">
                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="input-row">
                            <input type="text" placeholder="کد بازیابی" name="reset_link">
                        </div>
                    </div>

                    <div class=" flex-box justify-content-start col-lg-12 col-md-12 col-sm-12">
                        <button type="submit" class="button p-button justify-content-center margin">
                            تایید
                        </button>
                    </div>
                </div>
                <div class="margin-top flex-box justify-content-start col-lg-12 col-md-12 col-sm-12">
                    <a class="margin-item flex-box login justify-content-start" style="text-align: center" href="{{ route('forget_password_phone' , ['phone' => \Illuminate\Support\Facades\Session::get('phone')]) }}">
                        پیامی دریافت نکردید؟
                        <span class="blue-text">
                            دوباره بفرست
                        </span>
                    </a>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <a style="width: 100%" type="button" class="button p-button d-block margin"
                       href="{{ route('home') }}">
                        بازگشت به سایت
                    </a>
                </div>

            </div>
        </form>

    </div>

@endsection

