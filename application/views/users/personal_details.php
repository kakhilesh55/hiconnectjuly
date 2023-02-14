<?php $edit_id = $this->session->userdata('id'); ?>
  <div class="main-content">
        <section class="section">
          <div class="row ">
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Personal Details</h4>
                  </div>
                  <?php 
                  if((isset($user_details->address) && $user_details->address=='') || (isset($user_details->shipping_address) && $user_details->shipping_address==''))
                  { ?> 
                    <script>alert('Please Enter the Billing Address and Shipping Address');</script>
                  <?php 
                  } ?>
                  <?php 
                  if($this->session->flashdata('item')!='') {
                    $message = $this->session->flashdata('item');
                  ?>
                  <div class="<?php echo $message['class'] ?>">
                    <?php echo $message['message']; ?>
                  </div>
                  <?php } ?>
                  <form name="user" method="post" action="<?= base_url('users/details') ?>" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="row ">
                      <div class="col-md-3 text-center">
                         <div class="form-row">
                          <div class="form-group">
                            <div class="author-box-center">
                              <div  id="image-holder">
                                <img alt="image" src="<?php if(isset($user_details->user_image) && ($user_details->user_image!='')) { echo base_url('uploads/user_images/'.$user_details->user_image); } else { echo base_url('uploads/user_images/default_user_img.jpg'); } ?>" class="rounded-circle author-box-picture" style="height: 200px;width:200px;">
                              </div>
                              <label for="profile"> 
                                <input type="file" name="user_image" id="user_image" class="form-control" />
                              </label>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="inputCity">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo isset($user_details->name)?$user_details->name:'';?>" required="">
                      </div>
                            
                       <div class="form-group col-md-4">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($user_details->email)?$user_details->email:'';?>" readonly="readonly" required="">
                      </div>
                        <div  class="form-group col-md-4">
                      <label for="phone">Phone Number</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-phone"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control phone-number"  id="phone" name="phone" value="<?php echo isset($user_details->phone)?$user_details->phone:'';?>" readonly="readonly" required="">
                      </div>
                    </div>  
                    
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="type">Account Type</label>  
                        <select id="type" name="type" class="form-control" required="">
                          <option value="">Select Type</option>
                          <option value="1" <?php if(isset($user_details->type)){echo ($user_details->type==1)?'selected':'';} ?>>Personal</option>
                          <option value="2" <?php if(isset($user_details->type)){echo ($user_details->type==2)?'selected':'';} ?>>Business</option>
                        </select>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="profession">Profession</label>
                        <input type="text" class="form-control" id="profession" name="profession" value="<?php echo isset($user_details->profession)?$user_details->profession:'';?>">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="website">Website</label>
                        <input type="text" class="form-control" id="website" name="website" value="<?php echo isset($user_details->website)?$user_details->website:'';?>">
                      </div>
                    </div>
                    <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="google_map_link">Google Maps Link</label>
                        <input type="text" class="form-control" id="google_map_link" name="google_map_link" value="<?php echo isset($user_details->google_map_link)?$user_details->google_map_link:'';?>">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="address">Billing Address</label>
                        <textarea class="form-control" id="address" name="address" required><?php echo isset($user_details->address)?$user_details->address:'';?></textarea>
                      </div>
                      <div class="form-group col-md-6">
                        <div  style="float: right;">
                          <input type="checkbox" id="myCheck" onclick="myFunction()"> 
                          <label for="myCheck">Same as Billing Address:</label> 
                     </div>  
                        <label for="address">Shipping Address</label>
                        <textarea class="form-control" id="shipping_address" name="shipping_address" required><?php echo isset($user_details->shipping_address)?$user_details->shipping_address:'';?></textarea>
                      </div>

                      <div class="form-group col-md-12">
                        <label for="about">About</label>
                        <textarea class="form-control" id="about" name="about" maxlength="250"><?php echo isset($user_details->about)?$user_details->about:'';?></textarea>
                      </div>
                    </div>
                  </div>
                </div>
                  </div>
                  <div class="card-footer">
                      <input type="hidden" name="action" value="<?php echo @$edit_id; ?>" >
                      <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Update">
                  </div>
                </form>
                </div>
              </div>
              </div>
            </section>
          </div>

          <script>
          function myFunction() {
            var checkBox = document.getElementById("myCheck");    
            var textBil = document.getElementById("address");  
            var textShip = document.getElementById("shipping_address");
            if (checkBox.checked == true){
                  textShip.value=textBil.value;  
            } else {
                  textShip.value="";
            }
          }
        
      $(document).ready(function() {
        $("#user_image").on('change', function() {
          //Get count of selected files
          var countFiles = $(this)[0].files.length;
          var imgPath = $(this)[0].value;
          var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
          var image_holder = $("#image-holder");
          image_holder.empty();
          if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
            if (typeof(FileReader) != "undefined") {
              //loop for each file selected for uploaded.
              for (var i = 0; i < countFiles; i++) 
              {
                var reader = new FileReader();
                reader.onload = function(e) {
                  $("<img />", {
                    "src": e.target.result,
                    "class": "rounded-circle author-box-picture"
                  }).appendTo(image_holder);
                }
                image_holder.show();
                reader.readAsDataURL($(this)[0].files[i]);
              }
            } else {
              alert("This browser does not support FileReader.");
            }
          } else {
            alert("Pls select only images");
          }
        });
      });
</script>
