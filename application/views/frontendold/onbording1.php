<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Hi Connect</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/Icon.png" rel="icon">
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

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url(); ?>assets1/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>css1/style.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css1/cart.css" rel="stylesheet">
</head>
<?php include "config.php";
$products = mysqli_query($con, "select * from manage_products order by sale_price asc");
if(isset($_GET['package']))
{
    $package_id = $_GET['package'];
    $package_details = mysqli_fetch_assoc(mysqli_query($con, "select * from package where package_id=".$package_id));
}
$product_details = mysqli_fetch_assoc(mysqli_query($con, "select * from manage_products where sale_price=0"));
if(isset($_POST['signup']))
{
    $package_id = $_POST['package'];
  //  $product_id = $_POST['product'];
    //$coupon_id = $_POST['coupon_id'];
    $url = $backend_url."auth/registration?package=".$package_id;
    //if($product_id!='')
     //   $url.= "&product=".$product_id;
    //if($coupon_id!='')
     //   $url.= "&coupon=".$coupon_id;
    header("Location:".$url);
}
 ?>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center onb-header p-0">
    <div class="container d-flex align-items-center col-xl-9">
      <a href="index.php" class="hic-logo"><img src="<?php echo base_url(); ?>css1/images/logo.png" alt=""></a>
      <div class="tabs hi-cart-steps tab-top-none">
      <div class="container">
        <ul class="nav nav-tabs row d-flex hi-steps">
          <li class="nav-item col-3 fstl">
            <a href="#tab-1" class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-1" id="tab1">
              <h4 class="d-lg-block">1</h4>
            </a>
          </li>
          <li class="nav-item col-3">
            <a href="#tab-2" class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-2" id="tab2">
              <h4 class="d-lg-block">2</h4>
            </a>
          </li>
          <li class="nav-item col-3">
            <a href="#tab-3" class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-3" id="tab3>
              <h4 class="d-lg-block">3</h4>
            </a>
          </li>
          <li class="nav-item col-3 lstr">
            <a href="#tab-4" class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-4" id="tab4>
              <h4 class="d-lg-block">4</h4>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </header><!-- End Header -->

<section id="hi-cart-steps" class="pt-0">
<hr>
  <div class="tabs hi-cart-steps tab-step-none">
      <div class="container">
        <ul class="nav nav-tabs row d-flex hi-steps">
          <li class="nav-item col-3 fstl">
            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-1">
              <h4 class="d-lg-block">1</h4>
            </a>
          </li>
          <li class="nav-item col-3">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-2">
              <h4 class="d-lg-block">2</h4>
            </a>
          </li>
          <li class="nav-item col-3">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-3">
              <h4 class="d-lg-block">3</h4>
            </a>
          </li>
          <li class="nav-item col-3 lstr">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-4">
              <h4 class="d-lg-block">4</h4>
            </a>
          </li>
        </ul>
      </div>
    </div>

<div class="container col-xl-9">
<div class="row">

