@extends('layout.index')

@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12">
        <section class="main position-relative">
            <div class="blur-circle big-blur right-bottom"></div>
            <img class="clouds position-absolute right-bottom" src="{{asset('assets/icon/cloud2.svg')}}">
            <div class="row margin-bottom">
                <div class="flex-box padding-item col-lg-12 col-md-12 col-sm-12">
                    <img class="error-image" src="{{asset('assets/icon/error-401.svg')}}">
                </div>
                <div class="z-index-1 flex-box padding-item col-lg-12 col-md-12 col-sm-12">
                    <a  class="center-btn button p-button d-block margin" href="{{ route('home') }}">
                        بازگشت به سایت
                    </a>
                </div>
            </div>
        </section>
    </div>
@endsection
