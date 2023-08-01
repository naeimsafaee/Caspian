<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;

class DepositCach extends Model {
    use HasFactory;

    protected $fillable = [
        'card_id',
        'client_id',
        'amount',
        'transaction_id'
    ];

    protected $appends = ['persian_date'];

    public function getPersianDateAttribute() {
        return fa_number(Jalalian::fromDateTime($this->created_at)->format('%d %B %Y'));
    }

}
