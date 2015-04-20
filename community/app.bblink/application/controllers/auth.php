<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of auth
 *
 * @author sahid
 */
class Auth extends CI_Controller{

	function Auth(){
		parent::__construct();
		$this->load->model('auth_model');
	}

	function index(){                
                $data['mssg'] = $this->session->flashdata('mssg_fail') ;

		$this->load->view('html_bootstrap_config');
		$this->load->view('login',$data);
	}

	function cekuser(){
		$data['username'] = $this->input->post('username');
		$data['pass'] = $this->input->post('password');
		$data['hasil'] = $this->auth_model->cekauth();

		if ($data['hasil'] == null):
			return "no";
		else:
			return "yes";
		endif;
	}

	function in(){
		$this->output->enable_profiler(FALSE);
                $ok = "<span class='label label-important'>Login Fail</span>";

		if($this->cekuser() == "yes"):
			$data['username'] = $this->input->post('username');
			//$data['userconfig'] = $this->auth_model->userconfig();
			$newdata = array('username' => $data['username'],
							'login' => TRUE,							
			);

			$this->session->set_userdata($newdata);			
			redirect('controlpanel');

		else:
                        $this->session->set_flashdata('mssg_fail', $ok);
                        redirect('auth');			
                endif;
	}

	function deny(){
		$this->load->view('html_config_min');
		$this->load->view('blackbox/authorize_deny');
	}

	function logout(){
			$this->session->sess_destroy();
			$this->index();
	}
	
}
?>
