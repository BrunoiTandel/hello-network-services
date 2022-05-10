var header_caption_max_length = 200,
	header_sub_heading_max_length = 200,
	video_thumbnail_text_max_length = 30,
	we_enable_description_max_length = 50,
	max_img_size = 10000000,
	max_video_size = 200000000,
	banner_image_array = [],
	banner_video_array = [],
	we_enable_description_array = [],
	we_enable_description_counter = 0;

$('#header-caption').on('keyup blur', function() {
	check_header_caption();
});

$('#header-sub-heading').on('keyup blur', function() {
	check_header_sub_heading();
});

$('#video-thumbnail-text').on('keyup blur', function() {
	check_video_thumbnail_text();
});

$("#banner-image").on("change", handle_file_select_banner_image);

$("#banner-video").on("change", handle_file_select_banner_video);

$('#we-enable-description').on('keyup blur', function() {
	check_we_enable_description();
});

$('#add-we-enable-description-btn').on('click', function() {
	add_we_enable_description();
});

$('#update-home-page-content-btn').on('click', function() {
	update_home_page_content();
});

$('#edit-we-enable-description').on('keyup blur', function() {
	check_edit_we_enable_description();
});

get_home_page_content();
function get_home_page_content() {
	$.ajax({
        type  : 'POST',
        url   : base_url+'admin/get-home-page-details',
        data : {
        	verify_admin_request : '1'
        },
        dataType : 'json',
        success : function(data) {
	        if (data.status == '1') {
	         	$('#header-caption').val(data.home_page_details.home_page_header_caption);
	         	$('#header-sub-heading').val(data.home_page_details.home_page_header_sub_heading);
	         	$('#video-thumbnail-text').val(data.home_page_details.home_page_video_thumbnail_text);

	         	var html = '';
	         	html += '<div class="col-md-10 mt-3">';
                html += '<div class="product-category-description">';
                html += '<ul>';
                html += '<li class="product-category-name product-category-name-li-2" id="banner-image-name-li-1">'+data.home_page_details.home_page_banner_image+'</li>';
                html += '<li class="product-category-edit-delete">';
                html += '<a class="product-category-delete-a" id="view_banner_image" onclick="view_banner_image_modal()" data-image_name="'+data.home_page_details.home_page_banner_image+'"><i class="fa fa-eye edit-a"></i></a>';
                html += '</li>';
                html += '</ul>';
                html += '</div>';
                html += '</div>';
	         	$('#selected-banner-image-div').html(html);

	         	var html = '';
	         	html += '<div class="col-md-10 mt-3">';
                html += '<div class="product-category-description">';
                html += '<ul>';
                html += '<li class="product-category-name product-category-name-li-2" id="banner-video-name-li-1">'+data.home_page_details.home_page_banner_video+'</li>';
                html += '<li class="product-category-edit-delete">';
                html += '<a class="product-category-delete-a" id="view_banner_video" onclick="view_banner_video_modal()" data-video_name="'+data.home_page_details.home_page_banner_video+'"><i class="fa fa-eye edit-a"></i></a>';
                html += '</li>';
                html += '</ul>';
                html += '</div>';
                html += '</div>';
	         	$('#selected-banner-video-div').html(html);

	         	if (data.we_enable_description_list.length > 0) {
	         		var html = '';
	         		for (var i = 0; i < data.we_enable_description_list.length; i++) {
	         			var check ='';
				        if (data.we_enable_description_list[i].home_page_we_enable_description_status == '1') {
				        	check ='checked';
				        } else {
				            check ='';
				       	}

		        		html += '<div class="col-md-12 mt-3" id="we-enable-description-div-'+data.we_enable_description_list[i].home_page_we_enable_description_id+'">';
		                html += '<div class="product-category-description">';
		                html += '<ul>';
		                html += '<li class="product-category-name" id="we-enable-description-li-'+data.we_enable_description_list[i].home_page_we_enable_description_id+'">'+data.we_enable_description_list[i].home_page_we_enable_description+'</li>';
		                html += '<li class="product-category-edit-delete">';
		                html += '<div class="custom-control custom-switch pl-0">';
					    html += '<input type="checkbox" '+check+' onclick="change_we_enable_description_status('+data.we_enable_description_list[i].home_page_we_enable_description_id+','+data.we_enable_description_list[i].home_page_we_enable_description_status+')" class="custom-control-input" id="change_we_enable_description_status_'+data.we_enable_description_list[i].home_page_we_enable_description_id+'">';
					    html += '<label class="custom-control-label" for="change_we_enable_description_status_'+data.we_enable_description_list[i].home_page_we_enable_description_id+'"></label>';
					    html += '</div>';
		                html += '</li>';
		                html += '<li class="product-category-edit-delete">';
		                html += '<a class="product-category-delete-a" id="view_we_enable_description_'+data.we_enable_description_list[i].home_page_we_enable_description_id+'" onclick="view_we_enable_description_modal('+data.we_enable_description_list[i].home_page_we_enable_description_id+')"><i class="fa fa-eye edit-a"></i></a>';
		                html += '</li>';
		                html += '<li class="product-category-edit-delete">';
		                html += '<a class="product-category-delete-a" id="delete_we_enable_description_'+data.we_enable_description_list[i].home_page_we_enable_description_id+'" onclick="delete_we_enable_description_modal('+data.we_enable_description_list[i].home_page_we_enable_description_id+')" data-description="'+data.we_enable_description_list[i].home_page_we_enable_description+'"><i class="fa fa-trash edit-a text-danger"></i></a>';
		                html += '</li>';
		                html += '</ul>';
		                html += '</div>';
		                html += '</div>';
	         		}
	         		$('#added-we-enable-description').html(html);
	         	}
	        } else {
	        	check_admin_login();
	        }
	    }
    });
}

