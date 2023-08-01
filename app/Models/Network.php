<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Network extends Model {
    use HasFactory;

    public function coins() {
        return $this->belongsToMany(Coin::class, CoinNetwork::class);
    }

    public function address() {

        $address = Address::query()->where([
            'client_id' => auth()->guard('clients')->user()->id,
            'network_id' => $this->id,
        ])->first();

        if (!$address) {
            try {

                $new_address = Http::post(config('app.node_url') . "/address", [
                    'path' => $this->path,
                    'index' => auth()->guard('clients')->user()->id
                ])->body();

                return Address::query()->create([
                    'client_id' => auth()->guard('clients')->user()->id,
                    'network_id' => $this->id,
                    'address' => $new_address
                ])->address;

            } catch(\Exception $ex) {
                die(json_encode($ex->getMessage()));
            }
        }

        return $address->address;
    }

    public function coin_fee($coin_id) {

        $coin_network = CoinNetwork::query()->where([
            'coin_id' => $coin_id,
            'network_id' => $this->id
        ])->first();

        $network_fee = $this->default_network_fee;

        if ($coin_network && $coin_network->network_fee != null)
            return (float)$coin_network->network_fee;
        return (float)$network_fee;
    }

}
