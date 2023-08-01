<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller {

    public function info_show() {
        $client = auth()->guard('clients')->user();
        return view('profile.info' , compact('client'));
    }

}
