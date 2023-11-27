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
// Web
Route::get('/', [App\Http\Controllers\Web\MainController::class, 'Home'])->name('home');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/download', [App\Http\Controllers\Web\MainController::class,
'Download'])->name('download');

Route::get('/news/{category?}/{loadMore?}', [App\Http\Controllers\Web\MainController::class,
'News'])->name('news');

Route::get('/notice/{id}/{typeid}', [App\Http\Controllers\Web\MainController::class,
'NewsDetails'])->name('newsdetails');

Route::get('/getNewsCard/{type}', [App\Http\Controllers\Web\MainController::class,
'getNewsCard'])->name('getnewscard');

Route::get('/GetTopNotice', [App\Http\Controllers\Web\MainController::class,
'GetTopNotice'])->name('gettopnotice');

Route::get('/shop', [App\Http\Controllers\Web\ShopController::class,
'Shop'])->name('shop');

// System Routes
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

// GamePanel
Route::prefix('gamepanel')->name('gamepanel.')->group( function(){

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang'])->name('switchlang');

    Route::get('lang/{lang}', [App\Http\Controllers\LanguageController::class, 'switchLang'])->name('switchlang');

    // Auth Routes
    Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'LoginForm'])->name('login');
    Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'LoginFormSubmit']);
    Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
    Route::get('/LoginIpProtectCheck/{email}', [App\Http\Controllers\Auth\LoginController::class, 'LoginIpProtectCheck'])
    ->name('loginipprotectcheck');
    Route::get('/reset', [App\Http\Controllers\Auth\LoginController::class, 'ResetPasswordForm'])->name('reset');
    Route::post('/reset', [App\Http\Controllers\Auth\LoginController::class, 'ResetPasswordFormSubmit']);

    Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'RegisterForm'])->name('register');
    Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'RegisterFormSubmit']);

    // Control Panel
    Route::prefix('controlpanel')->name('controlpanel.')->group( function(){

        Route::get('accountinfo', [App\Http\Controllers\ControlPanel\ControlPanelController::class,
        'AccountInfoForm'])->name('panelaccountinfo');

        // news
        Route::prefix('news')->name('news.')->group( function(){

            // Get News List
            Route::get('list', [App\Http\Controllers\ControlPanel\ControlPanelNewsController::class,
            'List'])->name('list');

            Route::get('add', [App\Http\Controllers\ControlPanel\ControlPanelNewsController::class,
            'Add'])->name('add');

            Route::post('add', [App\Http\Controllers\ControlPanel\ControlPanelNewsController::class,
            'AddPost']);

            Route::get('edit/{id}', [App\Http\Controllers\ControlPanel\ControlPanelNewsController::class,
            'Edit'])->name('edit');

            Route::post('edit/{id}', [App\Http\Controllers\ControlPanel\ControlPanelNewsController::class,
            'EditPost']);

            Route::get('delete/{id}', [App\Http\Controllers\ControlPanel\ControlPanelNewsController::class,
            'Delete'])->name('delete');

        });

        // Shop
        Route::group(['prefix'=> 'shop'], function(){

            // Get Shop List
            Route::get('shopitems', [App\Http\Controllers\ControlPanel\ControlPanelShopController::class,
            'ShopItemList'])->name('shopitems');

            Route::get('shopitems/{subcategoryId}', [App\Http\Controllers\ControlPanel\ControlPanelShopController::class,
            'ShopItemListByCategory'])->name('shopitemssubcategory');

        });

        Route::group(['prefix'=> 'profile'], function(){

            // Profile
            Route::get('profileaccount', [App\Http\Controllers\ControlPanel\ControlPanelController::class,
            'ProfileAccountForm'])->name('profileaccount');

            Route::post('profileaccount', [App\Http\Controllers\ControlPanel\ControlPanelController::class,
            'ProfileAccountFormSubmit']);

            Route::post('profileaccount/avatarupload', [App\Http\Controllers\ControlPanel\ControlPanelController::class,
            'ProfileAccountFormuploadAvatar'])->name('profileaccountformuploadavatar');

            // Account Info
            Route::get('accountprofileinfo', [App\Http\Controllers\ControlPanel\ControlPanelController::class,
            'AccountProfileInfoForm'])->name('accountprofileinfo');

            // Profile Second Email
            Route::get('accountprofilesecondemail', [App\Http\Controllers\ControlPanel\ControlPanelController::class,
            'AccountProfileSecondEmailForm'])->name('accountprofilesecondemail');

            Route::post('accountprofilesecondemail', [App\Http\Controllers\ControlPanel\ControlPanelController::class,
            'AccountProfileSecondEmailFormSubmit']);

            Route::get('accountprofilesecondemailconfirmation', [App\Http\Controllers\ControlPanel\ControlPanelController::class,
            'AccountProfileSecondEmailConfirmationForm'])->name('accountprofilesecondemailconfirmation');

            Route::post('accountprofilesecondemailconfirmation', [App\Http\Controllers\ControlPanel\ControlPanelController::class,
            'AccountProfileSecondEmailConfirmationFormSubmit']);

            // Profile Change Password
            Route::get('accountprofilechangepassword', [App\Http\Controllers\ControlPanel\ControlPanelController::class,
            'AccountProfileChangePasswordForm'])->name('accountprofilechangepassword');

            Route::post('accountprofilechangepassword', [App\Http\Controllers\ControlPanel\ControlPanelController::class,
            'AccountProfileChangePasswordFormSubmit']);

            // Update Account IP
            Route::get('accountprotectaccountbyip/{isIpCheck}', [App\Http\Controllers\ControlPanel\ControlPanelController::class,
            'ProtectAccountByIp'])->name('accountprotectaccountbyip');

            // Update Account IP
            Route::get('accountlogip', [App\Http\Controllers\ControlPanel\ControlPanelController::class,
            'accountlogipForm'])->name('accountlogip');

            // Ticket
            Route::prefix('controlpanel')->name('tickets.')->group( function(){

                // Update Account IP
                Route::get('mytickets', [App\Http\Controllers\ControlPanel\ControlPanelTicketController::class,
                'TicketList'])->name('mytickets');

            });
        });

    });

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

    Route::get('/GetCountries/{lang}', [App\Http\Controllers\WebController::class, 'GetCountries'])->name('countries');

});


