<?php

namespace App\Http\Controllers;

use App\Http\Requests\LevelOneRequest;
use App\Http\Requests\LevelThree2Request;
use App\Http\Requests\LevelThreeRequest;
use App\Http\Requests\LevelTwoRequest;
use App\Http\Requests\VerifyCodeRequest;
use App\Http\Resources\LevelThreeResource;
use App\Mail\VerifyEmailStepOne;
use App\Models\Advance;
use App\Models\Client;
use App\Models\Intermediate;
use App\Sms\RegisterSms;
use App\Sms\Sms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class VerificationController extends Controller {

    public function __invoke(Request $request) {

        $client = auth()->guard('clients')->user();

        return view('profile.verification.main', compact('client'));
    }

    public function level_one_show(Request $request) {
        $client = auth()->guard('clients')->user();
        return view('profile.verification.levels.one', compact('client'));
    }

    public function level_one_submit(LevelOneRequest $request) {
        $client = auth()->guard('clients')->user();

        $client->update([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'melli_code' => $request->melli_code,
        ]);

        if ($request->email) {
            $client->email_code = $this->generateRandomString();
            $client->email = $request->email;
            $client->save();

//            Mail::to(["email" => $client->email])->send(new VerifyEmailStepOne($client->email_code));

            return redirect()->route('verification')->with('success', 'لینک تایید به ایمیل شما ارسال شد و پس از تایید سطح شما به روزرسانی میشود');
        }

        if ($request->phone) {
            $client->phone_code = rand(10000 , 999999);
            $client->phone = $request->phone;

            Sms::to([$client->phone])->send(new RegisterSms($client->phone_code));

            $client->save();

            return redirect()->route('show_sms_verify');
        }

        abort(500);
    }

    public function submit_email_one(Request $request) {

        $client = Client::query()->where('email_code', $request->code)->firstOrFail();

        $client->email_code = null;
        $client->is_email_verify = true;
        $client->level = 1;
        $client->save();

        return redirect()->route('verification')->with('success', 'سطح کاربری شما با موفقیت ارتقا یافت.');
    }

    public function show_sms_verify_level_one() {
        return view('profile.verification.levels.verify_sms_code');
    }

    public function submit_sms_verify_level_one(VerifyCodeRequest $request) {

        $code = $request->code;

        $client = Client::query()->where('phone_code', $code)->first();

        if ($client) {
            $client->phone_code = null;
            $client->is_phone_verify = true;
            $client->level = 1;
        } else
            throw ValidationException::withMessages(['code' => 'کد وارد شده اشتباه است.']);

        $client->save();

        return redirect()->route('verification')->with('success', 'سطح کاربری شما با موفقیت ارتقا یافت.');
    }

    public function level_two_show() {
        $client = auth()->guard('clients')->user();

        return view('profile.verification.levels.two', compact('client'));
    }

    public function level_two_submit(LevelTwoRequest $request) {
        $file = $request->front_image;
        $fileName = time() . '-' . rand() . '.' . $file->getClientOriginalExtension();
        Storage::put('intermediate/' . $fileName, file_get_contents($file));

        $back_file = $request->back_image;
        $back_filename = time() . '-' . rand() . '.' . $back_file->getClientOriginalExtension();
        Storage::put('intermediate/' . $back_filename, file_get_contents($back_file));

        Intermediate::query()->create([
            'client_id' => auth()->guard('clients')->user()->id,
            'front_image' => 'intermediate/' . $fileName,
            'back_image' => 'intermediate/' . $back_filename,
            'address' => $request->address,
            'postal_code' => $request->postal_code,
        ]);

        return redirect()->route('verification')->with('success', 'اطلاعات شما با موفقیت ذخیره شد و در انتظار تایید می باشد ');

    }

    public function level_three_show() {
        $client = auth()->guard('clients')->user();

        if (Advance::query()->where('client_id', $client->id)->count() > 0)
            return redirect()->route('level_three2');

        return view('profile.verification.levels.three', compact('client'));
    }

    public function level_three_submit(LevelThreeRequest $request) {
        Advance::query()->create([
            'client_id' => auth()->guard('clients')->user()->id,
            'commitment' => true,
        ]);
        return redirect()->route('level_three2');
    }

    public function level_three2_show() {
        $client = auth()->guard('clients')->user();
        return view('profile.verification.levels.three2', compact('client'));
    }

    public function level_three2_submit(LevelThree2Request $request) {
        $file = $request->video;
        $fileName = time() . '-' . rand() . '.' . $file->getClientOriginalExtension();
        Storage::put('advance/' . $fileName, file_get_contents($file));

        $client = auth()->guard('clients')->user();
        $advance = Advance::query()->where('client_id', $client->id)->firstOrFail();
        $advance->video = 'advance/' . $fileName;
        $advance->home_phone = $request->home_phone;
        $advance->save();

        return redirect()->route('verification')->with('success', 'اطلاعات شما با موفقیت ذخیره شد و در انتظار تایید می باشد ');
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
