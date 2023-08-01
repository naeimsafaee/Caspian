<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class SecurityController extends Controller {

    public function show_change_password(Request $request) {
        return view('profile.security.password');
    }

    public function submit_change_password(ChangePasswordRequest $request) {
        $client = auth()->guard('clients')->user();

        if (password_verify($request->current_password, $client->password)) {
            $client->password = Hash::make($request->password);
            $client->save();
            return redirect()->back()->with('success', 'رمز شما با موفقیت تغییر پیدا کرد');
        } else {
            throw ValidationException::withMessages(['current_password' => 'رمز فعلی اشتباه است']);
        }
    }

}
