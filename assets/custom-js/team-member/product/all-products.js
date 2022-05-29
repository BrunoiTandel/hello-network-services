var product_title_max_length = 100,
	max_product_content_length= 100,
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

function check_product_title() {
	var variable_array = {};
	variable_array['input_id'] = '#product-title';
	variable_array['error_msg_div_id'] = '#product-title-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter the product title';
	variable_array['max_length'] = product_title_max_length;
	variable_array['exceeding_max_length_input_error_msg'] = 'product title should be of max '+product_title_max_length+' characters';
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
	variable_array['exceeding_max_length_error_msg'] = 'product thumbnail image should be of max 1MB';
	return single_file_upload_for_only_image(variable_array);
}

get_all_products();
function get_all_products() { 
	$.ajax({
        type  : 'POST',
        url   : base_url+'admin/get-all-products',
        data : {
        	verify_admin_request : '1'
        },
        dataType : 'json',
        success : function(data) {
	        if (data.status == '1') {
	         	if (data.all_products.length > 0) {
	         		var html = '';
	         		for (var i = 0; i < data.all_products.length; i++) {
	         			var check ='';
				        if (data.all_products[i].product_status == '1') {
				        	check ='checked';
				        } else {
				            check ='';
				       	}

				       	html += '<div class="col-md-4 mt-3" id="single-product-main-div-'+data.all_products[i].product_id+'">';
                  		html += '<div class="latest-item">';
                  		html += '<div id="single-product-image-div-'+data.all_products[i].product_id+'">';
                    	// html += '<img src="'+img_base_url+'assets/uploads/product-thumbnail/'+data.all_products[i].product_image+'">';
                  		html += '</div>';
                    	html += '<h3 id="single-product-product-title-'+data.all_products[i].product_id+'">'+data.all_products[i].product_title+'</h3>';
                    	html += '<div class="pl-3" id="single-product-content-'+data.all_products[i].product_id+'">Data Limit : '+data.all_products[i].product_volume_data_limit+'</div>';
                    	html += '<div class="pl-3" id="single-product-content-'+data.all_products[i].product_id+'">Data Speed : '+data.all_products[i].product_data_speed+'</div>';
                    	html += '<div class="pl-3" id="single-product-content-'+data.all_products[i].product_id+'">Data validity : '+data.all_products[i].product_data_validation+'</div>';
                    	html += '<div class="pl-3" id="single-product-content-'+data.all_products[i].product_id+'">Plan Price : '+data.all_products[i].product_plan_price+'</div>';
                    	html += '<div class="row pb-3">';
                      	html += '<div class="col-md-5"></div>';
                      /*	html += '<div class="col-md-3 product-category-edit-delete">';
                        html += '<div class="custom-control custom-switch pl-0">';
                        html += '<input type="checkbox" '+check+' onclick="change_product_status('+data.all_products[i].product_id+','+data.all_products[i].product_status+')" class="custom-control-input" id="change_product_status_'+data.all_products[i].product_id+'">';
                        html += '<label class="custom-control-label" for="change_product_status_'+data.all_products[i].product_id+'"></label>';
                        html += '</div></div>';*/
                      /*	html += '<div class="col-md-2 product-category-edit-delete">';
                        html += '<a class="product-category-delete-a" id="view_product_'+data.all_products[i].product_id+'" onclick="view_product_modal('+data.all_products[i].product_id+')"><i class="fa fa-eye edit-a ml-0"></i></a>';
                      	html += '</div>';
                      	html += '<div class="col-md-2 product-category-edit-delete">';
                        html += '<a class="product-category-delete-a" id="delete_product_'+data.all_products[i].product_id+'" onclick="delete_product_modal('+data.all_products[i].product_id+')"><i class="fa fa-trash edit-a text-danger ml-0"></i></a>';
                      	html += '</div>';*/
                    	html += '</div>';
                  		html += '</div>';
                		html += '</div>';
	         		}
	         	} else {
	         		html = '<div class="col-md-12 text-center">No product Available.</div>';
	         	}
	         	$('#product-list-div').html(html);
	        } else {
	        	check_admin_login();
	        }
	    }
    });
}

