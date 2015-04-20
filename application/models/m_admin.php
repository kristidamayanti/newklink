<?php

class M_admin extends CI_Model{
    
    public function M_admin() {
        parent::__construct();      
    } 
	
	/*--------------------
	ADMIN LOGIN
	---------------------*/
	function getListUserGroup($type = "array") {
	    $qry = "SELECT * FROM user_group";
        return $this->getRecordset($qry, "array");
	}
    
	function loginAdmin()
    {
        $data = $this->input->post(NULL, TRUE);
        $qry = "SELECT * FROM admin a 
		        WHERE username = '$data[username]' AND password = '$data[password]'";
		return $this->getRecordset($qry, "array");
		
    }
	
	function fetching_menu($usertype)
    {
        
        $qry = "select a.menuID as menu_id, b.parentID as parent_id, 
		               b.menuName as menu_name, b.url
                FROM adminrole a, adminmenu b
                WHERE a.menuID = b.id and a.roleID = '$usertype'
                ORDER BY b.parentID, orderlist";
           
        $query = mysql_query($qry);
        $menu = array('items' => array(), 'parents' => array());

        
     // Builds the array lists with data from the menu table
        while ($items = mysql_fetch_assoc($query))
        {
            // Creates entry into items array with current menu item id ie. $menu['items'][1]
            $menu['items'][$items['menu_id']] = $items;
            // Creates entry into parents array. Parents array contains a list of all items with children
            $menu['parents'][$items['parent_id']][] = $items['menu_id'];
        }
        return $menu;
    }
    //updated @31/10/2014
    function getTotalUnapprovedBlogComment() {
        $qry = "SELECT count(id) as jum 
                FROM blog_comment 
                WHERE bl_act = '0'";
        $query = $this->db->query($qry); 
        $row = $query->row();
        return $row->jum;       
    }
	
	
    
}