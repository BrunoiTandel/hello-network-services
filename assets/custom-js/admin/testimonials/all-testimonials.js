var client_name_max_length = 70,
	company_name_max_length = 100,
	client_role_max_length = 50,
	max_textimonial_review_length= 100,
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

get_all_testimonials();
function get_all_testimonials() {
	$.ajax({
        type  : 'POST',
        url   : base_url+'admin/get-all-testimonials',
        data : {
        	verify_admin_request : '1'
        },
        dataType : 'json',
        success : function(data) {
	        if (data.status == '1') {
	         	if (data.all_testimonials.length > 0) {
	         		var html = '';
	         		for (var i = 0; i < data.all_testimonials.length; i++) {
	         			var check ='';
				        if (data.all_testimonials[i].testimonial_status == '1') {
				        	check ='checked';
				        } else {
				            check ='';
				       	}

				       	html += '<div class="col-md-4 mt-3" id="single-testimonial-main-div-'+data.all_testimonials[i].testimonial_id+'">';
                  		html += '<div class="latest-item">';
                    	html += '<div class="row pt-3">';
                    	html += '<div class="col-md-6"><div class="px-2 testimonial-client-name" id="single-client-name-div-'+data.all_testimonials[i].testimonial_id+'">'+data.all_testimonials[i].client_name+'</div></div>';
                    	html += '<div class="col-md-6"><div class="px-2 testimonial-client-role-comp-name" id="single-client-desig-company-name-div-'+data.all_testimonials[i].testimonial_id+'">'+data.all_testimonials[i].client_role+','+data.all_testimonials[i].client_company_name+'</div></div>';
                    	html += '<div class="col-md-12"><div class="px-2 testimonial-client-review" id="single-client-review-div-'+data.all_testimonials[i].testimonial_id+'">'+data.all_testimonials[i].client_review.slice(0,max_textimonial_review_length)+'</div></div>';
                    	html += '</div>';
                    	html += '<div class="row pb-3 mt-3">';
                      	html += '<div class="col-md-5"></div>';
                      	html += '<div class="col-md-3 product-category-edit-delete">';
                        html += '<div class="custom-control custom-switch pl-0">';
                        html += '<input type="checkbox" '+check+' onclick="change_testimonial_status('+data.all_testimonials[i].testimonial_id+','+data.all_testimonials[i].testimonial_status+')" class="custom-control-input" id="change_testimonial_status_'+data.all_testimonials[i].testimonial_id+'">';
                        html += '<label class="custom-control-label" for="change_testimonial_status_'+data.all_testimonials[i].testimonial_id+'"></label>';
                        html += '</div></div>';
                      	html += '<div class="col-md-2 product-category-edit-delete">';
                        html += '<a class="product-category-delete-a" id="view_testimonial_'+data.all_testimonials[i].testimonial_id+'" onclick="view_testimonial_modal('+data.all_testimonials[i].testimonial_id+')"><i class="fa fa-eye edit-a ml-0"></i></a>';
                      	html += '</div>';
                      	html += '<div class="col-md-2 product-category-edit-delete">';
                        html += '<a class="product-category-delete-a" id="delete_testimonial_'+data.all_testimonials[i].testimonial_id+'" onclick="delete_testimonial_modal('+data.all_testimonials[i].testimonial_id+')"><i class="fa fa-trash edit-a text-danger ml-0"></i></a>';
                      	html += '</div>';
                    	html += '</div>';
                  		html += '</div>';
                		html += '</div>';
	         		}
	         	} else {
	         		html = '<div class="col-md-12 text-center">No testimonial Available.</div>';
	         	}
	         	$('#testimonial-list-div').html(html);
	        } else {
	        	check_admin_login();
	        }
	    }
    });
}

function change_testimonial_status(testimonial_id,testimonial_status) {
	var changed_testimonial_status = 0;

	if (testimonial_status == 1) {
		changed_testimonial_status = 0;
	} else if (testimonial_status == 0) {
		changed_testimonial_status = 1;
	} else {
		get_all_testimonials();
		toastr.error('OOPS! Something went wrong. Please try again.')
		return false;
	}

	var variable_array = {};
	variable_array['id'] = testimonial_id;
	variable_array['actual_status'] = testimonial_status;
	variable_array['changed_status'] = changed_testimonial_status;
	variable_array['ajax_call_url'] = 'admin/change-testimonial-status';
	variable_array['checkbox_id'] = '#change_testimonial_status_'+testimonial_id;
	variable_array['onclick_method_name'] = 'change_testimonial_status';
	variable_array['success_message'] = 'Testimonial status has been updated successfully.';
	variable_array['error_message'] = 'Something went wrong updating the testimonial status. Please try again.';
	variable_array['error_callback_function'] = 'get_all_testimonials()';
	variable_array['ajax_pass_data'] = {verify_admin_request : 1, id : testimonial_id, changed_status : changed_testimonial_status};

	return change_status(variable_array);
}

