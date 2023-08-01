<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CardsController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\CopyTradeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExchangeController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SecurityController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\TradeController;
use App\Http\Controllers\TwoFactorAuthenticationController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\WalletController;
use App\Http\Middleware\CheckCardAdded;
use App\Http\Middleware\IsDesktopMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeController::class)->name('home');

Route::get('contactus', [ContactusController::class, 'contactus_show'])->name('contactus');
Route::post('contactus_submit', [ContactusController::class, 'contactus_submit'])->name('contact_us');

Route::get('faq', [FaqController::class, 'faq_show'])->name('faq');

Route::get('services', ServicesController::class)->name('services');

Route::get('blog', [BlogController::class, 'categories_show'])->name('blog');
Route::get('blog/{slug}', [BlogController::class, 'single_show'])->name('single_blog');
Route::get('blog/categories/{slug}', [BlogController::class, 'single_category_show'])->name('blog_category');

Route::middleware(['auth_login'])->group(function() {

    Route::get('auth/login', [AuthController::class, 'login_show'])->name('login');

    Route::post('auth/login_email', [AuthController::class, 'login_email'])->name('login_email');
    Route::post('auth/login_phone', [AuthController::class, 'login_phone'])->name('login_phone');

    Route::get('auth/send_two_step', [AuthController::class, 'send_two_step'])->name('send_two_step');
    Route::get('auth/two_step', [AuthController::class, 'show_enter_two_step'])->name('show_enter_two_step');
    Route::post('auth/two_step_submit', [AuthController::class, 'submit_two_step'])->name('submit_two_step');

    Route::get('auth/register', [AuthController::class, 'register_show'])->name('register');

    Route::post('auth/register_email', [AuthController::class, 'register_email'])->name('register_email');
    Route::post('auth/register_phone', [AuthController::class, 'register_phone'])->name('register_phone');

    Route::get('auth/register/verify', [AuthController::class, 'register_verify_show'])->name('register_verify');
    Route::get('auth/register/verify_submit', [AuthController::class, 'register_verify_submit'])->name('submit_register_verify');

    Route::get('auth/forgetpassword', [AuthController::class, 'forge_password_show'])->name('forgetpassword');
    Route::get('auth/forgetpassword/verify', [AuthController::class, 'forge_password_verify_show'])->name('forgetpassword_verify');
});

//logout
Route::get('auth/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/enter_to_login', [AuthController::class, 'enter_to_login'])->name('enter_to_login');

Route::get('/forget_password_email_request', [ForgetPasswordController::class, 'submit_email'])->middleware(['throttle:10,1'])->name('forget_password_email');
Route::get('/forget_password_phone_request', [ForgetPasswordController::class, 'submit_phone'])->middleware(['throttle:10,1'])->name('forget_password_phone');

Route::get('/forget_password_email', [ForgetPasswordController::class, 'step_2'])->name('forget2');
Route::get('/forget_password_email/{reset_link}', [ForgetPasswordController::class, 'step_3'])->middleware(['throttle:10,1'])->name('forget_code');

Route::get('/forget_password_phone', [ForgetPasswordController::class, 'step_2_phone'])->name('forget2_phone');
Route::post('/forget_password_phone_submit', [ForgetPasswordController::class, 'step_3_phone'])->middleware(['throttle:10,1'])->name('forget_code_phone');

Route::post('/forget/change', [ForgetPasswordController::class, 'change_submit'])->middleware(['throttle:10,1'])->name('change_submit');


Route::middleware(['client_login'])->group(function() {

    Route::get('read_notification' , [HomeController::class , 'read_notification'])->name('read_notification');
    Route::get('update_coin_amount' , [HomeController::class , 'update_coin_amount'])->name('update_coin_amount');

    Route::group(['prefix' => 'profile'], function() {

        Route::group(['prefix' => 'verification'], function() {

            //verification
            Route::get('/', VerificationController::class)->name('verification');

            //level one verification
            Route::get('level/one', [VerificationController::class, 'level_one_show'])->name('level_one');
            Route::post('level/one/submit', [VerificationController::class, 'level_one_submit'])->name('level_one_submit');

            Route::get('level/one/submit_email', [VerificationController::class, 'submit_email_one'])->name('submit_email_one');

            Route::get('level/one/sms_verify', [VerificationController::class, 'show_sms_verify_level_one'])->name('show_sms_verify');
            Route::post('level/one/sms_verify_submit', [VerificationController::class, 'submit_sms_verify_level_one'])->name('submit_sms_verify');

        });

    });

});

