<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of scoring
 *
 * @author sahid
 */
class scoring extends CI_Controller {
    //put your code here
    public function Scoring(){
        parent::__construct();
        $this->load->model('scoring_model');
        $this->load->model('schedule_model');
    }

    public function flight_a(){
        $this->output->enable_profiler(FALSE);
        $count = 'A';
        $config['base_url'] = site_url().'/scoring/flight_a';
        $config['per_page'] = 15;
        $config['uri_segment'] = 3;
        $config['total_rows'] = $this->scoring_model->count($count);
        $config['full_tag_open'] = '<div class="pagging">';
        $config['full_tag_close'] = '</div>';
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['series'] = $this->schedule_model->getScoring();
        $data['flight']=$this->scoring_model->getA($config["per_page"],$page);
        $data['type'] = 'FLIGHT A';
        $data["links"] = $this->pagination->create_links();


        $this->load->view('html_config');
        $this->load->view('header');
        $this->load->view('menus');
        $this->load->view('scoring',$data);
        $this->load->view('footer');
    }

    public function flight_b(){
        $this->output->enable_profiler(FALSE);
        $count = 'B';
        $config['base_url'] = site_url().'/scoring/flight_b';
        $config['per_page'] = 15;
        $config['uri_segment'] = 3;
        $config['total_rows'] = $this->scoring_model->count($count);
        $config['full_tag_open'] = '<div class="pagging">';
        $config['full_tag_close'] = '</div>';
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['series'] = $this->schedule_model->getScoring();
        $data['flight']=$this->scoring_model->getB($config["per_page"],$page);
        $data['type'] = 'FLIGHT B';
        $data["links"] = $this->pagination->create_links();


        $this->load->view('html_config');
        $this->load->view('header');
        $this->load->view('menus');
        $this->load->view('scoring',$data);
        $this->load->view('footer');
    }

    public function flight_c(){
        $this->output->enable_profiler(FALSE);
        $count = 'C';
        $config['base_url'] = site_url().'/scoring/flight_b';
        $config['per_page'] = 15;
        $config['uri_segment'] = 3;
        $config['total_rows'] = $this->scoring_model->count($count);
        $config['full_tag_open'] = '<div class="pagging">';
        $config['full_tag_close'] = '</div>';
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['series'] = $this->schedule_model->getScoring();
        $data['flight']=$this->scoring_model->getC($config["per_page"],$page);
        $data['type'] = 'FLIGHT C';
        $data["links"] = $this->pagination->create_links();


        $this->load->view('html_config');
        $this->load->view('header');
        $this->load->view('menus');
        $this->load->view('scoring',$data);
        $this->load->view('footer');
    }

     

}
?>
