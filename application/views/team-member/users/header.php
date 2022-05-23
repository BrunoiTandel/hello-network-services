<?php
    $new_user_active = '';
    $view_new_user = '';
    $view_all_user = '';
    
    if (strtolower(uri_string()) == 'team-member/add-new-user') {
      $new_user_active = "active";
    } else if (strtolower(uri_string()) == 'team-member/view-new-user') {
      $view_new_user = 'active';
    } else if (strtolower(uri_string()) == 'team-member/view-all-user') {
      $view_all_user = 'active';
    } else {
      $new_user_active = 'active';
    }
?>

      <span class="edit-pages-txt">Users</span>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="content-nav-tabs-container">
          <ul class="nav nav-tabs main-nav-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link nav-link-product-tab nav-link-product-tab-first <?php echo $new_user_active;?>" href="<?php echo $this->config->item('my_base_url')?>team-member/add-new-user">Add New User</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-product-tab <?php echo $view_new_user;?>" href="<?php echo $this->config->item('my_base_url')?>team-member/view-new-user">View My Users</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-product-tab <?php echo $view_all_user;?>" href="<?php echo $this->config->item('my_base_url')?>team-member/view-all-user">View All Users</a>
            </li>
          </ul>