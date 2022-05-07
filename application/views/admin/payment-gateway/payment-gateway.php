          <div class="tab-content">
            <div class="tab-pane fade show active" id="add-product-category-tab" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
              
              <div class="row">
                <div class="col-md-3">
                  <span class="product-details-span-light">API Key</span>
                </div>
                <div class="col-md-3">
                  <span class="product-details-span-light">API Token</span>
                </div>
                <div class="col-md-3">
                  <span class="product-details-span-light">Authentication Key</span>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <input type="text" class="input-txt" name="payment-api-key" id="payment-api-key" placeholder="Api Key">
                  <div id="payment-api-key-error-msg-div"></div>
                </div>
                <div class="col-md-3">
                  <input type="text" class="input-txt" name="payment-aut-token" id="payment-aut-token" placeholder="Token">
                </div>
                <div class="col-md-3">
                  <input type="text" class="input-txt" name="payment-aut-key" id="payment-aut-key" placeholder="Authentication Key">
                </div>
                <div class="col-md-3">
                  <button class="btn btn-add text-white mt-0" id="save_payment_details" name="save_payment_details">Update</button>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<!-- Ask Admin Password Modal Starts -->
  <div class="modal fade" id="ask-admin-password-modal">
    <div class="modal-dialog modal-md modal-dialog-centered">
      <div class="modal-content p-5">
        <div class="modal-body modal-body-edit-coupon">
          <div class="row">
            <div class="col-md-12 text-center">
              <h4 class="modal-title-edit-coupon font-weight-bold">Please enter your password for confirmation</h4>
              <input type="password" class="input-txt w-100 mt-3" name="admin_password" id="admin_password" placeholder="Enter your password">
              <span name="admin-password-error-msg-div" id="admin-password-error-msg-div"></span>
            </div>
            <div class="col-md-12" id="verify-admin-error-msg-div"></div>
          </div>
        </div>
        <div class="modal-footer border-0">
          <div class="row w-100">
            <div class="col-md-3"></div>
            <div class="col-md-3">
              <button class="btn btn-default btn-close" data-dismiss="modal">Cancel</button>
            </div>
            <div class="col-md-3">
              <button class="btn btn-add text-white mt-0" id="verify_admin_btn" name="verify_admin_btn">Verify</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- Ask Admin Password Modal Modal Ends -->

<script src="<?php echo base_url()?>assets/custom-js/admin/common-validations.js"></script>
<script src="<?php echo base_url()?>assets/custom-js/admin/payment-details/payment-details.js"></script>