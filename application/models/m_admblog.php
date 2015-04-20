<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_admblog extends CI_Model {
        
    public function M_admblog() {
        parent::__construct();      
    } 
    
    public function getListBlogTypeByParam($fieldName, $param, $type="array") {
        $param = str_replace("%20", " ", $param);       
        $qry = "SELECT * FROM blog_type WHERE $fieldName = '$param'";
        return $this->getRecordset($qry, $type);
    }
    
    public function getListBlogType($type="array") {
        //$qry = "SELECT * FROM blog_type";
        $qry = "SELECT * FROM blog_type";
        return $this->getRecordset($qry, $type);
    }
	
	public function getListBlogType2($type="array") {
        $qry = "SELECT bl_type, bl_name FROM blog_type";
        return $this->getRecordset($qry, $type);
    }
    
    public function saveInputBlogType() {
        $data = $this->input->post(NULL, TRUE);
        $arr  = $this->setErrorMessage("json", "Blog Type $data[bl_name] is already exist..!!");
        $check = $this->validateBeforeInsert("blog_type", "bl_type", $data['bl_type']);
        $check2 = $this->validateBeforeInsert("blog_type", "bl_name", $data['bl_name']);
        if($check == 0) {
            $arr = $this->setErrorMessage("json", "Blog Type $data[bl_name] insert has failed..!!");
            $qry = "INSERT INTO blog_type (bl_type, bl_name, ip_address) 
                    VALUES('$data[bl_type]', '$data[bl_name]', '$this->ip')";
            //echo $qry;
            $query = $this->db->query($qry);
            if($query > 0) {
                $arr = $this->setSuccessMessage("json", "Blog Type $data[bl_name] has been successfully inserted..!");
            }
            
        } 
        return $arr;
    }
    
    public function saveUpdateBlogType() {
        $data = $this->input->post(NULL, TRUE);
        $arr = $this->setErrorMessage("json", "Blog Type $data[bl_name] has failed to be updated..!!");
        $qry = "UPDATE blog_type SET bl_name = '$data[bl_name]'
                WHERE id = '$data[id]'";
        $query = $this->db->query($qry);
        if($query > 0) {
            $arr = $this->setSuccessMessage("json", "Blog Type $data[bl_name] has been successfully changed..!!");
        }
        
        return $arr;
    }
    
    public function deleteBlogType($id) {
        $arr = $this->setErrorMessage("json", "This Blog Type is used as FOREIGN KEY in table Blog records..!!");
        $check = $this->validateBeforeInsert("blog", "bl_type", $id);
        if($check == null) {
            $arr = $this->setErrorMessage("json", "Delete Blog Type failed..!!");    
            $qry = "DELETE FROM blog_type WHERE bl_type = '$id'";
            $query = $this->db->query($qry);
            if($query > 0) {
                $arr = $this->setSuccessMessage("json", "Delete Blog Type success..!!");
            } 
        }
        return $arr;
    }
    
    public function getListBlogByParam($fieldName, $param, $type="array") {
        $param = str_replace("%20", " ", $param);     
        $qry = "SELECT * FROM blog WHERE $fieldName = '$param'";
        return $this->getRecordset($qry, $type);
    }
    
    public function getListBlogByParam2($fieldName, $param, $type="array") {
        $param = str_replace("%20", " ", $param);     
        $qry = "SELECT a.id, a.bl_name FROM Blog a 
                LEFT OUTER JOIN blog_related b ON (a.id = b.bl_id)
                WHERE $fieldName = '$param'AND a.id IS NOT NULL AND b.bl_id is NULL";
        return $this->getRecordset($qry, $type);
    }
    
    public function getListBlog($type="array") {
        $qry = "SELECT a.id, a.bl_name, b.bl_name as blogTypeName, a.flag_recommend, a.bl_act, DATE_FORMAT(a.createdt,'%d/%m/%Y') as createdt
                FROM blog a LEFT JOIN blog_type b
                ON (a.bl_type = b.bl_type)";
        return $this->getRecordset($qry, $type);
    }
    
    /*public function getListBlogResult($type="array") {
        $qry = "SELECT a.id, a.bl_title, b.bl_title as categoryName
                FROM Blog a LEFT JOIN Blog_categories b
                ON (a.category = b.id)";
        return $this->getRecordset($qry, $type);
    }*/
    
    public function saveInputBlog() {
        $data = $this->input->post(NULL, TRUE);
        
        $arr = $this->setErrorMessage("json", "Blog $data[bl_name] insert has failed..!!");
        
        $bl_content = addslashes($data['bl_content']);
        $bl_quote   = addslashes($data['bl_quote']);
        $bl_title   = addslashes($data['bl_title']);
        $bl_name    = addslashes($data['bl_name']);
        $bl_fb      = addslashes($data['bl_fb']);
        $bl_twitter = addslashes($data['bl_twitter']);
        $qry = "INSERT INTO blog (bl_name, bl_title, bl_quote, bl_content, bl_type, bl_act, bl_fb, bl_twitter,
                                  ip_address, createdt, createnm, updatedt, updatenm, bl_profilepict) 
                VALUES('$bl_name', '$bl_title', '$bl_quote', '$bl_content', '$data[bl_type]', '$data[act]',
                       '$bl_fb', '$bl_twitter', '$this->ip', '$this->datetime', '".$this->sess[0]->username."',
                       '$this->datetime', '".$this->sess[0]->username."', '".$_FILES["myfile"]["name"][0]."')";
                   
        //echo $qry;
        $query = $this->db->query($qry);
        $id = $this->db->insert_id(); 
        if($query > 0) {
            $arr = array("response" => "true", "id" => $id, "message" => "Blog $data[bl_name] has been successfully inserted..!");
        } else {
            $arr = array("response" => "false", "message" => "Blog $data[bl_name] is already exist..!!");
        }
        
        return $arr;
    }

    public function saveImagesBlog($id, $fileName, $filetitle) {
        $insPic = "INSERT INTO blog_gallery (bl_gid, title, image, createdt, createnm, updatedt, updatenm) 
                   VALUES ($id, '$filetitle', '$fileName', '$this->datetime', '".$this->sess[0]->username."', 
                          '$this->datetime', '".$this->sess[0]->username."')";
        $query = $this->db->query($insPic);
    }
    
    public function geBlogByID($id, $type = "array") {
        $qry = "SELECT * FROM blog WHERE id = '$id'";
        return $this->getRecordset($qry, $type);
    }
    
    public function getListBlogImage($id, $type = "array") {
        $qry = "SELECT title, image FROM blog_gallery WHERE bl_gid = '$id'";
        return $this->getRecordset($qry, $type);
    }
    
    public function deleteImagesBlog($id) {
        $delPic = "DELETE FROM blog_gallery WHERE bl_gid = '$id'";
        $query = $this->db->query($delPic);
        return $query;
    }
    
    public function saveUpdateBlog() {
        $data = $this->input->post(NULL, TRUE);
        $updImg = "";    
        if($_FILES["myfile"]["name"][0] != "") {
            $updImg = ", bl_profilepict = '".$_FILES["myfile"]["name"][0]."' ";
            $delImg = $this->deleteImagesBlog($data['id']); 
        } 
        $bl_content = addslashes($data['bl_content']);
        $bl_quote   = addslashes($data['bl_quote']);
        $bl_title   = addslashes($data['bl_title']);
        $bl_name    = addslashes($data['bl_name']);
        $bl_fb      = addslashes($data['bl_fb']);
        $bl_twitter = addslashes($data['bl_twitter']);
        $arr = $this->setErrorMessage("json", "Blog $data[bl_name] has failed to be updated..!!");
        
        $qry = "UPDATE blog SET bl_name = '$bl_name', bl_title = '$bl_title', bl_type = '$data[bl_type]', bl_content = '$bl_content', 
                       bl_act = '$data[act]', bl_fb = '$bl_fb', bl_twitter = '$bl_twitter',
                        updatenm = '".$this->sess[0]->username."', updatedt = '$this->datetime' $updImg
                WHERE id = '$data[id]'";
        //echo $qry;
        $query = $this->db->query($qry);
        if($query > 0) {
            //$arr = $this->setSuccessMessage("json", "Blog $data[bl_name] has been successfully updated..!");
            $arr = array("response" => "true", "id" => $data['id'], "message" => "Blog $data[bl_name] has been successfully updated..!");
        }
            
        return $arr;
    }
    
    public function deleteBlog($id) {
        
        $this->db->trans_begin();
        $this->db->query("DELETE FROM blog WHERE id = '$id'");
        $this->db->query("DELETE FROM blog_gallery WHERE bl_gid = '$id'");
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            $arr = $this->setErrorMessage("json", "Delete Blog failed..!!"); 
        }
        else
        {
            $this->db->trans_commit();
            $arr = $this->setSuccessMessage("json", "Delete Blog success..!!");
        }
        return $arr;
    }
	
	public function searchBlogComment($type="array") {
		$data = $this->input->post(NULL, TRUE);
		$tgl = "";
		if($data['validFrom'] != "") {
			$tgl .= " AND createdt BETWEEN '$data[validFrom]' AND '$data[validTo]'";
		}
		$qry = "SELECT id, bl_id, name, bl_comment, bl_act, DATE_FORMAT(createdt,'%d/%m/%Y') as createdt 
				FROM blog_comment WHERE bl_id = '$data[blogID]' AND bl_act = '$data[act]' $tgl";
		//echo $qry;
		return $this->getRecordset($qry, $type);
	}
	
	public function setStatusComment($commentID, $setActive) {
		$arr = $this->setErrorMessage("json", "Comment Approval is failed to be updated..!");
        
        $qry = "UPDATE blog_comment SET bl_act = '$setActive', updatedt = '$this->datetime'
                WHERE id = '$commentID'";
        //echo $qry;
        $query = $this->db->query($qry);
        if($query > 0) {
            //$arr = $this->setSuccessMessage("json", "Blog $data[bl_name] has been successfully updated..!");
            $arr = array("response" => "true", "message" => "Comment Approval has been successfully updated..!");
        }
            
        return $arr;
	}
    
    //UPDATE DION 03-12-2014
    public function deleteBlogComment($id) {
        $arr = $this->setErrorMessage("json", "Delete Blog Comment failed..!!");    
        $qry = "DELETE FROM blog_comment WHERE id = '$id'";
        $query = $this->db->query($qry);
        if($query > 0) {
            $arr = $this->setSuccessMessage("json", "Delete Blog Comment success..!!");
        } 
        return $arr;
    }
    //END UPDATE
    
    public function getListProduct($type = "array") {
        $qry = "SELECT code, title FROM product WHERE act = '1'";
        return $this->getRecordset($qry, $type);
    }
    
    public function saveInputBlogProductRelated() {
        $data = $this->input->post(NULL, TRUE);
        
        $this->db->trans_begin();
        $count = count($data['code']);
        for($i = 0; $i < $count; $i++) {
            if($data['code'][$i] != "") {
              $qry = "INSERT INTO blog_related (bl_id, rel_code, act, ip_address, createnm, createdt) 
                VALUES('$data[blogID]', '".$data['code'][$i]."', '$data[act]', '$this->ip', '".$this->sess[0]->username."', '$this->datetime')";
              $query = $this->db->query($qry);  
            }
        }
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            $arr = $this->setErrorMessage("json", "Input product related to blog failed..!!"); 
        }
        else
        {
            $this->db->trans_commit();
            $arr = $this->setSuccessMessage("json", "Input product related to blog success..!!");
        }
        return $arr;
    }
    
    public function getListBlogProductRelated($type = "array") {
        $qry = "SELECT a.bl_id, b.bl_name, c.bl_name as blogTypeName
                FROM blog_related a 
                LEFT JOIN blog b ON (a.bl_id = b.id)
                LEFT JOIN blog_type c ON (b.bl_type = c.bl_type)
                GROUP BY a.bl_id";
        return $this->getRecordset($qry, $type);
    }
    
    public function getListBlogProductRelatedByID($value, $type = "array") {
        $qry = "SELECT a.bl_id, b.bl_name, a.rel_code, c.title, b.bl_type, d.bl_name as blogTypeName
                FROM blog_related a 
                LEFT JOIN blog b ON (a.bl_id = b.id)
                LEFT JOIN product c ON (a.rel_code = c.code)
                LEFT JOIN blog_type d ON (b.bl_type = d.bl_type)
                WHERE a.bl_id = '$value'";
        return $this->getRecordset($qry, $type);
    }
    
    public function saveUpdateBlogProductRelated() {
        $data = $this->input->post(NULL, TRUE);
        
        $this->db->trans_begin();
        $count = count($data['code']);
        $del   = "DELETE FROM blog_related WHERE bl_id = '$data[id]'";
        $del2  = $this->db->query($del);
        for($i = 0; $i < $count; $i++) {
            if($data['code'][$i] != "") {
              $qry = "INSERT INTO blog_related (bl_id, rel_code, act, ip_address, createnm, createdt) 
                      VALUES('$data[id]', '".$data['code'][$i]."', '$data[act]', '$this->ip', '".$this->sess[0]->username."', '$this->datetime')";
              $query = $this->db->query($qry); 
            }
        }
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            $arr = $this->setErrorMessage("json", "Update blog with related product failed..!!"); 
        }
        else
        {
            $this->db->trans_commit();
            $arr = $this->setSuccessMessage("json", "Update blog with related product success..!!");
        }
        return $arr;
    }

    public function deleteBlogProductRelated($id) {
        
        $arr = $this->setErrorMessage("json", "Delete Blog with Related product failed..!!");    
        $qry = "DELETE FROM blog_related WHERE bl_id = '$id'";
        $query = $this->db->query($qry);
        if($query > 0) {
            $arr = $this->setSuccessMessage("json", "Delete Blog with Related product success..!!");
        } 
        return $arr;
    }

    public function setRecommendedBlog($blogid, $id) {
        $arr = $this->setErrorMessage("json", "Update Recommended Blog failed..!!");    
        $qry = "UPDATE blog SET flag_recommend = $id WHERE id = $blogid";
        $query = $this->db->query($qry);
        if($query > 0) {
            $arr = $this->setSuccessMessage("json", "Update Recommended Blog success..!!");
        } 
        return $arr;
    }
    

}