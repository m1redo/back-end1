<?php

class Lang{
    protected static $data;

    public static function Load($lang){
        $lang_path = RD.DS.'lang'.DS.strtolower($lang).'.php';
        if(file_exists($lang_path)){
            self::$data = include_once $lang_path;
        } else {
            throw new Exception('Language file not found: '.$lang_path);
        }
    }

    public static function get($key, $daf_val = ''){
        return self::$data[strtolower($key)] ?? $daf_val;
    }
}