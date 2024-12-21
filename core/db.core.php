<?php

class Db{
    protected $pdo;
    protected static $instance;

    public function __construct(){
        $this->pdo = new PDO(Config::get('db_dsn'),Config::get('db_user'),Config::get('db_pass'),Config::get('db_options'));
    }

    public static function getInstane(){
        if(empty(self::$instance)){
            self::$instance = new Db();
        }
        return self::$instance;
    }

    public function query($sql, $params = []){
        $stmp = $this->pdo->prepare($sql);
        $result = $stmp->execute($params);
        if($result){
            return $stmp->fetchAll();
        }
        return [];
    }
}