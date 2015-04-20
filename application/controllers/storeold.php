<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of store
 *
 * @author sahid
 */
class store extends CI_Controller {

    //put your code here
    private $url = 'www.k-linkmember.co.id/serverxml/index.php/xmlrpc_serverss/';
    private $urlConfig = "html_config";
    private $urlReturn = "store";

    public function Store() {
        parent::__construct();
        $this->xmlrpc->server(prep_url($this->url), 80);
    }

    public function index() {
        $validUser = $this->session->userdata('isValid');
        $d['username'] = $this->session->userdata('username');
        $d['message'] = $this->session->userdata('mssg');

        if ($validUser):
            $this->load->view($this->urlConfig);
            $this->load->view($this->urlReturn,$d);
			
        else:
            redirect('storelogin');
        endif;
    }
   

}
