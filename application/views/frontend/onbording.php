<!DOCTYPE html>
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
  <style>
    .tabs .ac{
          display:none!important;
      }
      .fd{
    display: block!important;
    width: 100%;
    margin-top: 0.25rem;
    font-size: .875em;
    color: #dc3545;
}
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center onb-header p-0">
    <div class="container d-flex align-items-center col-xl-9">
      <a href="<?php echo base_url(); ?>" class="hic-logo"><img src="<?php echo base_url(); ?>css1/images/logo-tm-hiconnect.png" alt=""></a>
      <div class="tabs hi-cart-steps">
      <div class="container">
        <ul class="nav nav-tabs row d-flex hi-steps">
          <li class="nav-item col-3 fstl">
            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-1" id="t1">
              <h4 class="d-lg-block">1</h4>
              <p class="p-dark">Cart</p>
            </a>
          </li>
          <li class="nav-item col-3">
            <a  href="#tab-2" class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-26" id="t2">
              <h4 class="d-lg-block">2</h4>
              <p class="p-light">Register</p>
            </a>
            
          </li>
          <li class="nav-item col-3">
            <a  href="#tab-38" class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-389" id="t3">
              <h4 class="d-lg-block">3</h4>
              <p class="p-light">Address</p>
            </a>
            
          </li>
          <li class="nav-item col-3 lstr">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-46">
              <h4 class="d-lg-block">4</h4>
              <p class="p-light">Summary</p>
            </a>
          </li>
        </ul>
</div>
    </div>
  </header><!-- End Header -->

<section id="hi-cart-steps" class="pt-0 pb-0">
<hr>
    <!--<div class="tabs hi-cart-steps tab-step-none">
      <div class="container">
        <ul class="nav nav-tabs row d-flex hi-steps bvbvvvvvvvvvvvvvvv">
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
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-38">
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
    </div>-->

<div class="container col-xl-9">
<div class="row">

<section id="tabs" class="pt-0 pb-0">
<div class="tab-content">
<div class="tab-pane active show hi-tabs" id="tab-1">
<section id="hi-cart" class="pb-0">
<div class="container col-xl-12">
<div class="row grey-bg pb-4">
  <!--
<div color="greyBase" class="hi-dlry" font-size="16px" font-weight="demi">
<svg width="20" height="20" fill="none" xmlns="http://www.w3.org/2000/svg" iconsize="20" class="hi-dl-svg"><path d="M15.896 12.548a2.508 2.508 0 012.506 2.506 2.508 2.508 0 01-2.506 2.505 2.508 2.508 0 01-2.505-2.505 2.508 2.508 0 012.505-2.506zm0 3.716a1.21 1.21 0 000-2.42 1.21 1.21 0 000 2.42zM4.708 12.548a2.508 2.508 0 012.506 2.506 2.508 2.508 0 01-2.506 2.505 2.508 2.508 0 01-2.505-2.505 2.508 2.508 0 012.505-2.506zm0 3.716a1.21 1.21 0 000-2.42c-.667 0-1.21.543-1.21 1.21 0 .667.543 1.21 1.21 1.21z" fill="#333"></path><path d="M17.538 5.66c.242 0 .465.135.576.35l1.814 3.52a.648.648 0 01.072.298v5.227c0 .357-.29.647-.648.647h-1.577v-1.296a.929.929 0 00.93-.928V9.985l-1.283-2.488a1 1 0 00-.889-.542h-4.33V5.66h5.335zM6.588 14.406h7.386v1.296H6.588v-1.296z" fill="#333"></path><path d="M.648 2.44h11.555c.358 0 .648.29.648.648v11.966h-1.296V4.736a1 1 0 00-1-1H2.296a1 1 0 00-1 1v8.67a1 1 0 001 1h.555v1.296H.648A.648.648 0 010 15.054V3.088c0-.357.29-.648.648-.648z" fill="#333"></path><path d="M12.203 9.2h7.149v1.297h-7.15V9.2z" fill="#333"></path></svg>
Estimated Delivery by Monday, 01st Aug</div>
-->
<div class="col-md-7 p-0">
<div class="card-select mt-4">


  <div class="d-flex justify-content-between p-3 align-self-center hi-pin pb-3 pt-3 mb-3 pi" id="td_id">
    <div class="d-flex  align-self-center hi-check"><h5 id="pinch">Check delivery time & services</h5></div>
    <div class="bizx">
  <a href="#PlanEdit" role="button" class="hic-edit" data-bs-toggle="modal" id="ent">ENTER PIN CODE</a>
  </div>
  </div>
   <div class="d-flex justify-content-between p-3 align-self-center hi-pin pb-3 pt-3 mb-3" id="pinn" style="display:none!important;">
    <div style="display:none!important;" id="suu" class="d-flex  align-self-center hi-check"><h5>Delivery postcode  serviceable.</h5></div>
        <div style="display:none!important;" id="fa" class="d-flex  align-self-center hi-check"><h5>Delivery postcode not serviceable.</h5></div>


    <div class="bizx">
  <a href="#PlanEdit" role="button" class="hic-edit" data-bs-toggle="modal">CHANGE ADDRESS</a>
  </div>
  </div>

<!--
  <form action="/action_page.php">
    <select name="cars" class="card-slt">
      <option value="volvo">Select Your Card</option>
      <option value="saab">Basic</option>
      <option value="opel">Premium</option>
      <option value="audi">Golden</option>
      <option value="audi">Diamond</option>
      <option value="audi">Platinum</option>
    </select>
 </form>-->
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


 


<?php echo validation_errors(); ?>


