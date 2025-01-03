<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/dist/css/jquery.mCustomScrollbar.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/dist/css/animate.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/dist/css/slick.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/dist/css/slick-theme.css"/>

          <span class="edit-pages-txt">Edit Pages</span>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
       <div class="row">

         <div class="col-md-3">
           <a href="<?php echo $this->config->item('my_base_url')?>team-member/add-new-user">
            <div class="edit-pages-a">
              <div class="row">
                <div class="col-md-6">
                  <img src="<?php echo base_url()?>assets/dist/img/sidebar-images/colored-pages.svg">
                </div>
                <div class="col-md-6 text-right">
                  <i class="fa fa-angle-right"></i>
                </div>
              </div>
              <span class="card-pages-name">Users</span>
              <div>
                <span class="card-last-edited-txt">
                  Last edited :  
                </span>
                <span class="card-last-edited-date pl-2" id="home-page-updated-date">-</span>
              </div>
            </div>
           </a>
         </div>

         <div class="col-md-3">
           <a href="<?php echo $this->config->item('my_base_url')?>team-member/view-all-orders">
            <div class="edit-pages-a">
              <div class="row">
                <div class="col-md-6">
                  <img src="<?php echo base_url()?>assets/dist/img/sidebar-images/colored-pages.svg">
                </div>
                <div class="col-md-6 text-right">
                  <i class="fa fa-angle-right"></i>
                </div>
              </div>
              <span class="card-pages-name">Orders</span>
              <div>
                <span class="card-last-edited-txt">
                  Last edited :  
                </span>
                <span class="card-last-edited-date pl-2" id="home-page-updated-date">-</span>
              </div>
            </div>
           </a>
         </div>

         <div class="col-md-3">
           <a href="<?php echo $this->config->item('my_base_url')?>team-member/get-all-reports">
            <div class="edit-pages-a">
              <div class="row">
                <div class="col-md-6">
                  <img src="<?php echo base_url()?>assets/dist/img/sidebar-images/colored-pages.svg">
                </div>
                <div class="col-md-6 text-right">
                  <i class="fa fa-angle-right"></i>
                </div>
              </div>
              <span class="card-pages-name">All Reports</span>
              <div>
                <span class="card-last-edited-txt">
                  Last edited :  
                </span>
                <span class="card-last-edited-date pl-2" id="home-page-updated-date">-</span>
              </div>
            </div>
           </a>
         </div>

         <div class="col-md-3">
           <a href="<?php echo $this->config->item('my_base_url')?>team-member/view-all-products">
            <div class="edit-pages-a">
              <div class="row">
                <div class="col-md-6">
                  <img src="<?php echo base_url()?>assets/dist/img/sidebar-images/colored-pages.svg">
                </div>
                <div class="col-md-6 text-right">
                  <i class="fa fa-angle-right"></i>
                </div>
              </div>
              <span class="card-pages-name">All Data Plans</span>
              <div>
                <span class="card-last-edited-txt">
                  Last edited :  
                </span>
                <span class="card-last-edited-date pl-2" id="home-page-updated-date">-</span>
              </div>
            </div>
           </a>
         </div>

        </div>
      </div>
    </section>
  </div>

<script src="<?php echo base_url()?>assets/custom-js/admin/pages/get-pages-last-updated-date.js"></script>