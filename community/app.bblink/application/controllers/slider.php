<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of slider
 *
 * @author sahid
 */
class slider extends CI_Controller{
    //put your code here
    public function Slider(){
        parent::__construct();
        $this->load->model('scoring_model');
        $this->load->model('schedule_model');
        $this->load->model('event_model');
        $this->load->model('point_model');
        $this->load->model('info_model');
        }

    public function index(){
        $this->output->enable_profiler(FALSE);
        $data['series'] = $this->schedule_model->getScoring();
        $data['flight']=$this->scoring_model->getAll();
        $data['info']=$this->info_model->getinfo();

        $this->load->view('html_bootstrap_config');
        $this->load->view('html_config_scrolling');
        $this->load->view('slider',$data);
    }

    public function cp(){
        $this->load->view('html_bootstrap_config');
        $this->load->view('html_config_scrolling');
        $this->load->view('header_cp');
        $this->load->view('cp_panel');
    }

//    Event Section

    public function add_event(){
        $ok = "<span class='label label-success'>Success</span>";
    
        if($this->input->post('submit')):
            $this->session->set_flashdata('mssg_ok', $ok);
            $this->event_model->add();
            redirect('slider/add_event');
        endif;

        $data['mssg'] = $this->session->flashdata('mssg_ok') ;
        
        $this->load->view('html_bootstrap_config');
        $this->load->view('header_cp');
        $this->load->view('event',$data);
    }

     public function list_event(){
        $data['list'] = $this->event_model->getseries();
        $data['mssg'] = NULL;

        $this->load->view('html_bootstrap_config');
        $this->load->view('header_cp');
        $this->load->view('event_list',$data);
    }

    public function remove_event($id){
        $data['list'] = $this->event_model->getseries();
        $data['mssg'] = "<span class='label label-warning'>Deleted Please Refresh</span>";

        $this->event_model->remseries($id);

        $this->load->view('html_bootstrap_config');
        $this->load->view('header_cp');
        $this->load->view('event_list',$data);
    }

//End Event Section
//Add Score/ Point
    public function add_score(){
        $ok = "<span class='label label-success'>Success</span>";

        if($this->input->post('submit')):
            $this->session->set_flashdata('mssg_ok', $ok);
            $this->point_model->add();
            redirect('slider/add_score');
        endif;
        
        $data['series'] = $this->event_model->get_series();
        $data['mssg'] = $this->session->flashdata('mssg_ok') ;

        $this->load->view('html_bootstrap_config');
        $this->load->view('header_cp');
        $this->load->view('score',$data);
    }
//End OF Score
//Start Add Info
    public function add_info(){
        $ok = "<span class='label label-success'>Success</span>";

        if($this->input->post('submit')):
            $this->session->set_flashdata('mssg_ok', $ok);
            $this->info_model->add();
            redirect('slider/add_info');
        endif;

        $data['mssg'] = $this->session->flashdata('mssg_ok') ;

        $this->load->view('html_bootstrap_config');
        $this->load->view('header_cp');
        $this->load->view('info',$data);
    }

    public function list_info(){
        $data['list'] = $this->info_model->getinfo();
        $data['mssg'] = NULL;

        $this->load->view('html_bootstrap_config');
        $this->load->view('header_cp');
        $this->load->view('info_list',$data);
    }

    public function remove_info($id){
        $data['list'] = $this->info_model->getinfo();
        $data['mssg'] = "<span class='label label-warning'>Deleted Please Refresh</span>";

        $this->info_model->reminfo($id);

        $this->load->view('html_bootstrap_config');
        $this->load->view('header_cp');
        $this->load->view('info_list',$data);
    }

}
?>