<section id="tabs" class="pt-0">
<div class="tab-content">
<div class="tab-pane active show hi-tabs" id="tab-1">
<section id="hi-cart">
<div class="container col-xl-9">
<div class="row grey-bg pb-4">
<div color="greyBase" class="hi-dlry" font-size="16px" font-weight="demi">
<svg width="20" height="20" fill="none" xmlns="http://www.w3.org/2000/svg" iconsize="20" class="hi-dl-svg"><path d="M15.896 12.548a2.508 2.508 0 012.506 2.506 2.508 2.508 0 01-2.506 2.505 2.508 2.508 0 01-2.505-2.505 2.508 2.508 0 012.505-2.506zm0 3.716a1.21 1.21 0 000-2.42 1.21 1.21 0 000 2.42zM4.708 12.548a2.508 2.508 0 012.506 2.506 2.508 2.508 0 01-2.506 2.505 2.508 2.508 0 01-2.505-2.505 2.508 2.508 0 012.505-2.506zm0 3.716a1.21 1.21 0 000-2.42c-.667 0-1.21.543-1.21 1.21 0 .667.543 1.21 1.21 1.21z" fill="#333"></path><path d="M17.538 5.66c.242 0 .465.135.576.35l1.814 3.52a.648.648 0 01.072.298v5.227c0 .357-.29.647-.648.647h-1.577v-1.296a.929.929 0 00.93-.928V9.985l-1.283-2.488a1 1 0 00-.889-.542h-4.33V5.66h5.335zM6.588 14.406h7.386v1.296H6.588v-1.296z" fill="#333"></path><path d="M.648 2.44h11.555c.358 0 .648.29.648.648v11.966h-1.296V4.736a1 1 0 00-1-1H2.296a1 1 0 00-1 1v8.67a1 1 0 001 1h.555v1.296H.648A.648.648 0 010 15.054V3.088c0-.357.29-.648.648-.648z" fill="#333"></path><path d="M12.203 9.2h7.149v1.297h-7.15V9.2z" fill="#333"></path></svg>
Estimated Delivery by Monday, 01st Aug</div>
<div class="col-md-7 ps-4">
<div class="card-select mt-4">
  <form action="/action_page.php">
    <!--<select name="cars" class="card-slt">
      <option value="volvo">Select Your Card</option>
      <option value="saab">Basic</option>
      <option value="opel">Premium</option>
      <option value="audi">Golden</option>
      <option value="audi">Diamond</option>
      <option value="audi">Platinum</option>
    </select>-->
    
   
    
                            <label for="product">Select Your Card:   <p><?php echo $products->description;?></p></label>
                           

                                <select id="product" name="product" class="card-slt" onchange="productdetails(this.value,<?php echo $_GET['package'];?>)">
                                   <option>Select Your Product</option>
                                   <?php 
                                     if(isset($products2) && count($products2)):
                                      foreach($products2 as $product) :
                                      ?>
                                      <option value="<?php echo $product['id'];?>" <?php if(isset($products1->product_name)){echo ($products1->product_name== $product['product_name'])?'selected':'';} ?>>
                                        <?php echo $product['product_name'];?></option>
                                       <?php  
                                    endforeach; 
                                     endif; ?>
                                </select>
 </form>
    <!--<div class="hi-cart-price mb-3">
      <h2>Premium Card</h2>
      <div class="card-image pb-3 crt-card-img">
        <img src="css/images/tab-card.png" alt="">
      </div>
        <div class="card-p">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus vitae nobis totam quisquam quidem.</p>
        </div>
        <div class="card-t-price text-right pt-3 pb-3">
          <h3>Price: $25</h3>
        </div>
</div>-->
<div class="hi-cart mb-4 mt-4">
	<div class="hi-cart-intro d-flex">
		<div class="product-image p-3">
			<div class=" d-flex align-self-start crt-img" id="product_image">
				<img src="<?php echo base_url()?>uploads/product_images/<?php echo $products1->product_image;?>" alt="" class="stars">
			</div>
		</div>
		<div class="product-detailz pt-3 pe-3">
			<div class="d-flex justify-content-between pb-2">
				<div class="hico-product pe-2"><?php echo $products1->product_name;?>
     
      
      </div>
				<!--<div class="hi-edit">
					<a href="#ProductEdit" role="button" class="hic-edit" data-bs-toggle="modal">Edit</a>
				</div>-->
			</div>
			<div class="d-flex align-items-center hi-qty pb-2">
				<div>Size: Free Size</div>
				<div>*</div>
				<div class="ps-4">Qty: 1</div>
			</div>
			<div class="d-flex align-items-center hi-pce pb-2">
				<div><strong><span style='float:right' id='sale_price'>
          <?php 
          if( $products1->sale_price!="")
          
          
          
          { echo $products1->sale_price; } ?> 

            </span></strong></div>
			</div>
		</div>
	</div>
  <div class="text-right text-muted hi-free-d p-3">
    Free Delivery
  </div>
