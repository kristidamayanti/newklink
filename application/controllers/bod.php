<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of bod
 *
 * @author sahid
 */
class bod extends CI_Controller {

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
                    'title' => 'K-Link Board Of Directors',
                    'bl_title' => 'Board Of Directors Dato’ Darren Goh',
                    'bl_content' => 'Prinsip dan falsafah K-LINK International '
            . 'adalah mewariskan rasa kasih sayang dan kemanusiaan',
        );

        $data['blogDet'] = $card;

        $this->load->view('html_config', $data);
        $this->load->view($this->urlReturn, $data);
		$this->load->view('footer_new');
    }

}