function change_product_status(product_id,product_status) {
	var changed_product_status = 0;

	if (product_status == 1) {
		changed_product_status = 0;
	} else if (product_status == 0) {
		changed_product_status = 1;
	} else {
		get_all_products();
		toastr.error('OOPS! Something went wrong. Please try again.')
		return false;
	}

	var variable_array = {};
	variable_array['id'] = product_id;
	variable_array['actual_status'] = product_status;
	variable_array['changed_status'] = changed_product_status;
	variable_array['ajax_call_url'] = 'admin/change-product-status';
	variable_array['checkbox_id'] = '#change_product_status_'+product_id;
	variable_array['onclick_method_name'] = 'change_product_status';
	variable_array['success_message'] = 'product status has been updated successfully.';
	variable_array['error_message'] = 'Something went wrong updating the product status. Please try again.';
	variable_array['error_callback_function'] = 'get_all_products()';
	variable_array['ajax_pass_data'] = {verify_admin_request : 1, id : product_id, changed_status : changed_product_status};

	return change_status(variable_array);
}

function view_product_modal(product_id) {
	$.ajax({
        type  : 'POST',
        url   : base_url+'admin/get-product-details',
        data : {
        	verify_admin_request : '1',
        	product_id : product_id
        },
        dataType : 'json',
        success : function(data) {
	        if (data.status == '1') {
		      	$('#product-title').val(data.product_detials.product_title); 
		      	// $('#news-content').val(data.news_detials.news_content);
		      	var post_type_list_html = '';
		      	$('#data-volume-limit').val(data.product_detials.product_volume_data_limit);
				$('#speed').val(data.product_detials.product_data_speed);
				$('#validity').val(data.product_detials.product_data_validation);
				$('#plan-price').val(data.product_detials.product_plan_price);
				$('#plan-type').val(data.product_detials.product_plan_type);
		      	 

		      	$('#post-type').html(post_type_list_html);

		      	CKEDITOR.instances['product_content'].setData(data.product_detials.product_content);
		      	
		      	var product_image_html = '';
	      		product_image_html += '<div class="col-md-8 mt-3" id="product-thumbnail-image-div">';
                product_image_html += '<div class="product-category-description">';
                product_image_html += '<ul>';
                product_image_html += '<li class="product-category-name">'+data.product_detials.product_image+'</li>';
                product_image_html += '<li class="product-category-edit-delete only-view-li">';
                product_image_html += '<a class="product-category-delete-a" id="view_product_thumbnail_image" onclick="view_product_thumbnail_image_modal()" data-image="'+data.product_detials.product_image+'"><i class="fa fa-eye edit-a"></i></a>';
                product_image_html += '</li>';
                product_image_html += '</ul>';
                product_image_html += '</div>';
                product_image_html += '</div>';
		      	$('#product-thumbnail-image-div').html(product_image_html);

		      	$('#update-product-btn').attr('onclick','update_product('+product_id+')');

	         	$('#view-product-details-modal').modal('show');
	        } else {
	        	check_admin_login();
	        }
	    }
    });
}

function view_product_thumbnail_image_modal() {
	$('#product-image-modal-img').attr('src',img_base_url+'assets/uploads/product-thumbnail/'+$('#view_product_thumbnail_image').attr('data-image'));
	$('#view-product-image-modal').modal('show');
}

