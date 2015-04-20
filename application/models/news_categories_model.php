<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of news_categories
 *
 * @author sahid
 */
class news_categories_model extends CI_Model {

    //put your code here
    private $table = "news_categories";

    public function News_categories() {
        parent::__construct();               
    }

    public function gets() {
        $sql = "SELECT * FROM " . $this->table;
        return $this->db->query($sql)->result();
    }

}
