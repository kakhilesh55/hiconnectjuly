<?php $edit_id = $this->uri->segment(3);
 ?>
  <div class="main-content">
        <section class="section">
          <div class="row ">
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                  <div class="card-header">
                    <h4>Testimonials</h4>
                  </div>
                    <?php if($this->session->flashdata('item')!='') {
                    $message = $this->session->flashdata('item');
                  ?>
                  <div class="<?php echo $message['class'] ?>">
                    <?php echo $message['message']; ?>
                  </div>
                  <?php } ?>
                      <form name="testimonials" method="post" action="<?= base_url('testimonials/testimonials') ?>">
                  <div class="card-body">
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo isset($testimonial->name)?$testimonial->name:'';?>" required="">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="designation">Designation</label>
                        <input type="text" class="form-control" id="designation" name="designation" value="<?php echo isset($testimonial->designation)?$testimonial->designation:'';?>">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="company">Company</label>
                        <input type="text" class="form-control" id="company" name="company" value="<?php echo isset($testimonial->company)?$testimonial->company:'';?>">
                      </div>
                    </div>
                     <div class="form-row">
                       <div class="form-group col-md-12">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message" name="message"  required="" maxlength="250"><?php echo isset($testimonial->message)?$testimonial->message:'';?></textarea>
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
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Company</th>
                            <th>Message</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                         <?php 
                         if(isset($testimonials) && is_array($testimonials) && count($testimonials)): $slno=1; 
                          foreach($testimonials as $testimonial) : 
                          ?>
                          <tr>
                           <td><?php echo $slno;?></td>
                           <td><?php echo $testimonial['name'];?></td>
                           <td><?php echo $testimonial['designation'];?></td>
                           <td><?php echo $testimonial['company'];?></td>
                           <td><?php echo $testimonial['message'];?></td>
                            <td><a href="<?php echo site_url('testimonials/testimonials/'.$testimonial['testimonial_id'])?>" class="btn btn-primary" title="Edit"><i class="fa fa-edit"></i></a> 
                             <a href="<?php echo site_url('testimonials/delete_testimonial/'.$testimonial['testimonial_id'])?>" class="btn btn-icon btn-danger" title="Delete"><i class="fa fa-times"></i></a></td>
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