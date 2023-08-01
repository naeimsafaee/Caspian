<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class ChangePasswordAfterForgetPasswordRequest extends FormRequest {

    public function rules() {

        return [
            'reset_link' => ['required'],
            'password' => ['required', 'min:8'],
        ];
    }

    public function messages() {
        return [
            'password.required' => "لطفا رمز خود را وارد کنید",
            'password.min' => "رمز عبور حداقل باید هشت حرف باشد ",
            'password_confirmation.*' => "تکرار رمز عبور و رمز عبور با یک دیگر مطابقت ندارد",
        ];
    }

}
