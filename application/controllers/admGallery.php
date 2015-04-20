<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdmGallery extends CI_Controller {
    public function AdmGallery() {
        parent::__construct();
        $this->load->model('m_admgallery');
    }
    
    /*-----------------------------
     * GALLERY CATEGORIES MODULE 
     * ---------------------------*/
     
    public function getInputGalleryCat() {
        $sess = $this->nativesession->get('sessdata');
        if($sess[0]->username != null) {
           $data['form_header'] = "Input New Gallery Category";
           $data['form_action'] = base_url('/admGallery/getInputGalleryCat');
           $data['icon'] = "icon-pencil";
           $this->setTemplate('admin/gallery/getInputGalleryCat', $data);
        } else {
           redirect('admin/index', 'refresh');
        } 
    }
    
    public function getGalleryCatByID($id, $type="json") {
        $arr = $this->m_admgallery->getGalleryCatByID($id, $type);
        echo json_encode($arr);
    }
    
    public function getGalleryCatByParam($fieldName, $paramValue, $type="json") {
        $arr = $this->m_admgallery->getGalleryCatByParam($fieldName, $paramValue, $type);    
        if($type == "json") {
            echo json_encode($arr);
        }
    }
    
    public function saveInputGalleryCat() {
        $arr = array("response" => "false", "message" => "Please check your data, required field must be filled");    
        if ($this->form_validation->run('saveGalleryCat') == TRUE) {
            $arr = $this->m_admgallery->saveInputGalleryCat();
        } 
        echo json_encode($arr); 
    }
    
    public function getListGalleryCat($type = "array") {
        $data['listGalCat'] = $this->m_admgallery->getListGalleryCat($type);
        if($type == "json") {
             echo json_encode($data['listGalCat']);
        } else {
             $this->load->view('admin/gallery/getListGalleryCat', $data);
        }   
       
       
    }
    
    public function saveUpdateGalleryCat() {
        $arr = $this->setValidationErrorMessage();
        if ($this->form_validation->run('saveGalleryCat') == TRUE) {
            $arr = $this->m_admgallery->saveUpdateGalleryCat();
        } 
        echo json_encode($arr);
    }
    
    public function deleteGalleryCat($id) {
        $arr = $this->m_admgallery->deleteGalleryCat($id);    
        echo json_encode($arr);
    }
    
    /*-----------------------------
     * GALLERY MODULE 
     * ---------------------------*/
    public function getInputGallery() {
        $sess = $this->nativesession->get('sessdata');
        if($sess[0]->username != null) {
           $data['form_header'] = "Input New Gallery";
           $data['form_action'] = base_url('/admGallery/getInputGallery');
           $data['icon'] = "icon-pencil";
           $data['listGalCat'] = $this->m_admgallery->getListGalleryCat(); 
           $this->setTemplate('admin/gallery/getInputGallery', $data);
           
        } else {
           redirect('admin/index', 'refresh');
        } 
    }

    public function saveInputGallery() {
        $arr = $this->setValidationErrorMessage();
        if ($this->form_validation->run('saveGallery') == TRUE) {
            $arr = $this->m_admgallery->saveInputGallery();
			if($arr['response'] == "true" && $_FILES["myfile"]['error'] == 0) {
                  $dir = $this->setDirectoryUpload("gallery");
				  $img_name = $this->uploadFileImage($dir);
            }  
        } 
        echo json_encode($arr); 
    }

    public function getListGallery() {
        $data['listGal'] = $this->m_admgallery->getListGallery();    
        $this->load->view('admin/gallery/getListGallery', $data);    
    }
    
    public function getListGalleryByID($id, $type="json") {
        $data['listGal'] = $this->m_admgallery->getListGalleryByID($id, $type);    
        echo json_encode($data['listGal']);
       
    }
    
    public function saveUpdateGallery() {
        $arr = $this->setValidationErrorMessage();
        if ($this->form_validation->run('saveGallery') == TRUE) {
            $arr = $this->m_admgallery->saveUpdateGallery();
			if($arr['response'] == "true" && $_FILES["myfile"]['error'] == 0) {
                  $dir = $this->setDirectoryUpload("gallery");
				  $img_name = $this->uploadFileImage($dir);
            } 
        } 
        echo json_encode($arr);
    }
    
    public function deleteGallery($id) {
        $arr = $this->m_admgallery->deleteGallery($id);    
        echo json_encode($arr);
    }
    
}
    