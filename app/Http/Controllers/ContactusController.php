<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contactus;
use Illuminate\Http\Request;

class ContactusController extends Controller
{
    public function contactus_show(Request $request){
        return view('pages.contactus');
    }

    public function contactus_submit(ContactRequest $request)
    {
        Contactus::query()->create(array_merge($request->except(["_token"])));
        return redirect()->back()->with('success', 'پیام شما با موفقیت ارسال شد');
    }
}