</div>
<div class="hi-coupon mt-4 p-3">
  <div class="text-muted pb-3">Have a coupon? Click here to enter your code:</div>
  <div class="d-flex justify-content-between pb-2 pt-2">
    <div class="hico-product pe-2">
      <input type="text" name="coupon_code" id="coupon_code" placeholder="Enter Coupon Code" class="entr-coupon" value="">
    </div>
    <div class="hico-product">
      <button title="Continue" name="apply_coupon" onclick="getcoupon(coupon_code.value)" class="btn btn-success hi-redeem" font-size="15px">Apply</button>
    </div>
  </div>
                           <div class="col-md-6 coupon" >
                                <?php 
                                echo "<label for='coupon_code'>Coupon Percentage:</label>";?>
                            </div>
                            <div class="col-md-6 coupon"  >
                                <?php 
                                echo "<span style='float:right' id='percentage'>";
                                if(isset($coupon_percentage['percentage']) ){ echo $coupon_percentage['percentage']; } 
                                echo "</span>";                            
                                
                                ?>
                            </div>
                            <div class="col-md-6 coupon"  >
                                <label for="coupon_code">Coupon Savings:</label>
                            </div>
                            <div class="col-md-6 coupon" >
                                 <?php echo "<span style='float:right' id='discount_amount'></span>";?>
                            </div>

  <div class="pt-2 pdt-grand">
    <div class="cpn-success align-items-center" style="display: none;" >
	<i class='bx bxs-badge-check' ></i>
	<span>Your coupon was successfully applied</span></div>
	<div class="cpn-error align-items-center" style="display: none;" >
	<i class='bx bxs-x-circle'></i>
	<span>Your coupon was invalid</span></div>
  </div>
</div>


</div>
</div>
<div class="col-md-5 br-rigt mt-4 pe-4">
<section id="hi-bill" class="p-0">
	<div id="hi-hello">
    <div class="d-flex justify-content-between hi-cost pb-3 pt-3 mb-3">
      <div><h5><?php echo $package_details['package']; ?> Plan</h5></div>
      <div>
		<a href="#PlanEdit" role="button" class="hic-edit" data-bs-toggle="modal">Edit</a>
	  </div>
    </div>
    <h3>Summary</h3>
		<div class="hi-billing p-3">
			<div class="d-flex justify-content-between hi-cost pb-3 pt-3">
				<div id="newpack"><?php echo $products1->package;?></div>
        <input type="hidden" id="package1" name="package" value="<?php echo  $products1->package_id; ?>">
				<div ><?php echo $products1->sale_price;?></div>
        <input type="hidden" value="<?php echo $products1->sale_price;?>" id="packtotal">
			</div>
			<div class="d-flex justify-content-between hi-costs pb-3 pt-3">
				<div>Total: </div>
				<div id="grand_total"><?php if( $products1->sale_price!="")
          
          
          
          { echo $products1->sale_price; } ?> </div>
        
        <input type="hidden" value="<?php if( $products1->sale_price!="")
          
          
          
          { echo $products1->sale_price; } ?>" id="total_sale_price">
			</div>
		</div>
	</div>
</section>
<div class="card-t-price text-center pt-4">
	<a href="#" class="btn-red btn-hi sli-btn" id="cont" onclick="conti()">Continue</a>
</div>
</div>


</div>
</div>
<!-- =================================================================================== -->
<div id="PlanEdit" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content modalz">
                    <button type="button" class="btn-close tpbtnz" data-bs-dismiss="modal">
					<i class='bx bx-x-circle'></i>
					</button>
                <div class="modal-body p-0">
