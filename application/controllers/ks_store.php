<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of store
 *
 * @author Dion and Annah
 */
class Ks_store extends CI_Controller {
     private $url = 'www.k-linkmember.co.id/langganan_rpc/index.php/xmlrpc_serverss/';
     
     public function Ks_store() {
        parent::__construct();
        $this->xmlrpc->server(prep_url($this->url), 80);
        $this->urlConfig = "html_config";
        $this->ip = $this->input->ip_address();
        $this->load->library('cart'); 
     }
     
     //$route['store/logout'] = "ks_store/getLogout";
     public function getLogout() {
        
        /*$this->load->model('m_loginsession');
        $sessid = $this->m_loginsession->deleteSession();
        if($sessid > 0){
        */
           $this->session->sess_destroy();
            redirect('store');
        /*}
        else{
            echo "<script>alert('Tidak dapat menghapus data session di database, coba beberapa saat lagi..!!')</script>";
        }*/
     }
     
     //$route['store']
     public function getLogin($err_message = '') {
        $data['mycaptcha'] = generateRandomString();
		$data['username'] = $this->session->userdata('username');
		//print_r($data['username']);
        $data['err_message'] = $err_message;
        $this->load->view($this->urlConfig);
		$this->load->view("ks_store/include/ks_header", $data);
        $this->load->view("ks_store/storelogin", $data);
		$this->load->view("ks_store/include/ks_footer", $data);
     }
       
     //$route['store/login']
     public function postLogin() {
        $data = $this->input->post(NULL, TRUE);
        $this->load->model('m_loginsession');
         if($this->form_validation->run('storelogin/index')) {
            $captcha = extractCaptcha(strtolower($data['captcha']));
            if($captcha == $data['hid_chap']) {
                //print_r($this->session->all_userdata());
                $loginResult = $this->checkUsernamePassword($data['username'], $data['password']);
                $row = $loginResult["sukses"];
				//print_r($loginResult);
                if ((int) $row == 1) {
         
                    /*$cek = $this->m_loginsession->cekLoginSession($data['username']);
                    if($cek > 0){
                        $this->getLogin("Session dengan $data[username] Sudah Login");
                    }
                    else{ */
                        $userSession = array(
                        'username' => $data['username'],
                        'isValid' => TRUE,
                        );
                        $this->session->set_userdata($userSession);
                        
                        //$ins = $this->m_loginsession->insertLoginSession($data['username']);
                        redirect('voucher/1');
                    //}
 
                } else {
                    $this->getLogin($loginResult['responseMessage']);
                }    
                
            } else {
                $this->getLogin("Captcha tidak cocok..!!");
            }
         }
     }   

     private function checkUsernamePassword($username, $password) {
        $request = array();
        $valReturn = array();
        //$this->xmlrpc->set_debug(TRUE);
        $this->xmlrpc->method('check.login');
        $request = array(array(array(
                    "distributor" => array("$username", 'string'),
                    "password" => array("$password", 'string'),
                    "signature" => array(md5("$username" . '12345'), 'string')
                ), 'struct'
        ));
        //var_dump($request);
        $this->xmlrpc->request($request);

        if (!$this->xmlrpc->send_request()) {
            echo $this->xmlrpc->display_error();
        } else {
            return $valReturn = $this->xmlrpc->display_response();
        }
    }

    //$route['voucher/(:any)'] = "ks_store/getVoucherCheck/$1";
    public function getVoucherCheck($value = 0, $err_message = '') {
        
        $validUser = $this->session->userdata('isValid');
        //$username = $this->session->userdata('username');    
        if ($validUser) {
            $data['mHeader'] = $this->menu_model->getHeaderMenu();
            $data['mChild'] = $this->menu_model->getChildMenu();
            $data['username'] = $this->session->userdata('username');
            $data['err_message'] = $err_message;
			if($err_message == "1") {
			  $data['loginSukses'] = "Selamat, anda berhasil login";
			}	
            $this->load->view($this->urlConfig);
            //$this->load->view('ks_store/choose', $data);
            $this->load->view("ks_store/include/ks_header", $data);
            $this->load->view('ks_store/voucher', $data);
			$this->load->view("ks_store/include/ks_footer", $data);
			//$this->load->view("ks_store/ks_footer", $data);
            //echo $username;
        } else {
            redirect('store');
        }   
    }
    
