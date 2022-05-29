      <!-- <span class="edit-pages-txt">Contact Us</span> -->
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="content-nav-tabs-container">

      <div class="row">

         <div class="col-md-3">
           <a href="<?php echo $this->config->item('my_base_url')?>admin/view-users">
            <div class="edit-pages-a">
              <div class="row">
                <div class="col-md-6">
                  <!-- <img src="<?php echo base_url()?>assets/dist/img/sidebar-images/colored-pages.svg"> -->
                  <h2><?php echo $analytics['user']; ?></h2>
                </div>
                <div class="col-md-6 text-right">
                  <!-- <i class="fa fa-angle-right"></i> -->
                </div>
              </div>
              <span class="card-pages-name">Total Users</span>
              <div>  
              </div>
            </div>
           </a>
         </div>


         <div class="col-md-3">
           <a href="<?php echo $this->config->item('my_base_url')?>admin/view-orders">
            <div class="edit-pages-a">
              <div class="row">
                <div class="col-md-6">
                  <!-- <img src="<?php echo base_url()?>assets/dist/img/sidebar-images/colored-pages.svg"> -->
                  <h2><?php echo $analytics['user_purchased_package']; ?></h2>
                </div>
                <div class="col-md-6 text-right">
                  <!-- <i class="fa fa-angle-right"></i> -->
                </div>
              </div>
              <span class="card-pages-name">Total Orders</span>
              <div>  
              </div>
            </div>
           </a>
         </div>


         <div class="col-md-3">
           <a href="<?php echo $this->config->item('my_base_url')?>admin/all-products">
            <div class="edit-pages-a">
              <div class="row">
                <div class="col-md-6">
                  <!-- <img src="<?php echo base_url()?>assets/dist/img/sidebar-images/colored-pages.svg"> -->
                  <h2><?php echo $analytics['products']; ?></h2>
                </div>
                <div class="col-md-6 text-right">
                  <!-- <i class="fa fa-angle-right"></i> -->
                </div>
              </div>
              <span class="card-pages-name">Products</span>
              <div>  
              </div>
            </div>
           </a>
         </div>
 
         <div class="col-md-3 ">
           <a href="#">
            <div class="edit-pages-a">
              <div class="row">
                <div class="col-md-6">
                  <!-- <img src="<?php echo base_url()?>assets/dist/img/sidebar-images/colored-pages.svg"> -->
                  <span style="font-size: 25px;"><b><?php echo isset($analytics['total'])?$analytics['total']:0; ?></b></span>
                </div>
                <div class="col-md-6 text-right">
                  <!-- <i class="fa fa-angle-right"></i> -->
                </div>
              </div>
              <span class="card-pages-name">Total Revenue</span>
              <div>  
              </div>
            </div>
           </a>
         </div>

         <div class="col-md-3 mt-4">
           <a href="#">
            <div class="edit-pages-a">
              <div class="row">
                <div class="col-md-6">
                  <!-- <img src="<?php echo base_url()?>assets/dist/img/sidebar-images/colored-pages.svg"> -->
                  <span style="font-size: 25px;"><b><?php
                  $pr = ($analytics['total']/100) * 25;
                   echo $pr; ?></b>  <span>(25%)</span></span>
                </div>
                <div class="col-md-6 text-right">
                  <!-- <i class="fa fa-angle-right"></i> -->
                </div>
              </div>
              <span class="card-pages-name">BBNL</span>
              <div>  
              </div>
            </div>
           </a>
         </div>

         <div class="col-md-3 mt-4">
           <a href="#">
            <div class="edit-pages-a">
              <div class="row">
                <div class="col-md-6">
                  <!-- <img src="<?php echo base_url()?>assets/dist/img/sidebar-images/colored-pages.svg"> -->
                  <span style="font-size: 25px;"><b><?php 
                   echo $analytics['total'] - $pr; ?></b>  <span>(75%)</span></span>
                </div>
                <div class="col-md-6 text-right">
                  <!-- <i class="fa fa-angle-right"></i> -->
                </div>
              </div>
              <span class="card-pages-name">Hello Network</span>
              <div>  
              </div>
            </div>
           </a>
         </div>


           <div class="col-md-12 mt-4">
            <div class="card card-kpi">
              <div class="card-header">
                <div class="row">
                  <div class="col-md-12 pl-0">
                    <!-- <h3 class="card-title pt-2"><span class="analytics-title">Cases<label id="inventory-total"></label></span></h3> -->
                    <h3 class="card-title pt-2"><span class="analytics-title">Monthly Report</span></h3>
                  </div>
                    
                </div>
              </div>
              <div class="card-body">
                <div class="text-center" id="total_active_cases_inventory_error_div"></div>
                <div class="text-center chart-div">
                  <canvas style="height: 350px;!important  width:350px;!important"  id="year_case_inventoty_chart" class="charts-canvas"></canvas>
                </div>
              </div>
            </div>
          </div>

</div>
          </div>
          </div>
          </div>
        </div>
      </div>
    </section>
  </div>


  <script>
    

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

  if (years.length > 0) {
    for (var i = 0; i < years.length; i++) {  
      year.push(years[i].monthname);
      total.push(years[i].amount_paid);
      hello.push((years[i].amount_paid/100) * 25);
      bbnl.push((years[i].amount_paid/100) * 75);
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
      label:'BBNL',
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


 
  </script>