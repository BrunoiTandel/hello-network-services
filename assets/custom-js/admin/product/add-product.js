var product_title_max_length = 70,
	max_img_size = 10000000,
	product_thumbnail_image_array = [];

$('#product-title').on('keyup blur', function() {
	check_product_title();
});

$('#external-link').on('keyup blur', function() {
	check_external_link();
});

$('#post-type').on('keyup blur', function() {
	check_post_type();
});

$("#product-thumbnail-image").on("change", handle_file_select_product_thumbnail_image);

$('#add-product-btn').on('click', function() {
	add_product();	
});

get_all_post_type();
function get_all_post_type() {
	$.ajax({
	    type:'POST',
	    url: base_url+'admin/get-all-post-type',
	    dataType: 'JSON',
	    data: {
	    	verify_admin_request : 1
	    },
	    success:function(data) {
	      	var post_type_list_html = '<option value="">Post Type</option>';
	      	$.each(JSON.parse(data), function(index,value) {
  				post_type_list_html += '<option value="'+value+'">'+value+'</option>';
			});
	      	$('#post-type').html(post_type_list_html);
	    }
  	});
}

function check_product_title() {
	var variable_array = {};
	variable_array['input_id'] = '#product-title';
	variable_array['error_msg_div_id'] = '#product-title-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter the product title';
	variable_array['max_length'] = product_title_max_length;
	variable_array['exceeding_max_length_input_error_msg'] = 'Blog title should be of max '+product_title_max_length+' characters';
	return mandatory_any_input_with_max_length_limitation(variable_array);
}

function check_external_link() {
	var variable_array = {};
	variable_array['input_id'] = '#external-link';
	variable_array['error_msg_div_id'] = '#external-link-error-msg-div';
	variable_array['not_a_link_input_error_msg'] = 'Entered string is not a URL. Plese enter the url.';
	return not_mandatory_link(variable_array);
}

function check_post_type() {
	var variable_array = {};
	variable_array['input_id'] = '#post-type';
	variable_array['error_msg_div_id'] = '#post-type-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please select a post type.';
	return mandatory_select(variable_array);
}

function check_news_content() {
	var variable_array = {};
	variable_array['input_id'] = '#news-content';
	variable_array['error_msg_div_id'] = '#news-content-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter the news content';
	return mandatory_any_input_with_no_limitation(variable_array);	
}

function handle_file_select_product_thumbnail_image(e) {
	product_thumbnail_image_array = [];
	var variable_array = {};
	variable_array['e'] = e;
	variable_array['file_id'] = '#product-thumbnail-image';
	variable_array['show_image_name_msg_div_id'] = '#product-thumbnail-image-div';
	variable_array['storedFiles_array'] = product_thumbnail_image_array;
	variable_array['col_type'] = 'col-md-10';
	variable_array['file_ui_id'] = 'file_product_thumbnail_image';
	variable_array['file_size'] = max_img_size;
	variable_array['empty_input_error_msg'] = 'Please select an image';
	variable_array['exceeding_max_length_error_msg'] = 'Blog thumbnail image should be of max 1MB';
	return single_file_upload_for_only_image(variable_array);
}

function add_product() {
	var product_title = $('#product-title').val(),  
	limit = $('#data-volume-limit').val(), 
	speed = $('#speed').val(), 
	validity = $('#validity').val(),
	 price = $('#plan-price').val(), 
	type = $('#plan-type').val(), 
		product_content = CKEDITOR.instances['product_content'].getData(),
		product_thumbnail_image = $("#product-thumbnail-image")[0].files[0];

	var check_product_title_var = check_product_title();
		// check_news_content_var = check_news_content();

	if (check_product_title_var == 1 ) {
		$('#product-content-error-msg-div').html('');
		$('#add-product-btn').prop('disabled',true);
		$('#product-error-div').html('<span class="d-block text-warning error-msg text-center">Please wait while we are adding the product.</span>');

		var formdata = new FormData();
		formdata.append('verify_admin_request',1);
		formdata.append('product_title',product_title);
		formdata.append('limit',limit);
		formdata.append('speed',speed);
		formdata.append('validity',validity);
		formdata.append('price',price); 
		formdata.append('product_content',product_content);
		formdata.append('product_type',type);
		formdata.append('product_thumbnail_image', product_thumbnail_image);

		$.ajax({
			type: "POST",
		  	url: base_url+"admin/add-new-product",
		  	data:formdata,
		  	dataType: 'json',
		    contentType: false,
		    processData: false,
		  	success: function(data) {
		  		if (data.status == 1) {
			  		$('#add-product-btn').prop('disabled',false);
					$('#product-error-div').html('');
				  	if (data.new_blob_details.status == '1') {
				  		toastr.success('New product has been added successfully.');
						$('#product-title').val();  
						$('#data-volume-limit').val(); 
						$('#speed').val();
						$('#validity').val();
						$('#plan-price').val(); 
						$('#plan-type').val(); 
						CKEDITOR.instances['product_content'].setData('');
						$("#product-thumbnail-image").val('');
						$('#product-thumbnail-image-div').html('');
						
						product_thumbnail_image_array = [];
				  	} else {
				  		toastr.error('Something went wrong while adding the product. Please try again.');
			  		}
			  	} else {
			  		check_admin_login();
			  	}
		  	},
		  	error: function(data) {
		  		$('#add-product-btn').prop('disabled',false);
				$('#product-error-div').html('');
		  		toastr.error('Something went wrong while adding the product. Please try again.');
		  	}
		});
	} else {
		check_product_title();

		check_external_link();

		if(product_content == '') {
			$('#product-content-error-msg-div').html('<span class="text-danger error-msg-small">Please enter the news content.</span>');
		}

		if (product_thumbnail_image == undefined) {
			$('#product-thumbnail-image-div').html('<span class="text-danger error-msg-small">Please select an image.</span>');
		}
	}
}