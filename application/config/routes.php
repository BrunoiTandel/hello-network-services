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
$route['factsuite-admin'] = 'Fs_Factsuite_Admin';
$route['factsuite-admin/logout'] = 'Admin_Logout/index';

// Verify Admin Password
$route['factsuite-admin/verify-admin-password'] = 'verify_Admin/verify_admin_password';
$route['factsuite-admin/check-admin-logged-in'] = 'verify_Admin_Login/check_admin_login';

// Admin All page links
$route['factsuite-admin/pages'] = 'Fs_Factsuite_Admin/pages';
$route['factsuite-admin/get-all-pages-last-updated-date'] = 'admin_Page_Links_Page/get_all_pages_last_updated_date';

// Admin Get City List
$route['factsuite-admin/get-city-list'] = 'admin_Get_City_List/get_city_list';

// Admin Dashboard
$route['factsuite-admin/dashboard'] = 'Fs_Factsuite_Admin/dashboard';

// Admin Home Page
$route['factsuite-admin/home-page'] = 'Fs_Factsuite_Admin/home_page';
$route['factsuite-admin/update-home-page-content'] = 'admin_Home_Page/update_home_page_content';
$route['factsuite-admin/get-home-page-details'] = 'admin_Home_Page/get_home_page_details';
$route['factsuite-admin/change-we-enabled-description-status'] = 'admin_Home_Page/change_we_enabled_description_status';
$route['factsuite-admin/get-single-we-enable-description'] = 'admin_Home_Page/get_single_we_enable_description';
$route['factsuite-admin/update-we-enable-description'] = 'admin_Home_Page/update_we_enable_description';
$route['factsuite-admin/delete-we-enable-description'] = 'admin_Home_Page/delete_we_enable_description';

// Admin Client Logo
$route['factsuite-admin/client-logo'] = 'Fs_Factsuite_Admin/client_logo';
$route['factsuite-admin/check-new-client-name'] = 'admin_Client_Logo/check_new_client_name';
$route['factsuite-admin/add-new-client-logo'] = 'admin_Client_Logo/add_new_client_logo';
$route['factsuite-admin/get-all-client-logo'] = 'admin_Client_Logo/get_all_client_logo';
$route['factsuite-admin/change-client-logo-status'] = 'admin_Client_Logo/change_client_logo_status';
$route['factsuite-admin/get-single-client-logo-details'] = 'admin_Client_Logo/get_single_client_logo_details';
$route['factsuite-admin/check-edit-client-name'] = 'admin_Client_Logo/check_edit_client_name';
$route['factsuite-admin/update-client-logo'] = 'admin_Client_Logo/update_client_logo';
$route['factsuite-admin/delete-client-logo'] = 'admin_Client_Logo/delete_client_logo';

// Admin Careers Page
$route['factsuite-admin/careers-page'] = 'Fs_Factsuite_Admin/careers_page';
$route['factsuite-admin/get-career-enquiry'] = 'Fs_Factsuite_Admin/all_career_enquiries';
$route['factsuite-admin/update-careers-page'] = 'admin_Careers_Page/update_careers_page';
$route['factsuite-admin/get-careers-page-details'] = 'admin_Careers_Page/get_careers_page_details';
$route['factsuite-admin/get-careers-page-banner-image'] = 'admin_Careers_Page/get_careers_page_banner_image';
$route['factsuite-admin/get-careers-page-team-or-company-image'] = 'admin_Careers_Page/get_careers_page_team_or_company_image';
$route['factsuite-admin/delete-career-page-team-or-company-image'] = 'admin_Careers_Page/delete_career_page_team_or_company_image';
$route['factsuite-admin/get-career-page-status'] = 'admin_Careers_Page/get_career_page_status';
$route['factsuite-admin/change-career-page-status'] = 'admin_Careers_Page/change_career_page_status';
$route['factsuite-admin/change-career-page-team-or-company-image-status'] = 'admin_Careers_Page/change_career_page_team_or_company_image_status';

