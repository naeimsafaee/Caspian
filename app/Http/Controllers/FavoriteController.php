<?php

namespace App\Http\Controllers;

use App\Models\FavoriteCoin;
use Illuminate\Http\Request;

class FavoriteController extends Controller {

    public function add($coin_id) {
        FavoriteCoin::query()->updateOrCreate(['coin_id' => $coin_id , 'client_id' => auth()->guard('clients')->user()->id]);
        return redirect()->back();
    }

    public function remove($coin_id) {
        FavoriteCoin::query()->where(['coin_id' => $coin_id , 'client_id' => auth()->guard('clients')->user()->id])->delete();
        return redirect()->back();
    }


}
