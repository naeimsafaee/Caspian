<?php

namespace App\Observers;

use App\Models\ClientCoin;
use App\Models\Coin;

class CoinObserver {
    /**
     * Handle the Coin "created" event.
     *
     * @param \App\Models\Coin $coin
     * @return void
     */
    public function created(Coin $coin) {
        //
    }

    /**
     * Handle the Coin "updated" event.
     *
     * @param \App\Models\Coin $coin
     * @return void
     */
    public function updated(Coin $coin) {
        //
    }

    /**
     * Handle the Coin "deleted" event.
     *
     * @param \App\Models\Coin $coin
     * @return void
     */
    public function deleted(Coin $coin) {

        ClientCoin::query()->where('coin_id' , $coin->id)->update([
            'status' => 'removed'
        ]);

    }

    /**
     * Handle the Coin "restored" event.
     *
     * @param \App\Models\Coin $coin
     * @return void
     */
    public function restored(Coin $coin) {
        //
    }

    /**
     * Handle the Coin "force deleted" event.
     *
     * @param \App\Models\Coin $coin
     * @return void
     */
    public function forceDeleted(Coin $coin) {
        //
    }
}
