var email_regex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/,
	password_length = 8;

function adminLogin() {
	var email = $("#email").val();
	var password = $("#password").val();

	if (email != '' && password != '' && email_regex.test(email) == true && password.length >= password_length) {
		$('#login-email-error').html('');
		$('#login-password-error').html('');
		$('#login-error').html('');
		
		$.ajax({
			type: "POST",
		  	url: base_url+"adminLogin/verifylogin",
		  	data: {email: email, password: password},
		  	 dataType: "json",
		  	success: function(data) {
			  	if (data.status == '1') {
			  		window.location.href = base_url+"factsuite-admin/pages";
			  	} else {
					$('#login-error').html("<span class='text-danger error-msg-small d-block mt-2'>Incorrect Email Id or Password</span>");
		  		}
		  	} 
		});
	} else {
		if (email != '') {
			if (!email_regex.test(email)) {
				$('#login-email-error').html('<span class="text-danger error-msg-small">Please enter a valid email id</span>');
			} else {
				$('#login-email-error').html('');	
			}
		} else {
			$('#login-email-error').html('<span class="text-danger error-msg-small">Please enter your email id</span>');
		}

		if (password != '') {
			if (password.length < password_length) {
				$('#login-password-error').html('<span class="text-danger error-msg-small">Password length should minimum '+password_length+' characters</span>');
			} else {
				$('#login-password-error').html('');
			}
		} else {
			$('#login-password-error').html('<span class="text-danger error-msg-small">Please enter your password.</span>');
		}
	}
}