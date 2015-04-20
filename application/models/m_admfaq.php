<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_admfaq extends CI_Model {
    public function M_admfaq() {
        parent::__construct();      
    }
       
    public function getListFaq($type = "array") {
        $qry = "SELECT * FROM faq";
        return $this->getRecordset($qry, $type);
    }
    
    public function getListFaqCatByParam($fieldName, $paramValue, $type = "array") {
        $paramValue = str_replace("%20", " ", $paramValue);        
        $qry = "SELECT * FROM faq_category WHERE $fieldName = '$paramValue'";
        return $this->getRecordset($qry, $type);
    }
    public function getListFaqByParam($fieldName, $paramValue, $type = "array") {
        $paramValue = str_replace("%20", " ", $paramValue);        
        $qry = "SELECT * FROM faq WHERE $fieldName = '$paramValue'";
        return $this->getRecordset($qry, $type);
    }
    
    public function getListFaqCat($type) {
        $qry = "SELECT id, category_name FROM faq_category";
        return $this->getRecordset($qry, $type);
    }
    
    public function saveInputFaqCat() {
        $data = $this->input->post(NULL, TRUE);
        $sesi = $this->nativesession->get('sessdata');
        $arr  = $this->setErrorMessage("json", "Question FAQ Category is already exist..!!");
        $check = $this->validateBeforeInsert("faq_category", "category_name", $data['category_name']);
        if($check == 0) {
            $category_name = addslashes($data['category_name']);   
            $arr = $this->setErrorMessage("json", "Question FAQ insert has failed..!!");
            $qry = "INSERT INTO faq_category (category_name, createdt, createnm) 
                    VALUES('$category_name' , '$this->date' , '".$sesi[0]->username."')";
            //echo $qry;
            $query = $this->db->query($qry);
            if($query > 0) {
                $arr = $this->setSuccessMessage("json", "Question FAQ Category has been successfully inserted..!");
            }
            
        } 
        return $arr;
    }
    
    public function saveUpdateFaqCat() {
        $data = $this->input->post(NULL, TRUE);
        $sesi = $this->nativesession->get('sessdata');    
        $category_name = addslashes($data['category_name']);   
        $arr = $this->setErrorMessage("json", "Question FAQ Category update has failed..!!");
        $qry = "UPDATE faq_category SET category_name = '$category_name' 
                WHERE id = '$data[id]'";
        //echo $qry;
        $query = $this->db->query($qry);
        if($query > 0) {
            $arr = $this->setSuccessMessage("json", "Question FAQ Category has been successfully updated..!");
        }
        return $arr;
    }

    public function deleteFaqCat($id) {
        $arr = $this->setErrorMessage("json", "Delete Question FAQ Category failed..!!");
        $check = $this->validateBeforeInsert("faq", "faq_category_id", $id);
        if($check == 0) {
            $qry = "DELETE FROM faq_category WHERE id = '$id'";
            $query = $this->db->query($qry);
            if($query > 0) {
                $arr = $this->setSuccessMessage("json", "Delete Question FAQ Category success..!!");
            } 
        }
        return $arr;
    }
    
    public function saveInputFaq() {
        $data = $this->input->post(NULL, TRUE);
        $sesi = $this->nativesession->get('sessdata');
        $arr  = $this->setErrorMessage("json", "Question FAQ is already exist..!!");
        $check = $this->validateBeforeInsert("faq", "question", $data['question']);
        if($check == 0) {
            $question = addslashes($data['question']);   
            $arr = $this->setErrorMessage("json", "Question FAQ insert has failed..!!");
            $qry = "INSERT INTO faq (question, createdt, ip_address, createnm, updatenm, updatedt, faq_category_id) 
                    VALUES('$question' , '$this->date' , '$this->ip', '".$sesi[0]->username."', '".$sesi[0]->username."', '$this->date', ".$data['category_id'].")";
            //echo $qry;
            $query = $this->db->query($qry);
            if($query > 0) {
                $arr = $this->setSuccessMessage("json", "Question FAQ has been successfully inserted..!");
            }
            
        } 
        return $arr;
    }      
    
    public function saveUpdateFaq() {
        $data = $this->input->post(NULL, TRUE);
        $sesi = $this->nativesession->get('sessdata');    
        $question = addslashes($data['question']);   
        $arr = $this->setErrorMessage("json", "Question FAQ update has failed..!!");
        $qry = "UPDATE faq SET question = '$question', updatenm = '".$sesi[0]->username."', updatedt = '$this->date' 
                WHERE id = '$data[id]'";
        //echo $qry;
        $query = $this->db->query($qry);
        if($query > 0) {
            $arr = $this->setSuccessMessage("json", "Question FAQ has been successfully updated..!");
        }
        return $arr;
    }
    
    public function deleteFaq($id) {
        $arr = $this->setErrorMessage("json", "Delete Question FAQ failed..!!");
        $qry = "DELETE FROM faq WHERE id = '$id'";
        $query = $this->db->query($qry);
        if($query > 0) {
            $arr = $this->setSuccessMessage("json", "Delete Question FAQ success..!!");
        } 
        
        return $arr;
    }
    
    public function getListAnswerFaq($type = "array") {
        $qry = "SELECT * FROM answer";
        return $this->getRecordset($qry, $type);
    }
    
    public function saveInputAnswerFaq() {
        $data = $this->input->post(NULL, TRUE);
        $sesi = $this->nativesession->get('sessdata');
       
        $answer = addslashes($data['answer']);   
        $arr = $this->setErrorMessage("json", "Answer FAQ insert has failed..!!");
        $qry = "INSERT INTO answer (qid, answer, createdt, ip_address, createnm, updatenm, updatedt) 
                VALUES('$data[qid]' , '$answer', '$this->date' , '$this->ip', '".$sesi[0]->username."', '".$sesi[0]->username."', '$this->date')";
        //echo $qry;
        $query = $this->db->query($qry);
        if($query > 0) {
            $arr = $this->setSuccessMessage("json", "Answer FAQ has been successfully inserted..!");
        }
         
        return $arr;
    }    
    
    public function getListAnswerFaqByParam($fieldName, $paramValue, $type = "array") {
        $paramValue = str_replace("%20", " ", $paramValue);        
        $qry = "SELECT * FROM answer WHERE $fieldName = '$paramValue'";
        return $this->getRecordset($qry, $type);
    }  
    
    public function saveUpdateAnswerFaq() {
        $data = $this->input->post(NULL, TRUE);
        $sesi = $this->nativesession->get('sessdata');    
        $answer = addslashes($data['answer']);   
        $arr = $this->setErrorMessage("json", "Answer FAQ update has failed..!!");
        $qry = "UPDATE answer SET answer = '$answer', qid = '$data[qid]', updatenm = '".$sesi[0]->username."', updatedt = '$this->date' 
                WHERE id = '$data[id]'";
        //echo $qry;
        $query = $this->db->query($qry);
        if($query > 0) {
            $arr = $this->setSuccessMessage("json", "Answer FAQ has been successfully updated..!");
        }
        return $arr;
    }
    
    public function deleteAnswerFaq($id) {
        $arr = $this->setErrorMessage("json", "Delete Answer FAQ failed..!!");
        $qry = "DELETE FROM answer WHERE id = '$id'";
        $query = $this->db->query($qry);
        if($query > 0) {
            $arr = $this->setSuccessMessage("json", "Delete Answer FAQ success..!!");
        } 
        
        return $arr;
    }
}
    