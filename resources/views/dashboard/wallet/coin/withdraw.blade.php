@extends('dashboard.index')

@section('content_head')
    <div class="padding-item col-lg-12 col-md-12 col-sm-12">
        <h5 class="no-margin">
            درخواست برداشت {{ $coin->persian_name }}
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
                        در صورت تمایل به برداشت موجودی کیف پول‌ {{ $coin->persian_name }} خود درخواست خود را اینجا ثبت
                        کنید
                    </p>
                </div>
                <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                    <form action="{{ route('coin_withdraw_submit') }}" method="POST" id="main_form">
                        @csrf
                        <div class="row">

                            <div class="col-lg-5">
                                <div class="input-row">
                                    <label>
                                         مقدار برداشت ({{ $coin->persian_name }})
                                    </label>
                                    <input name="amount" placeholder="   مقدار برداشت ({{ $coin->persian_name }})">
                                    @error('amount')
                                    <p>
                                        <span class="green-text bold-text">{{ $message }}</span>
                                    </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <p>
                                    <span class="grey-text bold-text">موجودی قابل برداشت شما:</span>
                                    <span class="green-text"><span>{{ $client->coin($coin->id) }}</span> {{ strtoupper($coin->symbol) }}</span>
                                </p>
                                <p>
                                    <span class="grey-text bold-text">مجموع برداشت روزانه معادل:</span>
                                    @if($coin->max_withdraw_daily)
                                        <span class="green-text">
                                        <span>۰</span>
                                        <span>از</span>
                                        <span>{{ $coin->max_withdraw_daily }}</span>
                                        <span>{{ strtoupper($coin->symbol) }}</span>
                                    </span>
                                    @else
                                        <span class="green-text">
                                            نامحدود
                                        </span>
                                    @endif

                                </p>
                                <p class="no-margin">
                                    <span class="grey-text bold-text">مجموع برداشت ماهانه معادل :</span>
                                    @if($coin->max_withdraw_monthly)
                                        <span class="green-text">
                                        <span>۰</span>
                                        <span>از</span>
                                        <span>{{ $coin->max_withdraw_monthly }}</span>
                                        <span>{{ strtoupper($coin->symbol) }}</span>
                                    </span>
                                    @else
                                        <span class="green-text">
                                            نامحدود
                                        </span>
                                    @endif
                                </p>
                            </div>

                            <div class="col-lg-12">
                                <div class="flex-box justify-content-start network-type">
                                    <span class="white-text bold-text">
                                        نوع شبکه
                                    </span>
                                    <ul class="flex-box footer-list">
                                        @foreach($networks as $network)
                                            <li>
                                                <a class="flex-box networks_radios"
                                                   onclick="change_network('{{ $network->persian_name }}' ,
                                                    {{ $network->has_memo }} , {{ $network->id }} ,
                                                    {{ $network->coin_fee($coin->id) }} , {{ $loop->index }})">
                                                    <span class="flex-box">
                                                        <span class="on-hover"></span>
                                                    </span>
                                                    {{ strtoupper($network->symbol) }}
                                                </a>
                                            </li>
                                        @endforeach
                                        <input type="hidden" name="network_id" id="network_id"/>
                                        <input type="hidden" name="coin_id" value="{{ $coin->id }}"/>
                                    </ul>


                                </div>
                                @error('network_id')
                                <div>
                                    <p>
                                        <span class="green-text bold-text">{{ $message }}</span>
                                    </p>
                                </div>
                                @enderror
                            </div>


                            <div class="col-lg-5">
                                <div class="input-row">
                                    <label class="position-relative">
                                        آدرس کیف ‌پول مقصد
                                    </label>
                                    <input name="address" placeholder="   آدرس کیف ‌پول مقصد">
                                    @error('address')
                                    <p>
                                        <span class="green-text bold-text">{{ $message }}</span>
                                    </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-5 memo_div" style="display: none">
                                <label class="container-checkbox margins">
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                    بدون ممو
                                </label>
                            </div>

                            <div class="col-lg-12">
                                <p class="green-text">
                                    توجه!وارد کردن آدرس نادرست ممکن است منجر به از دست رفتن منابع مالی شما شود
                                </p>
                            </div>

                            <div class="col-lg-5 memo_div" style="display: none">
                                <div class="input-row">
                                    <label class="position-relative">
                                        ممو آدرس مقصد
                                    </label>
                                    <input placeholder="ممو آدرس مقصد">
                                </div>
                            </div>

                            <div class="col-lg-12 memo_div" style="display: none">
                                <p class="green-text">
                                    علاوه بر آدرس نیاز به وارد کردن یک ممو عددی تولید شده برای شما نیز میباشد.
                                </p>
                            </div>

                            <div class="col-lg-12">
                                <div class="fee-item flex-box justify-content-between">
                                    <span class="grey-text"> کارمزد انتقال </span>
                                    <span class="network_fee">
                                    </span>
                                </div>
                                <p class="green-text">
                                    کارمزد انتقال مربوط به ثبت تراکنش در شبکه <span class="network_name"></span> بوده و
                                    صرافی کاسپین درآن ذینفع
                                    نیست.
                                </p>
                            </div>

                            <div class="col-lg-12">
                                <p class="white-text">
                                    در صورتی که آدرس مقصد متعلق به کاربران کاسپین بوده و توسط کاسپین مدیریت شود.
                                    </br>
                                    انتقال به صورت مستقیم و سریع صورت میگیرد و کارمزد انتقال صفر خواهد بود.
                                </p>
                            </div>

                            <div class="col-lg-12 ">
                                <div class=" flex-box justify-content-start">
                                    <a href="#" class="p-button button b-w-w flex-box" style="max-width: unset"
                                       onclick="$('#main_form').submit()"> ایجاد درخواست برداشت </a>
                                    <a href="{{ route('pages' , 'fee') }}" target="_blank" class="margin-right black-button flex-box play-btn">
                                        مشاهده کارمزد‌ها
                                    </a>
                                    <a href="{{ route('wallet') }}" class="margin-right black-button flex-box play-btn">
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
                            لطفا پیش از ثبت درخواست برداشت ارز توضیحات زیر را به دقت مطالعه کنید. مسئولیت ناشی از عدم توجه به این موارد به این موارد بر عهده‌ی مشتری خواهد بود
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

    <script>

        @if($networks->count() > 0)
            change_network('{{ $networks->first()->persian_name }}',
                {{ $networks->first()->has_memo }} , {{ $networks->first()->id }} ,
                {{ $networks->first()->coin_fee($coin->id) }})
        @endif


        function change_network(network_name, has_memo, network_id , network_fee , click_index = 0) {

            $('.networks_radios span').removeClass('active_radio_button')

            $('.networks_radios').eq(click_index).find('span').addClass('active_radio_button')

            if (has_memo)
                $('.memo_div').fadeIn()
            else
                $('.memo_div').fadeOut()

            $("#network_id").val(network_id)

            $(".network_fee").text(network_fee + " {{ $coin->persian_name }} ")
            $(".network_name").text(network_name);
        }

    </script>


@endsection
