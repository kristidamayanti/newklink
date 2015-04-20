<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdmStreaming extends CI_Controller {
    public function AdmStreaming() {
        parent::__construct();
        $this->load->model('m_admstreaming');
    }
    
    /*-----------------------------
     * STREAMING CATEGORY MODUL
     -----------------------------*/
    public function getInputStreamingCat() {
        $sess = $this->nativesession->get('sessdata');
        if($sess[0]->username != null) {
           $data['form_header'] = "Input New Streaming";
           $data['form_action'] = base_url('/admStreaming/getInputStreamingCat');
           $data['icon'] = "icon-pencil";           
           $this->setTemplate('admin/streaming/getInputStreamingCat', $data);      
        } else {
           redirect('admin/index', 'refresh');
        } 
    }
    
    public function getListStreamingCatByParam($fieldName, $paramValue, $type="json") {
        $arr = $this->m_admstreaming->getListStreamingCatByParam($fieldName, $paramValue, $type);    
        if($type == "json") {
            echo json_encode($arr);
        }
    }
    
    public function getListStreamingCat($type = "array") {
        $data['listStreamingCat'] = $this->m_admstreaming->getListStreamingCat();    
        if($type == "json") {
            echo json_encode($data['listStreamingCat']);
        } else {
            $this->load->view('admin/streaming/getListStreamingCat', $data);
        }
        
    }
    
    public function saveInputStreamingCat() {
        $arr = $this->setValidationErrorMessage();
        $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
        if ($this->form_validation->run() == TRUE) {
            $arr = $this->m_admstreaming->saveInputStreamingCat();
        } 
        echo json_encode($arr); 
    }
    
    public function saveUpdateStreamingCat() {
        $arr = $this->setValidationErrorMessage();
        $this->form_validation->set_rules('title', 'title', 'trim|required|xss_clean');
        if ($this->form_validation->run() == TRUE) {
            $arr = $this->m_admstreaming->saveUpdateStreamingCat();
        } 
        echo json_encode($arr); 
    }
    
    public function deleteStreamingCat($id) {
        $arr = $this->m_admstreaming->deleteStreamingCat($id);    
        echo json_encode($arr);
    }
    
    
    /*-----------------------------
     * STREAMING  MODUL
     -----------------------------*/
    public function getInputStreaming() {
        $sess = $this->nativesession->get('sessdata');
        if($sess[0]->username != null) {
           $data['form_header'] = "Input New Streaming";
           $data['form_action'] = base_url('/admStreaming/getInputStreaming');
           $data['icon'] = "icon-pencil";
           $data['listStreamingCat'] = $this->m_admstreaming->getListStreamingCat();         
           $this->setTemplate('admin/streaming/getInputStreaming', $data);          
        } else {
           redirect('admin/index', 'refresh');
        } 
    }
    
    public function getListStreamingByParam($fieldName, $paramValue, $type="json") {
        $arr = $this->m_admstreaming->getListStreamingByParam($fieldName, $paramValue, $type);    
        if($type == "json") {
            echo json_encode($arr);
        }
    }
    
    public function getListStreaming($type = "array") {
        $data['listStreaming'] = $this->m_admstreaming->getListStreaming();   
        if($type == "json") {
            echo json_encode($data['listStreaming']);
        } else {
            $this->load->view('admin/streaming/getListStreaming', $data);    
        }  
    }
    
    public function saveInputStreaming() {
        $arr = $this->setValidationErrorMessage();
        if ($this->form_validation->run('saveStreaming') == TRUE) {
            $arr = $this->m_admstreaming->saveInputStreaming();
            if($arr['response'] == "true" && $_FILES["myfile"]['error'] == 0) {
                  $dir = $this->setDirectoryUpload("streaming");
				  $img_name = $this->uploadFileImage($dir);
            } 
        } 
        echo json_encode($arr); 
    }
    
    public function saveUpdateStreaming() {
        $arr = $this->setValidationErrorMessage();
        if ($this->form_validation->run('saveStreaming') == TRUE) {
            $arr = $this->m_admstreaming->saveUpdateStreaming();
            if($arr['response'] == "true" && $_FILES["myfile"]['error'] == 0) {
                  $dir = $this->setDirectoryUpload("streaming");
				  $img_name = $this->uploadFileImage($dir);
            } 
        } 
        echo json_encode($arr); 
    }
    
    public function deleteStreaming($id) {
        $arr = $this->m_admstreaming->deleteStreaming($id);    
        echo json_encode($arr);
    }
    
       
}