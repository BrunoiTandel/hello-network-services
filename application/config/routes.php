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

// Admin Internal Team Role
$route['admin/internal-team-role'] = 'HN_Hello_Nw_Services_Admin/internal_team_role';
$route['admin/check-new-internal-role-name'] = 'Admin_Internal_Team/check_new_internal_role_name';
$route['admin/add-new-internal-team-role'] = 'Admin_Internal_Team/add_new_internal_team_role';
$route['admin/get-all-internal-team-roles'] = 'Admin_Internal_Team/get_all_internal_team_roles';
$route['admin/change-internal-team-role-status'] = 'Admin_Internal_Team/change_internal_team_role_status';
$route['admin/get-single-internal-team-role-details'] = 'Admin_Internal_Team/get_single_internal_team_role_details';
$route['admin/check-edit-internal-team-role-name'] = 'Admin_Internal_Team/check_edit_internal_team_role_name';
$route['admin/update-internal-team-role-name'] = 'Admin_Internal_Team/update_internal_team_role_name';
$route['admin/delete-internal-team-role-name'] = 'Admin_Internal_Team/delete_internal_team_role_name';

// Admin Internal Team Member
$route['admin/add-internal-team-member'] = 'HN_Hello_Nw_Services_Admin/add_internal_team_member';
$route['admin/check-new-team-member-mobile-number'] = 'Admin_Internal_Team/check_new_team_member_mobile_number';
$route['admin/check-new-team-member-email-id'] = 'Admin_Internal_Team/check_new_team_member_email_id';
$route['admin/add-new-internal-team-member'] = 'Admin_Internal_Team/add_new_internal_team_member';
$route['admin/view-internal-team-members'] = 'HN_Hello_Nw_Services_Admin/view_internal_team_members';
$route['admin/view-users'] = 'HN_Hello_Nw_Services_Admin/view_users';

// Verify Admin Password
$route['admin/verify-admin-password'] = 'verify_Admin/verify_admin_password';
$route['admin/check-admin-logged-in'] = 'verify_Admin_Login/check_admin_login';

// Admin Ends


// Team Member Starts
$route['team-member'] = 'HN_Hello_Nw_Services_Team_Member';
$route['team-member/verify-login-details'] = 'HN_Hello_Nw_Services_Team_Member_Login/verify_login_details';
$route['team-member/logout'] = 'HN_Hello_Nw_Services_Team_Member_Logout/index';

// Team Member All Pages Links
$route['team-member/pages'] = 'HN_Hello_Nw_Services_Team_Member/pages';

// Team Member Users
$route['team-member/add-new-user'] = 'HN_Hello_Nw_Services_Team_Member/add_new_user';
$route['team-member/add-new-user-details'] = 'Team_Member_User/add_new_user';
$route['team-member/check-new-user-mobile-number'] = 'Team_Member_User/check_new_user_mobile_number';
$route['team-member/check-new-user-email-id'] = 'Team_Member_User/check_new_user_email_id';

// Team Member Ends


// User Starts
// Enquiry
$route['user/add-contact-us-enquiry'] = 'User_Contact_Us/add_contact_us_enquiry';



// Admin Testimonials
$route['admin/add-testimonials'] = 'HN_Hello_Nw_Services_Admin/add_testimonials';
$route['admin/all-testimonials'] = 'HN_Hello_Nw_Services_Admin/all_testimonials';
$route['admin/add-new-testimonial'] = 'admin_Testimonial/add_new_testimonial';
$route['admin/get-all-testimonials'] = 'admin_Testimonial/get_all_testimonials';
$route['admin/change-testimonial-status'] = 'admin_Testimonial/change_testimonial_status';
$route['admin/delete-testimonial'] = 'admin_Testimonial/delete_testimonial';
$route['admin/get-testimonial-details'] = 'admin_Testimonial/get_testimonial_details';
$route['admin/update-testimonial'] = 'admin_Testimonial/update_testimonial';


/*Payment gatway*/
// Admin Payment Gateway
$route['admin/payment-gateway'] = 'HN_Hello_Nw_Services_Admin/payment_gateway';
$route['admin/get-payment-details'] = 'admin_Payment_Details/get_payment_details';
$route['admin/update-payment-gateway-details'] = 'admin_Payment_Details/update_payment_gateway_details';


// Admin Contact Us
$route['admin/contact-us'] = 'HN_Hello_Nw_Services_Admin/contact_us';
$route['admin/update-contact-us-details'] = 'admin_Contact_Us/update_contact_us_details';
$route['admin/get-contact-us-details'] = 'admin_Contact_Us/get_contact_us_details';


// Admin Blogs
$route['admin/add-blog'] = 'HN_Hello_Nw_Services_Admin/add_blog';
$route['admin/all-blogs'] = 'HN_Hello_Nw_Services_Admin/all_blogs';
$route['admin/get-all-post-type'] = 'admin_Blog/get_all_post_type';
$route['admin/add-new-blog'] = 'admin_Blog/add_new_blog';
$route['admin/get-all-blogs'] = 'admin_Blog/get_all_blogs';
$route['admin/change-blog-status'] = 'admin_Blog/change_blog_status';
$route['admin/get-blog-details'] = 'admin_Blog/get_blog_details';
$route['admin/update-blog'] = 'admin_Blog/update_blog';
$route['admin/delete-blog'] = 'admin_Blog/delete_blog';



