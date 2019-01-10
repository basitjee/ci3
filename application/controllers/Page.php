<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$lang = ($this->session->userdata('lang')) ?
		$this->session->userdata('lang') : config_item('language'); 
		$this->lang->load('menu', $lang);		
		$this->load->helper('url');	
	}
 	 
	public function index($page = "home") {
	 
		if ($page == "index" || $page == "eng" || $page == "ur") {
			$page = "home";
		}
 		$path = APPPATH."views/pages/$page.php";
		// $this->load->view("pages/$page.php");				 
			if (file_exists($path)) {
				$this->load->view("pages/$page");
			} else {
				show_404();
			}						 			  
	}
	
}
