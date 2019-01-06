<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
 	 
	public function __construct() {
 		 parent::__construct();		
		 $this->load->model('user_model');				 
	}
	
	public function insertUser() {
		$data = array('username' => 'sdfsd', 'email' => 'ghfghf@gmail.com', 'password' => md5('sdjfhsd'));
		echo $this->user_model->insert($data);
	}
	
	public function getUsers() {
		$users = $this->user_model->getAll();
		echo "<pre>";
		print_r($users);
		echo "</pre>";
	}
	
	public function getUser($id) {
		$user = $this->user_model->get($id);
			if ($user) {
				echo "<pre>";
				print_r($user);		
			} else {
				show_404();
			}		
		echo $this->db->last_query();
	}
	
	public function deleteUser($id) {
		$user = $this->user_model->delete($id);
		echo $user;
		echo $this->db->last_query();
	}
		
	public function updateUser($id) {
		$data = array('username' => 'pdse', 'email' => 'dsfdrgr@yahoo.com', 'password' => md5('sdjfhsd'));
		echo $this->user_model->update($id, $data);
		echo $this->db->last_query();
	}
	
}
