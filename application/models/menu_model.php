<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of menu_model
 *
 * @author sahid
 */
class menu_model extends CI_Model{
    //put your code here
    
    public function getHeaderMenu(){
//        Mengambil field di table menu 
//        untuk ditampilkan sebagai menu
        
        $this->db->select('menu_category,menu_title,menu_url');
        $query = $this->db->get('menu');
        
        if ($query->num_rows() > 0):
            return $query;
        else:
            return NULL;
        endif;
    }
    
    public function getChildMenu(){
//        Mengambil field di table menu_child 
//        untuk ditampilkan sebagai sub menu
        
        $this->db->select('menu_category,menu_title,menu_url');        
        $query = $this->db->get('menu_child');
        
        if ($query->num_rows() > 0):
            return $query;
        else:
            return NULL;
        endif;
    }
    
    
}
