<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdmPromo extends CI_Controller {
    public function AdmPromo() {
        parent::__construct();
        $this->load->model('m_admpromo');
    }
    
    public function getInputPromo() {
        $sess = $this->nativesession->get('sessdata');
        if($sess[0]->username != null) {
           $data['form_header'] = "Input New Promo";
           $data['form_action'] = base_url('/admPromo/getInputPromo');
           $data['icon'] = "icon-pencil";
           $this->setTemplate('admin/promo/getInputPromo', $data);
        } else {
           redirect('admin/index', 'refresh');
        } 
    }
	
	public function getListPromoByParam($fieldName, $paramValue, $type="json") {
        $arr = $this->m_admpromo->getListPromoByParam($fieldName, $paramValue, $type);    
        if($type == "json") {
            echo json_encode($arr);
        }
    }
    
    public function getListPromoByParam2($fieldName, $paramValue, $type="json") {
        $arr = $this->m_admpromo->getListPromoByParam2($fieldName, $paramValue, $type);    
        if($type == "json") {
            echo json_encode($arr);
        }
    }
    
    public function saveInputPromo() {
        $arr = $this->setValidationErrorMessage();    
        if ($this->form_validation->run('savePromo') == TRUE) {
			$arr = $this->m_admpromo->saveInputPromo();
            if($arr['response'] == "true" && $_FILES["myfile"]['error'] == 0) {
                  $dir = $this->setDirectoryUpload("promo");
				  $img_name = $this->uploadFileImage($dir);
            } 
        } 
        echo json_encode($arr); 
    }
	
	public function getListPromo() {
        $data['listPromo'] = $this->m_admpromo->getListPromo();    
        $this->load->view('admin/promo/getListPromo', $data);
       
    }
    
    public function saveUpdatePromo() {
        $arr = $this->setValidationErrorMessage();    
        if ($this->form_validation->run('savePromo') == TRUE) {
			$arr = $this->m_admpromo->saveUpdatePromo();
            if($arr['response'] == "true" && $_FILES["myfile"]['error'] == 0) {
                  $dir = $this->setDirectoryUpload("promo");
				  $img_name = $this->uploadFileImage($dir);
            } 
        } 
        echo json_encode($arr);  
    }
    
    public function deletePromo($id) {
        $arr = $this->m_admpromo->deletePromo($id);    
        echo json_encode($arr);
    }
}