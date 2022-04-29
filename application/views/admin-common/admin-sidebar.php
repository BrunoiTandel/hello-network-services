<?php 
  extract($_GET);
  
  $pages = '';
  $product = '';
  $enquiries = '';
  $payment_gateway = '';
  $dashboard = '';
  $website_services = '';
  $website_faq = '';
  $general_settings = '';

  $content_img = 'home.svg';
  $product_img = 'product.svg';
  $dashboard_img = 'dashboard.svg';
  $settings_img = 'gear.png';
  $pages_img = 'pages.svg';
  $website_services_img = 'globe.png';
  $payment_gateway_img = 'payment.svg';
  $website_faq_img = 'faq.png';
  $general_settings_img = 'gear.png';

  $check_event_id = '';

  if (isset($event_id)) {
    $check_event_id = '/'.$event_id;
  }
  
  if (strtolower(uri_string()) == 'factsuite-admin/pages' 
    || strtolower(uri_string()) == 'factsuite-admin/home-page' 
    || strtolower(uri_string()) == 'factsuite-admin/client-logo' 
    || strtolower(uri_string()) == 'factsuite-admin/add-job' 
    || strtolower(uri_string()) == 'factsuite-admin/all-jobs' 
    || strtolower(uri_string()) == 'factsuite-admin/careers-page' 
    || strtolower(uri_string()) == 'factsuite-admin/about-us' 
    || strtolower(uri_string()) == 'factsuite-admin/our-journey' 
    || strtolower(uri_string()) == 'factsuite-admin/contact-us' 
    || strtolower(uri_string()) == 'factsuite-admin/add-blog' 
    || strtolower(uri_string()) == 'factsuite-admin/all-blogs'
    || strtolower(uri_string()) == 'factsuite-admin/add-testimonials'
    || strtolower(uri_string()) == 'factsuite-admin/all-testimonials') {
    $pages = 'active';
    $pages_img = 'colored-pages.svg';
  } else if (strtolower(uri_string()) == 'factsuite-admin/add-website-services' 
    || strtolower(uri_string()) =='factsuite-admin/all-website-services'
    || strtolower(uri_string()) =='factsuite-admin/add-website-package'
    || strtolower(uri_string()) =='factsuite-admin/add-website-package-component-details'
    || strtolower(uri_string()) =='factsuite-admin/add-website-package-alacarte-component-details'
    || strtolower(uri_string()) =='factsuite-admin/all-website-packages'
    || strtolower(uri_string()) =='factsuite-admin/edit-website-package-details'
    || strtolower(uri_string()) =='factsuite-admin/edit-website-package-components'
    || strtolower(uri_string()) =='factsuite-admin/edit-website-package-alacarte-component-details') {
    $website_services = 'active';
    $website_services_img = 'colored-globe.png';
  } else if (strtolower(uri_string()) == 'factsuite-admin/add-service-faq' 
    || strtolower(uri_string()) == 'factsuite-admin/all-service-faq' 
    || strtolower(uri_string()) == 'factsuite-admin/add-package-faq' 
    || strtolower(uri_string()) == 'factsuite-admin/all-package-faq' 
    || strtolower(uri_string()) == 'factsuite-admin/view-all-events-case-studies'.$check_event_id) {
    $website_faq = 'active';
    $website_faq_img = 'colored-faq.png';
  } else if (strtolower(uri_string()) == 'factsuite-admin/payment-gateway') {
    $payment_gateway = 'active';
    $payment_gateway_img = 'colored-payment.svg';
  } else if (strtolower(uri_string()) == 'factsuite-admin/terms-and-conditions' 
    || strtolower(uri_string()) == 'factsuite-admin/privacy-policy' 
    || strtolower(uri_string()) == 'factsuite-admin/cancellation-policy') {
    $general_settings = 'active';
    $general_settings_img = 'colored-gear.png';
  } else {
    $dashboard_img = 'colored-dashboard.svg';
    $dashboard = 'active';
  }

  if(isset($product_category)) {
    $content = '';
    $product = 'active';
    $product_img = 'coloured-product.svg';
  }
?>

