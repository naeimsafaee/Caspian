@php
    use \Illuminate\Support\Facades\DB;
    use \App\Models\ClientNotification;

    $notifications = ClientNotification::query()->where(['client_id' => auth()->guard('clients')->user()->id , 'is_read' => false])
    ->select(DB::raw('*, DATE(created_at) as date'))
    ->orderByDesc('created_at')->get()->groupBy('date');

@endphp


<div class="position-absolute profile-pop-up" style="z-index: 999;">

    @foreach($notifications as $date => $notification)


        <div class="flex-box justify-content-start">
            <p class="popup-day no-margin grey-text">
                {{ \Carbon\Carbon::create($date)->diffForHumans() }}
            </p>
            <div class="gradient-line"></div>
        </div>

        @foreach($notification as $notif)

            <a class="margin flex-box justify-content-between align-items-start">
                <div class="flex-box justify-content-start align-items-start">
                    <img src="{{asset('assets/icon/p-circle-item.svg')}}">
                    <div class="content">
                        <p class="no-margi white-text">
                            {{ $notif->title }}
                        </p>
                        <p class="no-margin grey-text littel-text">
                            {{ $notif->description }}
                        </p>
                    </div>

                </div>
                <div class="time grey-text">{{ \Carbon\Carbon::create($notif->created_at)->diffForHumans() }}</div>

            </a>

        @endforeach

    @endforeach

</div>
