<?php

class download_model extends CI_Model {

    private $table = "download";
    private $key = array("KEY_ID");

    public function add() {
        $data = array(
            'id' => $this->input->post('id'),
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'file' => $this->input->post('file'),
            'download' => $this->input->post('download'),
            'hits' => $this->input->post('hits'),
            'act' => $this->input->post('act'),
            'aid' => $this->input->post('aid'),
            'ip' => $this->input->post('ip'),
            'tanggal' => $this->input->post('tanggal'),
            'did' => $this->input->post('did'),
        );
        $this->db->insert($this->table, $data);
    }

    public function edit($KEY_ID) {
        $data = array(
            'id' => $this->input->post('id'),
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'file' => $this->input->post('file'),
            'download' => $this->input->post('download'),
            'hits' => $this->input->post('hits'),
            'act' => $this->input->post('act'),
            'aid' => $this->input->post('aid'),
            'ip' => $this->input->post('ip'),
            'tanggal' => $this->input->post('tanggal'),
            'did' => $this->input->post('did'),
        );
        $this->db->where("FIELDNAME", $KEY_ID);
        $this->db->update($this->table, $data);
    }

    public function gets() {
        $sql = "SELECT * FROM " . $this->table;
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
        $sql .= "WHERE KEY_ID = '" . $id . "'";
        return $this->db->query($sql)->row();
    }

}
