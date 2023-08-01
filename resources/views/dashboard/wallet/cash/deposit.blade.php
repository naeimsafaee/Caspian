@extends('dashboard.index')


@section('content_head')
    <div class="history-item flex-box">
        <h5 class="no-margin">
            واریز شتابی
        </h5>
    </div>
@endsection

@section('content')
    <div class="padding-item col-lg-12 col-md-12 col-sm-12">
        <div class="items  position-relative overflow-visible">
            <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">
            <div class="row">
                <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                    <p>
                        جهت افزایش اعتبار کیف پول ریالی خود با استفاده از کارت های بانکی عضو شبکه شتاب و از طریق درگاه
                        پرداخت اینترتی اقدام نمایید
                    </p>
                    <p>
                        درهنگام پرداخت به نکات زیر دقت نمایید:
                    </p>
                    <ul class="list has-list-style">
                        <li>
                            حتما به آدرس صفحه ی درگاه بانکی دقت نموده و تنها پس از اطمینان از حضور درسایت های سامانه‌ی
                            شاپرک مشخصات کارت بانکی خود را وارد نمایید
                        </li>
                        <li>
                            در صفحه‌ی درگاه دقت کنید که حتما مبلغ نمایش داده درست باشد
                        </li>
                        <li>
                            درتعیین مبلغ واریز به این موضوع دقت نمایید که حداقل مبلغ معامله در بازار سیصد هزار تومان است
                        </li>
                    </ul>
                    <p class="yellow-item">
                        جهت واریز وجه٬ حتما باید از کارت‌های بانکی به نام خودتان که در پروفایل ثبت و تایید شده
                        است٬استفاده نمایید
                    </p>
                </div>

                <div class="padding-item col-lg-6 col-md-12 col-sm-12">
                    <form method="POST" action="{{ route('submit_wallet_cash_deposit') }}">
                        @csrf
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="input-row">
                                    <label class="position-relative">
                                        انتخاب کارت
                                        <a class="flex-box blue-text ltr-direct add-card"
                                           href="{{ route('cards_add') }}">
                                            <img src="{{asset('assets/icon/blue-text.svg')}}">
                                            افزودن کارت
                                        </a>
                                    </label>
                                    <div class="drop-down no-margin">

                                        <div class="selected ">
                                            <a class="flex-box justify-content-between">
                                                <span class="chose">کارت خود را انتخاب کنید</span>
                                                <img src="{{asset('assets/icon/arrow s.svg')}}">
                                            </a>
                                        </div>

                                        <div class="options choose-card">
                                            <ul>
                                                <img class="z-index-0 bg"
                                                     src="{{asset('assets/photo/input-blur.png')}}">

                                                @each('components.select_card' , $cards , 'card')

                                            </ul>
                                        </div>
                                    </div>
                                    @error('card_id')
                                    <p class="form-error-text">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden" name="card_id" id="selected_card"/>
                            <div class="col-lg-12">
                                <div class="input-row">
                                    <label>
                                        مبلغ واریزی به تومان
                                    </label>
                                    <input name="amount" id="amount" class="padding-right"
                                           value="{{ request()->amount ?? old('amount') }}" placeholder="مبلغ به تومان">
                                    <div class="currency-item">
                                        TMN
                                    </div>
                                    @error('amount')
                                    <p class="form-error-text">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                                <span style="position:relative;" id="alphabet_amount"></span>
                            </div>
                            <div class="col-lg-12 ">
                                <div class="input-row">
                                    <button type="submit" class="p-button button b-w-w flex-box"> پرداخت</button>
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
                            لطفا پیش از واریز وجه توضیحات زیر را به دقت مطالعه کنید. مسئولیت ناشی از عدم توجه به این
                            موارد به این موارد بر عهده‌ی مشتری خواهد بود کتابهای زیادی در شصت و سه درصد گذشته،
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


        $(".sleect_card").click(function () {

            $("#selected_card").val($(this).attr('data-id'))
        })

        $("#amount").on('keyup', function () {

            let value = parseInt(toEnDigit($("#amount").val().replaceAll(',', '')))

            if (isNaN(value)) {
                $("#alphabet_amount").text()
                return;
            }

            $("#alphabet_amount").text(persianJs(value).digitsToWords().toString() + " تومان")

            $("#amount").val(value.toLocaleString())

        })

        $("#amount").keyup()


    </script>

@endsection
