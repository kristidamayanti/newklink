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
class lifestyle extends CI_Controller {

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
            "where" => "bl_type=11",
            "order" => "id DESC",
            "limit" => 1,
        );

        $list = array(
            "where" => "bl_type=11",
            "order" => "id DESC"
        );
                 
        $card = (object)array(
            'title' => 'Life Style',
            'bl_title' => 'Rubrik Life Style',
            'bl_content' => 'Rubrik Life Sytle',
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
        $data['latestBlog'] = $this->blog->gets($param);
        $data['listSyariah'] = $this->blog->gets($syariah);
        $data['listSuccess'] = $this->blog->gets($success);
        $data['listBlog'] = $this->blog->gets($list);
        $data['blogDet'] = $card;
        $data['gYear'] = $this->blog->archive();
        $data['blType'] = 11;

        $this->load->view('html_config',$data);
        $this->load->view($this->urlReturn, $data);
		$this->load->view('footer_new');
    }

    public function artno($id = null) {
        if (!isset($id)):
            $id = 1;
        endif;

        $param = array(
            "where" => "bl_type = 11",
            "and" => "id = " . $id,
            "limit" => 1,
        );

        $list = array(
            "where" => "bl_type=11",
            "order" => "id DESC"
        );

        $data['mHeader'] = $this->menu_model->getHeaderMenu();
        $data['mChild'] = $this->menu_model->getChildMenu();
        $data['latestBlog'] = $this->blog->gets($param);
        $data['listBlog'] = $this->blog->gets($list);
        $data['blogCom'] = $this->comment->getByID($id);
        $data['blogDet'] = $this->blog->get($id);
        $data['gYear'] = $this->blog->archive();
        $data['blType'] = 11;
        
        $this->load->view('html_config',$data);
        $this->load->view($this->urlReturn . '_det', $data);
		$this->load->view('footer_new');
    }

}
