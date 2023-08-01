<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;

class Currency extends Model {
    use HasFactory;

    public function getPriceAttribute($price) {
        if (strtolower($this->symbol) == 'usdt' /*|| strtolower($this->symbol) == 'tmn'*/)
            return $price;
        $tether = Currency::query()->where('symbol', 'usdt')->firstOrFail();

        return ((float)$tether->price) / ((float)$price);
    }

    public function getIconAttribute($icon) {
        if ($icon)
            return Voyager::image($icon);
        elseif ($this->country)
            return asset('assets/flag/' . $this->country->symbol . '.svg');

        return "";
    }

    public function country() {
        return $this->belongsTo(Country::class);
    }

}
