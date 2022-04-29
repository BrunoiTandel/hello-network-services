function check_admin_login() {
	setInterval(function() { 
		$.ajax({
		    type:'POST',
		    url: base_url+'factsuite-admin/check-admin-logged-in',
		    data : {
		    	verify_farmer_request : '1'
		    },
		    dataType: 'JSON',
		    success : function(data) {
		      	if (data.status == '0') {
		      		toastr.warning('Your Session has been timeout. Please login again.');
		      		setTimeout(auto_logout_admin, 3000);
		      	}
		    },
		    error :  function(data) {
		    	window.location = base_url+"factsuite-admin";
		    }
	  	});
	}, 5000);
}

function auto_logout_admin() {
	window.location = base_url+"factsuite-admin";
}