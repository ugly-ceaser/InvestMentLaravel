<?php

use App\Http\Controllers\Admin\ClearCacheController;
use Illuminate\Support\Facades\Route;
use App\Models\Settings;
use Laravel\Fortify\Http\Controllers\NewPasswordController;
use App\Http\Controllers\AutoTaskController;
use App\Http\Controllers\HomePageController;
use Illuminate\Support\Facades\Mail;
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

require __DIR__ . '/admin/web.php';
require __DIR__ . '/user/web.php';
require __DIR__ . '/botman.php';

//activate and deactivate Online Trader
Route::any('/activate', function () {
	return view('activate.index', [
		'settings' => Settings::where('id', '1')->first(),
	]);
});

Route::get('register-license', [ClearCacheController::class, 'saveLicense']);

Route::any('/revoke', function () {
	return view('revoke.index');
});

Route::post('/reset-password', [NewPasswordController::class, 'store'])
	->middleware(['guest:' . config('fortify.guard')])
	->name('password.update');

//cron url
Route::get('/cron', [AutoTaskController::class, 'autotopup'])->name('cron');
//Front Pages Route
Route::get('/', [HomePageController::class, 'index'])->name('home');
Route::get('terms', [HomePageController::class, 'terms'])->name('terms');
Route::get('privacy', [HomePageController::class, 'privacy'])->name('privacy');
Route::get('about', [HomePageController::class, 'about'])->name('about');
Route::get('contact', [HomePageController::class, 'contact'])->name('contact');
Route::get('faq', [HomePageController::class, 'faq'])->name('faq');



Route::get('pricing', [HomePageController::class, 'pricing'])->name('pricing');
Route::get('licences', [HomePageController::class, 'licences'])->name('licences');
Route::get('risk', [HomePageController::class, 'risk'])->name('risk');
Route::get('safety', [HomePageController::class, 'safety'])->name('safety');
Route::get('service', [HomePageController::class, 'service'])->name('service');
Route::get('trading', [HomePageController::class, 'trading'])->name('trading');

Route::get('send-test-email', function () {
    Mail::raw('This is a test email from Laravel!', function ($message) {
        $message->to('martins.paraclet@gmail.com')
                ->subject('Test Email');
    });
});