<?php 
        if(isset($cart) && is_array($cart) && count($cart)){
        $i=1;
         $dism=0;
         
        foreach ($cart as $key => $data) { 
            $d=$data['price1']-$data['price'];
           $dism+= $d;
        ?>
<div class="hi-cart mb-4 mt-4">



  <div class="hi-cart-intro d-flex justify-content-between">
    <div class="product-image p-2 pe-0 d-flex col-10">
      <div class=" d-flex align-self-start crt-img">
        <img src="<?php echo base_url(); ?>uploads/manage_products/<?php echo $data['image'] ?>" 
                                                alt="<?php echo $data['id'] ?>" class="stars">
      </div>
      <div class="product-detailz pt-3 pe-2 ps-2 col-9">
        <div class="d-flex justify-content-between pb-2">
          <div class="hico-product pe-2"><a href="https://hiconnect.co.in//Products/product_details_view/<?php echo $data['id']; ?>"><?php echo $data['name'] ?></a></div>
          <!--<div class="hi-edit">
            <a href="#ProductEdit" role="button" class="hic-edit" data-bs-toggle="modal">Edit</a>
          </div>-->
        </div>
        <div class="d-flex align-items-center hi-qty pb-2">
    <div class="pdt-des"><p><?php echo $data['des']; ?></p></div>
        </div>
        <!--<div class="d-flex align-items-center hi-pce pb-2">
          <div><strong>$25</strong></div>
        </div>-->
      </div>
    </div>
    
    <div class="hi-product-price pt-3 pb-3 col-2">
      <h2 class="price<?php echo $data['rowid'] ?> "><?php echo $data['price'];?></h2>
       <p class="price<?php echo $data['rowid'] ?> "><?php echo $data['price1']; ?></p>
            <p id="mrpdiss" style="display:none"><?php echo $dism;?></p>
      <p style="display:none;" class="subtotal subtotal<?php echo $data['rowid'] ?>"><?php echo $data['price']/1 ?></p>
      <?php $d=$data['price1']-$data['price'];
      if($d==0)
      {
          $disct=0.00; 
      }
      else
      {
      $ds=$d/$data['price1'];
      $disct=$ds*100;
      }
      ?>
      <h3><?php echo round($disct);?>% Off</h3>
      <div class="hi-remove">
        <a href="#"  onclick="javascript:deleteproduct('<?php echo $data['rowid'] ?>')"><img class="delete-item" src="<?php echo base_url(); ?>css1/images/delete-item.svg"></a>
      </div>
    </div>
  </div>
  <!--<div class="text-right text-muted hi-free-d p-3">
    Free Delivery
  </div>-->
</div>
<?php
        $i++;
          } }
      ?>
      <P>Paid plan Recomendation </P>
      <?php foreach($packages as $package)
    {
        if($package['sale_price']!=0)
        {
       ?>
      <div class="hi-cart mb-4 mt-4 pe-3">

<div class="col-lg-4 col-md-6 pricebox" style="display:none;">
            <div class="box" data-aos="fade-up" data-aos-delay="100">
      <div class="pricing-card-header">
        <div class="pricing-plan-name name<?php echo $package['package_id'] ?>" 
rel="<?php echo $package['package_id'] ?>"><?php echo $package['package'];?></div>
        <div class="pricing-plan-type">FOR Individuals</div>
      </div>
      <div class="pricing-card-price">
        <div class="price-per-month team">
          <div class="price-tag price<?php echo $package['package_id'] ?>" 
rel="<?php echo $package['sale_price'] ?>"><?php echo "₹".$package['sale_price'];?></div>


  <div style="display:none;" class="price-tag price1<?php echo $package['package_id'] ?>" 
rel="<?php echo $package['regular_price'] ?>"><?php echo "₹".$package['regular_price'];?></div>


<div style="display:none;" class="price-tag des<?php echo $package['package_id'] ?>" 
rel="<?php echo $package['description'] ?>"><?php echo $package['description'];?></div>







          <div class="full-black team">per card<br>per month</div>
        </div>
          <!--<div class="trialz">30-day free trial included<br>3 card minimum, billed annually<br></div>-->
      </div>
      <div class="pricing-card-button">

        <?php if($package['sale_price']>0) { ?> <a href="#" onclick="javascript:addtocart(<?php echo $package['package_id'] ?>)"  class="button w-button" > Try it now</a><?php } 
                                    else { ?>
                                
        <a href="<?php echo base_url()."auth/registration?package=".$package['package_id'] ?>"  class="button light w-button">Get Started</a>
                                <?php } ?>


        </div>
        <?php $descriptions = explode("\n",$package['description']); ?>

              <ul>
<?php foreach ($descriptions as $description) { 
                echo '<li >'.$description.'</li>'; 
              } ?>
              </ul>
            </div>
          </div>

  <div class="hi-cart-intro d-flex justify-content-between">
    <div class="product-image hi-onboard pe-0 d-flex">
      <div class=" d-flex align-self-start">
      </div>
      <div class="product-detailz pt-3 pe-3 ps-3">
        <div class="d-flex justify-content-between pb-2">
          <div class="hico-product pe-2"><a href="http://tezcode.com/hiconnect//Products/product_details_view/<?php echo $data['id']; ?>">  <?php echo $package['package'];?></a></div>
          <!--<div class="hi-edit">
            <a href="#ProductEdit" role="button" class="hic-edit" data-bs-toggle="modal">Edit</a>
          </div>-->
        </div>
        <div class="d-flex align-items-center hi-qty pb-2">
    <div class="pdt-des"><p><?php echo $package['description'];?></p></div>
        </div>
        <!--<div class="d-flex align-items-center hi-pce pb-2">
          <div><strong>$25</strong></div>
        </div>-->
      </div>
    </div>
    
    <div class="hi-product-price hi-onprice pt-3 pb-3 ps-0">
      <h2 class="price<?php echo $data['rowid'] ?> "><?php echo "₹".$package['sale_price'];?></h2>
       <p class="price<?php echo $data['rowid'] ?> "><?php echo "₹".$package['regular_price'];?></p>
           
     
     
      <div class="hi-remove hi-addc">
         <a href="#"  onclick="javascript:addtocart(<?php echo $package['package_id'] ?>)"   >ADD TO CART</a>
      </div>
    </div>
  </div>
  <!--<div class="text-right text-muted hi-free-d p-3">
    Free Delivery
  </div>-->
</div>
<?php }}?>
<!--<div class="hi-coupon mt-4 p-3">
  <div class="text-muted pb-3">Have a coupon? Click here to enter your code:</div>
  <div class="d-flex justify-content-between pb-2 pt-2">
    <div class="hico-product pe-2">
      <input type="text" placeholder="Enter Coupon Code" class="entr-coupon" value="">
    </div>
    <div class="hico-product">
      <button title="Continue" class="btn btn-success hi-redeem" font-size="15px">Apply</button>
    </div>
  </div>
  <div class="pt-2 pdt-grand">
    <div class="cpn-success d-flex align-items-center ">
  <i class='bx bxs-badge-check' ></i>
  <span>Your coupon was successfully applied</span></div>
  <div class="cpn-error d-flex align-items-center ">
  <i class='bx bxs-x-circle'></i>
  <span>Your coupon was invalid</span></div>
  </div>
