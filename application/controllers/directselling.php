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
class directselling extends CI_Controller {

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
                    'title' => 'Penjualan Langsung',
                    'bl_title' => 'Apakah Penjualan Langsung itu ?',
                    'bl_content' => 'Penjualan langsung merupakan metode '
            . 'penjualan di mana produk dipasarkan langsung ke konsumen, '
            . 'menghilangkan kebutuhan untuk grosir, pengiklan dan pengecer.'
            . ' Penjualan langsung dapat dilakukan satu-satu, dalam sebuah '
            . 'kelompok atau format partai, atau bahkan secara online.',
        );

        $data['blogDet'] = $card;

        $this->load->view('html_config', $data);
        $this->load->view($this->urlReturn, $data);
		$this->load->view('footer_new');
    }

}
