<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of controlpanel
 *
 * @author sahid
 */
class controlpanel extends CI_Controller{
    //put your code here
    public function Controlpanel(){
        parent::__construct();
    }

    public function index(){

    if($this->session->userdata('login') == TRUE):

        $this->load->view('html_bootstrap_config');
        $this->load->view('html_config_scrolling');
        $this->load->view('header_cp');
        $this->load->view('cp_panel');
   else:
       redirect('auth');
   endif;
    }

}
?>
