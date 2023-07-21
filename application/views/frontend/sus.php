
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Hi Connect</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url(); ?>assets1/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets1/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets1/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets1/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets1/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets1/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets1/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url(); ?>assets1/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>css1/style.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css1/cart.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
 <header id="header" class="d-flex align-items-center onb-header p-0" style="padding-top:99px !important;">
    <div class="container d-flex align-items-center col-xl-9">
      <a href="https://hiconnect.co.in/" class="hic-logo"><img src="https://hiconnect.co.in/css1/images/logo-tm-hiconnect.png" alt=""></a>
  </div></header>

<section id="hi-pay-success">
    <div class="container col-xl-9 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
      <div class="row">
          <?php

foreach($orderid as $order)
{
    
}

foreach($su as $to)
{
    
}

?>
<div class="col-12">
          <div class="card text-center border-0">
            <div class="card-body hi-sucess-payee">
              <img class="hi-sucess-pay" src="https://hiconnect.co.in/css1/images/success.svg" alt="How it image">
			  <h4>Your Payment is Successful!</h4>
			  <p class="card-text">Activate your Hi Connect product to your profile when it arrives.</p>
              <p class="card-text">Order ID: <?php echo $order['order_no'];?></p>
			  <p class="card-text">Payment Recieved:<?php echo $to['k'];?></p>
			  <a href="https://www.shiprocket.in/shipment-tracking/" class="hi-track">Track Your Order</a><br>
              <a href="<?php echo base_url();?>Auth/" class="btn-red btn-hi sli-btn pay-btnz">Go To Dashboard</a>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>



</body>

</html>