    //$route['voucher/check'] = "ks_store/postVoucherCheck";
    public function postVoucherCheck() {
        $data = $this->input->post(NULL, TRUE);
        $username = $this->session->userdata('username');
        //echo "username : $username<br />";   
        /*if($data['nonvoucher'] == "checked") {
            redirect('store');
        } else { */
            if ($this->form_validation->run('choose/index')) {
                
                $resultrpc = $this->updateVoucher($data['voucherno'], $data['voucherkey'], $this->ip, $username);
                //echo "Status ";
                //print_r($resultrpc);
                if($resultrpc['err'] == true) {    
                     $this->getVoucherCheck(0, $resultrpc['responseMessage']);
                } else {   
                    $this->session->set_userdata('resultrpc', $resultrpc);
                    redirect('store/bundling');
                } 
            } else {
                
            }
        //}
    }
    
    /*private function cekVoucher($voucherno, $voucherkey) {
        $request = array();
        $valReturn = array();

        $this->xmlrpc->timeout(60);
        $this->xmlrpc->method('check.voucher');

        $request = array(array(array(
                    "voucherno" => array("$voucherno", 'string'),
                    "voucherkey" => array("$voucherkey", 'string'),
                    "signature" => array(md5("$voucherno" . '12345'), 'string')
                ), 'struct'
        ));

        $this->xmlrpc->request($request);

        if (!$this->xmlrpc->send_request()) {
            echo $this->xmlrpc->display_error();
        } else {
            return $valReturn = $this->xmlrpc->display_response();
        }
    } */
    
    private function updateVoucher($vno, $vkey, $ip_address, $username) {
        $request = array();
        $valReturn = array();
        //$this->xmlrpc->set_debug(TRUE);
        $this->xmlrpc->timeout(60);
        $this->xmlrpc->method('updt.voucher');

        $request = array(array(array(
                    "voucherno" => array($vno, 'string'),
                    "voucherkey" => array($vkey, 'string'),
                    "idmember" => array($username, 'string'),
                    "ip" => array("$ip_address", 'string'),
                    "signature" => array(md5("$username" . '12345'), 'string')
                ), 'struct'
        ));
        //print_r($request);
        $this->xmlrpc->request($request);

        if (!$this->xmlrpc->send_request()) {
            //echo $this->xmlrpc->display_error();
            //log_message('error', 'Update voucher error');
            $valReturn = array("status" => 0);
        } else {
            $valReturn = $this->xmlrpc->display_response();
            //print_r($valReturn);
            /*$arr = array("status" => $valReturn[0]['status'],
                         "voucherno" => $valReturn[0]['voucherno'],
                         "prd_bundling" => $valReturn[0]['prd_bundling'],
                         //"history_trx" => json_decode($valReturn['history_trx'])
                        ); */
			//print_r($valReturn);
        }
		//print_r($arr);
        return $valReturn;
    }
    
    //$route['store/history'] = "ks_store/showHistoryTrx";
    public function showHistoryTrx() {
       $validUser = $this->session->userdata('isValid');
        //$username = $this->session->userdata('username');    
        if ($validUser) {
            $data['username'] = $this->session->userdata('username');
            $data['listHistTrx'] = $this->getListHistoryTrx($data['username']);
            //print_r($this->session->all_userdata());
            $this->load->view($this->urlConfig);
			$this->load->view("ks_store/include/ks_header", $data);
            $this->load->view('ks_store/ks_store', $data);
			$this->load->view("ks_store/include/ks_footer", $data);
            //echo $username;
        } else {
            redirect('store');
        }        
        
    }
    
