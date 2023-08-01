<?php

namespace App\Http\Controllers;

use App\Http\Requests\CodeRequest;
use App\Mail\VerifyEmailTwoStep;
use App\Sms\RegisterSms;
use App\Sms\Sms;
use App\Sms\VerifyTwoStepSms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class TwoFactorAuthenticationController extends Controller {

    public function __invoke(Request $request) {
        $client = auth()->guard('clients')->user();

        return view('profile.security.2fa.main', compact('client' ));
    }

    public function email_show() {
        $client = auth()->guard('clients')->user();

        return view('profile.security.2fa.email', compact('client'));
    }

    public function email_submit() {
        $client = auth()->guard('clients')->user();
        $client->email_code = rand(10000, 99999);
        $client->save();

        Mail::to(["email" => $client->email])->send(new VerifyEmailTwoStep($client->email_code));

        return redirect()->route('show_email_code');
    }

    public function show_email_code() {
        return view('profile.security.2fa.email_verify');
    }

    public function submit_email_code(CodeRequest $request) {
        $client = auth()->guard('clients')->user();

        if ($client->email_code == $request->code) {
            $client->is_2fa_email = true;
            $client->email_code = null;
            $client->save();
        } else
            throw ValidationException::withMessages(['code' => 'کد وارد شده اشتباه است.']);

        return redirect()->route('security')->with('success', 'تایید دو مرحله ای با ایمیل برای شما فعال شد');
    }


    public function sms_show() {
        $client = auth()->guard('clients')->user();

        return view('profile.security.2fa.sms', compact('client'));
    }

    public function sms_submit() {
        $client = auth()->guard('clients')->user();
        $client->phone_code = rand(10000, 99999);
        $client->save();

        Sms::to([$client->phone])->send(new VerifyTwoStepSms($client->phone_code));

        return redirect()->route('show_sms_code');
    }

    public function show_sms_code() {
        return view('profile.security.2fa.sms_verify');
    }

    public function submit_sms_code(CodeRequest $request) {
        $client = auth()->guard('clients')->user();

        if ($client->phone_code == $request->code) {
            $client->is_2fa_phone = true;
            $client->phone_code = null;
            $client->save();
        } else
            throw ValidationException::withMessages(['code' => 'کد وارد شده اشتباه است.']);

        return redirect()->route('security')->with('success', 'تایید دو مرحله ای با پیامک برای شما فعال شد');
    }




}
