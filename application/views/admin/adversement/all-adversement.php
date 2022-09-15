          <div class="tab-content">
            <div class="tab-pane fade show active"role="tabpanel" aria-labelledby="custom-content-below-home-tab">
              <div class="row" id="blog-list-div"></div>
            </div>
          </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<!-- View Blog Details Modal Starts -->
  <div class="modal fade" id="view-blog-details-modal">
    <div class="modal-dialog modal-xl modal-dialog-centered">
      <div class="modal-content modal-content-view-collection-category">
        <div class="modal-header border-0">
          <h4 class="modal-title-edit-coupon">Resources Details</h4>
        </div>
        <div class="modal-body modal-body-edit-coupon">
          <div class="row">
            <div class="col-sm-4">
              <span class="product-details-span-light">Resources title</span>
              <input type="text" class="input-txt" name="blog-title" id="blog-title" placeholder="Resources title">
              <div id="blog-title-error-msg-div"></div>
            </div>
            <div class="col-sm-4">
              <span class="product-details-span-light">External Link</span>
              <input type="text" class="input-txt" name="external-link" id="external-link" placeholder="External Link">
              <div id="external-link-error-msg-div"></div>
            </div>
            <div class="col-sm-4">
              <span class="product-details-span-light">Post Type</span>
              <select class="input-txt" name="post-type" id="post-type"></select>
              <div id="post-type-error-msg-div"></div>
            </div>
            <div class="col-sm-12 mt-3">
              <span class="product-details-span-light">Resources Content</span>
              <textarea class="input-txt ckeditor" name="blog_content" id="blog_content" placeholder="Resources Content" rows="5"></textarea>
              <div id="blog-content-error-msg-div"></div>
            </div>
          </div>
          <div class="row mt-4"> 
            <div class="col-sm-6">
              <span class="product-details-span-light">Thumbnail Image</span>
              <div class="custom-file-input">
                <input type="file" id="blog-thumbnail-image" name="blog-thumbnail-image" class="input-file w-50" accept="image/*">
                <button class="btn btn-file-upload w-50">
                  Upload Image<br>
                  822 x 581 px (Max Size 1Mb)
                </button>
              </div>
              <div class="row" id="blog-thumbnail-image-div"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12" id="blog-error-div"></div>
            <div id="view-edit-cancel-btn-div" class="col-md-12 mt-2 text-right">
              <button class="btn btn-default btn-close" data-dismiss="modal">Close</button>
              <button class="btn btn-add btn-update text-white mt-0" id="update-blog-btn" name="update-blog-btn">Save</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- View Blog Details Modal Ends -->

<!-- View Blog Thumbnail Image Modal Starts -->
  <div class="modal fade" id="view-blog-image-modal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content modal-content-view-collection-category">
        <div class="modal-header border-0">
          <h4 class="modal-title-edit-coupon">Adversement Thumbnail Image</h4>
        </div>
        <div class="modal-body modal-body-edit-coupon">
          <div class="row mt-2">
            <div class="col-md-3"></div>
            <div class="col-sm-6">
              <img class="w-100" id="blog-image-modal-img">
            </div>
            <div id="view-edit-cancel-btn-div" class="col-md-12 mt-2 text-right">
              <button class="btn btn-default btn-close" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- View Blog Thumbnail Image Modal Ends -->

<!-- Delete Blog Modal Starts -->
  <div class="modal fade" id="delete-blog-modal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content modal-content-view-collection-category">
        <div class="modal-header border-0">
          <h4 class="modal-title-edit-coupon modal-title-delete">Are you sure you want to delete the Adversement?</h4>
        </div>
        <div class="modal-body modal-body-edit-coupon">
          <div class="row mt-2">
            <div id="view-edit-cancel-btn-div" class="col-md-12 mt-2 text-center">
              <button class="btn btn-default btn-close" data-dismiss="modal">Close</button>
              <button class="btn btn-add btn-danger btn-delete text-white mt-0 modal-btn-gap" id="delete-blog-btn">Delete</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- Delete Blog Modal Ends -->

<script src="<?php echo base_url()?>assets/custom-js/admin/adversement/all-adversement.js"></script>