<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_Model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
		$this->load->database();	
	}
	
	public function insert($table, $data) {
		return $this->db->insert($table, $data);
	}
	
	public function getAll($table, $data=array()) {
	    if (!empty($data))
            $this->db->where($data);		 
		return $this->db->get($table)->result();
	}
		
	public function get($table, $id) {
		$this->db->where('id', $id);		 
		return $this->db->get($table)->row();
	}	
		
	public function update($table, $id, $data) {
		$this->db->where('id', $id);
		return $this->db->update($table, $data);
	}	
	
	public function delete($table, $id) {
		$this->db->where('id', $id);
		return $this->db->delete($table);
	}	
	
	public function getPagination($table, $limit, $offset) {
		$this->db->limit($limit, $offset);
		return $this->db->get($table)->result();
	}
		
}
