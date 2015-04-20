<?php

class captcha_model extends CI_Model {

    private $table = "captcha";

    public function add($data) {
        $this->db->insert($this->table, $data);
    }

    public function gets() {
        $sql = "SELECT * FROM " . $this->table;
        return $this->db->query($sql)->result();
    }

    public function getAll($num, $offset) {

        $data = $this->db->get($this->table, $num, $offset);
        return $data->result();
    }

    public function getByID($id, $num, $offset) {
        $this->db->where('gid', $id);
        $data = $this->db->get($this->table, $num, $offset);
        return $data->result();
    }

    public function delete() {
        $expiration = time() - 1800;

        $this->db->query("DELETE FROM " . $this->table
                . " WHERE captcha_time < " . $expiration);
    }

    public function get($word, $ip_address, $expiration) {        
        
        $sql = "SELECT COUNT(*) AS count FROM"
                . " captcha WHERE word = ? AND ip_address = ? "
                . "AND captcha_time > ?";
        
        $binds = array($word, $ip_address, $expiration);
        return $query = $this->db->query($sql, $binds)->row();
    }

}
