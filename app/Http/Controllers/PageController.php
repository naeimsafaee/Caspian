<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller {


    public function __invoke($slug) {
        $page = Page::query()->where('slug' , $slug)->firstOrFail();
        return view('pages.page' , compact('page'));
    }

}
