<?php

class successblog_model extends CI_Model {

    private $table = "blog";

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

    public function get($id) {
        $sql = "SELECT * FROM " . $this->table;
        $sql .= " WHERE id =" . $id . " LIMIT 1";
        return $this->db->query($sql)->row();
    }

    public function next($id, $bltype) {
        $next = $id + 1;

        $sql = "SELECT * FROM " . $this->table;
        $sql .= " WHERE id =" . $next . " AND bl_type = " . $bltype . " LIMIT 1";
        return $this->db->query($sql)->row();
    }

    public function prev($id, $bltype) {
        $next = $id - 1;

        $sql = "SELECT * FROM " . $this->table;
        $sql .= " WHERE id =" . $next . " AND bl_type = " . $bltype . " LIMIT 1";
        return $this->db->query($sql)->row();
    }

    public function getByPage($type, $num, $offset) {

        $this->db->where('bl_type', $type);
        $this->db->order_by("id", "desc");
        $data = $this->db->get($this->table, $num, $offset);
        return $data->result();
    }

    public function getRecommendation($type, $limit) {

        $this->db->where('bl_type', $type);
        $this->db->limit($limit);
        $this->db->order_by("id", "random");
        $data = $this->db->get($this->table);
        return $data->result();
    }

    public function getLatest() {
        $sql = "SELECT * FROM " . $this->table . " ORDER BY id DESC LIMIT 1";
        return $this->db->query($sql)->row();
    }

    public function getLatestType($type) {
        $sql = "SELECT * FROM " . $this->table . " WHERE bl_type =" . $type . " ORDER BY id DESC LIMIT 1";
        return $this->db->query($sql)->row();
    }

    public function getLatestRand() {
        $sql = "SELECT * FROM " . $this->table . " WHERE bl_act=1 "
                . "AND bl_type= 2 ORDER BY RAND() "
                . "LIMIT 1";

        return $this->db->query($sql)->row();
    }

    public function archive() {
        $sql = "SELECT DATE_FORMAT(createdt,'%Y') as grpyear "
                . "FROM blog WHERE bl_type= 2 GROUP BY YEAR(createdt) ";

        return $this->db->query($sql)->result();
    }

    public function getByYear($year, $type) {
        $sql = "SELECT * FROM blog "
                . "WHERE DATE_FORMAT(createdt,'%Y')=$year "
                . "AND bl_type=$type";

        return $this->db->query($sql)->result();
    }

}
