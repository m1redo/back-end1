<?php

class News extends Model{

    public function getAllNews(){
        return $this->db->query("SELECT * FROM `news` WHERE `id` > ?",[1]);
    }

    public function getNews($params){
        return $this->db->query("SELECT * FROM `news` WHERE `id` = ?",[$params]);
    }
}