<div class="plan-editz pricing pt-5">
<div class="pb-4">				
<form>
    <select name="pak" id="pak" class="card-slt" onchange="packagedetails(this.value,<?php echo $_GET['package'];?>)">
      
      <option value="volvo">Select Your Package</option>
      <?php
  
       foreach($packs as $pack) :
    
      ?>
      <option value="<?php echo $pack['package_id'];?>" > <?php echo $pack['package'];?></option>
     <?php
endforeach;
     ?>
    </select>
 </form>
 </div>
 
<div class="box aos-init aos-animate plnse" data-aos="fade-up" data-aos-delay="100">
<div class="pricing-card-header">
	<div class="pricing-plan-name" id="packname"></div>
	<div class="pricing-plan-type">FOR Individuals</div>
</div>
<div class="pricing-card-price">
	<div class="price-per-month team">
		<div class="price-tag" id="packprice"></div>
		<div class="full-black team">per card<br>per month</div>
	</div>
		<div class="trialz" id="des"><br></div>
</div>	
  <ul>
	<li>Lorem ipsum dolor sit.</li>
	<li>Lorem ipsum dolor sit.</li>
	<li>Lorem ipsum dolor sit.</li>
	<li>Lorem ipsum dolor sit.</li>
	<li>Lorem ipsum dolor sit.</li>
	<li>Lorem ipsum dolor sit.</li>
	<li>Lorem ipsum dolor sit.</li>
  </ul>
</div>
<div class="text-center">
<a href="#" class="btn-red btn-hi sli-btn" onclick="packselect()" data-dismiss="modal">Continue</a>
</div>
</div>




                </div>
            </div>
        </div>
</div>
<!-- =================================================================================== -->
  </section>

</div>

<div class="tab-pane hi-tabs" id="tab-2">
  <section id="hi-register">
    <div class="container col-xl-9">
      <div class="row">
        <div class="login-fm">
          <div class="login-intro">
            <h3>Create your Hi-Connect account</h3>
            <p>Hey, Enter your details to register your account</p>
          </div>
          <form method="POST" name="onboarding" onsubmit="return false">
            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="text" name="name" id="name" class="form-control" placeholder="Name" required autofocus>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="email" id="email" name="email"  placeholder="Email" class="form-control" required />
            </div>
            <div class="form-outline mb-4">
              <input type="text" id="phone" name="phone" placeholder="Phone" class="form-control" required />
            </div>
            <div class="form-outline mb-4">
              <input type="password" id="password1" name="password1" class="form-control pwstrength" placeholder="Password" data-indicator="pwindicator" required />
            </div>
            <div class="form-outline mb-4">
              <input type="password" id="password2" name="password2" class="form-control" placeholder="Confirm Password" required/>
            </div>
            <input type="hidden" name="card_id" id="card_id" value="">
            <input type="hidden" name="pdt" id="pdt" value="<?php echo $products1->id;?>">
            <!-- Submit button -->
            <input type="hidden" id="package2" name="package" value="<?php echo  $products1->package_id; ?>">
            <div class="text-center fm-button">
              <input type="submit" name="submit" id="submit" onclick="sub()" class="btn-red btn-hi sli-btn" value="Continue">

              <!--<a href="#" class="btn-red btn-hi sli-btn">Continue</a>-->
            </div>
            <!-- Register buttons -->
            
            <!--<div class="text-center fm-social">
              <p>Already have Account?<a href="#!">Sign In</a></p>
              <p>or sign in with:</p>
              <div class="pt-2">
              <a href="#"><img src="css/images/google.svg" alt=""></a>
              <a href="#"><img src="css/images/facebook.svg" alt=""></a>
              <a href="#"><img src="css/images/twitter.svg" alt=""></a>
              <a href="#"><img src="css/images/facebook.svg" alt=""></a>
            </div>
            </div>-->
          </form>
        </div>
      </div>
    </div>
  </section>
</div>
			

<div class="tab-pane hi-tabs" id="tab-3">

<section id="hi-cart-price">
<div class="container col-xl-9">
<div class="row">

