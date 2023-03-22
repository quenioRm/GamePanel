<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\News;
use App\Models\UserSession;
use Session;
use Illuminate\Support\Facades\App;

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
        $notices = null;
        $latestNotice = null;

        if($category == null || $category == 'all'){
            $notices = News::where('language', App::currentLocale())->get();
            $latestNotice = News::where('language', App::currentLocale())->latest()->first();
        }else{
            $notices = News::where('language', App::currentLocale())->where('category', $category)->get();
            $latestNotice = News::where('language', App::currentLocale())->where('category', $category)->latest()->first();
        }

        return view('web.pages.newsPages.news', ['notices' => $notices , 'lastest' => $latestNotice]);
    }

    public function NewsDetails($name)
    {
        $notice = News::where('name', $name)->first();
        return view('web.pages.newsPages.newsdetails',['notice' => $notice]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('logout'));
    }
}
