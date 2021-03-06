<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of landing_model
 *
 * @author sahid
 */
class landingbank_model extends CI_Model {

    //put your code here
    protected static $table = "landing_bank";

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

    public function getLastNo($param) {
        $sql = "SELECT viewed FROM " . self::$table;
        $sql .= " WHERE id= " . $param;

        return $this->db->query($sql)->row();
    }

    public function count($field, $param) {
        $lastNo = $this->getLastNo($param);
        $rows = $lastNo;

        if (count($rows) > 0):
            $row = $rows->viewed;
        endif;

        $data = array(
            'viewed' => $row + 1,
        );

        $this->db->where($field, $param);
        $this->db->update(self::$table, $data);
    }

    public function insert() {
        $data = array();
        $post = $this->input->post();
        $fields = $this->db->list_fields(self::$table);

        foreach ($fields as $myfield):
            if (isset($post[$myfield])):
                $data[$myfield] = $post[$myfield];
            endif;

            if ($myfield == 'ip_address'):
                $data[$myfield] = $this->input->ip_address();
            endif;

            if ($myfield == 'createdt'):
                $data[$myfield] = date('Y-m-d H:i:s');
            endif;

            if ($myfield == 'updatedt'):
                $data[$myfield] = date('Y-m-d H:i:s');
            endif;
        endforeach;

        $this->db->insert(self::$table, $data);
    }

    public function batchInsert($data) {
        $this->db->insert_batch(self::$table, $data);
    }

    public function unUpdate() {
        $SQL = "UPDATE landing 
                SET ld_act=0";

        $this->db->query($SQL);
    }

    public function update($field, $param) {
        $data = array('ld_act' => 1);

        $this->db->where($field, $param);
        $this->db->update(self::$table, $data);
    }

}
