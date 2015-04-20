<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of event_model
 *
 * @author sahid
 */
class Schedule_model extends CI_Model{
    //put your code here
    function Schedule_model(){
        parent::__construct();
        }

    public function getEvent(){
        $this->db->where('startSeries >=',date("Y-m-d"));
        $this->db->order_by('startSeries','asc');
        $query = $this->db->get('tblSeries');

        if($query->num_rows() > 0):
            return $query;
        else:
            return NULL;
        endif;
    }

    public function getPastEvent(){
        $this->db->where('startSeries <',date("Y-m-d"));
        $this->db->order_by('startSeries','DESC');
        $query = $this->db->get('tblSeries');

        if($query->num_rows() > 0):
            return $query;
        else:
            return NULL;
        endif;
    }

    public function getWinnerList(){
        $this->db->where('startSeries <',date("Y-m-d"));
        $this->db->order_by('startSeries','DESC');
        $this->db->limit(3);
        $query = $this->db->get('tblSeries');

        if($query->num_rows() > 0):
            return $query;
        else:
            return NULL;
        endif;
    }

    public function getLatest(){
        $sql = "SELECT
                tblRekapSeries.seriesID,
                tblSeries.seriesID,
                tblSeries.seriesName,
                tblSeries.details,
                tblSeries.createdt
                FROM tblSeries
                INNER JOIN tblRekapSeries ON tblSeries.seriesID = tblRekapSeries.seriesID
                GROUP BY
                tblRekapSeries.seriesID,
                tblSeries.seriesID,
                tblSeries.seriesName,
                tblSeries.details,
                tblSeries.createdt
                ORDER BY
                tblSeries.createdt DESC
                LIMIT 1";

        $query = $this->db->query($sql);

        if($query->num_rows() > 0):
            return $query;
        else:
            return NULL;
        endif;
    }

    public function getTournament($id){
        $query = $this->db->get_where('tblSeries',array('seriesID' =>$id));

        if($query->num_rows() > 0):
            return $query;
        else:
            return NULL;
        endif;
    }

    public function getSeries($series){
        $query = $this->db->get_where('tblSeries',array('seriesID' =>$series));

        if($query->num_rows() > 0):
            return $query;
        else:
            return NULL;
        endif;
    }

    public function getScoring(){
        $this->db->order_by('series_id','DESC');
        $this->db->limit(1);
        $query = $this->db->get('tblSeries');

        if($query->num_rows() > 0):
            return $query;
        else:
            return NULL;
        endif;
    }

    public function getLast(){
        $this->db->order_by('series_id','DESC');
        $this->db->limit(1);
        $query = $this->db->get('tblSeries');

        if($query->num_rows() > 0):
            $row = $query->row();
            return $row->seriesID;
        else:
            return NULL;
        endif;
    }
}
?>
