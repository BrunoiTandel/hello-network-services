<div class="container">
   <div class="profile-hd" id="profile1">
      <div class="row">
         <div class="col-md-9">
            <h1>Personal Information</h1>
         </div>
         <div class="col-md-3">
            <span id="edit-profile-btn"><button id="edit-profile">Edit</button></span>
         </div>
      </div>
   </div>
   <div class="profile-txt">
      <div class="row">
         <div class="col-md-2">
            <h3>Email ID</h3>
         </div>
         <div class="col-md-4">
            <h4 id="show-user-email-id">-</h4>
         </div>
         <div class="col-md-2">
            <h3>Mobile Number</h3>
         </div>
         <div class="col-md-4">
            <h4 id="show-user-phone-number">-</h4>
         </div>
      </div>
      <div class="row mt-3">
         <div class="col-md-2">
            <h3>First Name</h3>
         </div>
         <div class="col-md-4">
            <h4 id="show-user-first-name">-</h4>
            <input type="text" class="login-fld d-none" placeholder="First Name" id="user-first-name">
            <div class="col-md-12 p-0 text-left" id="user-first-name-error-msg-div"></div>
         </div>
         <div class="col-md-2">
            <h3>Last Name</h3>
         </div>
         <div class="col-md-4">
            <h4 id="show-user-last-name">-</h4>
            <input type="text" class="login-fld d-none" placeholder="Last Name" id="user-last-name">
            <div class="col-md-12 p-0 text-left" id="user-last-name-error-msg-div"></div>
         </div>
      </div>

      <div class="row mt-3">
         <div class="col-md-2">
            <h3>Block</h3>
         </div>
         <div class="col-md-4">
            <h4 id="show-user-block-name">-</h4>
            <input type="text" class="login-fld d-none" placeholder="Block" id="block-name">
            <div class="col-md-12 p-0 text-left" id="block-name-error-msg-div"></div>
         </div>

         <div class="col-md-2">
            <h3>District</h3>
         </div>
         <div class="col-md-4">
            <h4 id="show-user-district-name">-</h4>
            <input type="text" class="login-fld d-none" placeholder="District Name" id="district-name">
            <div class="col-md-12 p-0 text-left" id="district-name-error-msg-div"></div>
         </div>
      </div>

      <div class="row mt-3">
         <div class="col-md-2">
            <h3>Address</h3>
         </div>
         <div class="col-md-4">
            <h4 id="show-user-address">-</h4>
            <textarea class="login-fld d-none" placeholder="Address" id="user-address"></textarea>
            <div class="col-md-12 p-0 text-left" id="user-address-error-msg-div"></div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-6">
            <span>
               <a href="javascript:void(0)" id="LogOutNow1" data-toggle="modal" data-target="#update-password-modal"><i class="fa fa-lock" aria-hidden="true"></i> CHANGE PASSWORD</a>
            </span>
         </div>
         <div class="col-md-6"></div>
      </div>
   </div>
   <div class="user-plan-list">
      <div class="user-plan-list-hdr">Your Plans</div>
      <div class="row">
         <div class="col-md-12">
            <div class="table-responsive">
               <table class="table">
                  <thead class="thead-bd-color">
                     <tr>
                        <th>Sr No.</th>
                        <th>Package Name</th>
                        <th>Package Price</th>
                        <th>Purchased Date</th>
                     </tr>
                  </thead>
                  <tbody class="tbody-datatable">
                     <?php foreach ($purchased_plans as $key => $value) { ?>
                        <tr>
                           <td><?php echo $key + 1;?></td>
                           <td><?php echo json_decode($value['package_details'],true)['product_title'];?></td>
                           <td><?php echo $value['amount_paid'];?></td>
                           <td><?php echo explode(' ',$value['purchased_date'])[0];?></td>
                        </tr>
                     <?php } ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>

<!--- Popup Change Password --->
<div class="modal fade custom-modal" id="update-password-modal">
    <div class="modal-dialog modal-md modal-dialog-centered">
      <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
         </div>
         <div class="modal-body modal-body-custom logoutnow-hd">
            <h1>Change Password</h1>
            <div class="row">
                     <div class="col-md-12 mb-2">
                        <input type="password" class="login-fld" placeholder="Enter Current Password" id="sign-up-current-password">
                        <i toggle="#sign-up-current-password" id="show-hide-current-pswd-icon" class="show-hide-pswd-icon fa fa-eye"></i>
                        <div class="col-md-12 p-0 text-left" id="sign-up-current-password-name-error-msg-div"></div>
                     </div>
                     <div class="col-md-12 mb-2">
                        <input type="password" class="login-fld" placeholder="Enter New Password" id="sign-up-password">
                        <i toggle="#sign-up-password" id="show-hide-pswd-icon" class="show-hide-pswd-icon fa fa-eye"></i>
                        <div class="col-md-12 p-0 text-left" id="sign-up-password-name-error-msg-div"></div>
                     </div>
                     <div class="col-md-12"></div>
               </div>
               <div class="logoutnow-btns">
                  <a class="no" href="javascript:void(0)" class="close" data-dismiss="modal">Cancel</a>
                  <a href="javascript:void(0)" id="change-user-password" class="yes">Update</a>
               </div>
            </div>
        </div>
    </div>
</div>
<!--- Popup Change Password --->

<script src="<?php echo base_url()?>assets/custom-js/user/user-profile.js"></script>