

$("#update-user-btn").on('click',function(){ 
var user_id = $("#user-id").val();
var user_name = $("#user-name").val();
var id_proof = $("#id-proof").val();
var start_date = $("#start-date").val();
var end_date = $("#end-date").val();
var mac_vendor = $("#mac-vendor").val();
var connection_type   = $("#connection-type  ").val();
var bandwidth = $("#bandwidth").val();
var tag = $("#tag").val();
var zone = $("#zone").val();
var name = $("#name").val();
var phone = $("#phone").val();
var email = $("#email").val();
var address = $("#address").val();
var note = $("#note").val();
var bill = $("#bill").val();
var due = $("#due").val();
var status = $("#status").val();


		var formdata = new FormData();
		formdata.append('verify_admin_request',1);
		formdata.append('user_id',user_id); 
		formdata.append('user_name',user_name); 
		formdata.append('id_proof',id_proof); 
		formdata.append('start_date',start_date); 
		formdata.append('end_date',end_date); 
		formdata.append('mac_vendor',mac_vendor); 
		formdata.append('connection_type',connection_type); 
		formdata.append('bandwidth',bandwidth); 
		formdata.append('tag',tag); 
		formdata.append('zone',zone); 
		formdata.append('name',name); 
		formdata.append('phone',phone); 
		formdata.append('email',email); 
		formdata.append('address',address); 
		formdata.append('note',note); 
		formdata.append('bill',bill); 
		formdata.append('due',due); 
		formdata.append('status',status);  
		$.ajax({
			type: "POST",
		  	url: base_url+"admin_Internal_Team/update_single_user_details",
		  	data:formdata,
		  	dataType: 'json',
		    contentType: false,
		    processData: false,
		  	success: function(data) { 
		  		if (data.status == '200') { 
		  			$("#view-user-details-model").modal('hide');
				  		toastr.success('User has been update successfully.');
					 
				   
			  	} else {
			  		// check_admin_login();
			  	}
		  	},
		  	error: function(data) {
		  		$('#add-new-team-member-btn').prop('disabled',false);
				$('#add-new-team-member-error-msg-div').html('');
		  		toastr.error('Something went wrong while adding the data. Please try again.');
		  	}
		});
});