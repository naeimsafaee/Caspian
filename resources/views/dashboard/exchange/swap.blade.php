@extends('dashboard.index')

@section('content_head')

    <div class="history-item flex-box">
        <h5 class="no-margin">
            @if($vs_coin->persian_name == 'تومان')
                فروش {{ $coin->persian_name }}
            @else
                خرید {{ $vs_coin->persian_name }}
            @endif
        </h5>
    </div>
@endsection

@section('content')

    <div class="padding-item col-lg-12 col-md-12 col-sm-12">
        <div class="items  position-relative overflow-visible">
            <div class="center-div">
                <div class="col-lg-12">

                    @error('amount')
                    <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                        <div class="flex-box error-box justify-content-start">
                            <img src="/assets/icon/error.svg">

                            {{ $message }}

                            <img class="close-error" src="/assets/icon/close.svg">
                        </div>
                    </div>
                    @enderror

                    <div class="input-row ">
                        <label>
                            نوع ارز را انتخاب کنید
                        </label>
                        <form class="row convert-row position-relative" id="main_form" method="POST"
                              action="{{ route('submit_exchange_buy') }}">
                            <div class="flex-box col-lg-10 col-md-10 col-sm-10 col-12 position-relative">
                                <div class="row">
                                    <div class="margin-bottom position-relative col-lg-12 col-md-12 col-sm-12">

                                        @csrf
                                        <input name="coin" type="hidden" value="{{ $coin->symbol }}">
                                        <input name="vs_coin" type="hidden" value="{{ $vs_coin->symbol }}">

                                        <input id="amount_input" name="amount" placeholder="پرداخت می کنم">

                                        <div class="drop-down no-margin">

                                            <div class="selected ">
                                                <a class="flex-box justify-content-between" href="#">
                                                    <span class="chose">
                                                        <div class="flex-box crypto">
                                                            <div class="image-box">
                                                                <img src="{{ $coin->icon }}">
                                                            </div>
                                                            <p class="no-margin grey-text">
                                                                {{ $coin->persian_name }}
                                                            </p>
                                                        </div>
                                                    </span>
                                                    <img src="{{asset('assets/icon/arrow s.svg')}}">
                                                </a>
                                            </div>

                                            <div class="options">
                                                <ul>
                                                    <img class="z-index-0 bg"
                                                         src="{{asset('assets/photo/input-blur.png')}}">

                                                    @if($vs_coin->name != 'Toman')
                                                        <li>
                                                            <a href="{{ route('exchange_buy' , ['Toman' , $vs_coin->name ]) }}">
                                                                <div class="flex-box crypto justify-content-start">
                                                                    <div class="image-box">
                                                                        <img src="{{ $toman->icon }}">
                                                                    </div>
                                                                    <p class="no-margin grey-text">
                                                                        {{ $toman->persian_name }}
                                                                    </p>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    @endif

                                                    @foreach($all_coin as $_coin)
                                                        @if($vs_coin->name != $_coin->name)
                                                            <li>
                                                                <a href="{{ route('exchange_buy' , [$_coin->name, $vs_coin->name]) }}">
                                                                    <div class="flex-box crypto justify-content-start">
                                                                        <div class="image-box">
                                                                            <img src="{{ $_coin->icon }}">
                                                                        </div>
                                                                        <p class="no-margin grey-text">
                                                                            {{ $_coin->persian_name }}
                                                                        </p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        @endif
                                                    @endforeach

                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="position-relative col-lg-12 col-md-12 col-sm-12">

                                        <input id="amount_output" name="amount_output" placeholder=" دریافت میکنم">

                                        <div class="drop-down no-margin">
                                            <div class="selected ">
                                                <a class="flex-box justify-content-between" href="#">
                                                    <span class="chose">
                                                        <div class="flex-box crypto">
                                                            <div class="image-box">
                                                                <img src="{{ $vs_coin->icon }}">
                                                            </div>
                                                            <p class="no-margin grey-text">
                                                                {{ $vs_coin->persian_name }}
                                                            </p>
                                                        </div>
                                                    </span>
                                                    <img src="{{asset('assets/icon/arrow s.svg')}}">
                                                </a>
                                            </div>
                                            <div class="options">
                                                <ul>
                                                    <img class="z-index-0 bg"
                                                         src="{{asset('assets/photo/input-blur.png')}}">

                                                    @if($coin->name != 'Toman')
                                                        <li>
                                                            <a href="{{ route('exchange_buy' , [$coin->name , 'Toman']) }}">
                                                                <div class="flex-box crypto justify-content-start">
                                                                    <div class="image-box">
                                                                        <img src="{{ $toman->icon }}">
                                                                    </div>
                                                                    <p class="no-margin grey-text">
                                                                        {{ $toman->persian_name }}
                                                                    </p>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    @endif

                                                    @foreach($all_coin as $_coin)
                                                        @if($coin->name != $_coin->name)
                                                            <li>
                                                                <a href="{{ route('exchange_buy' , [$coin->name , $_coin->name]) }}">
                                                                    <div class="flex-box crypto justify-content-start">
                                                                        <div class="image-box">
                                                                            <img src="{{ $_coin->icon }}">
                                                                        </div>
                                                                        <p class="no-margin grey-text">
                                                                            {{ $_coin->persian_name }}
                                                                        </p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        @endif
                                                    @endforeach

                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-2 col-md-2 col-sm-2 col-0">
                                <a class="p-button button flex-box convert-button"
                                   href="{{ route('exchange_buy' , [$vs_coin->name , $coin->name]) }}">
                                    <img src="{{asset('assets/icon/convert.svg')}}">
                                </a>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="col-lg-12">
                    <p class="white-text no-margin">
                        هزینه تراکنش :
                        <span>{{ fa_number(number_format(setting('static.swap_fee'))) }}</span>
                        هزار تومان
                    </p>
                </div>
                <div class="col-lg-12">
                    <p class="white-text no-margin">
                        درکل :
                        <span id="result">۰</span>
                        {{ $coin->persian_name }}
                    </p>
                </div>
                <div class="col-lg-12 " id="use_wallet">
                    <div class="input-row">
                        <a class="p-button button b-w-w flex-box"> استفاده از کیف پول </a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <p class="white-text no-margin">
                        موجودی کیف پول :
                        <span>{{ fa_number(number_format($client_wallet)) }}</span>
                        {{ $coin->persian_name }}
                    </p>
                </div>
                <div class="col-lg-12" id="not_enough_money" style="display: none">
                    <div class="error-box flex-box s-wallet">
                        <p class="no-margin">موجودی ناکافی! </p>
                        <a class="red-button flex-box" href="{{ route('wallet_cash_deposit') }}">
                            <p class="no-margin">
                                شارژ کیف پول
                            </p>
                            <img src="{{asset('assets/icon/s-wallet.svg')}}">
                        </a>
                    </div>
                </div>
                <div class="margin-top  col-lg-12 col-md-12 col-sm-12">
                    <div class=" error-box d-block no-margin">
                        <p class="no-margin bold-text">
                            راهنمایی !
                        </p>
                        <p class="grey-text">
                           لطفا پیش از انجام هر تبادلی با صرافی ابتدا ویدیوی آموزشی زیر را مشاهده کنید.
                            مسئولیت از دست رفتن سرمایه به عهده مشتری می باشد.
                        </p>
                        <a href="#" class="black-button flex-box play-btn has-icon">
                            راهنمای تصویری
                            <img class="margin-right" src="{{asset('assets/icon/play.svg')}}">
                        </a>
                    </div>

                </div>

            </div>

            <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">

        </div>
    </div>



