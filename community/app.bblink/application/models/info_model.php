<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of info_model
 *
 * @author sahid
 */
class info_model extends CI_Model {
    //put your code here
    public function autoNumb(){
        if($this->db->count_all('info') == NULL ):
              $number = 'GI'.date('y').'0001';
        else:
            $hsl_count = $this->db->count_all('info');
            $hsl_numb = $hsl_count+1;
            $hit_row = (string)$hsl_count;

            if(strlen($hit_row) == 1):
                $number = 'GI'.date('y').'000'.$hsl_numb;
            elseif(strlen($hit_row) == 2):
                $number = 'GI'.date('y').'00'.$hsl_numb;
            else:
                $number = 'GI'.date('y').'0'.$hsl_numb;
            endif;
        endif;

        return $number;
    }

    public function add(){
        $data = array(
                'info_det'=> $this->input->post('info'),
                'info_id'=> $this->autoNumb(),
                'createdt' => date('Y-m-d H:i:s'),
        );

        $this->db->insert('info',$data);
    }

    public function getinfo(){
        $query = $this->db->get('info');

         if($query->num_rows()>0):
             return $query;
         endif;
    }

    public function reminfo($id){
        $data = array(
                    'info_id' => $id,
		);

        $this->db->delete('info',$data);

    }

}
?>
