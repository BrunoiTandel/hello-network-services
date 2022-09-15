var blog_title_max_length = 70,
	max_img_size = 10000000,
	blog_thumbnail_image_array = [];

$('#blog-title').on('keyup blur', function() {
	check_blog_title();
});

$('#external-link').on('keyup blur', function() {
	check_external_link();
});

$('#post-type').on('keyup blur', function() {
	check_post_type();
});

$("#blog-thumbnail-image").on("change", handle_file_select_blog_thumbnail_image);

$('#add-blog-btn').on('click', function() {
	add_blog();	
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

function check_blog_title() {
	var variable_array = {};
	variable_array['input_id'] = '#blog-title';
	variable_array['error_msg_div_id'] = '#blog-title-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter the blog title';
	variable_array['max_length'] = blog_title_max_length;
	variable_array['exceeding_max_length_input_error_msg'] = 'Blog title should be of max '+blog_title_max_length+' characters';
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

function handle_file_select_blog_thumbnail_image(e) {
	blog_thumbnail_image_array = [];
	var variable_array = {};
	variable_array['e'] = e;
	variable_array['file_id'] = '#blog-thumbnail-image';
	variable_array['show_image_name_msg_div_id'] = '#blog-thumbnail-image-div';
	variable_array['storedFiles_array'] = blog_thumbnail_image_array;
	variable_array['col_type'] = 'col-md-10';
	variable_array['file_ui_id'] = 'file_blog_thumbnail_image';
	variable_array['file_size'] = max_img_size;
	variable_array['empty_input_error_msg'] = 'Please select an image';
	variable_array['exceeding_max_length_error_msg'] = 'Blog thumbnail image should be of max 1MB';
	return single_file_upload_for_only_image(variable_array);
}

function add_blog() {
	var blog_title = $('#blog-title').val(),
		external_link = $('#external-link').val(),
		post_type = $('#post-type').val(),
		blog_content = CKEDITOR.instances['blog_content'].getData(),
		blog_thumbnail_image = $("#blog-thumbnail-image")[0].files[0];

	var check_blog_title_var = check_blog_title(),
		check_external_link_var = check_external_link(),
		check_post_type_var = check_post_type();
		// check_news_content_var = check_news_content();

	if (check_blog_title_var == 1 && check_external_link_var == 1 && check_post_type_var == 1 && blog_content != '' && blog_thumbnail_image != undefined) {
		$('#blog-content-error-msg-div').html('');
		$('#add-blog-btn').prop('disabled',true);
		$('#blog-error-div').html('<span class="d-block text-warning error-msg text-center">Please wait while we are adding the blog.</span>');

		var formdata = new FormData();
		formdata.append('verify_admin_request',1);
		formdata.append('blog_title',blog_title);
		formdata.append('external_link',external_link);
		formdata.append('blog_content',blog_content);
		formdata.append('post_type',post_type);
		formdata.append('blog_thumbnail_image', blog_thumbnail_image);

		$.ajax({
			type: "POST",
		  	url: base_url+"admin/add-new-adversement",
		  	data:formdata,
		  	dataType: 'json',
		    contentType: false,
		    processData: false,
		  	success: function(data) {
		  		if (data.status == 1) {
			  		$('#add-blog-btn').prop('disabled',false);
					$('#blog-error-div').html('');
				  	if (data.new_blob_details.status == '1') {
				  		toastr.success('New blog has been added successfully.');
						$('#blog-title').val('');
						$('#external-link').val('');
						$('#post-type').val('');
						CKEDITOR.instances['blog_content'].setData('');
						$("#blog-thumbnail-image").val('');
						$('#blog-thumbnail-image-div').html('');
						
						blog_thumbnail_image_array = [];
				  	} else {
				  		toastr.error('Something went wrong while adding the blog. Please try again.');
			  		}
			  	} else {
			  		check_admin_login();
			  	}
		  	},
		  	error: function(data) {
		  		$('#add-blog-btn').prop('disabled',false);
				$('#blog-error-div').html('');
		  		toastr.error('Something went wrong while adding the blog. Please try again.');
		  	}
		});
	} else {
		check_blog_title();

		check_external_link();

		if(blog_content == '') {
			$('#blog-content-error-msg-div').html('<span class="text-danger error-msg-small">Please enter the news content.</span>');
		}

		if (blog_thumbnail_image == undefined) {
			$('#blog-thumbnail-image-div').html('<span class="text-danger error-msg-small">Please select an image.</span>');
		}
	}
}