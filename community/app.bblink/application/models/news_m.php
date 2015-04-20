<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of news
 *
 * @author sahid
 */
class News_model extends CI_Model {
    //put your code here
    public function News_model(){
        parent::__construct();

    }

    public function getNewsDetail($id){
        $query = $this->db->get_where('news_details',array('no'=>$id));

        return $query;
    }

    public function getCountNews($id){

        $this->db->select('countnews');
        $this->db->where('no',$id);
        $query = $this->db->get('news_details');

        if($query->num_rows() > 0):
            $counted = $query->row();
            return $counted->countnews;
        else:
            return NULL;
        endif;   
    }

    public function setCountNews($id){
        $return_val = $this->getCountNews($id);

        if($return_val <= 0):
            $retval = 1;
        else:
            $retval = (int)$return_val+1;
        endif;
        
        $nilai = array('countnews' =>$retval);

        $this->db->where('no',$id);
        $this->db->update('news_details',$nilai);
        
    }

    public function getLatestNews(){
        $this->db->order_by('no','desc');
        $this->db->limit(1);
        $query = $this->db->get('news_details');

        if($query->num_rows() > 0):
            return $query;
        else:
            return NULL;
        endif;

    }

    public function getTopNews(){
        $this->db->select('no, title');
        $this->db->order_by('no','desc');
        $this->db->limit(10);
        $query = $this->db->get('news_details');

        if($query->num_rows() > 0):
            return $query;
        else:
            return NULL;
        endif;
    }

    public function getTopMobile(){
        $this->db->select('no, title');
        $this->db->order_by('no','desc');
        $this->db->limit(5);
        $query = $this->db->get('news_details');

        if($query->num_rows() > 0):
            return $query;
        else:
            return NULL;
        endif;
    }

    public function getAllNews(){
        $this->db->order_by('no','desc');
        $query = $this->db->get('news_details');

        if($query->num_rows() > 0):
            return $query;
        else:
            return NULL;
        endif;
    }

    public function getViewedNews(){
        $this->db->select('no, title');
        $this->db->order_by('countnews','desc');
        $this->db->where('countnews >=',2);
        $this->db->limit(10);
        $query = $this->db->get('news_details');

        if($query->num_rows() > 0):
            return $query;
        else:
            return NULL;
        endif;
    }

    public function getLatestNewsCharity(){
        $this->db->where('newsgid','K-link Care');
        $this->db->order_by('no','desc');
        $this->db->limit(1);
        $query = $this->db->get('news_details');

        if($query->num_rows() > 0):
            return $query;
        else:
            return NULL;
        endif;

    }

    /* TODO START LATEST RATING CHARITY */
    public function getLatesRatingCharity(){
        $this->db->select('no');
        $this->db->where('newsgid','K-link Care');
        $this->db->order_by('no','desc');
        $this->db->limit(1);
        $query = $this->db->get('news_details');

        if($query->num_rows() > 0):
            $val = $query->row();
            return $val->no;
        else:
            return NULL;
        endif;
    }

    public function getValLatestRatingCharity(){

        $this->db->select('rating');
        $this->db->where('newsgid','K-link Care');
        $this->db->order_by('no','desc');
        $this->db->limit(1);
        $query = $this->db->get('news_details');

        if($query->num_rows() > 0):
            $val = $query->row();
            return $val->rating;
        else:
            return NULL;
        endif;
    }

    public function setLatestRatingCharity(){
        
        $rate = $this->input->post("rate_val", true);
        $post_url = $this->input->post("post_url", true);
        $latest = $this->getLatesRatingCharity();

        $valrating = $this->getValLatestRatingCharity();

        if($valrating != NULL):
            $cid = (int)$valrating + $rate;
        else:
            $cid = (int)$valrating;
        endif;

        $nilai = array('rating' =>$cid);

        $this->db->where('no',$latest);
        $this->db->where('newsgid','K-link Care');
        $this->db->update('news_details',$nilai);

    }

    /* TODO END OF LATEST RATING CHARITY */
    
}
?>
