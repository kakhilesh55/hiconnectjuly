<?php $edit_id = $this->uri->segment(3);?>
  <div class="main-content">
        <section class="section">
          <div class="row ">
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                  <div class="card-header">
                    <h4>Manage Themes</h4>
                  </div>
                  <?php 
                   if(!empty($statusMsg)) {
                  ?>
                  <div class="<?php echo $statusMsg['class'] ?>">
                    <?php echo $statusMsg['message']; ?>
                  </div>
                  <?php } 
                  else if($this->session->flashdata('item')!='') {
                    $message = $this->session->flashdata('item');
                  ?>
                  <div class="<?php echo $message['class'] ?>">
                    <?php echo $message['message']; ?>
                  </div>
                  <?php } ?>
                  <form name="themes" method="post" action="" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="name">Name</label>
                          <input type="text" class="form-control" id="theme_name" name="theme_name" value="<?php echo isset($theme->theme_name)?$theme->theme_name:'';?>" required="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="image">Theme Image</label>
                            <input type="file" name="theme_image" id="theme_image" class="form-control"/>
                            <?php if(!empty($theme->theme_image)){ ?>
                            <div class="img-box">
                                <img src="<?php echo base_url('uploads/theme_images/'.$theme->theme_image); ?>" height="100px" width="100px">
                            </div>
                            <?php } ?>
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
                            <th>Theme Image</th>
                             <th>Theme Name</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                         if(isset($themes) && is_array($themes) && count($themes)): $slno=1; 
                          foreach($themes as $theme) : 
                          ?>
                          <tr>
                           <td><?php echo $slno;?></td>
                           <td><?php if($theme['theme_image']!=''){ ?>
                            <img src="<?php echo base_url('uploads/theme_images/'.$theme['theme_image']); ?>" width="100px" height="100px">
                          <?php } else { ?>
                            <img src="<?php echo base_url('uploads/theme_images/default_theme_image.png'); ?>" width="100px" height="100px" >
                          <?php } ?></td>
                           <td><?php echo $theme['theme_name'];?></td>
                            <td><a href="<?php echo site_url('themes/theme_details/'.$theme['theme_id'])?>" class="btn btn-primary" title="Edit"><i class="fa fa-edit"></i></a> 
                             <a href="<?php echo site_url('themes/delete_theme/'.$theme['theme_id'])?>" class="btn btn-icon btn-danger" title="Delete"><i class="fa fa-times"></i></a></td>
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