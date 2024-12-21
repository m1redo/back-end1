<?php

error_reporting(E_ALL);
ini_set('display_errors',1);

const DS = DIRECTORY_SEPARATOR;
define('RD', dirname(__FILE__));
const VP = RD.DS.'view'; // /var/www/shop.top/view

require_once RD.DS.'core'.DS.'init.php';

Cookie::set("Violetta","book");
session_start();


Session::set('name','Violetta');
Session::set('status','admin');
Session::set('id','15');


$a = new Router($_SERVER['REQUEST_URI']);
