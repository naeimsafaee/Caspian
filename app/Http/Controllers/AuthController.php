<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginEmailRequest;
use App\Http\Requests\LoginPhoneRequest;
use App\Http\Requests\RegisterEmailRequest;
use App\Http\Requests\RegisterPhoneRequest;
use App\Http\Requests\TwoStepRequest;
use App\Http\Requests\VerifyCodeRequest;
use App\Mail\LoginTwoStep;
use App\Mail\VerifyEmailAfterRegister;
use App\Models\Client;
use App\Sms\LoginTwoStepSms;
use App\Sms\RegisterSms;
use App\Sms\Sms;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller {

    public function login_show(Request $request) {
        return view('auth.login');
    }

    public function login_email(LoginEmailRequest $request) {
        $client = Client::query()->where('email', $request->email)->firstOrFail();

        if (password_verify($request->password, $client->password)) {

            Session::put('client_id', $client->id);

            if ($client->security_number > 0)
                return redirect()->route('send_two_step');

            $client->last_login_at = Carbon::now();
            $client->save();

            auth()->guard('clients')->login($client, true);
            return redirect()->intended();
        }
        throw ValidationException::withMessages(['password' => 'اطلاعات وارد شده اشتباه است']);
    }

    public function login_phone(LoginPhoneRequest $request) {
        $client = Client::query()->where('phone', $request->phone)->firstOrFail();

        if (password_verify($request->password, $client->password)) {

            Session::put('client_id', $client->id);

            if ($client->security_number > 0)
                return redirect()->route('send_two_step');

            $client->last_login_at = Carbon::now();
            $client->save();

            auth()->guard('clients')->login($client, true);
            return redirect()->intended();
        }
        throw ValidationException::withMessages(['password' => 'اطلاعات وارد شده اشتباه است']);
    }

    public function send_two_step() {
        $client = Client::query()->findOrFail(Session::get('client_id'));

        if ($client->is_2fa_email) {
            $client->email_code = rand(10000, 99999);
            $client->save();

            Mail::to(["email" => $client->email])->send(new LoginTwoStep($client->email_code));
        }

        if ($client->is_2fa_phone) {
            $client->phone_code = rand(10000, 99999);
            $client->save();

            Sms::to([$client->phone])->send(new LoginTwoStepSms($client->phone_code));
        }

        return redirect()->route('show_enter_two_step');
    }

    public function show_enter_two_step() {

        $client = Client::query()->findOrFail(Session::get('client_id'));

        return view('auth.enter_two_steps', compact('client'));
    }

    public function submit_two_step(TwoStepRequest $request) {
        $client = Client::query()->findOrFail(Session::get('client_id'));

        if ($client->is_2fa_email)
            if ($client->email_code !== $request->email_code)
                throw ValidationException::withMessages(['email_code' => 'کد تایید ایمیل اشتباه است.']);

        if ($client->is_2fa_phone)
            if ($client->phone_code !== $request->sms_code)
                throw ValidationException::withMessages(['sms_code' => 'کد تایید پیامک اشتباه است.']);

        if ($client->is_2fa_authenticator) {

        }

        $client->last_login_at = Carbon::now();
        $client->save();

        auth()->guard('clients')->login($client, true);
        return redirect()->intended();
    }

    public function register_show(Request $request) {
        return view('auth.register');
    }

    public function register_email(RegisterEmailRequest $request) {
        $client = Client::query()->create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $client->email_code = $this->generateRandomString();
        $client->save();

        Session::put('client_id', $client->id);

        Mail::to(["email" => $client->email])->send(new VerifyEmailAfterRegister($client->email_code));

        return redirect()->route('register_verify');
    }

    public function register_phone(RegisterPhoneRequest $request) {
        $client = Client::query()->create([
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'phone_code' => rand(10000, 999999)
        ]);

        Session::put('client_id', $client->id);

        Sms::to([$client->phone])->send(new RegisterSms($client->phone_code));

        return redirect()->route('register_verify');
    }

    public function forge_password_show(Request $request) {
        return view('auth.forget_password');
    }

    public function forget_password_verify_show(Request $request) {
        return view('auth.forget_password_verify');
    }

    public function register_verify_show(Request $request) {

        $client_id = Session::get('client_id');
        $client = Client::query()->findOrFail($client_id);

        $is_phone = $client->phone != null;

        return view('auth.show_register_verify', compact('is_phone', 'client'));
    }

    public function register_verify_submit(VerifyCodeRequest $request) {

        $code = $request->code;

        $client = Client::query()->where('phone_code', $code)->first();

        if ($client) {
            $client->phone_code = null;
            $client->is_phone_verify = true;
        } else {
            $client = Client::query()->where('email_code', $code)->first();

            if (!$client)
                throw ValidationException::withMessages(['code' => 'کد وارد شده اشتباه است.']);

            $client->email_code = null;
            $client->is_email_verify = true;
        }

        $client->last_login_at = Carbon::now();
        $client->save();

        auth()->guard('clients')->login($client, true);

        return redirect()->route('verification')->with('warning', 'سطح کاربری شما صفر می باشد لطفا ابتدا اطلاعات خود را تکمیل کنید.');
    }

    public function enter_to_login(Request $request) {

        if ($request->has('email')) {

            $client = Client::query()->where('email', $request->email)->first();
            if ($client) {
                //go to login

                return redirect()->route('login')->with('email', $request->email)->withInput();
            } else {
                //go to register
                return redirect()->route('register')->with('email', $request->email)->withInput();
            }
        } else {
            //go to register
            return redirect()->route('register')->with('email', $request->email)->withInput();
        }

    }

    public function logout(Request $request) {
        auth()->guard('clients')->logout();
        $request->session()->regenerate();
        $request->session()->flush();

        return redirect()->route('home');
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
