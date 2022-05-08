var phone_number_max_length = 10,
	password_min_length = 8;

$('#btn-sign-in-hdr').on('click', function() {
	$('#check-login-modal').modal({
    	backdrop: 'static',
        keyboard: false
    });
});

$('#modal-continue-as-user-btn').on('click', function() {
	$('#check-login-modal').modal('hide');
	
	$('#user-login-mobile-number-or-email-id').val('');
	$('#user-login-password').val('');
	$('#user-login-error-msg-div').html('');

	$('#user-login-modal').modal({
    	backdrop: 'static',
        keyboard: false
    });
});

$('#user-login-mobile-number-or-email-id').on('keyup blur', function() {
	check_user_login_mobile_number_or_email_id();
});

$('#user-login-password').on('keyup blur', function() {
	check_user_login_password();
});

$('#user-login-btn').on('click', function() {
	verify_user_login();
});

$('#user-logout-btn').on('click', function() {
	user_logout();
});

function check_user_login_mobile_number_or_email_id() {
	var variable_array = {};
	variable_array['input_id'] = '#user-login-mobile-number-or-email-id';
	variable_array['error_msg_div_id'] = '#user-login-mobile-number-or-email-id-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter your phone number';
	variable_array['not_a_number_input_error_msg'] = 'Mobile number should be only numbers.'
	variable_array['exceeding_max_length_input_error_msg'] = 'Mobile number should be of '+phone_number_max_length+' digits';
	variable_array['max_length'] = phone_number_max_length;
	return mandatory_mobile_number_pin_code_with_max_length_limitation(variable_array);
}

function check_user_login_password() {
	var variable_array = {};
	variable_array['input_id'] = '#user-login-password';
	variable_array['error_msg_div_id'] = '#user-login-password-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter your password';
	variable_array['min_length'] = password_min_length;
	variable_array['min_length_input_error_msg'] = 'Password should be of min '+password_min_length+' characters';
	return mandatory_any_input_with_min_length_validation(variable_array);
}

function verify_user_login() {
	var check_user_login_mobile_number_or_email_id_var = check_user_login_mobile_number_or_email_id(),
		check_user_login_password_var = check_user_login_password();

	if (check_user_login_mobile_number_or_email_id_var == 1 && check_user_login_password_var == 1) {
		$.ajax({
			type: "POST",
		  	url: base_url+"user-login/verify-login",
		  	data: {
		  		mobile_no_or_email_id : $('#user-login-mobile-number-or-email-id').val(),
		  		password : $('#user-login-password').val(),
		  		verify_user_request : 1
		  	},
		  	 dataType: "json",
		  	success: function(data) {
			  	if (data.status == '1') {
			  		if (data.user_data.status == '1') {
			  			$('#hdr-sign-in-logout-li').html('<button id="user-logout-btn" class="user-logout-btn" onclick="user_logout()"><i class="fa fa-power-off"></i></button>');
			  			toastr.success('You have successfully logged in.');
			  			$('#user-login-modal').modal('hide');
			  		} else {
			  			$('#user-login-error-msg-div').html("<span class='text-danger error-msg-small d-block mt-2 text-center'>Incorrect Mobile No. or Password</span>");	
			  		}
			  	} else {
					toastr.error('Something went wrong while logging in. Please try again.');
		  		}
		  	} 
		});
	}
}

function user_logout() {
	$.ajax({
		type: "POST",
	  	url: base_url+"user-login/verify-logout",
	  	data: {
	  		verify_user_request : 1
	  	},
	  	 dataType: "json",
	  	success: function(data) {
		  	if (data.status == '1') {
		  		window.location.href = base_url;
		  	} else {
				toastr.error('Something went wrong while logging out. Please try again.');
	  		}
	  	} 
	});
}