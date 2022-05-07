          <div class="tab-content">
            <div class="tab-pane fade show active"role="tabpanel" aria-labelledby="custom-content-below-home-tab">
              <div class="row">
                <div class="col-sm-6">
                  <span class="product-details-span-light">Header Caption</span>
                  <input type="text" class="input-txt" name="header-caption" id="header-caption" placeholder="Header Caption">
                  <div id="header-caption-error-msg-div"></div>
                </div>
                <div class="col-sm-6">
                  <span class="product-details-span-light">Header Sub-heading</span>
                  <input type="text" class="input-txt" name="header-sub-heading" id="header-sub-heading" placeholder="Header Sub-heading">
                  <div id="header-sub-heading-error-msg-div"></div>
                </div>
              </div>
            </div>
            <div class="row mt-4"> 
              <div class="col-sm-6">
                <span class="product-details-span-light">Header Image</span>
                <div class="custom-file-input">
                  <input type="file" id="about-us-header-image" name="about-us-header-image" class="input-file w-50" accept="image/*">
                  <button class="btn btn-file-upload w-50">
                    Upload Image<br>
                    964 x 980 px (Max Size 1Mb)
                  </button>
                </div>
                <div class="row" id="selected-about-us-header-image-div"></div>
              </div>
              <div class="col-sm-12 mt-4" id="about-us-content-error-div"></div>
              <div class="col-sm-10"></div>
              <div class="col-sm-2 text-right">
                <button class="btn btn-add btn-add-2 text-white mt-0" id="update-about-us-content-btn" name="update-about-us-content-btn">Save</button>
            </div>
          </div>
          </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<!-- View About Us Banner Image Modal Starts -->
  <div class="modal fade" id="view-about-us-image-modal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content modal-content-view-collection-category">
        <div class="modal-header border-0">
          <h4 class="modal-title-edit-coupon">About Us Banner Image</h4>
        </div>
        <div class="modal-body modal-body-edit-coupon">
          <div class="row mt-2">
            <div class="col-md-3"></div>
            <div class="col-sm-6">
              <img class="w-100" id="about-us-image-modal-img">
            </div>
            <div id="view-edit-cancel-btn-div" class="col-md-12 mt-2 text-right">
              <button class="btn btn-default btn-close" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- View About Us Banner Image Modal Ends -->

<script src="<?php echo base_url()?>assets/custom-js/admin/about-us/about-us-details.js"></script>