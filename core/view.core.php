<?php

class View{
    protected $data;
    protected $path;

    public function __construct(array $data = [], $path = null){
        $this->data = $data;
        $this->path = $path;
    }

    public function render(){
        $data = $this->data;
        ob_start();
        if(file_exists($this->path)){
            include_once $this->path;
        } else {
            throw new Exception('Template file not found: '.$this->path);
        }
        return ob_get_clean();
    }
}