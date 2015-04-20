<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdmBlog extends CI_Controller {
        
    public function AdmBlog() {
        parent::__construct();
        $this->load->model('m_admblog');
    }
    
    /*-----------------------------
     * BLOG TYPE MODULE 
     * ---------------------------*/
     
    public function getInputBlogType() {
        $sess = $this->nativesession->get('sessdata');
        if($sess[0]->username != null) {
           $data['form_header'] = "Input New Blog Type";
           $data['form_action'] = base_url('/admBlog/getInputBlogType');
           $data['icon'] = "icon-pencil";
           $this->setTemplate('admin/blog/getInputBlogType', $data);
        } else {
           redirect('admin/index', 'refresh');
        } 
    }
    
    public function getListBlogTypeByParam($fieldName, $paramValue, $type="json") {
        $arr = $this->m_admblog->getListBlogTypeByParam($fieldName, $paramValue, $type);    
        if($type == "json") {
            echo json_encode($arr);
        }
    }
    
    public function saveInputBlogType() {
        $arr = $this->setValidationErrorMessage();
        $this->form_validation->set_rules('bl_type', 'Blog Type ID', 'trim|required|xss_clean|numeric');
        $this->form_validation->set_rules('bl_name', 'Blog Type Title', 'trim|required|xss_clean');
        if ($this->form_validation->run() == TRUE) {
            $arr = $this->m_admblog->saveInputBlogType();
        } 
        echo json_encode($arr); 
    }
    
    public function getListBlogType($type = "array") {
        $data['listBlogType'] = $this->m_admblog->getListBlogType($type);    
        if($type == "json") {
            echo json_encode($data['listBlogType']);
        } else {
            $this->load->view('admin/blog/getListBlogType', $data);
        }
        
    }
    
    public function saveUpdateBlogType() {
        $arr = $this->setValidationErrorMessage();
        $this->form_validation->set_rules('bl_type', 'Blog Type ID', 'trim|required|xss_clean|numeric');
        $this->form_validation->set_rules('bl_name', 'Blog Type Title', 'trim|required|xss_clean');
        if ($this->form_validation->run() == TRUE) {
            $arr = $this->m_admblog->saveUpdateBlogType();
        } 
        echo json_encode($arr);
    }
    
    public function deleteBlogType($id) {
        $arr = $this->m_admblog->deleteBlogType($id);    
        echo json_encode($arr);
    } 
    
    /*-----------------------------
     * Blog  MODUL
     -----------------------------*/
    public function getInputBlog() {
        $sess = $this->nativesession->get('sessdata');
        if($sess[0]->username != null) {
           $data['form_header'] = "Input New Blog";
           $data['form_action'] = base_url('/admBlog/getInputBlog');
           $data['icon'] = "icon-pencil";
           $data['listBlogType'] = $this->m_admblog->getListBlogType();
           $this->setTemplate('admin/blog/getInputBlog', $data);
            
        } else {
           redirect('admin/index', 'refresh');
        } 
    }
    
    public function getListBlogByParam($fieldName, $paramValue, $type="json") {
        $arr = $this->m_admblog->getListBlogByParam($fieldName, $paramValue, $type);    
        if($type == "json") {
            echo json_encode($arr);
        }
    }
    
    public function getListBlogByParam2($fieldName, $paramValue, $type="json") {
        $arr = $this->m_admblog->getListBlogByParam2($fieldName, $paramValue, $type);    
        if($type == "json") {
            echo json_encode($arr);
        }
    }
    
    
    
    public function getListBlog($type = "array") {
        $data['listBlog'] = $this->m_admblog->getListBlog($type);   
        if($type == "json") {
            echo json_encode($data['listBlog']);
        } else {
            $this->load->view('admin/blog/getListBlog', $data);    
        }  
    }
    
    public function getBlogByID($id) {
        $arr1 = $this->m_admblog->geBlogByID($id);
        $arr2 = $this->m_admblog->getListBlogImage($id);
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
    
    public function saveInputBlog() {
        $arr = $this->setValidationErrorMessage();    
        if ($this->form_validation->run('saveBlog') == TRUE) {
            $arr = $this->m_admblog->saveInputBlog();
            if($arr['response'] == "true") {
                 if($_FILES["myfile"]['error'][0] == 0) {
                    $img_name = $this->uploadBlogImage($arr['id']);   
                 }  
            }  
            
        } 
        echo json_encode($arr);
    }
    
    public function saveUpdateBlog() {
        $arr = $this->setValidationErrorMessage();    
        if ($this->form_validation->run('saveBlog') == TRUE) {
            $arr = $this->m_admblog->saveUpdateBlog();
            if($arr['response'] == "true") {
                 if($_FILES["myfile"]['error'][0] == 0) {
                    $img_name = $this->uploadBlogImage($arr['id']);   
                 }  
            }  
        } 
        echo json_encode($arr); 
    }
    
    public function deleteBlog($id) {
        $arr = $this->m_admblog->deleteBlog($id);    
        echo json_encode($arr);
    }
    
    private function uploadBlogImage($idpict) {
        $output_dir = "upload/blog/original/";
        $thumb_dir = "upload/blog/thumbnail/";
        
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
                $this->m_admblog->saveImagesBlog($idpict, $fileName, $imageTitle);
                $ret[]= $fileName;
            }
            else  //Multiple files, file[]
            {
              $fileCount = count($_FILES["myfile"]["name"]);
              for($i=0; $i < $fileCount; $i++)
              {
                $fileName = $_FILES["myfile"]["name"][$i]; 
                //$imageTitle = $_POST["imageTitle"][$i];
                $imageTitle = ""; 
                if($fileName != "" || !isset($fileName)) {  
                    $dirfile = $output_dir.$fileName;
                    move_uploaded_file($_FILES["myfile"]["tmp_name"][$i],$dirfile);
                    $this->createThumbnails($dirfile, $thumb_dir, $fileName);
                    $this->m_admblog->saveImagesBlog($idpict, $fileName, $imageTitle);
                
                    $ret[]= $fileName;
                }
              }
             
            }
            return $ret;
         }   
   }

   public function setRecommendedBlog($blogid, $id) {
       $arr = $this->m_admblog->setRecommendedBlog($blogid, $id);    
        echo json_encode($arr);
   } 
   
   /*--------------------
   BLOG COMMENT MODULE
   ----------------------*/
   
   public function getListCommentBlog() {
   		$sess = $this->nativesession->get('sessdata');
        if($sess[0]->username != null) {
           $data['form_header'] = "Blog Comment Approval";
           $data['form_action'] = base_url('/admBlog/getListCommentBlog');
           $data['icon'] = "icon-pencil";
		   $data['listBlogType'] = $this->m_admblog->getListBlogType2();
           $this->setTemplate('admin/blog/getListCommentBlog', $data);
        } else {
           redirect('admin/index', 'refresh');
        } 
   }
   
   public function searchBlogComment() {
   		$data['listResult'] = $this->m_admblog->searchBlogComment();
		$data['blogName'] = $this->input->post('bl_name');
		$this->load->view('admin/blog/searchBlogCommentResult', $data);
   }
   
   public function setStatusComment($commentID, $setActive) {
   		$data['listResult'] = $this->m_admblog->setStatusComment($commentID, $setActive);
		echo json_encode($data['listResult']);
   }
   
   //UPDATE DION 03-12-2014
   public function deleteBlogComment($id) {
        $arr = $this->m_admblog->deleteBlogComment($id);
        echo json_encode($arr);
   }
   //END UPDATE
   
   /*-----------------------------
   BLOG RELATED TO PRODUCT MODULE
   ------------------------------*/
   
   public function getInputBlogProductRelated() {
        $sess = $this->nativesession->get('sessdata');
        if($sess[0]->username != null) {
           $data['form_header'] = "Input Blog Related to Product";
           $data['form_action'] = base_url('/admBlog/getListCommentBlog');
           $data['icon'] = "icon-pencil";
           $data['listProduct'] = $this->m_admblog->getListProduct();
           $data['listBlogType'] = $this->m_admblog->getListBlogType2();
           $this->setTemplate('admin/blog/getInputBlogProductRelated', $data);
        } else {
           redirect('admin/index', 'refresh');
        } 
   }

   public function getListRelatedProduct($type="json") {
        $arr = $this->m_admblog->getListProduct($type);    
        if($type == "json") {
            echo json_encode($arr);
        }
   }
   
   public function saveInputBlogProductRelated() {
        $arr = $this->setValidationErrorMessage();
        $this->form_validation->set_rules('blogID', 'Blog ID', 'trim|required|xss_clean');
        //$this->form_validation->set_rules('code[]', 'Code', 'trim|required|xss_clean');
        if ($this->form_validation->run() == TRUE) {
            $arr = $this->m_admblog->saveInputBlogProductRelated();
        } 
        echo json_encode($arr); 
   }
   
   public function getListBlogProductRelated($type = "array") {
        $data['listBlogProductRelated'] = $this->m_admblog->getListBlogProductRelated($type);   
        if($type == "json") {
            echo json_encode($data['listBlogProductRelated']);
        } else {
            $this->load->view('admin/blog/getListBlogProductRelated', $data);    
        }  
    }
   
   public function getListBlogProductRelatedByID($value, $type = "array") {
        $data['listData'] = $this->m_admblog->getListBlogProductRelatedByID($value, $type);   
        if($type == "json") {
            echo json_encode($data['listData']);
        } else {
            $this->load->view('admin/blog/getListBlogProductRelated', $data);    
        }  
    }
   
   public function saveUpdateBlogProductRelated() {
       $arr = $this->setValidationErrorMessage();
        $this->form_validation->set_rules('id', 'Blog ID', 'trim|required|xss_clean');
        //$this->form_validation->set_rules('code[]', 'Code', 'trim|required|xss_clean');
        if ($this->form_validation->run() == TRUE) {
            $arr = $this->m_admblog->saveUpdateBlogProductRelated();
        } 
        echo json_encode($arr);
   }
   
   public function deleteBlogProductRelated($id) {
        $arr = $this->m_admblog->deleteBlogProductRelated($id);    
        echo json_encode($arr);
    } 
   
   
    
}