<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function faq_show(Request $request){
        $faqs = Faq::all();
        return view('pages.faq' , compact('faqs'));
    }

}
