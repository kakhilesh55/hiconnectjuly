<?php $edit_id = $this->uri->segment(3);
 ?>
  <div class="main-content">
        <section class="section">
          <div class="row ">
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                  <div class="card-header">
                    <h4>Social Media Types</h4>
                  </div>
                   <?php if($this->session->flashdata('item')!='') {
                    $message = $this->session->flashdata('item');
                  ?>
                  <div class="<?php echo $message['class'] ?>">
                    <?php echo $message['message']; ?>
                  </div>
                  <?php }  ?>
                  <form name="social_links_type" method="post" action="<?= base_url('social/social_links_type') ?>">
                  <div class="card-body">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="social">Social Media</label>
                        <input type="text" class="form-control" id="social" name="social"  value="<?php echo isset($social_media->social_link_type)?ucfirst($social_media->social_link_type):'';?>" required="">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="social_class">Class</label>
                        <input type="text" class="form-control" id="social_class" name="social_class"  value="<?php echo isset($social_media->social_class)?$social_media->social_class:'';?>" required="">
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
                    <h4>Social Medias</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Social Media Name</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                         if(isset($socail_medias) && is_array($socail_medias) && count($socail_medias)): $slno=1; 
                          foreach($socail_medias as $socail_media) : 
                          ?>
                          <tr>
                           <td><?php echo $slno;?></td>
                            <td><?php echo ucfirst($socail_media['social_link_type']);?></td>
                           <td><a href="<?php echo site_url('social/social_links_type/'.$socail_media['social_link_id'])?>" class="btn btn-primary" title="Edit"><i class="fa fa-edit"></i></a> 
                             <a href="<?php echo site_url('social/delete_social_link_type/'.$socail_media['social_link_id'])?>" class="btn btn-icon btn-danger" title="Delete"><i class="fa fa-times"></i></a></td>
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