
get_yearly_cases();
function get_yearly_cases() { 
 
    var d = new Date();
var today = ('0'+(d.getMonth()+1)).slice(-2) + '/' + ('0'+d.getDate()).slice(-2)  + '/' +  d.getFullYear();
  var comp = today+' - '+today;
  
 
  $.ajax({
    type: "POST",
    url:  base_url+"admin_Product/get_data_yearly", 
    dataType : 'JSON',
    data: {
      is_admin : 1, 
    },
    success: function(data) {
      all_year_get_data(data) 
    }
  });
} 
var pending_case_count_chart ='';
function all_year_get_data(years){   
  var ctx = document.getElementById('year_case_inventoty_chart').getContext('2d');
  var year = [];
  var total = [];
  var hello = [];
  var bbnl = [];
  var tag = '';

  if (years.length > 0) {
    for (var i = 0; i < years.length; i++) {  
      year.push(years[i].monthname);
      total.push(years[i].amount_paid);
      hello.push((years[i].amount_paid/100) * 85);
      bbnl.push((years[i].amount_paid/100) * 15);
      tag = years[i].tag;
    }
  }

  var sales_by_item_count_data  = {
    labels: [
      year 
    ],
    datasets: [{
      label:'Hello Network',
      data: hello,
      backgroundColor :  ['#f56954','#f56954','#f56954','#f56954','#f56954','#f56954'],
    },{
      label:tag,
      data: bbnl,
      backgroundColor :  [ '#00a65a','#00a65a','#00a65a','#00a65a','#00a65a','#00a65a'],
    },{
      label:'Total',
      data: total,
      backgroundColor :  [ '#f39c12','#f39c12','#f39c12','#f39c12','#f39c12','#f39c12'],
    }]
  }

  var sales_by_item_count_options = {
    maintainAspectRatio : false,
    responsive : true,
  };

  if(pending_case_count_chart) {
    pending_case_count_chart.destroy();
  }
 
  pending_case_count_chart = new Chart(ctx, {
    
      type: 'bar',
        data: sales_by_item_count_data,
        beginAtZero: true,
        options: {
            responsive: true,
            /*legend: {
                display: false
            },*/
             maintainAspectRatio     : false,
              datasetFill: false,
           /* title: {
                display: false,
                text: 'Chart.js bar Chart'
            },*/
            animation: {
                animateScale: true
            },
            scales: {
              xAxes: [{
                  stacked: true,
                }],
                yAxes: [{
                      stacked: true,
                    ticks: {
                        beginAtZero: true,
                        callback: function (value) { if (Number.isInteger(value)) { return value; } },
                        stepSize: 1
                    }
                }]
            }
        }  

  });
}


/*
all_year_get_data_inventory();
// custom_revnue
var pending_case_count_chart1 ='';
function all_year_get_data_inventory(){
  var ctx1 = document.getElementById('year_inventoty_chart').getContext('2d');
  
  var sales_by_item_count_data1  = {
    labels: [
      'Chrome',
          'IE',
          'FireFox',
          'Safari',
          'Opera',
          'Navigator',
    ],
    datasets: [{
          data: [700,500,400,600,300,100],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }]
  }

  var sales_by_item_count_options = {
    maintainAspectRatio : false,
    responsive : true,
  };

  if(pending_case_count_chart1) {
    pending_case_count_chart1.destroy();
  }
 
  pending_case_count_chart1 = new Chart(ctx1, {
    // doughnut
    type: 'doughnut',
    data: sales_by_item_count_data1,
    options: sales_by_item_count_options      
 
  });
}
*/
get_revenue();
function get_revenue(){
var duration = $("#duration").val();
  $.ajax({
    type: "POST",
    url:  base_url+"admin_Product/custom_revnue", 
    dataType : 'JSON',
    data: {
      is_admin : 1, 
      duration : duration, 
    },
    success: function(data) {
      if (data !=null) { 
      all_year_get_data1(data) 
      }
    }
  });
}  

// all_year_get_data1();
var pending_case_count_chart1 ='';
function all_year_get_data1(data){   
  var ctx1 = document.getElementById('year_inventoty_chart').getContext('2d');
  var bbnl = '';
  var total = '';
  var hello = ''; 

     total = data.amount;
      hello = (data.amount/100) * 85;
     bbnl =  (data.amount/100) * 15;

  var sales_by_item_count_data1  = {
    labels: [
      'HELLO Network', 
      data.tag,
      'Total'
    ],
    datasets: [{
          data: [hello,bbnl,total],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }]
  }

  var sales_by_item_count_options = {
    maintainAspectRatio : false,
    responsive : true,
  };

  if(pending_case_count_chart1) {
    pending_case_count_chart1.destroy();
  }
 
  pending_case_count_chart1 = new Chart(ctx1, {
    
      type: 'doughnut',
        data: sales_by_item_count_data1,
        beginAtZero: true,
        options: {
            responsive: true,
            /*legend: {
                display: false
            },*/
             maintainAspectRatio     : false,
              datasetFill: false,
           /* title: {
                display: false,
                text: 'Chart.js bar Chart'
            },*/
            animation: {
                animateScale: true
            },
            scales: {
              xAxes: [{
                  stacked: true,
                }],
                yAxes: [{
                      stacked: true,
                    ticks: {
                        beginAtZero: true,
                        callback: function (value) { if (Number.isInteger(value)) { return value; } },
                        stepSize: 1
                    }
                }]
            }
        }  

  });
}

