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
        $topnotice = News::where('language', App::currentLocale())->where('topnotice', 1)->first();
        if($topnotice == null){
            $topnotice = News::where('language', 'pt-BR')->where('topnotice', 1)->first();
        }

        Session::put('currentContent', 5);
        return view('web.pages.home', ['topnotice' => $topnotice]);
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

            if(empty($notices->toArray())){
                $notices = News::where('language', 'pt-BR')->take(Session::get('currentContent'))->orderBy('created_at', 'desc')->get();
                $latestNotice = News::where('language', 'pt-BR')->latest()->first();
            }

        }else{
            $notices = News::where('language', App::currentLocale())->where('category', $category)->take(Session::get('currentContent'))->get();
            $latestNotice = News::where('language', App::currentLocale())->where('category', $category)->latest()->first();

            if(empty($notices->toArray())){

                $notices = News::where('language', 'pt-BR')->where('category', $category)->take(Session::get('currentContent'))
                ->orderBy('created_at', 'desc')->get();

                $latestNotice = News::where('language', 'pt-BR')->where('category', $category)->latest()->first();
            }
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
        $notices = News::where('language', App::currentLocale())->orderBy('created_at', 'desc')->get();

        if(empty($notices->toArray())){
            $notices = News::where('language', 'pt-BR')->orderBy('created_at', 'desc')->get();
        }
        return view('web.pages.includes.homenotice', ['notices' => $notices]);
    }

    public function GetTopNotice()
    {
        $topnotice = News::where('language', App::currentLocale())->where('topnotice', 1)->first();
        if($topnotice == null){
            $topnotice = News::where('language', 'pt-BR')->where('topnotice', 1)->first();
        }
        return view('web.pages.includes.homenotice', ['topnotice' => $topnotice]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('logout'));
    }
}
