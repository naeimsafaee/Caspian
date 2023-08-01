<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model {
    use HasFactory;

    protected $fillable = [
        'owner_name',
        'card_number',
        'bank_id',
        'client_id',
        'expiry_date',
        'cvv2'
    ];

    public function bank() {
        return $this->belongsTo(Bank::class);
    }

}
