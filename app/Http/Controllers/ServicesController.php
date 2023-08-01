<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller {

    public function __invoke(Request $request) {

        $services = Service::all();

        return view('pages.services' , compact('services'));
    }

}
