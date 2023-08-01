@extends('dashboard.index')

@section('content')

    @if($most_copied_traders->count() > 0)
        <div class="second-margin-item flex-box justify-content-between padding-item col-lg-12 col-md-12 col-sm-12">
            <h5 class="no-margin">
                بیشترین کپی ها
            </h5>
            @if(!request()->has('sort'))
                <a class="more flex-box justify-content-center"
                   href="{{ route('copytrade' , ['sort' => 'most_copied']) }}">
                    <span></span>
                    <p class="no-margin">
                        مشاهده همه
                    </p>
                </a>
            @endif
        </div>

        <div class=" col-lg-12 col-md-12 col-sm-12">
            <div class="row">

                @each('components.trader' , $most_copied_traders , 'trader')

            </div>
        </div>
    @endif

    @if($newest_traders->count() > 0)
        <div class="second-margin-item flex-box justify-content-between padding-item col-lg-12 col-md-12 col-sm-12">
            <h5 class="no-margin">
                تازه ترین ها
            </h5>
            @if(!request()->has('sort'))
                <a class="more flex-box justify-content-center" href="{{ route('copytrade' , ['sort' => 'newest']) }}">
                    <span></span>
                    <p class="no-margin">
                        مشاهده همه
                    </p>
                </a>
            @endif
        </div>

        <div class=" col-lg-12 col-md-12 col-sm-12">
            <div class="row">

                @each('components.trader' , $newest_traders , 'trader')

            </div>
        </div>
    @endif

    @if($followed_traders->count() > 0)
        <div class="second-margin-item flex-box justify-content-between padding-item col-lg-12 col-md-12 col-sm-12">
            <h5 class="no-margin">
                دنبال شده ها
            </h5>
            @if(!request()->has('sort'))
                <a class="more flex-box justify-content-center" href="{{ route('copytrade' , ['sort' => 'followed']) }}">
                    <span></span>
                    <p class="no-margin">
                        مشاهده همه
                    </p>
                </a>
            @endif
        </div>

        <div class=" col-lg-12 col-md-12 col-sm-12">
            <div class="row">

                @each('components.trader' , $followed_traders , 'trader')

            </div>
        </div>
    @endif

    @if($client_copies_traders->count() > 0)
        <div class="second-margin-item flex-box justify-content-between padding-item col-lg-12 col-md-12 col-sm-12">
            <h5 class="no-margin">
                کپی شما
            </h5>
        </div>

        <div class=" col-lg-12 col-md-12 col-sm-12">
            <div class="row">

                @each('components.trader' , $client_copies_traders , 'trader')

            </div>
        </div>
    @endif

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
    <script src="{{asset('assets/js/drop-down.js')}}"></script>


    <script>

        var traderID ;
        var activeModalTrader ;


        window.onload = init();
        function init() {
            $("#step1").addClass("active");
            initPages();
        }



        function initPages() {
            $(document).on("click touch", "[data-page-toggler]", function(e) {
                e.preventDefault();
                const target = $(this).data("toggle");
                $(".page.active").addClass("out");
                setTimeout(function() {
                    $("#" + target).addClass("active");
                    $(".page.out").removeClass("active").removeClass("out");
                }, 350);

            });
        }

        $(document).on('click','.copytraderItemCard',function (){
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

            if($(this).data("is_follow")){
                $(".modalFollowText").html(" درحال دنبال کردن ")
            }else{
                $(".modalFollowText").html(" دنبال کردن ")
            }
            if($(this).data("is_copy")){
                $(".paymentCopyBtn").data("toggle","");
                $(".paymentCopyBtn").html("کپی شده")
            }else{
                $(".paymentCopyBtn").data("toggle","step3");
                $(".paymentCopyBtn").html("کپی کردن")
            }

        })

        $(document).on('click','.modalFollowText',function () {


            $.ajax({
                url:`{{route('copytrade_follow')}}?trader_id=${traderID}`,
                method:'get',
                success:function (res){
                    if($(activeModalTrader).data('is_follow')){
                        $(activeModalTrader).data('is_follow' , false);
                        $(".modalFollowText").html(" دنبال کردن ")
                    }else{
                        $(activeModalTrader).data('is_follow' , true);
                        $(".modalFollowText").html(" درحال دنبال کردن ")
                    }
                },
                error:function (err){}
            })

        })
        $(document).on('click','.modalExchangeSubmit',function (){

            var ele = this;

            $.ajax({
                url:`{{route('copy_from_trader')}}?trader_id=${traderID}`,
                method:'get',
                success:function (res){
                    $(ele).next().click()
                },
                error:function (err){
                    $(ele).parent().parent().append(`<div class='modalErrorText' style="text-align: center ; margin-top: 10px;">موجودی حساب شما کافی نیست</div>`);
                    setTimeout(()=>{
                        $('.modalErrorText').remove();
                    },4000)


                }
            })


        })
    </script>

@endsection

