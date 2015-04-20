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
class dokter extends CI_Controller {

    //put your code here
    private $urlConfig = "html_config";
    private $urlReturn = "";

    public function __construct() {
        parent::__construct();
        $this->urlReturn = get_class($this);
        $this->load->model('successblog_model', 'blog');
        $this->load->model('comment_model', 'comment');
    }

    //put your code here
    public function index() {
        $param = array(
            "where" => "bl_type=12",
            "order" => "id DESC",
            "limit" => 1,
        );

        $list = array(
            "where" => "bl_type=12",
            "order" => "id DESC",
			"limit" => 10,
        );

                 
        $card = (object)array(
            'title' => 'Article Doctor',
            'bl_title' => 'Rubrik Kesehatan',
            'bl_content' => 'Rubrik Kesehatan K-Link yang diasuh oleh Product'
            . 'Executive K-Link, berisi tentang kesehatan dan product knowledge',
        );

        $syariah = array(
            'where' => 'bl_type = 7',
            'order' => 'id DESC',
            'limit' => 5,
        );

        $success = array(
            'where' => 'bl_type = 2',
            'order' => 'id DESC',
            'limit' => 5,
        );

        $data['mHeader'] = $this->menu_model->getHeaderMenu();
        $data['mChild'] = $this->menu_model->getChildMenu();
        $data['latestDokter'] = $this->blog->gets($param);
        $data['listSyariah'] = $this->blog->gets($syariah);
        $data['listSuccess'] = $this->blog->gets($success);
        $data['listDokter'] = $this->blog->gets($list);
        $data['blogDet'] = $card;
        $data['gYear'] = $this->blog->archive();
        $data['blType'] = 12;

        $this->load->view('html_config',$data);
        $this->load->view($this->urlReturn, $data);
		$this->load->view('footer_new');
    }

    public function artno($id = null) {
        if (!isset($id)):
            $id = 1;
        endif;

        $param = array(
            "where" => "bl_type = 12",
            "and" => "id = " . $id,
            "limit" => 1,
        );

        $list = array(
            "where" => "bl_type=12",
            "order" => "id DESC"
        );
		$syariah = array(
            'where' => 'bl_type = 7',
            'order' => 'id DESC',
            'limit' => 5,
        );

        $success = array(
            'where' => 'bl_type = 2',
            'order' => 'id DESC',
            'limit' => 5,
        );

        $data['mHeader'] = $this->menu_model->getHeaderMenu();
        $data['mChild'] = $this->menu_model->getChildMenu();
        $data['latestDokter'] = $this->blog->gets($param);
		$data['listSyariah'] = $this->blog->gets($syariah);
        $data['listSuccess'] = $this->blog->gets($success);
        $data['listDokter'] = $this->blog->gets($list);
        $data['blogCom'] = $this->comment->getByID($id);
        $data['blogDet'] = $this->blog->get($id);
        $data['gYear'] = $this->blog->archive();
        $data['blType'] = 12;
        
        $this->load->view('html_config',$data);
        $this->load->view($this->urlReturn . '_det', $data);
		$this->load->view('footer_new');
    }

}
