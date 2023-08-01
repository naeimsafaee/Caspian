<?php

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Crypt;
use Intervention\Image\Facades\Image;
use Twilio\Rest\Client;

if (!function_exists("text")) {
    function text($key) {
        $text = \App\Models\Text::query()->where('title', $key)->first();
        if (!$text)
            return $key;
        return $text->getTranslatedAttribute('desc');
    }
}

function fa_number($number, $flip = false , $is_alpha = false){
    if(empty($number)){
        return '۰';
    }

    $en = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];
    $fa = ["۰", "۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹"];
    $alpha = ["صفر", "یک", "دو", "سه", "چهار", "پنج", "شش", "هفت", "هشت", "نه"];

    if($flip){
        return str_replace($fa, $en, $number);
    } elseif($is_alpha){
        return str_replace($en, $alpha, $number);
    } else {
        return str_replace($en, $fa, $number);
    }
}


if(!function_exists("generateRandomString")){

    function generateRandomString($length = 10){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for($i = 0; $i < $length; $i++){
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

