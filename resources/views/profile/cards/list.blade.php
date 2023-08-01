@extends('profile.index')

@section('content_head')
    <div class="history-item flex-box">
        <h5 class="no-margin">
            کارت های بانکی
        </h5>
    </div>
@endsection


@section('content')

    @if (\Session::has('error'))
        <div class="padding-item col-lg-12 col-md-12 col-sm-12">
            <div class="flex-box error-box justify-content-start">
                <img src="{{asset('assets/icon/error.svg')}}">

                {!! \Session::get('error') !!}

                <img class="close-error" src="{{asset('assets/icon/close.svg')}}">
            </div>
        </div>
    @endif

    <div class="padding-item col-lg-12 col-md-12 col-sm-12">
        <div class="cards-row items  position-relative overflow-visible">
            <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">
            @if(count($cards) > 0)
                <ul class="z-index-1  card-table-title">
                    <li class="card-table-title-items child-1">بانک</li>
                    <li class="card-table-title-items child-2">شماره کارت</li>
                    <li class="card-table-title-items child-3">وضعیت</li>
                    <li class="card-table-title-items child-4"></li>
                </ul>
            @else
                <p>
                 شما هیج کارتی اضافه نکرده اید
                </p>

            @endif

            @each('components.card' , $cards , 'card')

            <a class="flex-box green-btn" href="{{ route('cards_add') }}">
                <img src="{{asset('assets/icon/w-plus.svg')}}">
                افزودن کارت
            </a>

        </div>
    </div>
    <div class="second-margin-item justify-content-start flex-box padding-item col-lg-12 col-md-12 col-sm-12">
        <div class="history-item flex-box">
            <h5 class="no-margin">
                حساب های بانکی
            </h5>
        </div>
    </div>
    <div class="padding-item col-lg-12 col-md-12 col-sm-12">
        <div class="cards-row items  position-relative overflow-visible">
            <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">
            @if(count($accounts) > 0)
            <ul class="z-index-1  card-table-title">
                <li class="card-table-title-items child-5">شماره شبا</li>
                <li class="card-table-title-items child-4">وضعیت</li>
                <li class="card-table-title-items child-4"></li>
            </ul>
            @else
                <p>
                    شما هیج حساب بانکی اضافه نکرده اید
                </p>
            @endif
            @each('components.account_card' , $accounts , 'account')

            <a class="flex-box green-btn" href="{{ route('account_add') }}">
                <img src="{{asset('assets/icon/w-plus.svg')}}">
                افزودن حساب
            </a>

        </div>
    </div>

@endsection
