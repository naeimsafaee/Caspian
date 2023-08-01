<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LevelThree2Request extends FormRequest {
    public function rules() {
        return [
            'video' => ['required', 'mimes:mkv,mp4'],
            'home_phone' => ['required'],
        ];
    }

    public function messages() {

        return [
            'video.required' => 'آپلود ویدئو اجباری است',
            'video.mimes' => 'فورمت ویدئو غیرقابل قبول است',
            'home_phone.required' => 'لطفا شماره تلفن ثابت را وارد کنید ',
        ];
    }
}
