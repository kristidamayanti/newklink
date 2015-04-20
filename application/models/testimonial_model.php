<?php

class testimonial_model extends CI_Model {

    private $table = "testimonial";

    public function add($pid, $name, $location, $testimonial) {
        $content = array(
            'pid' => $pid,
            'name' => $name,
            'location' => $location,
            'testimonial' => $testimonial,
            'ip_address' => $this->input->ip_address(),
            'act' => 0,
            'tanggal' => date('Y-m-d H:i:s'),
        );

        $this->db->insert($this->table, $content);
    }

    public function update($id) {
        $data = array(
            'act' => 1
        );
        
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }
    
    public function gets() {
        $sql = "SELECT * FROM " . $this->table;
        return $this->db->query($sql)->result();
    }

    public function getTop() {
        $sql = "SELECT * FROM " . $this->table;
        $sql .= " WHERE act=1 ORDER BY id DESC LIMIT 10";
        return $this->db->query($sql)->result();
    }

    public function getAll($num, $offset) {

        $this->db->order_by("id", "desc");
        $data = $this->db->get($this->table, $num, $offset);
        return $data->result();
    }

    public function getByID($id) {
        $sql = "SELECT * FROM " . $this->table;
        $sql .= " WHERE pid = " . $id . " AND act=1";
        return $this->db->query($sql)->result();
    }

    public function getLatest() {
        $SQL = "SELECT * FROM " . $this->table . " WHERE act=1 ORDER BY RAND() LIMIT 1";
        $query = $this->db->query($SQL)->row();

        if (count($query) > 0):
            return $query;
        endif;
    }    
    
    public function getIDComment() {
        $SQL = "SELECT id FROM ".$this->table
                . " ORDER BY id DESC LIMIT 1 ";

        return $this->db->query($SQL)->row();
    }

}
