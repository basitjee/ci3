<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
		$this->load->database();	
	}
	
	public function insert($data) {
		return $this->db->insert('users', $data);
	}
	
	public function getAll() {
		// return $this->db->get('users')->result_array();	
		return $this->db->get('users')->result();
	}
		
	public function get($username, $password) {
		$this->db->select('id, username, email, image');
		$this->db->where('username', $username);
		$this->db->where('password', md5($password));
		return $this->db->get('users')->row_array();
		// return $this->db->get('users')->row();
	}	
		
	public function update($id, $data) {
		$this->db->where('id', $id);
		return $this->db->update('users', $data);
	}	
	
	public function delete($id) {
		$this->db->where('id', $id);
		return $this->db->delete('users');
	}	
	
	public function getuserposts($table, $user_id) {
		$this->db->where('user_id', $user_id);
		return $this->db->get($table)->result();
	}
	
	public function update_profile($id, $data) {
		$this->db->where('id', $id);
		return $this->db->update('users', $data);
	}
	
}
