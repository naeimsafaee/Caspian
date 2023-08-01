<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{

    public function rules()
    {
        return [
            "name" => ["required" ],
            "content" => ["required" ],
            "email" => ["required" ],

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'نام شما الزامی است',
            'content.required' => 'متن پیام الزامی است',
            'email.required' => 'ایمیل الزامی است',

        ];
    }
}
