<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
 	 
	public function __construct() {
 		 parent::__construct();		
		 $this->load->model('user_model');	
		 $this->load->library('form_validation');		 
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
	
	public function register() {
		if ($this->input->post()) {
			if ($this->_validate() === FALSE) {
				$this->_loadTemplate('register');
			} else {
				$data = [
					'username' 	=> $this->input->post('username'),
					'email'		=> $this->input->post('email'),
					'password'	=> md5($this->input->post('password')),
				];
				$user = $this->user_model->insert($data);
				$this->session->set_flashdata('success', 'User Successfully Registered');
				redirect('/login', 'refresh');
			}
		} else {
			$this->_loadTemplate('register');
		}
	}
	
	public function login() {
		if ($this->input->post()) {
			if ($this->_validateLogin() === FALSE) {
				$this->_loadTemplate('login');
			} else {								
				$username 	= $this->input->post('username');				 
				$password 	= $this->input->post('password');									
				$user 		= $this->user_model->get($username, $password);				 
				$this->session->set_userdata($user);				 
				$this->session->set_flashdata('success', 'User Successfully Logged');
				redirect('/home', 'refresh');				
			}
		} else {
			$this->_loadTemplate('login');
		}
	}
	
	public function logout() {
		session_destroy();
		$this->session->set_flashdata('success', 'User logged out successfully');			
		redirect('/login', 'refresh');
	}
	
	private function _validateLogin() {
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[20]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
			if ($this->form_validation->run() == FALSE) {
				return FALSE;
			} else {
				return TRUE;
			}
	}

	private function _validate() {
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[20]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('password_confirmation', 'Confirm Password', 'trim|required|matches[password]');
			if ($this->form_validation->run() == FALSE) {
				return FALSE; 
			} else {
				return TRUE;
			}
	}
		
	private function _loadTemplate($view) {
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('template/'.$view);
		$this->load->view('template/footer');
	}
			
}
