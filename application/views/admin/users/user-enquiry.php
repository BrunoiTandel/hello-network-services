
      <span class="edit-pages-txt">Users Enquire Details</span>
          </div>
        </div>
      </div>
    </div>
 
    <section class="content">
      <div class="container-fluid">
        <div class="content-nav-tabs-container"> 
          
        <div class="tab-content mt-0">
            <div class="tab-pane fade show active bg-white p-2"role="tabpanel" aria-labelledby="custom-content-below-home-tab">  
                  <table class="table-fixed table table-striped datatable1" id="example1">
               <thead class="table-fixed-thead thead-bd-color">
                  <tr>
                     <!-- <th>Sr No.Case&nbsp;Id</th>  --> 
                     <th>Sr No.</th>   
                     <th>User&nbsp;Name</th>  
                     <th>User&nbsp;Mobile Number</th>   
                     <th>User&nbsp;Email</th>  
                     <th>Message</th>
                     <th>Enquire Date</th>    
                  </tr>
               </thead>
               <!-- id="get-case-data-1" -->
               <tbody class="table-fixed-tbody tbody-datatable " id="get-case-data">
                  <?php 
                     if (count($users)) {
                        $n = 1;
                       foreach ($users as $key => $value) { 
                        
                          echo '<tr>';
                          echo '<td>'.($n++).'</td>';
                          echo '<td>'.$value['user_contact_us_query_first_name'].' '.$value['user_contact_us_query_first_name'].'</td>';
                          echo '<td>'.$value['user_contact_us_query_phone_number'].'</td>';
                          echo '<td>'.$value['user_contact_us_query_email_id'].'</td>'; 
                          echo '<td>'.$value['user_contact_us_query_message'].'</td>';
                          echo '<td>'.$value['user_contact_us_query_created_date'].'</td>';
                         
                            
                          echo '</tr>';
                       }
                     }
                  ?>
               </tbody>
            </table>  
          </div>

          </div>
        </div>
      </div>
    </section>
  </div>

<script src="<?php echo base_url()?>assets/custom-js/admin/internal-team/add-new-team-member.js"></script>