<?php

namespace App\Observers;

use App\Models\Bid;
use App\Models\Client;
use Illuminate\Support\Facades\Http;

class BidObserver
{
    /**
     * Handle the Bid "created" event.
     *
     * @param  \App\Models\Bid  $bid
     * @return void
     */
    public function created(Bid $bid)
    {
        Http::post(config('app.node_url') . "/order" , [
            'coin_symbol' => $bid->pair->coin->symbol,
            'price' => $bid->price,
            'amount' => $bid->amount,
            'is_bid' => true
        ]);

        $client = Client::query()->find($bid->client_id);
        if($client){
            $client->wallet -= setting('static.trade_fee');
            $client->save();
        }

    }

    /**
     * Handle the Bid "updated" event.
     *
     * @param  \App\Models\Bid  $bid
     * @return void
     */
    public function updated(Bid $bid)
    {
        //
    }

    /**
     * Handle the Bid "deleted" event.
     *
     * @param  \App\Models\Bid  $bid
     * @return void
     */
    public function deleted(Bid $bid)
    {
        //
    }

    /**
     * Handle the Bid "restored" event.
     *
     * @param  \App\Models\Bid  $bid
     * @return void
     */
    public function restored(Bid $bid)
    {
        //
    }

    /**
     * Handle the Bid "force deleted" event.
     *
     * @param  \App\Models\Bid  $bid
     * @return void
     */
    public function forceDeleted(Bid $bid)
    {
        //
    }
}
