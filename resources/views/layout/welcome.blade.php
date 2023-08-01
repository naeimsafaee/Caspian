<div class="col-lg-12 col-md-12 col-sm-12">
    <section class="main position-relative">
        <div class="blur-circle big-blur right-bottom"></div>
        <div class="blur-circle big-blur left-bottom"></div>
        <img class="clouds position-absolute right-bottom" src="{{asset('assets/icon/cloud2.svg')}}">
        <div class="row margin-bottom">
            <div class="padding-item col-lg-12 col-md-12 col-sm-12 ">
                <div class="row welcome-box">
                    <img class="pattern" src="{{asset('assets/icon/welcom-pattern.svg')}}">
                    <div class="padding-item col-lg-8 col-md-6 col-sm-12 col-12">
                        <h2 class="bold-text white-text margin-bottom">
                            به پرشین کریپتو خوش آمدید
                        </h2>
                        <h5 class="white-text">
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                        </h5>
                        <ol class="steps">
                            <li class="step is-active" data-step="">
                                <a>
                                    ساخت حساب کاربری
                                </a>
                            </li>
                            <li class="step {{ auth()->guard('clients')->user()->security_number > 0 ? 'is-active' : '' }}" data-step="">
                                <a href="{{ route('security') }}">
                                    امن کردن حساب
                                    </br>
                                    کاربری با تایید ۲ مرحله ای
                                </a>
                            </li>
                            <li class="step" data-step="">
                                <a>
                                    سرمایه گذاری کردن
                                </a>
                            </li>
                        </ol>
                    </div>
                    <div class="web-item padding-item col-lg-4 col-md-6 col-sm-12 col-12">
                        <img src="{{asset('assets/icon/welcom-image.svg')}}">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
