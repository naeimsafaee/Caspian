<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountCard extends Model {
    use HasFactory;

    protected $fillable = [
        'owner_name',
        'account_number',
        'client_id',
    ];

}
