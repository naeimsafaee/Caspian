<div class="padding-item col-lg-12 col-md-12 col-sm-12">
    <a href="#"
       class="mobile-flex-column row-items justify-content-start blur-hover flex-box box-item box-row position-relative">
        <img class="bg" src="{{asset('assets/photo/row-item.png')}}">
        <div class="glow"></div>
        <img src="{{ Voyager::image($service->image) }}">

        <div class="content">
            <h5 class="white-text bold-text">
               {{ $service->title }}
            </h5>
            <p class="grey-text no-margin">
                {{ $service->description }}
            </p>
        </div>
    </a>

</div>
