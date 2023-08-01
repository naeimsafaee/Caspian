@extends('dashboard.index')

@section('content_head')

@endsection

@section('content')

    <div class="padding-item col-lg-12 col-md-12 col-sm-12 web-item">
        <ul class="items flex-box blur-hover table-title-item">
            <li class=" neme" data-label=" ">
                <div class="flex-box">
                    نوع ارز
                    <img src="{{asset('assets/icon/triangle.svg')}}">
                </div>
            </li>
            <li class="child1 position-relative" data-label="  ">
                <div class="flex-box">
                    قیمت
                    <img src="{{asset('assets/icon/triangle.svg')}}">
                </div>

            </li>
            <li class="child2 price " data-label=" ">
                <div class="flex-box">
                    نوسانات
                    <img src="{{asset('assets/icon/triangle.svg')}}">
                </div>
            </li>

        </ul>
    </div>
    <div class="padding-item col-lg-12 col-md-12 col-sm-12">
        <ul class="items flex-box blur-hover table-body-item">
            <div class="glow"></div>
            <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">
            <li class=" neme" data-label=" ">
                <div class="flex-box justify-content-start">
                    <img src="{{asset('assets/icon/icon.svg')}}">
                    <div>
                        <h5 class="white-text">
                            اتریوم
                        </h5>
                        <p class="grey-text no-margin">
                            ETH
                        </p>
                    </div>

                </div>
            </li>
            <li  class="child2 price lowest-price" data-label="خرید ">
                <div class="flex-box">
                    <h5 class="white-text no-margin ">
                        ۲۸۹.۸۷
                    </h5>
                    <h5 class="web-item grey-text no-margin  margin-left">
                        خرید
                    </h5>
                </div>

            </li>
            <li class="price "  data-label=" فروش">
                <div class="flex-box">
                    <h5 class="white-text no-margin">
                        ۲۸۹.۸۷
                    </h5>
                    <h5 class="web-item grey-text no-margin  margin-left">
                        فروش
                    </h5>
                </div>
            </li>
            <li class="child2 position-relative" data-label="نوسانات  ">
                <div class="change-item flex-box  justify-content-between">

                    <p class="red-item no-margin">
                        <span>-</span>
                        <span> ۰.۰۰۹۷</span>

                    </p>
                    <p class="green-item no-margin">
                        <span>+</span>
                        <span> ۰.۰۰۹۷</span>

                    </p>
                </div>
            </li>
        </ul>
    </div>
    <div class="padding-item col-lg-12 col-md-12 col-sm-12">
        <ul class="items flex-box blur-hover table-body-item">
            <div class="glow"></div>
            <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">
            <li class=" neme" data-label=" ">
                <div class="flex-box justify-content-start">
                    <img src="{{asset('assets/icon/icon.svg')}}">
                    <div>
                        <h5 class="white-text">
                            اتریوم
                        </h5>
                        <p class="grey-text no-margin">
                            ETH
                        </p>
                    </div>

                </div>
            </li>
            <li  class="child2 price lowest-price" data-label="خرید ">
                <div class="flex-box">
                    <h5 class="white-text no-margin ">
                        ۲۸۹.۸۷
                    </h5>
                    <h5 class="web-item grey-text no-margin  margin-left">
                        خرید
                    </h5>
                </div>

            </li>
            <li class="price "  data-label=" فروش">
                <div class="flex-box">
                    <h5 class="white-text no-margin">
                        ۲۸۹.۸۷
                    </h5>
                    <h5 class="web-item grey-text no-margin  margin-left">
                        فروش
                    </h5>
                </div>
            </li>
            <li class="child2 position-relative" data-label="نوسانات  ">
                <div class="change-item flex-box  justify-content-between">

                    <p class="red-item no-margin">
                        <span>-</span>
                        <span> ۰.۰۰۹۷</span>

                    </p>
                    <p class="green-item no-margin">
                        <span>+</span>
                        <span> ۰.۰۰۹۷</span>

                    </p>
                </div>
            </li>
        </ul>
    </div>
    <div class="padding-item col-lg-12 col-md-12 col-sm-12">
        <ul class="items flex-box blur-hover table-body-item">
            <div class="glow"></div>
            <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">
            <li class=" neme" data-label=" ">
                <div class="flex-box justify-content-start">
                    <img src="{{asset('assets/icon/icon.svg')}}">
                    <div>
                        <h5 class="white-text">
                            اتریوم
                        </h5>
                        <p class="grey-text no-margin">
                            ETH
                        </p>
                    </div>

                </div>
            </li>
            <li  class="child2 price lowest-price" data-label="خرید ">
                <div class="flex-box">
                    <h5 class="white-text no-margin ">
                        ۲۸۹.۸۷
                    </h5>
                    <h5 class="web-item grey-text no-margin  margin-left">
                        خرید
                    </h5>
                </div>

            </li>
            <li class="price "  data-label=" فروش">
                <div class="flex-box">
                    <h5 class="white-text no-margin">
                        ۲۸۹.۸۷
                    </h5>
                    <h5 class="web-item grey-text no-margin  margin-left">
                        فروش
                    </h5>
                </div>
            </li>
            <li class="child2 position-relative" data-label="نوسانات  ">
                <div class="change-item flex-box  justify-content-between">

                    <p class="red-item no-margin">
                        <span>-</span>
                        <span> ۰.۰۰۹۷</span>

                    </p>
                    <p class="green-item no-margin">
                        <span>+</span>
                        <span> ۰.۰۰۹۷</span>

                    </p>
                </div>
            </li>
        </ul>
    </div>
    <div class="padding-item col-lg-12 col-md-12 col-sm-12">
        <ul class="items flex-box blur-hover table-body-item">
            <div class="glow"></div>
            <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">
            <li class=" neme" data-label=" ">
                <div class="flex-box justify-content-start">
                    <img src="{{asset('assets/icon/icon.svg')}}">
                    <div>
                        <h5 class="white-text">
                            اتریوم
                        </h5>
                        <p class="grey-text no-margin">
                            ETH
                        </p>
                    </div>

                </div>
            </li>
            <li  class="child2 price lowest-price" data-label="خرید ">
                <div class="flex-box">
                    <h5 class="white-text no-margin ">
                        ۲۸۹.۸۷
                    </h5>
                    <h5 class="web-item grey-text no-margin  margin-left">
                        خرید
                    </h5>
                </div>

            </li>
            <li class="price "  data-label=" فروش">
                <div class="flex-box">
                    <h5 class="white-text no-margin">
                        ۲۸۹.۸۷
                    </h5>
                    <h5 class="web-item grey-text no-margin  margin-left">
                        فروش
                    </h5>
                </div>
            </li>
            <li class="child2 position-relative" data-label="نوسانات  ">
                <div class="change-item flex-box  justify-content-between">

                    <p class="red-item no-margin">
                        <span>-</span>
                        <span> ۰.۰۰۹۷</span>

                    </p>
                    <p class="green-item no-margin">
                        <span>+</span>
                        <span> ۰.۰۰۹۷</span>

                    </p>
                </div>
            </li>
        </ul>
    </div>
    <div class="padding-item col-lg-12 col-md-12 col-sm-12">
        <ul class="items flex-box blur-hover table-body-item">
            <div class="glow"></div>
            <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">
            <li class=" neme" data-label=" ">
                <div class="flex-box justify-content-start">
                    <img src="{{asset('assets/icon/icon.svg')}}">
                    <div>
                        <h5 class="white-text">
                            اتریوم
                        </h5>
                        <p class="grey-text no-margin">
                            ETH
                        </p>
                    </div>

                </div>
            </li>
            <li  class="child2 price lowest-price" data-label="خرید ">
                <div class="flex-box">
                    <h5 class="white-text no-margin ">
                        ۲۸۹.۸۷
                    </h5>
                    <h5 class="web-item grey-text no-margin  margin-left">
                        خرید
                    </h5>
                </div>

            </li>
            <li class="price "  data-label=" فروش">
                <div class="flex-box">
                    <h5 class="white-text no-margin">
                        ۲۸۹.۸۷
                    </h5>
                    <h5 class="web-item grey-text no-margin  margin-left">
                        فروش
                    </h5>
                </div>
            </li>
            <li class="child2 position-relative" data-label="نوسانات  ">
                <div class="change-item flex-box  justify-content-between">

                    <p class="red-item no-margin">
                        <span>-</span>
                        <span> ۰.۰۰۹۷</span>

                    </p>
                    <p class="green-item no-margin">
                        <span>+</span>
                        <span> ۰.۰۰۹۷</span>

                    </p>
                </div>
            </li>
        </ul>
    </div>

@endsection