$route['factsuite-admin/get-all-career-enquiry'] = 'admin_Careers_Page/get_all_career_application';


// Admin Job
$route['factsuite-admin/add-job'] = 'Fs_Factsuite_Admin/add_job';
$route['factsuite-admin/all-jobs'] = 'Fs_Factsuite_Admin/all_jobs';
$route['factsuite-admin/add-new-job'] = 'admin_Job/add_new_job';
$route['factsuite-admin/get-all-jobs'] = 'admin_Job/get_all_jobs';
$route['factsuite-admin/change-job-status'] = 'admin_Job/change_job_status';
$route['factsuite-admin/delete-job'] = 'admin_Job/delete_job';
$route['factsuite-admin/get-job-details'] = 'admin_Job/get_job_details';
$route['factsuite-admin/update-job'] = 'admin_Job/update_job';

// Admin About Us
$route['factsuite-admin/about-us'] = 'Fs_Factsuite_Admin/about_us';
$route['factsuite-admin/update-about-us-details'] = 'admin_About_Us/update_about_us_details';
$route['factsuite-admin/get-about-us-details'] = 'admin_About_Us/get_about_us_details';
$route['factsuite-admin/get-about-us-header-image'] = 'admin_About_Us/get_about_us_header_image';
$route['factsuite-admin/change-about-us-banner-image-status'] = 'admin_About_Us/change_about_us_banner_image_status';
$route['factsuite-admin/delete-about-us-banner-image'] = 'admin_About_Us/delete_about_us_banner_image';

// Admin Our Journey
$route['factsuite-admin/our-journey'] = 'Fs_Factsuite_Admin/our_journey';
$route['factsuite-admin/add-our-journey'] = 'admin_Our_Journey/add_our_journey';
$route['factsuite-admin/get-all-our-journey'] = 'admin_Our_Journey/get_all_our_journey';
$route['factsuite-admin/change-our-journey-status'] = 'admin_Our_Journey/change_our_journey_status';
$route['factsuite-admin/get-single-our-journey-details'] = 'admin_Our_Journey/get_single_our_journey_details';
$route['factsuite-admin/update-our-journey'] = 'admin_Our_Journey/update_our_journey';
$route['factsuite-admin/delete-our-journey'] = 'admin_Our_Journey/delete_our_journey';

// Admin Contact Us
$route['factsuite-admin/contact-us'] = 'Fs_Factsuite_Admin/contact_us';
$route['factsuite-admin/update-contact-us-details'] = 'admin_Contact_Us/update_contact_us_details';
$route['factsuite-admin/get-contact-us-details'] = 'admin_Contact_Us/get_contact_us_details';

// Admin Payment Gateway
$route['factsuite-admin/payment-gateway'] = 'Fs_Factsuite_Admin/payment_gateway';
$route['factsuite-admin/get-payment-details'] = 'admin_Payment_Details/get_payment_details';
$route['factsuite-admin/update-payment-gateway-details'] = 'admin_Payment_Details/update_payment_gateway_details';

// Admin Blogs
$route['factsuite-admin/add-blog'] = 'Fs_Factsuite_Admin/add_blog';
$route['factsuite-admin/all-blogs'] = 'Fs_Factsuite_Admin/all_blogs';
$route['factsuite-admin/get-all-post-type'] = 'admin_Blog/get_all_post_type';
$route['factsuite-admin/add-new-blog'] = 'admin_Blog/add_new_blog';
$route['factsuite-admin/get-all-blogs'] = 'admin_Blog/get_all_blogs';
$route['factsuite-admin/change-blog-status'] = 'admin_Blog/change_blog_status';
$route['factsuite-admin/get-blog-details'] = 'admin_Blog/get_blog_details';
$route['factsuite-admin/update-blog'] = 'admin_Blog/update_blog';
$route['factsuite-admin/delete-blog'] = 'admin_Blog/delete_blog';