@endsection

@section('scripts')
    <script src="{{asset('assets/js/drop-down.js')}}"></script>

    <script>

        const coin_price = parseFloat('{{ $coin->price }}')
        const vs_coin_price = parseFloat('{{ $vs_coin->price }}')
        const client_coin_amount = parseFloat('{{ $client_wallet }}')
        const coin_fee = 0;

        function calculate(is_input = false) {
            const input_value = $('#amount_input').val()
            const output_value = $('#amount_output').val()

            let input_amount
            let output_amount

            if (is_input) {

                if (!input_value)
                    return

                input_amount = parseFloat(toEnDigit(input_value.replaceAll(',', '')));

                output_amount = input_amount * parseFloat('{{ $rate }}');

            } else {

                if (!output_value)
                    return

                output_amount = parseFloat(toEnDigit(output_value.replaceAll(',', '')));

                input_amount = output_amount / parseFloat('{{ $rate }}');

            }

            $('#amount_output').val(output_amount.toLocaleString())
            $("#amount_input").val(input_amount.toLocaleString())

            if (input_amount > client_coin_amount) {
                $("#use_wallet").hide()

                $("#not_enough_money").find('a').attr('href' , `{{ route('wallet_cash_deposit') }}?amount=${input_amount - client_coin_amount}`)

                $("#not_enough_money").show()
            } else {
                $("#use_wallet").show()
                $("#not_enough_money").hide()
            }

            $("#result").text((input_amount - coin_fee).toLocaleString())

        }

        $("#use_wallet a").click(() => {
            $("#main_form").submit();
        })

        $('#amount_input').on('keyup', function () {
            calculate(true)
        })

        $('#amount_output').on('keyup', function () {
            calculate(false)
        })

    </script>

@endsection
