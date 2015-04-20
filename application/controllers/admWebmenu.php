<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdmWebmenu extends CI_Controller {
    public function AdmWebmenu() {
        parent::__construct();
        $this->load->model('m_admwebmenu');
    }

    /*--------------------------------
     * WEB ROOT MENU
     --------------------------------*/
    public function getInputWebRootMenu() {
        $sess = $this->nativesession->get('sessdata');
        if($sess[0]->username != null) {
           $data['form_header'] = "Input Web Root Menu";
           $data['form_action'] = base_url('/admWebmenu/getInputWebRootMenu');
           $data['icon'] = "icon-pencil";
           $this->setTemplate('admin/webmenu/getInputWebRootMenu', $data);     
        } else {
           redirect('admin/index', 'refresh');
        } 
    }
    
    public function getListMenuByParam($field, $paramValue, $type = "json") {
        $arr = $this->m_admwebmenu->getListMenuByParam($field, $paramValue, $type);    
        if($type == "json") {
            echo json_encode($arr);
        }
    }
    
    public function getListRootMenu($type = "array") {
       $data['listRootMenu'] = $this->m_admwebmenu->getListRootMenu($type);
        if($type == "array") {
            $this->load->view('admin/webmenu/getListWebRootMenu', $data);
        }  else {
            echo json_encode($data['listRootMenu']);
        } 
    }
    
    public function saveInputRootMenu() {
        $arr = $this->setValidationErrorMessage();   
        if ($this->form_validation->run('WebMenu') == TRUE) {
            $arr = $this->m_admwebmenu->saveInputRootMenu();
        } 
        echo json_encode($arr);
    }

    public function saveUpdateRootMenu() {
        $arr = $this->setValidationErrorMessage();      
        if ($this->form_validation->run('WebMenu') == TRUE) {
            $arr = $this->m_admwebmenu->saveUpdateRootMenu();
        } 
        echo json_encode($arr);
    }
    
    public function deleteRootMenu($id, $type = "array") {
        $arr = $this->m_admwebmenu->deleteRootMenu($id, $type);    
        if($type == "json") {
            echo json_encode($arr);
        }
    }
    
    /*--------------------------------
     * WEB SUB MENU
     --------------------------------*/
    public function getInputWebSubMenu() {
        $sess = $this->nativesession->get('sessdata');
        if($sess[0]->username != null) {
           $data['form_header'] = "Input Web Sub Menu";
           $data['form_action'] = base_url('/admWebmenu/getInputWebRootMenu');
           $data['icon'] = "icon-pencil";
           $data['listRootMenu'] = $this->m_admwebmenu->getListRootMenu();
           $this->setTemplate('admin/webmenu/getInputWebSubMenu', $data);     
        } else {
           redirect('admin/index', 'refresh');
        } 
    }
    
    public function getListSubMenu($type = "array") {
        $data['listSubMenu'] = $this->m_admwebmenu->getListSubMenu($type);
        $this->load->view('admin/webmenu/getListWebSubMenu', $data);
    }
    
    public function getListSubMenuByParam($field, $paramValue, $type = "json") {
        $arr = $this->m_admwebmenu->getListSubMenuByParam($field, $paramValue, $type);    
        if($type == "json") {
            echo json_encode($arr);
        }
    }
    
    public function getListMenuByURL($controllerName, $function, $type="array") {
        $arr = $this->m_admwebmenu->getListMenuByURL($controllerName, $function, $type);    
        if($type == "json") {
            echo json_encode($arr);
        }
    }
    
    public function setCategoryByParentID($id, $type="json") {
        $arr = $this->m_admwebmenu->setCategoryByParentID($id, $type);    
        if($type == "json") {
            echo json_encode($arr);
        }
    }
    
    public function saveInputSubMenu() {
        $arr = $this->setValidationErrorMessage();      
        if ($this->form_validation->run('WebSubMenu') == TRUE) {
            $arr = $this->m_admwebmenu->saveInputSubMenu();
        } 
        echo json_encode($arr);
    }

    public function saveUpdateSubMenu() {
        $arr = $this->setValidationErrorMessage();      
        if ($this->form_validation->run('WebSubMenu') == TRUE) {
            $arr = $this->m_admwebmenu->saveUpdateSubMenu();
        } 
        echo json_encode($arr);
    }

    public function deleteSubMenu($id, $type = "array") {
        $arr = $this->m_admwebmenu->deleteSubMenu($id, $type);    
        if($type == "json") {
            echo json_encode($arr);
        }
    }
}