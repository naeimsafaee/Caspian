@extends('dashboard.index')

@section('content_head')
    <form class="search-form" action="{{ url()->current() }}" method="GET">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M15.7138 6.8382C18.1647 9.28913 18.1647 13.2629 15.7138 15.7138C13.2629 18.1647 9.28913 18.1647 6.8382 15.7138C4.38727 13.2629 4.38727 9.28913 6.8382 6.8382C9.28913 4.38727 13.2629 4.38727 15.7138 6.8382"
                  stroke="#D7D4ED" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M19 19L15.71 15.71" stroke="#D7D4ED" stroke-width="1.5" stroke-linecap="round"
                  stroke-linejoin="round"/>
        </svg>
        <input placeholder=" جستجو کنید" name="search" value="{{ request()->search }}">
    </form>
@endsection

@section('content')

    @if($fav_coins->count() > 0)

        <div class="padding-item col-lg-12 col-md-12 col-sm-12">
            <h5 class="second-margin-item">
                ارزهای مورد علاقه
            </h5>
        </div>

        <div class="padding-item col-lg-12 col-md-12 col-sm-12 web-item">
            <ul class="items flex-box blur-hover table-title-item">
                <li class="child1 neme" data-label=" ">
                    <div class="flex-box">
                        نوع ارز
                        <img src="{{asset('assets/icon/triangle.svg')}}">
                    </div>
                </li>
                <li class=" position-relative" data-label="  ">
                    <div class="flex-box">
                        نوسانات
                        <img src="{{asset('assets/icon/triangle.svg')}}">
                    </div>

                </li>
                <li class="child1 price " data-label=" ">
                    <div class="flex-box">
                        بازار
                        <img src="{{asset('assets/icon/triangle.svg')}}">
                    </div>
                </li>
                <li class="price" data-label="">
                </li>

            </ul>
        </div>

        @foreach($fav_coins as $coin)
            <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                <ul class="items flex-box blur-hover table-body-item">
                    <div class="glow"></div>
                    <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">
                    <li class="child1 neme" data-label=" " style="width: 28%">
                        <div class="flex-box justify-content-start">

                            <a href="{{ route('remove_favorite' , $coin->id) }}">
                                <svg class="faverite-c active" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M7.73284 20.829C7.22598 21.0936 6.61279 21.047 6.15172 20.7089C5.69064 20.3708 5.46188 19.8 5.56184 19.237L6.37084 14.6L2.96484 11.336C2.54852 10.939 2.39594 10.3388 2.5721 9.79117C2.74826 9.24352 3.22212 8.84486 3.79184 8.76501L8.52084 8.08901L10.6558 3.83001C10.909 3.31923 11.4298 2.99609 11.9998 2.99609C12.5699 2.99609 13.0907 3.31923 13.3438 3.83001L15.4788 8.08901L20.2078 8.76501C20.7776 8.84486 21.2514 9.24352 21.4276 9.79117C21.6037 10.3388 21.4512 10.939 21.0348 11.336L17.6288 14.6L18.4378 19.238C18.5378 19.801 18.309 20.3718 17.848 20.7099C17.3869 21.048 16.7737 21.0946 16.2668 20.83L11.9998 18.625L7.73284 20.829Z"
                                          stroke="#D7D4ED" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                </svg>
                            </a>

                            <img src="{{ $coin->icon }}" style="height: 55px; padding-left: 10px; padding-right: 10px">
                            <div>
                                <h5 class="white-text">
                                    {{ $coin->persian_name }}
                                </h5>
                                <p class="grey-text no-margin">
                                    {{ strtoupper($coin->symbol) }}
                                </p>
                            </div>

                        </div>
                    </li>
                    <li class=" position-relative" data-label="نوسانات  ">
                        {{--<div class="web-item flex-box price-change grey-text position-absolute">
                            <img src="{{asset('assets/icon/top-arrow.svg')}}">
                            0.22
                        </div>--}}
                        <canvas id="favorite-chart-{{ $coin->id }}"></canvas>
                    </li>
                    <li class="child1 price " data-label=" بیشترین قیمت ">
                        <div class="max-content">
                            <p class="grey-text no-margin">
                                {{ number_format($coin->price * $tether->price) }}
                            </p>
                            <p class="grey-text no-margin web-item">
                                قیمت
                            </p>
                        </div>
                    </li>
                    {{-- <li class="child1 price" data-label=" بیشترین قیمت">
                         <div style="width: max-content">
                             <p class="grey-text no-margin">
                                 1,212,854,540 TMN
                             </p>
                             <p class="grey-text no-margin web-item">
                                 بیشترین قیمت
                             </p>
                         </div>
                     </li>--}}
                    <li data-label="">
                        <a class="flex-box black-button" href="{{ route('exchange_buy' , [$coin->name , 'Toman']) }}">
                            خرید / فروش
                        </a>
                    </li>
                </ul>
            </div>
        @endforeach

    @endif
    @if(count($coins) > 0)
    <div class="padding-item col-lg-12 col-md-12 col-sm-12 web-item">
        <ul class="items flex-box blur-hover table-title-item">
            <li class="child1 neme" data-label=" ">
                <div class="flex-box">
                    نوع ارز
                    <img src="{{asset('assets/icon/triangle.svg')}}">
                </div>
            </li>
            <li class=" position-relative" data-label="  ">
                <div class="flex-box">
                    نوسانات
                    <img src="{{asset('assets/icon/triangle.svg')}}">
                </div>

            </li>
            <li class="child1 price " data-label=" ">
                <div class="flex-box">
                    بازار
                    <img src="{{asset('assets/icon/triangle.svg')}}">
                </div>
            </li>
            <li class="price" data-label="">
            </li>

        </ul>
    </div>
    @else
        <p style="text-align: center; margin-top: 20px">
            چیزی پیدا نشد
        </p>
    @endif

    @foreach($coins as $coin)

        <div class="padding-item col-lg-12 col-md-12 col-sm-12">
            <ul class="items flex-box blur-hover table-body-item">
                <div class="glow"></div>
                <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">
                <li class="child1 neme" data-label=" " style="width: 28%">
                    <div class="flex-box justify-content-start">

                        @if($coin->is_favorite)
                            <a href="{{ route('remove_favorite' , $coin->id) }}">
                                <svg class="faverite-c active" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M7.73284 20.829C7.22598 21.0936 6.61279 21.047 6.15172 20.7089C5.69064 20.3708 5.46188 19.8 5.56184 19.237L6.37084 14.6L2.96484 11.336C2.54852 10.939 2.39594 10.3388 2.5721 9.79117C2.74826 9.24352 3.22212 8.84486 3.79184 8.76501L8.52084 8.08901L10.6558 3.83001C10.909 3.31923 11.4298 2.99609 11.9998 2.99609C12.5699 2.99609 13.0907 3.31923 13.3438 3.83001L15.4788 8.08901L20.2078 8.76501C20.7776 8.84486 21.2514 9.24352 21.4276 9.79117C21.6037 10.3388 21.4512 10.939 21.0348 11.336L17.6288 14.6L18.4378 19.238C18.5378 19.801 18.309 20.3718 17.848 20.7099C17.3869 21.048 16.7737 21.0946 16.2668 20.83L11.9998 18.625L7.73284 20.829Z"
                                          stroke="#D7D4ED" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                </svg>
                            </a>
                        @else
                            <a href="{{ route('add_favorite' , $coin->id) }}">
                                <svg class="faverite-c " width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M7.73284 20.829C7.22598 21.0936 6.61279 21.047 6.15172 20.7089C5.69064 20.3708 5.46188 19.8 5.56184 19.237L6.37084 14.6L2.96484 11.336C2.54852 10.939 2.39594 10.3388 2.5721 9.79117C2.74826 9.24352 3.22212 8.84486 3.79184 8.76501L8.52084 8.08901L10.6558 3.83001C10.909 3.31923 11.4298 2.99609 11.9998 2.99609C12.5699 2.99609 13.0907 3.31923 13.3438 3.83001L15.4788 8.08901L20.2078 8.76501C20.7776 8.84486 21.2514 9.24352 21.4276 9.79117C21.6037 10.3388 21.4512 10.939 21.0348 11.336L17.6288 14.6L18.4378 19.238C18.5378 19.801 18.309 20.3718 17.848 20.7099C17.3869 21.048 16.7737 21.0946 16.2668 20.83L11.9998 18.625L7.73284 20.829Z"
                                          stroke="#D7D4ED" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                </svg>
                            </a>
                        @endif


                        <img src="{{ $coin->icon }}" style="height: 55px; padding-left: 10px; padding-right: 10px">
                        <div>
                            <h5 class="white-text">
                                {{ $coin->persian_name }}
                            </h5>
                            <p class="grey-text no-margin">
                                {{ strtoupper($coin->symbol) }}
                            </p>
                        </div>

                    </div>
                </li>
                <li class=" position-relative" data-label="نوسانات  ">
                    {{--<div class="web-item flex-box price-change grey-text position-absolute">
                        <img src="{{asset('assets/icon/top-arrow.svg')}}">
                        0.22
                    </div>--}}
                    <canvas id="forth-chart-{{ $coin->id }}"></canvas>
                </li>
                <li class="child1 price " data-label=" بیشترین قیمت ">
                    <div class="max-content">
                        <p class="grey-text no-margin">
                            {{ number_format($coin->price * $tether->price) }}
                        </p>
                        <p class="grey-text no-margin web-item">
                            قیمت
                        </p>
                    </div>
                </li>
                {{-- <li class="child1 price" data-label=" بیشترین قیمت">
                     <div style="width: max-content">
                         <p class="grey-text no-margin">
                             1,212,854,540 TMN
                         </p>
                         <p class="grey-text no-margin web-item">
                             بیشترین قیمت
                         </p>
                     </div>
                 </li>--}}
                <li data-label="">
                    <a class="flex-box black-button" href="{{ route('exchange_buy' , [$coin->name , 'Toman']) }}">
                        خرید / فروش
                    </a>
                </li>
            </ul>
        </div>

    @endforeach

