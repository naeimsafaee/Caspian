<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoinWithdrawSubmit;
use App\Http\Requests\DepositCashRequest;
use App\Http\Requests\WithdrawCacheRequest;
use App\Models\AccountCard;
use App\Models\Address;
use App\Models\Card;
use App\Models\ClientCoin;
use App\Models\Coin;
use App\Models\CoinNetwork;
use App\Models\Currency;
use App\Models\DepositCach;
use App\Models\Network;
use App\Models\SwapHistory;
use App\Models\Withdraw;
use App\Models\WithdrawCache;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;

class WalletController extends Controller {

    public function __invoke(Request $request) {

        $client = auth()->guard('clients')->user();

        $all_coin = Coin::all();
        $tether = Coin::query()->where('symbol', 'usdt')->first();

        $tether_currency = Currency::query()->where('symbol', 'usdt')->first();

        $tether_price = $tether_currency->price;

        $tether_amount = 0;

        foreach($all_coin as $coin) {
            $c_coin = ClientCoin::query()->where([
                'client_id' => $client->id,
                'coin_id' => $coin->id,
            ])->firstOrCreate([
                'client_id' => $client->id,
                'coin_id' => $coin->id,
            ]);
            if ($coin->id === $tether->id)
                $tether_amount = $c_coin->amount;
        }

        foreach($all_coin as $coin) {
            $c_coin = ClientCoin::query()->where([
                'client_id' => $client->id,
                'coin_id' => $coin->id,
            ])->firstOrCreate([
                'client_id' => $client->id,
                'coin_id' => $coin->id,
            ]);
            if ($coin->id === $tether->id)
                $tether_amount = $c_coin->amount;
        }

        $client_coins = $client->coins;

        $client_coins = $client_coins->sortByDesc('value')->values();

        return view('dashboard.wallet.main', compact('client_coins', 'tether_amount', 'tether_price'));
    }

    public function transactions_show() {

        $withdraws = Withdraw::query()->where('client_id', auth()->guard('clients')->user()->id)->get();

        $transactions = $withdraws->sortByDesc('created_at');

        $swaps = SwapHistory::query()->where('client_id', auth()->guard('clients')->user()->id)->orderByDesc('created_at')->get();

        $deposit_cache = DepositCach::query()->where('client_id', auth()->guard('clients')->user()->id)->orderByDesc('created_at')->get();
        $withdraw_cache = WithdrawCache::query()->where('client_id', auth()->guard('clients')->user()->id)->orderByDesc('created_at')->get();

        return view('dashboard.wallet.transactions', compact('transactions', 'swaps', 'deposit_cache', 'withdraw_cache'));
    }

    public function transactions_with_data($type, $id) {
        return redirect()->route('wallet_transactions')->with($type, $id);
    }

    public function coin_deposit_show($coin) {

        $coin = Coin::query()->where('name', $coin)->firstOrFail();

        $client = auth()->guard('clients')->user();

        $networks = Network::query()->whereHas('coins', function(Builder $query) use ($coin) {
            $query->where('coin_id', $coin->id);
        })->get();

        $withdraws = Withdraw::query()->where([
            'coin_id' => $coin->id,
            'client_id' => $client->id
        ])->get();

        return view('dashboard.wallet.coin.deposit',
            compact('coin', 'client', 'networks', 'withdraws'));
    }

    public function coin_withdraw_show($coin) {

        $coin = Coin::query()->where('name', $coin)->firstOrFail();

        $client = auth()->guard('clients')->user();

        $networks = Network::query()->whereHas('coins', function(Builder $query) use ($coin) {
            $query->where('coin_id', $coin->id);
        })->get();

        return view('dashboard.wallet.coin.withdraw', compact('coin', 'client', 'networks'));
    }

    public function coin_withdraw_submit(CoinWithdrawSubmit $request) {

        $withdraw = Withdraw::query()->create([
            'amount' => $request->amount,
            'address' => $request->address,
            "coin_id" => $request->coin_id,
            "network_id" => $request->network_id,
            'client_id' => auth()->guard('clients')->user()->id
        ]);

        return redirect()->route('wallet_coin_withdraw_result', $withdraw->id);
    }

    public function withdraw_result_show($withdraw_id) {

        $withdraw = Withdraw::query()->findOrFail($withdraw_id);
        if ($withdraw->client_id != auth()->guard('clients')->user()->id)
            abort(403);

        return view('dashboard.wallet.coin.withdraw_result', compact('withdraw'));
    }

    public function cash_withdraw_show() {

        $client = auth()->guard('clients')->user();

        $last_month_withdraw = WithdrawCache::query()->where([
            'client_id' => auth()->guard('clients')->user()->id,
            'is_paid' => true,
        ])->where('pay_at', '>=', Carbon::now()->subMonth())->get();

        $accounts = AccountCard::query()->where('client_id', auth()->guard('clients')->user()->id)->get();

        return view('dashboard.wallet.cash.withdraw', compact('client', 'last_month_withdraw'
            , 'accounts'));
    }

    public function cash_withdraw_submit(WithdrawCacheRequest $request) {

        $card = AccountCard::query()->findOrFail($request->account_id);
        if ($card->status != 'accepted')
            throw ValidationException::withMessages(['account_id' => 'لطفا از یک حساب تایید شده استفاده کنید.']);

        WithdrawCache::query()->create([
            'card_id' => $request->account_id,
            'client_id' => auth()->guard('clients')->user()->id,
            'amount' => (int)str_replace(",", "", $request->amount),
        ]);

        return redirect()->route('wallet_transactions');
    }

    public function cash_deposit_show() {

        $cards = Card::query()->where([
            'client_id' => auth()->guard('clients')->user()->id
        ])->get();

        return view('dashboard.wallet.cash.deposit', compact('cards'));
    }

    public function submit_cash_deposit_show(DepositCashRequest $request) {

        $card = Card::query()->findOrFail($request->card_id);
        if ($card->status != 'accepted')
            throw ValidationException::withMessages(['card_id' => 'لطفا از یک کارت تایید شده استفاده کنید.']);

        $amount = (int)str_replace(',', '', $request->amount);

        $invoice = new Invoice;
        $invoice->amount($amount);
        $invoice->detail(['detailName' => 'your detail goes here']);

        return Payment::callbackUrl(route('callback_cash_deposit'))->purchase(
            $invoice,
            function($driver, $transactionId) use ($card, $amount) {

                DepositCach::query()->create([
                    'card_id' => $card->id,
                    'client_id' => auth()->guard('clients')->user()->id,
                    'amount' => $amount,
                    'transaction_id' => $transactionId
                ]);
            }
        )->pay()->render();

    }

    public function callback_cash_deposit(Request $request) {
        try {
            $receipt = Payment::amount(1000)->transactionId($request->trackId)->verify();

            $deposit_history = DepositCach::query()->where('transaction_id', $request->trackId)->firstOrFail();
            $deposit_history->is_paid = true;
            $deposit_history->save();

            $client = auth()->guard('clients')->user();
            $client->wallet += $deposit_history->amount;
            $client->save();

            return redirect()->route('cash_deposit_result', $request->trackId);
        } catch(InvalidPaymentException $exception) {
            echo $exception->getMessage();
        }
    }

    public function cash_deposit_result($transaction_id) {
        $deposit_history = DepositCach::query()->where('transaction_id', $transaction_id)->firstOrFail();

        return view('dashboard.wallet.cash.deposit_result', compact('deposit_history'));
    }

}
