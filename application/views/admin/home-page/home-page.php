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
                <div class="col-sm-6 mt-3">
                  <span class="product-details-span-light">Video Thumbnail Text</span>
                  <input type="text" class="input-txt" name="video-thumbnail-text" id="video-thumbnail-text" placeholder="Video Thumbnail Text">
                  <div id="video-thumbnail-text-error-msg-div"></div>
                </div>
              </div>
            </div>
            <div class="row mt-4"> 
              <div class="col-sm-6">
                <span class="product-details-span-light">Banner Image</span>
                <div class="custom-file-input">
                  <input type="file" id="banner-image" name="banner-image" class="input-file w-50" accept="image/*">
                  <button class="btn btn-file-upload w-50">
                    Upload Image<br>
                    1980 x 1065 px (Max Size 1Mb)
                  </button>
                </div>
                <div class="row" id="selected-banner-image-div"></div>
              </div>
              <div class="col-sm-6">
                <span class="product-details-span-light">Banner Video</span>
                <div class="custom-file-input">
                  <input type="file" id="banner-video" name="banner-video" class="input-file w-50" accept="video/*">
                  <button class="btn btn-file-upload w-50">
                    Upload Video<br>
                    Max Size 20Mb
                  </button>
                </div>
                <div class="row" id="selected-banner-video-div"></div>
              </div>
              <div class="col-sm-6 mt-4">
                <span class="product-details-span-light">Description(We Enable)</span>
                <input type="text" class="input-txt" name="we-enable-description" id="we-enable-description" placeholder="Description(We Enable)">
                <div id="we-enable-description-error-msg-div"></div>
                <div class="row" id="new-we-enable-description"></div>
                <div class="row" id="added-we-enable-description"></div>
              </div>
              <div class="col-sm-1">
                <span class="product-details-span-light">&nbsp;</span>
                <button class="btn btn-add btn-add-orange" id="add-we-enable-description-btn" name="add-we-enable-description-btn">Add</button>
              </div>
              <div class="col-sm-12 mt-4" id="update-home-page-error-div"></div>
                <div class="col-sm-10"></div>
                <div class="col-sm-2 text-right">
                  <button class="btn btn-add btn-add-2 text-white mt-0" id="update-home-page-content-btn" name="update-home-page-content-btn">Save</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<!-- View Banner Image / Video Modal Starts -->
  <div class="modal fade" id="view-banner-image-or-video-modal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content modal-content-view-collection-category">
        <div class="modal-header border-0">
          <h4 class="modal-title-edit-coupon">Banner <span id="banner-image-or-model-hdr-span"></span></h4>
        </div>
        <div class="modal-body modal-body-edit-coupon">
          <div class="row mt-2">
            <div class="col-md-3"></div>
            <div class="col-sm-6" id="banner-image-or-video-modal-div">
              <img class="w-100" >
            </div>
            <div id="view-edit-cancel-btn-div" class="col-md-12 mt-2 text-right">
              <button class="btn btn-default btn-close" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- View Banner Image / Video Modal Ends -->

<!-- View We Enabled Description Modal Starts -->
  <div class="modal fade" id="view-we-enabled-description-modal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content modal-content-view-collection-category">
        <div class="modal-header border-0">
          <h4 class="modal-title-edit-coupon">We Enable Description</h4>
        </div>
        <div class="modal-body modal-body-edit-coupon">
          <div class="row">
            <div class="col-sm-12">
              <span class="product-details-span-light">Description(We Enable)</span>
              <input type="text" class="input-txt" name="edit-we-enable-description" id="edit-we-enable-description" placeholder="Description(We Enable)">
              <div id="edit-we-enable-description-error-msg-div"></div>
            </div>
            <div class="col-sm-12" id="edit-we-enable-description-main-error-msg-div"></div>
          </div>
          <div id="view-edit-cancel-btn-div" class="col-md-12 mt-2 text-right">
            <button class="btn btn-default btn-close" data-dismiss="modal">Close</button>
            <button class="btn btn-add btn-update text-white mt-0 modal-btn-gap" id="update-edit-we-enable-description-btn" name="update-edit-we-enable-description-btn">Save</button>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- View We Enabled Description Modal Ends -->

<!-- Delete We Enabled Description Modal Starts -->
  <div class="modal fade" id="delete-we-enabled-description-modal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content modal-content-view-collection-category">
        <div class="modal-header border-0">
          <h4 class="modal-title-edit-coupon modal-title-delete">Are you sure you want to delete the <span id="delete-we-enabled-description-hdr-span"></span> Description?</h4>
        </div>
        <div class="modal-body modal-body-edit-coupon">
          <div class="row mt-2">
            <div class="col-md-3"></div>
            <div class="col-sm-6">
              <img class="w-100" id="gse-or-mhe-image-modal-img">
            </div>
            <div id="view-edit-cancel-btn-div" class="col-md-12 mt-2 text-center">
              <button class="btn btn-default btn-close" data-dismiss="modal">Close</button>
              <button class="btn btn-add btn-danger btn-delete text-white mt-0 modal-btn-gap" id="delete-we-enabled-description-btn">Delete</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- Delete We Enabled Description Modal Ends -->

<script src="<?php echo base_url()?>assets/custom-js/admin/home-page/home-page-details.js"></script>