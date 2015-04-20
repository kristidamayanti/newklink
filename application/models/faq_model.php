<?php

class faq_model extends CI_Model {

    private $question = "faq";
    private $answer = "answer";

    public function gets() {
        $sql = "SELECT * FROM " . $this->answer;
        return $this->db->query($sql)->result();
    }

    public function getAll($num, $offset) {

        $data = $this->db->get($this->question, $num, $offset);
        return $data->result();
    }

    public function getByID($id, $num = NULL, $offset = NULL) {
        $this->db->where('id', $id);
        $data = $this->db->get($this->question, $num, $offset);
        return $data->result();
    }

    public function get($id) {
        $sql = "SELECT * FROM " . $this->question;
        $sql .= " WHERE id =" . $id . " LIMIT 1";
        return $this->db->query($sql)->row();
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

    public function getQ($param = array()) {
        $sql = "SELECT * FROM " . $this->question;

        if (isset($param["where"]))
            $sql .= " WHERE " . $param["where"];
        if (isset($param["and"]))
            $sql .= " AND " . $param["and"];
        if (isset($param["order"]))
            $sql .= " ORDER BY " . $param["order"];
        if (isset($param["limit"]))
            $sql .= " LIMIT " . $param["limit"];
        if (isset($param["offset"]))
            $sql .= " OFFSET " . $param["offset"];


        return $this->db->query($sql)->result();
    }

}
