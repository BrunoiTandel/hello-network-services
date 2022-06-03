var team_member_name_max_length = 150,
	mobile_number_length = 10,
	block_max_length = 10,
	district_max_length = 100;

$('#team-member-job-role').on('change', function() {
	check_team_member_role();
});

$('#team-member-name').on('keyup blur', function() {
	check_team_member_name();
});

$('#team-member-mobile-number').on('keyup blur', function() {
	check_team_member_mobile_number();
});

$('#team-member-email-id').on('keyup blur', function() {
	check_team_member_email_id();
});

$('#team-member-block').on('keyup blur', function() {
	check_team_member_block();
});

$('#team-member-district').on('keyup blur', function() {
	check_team_member_district();
});

$('#team-member-address').on('keyup blur', function() {
	check_team_member_address();
});

$('#add-new-team-member-btn').on('click', function() {
	add_new_team_member();
});

get_all_team_member_roles();
function get_all_team_member_roles() {
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
	         		var html = '<option value="">Select Role</option>';
	         		for (var i = 0; i < data.role_list.length; i++) {
	         			html += '<option value="'+data.role_list[i].internal_team_role_id+'">'+data.role_list[i].internal_team_role_name+'</option>';
	         		}
	         		$('#team-member-job-role').html(html);
	         	}
	        } else {
	        	check_admin_login();
	        }
	    }
    });
}

function check_team_member_role() {
	var variable_array = {};
	variable_array['input_id'] = '#team-member-job-role';
	variable_array['error_msg_div_id'] = '#job-role-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please select a role.';
	return mandatory_select(variable_array);
}

function check_team_member_name() {
	var variable_array = {};
	variable_array['input_id'] = '#team-member-name';
	variable_array['error_msg_div_id'] = '#team-member-name-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter team member name';
	variable_array['not_an_alphabet_input_error_msg'] = 'Name should be only alphabets';
	variable_array['exceeding_max_length_input_error_msg'] = 'Name should be of max '+team_member_name_max_length+' characters';
	variable_array['max_length'] = team_member_name_max_length;
	return mandatory_only_alphabets_with_max_length_limitation(variable_array);
}

function check_team_member_mobile_number() {
	var variable_array = {};
	variable_array['input_id'] = '#team-member-mobile-number';
	variable_array['error_msg_div_id'] = '#team-member-mobile-number-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter team member mobile number';
	variable_array['not_a_number_input_error_msg'] = 'Mobile number should be only digits.'
	variable_array['exceeding_max_length_input_error_msg'] = 'Mobile number should be of '+mobile_number_length+' digits';
	variable_array['mobile_number_length'] = mobile_number_length;
	variable_array['duplicate_email_id_error_msg'] = 'This mobile number already exists. Please add another number.';
	variable_array['ajax_call_url'] = 'admin/check-new-team-member-mobile-number';
	variable_array['ajax_pass_data'] = {verify_admin_request : '1',mobile_number : $('#team-member-mobile-number').val()};
	return mandatory_mobile_number_with_check_duplication(variable_array);
}

function check_team_member_mobile_number_format() {
	var variable_array = {};
	variable_array['input_id'] = '#team-member-mobile-number';
	variable_array['error_msg_div_id'] = '#team-member-mobile-number-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter the mobile number';
	variable_array['not_a_number_input_error_msg'] = 'Mobile number should be only numbers.'
	variable_array['exceeding_max_length_input_error_msg'] = 'Mobile number should be of '+mobile_number_length+' digits';
	variable_array['max_length'] = mobile_number_length;
	return mandatory_mobile_number_pin_code_with_max_length_limitation(variable_array);
}

function check_team_member_email_id() {
	var variable_array = {};
	variable_array['input_id'] = '#team-member-email-id';
	variable_array['error_msg_div_id'] = '#team-member-email-id-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter team member email id.';
	variable_array['not_an_email_input_error_msg'] = 'Please enter a valid email id.';
	variable_array['duplicate_email_id_error_msg'] = 'Entered email id already exists. Please enter a new email id.';
	variable_array['ajax_call_url'] = 'admin/check-new-team-member-email-id';
	variable_array['ajax_pass_data'] = {verify_admin_request : '1',email : $('#team-member-email-id').val().toLowerCase()};
	return mandatory_email_id_with_check_duplication(variable_array);
}

function check_team_member_email_id_format() {
	var variable_array = {};
	variable_array['input_id'] = '#team-member-email-id';
	variable_array['error_msg_div_id'] = '#team-member-email-id-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter team member email id';
	variable_array['not_an_email_input_error_msg'] = 'Please enter a valid email id';
	return mandatory_email_id(variable_array);
}

function check_team_member_block() {
	var variable_array = {};
	variable_array['input_id'] = '#team-member-block';
	variable_array['error_msg_div_id'] = '#team-member-block-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter the block';
	variable_array['exceeding_max_length_input_error_msg'] = 'Block should be of max '+block_max_length+' characters';
	variable_array['max_length'] = block_max_length;
	return mandatory_any_input_with_max_length_limitation(variable_array);
}

function check_team_member_district() {
	var variable_array = {};
	variable_array['input_id'] = '#team-member-district';
	variable_array['error_msg_div_id'] = '#team-member-district-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please enter the district';
	variable_array['exceeding_max_length_input_error_msg'] = 'District should be of max '+district_max_length+' characters';
	variable_array['max_length'] = district_max_length;
	return mandatory_any_input_with_max_length_limitation(variable_array);
}

function check_team_member_address() {
	var variable_array = {};
	variable_array['input_id'] = '#team-member-address';
	variable_array['error_msg_div_id'] = '#team-member-address-error-msg-div';
	variable_array['empty_input_error_msg'] = 'Please select the address';
	return mandatory_any_input_with_no_limitation(variable_array);
}

