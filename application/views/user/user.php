<?php $edit_id = $this->uri->segment(3); ?>
  <div class="main-content">
        <section class="section">
          <div class="row ">
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                  <div class="card-header">
                    <h4><?php echo isset($edit_id)?'Update User':'Create New User';?></h4>
                  </div>
                     <?php if($this->session->flashdata('item')!='') {
                    $message = $this->session->flashdata('item');
                  ?>
                  <div class="<?php echo $message['class'] ?>">
                    <?php echo $message['message']; ?>
                  </div>
                  <?php }  ?>
                  <form name="user" method="post" action="<?= base_url('admin/user') ?>" >
                  <div class="card-body">
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="name">Full Name</label>
                        <input name="name" type="text" class="form-control" id="name" value="<?php echo isset($user_details->name)?$user_details->name:'';?>" required="">
                      </div>
                       <div class="form-group col-md-4">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?php echo isset($user_details->email)?$user_details->email:'';?>" required="" >
                      </div>
                        <div  class="form-group col-md-4">
                      <label for="phone">Phone Number</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-phone"></i>
                          </div>
                        </div>
                        <input type="text" name="phone" id="phone" class="form-control phone-number" value="<?php echo isset($user_details->phone)?$user_details->phone:'';?>" required="">
                      </div>
                    </div>
                    </div>
                    <?php if(!isset($user_details)):?>
                    <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="user_id">User ID</label>
                      <input type="text" class="form-control" id="user_id" name="user_id" readonly="true" required="" value="<?php echo set_value('user_id'); ?>">
                    </div>
                      <div class="form-group col-md-4">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="">
                      </div>
                     <div class="form-group col-md-4" style="margin-top: 2rem;color:#fff;">
                      <a onclick="return randomPassword(8);" class="btn btn-success">Generate Password</a>
                       <button class="btn btn-primary" onclick="myFunction()">Copy Password</button>
                    </div> 
                    </div>
                  <?php endif; ?>
                    <div class="form-row">
                       <div class="form-group col-md-4">
                        <label for="card_id">Card ID</label>
                        <input name="card_id" type="text" class="form-control" id="card_id" value="<?php echo isset($user_details->card_id)?$user_details->card_id:'';?>" required="">
                      </div>
                    <div class="form-group col-md-4">
                        <label for="type">Type</label>  
                        <select id="type" name="type" class="form-control" required="">
                          <option value="">Select Type</option>
                          <option value="1" <?php if(isset($user_details->type)){echo ($user_details->type==1)?'selected':'';} ?>>Personal</option>
                          <option value="2" <?php if(isset($user_details->type)){echo ($user_details->type==2)?'selected':'';} ?>>Business</option>
                        </select>
                      </div>
                       <div class="form-group col-md-4">
                        <label for="user_level">User Level</label>
                        <select id="user_level" name="user_level" class="form-control" required="">
                          <option value="">Select User Level</option>
                          <option value="1" <?php if(isset($user_details->user_level)){echo ($user_details->user_level==1)?'selected':'';} ?>>Admin</option>
                          <option value="2" <?php if(isset($user_details->user_level)){echo ($user_details->user_level==2)?'selected':'';} ?>>Manager</option>
                          <option value="3" <?php if(isset($user_details->user_level)){echo ($user_details->user_level==3)?'selected':'';} ?>>User</option>
                        </select>
                      </div>
                       <div class="form-group col-md-4 cover Select">
                        <label for="package">Package</label>
                        <select id="package" name="package" class="form-control" >
                          <?php 
                         if(isset($packages) && count($packages)):
                          foreach($packages as $package) :
                          ?>
                          <option value="<?php echo $package['package_id'];?>"  <?php if(isset($user_details->package)){echo ($user_details->package== $package['package_id'])?'selected':'';} ?>
                        ><?php echo $package['package'];?></option>
                           <?php  
                        endforeach; 
                         endif; ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <?php if(!empty($edit_id)){?>
                          <input type="hidden" name="action" value="<?php echo @$edit_id; ?>" >
                         <?php  } else {?>
                          <input type="hidden" name="action" value="create">
                          <?php } ?>
                    <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Submit">
                  </div>
                </form>
                </div>
              </div>
              </div>
            </section>
          </div>

          <script>
          function randomPassword(length) {
              var chars = "abcdefghijklmnopqrstuvwxyz!@#$%^&*()-+<>ABCDEFGHIJKLMNOP1234567890";
              var pass = "";
              for (var x = 0; x < length; x++) {
                  var i = Math.floor(Math.random() * chars.length);
                  pass += chars.charAt(i);
              }
               user.password.value = pass;
              $("#password").val = pass;
          }


      function myFunction() {
        /* Get the text field */
        var copyText = document.getElementById("password");

        /* Select the text field */
        copyText.select();
       // copyText.setSelectionRange(0, 99999); /* For mobile devices */

        /* Copy the text inside the text field */
        navigator.clipboard.writeText(copyText.value);
        
        /* Alert the copied text */
        alert("Password Copied to clipboard");
      }
          $('#phone').bind('keyup keypress blur', function() {
            var input1   = $(this).val();
            $('#user_id').val(input1);
          });

            $('#name').bind('keyup keypress blur', function() {
            var input2   = $(this).val();
           //var card_id = input2.replace(/\s/g, '.');
            var card_id = input2.split(" ").join(".").toLowerCase();
            $('#card_id').val(card_id);
          });


      </script>