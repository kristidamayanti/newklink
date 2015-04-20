<?php

class comment_model extends CI_Model {

    private $table = "blog_comment";

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
        $sql .= " WHERE bl_id =" . $id . " LIMIT 1";
        return $this->db->query($sql)->row();
    }

    public function getByID($id) {
        $sql = "SELECT * FROM " . $this->table;
        $sql .= " WHERE bl_id =" . $id . " AND bl_act = 1";
        return $this->db->query($sql)->result();
    }

    public function add($bl_id, $name, $bl_comment) {
        $content = array(
            'bl_id' => $bl_id,
            'name' => $name,
            'bl_comment' => $bl_comment,
            'ip_address' => $this->input->ip_address(),
            'bl_act' => 0,
            'createdt' => date('Y-m-d H:i:s'),
            'updatedt' => date('Y-m-d H:i:s'),
        );


        $this->db->insert($this->table, $content);
    }

    public function update($id) {
        $data = array(
            'bl_act' => 1
        );
        
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }

    public function getIDComment() {
        $SQL = "SELECT id FROM blog_comment "
                . "ORDER BY id DESC LIMIT 1 ";

        return $this->db->query($SQL)->row();
    }

}
