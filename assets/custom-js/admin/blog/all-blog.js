var blog_title_max_length = 100,
	max_blog_content_length= 100,
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

get_all_blogs();
function get_all_blogs() {
	$.ajax({
        type  : 'POST',
        url   : base_url+'admin/get-all-blogs',
        data : {
        	verify_admin_request : '1'
        },
        dataType : 'json',
        success : function(data) {
	        if (data.status == '1') {
	         	if (data.all_blogs.length > 0) {
	         		var html = '';
	         		for (var i = 0; i < data.all_blogs.length; i++) {
	         			var check ='';
				        if (data.all_blogs[i].blog_status == '1') {
				        	check ='checked';
				        } else {
				            check ='';
				       	}

				       	html += '<div class="col-md-4 mt-3" id="single-blog-main-div-'+data.all_blogs[i].blog_id+'">';
                  		html += '<div class="latest-item">';
                  		html += '<div id="single-blog-image-div-'+data.all_blogs[i].blog_id+'">';
                    	html += '<img src="'+img_base_url+'assets/uploads/blog-thumbnail/'+data.all_blogs[i].blog_thumbnail_image+'">';
                  		html += '</div>';
                    	html += '<h3 id="single-blog-blog-title-'+data.all_blogs[i].blog_id+'">'+data.all_blogs[i].blog_title+'</h3>';
                    	html += '<div id="single-blog-content-'+data.all_blogs[i].blog_id+'">'+data.all_blogs[i].blog_content.slice(0,max_blog_content_length)+'</div>';
                    	html += '<div class="row pb-3">';
                      	html += '<div class="col-md-5"></div>';
                      	html += '<div class="col-md-3 product-category-edit-delete">';
                        html += '<div class="custom-control custom-switch pl-0">';
                        html += '<input type="checkbox" '+check+' onclick="change_blog_status('+data.all_blogs[i].blog_id+','+data.all_blogs[i].blog_status+')" class="custom-control-input" id="change_blog_status_'+data.all_blogs[i].blog_id+'">';
                        html += '<label class="custom-control-label" for="change_blog_status_'+data.all_blogs[i].blog_id+'"></label>';
                        html += '</div></div>';
                      	html += '<div class="col-md-2 product-category-edit-delete">';
                        html += '<a class="product-category-delete-a" id="view_blog_'+data.all_blogs[i].blog_id+'" onclick="view_blog_modal('+data.all_blogs[i].blog_id+')"><i class="fa fa-eye edit-a ml-0"></i></a>';
                      	html += '</div>';
                      	html += '<div class="col-md-2 product-category-edit-delete">';
                        html += '<a class="product-category-delete-a" id="delete_blog_'+data.all_blogs[i].blog_id+'" onclick="delete_blog_modal('+data.all_blogs[i].blog_id+')"><i class="fa fa-trash edit-a text-danger ml-0"></i></a>';
                      	html += '</div>';
                    	html += '</div>';
                  		html += '</div>';
                		html += '</div>';
	         		}
	         	} else {
	         		html = '<div class="col-md-12 text-center">No Blog Available.</div>';
	         	}
	         	$('#blog-list-div').html(html);
	        } else {
	        	check_admin_login();
	        }
	    }
    });
}

function change_blog_status(blog_id,blog_status) {
	var changed_blog_status = 0;

	if (blog_status == 1) {
		changed_blog_status = 0;
	} else if (blog_status == 0) {
		changed_blog_status = 1;
	} else {
		get_all_blogs();
		toastr.error('OOPS! Something went wrong. Please try again.')
		return false;
	}

	var variable_array = {};
	variable_array['id'] = blog_id;
	variable_array['actual_status'] = blog_status;
	variable_array['changed_status'] = changed_blog_status;
	variable_array['ajax_call_url'] = 'admin/change-blog-status';
	variable_array['checkbox_id'] = '#change_blog_status_'+blog_id;
	variable_array['onclick_method_name'] = 'change_blog_status';
	variable_array['success_message'] = 'Blog status has been updated successfully.';
	variable_array['error_message'] = 'Something went wrong updating the blog status. Please try again.';
	variable_array['error_callback_function'] = 'get_all_blogs()';
	variable_array['ajax_pass_data'] = {verify_admin_request : 1, id : blog_id, changed_status : changed_blog_status};

	return change_status(variable_array);
}

function view_blog_modal(blog_id) {
	$.ajax({
        type  : 'POST',
        url   : base_url+'admin/get-blog-details',
        data : {
        	verify_admin_request : '1',
        	blog_id : blog_id
        },
        dataType : 'json',
        success : function(data) {
	        if (data.status == '1') {
		      	$('#blog-title').val(data.blog_detials.blog_title);
		      	$('#external-link').val(data.blog_detials.blog_link);
		      	// $('#news-content').val(data.news_detials.news_content);
		      	var post_type_list_html = '';
		      	$.each(JSON.parse(data.all_post_type), function(index,value) {
	      			var selected = '';
	      			if (data.blog_detials.post_type.toLowerCase() == value.toLowerCase()) {
	      				selected = 'selected';
	      			}
						post_type_list_html += '<option '+selected+' value="'+value+'">'+value+'</option>';
				});

		      	$('#post-type').html(post_type_list_html);

		      	CKEDITOR.instances['blog_content'].setData(data.blog_detials.blog_content);
		      	
		      	var blog_image_html = '';
	      		blog_image_html += '<div class="col-md-8 mt-3" id="blog-thumbnail-image-div">';
                blog_image_html += '<div class="product-category-description">';
                blog_image_html += '<ul>';
                blog_image_html += '<li class="product-category-name">'+data.blog_detials.blog_thumbnail_image+'</li>';
                blog_image_html += '<li class="product-category-edit-delete only-view-li">';
                blog_image_html += '<a class="product-category-delete-a" id="view_blog_thumbnail_image" onclick="view_blog_thumbnail_image_modal()" data-image="'+data.blog_detials.blog_thumbnail_image+'"><i class="fa fa-eye edit-a"></i></a>';
                blog_image_html += '</li>';
                blog_image_html += '</ul>';
                blog_image_html += '</div>';
                blog_image_html += '</div>';
		      	$('#blog-thumbnail-image-div').html(blog_image_html);

		      	$('#update-blog-btn').attr('onclick','update_blog('+blog_id+')');

	         	$('#view-blog-details-modal').modal('show');
	        } else {
	        	check_admin_login();
	        }
	    }
    });
}

