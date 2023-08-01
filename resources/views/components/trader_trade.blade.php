<div class="padding-item col-lg-12 col-md-12 col-sm-12">
    <ul class="items flex-box blur-hover table-body-item">
        <div class="glow"></div>
        <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">
        <li class=" neme" data-label=" ">
            <div class="flex-box justify-content-start">
                <img src="{{ $position->pair->coin->icon }}" style="width: 43px">
                <div>
                    <h5 class="white-text">
                        {{ $position->pair->coin->persian_name }}
                    </h5>
                    <p class="grey-text no-margin">
                        {{ strtoupper($position->pair->coin->symbol) }}
                    </p>
                </div>
            </div>
        </li>
        <li style="padding-right: 37px" class=" price lowest-price" data-label="خرید ">
            <div class="flex-box">
                <h5 class="white-text no-margin ">
                    {{ fa_number(round($position->price , 4)) }}
                </h5>
                <h5 class="web-item grey-text no-margin  margin-left">
                    {{ $position instanceof \App\Models\Bid ? 'خرید' : 'فروش'}}
                </h5>
            </div>
        </li>
        <li class="price" data-label=" فروش">
            @if($position->profit_price)
                <div class="flex-box">
                    <h5 class="white-text no-margin">
                        {{ fa_number(round($position->profit_price , 4)) }}
                    </h5>
                    <h5 class="web-item grey-text no-margin  margin-left">
                        {{ $position instanceof \App\Models\Bid ? 'فروش' : 'خرید'}}
                    </h5>
                </div>
            @endif
        </li>
        <li class="position-relative" data-label="نوسانات  ">
            <div class="flex-box ">
                <div class="flex-box p-items">
                    <img src="{{asset('assets/icon/red-arrow.svg')}}">
                    <p class="red-item no-margin">
                        30.56%
                    </p>
                </div>
                <p class="grey-text no-margin">
                    ضرر متوسط
                </p>
            </div>
        </li>
        <li data-label="سود دهی">
            <div class="margin-left-auto ProgressBar ProgressBar--animateAll" data-progress="32">
                <svg class="ProgressBar-contentCircle">
                    <!-- on défini le l'angle et le centre de rotation du cercle -->
                    <circle transform="rotate(0, 0, 0)" class="ProgressBar-background" cx="22" cy="22" r="21"/>
                    <circle transform="rotate(0, 0, 0)" class="ProgressBar-circle" cx="22" cy="22" r="21"/>
                    <span class="ProgressBar-percentage ProgressBar-percentage--count"></span>
                </svg>
                <p>
                    سود دهی
                </p>
            </div>
        </li>
    </ul>
</div>
