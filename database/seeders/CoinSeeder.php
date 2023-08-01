<?php

namespace Database\Seeders;

use App\Models\Coin;
use Illuminate\Database\Seeder;

class CoinSeeder extends Seeder {

    public function run() {

        Coin::query()->create([
            'name' => 'Bitcoin',
            'persian_name' => 'بیت کوین',
            'symbol' => 'btc',
            'in_home' => true
        ]);

        Coin::query()->create([
            'name' => 'Ethereum',
            'persian_name' => 'اتریوم',
            'symbol' => 'eth',
            'in_home' => true
        ]);

        Coin::query()->create([
            'name' => 'Cardano',
            'persian_name' => 'کاردانو',
            'symbol' => 'ada',
            'in_home' => true
        ]);

        Coin::query()->create([
            'name' => 'Binance coin',
            'persian_name' => 'بایننس کوین',
            'symbol' => 'bnb',
            'in_home' => true
        ]);

    }
}
