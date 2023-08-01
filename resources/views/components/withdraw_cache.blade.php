<div class="padding-item col-lg-12 col-md-12 col-sm-12">

    <ul class="items flex-box blur-hover table-body-item">
        <div class="glow"></div>
        <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">

        <li class="child1  " data-label="زمان">
            <div class="date">
                <span>{{ $withdraw->persian_date }}</span>
            </div>
        </li>
        <li class="child1 price" data-label=" میزان">
            <h5 class="no-margin text-center white-text">
                {{ fa_number(number_format($withdraw->amount)) }}
                تومان
            </h5>
        </li>
        <li class="child1 price" data-label=" وضعیت">
            <div class="flex-box">
                @if($withdraw->is_paid)
                    <p class="green-item no-margin bold-text">
                        انجام شده
                    </p>
                    <img class="margin-left2" src="{{asset('assets/icon/pay-su.svg')}}">
                @else
                    <p class="yellow-item no-margin bold-text">
                        در انتظار
                    </p>
                    <img class="margin-left2" src="{{asset('assets/icon/wait.svg')}}">
                @endif
            </div>
        </li>
    </ul>
</div>
