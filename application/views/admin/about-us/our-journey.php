          <div class="tab-content">
            <div class="tab-pane fade show active"role="tabpanel" aria-labelledby="custom-content-below-home-tab">
              <div class="row">
                <div class="col-sm-4">
                  <span class="product-details-span-light">Timeline / Milestone</span>
                </div>
                <div class="col-sm-4">
                  <span class="product-details-span-light">Journey Year</span>
                </div>
                <div class="col-sm-4">
                  <span class="product-details-span-light">Journey Timeline</span>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <select class="input-txt" name="journey-type" id="journey-type">
                    <option value="">Timeline / Milestone</option>
                    <option value="0">Timeline</option>
                    <option value="1">Milestone</option>
                  </select>
                  <div id="journey-type-error-msg-div"></div>
                </div>
                <div class="col-sm-4">
                  <input type="text" class="input-txt" name="journey-year" id="journey-year" placeholder="Journey Year">
                  <div id="journey-year-error-msg-div"></div>
                </div>
                <div class="col-sm-4">
                  <input type="text" class="input-txt" name="journey-timeline" id="journey-timeline" placeholder="Journey Timeline">
                  <div id="journey-timeline-error-msg-div"></div>
                </div>
                <div class="col-sm-12 mt-3 journey-description-div" style="display: none;">
                  <span class="product-details-span-light">Journey Description</span>
                  <textarea rows="5" class="input-txt" name="journey-description" id="journey-description" placeholder="Journey Description"></textarea>
                  <div id="journey-description-error-msg-div"></div>
                </div>
                <div class="col-sm-9"></div>
                <div class="col-sm-3 mt-3 text-right">
                  <button class="btn btn-add btn-add-2 text-white mt-0" id="add-our-journey-btn" name="add-our-journey-btn">Add</button>
                </div>
                <div class="col-sm-12" id="add-new-our-journey-error-msg-div"></div>
              </div>
              <div class="custom-border mt-5 mb-3"></div>
              <span class="d-block medium-text font-weight-bold">Our Journey List</span>
              <div class="row" id="our-journey-list"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<!-- View Our Journey Modal Starts -->
  <div class="modal fade" id="view-our-journey-modal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content modal-content-view-collection-category">
        <div class="modal-header border-0">
          <h4 class="modal-title-edit-coupon">Our Journey (<span id="modal-our-journey-type-span"></span>)</h4>
        </div>
        <div class="modal-body modal-body-edit-coupon">
          <input type="hidden" name="edit-client-id" id="edit-our-journey-id">
          <div class="row">
            <div class="col-sm-6">
              <span class="product-details-span-light">Journey Year</span>
              <input type="text" class="input-txt" name="edit-journey-year" id="edit-journey-year" placeholder="Journey Year">
              <div id="edit-journey-year-error-msg-div"></div>
            </div>
            <div class="col-sm-6">
              <span class="product-details-span-light">Journey Timeline</span>
              <input type="text" class="input-txt" name="edit-journey-timeline" id="edit-journey-timeline" placeholder="Journey Timeline">
              <div id="edit-journey-timeline-error-msg-div"></div>
            </div>
            <div class="col-sm-12 mt-3 edit-journey-description-div" style="display: none;">
              <span class="product-details-span-light">Journey Description</span>
              <textarea class="input-txt" rows="5" name="edit-journey-description" id="edit-journey-description" placeholder="Journey Description"></textarea>
              <div id="edit-journey-description-error-msg-div"></div>
            </div>
            <div class="col-sm-12" id="edit-our-journey-error-msg-div"></div>
          </div>
          <div id="view-edit-cancel-btn-div" class="col-md-12 mt-2 text-right">
            <button class="btn btn-default btn-close" data-dismiss="modal">Close</button>
            <button class="btn btn-add btn-update text-white mt-0" id="edit-our-journey-btn" name="edit-our-journey-btn">Save</button>
          </div>
          </div>
        </div>
        <div class="modal-footer border-0"></div>
      </div>
    </div>
  </div>
<!-- View Our Journey Modal Ends -->

<!-- Delete Our Journey Modal Starts -->
  <div class="modal fade" id="delete-our-journey-modal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content modal-content-view-collection-category">
        <div class="modal-header border-0">
          <h4 class="modal-title-edit-coupon modal-title-delete">Are you sure you want to delete the "<span id="delete-journey-year-hdr-span"></span>" Journey?</h4>
        </div>
        <div class="modal-body modal-body-edit-coupon">
          <div class="row mt-2">
            <div class="col-md-3"></div>
            <div class="col-sm-6">
              <img class="w-100" id="gse-or-mhe-image-modal-img">
            </div>
            <div id="view-edit-cancel-btn-div" class="col-md-12 mt-2 text-center">
              <button class="btn btn-default btn-close" data-dismiss="modal">Close</button>
              <button class="btn btn-add btn-danger btn-delete text-white mt-0 modal-btn-gap" id="delete-our-journey-btn">Delete</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- Delete Our Journey Modal Ends -->

<script src="<?php echo base_url()?>assets/custom-js/admin/our-journey/add-our-journey.js"></script>
<script src="<?php echo base_url()?>assets/custom-js/admin/our-journey/all-our-journey.js"></script>