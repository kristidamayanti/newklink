<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_admdownload extends CI_Model {
        
    public function getDownloadCatByParam($fieldName, $paramValue, $type = "array") {
        $paramValue = str_replace("%20", " ", $paramValue);        
        $qry = "SELECT * FROM download_categories WHERE $fieldName = '$paramValue'";
        return $this->getRecordset($qry, $type);
    }
    
    public function saveInputDownloadCat() {
        $data = $this->input->post(NULL, TRUE);
        
        $arr  = $this->setErrorMessage("json", "Download Category $data[dCatTitle] is already exist..!!");
        $check = $this->validateBeforeInsert("download_categories", "title", $data['dCatTitle']);
        if($check == 0) {
               
            $arr = $this->setErrorMessage("json", "Gallery Category $data[dCatTitle] insert has failed..!!");
            $qry = "INSERT INTO download_categories (title, act, createdt, ip_address, createnm, updatenm) 
                    VALUES('$data[dCatTitle]' , '$data[act]', '$this->date' , '$this->ip', '".$sess[0]->username."', '".$sess[0]->username."')";
            //echo $qry;
            $query = $this->db->query($qry);
            if($query > 0) {
                $arr = $this->setSuccessMessage("json", "Download Category $data[dCatTitle] has been successfully inserted..!");
            }
            
        } 
        return $arr;
    }

    public function getListDownloadCat($type = "array") {
        $qry = "SELECT * FROM download_categories";
        return $this->getRecordset($qry, $type);
    } 
    
    public function saveUpdateDownloadCat() {
        $data = $this->input->post(NULL, TRUE);
        
        //$arr  = $this->setErrorMessage("json", "Download Category $data[dCatTitle] is already exist..!!");
        
        $arr = $this->setErrorMessage("json", "Download Categories $data[dCatTitle] has failed to be updated..!!");    
        $qry = "UPDATE download_categories SET title = '$data[dCatTitle]', updatenm = '".$sess[0]->username."', act = ".$data['act']."
                WHERE did = '$data[id]'";
        $query = $this->db->query($qry);
        if($query > 0) {
            $arr = $this->setSuccessMessage("json", "Download Categories $data[dCatTitle] has been successfully changed..!!");
        }
       
        return $arr;
    }
    
    public function deleteDownloadCat($id) {
        $arr = $this->setErrorMessage("json", "Delete Download Category failed..!!");
        $check = $this->validateBeforeInsert("download", "did", $id);
        if($check == null) {
            $qry = "DELETE FROM download_categories WHERE did = '$id'";
            $query = $this->db->query($qry);
            if($query > 0) {
                $arr = $this->setSuccessMessage("json", "Delete Download Category success..!!");
            } 
        }
        else {
            $arr = $this->setErrorMessage("json", "This Download Category is used as FOREIGN KEY in table download records..!!");
        }
        return $arr;
    }
    
    
    public function getDownloadByParam($fieldName, $paramValue, $type = "array") {
        $paramValue = str_replace("%20", " ", $paramValue);        
        $qry = "SELECT * FROM download WHERE $fieldName = '$paramValue'";
        return $this->getRecordset($qry, $type);
    }
    
    public function saveInputDownload() {
        $data = $this->input->post(NULL, TRUE);
            
        $arr = $this->setErrorMessage("json", "Insert Download $data[title] has failed..!!");
        $qry = "INSERT INTO download (title, description, file, download, hits, act, ip, tanggal, did) 
                VALUES('$data[title]' , '$data[download_desc]', '".$_FILES["myfile"]["name"]."' ,
                '$data[download]', '$data[hits]', '$data[act]', '$this->ip', '$this->datetime', '$data[did]')";
        //echo $qry;
        $query = $this->db->query($qry);
        if($query > 0) {
            $arr = $this->setSuccessMessage("json", "Download $data[title] has been successfully inserted..!");
        }
            
        
        return $arr;
    }
    
    public function getListDownload($type = "array") {
        $qry = "SELECT a.id, a.title, b.title as categoryTitle
                FROM download a LEFT JOIN download_categories b
                ON (a.did = b.did)";
        return $this->getRecordset($qry, $type);
    }
    
    public function saveUpdateDownload() {
        $file = "";    
        if($_FILES["myfile"]["name"] != "") {
            $file .= ", file = '".$_FILES["myfile"]["name"]."'";
        } 
        $data = $this->input->post(NULL, TRUE);
          
        $arr = $this->setErrorMessage("json", "Download $data[title] has failed to be updated..!!");    
        $qry = "UPDATE download SET title = '$data[title]', did = '$data[did]', description = '$data[download_desc]',
                       download = '$data[download]', hits = '$data[hits]', act = '$data[act]' $file 
                WHERE id = '$data[id]'";
        $query = $this->db->query($qry);
        if($query > 0) {
            $arr = $this->setSuccessMessage("json", "Download  $data[title] has been successfully changed..!!");
        }
       
        return $arr;
    }
    
    public function deleteDownload($id) {
        $arr = $this->setErrorMessage("json", "Delete Download failed..!!");
        $qry = "DELETE FROM download WHERE id = '$id'";
        $query = $this->db->query($qry);
        if($query > 0) {
            $arr = $this->setSuccessMessage("json", "Delete Download success..!!");
        } 
        return $arr;
    }
}
   