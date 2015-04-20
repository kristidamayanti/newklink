<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of general_manager
 *
 * @author sahid
 */
class marketingplan extends CI_Controller{
    //put your code here
    private $urlConfig = "html_config";
    private $urlReturn = "";
    
    public function __construct() {
        parent::__construct();
        $this->urlReturn = get_class($this);
    }

    //put your code here
    public function index() {
        $this->load->helper('download');
        $data['mHeader'] = $this->menu_model->getHeaderMenu();
        $data['mChild'] = $this->menu_model->getChildMenu();
        
        $card = (object) array(
                    'title' => 'Marketing Plan',
                    'bl_title' => 'Marketing Plan',
                    'bl_content' => 'Salah satu alasan mengapa Kami telah begitu'
            . ' sukses adalah Marketing Plan Kami. Disertai dengan imbalan dan '
            . 'insentif bagi semua anggota',
        );

        $data['blogDet'] = $card;

        $this->load->view('html_config', $data);
        $this->load->view($this->urlReturn, $data);
		$this->load->view('footer_new');
    }
}
