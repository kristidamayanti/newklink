<?php


class news_gallery_model extends CI_Model{


private $table = "news_gallery";
private $key = array("KEY_ID");
public function add(){
$data = array(
'gid' => $this->input->post('gid'),
'nid' => $this->input->post('nid'),
'title' => $this->input->post('title'),
'image' => $this->input->post('image'),
'act' => $this->input->post('act'),
'ip' => $this->input->post('ip'),
'tanggal' => $this->input->post('tanggal'),
'createnm' => $this->input->post('createnm'),
'updatenm' => $this->input->post('updatenm'),
);
$this->db->insert($this->table,$data);
}


public function edit($KEY_ID){
$data = array(
'gid' => $this->input->post('gid'),
'nid' => $this->input->post('nid'),
'title' => $this->input->post('title'),
'image' => $this->input->post('image'),
'act' => $this->input->post('act'),
'ip' => $this->input->post('ip'),
'tanggal' => $this->input->post('tanggal'),
'createnm' => $this->input->post('createnm'),
'updatenm' => $this->input->post('updatenm'),
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
