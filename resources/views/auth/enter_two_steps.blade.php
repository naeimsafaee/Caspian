@extends('auth.index')

@section('content')
    <div class="form-group flex-box">
        <a class="back web-item" href="{{ route('login') }}">
            <img src="{{asset('assets/icon/back.svg')}}">
        </a>
        <div class="blur web-item">
            <div class="circle-one"></div>
        </div>
        <form class="position-relative" method="POST" action="{{ route('submit_two_step') }}">
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
                        برای ادامه لطفا تایید دو مرحله ای خود را انجام دهید
                    </h2>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="row">

                        @if($client->is_2fa_email)
                            <div class="input-row input-group @error('email_code') error-form @enderror ">
                                <label>کد تایید ایمیل</label>
                                <input name="email_code" type="text"
                                       placeholder="لطفا کد ارسال شده به ایمیل خود را وارد نمایید">
                                @error('email_code')
                                <p class="form-error-text">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        @endif

                        @if($client->is_2fa_phone)
                            <div class="input-row input-group @error('sms_code') error-form @enderror ">
                                <label>کد تایید پیامک</label>
                                <input name="sms_code" type="text"
                                       placeholder="لطفا کد ارسال شده به شماره تلفن خود را وارد نمایید">
                                @error('sms_code')
                                <p class="form-error-text">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        @endif

                        @if($client->is_2fa_authenticator)
                            <div class="input-row input-group @error('auth_code') error-form @enderror">
                                <label>رمز یکبار مصرف</label>
                                <input name="auth_code" type="text"
                                       placeholder="لطفا رمز یکبار مصرف خود را وارد نمایید">
                                @error('auth_code')
                                <p class="form-error-text">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        @endif

                        <div class="col-lg-12 ">
                            <div class="input-row">
                                <button type="submit" class="p-button button flex-box">تایید</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <a style="width: 100%; text-align: center" href="{{ route('home') }}"
                       class="button p-button d-block margin">
                        بازگشت به سایت
                    </a>
                </div>

            </div>
        </form>
    </div>

@endsection

