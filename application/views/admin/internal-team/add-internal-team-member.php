          <div class="tab-content mt-0">
            <div class="tab-pane fade show active"role="tabpanel" aria-labelledby="custom-content-below-home-tab">
              <div class="row">
                <div class="col-sm-4">
                  <span class="product-details-span-light">Role</span>
                  <select class="input-txt" name="team-member-job-role" id="team-member-job-role"></select>
                  <div id="job-role-error-msg-div"></div>
                </div>
                <div class="col-sm-4">
                  <span class="product-details-span-light">Name</span>
                  <input type="text" class="input-txt" name="team-member-name" id="team-member-name" placeholder="Team Member Name">
                  <div id="team-member-name-error-msg-div"></div>
                </div>
                <div class="col-sm-4">
                  <span class="product-details-span-light">Mobile Number</span>
                  <input type="text" class="input-txt" name="team-member-mobile-number" id="team-member-mobile-number" placeholder="Mobile Number">
                  <div id="team-member-mobile-number-error-msg-div"></div>
                </div>
                <div class="col-sm-4 mt-3">
                  <span class="product-details-span-light">Email ID</span>
                  <input type="text" class="input-txt" name="team-member-email-id" id="team-member-email-id" placeholder="Email ID">
                  <div id="team-member-email-id-error-msg-div"></div>
                </div>
                <div class="col-sm-4 mt-3">
                  <span class="product-details-span-light">Block</span>
                  <input type="text" class="input-txt" name="team-member-block" id="team-member-block" placeholder="Block">
                  <div id="team-member-block-error-msg-div"></div>
                </div>
                <div class="col-sm-4 mt-3">
                  <span class="product-details-span-light">District</span>
                  <input type="text" class="input-txt" name="team-member-district" id="team-member-district" placeholder="District">
                  <div id="team-member-district-error-msg-div"></div>
                </div>
                <div class="col-sm-12 mt-3">
                  <span class="product-details-span-light">Address</span>
                  <textarea class="input-txt" name="team-member-address" id="team-member-address" placeholder="Address" rows="2"></textarea>
                  <div id="team-member-address-error-msg-div"></div>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-md-12" id="add-new-team-member-error-msg-div"></div>
                <div id="view-edit-cancel-btn-div" class="col-md-12 mt-2 text-right">
                  <button class="btn btn-add btn-update text-white mt-0" id="add-new-team-member-btn" name="add-new-team-member-btn">Add</button>
                </div>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<script src="<?php echo base_url()?>assets/custom-js/admin/internal-team/add-new-team-member.js"></script>