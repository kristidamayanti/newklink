<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_admwebmenu extends CI_Model {
    public function M_admwebmenu() {
        parent::__construct();      
    } 
    
    public function getListRootMenu($type = "array") {
        $qry = "SELECT menu_id, menu_title, menu_url, menu_category FROM menu order by menu_id";
        return $this->getRecordset($qry, $type);
    }
    
    public function getListMenuByParam($field, $paramValue, $type = "array") {
        $paramValue = str_replace("%20", " ", $paramValue);    
        $qry = "SELECT * FROM menu WHERE $field = '$paramValue'";
        //echo $qry;
        return $this->getRecordset($qry, $type);
    }
    
    public function saveInputRootMenu() {
        $data = $this->input->post(NULL, TRUE);
        $arr = $this->setErrorMessage("json", "Insert Web Menu $data[menu_title]  has failed..!!");
        $qry = "INSERT INTO menu (menu_title, menu_url, menu_category, menu_description,
                       menu_createuser, menu_updateuser, menu_createip, menu_updateip, menu_createdt, menu_updatedt) 
                VALUES('$data[menu_title]', '$data[menu_url]', '$data[menu_category]' ,'$data[menu_description]', 
                       '".$this->sess[0]->username."', '".$this->sess[0]->username."', '$this->ip', '$this->ip',
                       '$this->datetime', '$this->datetime')";
        $query = $this->db->query($qry);
        if($query > 0) {
            $arr = $this->setSuccessMessage("json", "Web Menu $data[menu_title] has been successfully inserted..!");
        }
        return $arr;
    }
    
    public function saveUpdateRootMenu() {
        $data = $this->input->post(NULL, TRUE);
        $arr = $this->setErrorMessage("json", "Web Menu $data[menu_title] has failed to be updated..!!");
        
        $qry = "UPDATE menu SET menu_title = '$data[menu_title]', menu_category = '$data[menu_category]', menu_description = '$data[menu_description]' 
                WHERE menu_id = '$data[id]'";
        $query = $this->db->query($qry);
        if($query > 0) {
            $arr = $this->setSuccessMessage("json", "Web Menu $data[menu_title] has been successfully changed..!!");
        }
        
        return $arr;
    }
    
    public function deleteRootMenu($id, $type="array") {
        $arr = $this->setErrorMessage($type, "Delete Root Menu failed..!!");
        $check = $this->validateBeforeInsert("menu_child", "menu_parentID", $id);
        if($check == null) {
            $qry = "DELETE FROM menu WHERE menu_id = '$id'";
            $query = $this->db->query($qry);
            if($query > 0) {
                $arr = $this->setSuccessMessage($type, "Delete Root Menu success..!!");
            } 
        }
        else {
            $arr = $this->setErrorMessage($type, "This root menu is already has sub menu..!!");
        }
        return $arr;
    }

    public function getListSubMenu($type = "array") {
        $qry = "SELECT a.menu_cid, a.menu_title, a.menu_url
                FROM menu_child a";
        //echo $qry;
        return $this->getRecordset($qry, $type);
    }
    
    public function getListSubMenuByParam($field, $paramValue, $type = "array") {
        $paramValue = str_replace("%20", " ", $paramValue);    
        $qry = "SELECT * FROM menu_child WHERE $field = '$paramValue'";
        //echo $qry;
        return $this->getRecordset($qry, $type);
    }
    
    public function setCategoryByParentID($id, $type="array") {
        $qry = "SELECT menu_category FROM menu WHERE menu_id = '$id'";
        return $this->getRecordset($qry, $type);
    }
    
    public function saveInputSubMenu() {
        $data = $this->input->post(NULL, TRUE);
        $arr = $this->setErrorMessage("json", "Insert Web Menu $data[menu_title]  has failed..!!");
        $qry = "INSERT INTO menu_child (menu_title, menu_url, menu_category,  menu_parentID,
                       menu_createuser, menu_updateuser, menu_createip, menu_updateip, menu_createdt, menu_updatedt) 
                VALUES('$data[menu_title]', '$data[menu_url]', '$data[menu_category]' , '$data[menu_parentID]', 
                       '".$this->sess[0]->username."', '".$this->sess[0]->username."', '$this->ip', '$this->ip',
                       '$this->datetime', '$this->datetime')";
        $query = $this->db->query($qry);
        if($query > 0) {
            $arr = $this->setSuccessMessage("json", "Web Menu $data[menu_title] has been successfully inserted..!");
        }
        return $arr;
    }
    
    public function saveUpdateSubMenu() {
        $data = $this->input->post(NULL, TRUE);
        $arr = $this->setErrorMessage("json", "Web Menu $data[menu_title] has failed to be updated..!!");
        
        $qry = "UPDATE menu_child SET menu_title = '$data[menu_title]', menu_category = '$data[menu_category]', 
                       menu_parentID = '$data[menu_parentID]',  menu_updateuser = '".$this->sess[0]->username."',
                       menu_updateip = '$this->ip', menu_updatedt = '$this->datetime'
                WHERE menu_cid = '$data[id]'";
        $query = $this->db->query($qry);
        if($query > 0) {
            $arr = $this->setSuccessMessage("json", "Web Menu $data[menu_title] has been successfully changed..!!");
        }
        
        return $arr;
    }
    
    public function deleteSubMenu($id, $type="array") {
        $arr = $this->setErrorMessage($type, "Delete Sub Menu failed..!!");
       
        $qry = "DELETE FROM menu_child WHERE menu_cid = '$id'";
        $query = $this->db->query($qry);
        if($query > 0) {
            $arr = $this->setSuccessMessage($type, "Delete Sub Menu success..!!");
        } 
        
        return $arr;
    }
}