@extends('profile.index')

@section('content_head')
    <div class="history-item flex-box">
        <h5 class="no-margin">
            امنیت
        </h5>
    </div>
@endsection

@section('content')
    <div class="padding-item col-lg-12 col-md-12 col-sm-12">
        <div class="items  position-relative">
            <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">
            <div class="row">

                @if (\Session::has('warning'))
                    <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                        <div class="flex-box error-box justify-content-start">
                            <img src="{{asset('assets/icon/error.svg')}}">

                            {!! \Session::get('warning') !!}

                            <img class="close-error" src="{{asset('assets/icon/close.svg')}}">
                        </div>
                    </div>
                @endif

                @if (\Session::has('success'))
                    <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                        <div class="flex-box error-box justify-content-start" style="background: linear-gradient(134.47deg, rgb(96 229 131 / 10%) 36.17%, rgb(97 193 122 / 10%) 58.77%, rgb(62 150 105 / 10%) 74.8%);border: 1px solid rgb(96 229 119 / 30%);color: #5db358;">
                            <img src="{{asset('assets/icon/error_green.svg')}}">

                            {!! \Session::get('success') !!}

                            <img class="close-error" src="{{asset('assets/icon/close_green.svg')}}">
                        </div>
                    </div>
                @endif

                <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                    <p class="white-text">
                        امنیت حساب کاربری خود را افزایش دهید ({{ $client->security_number }}/3)
                    </p>
                </div>

                <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                    <div class="levels flex-box justify-content-between">
                        <div class="flex-box justify-content-start">
                            <div class="flex-box margin-left icon-box">
                                <img src="{{asset('assets/icon/password.svg')}}">
                            </div>
                            <div class="content">
                                <p class="white-text no-margin">
                                    تایید دو مرحله ای با ایمیل
                                </p>
                                <p class="grey-text no-margin">
                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                </p>
                            </div>

                        </div>
                        @if($client->is_2fa_email)
                            <a class="continue position  flex-box">
                                غیر فعال سازی
                            </a>
                        @else
                            <a class="continue position  flex-box" href={{ route('email_verify_2fa') }}>
                                راه اندازی
                            </a>
                        @endif

                    </div>
                </div>

                <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                    <div class="gradient-line"></div>
                </div>

                <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                    <div class="levels flex-box justify-content-between">
                        <div class="flex-box justify-content-start">
                            <div class="flex-box margin-left icon-box">
                                <img src="{{asset('assets/icon/Protection-Security.svg')}}">
                            </div>
                            <div class="content">
                                <p class="white-text no-margin">
                                    تایید دو مرحله ای باپیامک
                                </p>
                                <p class="grey-text no-margin">
                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                </p>
                            </div>

                        </div>
                        @if($client->is_2fa_phone)
                            <a class="continue position  flex-box">
                                غیر فعال سازی
                            </a>
                        @else
                            <a class="continue position  flex-box" href={{ route('sms_verify_2fa') }}>
                                راه اندازی
                            </a>
                        @endif
                    </div>
                </div>

                {{--<div class="padding-item col-lg-12 col-md-12 col-sm-12">
                    <div class="gradient-line"></div>
                </div>

                <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                    <div class="levels flex-box justify-content-between">
                        <div class="flex-box justify-content-start">
                            <div class="flex-box margin-left icon-box">
                                <img src="{{asset('assets/icon/password.svg')}}">
                            </div>
                            <div class="content">
                                <p class="white-text no-margin">
                                    تایید دو مرحله ای با رمز یکبار مصرف
                                </p>
                                <p class="grey-text no-margin">
                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                </p>
                            </div>

                        </div>
                        @if($client->is_2fa_authenticator)
                            <a class="continue position  flex-box">
                                غیر فعال سازی
                            </a>
                        @else
                            <a class="continue position  flex-box" href={{ '' }}>
                                راه اندازی
                            </a>
                        @endif

                    </div>
                </div>--}}

            </div>

        </div>
    </div>
@endsection
