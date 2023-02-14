
  <div class="main-content">
        <section class="section">
          <div class="row ">
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                  <div class="card-header">
                    <h4>Manage Orders</h4>
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
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">Sl No. </th>
                        
                            <th>Order ID</th>
                            <th>Package</th>
                       
                         
                            <th>Billing Date</th>
                            <th>Renewal Date</th>
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
                            $date=$user['register_date'];
                            $rdate= date('Y-m-d', strtotime($date. ' + 1 years'));
                          ?>
                          <tr>
                            <td><?php echo $slno;?></td>
                            <td class="test" style="display:none"><?php echo $user['price'];?></td>
                            <td class="test1" style="display:none"><?php echo $user['user_id'];?></td>
                            <td><?php echo $user['order_id'];?></td>
                            <td class="align-middle"><?php echo $user['pk'];?></td>
                          
                        
                            <td><?php echo $user['register_date'];?></td>
                            <td><?php echo  $rdate;?></td>
                            <td>
                            <button class="btn btn-success gfgselect" data-bs-toggle="modal" data-bs-target="#exampleModal11" id="k"><i class="far fa-edit mr-1"></i>Refund</button>
                              <a href="<?php echo site_url($user['invoice_link'])?>" class="btn btn-icon btn-dark" title="Invoice Report" target="_blank"><i class="far fa-file-pdf"></i></a>
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
          <div class="modal fade" id="exampleModal11" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Refund</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form  method="POST" name="lead"  action="<?php echo base_url() ?>Renewals_billing/update_renewal">
        
       
          <div class="mb-3">
          <label for="" class="form-label">Status</label>
          <input type="hidden" class="form-control" id="ename" name="eid">
          <input type="text" class="form-control" id="amt" name="amt" readonly>
          </div>
          
      
                <div class="mb-3">
        <label for="" class="form-label">Reason</label>
        <textarea class="form-control" name="reason"  id="" rows="5"></textarea>
      </div>
      <div class="modal-footer m-auto">
        <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Add</button>
        <button type="button" class="btn btn-primary">Reset</button>
      </div>
        </form>
      </div>
     
    </div>
  </div>
</div>
          <script>


$(function () {
                // ON SELECTING ROW
                $(".gfgselect").click(function () {
   //FINDING ELEMENTS OF ROWS AND STORING THEM IN VARIABLES
                    var a =
             $(this).parents("tr").find(".test").text();
             var b=
             $(this).parents("tr").find(".test1").text();
          
                 // alert(b);
                   $('#amt').val(a);
                   
                  $('#eid').val(b);
                
            });
          });
        </script>
    
          </script>

          <script type="text/javascript">
  function generatexls1(){
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