// Admin Testimonials
$route['factsuite-admin/add-testimonials'] = 'Fs_Factsuite_Admin/add_testimonials';
$route['factsuite-admin/all-testimonials'] = 'Fs_Factsuite_Admin/all_testimonials';
$route['factsuite-admin/add-new-testimonial'] = 'admin_Testimonial/add_new_testimonial';
$route['factsuite-admin/get-all-testimonials'] = 'admin_Testimonial/get_all_testimonials';
$route['factsuite-admin/change-testimonial-status'] = 'admin_Testimonial/change_testimonial_status';
$route['factsuite-admin/delete-testimonial'] = 'admin_Testimonial/delete_testimonial';
$route['factsuite-admin/get-testimonial-details'] = 'admin_Testimonial/get_testimonial_details';
$route['factsuite-admin/update-testimonial'] = 'admin_Testimonial/update_testimonial';

// Admin Enquiries
$route['factsuite-admin/enquiries'] = 'Fs_Factsuite_Admin/enquiries';
$route['factsuite-admin/get-all-user-enquiries'] = 'admin_User_Enquiries/get_all_user_enquiries';
$route['factsuite-admin/get-single-user-enquiry-details'] = 'admin_User_Enquiries/get_single_user_enquiry_details';
$route['factsuite-admin/reply-to-user-enquiry'] = 'admin_User_Enquiries/reply_to_user_enquiry';

// Admin Contact Us Enquiries
$route['factsuite-admin/contact-us-enquiries'] = 'Fs_Factsuite_Admin/contact_us_enquiries';
$route['factsuite-admin/get-all-user-contact-us-enquiries'] = 'admin_User_Contact_Us_Enquiries/get_all_user_contact_us_enquiries';
$route['factsuite-admin/get-single-user-contact-us-enquiry-details'] = 'admin_User_Contact_Us_Enquiries/get_single_user_contact_us_enquiry_details';
$route['factsuite-admin/reply-to-user-contact-us-enquiry'] = 'admin_User_Contact_Us_Enquiries/reply_to_user_contact_us_enquiry';

// Admin Components
$route['factsuite-admin/get-component-list'] = 'admin_Component/get_component_list';

// Admin Factsuite Website Services
$route['factsuite-admin/add-website-services'] = 'Fs_Factsuite_Admin/add_new_website_service';
$route['factsuite-admin/all-website-services'] = 'Fs_Factsuite_Admin/all_website_service';
$route['factsuite-admin/check-new-service-name'] = 'Admin_Fs_Website_Services/check_new_service_name';
$route['factsuite-admin/add-new-service'] = 'Admin_Fs_Website_Services/add_new_service';
$route['factsuite-admin/get-all-services'] = 'Admin_Fs_Website_Services/get_all_services';


$route['factsuite-admin/change-factsuite-website-service-status'] = 'Admin_Fs_Website_Services/change_factsuite_website_service_status';
$route['factsuite-admin/delete-factsuite-website-service'] = 'Admin_Fs_Website_Services/delete_factsuite_website_service';
$route['factsuite-admin/get-single-factsuite-website-service'] = 'Admin_Fs_Website_Services/get_single_factsuite_website_service';
$route['factsuite-admin/check-update-service-name'] = 'Admin_Fs_Website_Services/check_update_service_name';
$route['factsuite-admin/update-factsuite-website-service'] = 'Admin_Fs_Website_Services/update_factsuite_website_service';
$route['factsuite-admin/delete-factsuite-service-benefit'] = 'Admin_Fs_Website_Services/delete_factsuite_service_benefit';
$route['factsuite-admin/update-factsuite-website-service-sorting'] = 'Admin_Fs_Website_Services/update_factsuite_website_service_sorting';

