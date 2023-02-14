<?php $edit_id = $this->uri->segment(3); ?>
  <div class="main-content">
        <section class="section">
          <div class="row ">
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                  <div class="card-header">
                    <h4>Social Links</h4>
                  </div>
                   <?php if($this->session->flashdata('item')) {
                    $message = $this->session->flashdata('item');
                  ?>
                  <div class="<?php echo $message['class'] ?>">
                    <?php echo $message['message']; ?>
                  </div>
                  <?php }  ?>
                 <form name="social_links" method="post" action="<?= base_url('social_link/social_links') ?>">
                  <div class="card-body">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="social_link_type">Social Media Type</label>
                        <select id="social_link_type" name="social_link_type" class="form-control">
                           <?php 
                         if(isset($social_link_types) && count($social_link_types)):
                          foreach($social_link_types as $social_link_type) : 
                          ?>
                          <option value="<?php echo $social_link_type['social_link_id'];?>"  <?php if(isset($social_link->social_link_type)){echo ($social_link->social_link_type== $social_link_type['social_link_id'])?'selected':'';} ?>><?php echo ucfirst($social_link_type['social_link_type']);?></option>
                           <?php  
                        endforeach; 
                         endif; ?>
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="link">Link</label>
                        <input type="text" class="form-control" id="link" name="link" value="<?php echo isset($social_link->link)?$social_link->link:'';?>" required="">
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
                            <th>Social Media</th>
                            <th>Link</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                         if(isset($social_links) && is_array($social_links) && count($social_links)): $slno=1;
                          foreach($social_links as $social_link) : 
                          ?>
                          <tr>
                           <td><?php echo $slno;?></td>
                            <td> <?php 
                            if(isset($social_link_types) && count($social_link_types)):
                              foreach($social_link_types as $social_link_type) : 
                                echo ucfirst(($social_link['social_link_type']==$social_link_type['social_link_id'])?$social_link_type['social_link_type']:'');
                              endforeach; 
                            endif; ?>
                            </td>
                            <td><?php echo $social_link['link'];?></td>
                           <td><a href="<?php echo site_url('social_link/social_links/'.$social_link['user_social_id'])?>" class="btn btn-primary" title="Edit"><i class="fa fa-edit"></i></a> 
                             <a href="<?php echo site_url('social_link/delete_social_link/'.$social_link['user_social_id'])?>" class="btn btn-icon btn-danger" title="Delete"><i class="fa fa-times"></i></a></td>
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