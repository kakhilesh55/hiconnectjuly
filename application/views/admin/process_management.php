<?php $edit_id = $this->uri->segment(3); ?>
  <div class="main-content">
        <section class="section">
          <div class="row ">
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                  <div class="card-header">
                    <h4><?php echo 'Process Orders';?></h4>
                  </div>
                  <?php if($this->session->flashdata('item')!='') {
                    $message = $this->session->flashdata('item');
                  ?>
                  <div class="<?php echo $message['class'] ?>">
                    <?php echo $message['message']; ?>
                  </div>
                  <?php }  ?>
                  <form name="user" method="post" action="<?= base_url('manage_orders/process_orders/'.$edit_id) ?>" >
                  <div class="card-body">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                          <?php if(!empty($user_details->product_image)){ ?>
                        <div class="img-box">
                          <!--  <img src="<?php echo base_url('uploads/manage_products/'.$user_details->product_image); ?>" height="100px" width="100px">
                          -->
                       
                        </div>
                    <?php } ?>
                      </div>
                    </div>
                    
                    <div class="form-row">  
                      <div class="form-group col-md-4">
                        <label for="type">Product Status</label>  
                        <select id="product_status" name="product_status" class="form-control" onchange="generate_invoice(this.value)">
                          <option value="0" <?php if(isset($user_details->order_status)){echo ($user_details->order_status== 0)?'selected':'';} ?>>Pending</option>
                          <option value="1" <?php if(isset($user_details->order_status)){echo ($user_details->order_status== 1)?'selected':'';} ?>>Processing</option>
                          <option value="2" <?php if(isset($user_details->order_status)){echo ($user_details->order_status== 2)?'selected':'';} ?>>Awaiting Payment</option>
                          <option value="3" <?php if(isset($user_details->order_status)){echo ($user_details->order_status== 3)?'selected':'';} ?>>Awaiting Pickup</option>
                          <option value="4" <?php if(isset($user_details->order_status)){echo ($user_details->order_status== 4)?'selected':'';} ?>>Shipped</option>
                          <option value="5" <?php if(isset($user_details->order_status)){echo ($user_details->order_status== 5)?'selected':'';} ?>>Cancelled</option>
                          <option value="6" <?php if(isset($user_details->order_status)){echo ($user_details->order_status== 6)?'selected':'';} ?>>Declined</option>
                          <option value="7" <?php if(isset($user_details->order_status)){echo ($user_details->order_status== 7)?'selected':'';} ?>>Refunded</option>
                          <option value="8" <?php if(isset($user_details->order_status)){echo ($user_details->order_status== 8)?'selected':'';} ?>>Completed</option>

                        </select>
                      </div>                    
                      <div class="form-group col-md-4">
                        <label for="type">Billing Address</label>  
                        <textarea class="form-control" id="billing_address" name="billing_address" maxlength="250" readonly><?php echo $user_details->shipping_address;?></textarea>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="type">Shipping Address</label>  
                        <textarea class="form-control" id="shipping_address" name="shipping_address" maxlength="250"readonly ><?php echo isset($user_details->shipping_address)?$user_details->shipping_address:'';?></textarea>
                      </div>

                    </div>

                 

                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="name">Name</label>
                        <input name="name" type="text" class="form-control" id="name" value="<?php echo isset($user_details->name)?$user_details->name:'';?>" required="" readonly>
                      </div>
                       <div class="form-group col-md-4">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?php echo isset($user_details->email)?$user_details->email:'';?>" required="" readonly>
                      </div>
                        <div  class="form-group col-md-4">
                      <label for="phone">Phone Number</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-phone"></i>
                          </div>
                        </div>
                        <input type="text" name="phone" id="phone" class="form-control phone-number" value="<?php echo isset($user_details->phone)?$user_details->phone:'';?>" required="" readonly>
                      </div>
                    </div>
                    </div>
                  
                    <!--<div class="form-row" id="action" style="display:none;">
                      <div class="form-group col-md-4">
                        <label for="type">Order Actions</label>  
                        <select id="product_status" name="product_statuss" class="form-control">
                          <option value="10" <?php if(isset($user_details->order_action)){echo ($user_details->order_action== 1)?'selected':'';} ?>>Email Invoice/ Order details to customer</option>
                        </select>
                      </div>
                    </div>-->
                  </div>
                  <div class="card-footer">
                    <?php if(!empty($edit_id)){?>
                          <input type="hidden" name="action" value="<?php echo @$edit_id; ?>" >
                         <?php  } ?>
                    <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Update">
                  </div>
                </form>
                </div>
              </div>
              </div>
            </section>
          </div>
      <?php /*  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>*/?>
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

      function generate_invoice(status)
      {
        if(status==1 || status==3)
        {
          $('#action').show();
        }
        else
        {
          $('#action').hide();
        }
      }


      </script>