<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Language extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');	
	}	
	
	public function english() {		 
		$last 			= $this->uri->total_segments();
		$redirect_page	= $this->uri->segment($last);		 
		$this->session->unset_userdata('lang');
		$this->session->set_userdata('lang', 'english');		 
		redirect($redirect_page, 'refresh');
	}
	
	public function urdu() {
		$last 			= $this->uri->total_segments();
		$redirect_page	= $this->uri->segment($last);	 		
		$this->session->unset_userdata('lang');
		$this->session->set_userdata('lang', 'urdu');
		redirect($redirect_page, 'refresh');
	}
	
}

?>