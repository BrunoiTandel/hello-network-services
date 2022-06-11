function but_now(e) {
    var formdata = new FormData();
    formdata.append('verify_user_request',1);
    formdata.append('package_id',package_id);
    $.ajax({
        type : "POST",
        url : base_url+"user/purchase-package",
        data : formdata,
        dataType : 'json',
        contentType : false,
        processData : false,
        success: function(data) {
            if (data.status == 1) {
                if (data.purchase_package_details.status == 1) {
                    var options = {
                        "key": data.purchase_package_details.purchase_package_details.payment_key,
                        "amount": data.purchase_package_details.purchase_package_details.package_payment_amount,
                        "currency": "INR",    
                        "name": "Hello Service",
                        "description": "Purchase Plans",
                        "image":'',
                        "handler": function (response) {
                            var variable_array = {};
                            variable_array['package_id'] = package_id;
                            variable_array['response'] = response;
                            variable_array['package_amount'] = data.purchase_package_details.purchase_package_details.package_payment_amount;
                            variable_array['gst_applied'] = data.purchase_package_details.purchase_package_details.gst_percentage;
                            store_purchased_package(variable_array);
                        },
                        "prefill": {
                            "name": data.purchase_package_details.purchase_package_details.user_details.name,
                            "email": data.purchase_package_details.purchase_package_details.user_details.email_id,
                            "contact": data.purchase_package_details.purchase_package_details.user_details.mobile_number
                        },
                        "theme": {
                            "color": "transparent linear-gradient(283deg, #141414 0%, #141414 100%)"
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
                    e.preventDefault();
                } else {
                    toastr.warning('You have selected wrong package. Please select the correct package.');
                }
            } else {
                open_sign_in_modal();
            }
        },
        error: function(data) {
            toastr.error('Something went wrong while purchasing the package. Please try again.');
        }
    });
}

function store_purchased_package(variable_array) {
    var formdata = new FormData();
    formdata.append('verify_user_request',1);
    formdata.append('package_id',variable_array.package_id);
    formdata.append('razorpay_payment_id',variable_array.response.razorpay_payment_id);
    formdata.append('package_amount',variable_array.package_amount);
    formdata.append('gst_applied',variable_array.gst_applied);

    $.ajax({
        type : "POST",
        url : base_url+"user/store-purchased-package-details",
        data : formdata,
        dataType : 'json',
        contentType : false,
        processData : false,
        success: function(data) {
            if (data.status == 1) {
                if (data.purchase_package_details.status == 1) {
                    toastr.success('A new package has been purchased successfully. Thank you for purchasing.');
                } else {
                    toastr.warning('You have selected wrong package. Please select the correct package.');
                }
            } else {
                open_sign_in_modal();
            }
        },
        error: function(data) {
            toastr.error('Something went wrong while purchasing the package. Please try again.');
        }
    });
}