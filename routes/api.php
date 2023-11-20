<?php

use Illuminate\Http\Request;
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

Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'LoginFormSubmit'])->name('apilogin');

Route::post('/reset', [App\Http\Controllers\Auth\LoginController::class, 'ResetPasswordFormSubmit'])->name('apipasswordreset');

Route::post('/simpleregister', [App\Http\Controllers\Auth\RegisterController::class, 'SimpleRegister']);

Route::post('/updatediscordaccount', [App\Http\Controllers\Auth\LoginController::class, 'UpdateDiscordId'])->name('updatediscordaccount');

Route::prefix('nexon')->name('nexon.')->group( function(){

    Route::get('loginCheck', [App\Http\Controllers\Games\IcarusOnlineController::class,
    'IcarusAuthCheck'])->name('loginCheck');

    Route::post('inquiryBalance/json', [App\Http\Controllers\Games\IcarusOnlineController::class,
    'inquiryBalance'])->name('inquiryBalance');

    Route::post('nexonCash/charge/json', [App\Http\Controllers\Games\IcarusOnlineController::class,
    'inquiryBalance'])->name('nexonCash');

    Route::post('purchaseItem/json', [App\Http\Controllers\Games\IcarusOnlineController::class,
    'purchaseItem'])->name('purchaseItem');

});

// Icarus Online
Route::prefix('icarus')->name('icarus.')->group( function(){

    Route::get('findaccountbyusername/{account}', [App\Http\Controllers\Games\IcarusAccountController::class,
    'FindAccountIdByUsername'])->name('findaccountbyusername');

    Route::get('getcharacter/{accountId}', [App\Http\Controllers\Games\IcarusAccountController::class,
    'FindCharacterByAccount'])->name('getcharacter');

    Route::get('getaccountwithcharactersbyid/{dbkey}', [App\Http\Controllers\Games\IcarusAccountController::class,
    'GetUserWithCharactersByID'])->name('getaccountwithcharactersbyid');

    Route::get('getguildbycharacter/{dbkey}', [App\Http\Controllers\Games\IcarusAccountController::class,
    'GetGuildByCharacter'])->name('getguildbycharacter');

    Route::post('createregisterguildmarkhistory', [App\Http\Controllers\Games\IcarusAccountController::class,
    'CreateRegisterGuildMarkHistory'])->name('createregisterguildmarkhistory');

    Route::get('getguildmarklist', [App\Http\Controllers\Games\IcarusAccountController::class,
    'GetGuildMarkList'])->name('getguildmarklist');

    Route::get('updateguildmark/{characterId}/{guildMarkId}', [App\Http\Controllers\Games\IcarusAccountController::class,
    'UpdateGuildMark'])->name('updateguildmark');

    Route::post('getresumecharacter', [App\Http\Controllers\Games\IcarusAccountController::class,
    'GetResumeCharacter'])->name('getresumecharacter');

    Route::get('getuserbyusername/{username}', [App\Http\Controllers\Games\IcarusAccountController::class,
    'GetUserByUserName'])->name('getuserbyusername');

    Route::post('moveitemtoqueue', [App\Http\Controllers\Games\IcarusBuySellApiController::class,
    'MoveItemToQueue'])->name('moveitemtoqueue');

    Route::get('removeitemtoqueue/{sellId}', [App\Http\Controllers\Games\IcarusBuySellApiController::class,
    'RemoveItemToQueue'])->name('removeitemtoqueue');

    Route::get('moveitemtobuyer/{sellId}/{characterBuyerId}', [App\Http\Controllers\Games\IcarusBuySellApiController::class,
    'MoveItemToBuyer'])->name('moveitemtobuyer');

    Route::get('getonlineaccounts', [App\Http\Controllers\Games\IcarusAccountController::class,
    'GetOnlineAccounts'])->name('getonlineaccounts');

    Route::get('getuserbyid/{id}', [App\Http\Controllers\Games\IcarusAccountController::class,
    'GetUserById'])->name('getuserbyid');

    // WIKI
    Route::prefix('wiki')->name('wiki.')->group( function(){

        Route::get('getitemdescription/{itemid}', [App\Http\Controllers\Games\IcarusWikiApiController::class,
        'GetItemDescription'])->name('getitemdescription');

    });

    // LOG
    Route::prefix('log')->name('log.')->group( function(){

        Route::post('registergamemodificationlog', [App\Http\Controllers\Games\IcarusAccountController::class,
        'RegisterGameModificationLog'])->name('registergamemodificationlog');

    });

});

Route::prefix('launcher')->name('launcher.')->group( function(){

    Route::get('getnews/{lang}', [App\Http\Controllers\Web\LauncherNewsApiController::class,
    'GetNews'])->name('getnews');

});

Route::prefix('blackdesertGM')->name('blackdesertGM.')->group( function(){

    Route::post('UpdateIp', [App\Http\Controllers\Games\BlackDesertGMController::class,
    'UpdateIp'])->name('UpdateIp');

});





//
