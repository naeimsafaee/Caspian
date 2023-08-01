<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    public function getSlugAttribute()
    {
        return str_replace(' ', '_', $this->title);

    }
}