function check_header_caption() {
	var variable_array = {};
	variable_array['input_id'] = '#header-caption';
	variable_array['error_msg_div_id'] = '#header-caption-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter the header caption';
	variable_array['max_length'] = header_caption_max_length;
	variable_array['exceeding_max_length_error_msg'] = 'Header caption should be of max '+header_caption_max_length+' characters';
	return mandatory_any_input_with_max_length_validation(variable_array);
}

function check_header_sub_heading() {
	var variable_array = {};
	variable_array['input_id'] = '#header-sub-heading';
	variable_array['error_msg_div_id'] = '#header-sub-heading-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter the header sub heading';
	variable_array['max_length'] = header_sub_heading_max_length;
	variable_array['exceeding_max_length_error_msg'] = 'Header sub heading should be of max '+header_sub_heading_max_length+' characters';
	return mandatory_any_input_with_max_length_validation(variable_array);
}

function check_video_thumbnail_text() {
	var variable_array = {};
	variable_array['input_id'] = '#video-thumbnail-text';
	variable_array['error_msg_div_id'] = '#video-thumbnail-text-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter the video thumbnail text';
	variable_array['max_length'] = video_thumbnail_text_max_length;
	variable_array['exceeding_max_length_error_msg'] = 'Video thumbnail text should be of max '+video_thumbnail_text_max_length+' characters';
	return mandatory_any_input_with_max_length_validation(variable_array);
}

function handle_file_select_banner_image(e) {
	banner_image_array = [];
	var variable_array = {};
	variable_array['e'] = e;
	variable_array['file_id'] = '#banner-image';
	variable_array['show_image_name_msg_div_id'] = '#selected-banner-image-div';
	variable_array['storedFiles_array'] = banner_image_array;
	variable_array['col_type'] = 'col-md-10';
	variable_array['file_ui_id'] = 'file_new_banner_image';
	variable_array['file_size'] = max_img_size;
	variable_array['empty_input_error_msg'] = '';
	variable_array['exceeding_max_length_error_msg'] = 'Banner Image should be of max 1MB';
	return single_file_upload_for_only_image(variable_array);
}

