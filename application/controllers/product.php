<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of product
 *
 * @author sahid
 */
class product extends CI_Controller {

    //put your code here
    private $urlConfig = "html_config";
    private $urlReturn = "";

    //put your code here
    public function Product() {
        parent::__construct();
        $this->urlReturn = get_class($this);
        $this->load->model('product_model', 'prodModel');
        $this->load->model('promo_model', 'promoModel');
        $this->load->model('testimonial_model', 'testiModel');
        $this->load->model('slideshow_model', 'slide');
        $this->load->model('successblog_model', 'blog');
        $this->load->model('comment_model', 'comment');
    }

    public function index() {
        $param = array(
            "where" => "bl_type = 3"
        );

        $data['mHeader'] = $this->menu_model->getHeaderMenu();
        $data['mChild'] = $this->menu_model->getChildMenu();
        $data['prodCate'] = $this->prodModel->getCategories();
        $data['prodGrup'] = $this->prodModel->gets();
        $data['slideShow'] = $this->slide->gets();
        $data['promo'] = $this->promoModel->gets();
        $data['resep'] = $this->blog->gets($param);

        $this->load->view($this->urlConfig);
        $this->load->view($this->urlReturn, $data);
		$this->load->view('footer_new');
    }

    public function cat($param) {
        $bl_type = array(
            "where" => "bl_type = 3"
        );

        $data['mHeader'] = $this->menu_model->getHeaderMenu();
        $data['mChild'] = $this->menu_model->getChildMenu();
        $data['prodCate'] = $this->prodModel->getCategories();
        $data['prodGrup'] = $this->prodModel->getByCat($param);
        $data['categoryName'] = $this->prodModel->getCatName($param);
        $data['slideShow'] = $this->slide->gets();
        $data['promo'] = $this->promoModel->gets();
        $data['resep'] = $this->blog->gets($bl_type);

        $this->load->view($this->urlConfig);
        $this->load->view($this->urlReturn, $data);
		$this->load->view('footer_new');
    }

    public function det($param = NULL) {

        if (!isset($param)):
            $param = 1;
        endif;

        $data['mHeader'] = $this->menu_model->getHeaderMenu();
        $data['mChild'] = $this->menu_model->getChildMenu();
        $data['prodDet'] = $this->prodModel->get($param);
        $data['prodRel'] = $this->prodModel->getRelated();
        $data['prodGrup'] = $this->prodModel->gets();
        $data['prodGallery'] = $this->prodModel->prdGallery($param);
        $data['testiGrp'] = $this->testiModel->getByID($param);

        $this->load->view($this->urlConfig);
        $this->load->view($this->urlReturn . 'det', $data);
	$this->load->view('footer_new');
    }

    public function article($id = null) {
        if (!isset($id)):
            $row = $this->prodModel->getLastId();
            $id = $row->ids;
        endif;

        $param = array(
            "where" => "bl_type = 10",
            "and" => "id = " . $id,
            "limit" => 1,
        );

        $list = array(
            "where" => "bl_type=10",
            "order" => "id DESC",
            'limit' => 5,
        );
        
        $health = array(
            "where" => "bl_type=6",
            "order" => "id DESC",
            'limit' => 5,
        );

        $data['mHeader'] = $this->menu_model->getHeaderMenu();
        $data['mChild'] = $this->menu_model->getChildMenu();
        $data['latestBlog'] = $this->blog->gets($param);
        $data['listBlog'] = $this->blog->gets($list);
        $data['listHealth'] = $this->blog->gets($health);
        $data['blogCom'] = $this->comment->getByID($id);
        $data['blogDet'] = $this->blog->get($id);
        $data['gYear'] = $this->blog->archive();
        $data['blType'] = 10;

        $this->load->view('html_config', $data);
        $this->load->view($this->urlReturn . '_knowledge', $data);
		$this->load->view('footer_new');
    }

}
