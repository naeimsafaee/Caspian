<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddAccountRequest;
use App\Http\Requests\AddCardRequest;
use App\Models\AccountCard;
use App\Models\Bank;
use App\Models\Card;
use Illuminate\Http\Request;

class CardsController extends Controller {

    public function add_show() {

        $banks = Bank::all();

        return view('profile.cards.add', compact('banks'));
    }

    public function submit_add_card(AddCardRequest $request) {

        Card::query()->create([
            'owner_name' => $request->owner,
            'card_number' => $request->card_number,
            'bank_id' => $request->bank_id,
            'client_id' => auth()->guard('clients')->user()->id,
            'expiry_date' => $request->expiry_date,
            'cvv2' => $request->cvv2
        ]);

        return redirect()->route('cards');
    }

    public function delete_card($card_id) {

        $card = Card::query()->findOrFail($card_id);
        if ($card->client_id != auth()->guard('clients')->user()->id)
            abort(403);

        $card->delete();
        return redirect()->back();
    }


    public function add_account_show() {

        $banks = Bank::all();

        return view('profile.cards.add_account', compact('banks'));
    }

    public function submit_account_add(AddAccountRequest $request) {

        AccountCard::query()->create([
            'owner_name' => $request->owner,
            'account_number' => $request->account_number,
            'client_id' => auth()->guard('clients')->user()->id
        ]);

        return redirect()->route('cards');
    }

    public function delete_account($card_id) {

        $account = AccountCard::query()->findOrFail($card_id);
        if ($account->client_id != auth()->guard('clients')->user()->id)
            abort(403);

        $account->delete();
        return redirect()->back();
    }


    public function list_show(Request $request) {

        $cards = Card::query()->where('client_id', auth()->guard('clients')->user()->id)->get();
        $accounts = AccountCard::query()->where('client_id', auth()->guard('clients')->user()->id)->get();


        return view('profile.cards.list', compact('cards' , 'accounts'));
    }

}
