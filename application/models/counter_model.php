<?php

class counter_model extends CI_Model {

    private $table = "counter";    

    public function gets() {
        $sql = "SELECT count FROM " . $this->table;
        return $this->db->query($sql)->row();
    }
    
    public function insert() {
        $lastNo = $this->gets();
        $rows = $lastNo;
        
        if(count($rows) > 0):
            $row = $rows->count;
        endif;
                
        $data = array(
            'count' => $row +1,
        );
        
        $this->db->where('id',1);
        $this->db->update('counter',$data);
    }

}
