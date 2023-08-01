<?php

namespace App\Providers;

use App\Models\Advance;
use App\Models\Bid;
use App\Models\Client;
use App\Models\Coin;
use App\Models\Deposit;
use App\Models\Intermediate;
use App\Models\Offer;
use App\Models\Trader;
use App\Observers\AdvanceObserver;
use App\Observers\BidObserver;
use App\Observers\ClientObserver;
use App\Observers\CoinObserver;
use App\Observers\DepositObserver;
use App\Observers\IntermediateObserver;
use App\Observers\OfferObserver;
use App\Observers\TraderObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider {
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot() {
        Client::observe(ClientObserver::class);
        Deposit::observe(DepositObserver::class);
        Bid::observe(BidObserver::class);
        Offer::observe(OfferObserver::class);
        Intermediate::observe(IntermediateObserver::class);
        Advance::observe(AdvanceObserver::class);
        Trader::observe(TraderObserver::class);
        Coin::observe(CoinObserver::class);
    }
}
