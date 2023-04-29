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

Route::prefix('icarus')->name('icarus.')->group( function(){

    Route::get('findaccountbyusername/{account}', [App\Http\Controllers\Games\IcarusAccountController::class,
    'FindAccountIdByUsername'])->name('findaccountbyusername');

    Route::get('getcharacter/{accountId}', [App\Http\Controllers\Games\IcarusAccountController::class,
    'FindCharacterByAccount'])->name('getcharacter');

    Route::get('getaccountwithcharactersbyid/{dbkey}', [App\Http\Controllers\Games\IcarusAccountController::class,
    'GetUserWithCharactersByID'])->name('getaccountwithcharactersbyid');

    Route::get('getguildbycharacter/{dbkey}', [App\Http\Controllers\Games\IcarusAccountController::class,
    'GetGuildByCharacter'])->name('getguildbycharacter');

    Route::get('updateguildmark/{characterId}/{guildMarkId}', [App\Http\Controllers\Games\IcarusAccountController::class,
    'UpdateGuildMark'])->name('updateguildmark');

    Route::get('createregisterguildmarkhistory/{accountId}/{characterId}/{guildId}', [App\Http\Controllers\Games\IcarusAccountController::class,
    'CreateRegisterGuildMarkHistory'])->name('createregisterguildmarkhistory');

    Route::post('moveitemtoqueue', [App\Http\Controllers\Games\IcarusBuySellApiController::class,
    'MoveItemToQueue'])->name('moveitemtoqueue');

    Route::get('removeitemtoqueue/{sellId}', [App\Http\Controllers\Games\IcarusBuySellApiController::class,
    'RemoveItemToQueue'])->name('removeitemtoqueue');

    Route::get('moveitemtobuyer/{sellId}/{characterBuyerId}', [App\Http\Controllers\Games\IcarusBuySellApiController::class,
    'MoveItemToBuyer'])->name('moveitemtobuyer');
});

Route::prefix('launcher')->name('launcher.')->group( function(){

    Route::get('getnews/{lang}', [App\Http\Controllers\Web\LauncherNewsApiController::class,
    'GetNews'])->name('getnews');

});


//
