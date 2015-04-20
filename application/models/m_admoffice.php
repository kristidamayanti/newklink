<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_admoffice extends CI_Model {
    
	public function M_admoffice() {
        parent::__construct();      
	} 
	    
    public function getListOfficeAreaByParam($fieldName, $param, $type="array") {
        $param = str_replace("%20", " ", $param);     
        $qry = "SELECT * FROM office_area WHERE $fieldName = '$param'";
        return $this->getRecordset($qry, $type);
    }
    
    public function getListOfficeArea($type="array") {
        $qry = "SELECT id, areaname, createdt, createnm FROM office_area";
        return $this->getRecordset($qry, $type);
    }
    
    public function saveInputOfficeArea() {
        $data = $this->input->post(NULL, TRUE);
        $arr  = $this->setErrorMessage("json", "Office Area $data[areaname] is already exist..!!");
        $check = $this->validateBeforeInsert("office_area", "areaname", $data['areaname']);
        if($check == 0) {     
            $arr = $this->setErrorMessage("json", "Office Area $data[areaname] insert has failed..!!");
            $qry = "INSERT INTO office_area (areaname, ip, createdt, updatedt, createnm, updatenm) 
                    VALUES('$data[areaname]','$this->ip' ,'$this->datetime' , '$this->datetime', '".$this->sess[0]->username."', '".$this->sess[0]->username."')";
            $query = $this->db->query($qry);
            if($query > 0) {
                $arr = $this->setSuccessMessage("json", "Office Area $data[areaname] has been successfully inserted..!");
            }
            
        } 
        return $arr;
    }
    
    public function saveUpdateOfficeArea() {
        $data = $this->input->post(NULL, TRUE);
        $arr = $this->setErrorMessage("json", "Office Area $data[areaname] has failed to be updated..!!");
        $qry = "UPDATE office_area SET areaname = '$data[areaname]', updatenm = '".$this->sess[0]->username."', updatedt = '$date'
                WHERE id = '$data[id]'";
        $query = $this->db->query($qry);
        if($query > 0) {
            $arr = $this->setSuccessMessage("json", "Office Area $data[areaname] has been successfully changed..!!");
        }
        
        return $arr;
    }
    
    public function deleteOfficeArea($id) {
        $arr = $this->setErrorMessage("json", "This Office Area is used as FOREIGN KEY in table gallery records..!!");
        $check = $this->validateBeforeInsert("office", "areaid", $id);
        if($check == null) {
            $arr = $this->setErrorMessage("json", "Delete Office Area failed..!!");
			$qry = "DELETE FROM office_area WHERE id = '$id'";
            $query = $this->db->query($qry);
            if($query > 0) {
                $arr = $this->setSuccessMessage("json", "Delete Office Area success..!!");
            } 
        }
        return $arr;
    }
    
    
    public function getListOfficeByParam($fieldName, $param, $type="array") {
        $param = str_replace("%20", " ", $param);     
        $qry = "SELECT * FROM office WHERE $fieldName = '$param'";
        return $this->getRecordset($qry, $type);
    }
     
    public function saveInputOffice() {
        $data = $this->input->post(NULL, TRUE);
		$check = $this->validateBeforeInsert("office", "scode", $data['scode']);
        $arr = $this->setErrorMessage("json", "Office Code $data[scode] is already exist..!!");
        if($check == null) {
            $arr = $this->setErrorMessage("json", "Insert Office $data[scode] failed..!!");    
            $qry = "INSERT INTO office (scode, sname, type, country, city, address, zipcode, phone, fax, email,
                            web, mobile, online, note, image, act, ip_address, createdt, createnm, areaid)
                    VALUES ('$data[scode]', '$data[sname]', '$data[type]', '$data[country]', '$data[city]', '$data[address]', 
                            '$data[zipcode]', '$data[phone]', '$data[fax]', '$data[email]', '$data[web]',
                            '$data[mobile]', '$data[online]', '$data[note]', '".$_FILES["myfile"]["name"]."', '$data[act]',
                            '$this->ip', '$this->datetime', '".$this->sess[0]->username."', '$data[areaid]')";
            $query = $this->db->query($qry);
            if($query > 0) {
                $arr = $this->setSuccessMessage("json", "Insert Office success..!!");
            } 
        } 
        return $arr;
    }
    
    public function getListOffice($type="array") {
        $qry = "SELECT a.id, a.scode, a.city, a.areaid, b.areaname 
                FROM office a LEFT JOIN office_area b ON a.areaid = b.id";
        return $this->getRecordset($qry, $type);
    }
    
    public function saveUpdateOffice() {
        $data = $this->input->post(NULL, TRUE);
        $updImg = "";    
        if($_FILES["myfile"]["name"] != "") {
            $updImg = ", image = '".$_FILES["myfile"]["name"]."'";
        } 
        $arr = $this->setErrorMessage("json", "Office $data[scode] has failed to be updated..!!");
        $qry = "UPDATE office SET scode = '$data[scode]', sname = '$data[sname]', areaid = '$data[areaid]', type = '$data[type]', country = '$data[country]',
                      city = '$data[city]', address = '$data[address]', zipcode = '$data[zipcode]', phone = '$data[phone]',
                      fax = '$data[fax]', email = '$data[email]', web = '$data[web]', mobile = '$data[mobile]', online = '$data[online]',
                      note = '$data[note]', act = '$data[act]', updatenm = '".$this->sess[0]->username."', updatedt = '$this->datetime' 
                      $updImg
                WHERE id = '$data[id]'";
        //echo $qry;
        $query = $this->db->query($qry);
        if($query > 0) {
            $arr = $this->setSuccessMessage("json", "Office $data[scode] has been successfully changed..!!");
        }       
        return $arr;
    }
    
    public function deleteOffice($id) {
        $arr = $this->setErrorMessage("json", "Delete Office failed..!!");        
        $qry = "DELETE FROM office WHERE id = '$id'";
        $query = $this->db->query($qry);
        if($query > 0) {
            $arr = $this->setSuccessMessage("json", "Delete Office success..!!");
        } 
        return $arr;
    }
}