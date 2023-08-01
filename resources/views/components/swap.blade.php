<div class="padding-item col-lg-12 col-md-12 col-sm-12">

    <ul class="items flex-box blur-hover table-body-item">
        <div class="glow"></div>
        <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">

        <li class="child1  " data-label="زمان">
            <div class="date">
                <span>{{ $swap->persian_date }}</span>
            </div>
        </li>
        <li class="child1 price" data-label=" میزان">
            <h5 class="no-margin text-center white-text">
                {{ fa_number(number_format($swap->coin_amount)) }}
                <span>
                    {{ strtoupper($swap->coin) }}
                </span>
            </h5>
        </li>
        <li class="child1 price" data-label=" وضعیت">
            <h5 class="no-margin text-center white-text">
                {{ fa_number(number_format($swap->vs_coin_amount)) }}
                <span>
                    {{ strtoupper($swap->vs_coin) }}
                </span>
            </h5>
        </li>
    </ul>
</div>