</div>-->

</div>
</div>
<div class="col-md-5 br-rigt mt-4 ps-4">
<section id="hi-bill" class="p-0">
  <div id="hi-hello">
    <div class="d-flex justify-content-between hi-cost pt-3">
      <div>
        <h5>Order Summary</h5>
      </div>
      <div>
    <!--<a href="#PlanEdit" role="button" class="hic-edit" data-bs-toggle="modal">Edit</a>-->
    </div>
    </div>
    <div class="hi-coupon d-flex justify-content-between">
      <div class="product-image">
        <div class=" d-flex align-self-start crtc-img">
          <img src="<?php echo base_url() ?>css1/images/coupons.png" alt="" class="stars">
        </div>
      </div>
      <div class="add product-detailz align-self-center pe-3" >
        <div class="pb-2" >
          <div class="hi-apply ps-2">Apply Coupons</div>  
        </div>
      </div>
      <div class="add1 hi-getit  align-self-center" id="add1">
        <div class="hic-apply pe-3">
          <a href="#ApplyCoupon" role="button" class="hic-edit" data-bs-toggle="modal">APPLY</a>
        </div>
      </div>
      
      
      
      
      
       <div class="product-detailz d-flex align-self-center pe-3 rm" id="b" style="display:none!important;">
        <div class="pb-2">
          <div class="hi-apply ps-2">Remove Coupons</div> 
        </div>
      </div>
      <div class="hi-getit d-flex align-self-center rm1" id="a" style="display:none!important;">
        <div class="hic-apply pe-3">
          <a href="#" onclick="getcoupon11()" role="button" class="hic-edit" data-bs-toggle="modal">Remove</a>
        </div>
      </div>
      
      
      
      
      
      
      
      
      
      
      
      
      
    </div>
    <div class="hi-coupon d-flex justify-content-between" style="display:none!important;">
      <div class="product-image">
        <div class=" d-flex align-self-start crtc-img">
          <img src="https://hiconnect.co.in/css1/images/coupons.png" alt="" class="stars">
        </div>
      </div>
      <div id="cp" class="product-detailz d-flex align-self-center pe-3" >
        <div class="pb-2">
          <div class="hi-apply ps-2">1 Coupon Applied</div> 
          <!--<p class="ps-2">You saved additional &#x20b9;100</p>-->
        </div>
      </div>
      <div class="hi-getit d-flex align-self-center">
        <div class="hic-apply pe-3">
          <a href="#ApplyCoupon" role="button" class="hic-edit" data-bs-toggle="modal">EDIT</a>
        </div>
      </div>
    </div>




    <div class="hi-billing p-3">
      <h2>Product Details </h2>
      <div class="d-flex justify-content-between hi-cost">
        <div>Total MRP</div>
        <div class="grandtotal" id="new">₹</div>
      </div>
      <div class="d-flex justify-content-between hi-cost">
        <div>Discount on MRP</div>
        <div><h3 id="mrpdis"><?php echo  $dism;?></h3></div>
      </div>
      <div class="d-flex justify-content-between hi-cost">
        <div>Coupon Discount</div>
        <div><h4 id="discount_amount">₹</h4></div>
      </div>
      <div class="d-flex justify-content-between hi-cost">
        <div>Delivery Charge</div>
        <div class="d-flex"><h3>₹0</h3></div>
      </div>
      <div class="d-flex justify-content-between hi-costs">
        <div>Total Amount </div>
        <div id="grandtotal1" class="grandtotal"></div>
      </div>
    </div>
  </div>
</section>
<div class="card-t-price text-center pb-3 pt-1">
 <div class="hi-fixd d-flex justify-content-between">
     <a href="javascript:window.history.go(-1);" class="btn-white btn-hi sli-btn flo-left">BACK</a>
  <a href="#" class="btn-red btn-hi sli-btn bxs-none flo-right" onclick="conti()">CONTINUE</a>
  </div>
</div>
<div class="hi-nice">
  <svg class="uxicon-svg-container" height="24" width="24" role="img"><use fill="currentColor" xlink:href="#svg-container-gd-the-go"></use></svg>
  <strong> Nice!</strong> You saved  <span id="mrpdiscount">₹ <?php echo  $dism;?> </span>on your order.
</div>
<div class="hi-satisfaction">
  <h6>Your Safety, Our Priority</h6>
  <p>We make sure that your package is safe at every point of contact.</p>
</div>
</div>


</div>
</div>
<!-- =================================================================================== -->
<div id="PlanEdit" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content modalz">
                <div class="position-relative">
        <div class="coupon-title">
      Enter Delivery Pin Codec
    </div>        
                    <button type="button" class="btn-close tpbtnz close-btnz" data-bs-dismiss="modal">
          <i class='bx bx-x-circle'></i>
          </button>
                <div class="modal-body p-0">
<div class="plan-editz pricing pt-5 pd-topv pe-4 ps-4">
<div class="pb-4 check-pin">        
    <input type="text" id="pin" name="pin" class="coupon-pin" placeholder="Enter Pin Code">
    <button class="pin-coupon" onclick="javascript:pincheck()">CHECK</button>
    <span class="invalid-feedback" id="invalid-feedback1">
                      
                    </span>
 </div>
 <div class="pt-2 pdt-grand">
  <div class="cpn-success d-flex align-items-center " id="suu" style="display:none!important;">
<i class='bx bxs-badge-check' ></i>
<span>Delivery postcode  serviceablegggg.</span></div>
<div class="cpn-error d-flex align-items-center " id="fa" style="display:none!important;">
<i class='bx bxs-x-circle'></i>
<span>Delivery postcode not serviceable.</span></div>
</div>
</div>
                </div></div>
            </div>
        </div>
