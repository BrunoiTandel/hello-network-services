          <div class="tab-content">
            <div class="tab-pane fade show active"role="tabpanel" aria-labelledby="custom-content-below-home-tab">
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
                  <span class="product-details-span-light">Resources Content</span>
                  <textarea class="input-txt ckeditor" name="product_content" id="product_content" placeholder="Resources Content" rows="5"></textarea>
                  <div id="blog-content-error-msg-div"></div>
                </div>
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
              <div class="col-sm-12 mt-4" id="product-error-div"></div>
              <div class="col-sm-10"></div>
              <div class="col-sm-2 text-right">
                <button class="btn btn-add btn-add-2 text-white mt-0" id="add-product-btn" name="add-product-btn">Add</button>
            </div>
          </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<script src="<?php echo base_url()?>assets/custom-js/admin/product/add-product.js"></script>