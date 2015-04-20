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
class why extends CI_Controller {

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
                    'title' => 'Why Choose K-Link',
                    'bl_title' => 'Why Choose K-Link',
                    'bl_content' => 'Mengapa memilih K-Link ?K-Link saat ini 
                        telah menjadi salah satu penjual langsung terbesar di Indonesia,
sehingga dengan menjadi distributor K-Link berarti anda menjual merek nasional 
yang mapan dan terpercaya di seluruh negeri ini. Pengalaman kami dalam 
industri penjualan langsung memberikan jaminan bahwa kami adalah pilihan 
yang tepat',
        );

        $data['blogDet'] = $card;

        $this->load->view('html_config', $data);
        $this->load->view($this->urlReturn, $data);
		$this->load->view('footer_new');
    }

}
