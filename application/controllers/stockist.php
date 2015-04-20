<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of presdir
 *
 * @author sahid
 */
class stockist extends CI_Controller{
    //put your code here
    private $urlConfig = "html_config";
    private $urlReturn = "";
    
    public function __construct() {
        parent::__construct();
        $this->urlReturn = get_class($this);
        $this->load->model('stockist_area_model','area');
        $this->load->model('stockist_model','stockis');
    }
        
    public function index() {
        $param = array('where' => 'areaid = 1');
                
        $data['mHeader'] = $this->menu_model->getHeaderMenu();
        $data['mChild'] = $this->menu_model->getChildMenu();
        $data['area'] = $this->area->gets();
        $data['stockis'] = $this->stockis->gets($param);
        
        $this->load->view('html_config');
        $this->load->view($this->urlReturn, $data);
    }
    
    public function area($id = null) {
        
        if(!isset($id)):
            $id = 1;
        endif;
        
        $param = array('where' => 'areaid ='.$id);
                
        $data['mHeader'] = $this->menu_model->getHeaderMenu();
        $data['mChild'] = $this->menu_model->getChildMenu();
        $data['area'] = $this->area->gets();
        $data['stockis'] = $this->stockis->gets($param);
        
        $this->load->view('html_config');
        $this->load->view($this->urlReturn, $data);
    }
}
