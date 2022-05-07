<?php
    $about_us_active = '';
    $our_journey_active = '';

    if (strtolower(uri_string()) == 'factsuite-admin/about-us') {
      $about_us_active = "active";
    } else if (strtolower(uri_string()) == 'factsuite-admin/our-journey') {
      $our_journey_active = 'active';
    } else {
      $about_us_active = 'active';
    }
?>

      <span class="edit-pages-txt">About Us</span>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="content-nav-tabs-container">
          <ul class="nav nav-tabs main-nav-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link nav-link-product-tab nav-link-product-tab-first <?php echo $about_us_active;?>" href="<?php echo $this->config->item('my_base_url')?>factsuite-admin/about-us">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-product-tab <?php echo $our_journey_active;?>" href="<?php echo $this->config->item('my_base_url')?>factsuite-admin/our-journey">Our Journey</a>
            </li>
          </ul>