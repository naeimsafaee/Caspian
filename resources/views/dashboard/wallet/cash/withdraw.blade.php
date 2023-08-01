@extends('dashboard.index')

@section('content_head')
    <div class="history-item flex-box">
        <h5 class="no-margin">
            برداشت
        </h5>
    </div>
@endsection

@section('content')
    <div class="padding-item col-lg-12 col-md-12 col-sm-12">
        <div class="items  position-relative overflow-visible">
            <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">
            <div class="row">
                <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                    <p class="grey-text no-margin">
                        در صورت تمایل به برداشت موجودی کیف پول‌های خود درخواست خود را اینجا ثبت کنید
                    </p>
                    <p>
                        درصورت ثبت حساب بانک واستفاده از آن ٬معمولا امکان انتقال داخل بانکی و تسریع درخواست برداشت وجود دارد
                    </p>

                </div>

                <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                    <form method="POST" action="{{ route('cash_withdraw_submit') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <a class="blue-text no-margin" style="position: relative" href="{{ route('pages' , 'withdraw_times') }}">
                                    زمان‌بندی تسویه کاسپین
                                </a>
                            </div>
                            <div class="col-lg-5">
                                <div class="input-row">
                                    <label>
                                        مبلغ برداشتی به تومان
                                    </label>
                                    <input class="padding-right" placeholder="مبلغ برداشتی به تومان" name="amount" id="amount" value="{{ old('amount') }}">
                                    <div class="currency-item">
                                        TMN
                                    </div>
                                    @error('amount')
                                    <p class="form-error-text">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                                <div style="position:relative;height: 21px" id="alphabet_amount"></div>
                            </div>
                            <div class="col-lg-12">
                                <p>
                                    <span class="grey-text bold-text">موجودی قابل برداشت شما:</span>
                                    <span class="green-text"><span>{{ fa_number(number_format($client->wallet)) }}</span><span>تومان</span></span>
                                </p>
                                <p class="no-margin">
                                    <span class="grey-text bold-text">مجموع برداشت ماهانه معادل :</span>
                                    <span class="green-text">
                                        <span>{{ fa_number(number_format($last_month_withdraw->sum('amount'))) }}</span>
                                        <span>از</span>
                                        <span>{{ fa_number(number_format($client->max_withdraw)) }}</span>
                                        <span>تومان</span>
                                    </span>
                                </p>
                            </div>
                            <div class="col-lg-5">
                                <div class="input-row">
                                    <label class="position-relative">
                                        شماره حساب
                                        <a class="flex-box blue-text ltr-direct add-card" href="{{ route('account_add') }}">
                                            <img src="{{asset('assets/icon/blue-text.svg')}}">
                                            شماره حساب
                                        </a>
                                    </label>
                                    <div class="drop-down no-margin">
                                        <div class="selected ">
                                            <a class="flex-box justify-content-between">
                                                <span class="chose">  شماره حساب خود را انتخاب کنید</span>
                                                <img src="{{asset('assets/icon/arrow s.svg')}}">

                                            </a>
                                        </div>
                                        <div class="options choose-card">
                                            <ul>
                                                <img class="z-index-0 bg" src="{{asset('assets/photo/input-blur.png')}}">

                                                @each('components.select_account' , $accounts , 'account')

                                            </ul>
                                        </div>
                                    </div>
                                    @error('account_id')
                                    <p class="form-error-text">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>

                            <input type="hidden" name="account_id" id="selected_card"/>

                            <div class="col-lg-12">
                                <p class="green-text">
                                    میتوانید هریک از حساب های بانکی تایید شده‌ی خود را برای دریافت وجه انتخاب کنید
                                </p>
                            </div>
                            <div class="col-lg-12">
                                <div class="fee-item flex-box justify-content-between">
                                    <span class="grey-text"> کارمزد انتقال </span>
                                    <span>{{ setting('static.cache_fee') }}</span>

                                </div>
                                <p class="green-text">
                                    کارمزد انتقال تومان جهت انجام عملیات بانکی است
                                </p>
                            </div>
                            <div class="col-lg-12 ">
                                <div class=" flex-box justify-content-start">
                                    <button type="submit" class="p-button button b-w-w flex-box"> برداشت </button>
                                    <a href="{{ route('pages' , 'withdraw_fees') }}" class="margin-right black-button flex-box play-btn">
                                        مشاهده کارمزد‌ها
                                    </a>
                                    <a href="{{ url()->previous() }}" class="margin-right black-button flex-box play-btn">
                                        بازگشت
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="margin-top position-relative  padding-item col-lg-10 col-md-12 col-sm-12">
                    <div class=" error-box d-block no-margin">
                        <p>
                            راهنمایی !
                        </p>
                        <p class="grey-text">
                            لطفا پیش از واریز وجه توضیحات زیر را به دقت مطالعه کنید. مسئولیت ناشی از عدم توجه به این موارد به این موارد بر عهده‌ی مشتری خواهد بود کتابهای زیادی در شصت و سه درصد گذشته،
                        </p>
                        <a href="#" class="black-button flex-box play-btn has-icon">
                            راهنمای تصویری
                            <img class="margin-right" src="{{asset('assets/icon/play.svg')}}">
                        </a>


                    </div>

                </div>


            </div>
        </div>

    </div>

@endsection


@section('scripts')
    <script src="{{asset('assets/js/drop-down.js')}}"></script>
    <script src="{{asset('assets/js/persian.js')}}"></script>

    <script>

        $(".sleect_card").click(function(){

            $("#selected_card").val($(this).attr('data-id'))
        })

        $("#amount").on('keyup' , function(){

            let value = parseInt(toEnDigit($("#amount").val().replaceAll(',', '')))

            if(isNaN(value)){
                $("#alphabet_amount").text()
                return;
            }

            $("#alphabet_amount").text(persianJs(value).digitsToWords().toString() + " تومان")

            $("#amount").val(value.toLocaleString())

        })

    </script>

@endsection
