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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Admin Starts
// Admin Links
$route['admin'] = 'HN_Hello_Nw_Services_Admin';
$route['admin/logout'] = 'Admin_Logout/index';

// Admin All Pages Links
$route['admin/pages'] = 'HN_Hello_Nw_Services_Admin/pages';

// Internal Team Role
$route['admin/internal-team-role'] = 'HN_Hello_Nw_Services_Admin/internal_team_role';
$route['admin/check-new-internal-role-name'] = 'Admin_Internal_Team/check_new_internal_role_name';
$route['admin/add-new-internal-team-role'] = 'Admin_Internal_Team/add_new_internal_team_role';
$route['admin/get-all-internal-team-roles'] = 'Admin_Internal_Team/get_all_internal_team_roles';
$route['admin/change-internal-team-role-status'] = 'Admin_Internal_Team/change_internal_team_role_status';
$route['admin/get-single-internal-team-role-details'] = 'Admin_Internal_Team/get_single_internal_team_role_details';
$route['admin/check-edit-internal-team-role-name'] = 'Admin_Internal_Team/check_edit_internal_team_role_name';
$route['admin/update-internal-team-role-name'] = 'Admin_Internal_Team/update_internal_team_role_name';
$route['admin/delete-internal-team-role-name'] = 'Admin_Internal_Team/delete_internal_team_role_name';

// Internal Team Member
$route['admin/add-internal-team-member'] = 'HN_Hello_Nw_Services_Admin/add_internal_team_member';
$route['admin/check-new-candidate-mobile-number'] = 'Admin_Internal_Team/check_new_candidate_mobile_number';
$route['admin/check-new-team-member-email-id'] = 'Admin_Internal_Team/check_new_team_member_email_id';
$route['admin/add-new-internal-team-member'] = 'Admin_Internal_Team/add_new_internal_team_member';
$route['admin/view-internal-team-members'] = 'HN_Hello_Nw_Services_Admin/view_internal_team_members';


// Verify Admin Password
$route['admin/verify-admin-password'] = 'verify_Admin/verify_admin_password';
$route['admin/check-admin-logged-in'] = 'verify_Admin_Login/check_admin_login';