// Admin Main Website Service Package
$route['factsuite-admin/add-website-package'] = 'Fs_Factsuite_Admin/add_website_package';
$route['factsuite-admin/add-new-website-package'] = 'Admin_Fs_Website_Service_Packages/add_new_website_package';
$route['factsuite-admin/add-website-package-component-details'] = 'Fs_Factsuite_Admin/add_website_package_component_details';
$route['factsuite-admin/get-selected-component-details-for-website-package'] = 'Admin_Fs_Website_Service_Packages/get_selected_component_details_for_website_package';
$route['factsuite-admin/add-new-component-details-for-website-package'] = 'Admin_Fs_Website_Service_Packages/add_new_component_details_for_website_package';
$route['factsuite-admin/add-website-package-alacarte-component-details'] = 'Fs_Factsuite_Admin/add_website_package_alacarte_component_details';
$route['factsuite-admin/add-new-alacarte-component-details-for-website-package'] = 'Admin_Fs_Website_Service_Packages/add_new_alacarte_component_details_for_website_package';
$route['factsuite-admin/all-website-packages'] = 'Fs_Factsuite_Admin/all_website_packages';
$route['factsuite-admin/get-all-website-service-packages'] = 'Admin_Fs_Website_Service_Packages/get_all_website_service_packages';
$route['factsuite-admin/change-factsuite-website-service-package-status'] = 'Admin_Fs_Website_Service_Packages/change_factsuite_website_service_package_status';
$route['factsuite-admin/delete-factsuite-website-service-package'] = 'Admin_Fs_Website_Service_Packages/delete_factsuite_website_service_package';
$route['factsuite-admin/update-factsuite-website-service-package-sorting'] = 'Admin_Fs_Website_Service_Packages/update_factsuite_website_service_package_sorting';
$route['factsuite-admin/get-single-factsuite-website-service-package'] = 'Admin_Fs_Website_Service_Packages/get_single_factsuite_website_service_package';
$route['factsuite-admin/update-website-package-details'] = 'Admin_Fs_Website_Service_Packages/update_website_package_details';
$route['factsuite-admin/get-single-factsuite-website-service-package-component-details'] = 'Admin_Fs_Website_Service_Packages/get_single_factsuite_website_service_package_component_details';
$route['factsuite-admin/edit-website-package-details'] = 'Fs_Factsuite_Admin/edit_website_package_details';
$route['factsuite-admin/edit-website-package-components'] = 'Fs_Factsuite_Admin/edit_website_package_components';
$route['factsuite-admin/edit-website-package-alacarte-component-details'] = 'Fs_Factsuite_Admin/edit_website_package_alacarte_component_details';

// Admin Service FAQ's
$route['factsuite-admin/add-service-faq'] = 'Fs_Factsuite_Admin/add_service_faq';
$route['factsuite-admin/add-new-service-faq'] = 'Admin_Service_Faq/add_new_service_faq';
$route['factsuite-admin/get-service-enquiry'] = 'Admin_Service_Faq/get_all_service_enquiry';
$route['factsuite-admin/get-all-service-enquiry'] = 'Fs_Factsuite_Admin/all_service_enquiry';


$route['factsuite-admin/all-service-faq'] = 'Fs_Factsuite_Admin/all_service_faq';
$route['factsuite-admin/get-all-service-faq'] = 'Admin_Service_Faq/get_all_service_faq';
$route['factsuite-admin/change-service-faq-status'] = 'Admin_Service_Faq/change_service_faq_status';
$route['factsuite-admin/get-single-service-faq-details'] = 'Admin_Service_Faq/get_single_service_faq_details';
$route['factsuite-admin/update-service-faq'] = 'Admin_Service_Faq/update_service_faq';
$route['factsuite-admin/delete-service-faq'] = 'Admin_Service_Faq/delete_service_faq';

// Admin Package FAQ's
$route['factsuite-admin/add-package-faq'] = 'Fs_Factsuite_Admin/add_package_faq';
$route['factsuite-admin/add-new-package-faq'] = 'Admin_Service_Package_Faq/add_new_package_faq';
$route['factsuite-admin/all-package-faq'] = 'Fs_Factsuite_Admin/all_package_faq';
$route['factsuite-admin/get-all-service-package-faq'] = 'Admin_Service_Package_Faq/get_all_service_package_faq';
$route['factsuite-admin/change-service-package-faq-status'] = 'Admin_Service_Package_Faq/change_service_package_faq_status';
$route['factsuite-admin/get-single-service-package-faq-details'] = 'Admin_Service_Package_Faq/get_single_service_package_faq_details';
$route['factsuite-admin/update-service-package-faq'] = 'Admin_Service_Package_Faq/update_service_package_faq';
$route['factsuite-admin/delete-service-package-faq'] = 'Admin_Service_Package_Faq/delete_service_package_faq';


