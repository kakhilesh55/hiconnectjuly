<?php $edit_id = $this->uri->segment(3); ?>
  <div class="main-content">
        <section class="section">
          <div class="row ">
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                  <div class="card-header">
                    <h4>Applications</h4>
                  </div>
                  <?php if($this->session->flashdata('item')) {
                    $message = $this->session->flashdata('item');
                  ?>
                  <div class="<?php echo $message['class'] ?>">
                    <?php echo $message['message']; ?>
                  </div>
                  <?php }  ?>
                  <form name="user" method="post" action="<?= base_url('payment_app/applications') ?>">
                  <div class="card-body">
                    <div class="form-row">
                          <div class="form-group col-md-6">
                        <label for="payment_type">Payment Type</label>
                        <select id="payment_type" name="payment_type" class="form-control" required="">
                          <option value="Account" <?php if(isset($payment_app->payment_type)){echo ($payment_app->payment_type=='Account')?'selected':'';} ?>>Account</option>
                          <option value="Wallet" <?php if(isset($payment_app->payment_type)){echo ($payment_app->payment_type=='Wallet')?'selected':'';} ?>>Wallet</option>
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="app_name">App Name</label>
                        <input type="text" class="form-control" id="app_name" name="app_name" value="<?php echo isset($payment_app->app_name)?$payment_app->app_name:'';?>"  required="">
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
                  <div class="card-header">
                    <h4>Applications</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Payment Type</th>
                            <th>App Name</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                         <?php 
                         if(isset($payment_apps) && is_array($payment_apps) && count($payment_apps)): $slno=1; 
                          foreach($payment_apps as $payment_app) : 
                          ?>
                          <tr>
                           <td><?php echo $slno;?></td>
                           <td><?php echo $payment_app['payment_type'];?></td>
                           <td><?php echo $payment_app['app_name'];?></td>
                            <td><a href="<?php echo site_url('payment_app/applications/'.$payment_app['app_id'])?>" class="btn btn-primary" title="Edit"><i class="fa fa-edit"></i></a> 
                             <a href="<?php echo site_url('payment_app/delete_payment_app/'.$payment_app['app_id'])?>" class="btn btn-icon btn-danger" title="Delete"><i class="fa fa-times"></i></a></td>
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