@extends('profile.index')

@section('content_head')
    <div class="history-item flex-box">
        <h5 class="no-margin">
            افزودن شماره حساب
        </h5>
    </div>
@endsection

@section('content')

    <div class="padding-item col-lg-12 col-md-12 col-sm-12">
        <div class="items  position-relative overflow-visible">
            <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">
            <div class="row">
                <div class=" col-lg-6 col-md-12 col-sm-12">
                    <form method="POST" action="{{ route('submit_account_add') }}">
                        @csrf
                        <div class="row">

                            <div class="padding-item col-lg-12">
                                <div class="input-row">
                                    <label>
                                        نام صاحب کارت
                                    </label>
                                    <input name="owner" placeholder="نام صاحب کارت " value="{{ old('owner') }}"
                                           class=" @error('owner') error-form @enderror ">
                                    @error('owner')
                                    <p class="form-error-text">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="padding-item col-lg-12">
                                <div class="input-row">
                                    <label>
                                        شماره شبا
                                    </label>
                                    <input id="account_number" name="account_number" placeholder="شماره شبا"
                                           value="{{ old('account_number') }}"
                                           class=" @error('account_number') error-form @enderror ">
                                    @error('account_number')
                                    <p class="form-error-text">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="padding-item col-lg-12 ">
                                <div class="input-row">
                                    <button type="submit" class="p-button button  flex-box"> بررسی </button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="flex-box padding-item col-lg-6 col-md-12 col-sm-12">
                    <img src="{{asset('assets/icon/card.svg')}}">
                </div>


            </div>
        </div>
    </div>

@endsection
