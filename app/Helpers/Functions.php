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
}