@endsection

@section('scripts')

    <script>

        const ShadowPluginGreen = {
            beforeDraw: (chart, args, options) => {
                const {ctx} = chart;
                ctx.shadowColor = "rgba(12, 210, 158, 0.44)";
                ctx.shadowBlur = 24;
                ctx.shadowOffsetX = 10;
                ctx.shadowOffsetY = 13;


            },
        };

        const ShadowPluginRed = {
            beforeDraw: (chart, args, options) => {
                const {ctx} = chart;
                ctx.shadowColor = "rgba(255, 58, 68, 0.44)";
                ctx.shadowBlur = 24;
                ctx.shadowOffsetX = 10;
                ctx.shadowOffsetY = 13;
            },
        };

        @foreach($coins as $coin)

            @php

                $pair = \App\Models\Pair::query()->where([
                    'coin_id' => $coin->id,
                    'vs_coin_id' => $tether_coin->id
                ])->first();
                if(!$pair)
                    continue;

                $changes = \App\Models\Change::query()->where('pair_id' , $pair->id)
                    ->whereDate('created_at' , '>=' , \Carbon\Carbon::today()->subDay())
                    ->whereDate('created_at' , '<=' , \Carbon\Carbon::now())
                    ->orderByDesc('created_at')
                    ->select(\Illuminate\Support\Facades\DB::raw('hour(created_at)'),'price')
                    ->groupBy(\Illuminate\Support\Facades\DB::raw('hour(created_at)'))
                    ->get()->map(function($change){
                        return $change->price;
                    });

                $is_green = true;

                if($changes->count() > 2)
                    $is_green = $changes->first() < $changes->last();

            @endphp

            ctx = document.getElementById("forth-chart-{{ $coin->id }}").getContext('2d');

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [
                        @for($i = 0 ; $i < $changes->count() ; $i++)
                                {{ $i }},
                        @endfor
                    ],
                    datasets: [{
                        pointBorderWidth: 0,
                        pointHoverRadius: 0,
                        shadowColor: " 0px 8px 16px rgba(12, 210, 158, 0.44);\n" +
                            "transform: matrix(-1, 0, 0, 1, 0, 0);",
                        pointRadius: 0,
                        label: '', // Name the series
                        data: {{ $changes }},
                        fill: false,
                        borderColor: '{{ $is_green ? '#0CD29E' : '#FF3A44' }}',
                        backgroundColor: '{{ $is_green ? '#0CD29E' : '#FF3A44' }}',
                        borderWidth: 3
                    }]
                },
                options: {
                    scales:
                        {

                            responsive: true,
                            maintainAspectRatio: true,
                            xAxes: [{
                                gridLines: {
                                    display: false,
                                    drawBorder: false,
                                    tickMarkLength: 1,
                                },
                                ticks: {
                                    beginAtZero: false,
                                    fontSize: 0,
                                    fontColor: '#fff',
                                    maxTicksLimit: 5,
                                    padding: 0,
                                    min: 0
                                },
                            }],
                            yAxes: [{
                                gridLines: {
                                    display: false,
                                    drawBorder: false,
                                    tickMarkLength: 1
                                },

                                ticks: {
                                    beginAtZero: false,
                                    fontSize: 0,
                                    fontColor: '#fff',
                                    maxTicksLimit: 5,
                                    padding: 0,
                                }
                            }],
                        },
                    legend: {
                        display: false
                    },

                    responsive: true, // Instruct chart js to respond nicely.
                    maintainAspectRatio: true, // Add to prevent default behaviour of full-width/height

                },
                plugins: [{{ $is_green ? 'ShadowPluginGreen' : 'ShadowPluginRed' }}],
            });

        @endforeach


        @foreach($fav_coins as $coin)

            @php

                    $pair = \App\Models\Pair::query()->where([
                        'coin_id' => $coin->id,
                        'vs_coin_id' => $tether_coin->id
                    ])->first();
                    if(!$pair)
                        continue;

                    $changes = \App\Models\Change::query()->where('pair_id' , $pair->id)
                    ->whereDate('created_at' , '>=' , \Carbon\Carbon::today()->subDay())
                    ->whereDate('created_at' , '<=' , \Carbon\Carbon::now())
                    ->orderByDesc('created_at')
                    ->select(\Illuminate\Support\Facades\DB::raw('hour(created_at)'),'price')
                    ->groupBy(\Illuminate\Support\Facades\DB::raw('hour(created_at)'))
                    ->get()->map(function($change){
                        return $change->price;
                    });

                    $is_green = true;

                    if($changes->count() > 2)
                        $is_green = $changes->first() < $changes->last();

                @endphp

            ctx = document.getElementById("favorite-chart-{{ $coin->id }}").getContext('2d');

            new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                    @for($i = 0 ; $i < $changes->count() ; $i++)
                            {{ $i }},
                    @endfor
                ],
                datasets: [{
                    pointBorderWidth: 0,
                    pointHoverRadius: 0,
                    shadowColor: " 0px 8px 16px rgba(12, 210, 158, 0.44);\n" +
                        "transform: matrix(-1, 0, 0, 1, 0, 0);",
                    pointRadius: 0,
                    label: '', // Name the series
                    data: {{ $changes }},
                    fill: false,
                    borderColor: '{{ $is_green ? '#0CD29E' : '#FF3A44' }}',
                    backgroundColor: '{{ $is_green ? '#0CD29E' : '#FF3A44' }}',
                    borderWidth: 3
                }]
            },
            options: {
                scales:
                    {

                        responsive: true,
                        maintainAspectRatio: true,
                        xAxes: [{
                            gridLines: {
                                display: false,
                                drawBorder: false,
                                tickMarkLength: 1,
                            },
                            ticks: {
                                beginAtZero: false,
                                fontSize: 0,
                                fontColor: '#fff',
                                maxTicksLimit: 5,
                                padding: 0,
                                min: 0
                            },
                        }],
                        yAxes: [{
                            gridLines: {
                                display: false,
                                drawBorder: false,
                                tickMarkLength: 1
                            },

                            ticks: {
                                beginAtZero: false,
                                fontSize: 0,
                                fontColor: '#fff',
                                maxTicksLimit: 5,
                                padding: 0,
                            }
                        }],
                    },
                legend: {
                    display: false
                },

                responsive: true, // Instruct chart js to respond nicely.
                maintainAspectRatio: true, // Add to prevent default behaviour of full-width/height

            },
            plugins: [{{ $is_green ? 'ShadowPluginGreen' : 'ShadowPluginRed' }}],
        });

        @endforeach
    </script>

@endsection
