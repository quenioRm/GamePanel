<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\App;
use App\Helpers\Functions;

class NewsApiController extends Controller
{
    public function GetNews()
    {
        $notices = News::where('language', App::currentLocale())->take(5)->get();

        if(empty($notices->toArray())){
            $notices = News::where('language', 'pt-BR')->take(5)->get();
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

        $subNotices = News::where('language', App::currentLocale())->where('created_at', '<', $lastDate)->take(5)->get();

        if(empty($subNotices->toArray())){
            $subNotices = News::where('language', 'pt-BR')->where('created_at', '<', $lastDate)->take(5)->get();
        }

        $ping = Functions::ping(env('WORLD_SVR_IP'),env('WORLD_SVR_PORT'));

        $arrayConfig = [];
        $arrayConfig['ProjectName'] = 'Game Launcher';
        $arrayConfig['Language'] = 'en_US';
        $arrayConfig['Environment'] = 'Release';
        $arrayConfig['Region'] = 'Any';
        $arrayConfig['ServerStatus'] = ($ping == -1) ?  'Offline' : 'Online';
        $arrayConfig['MyAccountURL'] = 'https://game-launcher.net/';
        $arrayConfig['PatchNotesURL'] = 'https://game-launcher.net/';
        $arrayConfig['TermsOfServiceURL'] = 'https://game-launcher.net/';
        $arrayConfig['PrivacyPolicyURL'] = 'https://game-launcher.net/';
        $arrayConfig['NewsCurrentURL'] = '';
        $arrayConfig['ReportBugURL'] = 'https://game-launcher.net/';

        $arrAlerts = [];

        $arrAlert = [
            'type' => 'Warning',
            'date' => now(),
            'showAfterDate' => now(),
            'showAfterDateBool' => false,
            'message' => 'Maintenance at 12:00 UTC. The server will be unavailable for a while.',
            'interactionURL' => 'https://game-launcher.net/'
        ];

        $arrAlerts = [
            0 => $arrAlert
        ];

        $arrayNews = [];

        foreach ($notices as $key => $notice) {

            //http://127.0.0.1/storage/news/1679502875.jpg
            $arrayNew['header'] = $notice->category;
            $arrayNew['title'] = $notice->name;
            $arrayNew['subtitle'] = '';
            $arrayNew['subtitleColor'] = '';
            $arrayNew['date'] = $notice->created_at;
            $arrayNew['imagesURL'] = [
                0 => url('/') . '/storage/news/' . $notice->image_url
            ];
            $arrayNew['videoURL'] = '';
            $arrayNew['interactionURL'] = '';
            $arrayNew['content'] = substr(str_replace('&nbsp', '', strip_tags($notice->description, "")), 0, 100) . "...";
            $arrayNew['buttonContent'] = "More info...";
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