</div>
<!-- =================================================================================== -->
<div id="ApplyCoupon" class="modal fade" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content modalsz position-relative coupnz">
              <button type="button" class="btn-close tpbtnz" data-bs-dismiss="modal">
    <i class='bx bx-x-circle'></i>
    </button>
    <div class="coupon-title">
      APPLY COUPON
    </div>
          <div class="modal-body p-0">
<div class="plan-editz pricing p-4 pb-3">
  <div class="check-pin mt-4">        
    <input type="text" id="coupon_code" class="coupon-pin" placeholder="Enter Coupon Code">
    <button class="pin-coupon" onclick="getcoupon1(coupon_code.value)">CHECK</button>  
 </div>
 <div class="pt-1 pdt-grand">
  <div style="display:none;" class="cpn-success  align-items-center " id="su">
<i class='bx bxs-badge-check' ></i>
<span>Your coupon was successfully applied</span></div>
 <div style="display:none;" class="cpn-success  align-items-center " id="ss">
<i class='bx bxs-badge-check' ></i>
<span>Your coupon was Valid</span></div>
<div style="display:none;"  class="cpn-error  align-items-center " id="err">
<i class='bx bxs-x-circle'></i>
<span>Your coupon was invalid</span></div>
<div style="display:none;"  class="cpn-error  align-items-center " id="errr">
<i class='bx bxs-x-circle'></i>
<span>Your coupon was invalid</span></div>
</div>
 <div class="hico-apply">
  <a href="#" class="btn-red btn-hi sli-btn bxs-none" onclick="getcoupon(coupon_code.value)">APPLY NOW</a>

</div>
</div>
<div class="hi-unlock">UNLOCK COUPONS</div>
<div class="hi-scroll-pn">
<?php foreach($cpn as $cp)
{
    ?>

   
 <div class="d-flex ps-4 pe-4 pb-2 pt-3">
  <div class="chk-box">
      <input type="checkbox" id="coupon_code1" class="coupon-pin"  value="<?php echo $cp['coupon_name'];?>">
  </div>
  <div class="hi-ccode">
      <div class="hi-dashed">
         <?php echo $cp['coupon_name'];?>
      </div>
  </div>
 </div>
  <div class="save-couponz p-4 pt-0 pb-3">
      <h5><?php echo round($cp['percentage']);?></h5>
     <p><?php echo $cp['description'];?></p>
  </div>
  

 
   <?php
  }
  ?>
   </div>
          </div>
      </div>
  </div>
</div>
</section>

          </div>

          <div class="tab-pane hi-tabs" id="tab-2">


<section id="hi-register" class="pb-0 reg-padd">
      <div class="container col-xl-9">
        <div class="row">
          <div class="already">
Already have an account? <button onclick="asd(1)" class="already-acc">Login Now</button>
          </div>
<div class="login-fm">
  <div class="login-intro">
    <h3>Create your Hi-Connect account</h3>
    <p>Hey, Enter your details to register your account</p>
</div>
<span id="success_message"></span>
<form method="POST" name="onboarding" id="registration_form">
  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="text" id="name" name="name" class="form-control" placeholder="First Name" tabindex="1" value="<?php echo $this->input->post('name'); ?>" required autofocus/>
    <span id="name_error" class="text-danger"></span>
  </div>
<div class="form-outline mb-4">
    <input type="text" id="lname" name="lname" class="form-control" placeholder="Last Name" value="<?php echo $this->input->post('lname'); ?>" required/>
    <span id="lname_error" class="text-danger"></span>
  </div>
  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="email" id="email" placeholder="Email" class="form-control" value="<?php echo $this->input->post('email'); ?>" required/>
    <span id="email_error" class="text-danger"></span>
  </div>
  <div class="form-outline mb-4">
    <input type="text" id="phone" placeholder="Phone" name="phone" class="form-control"  value="<?php echo $this->input->post('phone'); ?>" required />
    <span id="phone_error" class="text-danger"></span>
  </div>
  <div class="form-outline mb-4">
    <input type="password" name="password1" id="password1" value="<?php echo $this->input->post('password1'); ?>" placeholder="Password" class="form-control" required />
    <span id="password1_error" class="text-danger"></span>
  </div>
  <div class="form-outline mb-4">
    <input type="password" id="password2" name="password2" value="<?php echo $this->input->post('password2'); ?>" placeholder="Confirm Password" class="form-control" required/>
    <span id="password2_error" class="text-danger"></span>
  </div>
  <!-- Submit button -->
  <div class="form-outline mb-4">
    <div class="custom-control custom-checkbox rstr-chk">
      <input type="checkbox" id="accept_terms" name="accept_terms" value="<?php echo $this->input->post('accept_terms'); ?>" required />
      <label for="accept_terms">By continuing, you agree to our <a href="<?php echo base_url(); ?>Front/privacy" target="_blank">Privacy Policy</a> and <a href="<?php echo base_url(); ?>Front/terms" target="_blank">Terms of Service</a></label>
    </div>
    <span id="accept_terms_error" class="text-danger"></span>
  </div>
<div class="card-t-price text-center pb-3 pt-1">
 <div class="hi-fixd d-flex justify-content-between">
     <a href="#" class="btn-white btn-hi sli-btn flo-left" onclick="tab1()">BACK</a>
  <a href="#" class="btn-red btn-hi sli-btn bxs-none flo-right" onclick="sub()">CONTINUE</a>
  
  </div>
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
<div class="rgr-btm"></div>
</div>
</div>
</section>
<script>
function asd(a)
{
    if(a==1){
    document.getElementById("hi-register").style.display="none";
    document.getElementById("hi-login").style.display="block"; 
    }
    if(a==2){
    document.getElementById("hi-login").style.display="none";
    document.getElementById("hi-register").style.display="block"; 
    }
}
</script>
<section id="hi-login" class="pb-0">
      <div class="container col-xl-9">
        <div class="row">
          <div class="already">
Don't have an account? <button onclick="asd(2)" class="already-acc">Register Now</button>
          </div>    
<div class="login-fm">
  <div class="login-intro">
    <h3>Welcome Back!</h3>
    <p>Login to continue</p>
