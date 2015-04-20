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
class gm extends CI_Controller{
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
                    'title' => 'General Manager PT. K-Link Indonesia',
                    'bl_title' => 'General Manager PT. K-Link Indonesia',
                    'bl_content' => 'Ir. Djoko Komara bergabung di K-Link '
            . 'Indonesia pada bulan Januari 2004,Dalam perannya ini, beliau '
            . 'telah berhasil mendorong Pemerintah untuk mengesahkan UU '
            . 'Perdagangan tahun 2014 pada tanggal 11 Februari 2014, dimana '
            . 'pemerintah mengakui dan melindungi industri MLM/DS '
            . '(Multi Level Marketing/Direct Selling) ',
        );
        $data['blogDet'] = $card;

        $this->load->view('html_config', $data);
        $this->load->view($this->urlReturn, $data);
		$this->load->view('footer_new');
    }
}
