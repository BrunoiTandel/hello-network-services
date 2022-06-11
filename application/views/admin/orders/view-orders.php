
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
                          echo '<tr>';
                          echo '<td>'.($n++).'</td>';
                          echo '<td>'.$value['username'].'</td>';
                          echo '<td>'.$value['phone'].'</td>';
                          echo '<td>'.$value['email'].'</td>';
                          echo '<td>'.$value['ip_address'].'</td>';
                          echo '<td>'.$value['product_title'].'</td>';
                          echo '<td>'.$value['amount_paid'].'</td>';
                          echo '<td>'.$value['payment_id'].'</td>';
                          echo '<td>'.$value['purchased_date'].'</td>';
                         ?>
                         <td>
                        <div class="custom-control custom-switch pl-0">
                        <input type="checkbox"  onclick="change_product_status(<?php echo $value['user_purchased_package_id']; ?>,<?php echo $value['order_status']; ?>)" class="custom-control-input" id="change_product_status_<?php echo $value['user_purchased_package_id']; ?>">
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
 