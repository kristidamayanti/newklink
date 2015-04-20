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
class lbc extends CI_Controller {

    //put your code here
    private $urlConfig = "html_config";
    private $urlReturn = "";

    public function __construct() {
        parent::__construct();
        $this->urlReturn = get_class($this);
        $this->load->model('successblog_model', 'blog');
    }

    //put your code here TODO Menampilkan List promo, 
    //list resep, list beauty tips dll

    public function index() {
        $resep = array(
            "where" => "bl_type = 3"
        );

        $tips = array(
            "where" => "bl_type = 4"
        );

        $house = array(
            "where" => "bl_type = 5"
        );

        $card = (object) array(
                    'title' => 'K-Link Ladies',
                    'bl_title' => 'Ladies Beauty Club (LBC)',
                    'bl_content' => 'Menyadari akan pentingnya peran dalam keluarga, '
                    . 'K-Link mengembangkan program-program khusus untuk para wanita dalam '
                    . 'Ladies Beauty Club, sebuah wadah bagi para wanita untuk mendapatkan '
                    . 'edukasi tentang kesehatan, kecantikan, dan keluarga. ',
        );


        $data['mHeader'] = $this->menu_model->getHeaderMenu();
        $data['mChild'] = $this->menu_model->getChildMenu();
        $data['beautyTips'] = $this->blog->gets($tips);
        $data['resep'] = $this->blog->gets($resep);
        $data['blogDet'] = $card;
        $data['houseOfBeauty'] = $this->blog->gets($house);

        $this->load->view('html_config', $data);
        $this->load->view($this->urlReturn, $data);
		$this->load->view('footer_new');
    }

}
