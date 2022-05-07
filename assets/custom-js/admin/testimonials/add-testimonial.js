var client_name_max_length = 70,
	company_name_max_length = 100,
	client_role_max_length = 50,
	max_img_size = 10000000,
	client_logo_or_image_array = [];

$('#client-name').on('keyup blur', function() {
	check_client_name();
});

$('#company-name').on('keyup blur', function() {
	check_company_name();
});

$('#client-role').on('keyup blur', function() {
	check_client_role();
});

$('#client-review').on('keyup blur', function() {
	check_client_review();
});

$('#client-services').on('keyup blur', function() {
	check_client_services();
});

$("#client-image-or-logo").on("change", handle_file_select_client_image_or_logo);

$('#add-testimonial-btn').on('click', function() {
	add_testimonial();	
});

function check_client_name() {
	var variable_array = {};
	variable_array['input_id'] = '#client-name';
	variable_array['error_msg_div_id'] = '#client-name-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter the client name';
	variable_array['max_length'] = client_name_max_length;
	variable_array['exceeding_max_length_input_error_msg'] = 'Client name should be of max '+client_name_max_length+' characters';
	return mandatory_any_input_with_max_length_limitation(variable_array);
}

function check_company_name() {
	var variable_array = {};
	variable_array['input_id'] = '#company-name';
	variable_array['error_msg_div_id'] = '#company-name-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter the company name';
	variable_array['max_length'] = company_name_max_length;
	variable_array['exceeding_max_length_input_error_msg'] = 'Company name should be of max '+company_name_max_length+' characters';
	return mandatory_any_input_with_max_length_limitation(variable_array);
}

function check_client_role() {
	var variable_array = {};
	variable_array['input_id'] = '#client-role';
	variable_array['error_msg_div_id'] = '#client-role-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter the client role';
	variable_array['max_length'] = client_role_max_length;
	variable_array['exceeding_max_length_input_error_msg'] = 'Client role should be of max '+client_role_max_length+' characters';
	return mandatory_any_input_with_max_length_limitation(variable_array);
}

function check_client_review() {
	var variable_array = {};
	variable_array['input_id'] = '#client-review';
	variable_array['error_msg_div_id'] = '#client-review-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter the client review';
	return mandatory_any_input_with_no_limitation(variable_array);	
}

function check_client_services() {
	var variable_array = {};
	variable_array['input_id'] = '#client-services';
	variable_array['error_msg_div_id'] = '#client-services-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter the client services';
	return mandatory_any_input_with_no_limitation(variable_array);	
}

function handle_file_select_client_image_or_logo(e) {
	client_logo_or_image_array = [];
	var variable_array = {};
	variable_array['e'] = e;
	variable_array['file_id'] = '#client-image-or-logo';
	variable_array['show_image_name_msg_div_id'] = '#client-image-or-logo-div';
	variable_array['storedFiles_array'] = client_logo_or_image_array;
	variable_array['col_type'] = 'col-md-10';
	variable_array['file_ui_id'] = 'file_client_image_or_logo';
	variable_array['file_size'] = max_img_size;
	variable_array['empty_input_error_msg'] = 'Please select an image';
	variable_array['exceeding_max_length_error_msg'] = 'Client image should be of max 1MB';
	return single_file_upload_for_only_image(variable_array);
}

function add_testimonial() {
	var client_name = $('#client-name').val(),
		company_name = $('#company-name').val(),
		client_role = $('#client-role').val(),
		client_review = $('#client-review').val(),
		client_services = $('#client-services').val(),
		client_image_or_logo = $("#client-image-or-logo")[0].files[0];

	var check_client_name_var = check_client_name(),
		check_company_name_var = check_company_name(),
		check_client_role_var = check_client_role(),
		check_client_review_var = check_client_review(),
		check_client_services_var = check_client_services();

	if (check_client_name_var == 1 && check_company_name_var == 1 && check_client_role_var == 1
		&& check_client_review_var == 1 && check_client_services_var == 1 && client_image_or_logo != undefined) {
		$('#add-testimonial-btn').prop('disabled',true);
		$('#testimonial-error-div').html('<span class="d-block text-warning error-msg text-center">Please wait while we are adding the testimonials.</span>');

		var formdata = new FormData();
		formdata.append('verify_admin_request',1);
		formdata.append('client_name',client_name);
		formdata.append('company_name',company_name);
		formdata.append('client_role',client_role);
		formdata.append('client_review', client_review);
		formdata.append('client_services', client_services);
		formdata.append('client_image_or_logo', client_image_or_logo);

		$.ajax({
			type: "POST",
		  	url: base_url+"admin/add-new-testimonial",
		  	data:formdata,
		  	dataType: 'json',
		    contentType: false,
		    processData: false,
		  	success: function(data) {
		  		if (data.status == 1) {
			  		$('#add-testimonial-btn').prop('disabled',false);
					$('#testimonial-error-div').html('');
				  	if (data.new_testimonial_details.status == '1') {
				  		toastr.success('New testimonial has been added successfully.');
						$('#client-name').val('');
						$('#company-name').val('');
						$('#client-role').val('');
						$('#client-review').val('');
						$('#client-services').val('');
						$("#client-image-or-logo").val('');
						
						$('#client-image-or-logo-div').html('');
						
						client_logo_or_image_array = [];
				  	} else {
				  		toastr.error('Something went wrong while adding the testimonial. Please try again.');
			  		}
			  	} else {
			  		check_admin_login();
			  	}
		  	},
		  	error: function(data) {
		  		$('#add-testimonial-btn').prop('disabled',false);
				$('#testimonial-error-div').html('');
		  		toastr.error('Something went wrong while adding the testimonial. Please try again.');
		  	}
		});
	} else {
		if (client_image_or_logo == undefined) {
			$('#client-image-or-logo-div').html('<span class="text-danger error-msg-small">Please select an image.</span>');
		}
	}
}