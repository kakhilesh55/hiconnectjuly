
  <div class="main-content">
        <section class="section">
          <div class="row ">
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                  <div class="card-header">
                    <h4>My products</h4>
                  </div>
                  <div class="card-body">
                     <?php if($this->session->flashdata('item')!='') {
                    $message = $this->session->flashdata('item');
                  ?>
                  <div class="<?php echo $message['class'] ?>">
                    <?php echo $message['message']; ?>
                  </div>
                  <?php }  ?>
                  
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">Sl No. </th>
                            <th>Order ID</th>
                            <th>Name</th>
                           
                            <th>User ID</th>
                        
                            <th>Product</th>
                            <th>Order Total</th>
                            <th> Purchased Date</th>
                            <th>Order Status</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                         if(isset($users) && is_array($users) && count($users)): $slno=1; 
                          foreach($users as $user) : 
                          //  print_r($user);
                       

                          if($user['order_id']!="")
                          {
                            $invoice_details = $this->User_Model->get_invoice_details($user['id']);
                            $invoice_link = $invoice_details->invoice_link;
                            echo $user['users.order_status'];
                          ?>
                          <tr>
                            <td><?php echo $slno;?></td>
                            <td><?php echo $user['order_id'];?></td>
                            <td><?php echo $user['name'];?></td>
                            
                            <td><?php echo $user['user_id'];?></td>
                         
                            <td class="align-middle"><?php echo $user['product_name'];?></td>
                            <td class="align-middle"><?php echo $user['price'];?></td>
                            <td><?php echo $user['register_date'];?></td>
                            <td><?php if($user['order_status']==0)
                             echo 'Pending';
                             else if($user['order_status']==1)
                              echo 'Processing';
                             else if($user['order_status']==2)
                              echo 'Awaiting Payment';
                             else if($user['order_status']==3)
                              echo 'Awaiting Pickup';
                             else if($user['order_status']==4)
                              echo 'Shipped';
                             else if($user['order_status']==5)
                              echo 'Cancelled';
                              else if($user['order_status']==6)
                              echo 'Declined';
                              else if($user['order_status']==7)
                              echo 'Refunded';
                              else if($user['order_status']==8)
                              echo 'Completed';
                              
                              ?></td>
                            <td>
                              <a href="<?php echo site_url('manage_orders/process_orders/'.$user['user_id'])?>" class="btn btn-icon icon-left btn-primary" title="Edit"><i class="far fa-edit"></i></a>
                              <a href="<?php echo site_url('admin/delete_user/'.$user['id'])?>" class="btn btn-icon icon-left btn-danger" title="Delete"><i class="fas fa-times"></i></a>
                              <a href="<?php echo site_url($user['invoice_link_product'])?>" class="btn btn-icon btn-dark" title="Invoice Report" target="_blank"><i class="far fa-file-pdf"></i></a>
                            </td>
                          </tr>
                          <?php  
                          $slno++;
                        }
                        endforeach; 
                     
                        else: ?>
                          <tr>
                              <td colspan="7" align="center" >No Records Found..</td>
                          </tr>
                          <?php
                              endif;?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              </div>
            </section>
          </div>

    
          </script>

          <script type="text/javascript">
  function generate_excel(){
    var from_date = $('#from_date').val();
    var to_date = $('#to_date').val();
    var page = 'generatexls/'+from_date+'/'+to_date;
    $.ajax({
        type: "POST",
        url: page,
        data: {'from_date': from_date ,'to_date': to_date},
       success: function(data){
          document.location.href = page;
                //window.open(page,'_blank');
            },
    });

  }




</script>