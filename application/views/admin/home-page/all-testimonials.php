          <div class="tab-content">
            <div class="tab-pane fade show active"role="tabpanel" aria-labelledby="custom-content-below-home-tab">
              <div class="row" id="testimonial-list-div"></div>
            </div>
          </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<!-- View Testimonial Details Modal Starts -->
  <div class="modal fade" id="view-testimonial-details-modal">
    <div class="modal-dialog modal-xl modal-dialog-centered">
      <div class="modal-content modal-content-view-collection-category">
        <div class="modal-header border-0">
          <h4 class="modal-title-edit-coupon">Testimonial Details</h4>
        </div>
        <div class="modal-body modal-body-edit-coupon">
          <div class="row">
            <div class="col-sm-4">
              <span class="product-details-span-light">Client Name</span>
              <input type="text" class="input-txt" name="client-name" id="client-name" placeholder="Client Name">
              <div id="client-name-error-msg-div"></div>
            </div>
            <div class="col-sm-4">
              <span class="product-details-span-light">Company Name</span>
              <input type="text" class="input-txt" name="company-name" id="company-name" placeholder="Company Name">
              <div id="company-name-error-msg-div"></div>
            </div>
            <div class="col-sm-4">
              <span class="product-details-span-light">Role</span>
              <input type="text" class="input-txt" name="client-role" id="client-role" placeholder="Role">
              <div id="client-role-error-msg-div"></div>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-sm-6">
              <span class="product-details-span-light">Review</span>
              <textarea class="input-txt" name="client-review" id="client-review" placeholder="Review" rows="5"></textarea>
              <div id="client-review-error-msg-div"></div>
            </div>
            <div class="col-sm-6">
              <span class="product-details-span-light">Client Services</span>
              <input type="text" class="input-txt" name="client-services" id="client-services" placeholder="Client Services">
              <div id="client-services-error-msg-div"></div>
            </div>
          </div>
          <div class="row mt-4"> 
            <div class="col-sm-6">
              <span class="product-details-span-light">Client Image / Logo</span>
              <div class="custom-file-input">
                <input type="file" id="client-image-or-logo" name="client-image-or-logo" class="input-file w-50" accept="image/*">
                <button class="btn btn-file-upload w-50">
                  Upload Image<br>
                  186 x 186 px (Max Size 1Mb)
                </button>
              </div>
              <div class="row" id="client-image-or-logo-div"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12" id="testimonial-error-div"></div>
            <div id="view-edit-cancel-btn-div" class="col-md-12 mt-2 text-right">
              <button class="btn btn-default btn-close" data-dismiss="modal">Close</button>
              <button class="btn btn-add btn-update text-white mt-0 modal-btn-gap" id="update-testimonial-btn" name="update-testimonial-btn">Save</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- View Testimonial Details Modal Ends -->

<!-- View Testimonial Thumbnail Image Modal Starts -->
  <div class="modal fade" id="view-testimonial-image-modal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content modal-content-view-collection-category">
        <div class="modal-header border-0">
          <h4 class="modal-title-edit-coupon">Client Image</h4>
        </div>
        <div class="modal-body modal-body-edit-coupon">
          <div class="row mt-2">
            <div class="col-md-3"></div>
            <div class="col-sm-6">
              <img class="w-100" id="testimonial-image-modal-img">
            </div>
            <div id="view-edit-cancel-btn-div" class="col-md-12 mt-2 text-right">
              <button class="btn btn-default btn-close" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- View Testimonial Thumbnail Image Modal Ends -->

<!-- Delete Testimonial Modal Starts -->
  <div class="modal fade" id="delete-testimonial-modal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content modal-content-view-collection-category">
        <div class="modal-header border-0">
          <h4 class="modal-title-edit-coupon modal-title-delete">Are you sure you want to delete the Testimonial?</h4>
        </div>
        <div class="modal-body modal-body-edit-coupon">
          <div class="row mt-2">
            <div id="view-edit-cancel-btn-div" class="col-md-12 mt-2 text-center">
              <button class="btn btn-default btn-close" data-dismiss="modal">Close</button>
              <button class="btn btn-add btn-danger btn-delete text-white mt-0 modal-btn-gap" id="delete-testimonial-btn">Delete</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- Delete Testimonial Modal Ends -->

<script src="<?php echo base_url()?>assets/custom-js/admin/testimonials/all-testimonials.js"></script>