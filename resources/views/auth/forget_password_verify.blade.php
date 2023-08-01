@extends('auth.index')

@section('content')
    <div class="form-group flex-box">
        <a class="back web-item" href="{{ route('login') }}">
            <img src="{{asset('assets/icon/back.svg')}}">
        </a>
        <div class="blur web-item">
            <div class="circle-one"></div>
        </div>
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
                        @if (\Session::has('email'))
                            ایمیل
                        @elseif(\Session::has('phone'))
                            موبایل
                        @endif
                        خود را چک کنید
                    </h2>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <p class="no-margin">
                        پیامی حاوی لینک بازگردانی کلمه عبور به
                        @if (\Session::has('email'))
                            ایمیل
                        @elseif(\Session::has('phone'))
                            موبایل
                        @endif
                        شما به آدرس زیر ارسال شد
                    </p>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h5 class="margin-item bold-text">
                        @if (\Session::has('email'))

                            {!! \Session::get('email') !!}

                        @elseif(\Session::has('phone'))

                            {!! \Session::get('phone') !!}

                        @endif
                    </h5>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <p class="no-margin">
                        لطفا با مراجعه به صندوق پیام خود و کلیک بر روی لینک ارسال شده برای بازگردانی کلمه عبور خود اقدام
                        کنید
                    </p>
                </div>
                <div class="margin-top flex-box justify-content-start col-lg-12 col-md-12 col-sm-12">
                    <a class="margin-item flex-box login justify-content-start" href="{{ route('forget_password_email' , ['email' => \Session::get('email')]) }}" style="cursor: pointer">
                        پیامی دریافت نکردید؟
                        <span class="blue-text" style="cursor: pointer">
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