</div>
<form method="POST" name="onboarding" >
  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="text" id="user_id" class="form-control" name="user_id"  placeholder="User ID" required />
      <span class="invalid-feedback" id="invalid-feedback11">
                      
                    </span>
  </div>
  <div class="form-outline mb-4">
    <input type="password" name="password" id="password" placeholder="Password" class="form-control" required/>
    <span class="invalid-feedback"  id="invalid-feedback21">
                      
                    </span>
  </div>
  <!-- Submit button -->
 <div class="hi-fixd d-flex justify-content-between">
     <a href="#" class="btn-white btn-hi sli-btn flo-left"  onclick="tab1()">BACK</a>
  <a href="#" class="btn-red btn-hi sli-btn bxs-none flo-right" onclick="subb()">CONTINUE</a>
  
  </div>
</form>
</div>
</div>
</div>
</section>



            </div>
      
      
      
<div class="tab-pane hi-tabs tr" id="tab-38">

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


<?php

  $user_id = $this->session->userdata('user_id');
          $this->db->select('*'); 
          $this->db->from('users'); 
          $this->db->where('user_id', $user_id);
         $query = $this->db->get(); 
              $result1 = $query->result_array(); 
              foreach($result1 as $result)
              {
              $addr=$result['shipping_address'];
             
              $state=$result['state'];
              $pincode=$result['pincode'];
              $nearby=$result['nearby'];
              }
?>
<form method="POST" name="onboarding" action="<?php echo base_url()?>payment/checkout">


<div class="form-full pb-4">
  <textarea class="address-edit" name="address" id="address" required >
  <?php if($this->session->userdata('user_id')!="") echo $this->session->userdata('shipping_address');?></textarea>
  <span id="address_error" class="text-danger"><?php echo form_error('address'); ?></span> 
</div>
<div class="form-full">  
  <div class="form-outline form-fifty mb-4 pe-2">
    <input type="text" id="pincode" placeholder="Pin Code" name="pincode" class="form-control" value="<?php if($this->session->userdata('pincode')!="") echo $this->session->userdata('pincode');?>" required/>
    <span id="pincode_error" class="text-danger"><?php echo form_error('pincode'); ?></span>
  </div>
  <div class="form-outline form-fifty mb-4 ps-2">
     <select class="form-control" id="inputState" placeholder="State" name="state" class="form-control" required >
                        <option value="">Select State</option>
                        <option value="Andra Pradesh" <?php if($this->session->userdata('state') == "Andra Pradesh") { ?> selected="selected"<?php } ?>>Andra Pradesh</option>
                        <option value="Madya Pradesh"  <?php if($this->session->userdata('state') == "Madya Pradesh") { ?> selected="selected"<?php } ?>>Madya Pradesh</option>
                        <option value="Arunachal Pradesh" <?php if($this->session->userdata('state') == "Arunachal Pradesh") { ?> selected="selected"<?php } ?>>Arunachal Pradesh</option>
                        <option value="Assam" <?php if($this->session->userdata('state') == "Assam") { ?> selected="selected"<?php } ?>>Assam</option>
                        <option value="Bihar" <?php if($this->session->userdata('state') == "Bihar") { ?> selected="selected"<?php } ?>>Bihar</option>
                        <option value="Chhattisgarh">Chhattisgarh</option>
                        <option value="Goa">Goa</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Haryana">Haryana</option>
                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                        <option value="Jharkhand">Jharkhand</option>
                        <option value="Karnataka">Karnataka</option>
                        <option value="Kerala" <?php if($this->session->userdata('state') == "Kerala") { ?> selected="selected"<?php } ?>>Kerala</option>
                        <option value="Madya Pradesh">Madya Pradesh</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Manipur">Manipur</option>
                        <option value="Meghalaya">Meghalaya</option>
                        <option value="Mizoram">Mizoram</option>
                        <option value="Nagaland">Nagaland</option>
                        <option value="Orissa">Orissa</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Rajasthan">Rajasthan</option>
                        <option value="Sikkim">Sikkim</option>
                        <option value="Tamil Nadu">Tamil Nadu</option>
                        <option value="Telangana">Telangana</option>
                        <option value="Tripura">Tripura</option>
                        <option value="Uttaranchal">Uttaranchal</option>
                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                        <option value="West Bengal">West Bengal</option>
                        <option disabled style="background-color:#aaa; color:#fff">UNION Territories</option>
                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                        <option value="Chandigarh">Chandigarh</option>
                        <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                        <option value="Daman and Diu">Daman and Diu</option>
                        <option value="Delhi">Delhi</option>
                        <option value="Lakshadeep">Lakshadeep</option>
                        <option value="Pondicherry">Pondicherry</option>
                      </select>
                      <span id="state_error" class="text-danger"><?php echo form_error('state'); ?></span>
  </div>
  
</div>
<input type="hidden" id="cust" name="cust" value="<?php if($this->session->userdata('user_id')!="") echo $this->session->userdata('user_id');?>">
<input type="hidden" id="tot1" name="tot" >
<input type="hidden" id="coupon" name="coupon" >
<input type="hidden" id="amt" name="amt" >
  <div class="form-outline mb-4">
    <input type="text"  tabindex="1" autofocus id="nearby" placeholder="Nearby" class="form-control" name="nearby" value="<?php if($this->session->userdata('nearby')!="") echo $this->session->userdata('nearby');?>"/>
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
  <!--<div class="d-flex justify-content-between pb-2 pdt-price">
    <div>Total Product Price</div>
    <div id="tot"></div>
  </div>-->
  <div class="d-flex justify-content-between pb-2 pt-2">
    <div class="hico-product">Order Total</div>
    <div class="hico-product" id="tot"></div>
  </div>
  <div class="clicking mt-2 mb-2">Clicking on ‘Continue’ will not deduct any money</div>
   <div class="hi-fixd d-flex justify-content-between">
     <a href="#" class="btn-white btn-hi sli-btn flo-left"  onclick="tab2()">BACK</a>
     <input type="submit" name="submit" id="submit" class="btn-red btn-hi sli-btn m-0 flo-right">Submit</button>
 <?php /* <a href="#" class="btn-red btn-hi sli-btn m-0 flo-right" onclick="checkval()">Continue</a>*/ ?>
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














