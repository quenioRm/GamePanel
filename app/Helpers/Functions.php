<?php

namespace App\Helpers;

class Functions{

    public static function get_ip() {
        $keys = array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR');

        foreach ($keys as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (explode(',', $_SERVER[$key]) as $ip) {
                    if (filter_var($ip, FILTER_VALIDATE_IP) !== false) {
                        return $ip;
                    }
                }
            }
        }
    }

    public static function Translate($key){
        $path = resource_path();
        $file = readfile($path . '\lang' . '/' . Session()->get('applocale') .'\messages.php');

        $array = explode('=>', $file);
        dd($array);

        return json_encode($array);
    }

    public static function rand_string( $length ) {

        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return substr(str_shuffle($chars),0,$length);
    }

    public static function ping($host, $port, $timeout = 1) {
        try{
            $starttime = microtime(true);
            $file      = fsockopen ($host, $port, $errno, $errstr, 10);
            $stoptime  = microtime(true);
            $status    = 0;

            if (!$file) $status = -1;  // Site is down
            else {
                fclose($file);
                $status = ($stoptime - $starttime) * 1000;
                $status = floor($status);
            }
            return $status;
        }catch (\Exception $e){
            return -1;
        }
    }

    public static function GetNameTranslateFromXml($id, $langFolder, $param = "Name")
    {
        $myfiles = array_diff(scandir('assets/gamelang/' . $langFolder), array('.', '..'));

        foreach ($myfiles as $key => $file) {

            $xmlString = file_get_contents(public_path('assets/gamelang/' . $langFolder . '/' . $file));
            $xmlObject = simplexml_load_string($xmlString);

            $json = json_encode($xmlObject);
            $phpArray = json_decode($json, true);

            if(!empty($phpArray)){
                $result = Functions::FindKey($id, $phpArray, $param);
                if($result != null)
                    return $result;
            }
        }

        return null;
    }

    public static function GetClassName($class)
    {
        switch ($class) {
            case 'gd':
                return "Guardian";
                break;
            case 'tf':
                return "Assassin";
                break;
            case 'pr':
                return "Priest";
                break;
            case 'wz':
                return "Wizard";
                break;
            case 'ac':
                return "Archer";
                break;
            case 'do':
                return "Trickster";
                break;
            case 'mg':
                return "Magician";
                break;

            default:
                return "";
                break;
        }
    }

    public static function FindElementInGameBin($id, $element)
    {
        $myfiles = array_diff(scandir('assets/gamebins'), array('.', '..'));

        foreach ($myfiles as $key => $file) {

            $xmlString = file_get_contents(public_path('assets/gamebins' . '/' . $file));
            $xmlObject = simplexml_load_string($xmlString);

            $json = json_encode($xmlObject);
            $phpArray = json_decode($json, true);

            if(!empty($phpArray)){
                $result = Functions::FindIcon($id, $phpArray);
                if($result != null)
                    return $result;
            }
        }

        return null;
    }

    public static function FindKey($id, $phpArray, $prop)
    {
        foreach ($phpArray as $key => $phpitems) {
            foreach ($phpitems as $key => $item) {
                if(isset($item['@attributes']['key']) && strtolower($item['@attributes']['key']) == strtolower($id)){
                    if($item['@attributes']['prop'] == $prop){
                        return $item['@attributes']['value'];
                    }
                }
            }
        }
    }

    public static function FindIcon($id, $phpArray)
    {
        foreach ($phpArray as $key => $phpitems) {
            foreach ($phpitems as $key => $item) {
                if(isset($item['@attributes']['id'])){
                    if(strtolower($item['@attributes']['id']) == strtolower($id)){
                        return $item['@attributes']['icon'];
                    }
                }
            }
        }
    }
}
