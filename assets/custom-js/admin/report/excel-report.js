
$('#generate_report').on('click',function(){


	var to = $('#to').val();
	var from = $('#from').val();
	var customer = $('#customer').val();

	var table = $('#table').children('option:selected').val()
	var duration = $('#duration').children('option:selected').val()
	var method = ''

	if(table == 'Users'){
		method = 'daily_user_report'
	}else{
		method = 'daily_order_report'
	}
// 
	var formdata = new FormData();
	formdata.append('duration',duration);
	formdata.append('to',to);
	formdata.append('from',from);
	formdata.append('table',table);


	$.ajax({
	    type: "POST",
	    url: base_url+"dump_Data/"+method+"/",
	    data:formdata,
	    dataType: 'json',
	    contentType: false,
	    processData: false,
	    success: function(data) {  

			// alert(data.path)
			var link=document.createElement('a');
			document.body.appendChild(link);
			link.href=data.path;
			link.click();	
			document.body.removeChild(link);

	    }	
	});
});