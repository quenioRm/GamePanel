<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Countries;

class WebController extends Controller
{
    public function GetCountries($lang)
    {
        return response()->json(['countries' => Countries::where('lang', $lang)->get()], 200);
    }
}