<script type="text/javascript">
function deleteproduct(rowid)
{
var answer = confirm ("Are you sure you want to delete?");
if (answer)
{
$.ajax({
      type: "POST",
      url: "<?php echo site_url('welcome/remove');?>",
      data: "rowid="+rowid,
      success: function (response) {
          $(".rowid"+rowid).remove(".rowid"+rowid); 
          $(".cartcount").text(response);  
          var total = 0;
          $('.subtotal').each(function(){
              total += parseInt($(this).text());
              $('.grandtotal').text(total);
              location.reload();

          });              
      }
  });
}
}

var total = 0;
$('.subtotal').each(function(){
total += parseInt($(this).text());

$('.grandtotal').text(total);
});


function updateproduct(rowid)
{
var qty = $('.qty'+rowid).val();
var price = $('.price'+rowid).text();
var subtotal = $('.subtotal'+rowid).text();
$.ajax({
  type: "POST",
  url: "<?php echo site_url('welcome/update_cart');?>",
  data: "rowid="+rowid+"&qty="+qty+"&price="+price+"&subtotal="+subtotal,
  success: function (response) {
          $('.subtotal'+rowid).text(response);
          var total = 0;
          $('.subtotal').each(function(){
              total += parseInt($(this).text());
              $('.grandtotal').text("₹".total);
          });     
  }
});
}


</script>


<script>
  
 function getcoupon1(coupon_code)
    {
        var coupon_code=$("#coupon_code").val();
       // alert(coupon_code);
      
        $.ajax({
            url:"<?php echo base_url() ?>Products/getcupon",
          method:"POST",
          data:{coupon_code:coupon_code},
           dataType: "json",
           success:function(data){
            if(data['count']>0)
            {
                //$('.coupon').show();
               
                $('#percentage').html(Number(data['percentage'])+'% ');
                var percentage = Number(data['percentage']);
       if(percentage==0)
       {
           $("#errr").show();
               
       }
       else
       {
           $("#ss").show();
           $("#cp").show();
       }
                
              

            }
            else if(data['count']==0){
               // alert("f");
                $('.cpn-success').hide();
                $('.cpn-error').show();
                //$('.coupon').hide();
                //$('#message').html("Invalid Coupon Code !");
               // $('#message').css('color', 'red');
                //document.getElementById("grand_total").innerHTML = document.getElementById("total_sale_price").value;
            }
            
          }

      });
    }
 
 
 function getcoupon11()
 {
           $('.rm').hide();
                 $('.rm1').hide();
                 //document.getElementById("rm").value=hide;
                  $("#a").removeClass('d-flex').addClass('ad');
                   $("#b").removeClass('d-flex').addClass('ha');
                   var numVal1 = document.getElementById("new").innerHTML;

    // alert(numVal1);
                //     document.getElementById("coupon").value=data['coupon_id'];

                document.getElementById("discount_amount").innerHTML = 0;
            
               document.getElementById("grandtotal1").innerHTML =numVal1;
                $('.add').show();
                    // $('.add').css('display', 'show!important');
                 $('.add1').show();
          
 }

    function getcoupon(coupon_code)
    {
        if($("#coupon_code").val()=="")
        {
             var coupon_code3=$("#coupon_code1").val();
        }
        else
        {
                var coupon_code=$("#coupon_code").val();
        
        }
         var coupon_code3=$("#coupon_code1").val();
          var coupon_code=$("#coupon_code").val();
  
      
        $.ajax({
            url:"<?php echo base_url() ?>Products/getcupon",
          method:"POST",
          data:{coupon_code:coupon_code3},
           dataType: "json",
           success:function(data){
            if(data['count']>0)
            {
                //$('.coupon').show();
              
                $('#percentage').html(Number(data['percentage'])+'% ');
                var percentage = Number(data['percentage']);
         
                var numVal1 = document.getElementById("grandtotal1").innerHTML;
                 var num = document.getElementById("mrpdis").innerHTML;
                
                var numVal2 =  data['percentage'] / 100;
                var discount_amount = numVal1 * numVal2;
                 var mrp_amount = discount_amount+num;
                document.getElementById("coupon").value=data['coupon_id'];
                document.getElementById("discount_amount").innerHTML = discount_amount.toFixed(2);
            
               // document.getElementById("mrpdiscount").innerHTML = mrp_amount.toFixed(2);
               var ds=Number(discount_amount)+Number(num);
               // document.getElementById("grandtotal10").innerHTML =1;
              
                $('#grandtotal1').text(numVal1-discount_amount);
                 $('#mrpdiscount').text(ds);
                if(percentage!=0)
                {
             
                     $('.add').hide();
                    // $('.add').css('display', 'none!important');
                   $('.add1').hide();
                $('.rm').show();
                 $('.rm1').show();
                $("#err").hide();
                $("#errr").hide();
                 $("#ss").hide();
                //$('.cpn-success').show();
                $("#ApplyCoupon").modal('toggle');
                 
                }
                else
                {
                     $("#errr").show();
                }
              

            }
            else if(data['count']==0){
               // alert("f");
                $('.cpn-success').hide();
                $('.cpn-error').show();
                //$('.coupon').hide();
                //$('#message').html("Invalid Coupon Code !");
               // $('#message').css('color', 'red');
                //document.getElementById("grand_total").innerHTML = document.getElementById("total_sale_price").value;
            }
            
          }

      });
      
   
    }
    function tab1()
    {
         document.getElementById("tab-1").classList.add("active");
              document.getElementById("tab-2").classList.remove("active");
               document.getElementById("t1").classList.add("active");
                document.getElementById("t2").classList.remove("active");
              document.getElementById("tab1").classList.add("active");
              document.getElementById("tab2").classList.add("active");
    }
    function tab2()
    {
        document.getElementById("tab-2").classList.add("active");
              document.getElementById("tab-38").classList.remove("active");
                document.getElementById("t2").classList.add("active");
                 document.getElementById("t3").classList.remove("active");
              document.getElementById("tab1").classList.remove("active");
                document.getElementById("tab2").classList.remove("active");
              document.getElementById("tab3").classList.add("active");
    }
    $(document).ready( function () {
              var ct = document.getElementById("cust").value;
              if(ct!="")
              {
                   document.getElementById("t2").classList.add("ac");
              }
              

});
    function conti()
      {

    
                   
$.ajax({
          url:"<?php echo base_url() ?>Products/checklog",
          method:"POST",
          data:{coupon_code:"1"},
           dataType: "json",
           success:function(data){
          
        
            
          
                if(data['count']==0)
                {
            
              document.getElementById("tab-1").classList.remove("active");
              document.getElementById("tab-2").classList.add("active");
               document.getElementById("t2").classList.add("active");
                document.getElementById("t1").classList.remove("active");
              document.getElementById("tab1").classList.remove("active");
              document.getElementById("tab2").classList.add("active");
                }
                else
                {
                    $('[href="#tab-38"]').tab('show');
                   document.getElementById("t2").classList.add("ac");
var numVa = document.getElementById("grandtotal1").innerHTML;
              var numVal1 =Number(numVa) ;
              var numVal11 = document.getElementById("grandtotal1").innerHTML;
              var numVal111 =Number(numVal11) ;
               var numVal1 =Number(numVa) ;
              var numVal11 = document.getElementById("grandtotal1").innerHTML;
              var numVal111 =Number(numVal11) ;

              var am=document.getElementById("discount_amount").innerHTML; 
              var am1 =Number(am) ;

              document.getElementById("tot1").value=numVal111;
            document.getElementById('cust').value= data['count'];
              document.getElementById('amt').value= am1;
              
               document.getElementById("tot").innerHTML =  numVal1.toFixed(2);

                document.getElementById('tot').value= numVal1;
                   document.getElementById("tab-1").classList.remove("active");
              document.getElementById("tab-38").classList.add("active");
              document.getElementById("tab1").classList.remove("active");
                document.getElementById("tab1").classList.remove("active");
              document.getElementById("tab3").classList.add("active"); 
                }
          }
        

      });
        
      }
      
      
      
      function subb()
      {
        
       
       var password= $("#password").val();
                var user_id= $("#user_id").val();
         
         
  if (user_id == "") {
   
      $("#invalid-feedback11").removeClass('invalid-feedback').addClass('fd');
 document.getElementById("invalid-feedback11").innerHTML="Please fill in your User ID";
    return false;
  }
   else if (password == "") {
   
      $("#invalid-feedback21").removeClass('invalid-feedback').addClass('fd');
 document.getElementById("invalid-feedback21").innerHTML="Please fill in your Password";
       
    return false;
  }
  
     
     
     
         else
         {
             
   
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>Auth/login1",
                    data: "password=" + password+"&user_id="+user_id,
                    dataType: "json",
                    success: function(data) {
                   var custid=data['count'];
                 
              document.getElementById('cust').value= custid;
             
             //  alert(custid);  
          if(custid!="")
          {
     
          var numVa = document.getElementById("grandtotal1").innerHTML;
     
       //   document.getElementById('custid').value= numVal1;
              var numVal1 =Number(numVa) ;
              var numVal11 = document.getElementById("grandtotal1").innerHTML;
              var numVal111 =Number(numVal11) ;
           
           
              var am=document.getElementById("discount_amount").innerHTML; 
              var am1 =Number(am) ;
    
              document.getElementById("tot1").value=numVal111;
        document.getElementById('amt').value= am1;
              
               document.getElementById("tot").innerHTML =  numVal1.toFixed(2);
               // document.getElementById("total_sale_pricefinal").innerHTML =  numVal1.toFixed(2);
               // document.getElementById("total_sale_pricefinal1").innerHTML = numVal1.toFixed(2);
               document.getElementById('tot').value= numVal1;
               document.getElementById("tab-2").classList.remove("active");
                        document.getElementById("tab-38").classList.add("active");
                        document.getElementById("t3").classList.add("active");
                        document.getElementById("t2").classList.remove("active");
                        //document.getElementById("tab1").classList.remove("active");
                        document.getElementById("tab2").classList.remove("active");
                        document.getElementById("tab3").classList.add("active");
                callback(custid);
              
                  
        
               // return custid;
           
        
          
                   
                    }
                     else
                    {
                        
                    }
                    }
                   
                });
              

         
             
      }
      
      
      
      
      
      }
      
      
      
      
      
      var return_first;
