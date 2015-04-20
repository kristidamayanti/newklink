<?php

class promo_model extends CI_Model {

    private $table = "promo";    
   
    public function gets() {
        $sql = "SELECT * FROM " . $this->table." WHERE act = 1 "
                . "ORDER BY createdt DESC LIMIT 4";
        return $this->db->query($sql)->result();
    }
    
    public function getsAll() {
        $sql = "SELECT * FROM " . $this->table." WHERE act = 1 "
                . "ORDER BY createdt DESC";
        return $this->db->query($sql)->result();
    }

    public function delete() {
        foreach ($key as $k) {
            if ($this->input->post($k)) {
                $this->db->where_in(implode(",", $this->input->post($k)));
            } else {
                $this->db->where($k, $this->input->post($k));
            }
        }
        if ($this->input->get($k)) {
            $this->db->where($k, $this->input->get($k));
        }
        $this->db->delete($this->table);
    }

    public function get($id) {
        $sql = "SELECT * FROM " . $this->table;
        $sql .= " WHERE id = '" . $id . "'";
        return $this->db->query($sql)->row();
    }
    
    public function getn($param = array()) {
        $sql = "SELECT * FROM " . $this->table;

        if (isset($param["where"]))
            $sql .= " WHERE " . $param["where"];
        if (isset($param["and"]))
            $sql .= " AND " . $param["and"];
        if (isset($param["order"]))
            $sql .= " ORDER BY " . $param["order"];
        if (isset($param["limit"]))
            $sql .= " LIMIT " . $param["limit"];

        return $this->db->query($sql)->result();
    }

}
