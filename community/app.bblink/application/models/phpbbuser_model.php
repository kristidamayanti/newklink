<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of phpbbuser_model
 *
 * @author sahid
 */
class phpbbuser_model extends CI_Model {
    //put your code here
    
    public function getbbuser(){
        
        $this->db->select('phpbb_users.user_id,phpbb_users.user_type,phpbb_users.username,phpbb_users.user_inactive_reason,phpbb_profile_fields_data.pf_distributorcode');
        $this->db->from('phpbb_profile_fields_data');
        $this->db->join('phpbb_users','phpbb_profile_fields_data.user_id = phpbb_users.user_id','inner');
        $this->db->where('user_type',1);
        
        $query=$this->db->get();
        
        if($query->num_rows() > 0):
            return $query;
        else:
            return NULL;
        endif;
                
    }
    
    public function update_status_bbuser($bbuser){                
        
        $data = array(
            'user_type' => 0
        );
                
        $this->db->where('user_id',$bbuser);
        $this->db->update('phpbb_users',$data);
    }
    
    public function delete_bbuser($bbuser){
        
        $data = array(
            'user_id' => $bbuser
        );
                
        $this->db->delete('phpbb_users',$data);
    }

}

