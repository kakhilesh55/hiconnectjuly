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
$route['default_controller'] = 'front';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin'] = "admin/index";
$route['pricing'] = "front/pricing";
$route['products'] = "front/products";
$route['tutorial'] = "front/tutorial";
$route['about'] = "front/about";
$route['how'] = "front/how";

$route['admin/logout'] = "admin/logout";
$route['userdashboard'] = 'users/dashboard';
$route['cover'] = 'set_cover/';
$route['personal_details'] = 'users/details';
$route['company'] = 'company/company_details';
$route['contact'] = 'front/contact';
$route['social_links'] = 'social_link/social_links';
$route['services'] = 'services/services';
$route['testimonials'] = 'testimonials/testimonials';
$route['experiences'] = 'experiences/experiences';
$route['education'] = 'education/education_details';

$route['payment_details'] = 'payment/payment_details';
$route['achievements'] = 'achievements/achievements';
$route['change_password'] = 'auth/changepass';
/*$route['admindashboard'] = 'admin/dashboard';
$route['newuser'] = 'admin/user';
$route['userlist'] = 'admin/user_list';
$route['covercategory'] = 'cover/cover_category';
$route['sociallinks_type'] = 'social/social_links_type';
$route['paymentapp'] = 'payment_app/applications';*/