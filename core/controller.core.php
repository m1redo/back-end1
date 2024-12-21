<?php

class Controller{
    protected $data;
    protected $model;
    protected $params;

    public function getData(){
        return $this->data;
    }
    public function __construct($data = []){
        $this->data = $data;
        $this->model = Router::getController();
        $this->params = Router::getParams();
    }
}