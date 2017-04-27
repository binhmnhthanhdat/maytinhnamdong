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
$route['trang-chu'] = 'home';
$route['lien-he'] = 'lienhe';
$route['gioi-thieu'] = 'introduc/index';
$route['gioi-thieu/(:num)(:any)'] = 'introduc/intro/$1';
$route['khuyen-mai'] = 'promotion';
$route['doi-tac'] = 'partner';
$route['dich-vu'] = 'service';
$route['danh-muc-tin-tuc/(:num)(:any)'] = 'news/list_news/$1';
$route['tin-tuc'] = 'news';

$route['tin-tuc/page/(:num)'] = 'news/index/$1';
$route['xem-tin/(:num)(:any)'] = 'news/detail/$1';
$route['kien-thuc'] = 'kien_thuc';
$route['kien-thuc/page/(:num)'] = 'kien_thuc/index/$1';
$route['xem-kien-thuc/(:num)(:any)'] = 'kien_thuc/detail/$1';

$route['san-pham'] = 'product/index';
$route['san-pham/tim-kiem'] = 'product/search';
$route['xem-danh-muc/(:num)(:any)'] = 'product/category/$1';
$route['xem-danh-muc/(:num)(:any)/page/(:num)'] = 'product/category/$1/$2';
$route['xem-san-pham/(:num)(:any)'] = 'product/detail/$1';

$route['dich-vu'] = 'service/index';
$route['danh-muc-dich-vu/(:num)(:any)'] = 'service/category/$1';
$route['danh-muc-dich-vu/(:num)(:any)/page/(:num)'] = 'service/category/$1/$2';
$route['xem-dich-vu/(:num)(:any)'] = 'service/detail/$1';

$route['tim-kiem'] = 'product/search';
$route['tim-kiem/?key=(:any)&page(:num)'] = 'product/search/?key=$1&page=$2';


$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */