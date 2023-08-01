@extends('layout.index')

@section('content')

    <div class="col-lg-12 col-md-12 col-sm-12">
        <section class="main">
            <div class="row column-reverse ">
                <div style="z-index: 2" class="position-relative col-lg-6 col-md-6 col-sm-12 ">
                    <img class="position-absolute small-circle" src="{{asset('assets/icon/circle.svg')}}">
                    <img class="position-absolute medium-circle" src="{{asset('assets/icon/circle.svg')}}">
                    <img class="position-absolute small-circle bottom-circle"
                         src="{{asset('assets/icon/circle.svg')}}">
                    <div class="row margin-top">
                        <div class="padding-item col-lg-12 col-md-12 col-sm-12" style="margin-bottom: 20px;">
                            {{--<h5>
                                صرافی کاسپین
                            </h5>--}}
                            <img src="{{ asset('assets/icon/caspian.svg') }}"/>
                        </div>
                        <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                            <h1 class="bold-text">
                                بازار معاملاتی ارزهای دیجیتال
                            </h1>
                        </div>
                        <div class="margin-bottom padding-item col-lg-12 col-md-12 col-sm-12">
                            <p class="grey">
                                خرید و فروش بیت کوین و سایر ارزهای دیجیتال را در محیطی امن و حرفه ای
                                تجربه کنید
                            </p>
                        </div>
                        {{--@if(!auth()->guard('clients')->check())--}}
                        <form class="home_form" style="display: flex" method="post"
                              action="{{ route('enter_to_login') }}">
                            @csrf

                            <div class=" second-margin-item padding-item col-lg-8 col-md-8 col-sm-8 col-12">
                                <div class="no-margin input-row">
                                    <input class="input-with-icon" type="text"
                                           placeholder="ایمیل خود را وارد کنید " name="email" autocomplete="off">
                                    <img class="input-icon" src="{{asset('assets/icon/email.svg')}}">
                                </div>
                            </div>
                            <div class="second-margin-item padding-item col-lg-4 col-md-4 col-sm-4 col-7">
                                <button class="mobile-text-center flex-box button p-button">
                                    ورود به بازار
                                </button>
                            </div>
                        </form>

                        <div class="margin-top padding-item col-lg-12 col-md-12 col-sm-12">
                            <p class="grey">
                                هم اکنون به جمع {{ fa_number(number_format(\App\Models\Client::query()->count())) }}
                                کاربر در بازار پرشین کریپتو بپیوندید
                            </p>
                        </div>
                        {{--                        @endif--}}

                    </div>
                    <div class="blur-items right-blur">
                    </div>
                </div>
                <div class="lottie-item position-relative padding-item col-lg-6 col-md-6 col-sm-12">
                    <div class="blur-items left-blur position-absolute"></div>
                    <img class="position-absolute big-circle" src="{{asset('assets/icon/circle.svg')}}">

                    <div id="svgContainer">

                    </div>
                </div>
            </div>
            <div class="row space">
                <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                    <ul class="table-title web-item">

                        <li>
                            نمایش بازار بر اساس
                        </li>

                        @foreach($pairs as $key => $value)

                            @if($value->count() === 0)
                                @continue
                            @endif

                            <li class="filter-item {{ $loop->index === 0 ? 'active' : '' }}"
                                data-id="{{ $value->first()->vs_coin->id }}">
                                {{ $value->first()->vs_coin->persian_name }}
                                <span></span> {{ $value->first()->vs_coin->symbol }}
                                <div class="kine-on-hover"></div>
                            </li>

                        @endforeach

                        @foreach($currency_pairs as $key => $value)

                            @if($value->count() === 0)
                                @continue
                            @endif

                            <li class="filter-item {{ $loop->index === 0 ? 'active' : '' }}"
                                data-id="+{{ $value->first()->vs_coin->id }}">
                                {{ $value->first()->vs_coin->persian_name }} {{ $value->first()->vs_coin->symbol }}
                                <div class="kine-on-hover"></div>
                            </li>

                        @endforeach

                        {{-- <li class="filter-item">
                             تومان TMN
                             <div class="kine-on-hover"></div>
                         </li>--}}

                    </ul>
                    {{--                    todo--}}
                    <div class="drop-down no-margin mobile-item">
                        <div class="selected ">
                            <a class="flex-box justify-content-between">
                                <span class="chose"> نمایش بازار بر اساس</span>
                                <img src="assets/icon/arrow s.svg">

                            </a>
                        </div>
                        <div class="options">
                            <ul class="opMarketHomeUl">
                                <img class="z-index-0 bg" src="assets/photo/input-blur.png">


                                @foreach($pairs as $key => $value)

                                    @if($value->count() === 0)
                                        @continue
                                    @endif

                                    <li data-id="{{ $value->first()->vs_coin->id }}">
                                        <a>{{ $value->first()->vs_coin->persian_name }}  {{ $value->first()->vs_coin->symbol }}</a>
                                    </li>

                                @endforeach

                                @foreach($currency_pairs as $key => $value)

                                    @if($value->count() === 0)
                                        @continue
                                    @endif

                                    <li data-id="+{{ $value->first()->vs_coin->id }}">
                                        <a>{{ $value->first()->vs_coin->persian_name }}  {{ $value->first()->vs_coin->symbol }}</a>
                                    </li>

                                @endforeach


                                {{--<li data-id="0">
                                    <a> تومان TMN</a>
                                </li>
                                <li data-id="1">
                                    <a> تتر USDT</a>
                                </li>
                                <li data-id="2">
                                    <a> بیت کوین BTC</a>
                                </li>--}}
                            </ul>
                        </div>
                    </div>

                </div>

                @foreach($pairs as $key => $pair)

                    @each('components.home_coin' , $pair , 'pair')

                @endforeach


                @foreach($currency_pairs as $key => $pair)

                    @each('components.home_coin_based_on_currency' , $pair , 'pair')

                @endforeach

                <div class="mobile-item padding-item col-lg-12 col-md-12 col-sm-12">
                    <a class="mobile-text-center flex-box button p-button center-button" href="{{ route('exchange') }}">
                        مشاهده بیشتر
                    </a>
                </div>

            </div>
            <div class="row" style="margin-top: 100px">
                <div class="flex-box padding-item col-lg-6 col-md-6 col-sm-126 col-12">
                    <div id="image1">

                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="row">
                        <div class="margin-bottom padding-item col-lg-12 col-md-12 col-sm-12">
                            <h5 class="bold-text white-text">
                                ابزار تحلیل و چارت قیمتی
                            </h5>
                            <p class="grey-text">
                                طراحان سایت هنگام طراحی قالب سایت معمولا با این موضوع رو برو هستند که
                                محتوای اصلی صفحات آماده نیست. در نتیجه طرح کلی دید درستی به کار فرما
                                نمیدهد. اگر طراح بخواهد دنبال متن های مرتبط بگردد تمرکزش از روی کار اصلی
                                برداشته میشود
                            </p>

                        </div>
                        <div class=" padding-item col-lg-12 col-md-12 col-sm-12">
                            <h5 class="bold-text white-text">
                                سرويس كپي تريدينگ
                            </h5>
                            <p class="grey-text">
                                طراحان سایت هنگام طراحی قالب سایت معمولا با این موضوع رو برو هستند که
                                محتوای اصلی صفحات آماده نیست. در نتیجه طرح کلی دید درستی به کار فرما
                                نمیدهد. اگر طراح بخواهد دنبال متن های مرتبط بگردد تمرکزش از روی کار اصلی
                                برداشته میشود
                            </p>

                        </div>
                        <div class="margin padding-item col-lg-12 col-md-12 col-sm-12">
                            <a class="button p-button" href="{{ route('profile_info') }}">
                                همین الان شروع کنید
                            </a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row space position-relative" style="margin-top: 100px">
                <img class="web-item cloud4 position-absolute" src="{{asset('assets/photo/cloud.svg')}}">
                <div class="blur-circle4 position-absolute"></div>
                <div class="blur-circle5 position-absolute"></div>
                <div
                        class="margin-bottom flex-box justify-content-between padding-item col-lg-12 col-md-12 col-sm-12">
                    <h2 class="no-margin white-text">
                        تازه ترین ها
                    </h2>
                    <a class="more flex-box justify-content-center blog_more_naeim" href="{{ route('blog') }}">
                        <span></span>
                        <p class="no-margin">
                            مقاله های بیشتر
                        </p>
                    </a>

                </div>
                <div class=" col-lg-12 col-md-12 col-sm-12">
                    <div class="row">

                        <div class="padding-item col-lg-4 col-md-4 col-sm-6 col-12">
                            <a class="blur-hover box-item d-block"
                               href="{{ route('single_blog' , $blogs->first()->slug) }}">
                                <div class="image-box">
                                    <img src="{{ Voyager::image($blogs->first()->image) }}">
                                </div>
                                <div class="content-item ">
                                    <h5 class="bold-text white-text ">
                                        {{ $blogs->first()->title }}
                                    </h5>
                                    <div class="flex-box justify-content-start details-items-item ">
                                        <div class="flex-box tags">
                                            <span></span>
                                            <p>
                                                {{ \Carbon\Carbon::create($blogs->first()->created_at)->diffForHumans() }}
                                            </p>
                                        </div>
                                        <div class="flex-box tags active">
                                            <span></span>
                                            <p>
                                                {{ $blogs->first()->categories->first()?->title }}
                                            </p>
                                        </div>
                                    </div>
                                    <p class="grey-text ">
                                        {{ $blogs->first()->summery }}
                                    </p>
                                    <div class=" flex-box justify-content-end">
                                        <div class="continue">
                                            ادامه
                                        </div>
                                    </div>
                                </div>

                                <div class="glow">
                                </div>
                            </a>
                        </div>

                        <div class=" col-lg-8 col-md-8 col-sm-6 col-12">
                            <div class="row">
                                <div class="padding-item col-lg-12 col-md-6 col-sm-12 col-12">
                                    <a class="blur-hover box-row box-item d-block"
                                       href="{{ route('single_blog' , $blogs->skip(1)->first()->slug) }}">
                                        <div class="row">
                                            <div class=" col-lg-3 col-md-12 col-sm-12 col-12">
                                                <div class="image-box  ">
                                                    <img src="{{ Voyager::image($blogs->skip(1)->first()->image) }}">
                                                </div>
                                            </div>
                                            <div
                                                    class=" content-item col-lg-9 col-md-12 col-sm-12 col-12">
                                                <div
                                                        class="details-items flex-box justify-content-between">
                                                    <h5 class="no-margin bold-text white-text ">
                                                        {{ $blogs->skip(1)->first()->title }}
                                                    </h5>
                                                    <div class="flex-box justify-content-start ">
                                                        <div class="flex-box tags">
                                                            <span></span>
                                                            <p>
                                                                {{ \Carbon\Carbon::create($blogs->skip(1)->first()->created_at)->diffForHumans() }}
                                                            </p>
                                                        </div>
                                                        <div class="flex-box tags active">
                                                            <span></span>
                                                            <p>
                                                                {{ $blogs->skip(1)->first()->categories->first()?->title }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="grey-text ">
                                                    {{ $blogs->skip(1)->first()->summery }}
                                                </p>
                                                <div class=" flex-box justify-content-end">
                                                    <div class="continue">
                                                        ادامه
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="glow">
                                        </div>
                                    </a>
                                </div>
                                @if(count($blogs) >= 3)
                                <div class="padding-item col-lg-12 col-md-6 col-sm-12 col-12">
                                    <a class="blur-hover box-row box-item d-block"
                                       href="{{ route('single_blog' , $blogs->skip(2)->first()->slug) }}">
                                        <div class="row">
                                            <div class=" col-lg-3 col-md-12 col-sm-12 col-12">
                                                <div class="image-box  ">
                                                    <img src="{{ Voyager::image($blogs->skip(2)->first()->image) }}">
                                                </div>
                                            </div>
                                            <div class=" content-item col-lg-9 col-md-12 col-sm-12 col-12">
                                                <div class="details-items flex-box justify-content-between">
                                                    <h5 class="no-margin bold-text white-text ">
                                                        {{ $blogs->skip(2)->first()->title }}
                                                    </h5>
                                                    <div class="flex-box justify-content-start ">
                                                        <div class="flex-box tags">
                                                            <span></span>
                                                            <p>
                                                                {{ \Carbon\Carbon::create($blogs->skip(2)->first()->created_at)->diffForHumans() }}
                                                            </p>
                                                        </div>
                                                        <div class="flex-box tags active">
                                                            <span></span>
                                                            <p>
                                                                {{ $blogs->skip(2)->first()->categories->first()?->title }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="grey-text ">
                                                    {{ $blogs->skip(2)->first()->summery }}
                                                </p>
                                                <div class=" flex-box justify-content-end">
                                                    <div class="continue">
                                                        ادامه
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="glow">
                                        </div>
                                    </a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row  column-reverse" style="margin-top: 100px;margin-bottom: 100px">
                <div class="col-lg-5 col-md-6 col-sm-12 col-12">
                    <div class="margin-bottom padding-item ">
                        <h2 class="bold-text white-text">
                            لورم ایپسوم
                        </h2>
                        <p class="grey-text">
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                            طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که
                            لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود
                            ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته،لورم ایپسوم
                            متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                            است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و
                            برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای
                            کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت
                            فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای
                            طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد
                            کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها
                            و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی
                            و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد
                        </p>

                    </div>
                </div>
                <div class="flex-box padding-item col-lg-7 col-md-6 col-sm-12 col-12">
                    <div id="image2">

                    </div>
                </div>
                <div class="mobile-item padding-item col-lg-12 col-md-12 col-sm-12">
                    <a class="mobile-text-center flex-box button p-button center-button" href="{{ route('blog') }}">
                        مشاهده بیشتر
                    </a>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('assets/js/drop-down.js')}}"></script>

    <script>

        $(".opMarketHomeUl li").click(function () {
            let clickedId = $(this).data("id");
            $(".filter-item").eq($(this).index() - 1).click();
        })
    </script>

    <script>

        var svgContainer = document.getElementById('svgContainer');


        var animItem = bodymovin.loadAnimation({
            wrapper: svgContainer,
            animType: 'svg',
            loop: true,
            path: '{{ asset('assets/lottie/comp.json') }}',
        });

    </script>
    <script>

        var svgContainer = document.getElementById('image1');


        var animItem = bodymovin.loadAnimation({
            wrapper: svgContainer,
            animType: 'svg',
            loop: true,
            path: '{{ asset('assets/lottie/first.json') }}',
        });

    </script>
    <script>

        var svgContainer = document.getElementById('image2');


        var animItem = bodymovin.loadAnimation({
            wrapper: svgContainer,
            animType: 'svg',
            loop: true,
            path: '{{ asset('assets/lottie/second.json') }}',
        });

    </script>

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

        function get_chart_data() {
            $.ajax({
                url: `{{ route('chart_data') }}`,
                method: 'get',
                success: function (res) {
                    const pairs = res.data;

                    for (let i = 0; i < pairs.length; i++) {
                        const coin = pairs[i];

                        /*for (let j = 0; j < coins.length; j++) {
                            const coin = coins[j];*/

                            const changes = coin.changes.map((change) => {
                                return change.price;
                            });

                            console.log(changes)

                            if (changes.length === 0)
                                continue;

                            let is_green = true;

                            if (changes.length > 2)
                                is_green = changes[0] < changes[changes.length - 1];

                            let lowest = Number.MAX_SAFE_INTEGER;

                            let labels = [];
                            for (let k = 0; k < changes.length; k++) {
                                labels[k] = k;
                                if(parseFloat(changes[k]) < lowest)
                                    lowest = parseFloat(changes[k]);
                            }

                            console.log(labels)

                            let ctx = document.getElementById(`first-chart-${coin.id}`).getContext('2d');
                            $(`#first-chart-${coin.id}`).parent().find('div span').text(lowest + "")

                            new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: labels,
                                    datasets: [{
                                        pointBorderWidth: 0,
                                        pointHoverRadius: 0,
                                        shadowColor: " 0px 8px 16px rgba(12, 210, 158, 0.44);\n" +
                                            "transform: matrix(-1, 0, 0, 1, 0, 0);",
                                        pointRadius: 0,
                                        label: '', // Name the series
                                        data: changes,
                                        fill: false,
                                        borderColor: is_green ? '#0CD29E' : '#FF3A44',
                                        backgroundColor: is_green ? '#0CD29E' : '#FF3A44',
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
                                                    min: 0,
                                                    callback: function(value, index, ticks) {
                                                        return '';
                                                    }
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

                                                callback: function(value, index, ticks) {
                                                    return '';
                                                }
                                                }
                                            }],
                                        },
                                    legend: {
                                        display: false
                                    },

                                    responsive: true, // Instruct chart js to respond nicely.
                                    maintainAspectRatio: true, // Add to prevent default behaviour of full-width/height

                                },
                                plugins: [is_green ? ShadowPluginGreen : ShadowPluginRed],
                            });
                        // }

                    }
                },
                error: function (err) {
                }
            })
        }

        get_chart_data();


        @foreach($currency_pairs as $key => $coins)

        @foreach($coins as $coin)

        @php
            $changes = \App\Models\ChangeBaseOnCurrency::query()->where('pair_id' , $coin->id)
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

            $lowest = $changes->sortBy(function($data){
                return (float)$data;
            })->first()
        @endphp

        var ctx = document.getElementById("first-chart-currency-{{ $coin->id }}").getContext('2d');
        $('#first-chart-currency-{{ $coin->id }}').parent().find('div span').text('{{ $lowest }}')

        var myChart = new Chart(ctx, {
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
                    borderColor: '{{ $is_green ? '#0CD29E' : '#FF3A44' }}', //#FF3A44
                    backgroundColor: '{{ $is_green ? '#0CD29E' : '#FF3A44' }}', // #FF3A44
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

        @endforeach

        $('.filter-item').click(function () {

            $('.filter-item').removeClass('active')

            $(this).addClass('active')

            $('.home_coin_class[data-id!="' + $(this).attr('data-id') + '"]').fadeOut()
            $('.home_coin_class[data-id="' + $(this).attr('data-id') + '"]').fadeIn()

        })

        $('.filter-item').eq(0).click();


    </script>

@endsection
