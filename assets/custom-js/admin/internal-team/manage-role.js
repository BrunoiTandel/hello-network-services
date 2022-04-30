var role_name_max_length = 50;

$('#add-role-type').on('keyup blur', function() {
	check_new_role();
});

$('#add-role-type-btn').on('click', function() {
	add_new_role();
});

$('#edit-role-name').on('keyup blur', function() {
	check_edit_role_name();
});

function check_new_role() {
	var variable_array = {};
	variable_array['input_id'] = '#add-role-type';
	variable_array['name_max_length'] = role_name_max_length;
	variable_array['error_msg_div_id'] = '#add-role-type-error-msg-div';
	variable_array['exceeding_max_length_error_msg'] = 'Role name should be of max '+role_name_max_length+' characters';
	variable_array['ajax_call_url'] = 'admin/check-new-internal-role-name';
	variable_array['ajax_pass_data'] = {verify_admin_request : 1, role_name : $('#add-role-type').val()};
	variable_array['duplication_error_msg'] = 'Entered role already exists. Please enter a new role.';
	variable_array['empty_input_error_msg'] = 'Please enter the role name.';
	return mandatory_input_with_max_length_check_name_duplication(variable_array);
}

function add_new_role() {
	var check_new_role_var = check_new_role();
	if (check_new_role_var == 1) {
		$('#add-role-type-btn').prop('disabled',true);
		$('#add-role-type-error-msg-div').html('<span class="d-block text-warning error-msg text-center">Please wait while we are adding the new role.</span>');

		var formdata = new FormData();
		formdata.append('verify_admin_request',1);
		formdata.append('role_name',$('#add-role-type').val());

		$.ajax({
			type: "POST",
		  	url: base_url+"admin/add-new-internal-team-role",
		  	data:formdata,
		  	dataType: 'json',
		    contentType: false,
		    processData: false,
		  	success: function(data) {
		  		if (data.status == 1) {
			  		$('#add-role-type-btn').prop('disabled',false);
					$('#add-role-type-error-msg-div').html('');
				  	if (data.role_details.status == '1') {
				  		toastr.success('New role has been added successfully.');
						$('#add-role-type').val('');
						get_all_roles();
				  	} else {
				  		toastr.error('Something went wrong while adding the new role. Please try again.');
			  		}
			  	} else {
			  		check_admin_login();
			  	}
		  	},
		  	error: function(data) {
		  		$('#add-role-type-btn').prop('disabled',false);
				$('#add-role-type-error-msg-div').html('');
		  		toastr.error('Something went wrong while adding the new role. Please try again.');
		  	}
		});
	}
}

get_all_roles();
function get_all_roles() {
	$.ajax({
        type  : 'POST',
        url   : base_url+'admin/get-all-internal-team-roles',
        data : {
        	verify_admin_request : '1'
        },
        dataType : 'json',
        success : function(data) {
	        if (data.status == '1') {
	         	if (data.role_list.length > 0) {
	         		var html = '';
	         		for (var i = 0; i < data.role_list.length; i++) {
	         			var check ='';
				        if (data.role_list[i].internal_team_role_status == '1') {
				        	check ='checked';
				        }

		        		html += '<div class="col-md-4 mt-3" id="role-div-'+data.role_list[i].internal_team_role_id+'">';
		                html += '<div class="product-category-description">';
		                html += '<ul>';
		                html += '<li class="product-category-name" id="role-name-li-'+data.role_list[i].internal_team_role_id+'">'+data.role_list[i].internal_team_role_name+'</li>';
		                html += '<li class="product-category-edit-delete">';
		                html += '<div class="custom-control custom-switch pl-0">';
					    html += '<input type="checkbox" '+check+' onclick="change_role_status('+data.role_list[i].internal_team_role_id+','+data.role_list[i].internal_team_role_status+')" class="custom-control-input" id="change_role_status_'+data.role_list[i].internal_team_role_id+'">';
					    html += '<label class="custom-control-label" for="change_role_status_'+data.role_list[i].internal_team_role_id+'"></label>';
					    html += '</div>';
		                html += '</li>';
		                html += '<li class="product-category-edit-delete">';
		                html += '<a class="product-category-delete-a" id="view_role_'+data.role_list[i].internal_team_role_id+'" onclick="view_role_modal('+data.role_list[i].internal_team_role_id+')"><i class="fa fa-eye edit-a"></i></a>';
		                html += '</li>';
		                html += '<li class="product-category-edit-delete">';
		                html += '<a class="product-category-delete-a" id="delete_role_'+data.role_list[i].internal_team_role_id+'" onclick="delete_role_modal('+data.role_list[i].internal_team_role_id+')" data-role_name="'+data.role_list[i].internal_team_role_name+'"><i class="fa fa-trash edit-a text-danger"></i></a>';
		                html += '</li>';
		                html += '</ul>';
		                html += '</div>';
		                html += '</div>';
	         		}
	         		$('#role-list').html(html);
	         	}
	        } else {
	        	check_admin_login();
	        }
	    }
    });
}

