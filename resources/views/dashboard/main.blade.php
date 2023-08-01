@extends('dashboard.index')

@section('content')

    <div class=" col-lg-12 col-md-12 col-sm-12">
        <div class="row">

            @if (\Session::has('success'))
                <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                    <div class="flex-box error-box justify-content-start"
                         style="background: linear-gradient(134.47deg, rgb(96 229 131 / 10%) 36.17%, rgb(97 193 122 / 10%) 58.77%, rgb(62 150 105 / 10%) 74.8%);border: 1px solid rgb(96 229 119 / 30%);color: #5db358;">
                        <img src="{{asset('assets/icon/error_green.svg')}}">

                        {!! \Session::get('success') !!}

                        <img class="close-error" src="{{asset('assets/icon/close_green.svg')}}">
                    </div>
                </div>
            @endif

            @each('components.dashboard_coin',$last_4_coin , 'last_4')

        </div>
    </div>


    <div class="padding-item col-lg-12 col-md-12 col-sm-12">
        <div class="wallet-tabs items  position-relative overflow-visible">
            <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">
            <div class="row">
                <div class="col-lg-5 col-md-12">
                    <div class="white-text bold-text">
                        کیف‌های شما
                    </div>
                    <canvas id="dashboard-chart" height="60px " width="60px"></canvas>
                </div>
                <div class="col-lg-7 col-md-12 dashboard-details">

                    <a data-toggle="modal" data-target="#account-modal" class="p-button button  flex-box">
                        وضعیت حساب کاربری
                    </a>

                    @foreach($client_coins as $coin)
                        @if($loop->index > 2)
                            @break
                        @endif
                        <div class="flex-box justify-content-between">
                            <div class="grey-text flex-box">
                                <span class="bold-text">{{ strtoupper($coin->coin->symbol) }}</span>
                                <span style="margin-left: 8px">{{ fa_number(($coin->amount)) }}</span>
                            </div>
                            <div class="gradient-line"></div>
                            <div class="white-text flex-box">{{ ($coin->coin->persian_name) }}</div>
                        </div>
                    @endforeach

                </div>

            </div>
            <div class="gradient-line"></div>
            <div class="row">
                <div class="flex-box justify-content-start col-lg-5 col-md-12">
                    <div class="white-text bold-text">
                        ارزش تخمین دارایی ها
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 dashboard-details">

                    <div class="flex-box justify-content-between margin-bottom">
                        <div class="grey-text flex-box">
                            <span>تومان</span>
                            <span>{{ fa_number(number_format($bid_amount)) }}</span>
                        </div>
                        <div class="white-text flex-box"> پیشنهاد‌های خرید</div>

                    </div>
                    <div class="flex-box justify-content-between">
                        <div class="grey-text flex-box">
                            <span>تومان</span>
                            <span>{{ fa_number(number_format($offer_amount)) }}</span>
                        </div>
                        <div class="white-text flex-box">پیشنهاد‌های فروش</div>

                    </div>

                </div>

            </div>

        </div>

    </div>
    {{--<div class="padding-item col-lg-12 col-md-12 col-sm-12">
        <div class="items tile position-relative overflow-visible">
--}}{{--            <img class="z-index-0 bg" src="assets/photo/row-item.png">--}}{{--
            <div class="bold-text big-text z-index-1">
                برداشت
            </div>
            <table>
                <thead>
                <tr>
                    <th>زمان</th>
                    <th> آدرس دریافت کننده</th>
                    <th>مقدار</th>
                    <th>وضعیت</th>
                    <th>توضیحات</th>
                    <th>اقدامات</th>

                </tr>
                </thead>
                <tbody>


                </tbody>
            </table>
            <p class="grey-text text-center">
                برداشتی ثبت نشده است
            </p>

        </div>

    </div>
    <div class="padding-item col-lg-12 col-md-12 col-sm-12">
        <div class="items tile  position-relative overflow-visible">
--}}{{--            <img class="z-index-0 bg" src="assets/photo/row-item.png">--}}{{--
            <div class="bold-text big-text">
                تاریخچه تراکنش‌ها
            </div>
            <table>
                <thead>
                <tr>
                    <th class="text-right">زمان</th>
                    <th class="text-right chlid1"> (بیت کوین) مقدار</th>
                    <th class="text-right">توضیحات</th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="grey-text text-right" data-column="زمان">
                        ۱۸
                        دی
                        ۹:۴۵
                    </td>
                    <td class="grey-text text-right chlid1" data-column=" (بیت کوین) مقدار<">۰.۰۰۰۱۳۲۵۶۷</td>
                    <td class="grey-text text-right" data-column="توضیحات">
                        خرید
                        ۰.۰۰۰۱۳۲۵۶۷
                        بیت‌کوین به قیمت واحد
                        ۱۲.۳۵۴.۵۴۵.۳۴۶
                        ریال
                    </td>
                </tr>
                <tr>
                    <td class="grey-text text-right" data-column="زمان">
                        ۱۸
                        دی
                        ۹:۴۵
                    </td>
                    <td class="grey-text text-right chlid1" data-column=" (بیت کوین) مقدار<">۰.۰۰۰۱۳۲۵۶۷</td>
                    <td class="grey-text text-right" data-column="توضیحات">
                        خرید
                        ۰.۰۰۰۱۳۲۵۶۷
                        بیت‌کوین به قیمت واحد
                        ۱۲.۳۵۴.۵۴۵.۳۴۶
                        ریال

                    </td>
                </tr>
                </tbody>
            </table>


        </div>

    </div>--}}

@endsection

@section('modal')

    <div class="modal fade" id="account-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content ">
                <div class="modal-headers flex-box justify-content-center">
                    <h5>  وضعیت حساب کاربری </h5>
                    <img data-dismiss="modal" src="/assets/icon/modal-close.svg">

                </div>
                <div class="trade-item   modal-split">
                    <div class="account-details flex-box justify-content-between">
                        <div class="title">سطح کاربری</div>
                        <div class="value">
                            <span>
                تایید شده‌ی سطح
                                {{ fa_number(auth()->guard('clients')->user()->level , false , true) }}
                            </span>
                            <a href="{{ route('verification') }}" class="blue-text">
                                ارتقا
                            </a>
                        </div>

                    </div>
                    <div class="gradient-line"></div>
                    <div class="account-details flex-box justify-content-between">
                        <div class="title"> برداشت روزانه ریالی:</div>
                        <div class="value">
                            <span>
                               ۰ از {{ fa_number(auth()->guard('clients')->user()->level , false , true) }} تومان
                            </span>
                        </div>

                    </div>
                    <div class="gradient-line"></div>
                    <div class="account-details flex-box justify-content-between">
                        <div class="title"> برداشت روزانه رمزارز: </div>
                        <div class="value">
                            <span>
                               ۰ از {{ fa_number(auth()->guard('clients')->user()->level , false , true) }} تومان
                            </span>
                        </div>

                    </div>
                    <div class="gradient-line"></div>
                    <div class="account-details flex-box justify-content-between">
                        <div class="title">مجموع برداشت روزانه: </div>
                        <div class="value">
                            <span>
                               ۰ از ۳۰۰٬۰۰۰٬۰۰۰ تومان
                            </span>
                        </div>

                    </div>
                    <div class="gradient-line"></div>
                    <div class="account-details flex-box justify-content-between">
                        <div class="title"> مجموع برداشت ماهانه:</div>
                        <div class="value">
                            <span>
                                از
                                ۶٬۴۹۵
                              ۳٬۰۰۰٬۰۰۰٬۰۰۰
                                تومان
                            </span>
                        </div>

                    </div>
                    <div class="gradient-line"></div>
                    <div class="account-details flex-box justify-content-between">
                        <div class="title">کارمزد معاملات :</div>
                        <div class="value">
                            <span>
                                ۰.۳۵٪
                          ( ۰.۳٪ پله بعد )
                            </span>
                        </div>

                    </div>
                    <div class="gradient-line"></div>
                    <div class="account-details flex-box justify-content-between">
                        <div class="title"> ارزش معاملات سی روز :</div>
                        <div class="value">
                            <span>
                             ۵٬۵۴۵٬۵۴۷
                               تومان
                           (  پله بعد ۱۰ میلیون تومان )
                            </span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>

        new Chart(document.getElementById('dashboard-chart'), {
            type: 'doughnut',
            animation: {
                animateScale: true
            },
            data: {
                labels: [
                    @foreach($client_coins as $coin)
                        @if($loop->index > 2)
                            @break
                        @endif
                        "{{ $coin->coin->symbol }}",
                    @endforeach
                ],
                datasets: [{
                    data: [
                        @foreach($client_coins as $coin)
                            @if($loop->index > 2)
                                @break
                            @endif
                            {{ $coin->amount }},
                        @endforeach
                    ],
                    backgroundColor: [
                        "#FCF782",
                        "#EE97E0",
                        "#61BEE7",
                    ],
                    hoverBackgroundColor: [
                        "#FCF782",
                        "#EE97E0",
                        "#61BEE7",
                    ]
                }]
            },
            options: {
                cutoutPercentage: 60,
                cutout: 120,
                elements: {
                    arc: {
                        borderWidth: 0
                    },
                    center: {
                        text: "dasd"
                    }
                },
                responsive: true,
                legend: false,
                tooltips: {
                    enabled: true,
                    mode: 'label',
                },
            }
        });


    </script>
@endsection
