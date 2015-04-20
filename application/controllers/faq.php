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
class faq extends CI_Controller {

    //put your code here
    private $urlConfig = "html_config";
    private $urlReturn = "";

    public function __construct() {
        parent::__construct();
        $this->urlReturn = get_class($this);
        $this->load->model('faq_model', 'faq');
		$this->load->model('counter_model', 'counter');
    }
	

    //put your code here
    public function index($id = NULL, $page = NULL) {
        $data['mHeader'] = $this->menu_model->getHeaderMenu();
        $data['mChild'] = $this->menu_model->getChildMenu();
        $data['answer'] = $this->faq->gets();
        $card = (object) array(
                    'title' => 'Pertanyaan Yang Sering Muncul',
                    'bl_title' => 'FAQ - Pertanyaan Yang Sering Muncul',
                    'bl_content' => 'Pertanyaan yang sering muncul anda dapat mengajukan '
                    . 'pertanyaan melalu email ke leon[at]k-link.co.id',
        );

        $data['blogDet'] = $card;

        $jml = $this->db->get('faq');
        //pengaturan pagination
        $config['base_url'] = site_url() . '/faq/index/';
        $config['total_rows'] = $jml->num_rows();
        $config['per_page'] = '6';
        $config['first_page'] = 'Awal';
        $config['last_page'] = 'Akhir';
        $config['next_page'] = '&laquo;';
        $config['prev_page'] = '&raquo;';
        $config['full_tag_open'] = '<li>';
        $config['full_tag_close'] = '</li>';
        $config['display_pages'] = TRUE;
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config);

        $data['halaman'] = $this->pagination->create_links();
        $data['question'] = $this->faq->getAll($config['per_page'], $id);
		$data['nilai'] = $this->counter->gets();
        $this->counter->insert();

        $this->load->view('html_config', $data);
        $this->load->view($this->urlReturn, $data);
		$this->load->view('footer_new');
    }

    public function faq_details($id) {
        $data['mHeader'] = $this->menu_model->getHeaderMenu();
        $data['mChild'] = $this->menu_model->getChildMenu();
        $data['answer'] = $this->faq->gets();
        $data['question'] = $this->faq->getByID($id);
        $idcard = $this->faq->get($id);

        if (!empty($idcard)):
            $row = $idcard;            
            $card = (object) array(
                        'title' => 'Pertanyaan Yang Sering Muncul',
                        'bl_title' => 'FAQ - Pertanyaan Yang Sering Muncul',
                        'bl_content' => $row->question,
            );
        endif;


        $data['blogDet'] = $card;
        $this->load->view('html_config',$data);
        $this->load->view(__FUNCTION__, $data);
		$this->load->view('footer_new');		
    }

}
