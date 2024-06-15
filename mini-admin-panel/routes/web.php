<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OTPMail;

Route::get('/test-email', function () {
    Mail::to('akhilnigam712@gmail.com')->send(new OTPMail('123456'));
    return 'Test email sent';
});
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::post('/verify-otp', [App\Http\Controllers\Auth\RegisterController::class, 'verifyOTP'])->name('verify.otp');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');


Route::resource('customer',CustomerController::class)->middleware(AdminMiddleware::class);