@extends('profile.index')

@section('content_head')
    <div class="history-item flex-box">
        <h5 class="no-margin">
            ارتقا به سطح یک
        </h5>
    </div>
@endsection

@section('content')

    <div class="padding-item col-lg-12 col-md-12 col-sm-12">
        <div class="items  position-relative">
            <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">
            <div class="row">
                <div class="padding-item col-lg-6 col-md-6 col-sm-12">
                    <form method="post" action="{{ route('level_one_submit') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="input-row @error('name') error-form @enderror ">
                                    <label>
                                        نام
                                    </label>
                                    <input placeholder="نام" name="name" value="{{ old('name') }}">
                                    @error('name')
                                    <p class="form-error-text">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-lg-12">
                                <div class="input-row  @error('last_name') error-form @enderror ">
                                    <label>
                                        نام خانوادگی
                                    </label>
                                    <input placeholder="نام خانوادگی" name="last_name" value="{{ old('last_name') }}">
                                    @error('name')
                                    <p class="form-error-text">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-lg-12">
                                <div class="input-row @error('melli_code') error-form @enderror ">
                                    <label>
                                        کدملی
                                    </label>
                                    <input placeholder="کدملی" name="melli_code" value="{{ old('melli_code') }}">
                                    @error('melli_code')
                                    <p class="form-error-text">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>
                            @if($client->is_phone_verify)
                                <div class="col-lg-12">
                                    <div class="input-row @error('email') error-form @enderror ">
                                        <label>
                                            ایمیل
                                        </label>
                                        <input placeholder="ایمیل" name="email" value="{{ old('email') }}">
                                        @error('email')
                                        <p class="form-error-text">
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>
                                </div>
                            @else
                                <div class="col-lg-12">
                                    <div class="input-row @error('phone') error-form @enderror ">
                                        <label>
                                            موبایل
                                        </label>
                                        <input placeholder="موبایل" name="phone" value="{{ old('phone') }}">
                                        @error('phone')
                                        <p class="form-error-text">
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>
                                </div>
                            @endif
                            {{--<div class="col-lg-12 margin-top">
                                <div class="input-row">
                                    <button type="submit" class="p-button button flex-box">تایید</button>
                                </div>
                            </div>--}}

                            <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                                <div class="input-row">
                                    <button type="submit" class="p-button button b-w-w flex-box"> تایید</button>
                                </div>
                            </div>
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

