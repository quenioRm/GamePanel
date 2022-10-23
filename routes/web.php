<?php

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);

// Auth Routes
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'LoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'LoginFormSubmit']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/LoginIpProtectCheck/{email}', [App\Http\Controllers\Auth\LoginController::class, 'LoginIpProtectCheck'])
->name('loginipprotectcheck');

Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'RegisterForm'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'RegisterFormSubmit']);


// Google URL
Route::prefix('google')->name('google.')->group( function(){
    Route::get('login', [App\Http\Controllers\GoogleController::class, 'loginWithGoogle'])->name('login');
    Route::any('callback', [App\Http\Controllers\GoogleController::class, 'callbackFromGoogle'])->name('callback');
});

// Facebook
Route::prefix('facebook')->name('facebook.')->group( function(){
    Route::get('/auth', [App\Http\Controllers\FacebookController::class, 'facebookRedirect'])->name('login');
    Route::get('auth/callback', [App\Http\Controllers\FacebookController::class, 'loginWithFacebook'])->name('callback');
});

Route::group(['prefix'=>'Member'] , function(){
    Route::group(['prefix'=>'Join'] , function(){
        Route::post('/isBlockEmailDomain', [App\Http\Controllers\Auth\RegisterController::class,'isBlockEmailDomain'])
        ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class])
        ->name('isblockemaildomain');
        
        Route::post('/EmailAuth', [App\Http\Controllers\Auth\RegisterController::class,'EmailAuth'])
        ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class])
        ->name('emailauth');

        Route::post('/AuthMailSend', [App\Http\Controllers\Auth\RegisterController::class, 'AuthMailSend'])
        ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class])
        ->name('authmailsend');

        Route::post('/joinMailAuth', [App\Http\Controllers\Auth\RegisterController::class, 'joinMailAuth'])
        ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class])
        ->name('joinmailauth');
    });
});

Route::get('/GetCountries/{lang}', [App\Http\Controllers\WebController::class, 'GetCountries'])->name('countries');


