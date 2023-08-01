<div class="padding-item col-lg-4 col-md-6 col-sm-6 col-12">
    <a href="{{ route('single_blog' , $blog->slug) }}" class="blog-items column-item blur-hover box-item d-block">
        <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">

        <div class="image-box">
            <img src="{{ Voyager::image($blog->image) }}">

        </div>
        <div class="details-items flex-box justify-content-between">
            <h5 class="no-margin bold-text white-text padding-item">
                {{ $blog->title }}
            </h5>
            <div class="mobile-item flex-box justify-content-start padding-item">
                <div class="flex-box tags">
                    <span></span>
                    <p>
                        {{ fa_number($blog->time) }}
                        گذشته
                    </p>
                </div>
            </div>
        </div>
        <p class="grey-text padding-item ellipsis">
            {{ $blog->summery }}
        </p>
        <div class="web-item flex-column flex-box  padding-item">

            <div class="flex-box tags active">
                <span></span>
                @if(count($blog->categories) > 0)

                    <p>
                        {{ $blog->categories->first()->title }}
                    </p>
                @endif
            </div>
            <div class="flex-box tags">
                <span></span>
                <p>
                    {{ fa_number($blog->time) }}
                    گذشته
                </p>
            </div>
        </div>

        <div class="web-item flex-box justify-content-end">
            <div class="continue">
                ادامه
            </div>

        </div>
        <div class="mobile-item margin-top flex-box justify-content-between">
            <div class="flex-box justify-content-start padding-item">
                <div class="flex-box tags active">
                    <span></span>
                    @if(count($blog->categories) > 0)
                        <p>
                            {{ $blog->categories->first()->title }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="continue no-margin">
                ادامه
            </div>

        </div>
        <div class="glow">
        </div>
    </a>
</div>
