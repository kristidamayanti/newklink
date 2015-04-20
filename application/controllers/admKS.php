<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdmKS extends CI_Controller {

    public function AdmKS() {
        parent::__construct();
        $this->load->model('m_admks');
    }
    
    public function getImportSchedule() {
        $sess = $this->nativesession->get('sessdata');
        if($sess[0]->username != null) {
           $data['form_header'] = "Import K-System Schedule";
           $data['icon'] = "icon-pencil";
           $this->setTemplate('admin/ksystem/getImportSchedule', $data); 
        } else {
           redirect('admin/index', 'refresh');
        } 
    }
    
    public function readFromFile() {
        $this->load->library('csvreader');
        
        $fileName = $_FILES["myfile"]["tmp_name"];       
        $data['csvData'] = $this->csvreader->parse_file($fileName);
        $this->load->view('admin/ksystem/csv_view', $data);
        
    }
    
    public function saveImportSchedule() {
        $this->load->library('csvreader');
        $fileName = $_FILES["myfile"]["tmp_name"];       
        $csvData = $this->csvreader->parse_file($fileName);
        $arr = $this->m_admks->saveImportSchedule($csvData);  
        echo "Total Data in file    : $arr[jum]<br />";
        echo "Successfully inserted : $arr[success]<br />";
        echo "Failed to be inserted : $arr[fail]<br />";
    }
    
}