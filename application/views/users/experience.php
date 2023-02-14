<?php $edit_id = $this->uri->segment(3);
 ?>
  <div class="main-content">
        <section class="section">
          <div class="row ">
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                  <div class="card-header">
                    <h4>Experience</h4>
                  </div>
                   <?php if($this->session->flashdata('item')!='') {
                    $message = $this->session->flashdata('item');
                  ?>
                  <div class="<?php echo $message['class'] ?>">
                    <?php echo $message['message']; ?>
                  </div>
                  <?php }  ?>
                  <form name="experience" method="post" action="<?= base_url('experiences/experiences') ?>">
                  <div class="card-body">
                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label for="company">Company</label>
                        <input type="text" class="form-control" id="company" name="company" value="<?php echo isset($experience->company)?$experience->company:'';?>" required="">
                      </div>
                    <div class="form-group col-md-3">
                        <label for="position">Position</label>
                        <input type="text" class="form-control" id="position" name="position" value="<?php echo isset($experience->position)?$experience->position:'';?>" required="">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="start_date">Start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" value="<?php echo isset($experience->start_date)?$experience->start_date:'';?>">
                      </div>
                       <div class="form-group col-md-3">
                        <label for="end_date">End Date</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" value="<?php echo isset($experience->end_date)?$experience->end_date:'';?>">
                      </div>
                    </div>
                    <div class="form-row">
                       <div class="form-group col-md-12">
                        <label for="desc">Description</label>
                        <textarea class="form-control" id="description" name="description" maxlength="250"><?php echo isset($experience->description)?$experience->description:'';?></textarea>
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
                            <th>Company</th>
                            <th>Position</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Description</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                         if(isset($experiences) && is_array($experiences) && count($experiences)): $slno=1; 
                          foreach($experiences as $experience) : 
                          ?>
                          <tr>
                           <td><?php echo $slno;?></td>
                           <td><?php echo $experience['company'];?></td>
                           <td><?php echo $experience['position'];?></td>
                           <td><?php echo $experience['start_date'];?></td>
                           <td><?php echo $experience['end_date'];?></td>
                           <td><?php echo $experience['description'];?></td>
                           <td>
                            <a href="<?php echo site_url('experiences/experiences/'.$experience['experience_id'])?>" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"></i></a>
                            <a href="<?php echo site_url('experiences/delete_experience/'.$experience['experience_id'])?>" class="btn btn-danger btn-action" data-toggle="tooltip" title="" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')" data-original-title="Delete"><i class="fas fa-trash"></i></a> 
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