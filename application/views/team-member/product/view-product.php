 </div>
    <section class="col-md-12">
      <div class="container-fluid">
        <div class="content-nav-tabs-container">
          <div class="tab-content">
            <div class="tab-pane fade show active"role="tabpanel" aria-labelledby="custom-content-below-home-tab">
              <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                  <label>Select User</label>
                  <select class="input-txt" id="users">
                    <?php 
                      if (count($users)) {
                        foreach ($users as $key => $val) {
                          echo "<option value='{$val['uid']}'>{$val['full_name']}</option>";
                        }
                      }
                    ?>
                  </select>
                </div>
                <div class="col-sm-3 mt-3">
                  <button id="btn-user-order" class="btn btn-add btn-update text-white"> Order Now</button>
                </div>
              </div>
              <div class="row" id="product-list-div"></div>
            </div>
          </div>
          </div>
        </div> 
    </section>
  </div>

<!-- View Product Details Modal Starts -->
  <div class="modal fade" id="view-product-details-modal">
    <div class="modal-dialog modal-xl modal-dialog-centered">
      <div class="modal-content modal-content-view-collection-category">
        <div class="modal-header border-0">
          <h4 class="modal-title-edit-coupon">Product Details</h4>
        </div>
        <div class="modal-body modal-body-edit-coupon">
          <div class="row">
            <div class="col-sm-4">
              <span class="product-details-span-light">Product title</span>
              <input type="text" class="input-txt" name="product-title" id="product-title" placeholder="Product title">
              <div id="product-title-error-msg-div"></div>
            </div>
             <div class="col-sm-4">
                  <span class="product-details-span-light">Data Volume Limit</span>
                  <input type="text" class="input-txt" name="data-volume-limit" id="data-volume-limit" placeholder="Data Volume Limit">
                  <div id="data-volume-limit-error-msg-div"></div>
                </div>
                <div class="col-sm-4">
                  <span class="product-details-span-light">Speed</span>
                  <input type="text" class="input-txt" name="speed" id="speed" placeholder="Speed">
                  <div id="speed-error-msg-div"></div>
                </div>
                <div class="col-sm-4">
                  <span class="product-details-span-light">Data Validity</span>
                  <input type="text" class="input-txt" name="validity" id="validity" placeholder="Validity">
                  <div id="validity-error-msg-div"></div>
                </div>
                <div class="col-sm-4">
                  <span class="product-details-span-light">Plan Price</span>
                  <input type="text" class="input-txt" name="plan-price" id="plan-price" placeholder="Plan Price">
                  <div id="plan-price-error-msg-div"></div>
                </div>
                <div class="col-sm-4">
                  <span class="product-details-span-light">Plan Type</span>
                  <select class="input-txt" name="plan-type" id="plan-type">
                    <option>Wifi</option>
                    <option>Fiber</option>
                  </select>
                  <div id="plan-type-error-msg-div"></div>
                </div>
            <div class="col-sm-12 mt-3">
              <span class="product-details-span-light">Product Content</span>
              <textarea class="input-txt ckeditor" name="product_content" id="product_content" placeholder="Product Content" rows="5"></textarea>
              <div id="product-content-error-msg-div"></div>
            </div>
          </div>
          <div class="row mt-4"> 
            <div class="col-sm-6">
              <span class="product-details-span-light">Thumbnail Image</span>
              <div class="custom-file-input">
                <input type="file" id="product-thumbnail-image" name="product-thumbnail-image" class="input-file w-50" accept="image/*">
                <button class="btn btn-file-upload w-50">
                  Upload Image<br>
                  822 x 581 px (Max Size 1Mb)
                </button>
              </div>
              <div class="row" id="product-thumbnail-image-div"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12" id="product-error-div"></div>
            <div id="view-edit-cancel-btn-div" class="col-md-12 mt-2 text-right">
              <button class="btn btn-default btn-close" data-dismiss="modal">Close</button>
              <button class="btn btn-add btn-update text-white mt-0" id="update-product-btn" name="update-product-btn">Save</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- View Product Details Modal Ends -->

<!-- View Product Thumbnail Image Modal Starts -->
  <div class="modal fade" id="view-product-image-modal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content modal-content-view-collection-category">
        <div class="modal-header border-0">
          <h4 class="modal-title-edit-coupon">Product Thumbnail Image</h4>
        </div>
        <div class="modal-body modal-body-edit-coupon">
          <div class="row mt-2">
            <div class="col-md-3"></div>
            <div class="col-sm-6">
              <img class="w-100" id="product-image-modal-img">
            </div>
            <div id="view-edit-cancel-btn-div" class="col-md-12 mt-2 text-right">
              <button class="btn btn-default btn-close" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- View Product Thumbnail Image Modal Ends -->

<!-- Delete Product Modal Starts -->
  <div class="modal fade" id="delete-product-modal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content modal-content-view-collection-category">
        <div class="modal-header border-0">
          <h4 class="modal-title-edit-coupon modal-title-delete">Are you sure you want to delete the Product?</h4>
        </div>
        <div class="modal-body modal-body-edit-coupon">
          <div class="row mt-2">
            <div id="view-edit-cancel-btn-div" class="col-md-12 mt-2 text-center">
              <button class="btn btn-default btn-close" data-dismiss="modal">Close</button>
              <button class="btn btn-add btn-danger btn-delete text-white mt-0 modal-btn-gap" id="delete-product-btn">Delete</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- Delete Product Modal Ends -->


<!-- Delete Product Modal Starts -->
  <div class="modal fade" id="order-product-modal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content modal-content-view-collection-category">
        <div class="modal-header border-0">
          <h4 class="modal-title-edit-coupon modal-title-delete" id="order-now-alert">Are you sure you want to Active this Data Plan?</h4>
        </div>
        <div class="modal-body modal-body-edit-coupon">
          <div class="row mt-2">
            <div id="view-edit-cancel-btn-div-1" class="col-md-12 mt-2 text-center">
              <button class="btn btn-default btn-close" data-dismiss="modal">Close</button> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- Delete Product Modal Ends -->


<script src="<?php echo base_url()?>assets/custom-js/team-member/product/all-products.js"></script>