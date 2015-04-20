<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of userMember
 *
 * @author sahid
 */
class userforum extends CI_Controller {
    //put your code here
    
    public function Userforum(){
        parent::__construct();
        $this->load->model('phpbbuser_model','user');
    }
    
    public function index(){
        if($this->session->userdata('login') == TRUE):

        $data['userphpbb'] = $this->user->getbbuser();
        
        $this->load->view('html_bootstrap_config');
        $this->load->view('html_config_scrolling');
        $this->load->view('header_cp');
        $this->load->view('userphpbb',$data);
        
        else:
            redirect('auth');
        endif;
        
    }
    
    
    public function proses(){
        
    if($this->session->userdata('login') == TRUE):
                
        if($this->input->post('update') == 'Update'):
            
            $approve =$this->input->post('approve');
            
                foreach ($approve as $bbuser):
                    $this->user->update_status_bbuser($bbuser);
                endforeach;
                            
            redirect('userforum');
        else:    
            $approve =$this->input->post('approve');
            
                foreach ($approve as $bbuser):
                    $this->user->delete_bbuser($bbuser);
                endforeach;
                            
            redirect('userforum');            
        endif;
    
    else:
         redirect('auth');        
    endif;            
    }
    
}

?>
