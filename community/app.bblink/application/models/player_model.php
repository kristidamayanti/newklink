<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of player_model
 *
 * @author sahid
 */
class Player_model extends CI_Model{
    //put your code here
    function Player_model(){
        parent::__construct();
    }

    function getSelectedUser($acc){
            $data =array(
                      'member_id' => $acc,
            );

            $query = $this->db->get_where('golfer',$data);
            return $query;
    }

    function getSelected($acc){
            $this->db->where('no_member',$acc);
            $query = $this->db->get('golfer');
            return $query;
    }

    function getGrupeeName(){
        $sql = "SELECT LEFT(nama_member,1) AS nama_group
                FROM golfer GROUP BY LEFT(nama_member,1)";
				
        return $this->db->query($sql)->result();
    }

    function getGrupeeDetails(){
        $sql = "SELECT LEFT(nama_member,1) AS nama_group, nama_member, member_id
                FROM golfer GROUP BY LEFT(nama_member,1), nama_member
                ORDER BY nama_member";

        return $this->db->query($sql)->result();
    }

    public function getAllMember(){
        $this->db->select('member_id, no_member, nama_member');
        $this->db->order_by('no_member','ASC');
        $query = $this->db->get('golfer');

        if($query->num_rows > 0):
              foreach($query->result() as $nama):
                    $grupname[] = $nama;
              endforeach;
        endif;
        return $grupname;
    }

    public function getGolferName(){
        $param = array(
            'member_id'=>  $this->input->post('membername'),
        );
        $query = $this->db->get_where('golfer',$param);

        if($query->num_rows() > 0):
            return $query;
        else:
            return NULL;
        endif;
    }

    public function getSearchName(){
        $param = $this->input->post('name');
        //$param = 'AGUS';

        $this->db->like('nama_member',  strtoupper($param),'both');
        $query = $this->db->get('golfer');

        if($query->num_rows() > 0):
            return $query;
        else:
            return NULL;
        endif;
    }


}
?>
