<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] 	= 'page/index';
// $route['default_controller'] 	= 'welcome';
$route['user']					= 'user/insertUser';
$route['user/all']				= 'user/getUsers';
$route['user/get/(:num)']		= 'user/getUser/$1';
$route['user/delete/(:num)']	= 'user/deleteUser/$1';
$route['user/update/(:num)']	= 'user/updateUser/$1';
$route['register']				= 'user/register';
$route['login']					= 'user/login';
$route['logout']				= 'user/logout';
$route['user/dashboard']		= 'user/dashboard';
$route['dashboard']				= 'user/dashboard';
$route['post']					= 'post/index';
$route['migrate']               = 'migration/index';
$route['lang/eng']				= 'language/english';
$route['lang/eng/(:any)']		= 'language/english';
$route['lang/ur']				= 'language/urdu';
$route['lang/ur/(:any)']		= 'language/urdu';
$route['(:any)']				= 'page/index/$1';
/*
$route['home']					= 'page/index/home';
$route['about']					= 'page/index/about';
$route['contact']				= 'page/index/contact';  
*/
$route['404_override'] = '';
$route['translate_uri_dashes']  = FALSE;
