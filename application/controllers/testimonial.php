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
class testimonial extends CI_Controller{
    //put your code here
    private $urlConfig = "html_config";
    private $urlReturn = "";
    
    public function __construct() {
        parent::__construct();
        $this->urlReturn = get_class($this);
        $this->load->model('testimonial_model','testi');
    }

    //put your code here
    public function index($id = NULL) {
        $data['mHeader'] = $this->menu_model->getHeaderMenu();
        $data['mChild'] = $this->menu_model->getChildMenu();
        $data['latestTesti'] = $this->testi->getTop();
        
        $jml = $this->db->get('testimonial');
        
         //pengaturan pagination
        $config['base_url'] = site_url() . '/testimonial/index/';
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
        $data['allTesti'] = $this->testi->getAll($config['per_page'], $id);
        
        
        $this->load->view('html_config');
        $this->load->view($this->urlReturn, $data);
    }
}
