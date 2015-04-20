<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_admnews extends CI_Model {
	    
	public function M_admnews() {
        parent::__construct();      
    } 
    
	public function getListNewsCatByParam($fieldName, $param, $type="array") {
        $param = str_replace("%20", " ", $param);       
        $qry = "SELECT * FROM news_categories WHERE $fieldName = '$param'";
        return $this->getRecordset($qry, $type);
    }
    
    public function getListNewsCat($type="array") {
        //$qry = "SELECT * FROM news_categories";
        $qry = "SELECT id, title, DATE_FORMAT(createdt,'%d/%m/%Y') as createdt, createnm, act  
                FROM news_categories";
        return $this->getRecordset($qry, $type);
    }
    
    public function getListNewsCat2($type="array") {
        //$qry = "SELECT * FROM news_categories";
        $qry = "SELECT id, title FROM news_categories";
        return $this->getRecordset($qry, $type);
    }
    
    public function tes() {
        echo $this->getUsername();
    }
    
    public function saveInputNewsCat() {
        $data = $this->input->post(NULL, TRUE);
        $arr  = $this->setErrorMessage("json", "News Category $data[title] is already exist..!!");
        $check = $this->validateBeforeInsert("news_categories", "title", $data['title']);
        if($check == 0) {
            $arr = $this->setErrorMessage("json", "News Category $data[title] insert has failed..!!");
            $qry = "INSERT INTO news_categories (title, act, ip, createnm, createdt) 
                    VALUES('$data[title]', '$data[act]', '$this->ip', '".$this->sess[0]->username."' , '$this->datetime')";
            //echo $qry;
            $query = $this->db->query($qry);
            if($query > 0) {
                $arr = $this->setSuccessMessage("json", "News Category $data[title] has been successfully inserted..!");
            }
            
        } 
        return $arr;
    }
    
    public function saveUpdateNewsCat() {
        $data = $this->input->post(NULL, TRUE);
        $arr = $this->setErrorMessage("json", "News Category $data[title] has failed to be updated..!!");
        $qry = "UPDATE news_categories SET title = '$data[title]', act = '$data[act]', updatenm = '".$this->sess[0]->username."'
                WHERE id = '$data[id]'";
        $query = $this->db->query($qry);
        if($query > 0) {
            $arr = $this->setSuccessMessage("json", "News Category $data[title] has been successfully changed..!!");
        }
        
        return $arr;
    }
    
    public function deleteNewsCat($id) {
        $arr = $this->setErrorMessage("json", "This News Category is used as FOREIGN KEY in table News records..!!");
        $check = $this->validateBeforeInsert("news", "cat_id", $id);
        if($check == null) {
            $arr = $this->setErrorMessage("json", "Delete News Category failed..!!");    
            $qry = "DELETE FROM news_categories WHERE id = '$id'";
            $query = $this->db->query($qry);
            if($query > 0) {
                $arr = $this->setSuccessMessage("json", "Delete News Category success..!!");
            } 
        }
        return $arr;
    }
    
    public function getListNewsByParam($fieldName, $param, $type="array") {
        $param = str_replace("%20", " ", $param);     
        $qry = "SELECT * FROM news WHERE $fieldName = '$param'";
        return $this->getRecordset($qry, $type);
    }
    
    public function getListNews($type="array") {
        $qry = "SELECT a.id, a.title, b.title as categoryName, a.act
                FROM news a LEFT JOIN news_categories b
                ON (a.cat_id = b.id)";
        return $this->getRecordset($qry, $type);
    }
    
    /*public function getListNewsResult($type="array") {
        $qry = "SELECT a.id, a.title, b.title as categoryName
                FROM news a LEFT JOIN news_categories b
                ON (a.category = b.id)";
        return $this->getRecordset($qry, $type);
    }*/
    
    public function saveInputNews() {
        $data = $this->input->post(NULL, TRUE);
        $check = $this->validateBeforeInsert("news", "title", $data['title']);
        if($check == 0) {
            
            $correct_ip_address = $this->input->ip_address();   
            $arr = $this->setErrorMessage("json", "News $data[title] insert has failed..!!");
            $detail = addslashes($data['newsArticleDetail']);
			$url_filedownload = addslashes($_FILES["url_filedownload"]["name"]);
			$url_audio = addslashes($_FILES["url_audio"]["name"]);
            $qry = "INSERT INTO news (title, cat_id, news, image, act, ip,
                            tanggal, createnm, url_filedownload, url_video, url_audio) 
                    VALUES('$data[title]', '$data[cat_id]', '$detail', '".$_FILES["myfile"]["name"][0]."',
                           '$data[act]', '$this->ip', '$this->datetime', '".$this->sess[0]->username."',
                           '$url_filedownload', '$data[url_video]', '$url_audio')";
            //echo $qry;
            $query = $this->db->query($qry);
            $id = $this->db->insert_id(); 
            if($query > 0) {
                $arr = array("response" => "true", "id" => $id, "message" => "News $data[title] has been successfully inserted..!");
            } else {
                $arr = array("response" => "false", "message" => "News $data[title] is already exist..!!");
            }
            
        } 
        return $arr;
    }

    public function saveImagesProduct($id, $fileName, $imageTitle) {
        $insPic = "INSERT INTO news_gallery (nid, title, image, ip, tanggal, createnm) 
                   VALUES ($id, '$imageTitle', '$fileName', '$this->ip', '$this->date', '".$this->sess[0]->username."')";
        $query = $this->db->query($insPic);
    }
	
	public function geNewsByID($id, $type = "array") {
		$qry = "SELECT * FROM news WHERE id = '$id'";
        return $this->getRecordset($qry, $type);
	}
	
	public function getListNewsImage($id, $type = "array") {
		$qry = "SELECT title, image FROM news_gallery WHERE nid = '$id'";
        return $this->getRecordset($qry, $type);
	}
	
	public function deleteImagesNews($id) {
        $delPic = "DELETE FROM news_gallery WHERE nid = '$id'";
        $query = $this->db->query($delPic);
        return $query;
    }
    
    public function saveUpdateNews() {
        $data = $this->input->post(NULL, TRUE);
        $updImg = "";    
        if($_FILES["myfile"]["name"][0] != "") {
            $updImg = ", image = '".$_FILES["myfile"]["name"][0]."' ";
            $delImg = $this->deleteImagesNews($data['id']);	
        } 
		$url_filedownload = "";
		if($_FILES["url_filedownload"]["name"] != "") {
			$url_filedownload = ", url_filedownload = '".addslashes($_FILES["url_filedownload"]["name"])."' ";
		}
		$url_audio = "";
		if($_FILES["url_audio"]["name"] != "") {
			//$url_audio = addslashes($_FILES["url_audio"]["name"]);
			$url_audio = ", url_audio = '".addslashes($_FILES["url_audio"]["name"])."' ";
		}
        $detail = addslashes($data['newsArticleDetail']);
		//$url_filedownload = addslashes($_FILES["url_filedownload"]["name"]);
		//$url_audio = addslashes($_FILES["url_audio"]["name"]); 
        $arr = $this->setErrorMessage("json", "News $data[title] has failed to be updated..!!");
        
        $qry = "UPDATE news SET title = '$data[title]', cat_id = '$data[cat_id]', news = '$detail', 
                        act = '$data[act]', url_video = '$data[url_video]' $updImg $url_filedownload $url_audio
				WHERE id = '$data[id]'";
        //echo $qry;
        $query = $this->db->query($qry);
        if($query > 0) {
            //$arr = $this->setSuccessMessage("json", "News $data[title] has been successfully updated..!");
            $arr = array("response" => "true", "id" => $data['id'], "message" => "News $data[title] has been successfully updated..!");
        }
            
        return $arr;
    }
    
    public function deleteNews($id) {
        
        $this->db->trans_begin();
        $this->db->query("DELETE FROM news WHERE id = '$id'");
        $this->db->query("DELETE FROM news_gallery WHERE nid = '$id'");
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            $arr = $this->setErrorMessage("json", "Delete News failed..!!"); 
        }
        else
        {
            $this->db->trans_commit();
            $arr = $this->setSuccessMessage("json", "Delete News success..!!");
        }
        return $arr;
    }
}