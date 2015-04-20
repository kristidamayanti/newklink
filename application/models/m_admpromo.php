<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_admpromo extends CI_Model {
	public function M_admpromo() {
        parent::__construct();      
	}
	
	public function getListPromoByParam($fieldName, $param, $type="array") {
        $param = str_replace("%20", " ", $param);       
        $qry = "SELECT $fieldName FROM promo WHERE $fieldName = '$param'";
        return $this->getRecordset($qry, $type);
    }
    
    public function getListPromo($type = "array") {
        $qry = "SELECT * FROM promo";
        return $this->getRecordset($qry, $type);
    }
	
	public function getListPromoByParam2($fieldName, $param, $type="array") {
        $param = str_replace("%20", " ", $param);       
        $qry = "SELECT id, title, url, description, 
		        DATE_FORMAT(stanggal,'%d/%m/%Y') as validFrom,
				DATE_FORMAT(stanggal,'%Y-%m-%d') as validFromReal,
				DATE_FORMAT(ftanggal,'%d/%m/%Y') as validTo,
				DATE_FORMAT(ftanggal,'%Y-%m-%d') as validToReal,
				image, act  
				FROM promo 
			    WHERE $fieldName = '$param'";
        return $this->getRecordset($qry, $type);
    }
	
	public function saveInputPromo() {
		$data = $this->input->post(NULL, TRUE);
        $arr  = $this->setErrorMessage("json", "Promo $data[title] is already exist..!!");
        $check = $this->validateBeforeInsert("promo", "title", $data['title']);
        if($check == 0) {
            $arr = $this->setErrorMessage("json", "Promo $data[title] insert has failed..!!");
            $detail = addslashes($data['descPromo']);
            $qry = "INSERT INTO promo (title, url, description, image, stanggal, ftanggal, act, ip, createnm, createdt) 
                    VALUES('$data[title]', '$data[url]', '$detail', '".$_FILES["myfile"]["name"]."', '$data[validFrom]', '$data[validTo]',
                           '$data[act]','$this->ip', '".$this->sess[0]->username."', '$this->datetime')";
            //echo $qry;
            $query = $this->db->query($qry);
            if($query > 0) {
                $arr = $this->setSuccessMessage("json", "Promo $data[title] has been successfully inserted..!");
            }			
        } 
        return $arr;
	}
	
	public function saveUpdatePromo() {
		$data = $this->input->post(NULL, TRUE);
        $updImg = "";    
        if($_FILES["myfile"]["name"] != "") {
            $updImg = ", image = '".$_FILES["myfile"]["name"]."'";
        } 
		$detail = addslashes($data['descPromo']);
        $arr = $this->setErrorMessage("json", "Promo $data[title] has failed to be updated..!!");
        $qry = "UPDATE promo SET title = '$data[title]', url = '$data[url]', description = '$detail', 
                        act = '$data[act]', stanggal = '$data[validFrom]', ftanggal = '$data[validTo]', 
						updatedt = '$this->datetime', updatenm = '".$this->sess[0]->username."' $updImg
                WHERE id = '$data[id]'";
        //echo $qry;
        $query = $this->db->query($qry);
        if($query > 0) {
            $arr = $this->setSuccessMessage("json", "Promo $data[title] has been successfully updated..!");
        } 
            
        return $arr;
	}
	
	public function deletePromo($id) {
		$arr = $this->setErrorMessage("json", "Delete Promo failed..!!");    
        $qry = "DELETE FROM promo WHERE id = '$id'";
        $query = $this->db->query($qry);
        if($query > 0) {
            $arr = $this->setSuccessMessage("json", "Delete Promo success..!!");
        } 
        return $arr;
	}
}