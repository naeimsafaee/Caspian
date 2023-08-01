<?php

namespace App\Observers;

use App\Models\Advance;
use App\Models\Client;

class AdvanceObserver
{
    /**
     * Handle the Advance "created" event.
     *
     * @param  \App\Models\Advance  $advance
     * @return void
     */
    public function created(Advance $advance)
    {
        //
    }

    /**
     * Handle the Advance "updated" event.
     *
     * @param  \App\Models\Advance  $advance
     * @return void
     */
    public function updated(Advance $advance)
    {
        if ($advance->wasChanged('status')) {
            if ($advance->status == 1){
                $client = Client::query()->findOrFail($advance->client_id);
                $client->level = 3;
                $client->save();
            }
        }
    }

    /**
     * Handle the Advance "deleted" event.
     *
     * @param  \App\Models\Advance  $advance
     * @return void
     */
    public function deleted(Advance $advance)
    {
        //
    }

    /**
     * Handle the Advance "restored" event.
     *
     * @param  \App\Models\Advance  $advance
     * @return void
     */
    public function restored(Advance $advance)
    {
        //
    }

    /**
     * Handle the Advance "force deleted" event.
     *
     * @param  \App\Models\Advance  $advance
     * @return void
     */
    public function forceDeleted(Advance $advance)
    {
        //
    }
}
