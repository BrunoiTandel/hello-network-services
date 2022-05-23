 
    <section class="content">
      <div class="container-fluid">
        <div class="content-nav-tabs-container"> 

        <div class="tab-content mt-0 bg-white">
            <div class="tab-pane fade show active"role="tabpanel" aria-labelledby="custom-content-below-home-tab">  
                  <table id="example1" class="table-fixed table table-striped ">
               <thead class="table-fixed-thead thead-bd-color">
                  <tr>
                     <!-- <th>Sr No.Case&nbsp;Id</th>  --> 
                     <th>Sr No.</th>   
                     <th>Role&nbsp;Name</th>    
                     <th>Team&nbsp;Member</th>  
                     <th>Mobile Number</th>  
                     <th>Email Id</th>
                     <th>Block</th>
                     <th>Address</th>
                     <th>Status</th>  
                     <th>Created Date</th>
                  </tr>
               </thead>
               <!-- id="get-case-data-1" -->
               <tbody class="table-fixed-tbody tbody-datatable " id="get-case-data">
                  <?php 
                     if (count($team)) {
                        $n = 0;
                       foreach ($team as $key => $value) {  
                        $status = '<span class="text-danger">In-Active</span>';
                        if ($value['internal_team_member_status'] =='1') {
                            $status = '<span class="text-success">Active</span>';
                        }
                          echo '<tr>';
                          echo '<td>'.($n+1).'</td>'; 
                          echo '<td>'.$value['internal_team_role_name'].'</td>'; 
                          echo '<td>'.$value['internal_team_member_name'].'</td>'; 
                          echo '<td>'.$value['internal_team_member_mobile_number'].'</td>'; 
                          echo '<td>'.$value['internal_team_member_email_id'].'</td>'; 
                          echo '<td>'.$value['internal_team_member_block'].'</td>'; 
                          echo '<td>'.$value['internal_team_member_address'].'</td>'; 
                          echo '<td>'.$status.'</td>'; 
                          echo '<td>'.$value['internal_team_role_created_date'].'</td>'; 

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
 