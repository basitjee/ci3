<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
			if (! $this->session->userdata('username')) {
				$this->session->set_flashdata('error', 'You need to login to access this page');
				redirect('/login', 'refresh');
			}
	}
 	 
	public function index($page = "home") {
 		$path = APPPATH."views/pages/$page.php";
		// $this->load->view("pages/$page.php");				 
			if (file_exists($path)) {
				$this->load->view("pages/$page");
			} else {
				show_404();
			}						 			  
	}
		
}
