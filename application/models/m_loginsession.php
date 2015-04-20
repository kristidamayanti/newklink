<?php

class M_loginsession extends CI_Model {
    
    function cekLoginSession($idmember){
        $slc = "select session_id,user_data from ci_sessions where user_data = '".$idmember."'";
        $query = $this->db->query($slc);
        return $query->num_rows();
    }
    
    function insertLoginSession($idmember){
        //$sess = $this->session->all_userdata();
        $ins = "insert into ci_sessions(session_id,ip_address,user_agent,user_data)
                values('".$this->session->userdata('session_id')."',
                '".$this->session->userdata('ip_address')."',
                '".$this->session->userdata('user_agent')."',
                '$idmember')";
        $query = $this->db->query($ins);
        return $query;
    }
    
    function deleteSession(){
        $idmember = $this->session->userdata('username');
        //$sessid = $this->session->userdata('session_id');
        $delete = "delete from ci_sessions where user_data = '".$idmember."'";
        //echo $delete;
        $query = $this->db->query($delete);
        return $query;
    }
}