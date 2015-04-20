<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of hello
 *
 * @author sahid
 */
class home extends CI_Controller {

    //put your code here
    private $urlConfig = "html_config_async";
    private $urlReturn = "home";

    public function Home() {
        parent::__construct();
        $this->load->model('product_model', 'prodModel');
        $this->load->model('promo_model', 'promoModel');
        $this->load->model('news_model', 'news');
        $this->load->model('successblog_model', 'success');
        $this->load->model('testimonial_model', 'testi');
        $this->load->model('slideshow_model', 'slide');
        $this->load->model('counter_model', 'counter');
    }
	
	

    public function index() {
        $this->output->set_header("Cache-Control: max-age=3600, must-revalidate");
        $this->output->cache(35);
        $data['titlepage'] = 'K-Link Indonesia';

        $syariah = array(
            'where' => 'bl_type = 7',
            'limit' => 3,
            'order' => 'id DESC',
        );

        $health = array(
            'where' => 'bl_type = 6',
            'limit' => 3,
            'order' => 'id DESC',
        );

        $resep = array(
            'where' => 'bl_type = 3',
            'limit' => 3,
            'order' => 'id DESC',
        );
		
		 $lifestyle = array(
            'where' => 'bl_type = 11',
            'limit' => 3,
            'order' => 'id DESC',
        );

		
        $data['mHeader'] = $this->menu_model->getHeaderMenu();
        $data['mChild'] = $this->menu_model->getChildMenu();
        $data['latestNews'] = $this->news->getLatest();
        $data['latestTesti'] = $this->testi->getLatest();
        $data['slideShow'] = $this->slide->gets();
        $data['prodGrup'] = $this->prodModel->getsRandom();
        $data['promo'] = $this->promoModel->gets();
        $data['latestSuccess'] = $this->success->getLatestRand();
        $data['syariahList'] = $this->success->gets($syariah);
        $data['healthList'] = $this->success->gets($health);
        $data['resepList'] = $this->success->gets($resep);
		$data['lifestyleList'] = $this->success->gets($lifestyle);
        $data['syariah'] = $this->success->getLatestType(7);
        $data['resep'] = $this->success->getLatestType(3);
        $data['health'] = $this->success->getLatestType(6);
		$data['lifestyle'] = $this->success->getLatestType(11);
        $data['nilai'] = $this->counter->gets();
        $this->counter->insert();

        $this->load->view($this->urlConfig);
        $this->load->view($this->urlReturn, $data);
		$this->load->view('footer_new');

    }

}

?>
