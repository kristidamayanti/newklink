<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of schedule
 *
 * @author sahid
 */
class schedule extends CI_Controller {

    //put your code here

    private $urlConfig = "html_config";
    private $urlReturn = "schedule";

    public function Schedule() {
        parent::__construct();
        $this->load->model('schedule_model', 'sch');
        $this->load->model('captcha_model', 'capt');
    }

    public function index($id = NULL) {
        $data['mHeader'] = $this->menu_model->getHeaderMenu();
        $data['mChild'] = $this->menu_model->getChildMenu();
        $this->capt->delete();

        $vals = array(
            'img_path' => './captcha/',
            'img_url' => base_url() . '/captcha/',
            'font_path' => './css/bebas/BEBAS.ttf',
            'img_width' => 200,
            'img_height' => 70,
            'expiration' => 7200
        );
        
         $jml = $this->db->get('schedule');

        //pengaturan pagination
        $config['base_url'] = site_url() . '/schedule/index/';
        $config['total_rows'] = $jml->num_rows();
        $config['per_page'] = '15';
        $config['first_page'] = 'Awal';
        $config['last_page'] = 'Akhir';
        $config['next_page'] = '&laquo;';
        $config['prev_page'] = '&raquo;';
        $config['full_tag_open'] = '<li>';
        $config['full_tag_close'] = '</li>';
        $config['display_pages'] = TRUE;
        
        $this->pagination->initialize($config);
        $data['halaman'] = $this->pagination->create_links();

        $cap = create_captcha($vals);
        $data['image'] = $cap['image'];

        $rec = array(
            'captcha_time' => $cap['time'],
            'ip_address' => $this->input->ip_address(),
            'word' => $cap['word']
        );

        $this->capt->add($rec);
        $data['pesan'] = $this->session->flashdata('mssg');

        $data['currSch'] = $this->sch->gets();
        
        if(empty($data['currSch'])):            
           $data['currSch'] = $this->sch->getAll($config['per_page'], $id);
        endif;

        if ($this->input->post('submit')):
            $expiration = time() - 1800;
            $word = $this->input->post('captcha');
            $ip_address = $this->input->ip_address();

            $cekRow = $this->capt->get($word, $ip_address, $expiration);

            if ($cekRow->count > 0):
                $data['currSch'] = $this->sch->getByParam();
            else:
                $val = "<div class=\"alert alert-danger\" role=\"alert\"> Kode Captcha Salah </div>";
                $this->session->set_flashdata('mssg', $val);
            endif;
        endif;

        $this->load->view($this->urlConfig);
        $this->load->view($this->urlReturn, $data);
		$this->load->view('footer_new');
    }

}
