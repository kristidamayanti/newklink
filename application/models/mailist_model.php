<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of landing_model
 * Untuk di domain anak
 * @author sahid
 */
class mailist_model extends CI_Model {
    
    protected static $table = "mailist";

    public function gets($param = array()) {
        $sql = "SELECT * FROM " . self::$table;

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

    public function get($param = array()) {
        $sql = "SELECT * FROM " . self::$table;

        if (isset($param["where"]))
            $sql .= " WHERE " . $param["where"];
        if (isset($param["and"]))
            $sql .= " AND " . $param["and"];
        if (isset($param["order"]))
            $sql .= " ORDER BY " . $param["order"];
        if (isset($param["limit"]))
            $sql .= " LIMIT " . $param["limit"];

        return $this->db->query($sql)->row();
    }

    public function insert() {
        $data = array(
            'uid' => $this->input->post('uid'),
            'name' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'ld_type' => $this->input->post('ld_type'),
            'ip_address' => $this->input->ip_address(),
            'subscribedt' => date('Y-m-d H:i:s'),
            'createdt' => date('Y-m-d H:i:s'),
        );

        $this->db->insert(self::$table, $data);
    }

    /**
     * Var act bertipe int di set 1 untuk aktifasi, angka 0 untuk reg baru
     * angka 3 untuk unsubsribe   angka 4 untuk send failures  
     * 
     * **/
    public function activate($uid) {
        $data = array(
            'act' => 1,
        );

        $this->db->where('uid', $uid);
        $this->db->update(self::$table, $data);
    }

    /**
     * Var act bertipe int di set 1 untuk aktifasi, angka 0 untuk reg baru
     * angka 3 untuk unsubsribe   angka 4 untuk send failures  
     * 
     * **/
    public function deactivate($uid) {
        $data = array(
            'act' => 3,
            'unsubscribedt' => date('Y-m-d H:i:s'),
        );

        $this->db->where('uid', $uid);
        $this->db->update(self::$table, $data);
    }

    /**
     * Var act bertipe int di set 1 untuk aktifasi, angka 0 untuk reg baru
     * angka 3 untuk unsubsribe   angka 4 untuk send failures  
     * 
     * **/
    public function updateFailures($uid) {
        $data = array(
            'act' => 4,
            'failuresdt' => date('Y-m-d H:i:s'),
        );

        $this->db->where('email', $uid);
        $this->db->update(self::$table, $data);
    }

    private function getLastRunNo() {
        $sql = "SELECT runno FROM " . self::$table;
        return $this->db->query($sql)->row();
    }

    private function getSelLastRunNo($id) {
        $sql = "SELECT runno FROM " . self::$table . " WHERE id=" . $id;
        return $this->db->query($sql)->row();
    }

    /**
     * Mengambil nilai terakhir dari runregno sebagai flag untuk pengiriman
     * artikel selanjutnya dengan parameter index no table 
     * 
     * Return object
     * **/    
    private function getLastRunRegNo($id) {
        $sql = "SELECT runregno FROM " . self::$table . " WHERE id=" . $id;
        return $this->db->query($sql)->row();
    }
    
    /**
     * Menambahkan no urut untuk field runregno
     * artikel selanjutnya dengan parameter index no table 
     * 
     * Update
     * **/    
    public function insRunRegNo($id) {
        $lastNo = $this->getLastRunRegNo($id);        

        if (count($lastNo) > 0):
            $row = $lastNo->runregno;
        endif;

        $data = array(
            'runregno' => $row + 1,
        );

        $this->db->where('id', $id);
        $this->db->update(self::$table, $data);
    }

    /**
     * 
     * 
     * 
     * **/
    public function insRunNo($id) {
        $lastNo = $this->getLastRunNo();
        $rows = $lastNo;

        if (count($rows) > 0):
            $row = $rows->runno;
        endif;

        $data = array(
            'runno' => $row + 1,
        );

        $this->db->where('id', $id);
        $this->db->update(self::$table, $data);
    }

    /**
     * 
     * 
     * 
     * **/    
    public function insSelRunNo($id) {
        $lastNo = $this->getSelLastRunNo($id);
        $rows = $lastNo;

        if (count($rows) > 0):
            $row = $rows->runno;
        endif;

        $data = array(
            'runno' => $row + 1,
        );

        $this->db->where('id', $id);
        $this->db->update(self::$table, $data);
    }

}
