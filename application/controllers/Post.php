<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {
 	 
	 public function __construct() {
	 	parent::__construct();		
		$this->load->model('crud_model');	
	 	$this->load->helper('form');		
		$this->load->library('form_validation');		 			  
	 }
	 		  
	public function index() {
		$posts['posts'] = $this->crud_model->getall('posts');		  
		$this->load->view('template/header');	
		$this->load->view('template/navbar');
		$this->load->view('posts/index', $posts);
		$this->load->view('template/footer');
	}
				  
	public function create() {
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('posts/create');
		$this->load->view('template/footer');
	}
	 
	public function save() {
		// $this->input->post()
		$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('body', 'Body', 'trim|required|min_length[15]|max_length[100]');
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('template/header');
				$this->load->view('template/navbar');
				$this->load->view('posts/create');
				$this->load->view('template/footer');
			} else {
				$data = array(
					'title' => $this->input->post('title'),
					'body'  => $this->input->post('body'),
				);
				$insert = $this->crud_model->insert('posts', $data);
				if ($insert) {
					echo "Data Inserted Successfully";
				}		
			}		
	}
	
	public function edit($id) {
 		$data['post'] = $this->crud_model->get('posts', $id);
		// if edit method is called from form then update in database and redirect
		if ($this->input->post()) {
			$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[5]|max_length[12]');
			$this->form_validation->set_rules('body', 'Body', 'trim|required|min_length[15]|max_length[100]');
				if ($this->form_validation->run() == FALSE) {
					$this->load->view('template/header');
					$this->load->view('template/navbar');
					$this->load->view('posts/edit', $data);
					$this->load->view('template/footer');
				} else {
					$data = array(
						'title' => $this->input->post('title'),
						'body'  => $this->input->post('body'),
					);
					$update = $this->crud_model->update('posts', $id, $data);
						if ($update) {
							echo "Data Updated Successfully";
						}		
				}
		} else {
			// if edit method is called from href button then show form	to edit			
			$data['post'] = $this->crud_model->get('posts', $id);			  
			$this->load->view('template/header');
			$this->load->view('template/navbar');
			$this->load->view('posts/edit', $data);
			$this->load->view('template/footer');
		}
	}	 
	
	public function delete($id) {
		$deleted = $this->crud_model->delete('posts', $id);
			if ($deleted) {
				echo "Data Deleted Successfully";
			} else {
				echo "Error Deleting Data";
			}		
	}	
	
	public function show($id) {
		$data['post'] = $this->crud_model->get('posts', $id);
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('posts/show', $data);
		$this->load->view('template/footer');	
	}
	
}