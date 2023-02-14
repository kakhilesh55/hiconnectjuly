
  <div class="main-content">
        <section class="section">
          <div class="row ">
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                  <div class="card-header">
                    <h4>Gallery</h4>
                  </div>
                  <!-- Display status message -->
                 
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
                  <form name="user" method="post" action="" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="image">Images</label>
                          <input type="file" class="form-control" name="files[]" multiple/>
                    </div>
                  </div>
                  </div>
                  <div class="card-footer">
                    <input class="btn btn-primary" type="submit" name="fileSubmit" value="UPLOAD"/>
                  </div>
                </form>
                <div class="row">
              <div class="col-12">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th>
                             Sl. No.
                            </th>
                            <th>Image</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php if(!empty($files)){
                          $slno=1; 
                           foreach($files as $file){ ?>
                          <tr>
                           <td><?php echo $slno;?></td>
                           <td> 
                            <img src="<?php echo base_url('uploads/files/'.$file['file_name']); ?>" width="100px" height="100px" >
                            <span class="mb-1" data-dz-name=""><?php echo $file['file_name'];?></span>
                          </td>
                            <td>
                             <a href="<?php echo site_url('gallery/delete_image/'.$file['id'])?>" class="btn btn-icon btn-danger" title="Delete"><i class="fa fa-times"></i></a></td>
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