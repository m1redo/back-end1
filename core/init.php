<?php

spl_autoload_register(function($class_name){
    $vp = [
      'controller' => '.controller',
      'model' => '.model',
      'core' => '.core'
    ];

    foreach($vp as $path => $val){
        $route = RD.DS.$path.DS.str_replace(trim($val,'.'),'',strtolower($class_name)).$val.'.php'; // /var/www/shop.top/controller/router.controller.php

        if(file_exists($route)){
            //echo $route."<br>";
            require_once $route;
        }
    }
});

function __($key, $def_val = ''){
    return Lang::get($key, $def_val);
}

function debug($var): void{
    echo '<pre>';
    print_r($var);
    echo '</pre>';
}

require_once RD.DS.'config'.DS.'config.php';