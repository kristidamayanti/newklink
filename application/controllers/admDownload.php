<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdmDownload extends CI_Controller {
    public function AdmDownload() {
        parent::__construct();
        $this->load->model('m_admdownload');
    }
       
    /*-----------------------------
     * DOWNLOAD CATEGORIES MODULE 
     * ---------------------------*/
     
    public function getInputDownloadCat() {
        $sess = $this->nativesession->get('sessdata');
        if($sess[0]->username != null) {
           $data['form_header'] = "Input New Download Category";
           $data['form_action'] = base_url('/admGallery/getInputDownloadCat');
           $data['icon'] = "icon-pencil";
           $this->setTemplate('admin/download/getInputDownloadCat', $data);
        } else {
           redirect('admin/index', 'refresh');
        } 
    }
    
    public function getDownloadCatByParam($fieldName, $paramValue, $type="json") {
        $arr = $this->m_admdownload->getDownloadCatByParam($fieldName, $paramValue, $type);    
        if($type == "json") {
            echo json_encode($arr);
        }
    }
    
    public function saveInputDownloadCat() {
        $arr = $this->setValidationErrorMessage();
        $this->form_validation->set_rules('dCatTitle', 'Download Title', 'trim|required|xss_clean');
        if ($this->form_validation->run() == TRUE) {
            $arr = $this->m_admdownload->saveInputDownloadCat();
        } 
        echo json_encode($arr); 
    }
    
    public function getListDownloadCat() {
        $data['listDownloadCat'] = $this->m_admdownload->getListDownloadCat();    
        $this->load->view('admin/download/getListDownloadCat', $data);
    }
    
    public function saveUpdateDownloadCat() {
        $arr = $this->setValidationErrorMessage();
        $this->form_validation->set_rules('dCatTitle', 'Download Title', 'trim|required|xss_clean');
        if ($this->form_validation->run() == TRUE) {
            $arr = $this->m_admdownload->saveUpdateDownloadCat();
        } 
        echo json_encode($arr);
    }
    
    public function deleteDownloadCat($id) {
        $arr = $this->m_admdownload->deleteDownloadCat($id);    
        echo json_encode($arr);
    } 
    
    /*-----------------------------
     * DOWNLOAD MODULE 
     * ---------------------------*/
    
    public function getInputDownload() {
        $sess = $this->nativesession->get('sessdata');
        if($sess[0]->username != null) {
           $data['form_header'] = "Input New Download";
           $data['form_action'] = base_url('/admGallery/getInputDownloadCat');
           $data['icon'] = "icon-pencil";
           $data['listDownloadCat'] = $this->m_admdownload->getListDownloadCat();             
           $this->setTemplate('admin/download/getInputDownload', $data);           
        } else {
           redirect('admin/index', 'refresh');
        } 
    }
        
    public function getDownloadByParam($fieldName, $paramValue, $type="json") {
        $arr = $this->m_admdownload->getDownloadByParam($fieldName, $paramValue, $type);    
        if($type == "json") {
            echo json_encode($arr);
        }
    }
	
    public function saveInputDownload() {
        $arr = $this->setValidationErrorMessage();
        if ($this->form_validation->run('saveDownload') == TRUE) {
            $arr = $this->m_admdownload->saveInputDownload();
            if($arr['response'] == "true" && $_FILES["myfile"]['error'] == 0) {
                  $dir = $this->setDirectoryUpload("download");
				  $img_name = $this->uploadFileImage($dir);
            }  
        } 
        echo json_encode($arr); 
    }
    
   public function getListDownload() {
        $data['listDownload'] = $this->m_admdownload->getListDownload();    
        $this->load->view('admin/download/getListDownload', $data);
   }
   
   public function saveUpdateDownload() {
        $arr = $this->setValidationErrorMessage();
        if ($this->form_validation->run('saveDownload') == TRUE) {
            $arr = $this->m_admdownload->saveUpdateDownload();
            if($arr['response'] == "true" && $_FILES["myfile"]['error'] == 0) {
				$dir = $this->setDirectoryUpload("download");
				$img_name = $this->uploadFileImage($dir);
            }
        } 
        echo json_encode($arr);
   }
   
   public function deleteDownload($id) {
        $arr = $this->m_admdownload->deleteDownloadCat($id);    
        echo json_encode($arr);
    }
}