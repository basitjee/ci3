<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/

/*
// Use of hook as anonymouse function
$hook['post_controller_constructor'] = function() {
$CI =& get_instance();  	
$lang 	= ($CI->session->userdata('lang')) ? $CI->session->userdata('lang') : config_item('language'); 
$CI->lang->load('menu', $lang);			
};
*/

$hook['post_controller_constructor'][] = array (
	'class' 	=> 'LanguageHook',
	'function'	=> 'loadLanguage',
	'filename'	=> 'language_hook.php',
	'filepath'	=> 'hooks' 
);

$hook['post_controller_constructor'][] = array (
	'class' 	=> 'LanguageHook',
	'function'	=> 'loadCache',
	'filename'	=> 'language_hook.php',
	'filepath'	=> 'hooks' 
);