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
class pakrazi extends CI_Controller {

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
            "where" => "bl_type=13",
            "order" => "id DESC",
            "limit" => 1,
        );

        $list = array(
            "where" => "bl_type=13",
            "order" => "id DESC",
			"limit" => 5,
        );

                 
        $card = (object)array(
            'title' => 'Article Dato DR. H. Md. Radzi Saleh',
            'bl_title' => 'Rubrik Presiden Direktur K-Link Indonesia',
            'bl_content' => 'Rubrik Blog K-Link Presiden Direktur K-Link Indonesia',
        );

       
        $data['mHeader'] = $this->menu_model->getHeaderMenu();
        $data['mChild'] = $this->menu_model->getChildMenu();
        $data['latestPR'] = $this->blog->gets($param);
        $data['listPR'] = $this->blog->gets($list);
        $data['blogDet'] = $card;
        $data['gYear'] = $this->blog->archive();
        $data['blType'] = 13;

        $this->load->view('html_config',$data);
        $this->load->view($this->urlReturn, $data);
		$this->load->view('footer1');
    }

    public function artno($id = null) {
        if (!isset($id)):
            $id = 1;
        endif;

        $param = array(
            "where" => "bl_type = 13",
            "and" => "id = " . $id,
            "limit" => 1,
        );

        $list = array(
            "where" => "bl_type=13",
            "order" => "id DESC"
        );

        $data['mHeader'] = $this->menu_model->getHeaderMenu();
        $data['mChild'] = $this->menu_model->getChildMenu();
        $data['latestPR'] = $this->blog->gets($param);
        $data['listPR'] = $this->blog->gets($list);
        $data['blogDet'] = $card;
        $data['gYear'] = $this->blog->archive();
        $data['blType'] = 13;
        
        $this->load->view('html_config',$data);
        $this->load->view($this->urlReturn . '_det', $data);
		$this->load->view('footer1');
    }

}
