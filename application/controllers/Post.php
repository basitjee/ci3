<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {
 	 private $data = array();
	 
	 public function __construct() {
	 	parent::__construct();		
		$this->load->model('crud_model');		 	
	 }
	 		  
	public function index() {
		$count						= count($this->crud_model->getall('posts'));
		$this->load->library('pagination');		
		$config['base_url']			= base_url('post/index');
		$config['total_rows']		= $count;
		$config['per_page']			= 3;
		// $config['display_pages']	= FALSE;
		$this->pagination->initialize($config);
		$this->data['links']		= $this->pagination->create_links();		
			if ($this->uri->segment(3)) {
				$page = ($this->uri->segment(3) - 1) * $config['per_page'];
			} else {
				$page = 0;
			} 				
		$this->data['posts']		= $this->crud_model->getPagination('posts', $config['per_page'], $page);	
		$this->_loadTemplate('posts/index');	  				
		 
	}
				  
	public function create() {
		if (! $this->session->userdata('id')) {
			$this->session->set_flashdata('error', 'You need to login to access this page');
			redirect('/login', 'refresh');
		}
		$this->_loadTemplate('posts/create');			 
	}
	 
	public function save() {
		// $this->input->post()
		if (! $this->session->userdata('id')) {
			$this->session->set_flashdata('error', 'You need to login to access this page');
			redirect('/login', 'refresh');
		}
		$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('body', 'Body', 'trim|required|min_length[15]|max_length[100]');
			if ($this->form_validation->run() == FALSE) {
				$this->_loadTemplate('posts/create');
			} else {
				$data = array(
					'title' 	=> $this->input->post('title'),
					'body'  	=> $this->input->post('body'),
					'user_id'   => $this->session->userdata('id'),
				);
				$insert = $this->crud_model->insert('posts', $data);
				if ($insert) {
					echo "Data Inserted Successfully";
					$this->_loadTemplate('posts/create');
				}		
			}		
	}
	
	public function edit($id) {
 		if (! $this->session->userdata('id')) {
			$this->session->set_flashdata('error', 'You need to login to access this page');
			redirect('/login', 'refresh');
		}	
 		$this->data['post'] = $this->crud_model->get('posts', $id);
		// if edit method is called from form then update in database and redirect
		if ($this->input->post()) {
			$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[5]|max_length[12]');
			$this->form_validation->set_rules('body', 'Body', 'trim|required|min_length[15]|max_length[100]');
				if ($this->form_validation->run() == FALSE) {
					$this->_loadTemplate('posts/edit');	  
				} else {
					$data = array(
						'title' => $this->input->post('title'),
						'body'  => $this->input->post('body'),
					);
					$update = $this->crud_model->update('posts', $id, $data);
						if ($update) {
							echo "Data Updated Successfully";
							redirect('/post/index', 'refresh');
						}		
				}
		} else {
			// if edit method is called from href button then show form	to edit			
			$this->data['post'] = $this->crud_model->get('posts', $id);		
			$this->_loadTemplate('posts/edit');	  
			
		}
	}	 
	
	public function delete($id) {
		if (! $this->session->userdata('id')) {
			$this->session->set_flashdata('error', 'You need to login to access this page');
			redirect('/login', 'refresh');
		}	
		$deleted = $this->crud_model->delete('posts', $id);
			if ($deleted) {
				echo "Data Deleted Successfully";
			} else {
				echo "Error Deleting Data";
			}		
	}	
	
	public function show($id) {	   
		$this->data['post']    = $this->crud_model->get('posts', $id);
		$this->_loadTemplate('posts/show');	
	}
    
   	public function getCategories() {
   	       	    
   	    if ($this->input->is_ajax_request()) {
   	        
            $this->load->helper('file');
            $data = 'Allah Akbar';        
                if ( !write_file('./lidn.txt', $data)){
                     echo 'Unable to write the file';
                }    
                
            $cat_id                     = ($this->input->get('cat_id') && $this->input->get('cat_id') >=0 ) ? $this->input->get('cat_id') : 0;            
            $categories                 = $this->crud_model->getAll('category', ['parent_id'=>$cat_id]);
            $this->data['categories']   = $categories;   
            $this->load->view('ajax_views/categories', $this->data);            	        
   	    } else {
   	        $this->load->view('ajax_views/not_ajax');
   	    }
   	}
    
    public function getPosts() {        
        if ($this->input->is_ajax_request()) {
            $cat_id                 = ($this->input->post('cat_id') && $this->input->post('cat_id') >= 0) ? $this->input->post('cat_id') : 0;
            $this->data['posts']    = $this->crud_model->getAll('posts', ['cat_id'=>$cat_id]);
            $this->load->view('ajax_views/show_posts', $this->data);                 
        } else {
            $this->load->view('ajax_views/not_ajax');
        }    
    }
        
	private function _loadTemplate($view) {
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view($view, $this->data);
		$this->load->view('template/footer');
	}
	
}