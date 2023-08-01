<?php

namespace App\Http\Requests;

use Iamfarhad\Validation\Rules\Mobile;
use Iamfarhad\Validation\Rules\NationalCode;
use Illuminate\Foundation\Http\FormRequest;

class LevelOneRequest extends FormRequest {

    public function rules() {
        return [
            'name' => ['required'],
            'last_name' => ['required'],
            'melli_code' => ['required', new NationalCode() , 'unique:clients,melli_code'],
            'phone' => ['required_without_all:email' , new Mobile() , 'unique:clients,phone'],
            'email' => ['required_without_all:phone', 'email' , 'unique:clients,email'],
        ];
    }

    public function messages() {
        return [
            'name.required' => 'لطفا نام خود را وارد کنید',
            'last_name.required' => 'لطفا نام خانوادگی خود را وارد کنید',
            'melli_code.required' => 'لطفا کدملی خود را وارد کنید',
            'phone.required_without_all' => 'لطفا شماره تماس خود را وارد کنید',
            'email.required_without_all' => 'لطفا ایمیل خود را وارد کنید',
            'email.email' => 'ایمیل قابل قبول نیست',
            'email.unique' => 'ایمیل توسط کاربری دیگر ثبت شده است',
            'phone.unique' => 'شماره تماس توسط کاربری دیگر ثبت شده است',
            'melli_code.unique' => 'کدملی توسط کاربری دیگر ثبت شده است',
        ];
    }
}
