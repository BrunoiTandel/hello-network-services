get_all_user_enquiry_list();
function get_all_user_enquiry_list() {
	$.ajax({
		type: "POST",
    url: base_url+"admin/get-all-user-contact-us-enquiries",
    dataType: "json",
    data : {
      verify_admin_request : 1,
    },
    success: function(data) {
      if(data.status == '1') { 
        let html='';
        if (data.all_enquiries.length > 0) {
          for (var i = 0; i < data.all_enquiries.length; i++) {
            html += '<tr id="query-'+data.all_enquiries[i].user_contact_us_query_id+'">'+
              '<td>'+(i+1)+'</td>'+
              '<td id="user_name_'+data.all_enquiries[i].user_contact_us_query_id+'">'+data.all_enquiries[i].user_contact_us_query_first_name+' '+data.all_enquiries[i].user_contact_us_query_last_name+'</td>'+
              '<td id="user_mobile_number_'+data.all_enquiries[i].user_contact_us_query_id+'">'+data.all_enquiries[i].user_contact_us_query_phone_number+'</td>'+
              '<td id="user_email_id_'+data.all_enquiries[i].user_contact_us_query_id+'">'+data.all_enquiries[i].user_contact_us_query_email_id+'</td>'+
              '<td id="user_query_'+data.all_enquiries[i].user_contact_us_query_id+'">'+data.all_enquiries[i].user_contact_us_query_message+'</td>'+
              '<td id="user_query_date_'+data.all_enquiries[i].user_contact_us_query_id+'">'+data.all_enquiries[i].user_contact_us_query_created_date+'</td>'+
              '<td>'+
                '<a id="view_enquiry_'+data.all_enquiries[i].user_contact_us_query_id+'" onclick="view_user_enquiry_modal('+data.all_enquiries[i].user_contact_us_query_id+')"><i class="fa fa-eye edit-a"></i></a>'+
                // '<a id="delete_enquiry_'+data.all_enquiries[i].enquiry_id+'" onclick="delete_enquiry_modal('+data.all_enquiries[i].enquiry_id+')"><i class="fa fa-trash edit-a text-danger"></i></a>'+
              '</td>'+
            '</tr>';
          }
        } else {
          html += '<tr>'+
            '<td colspan="6" class="text-center">No Enquiry Found.</td>'+
            '</tr>';  
        }
        $('#all-enquiries-list').html(html); 
      } else {
        check_admin_login();
      }
    }
	});
}

function view_user_enquiry_modal(user_contact_us_query_id) {
	$.ajax({
    type: "post",
    url: base_url+"admin/get-single-user-contact-us-enquiry-details",
    data : {
      user_contact_us_query_id : user_contact_us_query_id,
      verify_admin_request : 1
    },
    dataType: "json",
    success: function(data) {
      if(data.status == '1') {
        $('#modal-enquiry-first-name').html(data.enquiry.user_contact_us_query_first_name);
        $('#modal-enquiry-last-name').html(data.enquiry.user_contact_us_query_last_name);
        $('#modal-enquiry-mobile-number').html('+91 '+data.enquiry.user_contact_us_query_phone_number);
        $('#modal-enquiry-email-id').html(data.enquiry.user_contact_us_query_email_id);
        $('#modal-enquiry-message').html(data.enquiry.user_contact_us_query_message);
        
        if (data.enquiry.user_contact_us_query_reply_status == '1') {
          $('#send-enquiry-reply').prop('disabled',true);
          $('#send-enquiry-reply').val(data.enquiry.user_contact_us_query_reply_message);
          $('#send-enquiry-reply-btn').prop('disabled',true);
          $('#send-enquiry-reply-btn').removeAttr("onclick");
          $('#send-enquiry-reply-btn').html("Already Replied");
          $('#send-enquiry-reply-btn').removeClass("text-white");
          $('#send-enquiry-reply-btn').addClass("text-dark");
        } else {
          $('#send-enquiry-reply').prop('disabled',false);
          $('#send-enquiry-reply').val('');
          $('#send-enquiry-reply-btn').prop('disabled',false);
          $('#send-enquiry-reply-btn').html("Reply");
          $('#send-enquiry-reply-btn').attr("onclick","submit_enquiry_reply("+data.enquiry.user_contact_us_query_id+")");
          $('#send-enquiry-reply-btn').removeClass("text-dark");
          $('#send-enquiry-reply-btn').addClass("text-white");
        }
        $('#view-user-enquiry-modal').modal('show');
      } else {
        check_admin_login();
      }
    },
    error: function(data) {
    	toastr.error('OOPS! Something went wrong. Please try again.');
    	get_all_user_enquiry_list();
    }
  });
}

