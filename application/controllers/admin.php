<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function Admin() {
		parent::__construct();
        $this->load->model('m_admin');
	}
	
	/*----------------------------
	ADMIN LOGIN MODUL
	------------------------------*/
	public function index($error_message = '')
	{
		$data['error_message'] = $error_message;
        $data['header'] = "Welcome to k-link.co.id ADMIN";
        $data['chg_pwd'] = "Change Password";
        $data['button_act'] = "Login";
        $data['form_action'] = base_url('admin/postLogin');
        $data['link_form'] = base_url('admin/getUpdatePassword');
        $data['header_message'] = "Login Admin";
        //$data['userGroup'] = $this->m_admin->getListUserGroup();
        $this->load->view('admin/adm_login', $data); 
		//echo "okee";
		
		
	}
	
	private function buildMenu2($parent, $menu, $urut)
    {
       $ss = base_url();
       $html = "";
       if (isset($menu['parents'][$parent]))
       {
         foreach ($menu['parents'][$parent] as $itemId)
           {
              if(!isset($menu['parents'][$itemId]))
              {
                $html .= "<li><a rel=\"".$menu['items'][$itemId]['menu_id']."\" class=ss href=\"#\" id='$ss".$menu['items'][$itemId]['url']."'>".$menu['items'][$itemId]['menu_name']."</a></li>";
                //$html .= "<li><a rel=\"".$menu['items'][$itemId]['menu_id']."\" onclick=buatTabulasi() href=\"#\" id='$ss".$menu['items'][$itemId]['url']."'>".$menu['items'][$itemId]['menu_name']."</a></li>";
              }  
              if(isset($menu['parents'][$itemId]))
              {
                    if($urut != 0) {
                        $html .= "</ul>";
                    }
                    $html .= "
                      <div class=\"nav-header collapsed\" data-toggle=\"collapse\" data-target=\"#".$menu['items'][$itemId]['menu_id']."\"><i class=\"icon-dashboard\"></i>".$menu['items'][$itemId]['menu_name']."</div>
                        <ul id=\"".$menu['items'][$itemId]['menu_id']."\" class=\"nav nav-list collapse\">";
                    //$html .= "<li><a href=".$menu['items'][$itemId]['menu_name'].">".$menu['items'][$itemId]['menu_name']."</a></li>";
                    $urut++;
                    $html .= $this->buildMenu2($itemId, $menu, $urut);
              }      
           }     
       } 
       return $html;
    } 
	
	public function postLogin() {
		if ($this->form_validation->run('adminLogin') == FALSE) {
			$this->index("Data is not valid,please fill all the required field");
		}
		else {
			$check = $this->m_admin->loginAdmin();
			if($check != NULL or $this->nativesession->get('admUSR') != null) {
				
				$this->nativesession->set('sessdata', $check);
				$data['logout'] = base_url('/admin/logout');
				$menux = $this->m_admin->fetching_menu($check[0]->usertype);
                $data['menu'] = $this->buildMenu2(0, $menux, 0);
                $data['unapprovedComment'] = $this->m_admin->getTotalUnapprovedBlogComment();
                //var_dump($menux);
				//print_r($data['menu']);
				$this->load->view('login/includes/header',$data);
                    
            }    
            else
            {
                $this->index("Invalid Login");
            }    
		}
	}
	
	public function logout() {
		$this->nativesession->delete('admUSR');
        $this->nativesession->delete('admTYPE');
        redirect('admin/index', 'refresh');
	}
	
	
}

