<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intermediate extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'front_image',
        'back_image',
        'address',
        'postal_code',
    ];
}
