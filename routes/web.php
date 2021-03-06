<?php

use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\Mailbox\MailboxController;
use App\Http\Controllers\Web\PageController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PageController::class, 'welcome'])->name('welcome');
Route::name('dashboard.')->middleware(['auth:sanctum', 'verified'])->prefix('dashboard')->group(function () {
    Route::get('/', DashboardController::class)->name('index');
    Route::get('mailbox/iframe/{mail}', [MailboxController::class, 'renderMailContent'])->name('mailbox.iframe');
    Route::resource('mailbox', MailboxController::class)->only(['index']);
});
