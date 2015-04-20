<?php

class M_admks extends CI_Model{
    
    public function M_admks() {
        parent::__construct();      
    } 
    
    public function getID() {
        $qry = "SELECT max(id) as jumlah FROM schedule";
        $query = $this->db->query($qry);
        $num = $query->result();
        $no = $num->id++;
        return $no;
    }
    
    public function saveImportSchedule($field) {
        $jum = 0; 
        $success = 0;  
        $fail = 0; 
        foreach($field as $data) {
            $tgl = $data['DATE']." ".$data['TIME']; 
            $date = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $tgl))); 
            $now = date("Y-m-d H:i:s");  
            $ip = $this->input->ip_address();
            //$noid = $this->getID();
            $qry = "INSERT INTO schedule (area, city, event, location, speaker, 
                        eventdate, priority, act, aid, ip, tanggal) 
                    VALUES ('$data[AREA]', '$data[CITY]', '$data[EVENT]', '$data[LOCATION]', '$data[SPEAKER]',
                            '$date', '$data[PRIORITY]', '1', '0', '$ip', '$now')";
            $query = $this->db->query($qry);
            if($query > 0) {
                $success++;
            } else {
                $fail++;
            }
            $jum++; 
            //echo $qry;
            //echo "<br />";
        }
        
        $arr = array("jum" => $jum, "success" => $success, "fail" => $fail);
        return $arr;
    }
}