function change_role_status(internal_team_role_id,status) {
	var changed_role_status = 0;

	if (status == 1) {
		changed_role_status = 0;
	} else if (status == 0) {
		changed_role_status = 1;
	} else {
		get_all_roles();
		toastr.error('OOPS! Something went wrong. Please try again.')
		return false;
	}

	var variable_array = {};
	variable_array['id'] = internal_team_role_id;
	variable_array['actual_status'] = status;
	variable_array['changed_status'] = changed_role_status;
	variable_array['ajax_call_url'] = 'admin/change-internal-team-role-status';
	variable_array['checkbox_id'] = '#change_role_status_'+internal_team_role_id;
	variable_array['onclick_method_name'] = 'change_role_status';
	variable_array['success_message'] = 'Role status has been updated successfully.';
	variable_array['error_message'] = 'Something went wrong updating the role status. Please try again.';
	variable_array['error_callback_function'] = 'get_all_roles()';
	variable_array['ajax_pass_data'] = {verify_admin_request : 1, id : internal_team_role_id, changed_status : changed_role_status};

	return change_status(variable_array);
}

function view_role_modal(internal_team_role_id) {
	$.ajax({
        type  : 'POST',
        url   : base_url+'admin/get-single-internal-team-role-details',
        data : {
        	verify_admin_request : '1',
        	internal_team_role_id : internal_team_role_id
        },
        dataType : 'json',
        success : function(data) {
	        if (data.status == '1') {
	        	$('#edit-role-name').val(data.role_details.internal_team_role_name);
	        	$('#edit-role-id').val(internal_team_role_id);
	         	$('#update-role-btn').attr('onclick','update_role('+internal_team_role_id+')');
	         	$('#view-role-modal').modal('show');
	        } else {
	        	check_admin_login();
	        }
	    }
    });
}

function check_edit_role_name() {
	var variable_array = {};
	variable_array['input_id'] = '#edit-role-name';
	variable_array['name_max_length'] = role_name_max_length;
	variable_array['error_msg_div_id'] = '#edit-role-error-msg-div';
	variable_array['exceeding_max_length_error_msg'] = 'Role Name should be of max '+role_name_max_length+' characters.';
	variable_array['ajax_call_url'] = 'admin/check-edit-internal-team-role-name';
	variable_array['ajax_pass_data'] = {verify_admin_request : 1, role_name : $('#edit-role-name').val(), role_id : $('#edit-role-id').val()};
	variable_array['duplication_error_msg'] = 'Entered role name already exists. Please enter a new role.';
	variable_array['empty_input_error_msg'] = 'Please enter the client name.';
	return mandatory_input_with_max_length_check_name_duplication(variable_array);
}

function update_role(internal_team_role_id) {
	var check_edit_role_name_var = check_edit_role_name();
	if (check_edit_role_name_var == 1) {
		$('#update-role-btn').removeAttr('onclick');
		$('#update-role-btn').prop('disabled',true);
		$('#edit-role-error-msg-div').html('<span class="d-block text-warning error-msg text-center">Please wait while we are updating the role name.</span>');

		var formdata = new FormData();
		formdata.append('verify_admin_request',1);
		formdata.append('role_name',$('#edit-role-name').val());
		formdata.append('internal_team_role_id',internal_team_role_id);

		$.ajax({
			type: "POST",
		  	url: base_url+"admin/update-internal-team-role-name",
		  	data:formdata,
		  	dataType: 'json',
		    contentType: false,
		    processData: false,
		  	success: function(data) {
		  		$('#update-role-btn').prop('disabled',false);
				$('#edit-role-error-msg-div').html('');
		  		if (data.status == 1) {
				  	if (data.role_details.status == '1') {
				  		$('#role-name-li-'+internal_team_role_id).html($('#edit-role-name').val());
				  		toastr.success('Role name has been updated successfully.');
						$('#edit-role-name').val('');
						
						$('#view-role-modal').modal('hide');
				  	} else {
				  		$('#update-role-btn').attr('onclick','update_role('+internal_team_role_id+')');
				  		toastr.error('Something went wrong while updating the role name. Please try again.');
			  		}
			  	} else {
			  		check_admin_login();
			  	}
		  	},
		  	error: function(data) {
		  		$('#update-role-btn').attr('onclick','update_role('+internal_team_role_id+')');
		  		$('#update-role-btn').prop('disabled',false);
				$('#edit-role-error-msg-div').html('');
		  		toastr.error('Something went wrong while updating the role name. Please try again.');
		  	}
		});
	}
}

function delete_role_modal(internal_team_role_id) {
	$('#delete-role-name-hdr-span').html($('#delete_role_'+internal_team_role_id).attr('data-role_name'));
	$('#delete-role-name-btn').attr('onclick','delete_role('+internal_team_role_id+')');
	$('#delete-role-modal').modal('show');
}

function delete_role(internal_team_role_id) {
	var variable_array = {};
	variable_array['id'] = internal_team_role_id;
	variable_array['ajax_call_url'] = 'admin/delete-internal-team-role-name';
	variable_array['onclick_method_name'] = 'delete_role';
	variable_array['success_message'] = 'Role has been deleted successfully.';
	variable_array['error_message'] = 'Something went wrong deleting the role. Please try again.';
	variable_array['modal_id'] = '#delete-role-modal';
	variable_array['delete_image_div_id'] = '#role-div-'+internal_team_role_id;
	variable_array['delete_btn_id'] = '#delete-role-name-btn';
	variable_array['ajax_pass_data'] = {verify_admin_request : 1, internal_team_role_id : internal_team_role_id};
	return delete_uploaded_image(variable_array);
}