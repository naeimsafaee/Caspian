@extends('dashboard.index')

@section('content_head')

    <div class="history-item flex-box">
        <h5 class="no-margin">
            خرید بیت کوین
        </h5>
    </div>
@endsection

@section('content')

    <div class="padding-item col-lg-12 col-md-12 col-sm-12">
        <div class="items  position-relative overflow-visible">
            <div class="center-div">
                <div class="col-lg-12">
                    <div class="input-row ">
                        <label>
                            نوع ارز را انتخاب کنید
                        </label>
                        <form class="row convert-row position-relative">
                            <div class="flex-box col-lg-10 col-md-10 col-sm-10 col-12 position-relative">
                                <div class="row">
                                    <div class="margin-bottom position-relative col-lg-12 col-md-12 col-sm-12">
                                        <input placeholder="پرداخت می کنم">
                                        <div class="drop-down no-margin">
                                            <div class="selected ">
                                                <a class="flex-box justify-content-between" href="#">
                                                                            <span class="chose">   <div class="flex-box crypto">
                                                                                    <div class="image-box">
                                                                                        <img src="{{asset('assets/icon/BitCoin%20svg.svg')}}">
                                                                                    </div>
                                                                                    <p class="no-margin grey-text">
                                                                                        بیت کوین
                                                                                    </p>

                                                                                </div></span>
                                                    <img src="{{asset('assets/icon/arrow s.svg')}}">

                                                </a>
                                            </div>
                                            <div class="options">
                                                <ul>
                                                    <img class="z-index-0 bg" src="{{asset('assets/photo/input-blur.png')}}">

                                                    <li><a href="#">
                                                            <div class="flex-box crypto">
                                                                <div class="image-box">
                                                                    <img src="{{asset('assets/icon/BitCoin%20svg.svg')}}">
                                                                </div>
                                                                <p class="no-margin grey-text">
                                                                    بیت کوین
                                                                </p>

                                                            </div>

                                                        </a></li>
                                                    <li><a href="#">
                                                            <div class="flex-box crypto">
                                                                <div class="image-box">
                                                                    <img src="{{asset('assets/icon/BitCoin%20svg.svg')}}">
                                                                </div>
                                                                <p class="no-margin grey-text">
                                                                    بیت کوین
                                                                </p>

                                                            </div>

                                                        </a></li>
                                                    <li><a href="#">
                                                            <div class="flex-box crypto">
                                                                <div class="image-box">
                                                                    <img src="{{asset('assets/icon/BitCoin%20svg.svg')}}">
                                                                </div>
                                                                <p class="no-margin grey-text">
                                                                    بیت کوین
                                                                </p>

                                                            </div>

                                                        </a></li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="position-relative col-lg-12 col-md-12 col-sm-12">
                                        <input placeholder=" دریافت میکنم">
                                        <div class="drop-down no-margin">
                                            <div class="selected ">
                                                <a class="flex-box justify-content-between" href="#">
                                                                            <span class="chose">   <div class="flex-box crypto">
                                                                                            <div class="image-box">
                                                                                                <img src="{{asset('assets/icon/iran.svg')}}">
                                                                                            </div>
                                                                                            <p class="no-margin grey-text">
                                                                                                تومان
                                                                                            </p>

                                                                                        </div></span>
                                                    <img src="{{asset('assets/icon/arrow s.svg')}}">

                                                </a>
                                            </div>
                                            <div class="options">
                                                <ul>
                                                    <img class="z-index-0 bg" src="{{asset('assets/photo/input-blur.png')}}">

                                                    <li><a href="#">
                                                            <div class="flex-box crypto">
                                                                <div class="image-box">
                                                                    <img src="{{asset('assets/icon/iran.svg')}}">
                                                                </div>
                                                                <p class="no-margin grey-text">
                                                                    تومان
                                                                </p>

                                                            </div>

                                                        </a></li>
                                                    <li><a href="#">
                                                            <div class="flex-box crypto">
                                                                <div class="image-box">
                                                                    <img src="{{asset('assets/icon/iran.svg')}}">
                                                                </div>
                                                                <p class="no-margin grey-text">
                                                                    تومان
                                                                </p>

                                                            </div>

                                                        </a></li>
                                                    <li><a href="#">
                                                            <div class="flex-box crypto">
                                                                <div class="image-box">
                                                                    <img src="{{asset('assets/icon/iran.svg')}}">
                                                                </div>
                                                                <p class="no-margin grey-text">
                                                                    تومان
                                                                </p>

                                                            </div>

                                                        </a></li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-0">
                                <a class="p-button button flex-box convert-button">
                                    <img src="{{asset('assets/icon/convert.svg')}}">
                                </a>
                            </div>
                        </form>



                    </div>
                </div>
                <div class="col-lg-12">
                    <p class="white-text no-margin">
                        هزینه تراکنش :
                        <span> ۵۰۰۰ </span>
                        تومان
                    </p>
                </div>
                <div class="col-lg-12">
                    <p class="white-text no-margin">
                        درکل :
                        <span> ۵۰۰۰ </span>
                        تومان
                    </p>
                </div>
                <div class="col-lg-12 ">
                    <div class="input-row">
                        <a class="p-button button b-w-w flex-box">  استفاده از کیف پول  </a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <p class="white-text no-margin">
                        موجودی کیف پول :
                        <span>۹۸۶.۵۵۴.۳۳۴ </span>
                        تومان
                    </p>
                </div>
                <div class="col-lg-12">
                    <div class="error-box flex-box s-wallet">
                        <p class="no-margin">موجودی ناکافی! </p>
                        <a class="red-button flex-box">
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
                        <p class="grey-text" >
                            برای کپی تریدینگ باید هرسه مرحله احراز هویت را تکمیل کرده باشد لورم ایپسوم متن ساختگی با تولید سادگی نامفهوماز صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در برای کپی تریدینگ باید هرسه مرحله احراز هویت را تکمیل کرده باشد لورم ایپسوم متن ساختگی با تولید سادگی نامفهوماز صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در
                        </p>

                    </div>

                </div>

            </div>

            <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">

        </div>
    </div>



@endsection
@section('scripts')
    <script src="{{asset('assets/js/drop-down.js')}}"></script>
@endsection
