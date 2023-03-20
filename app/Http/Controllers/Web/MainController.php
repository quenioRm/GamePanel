<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function Home()
    {
        return view('web.pages.home');
    }

    public function Download()
    {
        return view('web.pages.download');
    }

    public function News($category = null)
    {
        return view('web.pages.newsPages.news');
    }
}
