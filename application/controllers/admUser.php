<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdmUser extends CI_Controller {
	public function AdmUser() {
		parent::__construct();
        $this->load->model('m_admuser');
	}
	
	/*-------------------------
	USER & MENU SETTING MODUL
	---------------------------*/
	
	//Modul change password
	public function getChangePassword() {
		$sess = $this->nativesession->get('sessdata');
		if($sess[0]->username != null) {
           $data['form_header'] = "Change Password";
		   $data['url'] = "admusr/getChangePassword";
		   $data['form_action'] = base_url('/admusr/saveChangePassword');
		   $data['icon'] = "icon-pencil";
           $this->setTemplate('admin/usersetting/getChangePassword', $data);	
		} else {
           redirect('admin/index', 'refresh');
        } 
	}
	
	public function saveChangePassword() {
		$err = array("response" => "false", "message" => "Please check your data, username and password must be valid, new password and confirm must be equal");    
		if ($this->form_validation->run('changePassword') == TRUE) {
			$arr = $this->m_admuser->saveChangePassword();
		} 
		echo json_encode($arr);
		
	}
	
	//USER MAINTENANCE MODULE
	public function getInputUser() {
		$sess = $this->nativesession->get('sessdata');
		if($sess[0]->username != null) {
           $data['form_header'] = "Input New User";
		   $data['form_action'] = base_url('/admusr/saveInputUser');
		   $data['icon'] = "icon-pencil";
           $data['userGroup'] = $this->m_admuser->getListUserGroup();
           $this->setTemplate('admin/usersetting/getInputUser', $data);    	
		} else {
           redirect('admin/index', 'refresh');
        } 
	}
	
	public function saveInputUser() {
		if ($this->form_validation->run('saveUser') == TRUE) {
			$arr = $this->m_admuser->saveInputUser();
			echo json_encode($arr);
		} else {
			$err = array("response" => "false", "message" => "Please check your data, all field must be filled..!!");
			echo json_encode($err);
		}
	}
	
	public function getListUser() {
		$data['listUser'] = $this->m_admuser->getListUser();
		$this->load->view('admin/usersetting/getListUser', $data);
	}
	
	public function getListUserByID($id, $type = "array") {
		if($type == "json") {
			$arr = $this->m_admuser->getListUserByID($id, "json");
			echo json_encode($arr);
		}
	}
	
	public function saveUpdateUser() {
		if ($this->form_validation->run('saveUser') == TRUE) {
			$arr = $this->m_admuser->saveUpdateUser();
			echo json_encode($arr);
		} else {
			$err = array("response" => "false", "message" => "Please check your data, all field must be filled..!!");
			echo json_encode($err);
		}
	}
    
    public function deleteUser($id, $type = "array") {
        $arr = $this->m_admuser->deleteUser($id, $type);    
        if($type == "json") {
            echo json_encode($arr);
        }
    }
    
    //MENU ROOT MODULE
    
    public function getInputRootMenu() {
        $sess = $this->nativesession->get('sessdata');
        if($sess[0]->username != null) {
           $data['form_header'] = "Input Root Menu";
           $data['url'] = "admusr/getInputRootMenu";
           $data['form_action'] = base_url('/admusr/getInputRootMenu');
           $data['icon'] = "icon-pencil";
           $this->setTemplate('admin/usersetting/getInputRootMenu', $data);   
        } else {
           redirect('admin/index', 'refresh');
        } 
    }
    
    public function getListMenuByParam($field, $paramValue, $type = "json") {
        $arr = $this->m_admuser->getListMenuByParam($field, $paramValue, $type);    
        if($type == "json") {
            echo json_encode($arr);
        }
    }
    
    public function getListRootMenu($type = "array") {
        $data['listRootMenu'] = $this->m_admuser->getListRootMenu($type);
        if($type == "array") {
            $this->load->view('admin/usersetting/getListRootMenu', $data);
        }  else {
            echo json_encode($data['listRootMenu']);
        }
    }
    
    public function saveInputRootMenu() {
        $arr = array("response" => "false", "message" => "Please check your data, all field must be filled..!!");    
        if ($this->form_validation->run('saveRootMenu') == TRUE) {
            $arr = $this->m_admuser->saveInputRootMenu();
        } 
        echo json_encode($arr);
    }
    
    public function saveUpdateRootMenu() {
        $arr = array("response" => "false", "message" => "Please check your data, all field must be filled..!!");    
        if ($this->form_validation->run('saveRootMenu') == TRUE) {
            $arr = $this->m_admuser->saveUpdateRootMenu();
        } 
        echo json_encode($arr);
    }
    
    public function deleteRootMenu($id, $type = "array") {
        $arr = $this->m_admuser->deleteRootMenu($id, $type);    
        if($type == "json") {
            echo json_encode($arr);
        }
    }
    
    //SUB MENU MODUL
    public function getInputSubMenu() {
        $sess = $this->nativesession->get('sessdata');
        if($sess[0]->username != null) {
           $data['form_header'] = "Input Sub Menu";
           $data['url'] = "admusr/getInputSubMenu";
           $data['form_action'] = base_url('/admusr/getInputSubMenu');
           $data['icon'] = "icon-pencil";
           $data['listRootMenu'] = $this->m_admuser->getListRootMenu();
           $this->setTemplate('admin/usersetting/getInputSubMenu', $data);
            
        } else {
           redirect('admin/index', 'refresh');
        } 
    }
    
    public function getListSubMenu($type = "array") {
        $data['listSubMenu'] = $this->m_admuser->getListSubMenu($type);
        $this->load->view('admin/usersetting/getListSubMenu', $data);
    }
    
    public function getListMenuByURL($controllerName, $function, $type="array") {
        $arr = $this->m_admuser->getListMenuByURL($controllerName, $function, $type);    
        if($type == "json") {
            echo json_encode($arr);
        }
    }
    
    public function saveInputSubMenu() {
        $arr = array("response" => "false", "message" => "Please check your data, all field must be filled..!!");    
        if ($this->form_validation->run('saveSubMenu') == TRUE) {
            $arr = $this->m_admuser->saveInputSubMenu();
        } 
        echo json_encode($arr);
    }

    public function saveUpdateSubMenu() {
        $arr = array("response" => "false", "message" => "Please check your data, all field must be filled..!!");    
        if ($this->form_validation->run('saveSubMenu') == TRUE) {
            $arr = $this->m_admuser->saveUpdateSubMenu();
        } 
        echo json_encode($arr);
    }

    public function deleteSubMenu($id, $type = "array") {
        $arr = $this->m_admuser->deleteSubMenu($id, $type);    
        if($type == "json") {
            echo json_encode($arr);
        }
    }
    
    public function getUpdateMenuConfig() {
        $sess = $this->nativesession->get('sessdata');
        if($sess[0]->username != null) {
           $data['form_header'] = "Menu User Configuration";
           $data['url'] = "admusr/getUpdateMenuConfig";
           $data['form_action'] = base_url('/admusr/getUpdateMenuConfig');
           $data['icon'] = "icon-pencil";
           $data['listUserGroup'] = $this->m_admuser->getListUserGroup();
           $this->setTemplate('admin/usersetting/getUpdateMenuConfig', $data);
        } else {
           redirect('admin/index', 'refresh');
        } 
    }
    
    private function buildMenu($parent, $menu, $roleid)
    {
       
       $html = "";
       if (isset($menu['parents'][$parent]))
       {
           //$html .= "</br>";
           $s = 0;
           foreach ($menu['parents'][$parent] as $itemId)
           {
              //echo $menu['items'][$itemId]['menu_id'];
              //echo "<br />";
              //echo $roleid; 
              $exist = $this->m_admuser->getListUserByRoleID($roleid, $menu['items'][$itemId]['menu_id']);
              //$exist = $this->m_admuser->getListUserByRoleID($roleid, "10");
              $ss = site_url();
              //echo $exist;
              if(!isset($menu['parents'][$itemId]))
              {
                 if($exist != null)
                 {
                    $html .= "<tr><td ><div align=center><input type=\"checkbox\" name=\"menuid[]\" value=\"".$menu['items'][$itemId]['menu_id']."\" checked=\"checked\" /></div></td><td>".$menu['items'][$itemId]['menu_name']."</td></tr>";
                 }
                 else
                 {
                    $html .= "<tr><td ><div align=center><input type=\"checkbox\" name=\"menuid[]\" value=\"".$menu['items'][$itemId]['menu_id']."\" /></div></td><td>".$menu['items'][$itemId]['menu_name']."</td></tr>";
                 }
                 
                 //$arr = array($menu['items'][$itemId]['menu_id'] => $menu['items'][$itemId]['menu_name']);   
              }
              if(isset($menu['parents'][$itemId]))
              {
                 //<li><input type=\"checkbox\" id=\"item-$s\"/><label for=\"item-$s\">".$menu['items'][$itemId]['menu_name']."</label>";
                 //$html .= "<tr bgcolor=\"lightgrey\"><td><input type=\"checkbox\" name=\"menuid\" value=\"".$menu['items'][$itemId]['menu_id']."\" />&nbsp;&nbsp;&nbsp;&nbsp;</td><td>".$menu['items'][$itemId]['menu_name']."</td></tr>";
                 if($exist != null)
                 {
                    $html .= "<tr bgcolor=\"lightgrey\"><td ><div align=center><input type=\"checkbox\" name=\"menuid[]\" value=\"".$menu['items'][$itemId]['menu_id']."\" checked=\"checked\" /></div></td><td>".$menu['items'][$itemId]['menu_name']."</td></tr>";
                 }
                 else
                 {
                    $html .= "<tr bgcolor=\"lightgrey\"><td ><div align=center><input type=\"checkbox\" name=\"menuid[]\" value=\"".$menu['items'][$itemId]['menu_id']."\" /></div></td><td>".$menu['items'][$itemId]['menu_name']."</td></tr>";
                 }
                 //$arr = array($menu['items'][$itemId]['menu_id'] => $menu['items'][$itemId]['menu_name']);
                 $html .= $this->buildMenu($itemId, $menu, $roleid);
                 
              } 
              
              $s++;
           }
           //$html .= "</br>"; 
       }
       return $html;
       //return $arr;
    } 
    
    public function getShowListMenuByGroupID()
    {
        $menu = $this->m_admuser->getListAllMenu();
        //print_r($menu);
        $usertype = $this->input->post('usertype');
        //echo $usertype;
        //$role_selected = $this->m_user->list_user_by_role_id2($roleid);
        $res = $this->buildMenu(0, $menu, $usertype);
        //print_r($res);
        $tbl  = "<form id=save_menu><table width=40% class=\"table table-bordered\"><thead><tr><th width=20%><input type=checkbox onclick=All.checkUncheckAll(this) name=checkall /></th><th>Menu Name</th></tr></thead>";
        $tbl .= "<tbody id=tbl_menu>";
        $tbl2 = "<tr><td colspan=2><input type=button name=update value=\"Update Menu\" class=\"btn btn-primary span14\" onclick=\"User.updateUserRole()\" /></td></tr></tbody></table><input type=hidden id=usertype name=usertype value=\"$usertype\" /></form>";
        
        $data['menu'] = $tbl.$res.$tbl2;
        
        echo $data['menu']; 
        //echo "<br />";
        //echo $roleid;
    }

    public function saveUpdateUserRole($type = "json") {
        $arr = $this->m_admuser->saveUpdateUserRole($type);    
        if($type == "json") {
            echo json_encode($arr);
        }
    }
    
    //User Group Maintenance 
    public function getInputUserGroup() {
        $sess = $this->nativesession->get('sessdata');
        if($sess[0]->username != null) {
           $data['form_header'] = "User Group Maintenance";
           $data['url'] = "admusr/getInputUserGroup";
           $data['form_action'] = base_url('/admusr/saveChangePassword');
           $data['icon'] = "icon-pencil";
           $this->setTemplate('admin/usersetting/getInputUserGroup', $data);    
        } else {
           redirect('admin/index', 'refresh');
        } 
    }   
    
    public function getListUserGroupByParam($fieldName, $paramValue, $type="json") {
        $arr = $this->m_admuser->getListUserGroupByParam($fieldName, $paramValue, $type);    
        if($type == "json") {
            echo json_encode($arr);
        }
    }
    
    public function saveInputUserGroup() {
        $arr = $this->setValidationErrorMessage();    
        $this->form_validation->set_rules('nm_group', 'nm_group', 'trim|required|xss_clean');
        if ($this->form_validation->run() == TRUE) {
            $arr = $this->m_admuser->saveInputUserGroup();
        } 
        echo json_encode($arr); 
    }
    
    public function getListUserGroup($type = "array") {
        $data['listUserGroup'] = $this->m_admuser->getListUserGroup($type);
        $this->load->view('admin/usersetting/getListUserGroup', $data);
    }
    
    public function saveUpdateUserGroup() {
        $arr = array("response" => "false", "message" => "Please check your data, all field must be filled..!!");    
        if ($this->form_validation->run('saveSubMenu') == TRUE) {
            $arr = $this->m_admuser->saveUpdateSubMenu();
        } 
        echo json_encode($arr);
    }
}