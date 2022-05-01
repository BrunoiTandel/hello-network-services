<?php
    $new_user_active = '';
    $add_team_member_active = '';
    $view_team_members_active = '';
    
    if (strtolower(uri_string()) == 'team-member/add-new-user') {
      $new_user_active = "active";
    } else if (strtolower(uri_string()) == 'admin/add-internal-team-member') {
      $add_team_member_active = 'active';
    } else if (strtolower(uri_string()) == 'admin/view-internal-team-members') {
      $view_team_members_active = 'active';
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
              <a class="nav-link nav-link-product-tab <?php echo $add_team_member_active;?>" href="<?php echo $this->config->item('my_base_url')?>admin/add-internal-team-member">Add Team Member</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-product-tab <?php echo $view_team_members_active;?>" href="<?php echo $this->config->item('my_base_url')?>admin/view-internal-team-members">View Team Members</a>
            </li>
          </ul>