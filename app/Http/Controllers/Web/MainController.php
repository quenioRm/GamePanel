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
        Session::put('currentContent', 5);
        return view('web.pages.home');
    }

    public function Download()
    {
        return view('web.pages.download');
    }

    public function News($category = null, $loadMore = null)
    {
        $notices = null;
        $latestNotice = null;

        $currentSession = Session::get('currentContent');

        if($loadMore != null)
            Session::put('currentContent', $currentSession + 5);

        if($category == null || $category == 'all'){
            $notices = News::where('language', App::currentLocale())->take(Session::get('currentContent'))->get();
            $latestNotice = News::where('language', App::currentLocale())->latest()->first();
        }else{
            $notices = News::where('language', App::currentLocale())->where('category', $category)->take(Session::get('currentContent'))->get();
            $latestNotice = News::where('language', App::currentLocale())->where('category', $category)->latest()->first();
        }

        return view('web.pages.newsPages.news', ['notices' => $notices , 'lastest' => $latestNotice]);
    }

    public function NewsDetails($id, $typeid)
    {

        $notice = News::find($id);

        if($typeid == 0){
            $notice = News::find($id);
            return view('web.pages.newsPages.newsdetails',['notice' => $notice]);
        }

        if($typeid == 1){

            $next = News::where('id', '>', $notice->id)
                ->oldest('id')
                ->first();

            if($next == null)
                $next = $notice;

            return view('web.pages.newsPages.newsdetails',['notice' => $next]);
        }

        if($typeid == 2){

            $prev = News::where('id', '<', $notice->id)
                ->latest('id')
                ->first();

            if($prev == null)
                $prev = $notice;

            return view('web.pages.newsPages.newsdetails',['notice' => $prev]);
        }

    }

    public function getNewsCard()
    {
        $notices = News::where('language', App::currentLocale())->get();
        return view('web.pages.includes.homenotice', ['notices' => $notices]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('logout'));
    }
}
