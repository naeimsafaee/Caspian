<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;

class SwapHistory extends Model {
    use HasFactory;

    protected $fillable = [
        'client_id',
        'coin',
        'vs_coin',
        'coin_amount',
        'vs_coin_amount'
    ];

    protected $appends = ['persian_date'];

    public function getPersianDateAttribute() {
        return fa_number(Jalalian::fromDateTime($this->created_at)->format('%d %B %Y'));
    }

}
