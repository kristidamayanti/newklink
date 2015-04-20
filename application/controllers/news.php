<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of news
 *
 * @author sahid
 */
class news extends CI_Controller {

    //put your code here
    private $urlConfig = "html_config";
    private $urlReturn = "";

    //put your code here
    public function News() {
        parent::__construct();
        $this->urlReturn = get_class($this);
        $this->load->model('news_categories_model', 'news_categories');
        $this->load->model('news_model');
    }

    public function index($id = NULL) {
        $data['mHeader'] = $this->menu_model->getHeaderMenu();
        $data['mChild'] = $this->menu_model->getChildMenu();
        $data['newsCat'] = $this->news_categories->gets();
        
        $jml = $this->db->get('news');
        //pengaturan pagination
        $config['base_url'] = site_url() . '/news/index/';
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
        $data['newsDet'] = $this->news_model->getAll($config['per_page'], $id);


        $this->load->view($this->urlConfig, $data);
        $this->load->view($this->urlReturn, $data);
		$this->load->view('footer_new');
    }

    public function cat($id = NULL, $page = NULL) {
        $data['mHeader'] = $this->menu_model->getHeaderMenu();
        $data['mChild'] = $this->menu_model->getChildMenu();
        $data['newsCat'] = $this->news_categories->gets();

        $jml = $this->db->get('news');

        //pengaturan pagination
        $config['base_url'] = site_url() . '/news/cat/' . $id . '/';
        $config['total_rows'] = $jml->num_rows();
        $config['per_page'] = '5';
        $config['first_page'] = 'Awal';
        $config['last_page'] = 'Akhir';
        $config['next_page'] = '&laquo;';
        $config['prev_page'] = '&raquo;';
        $config['full_tag_open'] = '<li>';
        $config['full_tag_close'] = '</li>';
        $config['display_pages'] = FALSE;
        $config['uri_segment'] = 3;

        $this->pagination->initialize($config);

        $data['halaman'] = $this->pagination->create_links();
        $data['newsDet'] = $this->news_model->getByID($id, $config['per_page'], $page);

        $this->load->view($this->urlConfig);
        $this->load->view($this->urlReturn, $data);
		$this->load->view('footer_new');
    }

    public function det($id) {
        $data['mHeader'] = $this->menu_model->getHeaderMenu();
        $data['mChild'] = $this->menu_model->getChildMenu();
        $data['newsCat'] = $this->news_categories->gets();
        $data['newsDet'] = $this->news_model->getID($id);

        $this->load->view($this->urlConfig, $data);
        $this->load->view($this->urlReturn . "_detail", $data);
		$this->load->view('footer_new');
    }

}
