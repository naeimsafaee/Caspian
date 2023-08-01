<div class="padding-item col-lg-3 col-md-4 col-sm-4 col-6">
    <div class="crypto-items items position-relative overflow-visible">
        <img class="z-index-0 bg" src="assets/photo/row-item.png">
        <div class="crypto-items z-index-1">
            <img class="icons" src="{{ $last_4->coin->icon }}" style="width: 54px">
            <div class="price">
                    <span class="white-text">
                        {{ $last_4->coin->persian_name }}

                    </span>
                {{--<span class="grey-text">
                تومان
            </span>--}}
            </div>
            <div class="price-change @if($last_4->coin->change >= 0) green @else red @endif">
                {{ $last_4->coin->change }}٪
            </div>
            <div class="gradient-line">

            </div>
            <span>{{ fa_number(($last_4->amount)) }}</span>
            <span class="grey-text">
                عدد
            </span>

            <div class="gradient-line">
            </div>

            <span>{{ fa_number(number_format($last_4->toman_value)) }}</span>
            <span class="grey-text">
                تومان
            </span>
        </div>
    </div>
</div>