function handle_file_select_banner_video(e) {
	banner_video_array = [];
	var variable_array = {};
	variable_array['e'] = e;
	variable_array['file_id'] = '#banner-video';
	variable_array['show_image_name_msg_div_id'] = '#selected-banner-video-div';
	variable_array['storedFiles_array'] = banner_video_array;
	variable_array['col_type'] = 'col-md-10';
	variable_array['file_ui_id'] = 'file_new_banner_video';
	variable_array['file_size'] = max_video_size;
	variable_array['empty_input_error_msg'] = '';
	variable_array['exceeding_max_length_error_msg'] = 'Banner video should be of max 20MB';
	return single_file_upload_for_only_video(variable_array);
}

function check_we_enable_description() {
	var variable_array = {};
	variable_array['input_id'] = '#we-enable-description';
	variable_array['error_msg_div_id'] = '#we-enable-description-error-msg-div';
	variable_array['exceeding_max_length_input_error_msg'] = 'We enable description should be of max '+we_enable_description_max_length+' characters';
	variable_array['max_length'] = we_enable_description_max_length;
	return not_mandatory_any_input_with_max_length_limitation(variable_array);
}

function add_we_enable_description() {
	var we_enable_description = $('#we-enable-description').val();

	if(we_enable_description != '') {
		var html = '<div class="col-md-12 mt-3" id="we-enable-description-div-'+we_enable_description_counter+'">';
        html += '<div class="product-category-description">';
        html += '<ul>';
        html += '<li class="product-category-name product-category-name-li-2" id="we-enable-description-li-'+we_enable_description_counter+'">'+we_enable_description+'</li>';
        html += '<li class="product-category-edit-delete">';
        html += '<a class="product-category-delete-a" id="remove_new_we_enable_description_'+we_enable_description_counter+'" onclick="remove_new_we_enable_description('+we_enable_description_counter+')"><i class="fa fa-trash edit-a text-danger"></i></a>';
        html += '</li>';
        html += '</ul>';
        html += '</div>';
        html += '</div>';

		$('#new-we-enable-description').prepend(html);
		we_enable_description_array.push({'we_enable_description' : we_enable_description,'id' : we_enable_description_counter});
		we_enable_description_counter++;
		$('#we-enable-description').val('');
	} else {
		$('#we-enable-description-error-msg-div').html('<span class="text-danger error-msg-small">Please enter the we enable description.</span>');
	}
}

function remove_new_we_enable_description(we_enable_description_counter) {
	var updated_we_enable_description_array = [];
	if (we_enable_description_array.length > 0) {
		for (var i = 0; i < we_enable_description_array.length; i++) {
			if (we_enable_description_counter != we_enable_description_array[i].id) {
				updated_we_enable_description_array.push(we_enable_description_array[i]);
			}
		}

		we_enable_description_array = updated_we_enable_description_array;
	}

	$('#we-enable-description-div-'+we_enable_description_counter).remove();
}

function update_home_page_content() {
	var header_caption = $('#header-caption').val(),
		header_sub_heading = $('#header-sub-heading').val(),
		video_thumbnail_text = $('#video-thumbnail-text').val(),
		banner_image = $("#banner-image")[0].files[0],
		banner_video = $("#banner-video")[0].files[0];

	var check_header_caption_var = check_header_caption(),
		check_header_sub_heading_var = check_header_sub_heading(),
		check_video_thumbnail_text_var = check_video_thumbnail_text();

	if (check_header_caption_var == 1 && check_header_sub_heading_var == 1 && check_video_thumbnail_text_var == 1) {
		$('#update-home-page-content-btn').prop('disabled',true);
		$('#edit-product-category-error-div').html('<span class="d-block text-warning error-msg text-center">Please wait while we are updating the home page details.</span>');

		var formdata = new FormData();
		formdata.append('verify_admin_request',1);
		formdata.append('header_caption',header_caption);
		formdata.append('header_sub_heading',header_sub_heading);
		formdata.append('video_thumbnail_text',video_thumbnail_text);
		if (banner_image != undefined && banner_image != 'undefined') {
			formdata.append('banner_image', banner_image);
		}

		if (banner_video != undefined && banner_video != 'undefined') {
			formdata.append('banner_video', banner_video);
		}
		
		we_enable_description = [];

		if (we_enable_description_array.length > 0) {
			for (var i = 0; i < we_enable_description_array.length; i++) {
				we_enable_description.push(we_enable_description_array[i].we_enable_description);
			}
		} else {
			we_enable_description = '';
		}
		
		formdata.append('we_enable_description', we_enable_description);

		$.ajax({
			type: "POST",
		  	url: base_url+"admin/update-home-page-content",
		  	data:formdata,
		  	dataType: 'json',
		    contentType: false,
		    processData: false,
		  	success: function(data) {
		  		if (data.status == 1) {
			  		$('#update-home-page-content-btn').prop('disabled',false);
					$('#edit-product-category-error-div').html('');
				  	if (data.home_page_details.status == '1') {
				  		toastr.success('Home page details has been updated successfully.');
						$('#new-we-enable-description').html('');
						
						banner_image_array = [];
						banner_video_array = [];
						we_enable_description_array = [];

						get_home_page_content();
				  	} else {
				  		toastr.error('Something went wrong while updating the home page details. Please try again.');
			  		}
			  	} else {
			  		check_admin_login();
			  	}
		  	},
		  	error: function(data) {
		  		$('#update-home-page-content-btn').prop('disabled',false);
				$('#edit-product-category-error-div').html('');
		  		toastr.error('Something went wrong while updating the home page details. Please try again.');
		  	}
		});
	}
}

