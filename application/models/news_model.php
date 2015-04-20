<?php

class news_model extends CI_Model {

    private $table = "news";
    private $mykey = 'id';
    private $key = array("id");

    public function gets($param = array()) {
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
    
    public function getAll($num, $offset) {

        $this->db->order_by("id", "desc"); 
        $data = $this->db->get($this->table, $num, $offset);
        return $data->result();
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
        $sql .= " WHERE cat_id = " . $id . " ORDER BY tanggal DESC";
        return $this->db->query($sql)->result();
    }
    
    public function getByID($id, $num, $offset) {
        $this->db->where('cat_id',$id);
        $data = $this->db->get($this->table, $num, $offset);
        return $data->result();
    }

    public function getID($id) {
        $sql = "SELECT * FROM " . $this->table;
        $sql .= " WHERE id = " . $id;
        return $this->db->query($sql)->row();
    }

    public function getLatest() {
        $SQL = "SELECT * FROM " . $this->table . " WHERE act=1 ORDER BY id DESC LIMIT 1";
        $query = $this->db->query($SQL)->row();

        if (count($query) > 0):
            return $query;
        endif;
    }

}
