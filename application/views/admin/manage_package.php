
  <div class="main-content">
        <section class="section">
          <div class="row ">
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                  <div class="card-header">
                    <h4>Set Access for Packages</h4>
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
                  <form name="manage_package" method="post" action="" >

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
                      <div class="form-group col-md-4 cover">
                        <label for="package">Select Package</label>
                        <select id="package" name="package" class="form-control" >
                          <?php 
                         if(isset($packages) && count($packages)):
                          foreach($packages as $package) :
                          ?>
                          <option value="<?php echo $package['package_id'];?>"  <?php if(isset($selected_package)){echo ($selected_package== $package['package_id'])?'selected':'';} ?>
                        ><?php echo $package['package'];?></option>
                           <?php  
                        endforeach; 
                         endif; ?>
                        </select>
                      </div>

                     <div class="form-group col-md-4 cover " style="padding-top: 30px">
                         <input class="btn btn-primary" type="submit" name="show_pages" value="Show Pages"/>
                      </div>
                    </div>

                        <div class="form-row">
                       <?php 
                        $pages_arr = array("Themes","Covers","Personal Details","Company Details","Contact Details","Social Links","Services","Testimonials","Achievements","Experience","Education","Products","Gallery","Payment Details","Enquiries","Generate QR Code","Change Password","Package");

                        if(isset($show_pages) && $show_pages!=''):
                          $checked_arr = explode(",",$show_pages->page);
                        endif; 
                        foreach($pages_arr as $pages) : 
                          $checked = "";
                          if(isset($show_pages) && $show_pages!=''):
                            if(in_array($pages,$checked_arr)){
                              $checked = "checked";
                            }
                          endif; 
                          if(isset($selected_package)):
                        ?>
                          <div class="form-group col-md-3 pretty p-icon p-smooth">
                            <input type="checkbox" name="page[]"  value="<?php echo $pages;?>" <?php echo $checked; ?> >
                            <div class="state p-success">
                              <i class="icon material-icons">done</i>
                              <label><?php echo $pages;?></label>
                            </div>
                          </div>
                        <?php 
                        endif;
                        endforeach; 
                        ?>
                        </div>
                         <?php /* <div class="form-group col-md-3 pretty p-icon p-smooth">
                              <input type="checkbox" name="page[]" id="set_cover" value="set_cover">
                              <div class="state p-success">
                                <i class="icon material-icons">done</i>
                                <label>Covers</label>
                              </div>
                          </div>
                          <div class="form-group col-md-3 pretty p-icon p-smooth">
                              <input type="checkbox" name="page[]" id="details" value="details">
                              <div class="state p-success">
                                <i class="icon material-icons">done</i>
                                <label>Personal Details</label>
                              </div>
                          </div>
                          <div class="form-group col-md-3 pretty p-icon p-smooth">
                              <input type="checkbox" name="page[]" id="company" value="company">
                              <div class="state p-success">
                                <i class="icon material-icons">done</i>
                                <label>Company Details</label>
                              </div>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-3 pretty p-icon p-smooth">
                            <input type="checkbox" name="page[]" id="contact" value="contact">
                            <div class="state p-success">
                              <i class="icon material-icons">done</i>
                              <label>Contact Details</label>
                            </div>
                          </div>
                          <div class="form-group col-md-3 pretty p-icon p-smooth">
                              <input type="checkbox" name="page[]" id="services" value="services">
                              <div class="state p-success">
                                <i class="icon material-icons">done</i>
                                <label>Services</label>
                              </div>
                          </div>
                          <div class="form-group col-md-3 pretty p-icon p-smooth">
                              <input type="checkbox" name="page[]" id="testimonials" value="testimonials">
                              <div class="state p-success">
                                <i class="icon material-icons">done</i>
                                <label>Testimonials</label>
                              </div>
                          </div>
                          <div class="form-group col-md-3 pretty p-icon p-smooth">
                              <input type="checkbox" name="page[]" id="achievements" value="achievements">
                              <div class="state p-success">
                                <i class="icon material-icons">done</i>
                                <label>Achievements</label>
                              </div>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-3 pretty p-icon p-smooth">
                            <input type="checkbox" name="page[]" id="experiences" value="experiences">
                            <div class="state p-success">
                              <i class="icon material-icons">done</i>
                              <label>Experiences</label>
                            </div>
                          </div>
                          <div class="form-group col-md-3 pretty p-icon p-smooth">
                              <input type="checkbox" name="page[]" id="education" value="education">
                              <div class="state p-success">
                                <i class="icon material-icons">done</i>
                                <label>Education</label>
                              </div>
                          </div>
                          <div class="form-group col-md-3 pretty p-icon p-smooth">
                              <input type="checkbox" name="page[]" id="products" value="products">
                              <div class="state p-success">
                                <i class="icon material-icons">done</i>
                                <label>Products</label>
                              </div>
                          </div>
                          <div class="form-group col-md-3 pretty p-icon p-smooth">
                              <input type="checkbox" name="page[]" id="gallery" value="gallery">
                              <div class="state p-success">
                                <i class="icon material-icons">done</i>
                                <label>Gallery</label>
                              </div>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-3 pretty p-icon p-smooth">
                            <input type="checkbox" name="page[]" id="payment" value="payment">
                            <div class="state p-success">
                              <i class="icon material-icons">done</i>
                              <label>Payment</label>
                            </div>
                          </div>
                          <div class="form-group col-md-3 pretty p-icon p-smooth">
                              <input type="checkbox" name="page[]" id="enquiries" value="enquiries">
                              <div class="state p-success">
                                <i class="icon material-icons">done</i>
                                <label>Enquiries</label>
                              </div>
                          </div>
                          <div class="form-group col-md-3 pretty p-icon p-smooth">
                              <input type="checkbox" name="page[]" id="qrimages" value="qrimages">
                              <div class="state p-success">
                                <i class="icon material-icons">done</i>
                                <label>Generate QR Code</label>
                              </div>
                          </div>
                          <div class="form-group col-md-3 pretty p-icon p-smooth">
                              <input type="checkbox" name="page[]" id="changepass" value="changepass">
                              <div class="state p-success">
                                <i class="icon material-icons">done</i>
                                <label>Change Password</label>
                              </div>
                          </div>
                        </div>*/?>
                        <input type="hidden" name="set_coverimg" id="set_coverimg" value="">
                    </div>
                  <div class="card-footer ">
                     <input class="btn btn-primary" type="submit" name="submit" value="SUBMIT"/>
                  </div>
                </form>
              
            </div>

              </div>
              </div>
            </section>
          </div>
