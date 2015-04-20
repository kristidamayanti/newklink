<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdmOffice extends CI_Controller {
        
    public function AdmOffice() {
        parent::__construct();
        $this->load->model('m_admoffice');
    }  
    
    /*-----------------------------
     * OFFICE AREA MODUL
     -----------------------------*/
    public function getInputOfficeArea() {
        $sess = $this->nativesession->get('sessdata');
        if($sess[0]->username != null) {
           $data['form_header'] = "Input New Office Area";
           $data['form_action'] = base_url('/admOffice/getInputOfficeArea');
           $data['icon'] = "icon-pencil";           
           $this->setTemplate('admin/office/getInputOfficeArea', $data);           
        } else {
           redirect('admin/index', 'refresh');
        } 
    } 
    
    public function getListOfficeAreaByParam($fieldName, $param, $type="array") {
        $arr = $this->m_admoffice->getListOfficeAreaByParam($fieldName, $param, $type);    
        if($type == "json") {
            echo json_encode($arr);
        }
    }
    
    public function getListOfficeArea($type = "array") {
        $data['listOfficeArea'] = $this->m_admoffice->getListOfficeArea($type);    
        if($type == "json") {
            echo json_encode($data['listOfficeArea']);
        } else {
            $this->load->view('admin/office/getListOfficeArea', $data);
        }
    }
    
    public function saveInputOfficeArea() {
        $arr = $this->setValidationErrorMessage();
        $this->form_validation->set_rules('areaname', 'Area Name', 'trim|required|xss_clean');
        if ($this->form_validation->run() == TRUE) {
            $arr = $this->m_admoffice->saveInputOfficeArea();
        } 
        echo json_encode($arr); 
    }

    public function saveUpdateOfficeArea() {
        $arr = $this->setValidationErrorMessage();
        $this->form_validation->set_rules('areaname', 'Area Name', 'trim|required|xss_clean');
        if ($this->form_validation->run() == TRUE) {
            $arr = $this->m_admoffice->saveUpdateOfficeArea();
        } 
        echo json_encode($arr);
    }

    public function deleteOfficeArea($id) {
        $arr = $this->m_admoffice->deleteOfficeArea($id);    
        echo json_encode($arr);
    }
    
    /*-----------------------------
     * OFFICE MODUL
     -----------------------------*/
    public function getInputOffice() {
        $sess = $this->nativesession->get('sessdata');
        if($sess[0]->username != null) {
           $data['form_header'] = "Input New Office";
           $data['form_action'] = base_url('/admOffice/getInputOffice');
           $data['icon'] = "icon-pencil";
           $data['listArea'] = $this->m_admoffice->getListOfficeArea();    
           $this->setTemplate('admin/office/getInputOffice', $data);
        } else {
           redirect('admin/index', 'refresh');
        } 
    } 
    
    public function getListOfficeByParam($fieldName, $param, $type="array") {
        $arr = $this->m_admoffice->getListOfficeByParam($fieldName, $param, $type);    
        if($type == "json") {
            echo json_encode($arr);
        }
    }
    
    public function getListOffice() {
        $data['listOffice'] = $this->m_admoffice->getListOffice();    
        $this->load->view('admin/office/getListOffice', $data);
    }
    
    public function saveInputOffice() {
        $arr = $this->setValidationErrorMessage();
        if ($this->form_validation->run('saveOffice') == TRUE) {
            $arr = $this->m_admoffice->saveInputOffice();
            if($arr['response'] == "true" && $_FILES["myfile"]['error'] == 0) {
                  $dir = $this->setDirectoryUpload("office");
				  $img_name = $this->uploadFileImage($dir);
            } 
        } 
        echo json_encode($arr); 
    }
    

    public function saveUpdateOffice() {
        $arr = $this->setValidationErrorMessage();
        if ($this->form_validation->run('saveOffice') == TRUE) {
            $arr = $this->m_admoffice->saveUpdateOffice();
            if($arr['response'] == "true" && $_FILES["myfile"]['error'] == 0) {
                  $dir = $this->setDirectoryUpload("office");
				  $img_name = $this->uploadFileImage($dir);
            } 
        } 
        echo json_encode($arr);
    }

    public function deleteOffice($id) {
        $arr = $this->m_admoffice->deleteOffice($id);    
        echo json_encode($arr);
    }
    
}
    