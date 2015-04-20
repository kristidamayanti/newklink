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
class promo extends CI_Controller {

    //put your code here
    private $urlConfig = "html_config";
    private $urlReturn = "";

    public function __construct() {
        parent::__construct();
        $this->urlReturn = get_class($this);
        $this->load->model('promo_model', 'promo');
    }

    //put your code here
    public function index() {
        redirect($this->urlReturn . '/detail');
    }

    public function detail($id = NULL) {
        if (!isset($id)):
            $id = 1;
        endif;

        $data['mHeader'] = $this->menu_model->getHeaderMenu();
        $data['mChild'] = $this->menu_model->getChildMenu();
        $data['promo'] = $this->promo->get($id);
        $data['AllPromo'] = $this->promo->getsAll();

        $this->load->view('html_config');
        $this->load->view($this->urlReturn, $data);
		$this->load->view('footer_new');
    }

}