// Admin Terms and Conditions
$route['factsuite-admin/terms-and-conditions'] = 'Fs_Factsuite_Admin/terms_and_conditions';
$route['factsuite-admin/get-tnc-details'] = 'Admin_Terms_And_Conditions/get_terms_and_conditions_details';
$route['factsuite-admin/update-tnc-details'] = 'Admin_Terms_And_Conditions/update_tnc_details';

// Admin Privacy Policy
$route['factsuite-admin/privacy-policy'] = 'Fs_Factsuite_Admin/privacy_policy';
$route['factsuite-admin/get-privacy-policy-details'] = 'Admin_Privacy_Policy/get_privacy_policy_details';
$route['factsuite-admin/update-privacy-policy-details'] = 'Admin_Privacy_Policy/update_privacy_policy_details';


// Admin Cancellation Policy
$route['factsuite-admin/cancellation-policy'] = 'Fs_Factsuite_Admin/cancellation_policy';
$route['factsuite-admin/get-cancellation-policy-details'] = 'Admin_Cancellation_Policy/get_cancellation_policy_details';
$route['factsuite-admin/update-cancellation-policy-details'] = 'Admin_Cancellation_Policy/update_cancellation_policy_details';

// Admin Ends

// User Starts
$route['login'] = 'Fs_User_Registration/login';

$route['sign-up'] = 'Fs_User_Registration/sign_up';
$route['factsuite-user/check-new-user-email-id'] = 'Fs_User_Registration/check_new_user_email_id';
$route['factsuite-user/check-new-user-mobile-number'] = 'Fs_User_Registration/check_new_user_mobile_number';
$route['factsuite-user/submit-registration-details'] = 'Fs_User_Registration/submit_registration_details';
$route['factsuite-user/login-otp'] = 'Fs_User_Registration/login_otp';
$route['factsuite-user/m-login-otp'] = 'Fs_User_Registration/m_login_otp';



// User About Us
// $route['about-us'] = 'FS_User_Blog';

// User Blog
$route['blog'] = 'Fs_User_Blog';
$route['factsuite-user/get-all-post-type'] = 'Fs_User_Blog/get_all_post_type';
$route['factsuite-user/get-all-post-list'] = 'Fs_User_Blog/get_all_post_list';
$route['blog-details'] = 'Fs_User_Blog/blog_details';
$route['m-blog-details'] = 'Fs_User_Blog/m_blog_details';

// User Contact Us
$route['contact-us'] = 'Fs_User_Contact_Us';
$route['factsuite-user/add-contact-us-enquiry'] = 'Fs_User_Contact_Us/add_contact_us_enquiry';
$route['factsuite-user/submit-contact-us-form-for-service'] = 'Fs_User_Contact_Us/submit_contact_us_form_for_service';