function update_product(product_id) {
	 
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
		$('#update-product-btn').removeAttr('onclick');
		$('#update-product-btn').prop('disabled',true);
		$('#product-error-div').html('<span class="d-block text-warning error-msg text-center">Please wait while we are updating the news.</span>');

		var formdata = new FormData();
		formdata.append('product_id',product_id);
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
		  	url: base_url+"admin/update-product",
		  	data:formdata,
		  	dataType: 'json',
		    contentType: false,
		    processData: false,
		  	success: function(data) {
		  		if (data.status == 1) {
			  		$('#update-product-btn').prop('disabled',false);
					$('#product-error-div').html('');
				  	if (data.update_product.status == '1') {
				  		toastr.success('product has been updated successfully.');
				  		$('#single-product-image-div-'+product_id).html('<img src="'+img_base_url+'assets/uploads/product-thumbnail/'+data.update_product.product_thumbnail_image+'">');
				  		$('#single-product-product-title-'+product_id).html(product_title);
				  		$('#single-product-content-'+product_id).html(product_content.slice(0,max_product_content_length));

						$("#product-thumbnail-image").val('');
						
						$('#product-thumbnail-image-div').html('');

						product_thumbnail_image_array = [];

						$('#view-product-details-modal').modal('hide');
				  	} else {
				  		$('#update-product-btn').attr('onclick','update_product('+newsproduct_id_id+')');
				  		toastr.error('Something went wrong while updating the news. Please try again.');
			  		}
			  	} else {
			  		check_admin_login();
			  	}
		  	},
		  	error: function(data) {
		  		$('#update-product-btn').attr('onclick','update_product('+product_id+')');
		  		$('#update-product-btn').prop('disabled',false);
				$('#product-error-div').html('');
		  		toastr.error('Something went wrong while updating the product. Please try again.');
		  	}
		});
	} else {
		check_header_caption();

		check_external_link();

		// check_news_content();
		if(product_content == '') {
			$('#product-content-error-msg-div').html('<span class="text-danger error-msg-small">Please enter the news content.</span>');
		}
	}
}

function delete_product_modal(product_id) {
	$('#delete-product-btn').attr('onclick','delete_product('+product_id+')');
	$('#delete-product-modal').modal('show');
}

function delete_product(product_id) {
	var variable_array = {};
	variable_array['id'] = product_id;
	variable_array['ajax_call_url'] = 'admin/delete-product';
	variable_array['onclick_method_name'] = 'delete_product';
	variable_array['success_message'] = 'product has been deleted successfully.';
	variable_array['error_message'] = 'Something went wrong deleting the product. Please try again.';
	variable_array['modal_id'] = '#delete-product-modal';
	variable_array['delete_image_div_id'] = '#single-product-main-div-'+product_id;
	variable_array['delete_btn_id'] = '#delete-product-btn';
	variable_array['ajax_pass_data'] = {verify_admin_request : 1, product_id : product_id};
	return delete_uploaded_image(variable_array);
}



$("#btn-user-order").on('click',function(){ 
	var product_val = '';
	$(".product-plans:checked").each(function(){
		product_val = $(this).val(); 
	}); 

	$("#order-product-modal").modal('show');

if (product_val != '') {
var html ='<button class="btn btn-default btn-close" data-dismiss="modal">Close</button>'+
'<button class="btn btn-add btn-add btn-update text-white mt-0 modal-btn-gap" onclick="order_now()" id="new-order-product-btn">Confirm Order</button>';
$("#view-edit-cancel-btn-div-1").html(html);
$("#order-now-alert").html("<span>Are you sure you want to Active this Data Plan?</span>");

// order_now(product_val);
}else{
var html ='<button class="btn btn-default btn-close" data-dismiss="modal">Close</button>'; 
$("#view-edit-cancel-btn-div-1").html(html);
$("#order-now-alert").html("<span class='text-danger'>Please Select Any One Data Plan.</span>");	
}
});

function order_now(){
	var product_val = '';
	$(".product-plans:checked").each(function(){
		product_val = $(this).val(); 
	}); 

	$users = $("#users").val();
	$.ajax({
			type: "POST",
		  	url: base_url+"admin_Product/add_product_order",
		  	data:{user:$users,product:product_val},
		  	dataType: 'json', 
		  	success: function(data) {
		  		if (data.status == 1) {
			  	 
				  		toastr.success('product order has been successfully added.');
				  		 
						$('#order-product-modal').modal('hide');
				  	 
			  	} else {
			  		toastr.error('Something went wrong while adding order. Please try again.');
			  	}
		  	},
		  	error: function(data) {
		  		 	toastr.error('Something went wrong while updating the Order. Please try again.');
		  	}
		});
}