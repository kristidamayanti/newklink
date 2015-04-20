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
class gallery extends CI_Controller {

    //put your code here
    private $urlConfig = "html_config";
    private $urlReturn = "";

    public function __construct() {
        parent::__construct();
        $this->urlReturn = get_class($this);
        $this->load->model("gallery_categories_model", "catGallery");
        $this->load->model("gallery_model", "gallery");
    }

    //put your code here
    public function index($id = NULL) {
        $data['mHeader'] = $this->menu_model->getHeaderMenu();
        $data['mChild'] = $this->menu_model->getChildMenu();
        $data['catGal'] = $this->catGallery->gets();
        $card = (object) array(
                    'title' => 'K-Link Gallery',
                    'bl_title' => 'K-Link Gallery',
                    'bl_content' => 'Kumpulan Gambar dari Acara atau event seputar'
            . 'K-Link',
        );
        
        $data['blogDet'] = $card;
        $jml = $this->db->get('gallery');

        //pengaturan pagination
        $config['base_url'] = site_url() . '/gallery/index/';
        $config['total_rows'] = $jml->num_rows();
        $config['per_page'] = '20';
        $config['first_page'] = 'Awal';
        $config['last_page'] = 'Akhir';
        $config['next_page'] = '&laquo;';
        $config['prev_page'] = '&raquo;';
        $config['full_tag_open'] = '<li>';
        $config['full_tag_close'] = '</li>';
        $config['display_pages'] = FALSE;

        $this->pagination->initialize($config);

        $data['halaman'] = $this->pagination->create_links();
        $data['galContent'] = $this->gallery->getAll($config['per_page'], $id);

        $this->load->view('html_config',$data);
        $this->load->view($this->urlReturn, $data);
		$this->load->view('footer_new');
    }

    public function category($id = NULL, $page = NULL) {                
        $data['mHeader'] = $this->menu_model->getHeaderMenu();
        $data['mChild'] = $this->menu_model->getChildMenu();
        $data['catGal'] = $this->catGallery->gets();
        $card = (object) array(
                    'title' => 'K-Link Gallery',
                    'bl_title' => 'K-Link Gallery',
                    'bl_content' => 'Kumpulan Gambar dari Acara atau event seputar'
            . 'K-Link',
        );
        
        $data['blogDet'] = $card;
        
        $jml = $this->db->get('gallery');

        //pengaturan pagination
        $config['base_url'] = site_url() . '/gallery/index/';
        $config['total_rows'] = $jml->num_rows();
        $config['per_page'] = '20';
        $config['first_page'] = 'Awal';
        $config['last_page'] = 'Akhir';
        $config['next_page'] = '&laquo;';
        $config['prev_page'] = '&raquo;';
        $config['full_tag_open'] = '<li>';
        $config['full_tag_close'] = '</li>';
        $config['display_pages'] = FALSE;

        $this->pagination->initialize($config);

        $data['halaman'] = $this->pagination->create_links();
        $data['galContent'] = $this->gallery->getByID($id, $config['per_page'], $page);

        $this->load->view($this->urlConfig,$data);
        $this->load->view($this->urlReturn, $data);
		$this->load->view('footer_new');
    }

}
