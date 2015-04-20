<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of blog
 *
 * @author sahid
 */
class blog extends CI_Controller {

    //put your code here
    private $urlConfig = "html_config";
    private $urlNewsletter = "newsletter";
    private $urlReturn = "";

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->urlReturn = get_class($this);
        $this->load->model('successblog_model', 'blog');
        $this->load->model('comment_model', 'comment');
        $this->load->model('product_model', 'prodModel');
    }

    public function index($id = NULL) {
        $param = array(
            "where" => "bl_type = 2",
            "limit" => 4,
            "order" => "id DESC"
        );
//        param bl_type hanya temporary mengikut tipe dari blog  
        $data['title'] = 'Blog';
        $data['mHeader'] = $this->menu_model->getHeaderMenu();
        $data['mChild'] = $this->menu_model->getChildMenu();
        $data['stories'] = $this->blog->gets($param);

        $data['gYear'] = $this->blog->archive();

        $this->db->where('bl_type', 1);
        $jml = $this->db->get('blog');

        //pengaturan pagination
        $config['base_url'] = site_url() . '/' . $this->urlReturn . '/index/';
        $config['total_rows'] = $jml->num_rows();
        $config['per_page'] = '5';
        $config['first_page'] = 'Awal';
        $config['last_page'] = 'Akhir';
        $config['next_page'] = '&laquo;';
        $config['prev_page'] = '&raquo;';
        $config['full_tag_open'] = '<li>';
        $config['full_tag_close'] = '</li>';
        $config['display_pages'] = FALSE;

        $this->pagination->initialize($config);

        $data['halaman'] = $this->pagination->create_links();
        $data['allBlog'] = $this->blog->getByPage(1, $config['per_page'], $id);

        $this->load->view($this->urlConfig, $data);
        $this->load->view($this->urlReturn, $data);
		$this->load->view('footer_new');
    }

    public function recipe($id = NULL) {

        if (!isset($id)):
            $id = 1;
        endif;

        $content = array(
            'bl_id' => $this->input->post('bl_id'),
            'name' => $this->input->post('name'),
            'bl_comment' => $this->input->post('bl_comment'),
            'ip_address' => $this->input->ip_address(),
            'bl_act' => 0,
            'createdt' => date('Y-m-d H:i:s'),
            'updatedt' => date('Y-m-d H:i:s'),
        );

        $resep = array(
            'where' => 'bl_type = 3',
            'order' => 'id DESC',
            'limit' => 10,
        );

        $tips = array(
            'where' => 'bl_type = 4',
            'order' => 'id DESC',
            'limit' => 10,
        );

        $health = array(
            'where' => 'bl_type = 6',
            'order' => 'id DESC',
            'limit' => 10,
        );

        $data['mHeader'] = $this->menu_model->getHeaderMenu();
        $data['mChild'] = $this->menu_model->getChildMenu();
        $data['blogDet'] = $this->blog->get($id);
        $data['listReciepe'] = $this->blog->gets($resep);
        $data['listTips'] = $this->blog->gets($tips);
        $data['listHealth'] = $this->blog->gets($health);
        $data['blogCom'] = $this->comment->getByID($id);
        $data['gYear'] = $this->blog->archive();
        $data['blType'] = 3;
        $data['header'] = "<i class=\"fa fa-heart fa-2x text-primary\"></i> Resep";

        $this->load->view($this->urlConfig, $data);
        $this->load->view('reciepe', $data);
		$this->load->view('footer_new');
    }

    public function tips($id = NULL) {

        if (!isset($id)):
            $id = 1;
        endif;

        $resep = array(
            'where' => 'bl_type = 3',
            'order' => 'id DESC',
            'limit' => 10,
        );

        $tips = array(
            'where' => 'bl_type = 4',
            'order' => 'id DESC',
            'limit' => 10,
        );

        $health = array(
            'where' => 'bl_type = 6',
            'order' => 'id DESC',
            'limit' => 10,
        );

        $data['mHeader'] = $this->menu_model->getHeaderMenu();
        $data['mChild'] = $this->menu_model->getChildMenu();
        $data['blogDet'] = $this->blog->get($id);
        $data['listReciepe'] = $this->blog->gets($resep);
        $data['listTips'] = $this->blog->gets($tips);
        $data['listHealth'] = $this->blog->gets($health);
        $data['blogCom'] = $this->comment->getByID($id);
        $data['gYear'] = $this->blog->archive();
        $data['blogRel'] = $this->prodModel->blogRelated($id);
        $data['prodDet'] = $this->prodModel->gets();
        $data['blType'] = 4;
        $data['header'] = "<i class=\"fa fa-heart fa-2x text-primary\"></i> Beauty Tips";

        $this->load->view($this->urlConfig, $data);
        $this->load->view('reciepe', $data);
		$this->load->view('footer_new');
    }

    public function house_of_beauty($id = NULL) {

        if (!isset($id)):
            $id = 1;
        endif;

        $content = array(
            'bl_id' => $this->input->post('bl_id'),
            'name' => $this->input->post('name'),
            'bl_comment' => $this->input->post('bl_comment'),
            'ip_address' => $this->input->ip_address(),
            'bl_act' => 0,
            'createdt' => date('Y-m-d H:i:s'),
            'updatedt' => date('Y-m-d H:i:s'),
        );

        $resep = array(
            'where' => 'bl_type = 3',
            'order' => 'id DESC',
            'limit' => 10,
        );

        $tips = array(
            'where' => 'bl_type = 4',
            'order' => 'id DESC',
            'limit' => 10,
        );

        $health = array(
            'where' => 'bl_type = 6',
            'order' => 'id DESC',
            'limit' => 10,
        );

        $data['mHeader'] = $this->menu_model->getHeaderMenu();
        $data['mChild'] = $this->menu_model->getChildMenu();
        $data['blogDet'] = $this->blog->get($id);
        $data['listReciepe'] = $this->blog->gets($resep);
        $data['listTips'] = $this->blog->gets($tips);
        $data['listHealth'] = $this->blog->gets($health);
        $data['blogCom'] = $this->comment->getByID($id);
        $data['gYear'] = $this->blog->archive();
        $data['blogRel'] = $this->prodModel->blogRelated($id);
        $data['prodDet'] = $this->prodModel->gets();
        $data['header'] = "<i class=\"fa fa-heart fa-2x text-primary\"></i> House Of Beauty";
        $data['blType'] = 5;

        $this->load->view($this->urlConfig, $data);
        $this->load->view('reciepe', $data);
		$this->load->view('footer_new');
    }

    public function thankyou() {
        $data['mHeader'] = $this->menu_model->getHeaderMenu();
        $data['mChild'] = $this->menu_model->getChildMenu();
        $data['gYear'] = $this->blog->archive();

        $this->load->view($this->urlConfig);
        $this->load->view('thankyou', $data);
		$this->load->view('footer_new');
    }

    public function name($param) {
        $data['mHeader'] = $this->menu_model->getHeaderMenu();
        $data['mChild'] = $this->menu_model->getChildMenu();


        $this->load->view($this->urlConfig);
        $this->load->view($this->urlReturn, $data);
		$this->load->view('footer_new');
    }

    public function archive($year = NULL, $type = NULL) {

        if ($type == 3):
            $type_url = '/blog/reciepe';
        elseif ($type == 4):
            $type_url = '/blog/tips';
        elseif ($type == 1):
            $type_url = '/blog/det';
        elseif ($type == 5):
            $type_url = '/blog/house_of_beauty';
        elseif ($type == 6):
            $type_url = '/health/artno';
        elseif ($type == 7):
            $type_url = '/syariah/artno';
        elseif ($type == 8):
            $type_url = '/blog/newsletter';
        elseif ($type == 9):
            $type_url = '/syariah/ask';
        elseif ($type == 10):
            $type_url = '/product/article';
        elseif ($type == 11):
            $type_url = '/lifestyle/artno';
		elseif ($type == 12):
			$type_url = '/lifestyle/artno';
        endif;


        $data['mHeader'] = $this->menu_model->getHeaderMenu();
        $data['mChild'] = $this->menu_model->getChildMenu();
        $data['year'] = $year;
        $data['type_url'] = $type_url;
        $data['allBlog'] = $this->blog->getByYear($year, $type);

        $this->load->view($this->urlConfig);
        $this->load->view('archive', $data);
		$this->load->view('footer_new');
    }

    public function det($param = null) {
        if (!isset($param)):
            $param = 1;
        endif;

        $data['mHeader'] = $this->menu_model->getHeaderMenu();
        $data['mChild'] = $this->menu_model->getChildMenu();
        $data['blogDet'] = $this->blog->get($param);
        $data['blogNext'] = $this->blog->next($param, 1);
        $data['blogPrev'] = $this->blog->prev($param, 1);
        $data['blogCom'] = $this->comment->getByID($param);
        $data['gYear'] = $this->blog->archive();
        $data['choice'] = $this->blog->getRecommendation(1, 4);
        $data['blType'] = 1;


        $this->load->view($this->urlConfig, $data);
        $this->load->view($this->urlReturn . 'det', $data);
		$this->load->view('footer_new');
    }

    public function newsletter($param = null) {
        if (!isset($param)):
            $param = 1;
        endif;

        $data['mHeader'] = $this->menu_model->getHeaderMenu();
        $data['mChild'] = $this->menu_model->getChildMenu();
        $data['blogDet'] = $this->blog->get($param);
        $data['blogCom'] = $this->comment->getByID($param);
        $data['gYear'] = $this->blog->archive();
        $data['choice'] = $this->blog->getRecommendation(1, 4);
        $data['blType'] = 8;

        if (count($data['blogDet']) == 0):
            redirect('home');
        endif;

        $this->load->view($this->urlConfig, $data);
        $this->load->view($this->urlNewsletter, $data);
		$this->load->view('footer_new');
    }

}
