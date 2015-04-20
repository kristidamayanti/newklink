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
class rca extends CI_Controller{
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
                    'title' => 'Our Royal Crown Ambassadors',
                    'bl_title' => 'Our Royal Crown Ambassadors',
                    'bl_content' => 'Royal Crown Ambassador ini serta ratusan '
            . 'lainnya seperti mereka telah mengambil keuntungan dari pendapatan '
            . 'fantastis yang diberikan oleh K-Link',
        );

        $data['blogDet'] = $card;

        $this->load->view('html_config', $data);
        $this->load->view($this->urlReturn, $data);
		$this->load->view('footer_new');
    }
}
