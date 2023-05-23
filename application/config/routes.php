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

$route['not_authorized'] 		= 'LoginController/not_authorized';

// Route Admin

$route['dashboard']				= 'DashboardController/index';


// Route Roles

$route['role']  				= 'RoleController/index';
$route['role/list']['GET']  	= 'RoleController/index';

$route['role/create']['GET']	= 'RoleController/create';
$route['role/store']['POST']	= 'RoleController/store';

$route['role/edit/(:num)'] 		= 'RoleController/edit/$1';
$route['role/update/(:num)'] 	= 'RoleController/update/$1';

$route['role/delete/(:num)'] 	= 'RoleController/delete/$1';


// Route Users

$route['users']  				= 'UserController/index';
$route['users/list']['GET']  	= 'UserController/index';

$route['users/create']['GET']	= 'UserController/create';
$route['users/store']['POST']	= 'UserController/store';

$route['users/edit/(:num)'] 	= 'UserController/edit/$1';
$route['users/update/(:num)'] 	= 'UserController/update/$1';

$route['users/delete/(:num)'] 	= 'UserController/delete/$1';



// Route Permissions

$route['permission'] 				= 'PermissionController/index'; 
$route['permission/list']['GET'] 	= 'PermissionController/index'; 

$route['permission/create']['GET'] 	= 'PermissionController/create'; 
$route['permission/store']['POST']	= 'PermissionController/store';

$route['permission/edit/(:num)'] 	= 'PermissionController/edit/$1'; 
$route['permission/update/(:num)']  = 'PermissionController/update/$1';

$route['permission/delete/(:num)'] 	= 'PermissionController/delete/$1'; 


// Route Role has Permissions

$route['role/permissions/edit/(:num)'] 			= 'RolePermissionController/editPermissionsForRole/$1';
$route['role/permissions/update'] 				= 'RolePermissionController/updatePermissionsForRole';

// Route User Role
$route['user/edit_roles/(:num)'] 				= 'UserRoleController/editRoleForUser/$1';
$route['user/roles/update'] 					= 'UserRoleController/updateRoleForUser';



// Route Demo Database
$route['demo/database'] 						= 'DatabaseController/index';












