
      <span class="edit-pages-txt">Users Details</span>
          
 
    <section class="content">
      <div class="container-fluid">
        <div class="content-nav-tabs-container"> 
          <div class="add-team-bx border p-2 m-3 bg-white d-none">
            <div id="error-client"></div>
          <h5>Bulk Upload</h5>
          <input type="file" class="fld" name="excel_upload" id="add-bulk-upload-case">
          <button type="button" onclick="import_excel()" class="btn btn-add text-white">Excel Data Submit</button> 
        </div>
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
                     <th>User&nbsp;IP</th>  
                     <!-- <th>Created Date</th>   -->
                     <th>User Status</th>  
                     <th>View&nbsp;Details</th>
                     <!-- <th>Actions</th> -->
                  </tr>
               </thead>
               <!-- id="get-case-data-1" -->
               <tbody class="table-fixed-tbody tbody-datatable " id="get-case-data">
                  <?php 
                     if (count($user)) {
                        $n = 1;
                       foreach ($user as $key => $value) { 
                        $status = '<span class="text-danger">'.$value['status'].'</span>';
                        if ($value['status'] =='online') {
                            $status = '<span class="text-success">'.$value['status'].'</span>';
                        }
                          echo '<tr>';
                          echo '<td>'.($n++).'</td>';
                          echo '<td>'.$value['full_name'].'</td>';
                          echo '<td>'.$value['phone'].'</td>';
                          echo '<td>'.$value['email'].'</td>';
                          echo '<td>'.$value['ip_address'].'</td>';
                          // echo '<td>'.$value['u_created_date'].'</td>';
                          echo '<td>'.$status.'</td>';
                          echo '<td><a href="#"><i class="fa fa-eye"></i></a></td>';
                            
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
 