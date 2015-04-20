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
class successstories extends CI_Controller {

    //put your code here
    private $urlConfig = "html_config";
    private $urlReturn = "";

    public function __construct() {
        parent::__construct();
        $this->urlReturn = get_class($this);
        $this->load->model('successblog_model', 'success');
        $this->load->model('blog_gallery_model', 'gallery');
    }

    //put your code here
    public function index() {
        $param = array('where' => 'bl_type = 2');

        $data['mHeader'] = $this->menu_model->getHeaderMenu();
        $data['mChild'] = $this->menu_model->getChildMenu();
        $data['allStories'] = $this->success->gets($param);


        $card = (object) array(
                    'title' => 'Success Stories',
                    'bl_title' => 'Success Stories',
                    'bl_content' => 'Biarkan Cerita sukses mereka menginspirasi Anda',
        );

        $data['blogDet'] = $card;

        $this->load->view('html_config', $data);
        $this->load->view($this->urlReturn, $data);
		$this->load->view('footer_new');
    }

    public function det($id = NULL) {
        $param = array('where' => 'bl_type = 2');

        $data['mHeader'] = $this->menu_model->getHeaderMenu();
        $data['mChild'] = $this->menu_model->getChildMenu();
        $data['selStories'] = $this->success->get($id);
        $data['allPict'] = $this->gallery->getByID($id);
        $data['allStories'] = $this->success->gets($param);
        $data['blogDet'] = $this->success->get($id);

        $this->load->view('html_config', $data);
        $this->load->view($this->urlReturn . 'det', $data);
		$this->load->view('footer_new');
    }

}
