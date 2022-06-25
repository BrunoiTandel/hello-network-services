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
      <div id="blog-results">
         <div class="row" id="all-posts">
            <div class="col-md-6">
               <div class="blog-bx">
                  <div class="blog-bx-img">
                     <img src="<?php echo base_url()?>assets/user/images/61f75c961b3d320220131094620.jpg">
                  </div>
                  <div class="blog-bx-cnt">
                     <div class="blog-bx-txt">
                        <span>2021-06-16 11:31:51</span>
                        <h3>Be Kind to Your Mind: Importance of Mental Health in the COVID-19 Pandemic</h3>
                        <p>The onset of COVID-19 clubbed with the speed with which it was declared a pandemic led to worries, s...</p>
                        <a href="<?php echo $this->config->item('my_base_url')?>blog-details">Read More</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="blog-bx">
                  <div class="blog-bx-img">
                     <img src="<?php echo base_url()?>assets/user/images/61f75c961b3d320220131094620.jpg">
                  </div>
                  <div class="blog-bx-cnt">
                     <div class="blog-bx-txt">
                        <span>2021-06-16 11:32:44</span>
                        <h3>Measure These 5 Background Check Metrics to Improve Your Screening Process</h3>
                        <p>A&nbsp;background check&nbsp;procedure furnishes an organization with a slew of data and metrics. But measurin...</p>
                        <a href="<?php echo $this->config->item('my_base_url')?>blog-details">Read More</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="blog-bx">
                  <div class="blog-bx-img">
                     <img src="<?php echo base_url()?>assets/user/images/61f75c961b3d320220131094620.jpg">
                  </div>
                  <div class="blog-bx-cnt">
                     <div class="blog-bx-txt">
                        <span>2021-06-16 18:11:10</span>
                        <h3>6 Popular Employee Background Verification Myths Debunked</h3>
                        <p>We all know that an employee background check is an indispensable screening that must be done before...</p>
                        <a href="<?php echo $this->config->item('my_base_url')?>blog-details">Read More</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="blog-bx">
                  <div class="blog-bx-img">
                     <img src="<?php echo base_url()?>assets/user/images/61f75c961b3d320220131094620.jpg">
                  </div>
                  <div class="blog-bx-cnt">
                     <div class="blog-bx-txt">
                        <span>2022-01-18 06:55:58</span>
                        <h3>Why a Background Check is Crucial in These Work From Home Times</h3>
                        <p>The COVID-19 pandemic has disrupted the traditional workplace environment. Be it meetings, presentat...</p>
                        <a href="<?php echo $this->config->item('my_base_url')?>blog-details">Read More</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="blog-bx">
                  <div class="blog-bx-img">
                     <img src="<?php echo base_url()?>assets/user/images/61f75c961b3d320220131094620.jpg">
                  </div>
                  <div class="blog-bx-cnt">
                     <div class="blog-bx-txt">
                        <span>2022-01-18 12:05:36</span>
                        <h3>Why Choose FactSuite as Your Background Verification Partner? Part 2</h3>
                        <p>Welcome Back!Or, if you have just finished&nbsp;part 1, welcome to part 2 of why entrust FactSuite with...</p>
                        <a href="<?php echo $this->config->item('my_base_url')?>blog-details">Read More</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>