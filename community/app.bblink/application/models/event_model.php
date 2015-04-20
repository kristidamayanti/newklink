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
class event_model extends CI_Model{
    //put your code here

    public function autoNumb(){
        if($this->db->count_all('tblSeries') == NULL ):
              $number = 'GS'.date('Y-m').'0001';
        else:
            $hsl_count = $this->db->count_all('tblSeries');
            $hsl_numb = $hsl_count+1;
            $hit_row = (string)$hsl_count;

            if(strlen($hit_row) == 1):
                $number = 'GS'.date('y').'000'.$hsl_numb;
            elseif(strlen($hit_row) == 2):
                $number = 'GS'.date('y').'00'.$hsl_numb;
            else:
                $number = 'GS'.date('y').'0'.$hsl_numb;
            endif;
        endif;
        
        return $number;
    }

    public function add(){
        $data = array(
                'seriesName'=> $this->input->post('event'),
                'seriesID'=> $this->autoNumb(),
                'createdt' => date('Y-m-d H:i:s'),
        );

        $this->db->insert('tblSeries',$data);
    }

    public function get_series(){
        $this->db->order_by('series_id','DESC');
        $query = $this->db->get('tblSeries');


        if($query->num_rows()>0):
                foreach ($query->result() as $item):
                        $menuset[] = $item;
                endforeach;
            endif;
            
        return $menuset;
    }

     public function getseries(){
        $query = $this->db->get('tblSeries');

         if($query->num_rows()>0):
             return $query;
         endif;
    }

     public function remseries($id){
        $data = array(
                    'series_id' => $id,
		);

        $this->db->delete('tblSeries',$data);

    }

}
?>
