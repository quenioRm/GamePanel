<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\App;
use App\Helpers\Functions;
use App\Models\Alerts;
use Illuminate\Support\Facades\Lang;
use Session;

class LauncherNewsApiController extends Controller
{
    public function GetNews($lang)
    {
        $savedLang = $lang;

        if($lang == "pt_BR")
            $lang = "pt-BR";

        if($lang == "en_US")
            $lang = "en";

        if($lang == "es_MX")
            $lang = "es";

        Session::put('applocale', $lang);
        App::setLocale(Session()->get('applocale'));

        $notices = News::where('language', $lang)->orderBy('created_at', 'desc')->take(5)->get();

        if(empty($notices->toArray())){
            $notices = News::where('language', 'pt-BR')->orderBy('created_at', 'desc')->take(5)->get();
        }

        $lastDate = null;
        foreach ($notices as $key => $notice) {

            if($lastDate == null){
                $lastDate = $notice->created_at;
            }else{
                if($notice->created_at < $lastDate)
                    $lastDate = $notice->created_at;
            }
        }

        $subNotices = News::where('language', $lang)->orderBy('created_at', 'desc')->where('created_at', '<', $lastDate)->take(5)->get();

        if(empty($subNotices->toArray())){
            $subNotices = News::where('language', 'pt-BR')->orderBy('created_at', 'desc')->where('created_at', '<', $lastDate)->take(5)->get();
        }

        // Ping
        $ping = Functions::ping(env('WORLD_SVR_IP'),env('WORLD_SVR_PORT'));

        $arrayConfig = [];
        $arrayConfig['ProjectName'] = env('WEB_NAME');
        $arrayConfig['Language'] = $savedLang;
        $arrayConfig['Environment'] = 'Release';
        $arrayConfig['Region'] = 'Any';
        $arrayConfig['ServerStatus'] = ($ping == -1) ?  'Offline' : 'Online';
        $arrayConfig['MyAccountURL'] = 'https://play.icarus101xp.com.br/';
        $arrayConfig['PatchNotesURL'] = 'https://play.icarus101xp.com.br/';
        $arrayConfig['TermsOfServiceURL'] = 'https://play.icarus101xp.com.br/';
        $arrayConfig['PrivacyPolicyURL'] = 'https://play.icarus101xp.com.br/';
        $arrayConfig['NewsCurrentURL'] = '';
        $arrayConfig['ReportBugURL'] = 'https://play.icarus101xp.com.br/';

        //Alets
        $alerts = Alerts::whereDate('date', '<=', date('Y-m-d'))->get();
        $arrAlerts = [];

        foreach($alerts as $key => $alert){
            $arrAlert = [
                'type' => $alert->type,
                'date' => $alert->date,
                'showAfterDate' => $alert->showAfterDate,
                'showAfterDateBool' => ($alert->showAfterDateBool == 0) ? false : true,
                'message' => $alert->message,
                'interactionURL' => $alert->interactionURL
            ];

            $arrAlerts[$key] = $arrAlert;
        }

        $arrayNews = [];

        foreach ($notices as $key => $notice) {

            $category = "";
            $noticecolor = "";

            switch ($notice->category) {
                case 'announce':
                    $category = Lang::get('messages.announce');
                    $noticecolor = '#22ae46';
                    break;
                case 'event':
                    $category = Lang::get('messages.event');
                    $noticecolor = '#ff8b03';
                    break;
                case 'maintenance':
                    $category = Lang::get('messages.maintenance');
                    $noticecolor = '#1971ff';
                    break;
                case 'update':
                    $category = Lang::get('messages.update');
                    $noticecolor = '#ff3b00';
                    break;
                default:
                    $category = Lang::get('messages.announce');
                    break;
            }

            $arrayNew['id'] = $notice->id;
            $arrayNew['header'] = '';
            $arrayNew['title'] = $notice->name;
            $arrayNew['subtitle'] = $category;
            $arrayNew['subtitleColor'] = $noticecolor;
            $arrayNew['date'] = $notice->created_at;
            $arrayNew['imagesURL'] = [
                0 => url('/') . '/storage/news/' . $notice->image_url
            ];
            $arrayNew['videoURL'] = '';
            $arrayNew['interactionURL'] = '';
            $arrayNew['content'] = utf8_encode(substr(str_replace('&nbsp', '', strip_tags($notice->description, "")), 0, 100) . "...");
            $arrayNew['buttonContent'] = Lang::get('messages.moreinfo') . "...";
            $arrayNew['showHeader'] = true;
            $arrayNew['showTitle'] = true;
            $arrayNew['showSubTitle'] = true;
            $arrayNew['subtitleCustomColor'] = true;
            $arrayNew['showContent'] = true;
            $arrayNew['showDate'] = true;
            $arrayNew['showButton'] = true;
            $arrayNew['showVideo'] = true;

            $arrayNews[$key] = $arrayNew;
        }

        $arraySubNews = [];

        foreach ($subNotices as $key => $subNotice) {

            $arrayNew['title'] = $subNotice->name;
            $arrayNew['date'] = $subNotice->created_at;
            $arrayNew['imagesURL'] = $subNotice->image_url;
            $arrayNew['interactionURL'] = '';
            $arrayNew['content'] = substr(str_replace('&nbsp', '', strip_tags($subNotice->description, "")), 0, 100) . "...";
            $arrayNew['showTitle'] = true;
            $arrayNew['showContent'] = true;
            $arrayNew['showDate'] = true;

            $arraySubNews[$key] = $arrayNew;
        }

        return response()->json([
            'Configuration' => $arrayConfig,
            'Alerts' => $arrAlerts,
            'News' => $arrayNews,
            'SubNews' => $arraySubNews
        ], 200);
    }

}
