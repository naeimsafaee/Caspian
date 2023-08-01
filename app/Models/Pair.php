<?php

namespace App\Models;

use App\Exchange\Exchange;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pair extends Model {
    use HasFactory;

//    protected $appends = ['high', 'low'];

    public function coin() {
        return $this->belongsTo(Coin::class, 'coin_id', 'id');
    }

    public function vs_coin() {
        return $this->belongsTo(Coin::class, 'vs_coin_id', 'id');
    }

    public function changes() {
        return $this->hasMany(Change::class);
    }

    public function high() {
        return Exchange::high($this->id);
        return Change::query()->where('pair_id', $this->id)
            ->whereDate('created_at', Carbon::today())->orderByDesc('price')->first()?->price;
    }

    public function low() {
        return Exchange::low($this->id);
        return Change::query()->where('pair_id', $this->id)
            ->whereDate('created_at', Carbon::today())->orderBy('price')->first()?->price;
    }

}