    //$route['store/history/novoucher'] = "ks_store/showHistoryTrx2";
    public function showHistoryTrx2() {
       $validUser = $this->session->userdata('isValid');
        //$username = $this->session->userdata('username');    
        if ($validUser) {
            $data['username'] = $this->session->userdata('username');
            $data['listHistTrx'] = $this->getListHistoryTrx($data['username']);
            //print_r($this->session->all_userdata());
            $this->load->view($this->urlConfig);
			$this->load->view("ks_store/include/ks_header", $data);
            $this->load->view('ks_store/ks_store2', $data);
			$this->load->view("ks_store/include/ks_footer", $data);
            //echo $username;
        } else {
            redirect('store');
        }        
        
    }
	
	private function getListHistoryTrx($idmember) {
        $request = array();
        $valReturn = array();
        //$this->xmlrpc->set_debug(TRUE);
        $this->xmlrpc->timeout(60);
        $this->xmlrpc->method('get.historyByID');
        $resRPC = $this->session->userdata('resultrpc');
        $request = array(array(array(
                    "idmember" => array($idmember, 'string'),
                    "voucherno" => array($resRPC['voucherno'], 'string'),
					"signature" => array(md5($this->session->userdata('username') . '12345'), 'string')
                ), 'struct'
        ));

        $this->xmlrpc->request($request);

        if (!$this->xmlrpc->send_request()) {
            return null;
        } else {
            $valReturn = $this->xmlrpc->display_response();
            return json_decode($valReturn['arrayData']);
        }
        
    }
	
	public function getLanggananByID($id) {
       
        $sess = $this->nativesession->get('sessdata');  
        $this->xmlrpc->method('get.dataKaset');
        $request = array(array(array(
              "kd_kaset" => array($id, 'string'), 
              "username" => array($this->session->userdata('username'), 'string'),
              "signature" => array(md5($this->session->userdata('username') . '12345'), 'string')
          ), 'struct'
        )); 
            
        $this->xmlrpc->request($request);

        if (!$this->xmlrpc->send_request()) {   
            $arr = array("response" => "false");
            echo json_encode($arr);
        } else {
            $dtax = $this->xmlrpc->display_response();
            $arr = array("response" => "true", "arrayData" => json_decode($dtax['arrayData']));
            echo json_encode($arr);
        }     
    }
	
	
    //$route['store/bundling'] = "ks_store/showListPrdBundling";
    public function showListPrdBundling() {
        $data['username'] = $this->session->userdata('username');
		$data['listBundling'] = $this->getListBundlingByVoucher($data['username']);
        //print_r($this->session->all_userdata());
		//echo "<br />";
		//echo $data['listBundling'];
        $this->load->view($this->urlConfig);
		$this->load->view("ks_store/include/ks_header", $data);
        $this->load->view('ks_store/showListPrdBundling', $data);
		$this->load->view("ks_store/include/ks_footer", $data);
        
    }
	
	private function getListBundlingByVoucher($idmember) {
        $request = array();
        $valReturn = array();
        //$this->xmlrpc->set_debug(TRUE);
        $this->xmlrpc->timeout(60);
        $this->xmlrpc->method('get.listBundlingByVoucher');
        $resRPC = $this->session->userdata('resultrpc');
		
        $request = array(array(array(
                    "idmember" => array($idmember, 'string'),
                    "voucherno" => array($resRPC['voucherno'], 'string'),
					"status" => array($resRPC['status'], 'string'),
					"prdCat" => array($resRPC['prd_bundling'], 'string'),
                    "signature" => array(md5($this->session->userdata('username') . '12345'), 'string')
                ), 'struct'
        ));
        
        //print_r($request);

        $this->xmlrpc->request($request);

        if (!$this->xmlrpc->send_request()) {
            return null;
        } else {
            $valReturn = $this->xmlrpc->display_response();
			if($valReturn['arrayData'] == "expired") {
				return $valReturn['arrayData'];
			} else {
			   return json_decode($valReturn['arrayData']);	
			}
				
			
            
        }
        
    }
    
