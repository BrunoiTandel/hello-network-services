          <div class="tab-content">
            <div class="tab-pane fade show active"role="tabpanel" aria-labelledby="custom-content-below-home-tab">
              <div class="row">
                <div class="col-md-6">
                  <span class="product-details-span-light">Role Type</span>
                  <input type="text" class="input-txt" name="add-role-type" id="add-role-type" placeholder="Role Type">
                  <div id="add-role-type-error-msg-div"></div>
                </div>
                <div class="col-md-6"></div>
                <div class="col-md-6 mt-4" id="add-role-type-error-msg-div"></div>
                <div class="col-md-6"></div>
                <div class="col-md-4"></div>
                <div class="col-md-2 text-right">
                  <button class="btn btn-add btn-add-2 text-white mt-0" id="add-role-type-btn" name="add-role-type-btn">Save</button>
                </div>
              </div>
              <div class="custom-border mt-5 mb-3"></div>
              <span class="d-block medium-text font-weight-bold">Role List</span>
              <div class="row" id="role-list">
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<!-- View Role Modal Starts -->
  <div class="modal fade" id="view-role-modal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content modal-content-view-collection-category">
        <div class="modal-header border-0">
          <h4 class="modal-title-edit-coupon">Edit Role</h4>
        </div>
        <div class="modal-body modal-body-edit-coupon">
          <div class="row mt-4">
            <div class="col-sm-6">
              <input type="hidden" id="edit-role-id">
              <span class="product-details-span-light">Role Name</span>
              <input type="text" class="input-txt" name="edit-role-name" id="edit-role-name" placeholder="Role Name">
              <div id="edit-role-name-error-msg-div"></div>
            </div>
            <div class="col-sm-12" id="edit-role-error-msg-div"></div>
          </div>
          <div id="view-edit-cancel-btn-div" class="col-md-12 mt-2 text-right">
            <button class="btn btn-default btn-close" data-dismiss="modal">Close</button>
            <button class="btn btn-add btn-update text-white mt-0" id="update-role-btn" name="update-role-btn">Save</button>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- View Role Modal Ends -->

<!-- Delete Role Starts -->
  <div class="modal fade" id="delete-role-modal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content modal-content-view-collection-category">
        <div class="modal-header border-0">
          <h4 class="modal-title-edit-coupon modal-title-delete">Are you sure you want to delete the "<span id="delete-role-name-hdr-span"></span>" role?</h4>
        </div>
        <div class="modal-body modal-body-edit-coupon">
          <div class="row mt-2">
            <div id="view-edit-cancel-btn-div" class="col-md-12 mt-2 text-center">
              <button class="btn btn-default btn-close" data-dismiss="modal">Close</button>
              <button class="btn btn-add btn-danger btn-delete text-white mt-0 modal-btn-gap" id="delete-role-name-btn">Delete</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- Delete Role Ends -->

<script src="<?php echo base_url()?>assets/custom-js/admin/internal-team/manage-role.js"></script>