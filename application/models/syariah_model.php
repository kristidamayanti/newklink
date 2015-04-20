<?php


class syariah_model extends CI_Model{


private $table = "syariah";
private $key = array("KEY_ID");
public function add(){
$data = array(
'news_id' => $this->input->post('news_id'),
'catagory' => $this->input->post('catagory'),
'title' => $this->input->post('title'),
'detail' => $this->input->post('detail'),
'ip_address' => $this->input->post('ip_address'),
'datetime' => $this->input->post('datetime'),
'user' => $this->input->post('user'),
);
$this->db->insert($this->table,$data);
}


public function edit($KEY_ID){
$data = array(
'news_id' => $this->input->post('news_id'),
'catagory' => $this->input->post('catagory'),
'title' => $this->input->post('title'),
'detail' => $this->input->post('detail'),
'ip_address' => $this->input->post('ip_address'),
'datetime' => $this->input->post('datetime'),
'user' => $this->input->post('user'),
);
$this->db->where("FIELDNAME",$KEY_ID);
$this->db->update($this->table,$data);
}


public function gets(){
$sql = "SELECT * FROM ".$this->table;
return $this->db->query($sql)->result();
}



public function delete(){
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



public function get($id){
$sql = "SELECT * FROM ".$this->table;
$sql .= "WHERE KEY_ID = '".$id."'";
return $this->db->query($sql)->row();
}


}
