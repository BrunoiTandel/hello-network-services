var first_name_max_length = 100,
	last_name_max_length = 100,
	mobile_number_length = 10,
	block_max_length = 10,
	district_max_length = 100;

$('#first-name').on('keyup blur', function() {
	check_first_name();
});

$('#last-name').on('keyup blur', function() {
	check_last_name();
});

$('#mobile-number').on('keyup blur', function() {
	check_mobile_number();
});

$('#email-id').on('keyup blur', function() {
	check_email_id();
});

$('#ip-address').on('keyup blur', function() {
	check_ip_address();
});

$('#block').on('keyup blur', function() {
	check_block();
});

$('#district').on('keyup blur', function() {
	check_district();
});

$('#address').on('keyup blur', function() {
	check_address();
});

$('#add-new-user-btn').on('click', function() {
	add_new_user();
});

function check_first_name() {
	var variable_array = {};
	variable_array['input_id'] = '#first-name';
	variable_array['error_msg_div_id'] = '#first-name-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter user first name';
	variable_array['not_an_alphabet_input_error_msg'] = 'First name should be only alphabets';
	variable_array['exceeding_max_length_input_error_msg'] = 'Name should be of max '+first_name_max_length+' characters';
	variable_array['max_length'] = first_name_max_length;
	return mandatory_only_alphabets_with_max_length_limitation(variable_array);
}

function check_last_name() {
	var variable_array = {};
	variable_array['input_id'] = '#last-name';
	variable_array['error_msg_div_id'] = '#last-name-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter user last name';
	variable_array['not_an_alphabet_input_error_msg'] = 'Last name should be only alphabets';
	variable_array['exceeding_max_length_input_error_msg'] = 'Last name should be of max '+last_name_max_length+' characters';
	variable_array['max_length'] = last_name_max_length;
	return mandatory_only_alphabets_with_max_length_limitation(variable_array);
}

function check_mobile_number() {
	var variable_array = {};
	variable_array['input_id'] = '#mobile-number';
	variable_array['error_msg_div_id'] = '#mobile-number-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter user mobile number';
	variable_array['not_a_number_input_error_msg'] = 'Mobile number should be only digits.'
	variable_array['exceeding_max_length_input_error_msg'] = 'Mobile number should be of '+mobile_number_length+' digits';
	variable_array['mobile_number_length'] = mobile_number_length;
	variable_array['duplicate_email_id_error_msg'] = 'This mobile number already exists. Please add another number.';
	variable_array['ajax_call_url'] = 'team-member/check-new-user-mobile-number';
	variable_array['ajax_pass_data'] = {verify_team_member_request : '1',mobile_number : $('#mobile-number').val()};
	return mandatory_mobile_number_with_check_duplication(variable_array);
}

function check_mobile_number_format() {
	var variable_array = {};
	variable_array['input_id'] = '#mobile-number';
	variable_array['error_msg_div_id'] = '#mobile-number-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter the mobile number';
	variable_array['not_a_number_input_error_msg'] = 'Mobile number should be only numbers.'
	variable_array['exceeding_max_length_input_error_msg'] = 'Mobile number should be of '+mobile_number_length+' digits';
	variable_array['max_length'] = mobile_number_length;
	return mandatory_mobile_number_pin_code_with_max_length_limitation(variable_array);
}

function check_email_id() {
	var variable_array = {};
	variable_array['input_id'] = '#email-id';
	variable_array['error_msg_div_id'] = '#email-id-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter user email id.';
	variable_array['not_an_email_input_error_msg'] = 'Please enter a valid email id.';
	variable_array['duplicate_email_id_error_msg'] = 'Entered email id already exists. Please enter a new email id.';
	variable_array['ajax_call_url'] = 'team-member/check-new-user-email-id';
	variable_array['ajax_pass_data'] = {verify_team_member_request : '1',email : $('#email-id').val().toLowerCase()};
	return mandatory_email_id_with_check_duplication(variable_array);
}

function check_email_id_format() {
	var variable_array = {};
	variable_array['input_id'] = '#email-id';
	variable_array['error_msg_div_id'] = '#email-id-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter team member email id';
	variable_array['not_an_email_input_error_msg'] = 'Please enter a valid email id';
	return mandatory_email_id(variable_array);
}

