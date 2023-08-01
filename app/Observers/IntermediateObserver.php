<?php

namespace App\Observers;

use App\Models\Client;
use App\Models\ClientNotification;
use App\Models\Intermediate;

class IntermediateObserver
{
    /**
     * Handle the Intermediate "created" event.
     *
     * @param  \App\Models\Intermediate  $intermediate
     * @return void
     */
    public function created(Intermediate $intermediate)
    {
        //
    }

    /**
     * Handle the Intermediate "updated" event.
     *
     * @param  \App\Models\Intermediate  $intermediate
     * @return void
     */
    public function updated(Intermediate $intermediate)
    {
        if ($intermediate->wasChanged('status')) {
            if ($intermediate->status == 1){
                $client = Client::query()->findOrFail($intermediate->client_id);
                $client->level = 2;
                $client->save();
            }
        }

    }

    /**
     * Handle the Intermediate "deleted" event.
     *
     * @param  \App\Models\Intermediate  $intermediate
     * @return void
     */
    public function deleted(Intermediate $intermediate)
    {
        //
    }

    /**
     * Handle the Intermediate "restored" event.
     *
     * @param  \App\Models\Intermediate  $intermediate
     * @return void
     */
    public function restored(Intermediate $intermediate)
    {
        //
    }

    /**
     * Handle the Intermediate "force deleted" event.
     *
     * @param  \App\Models\Intermediate  $intermediate
     * @return void
     */
    public function forceDeleted(Intermediate $intermediate)
    {
        //
    }
}
