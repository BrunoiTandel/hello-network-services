<!--Content-->
<section id="pg-hdr">
   <div class="container-fluid">
      <div class="pg-hdr-mn">
          <div id="FS-candidate-mn" class="add-team">
           
         </div>
      </div>
   </div>
</section>
 
  <div class="pg-cnt">
     <div id="FS-candidate-cnt"  class="FS-candidate-cnt">
         <!-- <h3>Case Export</h3> -->
          <section class="content">
        
      <div class="container mt-4">
        <div class="error-data"></div>
        <div class="row mt-4">  
        <div class="col-md-12">
          <div class="payment-gst-container mt-4">
            <span class="d-block medium-text">Generate  Report</span>
              <!-- <form autocomplete="off" action="?/SaleReport/daily_sale_report" method="POST"> -->
            <div class="row mt-3 mr-4">
              <div class="col-md-12">
                <span class="product-details-span-light">Report Name </span>
                <select class="form-control input-txt" name="table" id="table">
                  <option >Users</option>
                  <option >Orders</option> 
                </select>
              </div>
              <div class="col-md-12 mt-3">
                <span class="product-details-span-light">Report Period</span>
                <select class="form-control input-txt" required name="duration" id="duration">
                  <!-- <option selected value="">Select Duration</option> -->
                  <option value="all">ALL</option>
                  <option value="today">Today</option>
                  <option value="week">Weekly</option>
                  <option value="month">Monthly</option>
                  <option value="year">Yearly</option>
                  <option value="between">Between Date</option>
                </select>
              </div>
              <div class="col-md-12 mt-3" id="duration-date" style="display: none;">
                <span class="product-details-span-light d-block">Report Period</span>
                <div class="row">
                  <div class="col-md-6">
                    <span class="product-details-span-light">From</span>
                    <input class="form-control input-txt mdate" type="text" name="from" id="from" value="">
                  </div>
                  <div class="col-md-6">
                    <span class="product-details-span-light">To</span>
                    <input class="form-control input-txt mdate" type="text" name="to" id="to" value="">
                  </div>
                </div>
              </div>
              <div class="col-md-12 mt-3 text-right">
                <button class="btn btn-success text-white" id="generate_report" name="generate_report">Generate</button>
              </div>
            </div>
          <!-- </form> -->
          </div>
        </div>
      </div>
      </div>
    </section>    
        
<!--Content-->
<script src="<?php echo base_url();?>assets/custom-js/admin/report/excel-report.js"></script>
  <script>
    $('#duration').change(function(){
    var duration = $('#duration').val();
    if (duration == 'between') {
      $("#duration-date").show();
    } else {
      $("#duration-date").hide();
    }
});

$('#from').val('');
$('#to').val('');
  </script>

 