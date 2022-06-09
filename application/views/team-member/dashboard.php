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
           <a href="<?php echo $this->config->item('my_base_url')?>team-member/add-new-user">
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
           <a href="<?php echo $this->config->item('my_base_url')?>team-member/view-all-orders">
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
           <a href="<?php echo $this->config->item('my_base_url')?>team-member/view-all-products">
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
                  <span style="font-size: 25px;"><b><?php echo round(isset($analytics['total'])?$analytics['total']:0,2); ?></b></span>
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
                   echo round($pr,2); ?></b>  <span>(25%)</span></span>
                </div>
                <div class="col-md-6 text-right">
                  <!-- <i class="fa fa-angle-right"></i> -->
                </div>
              </div>
              <span class="card-pages-name"><?php echo $tag; ?></span>
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
                   echo round($analytics['total'] - $pr,2); ?></b>  <span>(75%)</span></span>
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



           <div class="col-md-12 mt-4">
            <div class="card card-kpi">
              <div class="card-header">
                <div class="row">
                  <div class="col-md-12 pl-0">
                    <!-- <h3 class="card-title pt-2"><span class="analytics-title">Cases<label id="inventory-total"></label></span></h3> -->
                    <h3 class="card-title pt-2"><span class="analytics-title">Revenue Report Chart</span></h3>
                  </div>
                    
                </div>
              </div>
              <div class="card-body">
                <div class="text-center" id="total_active_inventory_error_div"></div>
                <div class="text-center chart-div">
                  <canvas style="height: 350px;!important  width:350px;!important"  id="year_inventoty_chart" class="charts-canvas"></canvas>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

 <script src="<?php echo base_url()?>assets/custom-js/team-member/dashboard.js"></script>