function callback(response) {
      $('#tab-38').addClass('active');
          $('#tab3').addClass('active');
          $('#tab-2').removeClass('active');
            $('#tab1').removeClass('active'); 
               $('#tab2').removeClass('active');    
}
      
      
      
      
      
      
      
      
      
      
      
      
      function sub()
      {
        var name= $("#name").val();
        var lname= $("#lname").val();
        var password1= $("#password1").val();
        var password2= $("#password2").val();
        var email= $("#email").val();
        var phone= $("#phone").val();
        var accept_terms = $("#accept_terms").is(":checked");
        var formdata = "name=" + name+ "&lname=" + lname + "&email=" + email + "&phone=" + phone + "&password1=" + password1+ "&password2=" + password2+ "&accept_terms=" + accept_terms;
                $.ajax({

                    type: "POST",
                    url: "<?php echo base_url() ?>Products/newregister",
                    data: formdata,
                    dataType: "json",
                    success: function(data) {
                    if(data.error)
                    {
                       if(data.name_error != '')
                       {
                        $('#name_error').html(data.name_error);
                       }
                       else
                       {
                        $('#name_error').html('');
                       }
                        if(data.lname_error != '')
                       {
                        $('#lname_error').html(data.lname_error);
                       }
                       else
                       {
                        $('#lname_error').html('');
                       }
                       if(data.email_error != '')
                       {
                        $('#email_error').html(data.email_error);
                       }
                       else
                       {
                        $('#email_error').html('');
                       }
                       if(data.phone_error != '')
                       {
                        $('#phone_error').html(data.phone_error);
                       }
                       else
                       {
                        $('#phone_error').html('');
                       }
                       if(data.password1_error != '')
                       {
                        $('#password1_error').html(data.password1_error);
                       }
                       else
                       {
                        $('#password1_error').html('');
                       }
                       if(data.password2_error != '')
                       {
                        $('#password2_error').html(data.password2_error);
                       }
                       else
                       {
                        $('#password2_error').html('');
                       }
                       if(data.accept_terms_error != '')
                       {
                        $('#accept_terms_error').html(data.accept_terms_error);
                       }
                       else
                       {
                        $('#accept_terms_error').html('');
                       }
                    }
                    if(data.count)
                    {
                     $('#name_error').html('');
                     $('#lname_error').html('');
                     $('#email_error').html('');
                     $('#phone_error').html('');
                     $('#password1_error').html('');
                     $('#password2_error').html('');
                     $('#accept_terms_error').html('');
                     $('#registration_form')[0].reset();
                        var custid=data['count'];
                        
                        var numVa = document.getElementById("grandtotal1").innerHTML;
                        var numVal1 =Number(numVa) ;
                        var numVal11 = document.getElementById("grandtotal1").innerHTML;
                        var numVal111 =Number(numVal11) ;

                        var am=document.getElementById("discount_amount").innerHTML; 
                        var am1 =Number(am) ;

                        document.getElementById("tot1").value=numVal111;
                        document.getElementById('cust').value= custid;
                        document.getElementById('amt').value= am1;
              
                        document.getElementById("tot").innerHTML =  numVal1.toFixed(2);
                        //document.getElementById("total_sale_pricefinal").innerHTML =  numVal1.toFixed(2);
                        //document.getElementById("total_sale_pricefinal1").innerHTML = numVal1.toFixed(2);
                        document.getElementById('tot').value= numVal1;
     
                         document.getElementById("tab-2").classList.remove("active");
                        document.getElementById("tab-38").classList.add("active");
                        document.getElementById("t3").classList.add("active");
                        document.getElementById("t2").classList.remove("active");
                        //document.getElementById("tab1").classList.remove("active");
                        document.getElementById("tab2").classList.remove("active");
                        document.getElementById("tab3").classList.add("active");
                       
                      }
                    }
                });
      }
