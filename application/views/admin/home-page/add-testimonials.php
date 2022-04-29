          <div class="tab-content">
            <div class="tab-pane fade show active"role="tabpanel" aria-labelledby="custom-content-below-home-tab">
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
              <div class="col-sm-12 mt-4" id="testimonial-error-div"></div>
              <div class="col-sm-10"></div>
              <div class="col-sm-2 text-right">
                <button class="btn btn-add btn-add-2 text-white mt-0" id="add-testimonial-btn" name="add-testimonial-btn">Add</button>
            </div>
          </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<script src="<?php echo base_url()?>assets/custom-js/admin/testimonials/add-testimonial.js"></script>