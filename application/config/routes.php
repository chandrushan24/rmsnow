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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'welcome';
$route['404_override'] = 'Welcome/dashboard';
$route['translate_uri_dashes'] = FALSE;

$route['user_profile']='admin/Admin_controller/user_profile';
$route['settings']='admin/Admin_controller/settings';

$route['get_company']='admin/Admin_controller/company_details';
$route['set_company']='admin/Admin_controller/set_company';

$route['get_expense']='admin/Admin_controller/expense_details';
$route['set_expense']='admin/Admin_controller/set_expense';

$route['get_roles']='admin/Admin_controller/role_details';
$route['set_roles']='admin/Admin_controller/set_roles';
$route['Delete_roles']='admin/Admin_controller/delete_role';

$route['get_seq']='admin/Admin_controller/seq_details';
$route['set_seq']='admin/Admin_controller/set_seq';

$route['Login']='Welcome/index';
$route['Logout']='Welcome/logout';

$route['company_master']='admin/Master_controller/company_master';
$route['expense_master']='admin/Master_controller/expense_master';
$route['role_master']='admin/Master_controller/role_master';
$route['seq_master']='admin/Master_controller/seq_master';

$route['Dashboard'] = 'Welcome/dashboard';
// $route['list_nav_parent'] = 'admin/admin_controller/listview';
// $route['list_nav_child'] = 'admin/admin_controller/listview';
$route['get_list'] = 'common/List_controller/get_list_data';
$route['Delete_list'] = 'common/List_controller/delete_list_data';

$route['reg_plot'] = 'common/List_controller';
$route['Add_reg_plot'] = 'admin/Register_plots_controller/index';
$route['Edit_reg_plot/(:num)'] = 'admin/Register_plots_controller/index/$1';

$route['Property'] = 'admin/Property_controller/index';
$route['Add_Property'] = 'admin/Property_controller/add_edit_property';
$route['Edit_Property/(:num)'] = 'admin/Property_controller/add_edit_property/$1';

$route['unreg_plot'] = 'common/List_controller';
$route['Add_unreg_plot'] = 'admin/Unregistered_plots_controller/index';
$route['Edit_unreg_plot/(:num)'] = 'admin/Unregistered_plots_controller/index/$1';

$route['booked_plot'] = 'common/List_controller';
$route['Add_booked_plot'] = 'admin/booked_plots_controller/index';
$route['Edit_booked_plot/(:num)'] = 'admin/booked_plots_controller/index/$1';

$route['customer_info'] = 'common/List_controller';
$route['Add_customer_info'] = 'admin/customer_details_controller/index';
$route['Edit_customer_info/(:num)'] = 'admin/customer_details_controller/index/$1';

$route['staff_info'] = 'common/List_controller';
$route['Add_staff_info'] = 'admin/staff_info_controller/index';
$route['Edit_staff_info/(:num)'] = 'admin/staff_info_controller/index/$1';

$route['add_offer'] = 'common/List_controller';
$route['Add_add_offer'] = 'admin/add_offer_controller/index';
$route['Edit_add_offer/(:num)'] = 'admin/add_offer_controller/index/$1';

$route['offer_incentives'] = 'common/List_controller';
$route['Add_offer_incentives'] = 'admin/offer_incentives_controller/index';
$route['Edit_offer_incentives/(:num)'] = 'admin/offer_incentives_controller/index/$1';


$route['employee_salary'] = 'common/List_controller';
$route['Add_employee_salary'] = 'admin/employee_salary_controller/index';
$route['Edit_employee_salary/(:num)'] = 'admin/employee_salary_controller/index/$1';

$route['expense'] = 'common/List_controller';
$route['Add_expense'] = 'admin/expense_controller/index';
$route['Edit_expense/(:num)'] = 'admin/expense_controller/index/$1';

$route['billing_receipt'] = 'common/List_controller';
$route['Add_billing_receipt'] = 'admin/billing_receipt_controller/index';
$route['Edit_billing_receipt/(:num)'] = 'admin/billing_receipt_controller/index/$1';

$route['salary_advance'] = 'common/List_controller';
$route['Add_salary_advance'] = 'admin/Employee_salary_adv_controller/index';
$route['Edit_salary_advance/(:num)'] = 'admin/Employee_salary_adv_controller/index/$1';

$route['Add_reg_plots/(:num)'] = 'admin/Register_plots_controller/index_1/$1';
$route['Add_booked_plots/(:num)'] = 'admin/booked_plots_controller/index_1/$1';

$route['view/(:any)/(:num)'] = 'common/List_controller/view_template/$1';
$route['export/(:any)/(:any)/(:any)'] = 'common/List_controller/export_list_pdf_print/$1/$2/$3';
$route['download_pdf'] = 'common/List_controller/download_pdf_ajax';

