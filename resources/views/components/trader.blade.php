<div class="padding-item col-lg-4 col-md-6 col-sm-6 col-12">
    <div class=" trade-item column-item blur-hover box-item d-block ">
        <img class="z-index-0 bg traderImage" src="{{asset('assets/photo/row-item.png')}}">
        <div class="justify-content-end flex-box user-profile">
            <div>
                <h5 class="white-text no-margin">
                    {{ $trader->client->name }} {{ $trader->client->last_name }}
                </h5>
                <p class="no-margin grey-text">
                    {{ $trader->username }}
                </p>
            </div>
            <div class="image-box">
                <img src="{{asset('assets/photo/sample.png')}}">
            </div>

        </div>
        <div class="gradient-line"></div>
        <div class="flex-box justify-content-between">
            <div>
                <p class="no-margin text-center green-item">{{ fa_number($trader->win_rate) }}% </p>
                <p class="no-margin text-center grey-text">
                    بازدید ({{ \Carbon\Carbon::create(auth()->guard('clients')->user()->last_login_at)->diffForHumans() }})
                </p>
            </div>
            <div>
                <div class="risk-item flex-box justify-content-center">
                    {{ fa_number($trader->risk) }}
                </div>
                <p class="no-margin text-center grey-text">
                    ریسک
                </p>
            </div>
        </div>

        <div class=" flex-box " style="position: relative;z-index: 999;">
            <div class="continue copytraderItemCard"
                 data-toggle="modal" data-target="#trad-modal"
                 data-id="{{ $trader->id }}"
                 data-username="{{ $trader->username }}"
                 data-name="{{ $trader->client->name }}"
                 data-fullname="{{ $trader->client->name }} {{ $trader->client->last_name }}"
                 data-risk="{{ fa_number($trader->risk) }}"
                 data-win_rate="{{ fa_number($trader->win_rate) }}"
                 data-is_follow="{{ $trader->is_follow }}"
                 data-is_copy="{{ $trader->is_copy }}"
                 data-pay_amount="{{ $trader->value_text }}"
                 data-recent_time="{{ \Carbon\Carbon::create(auth()->guard('clients')->user()->last_login_at)->diffForHumans() }}">
                کپی
            </div>
        </div>
        <div class="flex-box justify-content-between half-item">
            <p class="no-margin red-item">
                -1.98
            </p>
            <p class="no-margin white-text">
                                <span>
                                  کپی
                                </span>
                <span>
                                  1.123
                                </span>
            </p>
        </div>

        <a href="{{ route('copytrade_show' , $trader->id) }}"  class="glow" ></a>
    </div>
</div>
