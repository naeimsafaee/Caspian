@extends('blog.index')

@section('content')

    <div class="col-lg-12 col-md-12 col-sm-12">
        <section class="main position-relative">
            <div class="blur-circle big-blur right-bottom"></div>
            <div class="blur-circle big-blur left-bottom"></div>
            <img class="clouds position-absolute right-bottom" src="{{asset('assets/icon/cloud2.svg')}}">
            <div class="row margin-bottom">
                <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                    <div class="single-blog-item column-item  box-item d-block">
                        <h2 class="bold-text margin-bottom position-relative z-index-1">
                            {{ $blog->title }}
                        </h2>
                        <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">

                        <div class="position-relative z-index-1 image-box">
                            <img src="{{ \TCG\Voyager\Facades\Voyager::image($blog->image) }}">

                        </div>
                        <ul class="margin position-relative z-index-1 list">

                            {!! $blog->content !!}

                        </ul>
                        <div class="share-row flex-box justify-content-between">
                            <div class="flex-box">
                                <h6 class="no-margin">
                                    اشتراک گذاری
                                </h6>
                                <a href="{{'https://twitter.com/intent/tweet?url=' .  route('single_blog' , $blog->slug) . '&text=' . $blog->title}}">
                                    <img src="{{asset('assets/icon/twitter%201.svg')}}">
                                </a>
                                <a href="{{'https://t.me/share/url?url=' .  route('single_blog' , $blog->slug). '&text=' . $blog->title}}">
                                    <img src="{{asset('assets/icon/telegram%201.svg')}}">
                                </a>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('single_blog' , $blog->slug)  }}">
                                    <img src="{{asset('assets/icon/facebook%201.svg')}}">
                                </a>
                                <a href="whatsapp://send?text={{ $blog->title . '   ' .  route('single_blog' , $blog->slug)}}">
                                    <img src="{{asset('assets/icon/whatsapp%201.svg')}}">
                                </a>
                            </div>
                            <div class="flex-box Calendar-item">
                                <p>{{ $blog->persian_date }}</p>
                                <img src="{{asset('assets/icon/Calendar.svg')}}">
                            </div>

                        </div>


                    </div>
                </div>


            </div>
        </section>
    </div>

@endsection
