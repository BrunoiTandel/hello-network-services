<?php 
  extract($_GET);
  
  $pages = '';
  $dashboard = '';
  $website_services = '';
  $payment_gateway = '';
  
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
  
  if (strtolower(uri_string()) == 'team-member/pages'
      || strtolower(uri_string()) == 'team-member/add-new-user') {
    $pages = 'active';
    $pages_img = 'colored-pages.svg';
  }  else if (strtolower(uri_string()) == 'team-member/add-website-services') {
    $website_services = 'active';
    $website_services_img = 'colored-globe.png';
  } else if (strtolower(uri_string()) == 'factsuite-team-member/payment-gateway') {
    $payment_gateway = 'active';
    $payment_gateway_img = 'colored-payment.svg';
  } else {
    $dashboard_img = 'colored-dashboard.svg';
    $dashboard = 'active';
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
    <a href="<?php echo $this->config->item('my_base_url')?>admin/pages" class="brand-link">
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

          <li class="nav-item d-none" title="Dashboard">
            <a href="<?php echo $this->config->item('my_base_url')?>factsuite-admin/dashboard" class="sidebar-nav nav-link text-center <?php echo $dashboard; ?>">
              <span class="d-block sidebar-nav-link-img">
                <img src="<?php echo base_url()?>assets/dist/img/sidebar-images/<?php echo $dashboard_img; ?>">
              </span>
              <span class="d-block sidebar-nav-link-name">Dashboard</span>
            </a>
          </li>

          <li class="nav-item" title="Pages">
            <a href="<?php echo $this->config->item('my_base_url')?>team-member/pages" class="sidebar-nav nav-link text-center <?php echo $pages; ?>">
              <span class="d-block sidebar-nav-link-img">
                <img src="<?php echo base_url()?>assets/dist/img/sidebar-images/<?php echo $pages_img; ?>">
              </span>
              <span class="d-block sidebar-nav-link-name">Pages</span>
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