<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "page";
$route['404_override'] = '';

$route['settings'] = 'settings';
$route['account'] = 'account';
$route['page'] = 'page';
$route['questions'] = 'questions';
$route['about'] = 'about';
$route['auth'] = 'auth';
$route['admin'] = 'admin';

$route['settings/(:any)'] = 'settings/$1';
$route['account/(:any)'] = 'account/$1';
$route['page/(:any)'] = 'page/$1';
$route['questions/(:any)'] = 'questions/$1';
$route['about/(:any)'] = 'about/$1';
$route['auth/(:any)'] = 'auth/$1';
$route['admin/(:any)'] = 'admin/$1';

$route['settings/(:any)/(:any)'] = 'settings/$1/$2';
$route['account/(:any)/(:any)'] = 'account/$1/$2';
$route['page/(:any)/(:any)'] = 'page/$1/$2';
$route['questions/(:any)/(:any)'] = 'questions/$1/$2';
$route['about/(:any)/(:any)'] = 'about/$1/$2';
$route['auth/(:any)/(:any)'] = 'auth/$1/$2';
$route['admin/(:any)/(:any)'] = 'admin/$1/$2';
$route['(:any)'] = "account/index/$1";


/* End of file routes.php */
/* Location: ./application/config/routes.php */