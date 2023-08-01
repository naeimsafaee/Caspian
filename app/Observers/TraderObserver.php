<?php

namespace App\Observers;

use App\Models\Client;
use App\Models\Trader;

class TraderObserver
{
    /**
     * Handle the Trader "created" event.
     *
     * @param  \App\Models\Trader  $trader
     * @return void
     */
    public function created(Trader $trader)
    {
        //
    }

    /**
     * Handle the Trader "updated" event.
     *
     * @param  \App\Models\Trader  $trader
     * @return void
     */
    public function updated(Trader $trader)
    {
        if ($trader->wasChanged('status')) {
            if ($trader->status == 'accepted'){
                $client = Client::query()->findOrFail($trader->client_id);
                $client->is_trader = true;
                $client->save();
            }
        }
    }

    /**
     * Handle the Trader "deleted" event.
     *
     * @param  \App\Models\Trader  $trader
     * @return void
     */
    public function deleted(Trader $trader)
    {
        //
    }

    /**
     * Handle the Trader "restored" event.
     *
     * @param  \App\Models\Trader  $trader
     * @return void
     */
    public function restored(Trader $trader)
    {
        //
    }

    /**
     * Handle the Trader "force deleted" event.
     *
     * @param  \App\Models\Trader  $trader
     * @return void
     */
    public function forceDeleted(Trader $trader)
    {
        //
    }
}
