<?php
class pencarian extends CI_Controller {

	private $urlConfig = "html_config_async";
   
	
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pencarian_model', 'pm');
		$this->load->helper('text');
		$this->load->model('successblog_model', 'blog');
		$this->load->model('counter_model', 'counter');
		 
    }

	 public function index() 
	{
		
    }

	public function cariData()
	{
		 $param = array(
            "where" => "bl_type=6",
            "order" => "id DESC",
            "limit" => 1,
        );

        $list = array(
            "where" => "bl_type=6",
            "order" => "id DESC"
        );
                 
        $card = (object)array(
            'title' => 'Health Articel',
            'bl_title' => 'Rubrik Kesehatan',
            'bl_content' => 'Rubrik Kesehatan K-Link yang diasuh oleh Product'
            . 'Executive K-Link, berisi tentang kesehatan dan product knowledge',
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

		
		//$this->output->enable_profiler(TRUE);
		$cari = $this->input->post('search');
		$kategori= $this->input->post('jenis');
		
		$data['blType'] = 6;
		$data['gYear'] = $this->blog->archive();
		$data['mHeader'] = $this->menu_model->getHeaderMenu();
        $data['mChild'] = $this->menu_model->getChildMenu();
		$data['hasil'] = $this->pm->mencari($cari,$kategori);
		$data['kategori']=$kategori;
		$data['latestBlog'] = $this->blog->gets($param);
        $data['listSyariah'] = $this->blog->gets($syariah);
        $data['listSuccess'] = $this->blog->gets($success);
        $data['listBlog'] = $this->blog->gets($list);
        $data['blogDet'] = $card;
        $data['gYear'] = $this->blog->archive();
		$data['nilai'] = $this->counter->gets();
		
		if ($data['hasil'] == null)
		{
			echo $data['hasil'] = $this->pm->mencari($cari,$kategori);
			$this->load->view('no_data', $data);
			$this->load->view($this->urlConfig);
			$this->load->view('footer_new');
			
			
		}
		else
		{
			
			$this->load->view('hasil_cari', $data);
			$this->load->view($this->urlConfig);
			$this->load->view('footer_new');	
		}
	}
	
	public function detailData($id,$kategori)
	{
	
		if (!isset($id)):
            $id = 1;
        endif;

        $param = array(
            "where" => "bl_type = 6",
            "and" => "id = " . $id,
            "limit" => 1,
        );

        $list = array(
            "where" => "bl_type=6",
            "order" => "id DESC"
        );
	
		$data['blType'] = 6;
		$data['gYear'] = $this->blog->archive();
		$data['mHeader'] = $this->menu_model->getHeaderMenu();
        $data['mChild'] = $this->menu_model->getChildMenu();
		$data['hasil']=$this->pm->getById($id,$kategori);
		$data['latestBlog'] = $this->blog->gets($param);
        $data['listSyariah'] = $this->blog->gets($syariah);
        $data['listSuccess'] = $this->blog->gets($success);
        $data['listBlog'] = $this->blog->gets($list);
        $data['blogDet'] = $card;
        $data['gYear'] = $this->blog->archive();
		$data['kategori']=$kategori;
		if ($data['hasil'] == null)
		{
			echo 'Data Tidak Ada';
		}
	}
}