function view_testimonial_modal(testimonial_id) {
	$.ajax({
        type  : 'POST',
        url   : base_url+'admin/get-testimonial-details',
        data : {
        	verify_admin_request : '1',
        	testimonial_id : testimonial_id
        },
        dataType : 'json',
        success : function(data) {
	        if (data.status == '1') {
		      	$('#client-name').val(data.testimonial_detials.client_name);
		      	$('#company-name').val(data.testimonial_detials.client_company_name);
		      	$('#client-role').val(data.testimonial_detials.client_role);
		      	$('#client-review').val(data.testimonial_detials.client_review);
		      	$('#client-services').val(data.testimonial_detials.client_selected_service);
		      	
		      	var client_image_html = '';
	      		client_image_html += '<div class="col-md-8 mt-3" id="client-image-div">';
                client_image_html += '<div class="product-category-description bg-light-gray">';
                client_image_html += '<ul>';
                client_image_html += '<li class="product-category-name">'+data.testimonial_detials.client_image_or_logo+'</li>';
                client_image_html += '<li class="product-category-edit-delete only-view-li">';
                client_image_html += '<a class="product-category-delete-a" id="view_testimonial_client_image" onclick="view_testimonial_client_image_modal()" data-image="'+data.testimonial_detials.client_image_or_logo+'"><i class="fa fa-eye edit-a"></i></a>';
                client_image_html += '</li>';
                client_image_html += '</ul>';
                client_image_html += '</div>';
                client_image_html += '</div>';
		      	$('#client-image-or-logo-div').html(client_image_html);

		      	$('#update-testimonial-btn').attr('onclick','update_testimonial('+testimonial_id+')');

	         	$('#view-testimonial-details-modal').modal('show');
	        } else {
	        	check_admin_login();
	        }
	    }
    });
}

function view_testimonial_client_image_modal() {
	$('#testimonial-image-modal-img').attr('src',img_base_url+'assets/uploads/testimonial-client-image/'+$('#view_testimonial_client_image').attr('data-image'));
	$('#view-testimonial-image-modal').modal('show');
}

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
	variable_array['bg_color_class'] = 'bg-light-gray';
	variable_array['file_ui_id'] = 'file_client_image_or_logo';
	variable_array['file_size'] = max_img_size;
	variable_array['empty_input_error_msg'] = '';
	variable_array['exceeding_max_length_error_msg'] = 'Client image should be of max 1MB';
	return single_file_upload_for_only_image(variable_array);
}

function update_testimonial(testimonial_id) {
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
		&& check_client_review_var == 1 && check_client_services_var == 1) {
		$('#update-testimonial-btn').removeAttr('onclick');
		$('#update-testimonial-btn').prop('disabled',true);
		$('#testimonial-error-div').html('<span class="d-block text-warning error-msg text-center">Please wait while we are updating the testimonial.</span>');

		var formdata = new FormData();
		formdata.append('verify_admin_request',1);
		formdata.append('testimonial_id',testimonial_id);
		formdata.append('client_name',client_name);
		formdata.append('company_name',company_name);
		formdata.append('client_role',client_role);
		formdata.append('client_review', client_review);
		formdata.append('client_services', client_services);
		if (client_image_or_logo != undefined) {
			formdata.append('client_image_or_logo', client_image_or_logo);
		}

		$.ajax({
			type: "POST",
		  	url: base_url+"admin/update-testimonial",
		  	data:formdata,
		  	dataType: 'json',
		    contentType: false,
		    processData: false,
		  	success: function(data) {
		  		if (data.status == 1) {
			  		$('#update-testimonial-btn').prop('disabled',false);
					$('#testimonial-error-div').html('');
				  	if (data.update_testimonial.status == '1') {
				  		toastr.success('Testimonial has been updated successfully.');
				  		$('#single-client-name-div-'+testimonial_id).html(client_name);
				  		$('#single-client-desig-company-name-div-'+testimonial_id).html(client_role+','+company_name);
				  		$('#single-client-review-div-'+testimonial_id).html(client_review.slice(0,max_textimonial_review_length));

						$("#client-image-or-logo").val('');
						
						$('#client-image-or-logo-div').html('');

						client_logo_or_image_array = [];

						$('#view-testimonial-details-modal').modal('hide');
				  	} else {
				  		$('#update-testimonial-btn').attr('onclick','update_testimonial('+testimonial_id+')');
				  		toastr.error('Something went wrong while updating the testimonial. Please try again.');
			  		}
			  	} else {
			  		check_admin_login();
			  	}
		  	},
		  	error: function(data) {
		  		$('#update-testimonial-btn').attr('onclick','update_testimonial('+testimonial_id+')');
		  		$('#update-testimonial-btn').prop('disabled',false);
				$('#testimonial-error-div').html('');
		  		toastr.error('Something went wrong while updating the testimonial. Please try again.');
		  	}
		});
	}
}

function delete_testimonial_modal(testimonial_id) {
	$('#delete-testimonial-btn').attr('onclick','delete_testimonial('+testimonial_id+')');
	$('#delete-testimonial-modal').modal('show');
}

function delete_testimonial(testimonial_id) {
	var variable_array = {};
	variable_array['id'] = testimonial_id;
	variable_array['ajax_call_url'] = 'admin/delete-testimonial';
	variable_array['onclick_method_name'] = 'delete_testimonial';
	variable_array['success_message'] = 'Testimonial has been deleted successfully.';
	variable_array['error_message'] = 'Something went wrong deleting the testimonial. Please try again.';
	variable_array['modal_id'] = '#delete-testimonial-modal';
	variable_array['delete_image_div_id'] = '#single-testimonial-main-div-'+testimonial_id;
	variable_array['delete_btn_id'] = '#delete-testimonial-btn';
	variable_array['ajax_pass_data'] = {verify_admin_request : 1, testimonial_id : testimonial_id};
	return delete_uploaded_image(variable_array);
}