function check_ip_address() {
	var variable_array = {};
	variable_array['input_id'] = '#ip-address';
	variable_array['error_msg_div_id'] = '#ip-address-error-msg-div';
	variable_array['empty_input_error_msg'] = '';
	variable_array['not_an_ip_address_input_error_msg'] = 'Entered value is not a valid IP address. Please enter the correct one.';
	return not_mandatory_ip_address(variable_array);
}

function check_block() {
	var variable_array = {};
	variable_array['input_id'] = '#block';
	variable_array['error_msg_div_id'] = '#block-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter the block';
	variable_array['exceeding_max_length_input_error_msg'] = 'Block should be of max '+block_max_length+' characters';
	variable_array['max_length'] = block_max_length;
	return mandatory_any_input_with_max_length_limitation(variable_array);
}

function check_district() {
	var variable_array = {};
	variable_array['input_id'] = '#district';
	variable_array['error_msg_div_id'] = '#district-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter the district';
	variable_array['exceeding_max_length_input_error_msg'] = 'District should be of max '+district_max_length+' characters';
	variable_array['max_length'] = district_max_length;
	return mandatory_any_input_with_max_length_limitation(variable_array);
}

function check_address() {
	var variable_array = {};
	variable_array['input_id'] = '#address';
	variable_array['error_msg_div_id'] = '#address-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please select the address';
	return mandatory_any_input_with_no_limitation(variable_array);
}

function add_new_user() {
	var check_first_name_var = check_first_name(),
		check_last_name_var = check_last_name(),
		check_mobile_number_format_var = check_mobile_number_format(),
		check_email_id_format_var = check_email_id_format(),
		check_ip_address_var = check_ip_address(),
		check_block_var = check_block(),
		check_district_var = check_district(),
		check_address_var = check_address();

	if (check_first_name_var == 1 && check_last_name_var == 1 && check_mobile_number_format_var == 1 && check_email_id_format_var == 1
		&& check_ip_address_var == 1 && check_block_var == 1 && check_district_var == 1 && check_address_var == 1) {
		$('#add-new-user-btn').prop('disabled',true);
		$('#add-new-user-error-msg-div').html('<span class="d-block text-warning error-msg text-center">Please wait while we are adding a new user.</span>');

		var formdata = new FormData();
		formdata.append('verify_team_member_request',1);
		formdata.append('first_name',$('#first-name').val());
		formdata.append('last_name',$('#last-name').val());
		formdata.append('mobile_number',$('#mobile-number').val());
		formdata.append('email_id',$('#email-id').val());
		formdata.append('ip_address',$('#ip-address').val());
		formdata.append('block',$('#block').val());
		formdata.append('district',$('#district').val());
		formdata.append('address',$('#address').val());

		$.ajax({
			type: "POST",
		  	url: base_url+"team-member/add-new-user-details",
		  	data:formdata,
		  	dataType: 'json',
		    contentType: false,
		    processData: false,
		  	success: function(data) {
		  		$('#add-new-user-btn').prop('disabled',false);
				$('#add-new-user-error-msg-div').html('');
		  		if (data.status == 1) {
				  	if (data.user.status == '1') {
				  		toastr.success('New user has been added successfully.');
						$('#first-name').val('');
						$('#last-name').val('');
						$('#mobile-number').val('');
						$('#email-id').val('');
						$('#ip-address').val('');
						$('#block').val('');
						$('#district').val('');
						$('#address').val('');
				  	} else {
				  		toastr.error('Something went wrong while adding the user. Please try again.');
			  		}
			  	} else if(data.status == '2') {
				  	if (data.mobile_number_count != 0) {
				  		check_mobile_number();
				  	}

				  	if (data.email_id_count != 0) {
				  		check_email_id();
				  	}
			  	} else {
			  		check_admin_login();
			  	}
		  	},
		  	error: function(data) {
		  		$('#add-new-user-btn').prop('disabled',false);
				$('#add-new-user-error-msg-div').html('');
		  		toastr.error('Something went wrong while adding the user. Please try again.');
		  	}
		});
	}
}