function but_now(e) {
	var options = {
        "key": 'rzp_test_iWywIqHJdZTqgl', // Enter the Key ID generated from the Dashboard    
        "amount": 100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise    
        "currency": "INR",    
        "name": "Hello Service",
        "description": "Purchase Plans",
        "image":'',
        "handler": function (response) {
          	alert(JSON.stringify(response));
        },
        "prefill": {
        	"name": 'Brunoi Tandel',
        	"email": 'tandelbrunoi15@gmail.com',
        	"contact":'8460590981'
        },
        "theme": {
          	"color": "transparent linear-gradient(283deg, #141414 0%, #141414 100%)"
        }
    };
    var rzp1 = new Razorpay(options);
    rzp1.open();
    e.preventDefault();
}