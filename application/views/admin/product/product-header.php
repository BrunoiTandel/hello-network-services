<?php
    $add_product_active = '';
    $our_journey_active = '';

    if (strtolower(uri_string()) == 'admin/add-product') {
      $add_product_active = "active";
    } else if (strtolower(uri_string()) == 'admin/all-products') {
      $our_journey_active = 'active';
    } else {
      $about_us_active = 'active';
    }
?>

      <span class="edit-pages-txt">Add Data Plans</span>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="content-nav-tabs-container">
          <ul class="nav nav-tabs main-nav-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link nav-link-product-tab nav-link-product-tab-first <?php echo $add_product_active;?>" href="<?php echo $this->config->item('my_base_url')?>admin/add-product">Add Data Plans</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-product-tab <?php echo $our_journey_active;?>" href="<?php echo $this->config->item('my_base_url')?>admin/all-products">All Data Plans</a>
            </li>
          </ul>