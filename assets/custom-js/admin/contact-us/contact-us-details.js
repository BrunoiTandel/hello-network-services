var contact_number_max_length = 10;

get_contact_us_details();
function get_contact_us_details() {
	$.ajax({
        type  : 'POST',
        url   : base_url+'admin/get-contact-us-details',
        data : {
        	verify_admin_request : '1'
        },
        dataType : 'json',
        success : function(data) {
	        if (data.status == '1') {
	         	$('#contact-number').val(data.contact_us_details.contact_us_contact_number);
	         	$('#contact-email-id').val(data.contact_us_details.contact_us_email_id);
	         	$('#facebook-link').val(data.contact_us_details.facebook_link);
	         	$('#linkedin-link').val(data.contact_us_details.linkedin_link);
	         	$('#twitter-link').val(data.contact_us_details.twitter_link);
	         	$('#instagram-link').val(data.contact_us_details.instagram_link);
	         	$('#office-address').val(data.contact_us_details.office_address);
	         	$('#map-location').val(data.contact_us_details.map_location);
	         	
	        } else {
	        	check_admin_login();
	        }
	    }
    });
}

$('#contact-number').on('keyup blur', function() {
	check_contact_number();
});

$('#contact-email-id').on('keyup blur', function() {
	check_contact_email_id();
});

$('#sales-email-id').on('keyup blur', function() {
	check_sales_email_id();
});

$('#support-email-id').on('keyup blur', function() {
	check_support_email_id();
});

$('#facebook-link').on('keyup blur', function() {
	check_facebook_link();
});

$('#linkedin-link').on('keyup blur', function() {
	check_linkedin_link();
});

$('#twitter-link').on('keyup blur', function() {
	check_twitter_link();
});

$('#instagram-link').on('keyup blur', function() {
	check_instagram_link();
});

$('#office-address').on('keyup blur', function() {
	check_office_address();
});

$('#map-location').on('keyup blur', function() {
	check_map_location();
});

$('#update-contact-us-content-btn').on('click', function() {
	update_contact_us_content();
});

function check_contact_number() {
	var variable_array = {};
	variable_array['input_id'] = '#contact-number';
	variable_array['error_msg_div_id'] = '#contact-number-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter the mobile number';
	variable_array['not_a_number_input_error_msg'] = 'Mobile number should be only numbers.'
	variable_array['exceeding_max_length_input_error_msg'] = 'Mobile number should be of '+contact_number_max_length+' digits';
	variable_array['max_length'] = contact_number_max_length;
	return mandatory_mobile_number_pin_code_with_max_length_limitation(variable_array);
}

function check_contact_email_id() {
	var variable_array = {};
	variable_array['input_id'] = '#contact-email-id';
	variable_array['error_msg_div_id'] = '#contact-email-id-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter your email id.';
	variable_array['not_an_email_input_error_msg'] = 'Please enter a valid email id.';
	return mandatory_email_id(variable_array);
}

function check_sales_email_id() {
	var variable_array = {};
	variable_array['input_id'] = '#sales-email-id';
	variable_array['error_msg_div_id'] = '#sales-email-id-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter your email id.';
	variable_array['not_an_email_input_error_msg'] = 'Please enter a valid email id.';
	return mandatory_email_id(variable_array);
}

function check_support_email_id() {
	var variable_array = {};
	variable_array['input_id'] = '#support-email-id';
	variable_array['error_msg_div_id'] = '#support-email-id-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter your email id.';
	variable_array['not_an_email_input_error_msg'] = 'Please enter a valid email id.';
	return mandatory_email_id(variable_array);
}

function check_facebook_link() {
	var variable_array = {};
	variable_array['input_id'] = '#facebook-link';
	variable_array['error_msg_div_id'] = '#facebook-link-error-msg-div';
	variable_array['not_a_link_input_error_msg'] = 'Entered string is not a URL. Plese enter the URL.';
	variable_array['empty_input_error_msg'] = 'Please enter the facebook URL';
	return mandatory_link(variable_array);
}

function check_linkedin_link() {
	var variable_array = {};
	variable_array['input_id'] = '#linkedin-link';
	variable_array['error_msg_div_id'] = '#linkedin-link-error-msg-div';
	variable_array['not_a_link_input_error_msg'] = 'Entered string is not a URL. Plese enter the URL.';
	variable_array['empty_input_error_msg'] = 'Please enter the LinkedIn URL';
	return mandatory_link(variable_array);
}

