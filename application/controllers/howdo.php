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
class howdo extends CI_Controller{
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
                    'title' => 'How do I join ?',
                    'bl_title' => 'How do I join ?',
                    'bl_content' => 'Mulailah hari ini untuk hari besok yang 
                        lebih baik Jika Anda ingin mempelajari lebih lanjut 
                        tentang peluang bisnis K-Link yang luar biasa, ikuti 
                        salah satu metode di bawah ini.',
        );

        $data['blogDet'] = $card;

        $this->load->view('html_config', $data);
        $this->load->view($this->urlReturn, $data);
		$this->load->view('footer_new');
    }
}
