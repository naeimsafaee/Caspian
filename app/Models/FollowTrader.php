<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FollowTrader extends Model {
    use HasFactory;

    protected $fillable = [
        'client_id',
        'trader_id'
    ];

}
