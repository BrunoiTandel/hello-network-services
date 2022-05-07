          <div class="tab-content">
            <div class="tab-pane fade show active"role="tabpanel" aria-labelledby="custom-content-below-home-tab">
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
              <div class="col-sm-12 mt-4" id="blog-error-div"></div>
              <div class="col-sm-10"></div>
              <div class="col-sm-2 text-right">
                <button class="btn btn-add btn-add-2 text-white mt-0" id="add-blog-btn" name="add-blog-btn">Add</button>
            </div>
          </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<script src="<?php echo base_url()?>assets/custom-js/admin/blog/add-blog.js"></script>