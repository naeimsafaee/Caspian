@extends('dashboard.index')

@section('content_head')
    <div class="second-margin-item padding-item col-lg-12 col-md-12 col-sm-12">
        <h5 class="no-margin">
            کیف پول {{ $coin->persian_name }}
        </h5>
    </div>
@endsection

@section('content')

    <div class="padding-item col-lg-12 col-md-12 col-sm-12">
        <div class=" items  position-relative overflow-visible">
            <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">
            <div class="trades-items-row flex-box justify-content-between">
                <div class="Inventory">
                    <span class="bold-text">
                       موجودی
                    </span>
                    <span class="margin-right">
                       {{ $client->coin($coin->id) }}
                        {{ $coin->persian_name }}
                    </span>
                </div>
                <div class=" flex-box justify-content-start">
                    <a href="{{ route('wallet_coin_withdraw' , $coin->name) }}" class="p-button button b-w-w flex-box">
                        برداشت </a>
                    <a href="#" class="margin-right black-button flex-box play-btn has-icon">
                        راهنمای تصویری
                        <img class="margin-right" src="{{asset('assets/icon/play.svg')}}">
                    </a>
                </div>

            </div>
        </div>

    </div>
    <div class="padding-item col-lg-12 col-md-12 col-sm-12">
        <div class="wallet-tabs items  position-relative overflow-visible">
            <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">
            <div class="tile" id="tile-1">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-justified" role="tablist">
                    @if($networks->count() == 0)

                        هنوز هیچ شبکه ای برای این ارز پشتیبانی نمی شود.

                    @else
                        <div class="slider slider2"></div>
                    @endif

                    @foreach($networks as $network)
                        <li class="nav-item">
                            <a class="nav-link @if($loop->index == 0) active @endif" id="tab{{$loop->index}}"
                               data-toggle="tab" href="#tab-content{{$loop->index}}" role="tab"
                               aria-controls="home" aria-selected="true">
                                <i class="fas fa-home"></i>
                                {{ $network->persian_name }}
                            </a>
                        </li>
                    @endforeach
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    @foreach($networks as $network)
                        @php
                            $address = $network->address()
                        @endphp
                        <div class="tab-pane fade show @if($loop->index === 0) active @endif"
                             id="tab-content{{$loop->index}}" role="tabpanel" aria-labelledby="home-tab">
                            <div class="big-text bold-text">
                                واریز
                            </div>
                            <p class="grey-text no-margin">
                                {{ $network->description }}
                            </p>
                            {{--<div class="bg-text ">
                                برای واریز علاوه بر <span class="red-item">آدرس</span> ٬<span class="red-item">کدتگ</span>
                                یا <span class="red-item">ممو</span> باید در والت مبدا ثبت گردد. درغیر این صورت واریزی به
                                حساب شما منظور نخواهد شد
                            </div>--}}
                            <p>
                                آدرس کیف پول {{ $coin->persian_name }} بر روی شبکه‌ی {{ $network->persian_name }}:
                            </p>
                            <div class="flex-box justify-content-center"
                                 onclick="copyTextToClipboard('{{ $address }}')">
                                <span style="margin-left: 8px;display: none;" class="copy_text">کپی شد</span>
                                <span class="blue-text">
                                    {{ $address }}
                                </span>
                                <img class="margin-right" src="{{asset('assets/icon/copy.svg')}}">
                            </div>
                            <div class="qr-code-box flex-box" style="padding: 0">
                                <img class="qr-code"
                                     src="https://chart.googleapis.com/chart?chs=225x225&chld=L|2&cht=qr&chl={{ $coin->name . ":" . $address }}"
                                     style="border-radius: 10px;width: 74px;height: 74px;">
                            </div>
                            {{--<p>
                                حتما دقت نمایید که برای واریز به این آدرس٬ از مقدار (تگ) زیر استفاده کنید. در غیر این صورت
                                مبلغ برای شما محسوب نمی‌شود
                            </p>
                            <div class="flex-box justify-content-center">
                                                                <span class="blue-text">
                                                                    ntbrggog68435
                                                                </span>
                                <img class="margin-right" src="{{asset('assets/icon/copy.svg')}}">

                            </div>--}}
                        </div>
                    @endforeach
                </div>

            </div>

        </div>

    </div>
    <div class="padding-item col-lg-12 col-md-12 col-sm-12">
        <div class="items tile  position-relative overflow-visible">
            {{--            <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">--}}
            <div class="bold-text big-text">
                برداشت ها
            </div>

            @if($withdraws->count() == 0)
                شما هیچ برداشتی برای این ارز ثبت نکردید.
            @else
                <table>
                    <thead>
                    <tr>
                        <th class=" text-right">زمان</th>
                        <th class=" text-right"> آدرس دریافت کننده</th>
                        <th class=" text-right">مقدار</th>
                        <th class=" text-right">شبکه</th>
                        <th class=" text-right">کارمزد</th>
                        <th class=" text-right">وضعیت</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($withdraws as $withdraw)
                        <tr>
                            <td class="grey-text text-right" data-column="زمان">
                                {{ $withdraw->persian_date }}
                            </td>
                            <td class="grey-text text-right " data-column="  آدرس دریافت کننده ">
                                {{ substr($withdraw->address , 0 , 10) . "...." . substr($withdraw->address , -10) }}
                            </td>
                            <td class="grey-text text-right" data-column="مقدار">
                                {{ fa_number(number_format($withdraw->amount)) }}
                            </td>
                            <td class="grey-text text-right" data-column="شبکه">
                                {{ $withdraw->network->persian_name }}
                            </td>
                            <td class="grey-text text-right" data-column="کارمزد">
                                {{ fa_number(number_format($withdraw->fee)) }}  {{ $coin->persian_name }}
                            </td>
                            <td class="grey-text text-right" data-column="وضعیت">
                                @if($withdraw->status === 'waiting')
                                    در حال انتظار
                                @elseif($withdraw->status === 'sent')
                                    ارسال شده
                                @elseif($withdraw->status === 'confirmed')
                                    موفق
                                @elseif($withdraw->status === 'rejected')
                                    ناموفق
                                @endif
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif

        </div>

    </div>

    {{--todo
    <div class="padding-item col-lg-12 col-md-12 col-sm-12">
        <div class="items tile  position-relative overflow-visible">
            --}}{{--            <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">--}}{{--
            <div class="bold-text big-text">
                تاریخچه تراکنش‌ها
            </div>
            <table>
                <thead>
                <tr>
                    <th class="text-right">زمان</th>
                    <th class="text-right chlid1"> (بیت کوین) مقدار</th>
                    <th class="text-right">توضیحات</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="grey-text text-right" data-column="زمان">
                        ۱۸
                        دی
                        ۹:۴۵
                    </td>
                    <td class="grey-text text-right chlid1" data-column=" (بیت کوین) مقدار<">۰.۰۰۰۱۳۲۵۶۷</td>
                    <td class="grey-text text-right" data-column="توضیحات">
                        خرید
                        ۰.۰۰۰۱۳۲۵۶۷
                        بیت‌کوین به قیمت واحد
                        ۱۲.۳۵۴.۵۴۵.۳۴۶
                        ریال
                    </td>
                </tr>
                <tr>
                    <td class="grey-text text-right" data-column="زمان">
                        ۱۸
                        دی
                        ۹:۴۵
                    </td>
                    <td class="grey-text text-right chlid1" data-column=" (بیت کوین) مقدار<">۰.۰۰۰۱۳۲۵۶۷</td>
                    <td class="grey-text text-right" data-column="توضیحات">
                        خرید
                        ۰.۰۰۰۱۳۲۵۶۷
                        بیت‌کوین به قیمت واحد
                        ۱۲.۳۵۴.۵۴۵.۳۴۶
                        ریال

                    </td>
                </tr>
                </tbody>
            </table>


        </div>

    </div>--}}

@endsection

@section('scripts')

    <script type="text/javascript" src="{{ asset('assets/js/helper.js') }}"></script>

    <script>

        $("#tile-1 .nav-tabs a").click(function () {
            var position2 = $(this).parent().position();
            var width2 = $(this).parent().width();
            $("#tile-1 .slider2").css({"left": +position2.left, "width": width2});
            $(".copy_text").hide()
        });
        var actWidth2 = $("#tile-1  .nav-tabs").find(".active").parent("li").width();
        var actPosition2 = $("#tile-1  .nav-tabs .active").position();
        $("#tile-1 .slider2").css({"left": +actPosition2.left, "width": actWidth2});


    </script>
@endsection
