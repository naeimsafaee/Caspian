<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VerifyCodeRequest extends FormRequest
{

    public function rules()
    {
        return [
            'code' => ['required' , 'string']
        ];
    }
}