    //$route['store/download/$1'] = "ks_store/getDownloadProduct";
    public function getDownloadProduct($namaKaset)
    {
        $username = $this->session->userdata('username');
        //$login = $this->nativesession->get('login');
        
        //if(isset($username) && $login == TRUE)
        if(isset($username))
        { 
            $namaKaset = str_replace("%20", " ", $namaKaset);
            $namaKaset = str_replace("%E2%80%99", "’", $namaKaset);
            
            
            $data1 = file_get_contents("upload/kaset/$namaKaset");// filenya
            force_download($namaKaset, $data1);
        }
        else
        {
            redirect('store');
        } 
    }
	
	//$route['store/bundling/download/$1'] = "ks_store/getDownloadProductBundling";
    public function getDownloadProductBundling($prdcddet, $namaKaset)
    {
        $username = $this->session->userdata('username');
        //$login = $this->nativesession->get('login');
        
        //if(isset($username) && $login == TRUE)
        if(isset($username))
        { 
            $ins = $this->insertHistoryTrx($prdcddet, $username);
			if($ins) {
				$namaKaset = str_replace("%20", " ", $namaKaset);
	            $namaKaset = str_replace("%E2%80%99", "’", $namaKaset);
	            
	            
	            $data1 = file_get_contents("upload/kaset/$namaKaset");// filenya
	            force_download($namaKaset, $data1);
				redirect('store/history');
			} else {
				echo "<script>alert('Failed to insert history transaction..!!')</script>";
				redirect('store/history');
			}
			
        }
        else
        {
            redirect('store');
        } 
    }
	
	private function insertHistoryTrx($prdcddet, $idmember) {
		$request = array();
        $valReturn = array();
        //$this->xmlrpc->set_debug(TRUE);
        $this->xmlrpc->timeout(60);
        $this->xmlrpc->method('set.DownloadedKaset');
        $resRPC = $this->session->userdata('resultrpc');
        $request = array(array(array(
                    "idmember" => array($idmember, 'string'),
                    "vchno" => array($resRPC['voucherno'], 'string'),
					"prdcat" => array($resRPC['prd_bundling'], 'string'),
					"prddet" => array($prdcddet, 'string'),
					"ip" => array($this->ip, 'string'),
                    "signature" => array(md5($this->session->userdata('username') . '12345'), 'string')
                ), 'struct'
        ));
        
        //print_r($request);

        $this->xmlrpc->request($request);

        if (!$this->xmlrpc->send_request()) {
            return false;
        } else {
            $valReturn = $this->xmlrpc->display_response();
            return true;
        }
	}
    
    /*-------------------------------------
     * NON VOUCHER STORE
     --------------------------------------* */
     
     //$route['novoucher'] = "ks_store/getListProductNoVoucher";
     public function getListProductNoVoucher() {
        //$this->load->library('cart');    
        $data['username'] = $this->session->userdata('username');
        $data['listBundling'] = $this->getListBundlingNoVoucher($data['username']);
        //print_r($data['listBundling']);
        //echo "<br />";
        $this->load->view($this->urlConfig);
		$this->load->view("ks_store/include/ks_header", $data);
        $this->load->view('ks_store/showListPrdBundling2', $data);
		$this->load->view("ks_store/include/ks_footer", $data);
        
     }
     
     private function getListBundlingNoVoucher($idmember) {
        $request = array();
        $valReturn = array();
        //$this->xmlrpc->set_debug(TRUE);
        $this->xmlrpc->timeout(60);
        $this->xmlrpc->method('get.listBundlingNoVoucher');
        $resRPC = $this->session->userdata('resultrpc');
        
        $request = array(array(array(
                    "idmember" => array($idmember, 'string'),
                    //"voucherno" => array($resRPC['voucherno'], 'string'),
                    //"status" => array($resRPC['status'], 'string'),
                    //"prdCat" => array($resRPC['prd_bundling'], 'string'),
                    "signature" => array(md5($this->session->userdata('username') . '12345'), 'string')
                ), 'struct'
        ));
        
        //print_r($request);

        $this->xmlrpc->request($request);

        if (!$this->xmlrpc->send_request()) {
            return null;
        } else {
            $valReturn = $this->xmlrpc->display_response();
            return json_decode($valReturn['arrayData']);
        }
        
    }
     
