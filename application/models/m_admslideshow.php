<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_admslideshow extends CI_Model {
    public function M_admoffice() {
        parent::__construct();      
	} 
	
    public function getListSlideShowByParam($fieldName, $param, $type="array") {
        $param = str_replace("%20", " ", $param);       
        $qry = "SELECT * FROM slideshow WHERE $fieldName = '$param'";
        return $this->getRecordset($qry, $type);
    }
    
    public function getListSlideShow($type = "array") {
        $qry = "SELECT * FROM slideshow";
        return $this->getRecordset($qry, $type);
    }
	
	public function saveInputSlideShow() {
		$data = $this->input->post(NULL, TRUE);
        $arr  = $this->setErrorMessage("json", "Slideshow $data[title] is already exist..!!");
        $check = $this->validateBeforeInsert("slideshow", "title", $data['title']);
        if($check == 0) {   
            $arr = $this->setErrorMessage("json", "Slideshow $data[title] insert has failed..!!");
            $slide_desc = addslashes($data['slide_desc']);
            $qry = "INSERT INTO slideshow (title, url, description, image, img_desc, act, ip, tanggal) 
                    VALUES('$data[title]', '$data[url]', '$slide_desc', '".$_FILES["myfile"]["name"]."',
                           '$data[img_desc]', '$data[act]','$this->ip', '$this->datetime')";
            //echo $qry;
            $query = $this->db->query($qry);
            if($query > 0) {
                $arr = $this->setSuccessMessage("json", "Slideshow $data[title] has been successfully inserted..!");
            }
            
        } 
        return $arr;
	}
	
	public function saveUpdateSlideShow() {
		$data = $this->input->post(NULL, TRUE);
        $updImg = "";    
        if($_FILES["myfile"]["name"] != "") {
            $updImg = ", image = '".$_FILES["myfile"]["name"]."'";
        }       
        $slide_desc = addslashes($data['slide_desc']);
        $arr = $this->setErrorMessage("json", "Slideshow $data[title] has failed to be updated..!!");
        $qry = "UPDATE slideshow SET title = '$data[title]', url = '$data[url]', description = '$slide_desc', 
                        img_desc = '$data[img_desc]', act = '$data[act]' $updImg
                WHERE id = '$data[id]'";
        //echo $qry;
        $query = $this->db->query($qry);
        if($query > 0) {
            $arr = $this->setSuccessMessage("json", "Slideshow $data[title] has been successfully updated..!");
        }
            
        return $arr;
	}
	
	public function deleteSlideShow($id) {
		$arr = $this->setErrorMessage("json", "Delete Slideshow failed..!!");    
        $qry = "DELETE FROM slideshow WHERE id = '$id'";
        $query = $this->db->query($qry);
        if($query > 0) {
            $arr = $this->setSuccessMessage("json", "Delete Slideshow success..!!");
        } 
        return $arr;
	}
}
