
  <div class="main-content">
        <section class="section">
          <div class="row ">
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                  <div class="card-header">
                    <h4>Manage Cover Image</h4>
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
                  <form name="manage_cover" method="post" action="" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="cover_category">Category</label>
                        <select id="cover_category" name="cover_category" class="form-control" required="">
                           <?php 
                         if(isset($categories) && count($categories)):
                          foreach($categories as $category) : 
                          ?>
                          <option value="<?php echo $category['category_id'];?>" ><?php echo $category['category'];?></option>
                           <?php  
                        endforeach; 
                         endif; ?>
                        </select>
                      </div>
                    <div class="form-group col-md-6">
                      <label for="cover_images">Cover Image</label>
                          <input type="file" class="form-control" name="cover_images[]" multiple required="" />
                    </div>
                  </div>
                  </div>
                  <div class="card-footer">
                     <input class="btn btn-primary" type="submit" name="fileSubmit" value="SUBMIT"/>
                  </div>
                </form>
                <div class="row">
              <div class="col-12">
                  <div class="card-header">
                    <h4>Cover Images</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Category Name</th>
                            <th>Image</th>
                            <th>Added By</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($cover_images)){
                          $slno=1; 
                           foreach($cover_images as $cover_image){ ?>
                          <tr>
                           <td><?php echo $slno;?></td>
                           <td> <?php 
                           if($cover_image['category_id'])
                           {
                            if(isset($categories) && count($categories)):
                              foreach($categories as $category) : 
                                echo ($category['category_id']==$cover_image['category_id'])?$category['category']:'';
                              endforeach; 
                            endif;
                           }
                           else{
                            echo "user uploads";
                           }

                             ?>
                            </td>
                           <td> 
                            <img src="<?php echo base_url('uploads/cover_images/'.$cover_image['file_name']); ?>" width="100px" height="100px" >
                            <span class="mb-1" data-dz-name=""><?php echo $cover_image['file_name'];?></span>
                          </td>
                           <td><?php  if($cover_image['added_by']==1) echo "Admin"; else if($cover_image['added_by']==2) echo "Manager"; else if($cover_image['added_by']==3) echo "User";?></td>
                            <td>
                             <a href="<?php echo site_url('cover_image/delete_cover_image/'.$cover_image['cover_id'])?>" class="btn btn-icon btn-danger" title="Delete"><i class="fa fa-times"></i></a></td>
                          </tr>
                           <?php  
                          $slno++;
                        } }
                        else { ?>
                          <tr>
                              <td colspan="3" align="center" >No Records Found..</td>
                          </tr>
                          <?php
                             } ?>
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