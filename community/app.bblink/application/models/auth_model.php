<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of auth_model
 *
 * @author sahid
 */
class Auth_model extends CI_Model{

	function Auth_model(){
		parent::__construct();
	}

	function cekauth(){
		$usrnm= $this->input->post('username');
		$pwd= $this->input->post('password');


		$this->db->select('username,password');
		$this->db->where('username',$usrnm);
		$this->db->where('password',$pwd);
		$query=$this->db->get('uadmin');
		return $query->result();
	}

	function userconfig(){
		$nama = $this->input->post('username');

		$this->db->select('config');
		$query = $this->db->get_where('user', array('nama'=> $nama,));

		return $query->result();
	}



}
?>
