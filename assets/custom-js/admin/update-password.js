var password_min_length = 8;

$('#current-password').on('keyup blur', function() {
	check_current_password();
});

$('#new-password').on('keyup blur', function() {
	check_new_password();
});

$('#confirm-password').on('keyup blur', function() {
	check_confirm_password();
});

$('#view-new-password-div').on('click', function() {
	view_new_password();	
});

$('#update-password-btn').on('click', function() {
	verify_password();	
});

function check_current_password() {
	var input_id = '#current-password',
		error_msg_div_id = '#current-password-error-msg-div',
		empty_input_error_msg = 'Please enter your current password',
		min_length_error_msg = 'Password should be of min '+password_min_length+' characters.';
	return mandatory_any_input_with_min_length_validation(input_id,error_msg_div_id,empty_input_error_msg,password_min_length,min_length_error_msg);
}

function check_new_password() {
	var input_id = '#new-password',
		error_msg_div_id = '#new-password-error-msg-div',
		empty_input_error_msg = 'Please enter your new password',
		min_length_error_msg = 'Password should be of min '+password_min_length+' characters.';
	var check_new_pswd_var = mandatory_any_input_with_min_length_validation(input_id,error_msg_div_id,empty_input_error_msg,password_min_length,min_length_error_msg);
		
	var confirm_password = $('#confirm-password').val();
	if(check_new_pswd_var == 1 && confirm_password != '' && confirm_password.length >= password_min_length) {
		check_confirm_password();
	}
}

function check_confirm_password() {
	var new_password = '#new-password',
		confirm_password = '#confirm-password',
		new_password_error_msg_div = '#new-password-error-msg-div',
		confirm_password_error_msg_div = '#confirm-password-error-msg-div',
		new_password_empty_error_msg = 'Please enter the new password',
		new_password_min_length_error_msg = 'Password should be of min '+password_min_length+' characters.',
		confirm_password_empty_error_msg = 'Please confirm the new password.',
		confirm_password_min_length_error_msg = 'Password should be of min '+password_min_length+' characters.';

	return confirm_both_passwords(new_password,confirm_password,new_password_error_msg_div,confirm_password_error_msg_div,new_password_empty_error_msg,new_password_min_length_error_msg,confirm_password_empty_error_msg,confirm_password_min_length_error_msg,password_min_length);
}

function view_new_password() {
	view_password_toggle('#new-password','#update-password-fa-i','#new-password-type');
}

function verify_password() {
	var current_password = $('#current-password').val(),
		new_password = $('#new-password').val(),
		check_current_password_var = check_current_password(),
		check_confirm_password_var = check_confirm_password();


	if (check_current_password_var == '1' && check_confirm_password_var == '1') {
		if (current_password != new_password) {
			$('#update-password-error-msg-div').html('<span class="text-warning error-msg-small">Please wait while we are updating your password.</sapn>');
			$('#update-password-btn').prop('disabled',true);
			$.ajax({
		        type  : 'POST',
		        url: base_url+'rajakshetra-admin/update-admin-password',
		        data : {
		        	admin_password : current_password,
		        	new_password : new_password
		        },
		        dataType : 'json',
		        success : function(data) {
		        	$('#update-password-error-msg-div').html('');
		        	$('#update-password-btn').prop('disabled',false);

		            if (data.count == 1) {
		            	if (data.status == 1) {
		            		toastr.success('Your password has been updated successfully.');
		            		$('#current-password, #new-password, #confirm-password').val('');
		            		$('#current-password-error-msg-div, #new-password-error-msg-div, #confirm-password-error-msg-div').html('');
		            	} else {
		            		toastr.error('OOPS! Something went wrong while updating your password. Please try again.');
		            	}
		            } else {
		            	$('#current-password-error-msg-div').html('<span class="text-danger error-msg-small">You have entered incorrect password. Please enter the correct one.</sapn>')
		                // toastr.error('You have entered incorrect password. Please enter the correct one.');
		            }
		        },
		        error: function(data) {
		        	$('#update-password-error-msg-div').html('');
					$('#update-password-btn').prop('disabled',false);

		            toastr.error('OOPS! Something went wrong while updating your password. Please try again.');           
		        }
		    });
		} else {
			toastr.warning('New password is same as current password. Please enter different password.');
		}
	} else {
		check_current_password();

		check_confirm_password();
	}
}