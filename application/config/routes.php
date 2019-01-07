<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] 	= 'welcome';
$route['user']					= 'user/insertUser';
$route['user/all']				= 'user/getUsers';
$route['user/get/(:num)']		= 'user/getUser/$1';
$route['user/delete/(:num)']	= 'user/deleteUser/$1';
$route['user/update/(:num)']	= 'user/updateUser/$1';
$route['register']				= 'user/register';
$route['login']					= 'user/login';
$route['logout']				= 'user/logout';
$route['post']					= 'post/index';
$route['(:any)']				= 'page/index/$1';
/*
$route['home']					= 'page/index/home';
$route['about']					= 'page/index/about';
$route['contact']				= 'page/index/contact';  
*/
$route['404_override'] = '';
$route['translate_uri_dashes']  = FALSE;
