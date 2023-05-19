<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Route Home

$route['default_controller'] 	= 'HomeController';
$route['home'] 					= 'HomeController';
$route['about']					= 'HomeController/about';


// Route Login

$route['login']['GET'] 			= 'LoginController/index';
$route['login-user']['POST'] 	= 'LoginController/login';
$route['logout'] 				= 'LoginController/logout';

// Route Admin

$route['dashboard']				= 'DashboardController/index';


// Route Group Users

$route['group']  				= 'GroupUserController/index';
$route['group/list']['GET']  	= 'GroupUserController/index';

$route['group/add']['GET']		= 'GroupUserController/add';
$route['group/create']['POST']	= 'GroupUserController/create';

$route['group/edit/(:num)'] 	= 'GroupUserController/edit/$1';
$route['group/update/(:num)'] 	= 'GroupUserController/update/$1';

$route['group/delete/(:num)'] 	= 'GroupUserController/delete/$1';


// Route  Users

$route['users']  				= 'UserController/index';
$route['users/list']['GET']  	= 'UserController/index';

$route['users/add']['GET']		= 'UserController/add';
$route['users/create']['POST']	= 'UserController/create';

$route['users/edit/(:num)'] 	= 'UserController/edit/$1';
$route['users/update/(:num)'] 	= 'UserController/update/$1';

$route['users/delete/(:num)'] 	= 'UserController/delete/$1';










