$('#save_payment_details').on('click', function() {
	update_payment_gateway_modal();
});

get_payment_details();
function get_payment_details() {
	$.ajax({
		type: "POST",
        url: base_url+"admin/get-payment-details",
        dataType: "json",
        data : {
        	verify_admin_request : 1
        },
        success: function(data) {
            $('#payment-api-key').val(data.payment_details.api_key);
            $('#payment-aut-token').val(data.payment_details.api_token);
            $('#payment-aut-key').val(data.payment_details.api_authentication_key);
        }
	});
}

$('#payment-api-key').on('keyup blur', function() {
	check_payment_api_key();
});

function check_payment_api_key() {
	var variable_array = {};
	variable_array['input_id'] = '#payment-api-key';
	variable_array['error_msg_div_id'] = '#payment-api-key-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter the API key';
	return mandatory_any_input_with_no_limitation(variable_array);
}

function update_payment_gateway_modal() {
	$('#admin-password-error-msg-div').html('');
	$('#admin_password').val('');
	var check_payment_api_key_var = check_payment_api_key();
	if (check_payment_api_key_var == '1') {
		$('#verify_admin_btn').attr("onclick","payment_gateway_update()");
		$('#ask-admin-password-modal').modal('show');
	}
}

function payment_gateway_update() {
	var admin_password = $('#admin_password').val(),
		payment_api_key = $('#payment-api-key').val(),
		payment_aut_token = $('#payment-aut-token').val(),
		payment_aut_key = $('#payment-aut-key').val();

	if (admin_password != '') {
		$('#verify-admin-error-msg-div').html('');
		var variable_array = {};
			variable_array['ajax_call_url'] = 'admin/update-payment-gateway-details';
			variable_array['ajax_pass_data'] = { verify_admin_request : 1, admin_password : admin_password, payment_api_key : payment_api_key, payment_aut_token : payment_aut_token, payment_aut_key : payment_aut_key};
			variable_array['success_message'] = 'Paymet details has been updated successfully.';
			variable_array['error_message'] = 'OOPS! Something went wrong while updating the payment details. Please try again';
			variable_array['incorrect_admin_password_error_message'] = 'Entered Admin Password in incorrect. Please enter the correct password.';
			variable_array['admin_error_msg_div_id'] = '#admin-password-error-msg-div';
			variable_array['close_modal_id'] = '#ask-admin-password-modal';
			variable_array['call_back_url'] = 'get_payment_details()';
		update_with_verifying_admin(variable_array);
	} else {
		$('#verify-admin-error-msg-div').html('<span class="text-danger error-msg-small">Please enter your password.</span>');
	}
}