<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdmTestimoni extends CI_Controller {
	
	public function AdmTestimoni() {
        parent::__construct();
        $this->load->model('m_admtestimoni');
    }
    
    public function getInputTestimoni() {
        $sess = $this->nativesession->get('sessdata');
        if($sess[0]->username != null) {
           $data['form_header'] = "Input Testimoni";
           $data['form_action'] = base_url('/admTestimoni/getInputTestimoni');
           $data['icon'] = "icon-pencil";
           $data['listProduct'] = $this->m_admtestimoni->getListProduct();
           $this->setTemplate('admin/testimoni/getInputTestimoni', $data);
        } else {
           redirect('admin/index', 'refresh');
        } 
    }
    
    public function getListProduct($type = "json") {
        $data['listProduct'] = $this->m_admtestimoni->getListProduct($type);
        if($type == "json") {
            echo json_encode($data['listProduct']);
        }
    }
    
    public function saveInputTestimoni() {
        $arr = $this->setValidationErrorMessage();    
        $this->form_validation->set_rules('name', 'name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('testimonial', 'testimonial', 'trim|required|xss_clean');
        if ($this->form_validation->run() == TRUE) {
            $arr = $this->m_admtestimoni->saveInputTestimoni();
        } 
        echo json_encode($arr); 
    }
	
	public function getListTestimoni() {
		$sess = $this->nativesession->get('sessdata');
        if($sess[0]->username != null) {
           $data['form_header'] = "List Testimoni";
           $data['form_action'] = base_url('/admTestimoni/getListTestimoni');
           $data['icon'] = "icon-pencil";
           $this->setTemplate('admin/testimoni/getListTestimoni', $data);
        } else {
           redirect('admin/index', 'refresh');
        } 
	}
    
    public function searchTestimoni() {
        $data['listTestimoni'] = $this->m_admtestimoni->searchTestimoni();    
        //print_r($data['listTestimoni']);
        $this->load->view('admin/testimoni/getListAllTestimoni', $data);
        
    }
    
    public function getListAllTestimoni() {
        $data['listTestimoni'] = $this->m_admtestimoni->getListAllTestimoni();    
        $this->load->view('admin/testimoni/getListAllTestimoni', $data);
    }
    
    public function getUpdateTestimoni($id, $type = "json") {
        $data['detailTestimoni'] = $this->m_admtestimoni->getUpdateTestimoni($id, $type);    
        //print_r($data['detailTestimoni']);
        if($type == "json") {
           echo json_encode($data['detailTestimoni']);
        } else {
            $this->load->view('admin/testimoni/updateTestimoni', $data);
        }
    }

    public function saveUpdateTestimoni() {
        $arr = $this->m_admtestimoni->saveUpdateTestimoni();
        echo json_encode($arr);  
    } 
    
    public function deleteTestimoni($id) {
        $arr = $this->m_admtestimoni->deleteTestimoni($id);
        echo json_encode($arr);  
    } 
}