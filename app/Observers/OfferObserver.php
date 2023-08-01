<?php

namespace App\Observers;

use App\Models\Client;
use App\Models\Offer;
use Illuminate\Support\Facades\Http;

class OfferObserver
{
    /**
     * Handle the Offer "created" event.
     *
     * @param  \App\Models\Offer  $offer
     * @return void
     */
    public function created(Offer $offer)
    {
        Http::post(config('app.node_url') . "/order" , [
            'coin_symbol' => $offer->pair->coin->symbol,
            'price' => $offer->price,
            'amount' => $offer->amount,
            'is_bid' => false
        ]);


        $client = Client::query()->find($offer->client_id);
        if($client){
            $client->wallet -= setting('static.trade_fee');
            $client->save();
        }

    }

    /**
     * Handle the Offer "updated" event.
     *
     * @param  \App\Models\Offer  $offer
     * @return void
     */
    public function updated(Offer $offer)
    {
        //
    }

    /**
     * Handle the Offer "deleted" event.
     *
     * @param  \App\Models\Offer  $offer
     * @return void
     */
    public function deleted(Offer $offer)
    {
        //
    }

    /**
     * Handle the Offer "restored" event.
     *
     * @param  \App\Models\Offer  $offer
     * @return void
     */
    public function restored(Offer $offer)
    {
        //
    }

    /**
     * Handle the Offer "force deleted" event.
     *
     * @param  \App\Models\Offer  $offer
     * @return void
     */
    public function forceDeleted(Offer $offer)
    {
        //
    }
}
