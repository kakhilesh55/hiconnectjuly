<br><br><br>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 

<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center col-xl-9 justify-content-between">
      <a href="/" class="hic-logo"><img src="assets/img/logo.png" alt=""></a>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt=""></a>-->
	  <a href="../pricing.php" class="get-started-btn scrollto btn-gets">Sign Up</a>
    </div>
  </header>
  

  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row p-3">
            <div class="card card-primary login-fm">
              <div class="login-intro">
    <h3>Welcome Back!</h3>
    <p>Login to continue</p>
</div>
              <?php if($this->session->flashdata('item')!='') {
                    $message = $this->session->flashdata('item');
                  ?>
                  <div class="<?php echo $message['class'] ?>">
                    <?php echo $message['message']; ?>
                  </div>
                  <?php }  ?>
              <div class="card-body mt-0" style="margin-top:0 !important">
                <form method="POST" action="<?php echo base_url();?>Auth/login" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="user_id">User ID</label>
                    <input id="user_id" type="text" class="form-control" name="user_id" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your User ID
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                      <div class="float-right">
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>
<div class="row mb-4 d-flex align-items-center justify-content-between">
      <!-- Checkbox -->
      <div class="form-check col-6 ps-2 pe-0">
		<input type="checkbox" name="remember" class="custom-control-input form-check-input kked" tabindex="3" id="remember-me">
		<label class="custom-control-label form-check-label" for="remember-me">Remember Me</label>
      </div>
    <div class="col-6 text-right ps-0 forg">
      <!-- Simple link -->
      <a href="<?php echo base_url(); ?>auth/forgotpass">Forgot password?</a>
    </div>
  </div> 
                  <div class="form-group text-center">
                    <input type="submit" name="submit" id="submit" class="btn-hi btn-red" value="Login">
                  </div>
                </form>
              </div>
            </div>
        </div>
      </div>
    </section>
  </div>