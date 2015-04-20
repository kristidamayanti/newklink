<?php

class M_admlangganan extends CI_Model{
    
    public function M_admlangganan() {
        parent::__construct();      
    } 
    
    function getListLanggananByParam($fieldName, $param, $type="array") {
        //$param = str_replace("%20", " ", $param);     
        $qry = "SELECT * FROM kaset_download WHERE $fieldName = '$param'";
        return $this->getRecordset($qry, $type);
    }
    
    public function getListLangganan($type="array") {
        $qry = "select * from kaset_download order by id";
        return $this->getRecordset($qry, $type);
    }
    
    public function getLanggananByID($id, $type = "array") {
		$qry = "SELECT * FROM kaset_download WHERE id = '$id'";
        return $this->getRecordset($qry, $type);
	}
    
   	public function getListLanggananImage($id, $type = "array") {
		$qry = "SELECT title, cover_kaset FROM kaset_download WHERE id = '$id'";
        return $this->getRecordset($qry, $type);
	}
    
    function saveUploadKaset(){
        $data = $this->input->post(NULL, TRUE);
        $check = $this->validateBeforeInsert("kaset_download", "kd_kaset", $data['kd_kaset']);
        if($check == 0) 
        {
            $correct_ip_address = $this->input->ip_address();   
            $arr = $this->setErrorMessage("json", "Kode $data[kd_kaset] insert has failed..!!");
            $detail = addslashes($data['kasetDetail']);
			$url_filekaset = addslashes($_FILES["fileKaset"]["name"]);
			$url_cover = addslashes($_FILES["fileCover"]["name"]);
            $qry = "INSERT INTO kaset_download (kd_kaset, title, descript, file, 
                                        cover_kaset, createdt,createnm,ip_addr,active) 
                    VALUES('$data[kd_kaset]', '$data[title]', '$detail', '$url_filekaset','$url_cover',
                           '$this->datetime','".$this->sess[0]->username."','$this->ip','$data[act]')";
            //echo $qry;
            $query = $this->db->query($qry);
            $id = $this->db->insert_id(); 
            if($query > 0) {
                $arr = array("response" => "true", "id" => $id, "message" => "Kode Kaset $data[kd_kaset] has been successfully inserted..!");
            } else {
                $arr = array("response" => "false", "message" => "Kode Kaset $data[kd_kaset] is already exist..!!");
            }
            
        } 
        return $arr;
    }
    
    public function saveUpdateLangganan() {
        $data = $this->input->post(NULL, TRUE);
       $check = $this->validateBeforeInsert("kaset_download", "kd_kaset", $data['kd_kaset']);
        $correct_ip_address = $this->input->ip_address();   
        $detail = addslashes($data['kasetDetail']);
        $url_filekaset = addslashes($_FILES["fileKaset"]["name"]);
	   $url_cover = addslashes($_FILES["fileCover"]["name"]);
        if($check == 0) 
        {
            if($url_filekaset == '' && $url_cover == ''){
                $qry = "UPDATE kaset_download SET title = '$data[title]', descript = '$detail', 
                    active = '$data[act]', createdt = '$this->datetime',createnm = '".$this->sess[0]->username."',
                    ip_addr = '$correct_ip_address
                    WHERE id = '$data[id]'";
            }
            else
            {
                $qry = "UPDATE kaset_download SET title = '$data[title]', descript = '$detail', 
                    active = '$data[act]', createdt = '$this->datetime',createnm = '".$this->sess[0]->username."',
                    ip_addr = '".$correct_ip_address."',file = '".$url_filekaset."',cover_kaset = '".$url_cover."'
    				WHERE id = '$data[id]'";
            }
            $query = $this->db->query($qry);
            if($query > 0) {
                //$arr = $this->setSuccessMessage("json", "News $data[title] has been successfully updated..!");
                $arr = array("response" => "true", "id" => $data['id'], "message" => "Kaset $data[title] has been successfully updated..!");
            }
            return $arr;
        } 
        
    }
    
    function deleteLangganan($id){
        $this->db->trans_begin();
        $this->db->query("DELETE FROM kaset_download WHERE id = '$id'");
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            $arr = $this->setErrorMessage("json", "Delete Kaset failed..!!"); 
        }
        else
        {
            $this->db->trans_commit();
            $arr = $this->setSuccessMessage("json", "Delete Kaset success..!!");
        }
        return $arr;
    }
}