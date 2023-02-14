<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Hi Connect</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="erp/assets/img/Icon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url(); ?>assets1/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets1/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->
  <link href="<?php echo base_url(); ?>assets1/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets1/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets1/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets1/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets1/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url(); ?>assets1/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>css1/style.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css1/cart.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between col-xl-9 baorx">
      <!--<h1 class="logo me-auto"><a href="index.php">Hi<span>Connect</span></a></h1>-->
      <a href="index.php" class="hic-logo"><img src="<?php echo base_url(); ?>css1/images/logo.png" alt=""></a>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.php" class="logo me-auto"><img src="assets/img/logo.png" alt=""></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
		<!--<li><a class="nav-link scrollto active" href="products.php">Home</a></li>-->
		<li class="dropdown"><a href="#"><span>Company</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="<?php echo base_url(); ?>about">About Us</a></li>
			<li><a href="<?php echo base_url(); ?>how">How It Works</a></li>
              <!--<li class="dropdown"><a href="#"><span>Company</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Contact Us</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>-->
            </ul>
			</li>
          <li><a class="nav-link scrollto" href="<?php echo base_url(); ?>products">Products</a></li>
          <li><a class="nav-link scrollto " href="<?php echo base_url(); ?>pricing">Pricing</a></li>
			<li class="dropdown"><a href="#"><span>Resources</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="<?php echo base_url(); ?>tutorial">Tutorials</a></li>
			<li><a href="<?php echo base_url(); ?>contact">Support</a></li>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <div class="hdr-act">
      <a href="<?php echo base_url(); ?>auth" class="lgn-btn lgn-mob">Login</a>
      <a href="#" onclick="javascript:opencart()" class="hi-cart-menu"> <span class="cart-number cartcount"><?php echo count($this->cart->contents());  ?></span></a>
   
    </div>
   <div class="resultx"> 
   <div id="result"></div></div>
    </div>
  </header><!-- End Header -->
   