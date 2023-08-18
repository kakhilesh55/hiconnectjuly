<br><br><br>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 

<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center col-xl-9 justify-content-between">
      <a href="/" class="hic-logo"><img src="../assets/img/logo.png" alt=""></a>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt=""></a>-->
	  <a href="<?php echo base_url(); ?>auth/" class="get-started-btn scrollto btn-gets">Login</a>
    </div>
  </header>
<?php if(isset($_GET['package']))
{
  $package = $_GET['package'];
  $url = base_url().'auth/registration?package='.$package;
}
if(isset($_GET['product']) && $_GET['product']!='')
{
  $product = $_GET['product'];
  $url.= "&product=".$product;
}
if(isset($_GET['coupon']) && $_GET['coupon']!='')
{        
  $coupon = $_GET['coupon'];
  $url.= "&coupon=".$coupon;
}
?>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
            <div class="card card-primary login-fm hi-fm-reg">
              <div class="card-header">
                <h4>Register/Sign Up</h4>
              </div>
              <?php if($this->session->flashdata('item')!='') {
                    $message = $this->session->flashdata('item');
                  ?>
                  <div class="<?php echo $message['class'] ?>">
                    <?php echo $message['message']; ?>
                  </div>
                  <?php }  ?>
              <div class="card-body">
                <form method="POST" action="<?php echo $url; ?>"  id="registration_form">
                  <div class="form-outline mb-4">
                    <label for="name">Name</label>
                    <input id="name" type="text" class="form-control" name="name" value="<?php echo $this->input->post('name'); ?>" tabindex="1" required autofocus>
                    <span id="name_error" class="text-danger"><?php echo form_error('name'); ?></span>
                  </div>
                    <div class="form-outline mb-4">
                    <label for="name">Last Name</label>
                    <input id="lname" type="text" class="form-control" name="lname" value="<?php echo $this->input->post('lname'); ?>" tabindex="1" required autofocus>
                    <span id="lname_error" class="text-danger"><?php echo form_error('lname'); ?></span>
                  </div>
                  <div class="form-outline mb-4">
                    <label for="email">Email</label>
                    <input id="email" type="text" class="form-control" name="email" value="<?php echo $this->input->post('email'); ?>" tabindex="1" required autofocus>
                     <span id="email_error" class="text-danger"><?php echo form_error('email'); ?></span>
                  </div>
                  <div class="form-outline mb-4">
                    <label for="phone">Phone</label>
                    <input id="phone" type="text" class="form-control" name="phone" tabindex="1" value="<?php echo $this->input->post('phone'); ?>" required autofocus>
                    <span id="phone_error" class="text-danger"><?php echo form_error('phone'); ?></span>
                  </div>
                  <div class="form-outline mb-4">
                    <label for="password">Password</label>
                    <input id="password1" type="password" class="form-control pwstrength" data-indicator="pwindicator"
                      name="password1" tabindex="2" value="<?php echo $this->input->post('password1'); ?>" required>
                    <span id="password1_error" class="text-danger"><?php echo form_error('password1'); ?></span>
                    <div id="pwindicator" class="pwindicator">
                      <div class="bar"></div>
                      <div class="label"></div>
                    </div>
                  </div>
                 <div class="form-outline mb-4">
                    <label for="password-confirm">Confirm Password</label>
                    <input id="password2" type="password" class="form-control" name="password2" value="<?php echo $this->input->post('password2'); ?>"
                      tabindex="2" required>
                      <span id="password2_error" class="text-danger"><?php echo form_error('password2'); ?></span>
                  </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox rstr-chk">
                        <input type="checkbox" id="accept_terms" name="accept_terms" value="1" class="form-check-input" required>
                        <label for="accept_terms">By continuing, you agree to our <a href="<?php echo base_url(); ?>Front/privacy" target="_blank">Privacy Policy</a> and <a href="<?php echo base_url(); ?>Front/terms" target="_blank">Terms of Service</a></label><br>
                    </div>
                    <span id="acceptterms_error" class="text-danger"><?php echo form_error('accept_terms'); ?></span>
                  </div>
                  <div class="form-group">
                    <input type="hidden" name="package" id="package" value="<?php echo $package;?>">
                    <?php if(isset($product) && $product!='') { ?>
                    <input type="hidden" name="product" id="product" value="<?php echo $product;?>">
                    <?php } if(isset($coupon) && $coupon!='') { ?>
                    <input type="hidden" name="coupon" id="coupon" value="<?php echo $coupon;?>">
                    <?php } ?>
                    <input type="hidden" name="card_id" id="card_id" value="">
                    <input type="hidden" name="user_id" id="user_id" value="">
                    <div class="text-center">
                    <input type="submit" name="submit" id="submit" class="btn-hi btn-red" value="Register">
                    </div>
                  </div>
                </form>
              </div>
            </div>
        </div>
      </div>
    </section>
  </div>

  <script>
     $('#name').bind('keyup keypress blur', function() {
            var input2   = $(this).val();
            var card_id = input2.split(" ").join(".").toLowerCase();
            $('#card_id').val(card_id);
          });
          
    $('#email').bind('keyup keypress blur', function() {
            var user_id   = $(this).val();
            $('#user_id').val(user_id);
          });

    </script>
 <style>
  .text-danger p{
    color: #fc544b !important
  }
 </style>

 