// User Services
$route['service-details'] = 'Fs_User_Service';
$route['fill-form-for-more-service-checks'] = 'Fs_User_Service/fill_form_for_more_service_checks';
$route['factsuite-user/submit-fill-form-for-more-service-checks'] = 'Fs_User_Service/submit_fill_form_for_more_service_checks';
$route['factsuite-user/get-all-service-packages'] = 'Fs_User_Service/get_all_service_packages';
$route['factsuite-user/get-service-packages-details'] = 'Fs_User_Service/get_service_packages_details';
$route['factsuite-user/get-package-tat-details'] = 'Fs_User_Service/get_package_tat_details';
$route['factsuite-user/get-selected-service-and-package-details'] = 'Fs_User_Service/get_selected_service_and_package_details';
$route['factsuite-user/get-selected-service-details'] = 'Fs_User_Service/get_selected_service_details';
$route['service-packages'] = 'Fs_User_Service/service_packages';
$route['factsuite-user/add-service-package-enquiry'] = 'Fs_User_Service/add_service_package_enquiry';
$route['purchase-service-package'] = 'Fs_User_Service/purchase_service_package';
$route['factsuite-user/get-selected-package-details'] = 'Fs_User_Service/get_selected_package_details';
$route['factsuite-user/get-selected-package-tat-details'] = 'Fs_User_Service/get_selected_package_tat_details';
$route['factsuite-user/get-selected-package-alacarte-component-details'] = 'Fs_User_Service/get_selected_package_alacarte_component_details';
$route['factsuite-user/add-package-details-to-cart'] = 'Fs_User_Service/add_package_details_to_cart';
$route['factsuite-user/get-cart-products'] = 'Fs_User_Service/get_cart_products';
$route['factsuite-user/delete-product-from-cart'] = 'Fs_User_Service/delete_product_from_cart';
$route['payment'] = 'Fs_User_Purchase_Service_Packages/index';
$route['make-payment'] = 'Fs_User_Purchase_Service_Packages/make_payment';

// User Service Enquiry
$route['factsuite-user/add-service-enquiry'] = 'Fs_User_Service/add_service_enquiry';

// user login
$route['factsuite-user/user-login-verify'] = 'Fs_User_Registration/valid_login_auth';

$route['factsuite-user/check-user-logged-in'] = 'verify_User_Login/check_user_logged_in';

// user profile
$route['my-profile'] = 'Fs_User_Profile/index';
$route['raise-issue'] = 'Fs_User_Raise_Issue/index';
$route['help'] = 'Fs_User_Help/index';
$route['terms-of-use'] = 'Fs_User_Terms_And_Conditions/index';
$route['factsuite-user-logout'] = 'Logout/user_logout';
$route['factsuite-user/update-profile-details'] = 'Fs_User_Profile/update_profile_details';
$route['factsuite-user/update-new-user-password'] = 'Fs_User_Profile/update_new_user_password';
$route['factsuite-user/get-user-details'] = 'Fs_User_Profile/get_user_details';
$route['factsuite-user/add-new-issue'] = 'Fs_User_Raise_Issue/add_user_raise_issue';
$route['factsuite-user/get-cart-count'] = 'Fs_User_Service/get_cart_count';

// About Us
$route['about-us'] = 'Fs_User_About_Us/index';

// User Careers
$route['careers'] = 'Fs_User_Careers/index';
$route['factsuite-user/get-all-careers'] = 'Fs_User_Careers/get_all_careers';
$route['factsuite-user/get-single-career-details'] = 'Fs_User_Careers/get_single_career_details';
$route['factsuite-user/apply-for-job'] = 'Fs_User_Careers/apply_for_job';

// User Forgot Password
$route['forgot-password'] = 'Fs_User_Registration/forgot_password';
$route['factsuite-user/forgot-password'] = 'Fs_User_Registration/verify_forgot_password_email_id';
$route['reset-password/(:any)/(:any)'] = 'Fs_User_Registration/reset_password/$1/$2';
$route['factsuite-user/reset-password'] = 'Fs_User_Registration/verify_and_reset_password';

// User Factsuite Products
$route['products'] = 'Fs_User_Products/index';

// User Get Country State City List
$route['factsuite-user/get-country-state-city-list'] = 'Country_State_City_List/get_country_state_city_list';
$route['factsuite-user/get-indian-state-list'] = 'Country_State_City_List/get_indian_state_list';

// User Privacy Policy
$route['privacy-policy'] = 'Fs_User_Privacy_Policy/index';

// User Cancellation Policy
$route['cancellation-policy'] = 'Fs_User_Cancellation_Policy/index';

