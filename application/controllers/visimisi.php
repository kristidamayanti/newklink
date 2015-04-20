<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of visimisi
 *
 * @author sahid
 */
class visimisi extends CI_Controller {

    //put your code here
    public function index() {

        $data['mHeader'] = $this->menu_model->getHeaderMenu();
        $data['mChild'] = $this->menu_model->getChildMenu();

        $card = (object) array(
                    'title' => 'Visi & Misi Perusahaan',
                    'bl_title' => 'Visi & Misi Perusahaan',
                    'bl_content' => 'Untuk menjadi perusahaan MLM terkemuka di '
            . 'Indonesia dengan jutaan distributor yang tersebar di berbagai '
            . 'daerah, pulau-pulau dan provinsi di seluruh kepulauan '
            . 'yang luas ini',
        );

        $data['blogDet'] = $card;

        $this->load->view('html_config', $data);
        $this->load->view('visimisi',$data);
		$this->load->view('footer_new');
    }

}
