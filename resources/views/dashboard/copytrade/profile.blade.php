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
        <div class="items justify-content-start  position-relative">

            <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">
            <div class="trading-profile trade-item column-item  box-item d-block">
                <div class="row ltr-direct">
                    <div class="padding-item col-lg-4 col-md-6 col-sm-12">
                        <div class="rtl-direct justify-content-end flex-box user-profile">
                            <div>
                                <h5 class="white-text no-margin">
                                    {{ $trader->client->name }} {{ $trader->client->last_name }}
                                </h5>
                                <p class="no-margin grey-text">
                                    {{ $trader->username }}
                                </p>
                            </div>
                            <div class="image-box">
                                <img src="{{asset('assets/photo/sample.png')}}">
                            </div>

                        </div>
                        <div class="justify-content-center-mobile rtl-direct flex-box justify-content-end">
                            <div class="margin-left">
                                <p class="no-margin text-center green-item">{{ fa_number($trader->risk) }}% </p>

                            </div>
                            <div>
                                <p class="no-margin text-center grey-text">
                                    بازدید
                                    ( {{ \Carbon\Carbon::create($trader->client->last_login_at)->diffForHumans() }} )
                                </p>
                            </div>
                        </div>

                    </div>
                    <div class="max-width2 rtl-direct padding-item col-lg-4 col-md-6 col-sm-12">
                        <div class="flex-box mobile-margin">
                            <p class="grey-text no-margin">
                                سود متوسط
                            </p>
                            <div class="flex-box p-items">
                                <img src="{{asset('assets/icon/green-arrow.svg')}}">

                                <p class="green-item no-margin">
                                    {{ fa_number($trader->win_rate) }}%
                                </p>


                            </div>

                        </div>
                        <div class="flex-box mobile-margin">
                            <p class="grey-text no-margin">
                                ضرر متوسط
                            </p>
                            <div class="flex-box p-items">
                                <img src="{{asset('assets/icon/red-arrow.svg')}}">

                                <p class="red-item no-margin">
                                    {{ fa_number($trader->loss_rate) }}%
                                </p>


                            </div>

                        </div>
                        <div class="justify-content-between flex-box ">
                            <div class="no-margin white-text ">
                                تبادل ها
                            </div>
                            <div class="no-margin grey-text ">
                                {{ fa_number(number_format($trader->position_count)) }} تبادل درکل
                            </div>
                        </div>

                    </div>
                    <div class="flex-box justify-content-between padding-item col-lg-4 col-md-6 col-sm-12">

                        <div class="ProgressBar ProgressBar--animateAll" data-progress="{{ $trader->win_rate }}">
                            <svg class="ProgressBar-contentCircle">
                                <!-- on défini le l'angle et le centre de rotation du cercle -->
                                <circle transform="rotate(0, 0, 0)" class="ProgressBar-background" cx="22" cy="22"
                                        r="21"/>
                                <circle transform="rotate(0, 0, 0)" class="ProgressBar-circle" cx="22" cy="22" r="21"/>
                                <span class="ProgressBar-percentage ProgressBar-percentage--count"></span>
                            </svg>
                            <p>
                                سود دهی
                            </p>
                        </div>
                        <div
                                class="continue copytraderItemCard"
                                data-toggle="modal" data-target="#trad-modal"
                                data-id="{{ $trader->id }}"
                                data-username="{{ $trader->username }}"
                                data-name="{{ $trader->client->name }}"
                                data-fullname="{{ $trader->client->name }} {{ $trader->client->last_name }}"
                                data-risk="{{ fa_number($trader->risk) }}"
                                data-win_rate="{{ fa_number($trader->win_rate) }}"
                                data-is_follow="{{ $trader->is_follow }}"
                                data-is_copy="{{ $trader->is_copy }}"
                                data-pay_amount="{{ $trader->value_text }}"
                                data-recent_time="{{ \Carbon\Carbon::create(auth()->guard('clients')->user()->last_login_at)->diffForHumans() }}">
                            کپی
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class=" col-lg-12 col-md-12 col-sm-12">
        <div class="row">
            <div class="padding-item col-lg-8 col-md-6 col-sm-12">
                <div class="items justify-content-start  position-relative">
                    <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">
                    <div class="row">
                        <div class=" padding-items col-lg-12 col-md-12 col-sm-12 col-12">
                            <p class="no-margin grey-text">
                                ریسک متوسط
                            </p>
                        </div>
                        <div class="margin-top col-lg-12 col-md-12 col-sm-12 col-12">
                            <canvas id="Average" width="100%" height="118px"></canvas>
                        </div>
                        {{--<div class="margin-bottom margin-top padding-items col-lg-12 col-md-12 col-sm-12 col-12">
                            <p class="no-margin grey-text">

                                بیشترین افت
                            </p>
                        </div>
                        <div class=" padding-items col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="flex-box justify-content-between">
                                <div class="Max">
                                    <p class="grey-text">
                                        Daily
                                    </p>
                                    <p>
                                        -2.65%
                                    </p>
                                </div>
                                <div class="Max">
                                    <p class="grey-text">
                                        Weekly
                                    </p>
                                    <p>
                                        -2.65%
                                    </p>
                                </div>
                                <div class="Max">
                                    <p class="grey-text">
                                        Yearly
                                    </p>
                                    <p>
                                        -2.65%
                                    </p>
                                </div>

                            </div>
                        </div>--}}
                    </div>
                </div>
            </div>
            <div class="padding-item col-lg-4 col-md-6 col-sm-12">
                <div class="items justify-content-start  position-relative">
                    <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">
                    <div class="row">
                        <div class=" col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="white-text no-margin">
                                کپی کننده
                            </h6>
                            <p class="grey-text no-margin">
                                {{ $copiers->count() }}
                            </p>
                        </div>
                        <div class="margin-top col-lg-12 col-md-12 col-sm-12 col-12">
                            <canvas id="Copiers" width="100%" height="80px"></canvas>
                        </div>
                        <div class=" col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class=" result flex-box justify-content-start">
                                <p class="@if($increase_count < 0 ) red-item @else green-item @endif">
                                    {{ $increase_count }}({{ $increase_percent }}%)
                                </p>
                                <p class="grey-text">
                                    کپی کننده درماه اخیر
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <div class="second-margin-item padding-item col-lg-12 col-md-12 col-sm-12">
        <h5 class="no-margin">
            آخرین معاملات
        </h5>
    </div>

    @each('components.trader_trade' , $positions , 'position')

