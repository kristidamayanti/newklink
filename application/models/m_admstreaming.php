<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_admstreaming extends CI_Model {
    public function M_admstreaming() {
        parent::__construct();      
	} 
	 
    public function getListStreamingCatByParam($fieldName, $param, $type="array") {
        $param = str_replace("%20", " ", $param);       
        $qry = "SELECT * FROM streaming_categories WHERE $fieldName = '$param'";
        return $this->getRecordset($qry, $type);
    }
    
    public function getListStreamingCat($type="array") {
        $qry = "SELECT * FROM streaming_categories";
        return $this->getRecordset($qry, $type);
    }
    
    public function saveInputStreamingCat() {
        $data = $this->input->post(NULL, TRUE);     
        $arr  = $this->setErrorMessage("json", "Streaming Category $data[title] is already exist..!!");
        $check = $this->validateBeforeInsert("streaming_categories", "title", $data['title']);
        if($check == 0) {            
            $arr = $this->setErrorMessage("json", "Streaming Category $data[title] insert has failed..!!");
            $qry = "INSERT INTO streaming_categories (title, act, createnm, createdt) 
                    VALUES('$data[title]','$data[act]' ,'".$this->sess[0]->username."' , '$this->datetime')";
            //echo $qry;
            $query = $this->db->query($qry);
            if($query > 0) {
                $arr = $this->setSuccessMessage("json", "Streaming Category $data[title] has been successfully inserted..!");
            } 
        } 
        return $arr;
    }
    
    public function saveUpdateStreamingCat() {
        $data = $this->input->post(NULL, TRUE);
        $arr = $this->setErrorMessage("json", "Streaming Category $data[title] has failed to be updated..!!");
        $qry = "UPDATE streaming_categories SET title = '$data[title]', act = '$data[act]', updatenm = '".$this->sess[0]->username."', updatedt = '$this->datetime'
                WHERE id = '$data[id]'";
        $query = $this->db->query($qry);
        if($query > 0) {
            $arr = $this->setSuccessMessage("json", "Streaming Category $data[title] has been successfully changed..!!");
        }
        
        return $arr;
    }
    
    public function deleteStreamingCat($id) {
        $arr = $this->setErrorMessage("json", "This Streaming Category is used as FOREIGN KEY in table Streaming records..!!");
        $check = $this->validateBeforeInsert("streaming", "category", $id);
        if($check == null) {
            $arr = $this->setErrorMessage("json", "Delete Streaming Category failed..!!");    
            $qry = "DELETE FROM streaming_categories WHERE id = '$id'";
            $query = $this->db->query($qry);
            if($query > 0) {
                $arr = $this->setSuccessMessage("json", "Delete Streaming Category success..!!");
            } 
        }
        return $arr;
    }
    
    public function getListStreamingByParam($fieldName, $param, $type="array") {
        $param = str_replace("%20", " ", $param);     
        $qry = "SELECT * FROM streaming WHERE $fieldName = '$param'";
        return $this->getRecordset($qry, $type);
    }
    
    public function getListStreaming($type="array") {
        $qry = "SELECT a.id, a.title, b.title as categoryName
                FROM streaming a LEFT JOIN streaming_categories b
                ON (a.category = b.id)";
        return $this->getRecordset($qry, $type);
    }
    
    public function saveInputStreaming() {
        $data = $this->input->post(NULL, TRUE);     
        $arr  = $this->setErrorMessage("json", "Streaming $data[title] is already exist..!!");
        $check = $this->validateBeforeInsert("streaming", "title", $data['title']);
        if($check == 0) {
            $arr = $this->setErrorMessage("json", "Streaming $data[title] insert has failed..!!");
            $qry = "INSERT INTO streaming (category, title, description, image, 
                            youtube_url, duration, act, ip, tanggal, createnm) 
                    VALUES('$data[category]', '$data[title]', '$data[streaming_desc]', '".$_FILES["myfile"]["name"]."',
                           '$data[youtube_url]', '$data[duration]', '$data[act]', '$this->ip',
                           '$this->datetime', '".$this->sess[0]->username."' )";
            //echo $qry;
            $query = $this->db->query($qry);
            if($query > 0) {
                $arr = $this->setSuccessMessage("json", "Streaming $data[title] has been successfully inserted..!");
            }
        } 
        return $arr;
    }
    
    public function saveUpdateStreaming() {
        $data = $this->input->post(NULL, TRUE);  
        $updImg = "";
        if($_FILES["myfile"]["name"] != "") {
            $updImg = " , image = '".$_FILES["myfile"]["name"]."' ";
        }
		$arr = $this->setErrorMessage("json", "Streaming $data[title] has failed to be updated..!!"); 
        $qry = "UPDATE streaming SET category = '$data[category]', title = '$data[title]', description = '$data[streaming_desc]', 
                        youtube_url = '$data[youtube_url]', duration = '$data[duration]', act = '$data[act]' $updImg
                WHERE id = '$data[id]'";
        //echo $qry;
        $query = $this->db->query($qry);
        if($query > 0) {
            $arr = $this->setSuccessMessage("json", "Streaming $data[title] has been successfully updated..!");
        }    
        return $arr;
    }
    
    public function deleteStreaming($id) {
        $arr = $this->setErrorMessage("json", "Delete Streaming failed..!!");    
        $qry = "DELETE FROM streaming WHERE id = '$id'";
        $query = $this->db->query($qry);
        if($query > 0) {
            $arr = $this->setSuccessMessage("json", "Delete Streaming success..!!");
        } 
        return $arr;
    }
}
    