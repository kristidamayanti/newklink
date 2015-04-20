<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdmSlideshow extends CI_Controller {
    public function AdmSlideshow() {
        parent::__construct();
        $this->load->model('m_admslideshow');
    }
    
    public function getInputSlideShow() {
        $sess = $this->nativesession->get('sessdata');
        if($sess[0]->username != null) {
           $data['form_header'] = "Input New Slide Show";
           $data['form_action'] = base_url('/admSlideshow/getInputSlideShow');
           $data['icon'] = "icon-pencil";
           $this->setTemplate('admin/slideshow/getInputSlideShow', $data);
        } else {
           redirect('admin/index', 'refresh');
        } 
    }
    
    public function getListSlideShowByParam($fieldName, $paramValue, $type="json") {
        $arr = $this->m_admslideshow->getListSlideShowByParam($fieldName, $paramValue, $type);    
        if($type == "json") {
            echo json_encode($arr);
        }
    }
    
    public function saveInputSlideShow() {
        $arr = $this->setValidationErrorMessage();
        if ($this->form_validation->run('saveSlideShow') == TRUE) {
			$arr = $this->m_admslideshow->saveInputSlideShow();
            if($arr['response'] == "true" && $_FILES["myfile"]['error'] == 0) {
                  $dir = $this->setDirectoryUpload("slideshow", FALSE);
				  $img_name = $this->uploadFileImage($dir);
            } 
        } 
        echo json_encode($arr); 
    }

    public function getListSlideShow() {
        $data['listSlideShow'] = $this->m_admslideshow->getListSlideShow();    
        $this->load->view('admin/slideshow/getListSlideShow', $data);
       
    }
    
    public function saveUpdateSlideShow() {
        $arr = $this->setValidationErrorMessage();
        if ($this->form_validation->run('saveSlideShow') == TRUE) {
			$arr = $this->m_admslideshow->saveUpdateSlideShow();
            if($arr['response'] == "true" && $_FILES["myfile"]['error'] == 0) {
                  $dir = $this->setDirectoryUpload("slideshow", FALSE);
				  $img_name = $this->uploadFileImage($dir);
            }
        } 
        echo json_encode($arr);  
    }
    
    public function deleteSlideShow($id) {
        $arr = $this->m_admslideshow->deleteSlideShow($id);    
        echo json_encode($arr);
    }
}