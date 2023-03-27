<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\UserSession;
use Illuminate\Support\Facades\Auth;

class LanguageController extends Controller
{
    public function switchLang($lang)
    {
        if (array_key_exists($lang, Config::get('languages'))) {
            Session::put('applocale', $lang);
            if(Auth::user() ==! null)
                UserSession::UpdateSessionLanguage($lang);
        }
        return Redirect::back();
    }
}
