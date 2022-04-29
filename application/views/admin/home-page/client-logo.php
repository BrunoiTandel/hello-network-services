          <div class="tab-content">
            <div class="tab-pane fade show active"role="tabpanel" aria-labelledby="custom-content-below-home-tab">
              <div class="row">
                <div class="col-sm-3">
                  <span class="product-details-span-light">Client Logo</span>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-3">
                  <span class="product-details-span-light">Client Name</span>
                </div>
                <div class="col-sm-5"></div>
              </div>
              <div class="row">
                <div class="col-sm-3">
                  <div class="custom-file-input">
                    <input type="file" id="new-client-logo-image" name="new-client-logo-image" class="input-file w-100" accept="image/*">
                    <button class="btn btn-file-upload w-100">
                      Upload Image<br>
                      210 x 90 px (Max Size 1Mb)
                    </button>
                  </div>
                  <div class="row" id="selected-new-client-logo-image-div"></div>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-3">
                  <input type="text" class="input-txt" name="client-name" id="client-name" placeholder="Client Name">
                  <div id="client-name-error-msg-div"></div>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-3">
                  <button class="btn btn-add btn-add-2 text-white mt-0" id="add-client-logo-btn" name="add-client-logo-btn">Add</button>
                </div>
                <div class="col-sm-12" id="add-new-client-logo-error-msg-div"></div>
              </div>
              <div class="custom-border mt-5 mb-3"></div>
              <span class="d-block medium-text font-weight-bold">Client List</span>
              <div class="row" id="clients-list"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<!-- View Client Logo Modal Starts -->
  <div class="modal fade" id="view-client-logo-modal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content modal-content-view-collection-category">
        <div class="modal-header border-0">
          <h4 class="modal-title-edit-coupon">Client Logo</h4>
        </div>
        <div class="modal-body modal-body-edit-coupon">
          <input type="hidden" name="edit-client-id" id="edit-client-id">
          <div class="row mt-2">
            <div class="col-md-3"></div>
            <div class="col-sm-6">
              <img class="w-100" id="client-logo-modal-img">
            </div>
          </div>
          <div class="row mt-4">
            <div class="col-sm-12 mb-3">
              <h4 class="modal-title-edit-coupon">Edit Client Logo</h4>
            </div>
            <div class="col-sm-6">
              <span class="product-details-span-light">Client Logo</span>
              <div class="custom-file-input">
                <input type="file" id="edit-client-logo-image" name="edit-client-logo-image" class="input-file w-100" accept="image/*">
                <button class="btn btn-file-upload w-100">
                  Upload Image<br>
                  210 x 90 px (Max Size 1Mb)
                </button>
              </div>
              <div class="row" id="selected-edit-client-logo-image-div"></div>
            </div>
            <div class="col-sm-6">
              <span class="product-details-span-light">Client Name</span>
              <input type="text" class="input-txt" name="edit-client-name" id="edit-client-name" placeholder="Client Name">
              <div id="edit-client-name-error-msg-div"></div>
            </div>
            <div class="col-sm-12" id="edit-client-logo-error-msg-div"></div>
          </div>
          <div id="view-edit-cancel-btn-div" class="col-md-12 mt-2 text-right">
            <button class="btn btn-default btn-close" data-dismiss="modal">Close</button>
            <button class="btn btn-add btn-update text-white mt-0" id="update-client-logo-btn" name="update-client-logo-btn">Save</button>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- View Client Logo Image Modal Ends -->

<!-- Delete Client Logo Modal Starts -->
  <div class="modal fade" id="delete-client-logo-modal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content modal-content-view-collection-category">
        <div class="modal-header border-0">
          <h4 class="modal-title-edit-coupon modal-title-delete">Are you sure you want to delete the "<span id="delete-client-name-hdr-span"></span>" client logo?</h4>
        </div>
        <div class="modal-body modal-body-edit-coupon">
          <div class="row mt-2">
            <div class="col-md-3"></div>
            <div class="col-sm-6">
              <img class="w-100" id="gse-or-mhe-image-modal-img">
            </div>
            <div id="view-edit-cancel-btn-div" class="col-md-12 mt-2 text-center">
              <button class="btn btn-default btn-close" data-dismiss="modal">Close</button>
              <button class="btn btn-add btn-danger btn-delete text-white mt-0 modal-btn-gap" id="delete-client-logo-btn">Delete</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- Delete Client Logo Modal Ends -->

<script src="<?php echo base_url()?>assets/custom-js/admin/client-logo/add-new-client-logo.js"></script>
<script src="<?php echo base_url()?>assets/custom-js/admin/client-logo/all-client-logo.js"></script>