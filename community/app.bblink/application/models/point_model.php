<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of point_model
 *
 * @author sahid
 */
class point_model extends CI_Model{
    //put your code here
    public function add(){
        $data = array(
                'seriesID'=> $this->input->post('seriesid'),
                'nama'=> $this->input->post('nama'),
                'hole1' => $this->input->post('hole1'),
                'hole2' => $this->input->post('hole2'),
                'hole3' => $this->input->post('hole3'),
                'hole4' => $this->input->post('hole4'),
                'hole5' => $this->input->post('hole5'),
                'hole6' => $this->input->post('hole6'),
                'hole7' => $this->input->post('hole7'),
                'hole8' => $this->input->post('hole8'),
                'hole9' => $this->input->post('hole9'),
                'hole10' => $this->input->post('hole10'),
                'hole11' => $this->input->post('hole11'),
                'hole12' => $this->input->post('hole12'),
                'hole13' => $this->input->post('hole13'),
                'hole14' => $this->input->post('hole14'),
                'hole15' => $this->input->post('hole15'),
                'hole16' => $this->input->post('hole16'),
                'hole17' => $this->input->post('hole17'),
                'hole18' => $this->input->post('hole18'),
                'flight' => $this->input->post('flight'),
                'gross' => $this->input->post('gross'),
                'nett' => $this->input->post('nett'),
        );

        $this->db->insert('tblSeriesHC',$data);
    }

    
}
?>
