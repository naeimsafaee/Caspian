@extends('profile.index')

@section('content_head')
    <div class="history-item flex-box">
        <a>امنیت </a>
        <img src="{{asset('assets/icon/grey-arrow.svg')}}">
        <a>تایید دو مرحله ای با ایمیل </a>
    </div>
@endsection

@section('content')
    <div class="padding-item col-lg-12 col-md-12 col-sm-12">
        <div class="overflow-visible items  position-relative">
            <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">
            <div class="row">
                <div class="padding-item col-lg-6 col-md-6 col-sm-12">
                    <form method="post" action="{{ route('email_verify_submit_2fa') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 ">
                                <div class="input-row">
                                    <label>
                                        ایمیل
                                    </label>
                                    <input type="text" placeholder="ایمیل خود را وارد کنید" disabled value="{{ $client->email}}">
                                </div>
                            </div>
                            <div class="col-lg-12 ">
                                <div class="input-row">
                                    <button class="p-button button flex-box col-lg-12"> ارسال کد </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="flex-box justify-content-center  web-item padding-item col-lg-6 col-md-6 col-sm-12">
                    <img src="{{asset('assets/icon/email2.svg')}}">
                </div>
            </div>

        </div>
    </div>
@endsection
