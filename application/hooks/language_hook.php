<?php
/*
 
// Example of procedural hook 
function loadLanguage() {
$CI =& get_instance();  	
$lang 	= ($CI->session->userdata('lang')) ? $CI->session->userdata('lang') : config_item('language'); 
$CI->lang->load('menu', $lang);				
}
*/

class LanguageHook {

	public function loadLanguage() {
	$CI =& get_instance();  	
	$CI->load->helper('url');
	$CI->load->library('form_validation');		 	
	$lang 	= ($CI->session->userdata('lang')) ? $CI->session->userdata('lang') : config_item('language'); 
	$CI->lang->load('menu', $lang);	
				
	}
	
	public function loadCache() {		 
	}

}

?>