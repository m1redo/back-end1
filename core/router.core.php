<?php

class Router{
    // http://shop.top/controller/action/params
    // http://shop.top/news/view/342/34/656/343
    // http://shop.top/news/edit/342/34/656/343
    protected $uri;
    protected static $controller;
    protected static $action;
    protected static $params;
    public static $db;
    public static $lang;

    public function getUri(){
        return $this->uri;
    }

    public static function getController(){
        return self::$controller;
    }

    public static function getAction(){
        return self::$action;
    }

    public static function getParams(){
        return self::$params;
    }

    public static function getLang(){
        return self::$lang;
    }

    public function __construct($uri){// http://shop.top/controller/action/params
        self::$db = Db::getInstane();
        $this->uri = urldecode(trim($uri,'/'));

        foreach(Config::get('routes') as $pattern => $value){
            if(preg_match("#$pattern#i",$this->uri, $matches)){
                //Якшо строка відповідає то виконуємо
                self::$controller = !empty($matches['controller']) ? $matches['controller'] : $value['controller'];
                self::$action = !empty($matches['action']) ? $matches['action'] : $value['action'];
                self::$params = !empty($matches['alias']) ? explode('/', $matches['alias']) : '';
                self::$lang = !empty($matches['lang']) ? $matches['lang'] : $value['lang'];
            } else {
                throw new Exception('This page'.$this->uri.' not found');
            }
        }

        Lang::Load(self::$lang);
        $controller_class = ucfirst(self::$controller.'Controller'); // NewsController
        $controller_method = strtolower(self::$action); // view
        $controller_object = new $controller_class();
        if(method_exists($controller_object, $controller_method)){
            $controller_object->$controller_method();
            $view_object = new View($controller_object->getData(), VP.DS.strtolower(self::$controller).DS.self::$action.'.php');
            $content = $view_object->render();
        } else {
            throw new Exception('Method '. $controller_method. ' or class '. $controller_class. ' does not exists');
        }

        $layaut = new View(compact('content'), VP.DS.Config::get('def_layout').'.php');
        echo $layaut->render();
    }
}