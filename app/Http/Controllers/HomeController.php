<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Change;
use App\Models\ClientCoin;
use App\Models\ClientNotification;
use App\Models\Coin;
use App\Models\Pair;
use App\Models\PairBaseOnCurrency;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Agent;

class HomeController extends Controller {

    public function __invoke(Request $request) {

        Change::query()->where('created_at' , '<=' , Carbon::today()->subDay())->delete();

        $pairs = Pair::query()->where('is_home', true)
            ->with(['coin', 'vs_coin'])
            ->get()->groupBy('vs_coin_id');

        $currency_pairs = PairBaseOnCurrency::query()->where('is_home', true)
            ->with(['coin', 'vs_coin'])->get()->groupBy('vs_currency_id');

        $blogs = Blog::query()->orderByDesc('created_at')->take(3)->get();

        return view('pages.home', compact('pairs', 'currency_pairs', 'blogs'));
    }

    public function chart_data() {

        $minute = 38;

        $pairs = Pair::query()->where('is_home', true)
            ->with(['coin', 'vs_coin'])
            ->with(['changes' => function($query) use ($minute) {
                $query->whereDate('created_at', '>=', \Carbon\Carbon::today()->subDay())
                    ->whereDate('created_at', '<=', \Carbon\Carbon::now())
                    ->where('created_at', 'LIKE', "%:$minute:0%")
                    ->orderByDesc('created_at')
                    ->select(DB::raw("CONCAT(hour(created_at) , ':' , $minute , '-' , pair_id) as hmp"), 'price', 'pair_id', 'id')
                    ->groupBy('hmp');
            }])->get()/*->groupBy('vs_coin_id')*/;

        return response()->json(["data" => $pairs]);
    }

    public function desk_please() {
        $agent = new Agent();

        if ($agent->isDesktop())
            return redirect()->intended();

        return view('errors.desk_please');
    }

    public function read_notification() {

        $client = auth()->guard('clients')->user();

        ClientNotification::query()->where('client_id', $client->id)
            ->update([
                'is_read' => true
            ]);

        return response()->json("ok");
    }

    public function update_coin_amount(Request $request) {

        $client = auth()->guard('clients')->user();

        $client_coin = ClientCoin::query()->where([
            'client_id' => $client->id,
            'coin_id' => $request->coin_id
        ])->first();

        return response()->json($client_coin);
    }

}
