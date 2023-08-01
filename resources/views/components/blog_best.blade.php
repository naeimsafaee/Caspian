<div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
    <a href="{{ route('single_blog' , $blog->slug) }}" class="column-item blur-hover box-item d-block">
        <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">

        <div class="row">
            <div class=" col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="image-box row-items-image-box ">
                    <img src="{{ Voyager::image($blog->image) }}">

                </div>
            </div>
            <div class=" content-item col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="details-items flex-box justify-content-between">
                    <h5 class="no-margin bold-text white-text padding-item">
                        {{ $blog->title }}
                    </h5>
                    <div class="flex-box justify-content-start padding-item">
                        <div class="flex-box tags">
                            <span></span>
                            <p>
                                {{ fa_number($blog->time) }}
                                گذشته
                            </p>
                        </div>
                    </div>
                </div>
                <p class="grey-text ">
                    {{ $blog->summery }}
                </p>

                <div class="margin-top flex-box justify-content-between">
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
            </div>
        </div>
        <div class="glow">
        </div>
    </a>
</div>
