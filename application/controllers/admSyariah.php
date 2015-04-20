<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdmSyariah extends CI_Controller {
    public function AdmSyariah() {
        parent::__construct();
        $this->load->model('m_admsyariah');
    }
	public function getInputSyariah() {
        $sess = $this->nativesession->get('sessdata');
        if($sess[0]->username != null) {
           $data['form_header'] = "Input New Syariah Article";
           $data['form_action'] = base_url('/admSyariah/getInputSyariah');
           $data['icon'] = "icon-pencil";
           $this->setTemplate('admin/syariah/getInputSyariah', $data);
        } else {
           redirect('admin/index', 'refresh');
        } 
    }
	public function getInputSyariahAfterInput() {
		$data['form_action'] = base_url('/admSyariah/getInputSyariah');
		$this->load->view('admin/syariah/getInputSyariah', $data);
    }
    public function getListSyariahByParam($fieldName, $paramValue, $type="json") {
        $arr = $this->m_admsyariah->getListSyariahByParam($fieldName, $paramValue, $type);    
        if($type == "json") {
            echo json_encode($arr);
        }
    }
    
    public function getListSyariah($type = "array") {
        $data['listSyariah'] = $this->m_admsyariah->getListSyariah();    
        if($type == "json") {
            echo json_encode($data['listSyariah']);
        } else {
            $this->load->view('admin/syariah/getListSyariah', $data);
        }
        
    }
    
    public function saveInputSyariah() {
        $arr = $this->setValidationErrorMessage();    
        $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('detail', 'detail', 'trim|required|xss_clean');
        if ($this->form_validation->run() == TRUE) {
            $arr = $this->m_admsyariah->saveInputSyariah();
        } 
        echo json_encode($arr); 
    }
    
    public function saveUpdateSyariah() {
       $arr = $this->setValidationErrorMessage();    
        $this->form_validation->set_rules('title', 'title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('detail', 'detail', 'trim|required|xss_clean');
        if ($this->form_validation->run() == TRUE) {
            $arr = $this->m_admsyariah->saveUpdateSyariah();
        } 
        echo json_encode($arr); 
    }
    
    public function deleteSyariah($id) {
        $arr = $this->m_admsyariah->deleteSyariah($id);    
        echo json_encode($arr);
    }
	
	/*
	
    public function getInputSyariahCat() {
        $sess = $this->nativesession->get('sessdata');
        if($sess[0]->username != null) {
           $data['form_header'] = "Input New Syariah Category";
           $data['form_action'] = base_url('/admSyariah/getInputSyariahCat');
           $data['icon'] = "icon-pencil";
           
           $this->load->view('admin/syariah/getInputSyariahCat', $data);
            
        } else {
           redirect('admin/index', 'refresh');
        } 
    }
    
    public function getListSyariahCatByParam($fieldName, $paramValue, $type="json") {
        $arr = $this->m_admsyariah->getListSyariahCatByParam($fieldName, $paramValue, $type);    
        if($type == "json") {
            echo json_encode($arr);
        }
    }
    
    public function getListSyariahCat($type = "array") {
        $data['listSyariahCat'] = $this->m_admsyariah->getListSyariahCat();    
        if($type == "json") {
            echo json_encode($data['listSyariahCat']);
        } else {
            $this->load->view('admin/syariah/getListSyariahCat', $data);
        }
        
    }
    
    public function saveInputSyariahCat() {
       $arr = $this->setValidationErrorMessage();    
        $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
        if ($this->form_validation->run() == TRUE) {
            $arr = $this->m_admsyariah->saveInputSyariahCat();
        } 
        echo json_encode($arr); 
    }
    
    public function saveUpdateSyariahCat() {
       $arr = $this->setValidationErrorMessage();    
        $this->form_validation->set_rules('title', 'title', 'trim|required|xss_clean');
        if ($this->form_validation->run() == TRUE) {
            $arr = $this->m_admsyariah->saveUpdateSyariahCat();
        } 
        echo json_encode($arr); 
    }
    
    public function deleteSyariahCat($id) {
        $arr = $this->m_admsyariah->deleteSyariahCat($id);    
        echo json_encode($arr);
    } */
	
	
}