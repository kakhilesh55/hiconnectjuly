<?php $edit_id = $this->uri->segment(3);
 ?>
  <div class="main-content">
        <section class="section">
          <div class="row ">
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                  <div class="card-header">
                    <h4>Coupon Management</h4>
                  </div>
                   <?php if($this->session->flashdata('item')!='') {
                    $message = $this->session->flashdata('item');
                  ?>
                  <div class="<?php echo $message['class'] ?>">
                    <?php echo $message['message']; ?>
                  </div>
                  <?php }  ?>
                  <form name="coupon" method="post" action="<?= base_url('coupon/coupons') ?>">
                  <div class="card-body">
                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label for="coupon_name">Coupon Code</label>
                        <input type="text" class="form-control" id="coupon_name" name="coupon_name" value="<?php echo isset($coupon->coupon_name)?$coupon->coupon_name:'';?>" required="">
                      </div>
                    <div class="form-group col-md-3">
                        <label for="percentage">Percentage</label>
                        <input type="text" class="form-control" id="percentage" name="percentage" value="<?php echo isset($coupon->percentage)?$coupon->percentage:'';?>" required="">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="start_date">From Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" value="<?php echo isset($coupon->start_date)?$coupon->start_date:'';?>" required>
                      </div>
                       <div class="form-group col-md-3">
                        <label for="end_date">To Date</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" value="<?php echo isset($coupon->end_date)?$coupon->end_date:'';?>" required>
                      </div>
                    </div>
                    <div class="form-row">
                       <div class="form-group col-md-3">
                        <label for="desc">Status</label>
                         <select id="coupon_status" name="coupon_status" class="form-control" >
                          <option value="0" <?php if(isset($coupon->coupon_status)){echo ($coupon->coupon_status== 0)?'selected':'';} ?>>Inactive</option>
                          <option value="1" <?php if(isset($coupon->coupon_status)){echo ($coupon->coupon_status== 1)?'selected':'';} ?>>Active</option>
                        </select>
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
                            <th>Coupon Code</th>
                            <th>Percentage</th>
                            <th>From Date</th>
                            <th>To Date</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                         if(isset($coupons) && is_array($coupons) && count($coupons)): $slno=1; 
                          foreach($coupons as $coupon) : 
                          ?>
                          <tr>
                           <td><?php echo $slno;?></td>
                           <td><?php echo $coupon['coupon_name'];?></td>
                           <td><?php echo $coupon['percentage'];?></td>
                           <td><?php echo $coupon['start_date'];?></td>
                           <td><?php echo $coupon['end_date'];?></td>
                           <td><?php echo ($coupon['coupon_status']==1)?'Active':'Inactive';?></td>
                           <td>
                            <a href="<?php echo site_url('coupon/coupons/'.$coupon['coupon_id'])?>" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"></i></a>
                            <a href="<?php echo site_url('coupon/delete_coupon/'.$coupon['coupon_id'])?>" class="btn btn-danger btn-action" data-toggle="tooltip" title="" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')" data-original-title="Delete"><i class="fas fa-trash"></i></a> 
                             </td>
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