     //$route['novoucher/cart/add'] = "ks_store/addToCart";
     /*public function addToCart($prdcdDet, $title, $file, $westPrice) {
         if(!$this->IfDoubleInputCart($prdcdDet)) {
             $file = str_replace("%20", " ", $file); 
             $title = str_replace("%20", " ", $title);
             
             $data = array(
                   array(
                           'id'      => $prdcdDet,
                           'qty'     => 1,
                           'price'   => $westPrice,
                           'name'    => $title,
                           'options' => array('filename' => $file)
                        ),
                   
                );
    
             $this->cart->insert($data); 
             $arr = array("response" => "true", "message" => "Data kaset $prdcdDet sudah dimasukkan ke dalam cart..!!");
         } else {
             $arr = array("response" => "false", "message" => "Data kaset $prdcdDet sudah ada di cart..!!");
         }    
            echo json_encode($arr);
     } */
	 
	 //$route['novoucher/cart/add'] = "ks_store/addToCart";
	 public function addToCart() {
         $dta = $this->input->post(NULL, TRUE);	
         if(!$this->IfDoubleInputCart($dta['prdcd'])) {
            
            $data = array(
                   array(
                           'id'      => $dta['prdcd'],
                           'qty'     => 1,
                           'price'   => $dta['price'],
                           'name'    => $dta['title'],
                           'options' => array('filename' => $dta['file'])
                        ),
                   
                ); 
             //print_r($data);
             $this->cart->insert($data); 
             $arr = array("response" => "true", "message" => "Data kaset $dta[prdcd] sudah dimasukkan ke dalam cart..!!");
         } else {
             $arr = array("response" => "false", "message" => "Data kaset $dta[prdcd] sudah ada di cart..!!");
         }   
         echo json_encode($arr);
     }

    public function getDataKasetByID($id) {
       
        $sess = $this->nativesession->get('sessdata');  
        $this->xmlrpc->method('get.dataKaset');
        $request = array(array(array(
              "kd_kaset" => array($id, 'string'), 
              "username" => array($this->session->userdata('username'), 'string'),
              "signature" => array(md5($this->session->userdata('username') . '12345'), 'string')
          ), 'struct'
        )); 
            
        $this->xmlrpc->request($request);

        if (!$this->xmlrpc->send_request()) {   
            return null;
        } else {
            $dtax = $this->xmlrpc->display_response();
            return json_decode($dtax['arrayData']);
        }     
    }
     
     private function IfDoubleInputCart($prdcdDet) {
         //$this->load->library('cart');    
         $arr = false;    
         foreach ($this->cart->contents() as $items) {
             if($items['id'] == $prdcdDet) {
                 $arr = true;
             }
         }
         return $arr;
     }
     
     //$route['novoucher/cart/list'] = "ks_store/getListCart";
     public function getListCart() {
         //$this->load->library('cart');
         $data['username'] = $this->session->userdata('username');
         $this->load->view($this->urlConfig);
		 $this->load->view("ks_store/include/ks_header", $data);
        $this->load->view('ks_store/getListCart', $data);
		$this->load->view("ks_store/include/ks_footer", $data);
         
     }
     
     //$route['novoucher/cart/list2'] = "ks_store/getListCart";
     public function getListCart2() {
         //$this->load->library('cart');
         $data['username'] = $this->session->userdata('username');
         $this->load->view('ks_store/getListCart2', $data);
     }
     
     //$route['novoucher/cart/update'] = "ks_store/getUpdateCart";
     public function getUpdateCart() {
        $data = $this->updateCart();
        echo "<script>alert('Cart sudah di update..!!')</script>";
        redirect('novoucher/cart/list');
     }
     
