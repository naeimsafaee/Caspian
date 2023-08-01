@extends('blog.index')

@section('header')
    <div class="second-margin-item history-item flex-box">
        <a>بلاگ ها</a>
        <img src="{{asset('assets/icon/grey-arrow.svg')}}">
        <a>{{ $category->title }} </a>
    </div>
@endsection

@section('content')

    <div class=" col-lg-12 col-md-12 col-sm-12">
        <div class="row">
            @each('components.blog_best' , $blogs , 'blog')
        </div>
    </div>
    <div class="pagination-row flex-box padding-item col-lg-12 col-md-12 col-sm-12">

        {{ $blogs->onEachSide(3)->links('components.page_numbers') }}

    </div>

@endsection
