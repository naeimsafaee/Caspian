<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest {

    public function rules() {
        return [
            'current_password' => ['required'],
            'password' => ['required', 'min:8'],
            'confirm_password' => ['required', 'same:password'],
        ];
    }

    public function messages() {
        return [
            'current_password.required' => 'پسورد قدیمی خود را وارد کنید',
            'password.required' => 'پسورد جدید خود را وارد کنید',
            'confirm_password.required' => 'تکرار پسورد جدید خود را وارد کنید',
            'password.min' => 'رمزعبور باید حداقل 8 حرف باشد',
            'confirm_password.same' => 'تکرار پسورد با پسورد مطاقبت ندارد',

        ];
    }
}