     //$route['novoucher/cart/update2'] = "ks_store/getUpdateCart";
     public function getUpdateCart2() {
        $data = $this->updateCart();
        $this->load->view('ks_store/getListCart2', $data);
     }
     
     private function updateCart() {
        //$this->load->library('cart');
        $data = $this->input->post(NULL, TRUE);
        $jum = count($data['rowid']);
        //echo $jum;
        //print_r($data);
        for($i = 0; $i < $jum; $i++) {
            $xxx = array(
               'rowid' => $data['rowid'][$i],
               'qty'   => $data['qty'][$i]
            );

            $this->cart->update($xxx);
        }
        
        return $data;
     }
     
     //$route['novoucher/cart/proceed'] = "ks_store/proceedCart";
     public function proceedCart() {
         $sss = $this->updateCart();
         //$this->xmlrpc->set_debug(TRUE);
         $data['token'] = $this->checkSaldo();
         
		 
         //print_r($data['token']);
         //$data['token'] = $this->checkSaldo(); 
         $this->load->view('ks_store/proceedCart', $data);
     }

     public function checkSaldo() {
        $server_url = 'http://www.k-cashonline.com/interkoneksi/server_dev.php';
        $this->xmlrpc->server($server_url, 80);       
        //$this->xmlrpc->set_debug(TRUE);
        //method to use at xmlrpc_server
        $this->xmlrpc->method('trx.ceksaldo');
        
        $request = array();
        $valReturn = array();
        //$this->xmlrpc->set_debug(TRUE);
       
        //$resRPC = $this->session->userdata('resultrpc');
        $total = $this->cart->total();
        
         $request = array(array(array(
    	   		    "idmember"  => array("IDSPAAA66834",'string'),
    	       	    "idstk" => array("BID06",'string'),
    	   		    "total"  => array('100','double'),
    	   		    "signature"  => array(md5("IDSPAAA66834".'12345'),'string')
    	       		  ),'struct'
                    ));
        
        //print_r($request);

        $this->xmlrpc->request($request);
        $kirim = $this->xmlrpc->send_request();
        
        if (!$kirim) {
        //if (!$this->xmlrpc->send_request()){
            //echo "<br>disni error <br>";
            //echo $this->xmlrpc->display_error();
            return array("saldo" => 0, "error" => "error");
        } else {
            $valReturn = $this->xmlrpc->display_response();
            
            //print_r($this->xmlrpc->display_response());
            return $valReturn;
        }
     }

     //$route['novoucher/cart/save'] = "ks_store/saveProceedCart";
     public function saveProceedCart() {
         $input = $this->input->post(NULL, TRUE);
         /*if($input['token'] != $input['tokenCheck'])  {
            $arr = array("response" => "false", "message" => "Invalid Token..!!"); 
         } else {
         */    
            $data['orderno']   = $this->getOrderNoDownload();
            $data['dataSales'] = $this->sendDataSales($input, $data['orderno']);
            $ins['insHistTrx']= $this->insertHistoryTrxNoVoucher($data['orderno']);
            $data['listBundling'] = $this->showProductToDownload($data['orderno']);
            //$arr = array("response" => "true");
           
            $this->load->view('ks_store/saveCartSuccess', $data);
            //print_r($data['listBundling']);
            if($data['dataSales']['sukses']==true) {
                $this->cart->destroy();
            }     
         //}

    
         //echo json_encode($arr);
         //echo $arr['response'];
         //print_r($data);
     }   
	 
	 public function showProductToDownload($orderno) {
	 	$request = array();
        $valReturn = array();
        //$this->xmlrpc->set_debug(TRUE);
        $this->xmlrpc->timeout(60);
        $this->xmlrpc->server($this->url, 80); 
        $this->xmlrpc->method('get.downloadByOrderno');
        $resRPC = $this->session->userdata('resultrpc');
       
        //print_r();    
        $request = array(array(array(
                    "idmember" => array($this->session->userdata('username'), 'string'),
                    "orderno" => array($orderno['orderno'], 'string'),
                    "ip" => array($this->ip, 'string'),
                    "signature" => array(md5($this->session->userdata('username') . '12345'), 'string')
                ), 'struct'
        ));
        
        //print_r($request);
        $this->xmlrpc->request($request);

        if (!$this->xmlrpc->send_request()) {
            return false;
        } else {
            $valReturn = $this->xmlrpc->display_response();
            return json_decode($valReturn['arrayData']);
        }
     }

