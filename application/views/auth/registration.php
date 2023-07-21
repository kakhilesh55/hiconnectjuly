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
                <form method="POST" action="<?php echo $url; ?>" class="needs-validation" novalidate="">
                  <div class="form-outline mb-4">
                    <label for="name">Name</label>
                    <input id="name" type="text" class="form-control" name="name" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your full name
                    </div>
                  </div>
                    <div class="form-outline mb-4">
                    <label for="name">Last Name</label>
                    <input id="lname" type="text" class="form-control" name="lname" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your full name
                    </div>
                  </div>
                  <div class="form-outline mb-4">
                    <label for="email">Email</label>
                    <input id="email" type="text" class="form-control" name="email" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your full email
                    </div>
                  </div>
                  <div class="form-outline mb-4">
                    <label for="phone">Phone</label>
                    <input id="phone" type="text" class="form-control" name="phone" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your full phone
                    </div>
                  </div>
                  <div class="form-outline mb-4">
                    <label for="password">Password</label>
                    <input id="password1" type="password" class="form-control pwstrength" data-indicator="pwindicator"
                      name="password1" tabindex="2" required>
                    <div class="invalid-feedback">
                      Please fill in your Password
                    </div>
                    <div id="pwindicator" class="pwindicator">
                      <div class="bar"></div>
                      <div class="label"></div>
                    </div>
                  </div>
                 <div class="form-outline mb-4">
                    <label for="password-confirm">Confirm Password</label>
                    <input id="password2" type="password" class="form-control" name="password2"
                      tabindex="2" required>
                      <div class="invalid-feedback">
                      Please fill in your Confirm Password
                    </div>
                  </div>
                    <div class="form-group">
                    <div class="custom-control custom-checkbox rstr-chk">
<input type="checkbox" id="test" name="test" value="Bike">
  <label for="vehicle1">By continuing, you agree to our <a href="#" target="_blank">Privacy Policy</a> and <a href="#" target="_blank">Terms of Service</a></label><br>
                    </div>
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
 