function check_twitter_link() {
	var variable_array = {};
	variable_array['input_id'] = '#twitter-link';
	variable_array['error_msg_div_id'] = '#twitter-link-error-msg-div';
	variable_array['not_a_link_input_error_msg'] = 'Entered string is not a URL. Plese enter the URL.';
	variable_array['empty_input_error_msg'] = 'Please enter the Twitter URL';
	return mandatory_link(variable_array);
}

function check_instagram_link() {
	var variable_array = {};
	variable_array['input_id'] = '#instagram-link';
	variable_array['error_msg_div_id'] = '#instagram-link-error-msg-div';
	variable_array['not_a_link_input_error_msg'] = 'Entered string is not a URL. Plese enter the URL.';
	variable_array['empty_input_error_msg'] = 'Please enter the Instagram URL';
	return mandatory_link(variable_array);
}

function check_office_address() {
	var variable_array = {};
	variable_array['input_id'] = '#office-address';
	variable_array['error_msg_div_id'] = '#office-address-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter the Office Address';
	return mandatory_any_input_with_no_limitation(variable_array);
}

function check_map_location() {
	var variable_array = {};
	variable_array['input_id'] = '#map-location';
	variable_array['error_msg_div_id'] = '#map-location-error-msg-div';
	variable_array['not_a_link_input_error_msg'] = 'Entered string is not a URL. Plese enter the URL.';
	variable_array['empty_input_error_msg'] = 'Please enter the Map Location URL';
	return mandatory_link(variable_array);
}

function update_contact_us_content() {
	var contact_number = $('#contact-number').val(),
		contact_email_id = $('#contact-email-id').val(),
		sales_email_id = $('#sales-email-id').val(),
		support_email_id = $('#support-email-id').val(),
		facebook_link = $("#facebook-link").val(),
		linkedin_link = $("#linkedin-link").val(),
		twitter_link = $("#twitter-link").val(),
		instagram_link = $("#instagram-link").val(),
		office_address = $('#office-address').val(),
		map_location = $('#map-location').val();

	var check_contact_number_var = check_contact_number(),
		check_contact_email_id_var = check_contact_email_id(),
		check_facebook_link_var = check_facebook_link(),
		check_linkedin_link_var = check_linkedin_link(),
		check_twitter_link_var = check_twitter_link(),
		check_instagram_link_var = check_instagram_link(),
		check_office_address_var = check_office_address(),
		check_map_location_var = check_map_location();

	if (check_contact_number_var == 1 && check_contact_email_id_var == 1 && check_facebook_link_var == 1 && check_linkedin_link_var == 1
		&& check_twitter_link_var == 1 && check_instagram_link_var == 1 && check_office_address_var == 1 && check_map_location_var == 1) {
		$('#update-contact-us-content-btn').prop('disabled',true);
		$('#about-us-content-error-div').html('<span class="d-block text-warning error-msg text-center">Please wait while we are updating the client logo.</span>');

		var formdata = new FormData();
		formdata.append('verify_admin_request',1);
		formdata.append('contact_number',contact_number);
		formdata.append('contact_email_id',contact_email_id);
		formdata.append('sales_email_id',sales_email_id);
		formdata.append('support_email_id',support_email_id);
		formdata.append('facebook_link',facebook_link);
		formdata.append('linkedin_link',linkedin_link);
		formdata.append('twitter_link',twitter_link);
		formdata.append('instagram_link',instagram_link);
		formdata.append('office_address',office_address);
		formdata.append('map_location',map_location);

		$.ajax({
			type: "POST",
		  	url: base_url+"admin/update-contact-us-details",
		  	data:formdata,
		  	dataType: 'json',
		    contentType: false,
		    processData: false,
		  	success: function(data) {
		  		if (data.status == 1) {
			  		$('#update-contact-us-content-btn').prop('disabled',false);
					$('#contact-us-content-error-div').html('');
				  	if (data.contact_us_details.status == '1') {
				  		toastr.success('Contact Us details has been updated successfully.');
				  	} else {
				  		toastr.error('Something went wrong while updating the contact us details. Please try again.');
			  		}
			  	} else {
			  		check_admin_login();
			  	}
		  	},
		  	error: function(data) {
		  		$('#update-contact-us-content-btn').prop('disabled',false);
				$('#contact-us-content-error-div').html('');
		  		toastr.error('Something went wrong while updating the contact us details. Please try again.');
		  	}
		});
	}
}