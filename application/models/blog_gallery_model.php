<?php

class blog_gallery_model extends CI_Model {

    private $table = "blog_gallery";

    public function gets($param = array()) {
        $sql = "SELECT * FROM " . $this->table;

        if (isset($param["where"]))
            $sql .= " WHERE " . $param["where"];
        if (isset($param["order"]))
            $sql .= " ORDER BY " . $param["order"];

        return $this->db->query($sql)->result();
    }

    public function get($id) {
        $sql = "SELECT * FROM " . $this->table;
        $sql .= " WHERE id =" . $id . " LIMIT 1";
        return $this->db->query($sql)->row();
    }
    
    public function getByID($id) {
        $sql = "SELECT * FROM " . $this->table;
        $sql .= " WHERE bl_gid =" . $id;
        return $this->db->query($sql)->result();
    }

}