Route::middleware(['client_login', 'is_step_one'])->group(function() {

    //dashboard
    Route::group(['prefix' => 'dashboard'], function() {

        Route::get('/', DashboardController::class)->name('dashboard');

        Route::get('trade', [TradeController::class, 'trade_show'])->name('trade');
        Route::get('trade/{pair}', [TradeController::class, 'single_show'])->name('trade_single')->middleware(IsDesktopMiddleware::class);

        Route::group(['prefix' => 'exchange'], function() {

            //todo
            Route::get('/', [ExchangeController::class, 'exchange_show'])->name('exchange');

            //خرید فوری ارز از کاسپین//
            Route::get('swap/result/{swap_id}', [ExchangeController::class, 'result_swap'])->name('swap_result');
            Route::post('swap', [ExchangeController::class, 'submit_swap'])->name('submit_exchange_buy');
            Route::get('swap/{coin}/{vs_coin}', [ExchangeController::class, 'swap_show'])->name('exchange_buy');

            //فروش فوری ارز به کاسپین//
            Route::get('sell/{coin}/{vs_coin}', [ExchangeController::class, 'sell_show'])->name('exchange_sell');
            Route::get('result', [ExchangeController::class, 'result_show'])->name('exchange_result');

            Route::post('single/coin', [TradeController::class, 'get_coin'])->name('get_coin');
            Route::post('place_buy', [TradeController::class, 'place_buy'])->name('place_buy');
            Route::post('place_sell', [TradeController::class, 'place_sell'])->name('place_sell');

        });

        Route::group(['prefix' => 'wallet'], function() {

            Route::get('/', WalletController::class)->name('wallet');
            Route::get('transactions', [WalletController::class, 'transactions_show'])->name('wallet_transactions');
            Route::get('transactions_with_data/{type}/{id}', [WalletController::class, 'transactions_with_data'])->name('transactions_with_data');

            //deposit coin
            Route::get('coin/deposit/{coin_id}', [WalletController::class, 'coin_deposit_show'])->name('wallet_coin_deposit');
            //request withdraw
            Route::get('coin/withdraw/{coin_id}', [WalletController::class, 'coin_withdraw_show'])->name('wallet_coin_withdraw');
            Route::get('coin/withdraw/result/{withdraw_id}', [WalletController::class, 'withdraw_result_show'])->name('wallet_coin_withdraw_result');

            //برداشت شتابی//
            Route::get('cash/withdraw', [WalletController::class, 'cash_withdraw_show'])->name('wallet_cash_withdraw');
            Route::post('cash/withdraw', [WalletController::class, 'cash_withdraw_submit'])->name('cash_withdraw_submit');

            //شارژ حساب ریالی//
            Route::get('cash/deposit', [WalletController::class, 'cash_deposit_show'])->name('wallet_cash_deposit')->middleware(CheckCardAdded::class);
            Route::post('cash/deposit', [WalletController::class, 'submit_cash_deposit_show'])->name('submit_wallet_cash_deposit')->middleware(CheckCardAdded::class);

            Route::get('cash/deposit/callback', [WalletController::class, 'callback_cash_deposit'])->name('callback_cash_deposit');
            Route::get('cash/deposit/callback/{transaction_id}', [WalletController::class, 'cash_deposit_result'])->name('cash_deposit_result');

            View::composer('dashboard.status_header', 'App\Http\Controllers\DashboardController@sum_btc');

        });

        Route::group(['prefix' => 'copytrade'], function() {
            Route::get('/', [CopyTradeController::class, 'list_show'])->name('copytrade');
            Route::get('trader/{id}', [CopyTradeController::class, 'single_trader_show'])->name('copytrade_show');

            Route::get('request', [CopyTradeController::class, 'request_show'])->name('copytrade_request');
            Route::post('request', [CopyTradeController::class, 'request_submit'])->name('copytrade__request_submit');

            Route::get('/follow', [CopyTradeController::class, 'follow_trader'])->name('copytrade_follow');
            Route::get('/copy_from_trader', [CopyTradeController::class, 'copy_from_trader'])->name('copy_from_trader');

        });

        Route::get('/favorite/add/{coin_id}' , [FavoriteController::class , 'add'])->name('add_favorite');
        Route::get('/favorite/remove/{coin_id}' , [FavoriteController::class , 'remove'])->name('remove_favorite');

    });

    Route::post('coin_withdraw_submit', [WalletController::class, 'coin_withdraw_submit'])->name('coin_withdraw_submit');

    //profile
    Route::group(['prefix' => 'profile'], function() {

        Route::get('/info', [ProfileController::class, 'info_show'])->name('profile_info');

        Route::group(['prefix' => 'card'], function() {
            Route::get('/add', [CardsController::class, 'add_show'])->name('cards_add');
            Route::post('/add', [CardsController::class, 'submit_add_card'])->name('submit_cards_add');
            Route::get('/add/delete/{id}', [CardsController::class, 'delete_card'])->name('delete_card');

            Route::group(['prefix' => 'account'], function() {

                Route::get('/add', [CardsController::class, 'add_account_show'])->name('account_add');
                Route::post('/add', [CardsController::class, 'submit_account_add'])->name('submit_account_add');
                Route::get('/add/delete/{id}', [CardsController::class, 'delete_account'])->name('delete_account');

            });

            Route::get('/', [CardsController::class, 'list_show'])->name('cards');

        });

        //security
        Route::group(['prefix' => 'security'], function() {

            Route::get('/', TwoFactorAuthenticationController::class)->name('security');

            Route::get('/change_password', [SecurityController::class, 'show_change_password'])->name('change_password');
            Route::post('/change_password', [SecurityController::class, 'submit_change_password'])->name('change_password_submit');

            Route::get('/2fa/email', [TwoFactorAuthenticationController::class, 'email_show'])->name('email_verify_2fa');
            Route::post('/2fa/email_submit', [TwoFactorAuthenticationController::class, 'email_submit'])->name('email_verify_submit_2fa');
            Route::get('/2fa/email_code', [TwoFactorAuthenticationController::class, 'show_email_code'])->name('show_email_code');
            Route::post('/2fa/submit_email_code', [TwoFactorAuthenticationController::class, 'submit_email_code'])->name('submit_email_code');

            Route::get('/2fa/sms', [TwoFactorAuthenticationController::class, 'sms_show'])->name('sms_verify_2fa');
            Route::post('/2fa/sms_submit', [TwoFactorAuthenticationController::class, 'sms_submit'])->name('sms_verify_submit_2fa');
            Route::get('/2fa/sms_code', [TwoFactorAuthenticationController::class, 'show_sms_code'])->name('show_sms_code');
            Route::post('/2fa/submit_sms_code', [TwoFactorAuthenticationController::class, 'submit_sms_code'])->name('submit_sms_code');

        });

    });

    Route::get('profile/verification/level/two', [VerificationController::class, 'level_two_show'])->name('level_two');
    Route::post('profile/verification/level/two_submit', [VerificationController::class, 'level_two_submit'])->name('level_two_submit');

});

Route::middleware(['is_step_two'])->group(function() {

    Route::get('profile/verification/level/three', [VerificationController::class, 'level_three_show'])->name('level_three');
    Route::post('profile/verification/level/three_submit', [VerificationController::class, 'level_three_submit'])->name('level_three_submit');
    Route::get('profile/verification/level/three2', [VerificationController::class, 'level_three2_show'])->name('level_three2');
    Route::post('profile/verification/level/three2_submit', [VerificationController::class, 'level_three2_submit'])->name('level_three2_submit');

});

Route::middleware(['is_step_three'])->group(function() {

});

Route::get('desk_please' , [HomeController::class , 'desk_please'])->name('desk_please');

Route::get('unsubscribe' , function(){
   echo "you have been removed from our mailing list";
})->name('unsubscribe');

Route::group(['prefix' => 'kcp'], function() {
    Voyager::routes();
});


Route::get('/{slug}' , PageController::class)->name('pages');