@endsection


@section('modal')
    <div class="modal fade" id="trad-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content ">
                <div class="modal-headers flex-box justify-content-center">
                    <h5>کپی</h5>
                    <img data-dismiss="modal" src="{{asset('assets/icon/modal-close.svg')}}">

                </div>
                <div id="step1" class="page trade-item modal-split active">
                    <div class="  user-profile">
                        <div class="image-box">
                            <img src="{{asset('assets/photo/sample.png')}}">
                        </div>
                        <div>
                            <h5 class="text-center white-text no-margin modalUsername">
                                bely92
                            </h5>
                            <p class="text-center no-margin grey-text modalFullname">
                                kimia norouzi
                            </p>
                        </div>

                    </div>
                    <div class="margin-bottom flex-box justify-content-center">
                        <div class="margin-left">
                            <p class="no-margin text-center green-item modalWinRate">90.90% </p>

                        </div>
                        <div>
                            <p class="no-margin text-center grey-text modalLastSeen">
                                بازدید ( 12 دقیقه پیش )
                            </p>
                        </div>
                    </div>
                    <div class="margin-bottom">
                        <p class="text-center pink-text no-margin">
                            <span class="modalPayAmount">200000 تومان پرداخت کنید </span>
                            <span> تا تبادلات</span>
                            <span class="modalTraderName"> کیمیا </span>
                            <span>  رو کپی کنید </span>
                        </p>
                        <p class="grey-text text-center littel-text">
                            <span class="modalPayAmount">200000 تومان پرداخت کنید </span>
                            <span> تا تبادلات</span>
                            <span class="modalTraderName"> کیمیا </span>
                            <span>  رو کپی کنید </span>
                        </p>
                    </div>

                    <div class=" flex-box">
                        <a data-page-toggler="" data-toggle="step2" class="pink-button">
                            ادامه
                        </a>
                    </div>

                </div>
                <div id="step2" class="page  trade-item modal-split">
                    <div class="  user-profile">
                        <div class="image-box">
                            <img src="{{asset('assets/photo/sample.png')}}">
                        </div>
                        <div>
                            <h5 class="text-center white-text no-margin modalUsername">
                                bely92
                            </h5>
                            <p class="text-center no-margin grey-text modalFullname">
                                kimia norouzi
                            </p>
                        </div>

                    </div>
                    <div class="margin-bottom flex-box justify-content-center">
                        <div class="margin-left">
                            <p class="no-margin text-center green-item modalWinRate">90.90% </p>

                        </div>
                        <div>
                            <p class="no-margin text-center grey-text modalLastSeen">
                                بازدید ( 12 دقیقه پیش )
                            </p>
                        </div>
                    </div>
                    <div class="max-width flex-box justify-content-between">
                        <div class="">
                            <p class=" pink-text no-margin ">
                                دنبال کردن
                            </p>
                            {{--<p class="grey-text  littel-text">
                                20.000 تومان پرداخت کنید تا تبادلات کیمیا رو کپی کنید
                            </p>--}}
                        </div>
                        <div class=" flex-box ">
                            <a class="continue modalFollowText">
                                دنبال کردن
                            </a>
                        </div>
                    </div>
                    <div class="max-width flex-box justify-content-between">
                        <div class="">
                            <p class=" pink-text no-margin">
                                کپی کردن
                            </p>
                            <p class="grey-text  littel-text">
                                <span class="modalPayAmount">200000 تومان پرداخت کنید </span>
                                <span> تا تبادلات</span>
                                <span class="modalTraderName"> کیمیا </span>
                                <span>  رو کپی کنید </span>
                            </p>
                        </div>
                        <div class=" flex-box ">
                            <a data-page-toggler="" data-toggle="step3" class="pink-button paymentCopyBtn">
                                کپی کردن
                            </a>
                        </div>
                    </div>
                </div>
                <div id="step3" class="page  trade-item modal-split">
                    <div class="drop-down purple modalExchangeSelect">
                        <div class="selected ">
                            <a class="flex-box justify-content-between">
                                <span class="chose">صرافی کاسپین</span>
                                <img src="{{ asset('assets/icon/arrow s.svg') }}">

                            </a>
                        </div>
                        <div class="options">
                            <ul class="">
                                <img class="z-index-0 bg" src="{{asset('assets/photo/input-blur.png')}}">

                                <li><a>صرافی کاسپین<span class="value">صرافی کاسپین</span></a></li>
                                {{--<li><a>صرافی کاسپین2<span class="value">صرافی کاسپین</span></a></li>
                                <li><a>3صرافی کاسپین<span class="value">صرافی کاسپین</span></a></li>--}}
                            </ul>
                        </div>
                    </div>
                    <div class=" flex-box ">

                        <div class="pink-button modalExchangeSubmit">تایید</div>

                        <a data-page-toggler="" data-toggle="step5" class="pink-button hidden">
                            تایید
                        </a>
                    </div>

                </div>
                <div id="step4" class="page  trade-item modal-split">
                    <form>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="drop-down">
                                    <div class="selected ">
                                        <a class="flex-box justify-content-between">
                                            <span class="chose">صرافی کاسپین</span>
                                            <img src="assets/icon/arrow s.svg">

                                        </a>
                                    </div>
                                    <div class="options">
                                        <ul class="">
                                            <img class="z-index-0 bg" src="assets/photo/input-blur.png">

                                            <li><a>صرافی کاسپین1<span class="value">صرافی کاسپین</span></a></li>
                                            <li><a>صرافی کاسپین2<span class="value">صرافی کاسپین</span></a></li>
                                            <li><a>3صرافی کاسپین<span class="value">صرافی کاسپین</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="input-row">
                                    <label>
                                        کد API
                                    </label>
                                    <input placeholder="کد API">
                                </div>

                            </div>
                            <div class="col-lg-12">
                                <div class="input-row">
                                    <label>
                                        private key
                                    </label>
                                    <input placeholder="private key">
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class=" flex-box ">
                        <a data-page-toggler="" data-toggle="step5" class="pink-button">
                            تایید
                        </a>
                    </div>

                </div>
                <div id="step5" class="page  trade-item modal-split">
                    <div class="margin-bottom flex-box justify-content-center">
                        <img class="margin-left" src="{{ asset('assets/icon/succses.svg') }}">
                        <h5 class="no-margin white-text bold-text">
                            تایید شدی
                        </h5>

                    </div>
                    <p class=" max-width text-center white-text">
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                        چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط
                    </p>
                    <div class="margin-top flex-box ">
                        <a id="close-modal" class="pink-button">
                            تایید
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection



