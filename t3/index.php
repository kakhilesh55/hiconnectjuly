<?php 
$title = ($user_details['type']==1)?$user_details['name']:$company_details['company_name'];
$description = ($user_details['type']==1)?$user_details['about']:$company_details['description'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $title;?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="https://hiconnect.co.in/erp/assets/img/HiConnect-Icon.svg" rel="icon">
  <link href="https://hiconnect.co.in/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

<!-- CSS -->
<link href="https://fonts.googleapis.com/css2?family=Hammersmith+One&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />



<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
<link href="https://hiconnect.co.in/t3/css/style.css" rel="stylesheet">
<link href="https://hiconnect.co.in/t3/css/tooltip.css" rel="stylesheet">

</head>
<?php



if(!empty($user_details)) {
?>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top top-hdr" style="position:relative;">
<div class="containerz m-0"><!--d-flex align-items-center justify-content-between-->
  <!--==============================================-->
<div class="viewsz">
<div class="social-linksq">
<div class="social-btnq flex-centerq" id="twitter">
<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="21" height="21" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <circle cx="12" cy="12" r="2" />
  <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
</svg><span><?php echo $count; ?><i style="padding-left:6px;"></i>Views</span>
</div></div></div>
      <div class="card card-style header-card m-0 d-flex">
        <div class="content">
        <div class="d-flex card-dataz pb-5">
        <div class="webly-intro mt-auto ps-4 pb-4">
          <h2 class="font-17"><?php echo ($user_details['type']==2)?$company_details['company_name']:$user_details['name']; ?></h2>
          <h5 class="font-17"><?php echo ($user_details['type']==2)?$company_details['description']:$user_details['profession'].'<br/>'.$company_details['company_name']; ?></h5>
        </div>
        <div class="ms-auto pe-2 pt-2">
          <a href="#modalScrollableCenter" role="button" class="webly-avatar request-loader me-3" data-bs-toggle="modal"><img src="<?php if($user_details['type']==1){ echo ($user_details['user_image']!='')?$base_url.'/erp/uploads/user_images/'.$user_details['user_image']:$base_url.'/erp/uploads/user_images/default_user_img.jpg'; } else if($user_details['type']==2){ echo ($company_details['company_image']!='')?$base_url.'/erp/uploads/company_images/'.$company_details['company_image']:$base_url.'/erp/uploads/company_images/default_user_img.jpg'; }?>" alt=""></a>
        </div>
        </div>
        </div>
        </div>
<div class="wel-abphone">

  <form action="" method="POST"> 
    <button type="submit" name="download_vcard" id="download_vcard" class="vcardbtn"> 
      <a class="wel-phone">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round" style="margin: -3px 3px 0 0;">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
          <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
          <polyline points="7 11 12 16 17 11" />
          <line x1="12" y1="4" x2="12" y2="16" />
        </svg> 
        Add to Phonebook
      </a>
    </button>
  </form>
</div>
</div>
<div class="containerz m-0">
<!--==============================================-->
<div id="top-social">
  <div class="d-flex justify-content-around top-social pt-4 pb-4 inprofile share-buttons align-center">
    <?php while ($social_links = mysqli_fetch_array($social_link_users)) {   ?>
                        <li class="share-button">
                            <a target="_blank" href="<?php echo $social_links['link'];?>" ><i class="<?php echo $social_links['social_class'];?>"></i></a>
                        </li>
                    <?php } ?>   
    <!--<div><a href="#"><img src="t3/css/images/Facebook.png" alt=""></a></div>
    <div><a href="#"><img src="t3/css/images/Behance.png" alt=""></a></div>
    <div><a href="#"><img src="t3/css/images/Insta.png" alt=""></a></div>
    <div><a href="#"><img src="t3/css/images/Twitter.png" alt=""></a></div>-->
  </div>
</div>

<div id="user-datas">
  <h4>Info</h4>
<div class="text-center d-flex justify-content-around pb-4 pt-4">
    <div class="user-datas">
      <a href="tel:<?php echo isset($contact_details['mob1'])?$contact_details['mob1']:$user_details['phone'];?>"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-phone-call" width="35" height="35" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
  <path d="M15 7a2 2 0 0 1 2 2" />
  <path d="M15 3a6 6 0 0 1 6 6" />
</svg>
      <p class="infoimg">Call</p></a>
    </div>
    <div class="user-datas">
      <a href="mailto:<?php echo isset($contact_details['email'])?$contact_details['email']:$user_details['email'];?>"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail-opened" width="35" height="35" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <polyline points="3 9 12 15 21 9 12 3 3 9" />
  <path d="M21 9v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10" />
  <line x1="3" y1="19" x2="9" y2="13" />
  <line x1="15" y1="13" x2="21" y2="19" />
</svg>
      <p class="infoimg">E-Mail</p></a>
    </div>
    <div class="user-datas">
      <a target="_blank" href="<?php echo isset($user_details['website'])?$user_details['website']:$user_details['website'];?>"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-world" width="35" height="35" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <circle cx="12" cy="12" r="9" />
  <line x1="3.6" y1="9" x2="20.4" y2="9" />
  <line x1="3.6" y1="15" x2="20.4" y2="15" />
  <path d="M11.5 3a17 17 0 0 0 0 18" />
  <path d="M12.5 3a17 17 0 0 1 0 18" />
</svg>
      <p class="infoimg">Website</p></a>
    </div>
    <div class="user-datas">
      <a target="_blank" href="<?php echo isset($user_details['google_map_link'])?$user_details['google_map_link']:'';?>"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin" width="35" height="35" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <circle cx="12" cy="11" r="3" />
  <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
</svg>
      <p class="infoimg">Map</p></a>
    </div>
</div>
</div>
    </div>
  </header><!-- End Header -->

 <div class="cardbody">
<main id="main">
<!-- ======= About Section ======= -->
<?php if($product_count>0){ ?> 
<section id="webly-products" class="webly-products pb-4">
<div class="containerz" data-aos="fade-up">
  <div class="containerz m-0">
  <div class="row m-0">
<h4>Products</h4>
 <?php while ($product = mysqli_fetch_array($product_details)) {  ?>
    <div class="col-6 d-flex justify-content-center">
      <div class="webly-products pt-5">
          <div class="webly-product">
              <a href="https://wa.me/<?php echo isset($contact_details['mob1'])?$contact_details['mob1']:$user_details['phone'];?>?text=Hi,%20I%20am%20interested%20in%20your%20product/service:%20CLICK%20TO%20CALL.%20Please%20provide%20more%20details." target="blank"><img onclick="openImageModal(this)" alt="CLICK TO CALL" src="<?php echo $base_url;?>erp/uploads/product_images/<?php echo ($product['product_image'])?$product['product_image']:'default_product_image.png'; ?>" class="product-img" ></a>
              <h4><?php echo $product['product_name']; ?></h4>
              <p><?php echo $product['price']; ?></p>
          </div>
      </div>
  </div>
  <?php  } ?>  

</div>
  </div></div>

</section>
<!--==============================================================================================-->
<!--==============================================================================================--> <?php } 
if($payment_account>0 || $payment_wallet>0) { ?>
         <section id="webly-payments" class="pb-4">
            <div class="containerz" data-aos="fade-up">
               <div class="containerz m-0 ps-3 pe-3">
                  <h4>Payments</h4>
<?php while ($payment_wallet = mysqli_fetch_array($wallet_payment_details)) {
            $payment_type = $payment_wallet['payment_type'];
            $app_id = $payment_wallet['app_id'];
            $app_name = mysqli_fetch_assoc(mysqli_query($con, "select app_name from payment_app where app_id='$app_id'"));
            if($payment_type=='Wallet')
            { ?>
<div class="row webly-payments">
                     <div class="col-8 d-flex justify-content-start">
                        <div class="align-self-center ps-2">
                           <div class="webly-wallet">
                              <?php if(ucwords($app_name['app_name'])=='Google Pay')
                              { ?>
                                <img src="t3/css/images/Google pay.png" alt="">
                              <?php } elseif(ucwords($app_name['app_name'])=='Phone Pay')
                              {?>
                                <img src="t3/css/images/Phonepay.png" alt="">
                              <?php } ?>
                              <p><?php echo ucwords($app_name['app_name']);?></p>
                           </div>
                        </div>
                     </div>
                     <div class="col-4 d-flex justify-content-end">
                        <div class="align-self-center pe-2">
                           <div class="wallet-copy">
<div class="snippet sni-one"><input class="dzp-none" type="text" value="<?php echo $payment_wallet['handle'];?>"></div>
                           </div>
                        </div>
                     </div>
</div>
    <?php }
    }
    if($payment_account>0)
    { 
      while ($payment = mysqli_fetch_array($account_payment_details)) {
            $payment_type = $payment['payment_type'];
            
           // $app_name = mysqli_fetch_assoc(mysqli_query($con, "select app_name from payment_app where app_id=$payment['app_id']"));
            if($payment_type=='Account')
            { ?>          
 
                  <div class="row webly-payments">
                     <div class="col-8 d-flex justify-content-start">
                        <div class="align-self-center ps-2">
                           <div class="webly-wallet">
                              <img src="t3/css/images/Bank AC.png" alt="">
                              <p>Bank/UPI Id</p>
                           </div>
                        </div>
                     </div>
                     <div class="col-4 d-flex justify-content-end">
                        <div class="align-self-center pe-2">
                           <div class="wallet-copy">
<div class="snippet sni-one"><input class="dzp-none" type="text" value="<?php echo $payment['account_no'];?>"></div>
                           </div>
                        </div>
                     </div>
                  </div>
        <?php }
        } 
      } ?>
</div></div>
</section><!-- End About Section -->
 <?php } ?>
          <!--
                  <div class="row webly-payments">
                     <div class="col-8 d-flex justify-content-start">
                        <div class="align-self-center ps-2">
                           <div class="webly-wallet">
                              <img src="css/images/Card.png" alt="">
                              <p>Card</p>
                           </div>
                        </div>
                     </div>
                     <div class="col-4 d-flex justify-content-end">
                        <div class="align-self-center pe-2">
                           <div class="wallet-copy">
<div class="snippet sni-one"><input class="dzp-none" type="text" value="Card Details Here"></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>-->
<!--==============================================================================================-->
<!--==============================================================================================-->
<!-- ======= Enquiry Section ======= -->
<section id="contact" class="contact webly-contact">
  <div class="containerz" data-aos="fade-up">
<h4>Enquiry</h4>
  <div class="row">
    <div class="col-12 mt-lg-0">
      <form action="" method="post" role="form" class="php-email-form pt-0">
        <div class="row">
        <label class="mt-3" for="Name">Full Name</label>
          <div class="form-group">
            <input type="text" name="enquiryName" id="enquiryName" class="form-control rounded-0 bord-2" placeholder="Enter Full Name" required>
          </div>
        </div>
        <div class="row">
          <div class="col-6 form-group">
            <label class="mt-3" for="Phone">Phone</label>
      <div class="form-group">
        <input type="text" name="phoneNumber" id="phoneNumber" placeholder="Enter Phone Number" class="form-control rounded-0 bord-2" required>
      </div>
          </div>
          <div class="col-6 form-group mt-md-0">
            <label class="mt-3" for="Email">Email</label>
    <div class="form-group">
      <input type="text" name="email" id="email" class="form-control rounded-0 bord-2" placeholder="Enter Email" required>
    </div>
          </div>
        </div>
    <label class="mt-3" for="Description">Description of query</label>
        <div class="form-group">
          <textarea class="form-control rounded-0 bord-2" name="message" id="message" rows="5" placeholder="Message" required></textarea>
        </div>
        <div class="my-3">
          <div class="loading">Loading</div>
          <div class="error-message"></div>
          <div class="sent-message">Your message has been sent. Thank you!</div>
        </div>
        <div style="text-align: right;">
          <button type="submit" name="submit">Send Message</button></div>
      </form>
    </div>
  </div>
</section><!-- End Contact Section -->

</main><!-- End #main -->


<!-- =========================================================================================================================== -->
<div id="modalScrollableCenter" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content modalz">
                    <button type="button" class="btn-close tpbtn" data-bs-dismiss="modal"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <line x1="5" y1="12" x2="19" y2="12" />
  <line x1="5" y1="12" x2="11" y2="18" />
  <line x1="5" y1="12" x2="11" y2="6" />
</svg></button>
<div class="modal-body p-0">

<section id="users-profile" class="pt-0">
  <div class="containerz p-0">
    <div class="row p-0 m-0">
  <div class=" rltv p-0">
  <div class="white-bg"><img src="t3/css/images/user-header.png"/></div>
      <div id="user-header" class="d-flex justify-content-center mb-4" data-aos="fade-up">
        <div id="user-photo">
          <img src="<?php if($user_details['type']==1){ echo ($user_details['user_image']!='')?$base_url.'/erp/uploads/user_images/'.$user_details['user_image']:$base_url.'/erp/uploads/user_images/default_user_img.jpg'; } else if($user_details['type']==2){ echo ($company_details['company_image']!='')?$base_url.'/erp/uploads/company_images/'.$company_details['company_image']:$base_url.'/erp/uploads/company_images/default_user_img.jpg'; }?>" alt="" class="rounded-circle">
        </div>
      </div>
    </div>
    </div>
    <div class="user-client ps-3">
      <h2><?php echo ($user_details['type']==2)?$company_details['company_name']:$user_details['name']; ?></h2>
      <p><?php echo ($user_details['type']==2)?$company_details['description']:$user_details['profession'].','.$company_details['company_name']; ?>  <span style="margin-top: 5px;display: block"><i style="font-size: 12px;">(<?php if($user_details['type']==2) echo 'MANAGER'; else if($user_details['type']==3) echo 'USER'; else if($user_details['type']==1) echo 'ADMIN';?>)</i></span></p>
      <div class="user-ratingz">
        <img src="t3/css/images/starss.png" alt="">
      </div>
    </div>
<div class="containerz">
<div class="row ps-3 pt-4 pb-4 pe-3 m-0">
        <div id="user-address" class="pt-3" data-aos="fade-up">
          <div class="user-details d-flex">
            <div class="details-icon align-self-center">
              <div class="details-icons text-center rounded-circle">
                <a target="_blank" href="<?php echo isset($user_details['google_map_link'])?$user_details['google_map_link']:'';?>" class="d-flex justify-content-center align-items-center"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin" width="35" height="35" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
  <circle cx="12" cy="11" r="3"></circle>
  <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"></path>
</svg></a>
              </div>
            </div>
            <div class="details-data align-self-center ps-4">
              <p><?php echo isset($user_details['address'])?$user_details['address']:'';?></p>
            </div>
          </div>
          <div class="user-details d-flex">
            <div class="details-icon align-self-center">
              <div class="details-icons text-center rounded-circle">
                <a href="mailto:<?php echo isset($contact_details['email'])?$contact_details['email']:$user_details['email'];?>" class="d-flex justify-content-center align-items-center"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail-opened" width="35" height="35" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
  <polyline points="3 9 12 15 21 9 12 3 3 9"></polyline>
  <path d="M21 9v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10"></path>
  <line x1="3" y1="19" x2="9" y2="13"></line>
  <line x1="15" y1="13" x2="21" y2="19"></line>
</svg></a>
              </div>
            </div>
            <div class="details-data align-self-center ps-4">
              <p><?php echo isset($contact_details['email'])?$contact_details['email']:$user_details['email'];?></p>
            </div>
          </div>
          <?php if(isset($user_details['website'])){ ?> 
          <div class="user-details d-flex">
            <div class="details-icon align-self-center">
              <div class="details-icons text-center rounded-circle">
                <a target="_blank" href="<?php echo isset($user_details['website'])?$user_details['website']:$user_details['website'];?>" class="d-flex justify-content-center align-items-center"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-world" width="35" height="35" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
  <circle cx="12" cy="12" r="9"></circle>
  <line x1="3.6" y1="9" x2="20.4" y2="9"></line>
  <line x1="3.6" y1="15" x2="20.4" y2="15"></line>
  <path d="M11.5 3a17 17 0 0 0 0 18"></path>
  <path d="M12.5 3a17 17 0 0 1 0 18"></path>
</svg></a>
              </div>
            </div>
            <div class="details-data align-self-center ps-4">
              <p><?php echo isset($user_details['website'])?$user_details['website']:$user_details['website'];?></p>
            </div>
          </div>
        <?php } ?>
          <div class="user-details d-flex">
            <div class="details-icon align-self-center">
              <div class="details-icons text-center rounded-circle">
                <a target="_blank" href="tel:<?php echo isset($contact_details['mob1'])?$contact_details['mob1']:$user_details['phone'];?>" class="d-flex justify-content-center align-items-center"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-phone-call" width="35" height="35" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
  <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2"></path>
  <path d="M15 7a2 2 0 0 1 2 2"></path>
  <path d="M15 3a6 6 0 0 1 6 6"></path>
</svg></a>
              </div>
            </div>
            <div class="details-data align-self-center ps-4">
              <p><?php echo isset($contact_details['mob1'])?$contact_details['mob1']:$user_details['phone'];?></p>
            </div>
          </div>
        </div>
        <div id="about-datas" class="mt-4 pt-3 ps-3 pe-3 pb-3" data-aos="fade-up">
          <h5>About</h5>
          <div class="company-details d-flex">
            <div class="col-4 company-intro"><?php echo ($user_details['type']==2)?'Company':'Name';?>:</div>
            <div class="col-8 company-data"><?php echo ($user_details['type']==2)?$company_details['company_name']:$user_details['name']; ?></div>
          </div>
          <div class="company-details d-flex">
            <div class="col-4 company-intro"><?php echo ($user_details['type']==2)?'Year of Establishment':'Profession'; ?>:</div>
            <div class="col-8 company-data"><?php echo ($user_details['type']==2)?$company_details['year_start']:$user_details['profession']; ?></div>
          </div>
          <div class="company-details d-flex">
            <div class="col-4 company-intro"><?php echo ($user_details['type']==2)?'Nature Of Business':'About';?>:</div>
            <div class="col-8 company-data"> <?php  if($user_details['type']==2) { echo $company_details['business_nature']!=''?$company_details['business_nature']:''; }else{ echo $user_details['about']!=''?$user_details['about']:''; } ?></div>
          </div>
        </div>
    </div>
  </div>
 </div>
</section>
</div>

            </div>
        </div>
</div>

<!-- =========================================================================================================================== -->
<div id="shareQRcode" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable backg">
            <div class="modal-content modalzz bg-transparent">
<div class="share-top">
                    <button type="button" class="btn-close tpbtn" data-bs-dismiss="modal"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
  <line x1="5" y1="12" x2="19" y2="12"></line>
  <line x1="5" y1="12" x2="11" y2="18"></line>
  <line x1="5" y1="12" x2="11" y2="6"></line>
</svg></button>
                <div class="modal-body p-0">
<section id="webly-share" class="pb-5">
<div class="containerz pe-3 ps-3" data-aos="fade-up">
  
  <div class="row qrs pb-2">
  <div class="col-12 d-flex justify-content-center">
    <div class="webly-qr">
      <?php if ($qr_details) { ?>
            <a href="#"><img src="<?php echo 'erp/uploads/qr_image/'.$qr_details['qr_image']; ?>" alt=""></a>
      <?php } ?>
    </div>
  </div>
  <p class="pt-2">Scan QR</p>
</div>
<div class="light-sky">
<div class="text-center d-flex justify-content-around pt-2">
  <div class="user-share pt-3">
<div class="snippet1"><input class="dzp-none" type="text" value="<?php echo $link;?>"></div>
    <p class="mt-2">Copy</p>
  </div>
  <div class="user-share pt-3">
    <a href="#smsshare" role="button" data-bs-toggle="modal" data-dismiss="modal"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-message" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4" />
  <line x1="8" y1="9" x2="16" y2="9" />
  <line x1="8" y1="13" x2="14" y2="13" />
</svg></a>
    <p class="mt-2">SMS</p>
  </div>
  <div class="user-share pt-3">
    <a href="#whatsappshare" role="button" data-bs-toggle="modal" data-dismiss="modal"><img src="t3/css/images/Whatsapp.png" alt=""></a>
    <!--data-target="#whatsappshare" data-dismiss="modal"-->
    <p class="mt-2">Whatsapp</p>
  </div>
</div>
<div class="text-center d-flex justify-content-around pb-2">
  <div class="user-share pt-3">
    <a href="#emailshare" role="button" data-bs-toggle="modal" data-dismiss="modal"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail-opened" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <polyline points="3 9 12 15 21 9 12 3 3 9" />
  <path d="M21 9v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10" />
  <line x1="3" y1="19" x2="9" y2="13" />
  <line x1="15" y1="13" x2="21" y2="19" />
</svg></a>
    <p class="mt-2">Email</p>
  </div>
  <div class="user-share pt-3">
    <a href="#"><img src="t3/css/images/Instagram.png" alt=""></a>
    <p class="mt-2">Instagram</p>
  </div>
  <div class="user-share pt-3">
    <a href="#"><img src="t3/css/images/Facebook-share.png" alt=""></a>
    <p class="mt-2">Facebook</p>
  </div>
</div>
</div>
</div>
</div>
</section>
                </div>
            </div>
        </div>
</div>
<!-- ================================================================================================ -->
      <div class="modal fade" id="whatsappshare" tabindex="-1">
         <div class="modal-dialog">
            <div class="modal-content modalsz p-4">
               <button type="button" class="btn-close tpbtn wtpn" data-bs-dismiss="modal">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                     <line x1="5" y1="12" x2="19" y2="12"></line>
                     <line x1="5" y1="12" x2="11" y2="18"></line>
                     <line x1="5" y1="12" x2="11" y2="6"></line>
                  </svg>
               </button>
               <form action="" method="post" role="form" class="php-email-form pt-0">
                  <div class="row">
                     <label class="mt-3 pb-1" for="Name">Whatsapp Number:</label>
                     <div class="form-group pb-3 d-flex justify-content-between">
                        <div class="in-number">
                           <input type="text" name="Whatsapp" placeholder="+91" value="+91" class="form-control rounded-0 bord-2" id="Whatsapp" required="">
                        </div>
                        <div style="text-align: right;" class="in-send ps-2">
                            <button class="sh-whats"  onclick="share_whatsapp('<?php echo $base_url.$card_id;?>')"></button>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
<!-- ================================================================================================ -->
<!-- ================================================================================================ -->
      <div class="modal fade" id="emailshare" tabindex="-1">
         <div class="modal-dialog">
            <div class="modal-content modalsz p-4">
               <button type="button" class="btn-close tpbtn wtpn" data-bs-dismiss="modal">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                     <line x1="5" y1="12" x2="19" y2="12"></line>
                     <line x1="5" y1="12" x2="11" y2="18"></line>
                     <line x1="5" y1="12" x2="11" y2="6"></line>
                  </svg>
               </button>
               <form action="" method="post" role="form" class="php-email-form pt-0">
                  <div class="row">
                     <label class="mt-3 pb-1" for="Name">Email id:</label>
                     <div class="form-group pb-3 d-flex justify-content-between">
                        <div class="in-number">
                           <input type="text" name="email_input" placeholder="E-Mail" value="" class="form-control rounded-0 bord-2" id="email_input" required="">
                        </div>
                        <div style="text-align: right;" class="in-send ps-2">
                            <button class="sh-whats"  onclick="share_email('<?php echo $base_url.$card_id;?>')"></button>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
<!-- ================================================================================================ -->
<!-- ================================================================================================ -->
      <div class="modal fade" id="smsshare" tabindex="-1">
         <div class="modal-dialog">
            <div class="modal-content modalsz p-4">
               <button type="button" class="btn-close tpbtn wtpn" data-bs-dismiss="modal">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                     <line x1="5" y1="12" x2="19" y2="12"></line>
                     <line x1="5" y1="12" x2="11" y2="18"></line>
                     <line x1="5" y1="12" x2="11" y2="6"></line>
                  </svg>
               </button>
               <form action="" method="post" role="form" class="php-email-form pt-0">
                  <div class="row">
                     <label class="mt-3 pb-1" for="Name">Phone Number:</label>
                     <div class="form-group pb-3 d-flex justify-content-between">
                        <div class="in-number">
                           <input type="text" name="sms_input" placeholder="Phone Number" value="+91" class="form-control rounded-0 bord-2" id="sms_input" required="">
                        </div>
                        <div style="text-align: right;" class="in-send ps-2">
                            <button class="sh-whats"  onclick="share_sms('<?php echo $base_url.$card_id;?>')"></button>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
<!-- ================================================================================================ -->
 <?php if($gallery_images_count > 0) {?>
  <section id="hi-gallery" class="">
    <div class="containerz" data-aos="fade-up">
    <h4>Gallery</h4>
      <div class=" ps-3 pt-4 pe-3 m-0">
<div class="lightbox-gallery">
    <div class="container">
        <div class="row photos">
          <?php while($gallery = mysqli_fetch_array($gallery_images))
                { ?>
            <div class="col-6 d-flex justify-content-center item"><a href="<?php echo $base_url;?>erp/uploads/files/<?php echo $gallery['file_name'];?>" data-lightbox="photos"><img class="img-fluid" src="<?php echo $base_url;?>erp/uploads/files/<?php echo $gallery['file_name'];?>"></a></div>

                <?php } ?>
           
      
        </div>
    </div>
</div>
      </div>
    </div>
  </section>
<?php } 
if($testimonials_count>0){ ?>
<!-- ================================================================================================ -->  
<section id="webly-testimonials" class="">
  <div class="containerz" data-aos="fade-up">
    <h4>Testimonials</h4>
    <div class="row ps-3 pt-4 pb-4 pe-3 m-0">

<?php while ($testimonials = mysqli_fetch_array($testimonials_details)) {  ?>

      <div class="webly-testimonial mb-3">
        <h5><?php echo $testimonials['name']; ?></h5>
        <div class="ratingz d-flex align-items-start">
          <!--<div class="starz d-flex align-items-center">
            <img src="t3/css/images/starss.png" alt="" class="stars">
          </div>
          <div class="datez d-flex align-items-center ps-4">
              2 Years ago
          </div>-->
        </div>
        <p><?php echo $testimonials['message']; ?></p>
      </div>
    <?php } ?>
    
    </div>
  </div>
</section>
<?php } ?>
<!-- ================================================================================================ -->
<!-- ================================================================================================ -->
<!--<section id="webly-achievements" class="">
  <div class="containerz" data-aos="fade-up">
  <h4>Testimonials</h4>
    <div class="row ps-3 pt-4 pb-4 pe-3 m-0">
      <div class="col-12 webly-achievement mb-3">
        <h5>Junior Engineer</h5>
        <p>Lorem ipsum dolor sit amet consectetur.</p>
    </div>
    <div class="col-12 webly-achievement mb-3">
      <h5>Junior Engineer</h5>
      <p>Lorem ipsum dolor sit amet consectetur.</p>
  </div>
  <div class="col-12 webly-achievement mb-3">
    <h5>Junior Engineer</h5>
    <p>Lorem ipsum dolor sit amet consectetur.</p>
</div>
    </div>
  </div>
</section>-->
<!-- ================================================================================================ -->

<?php if($education_count>0){ ?>
<section id="webly-education" class="">
  <div class="containerz" data-aos="fade-up">
    <h4>Education</h4>
    <div class="row ps-3 pt-4 pb-4 pe-3 m-0">
      <?php while ($education = mysqli_fetch_array($education_details)) {  ?>
      <div class="col-12 webly-educate mb-3">
        <h5><?php echo $education['name']; ?></h5>
        <h5><?php echo $education['university']; ?></h5>
        <p><?php echo $education['start_date']; ?></p>
        <p><?php echo $education['end_date']; ?></p>
        <?php /*<p><?php echo $education['description']; ?></p>*/ ?>
    </div>
  <?php } ?>
    </div>
  </div>
</section>
<!-- ================================================================================================ -->
<?php } 
if($services_count>0){ ?> 
<section id="webly-services" class="">
  <div class="containerz" data-aos="fade-up">
    <h4>Services</h4>
    <div class="row ps-3 pt-4 pb-4 pe-3 m-0">
       <?php while ($service = mysqli_fetch_array($service_details)) {  ?>
      <div class="col-12 webly-service mb-3">
        <h5><?php echo $service['service']; ?></h5>
        <p><?php echo $service['description']; ?></p>
        <a href="#contact" class="e-enquiry">Enquiry</a>
    </div>
  <?php } ?>
    </div>
  </div>
</section>
<?php } ?>
<!--======================================================================================================================-->
<div class="share-fixed text-center rounded-circle">
<a href="#shareQRcode" role="button" class="d-flex justify-content-center align-items-center" data-bs-toggle="modal"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-share" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <circle cx="6" cy="12" r="3" />
  <circle cx="18" cy="6" r="3" />
  <circle cx="18" cy="18" r="3" />
  <line x1="8.7" y1="10.7" x2="15.3" y2="7.3" />
  <line x1="8.7" y1="13.3" x2="15.3" y2="16.7" />
</svg></a>  
</div>
</div>

<footer id="footer">
  <div class="containerz">
    <div class=" ps-3 pt-4 pb-4 pe-3 m-0">
      <div class="d-flex justify-content-around bd-highlight">
        <div class="ftr-menu">
          <a href="#header"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <polyline points="5 12 3 12 12 3 21 12 19 12" />
  <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
  <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
</svg><span>Home</span></a>
        </div>
        <div class="ftr-menu">
          <a href="#webly-products"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-package" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3" />
  <line x1="12" y1="12" x2="20" y2="7.5" />
  <line x1="12" y1="12" x2="12" y2="21" />
  <line x1="12" y1="12" x2="4" y2="7.5" />
  <line x1="16" y1="5.25" x2="8" y2="9.75" />
</svg><span>Products</span></a>
        </div>
        <div class="ftr-menu">
          <a href="#webly-payments"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-wallet" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <path d="M17 8v-3a1 1 0 0 0 -1 -1h-10a2 2 0 0 0 0 4h12a1 1 0 0 1 1 1v3m0 4v3a1 1 0 0 1 -1 1h-12a2 2 0 0 1 -2 -2v-12" />
  <path d="M20 12v4h-4a2 2 0 0 1 0 -4h4" />
</svg><span>Payment</span></a>
        </div>
        <div class="ftr-menu">
          <a href="#contact"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-send" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <line x1="10" y1="14" x2="21" y2="3" />
  <path d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5" />
</svg><span>Enquiry</span></a>
        </div>
        <div class="btn-group dropup ftr-menu">
        <a href="#" data-bs-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-menu-2" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <line x1="4" y1="6" x2="20" y2="6" />
  <line x1="4" y1="12" x2="20" y2="12" />
  <line x1="4" y1="18" x2="20" y2="18" />
</svg><span>Menu</span></a>
        <div class="dropdown-menu">
            <a href="#webly-payments" class="dropdown-item">Payments</a>
      <a href="#webly-achievements" class="dropdown-item">Achievements</a>
            <a href="#webly-services" class="dropdown-item">Services</a>
            <a href="#webly-education" class="dropdown-item">Education</a>
      <a href="#hi-gallery" class="dropdown-item">Gallery</a>
            <a href="#webly-testimonials" class="dropdown-item">Testimonials</a>
        </div>
    </div>
      </div>
    </div>
</footer><!-- End Footer -->
<script src="https://hiconnect.co.in/t3/js/copy/clipboard.min.js"></script>
<script src="https://hiconnect.co.in/t3/js/copy/demos.js"></script>
<!--<script src="js/copy/snippets.js"></script>-->
<script src="https://hiconnect.co.in/t3/js/copy/snippet-full.js"></script>
<script src="https://hiconnect.co.in/t3/js/copy/tooltips.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>                
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
<!--
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>AOS.init();</script>

</body>
<?php } ?>
</html>

<script>
   function copylink() {
        /* Get the text field */
        var copyText = document.getElementById("payment_dt").value;
        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */

        /* Copy the text inside the text field */
        navigator.clipboard.writeText(copyText.value);
        
        /* Alert the copied text */
         //swal('Copied the text: ' , copyText.value, 'success');
        var tooltip = document.getElementById("myTooltip");
        tooltip.innerHTML = "Copied: " + copyText.value;
      }

      function copyupi() {
        /* Get the text field */
        var copyText = document.getElementById("upiid").value;
        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */

        /* Copy the text inside the text field */
        navigator.clipboard.writeText(copyText.value);
        
        /* Alert the copied text */
        // swal('Copied the text: ' , copyText.value, 'success');
      }

       // User-defined function to share some message on WhatsApp   
    function share_whatsapp(fullurl) {
        // collet the user input   
       var number = $("input[id=Whatsapp]").val(); 
        var len = number.toString().length;
      // JavaScript function to open URL in new window 
      if (len>4) {
        window.open( "https://wa.me/"+number+"/?text=Follow me on this link \n\n"+fullurl, '_blank');
      } else {
        window.open( "https://wa.me/send?text=Follow me on this link \n\n" + fullurl, '_blank');  
      } 
    }   

     // User-defined function to share some message on email   
    function share_email(emailbody) {
        // collet the user input   
       var email_id = $("input[id=email_input]").val(); 
       var subject = "Follow me on this link";
      // JavaScript function to open URL in new window 
      if (email_id) {
         window.location = 'mailto:' + email_id + '?subject=' + subject + '&body=' +   emailbody;
       // window.open( "https://wa.me/"+number+"/?text="+fullurl, '_blank');
      }
      /* else {
        window.open( "https://wa.me/send?text=" + fullurl, '_blank');  
      } */
    }   

     // User-defined function to share some sms
    function share_sms(url) {
        // collet the user input 
        var userAgent = navigator.userAgent || navigator.vendor || window.opera;  
       var phonenumber = $("input[id=sms_input]").val();
       var body =  "Follow me on this link "+url;
        var len = phonenumber.toString().length;
      // JavaScript function to open URL in new window 
      if (len>4) {
         // Windows Phone must come first because its UA also contains "Android"
        if (/windows phone/i.test(userAgent)) {
           window.open ("sms:"+phonenumber+"?body=" +body,"_system");
        }

        if (/android/i.test(userAgent)) {
            window.open ("sms:"+phonenumber+"?body=" +body,"_system");
            //window.location = 'sms:' + phonenumber + '?body=' + body;
        }

        // iOS detection from: http://stackoverflow.com/a/9039885/177710
        if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) {
           window.open ("sms:"+phonenumber+"&body=" +body,"_system");
        }

      }
    }   
      </script>
