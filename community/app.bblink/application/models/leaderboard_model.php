<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of leaderboard_model
 *
 * @author sahid
 */
class Leaderboard_model extends CI_Model{
    //put your code here
    public function Leaderboard_model(){
        parent::__construct();
       }

    public function getPlayerType(){
        $query = $this->db->get('play_types');
        
        if($query->num_rows() > 0 ):
            return $query;
        else:
            return NULL;
        endif;
    }

    public function getSeries($id){
        $sql = "SELECT
                tblSeries.series_id,
                tblWinner.no_member,
                golfer.nama_member,
                tblWinner.hole,
                tblSeries.seriesID,
                tblSeries.details,
                tblSeries.createdt,
                tblSeries.seriesName,
                play_types.type_id,
                play_types.type_name
                FROM tblWinner
                INNER JOIN golfer ON tblWinner.no_member = golfer.no_member
                INNER JOIN tblSeries ON tblWinner.seriesID = tblSeries.seriesID
                INNER JOIN play_types ON tblWinner.type_id = play_types.type_id
                WHERE tblSeries.series_id = ?";

        $query = $this->db->query($sql, array($id));

        if($query->num_rows() > 0):
            return $query;
        else:
            return NULL;
        endif;
    }

    public function getflight($flight, $series){
        $this->db->where('flight',$flight);
        $this->db->where('seriesID',$series);
        $this->db->order_by('no_urut','ASC');
        $query = $this->db->get('tblRekapSeries');

        if($query->num_rows() > 0):
            return $query;
        else:
            return NULL;
        endif;
    }

    public function getbo(){
        $sql = "SELECT b.golferName, b.picture, b.golferID, b.hcp, b.flight, c.kode, b.seriesID, a.seriesName
                FROM tblSeries a
                INNER JOIN tblSeriesWinner b ON a.seriesID = b.seriesID
                INNER JOIN tblCatWinner c ON b.category = c.id
                WHERE c.kode IN ('BGO','BNO') and a.seriesID = (SELECT seriesID  FROM tblSeries ORDER BY createdt DESC LIMIT 1)
                GROUP BY b.golferName, a.seriesName
                ORDER BY c.id DESC, a.createdt DESC";

        $query = $this->db->query($sql);

        if($query->num_rows() > 0):
            return $query;
        else:
            return NULL;
        endif;
    }

    public function getFa(){
        $sql = "SELECT b.golferName, b.picture, b.golferID, b.hcp, b.flight, c.kode, b.seriesID, a.seriesName
                FROM tblSeries a
                INNER JOIN tblSeriesWinner b ON a.seriesID = b.seriesID
                INNER JOIN tblCatWinner c ON b.category = c.id
                WHERE c.kode IN ('FABN1','FABN2','FABN3') and a.seriesID = (SELECT seriesID  FROM tblSeries ORDER BY createdt DESC LIMIT 1)
                GROUP BY b.golferName, a.seriesName
                ORDER BY c.id DESC, a.createdt DESC";

        $query = $this->db->query($sql);

        if($query->num_rows() > 0):
            return $query;
        else:
            return NULL;
        endif;
    }

     public function getFb(){
        $sql = "SELECT b.golferName, b.picture, b.golferID, b.hcp, b.flight, c.kode, b.seriesID, a.seriesName
                FROM tblSeries a
                INNER JOIN tblSeriesWinner b ON a.seriesID = b.seriesID
                INNER JOIN tblCatWinner c ON b.category = c.id
                WHERE c.kode IN ('FBBN1','FBBN2','FBBN3') and a.seriesID = (SELECT seriesID  FROM tblSeries ORDER BY createdt DESC LIMIT 1)
                GROUP BY b.golferName, a.seriesName
                ORDER BY c.id DESC, a.createdt DESC";

        $query = $this->db->query($sql);

        if($query->num_rows() > 0):
            return $query;
        else:
            return NULL;
        endif;
    }

    public function getFc(){
        $sql = "SELECT b.golferName, b.picture, b.golferID, b.hcp, b.flight, c.kode, b.seriesID, a.seriesName
                FROM tblSeries a
                INNER JOIN tblSeriesWinner b ON a.seriesID = b.seriesID
                INNER JOIN tblCatWinner c ON b.category = c.id
                WHERE c.kode IN ('FCBN1','FCBN2','FCBN3') and a.seriesID = (SELECT seriesID  FROM tblSeries ORDER BY createdt DESC LIMIT 1)
                GROUP BY b.golferName, a.seriesName
                ORDER BY c.id DESC, a.createdt DESC";

        $query = $this->db->query($sql);

        if($query->num_rows() > 0):
            return $query;
        else:
            return NULL;
        endif;
    }

    public function getFd(){
        $sql = "SELECT b.golferName, b.picture, b.golferID, b.hcp, b.flight, c.kode, b.seriesID, a.seriesName
                FROM tblSeries a
                INNER JOIN tblSeriesWinner b ON a.seriesID = b.seriesID
                INNER JOIN tblCatWinner c ON b.category = c.id
                WHERE c.kode IN ('NTL','LD','NTP') and a.seriesID = (SELECT seriesID  FROM tblSeries ORDER BY createdt DESC LIMIT 1)
                GROUP BY b.golferName, a.seriesName
                ORDER BY c.id DESC, a.createdt DESC";

        $query = $this->db->query($sql);

        if($query->num_rows() > 0):
            return $query;
        else:
            return NULL;
        endif;
    }

    public function getBoALL($id, $kode){

        $this->db->where_in('kode', $kode);
        $this->db->where('seriesID',$id);
        $this->db->join('tblSeriesWinner', 'tblCatWinner.id = tblSeriesWinner.category','inner');
        $query = $this->db->get('tblCatWinner');

        if($query->num_rows() > 0):
            return $query;
        else:
            return NULL;
        endif;
    }
    
}
?>
