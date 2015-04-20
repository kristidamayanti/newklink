<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of register
 *
 * @author sahid
 */
class register extends CI_Controller {

    //put your code here
    private $url = 'www.k-linkmember.co.id/serverxml/index.php/xmlrpc_serverss/';
    private $urlConfig = "html_config";
    private $urlReturn = "";

    public function Register() {        
        parent::__construct();
        $this->urlReturn = get_class($this);
        $this->xmlrpc->server(prep_url($this->url), 80);
    }

    public function index() {
        $data['mHeader'] = $this->menu_model->getHeaderMenu();
        $data['mChild'] = $this->menu_model->getChildMenu();
        
        $this->load->view($this->urlConfig);
        $this->load->view($this->urlReturn, $data);
    }

    public function getLogin($username) {
        $request = array();
        $valReturn = array();

        $this->xmlrpc->method('check.member');

        $request = array(array(array(
                    "distributor" => array("$username", 'string'),
                    "signature" => array(md5("$username" . '12345'), 'string')
                ), 'struct'
        ));

        $this->xmlrpc->request($request);

        if (!$this->xmlrpc->send_request()) {
            echo $this->xmlrpc->display_error();
        } else {
//            return $valReturn = $this->xmlrpc->display_response();
            var_dump($this->xmlrpc->display_response());
        }
    }

}
