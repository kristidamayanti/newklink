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
class syariah extends CI_Controller {

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
            "where" => "bl_type=7",
            "order" => "id DESC",
            "limit" => 1,
        );

        $listtanya = array(
            "where" => "bl_type=7",
            "order" => "id DESC",
			"limit" => 10,
        );
        
		$listjawab = array(
            "where" => "bl_type=9",
            "order" => "id DESC",
			"limit" => 10,
        );
		
        $card = (object)array(
            'title' => 'Syariah',
            'bl_title' => 'Rubrik Syariah',
            'bl_content' => 'Rubrik Syariah yang di asuh oleh Ustads HM Sofwan '
            . 'Jauhari Lc, M.Ag dibuka konsultasi syariah khusus member K-Link'
            . 'via SMS ke 0856-9327-2255 dengan mencantumkan nama alamat no id'
            . 'email: sofwanjauhari@gmail.com',
        );

        $data['mHeader'] = $this->menu_model->getHeaderMenu();
        $data['mChild'] = $this->menu_model->getChildMenu();
        $data['latestBlog'] = $this->blog->gets($param);
        $data['blogDet'] = $card;
        $data['listTanya'] = $this->blog->gets($listtanya);
		$data['listJawab'] = $this->blog->gets($listjawab);
        $data['gYear'] = $this->blog->archive();
        $data['blType'] = 7;

        $this->load->view('html_config',$data);
        $this->load->view($this->urlReturn, $data);
		$this->load->view('footer_new');
    }

	public function ask($id = null) {
	$this->output->enable_profiler(TRUE);
        if(!isset($id)):
            $id=1;
        endif;
                
        $param = array(
            "where"	=> "bl_type =9",
            "and"	=> "id = ".$id,
            "limit" => 1,
        );

        $listtanya = array(
            "where" => "bl_type=7",
            "order" => "id DESC",
			"limit" => 10,
        );
		
		$listjawab = array(
            "where" => "bl_type=9",
            "order" => "id DESC",
			"limit" => 10,
        );

        $data['mHeader'] = $this->menu_model->getHeaderMenu();
        $data['mChild'] = $this->menu_model->getChildMenu();
        $data['latestBlog'] = $this->blog->gets($param);
        $data['listTanya'] = $this->blog->gets($listtanya);
		$data['listJawab'] = $this->blog->gets($listjawab);
        $data['blogDet'] = $this->blog->get($id);
        $data['blogCom'] = $this->comment->getByID($id);
        $data['gYear'] = $this->blog->archive();
        $data['blType'] = 9;

        $this->load->view('html_config',$data);
        $this->load->view($this->urlReturn.'_det', $data);
		$this->load->view('footer_new');
    }
	
    public function artno($id = null) {
	$this->output->enable_profiler(TRUE);
        if(!isset($id)):
            $id=1;
        endif;
                
        $param = array(
            "where"	=> "bl_type =7",
            "and"	=> "id = ".$id,
            "limit" => 1,
        );

        $listtanya = array(
            "where" => "bl_type=7",
            "order" => "id DESC",
			"limit" => 10,
        );
		
		$listjawab = array(
            "where" => "bl_type=9",
            "order" => "id DESC",
			"limit" => 10,
        );

        $data['mHeader'] = $this->menu_model->getHeaderMenu();
        $data['mChild'] = $this->menu_model->getChildMenu();
        $data['latestBlog'] = $this->blog->gets($param);
        $data['listTanya'] = $this->blog->gets($listtanya);
		$data['listJawab'] = $this->blog->gets($listjawab);
        $data['blogDet'] = $this->blog->get($id);
        $data['blogCom'] = $this->comment->getByID($id);
        $data['gYear'] = $this->blog->archive();
        $data['blType'] = 7;

        $this->load->view('html_config',$data);
        $this->load->view($this->urlReturn.'_det', $data);
		$this->load->view('footer_new');
    }

}
