@extends('layout.index')
@section('content')

    <div class="col-lg-12 col-md-12 col-sm-12">
        <section class="main position-relative">
            <div class="blur-circle big-blur right-bottom"></div>
            <div class="blur-circle big-blur left-bottom"></div>
            <img class="clouds position-absolute right-bottom" src="{{asset('assets/icon/cloud2.svg')}}">
            <div class="row margin-bottom">

                <div class=" col-lg-12 col-md-12 col-sm-12">
                    <div class="row">
                        <div class="second-margin-item justify-content-start flex-box padding-item col-lg-12 col-md-12 col-sm-12">
                                <h5 class="no-margin">
                                    {{ $page->title }}
                                </h5>


                        </div>
                        <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                            <div class="min-height items  position-relative">
                                <img class="z-index-0 bg" src="assets/photo/row-item.png">
                                <div class="row">
                                    <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                                        <h5 class="white-text fw-normal line-height">
                                            {!! $page->content !!}
                                        </h5>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>

@endsection
