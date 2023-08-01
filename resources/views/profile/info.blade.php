@extends('profile.index')

@section('content_head')
    <div class="history-item flex-box">
        <h5 class="no-margin">
            اطلاعات کاربری
        </h5>
    </div>
@endsection

@section('content')

    <div class="padding-item col-lg-12 col-md-12 col-sm-12">
        <div class="items  position-relative">
            <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">
            <div class="row">
                <div class="padding-item col-lg-6 col-md-6 col-sm-12">
                    <form>
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="input-row ">
                                    <label>
                                        نام
                                    </label>
                                    <input placeholder="نام" value="{{ $client->name }}">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="input-row ">
                                    <label>
                                        نام خانوادگی
                                    </label>
                                    <input placeholder="نام خانوادگی" value="{{ $client->last_name }}">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="input-row ">
                                    <label>
                                        ایمیل
                                    </label>
                                    <input placeholder="ایمیل" value="{{ $client->email }}">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="input-row ">
                                    <label>
                                       شماره تلفن
                                    </label>
                                    <input placeholder="شماره تلفن" value="{{ $client->phone }}">
                                </div>
                            </div>

                           {{-- <div class="col-lg-12 margin-top">
                                <div class="input-row">
                                    <a class="p-button button flex-box">تایید</a>
                                </div>
                            </div>--}}
                        </div>
                    </form>

                </div>
                <div
                        class="flex-box justify-content-center align-items-start web-item padding-item col-lg-6 col-md-6 col-sm-12">
                    <img src="{{asset('assets/icon/account-error.svg')}}">
                </div>
            </div>

        </div>
    </div>

@endsection
