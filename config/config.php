<?php

Config::set('site_name', 'Перший наш проект сайту моделі MVC');
Config::set('lang', ['en','ua','fr']);

Config::set('def_layout','default');
Config::set('def_lang','en');
Config::set('def_controller','news'); // stop.top/controller/action/params
Config::set('def_action','index'); // http://stop.top/news/novini-pro-ukrain
Config::set('prefix','');

// Routing configuration regex
Config::set('routes', [
    '^\/?(([\da-z\.-]+)\.([a-z\.]{2,6}))?\/?(?<lang>ua|en|fr)?\/?(?<prefix>admin)?\/?(?<controller>[a-z]+)?\/?(?<action>[a-z]+)?\/?(?<alias>[\/a-z0-9-_]+)?$' =>
        ['lang' => Config::get('def_lang'), 'controller' => Config::get('def_controller'), 'action' => Config::get('def_action'), 'prefix' => 'admin_']
]);

// Підєднання до Бази Даних
Config::set('db_type','mysql');
Config::set('db_host','localhost');
Config::set('db_port','3306');
Config::set('db_user','root');
Config::set('db_pass','132435465768');
Config::set('db_name','FLocalDb');
Config::set('db_char','utf8');

Config::set('db_dsn',Config::get('db_type').':host='.Config::get('db_host').';dbname='.Config::get('db_name').';port='.Config::get('db_port').';charset='.Config::get('db_char'));
// mysql:host=localhost;dbname=shop;port=3306;charset=utf8

Config::set('db_options',[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

