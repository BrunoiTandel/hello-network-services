<section id="blog-banner">
   <div class="blog-cnt">
      <div class="blog-txt">
         <h1>Blogs</h1>
      </div>
   </div>
</section>

<section id="blog1">
   <div class="container-fluid">
      <div class="blog-search">
         <div class="row">
            <div class="col-md-8">
               <div id="blog-search">
                  <div class="search-div">
                     <input type="text" placeholder="Search by keyword" id="blog-search-keywords">
                     <button id="blog-search-keywords-btn">
                        <img src="<?php echo base_url()?>assets/user/images/search.png">
                     </button>
                     <button class="blog-search-remove-keywords-btn" id="blog-search-remove-keywords-btn">
                        <img src="<?php echo base_url()?>assets/user/images/close-blog-search.png">
                     </button>
                  </div>
               </div>
            </div>
            <div class="col-md-2">
               <div class="blog-select">
                  <hr>
                  <select id="post-type" class="blog-fld">
                     <option value="">All</option>
                     <option value="Reports and whitepapers">Reports and whitepapers</option>
                     <option value="Case Studies">Case Studies</option>
                     <option value="Blogs">Blogs</option>
                     <option value="Industry Updates">Industry Updates</option>
                     <option value="Brochures">Brochures</option>
                  </select>
               </div>
            </div>
            <div class="col-md-2">
               <div class="blog-select">
                  <hr>
                  <select id="post-sort-by" class="blog-fld">
                     <option value="recent_post">Recently Posted</option>
                     <option value="old_post">Old Posted</option>
                  </select>
               </div>
            </div>
         </div>
      </div>
      <amp-auto-ads type="adsense"
        data-ad-client="ca-pub-7690060139204930">
</amp-auto-ads>
      <div id="blog-results">
         <div class="row" id="all-posts"></div>
      </div>
   </div>
</section>

<script src="<?php echo base_url()?>assets/custom-js/user/blogs.js"></script>