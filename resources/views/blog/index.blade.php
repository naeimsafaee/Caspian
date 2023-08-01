<!DOCTYPE html>
<html lang="en">
@include('layout.head')

<body>
<div class="container-fluid index">
    <div class="overlay"></div>

    @include('layout.mobile_menu')

    <div class="row main-row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="container">
                <img class="position-absolute" src="{{asset('assets/icon/clods3.svg')}}">
                <div class="row">

                    @include('layout.header')

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <section class="main position-relative">
                            <div class="blur-circle big-blur right-bottom"></div>
                            <div class="blur-circle big-blur left-bottom"></div>
                            <img class="clouds position-absolute right-bottom" src="{{asset('assets/icon/cloud2.svg')}}">
                            <div class="row margin-bottom">
                                <div class="web-item padding-item col-lg-12 col-md-12 col-sm-12">
                                    <h2 class="bold-text">بلاگ</h2>
                                </div>

                                @include('blog.web_sidebar')

                                <div class=" col-lg-9 col-md-8 col-sm-12">
                                    <div class="row">
                                        <div class="justify-content-start flex-box padding-item col-lg-12 col-md-12 col-sm-12">

                                            @include('blog.mobile_sidebar')

                                        </div>
                                        @yield('content')

                                    </div>
                                </div>

                            </div>
                        </section>
                    </div>

                    @include('layout.footer')
                </div>
            </div>
        </div>

    </div>
</div>

<script src="{{asset('assets/js/master.js')}}"></script>
<script src="{{asset('assets/js/socail-hover.js')}}"></script>

@yield('scripts')

</body>
</html>
