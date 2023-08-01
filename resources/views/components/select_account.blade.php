<li class="sleect_card" data-id="{{ $account->id }}">
    <a>
        <div class="flex-box justify-content-between bank-card">
            <div class="">
                <p class="white-text">
                    {{ $account->owner_name }}
                </p>
                {{--<p class="grey-text">
                    {{ $card->bank->name }}
                </p>--}}
                <p class="white-text ltr-direct no-margin">
                    {{ substr($account->account_number , 0 , 6) }} **** {{ substr($account->account_number , 16) }}
                </p>
            </div>
            @if($account->status === 'requested')
                <div class="flex-column flex-box">
                    <img src="{{asset('assets/icon/wait.svg')}}">
                    <p class="yellow-item no-margin">
                        در انتظار
                    </p>
                </div>
            @elseif($account->status === 'accepted')
                <div class="flex-column flex-box">
                    <img src="{{asset('assets/icon/submit.svg')}}">
                    <p class="light-green-item no-margin">
                        تایید شده
                    </p>
                </div>
            @else
                <div class="flex-column flex-box">
                    <img src="{{asset('assets/icon/reject.svg')}}">
                    <p class="dark-red-item no-margin">
                        رد شده
                    </p>
                </div>
            @endif

        </div>
    </a>
</li>