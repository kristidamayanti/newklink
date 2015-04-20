<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdmFaq extends CI_Controller {
    public function AdmFaq() {
        parent::__construct();
        $this->load->model('m_admfaq');
    }
	// UPDATED AT 15/10/2014
	/*-------------------------
	/* Category Question Module
	---------------------------*/
    public function getInputFaqCategory() {
		$sess = $this->nativesession->get('sessdata');
        if($sess[0]->username != null) {
           $data['form_header'] = "Input New FAQ Category";
           $data['form_action'] = base_url('/admFaq/getInputFaqCat');
           $data['icon'] = "icon-pencil";
           $this->setTemplate('admin/faq/getInputFaqCat', $data);
        } else {
           redirect('admin/index', 'refresh');
        } 
	}
    
    public function getFaqCatByParam($fieldName, $paramValue, $type="json") {
        $arr = $this->m_admfaq->getListFaqCatByParam($fieldName, $paramValue, $type);    
        if($type == "json") {
            echo json_encode($arr);
        }
    }
    
    public function getListFaqCat($type="array") {
        $data['list'] = $this->m_admfaq->getListFaqCat($type);    
        if($type == "json") {
            echo json_encode($data['list']);
        } else {
            $this->load->view('admin/faq/getListFaqCat', $data);
        }
    }
    
    public function saveInputFaqCat() {
        $arr = array("response" => "false", "message" => "Please check your data, required field must be filled");    
        if ($this->form_validation->run('saveFaqCat') == TRUE) {
            $arr = $this->m_admfaq->saveInputFaqCat();
        } 
        echo json_encode($arr); 
    }
    
    public function saveUpdateFaqCat() {
        $arr = $this->setValidationErrorMessage();
        if ($this->form_validation->run('saveFaqCat') == TRUE) {
            $arr = $this->m_admfaq->saveUpdateFaqCat();
        } 
        echo json_encode($arr);
    }
    
    public function deleteFaqCat($id) {
        $arr = $this->m_admfaq->deleteFaqCat($id);    
        echo json_encode($arr);
    }
    /*-------------------------
     * Question FAQ Module
     * ------------------------*/
    public function getInputFaq() {
        $sess = $this->nativesession->get('sessdata');
        if($sess[0]->username != null) {
           $data['form_header'] = "Input New Frequently Asked Question";
           $data['form_action'] = base_url('/admFaq/getInputFaq');
           $data['icon'] = "icon-pencil";
           $data['listCat'] = $this->m_admfaq->getListFaqCat("array");  
           $this->setTemplate('admin/faq/getInputFaq', $data);
        } else {
           redirect('admin/index', 'refresh');
        } 
    }
    
    public function saveInputFaq() {
        $arr = array("response" => "false", "message" => "Please check your data, required field must be filled");    
        if ($this->form_validation->run('saveFaq') == TRUE) {
            $arr = $this->m_admfaq->saveInputFaq();
        } 
        echo json_encode($arr); 
    }
    
    public function getListFaq($type = "array") {
        $data['listFaq'] = $this->m_admfaq->getListFaq($type);
        if($type == "json") {
             echo json_encode($data['listFaq']);
        } else {
             $this->load->view('admin/faq/getListFaq', $data);
        }      
    }
    
    public function getListFaqByParam($fieldName, $paramValue, $type="json") {
        $arr = $this->m_admfaq->getListFaqByParam($fieldName, $paramValue, $type);    
        if($type == "json") {
            echo json_encode($arr);
        }
    }
    
    
    public function saveUpdateFaq() {
        $arr = $this->setValidationErrorMessage();
        if ($this->form_validation->run('saveFaq') == TRUE) {
            $arr = $this->m_admfaq->saveUpdateFaq();
        } 
        echo json_encode($arr);
    }
    
    public function deleteFaq($id) {
        $arr = $this->m_admfaq->deleteFaq($id);    
        echo json_encode($arr);
    }
    
    // END UPDATED AT 15/10/2014
    
    /*-------------------------
     * Answers FAQ Module
     * ------------------------*/
    public function getInputAnswerFaq() {
        $sess = $this->nativesession->get('sessdata');
        if($sess[0]->username != null) {
           $data['form_header'] = "Input New Answer FAQ";
           $data['form_action'] = base_url('/admFaq/getInputAnswerFaq');
           $data['icon'] = "icon-pencil";
           $data['listFaq'] = $this->m_admfaq->getListFaq();
           $this->setTemplate('admin/faq/getInputAnswerFaq', $data);
        } else {
           redirect('admin/index', 'refresh');
        } 
    }
    
    public function saveInputAnswerFaq() {
        $arr = array("response" => "false", "message" => "Please check your data, required field must be filled");    
        if ($this->form_validation->run('saveFaqAnswer') == TRUE) {
            $arr = $this->m_admfaq->saveInputAnswerFaq();
        } 
        echo json_encode($arr); 
    }
    
    public function getListAnswerFaqByParam($fieldName, $paramValue, $type="json") {
        $arr = $this->m_admfaq->getListAnswerFaqByParam($fieldName, $paramValue, $type);    
        if($type == "json") {
            echo json_encode($arr);
        }
    }
    
    public function getListAnswerFaq($type = "array") {
        $data['listAnswer'] = $this->m_admfaq->getListAnswerFaq($type);
        if($type == "json") {
             echo json_encode($data['listAnswer']);
        } else {
             $this->load->view('admin/faq/getListAnswerFaq', $data);
        }      
    }
    
    
    public function saveUpdateAnswerFaq() {
        $arr = $this->setValidationErrorMessage();
        if ($this->form_validation->run('saveFaqAnswer') == TRUE) {
            $arr = $this->m_admfaq->saveUpdateAnswerFaq();
        } 
        echo json_encode($arr);
    }
    
    public function deleteAnswerFaq($id) {
        $arr = $this->m_admfaq->deleteAnswerFaq($id);    
        echo json_encode($arr);
    }
    
}