var first_name_max_length = 50,
	last_name_max_length = 50,
	district_name_max_length = 40,
	block_name_max_length = 40,
	sign_up_password_length = 8,
	gst_number_length = 16;

get_user_details();
function get_user_details() {
	$.ajax({
		type: "POST",
	  	url: base_url+"user/get-user-details",
	  	data:{
	  		verify_user_request : 1
	  	},
	  	dataType: 'json', 
	  	success: function(data) {
	  		if(data.status == 1) {
	  			$('#show-user-email-id').html(data.user_details.email);

	  			$('#show-user-phone-number').html('+91-'+data.user_details.phone);

	  			var user_first_name = (data.user_details.username != '') ? data.user_details.username : '-';
	  			$('#show-user-first-name').html(user_first_name);
	  			$('#user-first-name').val(user_first_name);

	  			var user_last_name = (data.user_details.full_name != '') ? data.user_details.full_name : '-';
	  			$('#show-user-last-name').html(user_last_name);
	  			$('#user-last-name').val(user_last_name);

	  			var user_block = (data.user_details.zone != '') ? data.user_details.zone : '-';
	  			$('#show-user-block-name').html(user_block);
	  			$('#block-name').val(user_block);

	  			var user_district = (data.user_details.location != '') ? data.user_details.location : '-';
	  			$('#show-user-district-name').html(user_district)
	  			$('#district-name').val(user_district);

	  			var user_address = (data.user_details.address != '') ? data.user_details.address : '-';
	  			$('#show-user-address').html(user_address)
	  			$('#user-address').val(user_address);
	  			
	  			var bandwidth = (data.user_details.bandwidth != '') ? data.user_details.bandwidth : '-';
	  			$('#show-user-plan').html(bandwidth)
	  			$('#user-plan').val(bandwidth);
	  			
	  		} else {
	  			toastr.error('Something went wrong while getting your details. Please try again.');
	  		}
		}
	});
}

$('#user-first-name').on('keyup blur', function () {
	check_user_first_name();
});

$('#user-last-name').on('keyup blur', function () {
	check_user_last_name();
});

$('#block-name').on('keyup blur', function () {
	check_block_name();
});

$('#district-name').on('keyup blur', function () {
	check_district_name();
});

$('#user-address').on('keyup blur', function () {
	check_user_address();
});

$('#sign-up-btn').on('keyup blur', function () {
	sign_up();
});

function check_user_first_name() {
	var variable_array = {};
	variable_array['input_id'] = '#user-first-name';
	variable_array['error_msg_div_id'] = '#user-first-name-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter your first name';
	variable_array['not_an_alphabet_input_error_msg'] = 'Name should be only alphabets';
	variable_array['exceeding_max_length_input_error_msg'] = 'Name should be of max '+first_name_max_length+' characters';
	variable_array['max_length'] = first_name_max_length;
	return mandatory_only_alphabets_with_max_length_limitation(variable_array);
}

function check_user_last_name() {
	var variable_array = {};
	variable_array['input_id'] = '#user-last-name';
	variable_array['error_msg_div_id'] = '#user-last-name-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter your last name';
	variable_array['not_an_alphabet_input_error_msg'] = 'Name should be only alphabets';
	variable_array['exceeding_max_length_input_error_msg'] = 'Name should be of max '+last_name_max_length+' characters';
	variable_array['max_length'] = last_name_max_length;
	return mandatory_only_alphabets_with_max_length_limitation(variable_array);
}

function check_block_name() {
	var variable_array = {};
	variable_array['input_id'] = '#block-name';
	variable_array['error_msg_div_id'] = '#block-name-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter your block'; 
	variable_array['max_length'] = block_name_max_length; 
	variable_array['exceeding_max_length_input_error_msg'] = 'Block name should be only of max '+district_name_max_length+' characters'; 
	return mandatory_any_input_with_max_length_limitation(variable_array);
}

function check_district_name() {
	var variable_array = {};
	variable_array['input_id'] = '#district-name';
	variable_array['error_msg_div_id'] = '#district-name-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter your district'; 
	variable_array['max_length'] = district_name_max_length; 
	variable_array['exceeding_max_length_input_error_msg'] = 'District name should be only of max '+district_name_max_length+' characters'; 
	return mandatory_any_input_with_max_length_limitation(variable_array);
}

function check_user_address() {
	var variable_array = {};
	variable_array['input_id'] = '#user-address';
	variable_array['error_msg_div_id'] = '#user-address-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter your address'; 
	return mandatory_any_input_with_no_limitation(variable_array);
}