// User Initiate cases
$route['initiate-cases'] = 'Fs_User_Initiate_Cases/index';
$route['m-initiate-cases'] = 'Fs_User_Initiate_Cases/m_index';
$route['factsuite-user/get-all-package-list'] = 'Fs_User_Initiate_Cases/get_all_package_list';
$route['factsuite-user/check-new-candidate-mobile-number'] = 'Fs_User_Initiate_Cases/check_new_candidate_mobile_number';
$route['factsuite-user/check-new-candidate-email-id'] = 'Fs_User_Initiate_Cases/check_new_candidate_email_id';
$route['factsuite-user/initiate-new-candidate'] = 'Fs_User_Initiate_Cases/initiate_new_candidate';

// User Your Checks
$route['your-checks'] = 'Fs_User_Your_Checks/index';
$route['m-your-checks'] = 'Fs_User_Your_Checks/m_index';
$route['factsuite-user/get-all-initiated-cases'] = 'Fs_User_Your_Checks/get_all_initiated_cases';
$route['download-completed-case-report/(:any)'] = 'Fs_User_Your_Checks/download_completed_case_report/$1';

// User Raise Issue(Ticketing System)
$route['factsuite-user/get-ticket-priority-list'] = 'Custom_Util/get_ticket_priority_list';
$route['factsuite-user/get-ticket-classification-list'] = 'Custom_Util/get_ticket_classification_list';
$route['factsuite-user/raise-new-ticket'] = 'Fs_User_Raise_Issue/raise_new_ticket';


// User component Details
$route['factsuite-user/get-single-component-details'] = 'Fs_User_Service/get_single_component_details';

// User Mobile Links
$route['m-index'] = 'Welcome/m_index';
$route['m-about-us'] = 'Fs_User_About_Us/m_index';
$route['m-login'] = 'Fs_User_Registration/m_login';
$route['m-sign-up'] = 'Fs_User_Registration/m_sign_up';
$route['m-forgot-password'] = 'Fs_User_Registration/m_forgot_password';
$route['m-reset-password/(:any)/(:any)'] = 'Fs_User_Registration/m_reset_password/$1/$2';
$route['m-contact-us'] = 'Fs_User_Contact_Us/m_index';
$route['m-careers'] = 'Fs_User_Careers/m_index';
$route['m-blogs'] = 'Fs_User_Blog/m_index';
$route['m-raise-issue'] = 'Fs_User_Raise_Issue/m_index';
$route['m-service-details'] = 'Fs_User_Service/m_index';
$route['m-fill-form-for-more-service-checks'] = 'Fs_User_Service/m_fill_form_for_more_service_checks';
$route['m-products'] = 'Fs_User_Products/m_index';
$route['m-my-profile'] = 'Fs_User_Profile/m_index';
$route['m-purchase-service-package'] = 'Fs_User_Service/m_purchase_service_package';
$route['m-my-cart'] = 'Fs_User_Service/m_my_cart';
$route['m-payment'] = 'Fs_User_Purchase_Service_Packages/m_index';
$route['m-terms-of-use'] = 'Fs_User_Terms_And_Conditions/m_index';
$route['m-privacy-policy'] = 'Fs_User_Privacy_Policy/m_index';
$route['m-cancellation-policy'] = 'Fs_User_Cancellation_Policy/m_index';
// $route['factsuite-user/update-profile-details'] = 'Fs_User_Profile/update_profile_details';
// $route['factsuite-user/update-new-user-password'] = 'Fs_User_Profile/update_new_user_password';
// $route['factsuite-user/get-user-details'] = 'Fs_User_Profile/get_user_details';
// $route['factsuite-user/add-new-issue'] = 'Fs_User_Raise_Issue/add_user_raise_issue';
// $route['factsuite-user/get-cart-count'] = 'Fs_User_Service/get_cart_count';


// $route['factsuite-admin/test-email-with-attachment'] = 'Admin_Emails/test_email_with_attachment';
$route['factsuite-admin/test-email-with-attachment'] = 'Admin_Emails/test_email_with_attachment_pdf';