<div class="col-md-7">
<div class="grey-bg">
<div color="greyBase" class="hi-dlry" font-size="16px" font-weight="demi">
<i class='bx bx-map'></i>
Shipping Address</div>
<div class="address-fm">
  <div class="login-intro">
</div>
<form method="POST" name="onboarding"  action="<?php echo base_url() ?>Payment/checkout">

<div class="form-full pb-4">
<textarea class="address-edit" name="address"></textarea> 
</div>
<div class="form-full">  
  <div class="form-outline form-fifty mb-4 pe-2">
    <input type="text" id="form2Example2" placeholder="Pin Code" name="pincode" class="form-control" />
  </div>
  <div class="form-outline form-fifty mb-4 ps-2">
    <input type="text" id="form2Example2" placeholder="State" name="state" class="form-control" />
  </div>
</div>
<input type="hidden" id="package11" name="package" value="<?php echo  $products1->package_id; ?>">
<input type="hidden" name="pdt" id="pdt1" value="<?php echo $products1->id;?>">
	<div class="form-outline mb-4">
    <input type="text" id="form2Example2" placeholder="Nearby" class="form-control" name="nearby"/>
  </div>
  <!-- Submit button -->
  <!-- Register buttons -->

</div>

</div>
</div>
<div class="col-md-5">
<div class="hi-place-order">
  <div class="pb-2 pt-3">
    <div class="hico-product">Price Details</div>
  </div>
  <div class="d-flex justify-content-between pb-2 pdt-price">
    <div >Total Product Price</div>
    <div id="total_sale_pricefinal"></div>
  </div>
  <div class="d-flex justify-content-between pb-2 pt-2">
    <div class="hico-product">Order Total</div>
    <div class="hico-product" id="total_sale_pricefinal1"></div>
    <input type="hidden" id="tot" name="tot">
    <input type="hidden" id="cust" name="cust">
  </div>
  <div class="clicking mt-2 mb-2">Clicking on ‘Continue’ will not deduct any money</div>
  <div class="text-center">
  
    <input type="submit" name="submit" id="submit" class="btn-red btn-hi sli-btn" value="Continue">
  </div>
  </form>
</div>	
</div>


</div>
</div>


</section>
</div>
			
		
			

          <div class="tab-pane hi-tabs" id="tab-4">
				<h2>Share instantly (Fourth)</h2>
			</div>
</div>
</div>
</section><!-- End Tabs Section -->
</div></div>
</section>

  <!-- ======= Footer======-->
  <footer id="footer">
  </footer> <!-- Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url(); ?>assets1/vendor/purecounter/purecounter.js"></script>
  <script src="<?php echo base_url(); ?>assets1/vendor/aos/aos.js"></script>
  <script src="<?php echo base_url(); ?>assets1/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>assets1/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?php echo base_url(); ?>assets1/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?php echo base_url(); ?>assets1/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>assets1/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url(); ?>assets1/js/main.js"></script>

  <script src="<?php echo base_url(); ?>assets1/js/jquery.js"></script>
</body>

</html>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>

 <script>
