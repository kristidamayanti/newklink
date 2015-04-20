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
class promotion extends CI_Controller {

    //put your code here
    private $urlConfig = "html_config";
    private $urlReturn = "";

    public function __construct() {
        parent::__construct();
        $this->urlReturn = get_class($this);
        $this->load->model('slideshow_model', 'slide');
    }

    //put your code here
    public function index() {
        redirect($this->urlReturn . '/det');
    }

    public function det($id = NULL) {
        if (!isset($id)):
            $id = 1;
        endif;

        $data['mHeader'] = $this->menu_model->getHeaderMenu();
        $data['mChild'] = $this->menu_model->getChildMenu();
        $data['slideShow'] = $this->slide->get($id);

        $this->load->view('html_config');
        $this->load->view($this->urlReturn, $data);
    }

}
