@extends('profile.index')

@section('content-head')

    <div class="history-item flex-box">
        <h5 class="no-margin">
            تایید اطلاعات شخصی
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
{{--
                <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                    <p class="white-text">
                        اطلاعات شخصی خود را کامل کنید تا قابلیت تبادل را فعال کنید
                    </p>
                </div>--}}
                <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                    <div class="levels flex-box justify-content-between">
                        <div class="flex-box justify-content-start">
                            <div class="flex-box margin-left icon-box">
                                <img src="{{asset('assets/icon/level1.svg')}}">
                            </div>
                            <div class="content">
                                <p class="white-text no-margin">
                                    مدارک سطح یک
                                </p>
                                <p class="grey-text no-margin">
                                    اجازه ی برداشت تا ۵۰ میلیون تومان (نام ونام خانوادگی . ایمیل .شماره کارت ملی. شماره
                                    موبایل)
                                </p>
                            </div>

                        </div>
                        @if($client->level >= 1)
                            <a class="continue position done flex-box">
                                کامل شده
                                <img src="{{asset('assets/icon/w-tick.svg')}}">
                            </a>
                        @else
                            <a class="continue position  flex-box" href="{{ route('level_one') }}">
                                کامل کردن
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
                                <img src="{{asset('assets/icon/level2.svg')}}">
                            </div>
                            <div class="content">
                                <p class="white-text no-margin">
                                    مدارک سطح دو
                                </p>
                                <p class="grey-text no-margin">
                                    اجازه برداشت تا ۱۰۰ میلیون (تصویر کارت ملی پشت و رو . آدرس منزل +کد پستی)
                                </p>
                            </div>

                        </div>
                        @if($client->level >= 2)
                            <a class="continue position done flex-box">
                                کامل شده
                                <img src="{{asset('assets/icon/w-tick.svg')}}">
                            </a>
                        @elseif($client->send_intermediate)
                            <a class="continue position done flex-box">
                                در انتظار تایید
                            </a>
                        @else
                            <a class="continue position  flex-box" href="{{ route('level_two') }}">
                                کامل کردن
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
                                <img src="{{asset('assets/icon/level3.svg')}}">
                            </div>
                            <div class="content">
                                <p class="white-text no-margin">
                                    مدارک سطح سوم
                                </p>
                                <p class="grey-text no-margin">
                                    اجازه برداشت تا ۵۰۰ میلیون تومان (تعهد نامه صرافی . شماره ثابت. احراز هویت ویدیویی)
                                </p>
                            </div>

                        </div>
                        @if($client->level >= 3)
                            <a class="continue position done flex-box">
                                کامل شده
                                <img src="{{asset('assets/icon/w-tick.svg')}}">
                            </a>
                        @elseif($client->send_advance)
                            <a class="continue position done flex-box">
                                در انتظار تایید
                            </a>
                        @else
                            <a class="continue position  flex-box" href="{{ route('level_three') }}">
                                کامل کردن
                            </a>
                        @endif


                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
