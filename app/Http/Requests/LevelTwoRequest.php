<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LevelTwoRequest extends FormRequest
{
    public function rules()
    {

        return [
            'front_image' => ['required', 'image' , 'mimes:png,jpg,jpeg'],
            'back_image' => ['required', 'image' , 'mimes:png,jpg,jpeg'] ,
            'address' => ['required'],
            'postal_code' => ['required'],
        ];
    }

    public function messages()
    {

        return [
            'front_image.required' => 'عکس روی کارت ملی را آپلود کنید',
            'front_image.mimes' => 'فورمت فایل قابل قبول نمیباشد',
            'front_image.image' => 'عکس روی کارت ملی را آپلود کنید',
            'back_image.required' => 'عکس پشت کارت ملی را آپلود کنید',
            'back_image.mimes' => 'فورمت فایل قابل قبول نمیباشد',
            'back_image.image' => 'عکس پشت کارت ملی را آپلود کنید',
            'address.required' => 'لطفا آدرس را وارد کنید',
            'postal_code.required' => 'لطفا کدپستی را وارد کنید',
            'postal_code.min' => 'کدپستی قابل قبول نیست',

        ];
    }
}
