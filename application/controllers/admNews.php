<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdmNews extends CI_Controller {
    public function AdmNews() {
        parent::__construct();
        $this->load->model('m_admnews');
    }
    
	public function getInputNewsCat() {
		$sess = $this->nativesession->get('sessdata');
        if($sess[0]->username != null) {
           $data['form_header'] = "Input News Category";
           $data['form_action'] = base_url('/admNews/getInputNewsCat');
           $data['icon'] = "icon-pencil";
           $this->setTemplate('admin/news/getInputNewsCat', $data); 
        } else {
           redirect('admin/index', 'refresh');
        } 
	}
	
	public function getListNewsCatByParam($fieldName, $paramValue, $type="json") {
        $arr = $this->m_admnews->getListNewsCatByParam($fieldName, $paramValue, $type);    
        if($type == "json") {
            echo json_encode($arr);
        }
    }
	
	public function getListNewsCat($type = "array") {
        $data['listNewsCat'] = $this->m_admnews->getListNewsCat();    
        if($type == "json") {
            echo json_encode($data['listNewsCat']);
        } else {
            $this->load->view('admin/news/getListNewsCat', $data);
        }
        
    }
    
    public function getListNewsCat2($type = "array") {
        $data['listNewsCat'] = $this->m_admnews->getListNewsCat2();    
        if($type == "json") {
            echo json_encode($data['listNewsCat']);
        } else {
            $this->load->view('admin/news/getListNewsCat', $data);
        }
        
    }
    
    public function saveInputNewsCat() {
        $arr = $this->setValidationErrorMessage();    
        $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
        if ($this->form_validation->run() == TRUE) {
            $arr = $this->m_admnews->saveInputNewsCat();
        } 
        echo json_encode($arr); 
    }
	
	public function saveUpdateNewsCat() {
        $arr = $this->setValidationErrorMessage();    
        $this->form_validation->set_rules('title', 'title', 'trim|required|xss_clean');
        if ($this->form_validation->run() == TRUE) {
            $arr = $this->m_admnews->saveUpdateNewsCat();
        } 
        echo json_encode($arr); 
    }
    
    public function deleteNewsCat($id) {
        $arr = $this->m_admnews->deleteNewsCat($id);    
        echo json_encode($arr);
    }
	
	/*-----------------------------
     * NEWS  MODUL
     -----------------------------*/
    public function getInputNews() {
        $sess = $this->nativesession->get('sessdata');
        if($sess[0]->username != null) {
           $data['form_header'] = "Input New News";
           $data['form_action'] = base_url('/admNews/getInputNews');
           $data['icon'] = "icon-pencil";
           $data['listNewsCat'] = $this->m_admnews->getListNewsCat();
           $this->setTemplate('admin/news/getInputNews', $data);
            
        } else {
           redirect('admin/index', 'refresh');
        } 
    }
    
    public function getListNewsByParam($fieldName, $paramValue, $type="json") {
        $arr = $this->m_admnews->getListNewsByParam($fieldName, $paramValue, $type);    
        if($type == "json") {
            echo json_encode($arr);
        }
    }
	
	public function getListNews($type = "array") {
        $data['listNews'] = $this->m_admnews->getListNews();   
        if($type == "json") {
            echo json_encode($data['listNews']);
        } else {
            $this->load->view('admin/news/getListNews', $data);    
        }  
    }
	
	public function getNewsByID($id) {
        $arr1 = $this->m_admnews->geNewsByID($id);
        $arr2 = $this->m_admnews->getListNewsImage($id);
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
    
    public function saveInputNews() {
        $arr = $this->setValidationErrorMessage();    
        if ($this->form_validation->run('saveNews') == TRUE) {
            $arr = $this->m_admnews->saveInputNews();
            if($arr['response'] == "true") {
                 if($_FILES["myfile"]['error'][0] == 0) {
                    $img_name = $this->uploadNewsImage($arr['id']);   
                 }  
                 if($_FILES["url_filedownload"]['error'] == 0) {
                     $dirx  = $this->setTargetUpload("upload/news/download/");
                     $filex = $this->uploadFileImage2($dirx, "url_filedownload");
                 } 
                 if($_FILES["url_audio"]['error'] == 0) {
                     $dirx  = $this->setTargetUpload("upload/news/audio/");
                     $filex = $this->uploadFileImage2($dirx, "url_audio");                   
                 } 
            }  
            
        } 
        echo json_encode($arr);
    }
	
	public function saveUpdateNews() {
        $arr = $this->setValidationErrorMessage();    
        if ($this->form_validation->run('saveNews') == TRUE) {
            $arr = $this->m_admnews->saveUpdateNews();
            if($arr['response'] == "true") {
                 if($_FILES["myfile"]['error'][0] == 0) {
                    $img_name = $this->uploadNewsImage($arr['id']);   
                 }  
                 if($_FILES["url_filedownload"]['error'] == 0) {
                     $dirx  = $this->setTargetUpload("upload/news/download/");
                     $filex = $this->uploadFileImage2($dirx, "url_filedownload");
                 } 
                 if($_FILES["url_audio"]['error'] == 0) {
                     $dirx  = $this->setTargetUpload("upload/news/audio/");
                     $filex = $this->uploadFileImage2($dirx, "url_audio");                   
                 } 
            }  
        } 
        echo json_encode($arr); 
    }
    
    public function deleteNews($id) {
        $arr = $this->m_admnews->deleteNews($id);    
        echo json_encode($arr);
    }
	
	private function uploadNewsImage($idpict) {
        $output_dir = "upload/news/original/";
        $thumb_dir = "upload/news/thumbnail/";
        
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
                $this->m_admnews->saveImagesProduct($idpict, $fileName, $imageTitle);
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
                    $this->m_admnews->saveImagesProduct($idpict, $fileName, $imageTitle);
                
                    $ret[]= $fileName;
                }
              }
             
            }
            return $ret;
         }   
   }
   
   public function tes() {
       $data['listNews'] = $this->m_admnews->tes();   
   }
   
       
}