var header_caption_max_length = 50,
	header_sub_heading_max_length = 200,
	mission_description_max_length = 300,
	vision_description_max_length = 300,
	core_values_description_max_length = 300,
	max_img_size = 10000000,
	about_us_header_image_array = [];

get_about_us_details();
function get_about_us_details() {
	$.ajax({
        type  : 'POST',
        url   : base_url+'admin/get-about-us-details',
        data : {
        	verify_admin_request : '1'
        },
        dataType : 'json',
        success : function(data) {
	        if (data.status == '1') {
	         	$('#header-caption').val(data.about_us_details.about_us_header_caption);
	         	$('#header-sub-heading').val(data.about_us_details.about_us_header_sub_heading);
	         	
	         	var html = '<div class="col-md-10 mt-3" id="about-us-banner-image-name-div">';
                html += '<div class="product-category-description">';
                html += '<ul>';
                html += '<li class="product-category-name product-category-name-li-2" id="about-us-banner-image-name-li">'+data.about_us_details.about_us_banner_image+'</li>';
                html += '<li class="product-category-edit-delete">';
                html += '<a class="product-category-delete-a" id="view_about_us_banner_image" onclick="view_about_us_banner_image_modal()" data-banner_image_name="'+data.about_us_details.about_us_banner_image+'"><i class="fa fa-eye edit-a"></i></a>';
                html += '</li>';
                html += '</ul>';
                html += '</div>';
                html += '</div>';

                $('#selected-about-us-header-image-div').html(html);
	        } else {
	        	check_admin_login();
	        }
	    }
    });
}

$('#header-caption').on('keyup blur', function() {
	check_header_caption();
});

$('#header-sub-heading').on('keyup blur', function() {
	check_header_sub_heading();
});

$("#about-us-header-image").on("change", handle_file_select_about_us_header_image);

$('#update-about-us-content-btn').on('click', function() {
	update_about_us_content();
});

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

function handle_file_select_about_us_header_image(e) {
	about_us_header_image_array = [];
	var variable_array = {};
	variable_array['e'] = e;
	variable_array['file_id'] = '#about-us-header-image';
	variable_array['show_image_name_msg_div_id'] = '#selected-about-us-header-image-div';
	variable_array['storedFiles_array'] = about_us_header_image_array;
	variable_array['col_type'] = 'col-md-10';
	variable_array['file_ui_id'] = 'file_about_us_header_image';
	variable_array['file_size'] = max_img_size;
	variable_array['empty_input_error_msg'] = '';
	variable_array['exceeding_max_length_error_msg'] = 'Banner Image should be of max 1MB';
	return single_file_upload_for_only_image(variable_array);
}

function view_about_us_banner_image_modal() {
	$('#about-us-image-modal-img').attr('src',img_base_url+'assets/uploads/about-us-banner-image/'+$('#view_about_us_banner_image').attr('data-banner_image_name'));
	$('#view-about-us-image-modal').modal('show');
}

function update_about_us_content() {
	var header_caption = $('#header-caption').val(),
		header_sub_heading = $('#header-sub-heading').val(),
		about_us_header_image = $("#about-us-header-image")[0].files[0];

	var check_header_caption_var = check_header_caption(),
		check_header_sub_heading_var = check_header_sub_heading();

	if (check_header_caption_var == 1 && check_header_sub_heading_var == 1) {
		$('#update-about-us-content-btn').prop('disabled',true);
		$('#about-us-content-error-div').html('<span class="d-block text-warning error-msg text-center">Please wait while we are updating the client logo.</span>');

		var formdata = new FormData();
		formdata.append('verify_admin_request',1);
		formdata.append('header_caption',header_caption);
		formdata.append('header_sub_heading',header_sub_heading);
		if (about_us_header_image != '' && about_us_header_image != undefined) {
			formdata.append('about_us_header_image', about_us_header_image);
		}

		$.ajax({
			type: "POST",
		  	url: base_url+"admin/update-about-us-details",
		  	data:formdata,
		  	dataType: 'json',
		    contentType: false,
		    processData: false,
		  	success: function(data) {
		  		if (data.status == 1) {
			  		$('#update-about-us-content-btn').prop('disabled',false);
					$('#about-us-content-error-div').html('');
				  	if (data.about_us_details.status == '1') {
				  		toastr.success('About Us details has been updated successfully.');
						about_us_header_image_array = [];
						$('#about-us-header-image').val('');

						get_about_us_details();						
				  	} else {
				  		toastr.error('Something went wrong while updating the about us details. Please try again.');
			  		}
			  	} else {
			  		check_admin_login();
			  	}
		  	},
		  	error: function(data) {
		  		$('#update-about-us-content-btn').prop('disabled',false);
				$('#about-us-content-error-div').html('');
		  		toastr.error('Something went wrong while updating the about us details. Please try again.');
		  	}
		});
	} else {
		check_header_caption();

		check_header_sub_heading();
	}
}