</script>

    <script type="text/javascript">
    function addtocart(p_id)
    {

        var price = $('.price'+p_id).attr('rel');
        var image = $('.image'+p_id).attr('rel');
       var price1 = $('.price1'+p_id).attr('rel');
     var des = $('.des'+p_id).attr('rel');
        var name  = $('.name'+p_id).text();
        var id    = $('.name'+p_id).attr('rel');
       // alert(id);
        var qty   = 1;
            $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('welcome/add');?>",
                    data: "id="+id+"&image="+image+"&name="+name+"&price="+price+"&qty="+qty+"&price1="+price1+"&des="+des,
                    success: function (response) {
                       $(".cartcount").text(response);
                        window.location="opencart";
                    }
                });
    }
     function pincheck()
    {
          
   // $("#pinn").show();
   //  $(".pi").hide();
   //  $("#td_id").removeClass('d-flex').addClass('a');
        var id1=$("#pin").val();
       
//var id1=12;
if(id1=="")
{
        $("#invalid-feedback1").removeClass('invalid-feedback').addClass('fd');
 document.getElementById("invalid-feedback1").innerHTML="Please Enter pincode";
}
else
{
$("#ent").html("Change Address");
            $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('welcome/add1');?>",
                    data: "id1="+id1,
                    
                    success: function (response) {
                      // $(".cartcount").text(response);
                      
                        if(response!="")
                        {
                      
                          // $("#suu").hide();
                         
                          $("#PlanEdit").modal('toggle');
                            //$("#fa").show();
                             $("#pinch").html("<p>Delivery postcode Not serviceable.</p>");
                             $("#pinch").val("Dolly Duck");
                              
                        }
                        else
                        {
                               $("#PlanEdit").modal('toggle');
                              //  $("#suu").removeClass('d-flex').addClass('a');
                              // $("#suu").removeClass('d-flex').addClass('ad');
                          //$("#suu").hide();
                          $("#pinch").html("<p>Delivery postcode  serviceable.</p>");
                       
                        }
                        // location.reload();
                    }
                });
    }

}

</script>
<script>
  $('input[type="checkbox"]').on('change', function() {
   $('input[type="checkbox"]').not(this).prop('checked', false);
});
</script>
<script>
    function checkval()
    {
        var address= $("#address").val();
        var pincode= $("#pincode").val();
        var state= $("#inputState").val();
        var user_id = $("#cust").val();
        var nearby = $("#nearby").val();
        var tot = $("#tot1").val();
        var package = $("#package").val();
        var pdt = $("#pdt").val();
        var coupon = $("#coupon").val();
        var amt = $("#amt").val();

        var formdata = "address=" + address+ "&pincode=" + pincode + "&state=" + state+ "&cust=" + user_id + "&nearby=" + nearby + "&tot=" + tot + "&coupon=" + coupon+ "&amt=" + amt;
        alert(formdata);// "&package=" + package + "&pdt=" + pdt +
                $.ajax({

                    type: "POST",
                    url: "<?php echo base_url()?>payment/checkout",
                    data: formdata,
                    dataType: "json",
                    success: function(data) {
                    if(data.error)
                    {
                      alert('dddd');
                       if(data.address_error != '')
                       {
                        $('#address_error').html(data.address_error);
                       }
                       else
                       {
                        $('#address_error').html('');
                       }
                        if(data.pincode_error != '')
                       {
                        $('#pincode_error').html(data.pincode_error);
                       }
                       else
                       {
                        $('#pincode_error').html('');
                       }
                       if(data.state_error != '')
                       {
                        $('#state_error').html(data.state_error);
                       }
                       else
                       {
                        $('#state_error').html('');
                       }
                    document.getElementById("tab-2").classList.remove("active");
                        document.getElementById("tab-38").classList.add("active");
                        document.getElementById("t3").classList.add("active");
                        document.getElementById("t2").classList.remove("active");
                        //document.getElementById("tab1").classList.remove("active");
                        document.getElementById("tab2").classList.remove("active");
                        document.getElementById("tab3").classList.add("active");
                    }
                    }
                }); 
    }
</script>
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

</body>

</html>