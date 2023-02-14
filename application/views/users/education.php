<?php $edit_id = $this->uri->segment(3);
 ?>
  <div class="main-content">
        <section class="section">
          <div class="row ">
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                  <div class="card-header">
                    <h4>Education</h4>
                  </div>
                <?php if($this->session->flashdata('item')!='') {
                    $message = $this->session->flashdata('item');
                  ?>
                  <div class="<?php echo $message['class'] ?>">
                    <?php echo $message['message']; ?>
                  </div>
                  <?php }  ?>
                  <form name="education" method="post" action="<?= base_url('education/education_details') ?>">
                  <div class="card-body">
                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo isset($education->name)?$education->name:'';?>" required="">
                      </div>
                    <div class="form-group col-md-3">
                        <label for="university">University/College</label>
                        <input type="text" class="form-control" id="university" name="university" value="<?php echo isset($education->university)?$education->university:'';?>" required="">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="start_date">Start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" value="<?php echo isset($education->start_date)?$education->start_date:'';?>">
                      </div>
                       <div class="form-group col-md-3">
                        <label for="end_date">End Date</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" value="<?php echo isset($education->end_date)?$education->end_date:'';?>">
                      </div>
                    </div>
                    <div class="form-row">
                       <div class="form-group col-md-12">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" maxlength="250"><?php echo isset($education->description)?$education->description:'';?></textarea>
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
                            <th>University/College</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Description</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                           <?php 
                         if(isset($educations) && is_array($educations) && count($educations)): $slno=1; 
                          foreach($educations as $education) : 
                          ?>
                          <tr>
                           <td><?php echo $slno;?></td>
                           <td><?php echo $education['name'];?></td>
                           <td><?php echo $education['university'];?></td>
                           <td><?php echo $education['start_date'];?></td>
                           <td><?php echo $education['end_date'];?></td>
                           <td><?php echo $education['description'];?></td>
                            <td><a href="<?php echo site_url('education/education_details/'.$education['education_id'])?>" class="btn btn-primary" title="Edit"><i class="fa fa-edit"></i></a> 
                             <a href="<?php echo site_url('education/delete_education/'.$education['education_id'])?>" class="btn btn-icon btn-danger" title="Delete"><i class="fa fa-times"></i></a></td>
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