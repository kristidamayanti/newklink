<?php

class slideshow_model extends CI_Model {

    private $table = "slideshow";
    private $key = array("KEY_ID");

    public function add() {
        $data = array(
            'id' => $this->input->post('id'),
            'title' => $this->input->post('title'),
            'url' => $this->input->post('url'),
            'description' => $this->input->post('description'),
            'image' => $this->input->post('image'),
            'act' => $this->input->post('act'),
            'ip' => $this->input->post('ip'),
            'tanggal' => $this->input->post('tanggal'),
        );
        $this->db->insert($this->table, $data);
    }

    public function edit($KEY_ID) {
        $data = array(
            'id' => $this->input->post('id'),
            'title' => $this->input->post('title'),
            'url' => $this->input->post('url'),
            'description' => $this->input->post('description'),
            'image' => $this->input->post('image'),
            'act' => $this->input->post('act'),
            'ip' => $this->input->post('ip'),
            'tanggal' => $this->input->post('tanggal'),
        );
        $this->db->where("FIELDNAME", $KEY_ID);
        $this->db->update($this->table, $data);
    }

    public function gets() {
        $sql = "SELECT * FROM " . $this->table . " WHERE act = 1 ORDER BY id DESC";
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
        $sql .= " WHERE id =" . $id . " AND act = 1";
        return $this->db->query($sql)->row();
    }

}
