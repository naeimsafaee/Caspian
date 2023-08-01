@extends('blog.index')

@section('header')
    <form class="search-form" action="{{ route('blog') }}" method="get">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M15.7138 6.8382C18.1647 9.28913 18.1647 13.2629 15.7138 15.7138C13.2629 18.1647 9.28913 18.1647 6.8382 15.7138C4.38727 13.2629 4.38727 9.28913 6.8382 6.8382C9.28913 4.38727 13.2629 4.38727 15.7138 6.8382"
                stroke="#D7D4ED" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M19 19L15.71 15.71" stroke="#D7D4ED" stroke-width="1.5" stroke-linecap="round"
                  stroke-linejoin="round"/>
        </svg>
        <input placeholder=" جستجو کنید" name="search"
               value="{{ request()->search ?? "" }}">
    </form>
@endsection

@section('content')

    @if(count($blogs) > 0)
        <div class="padding-item col-lg-12 col-md-12 col-sm-12">
            <h5 class="second-margin-item">
                تازه ترین ها
            </h5>
        </div>
        <div class=" col-lg-12 col-md-12 col-sm-12">
            <div class="row">
                @each('components.blog_new' , $blogs , 'blog')
            </div>
        </div>
    @endif
    @if(count($best_blogs) > 0)

        <div class="padding-item col-lg-12 col-md-12 col-sm-12">
            <h5 class="second-margin-item">
                برگزیده ها
            </h5>
        </div>
        <div class=" col-lg-12 col-md-12 col-sm-12">
            <div class="row">
                @each('components.blog_best' , $best_blogs , 'blog')

            </div>
        </div>
    @endif
    <div class="pagination-row flex-box padding-item col-lg-12 col-md-12 col-sm-12">

        {{ $blogs->onEachSide(3)->links('components.page_numbers') }}

    </div>
    @if(count($best_blogs) <= 0 && count($blogs) <= 0)
        <div class="row text-center align-items-center">
            <p style="text-align: center;font-family: 'Yekan Bakh';font-style: normal;font-weight: 400;font-size: 18px;line-height: 200%;">
                نتایج جستجو برای
                <span style="color: #3082DA;">"{{ request()->search }}"</span>
            </p>
            <p style="color: #343960;">
                نتیجه یافت نشد
            </p>
            <img style="width: 274.82px;height: 248.48px;margin: auto" src="{{ asset('assets/icon/not-found.svg') }}"/>
            <p style="color: #343960;">
                متاسفانه نتیجه ای یافت نشد
            </p>

        </div>

    @endif
@endsection
