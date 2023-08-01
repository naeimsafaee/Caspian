@extends('dashboard.index')

@section('content-head')
    <div class="history-item flex-box">
        <h5 class="no-margin">
            درخواست کپی تریدر شدن
        </h5>
    </div>
@endsection

@section('content')
    <div class="padding-item col-lg-12 col-md-12 col-sm-12">
        <div class="items  position-relative">
            <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">
            <div class="row">
                <div class="padding-item col-lg-6 col-md-12 col-sm-12">
                    <form action="{{ route('copytrade__request_submit') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="input-row">
                                    <label>
                                        نام کاربری
                                    </label>
                                    <input name="username" value="{{ old('username') }}" placeholder="نام کاربری ">
                                    @error('username')
                                    <p class="form-error-text" style="margin: unset">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="input-row">
                                    <label>
                                        چگونه میخواهید دیگران از شما کپی کنند؟
                                    </label>
                                    <div class="drop-down no-margin">
                                        <div class="selected ">
                                            <a class="flex-box justify-content-between">
                                                <span class="chose">
                                                    @if($errors->has('first_price'))
                                                        از طریق غیرمستقیم
                                                    @elseif($errors->has('second_price'))
                                                        از طریق مستقیم
                                                    @else
                                                        چگونه میخواهید دیگران از شما کپی کنند؟
                                                    @endif
                                                </span>
                                                <img src="{{asset('assets/icon/arrow s.svg')}}">

                                            </a>
                                        </div>
                                        <div class="options">
                                            <ul>
                                                <img class="z-index-0 bg"
                                                     src="{{asset('assets/photo/input-blur.png')}}">

                                                <li class="copytrade_type" data-type="0">
                                                    <a>از طریق غیرمستقیم
                                                        <span class="value">صرافی کاسپین</span>
                                                    </a>
                                                </li>
                                                <li class="copytrade_type" data-type="1">
                                                    <a>از طریق مستقیم
                                                        <span class="value">صرافی کاسپین</span>
                                                    </a>
                                                </li>
                                                <li class="copytrade_type" data-type="2">
                                                    <a>رایگان
                                                        <span class="value">صرافی کاسپین</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        @error('copy_trade_type')
                                        <p class="form-error-text" style="margin: unset">
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>
                                    <input type="hidden" name="copy_trade_type" id="copy_trade_type"
                                           value="@if($errors->has('first_price')) 0 @elseif($errors->has('second_price')) 1 @else -1 @endif"/>
                                </div>
                            </div>

                            <div class="col-lg-12 copy_trades_types"
                                 style="display: none;@error('first_price') display: block; @enderror" id="first_price">
                                <div class="input-row">
                                    <label>
                                        مبلغ دستمزد اولیه
                                    </label>
                                    <input name="first_price" placeholder=" مبلغ دستمزد اولیه ">
                                    @error('first_price')
                                    <p class="form-error-text" style="margin: unset">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12 copy_trades_types"
                                 style="display: none;@error('second_price') display: block; @enderror"
                                 id="second_price">
                                <div class="input-row">
                                    <label>
                                        درصد دستمزد از معاملات
                                    </label>
                                    <input name="second_price" placeholder=" مبلغ دستمزد از معاملات  ">
                                    @error('second_price')
                                    <p class="form-error-text" style="margin: unset">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="padding-item col-lg-12">
                                <div class="input-row no-margin">
                                    <div class="flex-box justify-content-start">
                                        <p class="margin-left no-margin white-text">
                                            هزینه ی اشتراک
                                        </p>
                                        <p class="no-margin">
                                            <span class="white-text">{{ fa_number(number_format(setting('static.copytrade_fee'))) }}</span>
                                            <span style="margin-right: 5px" class="grey-text">تومان</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <p class="white-text no-margin">
                                    موجودی کیف پول :
                                    <span>{{ fa_number(number_format(auth()->guard('clients')->user()->wallet)) }}</span>
                                    تومان
                                </p>
                            </div>
                            @if(setting('static.copytrade_fee') > auth()->guard('clients')->user()->wallet)
                                <div class="col-lg-12">
                                    <div class="error-box flex-box s-wallet">
                                        <p class="no-margin">موجودی ناکافی! </p>
                                        <a class="red-button flex-box"
                                           href="{{ route('wallet_cash_deposit' , ["amount" => (int) setting('static.copytrade_fee') - (int) auth()->guard('clients')->user()->wallet]) }}">
                                            <p class="no-margin">
                                                شارژ کیف پول
                                            </p>
                                            <img src="{{asset('assets/icon/s-wallet.svg')}}">
                                        </a>
                                    </div>
                                </div>
                            @endif

                            @error('amount')
                            <p class="form-error-text" style="margin: unset">
                                {{ $message }}
                            </p>
                            @enderror

                            <div class="col-lg-12 ">
                                <div class="input-row">
                                    <button type="submit" class="p-button button flex-box">پرداخت از کیف پول</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="position-relative padding-right-items padding-item col-lg-6 col-md-12 col-sm-12">
                    <img class="line-right" src="{{asset('assets/icon/line.png')}}">
                    <div class=" error-box d-block no-margin">
                        <p>
                            اخطار!
                        </p>
                        <p class="grey-text">
                            برای کپی تریدینگ باید هرسه مرحله احراز هویت را تکمیل کرده باشد لورم ایپسوم متن ساختگی با
                            تولید سادگی نامفهوماز صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه
                            روزنامه و مجله در برای کپی تریدینگ باید هرسه مرحله احراز هویت را تکمیل کرده باشد لورم ایپسوم
                            متن ساختگی با تولید سادگی نامفهوماز صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و
                            متون بلکه روزنامه و مجله در
                        </p>

                    </div>

                </div>


            </div>

        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{asset('assets/js/drop-down.js')}}"></script>

    <script>

        $('.copytrade_type').click(function () {
            const type = $(this).attr('data-type')

            $('.copy_trades_types').hide()

            if (type == 0)
                $('#first_price').show()

            if (type == 1)
                $('#second_price').show()

            $("#copy_trade_type").val(type)
        })

    </script>

@endsection

