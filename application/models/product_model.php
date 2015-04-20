<?php

class product_model extends CI_Model {

    private $table = "product";
    private $catTable = "product_category";
    private $relTable = "product_related";
    private $prdGal = "product_gallery";
    private $relBlog = "blog_related";

    public function gets() {
        $sql = "SELECT * FROM " . $this->table." WHERE act=1";
        return $this->db->query($sql)->result();
    }
    
    public function getsRandom() {
        $sql = "SELECT * FROM " . $this->table." WHERE act=1 "
                . "ORDER BY RAND() limit 10";
        return $this->db->query($sql)->result();
    }
    
    public function getsRandom5() {
        $sql = "SELECT * FROM " . $this->table." WHERE act=1 "
                . "ORDER BY RAND() limit 5";
        return $this->db->query($sql)->result();
    }

    public function get($id) {
        $sql = "SELECT * FROM " . $this->table;
        $sql .= " WHERE id = " . $id . " LIMIT 1";
        return $this->db->query($sql)->row();
    }
    
    public function getCatName($id) {
        $sql = "SELECT prdcat_name FROM " . $this->catTable;
        $sql .= " WHERE id = " . $id . " LIMIT 1";
        return $this->db->query($sql)->row();
    }

    public function getCategories() {
        $sql = "SELECT * FROM " . $this->catTable;
        return $this->db->query($sql)->result();
    }

    public function getByCat($param) {
        $fparam = str_replace('_', ' ', $param);

        $sql = "SELECT * FROM " . $this->table . " WHERE "
                . "category LIKE '%" . $this->db->escape_like_str($fparam) . "%'";

//        AND WHERE act = 1

        return $this->db->query($sql)->result();
    }

    public function getRelated() {
        $sql = "SELECT * FROM " . $this->relTable;
        return $this->db->query($sql)->result();
    }
    
    public function prdGallery($id) {
        $sql = "SELECT * FROM " . $this->prdGal. " WHERE pid=".$id." LIMIT 3";
        return $this->db->query($sql)->result();
    }
    
    public function blogRelated($id) {
        $sql = "SELECT * FROM " . $this->relBlog. " WHERE bl_id=".$id." LIMIT 3";
        return $this->db->query($sql)->result();
    }
    
    public function getLastId(){
        $sql = "SELECT MAX(id)AS ids FROM blog WHERE bl_type=10 LIMIT 1";
        
        return $this->db->query($sql)->row();
    }

}
