<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_admproduct extends CI_Model {
	
	public function M_admproduct() {
        parent::__construct();      
	} 
	/*---------------------
	MODUL PRODUCT CATEGORY
	-----------------------*/
	public function getListProductCat($type = "array") {
		$qry = "SELECT id, prdcat_name, createnm, createdt FROM product_category";
        return $this->getRecordset($qry, $type);
	}
	
	public function getListProductCatByParam($fieldName, $param, $type="array") {
        $param = str_replace("%20", " ", $param);       
        $qry = "SELECT * FROM product_category WHERE $fieldName = '$param'";
        return $this->getRecordset($qry, $type);
    }
	
	public function saveInputProductCat() {
        $data = $this->input->post(NULL, TRUE);
        $arr  = $this->setErrorMessage("json", "Product Category $data[prdcat_name] is already exist..!!");
        $check = $this->validateBeforeInsert("product_category", "prdcat_name", $data['prdcat_name']);
        if($check == 0) {
               
            $arr = $this->setErrorMessage("json", "Product Category $data[prdcat_name] insert has failed..!!");
            $qry = "INSERT INTO product_category (prdcat_name, createnm, createdt, updatenm, updatedt, act) 
                    VALUES('$data[prdcat_name]', '".$this->sess[0]->username."' , '$this->datetime', '".$this->sess[0]->username."' , '$this->datetime', '$data[act]')";
            //echo $qry;
            $query = $this->db->query($qry);
            if($query > 0) {
                $arr = $this->setSuccessMessage("json", "Product Category $data[prdcat_name] has been successfully inserted..!");
            }
            
        } 
        return $arr;
    }
    
    public function saveUpdateProductCat() {
        $data = $this->input->post(NULL, TRUE);
        $arr = $this->setErrorMessage("json", "Product Category $data[prdcat_name] has failed to be updated..!!");
        $qry = "UPDATE product_category SET prdcat_name = '$data[prdcat_name]', act = '$data[act]', 
		             updatenm = '".$this->sess[0]->username."', updatedt = '$this->datetime'
                WHERE id = '$data[id]'";
        $query = $this->db->query($qry);
        if($query > 0) {
            $arr = $this->setSuccessMessage("json", "Product Category $data[prdcat_name] has been successfully updated..!!");
        }
        
        return $arr;
    }
    
    public function deleteProductCat($id) {
        $arr = $this->setErrorMessage("json", "This Product Category is used as FOREIGN KEY in table Product records..!!");
        $check = $this->validateBeforeInsert("product", "category", $id);
        if($check == null) {
            $arr = $this->setErrorMessage("json", "Delete Product Category failed..!!");    
            $qry = "DELETE FROM product_category WHERE id = '$id'";
            $query = $this->db->query($qry);
            if($query > 0) {
                $arr = $this->setSuccessMessage("json", "Delete Product Category success..!!");
            } 
        }
        return $arr;
    }
	
    
	/*------------------
	MODUL PRODUCT
	-------------------*/
	public function getProductByID($id, $field = "code", $type="array") {
        $qry = "SELECT * FROM product WHERE $field = '$id'";
        return $this->getRecordset($qry, $type);
    }
    
    public function getListProduct2($type="array") {
        $qry = "SELECT id, code, title FROM product ORDER BY title";
        return $this->getRecordset($qry, $type);
    }
    
    public function getListProductImage($id, $type="array") {
        $qry = "SELECT title, image FROM product_gallery WHERE pid = '$id'";
        return $this->getRecordset($qry, $type);
    }
    
    public function saveNewProduct() {
        $qry = "INSERT INTO product (code, title, category, description, )";
    }
    
    public function saveInputProduct() {
        $data = $this->input->post(NULL, TRUE);
        $title = addslashes($data['title']); 
        $product_desc = addslashes($data['product_desc']); 
        $qry = "INSERT INTO product(code, title, category, description, image, act, ip, tanggal) 
                VALUES('$data[prdcd]','$title', '$data[category]', '$product_desc' , 
                       '".$_FILES["myfile"]["name"][0]."', $data[act], '$this->ip', '$this->date')";
        //echo $qry;
        $query = $this->db->query($qry);
        $id = $this->db->insert_id(); 
        if($query > 0) {
            $arr = array("response" => "true", "id" => $id, "message" => "Input product success..!!");
        } else {
            $arr = array("response" => "false", "message" => "Input product failed..!!");
        }
       
        return $arr;
    }

    public function saveImagesProduct($id, $fileName, $imageTitle) {
        $insPic = "INSERT INTO product_gallery (pid, title, image, ip, tanggal) 
                   VALUES ($id, '$imageTitle', '$fileName', '$this->ip', '$this->date')";
        $query = $this->db->query($insPic);
    }
    
    public function deleteImagesProduct($id) {
        $delPic = "DELETE FROM product_gallery WHERE pid = '$id'";
        $query = $this->db->query($delPic);
        return $query;
    }
    
    public function saveUpdateProduct() {
        $arr = array("response" => "false", "message" => "Update product failed..!!");    
        $data = $this->input->post(NULL, TRUE);    
        $updImg = "";    
        if($_FILES["myfile"]["name"][0] != "") {
            $updImg = ", image = '".$_FILES["myfile"]["name"][0]."' ";
            $delImg = $this->deleteImagesProduct($data['id']);
        } 
        $title = addslashes($data['title']);
        $product_desc = addslashes($data['product_desc']);  
        $qry = "UPDATE product SET code = '$data[prdcd]', title = '$title', category = '$data[category]',
                      description = '$product_desc', act = '$data[act]' $updImg
                WHERE id = '$data[id]'";
        $query = $this->db->query($qry);
        if($query > 0) {
            $arr = array("response" => "true", "id" => $data['id'], "message" => "Update product success..!!");
        }
        return $arr; 
		//echo $qry;
    }
    
    public function getListProduct($type = "array") {
        $qry = "SELECT * FROM product";
        return $this->getRecordset($qry, $type);
    }
    
    public function deleteProduct($id) {
        $arr = $this->setErrorMessage("json", "Delete Gallery Category failed..!!");
        
        $this->db->trans_begin();
        $this->db->query("DELETE FROM product WHERE id = '$id'");
        $this->db->query("DELETE FROM product_gallery WHERE pid = '$id'");
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            $arr = $this->setErrorMessage("json", "Delete product failed..!!"); 
        }
        else
        {
            $this->db->trans_commit();
            $arr = $this->setSuccessMessage("json", "Delete product success..!!");
        }
        return $arr;
    }
    
    public function saveInputRelatedProduct() {
        $data = $this->input->post(NULL, TRUE);
        
        $this->db->trans_begin();
        $count = count($data['rel_code']);
        for($i = 0; $i < $count; $i++) {
            if($data['rel_code'][$i] != "") {
              $qry = "INSERT INTO product_related(code, rel_code, act, ip_address, createnm, createdt) 
                      VALUES('$data[code]','".$data['rel_code'][$i]."', '$data[act]', '$this->ip', 
                      '".$this->sess[0]->username."', '$this->datetime')";
              $query = $this->db->query($qry);  
            }
        }
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            $arr = $this->setErrorMessage("json", "Input product related failed..!!"); 
        }
        else
        {
            $this->db->trans_commit();
            $arr = $this->setSuccessMessage("json", "Input product related success..!!");
        }
        return $arr;
        
       
    }

    public function getListRelatedProduct($type = "array") {
        $qry = "SELECT a.code, b.title
                FROM product_related a LEFT JOIN product b ON (a.code = b.code)
                GROUP BY a.code";
        return $this->getRecordset($qry, $type);
    }
    
    public function getUpdateRelatedProduct($id, $type ="array") {
        $id = str_replace("%20", " ", $id);       
        $qry = "SELECT a.rel_code
                FROM product_related a WHERE code = '$id'";
        return $this->getRecordset($qry, $type);
    }
	
	public function getListProductWithNoRelation($type="array") {
        $qry = "SELECT a.id, a.code, a.title
				FROM product a
				LEFT OUTER JOIN product_related b ON (a.code = b.code)
				WHERE a.code IS NOT NULL AND b.code is NULL";
        return $this->getRecordset($qry, $type);
    }
    
    public function saveUpdateRelatedProduct() {
        $data = $this->input->post(NULL, TRUE);
        
        $this->db->trans_begin();
        $count = count($data['rel_code']);
        $del   = "DELETE FROM product_related WHERE code = '$data[id]'";
        $del2  = $this->db->query($del);
        for($i = 0; $i < $count; $i++) {
            if($data['rel_code'][$i] != "") {
              $qry = "INSERT INTO product_related(code, rel_code, act, ip_address, createnm, createdt) 
                      VALUES('$data[id]','".$data['rel_code'][$i]."', '$data[act]', '$this->ip', 
                      '".$this->sess[0]->username."', '$this->datetime')";
              $query = $this->db->query($qry);  
            }
        }
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            $arr = $this->setErrorMessage("json", "Update product related failed..!!"); 
        }
        else
        {
            $this->db->trans_commit();
            $arr = $this->setSuccessMessage("json", "Update product related success..!!");
        }
        return $arr;
    }

    public function deleteRelatedProduct($id) {
        $data = $this->input->post(NULL, TRUE);
        $del   = "DELETE FROM product_related WHERE code = '$id'";
        $del2  = $this->db->query($del);
        if($del2 > 0) {
            $arr = array("response" => "true", "message" => "Delete product success..!!");
        } else {
            $arr = array("response" => "false", "message" => "Delete product failed..!!");
        }
        return $arr;
    }
}
    