$("#edit-profile-btn").on('click','#edit-profile',function() {
	$('#show-user-first-name, #show-user-last-name, #show-user-block-name, #show-user-district-name, #show-user-address').removeClass('d-block').addClass('d-none');
	$("#user-first-name, #user-last-name, #block-name, #district-name, #user-address").removeClass('d-none').addClass('d-block');
	$("#edit-profile-btn").html('<button id="update-profile">Save</button>');
});

$('#sign-up-current-password').on('keyup blur', function () {
	check_sign_up_current_password();
});

$('#sign-up-password').on('keyup blur', function () {
	check_sign_up_password();
});

function check_sign_up_current_password() {
	var variable_array = {};
	variable_array['input_id'] = '#sign-up-current-password';
	variable_array['error_msg_div_id'] = '#sign-up-current-password-name-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter your current password.';
	variable_array['min_length'] = sign_up_password_length;
	variable_array['min_length_input_error_msg'] = 'Password length should be of min '+sign_up_password_length+' characters.';
	return mandatory_any_input_with_min_length_validation(variable_array);
}

function check_sign_up_password() {
	var variable_array = {};
	variable_array['input_id'] = '#sign-up-password';
	variable_array['error_msg_div_id'] = '#sign-up-password-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter your password.';
	variable_array['min_length'] = sign_up_password_length;
	variable_array['min_length_input_error_msg'] = 'Password length should be of min '+sign_up_password_length+' characters.';
	return mandatory_any_input_with_min_length_validation(variable_array);
}

$("#edit-profile-btn").on('click','#update-profile',function() { 
	var check_user_first_name_var = check_user_first_name(),
		check_user_last_name_var = check_user_last_name(),
		check_block_name_var = check_block_name(),
		check_district_name_var = check_district_name(),
		check_user_address_var = check_user_address();
		
	if (check_user_first_name_var == 1 && check_user_last_name_var == 1 && check_block_name_var == 1 && check_district_name_var == 1 && check_user_address_var == 1) {

		$.ajax({
			type: "POST",
		  	url: base_url+"user/update-profile-details",
		  	data: {
	  			first_name : $("#user-first-name").val(),
	  			last_name : $("#user-last-name").val(),
	  			block_name : $('#block-name').val(),
				district_name : $('#district-name').val(),
				user_address : $('#user-address').val(),
				verify_user_request : 1
		  	},
		  	dataType: 'json', 
		  	success: function(data) {
		  		$('#sign-up-btn').prop('disabled',false);
				$('#sign-up-error-msg-div').html('');
		  		if (data.status == 1) {
					get_user_details();

					$('#show-user-first-name, #show-user-last-name, #show-user-block-name, #show-user-district-name, #show-user-address').removeClass('d-none').addClass('d-block');
					$("#user-first-name, #user-last-name, #block-name, #district-name, #user-address").removeClass('d-block').addClass('d-none');
					$("#edit-profile-btn").html('<button id="edit-profile">Edit</button>');
					
					toastr.success('Your Profile has been updated successfully.');
		  		} else {
		  			toastr.error('OOPS! Something went wrong while updating your profile. Please try again.');
		  		}
			}
		});
	}
});

$("#change-user-password").on('click',function() {
	var check_sign_up_password_var = check_sign_up_password(),
		check_sign_up_current_password_var = check_sign_up_current_password();
	if (check_sign_up_current_password_var == 1 && check_sign_up_password_var == 1) {
		$.ajax({
			type: "POST",
		  	url: base_url+"user/update-user-password",
		  	data: {
		  		verify_user_request : 1,
		  		current_password : $("#sign-up-current-password").val(),
		  		user_password : $("#sign-up-password").val()
		  	},
		  	dataType: 'json', 
		  	success: function(data) {
		  		if(data.status == 1) {
			  		$('#sign-up-current-password-name-error-msg-div').html('');
		  			if (data.user_details.status == 1) {
			  			toastr.success('Your password has been updated successfully.');
			  			
			  			$("#update-password-modal").modal('hide');
			  			
			  			
			  			$("#sign-up-current-password").val('');
			  			$("#sign-up-password").val('');
			  		} else if (data.user_details.status == 2) {
			  			$('#sign-up-current-password-name-error-msg-div').html('<span class="text-danger error-msg-small">Entered password is incorrect. Please enter the correct one.</span>');
			  		} else {
			  			toastr.error('Something went wrong while updating your password. Please try again.');
			  		}
		  		} else if(data.status == 2) {
		  			$('#sign-up-current-password-name-error-msg-div').html('<span class="text-danger error-msg-small">Entered password is incorrect. Please enter the correct one.</span>');
		  		} else {
		  			$('#sign-up-current-password-name-error-msg-div').html('');
		  			toastr.error('Something went wrong while updating your password. Please try again.');
		  		}
			}
		});
	}
});