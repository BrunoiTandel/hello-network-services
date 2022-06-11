
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
	variable_array['ajax_call_url'] = 'admin/change-order-status';
	variable_array['checkbox_id'] = '#change_product_status_'+product_id;
	variable_array['onclick_method_name'] = 'change_product_status';
	variable_array['success_message'] = 'order status has been updated successfully.';
	variable_array['error_message'] = 'Something went wrong updating the order status. Please try again.';
	variable_array['error_callback_function'] = 'get_all_products()';
	variable_array['ajax_pass_data'] = {verify_admin_request : 1, id : product_id, changed_status : changed_product_status};

	return change_status(variable_array);
}
