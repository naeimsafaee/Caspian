@extends('layout.index')

@section('content')

    <div class="col-lg-12 col-md-12 col-sm-12 contact-us-box">
        <section class="main position-relative">
            <img class="blur-circle big-blur">
            <img class="clouds position-absolute" src="{{asset('assets/icon/cloud2.svg')}}">

            <div class="row margin-bottom">

                <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                    <h2 class="white-text bold-text">
                        سرویس های ما
                    </h2>
                </div>

                @each('components.service' , $services , 'service')

            </div>
        </section>
    </div>

@endsection
