<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CodeRequest extends FormRequest
{
    public function rules(){

        return [
            'code' => ['required'],

        ];
    }

    public function messages(){

        return [
            'code.required' => 'لطفا کد را وارد کنید',

        ];
    }
}
