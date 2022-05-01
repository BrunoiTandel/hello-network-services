var contact_us_first_name_max_length = 50,
	contact_us_last_name_max_length = 50;
	contact_us_phone_number_max_length = 10;

$('#contact-us-first-name').on('keyup blur', function() {
	check_contact_us_first_name();
});

$('#contact-us-last-name').on('keyup blur', function() {
	check_contact_us_last_name();
});

$('#contact-us-email-id').on('keyup blur', function() {
	check_contact_us_email_id();
});

$('#contact-us-phone-number').on('keyup blur', function() {
	check_contact_us_phone_number();
});

$('#contact-us-message').on('keyup blur', function() {
	check_contact_us_message();
});

$('#contact-us-submit-btn').on('click', function() {
	submit_contact_us_submit();
});

function check_contact_us_first_name() {
	var variable_array = {};
	variable_array['input_id'] = '#contact-us-first-name';
	variable_array['error_msg_div_id'] = '#contact-us-first-name-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter your first name';
	variable_array['not_an_alphabet_input_error_msg'] = 'First name should be only alphabets';
	variable_array['exceeding_max_length_input_error_msg'] = 'First name should be of max '+contact_us_first_name_max_length+' characters';
	variable_array['max_length'] = contact_us_first_name_max_length;
	return mandatory_only_alphabets_with_max_length_limitation(variable_array);
}

function check_contact_us_last_name() {
	var variable_array = {};
	variable_array['input_id'] = '#contact-us-last-name';
	variable_array['error_msg_div_id'] = '#contact-us-last-name-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter your last name';
	variable_array['not_an_alphabet_input_error_msg'] = 'Last name should be only alphabets';
	variable_array['exceeding_max_length_input_error_msg'] = 'Last name should be of max '+contact_us_last_name_max_length+' characters';
	variable_array['max_length'] = contact_us_last_name_max_length;
	return mandatory_only_alphabets_with_max_length_limitation(variable_array);
}

function check_contact_us_email_id() {
	var variable_array = {};
	variable_array['input_id'] = '#contact-us-email-id';
	variable_array['error_msg_div_id'] = '#contact-us-email-id-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter your email id.';
	variable_array['not_an_email_input_error_msg'] = 'Please enter a valid email id.';
	return mandatory_email_id(variable_array);
}

function check_contact_us_phone_number() {
	var variable_array = {};
	variable_array['input_id'] = '#contact-us-phone-number';
	variable_array['error_msg_div_id'] = '#contact-us-phone-number-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter your phone number';
	variable_array['not_a_number_input_error_msg'] = 'Mobile number should be only numbers.'
	variable_array['exceeding_max_length_input_error_msg'] = 'Mobile number should be of '+contact_us_phone_number_max_length+' digits';
	variable_array['max_length'] = contact_us_phone_number_max_length;
	return mandatory_mobile_number_pin_code_with_max_length_limitation(variable_array);
}

function check_contact_us_message() {
	var variable_array = {};
	variable_array['input_id'] = '#contact-us-message';
	variable_array['error_msg_div_id'] = '#contact-us-message-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter the about us description';
	return mandatory_any_input_with_no_limitation(variable_array);
}

function submit_contact_us_submit() {
	var check_contact_us_first_name_var = check_contact_us_first_name(),
		check_contact_us_last_name_var = check_contact_us_last_name(),
		check_contact_us_email_id_var = check_contact_us_email_id(),
		check_contact_us_phone_number_var = check_contact_us_phone_number(),
		check_contact_us_message_var = check_contact_us_message();

	if (check_contact_us_first_name_var == 1 && check_contact_us_last_name_var == 1 && check_contact_us_email_id_var == 1
		&& check_contact_us_phone_number_var == 1 && check_contact_us_message_var == 1) {
		
		var contact_us_first_name = $('#contact-us-first-name').val(),
			contact_us_last_name = $('#contact-us-last-name').val(),
			contact_us_email_id = $('#contact-us-email-id').val(),
			contact_us_phone_number = $('#contact-us-phone-number').val(),
			contact_us_message = $('#contact-us-message').val();

		$('#contact-us-submit-btn').prop('disabled',true);
		$('#contact-us-error-msg-div').html('<span class="d-block text-warning error-msg text-center">Please wait while we are generating your enquiry request.</span>');

		var formdata = new FormData();
		formdata.append('verify_user_request',1);
		formdata.append('contact_us_first_name',contact_us_first_name);
		formdata.append('contact_us_last_name',contact_us_last_name);
		formdata.append('contact_us_email_id',contact_us_email_id);
		formdata.append('contact_us_phone_number',contact_us_phone_number);
		formdata.append('contact_us_message',contact_us_message);

		$.ajax({
			type: "POST",
		  	url: base_url+"user/add-contact-us-enquiry",
		  	data:formdata,
		  	dataType: 'json',
		    contentType: false,
		    processData: false,
		  	success: function(data) {
		  		if (data.status == 1) {
			  		$('#contact-us-submit-btn').prop('disabled',false);
					$('#contact-us-error-msg-div').html('');
				  	if (data.user_enquiry.status == '1') {
				  		$('#contact-us-first-name').val('')
						$('#contact-us-last-name').val('');
						$('#contact-us-email-id').val('');
						$('#contact-us-phone-number').val('');
						$('#contact-us-message').val('');
						$('#ContactForm').modal('hide');
						
				  		toastr.success('Your enquiry has been generated successfully.');
						
				  	} else {
				  		toastr.error('Something went wrong while generating your enquiry. Please try again.');
			  		}
			  	} else {
			  		toastr.error('Something went wrong while generating your enquiry. Please try again.');
			  	}
		  	},
		  	error: function(data) {
		  		$('#contact-us-submit-btn').prop('disabled',false);
				$('#contact-us-error-msg-div').html('');
		  		toastr.error('Something went wrong while generating your enquiry. Please try again.');
		  	}
		});
	}
}