<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;

class Withdraw extends Model {
    use HasFactory;

    protected $fillable = [
        'amount',
        'address',
        "coin_id",
        "network_id",
        'client_id'
    ];

    protected $appends = ['persian_date'];

    public function coin() {
        return $this->belongsTo(Coin::class);
    }

    public function network() {
        return $this->belongsTo(Network::class);
    }

    public function getPersianDateAttribute() {
        return fa_number(Jalalian::fromDateTime($this->created_at)->format('%d %B %Y'));
    }

}