<body class="sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light fixed-top">

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link pt-1 pr-1">
          <img src="<?php echo base_url()?>assets/dist/img/admin-img/dummy.svg" class="admin-img-hdr">
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $this->config->item('my_base_url')?>factsuite-admin/logout">
          <span class="header-admin-greetings logout-fa"><i class="fa fa-power-off" aria-hidden="true"></i></span>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar">
    <!-- Brand Logo -->
    <a href="<?php echo $this->config->item('my_base_url')?>factsuite-admin/dashboard" class="brand-link">
      <img src="<?php echo base_url()?>assets/dist/img/logo/logo.png" alt="Logo" class="brand-image">
      <span class="brand-text font-weight-light">&nbsp;</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
      </div>

      <!-- Sidebar Menu -->
      <nav class="custom-sidebar-nav-menu">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item" title="Dashboard">
            <a href="<?php echo $this->config->item('my_base_url')?>factsuite-admin/dashboard" class="sidebar-nav nav-link text-center <?php echo $dashboard; ?>">
              <span class="d-block sidebar-nav-link-img">
                <img src="<?php echo base_url()?>assets/dist/img/sidebar-images/<?php echo $dashboard_img; ?>">
              </span>
              <span class="d-block sidebar-nav-link-name">Dashboard</span>
            </a>
          </li>

          <li class="nav-item" title="Pages">
            <a href="<?php echo $this->config->item('my_base_url')?>factsuite-admin/pages" class="sidebar-nav nav-link text-center <?php echo $pages; ?>">
              <span class="d-block sidebar-nav-link-img">
                <img src="<?php echo base_url()?>assets/dist/img/sidebar-images/<?php echo $pages_img; ?>">
              </span>
              <span class="d-block sidebar-nav-link-name">Pages</span>
            </a>
          </li>

          <li class="nav-item d-none" title="Product">
            <a href="<?php echo $this->config->item('my_base_url')?>factsuite-admin/add-product" class="sidebar-nav nav-link text-center <?php echo $product; ?>">
              <span class="d-block sidebar-nav-link-img">
                <img src="<?php echo base_url()?>assets/dist/img/sidebar-images/<?php echo $product_img; ?>">
              </span>
              <span class="d-block sidebar-nav-link-name">Products</span>
            </a>
          </li>

          <li class="nav-item sidebar-nav-item-mrgn" title="Services">
            <a href="<?php echo $this->config->item('my_base_url')?>factsuite-admin/add-website-services" class="sidebar-nav nav-link text-center <?php echo $website_services; ?>">
              <span class="d-block sidebar-nav-link-img">
                <img src="<?php echo base_url()?>assets/dist/img/sidebar-images/<?php echo $website_services_img; ?>">
              </span>
              <span class="d-block sidebar-nav-link-name">Services</span>
            </a>
          </li>

          <li class="nav-item sidebar-nav-item-mrgn" title="FAQs">
            <a href="<?php echo $this->config->item('my_base_url')?>factsuite-admin/add-package-faq" class="sidebar-nav nav-link text-center <?php echo $website_faq; ?>">
              <span class="d-block sidebar-nav-link-img">
                <img src="<?php echo base_url()?>assets/dist/img/sidebar-images/<?php echo $website_faq_img; ?>">
              </span>
              <span class="d-block sidebar-nav-link-name">FAQs</span>
            </a>
          </li>

          <li class="nav-item sidebar-nav-item-mrgn" title="Payment Gateway">
            <a href="<?php echo $this->config->item('my_base_url')?>factsuite-admin/payment-gateway" class="sidebar-nav nav-link text-center <?php echo $payment_gateway; ?>">
              <span class="d-block sidebar-nav-link-img">
                <img src="<?php echo base_url()?>assets/dist/img/sidebar-images/<?php echo $payment_gateway_img; ?>">
              </span>
              <span class="d-block sidebar-nav-link-name">Payment Gateway</span>
            </a>
          </li>

          <li class="nav-item sidebar-nav-item-mrgn" title="General Settings">
            <a href="<?php echo $this->config->item('my_base_url')?>factsuite-admin/terms-and-conditions" class="sidebar-nav nav-link text-center <?php echo $general_settings; ?>">
              <span class="d-block sidebar-nav-link-img">
                <img src="<?php echo base_url()?>assets/dist/img/sidebar-images/<?php echo $general_settings_img; ?>">
              </span>
              <span class="d-block sidebar-nav-link-name">Settings</span>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">