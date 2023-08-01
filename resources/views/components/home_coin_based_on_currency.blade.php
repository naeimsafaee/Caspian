<div class="padding-item col-lg-12 col-md-12 col-sm-12 home_coin_class" style="display: none"
     data-id="+{{ $pair->vs_coin->id }}">
    <ul class="flex-box blur-hover table-body-item">
        <div class="glow"></div>

        <li class="child1 neme" data-label=" ">
            <div class="flex-box justify-content-start">
                <img style="width:39px;height: 63px" src="{{ $pair->coin->icon }}">
                <div style="margin: auto">
                    <h5 class="white-text">
                        {{ $pair->coin->persian_name }}
                    </h5>
                    <p class="grey-text no-margin">
                        {{ strtoupper($pair->coin->symbol) }}
                    </p>
                </div>

            </div>
        </li>

        <li class=" position-relative" data-label="نوسانات  ">
            <div class="web-item flex-box price-change grey-text position-absolute">
                <img src="{{asset('assets/icon/top-arrow.svg')}}">
                <span></span>
            </div>
            <canvas id="first-chart-currency-{{ $pair->id }}"></canvas>


        </li>

        <li class="child1 price lowest-price" data-label=" بیشترین قیمت ">
            <div class="max-content">
                <p class="grey-text no-margin">
                    {{ round($pair->low() , 4) }} {{ strtoupper($pair->vs_coin->symbol) }}
                </p>
                <p class="grey-text no-margin web-item">
                    کمترین قیمت
                </p>
            </div>

        </li>

        <li class="child1 price" data-label=" بیشترین قیمت">
            <div style="width: max-content">
                <p class="grey-text no-margin">
                    {{--{{ number_format($pair->coin->price * $pair->vs_coin->price) }} {{ strtoupper($pair->vs_coin->symbol) }}--}}
                    {{ round($pair->high() , 4) }} {{ strtoupper($pair->vs_coin->symbol) }}
                </p>
                <p class="grey-text no-margin web-item">
                    بیشترین قیمت
                </p>
            </div>
        </li>


        <li data-label="" style="z-index: 10">
            <a class="flex-box black-button" href="{{ route('exchange_buy' , [($pair->coin->name) , ($pair->vs_coin->name)]) }}">
                خرید / فروش
            </a>
        </li>
    </ul>
</div>