$(document).ready( function () {
  $.ajax({
          url:"<?php echo base_url() ?>Products/getcupon",
          method:"POST",
          data:{coupon_code:"1"},
           dataType: "json",
           success:function(data){
            
              
                var numVal10 = document.getElementById("sale_price").innerText;;
                var numVal11 = document.getElementById("packtotal").value;
              
             
                var numVal1 =Number(numVal10) + Number(numVal11);
         
                var numVal2 =  data['percentage'] / 100;
                var discount_amount = numVal1 * numVal2;
              
               // document.getElementById("discount_amount").innerHTML = discount_amount.toFixed(2);
               // var totalValue = numVal1 - (numVal1 * numVal2);
               document.getElementById("grand_total").innerHTML = numVal1.toFixed(2);
                document.getElementById("grand_tnumVal1otal").innerHTML = numVal1.toFixed(2);
                document.getElementById("grand_total1").innerHTML = numVal1.toFixed(2);
                document.getElementById("total_sale_pricefinal").innerHTML = numVal1.toFixed(2);
                document.getElementById("total_sale_pricefinal1").innerHTML = numVal1.toFixed(2);
                $('.cpn-success').show();
                $('.cpn-error').hide();
            

           
            
          }

      });
});























      function productdetails(product_id,package_id) {
        $.ajax({
          
         
          url:"<?php echo base_url() ?>Products/pdt/"+product_id,
          method:"GET",
          data:{product_id:product_id,package_id:package_id},
           dataType: "json",
           success:function(data){
       
           // document.getElementById('regular_price').innerHTML = data['regular_price'];
            document.getElementById('sale_price').innerHTML = data['sale_price'];
            document.getElementById('total_sale_price').innerHTML = data['sale_price'];
           // document.getElementById('tot_sale_price').innerHTML = data['tot_sale_price'];
           
            //document.getElementById('tot_regular_price').innerHTML = data['tot_regular_price'];            
            document.getElementById('product_image').innerHTML = ('<img src="http://localhost/demo/uploads/manage_products/'+data['image']+'" class="img-responsive">'); // show photo

            var numVal10 = document.getElementById("sale_price").innerText;;
                var numVal11 = document.getElementById("packtotal").value;
              
             
                var numVal1 =Number(numVal10) + Number(numVal11);
         
                var numVal2 =  data['percentage'] / 100;
                var discount_amount = numVal1 * numVal2;
               
                document.getElementById('pdt').value =data['id'];
                document.getElementById('pdt1').value =data['id'];
               // document.getElementById("discount_amount").innerHTML = discount_amount.toFixed(2);
               // var totalValue = numVal1 - (numVal1 * numVal2);
               document.getElementById("grand_total").innerHTML = numVal1.toFixed(2);
                document.getElementById("grand_tnumVal1otal").innerHTML = numVal1.toFixed(2);
                document.getElementById("grand_total1").innerHTML = numVal1.toFixed(2);
                document.getElementById("total_sale_pricefinal").innerHTML = numVal1.toFixed(2);
                document.getElementById("total_sale_pricefinal1").innerHTML = numVal1.toFixed(2);
                //document.getElementById("pdt").value =data['product_name'];
               // document.getElementById('pdt').value= "dd";
          }
      });
    }




    function packagedetails(product_id,package_id) {
        $.ajax({
          
         
          url:"<?php echo base_url() ?>Products/pak/"+product_id,
          method:"GET",
          data:{product_id:product_id,package_id:package_id},
           dataType: "json",
           success:function(data){
       
           // document.getElementById('regular_price').innerHTML = data['regular_price'];
            document.getElementById('packprice').innerHTML = data['sale_price'];
            document.getElementById('packname').innerHTML = data['package_name'];
            document.getElementById('des').innerHTML = data['description'];
           // document.getElementById('tot_sale_price').innerHTML = data['tot_sale_price'];
           
            //document.getElementById('tot_regular_price').innerHTML = data['tot_regular_price'];            
           
               
                document.getElementById('pdt').value =data['id'];
               
              
          }
      });
    }




















    function getcoupon(coupon_code)
    {
     
        $.ajax({
          url:"<?php echo base_url() ?>Products/getcupon",
          method:"POST",
          data:{coupon_code:"1"},
           dataType: "json",
           success:function(data){
            
                $('#percentage').html(Number(data['percentage'])+'% ');
                var percentage = Number(data['percentage']);
                var numVal10 = document.getElementById("sale_price").innerText;;
                var numVal11 = document.getElementById("packtotal").value;
              
                var numVal1 =Number(numVal10) + Number(numVal11);
             
                var numVal2 =  data['percentage'] / 100;
                var discount_amount = numVal1 * numVal2;
              
                document.getElementById("discount_amount").innerHTML = discount_amount.toFixed(2);
                var totalValue = numVal1 - (numVal1 * numVal2);
                document.getElementById("grand_total").innerHTML = totalValue.toFixed(2);
                document.getElementById("grand_total1").innerHTML = totalValue.toFixed(2);
                document.getElementById("total_sale_pricefinal").innerHTML = totalValue.toFixed(2);
                document.getElementById("total_sale_pricefinal1").innerHTML = totalValue.toFixed(2);
                $('.cpn-success').show();
                $('.cpn-error').hide();
            

           
            
          }

      });
    }
    function checkout()
    {
    
      $.ajax({
          url:"<?php echo base_url() ?>Payment/checkout",
          method:"POST",
          data:{coupon_code:"1"},
           dataType: "json",
           success:function(data){
           }
          });
    }
    function conti()
      {


$.ajax({
          url:"<?php echo base_url() ?>Products/checklog",
          method:"POST",
          data:{coupon_code:"1"},
           dataType: "json",
           success:function(data){
            
              document.getElementById("tab-1").classList.remove("active");
              document.getElementById("tab-2").classList.add("active");
              document.getElementById("tab1").classList.remove("active");
              document.getElementById("tab2").classList.add("active");
            
          }

      });
      }

      function sub()
      {
        $('[href="#tab-3"]').tab('show');
      
var name= $("#name").val();
                var password= $("#password1").val();
                var email= $("#email").val();
                var phone= $("#phone").val();
                var package= $("#package2").val();
                //alert(package);
                var pdt= $("#pdt").val();

                $.ajax({

                    type: "POST",
                    url: "<?php echo base_url() ?>Products/newregister",
                    data: "name=" + name+ "&password=" + password+"&email="+email+ "&phone="+phone+"&package="+package+"&pdt="+pdt,
                    dataType: "json",
                    success: function(data) {
                   var custid=data['count'];
               
                    $('[href="#tab-3"]').tab('show');
                    document.getElementById("tab-3").classList.add("active");
                    var numVal10 = document.getElementById("sale_price").innerText;;
                var numVal11 = document.getElementById("packtotal").value;
                var numVa = document.getElementById("grand_total").innerText;
          
              var numVal1 =Number(numVa) ;
             
                var numVal2 =  data['percentage'] / 100;
                var discount_amount = numVal1 * numVal2;
              
               // document.getElementById("discount_amount").innerHTML = discount_amount.toFixed(2);
               // var totalValue = numVal1 - (numVal1 * numVal2);
               document.getElementById("tot").innerHTML =  numVal1.toFixed(2);
                document.getElementById("total_sale_pricefinal").innerHTML =  numVal1.toFixed(2);
                document.getElementById("total_sale_pricefinal1").innerHTML = numVal1.toFixed(2);
                document.getElementById('tot').value= numVal1;
                document.getElementById('cust').value= custid;
                    e.preventDefault();
                    }
                });

      }



function packselect()
{
 
  var pac = document.getElementById("pak").value;
  var oldpac = document.getElementById("packname").innerHTML;
  
  
  document.getElementById('package11').value =pac;
  document.getElementById('package2').value =pac;
  document.getElementById('newpack').innerHTML =oldpac;

  var numVal10 = document.getElementById("packprice").innerText;;
 
                var numVal11 = document.getElementById("packtotal").value;
              
             
                var numVal1 =Number(numVal10) + Number(numVal11);
      
               
               
            
               document.getElementById("grand_total").innerHTML = numVal1;
                document.getElementById("grand_tnumVal1otal").innerHTML = numVal1.toFixed(2);
                document.getElementById("grand_total1").innerHTML = numVal1.toFixed(2);
                document.getElementById("total_sale_pricefinal").innerHTML = numVal1.toFixed(2);
                document.getElementById("total_sale_pricefinal1").innerHTML = numVal1.toFixed(2);
















}










   
    
</script>