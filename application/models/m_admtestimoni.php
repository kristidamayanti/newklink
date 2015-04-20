<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_admtestimoni extends CI_Model {
        
    public function M_admtestimoni() {
        parent::__construct();      
    }
	
    function getListAllTestimoni($type = "array") {
        $qry = "SELECT id, name, testimonial, act FROM testimonial";
        return $this->getRecordset($qry, $type);
    }
    
    function getListProduct($type = "array") {
        $qry = "SELECT id, title FROM product";
        return $this->getRecordset($qry, $type);
    }
    
    function searchTestimoni($type = "array") {
        $data = $this->input->post(NULL, TRUE);    
        $qry = "SELECT id, name, testimonial, act 
                FROM testimonial
                WHERE act = '$data[act]' AND tanggal BETWEEN '$data[validFrom]' and '$data[validTo]'";
        //echo $qry;
        return $this->getRecordset($qry, $type);
    }
    
    function getUpdateTestimoni($id, $type = "array") {
        $qry = "SELECT id, location, name, testimonial, act, pid 
                FROM testimonial WHERE id = '$id'";
        //echo $qry;
        return $this->getRecordset($qry, $type);
    }

    function saveInputTestimoni() {
        $data = $this->input->post(NULL, TRUE);
        $testimonial = addslashes($data['testimonial']);
        $location = addslashes($data['location']);
        $name = addslashes($data['name']);
        $arr = $this->setErrorMessage("json", "Insert testimonial from $name has failed..!!");
        $qry = "INSERT INTO testimonial (name, location, pid, testimonial, act, ip, tanggal) 
                VALUES('$name', '$location', '$data[pid]', '$testimonial',  '$data[act]', '$this->ip' , '$this->datetime')";
        //echo $qry;
        $query = $this->db->query($qry);
        if($query > 0) {
            $arr = $this->setSuccessMessage("json", "Insert testimonial from $name success..!");
        }
        return $arr;
    }

    function saveUpdateTestimoni() {
        $data = $this->input->post(NULL, TRUE);
        $arr = $this->setErrorMessage("json", "Testimonial has failed to be updated..!!");
        $testimonial = addslashes($data['testimonial']);
        $location = addslashes($data['location']);
        $name = addslashes($data['name']);
        $qry = "UPDATE testimonial SET testimonial = '$testimonial', name = '$name', 
                       location = '$location', act = '$data[act]', pid = '$data[pid]'
                WHERE id = '$data[id]'";
        //echo $qry;
        $query = $this->db->query($qry);
        if($query > 0) {
            $arr = $this->setSuccessMessage("json", "Testimonial has been successfully changed..!!");
        }
        return $arr;
    }
    
    function deleteTestimoni($id) {
        $arr = $this->setErrorMessage("json", "Delete Testimonial failed..!!");    
        $qry = "DELETE FROM testimonial WHERE id = '$id'";
        $query = $this->db->query($qry);
        if($query > 0) {
            $arr = $this->setSuccessMessage("json", "Delete Testimonial success..!!");
        } 
        return $arr;
    }
}