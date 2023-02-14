<?php $edit_id = $this->uri->segment(3);
 ?>
  <div class="main-content">
        <section class="section">
          <div class="row ">
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                  <div class="card-header">
                    <h4>Payment Details</h4>
                  </div>
                  <?php  if($this->session->flashdata('item')!='') {
                    $message = $this->session->flashdata('item');
                  ?>
                  <div class="<?php echo $message['class'] ?>">
                    <?php echo $message['message']; ?>
                  </div>
                  <?php } 
                  else{
                    $messge = array('message' => '','class' => '');
                  } ?>
                  <form name="user" method="post" action="">
                  <div class="card-body">
                    <div class="form-row">
                       <div class="form-group col-md-4">
                        <label for="payments_type">Payment Type</label>
                        <select id="payment_type" name="payment_type" class="form-control" onchange="payment_data(this.value);" >
                          <option value="Account" <?php echo isset($payment->payment_type) && ($payment->payment_type=='Account')?'selected':''; ?>>Account</option>
                          <option value="Wallet" <?php echo isset($payment->payment_type) && ($payment->payment_type=='Wallet')?'selected':''; ?>>Wallet</option>
                        </select>
                      </div>
                      <div class="form-group col-md-4 payments_data Account">
                        <label for="account_no">Account No.</label>
                        <input type="text" class="form-control" id="account_no" name="account_no" value="<?php echo isset($payment->account_no)?$payment->account_no:'';?>">
                      </div>
                      
                      <div class="form-group col-md-4 payments_data Account">
                        <label for="ifsc">IFSC Code</label>
                        <input type="text" class="form-control" id="ifsc" name="ifsc" value="<?php echo isset($payment->ifsc)?$payment->ifsc:'';?>">
                      </div>
                      <div class="form-group col-md-4 payments_data Wallet" style="display: none;">
                        <label for="app">App Name</label>
                        <select id="app" name="app" class="form-control" >
                          <?php 
                         if(isset($payment_apps) && count($payment_apps)):
                          foreach($payment_apps as $payment_app) : 
                          ?>
                          <option value="<?php echo $payment_app['app_id'];?>"  <?php if(isset($payment->payment_type) && ($payment->payment_type=='Wallet')) { if(isset($payment->app_id)){echo ($payment->app_id== $payment_app['app_id'])?'selected':'';} } ?>><?php echo $payment_app['app_name'];?></option>
                           <?php  
                        endforeach; 
                         endif; ?>
                        </select>
                      </div>
                      <div class="form-group col-md-4 payments_data Wallet" style="display: none;">
                        <label for="handle">Handle</label>
                        <input type="text" class="form-control" id="handle" name="handle" value="<?php echo isset($payment->handle)?$payment->handle:'';?>">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-4 payments_data Account">
                        <label for="bank_name">Bank Name</label>
                        <input type="text" class="form-control" id="bank_name" name="bank_name" value="<?php echo isset($payment->bank_name)?$payment->bank_name:'';?>">
                      </div>
                        <div class="form-group col-md-4 payments_data Account">
                        <label for="bank_branch">Bank Branch</label>
                        <input type="text" class="form-control" id="bank_branch" name="bank_branch" value="<?php echo isset($payment->bank_branch)?$payment->bank_branch:'';?>">
                      </div>
                      <div class="form-group col-md-4 payments_data Account">
                        <label for="  bank_address">Bank Address</label>
                        <input type="text" class="form-control" id="bank_address" name="bank_address" value="<?php echo isset($payment->bank_address)?$payment->bank_address:'';?>">
                      </div>
                    </div>
                    </div>
                  <div class="card-footer">
                     <?php if(!empty($edit_id)){?>
                          <input type="hidden" name="action" value="<?php echo @$edit_id; ?>" >
                         <?php  } else {?>
                          <input type="hidden" name="action" value="create">
                          <?php } ?>
                   <input type="submit" name="submit" id="submit" class="btn btn-primary" value="<?php echo isset($edit_id)?'UPDATE':'ADD';?>">
                  </div>
                </form>
                <div class="row">
              <div class="col-12">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Payment Type</th>
                            <th>Account No/ App</th>
                            <th>IFSC/ Handle</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                         if(isset($payments) && is_array($payments) && count($payments)): $slno=1;
                          foreach($payments as $payment) : 
                          ?>
                          <tr>
                           <td><?php echo $slno;?></td>
                            <td><?php echo $payment['payment_type'];?></td>
                            <td><?php if($payment['payment_type']=='Account') echo $payment['account_no']; else if($payment['payment_type']=='Wallet') {
                                if(isset($payment_apps) && count($payment_apps)):
                                  foreach($payment_apps as $payment_app) : 
                                    echo ($payment['app_id']==$payment_app['app_id'])?$payment_app['app_name']:'';
                                  endforeach; 
                                endif; 
                            } ?></td>
                            <td><?php  if($payment['payment_type']=='Account') echo $payment['ifsc'];  else if($payment['payment_type']=='Wallet') echo $payment['handle'];?></td>
                           <td><a href="<?php echo site_url('payment/payment_details/'.$payment['payment_id'])?>" class="btn btn-primary" title="Edit"><i class="fa fa-edit"></i></a> 
                             <a href="<?php echo site_url('payment/delete_payment/'.$payment['payment_id'])?>" class="btn btn-icon btn-danger" title="Delete"><i class="fa fa-times"></i></a></td>
                          </tr>
                          <?php  
                          $slno++;
                        endforeach; 
                        else: ?>
                          <tr>
                              <td colspan="3" align="center" >No Records Found..</td>
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

              </div>
              </div>
            </section>
          </div>
          <script>
            window.onload = function() {
              var paymenttype = $('#payment_type').val();
              if(paymenttype=='Account')
              {
                $('.payments_data').hide();
                $('.Account').show();
              }
              else if(paymenttype=='Wallet')
              {
                $('.payments_data').hide();
                $('.Wallet').show();
              }
          }

            function payment_data(val)
            {
              $('.payments_data').hide();
              $('.'+val).show();
            }
          </script>
