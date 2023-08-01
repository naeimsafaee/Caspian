@extends('layout.index')

@section('content')

    <div class="col-lg-12 col-md-12 col-sm-12">
        <section class="main position-relative">
            <div class="blur-circle big-blur right-bottom"></div>
            <div class="blur-circle big-blur left-bottom"></div>
            <img class="clouds position-absolute right-bottom" src="{{asset('assets/icon/cloud2.svg')}}">
            <div class="row margin-bottom">
                <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                    <h2 class="white-text bold-text">
                        سوالات متداول
                    </h2>
                    <h6 class="second-color">
                        درباره ی سرویس های ما بیشتر بدانید
                    </h6>

                </div>
                @foreach($faqs as $faq)
                    <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                        <div href="#"
                             class="blur-hover faq-item row-items justify-content-start  box-item box-row position-relative">
                            <div class="glow"></div>
                            <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">
                            <div class="z-index-1 flex-box justify-content-between">
                                <h6 class="no-margin">
                                    {{ $faq->question }}
                                </h6>
                                <img src="{{asset('assets/icon/arrow.svg')}}">
                            </div>
                            <p>
                                {!! $faq->answer !!}
                            </p>
                        </div>


                    </div>
                @endforeach
            </div>
        </section>
    </div>


@endsection

@section('scripts')
    <script>
        $(".faq-item .flex-box").click(function () {
            $(this).toggleClass("active")
            $(this).parent().children("p").slideToggle()


        });
    </script>
@endsection
