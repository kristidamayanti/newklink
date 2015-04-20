<?php

class office_model extends CI_Model {

    private $table = "office";
    private $key = array("KEY_ID");

    public function add() {
        $data = array(
            'id' => $this->input->post('id'),
            'scode' => $this->input->post('scode'),
            'type' => $this->input->post('type'),
            'country' => $this->input->post('country'),
            'city' => $this->input->post('city'),
            'address' => $this->input->post('address'),
            'zipcode' => $this->input->post('zipcode'),
            'phone' => $this->input->post('phone'),
            'fax' => $this->input->post('fax'),
            'email' => $this->input->post('email'),
            'web' => $this->input->post('web'),
            'mobile' => $this->input->post('mobile'),
            'online' => $this->input->post('online'),
            'note' => $this->input->post('note'),
            'image' => $this->input->post('image'),
            'act' => $this->input->post('act'),
            'ip' => $this->input->post('ip'),
            'update' => $this->input->post('update'),
            'tanggal' => $this->input->post('tanggal'),
            'createnm' => $this->input->post('createnm'),
            'updatenm' => $this->input->post('updatenm'),
            'areaid' => $this->input->post('areaid'),
        );
        $this->db->insert($this->table, $data);
    }

    public function edit($KEY_ID) {
        $data = array(
            'id' => $this->input->post('id'),
            'scode' => $this->input->post('scode'),
            'type' => $this->input->post('type'),
            'country' => $this->input->post('country'),
            'city' => $this->input->post('city'),
            'address' => $this->input->post('address'),
            'zipcode' => $this->input->post('zipcode'),
            'phone' => $this->input->post('phone'),
            'fax' => $this->input->post('fax'),
            'email' => $this->input->post('email'),
            'web' => $this->input->post('web'),
            'mobile' => $this->input->post('mobile'),
            'online' => $this->input->post('online'),
            'note' => $this->input->post('note'),
            'image' => $this->input->post('image'),
            'act' => $this->input->post('act'),
            'ip' => $this->input->post('ip'),
            'update' => $this->input->post('update'),
            'tanggal' => $this->input->post('tanggal'),
            'createnm' => $this->input->post('createnm'),
            'updatenm' => $this->input->post('updatenm'),
            'areaid' => $this->input->post('areaid'),
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
