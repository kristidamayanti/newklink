<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_admuser extends CI_Model {
        
    public function M_admuser() {
        parent::__construct();      
    } 
    
    function getListUserGroup($type = "array") {
        $qry = "SELECT * FROM user_group";
        return $this->getRecordset($qry, "array");
    }
    /*----------------------
    CHANGE PASSWORD
    ----------------------*/
    function validateChangePassword($username, $password) {
        $qry = "SELECT * FROM admin a 
                WHERE username = '$username' AND password = '$password'";
        return $this->getRecordset($qry, $type="array");
    }
    
    function saveChangePassword() {
        $arr = $this->setErrorMessage("json", "Password changes has failed to be saved..!!");
        $data = $this->input->post(NULL, TRUE);
        $check = $this->validateChangePassword($data['username'], $data['oldPassword']);
        if($check) {
            $qry = "UPDATE admin SET password = '$data[newPassword]' WHERE username = '$data[username]'";
            $query = $this->db->query($qry);
            if($query > 0) {
                $arr = $this->setSuccessMessage("json", "Password has been successfully changed..!!");
            }
        } else {
            $arr = $this->setErrorMessage("json", "Invalid Data, please fill the correct old username..!!");
        }
            
        return $arr;
    }
    
    /*-----------------
    USER MAINTENANCE
    *------------------*/
    public function saveInputUser() {
        $data = $this->input->post(NULL, TRUE);
        $arr  = $this->setErrorMessage("json", "Username $data[username] is already exist..!!");
        $check = $this->validateBeforeInsert("admin", "username", $data['username']);
        if($check == 0) {
            $arr = $this->setErrorMessage("json", "User $data[username] insert has failed..!!");
            $qry = "INSERT INTO admin (username, password, name, usertype, privileges) 
                    VALUES('$data[username]','$data[password]' ,'$data[fullname]' , '$data[usertype]', '$data[usertype]')";
            $query = $this->db->query($qry);
            if($query > 0) {
                $arr = $this->setSuccessMessage("json", "User $data[username] has been successfully inserted..!");
            }
            
        } 
        return $arr;
    }
    
    function getListUser() {
        $qry = "SELECT a.uid, a.username, a.password, b.nm_group 
                FROM admin a LEFT JOIN user_group b ON (a.usertype = b.id)";
        return $this->getRecordset($qry, "array");
    }
    
    function getListUserByID($id, $type = "array") {
        $qry = "SELECT * FROM admin WHERE uid = '$id'";
        return $this->getRecordset($qry, $type);
    }
    
    function saveUpdateUser() {
        $data = $this->input->post(NULL, TRUE);
        $arr = $this->setErrorMessage("json", "User $data[username] has failed to be updated..!!");
        
        $qry = "UPDATE admin SET password = '$data[password]', name = '$data[fullname]',  usertype = '$data[usertype]',
                       privileges = '$data[usertype]' 
                WHERE uid = '$data[uid]'";
        $query = $this->db->query($qry);
        if($query > 0) {
            $arr = $this->setSuccessMessage("json", "Password has been successfully changed..!!");
        }
        
        return $arr;
    }
    
    public function deleteUser($id, $type = "array") {
        $arr = $this->setErrorMessage($type, "Delete failed..!!");
        $qry = "DELETE FROM admin WHERE uid = '$id'";
        $query = $this->db->query($qry);
        if($query > 0) {
            $arr = $this->setSuccessMessage($type, "Delete success..!!");
        }
        
        return $arr;
    }
    
    public function getListMenuByParam($field, $paramValue, $type = "array") {
        $paramValue = str_replace("%20", " ", $paramValue);    
        $qry = "SELECT * FROM adminmenu WHERE $field = '$paramValue'";
        //echo $qry;
        return $this->getRecordset($qry, $type);
    }
    
    public function getListRootMenu($type = "array") {
        $qry = "SELECT * FROM adminmenu a where parentID = '0' ORDER BY id";
        return $this->getRecordset($qry, $type);
    }
    
    public function createRootMenuID() {
        $arr = $this->getListRootMenu();
        $jum = count($arr);
        $jum = $jum + 1;
        $next_id = sprintf("%02s",$jum);
        $y =  strval("RT".$next_id); 
        return $y;  
    }
    
    public function saveInputRootMenu() {
        $data = $this->input->post(NULL, TRUE);
        $id = $this->createRootMenuID();
        $arr = $this->setErrorMessage("json", "Insert Menu $data[rootMenuName]  has failed..!!");
        $qry = "INSERT INTO adminmenu (id, parentID, menuName, url, orderlist, prefix) 
                VALUES('$id', '0', '$data[rootMenuName]' ,'#' , '$data[orderlist]', '$data[prefix]')";
        $query = $this->db->query($qry);
        
        $insmenu = "INSERT INTO adminrole (roleID, menuID) VALUES (3, '$id')";
        $insmenu2 = $this->db->query($insmenu);
        if($query > 0 && $insmenu2 > 0) {
            $arr = $this->setSuccessMessage("json", "Menu $data[rootMenuName] has been successfully inserted..!");
        }
        return $arr;
    }
    
    public function saveUpdateRootMenu() {
        $data = $this->input->post(NULL, TRUE);
        $arr = $this->setErrorMessage("json", "Menu $data[rootMenuName] has failed to be updated..!!");
        
        $qry = "UPDATE adminmenu SET menuName = '$data[rootMenuName]', prefix = '$data[prefix]', orderlist = '$data[orderlist]' 
                WHERE id = '$data[id]'";
        $query = $this->db->query($qry);
        if($query > 0) {
            $arr = $this->setSuccessMessage("json", "Menu $data[rootMenuName] has been successfully changed..!!");
        }
        
        return $arr;
    }
    
    
    public function deleteRootMenu($id, $type="array") {
        $arr = $this->setErrorMessage($type, "Delete Root Menu failed..!!");
        $check = $this->getListMenuByParam("parentID", $id);
        if($check == null) {
            $qry = "DELETE FROM adminmenu WHERE id = '$id'";
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
        $qry = "SELECT a.`id`, a.`menuName`, a.`url`, b.`menuName` as rootMenuName
                FROM adminmenu a LEFT JOIN adminmenu b
                   ON (a.`parentID` = b.`id`)
                WHERE a.`parentID` != '0'
                ORDER BY b.`menuName`, a.`menuName`";
        //echo $qry;
        return $this->getRecordset($qry, $type);
    }
    
    public function getListMenuByURL($controllerName, $function, $type="array") {
        $paramValue = $controllerName."/".$function;   
        $qry = "SELECT url, menuName FROM adminmenu WHERE url = '$paramValue'";
        return $this->getRecordset($qry, $type);
    }
    
    public function createSubMenuID($parentID, $prefix) {
        $qry = "SELECT max(id) as id FROM adminmenu WHERE LEFT(id, 2) = '$prefix'";
        $query = $this->db->query($qry);
        if($query == null)
        {
            $ss = 0;
        }
        else
        {
            foreach($query->result() as $data)
            {
                $ss = substr($data->id, 2, 4);
            }  
        }
         $next_id = $ss + 1;
         //echo $next_id;
         //echo "<br />";
         $next_id = sprintf("%04s",$next_id);
         //echo "$next_id<br>";
         
         $y =  strval($prefix.$next_id); 
         return $y;  
    }
    
    public function saveInputSubMenu() {
        $data = $this->input->post(NULL, TRUE);
        $parentID = explode("|", $data['parentID']);
        $id = $this->createSubMenuID($parentID[0], $parentID[1]);
        
        $arr = $this->setErrorMessage("json", "Insert Menu $data[subMenuName]  has failed..!!");
        $qry = "INSERT INTO adminmenu (id, parentID, menuName, url, orderlist, prefix) 
                VALUES('$id', '$parentID[0]', '$data[subMenuName]' ,'$data[url]' , '$data[orderlist]', '$parentID[1]')";
        $query = $this->db->query($qry);
        
        $insmenu = "INSERT INTO adminrole (roleID, menuID) VALUES (3, '$id')";
        $insmenu2 = $this->db->query($insmenu);
        
        if($query > 0 && $insmenu2 > 0) {
            $arr = $this->setSuccessMessage("json", "Menu $data[subMenuName] has been successfully inserted..!");
        }
        return $arr;
    }
    
    public function saveUpdateSubMenu() {
        $data = $this->input->post(NULL, TRUE);
        $parentID = explode("|", $data['parentID']);
        $arr = $this->setErrorMessage("json", "Menu $data[subMenuName] has failed to be updated..!!");
        
        $qry = "UPDATE adminmenu SET menuName = '$data[subMenuName]', prefix = '$parentID[1]', 
                       orderlist = '$data[orderlist]',  url = '$data[url]', parentID = '$parentID[0]'
                WHERE id = '$data[id]'";
        $query = $this->db->query($qry);
        if($query > 0) {
            $arr = $this->setSuccessMessage("json", "Menu $data[subMenuName] has been successfully changed..!!");
        }
        
        return $arr;
    }

    public function deleteSubMenu($id, $type="array") {
        $arr = $this->setErrorMessage($type, "Delete Sub Menu failed..!!");
        
        $qry = "DELETE FROM adminmenu WHERE id = '$id'";
        $query = $this->db->query($qry);
        if($query > 0) {
            $arr = $this->setSuccessMessage($type, "Delete Root Menu success..!!");
        } 
        
        return $arr;
    }
    
    public function getListAllMenu($type="array") {
        $qry = "SELECT b.id as menu_id, b.parentID as parent_id, b.menuName as menu_name, b.url
                FROM adminmenu b
                ORDER BY b.parentID, b.orderlist";
        //echo $qry;
        $query = mysql_query($qry);
        $menu = array('items' => array(), 'parents' => array());

        
        //Builds the array lists with data from the menu table
        while ($items = mysql_fetch_assoc($query))
        {
            // Creates entry into items array with current menu item id ie. $menu['items'][1]
            $menu['items'][$items['menu_id']] = $items;
            // Creates entry into parents array. Parents array contains a list of all items with children
            $menu['parents'][$items['parent_id']][] = $items['menu_id'];
        }
        return $menu;
    }
    
    public function getListUserByRoleID($role, $menu_id, $type = "array") {
        $qry = "SELECT roleID as role_id, menuID as menu_id
                FROM adminrole 
                WHERE roleID = ".$role." AND menuID = '".$menu_id."'";
        //echo $qry;
        return $this->getRecordset($qry, $type);
    }
    
    public function saveUpdateUserRole($type = "array") {
        $data = $this->input->post(NULL, TRUE);
        $jum = count($data['menuid']);
        
        $del = "DELETE FROM adminrole WHERE roleID = '$data[usertype]'";
        $del2 = $this->db->query($del);
        
        for($i = 0; $i < $jum; $i++)
        {
           if($data['menuid'][$i] != "")
            { 
                $qry2 = "INSERT INTO adminrole (roleID, menuID) 
                       VALUES ('$data[usertype]', '".$data['menuid'][$i]."')";
                //echo $qry2;
                $query2 = $this->db->query($qry2);
            }    
        } 
        
        if($del2 > 0) {
                $arr = $this->setSuccessMessage("json", "Update User Menu Config Success");
            } else {
                $arr = $this->setErrorMessage("json", "Update User Menu Gagal..!!");
            } 
        
        return $arr;    
    }
    
    /*----------------
     USER GROUP MODULE 
     * =----------------*/
    public function getListUserGroupByParam($fieldName, $param, $type="array") {
        $param = str_replace("%20", " ", $param);       
        $qry = "SELECT * FROM user_group WHERE $fieldName = '$param'";
        return $this->getRecordset($qry, $type);
    }
    
    public function saveInputUserGroup() {
        $data = $this->input->post(NULL, TRUE);
               
        $arr = $this->setErrorMessage("json", "Insert Group Menu $data[nm_group]  has failed..!!");
        $qry = "INSERT INTO user_group (nm_group) VALUES('$data[nm_group]')";
        $query = $this->db->query($qry);
        if($query > 0) {
            $arr = $this->setSuccessMessage("json", "Group Menu $data[nm_group] has been successfully inserted..!");
        }
        return $arr;
    }
}