function change_we_enable_description_status(home_page_we_enable_description_id,home_page_we_enable_description_status) {
	var changed_we_enable_description_status = 0;

	if (home_page_we_enable_description_status == 1) {
		changed_we_enable_description_status = 0;
	} else if (home_page_we_enable_description_status == 0) {
		changed_we_enable_description_status = 1;
	} else {
		get_home_page_content();
		toastr.error('OOPS! Something went wrong. Please try again.')
		return false;
	}

	var variable_array = {};
	variable_array['id'] = home_page_we_enable_description_id;
	variable_array['actual_status'] = home_page_we_enable_description_status;
	variable_array['changed_status'] = changed_we_enable_description_status;
	variable_array['ajax_call_url'] = 'admin/change-we-enabled-description-status';
	variable_array['checkbox_id'] = '#change_we_enable_description_status_'+home_page_we_enable_description_id;
	variable_array['onclick_method_name'] = 'change_we_enable_description_status';
	variable_array['success_message'] = 'We enabled description status status has been updated successfully.';
	variable_array['error_message'] = 'Something went wrong updating the we enabled description status. Please try again.';
	variable_array['error_callback_function'] = 'get_home_page_content()';
	variable_array['ajax_pass_data'] = {verify_admin_request : 1, id : home_page_we_enable_description_id, changed_status : changed_we_enable_description_status};

	return change_status(variable_array);
}

function view_we_enable_description_modal(home_page_we_enable_description_id) {
	$.ajax({
        type  : 'POST',
        url   : base_url+'admin/get-single-we-enable-description',
        data : {
        	verify_admin_request : '1',
        	home_page_we_enable_description_id : home_page_we_enable_description_id
        },
        dataType : 'json',
        success : function(data) {
	        if (data.status == '1') {
	         	$('#edit-we-enable-description').val(data.we_enable_description.home_page_we_enable_description);
	         	$('#update-edit-we-enable-description-btn').attr('onclick','update_we_enable_description('+home_page_we_enable_description_id+')');
	         	$('#view-we-enabled-description-modal').modal('show');
	        } else {
	        	check_admin_login();
	        }
	    }
    });
}

function check_edit_we_enable_description() {
	var variable_array = {};
	variable_array['input_id'] = '#edit-we-enable-description';
	variable_array['error_msg_div_id'] = '#edit-we-enable-description-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter the We Enable Description';
	variable_array['exceeding_max_length_input_error_msg'] = 'We enable description should be of max '+we_enable_description_max_length+' characters';
	variable_array['max_length'] = we_enable_description_max_length;
	return mandatory_any_input_with_max_length_limitation(variable_array);
}

