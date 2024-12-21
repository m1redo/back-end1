<?php
class Blog extends Model{

    public function getAllBlog(){
        return $this->db->query("SELECT * FROM `news` WHERE `id` > ?",[1]);
    }

    public function getBlog($params){
        return $this->db->query("SELECT * FROM `news` WHERE `id` = ?",[$params]);
    }
}