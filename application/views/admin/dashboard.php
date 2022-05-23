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

         <div class="col-md-3">
           <a href="<?php echo $this->config->item('my_base_url')?>admin/internal-team-role">
            <div class="edit-pages-a">
              <div class="row">
                <div class="col-md-6">
                  <!-- <img src="<?php echo base_url()?>assets/dist/img/sidebar-images/colored-pages.svg"> -->
                  <h2><?php echo $analytics['internal_team_member']; ?></h2>
                </div>
                <div class="col-md-6 text-right">
                  <!-- <i class="fa fa-angle-right"></i> -->
                </div>
              </div>
              <span class="card-pages-name">Internal Team</span>
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
                  <span style="font-size: 25px;"><b><?php echo $analytics['total']; ?></b></span>
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

</div>
          </div>
          </div>
          </div>
        </div>
      </div>
    </section>
  </div>