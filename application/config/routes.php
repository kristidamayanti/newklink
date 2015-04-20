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

//LOGIN & LOGOUT PROCESS
$route['store'] = "ks_store/getLogin";
$route['store/logout'] = "ks_store/getLogout";
$route['store/login'] = "ks_store/postLogin";

//VOUCHER CHECK
//$route['voucher/(:any)'] = "ks_store/getVoucherCheck/$1";
$route['voucher/0'] = "ks_store/getVoucherCheck/0";
$route['voucher'] = "ks_store/getVoucherCheck/0";
$route['voucher/1'] = "ks_store/getVoucherCheck/1";
$route['voucher/(:any)/(:any)'] = "ks_store/getVoucherCheck/$1/$2";
$route['voucher/check'] = "ks_store/postVoucherCheck";

//NON VOUCHER / K-WALLET
$route['novoucher'] = "ks_store/getListProductNoVoucher";
//$route['novoucher/cart/add/(:any)'] = "ks_store/addToCart/$1";
$route['novoucher/cart/add'] = "ks_store/addToCart";
$route['novoucher/cart/list'] = "ks_store/getListCart";
$route['novoucher/cart/update'] = "ks_store/getUpdateCart";
$route['novoucher/cart/update2'] = "ks_store/getUpdateCart2";
$route['novoucher/cart/list2'] = "ks_store/getListCart";
$route['novoucher/cart/proceed'] = "ks_store/proceedCart";
$route['novoucher/cart/save'] = "ks_store/saveProceedCart";

//DOWNLOAD AND PAYMENT PRODUCT
$route['store/history'] = "ks_store/showHistoryTrx";
$route['store/history/novoucher'] = "ks_store/showHistoryTrx2";
$route['store/bundling'] = "ks_store/showListPrdBundling";
$route['store/download/(:any)'] = "ks_store/getDownloadProduct/$1";
$route['store/bundling/download/(:any)/(:any)'] = "ks_store/getDownloadProductBundling/$1/$2";

/* End of file routes.php */
/* Location: ./application/config/routes.php */