@section('scripts')
    <script>
        (function ($) {

            $.fn.bekeyProgressbar = function (options) {

                options = $.extend({
                    animate: true,
                    animateText: true
                }, options);

                var $this = $(this);

                var $progressBar = $this;
                var $progressCount = $progressBar.find('.ProgressBar-percentage--count');
                var $circle = $progressBar.find('.ProgressBar-circle');
                var percentageProgress = $progressBar.attr('data-progress');
                var percentageRemaining = (100 - percentageProgress);
                var percentageText = $progressCount.parent().attr('data-progress');

                //Calcule la circonférence du cercle
                var radius = $circle.attr('r');
                var diameter = radius * 2;
                var circumference = Math.round(Math.PI * diameter);

                //Calcule le pourcentage d'avancement
                var percentage = circumference * percentageRemaining / 100;

                $circle.css({
                    'stroke-dasharray': circumference,
                    'stroke-dashoffset': percentage
                })

                //Animation de la barre de progression
                if (options.animate === true) {
                    $circle.css({
                        'stroke-dashoffset': circumference
                    }).animate({
                        'stroke-dashoffset': percentage
                    }, 3000)
                }

                //Animation du texte (pourcentage)
                if (options.animateText == true) {

                    $({Counter: 0}).animate(
                        {Counter: percentageText},
                        {
                            duration: 3000,
                            step: function () {
                                $progressCount.text(Math.ceil(this.Counter) + '%');
                            }
                        });

                } else {
                    $progressCount.text(percentageText + '%');
                }

            };

        })(jQuery);

        $(document).ready(function () {
            $('.ProgressBar--animateAll').each(function () {
                $(this).bekeyProgressbar();
            })
        })
    </script>
    <script>
        var ctx = document.getElementById("Average").getContext('2d');
        var arr = [
            @foreach($risks as $risk)
                    {{ $risk }},
            @endforeach
        ]
        var arr2 = [
            @foreach($risks as $risk)
                    {{ 10 - $risk }},
            @endforeach
        ]
        var randomScalingFactor = function () {
            return (Math.random() > 0.5 ? 1.0 : 1.0) * Math.round(Math.random() * 100);
        };
        var AverageChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Dataset2",
                    type: "bar",
                    backgroundColor: [
                        @foreach($risks as $risk)
                                @if($risk < 5)
                            "#0CD29E",
                        @else
                            "#E2DD52",
                        @endif
                        @endforeach
                    ],
                    borderColor: [
                        @foreach($risks as $risk)
                                @if($risk < 5)
                            "#0CD29E",
                        @else
                            "#E2DD52",
                        @endif
                        @endforeach
                    ],
                    borderWidth: 1,
                    fill: true,
                    yAxisID: "axis-bar",
                    data: arr
                }, {
                    label: "Dataset3",
                    type: "bar",
                    backgroundColor: "#1C1D37",
                    borderColor: "#1C1D37",
                    borderWidth: 1,
                    fill: true,
                    yAxisID: "axis-bar",
                    data: arr2
                }],
            },
            options: {
                tooltips: {
                    display: false,
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                            drawBorder: false,
                        },
                        stacked: true,
                        ticks: {
                            min: 0,
                            fontColor: '#7A7982',
                            stepSize: 36
                        },
                    }],
                    yAxes: [{
                        display: false,
                        gridLines: {
                            display: false,
                            drawBorder: false,
                        },
                        stacked: true,
                        id: 'axis-bar',
                        ticks: {
                            min: 0,
                            stepSize: 10
                        },
                    }, {
                        stacked: true,
                        id: 'axis-time',
                        display: false,
                    }]
                },
                responsive: true,
                maintainAspectRatio: true,
                legend: {display: false},

            }
        });

        var legend = AverageChart.generateLegend();
    </script>
    <script>
        var ctx = document.getElementById("Copiers").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [1, 2, 3, 4, 5, 6],
                datasets: [{
                    pointBorderWidth: 0,
                    pointHoverRadius: 0,
                    pointRadius: 0,
                    lineTension: 0,
                    label: '', // Name the series
                    data: [
                        @for($i = 0 ; $i < 30 ; $i++)
                            @php
                                echo $copiers->whereDay('created_at' , $i)->count()
                            @endphp,
                        @endfor
                    ], // Specify the data values array
                    fill: false,
                    borderColor: '#3082DA', // Add custom color border (Line)
                    backgroundColor: '#3082DA', // Add custom color background (Points and Fill)
                    borderWidth: 2 // Specify bar border width
                }]
            },
            options: {
                scales:
                    {
                        xAxes: [{
                            gridLines: {
                                display: false,
                                drawBorder: true,
                                color: "#343960"
                            },
                            ticks: {
                                beginAtZero: false,
                                fontSize: 0,
                                fontColor: '#fff',
                                maxTicksLimit: 5,
                                padding: 0,
                            },
                        }],
                        yAxes: [{
                            position: 'left',
                            gridLines: {
                                display: false,
                                drawBorder: true,
                                color: "#343960",
                            },
                            ticks: {
                                beginAtZero: false,
                                fontSize: 0,
                                fontColor: '#343960',
                                maxTicksLimit: 5,
                                padding: 0,
                                color: "#343960"
                            }
                        }],
                    },
                legend: {
                    display: false
                },
                responsive: true, // Instruct chart js to respond nicely.
                maintainAspectRatio: true, // Add to prevent default behaviour of full-width/height
            }
        });
    </script>
    <script>
        $(document).ready(function () {
            $('.add-input-box').click(function () {
                $('.add-items-row').append("<div class=\"col-lg-12\">\n" +
                    "                                <div class=\"input-row\">\n" +
                    "                                    <input class=\"left-text\" placeholder=\"rgerrttrhthhryjuyilu9uiluk \">\n" +
                    "                                </div>\n" +
                    "                            </div>")
            })
        })

    </script>

    <script src="{{asset('assets/js/drop-down.js')}}"></script>

    <script>

        var traderID;
        var activeModalTrader;


        window.onload = init();

        function init() {
            $("#step1").addClass("active");
            initPages();
        }


        function initPages() {
            $(document).on("click touch", "[data-page-toggler]", function (e) {
                e.preventDefault();
                const target = $(this).data("toggle");
                $(".page.active").addClass("out");
                setTimeout(function () {
                    $("#" + target).addClass("active");
                    $(".page.out").removeClass("active").removeClass("out");
                }, 350);

            });
        }

        $(document).on('click', '.copytraderItemCard', function () {
            traderID = $(this).data("id");
            activeModalTrader = this;

            $("#step1").addClass("active");
            $("#step2").removeClass("active");
            $("#step3").removeClass("active");
            $("#step4").removeClass("active");
            $("#step5").removeClass("active");

            $('.modalUsername').html($(this).data("username"));
            $('.modalFullname').html($(this).data("fullname"));
            $('.modalWinRate').html($(this).data("win_rate") + '%');
            $('.modalLastSeen').html($(this).data("recent_time"));
            $('.modalPayAmount').html($(this).data("pay_amount"));
            $('.modalTraderName').html($(this).data("name"));

            if ($(this).data("is_follow")) {
                $(".modalFollowText").html(" درحال دنبال کردن ")
            } else {
                $(".modalFollowText").html(" دنبال کردن ")
            }
            if ($(this).data("is_copy")) {
                $(".paymentCopyBtn").data("toggle", "");
                $(".paymentCopyBtn").html("کپی شده")
            } else {
                $(".paymentCopyBtn").data("toggle", "step3");
                $(".paymentCopyBtn").html("کپی کردن")
            }

        })

        $(document).on('click', '.modalFollowText', function () {


            $.ajax({
                url: `{{route('copytrade_follow')}}?trader_id=${traderID}`,
                method: 'get',
                success: function (res) {
                    if ($(activeModalTrader).data('is_follow')) {
                        $(activeModalTrader).data('is_follow', false);
                        $(".modalFollowText").html(" دنبال کردن ")
                    } else {
                        $(activeModalTrader).data('is_follow', true);
                        $(".modalFollowText").html(" درحال دنبال کردن ")
                    }
                },
                error: function (err) {
                }
            })

        })
        $(document).on('click', '.modalExchangeSubmit', function () {

            var ele = this;

            $.ajax({
                url: `{{route('copy_from_trader')}}?trader_id=${traderID}`,
                method: 'get',
                success: function (res) {
                    $(ele).next().click()
                },
                error: function (err) {
                    $(ele).parent().parent().append(`<div class='modalErrorText' style="text-align: center ; margin-top: 10px;">موجودی حساب شما کافی نیست</div>`);
                    setTimeout(() => {
                        $('.modalErrorText').remove();
                    }, 4000)


                }
            })


        })
    </script>

@endsection