function add_new_team_member() {
	var check_team_member_role_var = check_team_member_role(),
		check_team_member_name_var = check_team_member_name(),
		check_team_member_mobile_number_format_var = check_team_member_mobile_number_format(),
		check_team_member_email_id_format_var = check_team_member_email_id_format(),
		check_team_member_block_var = check_team_member_block(),
		check_team_member_district_var = check_team_member_district(),
		check_team_member_address_var = check_team_member_address();

	if (check_team_member_role_var == 1 && check_team_member_name_var == 1 && check_team_member_mobile_number_format_var == 1 && check_team_member_email_id_format_var == 1
		&& check_team_member_block_var == 1 && check_team_member_district_var == 1 && check_team_member_address_var == 1) {
		$('#add-new-team-member-btn').prop('disabled',true);
		$('#add-new-team-member-error-msg-div').html('<span class="d-block text-warning error-msg text-center">Please wait while we are adding a team member.</span>');

		var formdata = new FormData();
		formdata.append('verify_admin_request',1);
		formdata.append('job_role',$('#team-member-job-role').val());
		formdata.append('name',$('#team-member-name').val());
		formdata.append('mobile_number',$('#team-member-mobile-number').val());
		formdata.append('email_id',$('#team-member-email-id').val());
		formdata.append('block',$('#team-member-block').val());
		formdata.append('district',$('#team-member-district').val());
		formdata.append('address',$('#team-member-address').val());
		formdata.append('tag',$('#team-member-tag').val()); 
		$.ajax({
			type: "POST",
		  	url: base_url+"admin/add-new-internal-team-member",
		  	data:formdata,
		  	dataType: 'json',
		    contentType: false,
		    processData: false,
		  	success: function(data) {
		  		$('#add-new-team-member-btn').prop('disabled',false);
				$('#add-new-team-member-error-msg-div').html('');
		  		if (data.status == 1) {
				  	if (data.team_member.status == '1') {
				  		toastr.success('Team member has been added successfully.');
						$('#team-member-job-role').val('');
						$('#team-member-name').val('');
						$('#team-member-mobile-number').val('');
						$('#team-member-email-id').val('');
						$('#team-member-block').val('');
						$('#team-member-district').val('');
						$('#team-member-address').val('');
				  	} else {
				  		toastr.error('Something went wrong while adding the team member. Please try again.');
			  		}
			  	} else if(data.tatus == '2') {
				  	if (data.mobile_number_count != 0) {
				  		check_team_member_mobile_number();
				  	}

				  	if (data.email_id_count != 0) {
				  		check_team_member_email_id();
				  	}
			  	} else {
			  		check_admin_login();
			  	}
		  	},
		  	error: function(data) {
		  		$('#add-new-team-member-btn').prop('disabled',false);
				$('#add-new-team-member-error-msg-div').html('');
		  		toastr.error('Something went wrong while adding the team member. Please try again.');
		  	}
		});
	}
}





function import_excel(){
	var files = $('#add-bulk-upload-case')[0].files[0];
	 
	if (files != undefined) {
		$('#error-client').html('');
		// var form_values = JSON.stringify(selected);
		var formdata = new FormData(); 
		formdata.append('files', files); 
		$('#error-client').html('<span class="text-warning error-msg-small">Please wait while we are submitting the details</span>');
		 
		$.ajax({
			type: "POST",
		  	url: base_url+"admin_Internal_Team/import_excel",
		  	data: formdata,
		  	dataType: "json",
		  	contentType: false,
		    processData: false,
		  	success: function(data){
		  		$('#error-client').html('');
		  		$('#import_excel_file').prop('disabled',false);
		  		$('#import_excel_file').css('background','#005799');
			  	if (data.status == '1') {
			  		toastr.success('New Users Added successfully.');
					$('#add-bulk-upload-case').val(''); 
			  	} else {
			  		toastr.error('OOPS! Something went wrong while adding the User details. Please try again.');
		  		}
		  	} 
		});
	} else {
		$('#error-client').html('<span class="text-danger error-msg-small">Please select a valid excel sheet.</span>');
	}
}



/* user section */

function view_user_details(uid){
	$.ajax({
        type  : 'POST',
        url   : base_url+'admin_Internal_Team/get_single_user_details',
        data : {
        	verify_admin_request : '1',
        	uid : uid
        },
        dataType : 'json',
        success : function(data) {
	       // alert(JSON.stringify(data))
	       /*`user_id`, `username`, `password`, `full_name`, `phone`, `email`,
	        `address`, `note`, `id_proof`, `start_date`, `end_date`, `bandwidth`,
	         `ip_address`, `extra_ip_address`, `mac_address`, `mac_vendor`, `location`,
	          `type`, `auto_bind`, `bandwidth_lock`, `status`, `bill`, `due`, `tag`, `zone*/
	       $("#view-user-details-model").modal('show');
	       $("#user-id").val(data.user_id);
	       $("#user-name").val(data.username); 
	       $("#name").val(data.full_name);
	       $("#phone").val(data.phone);
	       $("#email").val(data.email);
	       $("#address").val(data.address);
	       $("#note").val(data.note);
	       $("#id-proof").val(data.id_proof);
	       $("#start-date").val(data.start_date);
	       $("#end-date").val(data.end_date);
	       $("#bandwidth").val(data.bandwidth);
	       $("#mac-vendor").val(data.mac_vendor);
	       $("#tag").val(data.tag);
	       $("#zone").val(data.zone);
	       // $("#").val(data.type);
	       $("#status").val(data.status);
	       $("#bill").val(data.bill);
	       $("#due").val(data.due);
	    }
    });
}