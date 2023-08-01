<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;

class Offer extends Model {
    use HasFactory;

    protected $fillable = [
        'client_id', 'pair_id', 'amount', 'price', 'fill', 'status', 'profit_price', 'loss_price'
    ];

    protected $appends = ['persian_date', 'total_amount', 'is_bid'];

    public function pair() {
        return $this->belongsTo(Pair::class);
    }

    public function exit() {
        return $this->belongsTo(Bid::class, 'id', 'exit_id');
    }

    public function getPersianDateAttribute() {
        return fa_number(Jalalian::fromDateTime($this->created_at)->format('%d %B %Y'));
    }

    public function getTotalAmountAttribute() {
        return (float) $this->amount * (float)$this->price;
    }

    public function getIsBidAttribute() {
        return false;
    }

}
