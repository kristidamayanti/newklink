<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of presdir
 *
 * @author sahid
 */
class presdir extends CI_Controller{
    //put your code here
    private $urlConfig = "html_config";
    private $urlReturn = "";
    
    public function __construct() {
        parent::__construct();
        $this->urlReturn = get_class($this);
    }

    //put your code here
    public function index() {
        $data['mHeader'] = $this->menu_model->getHeaderMenu();
        $data['mChild'] = $this->menu_model->getChildMenu();
        
        $card = (object) array(
                    'title' => 'Presiden Direktur PT. K-Link Indonesia',
                    'bl_title' => 'Presiden Direktur PT. K-Link Indonesia',
                    'bl_content' => 'Visi Bapak Radzi dalam menciptakan '
            . 'komunitas K-Link yang penuh kasih dan kepedulian, didukung oleh'
            . ' pelaksanaan program-program CSR perusahaan',
        );
        $data['blogDet'] = $card;

        $this->load->view('html_config', $data);
        $this->load->view($this->urlReturn, $data);
		$this->load->view('footer_new');
    }
}
