<?php

namespace App\Exchange;

use App\Models\Change;
use App\Models\Pair;
use Carbon\Carbon;
use \Illuminate\Database\Eloquent\Collection;

class Exchange {

    private static ?Collection $changes = null;

    public function __construct() {

    }

    public static function low($pair_id) {
        static::prepare();

        $result = static::$changes->filter(function($change) use ($pair_id) {
            return $change->pair_id == $pair_id;
        });

        if ($result->count() > 0)
            return $result->first()->min_price;

    }

    public static function high($pair_id) {
        static::prepare();

        $result = static::$changes->filter(function($change) use ($pair_id) {
            return $change->pair_id == $pair_id;
        });

        if ($result->count() > 0)
            return $result->first()->max_price;

    }

    private static function prepare() {
        if (!static::$changes) {
            static::$changes = Collection::empty();

            $pairs_id = Pair::query()->pluck('id')->toArray();

            foreach($pairs_id as $pair_id) {
                $change = Change::query()
                    ->where('pair_id', $pair_id)
                    /* ->whereDate('created_at', Carbon::today())*/
                    ->selectRaw("MIN(price) as min_price,MAX(price) as max_price, id,pair_id")
//                ->groupBy('pair_id')
                    ->get();
                    if($change->count() > 0){
                        $change = $change->first();
                        static::$changes->add($change);
                    }
            }
        }
    }

}