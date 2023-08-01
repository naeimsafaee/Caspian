<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;

class Blog extends Model {
    use HasFactory;

    public function getSlugAttribute() {
        return str_replace(' ', '_', $this->title);
    }

    public function getTimeAttribute() {
        return fa_number($date = Jalalian::forge($this->created_at)->ago());
    }

    public function getSummeryAttribute() {
        $str = substr(strip_tags($this->content), 0, 200);
        return str_replace('&zwnj;', " ", (substr($str, 0, strrpos($str, " "))) . ' ...');
    }

    public function getPersianDateAttribute() {
        return fa_number(Jalalian::fromDateTime($this->created_at)->format('%d %B %Y'));
    }

    public function categories() {
        return $this->belongsToMany(
            BlogCategory::class,
            BlogToCategory::class,
            'blog_id',
            'category_id'
        );
    }
}
