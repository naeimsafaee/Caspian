<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LevelThreeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'commitment' => ['required'],
        ];
    }

    public function messages()
    {

        return [
            'commitment.required' => 'لطفا تایید کنید که تعهدنامه مطالعه شده است',
        ];
    }
}
