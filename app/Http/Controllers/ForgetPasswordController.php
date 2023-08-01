<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordAfterForgetPasswordRequest;
use App\Http\Requests\ForgetPasswordRequest;
use App\Http\Requests\ForgetPasswordWithPhoneRequest;
use App\Mail\ForgetPassword;
use App\Models\Client;
use App\Sms\ForgetPasswordSms;
use App\Sms\Sms;
use App\Sms\VerifyTwoStepSms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ForgetPasswordController extends Controller {

    public function step_2() {
        return view('auth.forget_password_verify');
    }

    public function step_3($reset_link) {

        $client = Client::query()->where('reset_link', $reset_link)->first();

        if (!$client)
            abort(450);

        return view('auth.change_password', compact('reset_link'));
    }

    public function submit_email(ForgetPasswordRequest $request) {

        $client = Client::query()->where('email', $request->email)->firstOrFail();

        $reset_link = $this->generateRandomString();
        $client->reset_link = $reset_link;
        $client->save();

        Mail::to(["email" => $client->email])->send(new ForgetPassword($reset_link));

        return redirect()->route('forget2')->with('email', $request->email);
    }

    public function submit_phone(ForgetPasswordWithPhoneRequest $request) {
        return;
        $client = Client::query()->where('phone', $request->phone)->firstOrFail();

        $reset_link = rand(10000, 99999);
        $client->reset_link = $reset_link;
        $client->save();

        Sms::to([$client->phone])->send(new ForgetPasswordSms($reset_link));

//        $client->notify(new SendSMS($client->phone, $message, true));

        return redirect()->route('forget2_phone')->with('phone', $request->phone);
    }

    public function step_2_phone() {
        return view('auth.forget_password_verify_phone');
    }

    public function step_3_phone(Request $request) {

        $reset_link = $request->reset_link;

        $client = Client::query()->where('reset_link', $reset_link)->first();

        if (!$client)
            abort(450);

        return view('auth.change_password', compact('reset_link'));
    }

    public function change_submit(ChangePasswordAfterForgetPasswordRequest $request) {

        $client = Client::query()->where('reset_link', $request->reset_link)->first();
        if (!$client)
            abort(450);

        $client->password = Hash::make($request->password);
        $client->reset_link = null;
        $client->save();

        return redirect()->route('login');
    }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}
