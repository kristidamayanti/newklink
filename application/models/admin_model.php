<?php

class admin_model extends CI_Model {

    private $table = "admin";
    private $key = array("KEY_ID");

    public function add() {
        $data = array(
            'uid' => $this->input->post('uid'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'name' => $this->input->post('name'),
            'privileges' => $this->input->post('privileges'),
            'last_login' => $this->input->post('last_login'),
            'last_ip' => $this->input->post('last_ip'),
            'level' => $this->input->post('level'),
            'active' => $this->input->post('active'),
            'failed' => $this->input->post('failed'),
        );
        $this->db->insert($this->table, $data);
    }

    public function edit($KEY_ID) {
        $data = array(
            'uid' => $this->input->post('uid'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'name' => $this->input->post('name'),
            'privileges' => $this->input->post('privileges'),
            'last_login' => $this->input->post('last_login'),
            'last_ip' => $this->input->post('last_ip'),
            'level' => $this->input->post('level'),
            'active' => $this->input->post('active'),
            'failed' => $this->input->post('failed'),
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