$('#send-enquiry-reply').on('keyup blur', function() {
	check_send_enquiry_reply();
});

function delete_enquiry_modal(user_contact_us_id) {
  $('#delete-enquiry-btn').attr('onclick','delete_enquiry('+user_contact_us_id+')');
  $('#delete-enquiry-modal').modal('show');
}

function delete_enquiry(user_contact_us_id) {
  $('#delete-enquiry-btn').prop('disabled',true);
  $('#delete-enquiry-error-msg-div').html('<span class="text-warning error-msg-small d-block text-center">Please wait while deleting the enquiry.</span>');
  
  $.ajax({
    type: "POST",
      url: base_url+"rajakshetra-admin/delete-enquiry",
      dataType: "json",
      data: {
        user_contact_us_id : user_contact_us_id
      },
      success: function(data) {
        $('#delete-enquiry-btn').prop('disabled',false);
        $('#delete-enquiry-error-msg-div').html('');

        if (data.status == '1') {
          $('#delete-farmer-enquiry-btn').removeAttr('onclick');
          toastr.success('Enquiry has been deleted successfully.');
            $('#delete-enquiry-modal').modal('hide');
            get_all_user_enquiry_list();
          } else if (data.status == '0') {
            toastr.error('OOPS! Something went wrong while deleting the enquiry. Please try again.');
          } else {
            $('#delete-enquiry-btn').removeAttr('onclick');
            toastr.warning('You haven\'t logged in. Please login first.');
            $('#delete-enquiry-modal').modal('hide');
            $("#login-modal").modal({
              backdrop: 'static',
              keyboard: false
          });
          }
      },
      error : function(data) {
        $('#delete-enquiry-btn').removeAttr('onclick');
        $('#delete-enquiry-btn').prop('disabled',false);
        $('#delete-enquiry-error-msg-div').html('');
        $('#delete-enquiry-modal').modal('hide');
        toastr.error('OOPS! Something went wrong while deleting the enquiry. Please try again.');
      }
  });
}

function check_send_enquiry_reply() {
	var input_id = '#send-enquiry-reply',
		  error_msg_div_id = '#send-enquiry-reply-error-msg-div',
		  empty_input_error_msg = 'Please enter your reply';
	return mandatory_any_input_with_no_limitation(input_id,error_msg_div_id,empty_input_error_msg);
}

function submit_enquiry_reply(user_contact_us_query_id) {
	var send_enquiry_reply = $('#send-enquiry-reply').val();

	var check_send_enquiry_reply_var = check_send_enquiry_reply();

	if (check_send_enquiry_reply_var == '1') {
		
		$('#send-enquiry-reply-btn').prop('disabled',true);
		$('#send-enquiry-reply-error-msg-div').html('<span class="text-warning error-msg-small d-block text-center">Please wait while we are replying.</span>');
		
		var formdata = new FormData();
    formdata.append('verify_admin_request', 1);
		formdata.append('send_enquiry_reply', send_enquiry_reply);
		formdata.append('user_contact_us_query_id', user_contact_us_query_id);

		$.ajax({
			type: "POST",
		  url: base_url+"admin/reply-to-user-contact-us-enquiry",
		  dataType: "json",
			data: formdata,
	  	contentType: false,
	    processData: false,
		  success: function(data) {
        if (data.status == 1) {
				  $('#send-enquiry-reply-btn').prop('disabled',false);
			    $('#send-enquiry-reply-error-msg-div').html('');

			    if (data.status == '1') {
			 		  toastr.success('Your reply has sent successfully.');
		     	  $('#view-user-enquiry-modal').modal('hide');
		      } else if (data.status == '0') {
	     		  toastr.error('OOPS! Something went wrong while replying. Please try again.');
	    	  } else if (data.status == '2') {
		     	  $('#view-user-enquiry-modal').modal('hide');
	      	  toastr.warning('You have already replied to the query.');
          }
		    } else {
          check_admin_login();
        }
		  },
		  error : function(data) {
				$('#send-enquiry-reply-btn').prop('disabled',false);
			  $('#send-enquiry-reply-error-msg-div').html('');
	  		toastr.error('OOPS! Something went wrong while replying. Please try again.');
		  }
		});
	} else {
		check_send_enquiry_reply();
	}
}

$('#generate_report').on('click',function() {
  $.ajax({
      type: "POST",
      url: base_url+"rajakshetra-admin/export-enquiry-details", 
      dataType: 'json', 
      success: function(data) {   
      var link=document.createElement('a');
      document.body.appendChild(link);
      link.href=data.path;
      link.click(); 
      document.body.removeChild(link);

      } 
  });
});