     private function insertHistoryTrxNoVoucher($orderno) {
        $request = array();
        $valReturn = array();
        //$this->xmlrpc->set_debug(TRUE);
        $this->xmlrpc->timeout(60);
        $this->xmlrpc->server($this->url, 80); 
        $this->xmlrpc->method('set.downloadKasetNoVoucher');
        $resRPC = $this->session->userdata('resultrpc');
        
        $isiprd = array();   
        foreach ($this->cart->contents() as $items) {
             array_push($isiprd, $items['id']);
        }
        //print_r();    
        $request = array(array(array(
                    "idmember" => array($this->session->userdata('username'), 'string'),
                    "orderno" => array($orderno['orderno'], 'string'),
                    "prdcat" => array("", 'string'),
                    "prddet" => array(json_encode($isiprd), 'string'),
                    "ip" => array($this->ip, 'string'),
                    "signature" => array(md5($this->session->userdata('username') . '12345'), 'string')
                ), 'struct'
        ));
        
        
        //print_r($request);
        /*echo "<br />";
        print_r($request[0][0]['prddet'][0]);
        $xx = $request[0][0]['prddet'][0];
        $jml = count($xx);
        for($i=0; $i<$jml;$i++) {
            echo $xx[$i];
        }*/
        $this->xmlrpc->request($request);

        if (!$this->xmlrpc->send_request()) {
            return false;
        } else {
            $valReturn = $this->xmlrpc->display_response();
            return true;
            //print_r($valReturn);
        }
     }
     
     
     private function sendDataSales($input, $orderno) {
         //$input = $this->input->post(NULL, TRUE);   
         $request = array();
         $valReturn = array();
         $total = $this->cart->total(); 
         //$this->xmlrpc->set_debug(TRUE);
         $server_url = 'http://www.k-cashonline.com/interkoneksi/server_dev.php';
         $this->xmlrpc->server($server_url, 80); 
         $this->xmlrpc->method('trx.buy');         
         $request = array(array(array(
                            "idmember"  => array($this->session->userdata('username'),'string'),
                            "idstk" => array("BID06",'string'),
                            "total"  => array($total,'double'),
                            "token"  => array($input['token'],'string'),
                            "orderno" => array($orderno['orderno'],'string'),
                            "signature"  => array(md5($this->session->userdata('username').'12345'),'string')
                        ),'struct'
          ));
         //print_r($request);
         $this->xmlrpc->request($request);
         $kirim = $this->xmlrpc->send_request();
         if (!$kirim) {
            //print_r("send_request : FALSE");
            return null;
         } else {
            $valReturn = $this->xmlrpc->display_response();
            //print_r($valReturn);
            return $valReturn;
         } 
          
     } 

     private function getOrderNoDownload() {
         $request = array();
         $valReturn = array();    
         $this->xmlrpc->server($this->url, 80); 
         $this->xmlrpc->method(' get.ordernoDownload');    
         //$this->xmlrpc->set_debug(TRUE);     
         $request = array(array(array(
                            "idmember"  => array($this->session->userdata('username'),'string'),
                            "signature"  => array(md5($this->session->userdata('username').'12345'),'string')
                        ),'struct'
          ));
         //print_r($request); 
         $this->xmlrpc->request($request);
         $kirim = $this->xmlrpc->send_request();
         if (!$kirim) {
            return null;
         } else {
            $valReturn = $this->xmlrpc->display_response();
            //print_r($valReturn);
            return $valReturn;
         }  
     }   
     
}
    