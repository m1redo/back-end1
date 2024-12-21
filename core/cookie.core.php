<?php

class Cookie{

    public static function set($name, $value, $time = 123456789){
        setcookie($name, $value, time()+$time, '/');
    }

    public static function get($neme){
        return $_COOKIE[$neme] ?? null;
    }

    public static function delete($name){
        if(isset($_COOKIE[$name])){
            self::set($name,'',-3600);
            unset($_COOKIE[$name]);
        }
    }
}