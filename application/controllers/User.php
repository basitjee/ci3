<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
 	private $data = array();
	 
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
	
	public function register() {
		$this->load->library('email');
			if ($this->input->post()) {
				if ($this->_validate() === FALSE) {
					$this->_loadTemplate('template/register');
				} else {
					$data = [
						'username' 	=> $this->input->post('username'),
						'email'		=> $this->input->post('email'),
						'password'	=> md5($this->input->post('password')),
					];
					$data	= $this->security->xss_clean($data); 
					$user 	= $this->user_model->insert($data);
					$this->session->set_flashdata('success', 'User Successfully Registered');
					redirect('/login', 'refresh');
				}
			} else {
				$this->_loadTemplate('template/register');
			}
	}
	
	public function login() {	     			
		if ($this->input->post()) {			
			if ($this->_validateLogin() === FALSE) {
				$this->_loadTemplate('template/login');
			} else {								
				$username 	= $this->input->post('username');				 
				$password 	= $this->input->post('password');			
				$user 		= $this->user_model->get($username, $password);				 
				$this->session->set_userdata($user);				 
				$this->session->set_flashdata('success', 'User Successfully Logged');
				redirect('user/dashboard', 'refresh');				
			}
		} else {			 				 
			$this->_loadTemplate('template/login');
		}		 
	}
	
	public function dashboard() {
		if (! $this->session->userdata('id')) {
				$this->session->set_flashdata('error', 'You need to login to access this page');
				redirect('login', 'refresh');
		}
		$this->data['posts'] = $this->user_model->getuserposts('posts', $this->session->userdata('id'));
		$this->_loadTemplate('user_dashboard');		
	}
	
	public function editProfile() {
		$this->_loadTemplate('edit_profile');		
	}
	
	public function do_upload() {
		$config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
		// $config['file_name']			= 'avatar';
        $config['max_size']             = 1024;
        $config['max_width']            = 1920;
        $config['max_height']           = 1080;
        $this->load->library('upload', $config);
        	if ( ! $this->upload->do_upload('userfile')) {
                $this->data = array('error' => $this->upload->display_errors());
                $this->_loadTemplate('edit_profile');
        	} else {                
                $data 						= array('upload_data' => $this->upload->data());	
				$args['source_image'] 		= './uploads/'.$data["upload_data"]["file_name"];
				/*
				$args['wm_text'] 			= 'Copyright 2019 - Abdul Basit';
				$args['wm_type'] 			= 'text';
				$args['wm_font_path'] 		= './system/fonts/texb.ttf';
				$args['wm_font_size'] 		= '22';
				$args['wm_font_color'] 		= '000000';
				$args['wm_vrt_alignment'] 	= 'bottom';
				$args['wm_hor_alignment'] 	= 'center';
				$args['wm_padding'] 		= '-25';				 
				*/								 
				$args['wm_type'] 			= 'overlay';
				$args['wm_overlay_path']	= './uploads/a.png';
				$args['wm_vrt_alignment'] 	= 'bottom';
				$args['wm_hor_alignment'] 	= 'center';
				$args['wm_padding'] 		= '-25';				 
				$this->load->library('image_lib', $args);				
					if ( ! $this->image_lib->watermark()) {
						$this->session->set_flashdata('error', $this->image_lib->display_errors()); 
					}																		 
				$image 						= array('image'=>$data["upload_data"]["file_name"]);				 				
				$this->user_model->update_profile($this->session->userdata('id'), $image);
				$this->session->set_userdata('image', $data["upload_data"]["file_name"]);
				$this->session->set_flashdata('success', 'Profile Updated Successfully');
                redirect('user/dashboard', 'refesh');
        	}	
	}
	
	public function logout() {
		session_destroy();
		$this->session->set_flashdata('success', 'User logged out successfully');			
		redirect('user/login', 'refresh');
	}
		
	private function _validateLogin() {
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[100]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
			if ($this->form_validation->run() == FALSE) {
				return FALSE;
			} else {
				return TRUE;
			}
	}

	private function _validate() {
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[100]');
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
		$this->load->view($view, $this->data);
		$this->load->view('template/footer');
	}
			
}
