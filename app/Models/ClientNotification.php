<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientNotification extends Model {
    use HasFactory;

    protected $fillable = [
        'type',
        'client_id',
        'description',
        'title'
    ];
}
