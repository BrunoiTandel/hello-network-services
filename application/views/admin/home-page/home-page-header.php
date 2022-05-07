<?php
    $home_page_content_active = '';
    $client_logo_active = '';
    $add_testimonials_active = '';
    $all_testimonials_active = '';

    if (strtolower(uri_string()) == 'admin/home-page') {
      $home_page_content_active = "active";
    } else if (strtolower(uri_string()) == 'admin/client-logo') {
      $client_logo_active = 'active';
    } else if (strtolower(uri_string()) == 'admin/add-testimonials') {
      $add_testimonials_active = 'active';
    } else if (strtolower(uri_string()) == 'admin/all-testimonials') {
      $all_testimonials_active = 'active';
    } else {
      $home_page_content_active = 'active';
    }
?>

      <span class="edit-pages-txt">Testimonials Content</span>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="content-nav-tabs-container">
          <ul class="nav nav-tabs main-nav-tab" role="tablist">
            <li class="nav-item d-none">
              <a class="nav-link nav-link-product-tab nav-link-product-tab-first <?php echo $home_page_content_active;?>" href="<?php echo $this->config->item('my_base_url')?>factsuite-admin/home-page">Home Page Content</a>
            </li>
            <li class="nav-item d-none">
              <a class="nav-link nav-link-product-tab <?php echo $client_logo_active;?>" href="<?php echo $this->config->item('my_base_url')?>factsuite-admin/client-logo">Client Logo</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-product-tab <?php echo $add_testimonials_active;?>" href="<?php echo $this->config->item('my_base_url')?>admin/add-testimonials">Add Testimonials</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-product-tab <?php echo $all_testimonials_active;?>" href="<?php echo $this->config->item('my_base_url')?>admin/all-testimonials">All Testimonials</a>
            </li>
          </ul>