<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_admsyariah extends CI_Model {
    
    public function M_admsyariah() {
        parent::__construct();      
    } 
    
	public function getListSyariahByParam($fieldName, $param, $type="array") {
        $param = str_replace("%20", " ", $param);       
        $qry = "SELECT * FROM syariah WHERE $fieldName = '$param'";
        return $this->getRecordset($qry, $type);
    }
    
    public function getListSyariah($type="array") {
        $qry = "SELECT * FROM syariah";
        return $this->getRecordset($qry, $type);
    }
    
    public function saveInputSyariah() {
        $data = $this->input->post(NULL, TRUE);
        $arr  = $this->setErrorMessage("json", "Syariah Article with title : '$data[title]' is already exist..!!");
        $check = $this->validateBeforeInsert("syariah", "title", $data['title']);
        if($check == 0) {
            $detail = addslashes($data['detail']);
            $arr = $this->setErrorMessage("json", "Syariah Article $data[title] insert has failed..!!");
            $qry = "INSERT INTO syariah (title, detail, ip_address, createnm, createdt) 
                    VALUES('$data[title]', '$detail', '$this->ip' ,'".$this->sess[0]->username."' , '$this->datetime')";
            //echo $qry;
            $query = $this->db->query($qry);
            if($query > 0) {
                $arr = $this->setSuccessMessage("json", "Syariah Article with title : '$data[title]' has been successfully inserted..!");
            }
            
        } 
        return $arr;
    }
	
	public function saveUpdateSyariah() {
        $data = $this->input->post(NULL, TRUE);
        $arr = $this->setErrorMessage("json", "Syariah Article with title : '$data[title]' has failed to be updated..!!");
        $detail = addslashes($data['detail']);
        $qry = "UPDATE syariah SET title = '$data[title]', detail = '$detail', 
					createdt = '$this->datetime', updatenm = '".$this->sess[0]->username."'
                WHERE news_id = '$data[id]'";
        $query = $this->db->query($qry);
        if($query > 0) {
            $arr = $this->setSuccessMessage("json", "Syariah Article with title : '$data[title]' has been successfully changed..!!");
        }
        return $arr;
    }
    
    public function deleteSyariah($id) {
       
        $arr = $this->setErrorMessage("json", "Delete Syariah Article failed..!!");    
        $qry = "DELETE FROM syariah WHERE news_id = '$id'";
        $query = $this->db->query($qry);
        if($query > 0) {
            $arr = $this->setSuccessMessage("json", "Delete Syariah Article success..!!");
        } 
        return $arr;
    }
}