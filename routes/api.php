<?php

use App\Http\Controllers\Api\Mail\MailApiController;
use App\Http\Controllers\Api\Mail\MyMailBoxApiController;
use App\Http\Controllers\Api\User\UserApiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->name('api.')->group(function () {
    Route::get('user/me', [UserApiController::class, 'me'])->name('user.me');
    Route::get('user', [UserApiController::class, 'index'])->name('user.index');

    /*
     |--------------------------------------------------------------------------
     | Rotas para o Mail
     |--------------------------------------------------------------------------
     |
     | Essas rotas são responsável por fazer todas a parde do gerenciamento dos endereços eletrônicos.
     |
     */
    Route::get('mail/mailbox/my', MyMailBoxApiController::class)->name('mail.mailbox.my');
    Route::apiResource('mail', MailApiController::class)->only(['show', 'store']);
});
