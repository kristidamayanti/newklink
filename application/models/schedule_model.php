<?php
class schedule_model extends CI_Model {
    private $table = "schedule";
    private $key = array("KEY_ID");
   
    public function gets() {
        $sql = "SELECT * FROM schedule "
                . "WHERE DATE_FORMAT(eventdate,'%Y-%m-%d') ='".  date('Y-m-d')."'";
                
        return $this->db->query($sql)->result();
    }
            
    public function getAll($num, $offset) {
        $this->db->order_by('eventdate', 'DESC');
        $data = $this->db->get($this->table, $num, $offset);
        return $data->result();
    }

    public function delete() {
        foreach ($key as $k) {
            if ($this->input->post($k)) {
                $this->db->where_in(implode(",", $this->input->post($k)));
            } else {
                $this->db->where($k, $this->input->post($k));
            }
        }
        if ($this->input->get($k)) {
            $this->db->where($k, $this->input->get($k));
        }
        $this->db->delete($this->table);
    }
  
    public function getByParam() {
        $pembicara = $this->input->post('pembicara');
        $lokasi = $this->input->post('lokasi');
        $tanggal = $this->input->post('tanggal');


        $sql = "SELECT * FROM " . $this->table . " WHERE ";

        if ($pembicara != NULL):
            $sql.="speaker LIKE '%$pembicara%'";
        elseif ($lokasi != NULL):
            $sql.="location LIKE '%$lokasi%'";
        elseif ($tanggal != NULL):
            $sql.="eventdate LIKE '%$tanggal%'";
        elseif ($pembicara != NULL && $lokasi != NULL):
            $sql.="speaker LIKE '%$pembicara%' AND location LIKE '%$lokasi%'";
        elseif ($pembicara != NULL && $lokasi != NULL && $tanggal != NULL):
            $sql.="speaker LIKE '%$pembicara%' AND location LIKE '%$lokasi%' AND eventdate LIKE '%$tanggal%'";
        elseif ($pembicara != NULL && $tanggal != NULL):
            $sql.="speaker LIKE '%$pembicara%' AND eventdate LIKE '%$tanggal%'";
        endif;
        
        return $this->db->query($sql)->result();
    }

}
