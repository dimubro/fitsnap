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
$route['default_controller'] = 'Home';
$route['404_override'] = 'home/error';
$route['translate_uri_dashes'] = FALSE;



//admin


$route['admin/Create-User'] = 'admin/user/create';
$route['admin/User-Privilages'] = 'admin/user/index';
$route['admin/Edit-User/(:any)'] = 'admin/user/edit/$1';
$route['admin/Delete-User/(:any)'] = 'admin/user/delete/$1';

$route['admin/Category'] = 'admin/Category/index';
$route['admin/Create-Category'] = 'admin/Category/create';
$route['admin/Edit-Category/(:any)'] = 'admin/Category/edit/$1';
$route['admin/Delete-Category/(:any)'] = 'admin/Category/delete/$1';

$route['admin/Products'] = 'admin/Products/index';
$route['admin/Create-Product'] = 'admin/Products/create';
$route['admin/Edit-Product/(:any)'] = 'admin/Products/edit/$1';
$route['admin/Delete-Product/(:any)'] = 'admin/Products/delete/$1';

$route['admin/Products-Group'] = 'admin/Products_group/index';
$route['admin/Create-Group'] = 'admin/Products_group/create';
$route['admin/Edit-Group/(:any)'] = 'admin/Products_group/edit/$1';
$route['admin/Delete-Group/(:any)'] = 'admin/Products_group/delete/$1';

$route['admin/Orders'] = 'admin/orders/index';
$route['admin/View-Order/(:any)'] = 'admin/orders/view_order/$1';

// home
$route['register'] = 'customer/register';
// $route['register'] = 'user/register';
$route['save-register'] = 'user/save_register';
$route['login'] = 'customer/login';
$route['login/checkout'] = 'customer/login_from_checkout';
$route['check-login'] = 'user/check_login';
$route['log-out'] = 'user/log_out';

$route['cart'] = 'cart/cart';
$route['checkout'] = 'cart/checkout';
$route['thank-you'] = 'home/thank_you';

$route['try-your-best-outfit'] = 'home/suggestions';
$route['my-account'] = 'customer/my_account';

$route['payment/(:any)'] = 'home/payment/$1';

$route['save-payment'] = 'home/save_payment';

$route['appoinment-summery/(:any)'] = 'home/summery/$1';

$route['login-link-from-test'] = 'home/login_link';
// login-link-from-test


