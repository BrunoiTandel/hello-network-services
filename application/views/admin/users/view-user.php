
      <span class="edit-pages-txt">Users Details</span>
          </div>
        </div>
      </div>
    </div>
 
    <section class="content">
      <div class="container-fluid">
        <div class="content-nav-tabs-container"> 
          <div class="add-team-bx border p-2 m-3 bg-white">
            <div id="error-client"></div>
          <h5>Bulk Upload</h5>
          <input type="file" class="fld" name="excel_upload" id="add-bulk-upload-case">
          <button type="button" onclick="import_excel()" class="btn btn-add text-white">Excel Data Submit</button> 
        </div>
        <div class="tab-content mt-0">
            <div class="tab-pane fade show active bg-white p-2"role="tabpanel" aria-labelledby="custom-content-below-home-tab">  
                  <table class="table-fixed table table-striped datatable1" id="example1">
               <thead class="table-fixed-thead thead-bd-color">
                  <tr>
                     <!-- <th>Sr No.Case&nbsp;Id</th>  --> 
                     <th>Sr No.</th>   
                     <th>User&nbsp;Name</th>  
                     <th>User&nbsp;Mobile Number</th>  
                     <th>Password</th>  
                     <th>User&nbsp;Email</th>  
                     <th>User&nbsp;IP</th>  
                     <th>Created Date</th>  
                     <th>User Status</th>  
                     <th>View&nbsp;Details</th>
                     <!-- <th>Actions</th> -->
                  </tr>
               </thead>
               <!-- id="get-case-data-1" -->
               <tbody class="table-fixed-tbody tbody-datatable " id="get-case-data">
                  <?php 
                     if (count($users)) {
                        $n = 1;
                       foreach ($users as $key => $value) { 
                        $status = '<span class="text-danger">'.$value['status'].'</span>';
                        if ($value['status'] =='online') {
                            $status = '<span class="text-success">'.$value['status'].'</span>';
                        }
                          echo '<tr>';
                          echo '<td>'.($n++).'</td>';
                          echo '<td>'.$value['full_name'].'</td>';
                          echo '<td>'.$value['phone'].'</td>';
                          echo '<td>'.$value['password'].'</td>';
                          echo '<td>'.$value['email'].'</td>';
                          echo '<td>'.$value['ip_address'].'</td>';
                          echo '<td>'.$value['u_created_date'].'</td>';
                          echo '<td>'.$status.'</td>';
                          echo '<td><a href="#" onclick="view_user_details('.$value['uid'].')"><i class="fa fa-eye"></i></a></td>';
                            
                          echo '</tr>';
                       }
                     }
                  ?>
               </tbody>
            </table>  
          </div>

          </div>
        </div>
      </div>
    </section>
  </div>