function view_blog_thumbnail_image_modal() {
	$('#blog-image-modal-img').attr('src',img_base_url+'assets/uploads/blog-thumbnail/'+$('#view_blog_thumbnail_image').attr('data-image'));
	$('#view-blog-image-modal').modal('show');
}

function update_blog(blog_id) {
	var blog_title = $('#blog-title').val(),
		external_link = $('#external-link').val(),
		post_type = $('#post-type').val(),
		blog_content = CKEDITOR.instances['blog_content'].getData(),
		blog_thumbnail_image = $("#blog-thumbnail-image")[0].files[0];

	var check_blog_title_var = check_blog_title(),
		check_external_link_var = check_external_link(),
		check_post_type_var = check_post_type();
		// check_news_content_var = check_news_content();

	if (check_blog_title_var == 1 && check_external_link_var == 1 && check_post_type_var == 1 && blog_content != '') {
		$('#blog-content-error-msg-div').html('');
		$('#update-blog-btn').removeAttr('onclick');
		$('#update-blog-btn').prop('disabled',true);
		$('#blog-error-div').html('<span class="d-block text-warning error-msg text-center">Please wait while we are updating the news.</span>');

		var formdata = new FormData();
		formdata.append('verify_admin_request',1);
		formdata.append('blog_id',blog_id);
		formdata.append('blog_title',blog_title);
		formdata.append('external_link',external_link);
		formdata.append('post_type',post_type);
		formdata.append('blog_content',blog_content);
		if (blog_thumbnail_image != undefined) {
			formdata.append('blog_thumbnail_image', blog_thumbnail_image);
		}

		$.ajax({
			type: "POST",
		  	url: base_url+"admin/update-blog",
		  	data:formdata,
		  	dataType: 'json',
		    contentType: false,
		    processData: false,
		  	success: function(data) {
		  		if (data.status == 1) {
			  		$('#update-blog-btn').prop('disabled',false);
					$('#blog-error-div').html('');
				  	if (data.update_blog.status == '1') {
				  		toastr.success('Blog has been updated successfully.');
				  		$('#single-blog-image-div-'+blog_id).html('<img src="'+img_base_url+'assets/uploads/blog-thumbnail/'+data.update_blog.blog_thumbnail_image+'">');
				  		$('#single-blog-blog-title-'+blog_id).html(blog_title);
				  		$('#single-blog-content-'+blog_id).html(blog_content.slice(0,max_blog_content_length));

						$("#blog-thumbnail-image").val('');
						
						$('#blog-thumbnail-image-div').html('');

						blog_thumbnail_image_array = [];

						$('#view-blog-details-modal').modal('hide');
				  	} else {
				  		$('#update-blog-btn').attr('onclick','update_blog('+newsblog_id_id+')');
				  		toastr.error('Something went wrong while updating the news. Please try again.');
			  		}
			  	} else {
			  		check_admin_login();
			  	}
		  	},
		  	error: function(data) {
		  		$('#update-blog-btn').attr('onclick','update_blog('+blog_id+')');
		  		$('#update-blog-btn').prop('disabled',false);
				$('#blog-error-div').html('');
		  		toastr.error('Something went wrong while updating the blog. Please try again.');
		  	}
		});
	} else {
		check_header_caption();

		check_external_link();

		// check_news_content();
		if(blog_content == '') {
			$('#blog-content-error-msg-div').html('<span class="text-danger error-msg-small">Please enter the news content.</span>');
		}
	}
}

function delete_blog_modal(blog_id) {
	$('#delete-blog-btn').attr('onclick','delete_blog('+blog_id+')');
	$('#delete-blog-modal').modal('show');
}

function delete_blog(blog_id) {
	var variable_array = {};
	variable_array['id'] = blog_id;
	variable_array['ajax_call_url'] = 'admin/delete-blog';
	variable_array['onclick_method_name'] = 'delete_blog';
	variable_array['success_message'] = 'Blog has been deleted successfully.';
	variable_array['error_message'] = 'Something went wrong deleting the blog. Please try again.';
	variable_array['modal_id'] = '#delete-blog-modal';
	variable_array['delete_image_div_id'] = '#single-blog-main-div-'+blog_id;
	variable_array['delete_btn_id'] = '#delete-blog-btn';
	variable_array['ajax_pass_data'] = {verify_admin_request : 1, blog_id : blog_id};
	return delete_uploaded_image(variable_array);
}