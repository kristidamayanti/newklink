<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdmLangganan extends CI_Controller {
    
    private $url = 'www.k-linkmember.co.id/langganan_rpc/index.php/xmlrpc_serverss/';
    private $urlConfig = "html_config";
    private $urlReturn = "admLangganan";

	public function AdmLangganan() {
		parent::__construct();
        $this->load->model('m_admlangganan');
         $this->xmlrpc->server(prep_url($this->url), 80);
        //$this->load->model('m_admin');
	}
    
    public function getFormUploadCasette(){
        $sess = $this->nativesession->get('sessdata');
        if($sess[0]->username != null) {
           $data['form_header'] = "Input Product";
           $data['form_action'] = site_url('/AdmLangganan/getFormUploadCasette');
           $data['icon'] = "icon-pencil";
           $this->setTemplate('admin/langganan/getFormUploadCasette', $data); 
        } else {
           redirect('admin/index', 'refresh');
        } 
    }
    
    public function getListLanggananByParam($fieldName, $paramValue, $type="json") {
        //$this->xmlrpc->set_debug(TRUE);
        $sess = $this->nativesession->get('sessdata');
        
        $request = array();
        $valReturn = array();

        $this->xmlrpc->method('check.kdkaset');
        $request = array(array(array(
                    "kd_kaset" => array("$paramValue", 'string'),
                    "idmember" => array($sess[0]->username, 'string'),
                    "signature" => array(md5($sess[0]->username . '12345'), 'string')
                ), 'struct'
        ));

        $this->xmlrpc->request($request);

        if (!$this->xmlrpc->send_request()) {
            //echo $this->xmlrpc->display_error();
            $arr = array("response" => "false");
            echo json_encode($arr);
        } else {
            $data['result'] = $this->xmlrpc->display_response();
            $prdcd = $data['result']['prdcd'];
            $prdnm = $data['result']['prdnm'];
            $arr = array("response" => "true");
            echo json_encode($arr);
            //return $valReturn = $this->xmlrpc->display_response();
            //echo json_encode($valReturn);
        }
        
        /*$arr = $this->m_admlangganan->getListLanggananByParam($fieldName, $paramValue, $type);    
        if($type == "json") {
            echo json_encode($arr);
        }*/
        
    }
    
   	public function getListLangganan($type = "array") {
   	    //$this->xmlrpc->set_debug(TRUE);
        $this->xmlrpc->method('get.listProduct');
        
        if (!$this->xmlrpc->send_request()) {
            $arr = array("response" => "false", "message" => "No Result found..!!");
            echo json_encode($arr);
            
         } else {
             
            $dtax = $this->xmlrpc->display_response();
            $arr = array("response" => "true", "arrayData" => json_decode($dtax['arrayData'])); 
            echo json_encode($arr);
            
         }
    }
    
    private function getListLanggananRPC() {
        $this->xmlrpc->method('get.listProduct');
        if (!$this->xmlrpc->send_request()) {
            $arr = array("response" => "false");
        } else {   
        
            $dtax = $this->xmlrpc->display_response();
            $arr = array("response" => "true", "arrayData" => json_decode($dtax['arrayData']));   
        } 
        return $arr;
    }
    
    public function getLanggananByID($id) {
        /*$arr1 = $this->m_admlangganan->getLanggananByID($id);
        $arr2 = $this->m_admlangganan->getListLanggananImage($id);
        if($arr1 != null) {
            if($arr2 != null) {
                $res = array("response" => "true", "arraydata" => $arr1, "arrayimage" => $arr2);
            } else {
                $res = array("response" => "true", "arraydata" => $arr1, "arrayimage" => "");
            }
        } else {
            $res = array("response" => "false");
        }
        echo json_encode($res); */
        $sess = $this->nativesession->get('sessdata');  
        $this->xmlrpc->method('get.dataKaset');
        $request = array(array(array(
              "kd_kaset" => array($id, 'string'), 
              "username" => array($sess[0]->username, 'string'),
              "signature" => array(md5($sess[0]->username . '12345'), 'string')
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
    
    public function saveUploadKaset(){
        $sess = $this->nativesession->get('sessdata');  
        //$this->xmlrpc->set_debug(TRUE);  
        //$arr = $this->setValidationErrorMessage();    
        if ($this->form_validation->run('saveKaset') == TRUE) {
            $data = $this->input->post(NULL, TRUE);
            
            $this->xmlrpc->method('ins.saveKaset');
            $request = array(array(array(
                        //"kd_kaset" => array($data['kd_kaset'], 'string'),
                        "kd_kaset2" => array($data['kd_kaset2'], 'string'),
                        "title" => array($data['title'], 'string'),
                        "kasetDetail" => array($data['kasetDetail'], 'string'),
                        "hrgawest" => array($data['hrgawest'], 'string'),
                        "hrgaeest" => array($data['hrgaeest'], 'string'),
                        "fileCover" => array($_FILES['fileCover']['name'], 'string'),
                        "fileKaset" => array($_FILES['fileKaset']['name'], 'string'),
                        "status" => array($data['status'], 'string'),
                        "thn" => array($data['thn'], 'string'),
                        "bln" => array($data['bln'], 'string'),
                        "ip_address" => array($this->input->ip_address(), 'string'),
                        "act" => array($data['act'], 'string'),
                        "username" => array($sess[0]->username, 'string'),
                        "signature" => array(md5($sess[0]->username . '12345'), 'string')
                    ), 'struct'
            )); 
            
            
            $this->xmlrpc->request($request);

            if (!$this->xmlrpc->send_request()) {
                
                $arr = array("response" => "false");
                echo json_encode($arr);
            } else {
                 if($_FILES["fileKaset"]['error'] == 0) {
                     $dirx  = $this->setTargetUpload("upload/kaset/");
                     $filex = $this->uploadFileImage2($dirx, "fileKaset");
                 } 
                 if($_FILES["fileCover"]['error'] == 0) {
                     $dirx  = $this->setTargetUpload("upload/kaset/thumbnail/");
                     $filex = $this->uploadFileImage2($dirx, "fileCover");                   
                 }        
                    
                $data['result'] = $this->xmlrpc->display_response();
                $prdcd = $data['result']['prdcd'];
                $prdnm = $data['result']['prdnm'];
                $arr = array("response" => "true", "prdcd" => $prdcd, "prdnm" => $prdnm);
                echo json_encode($arr);
                
            }  
            //echo json_encode($data);
        } 
        //echo json_encode($arr);
    }
    
    public function saveUpdateLangganan() {
       /*$arr = $this->setValidationErrorMessage();    
        if ($this->form_validation->run('saveKaset') == TRUE) {
            $arr = $this->m_admlangganan->saveUpdateLangganan();
            if($arr['response'] == "true") {
                 if($_FILES["fileKaset"]['error'] == 0) {
                     $dirx  = $this->setTargetUpload("upload/kaset/");
                     $filex = $this->uploadFileImage2($dirx, "fileKaset");
                 } 
                 if($_FILES["fileCover"]['error'] == 0) {
                     $dirx  = $this->setTargetUpload("upload/kaset/thumbnail/");
                     $filex = $this->uploadFileImage2($dirx, "fileCover");                   
                 } 
            }  
        } 
        echo json_encode($arr); */
        
       $sess = $this->nativesession->get('sessdata');  
        //$this->xmlrpc->set_debug(TRUE);  
        //$arr = $this->setValidationErrorMessage();    
        //if ($this->form_validation->run('saveKaset') == TRUE) {
            $data = $this->input->post(NULL, TRUE);
            
            $this->xmlrpc->method('set.updateProduct');
            $request = array(array(array(
                        "kd_kaset" => array($data['kd_kaset'], 'string'),
                        "kd_kaset2" => array($data['kd_kaset2'], 'string'),
                        "title" => array($data['title'], 'string'),
                        "kasetDetail" => array($data['kasetDetail'], 'string'),
                        "hrgawest" => array($data['hrgawest'], 'string'),
                        "hrgaeest" => array($data['hrgaeest'], 'string'),
                        "fileCover" => array($_FILES['fileCover']['name'], 'string'),
                        "fileKaset" => array($_FILES['fileKaset']['name'], 'string'),
                        "ip_address" => array($this->input->ip_address(), 'string'),
                        //tambahan DION
                        "status" => array($data['status'], 'string'),
						"thn" => array($data['thn'], 'string'),
                        "bln" => array($data['bln'], 'string'),
                        //end
                        "act" => array($data['act'], 'string'),
                        "username" => array($sess[0]->username, 'string'),
                        "signature" => array(md5($sess[0]->username . '12345'), 'string')
                    ), 'struct'
            )); 
            //print_r($request);
            
            $this->xmlrpc->request($request);

            if (!$this->xmlrpc->send_request()) {
                
                $arr = array("response" => "false", "message" => "Data Tidak Bisa Di Update karena sudah ada record di History Transaction");
                echo json_encode($arr);
            } else {
               $data['result'] = $this->xmlrpc->display_response();	
               if($data['result']['sukses'] == "historyTrxInserted") {
               	  $arr = array("response" => "false", "message" => "Data Tidak Bisa Di Update karena sudah ada record di History Transaction");
				   echo json_encode($arr);
               } else {
               	   if($_FILES["fileKaset"]['error'] == 0) {
                     $dirx  = $this->setTargetUpload("upload/kaset/");
                     $filex = $this->uploadFileImage2($dirx, "fileKaset");
                   } 
                   if($_FILES["fileCover"]['error'] == 0) {
                     $dirx  = $this->setTargetUpload("upload/kaset/thumbnail/");
                     $filex = $this->uploadFileImage2($dirx, "fileCover");                   
                   }        
                    
                
                    $arr = array("response" => "true", "message" => "Product successfully updated..!!");
                    echo json_encode($arr);
               }  	
					
                
                
            }  
            //echo json_encode($data);
        //} 
        //echo json_encode($data);
    }
    
    
    function deleteLangganan($id){
       // $arr = $this->m_admlangganan->deleteLangganan($id);    
       // echo json_encode($arr);
       
        $sess = $this->nativesession->get('sessdata');  
       
        $data = $this->input->post(NULL, TRUE);
        
        $this->xmlrpc->method('set.deleteProduct');
        $request = array(array(array(
                    "kd_kaset" => array($id, 'string'),
                    "username" => array($sess[0]->username, 'string'),
                    "signature" => array(md5($sess[0]->username . '12345'), 'string')
                ), 'struct'
        )); 
        
        $this->xmlrpc->request($request);

        if (!$this->xmlrpc->send_request()) {            
            $arr = array("response" => "false");
            echo json_encode($arr);
        } else {
            $data['result'] = $this->xmlrpc->display_response();
            $arr = array("response" => "true", "message" => "Product successfully deleted..!!");
            echo json_encode($arr);
            
        }  
    }
    
    public function getListCassete() {
        
    } 
    
    /*
     * ----------------------
     * MODUL PRODUCT BUNDLING
     * ----------------------*/
    
    public function getInputProductBundling() {
        $sess = $this->nativesession->get('sessdata');
        if($sess[0]->username != null) {
           $data['form_header'] = "Input Product Bundling";
           $data['form_action'] = site_url('/AdmLangganan/getInputProductBundling');
           $data['icon'] = "icon-pencil";
           
           $this->xmlrpc->method('get.listProduct');
        
            if (!$this->xmlrpc->send_request()) {
                $data['arrayData'] = null;
            } else {
                 
                $dtax = $this->xmlrpc->display_response();
                $data['arrayData'] = json_decode($dtax['arrayData']); 
            }
           
           $this->setTemplate('admin/langganan/getInputProductBundling', $data); 
        } else {
           redirect('admin/index', 'refresh');
        } 
    }
    
    public function getListAllProductBundling() {
        $this->xmlrpc->method('get.listBundlingAll');
        
         if (!$this->xmlrpc->send_request()) {
            $arr = array("response" => "false", "message" => "No Result found..!!");
            echo json_encode($arr);
            
         } else {
             
            $dtax = $this->xmlrpc->display_response();
            $arr = array("response" => "true", "arrayData" => json_decode($dtax['arrayData'])); 
            echo json_encode($arr);
            
         }
    }
    
    public function getListProductBundlingByID($id) {
       // $this->xmlrpc->set_debug(TRUE);      
        $sess = $this->nativesession->get('sessdata');  
        $this->xmlrpc->method('get.BundlingById');
        $request = array(array(array(
              "prdcdcat" => array($id, 'string'), 
              "username" => array($sess[0]->username, 'string'),
              "signature" => array(md5($sess[0]->username . '12345'), 'string')
          ), 'struct'
        )); 
            
        $this->xmlrpc->request($request);

        if (!$this->xmlrpc->send_request()) {   
            $arr = array("response" => "false");
            echo json_encode($arr);
        } else {
            $dtax = $this->xmlrpc->display_response();
            $prdcdcat = $dtax['prdcdcat'];
            $prdcdcatNm = $dtax['prdcdcatNm'];
            $description = $dtax['description'];
            $act = $dtax['act'];
            $arr = array("response" => "true", "arrayData" => json_decode($dtax['arrayData']), "prdcdcat" => $prdcdcat, "prdcdcatNm" => $prdcdcatNm, "description" => $description, "act" => $act);
            echo json_encode($arr);
        }     
    }
    
    public function saveProductBundling() {
        $sess = $this->nativesession->get('sessdata');  
        //$this->xmlrpc->set_debug(TRUE);  
        //$arr = $this->setValidationErrorMessage();    
        if ($this->form_validation->run('savePrdBundling') == TRUE) {
            $data = $this->input->post(NULL, TRUE);
            
            $this->xmlrpc->method('set.saveProdPaket');
            $request = array(array(array(
                        //"kd_kaset" => array($data['kd_kaset'], 'string'),
                        "name" => array($data['name'], 'string'),
                        "prdcdDet" => array(json_encode($data['prdcdDet']), 'string'),
                        "prdcdNmDet" => array(json_encode($data['prdcdNmDet']), 'string'),
                        "desc" => array($data['prdbundling_desc'], 'string'),
                        "westprice" => array(json_encode($data['westprice']), 'string'),
                        "eastprice" => array(json_encode($data['eastprice']), 'string'),
                        "tot_westprice" => array($data['tot_westprice'], 'string'),
                        "tot_eastprice" => array($data['tot_eastprice'], 'string'),
                        "ip_address" => array($this->input->ip_address(), 'string'),
                        "act" => array($data['act'], 'string'),
                        "username" => array($sess[0]->username, 'string'),
                        "signature" => array(md5($sess[0]->username . '12345'), 'string')
                    ), 'struct'
            )); 
            
            
            $this->xmlrpc->request($request);

            if (!$this->xmlrpc->send_request()) {
                
                $arr = array("response" => "false", "message" => "Input Product bundling failed..!!");
                echo json_encode($arr);
            } else {
                 
                $data['result'] = $this->xmlrpc->display_response();
                $prdcd = $data['result']['prdcdcat'];
                $prdnm = $data['result']['prdnm'];
                $arr = array("response" => "true", "message" => "Input Product bundling $prdcd / $prdnm success..!!");
                echo json_encode($arr);
                
            }  
            
        } 
    }
    
    public function updateProductBundling() {
        $sess = $this->nativesession->get('sessdata');  
        $data = $this->input->post(NULL, TRUE);
        //$this->xmlrpc->set_debug(TRUE);  
        $this->xmlrpc->method('set.updateBundlingPrd');
        $request = array(array(array(
                        "prdcdcat" => array($data['prdcd_cat'], 'string'),
                        "name" => array($data['name'], 'string'),
                        "prdcdDet" => array(json_encode($data['prdcdDet']), 'string'),
                        "prdcdNmDet" => array(json_encode($data['prdcdNmDet']), 'string'),
                        "desc" => array($data['prdbundling_desc'], 'string'),
                        "westprice" => array(json_encode($data['westprice']), 'string'),
                        "eastprice" => array(json_encode($data['eastprice']), 'string'),
                        "tot_westprice" => array($data['tot_westprice'], 'string'),
                        "tot_eastprice" => array($data['tot_eastprice'], 'string'),
                        "ip_address" => array($this->input->ip_address(), 'string'),
                        "act" => array($data['act'], 'string'),
                        "username" => array($sess[0]->username, 'string'),
                        "signature" => array(md5($sess[0]->username . '12345'), 'string')
                    ), 'struct'
            )); 
        
        $this->xmlrpc->request($request);

        if (!$this->xmlrpc->send_request()) {            
            $arr = array("response" => "false", "message" => "Product Bundling failed to be updated..!!");
            echo json_encode($arr);
        } else {
            $data['result'] = $this->xmlrpc->display_response();
            $arr = array("response" => "true", "message" => "Product Bundling successfully updated..!!");
            echo json_encode($arr);
            
        }  
    }
    
    public function deleteProductBundling($id) {
        $sess = $this->nativesession->get('sessdata');  
        $data = $this->input->post(NULL, TRUE);
        //$this->xmlrpc->set_debug(TRUE); 
        $this->xmlrpc->method('set.deleteBundlingPrd');
        $request = array(array(array(
                    "prdcdcat" => array($id, 'string'),
                    "username" => array($sess[0]->username, 'string'),
                    "signature" => array(md5($sess[0]->username . '12345'), 'string')
                ), 'struct'
        )); 
        
        $this->xmlrpc->request($request);

        if (!$this->xmlrpc->send_request()) {            
            $arr = array("response" => "false", "message" => "Product Bundling failed to be deleted..!!");
            echo json_encode($arr);
        } else {
            $data['result'] = $this->xmlrpc->display_response();
            $arr = array("response" => "true", "message" => "Product Bundling successfully deleted..!!");
            echo json_encode($arr);
            
        }  
    }
    
    /*------------------
     * MODUL VOUCHER
     * ----------------
     */
     
     public function getInputVoucher() {
        $sess = $this->nativesession->get('sessdata');
        if($sess[0]->username != null) {
           $data['form_header'] = "Input Voucher";
           $data['form_action'] = site_url('/AdmLangganan/getInputVoucher');
           $data['icon'] = "icon-pencil";
           
             $this->xmlrpc->method('get.listBundlingAll');
        
             if (!$this->xmlrpc->send_request()) {
                $arr = array("response" => "false", "message" => "No Result found..!!");
                $data['prdbundling'] = null;
                
             } else {
                 
                $dtax = $this->xmlrpc->display_response();
                $data['prdbundling'] = json_decode($dtax['arrayData']);
                
             }
           $this->setTemplate('admin/langganan/getInputVoucher', $data); 
        } else {
           redirect('admin/index', 'refresh');
        } 
     }

    public function generateRandomString($length = 6, $tipe = "numeric") {
       if($tipe == "numeric") {     
         return substr(str_shuffle("0123456789"), 0, $length);
       } else if($tipe == "all") {
         return substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);  
       }   
    }
     
     public function inputNewVoucher() {
         $data = $this->input->post(NULL, TRUE);
         $sess = $this->nativesession->get('sessdata');
         //$this->xmlrpc->set_debug(TRUE);
         $this->xmlrpc->method('ins.saveVoucher');
         $jam = date("h:i:s");
         $startfrom = $data['startFrom']." ".$jam;
         $request = array(array(array(
                    "qty" => array($data['qty'], 'string'),
                    "price" => array($data['price'], 'string'),
                    "period" => array($data['periode'], 'string'),
                    "startdt" => array($startfrom, 'string'),
                    //"prdcd" => array($data['prdcdcat'], 'string'),
                    //"act" => array($data['act'], 'string'),
                    "username" => array($sess[0]->username, 'string'),
                    "ip_addr" => array($this->input->ip_address(), 'string'),
                    "signature" => array(md5($sess[0]->username . '12345'), 'string')
                ), 'struct'
         )); 
        
         $this->xmlrpc->request($request);

         if (!$this->xmlrpc->send_request()) {
            
            $arr = array("response" => "false", "message" => "Input new voucher failed..!!");
            echo json_encode($arr);
            
         } else {
             
            $dta = $this->xmlrpc->display_response();
            $arr = array("response" => "true", "message" => "Input new voucher success..!!");
            echo json_encode($arr);
            
         }
     }

     public function getVoucherReport() {
        $sess = $this->nativesession->get('sessdata');
        if($sess[0]->username != null) {
           $data['form_header'] = "Voucher List";
           $data['form_action'] = site_url('/AdmLangganan/getVoucherReport');
           $data['icon'] = "icon-pencil";
           $this->setTemplate('admin/langganan/getVoucherReport', $data); 
        } else {
           redirect('admin/index', 'refresh');
        } 
     } 
     
     public function getListVoucherReport() {
         //$this->xmlrpc->set_debug(TRUE);
         $data = $this->input->post(NULL, TRUE);
         $sess = $this->nativesession->get('sessdata');
         $this->xmlrpc->method('check.listVoucher');
         $request = array(array(array(
                    "validFrom" => array($data['validFrom'], 'string'),
                    "validTo" => array($data['validTo'], 'string'),
                    "act" => array($data['act'], 'string'),
                    "username" => array($sess[0]->username, 'string'),
                    "signature" => array(md5($sess[0]->username . '12345'), 'string')
                ), 'struct')); 
        
         $this->xmlrpc->request($request);

         if (!$this->xmlrpc->send_request()) {
            $arr = array("response" => "false", "message" => "No Result found..!!");
            echo json_encode($arr);
            
         } else {
             
            $dtax = $this->xmlrpc->display_response();
            $arr = array("response" => "true", "arrayData" => json_decode($dtax['arrayData'])); 
            echo json_encode($arr);
            
         }
     } 

     public function getVoucherByID($id) {
        //$this->xmlrpc->set_debug(TRUE);    
        $sess = $this->nativesession->get('sessdata');  
        $this->xmlrpc->method('get.DetailVoucherByID');
        $request = array(array(array(
              "vchno" => array($id, 'string'), 
              "username" => array($sess[0]->username, 'string'),
              "signature" => array(md5($sess[0]->username . '12345'), 'string')
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
     
     public function getUpdateVoucher($id) {
        //$this->xmlrpc->set_debug(TRUE);    
        $sess = $this->nativesession->get('sessdata');  
        $this->xmlrpc->method('get.DetailVoucherByIDForUpd');
        $request = array(array(array(
              "vchno" => array($id, 'string'), 
              "username" => array($sess[0]->username, 'string'),
              "signature" => array(md5($sess[0]->username . '12345'), 'string')
          ), 'struct'
        )); 
            
        $this->xmlrpc->request($request);

        if (!$this->xmlrpc->send_request()) {   
            $result['res'] = null;
        } else {
            $dtax = $this->xmlrpc->display_response();
            $result['res'] = json_decode($dtax['arrayData']);    
            $result['listPrdBundling'] = json_decode($dtax['listPrdBundling']);  
        }     
        $this->load->view('admin/langganan/getUpdateVoucher', $result);
     } 
     
    public function saveUpdateVoucher() {
        $data = $this->input->post(NULL, TRUE);
        $sess = $this->nativesession->get('sessdata');  
        $this->xmlrpc->method('set.updateVoucher');
        $request = array(array(array(
              "vchno" => array($data['vchno'], 'string'),
              "prdbundling" => array($data['prdbundling'], 'string'),  
              "username" => array($sess[0]->username, 'string'),
              "signature" => array(md5($sess[0]->username . '12345'), 'string')
          ), 'struct'
        )); 
            
        $this->xmlrpc->request($request);

        if (!$this->xmlrpc->send_request()) {   
            $arr = array("response" => "false");
            echo json_encode($arr);
        } else {
            $dtax = $this->xmlrpc->display_response();
            $arr = array("response" => "true");
            echo json_encode($arr);
        }     
    } 
    
    public function deleteVoucher($id) {
        $sess = $this->nativesession->get('sessdata');  
        $data = $this->input->post(NULL, TRUE);
        //$this->xmlrpc->set_debug(TRUE); 
        $this->xmlrpc->method('set.deleteVoucher');
        $request = array(array(array(
                    "vchno" => array($id, 'string'),
                    "username" => array($sess[0]->username, 'string'),
                    "signature" => array(md5($sess[0]->username . '12345'), 'string')
                ), 'struct'
        )); 
        
        $this->xmlrpc->request($request);

        if (!$this->xmlrpc->send_request()) {            
            $arr = array("response" => "false", "message" => "Voucher No: $id failed to be deleted..!!");
            echo json_encode($arr);
        } else {
            $data['result'] = $this->xmlrpc->display_response();
            $arr = array("response" => "true", "message" => "Voucher No: $id successfully deleted..!!");
            echo json_encode($arr);
            
        }  
    }

	public function getReportDownloadProduct() {
		$sess = $this->nativesession->get('sessdata');
        if($sess[0]->username != null) {
           $data['form_header'] = "Report Download Product";
           $data['form_action'] = site_url('/AdmLangganan/getReportDownloadProduct');
           $data['icon'] = "icon-pencil";
           $this->setTemplate('admin/langganan/getReportDownloadProduct', $data); 
        } else {
           redirect('admin/index', 'refresh');
        } 
	}
	
	public function postReportDownloadProduct() {
		 $data = $this->input->post(NULL, TRUE);
		 //$this->xmlrpc->set_debug(TRUE); 
         $sess = $this->nativesession->get('sessdata');
         $this->xmlrpc->method('get.reportDownloadedProduct');
         $request = array(array(array(
                    "xDownloadFrom" => array($data['xDownloadFrom'], 'string'),
                    "xDownloadTo" => array($data['xDownloadTo'], 'string'),
                    "hist_type" => array($data['hist_type'], 'string'),
                    "username" => array($sess[0]->username, 'string'),
                    "signature" => array(md5($sess[0]->username . '12345'), 'string')
                ), 'struct')); 
        
         $this->xmlrpc->request($request);

         if (!$this->xmlrpc->send_request()) {
            $arr = array("response" => "false", "message" => "No Result found..!!");
            echo json_encode($arr);
            
         } else {
             
            $dtax = $this->xmlrpc->display_response();
            $arr = array("response" => "true", "hist_type" => $dtax['hist_type'], "arrayData" => json_decode($dtax['arrayData'])); 
            echo json_encode($arr);
            
         }
	}
}