<!-- View Blog Details Modal Starts -->
  <div class="modal fade" id="view-user-details-model">
    <div class="modal-dialog modal-xl modal-dialog-centered">
      <div class="modal-content modal-content-view-collection-category">
        <div class="modal-header border-0">
          <h4 class="modal-title-edit-coupon">User Details</h4>
        </div>
        <div class="modal-body modal-body-edit-coupon">
          <div class="row">
            <div class="col-sm-4">
              <span class="product-details-span-light">User ID</span>
              <input type="text" disabled class="input-txt" name="user-id" id="user-id" placeholder="User ID">
              <div id="blog-title-error-msg-div"></div>
            </div>

            <div class="col-sm-4">
              <span class="product-details-span-light">User Name</span>
              <input type="text" class="input-txt" name="user-name" id="user-name" placeholder="User Name">
              <div id="user-name-error-msg-div"></div>
            </div>

            <div class="col-sm-4">
              <span class="product-details-span-light">Name</span>
              <input type="text" class="input-txt" name="name" id="name" placeholder="Name">
              <div id="name-error-msg-div"></div>
            </div>

            <div class="col-sm-4">
              <span class="product-details-span-light">Phone</span>
              <input type="text" class="input-txt" name="phone" id="phone" placeholder="Phone">
              <div id="phone-error-msg-div"></div>
            </div>

            <div class="col-sm-4">
              <span class="product-details-span-light">Email</span>
              <input type="text" class="input-txt" name="email" id="email" placeholder="Email">
              <div id="email-error-msg-div"></div>
            </div>

            <div class="col-sm-4">
              <span class="product-details-span-light">ID Proof</span>
              <input type="text" class="input-txt" name="id-proof" id="id-proof" placeholder="ID Proof">
              <div id="id-proof-error-msg-div"></div>
            </div>

            <div class="col-sm-4">
              <span class="product-details-span-light">Address</span>
              <textarea class="input-txt" id="address" placeholder="Address"></textarea>
              <div id="address-error-msg-div"></div>
            </div>


            <div class="col-sm-4">
              <span class="product-details-span-light">Note</span>
              <textarea class="input-txt" id="note" placeholder="Note"></textarea>
              <div id="note-error-msg-div"></div>
            </div>

            <div class="col-sm-4">
              <span class="product-details-span-light">Bandwidth</span>
              <input type="text" disabled class="input-txt" name="bandwidth" id="bandwidth" placeholder="Bandwidth">
              <div id="bandwidth-error-msg-div"></div>
            </div>

            <div class="col-sm-4">
              <span class="product-details-span-light">Start Date</span>
              <input type="text" class="input-txt" name="start-date" id="start-date" placeholder="Start Date">
              <div id="start-date-error-msg-div"></div>
            </div>

            <div class="col-sm-4">
              <span class="product-details-span-light">End Date</span>
              <input type="text" class="input-txt" name="end-date" id="end-date" placeholder="End Date">
              <div id="end-date-error-msg-div"></div>
            </div>

            <div class="col-sm-4">
              <span class="product-details-span-light">MAC Vendor</span>
              <input type="text" disabled class="input-txt" name="mac-vendor" id="mac-vendor" placeholder="MAC Vendor">
              <div id="mac-vendor-error-msg-div"></div>
            </div>

            <div class="col-sm-4">
              <span class="product-details-span-light">Tag</span>
              <input type="text" class="input-txt" name="tag" id="tag" placeholder="Tag">
              <div id="tag-error-msg-div"></div>
            </div>

            <div class="col-sm-4">
              <span class="product-details-span-light">Zone</span>
              <input type="text" class="input-txt" name="zone" id="zone" placeholder="Zone">
              <div id="zone-error-msg-div"></div>
            </div>

            <div class="col-sm-4">
              <span class="product-details-span-light">Connection Type</span>
              <select class="input-txt" id="connection-type">
                  <option>Goverment</option>
                  <option>Individual</option>
              </select>
              <div id="connection-type-error-msg-div"></div>
            </div>


            <div class="col-sm-4">
              <span class="product-details-span-light">Bill</span>
              <input type="text" class="input-txt" name="bill" id="bill" placeholder="Bill">
              <div id="bill-error-msg-div"></div>
            </div>


            <div class="col-sm-4">
              <span class="product-details-span-light">Due</span>
              <input type="text" class="input-txt" name="due" id="due" placeholder="Due">
              <div id="due-error-msg-div"></div>
            </div>

            <div class="col-sm-4">
              <span class="product-details-span-light">Status</span>
              <input type="text" class="input-txt" name="status" id="status" placeholder="Status">
              <div id="status-error-msg-div"></div>
            </div>

        </div>
          <div class="row">
            <div class="col-md-12" id="blog-error-div"></div>
            <div id="view-edit-cancel-btn-div" class="col-md-12 mt-2 text-right">
              <button class="btn btn-default btn-close" data-dismiss="modal">Close</button>
              <button class="btn btn-add btn-update text-white mt-0" id="update-user-btn" name="update-user-btn">Update</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- View Blog Details Modal Ends -->

<script src="<?php echo base_url()?>assets/custom-js/admin/internal-team/add-new-team-member.js"></script>