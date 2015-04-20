<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of scoring_model
 *
 * @author sahid
 */
class Scoring_model extends CI_Model{
    //put your code here
    public function Scoring_model(){
        parent::__construct();
    }

    public function getA($page, $uri){
        $this->db->where('flight','A');
        $this->db->order_by('nama','ASC');
        $this->db->limit($page, $uri);
        $query = $this->db->get('tblSeriesHC');

        if($query->num_rows() > 0):
            return $query;
        else:
            return NULL;
        endif;
    }

    public function count($count){
        $this->db->where('flight',$count);
        return $this->db->count_all("tblSeriesHC");
    }

     public function getB($page, $uri){
        $this->db->where('flight','B');
        $this->db->order_by('nama','ASC');
        $this->db->limit($page, $uri);
        $query = $this->db->get('tblSeriesHC');

        if($query->num_rows() > 0):
            return $query;
        else:
            return NULL;
        endif;
    }

     public function getC($page, $uri){
        $this->db->where('flight','C');
        $this->db->order_by('nama','ASC');
        $this->db->limit($page, $uri);
        $query = $this->db->get('tblSeriesHC');

        if($query->num_rows() > 0):
            return $query;
        else:
            return NULL;
        endif;
    }

    public function getAll(){
        $query = $this->db->get('tblSeriesHC');

        if($query->num_rows() > 0):
            return $query;
        else:
            return NULL;
        endif;
    }

    public function getbySeries($series){
        $this->db->where('seriesID',$series);
        $query = $this->db->get('tblSeriesHC');

        if($query->num_rows() > 0):
            return $query;
        else:
            return NULL;
        endif;
    }

    public function getTable(){
        $query = $this->db->get('tblSeriesHC');

        if($query->num_rows() > 0):
            foreach($query->result_array() as $rows):
                    $nilai['serieshc'] = array($rows);
            endforeach;
            return $nilai;
        else:
            return NULL;
        endif;
    }

}
?>