function update_we_enable_description(home_page_we_enable_description_id) {
	var check_edit_we_enable_description_var = check_edit_we_enable_description();
	if (check_edit_we_enable_description_var == 1) {
		var we_enable_description = $('#edit-we-enable-description').val();
		$('#update-edit-we-enable-description-btn').removeAttr('onclick');
		$('#update-edit-we-enable-description-btn').prop('disabled',true);
		$('#edit-we-enable-description-main-error-msg-div').html('<span class="d-block text-warning error-msg text-center">Please wait while we are updating the We enabled Description.</span>');

		var formdata = new FormData();
		formdata.append('verify_admin_request',1);
		formdata.append('home_page_we_enable_description_id',home_page_we_enable_description_id);
		formdata.append('we_enable_description',we_enable_description);

		$.ajax({
			type: "POST",
		  	url: base_url+"admin/update-we-enable-description",
		  	data:formdata,
		  	dataType: 'json',
		    contentType: false,
		    processData: false,
		  	success: function(data) {
		  		$('#update-edit-we-enable-description-btn').prop('disabled',false);
				$('#edit-we-enable-description-main-error-msg-div').html('');
		  		if (data.status == 1) {
				  	if (data.update_we_enable_description.status == '1') {
				  		$('#we-enable-description-li-'+home_page_we_enable_description_id).html(we_enable_description);
				  		toastr.success('We enabled description has been updated successfully.');

						$('#view-we-enabled-description-modal').modal('hide');
				  	} else {
				  		$('#update-edit-we-enable-description-btn').attr('onclick','update_we_enable_description('+home_page_we_enable_description_id+')');
				  		toastr.error('Something went wrong while updating the we enabled description. Please try again.');
			  		}
			  	} else {
			  		check_admin_login();
			  	}
		  	},
		  	error: function(data) {
		  		$('#update-edit-we-enable-description-btn').attr('onclick','update_we_enable_description('+home_page_we_enable_description_id+')');
		  		$('#update-edit-we-enable-description-btn').prop('disabled',false);
				$('#edit-we-enable-description-main-error-msg-div').html('');
		  		toastr.error('Something went wrong while updating the we enabled description. Please try again.');
		  	}
		});
	}
}

function view_banner_image_modal() {
	$('#banner-image-or-model-hdr-span').html('Image');
	$('#banner-image-or-video-modal-div').html('<img class="w-100" src='+img_base_url+'assets/uploads/home-page-banner-image/'+$('#view_banner_image').attr('data-image_name')+'>');
	$('#view-banner-image-or-video-modal').modal('show');
}

function view_banner_video_modal() {
	$('#banner-image-or-model-hdr-span').html('Video');
	$('#banner-image-or-video-modal-div').html('<video class="w-100" controls><source src='+img_base_url+'assets/uploads/home-page-banner-video/'+$('#view_banner_video').attr('data-video_name')+' type="video/mp4"></video>');
	$('#view-banner-image-or-video-modal').modal('show');
}

function delete_we_enable_description_modal(home_page_we_enable_description_id) {
	$('#delete-we-enabled-description-hdr-span').html($('#delete_we_enable_description_'+home_page_we_enable_description_id).attr('data-description'));
	$('#delete-we-enabled-description-btn').attr('onclick','delete_we_enable_description('+home_page_we_enable_description_id+')');
	$('#delete-we-enabled-description-modal').modal('show');
}

function delete_we_enable_description(home_page_we_enable_description_id) {
	var variable_array = {};
	variable_array['id'] = home_page_we_enable_description_id;
	variable_array['ajax_call_url'] = 'admin/delete-we-enable-description';
	variable_array['onclick_method_name'] = 'delete_we_enable_description';
	variable_array['success_message'] = 'We enable description has been deleted successfully.';
	variable_array['error_message'] = 'Something went wrong deleting the we enable description. Please try again.';
	variable_array['modal_id'] = '#delete-we-enabled-description-modal';
	variable_array['delete_image_div_id'] = '#we-enable-description-div-'+home_page_we_enable_description_id;
	variable_array['delete_btn_id'] = '#delete-we-enabled-description-btn';
	variable_array['ajax_pass_data'] = {verify_admin_request : 1, home_page_we_enable_description_id : home_page_we_enable_description_id};
	return delete_uploaded_image(variable_array);
}