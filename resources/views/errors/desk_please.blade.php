@extends('layout.index')

@section('content')
<div class="col-lg-12 col-md-12 col-sm-12">
    <section class="main position-relative">
        <div class="blur-circle big-blur right-bottom"></div>
        <div class="blur-circle big-blur left-bottom"></div>
        <img class="clouds position-absolute right-bottom" src="/assets/icon/cloud2.svg">
        <div class="row margin-bottom">
            <div class=" padding-item col-lg-12 col-md-12 col-sm-12">
                <div class="flex-box flex-column items  position-relative overflow-visible">

                    <img class="z-index-0 bg" src="/assets/photo/row-item.png">
                    <img class="margin position-relative z-index-1" src="/assets/icon/desk-please.svg">
                    <p class="white-text text-center">
                        برای ادامه تریدینگ
                        <br>
                        لطفا با دسکتاپ وارد شوید
                    </p>

                </div>
                <div class="z-index-1 flex-box padding-item col-lg-12 col-md-12 col-sm-12">
                    <a class="center-btn button p-button d-block margin" href="{{ route('home') }}">
                       بازگشت به سایت
                    </a>
                </div>
            </div>

        </div>
    </section>
</div>
@endsection
