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


$route['default_controller'] = "home";
$route['404_override'] = '';

$route['login'] = 'login/home';
$route['login/logging'] = 'login/home/logging';
$route['login/logout'] = 'login/home/logout';

$route['settings'] = 'settings/home';
$route['settings/settings'] = 'settings/home/settings';

$route['users/?(:num)?'] = 'users/home/index/$1';
$route['users/users_add'] = 'users/home/users_add';
$route['users/users_update/?(:num)?'] = 'users/home/users_update/$1';
$route['users/users_delete/(:num)'] = 'users/home/users_delete/$1';
$route['users/users_group/?(:num)?'] = 'users/home/users_group/$1';
$route['users/users_group_add'] = 'users/home/users_group_add';
$route['users/users_group_update/?(:num)?'] = 'users/home/users_group_update/$1';
$route['users/users_group_delete/(:num)'] = 'users/home/users_group_delete/$1';

$route['categories/?(:num)?'] = 'categories/home/index/$1';
$route['categories/categories_add'] = 'categories/home/categories_add';
$route['categories/categories_update/?(:num)?'] = 'categories/home/categories_update/$1';
$route['categories/categories_delete/(:num)'] = 'categories/home/categories_delete/$1';
$route['categories/categories_search'] = 'categories/home/categories_search';
$route['categories/categories_search_result/(:any)'] = 'categories/home/categories_search_result/$1';
$route['categories/get_suggestion'] = 'categories/home/get_suggestion';

$route['peti_cash/?(:num)?'] = 'peti_cash/home/index/$1';
$route['peti_cash/peti_cash_add'] = 'peti_cash/home/peti_cash_add';
$route['peti_cash/peti_cash_update/?(:num)?'] = 'peti_cash/home/peti_cash_update/$1';
$route['peti_cash/peti_cash_delete/(:num)'] = 'peti_cash/home/peti_cash_delete/$1';

$route['report_peti_cash/?(:num)?'] = 'report_peti_cash/home/index/$1';

$route['wishlist/?(:num)?'] = 'wishlist/home/index/$1';
$route['wishlist/wishlist_add/?(:num)?'] = 'wishlist/home/wishlist_add/$1';
$route['wishlist/wishlist/wishlist_list/?(:num)?'] = 'wishlist/home/wishlist_list/$1';
$route['categories_tables/?(:num)?'] = 'categories_tables/home/index/$1';
$route['categories_tables/categories_tables_add'] = 'categories_tables/home/categories_tables_add';
$route['categories_tables/categories_tables_update/?(:num)?'] = 'categories_tables/home/categories_tables_update/$1';
$route['categories_tables/categories_tables_delete/(:num)'] = 'categories_tables/home/categories_tables_delete/$1';
$route['categories_tables/categories_tables_search'] = 'categories_tables/home/categories_tables_search';
$route['categories_tables/categories_tables_search_result/(:any)'] = 'categories_tables/home/categories_tables_search_result/$1';
$route['categories_tables/get_suggestion'] = 'categories_tables/home/get_suggestion';

$route['menus/?(:num)?'] = 'menus/home/index/$1';
$route['menus/menus_add'] = 'menus/home/menus_add';
$route['menus/menus_update/?(:num)?'] = 'menus/home/menus_update/$1';
$route['menus/menus_delete/(:num)'] = 'menus/home/menus_delete/$1';
$route['menus/get_suggestion'] = 'menus/home/get_suggestion';
$route['menus/menus_search'] = 'menus/home/menus_search';
$route['menus/menus_search_result/(:any)'] = 'menus/home/menus_search_result/$1';

$route['raw_material/?(:num)?'] = 'raw_material/home/index/$1';
$route['raw_material/raw_material_add'] = 'raw_material/home/raw_material_add';
$route['raw_material/raw_material_update/?(:num)?'] = 'raw_material/home/raw_material_update/$1';
$route['raw_material/raw_material_delete/(:num)'] = 'raw_material/home/raw_material_delete/$1';
$route['raw_material/get_suggestion'] = 'raw_material/home/get_suggestion';
$route['raw_material/raw_material_search'] = 'raw_material/home/raw_material_search';
$route['raw_material/raw_material_search_result/(:any)'] = 'raw_material/home/raw_material_search_result/$1';

$route['tables/?(:num)?'] = 'tables/home/index/$1';
$route['tables/tables_add'] = 'tables/home/tables_add';
$route['tables/tables_update/?(:num)?'] = 'tables/home/tables_update/$1';
$route['tables/tables_delete/(:num)'] = 'tables/home/tables_delete/$1';
$route['tables/tables_search'] = 'tables/home/tables_search';
$route['tables/tables_search_result/(:any)'] = 'tables/home/tables_search_result/$1';
$route['tables/get_suggestion'] = 'tables/home/get_suggestion';
/* End of file routes.php */
/* Location: ./application/config/routes.php */
