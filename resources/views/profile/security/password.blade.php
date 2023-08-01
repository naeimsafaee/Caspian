@extends('profile.index')

@section('content_head')
    <div class="history-item flex-box">
        <h5 class="no-margin">
            تغییر رمز عبور
        </h5>
    </div>
@endsection

@section('content')
    <div class="padding-item col-lg-12 col-md-12 col-sm-12">
        <div class="items  position-relative">
            <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">
            <div class="row">
                <div class="padding-item col-lg-6 col-md-6 col-sm-12">
                    <form method="post" action="{{ route('change_password_submit') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="input-row  @error('current_password') error-form @enderror ">
                                    <label>
                                        رمز عبور فعلی
                                    </label>
                                    <input type="password" placeholder="رمز عبور فعلی " name="current_password">
                                    @error('current_password')
                                    <p class="form-error-text">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-lg-12">
                                <div class="input-row  @error('password') error-form @enderror ">
                                    <label>
                                        رمز عبور جدید
                                    </label>
                                    <input type="password" placeholder="رمز عبور جدید " name="password">
                                    @error('password')
                                    <p class="form-error-text">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="input-row @error('confirm_password') error-form @enderror ">
                                    <label>
                                        تکرار رمز
                                    </label>
                                    <input type="password" placeholder=" تکرار رمز " name="confirm_password">
                                    @error('confirm_password')
                                    <p class="form-error-text">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12 margin-top">
                                <div class="input-row">
                                    <button type="submit" class="p-button button flex-box col-lg-12">تایید</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <div
                    class="flex-box justify-content-center align-items-start web-item padding-item col-lg-6 col-md-6 col-sm-12">
                    <img src="{{asset('assets/icon/change-pass.svg')}}">
                </div>
            </div>

        </div>
    </div>


@endsection
