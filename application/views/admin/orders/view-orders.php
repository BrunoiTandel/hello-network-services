
      <span class="edit-pages-txt">Order Details</span>
          </div>
        </div>
      </div>
    </div>

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
                     <th>User&nbsp;Name</th>  
                     <th>User&nbsp;Mobile Number</th>  
                     <th>User&nbsp;Email</th>  
                     <th>User&nbsp;IP</th>  
                     <th>Product Name</th>
                     <th>Paid Amount</th>
                     <th>Payment Id</th>
                     <th>Purches Date</th>  
                     <th>Action</th>  
                     <th>Invoice</th>
                  </tr>
               </thead>
               <!-- id="get-case-data-1" -->
               <tbody class="table-fixed-tbody tbody-datatable " id="get-case-data">
                  <?php 
                     if (count($users)) {
                        $n = 1;
                       foreach ($users as $key => $value) { 
                       
                       $check = '';
                       if ($value['order_status'] =='1') {
                          $check = 'checked';
                       }
                          echo '<tr id="pay_'.$value['user_purchased_package_id'].'">';
                          echo '<td>'.($n++).'</td>';
                          echo '<td>'.$value['username'].'</td>';
                          echo '<td>'.$value['phone'].'</td>';
                          echo '<td>'.$value['email'].'</td>';
                          echo '<td>'.$value['ip_address'].'</td>';
                          echo '<td>'.$value['product_title'].'</td>';
                          echo '<td>'.$value['amount_paid'].'</td>';
                          echo '<td>'.$value['payment_id'].'</td>';
                          if ($this->session->userdata('logged-in-admin')) {
                             echo '<td id="date_'.$value['user_purchased_package_id'].'" id-data="'.$value['user_purchased_package_id'].'"><input readonly class="change_date date-and-time-picker" type="text" value="'.$value['purchased_date'].'" id="purchased_date-'.$value['user_purchased_package_id'].'"></td>';
                          }else{
                            echo '<td id="date_'.$value['user_purchased_package_id'].'" id-data="'.$value['user_purchased_package_id'].'">'.$value['purchased_date'].'</td>';
                          }
                          


                         ?>
                         <td class="pl-2">
                           <div class="custom-control custom-switch pl-2">
                           <input type="checkbox" <?php echo $check; ?>  onclick="change_product_status(<?php echo $value['user_purchased_package_id']; ?>,<?php echo $value['order_status']; ?>)" class="custom-control-input" id="change_product_status_<?php echo $value['user_purchased_package_id']; ?>">
                           <label class="custom-control-label" for="change_product_status_<?php echo $value['user_purchased_package_id']; ?>"></label>
                           </div>
                     </td>
                        <?php
                          echo '<td><a target="_blank" href="'.$this->config->item('my_base_url').'user-invoice/'.md5($value['user_purchased_package_id']).'"><i class="fa fa-file-pdf-o "></i></a></td>';
                            
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

  <script type="text/javascript">
     $(".change_date").on('change',function(){ 
         $.ajax({
        type  : 'POST',
        url   : base_url+'Admin_Home_Page/update_order_date',
        data : {
         verify_admin_request : '1',
         value : $(this).val(),
         id : $(this).attr('id').split('-')[1]
        },
        dataType : 'json',
        success : function(data) {
           if (data.status == '1') {
              toastr.success('Date has been successfully updated.');
           }
       }
    });
     })
  </script>
 
 <script src="<?php echo base_url().'assets/custom-js/admin/order.js'?>"></script>