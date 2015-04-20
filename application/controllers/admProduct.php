<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdmProduct extends CI_Controller {
    public function AdmProduct() {
        parent::__construct();
        $this->load->model('m_admproduct');
    }
	
	/*----------------------------
	 MODUL PRODUCT CATEGORY
	------------------------------*/
    public function getInputProductCat() {
        $sess = $this->nativesession->get('sessdata');
        if($sess[0]->username != null) {
           $data['form_header'] = "Input New Product Category";
           $data['form_action'] = base_url('/admProduct/getInputProductCat');
           $data['icon'] = "icon-pencil";
           $this->setTemplate('admin/product/getInputProductCat', $data);
        } else {
           redirect('admin/index', 'refresh');
        } 
    }
	 
	public function getListProductCatByParam($fieldName, $paramValue, $type="json") {
        $arr = $this->m_admproduct->getListProductCatByParam($fieldName, $paramValue, $type);    
        if($type == "json") {
            echo json_encode($arr);
        }
    }
	
    public function getListProductCat($type="array") {
		$data['listProductCat'] = $this->m_admproduct->getListProductCat($type);
		if($type == "array") {
			$this->load->view('admin/product/getListProductCat', $data);	
		}else {
			echo json_encode($data['listProductCat']);
		}       
	}
	
	public function saveInputProductCat() {
        $arr = $this->setValidationErrorMessage();    
        if ($this->form_validation->run('saveProductCat') == TRUE) {
            $arr = $this->m_admproduct->saveInputProductCat();
        } 
        echo json_encode($arr);
    }
	
	public function saveUpdateProductCat() {
        $arr = $this->setValidationErrorMessage();    
        if ($this->form_validation->run('saveProductCat') == TRUE) {
            $arr = $this->m_admproduct->saveUpdateProductCat();
        } 
        echo json_encode($arr); 
    }
    
    public function deleteProductCat($id) {
        $arr = $this->m_admproduct->deleteProductCat($id);    
        echo json_encode($arr);
    }

    /*----------------------------
	 MODUL PRODUCT 
	------------------------------*/
	public function getInputProduct() {
        $sess = $this->nativesession->get('sessdata');
        if($sess[0]->username != null) {
           $data['form_header'] = "Input New Product";
           $data['form_action'] = base_url('/admProduct/getInputProduct');
           $data['icon'] = "icon-pencil";
		   $data['listProductCat'] = $this->m_admproduct->getListProductCat();
           $this->setTemplate('admin/product/getInputProduct', $data);
        } else {
           redirect('admin/index', 'refresh');
        } 
    }
    
    public function getProductByID($id, $field="code", $type="json") {
        $arr1 = $this->m_admproduct->getProductByID($id,$field);
        $arr2 = $this->m_admproduct->getListProductImage($id);
        if($arr1 != null) {
            if($arr2 != null) {
                $res = array("response" => "true", "arraydata" => $arr1, "arrayimage" => $arr2);
            } else {
                $res = array("response" => "true", "arraydata" => $arr1, "arrayimage" => "");
            }
        } else {
            $res = array("response" => "false");
        }
        echo json_encode($res);
    }
    
    public function saveInputProduct() {
        $arr = $this->setValidationErrorMessage();    
        if ($this->form_validation->run('saveProduct') == TRUE) {
            $arr = $this->m_admproduct->saveInputProduct();
            if($arr['response'] == "true" && $_FILES["myfile"]['error'][0] == 0) {
                $img_name = $this->uploadProductImage($arr['id']);                 
            }
        } 
        echo json_encode($arr);
    }
       

    private function uploadProductImage($idpict) {
        $output_dir = "upload/product/original/";
        $thumb_dir = "upload/product/thumbnail/";
        
        if(isset($_FILES["myfile"]))
        {
            $ret = array();
        
            $error =$_FILES["myfile"]["error"];
            
            //You need to handle  both cases
            //If Any browser does not support serializing of multiple files using FormData() 
            if(!is_array($_FILES["myfile"]["name"])) //single file
            {
                $fileName = $_FILES["myfile"]["name"];
                //$imageTitle = $_POST["imageTitle"];
                $imageTitle = "";  
                $dirfile = $output_dir.$fileName;
                move_uploaded_file($_FILES["myfile"]["tmp_name"],$dirfile);
                $this->createThumbnails($dirfile, $thumb_dir, $fileName);
                $this->m_admproduct->saveImagesProduct($idpict, $fileName, $imageTitle);
                $ret[]= $fileName;
            }
            else  //Multiple files, file[]
            {
              $fileCount = count($_FILES["myfile"]["name"]);
              for($i=0; $i < $fileCount; $i++)
              {
                $fileName = $_FILES["myfile"]["name"][$i]; 
                //$imageTitle = $_POST["imageTitle"];
                $imageTitle = ""; 
                if($fileName != "" || !isset($fileName)) {  
                    $dirfile = $output_dir.$fileName;
                    move_uploaded_file($_FILES["myfile"]["tmp_name"][$i],$dirfile);
                    $this->createThumbnails($dirfile, $thumb_dir, $fileName);
                    $this->m_admproduct->saveImagesProduct($idpict, $fileName, $imageTitle);
                
                    $ret[]= $fileName;
                }
              }
             
            }
            return $ret;
         }   
   }
   
   public function saveUpdateProduct() {
        $arr = $this->setValidationErrorMessage();    
        if ($this->form_validation->run('saveProduct') == TRUE) {
            $arr = $this->m_admproduct->saveUpdateProduct();
            if($arr['response'] == "true" && $_FILES["myfile"]['error'][0] == 0) {
                $img_name = $this->uploadProductImage($arr['id']);  
                //print_r($_FILES);               
            }
        } 
        
        echo json_encode($arr); 
        //print_r($_FILES);
   }
   
    public function getListSearchProduct() {
        $sess = $this->nativesession->get('sessdata');
        if($sess[0]->username != null) {
           $data['form_header'] = "List Product";
           $data['form_action'] = base_url('/admusr/getListSearchProduct');
           $data['icon'] = "icon-pencil";          
           $this->load->view('admin/product/getListSearchProduct', $data);
           
        } else {
           redirect('admin/index', 'refresh');
        } 
    }
    
    public function getListProduct() {
        $data['listProduct'] = $this->m_admproduct->getListProduct();    
        $this->load->view('admin/product/getListProduct', $data);
    } 
    
    public function deleteProduct($id, $type="json") {
        $arr = $this->m_admproduct->deleteProduct($id);    
        echo json_encode($arr);
    }    
	
	/*--------------------------
	MODUL RELATED PRODUCT
	---------------------------*/
	
	public function getInputRelatedProduct() {
		$sess = $this->nativesession->get('sessdata');
        if($sess[0]->username != null) {
           $data['form_header'] = "Input Related Product";
           $data['form_action'] = base_url('/admProduct/getInputRelatedProduct');
           $data['icon'] = "icon-pencil";
           $data['listProduct'] = $this->m_admproduct->getListProduct2();
           $this->setTemplate('admin/product/getInputRelatedProduct', $data);
        } else {
           redirect('admin/index', 'refresh');
        } 
	}
    
    public function getListProduct2($type = "array") {
        $data['listProduct'] = $this->m_admproduct->getListProduct2($type); 
        if($type == "array") {
            $this->load->view('admin/product/getListProduct', $data);
        } else {
            echo json_encode($data['listProduct']);
        }  
        
    } 
    
    public function saveInputRelatedProduct() {
        $arr = $this->setValidationErrorMessage();    
        if ($this->form_validation->run('saveRelatedProduct') == TRUE) {
            $arr = $this->m_admproduct->saveInputRelatedProduct();
        } 
        echo json_encode($arr);
    }
    
    public function getListRelatedProduct($type = "array") {
        $data['listProduct'] = $this->m_admproduct->getListRelatedProduct($type);
        if($type == "array") {
            $this->load->view('admin/product/getListRelatedProduct', $data);    
        }else {
            echo json_encode($data['listProduct']);
        }    
    }
    
    public function getUpdateRelatedProduct($id, $type = "json") {
        $arr = $this->m_admproduct->getUpdateRelatedProduct($id, $type);    
        echo json_encode($arr);
    }
	
	public function saveUpdateRelatedProduct() {
        $arr = $this->setValidationErrorMessage();    
        if ($this->form_validation->run('updateRelatedProduct') == TRUE) {
            $arr = $this->m_admproduct->saveUpdateRelatedProduct();
        } 
        echo json_encode($arr);
    }

    public function deleteRelatedProduct($id, $type="json") {
        $arr = $this->m_admproduct->deleteRelatedProduct($id);    
        echo json_encode($arr);
    } 
    
    public function tes() {
        $dir = dirname(__FILE__);
        echo "<p>Full path to this dir: " . $dir . "</p>";
        
    }
}
    