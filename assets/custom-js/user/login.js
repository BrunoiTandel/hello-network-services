$('#btn-sign-in-hdr').on('click', function() {
	$('#check-login-modal').modal({
    	backdrop: 'static',
        keyboard: false
    });
});

$('#modal-continue-as-user-btn').on('click', function() {
	$('#check-login-modal').modal('hide');
	
	$('#user-login-modal').modal({
    	backdrop: 'static',
        keyboard: false
    });
});

$('#user-login-modal').modal({
    	backdrop: 'static',
        keyboard: false
    });

function check_user_login_mobile_number_or_email_id() {
	var email = $('#user-login-mobile-number-or-email-id').val();
	alert(email);
    var mailFormat = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})|([0-9]{10})+$/;
    if (email.value == "") {
        alert( "  Please enter your Email or Phone Number  ");
    } else if (!mailFormat.test(email.value)) {
        alert( "  Email Address / Phone number is not valid, Please provide a valid Email or phone number ");
        return false;
    } else {
        alert(" Success ");
    }
}