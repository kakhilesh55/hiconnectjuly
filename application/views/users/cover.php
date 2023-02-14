
  <div class="main-content">
        <section class="section">
          <div class="row ">
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                  <div class="card-header">
                    <h4>Covers</h4>
                  </div>
                   <?php 
                  if($this->session->flashdata('item')!='') {
                    $message = $this->session->flashdata('item');
                  ?>
                  <div class="<?php echo $message['class'] ?>">
                    <?php echo $message['message']; ?>
                  </div>
                  <?php } ?>
                  <div class="card-body">
                  <form name="user" method="post" action="" enctype="multipart/form-data">

                    <?php if(isset($show_selected_cover)){ ?>
                      <h6>Selected Cover Image</h6>
                    <div class="form-row"> 

                         <article class="col-lg-3 col-md-4 col-sm-6 col-xs-12 text-center cover_images  portfolio-item apps">
                              <div class="portfolio-thumb in">
                                <a href="#" class="main-link">
                                  <img class="img-responsive img-center" src="<?php if(isset($show_selected_cover)){ echo base_url('uploads/cover_images/'.$show_selected_cover);} ?>" style="max-height:300px;">
                                </a>
                              </div>
                            </article>
                    </div>
                  <?php } ?>
                    <div class="form-row">
                       <div class="form-group col-md-4">
                        <label for="cover_type">Select/Upload Cover</label>
                        <select id="cover_type" name="cover_type" class="form-control" onchange="$('.cover').hide();$('.'+this.value).show();">
                          <option value="Select">Select Cover</option>
                          <option value="Upload">Upload Cover</option>
                        </select>
                      </div>
                      <div class="form-group col-md-4 cover Select">
                        <label for="category">Select Category</label>
                        <select id="category" name="category" class="form-control" >
                          <?php 
                         if(isset($categories) && count($categories)):
                          foreach($categories as $category) :
                          ?>
                          <option value="<?php echo $category['category_id'];?>"  <?php if(isset($selected_category)){echo ($selected_category== $category['category_id'])?'selected':'';} ?>
                        ><?php echo $category['category'];?></option>
                           <?php  
                        endforeach; 
                         endif; ?>
                        </select>
                      </div>
                     
                      <div class="form-group col-md-4 cover Upload" style="display: none;">
                        <label for="upload_cover">Upload Cover</label>
                         <input type="file" name="cover_image" id="cover_image" class="form-control" />
                      </div>

                     <div class="form-group col-md-4 cover Select" style="padding-top: 30px">
                         <input class="btn btn-primary" type="submit" name="show_image" value="Show Image"/>
                      </div>
                    </div>

                    <div class="row cover Select">
                       <?php 
                         if(isset($show_images) && $show_images!=''):
                          foreach($show_images as $show_image) : 
                          ?>

                          <article class="col-lg-3 col-md-4 col-sm-6 col-xs-12 text-center cover_images  portfolio-item apps">
                              <div class="portfolio-thumb in">
                                <a href="#" class="main-link">
                                  <img class="img-responsive img-center" src="<?php echo base_url('uploads/cover_images/'.$show_image['file_name']); ?>" alt="" height="300px">
                                   <input class="project-title" type="submit" name="set_cover" value="Set Cover" onclick="SetCover(<?php echo $show_image['cover_id'];?>)" />
                                   <span class="overlay-mask"></span>
                                </a>
                              </div>
                            </article>

                        <?php  
                        endforeach; 
                         else: ?>
                           <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 text-center ">
                              <span>No Records Found..</span></div>
                          <?php endif; ?>
                        <input type="hidden" name="set_coverimg" id="set_coverimg" value="">
                    </div>
                    </div>
                  <div class="card-footer cover Upload" style="display: none;">
                     <input class="btn btn-primary" type="submit" name="fileSubmit" value="SUBMIT"/>
                  </div>
                </form>
              
            </div>

              </div>
              </div>
            </section>
          </div>
          <script type="text/javascript">
            function SetCover(e)
            {
              $('#set_coverimg').val(e);
            }
          </script>
