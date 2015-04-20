<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_admgallery extends CI_Model {

    //private $date, $sess, $ip;
	
	public function M_admgallery() {
        parent::__construct();      
	} 
	
	public function getGalleryCatByID($id, $type="array") {
        $qry = "SELECT * FROM gallery_categories WHERE gid = '$id'";
        return $this->getRecordset($qry, $type);
    }
    
    public function getGalleryCatByParam($fieldName, $paramValue, $type = "array") {
        $paramValue = str_replace("%20", " ", $paramValue);        
        $qry = "SELECT * FROM gallery_categories WHERE $fieldName = '$paramValue'";
        return $this->getRecordset($qry, $type);
    }
    
    public function getListGalleryCat($type = "array") {
        $qry = "SELECT id, gid, title, act FROM gallery_categories";
        return $this->getRecordset($qry, $type);
    }
    
    public function saveInputGalleryCat() {
        $data = $this->input->post(NULL, TRUE);
        $arr  = $this->setErrorMessage("json", "Gallery Category $data[gCatTitle] is already exist..!!");
        $check = $this->validateBeforeInsert("gallery_categories", "gid", $data['gid']);
        if($check == 0) {   
            $arr = $this->setErrorMessage("json", "Gallery Category $data[gCatTitle] insert has failed..!!");
            $qry = "INSERT INTO gallery_categories (gid, title, createdt, ip_address, createnm, updatenm) 
                    VALUES('$data[gid]','$data[gCatTitle]' ,'$this->date' , '$this->ip', 
					'".$this->sess[0]->username."', '".$this->sess[0]->username."')";
            //echo $qry;
			$query = $this->db->query($qry);
            if($query > 0) {
                $arr = $this->setSuccessMessage("json", "Gallery Category $data[gCatTitle] has been successfully inserted..!");
            }
        } 
        return $arr;
    }

    public function saveUpdateGalleryCat() {
        $data = $this->input->post(NULL, TRUE);
        $arr = $this->setErrorMessage("json", "Gallery Categories $data[gCatTitle] has failed to be updated..!!");
        $qry = "UPDATE gallery_categories SET title = '$data[gCatTitle]', updatenm = '".$this->sess[0]->username."'
                WHERE id = '$data[id]'";
        $query = $this->db->query($qry);
        if($query > 0) {
            $arr = $this->setSuccessMessage("json", "Gallery Categories $data[gCatTitle] has been successfully changed..!!");
        }
        return $arr;
    }
    
    public function deleteGalleryCat($id) {
        $arr = $this->setErrorMessage("json", "This Gallery Category is used as FOREIGN KEY in table gallery records..!!");
        $check = $this->validateBeforeInsert("gallery", "gid", $id);
        if($check == null) {
            $arr = $this->setErrorMessage("json", "Delete Gallery Category failed..!!");
			$qry = "DELETE FROM gallery_categories WHERE id = '$id'";
            $query = $this->db->query($qry);
            if($query > 0) {
                $arr = $this->setSuccessMessage("json", "Delete Gallery Category success..!!");
            } 
        }
        return $arr;
    }
    
    public function saveInputGallery() {
        $data = $this->input->post(NULL, TRUE);
        $arr = $this->setErrorMessage("json", "Gallery $data[title] insert has failed..!!");
        $qry = "INSERT INTO gallery(gid, title, description, image, act, 
                       ip, tanggal, createnm, updatenm) 
                VALUES('$data[gid]','$data[title]' ,'$data[gallery_desc]' , '".$_FILES["myfile"]["name"]."', '$data[act]', 
                        '$this->ip', '$this->date', '".$this->sess[0]->username."', '".$this->sess[0]->username."')";
        
        $query = $this->db->query($qry);
        if($query > 0) {
            $arr = $this->setSuccessMessage("json", "Gallery $data[title] has been successfully inserted..!");
        }
         
        return $arr;
    }
    
    public function getListGallery($type = "array") {
        $qry = "SELECT a.id, a.title, b.title as catTitle 
                FROM gallery a LEFT JOIN gallery_categories b ON (a.gid = b.id)";
        return $this->getRecordset($qry, $type);
    }
    
    public function getListGalleryByID($id, $type) {
        $qry = "SELECT * FROM gallery a WHERE a.id = '$id'";
        return $this->getRecordset($qry, $type);
    }
    
    public function saveUpdateGallery() {
        $updImg = "";    
        if($_FILES["myfile"]["name"] != "") {
            $updImg = ", image = '".$_FILES["myfile"]["name"]."'";
        }       
        $data = $this->input->post(NULL, TRUE);
        $arr = $this->setErrorMessage("json", "Gallery $data[title] has failed to be updated..!!");
        $qry = "UPDATE gallery SET gid = '$data[gid]', title = '$data[title]', description = '$data[gallery_desc]',
                       act = '$data[act]', updatenm = '".$this->sess[0]->username."' $updImg
                WHERE id = '$data[id]'";
        $query = $this->db->query($qry);
        if($query > 0) {
            $arr = $this->setSuccessMessage("json", "Gallery $data[title] has been successfully changed..!!");
        }
        
        return $arr;
    }
    
    public function deleteGallery($id) {
        $arr = $this->setErrorMessage("json", "Delete Gallery failed..!!");
        $qry = "DELETE FROM gallery WHERE id = '$id'";
        $query = $this->db->query($qry);
        if($query > 0) {
            $arr = $this->setSuccessMessage("json", "Delete Gallery success..!!");
        } 
        return $arr;
    }
}