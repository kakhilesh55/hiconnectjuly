<script type="text/javascript">
window.onload = function() {
	window.moveTo(0, 0);
	window.resizeTo(screen.availWidth, screen.availHeight);
}
</script>
<?php include('t1/includes/header.php'); 
if(!empty($user_details)) {
?>
   <body>
        <div class="page-wrapper" id="home-section">
            <div class="section-separator">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="upper">
                <div class="side-piller"></div>
                <div class="views-label"><i class="fas fa-eye"></i> Views: <b><?php echo $count; ?></b></div>
                <div class="profile-info">
                    <!-- User Profile Pic -->
                <img src="<?php if($user_details['type']==1){ echo ($user_details['user_image']!='')?$base_url.'/erp/uploads/user_images/'.$user_details['user_image']:$base_url.'/erp/uploads/user_images/default_user_img.jpg'; } else if($user_details['type']==2){ echo ($company_details['company_image']!='')?$base_url.'/erp/uploads/company_images/'.$company_details['company_image']:$base_url.'/erp/uploads/company_images/default_user_img.jpg'; }?>" class="profile-pic-img false" crossorigin="anonymous">

                <!-- User Company Name -->
                <div class="firmname"><?php echo ($user_details['type']==2)?$company_details['company_name']:$user_details['name']; ?></div>

                <div class="company-separator"></div>

                <!-- User First Name and Last Name -->
                <div class="name"> <?php echo ($user_details['type']==2)?$company_details['description']:$user_details['profession'].','.$company_details['company_name']; ?> </div>
                
                </div>
            </div>
            <div class="contact-info-container">
                <div class="contact-info-wrapper">
                    <a class="contact-piller-button call" target="_blank" href="tel:<?php echo isset($contact_details['mob1'])?$contact_details['mob1']:$user_details['phone'];?>">
                        <i class="fas fa-phone fa-flip-horizontal"></i>
                    </a>
                    <div class="contact-info">
                        <div style="margin-bottom: 5px;"><a target="_blank" href="tel:<?php echo isset($contact_details['mob1'])?$contact_details['mob1']:$user_details['phone'];?>"><?php echo isset($contact_details['mob1'])?$contact_details['mob1']:$user_details['phone'];?></a></div>
                        <div><a target="_blank" href="tel:<?php echo isset($contact_details['mob2'])?$contact_details['mob2']:'';?>"><?php echo isset($contact_details['mob2'])?$contact_details['mob2']:'';?></a></div>
                    </div>
                </div>
                
                
                            <div class="contact-info-wrapper">
                                <a class="contact-piller-button address" target="_blank" href="<?php echo isset($user_details['google_map_link'])?$user_details['google_map_link']:'';?>" >
                                    <i class="fas fa-map-marker-alt"></i>
                                </a>
                                <div class="contact-info">
                                    <a target="_blank" href="<?php echo isset($user_details['google_map_link'])?$user_details['google_map_link']:'';?>"><?php echo isset($user_details['address'])?$user_details['address']:'';?></a>
                                </div>
                            </div>
                            
                <div class="contact-info-wrapper">
                    <a class="contact-piller-button whatsapp" target="_blank" href="https://wa.me/<?php echo isset($contact_details['whatsapp1'])?$contact_details['whatsapp1']:'';?>?text=Got%20reference%20from%20your%20Digital%20vCard.%20Want%20to%20know%20more%20details.">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <div class="contact-info">
                        <div style="margin-bottom: 5px;">
                            <a target="_blank" href="https://wa.me/<?php echo isset($contact_details['whatsapp1'])?$contact_details['whatsapp1']:$user_details['phone'];?>?text=Got%20reference%20from%20your%20Digital%20vCard.%20Want%20to%20know%20more%20details."><?php echo isset($contact_details['whatsapp1'])?$contact_details['whatsapp1']:$user_details['phone'];?></a>
                        </div>
                        <div>
                             <a target="_blank" href="https://wa.me/<?php echo isset($contact_details['whatsapp2'])?$contact_details['whatsapp2']:'';?>?text=Got%20reference%20from%20your%20Digital%20vCard.%20Want%20to%20know%20more%20details."><?php echo isset($contact_details['whatsapp1'])?$contact_details['whatsapp2']:'';?></a>
                        </div>
                    </div>
                </div>
                <div class="contact-info-wrapper">
                    <a class="contact-piller-button mail" target="_blank" href="mailto:<?php echo isset($contact_details['email'])?$contact_details['email']:$user_details['email'];?>">
                        <i class="fas fa-envelope"></i>
                    </a>
                    <div class="contact-info">
                        
                                <div style="margin-bottom: 5px;"><a target="_blank" href="mailto:<?php echo isset($contact_details['email'])?$contact_details['email']:$user_details['email'];?>"><?php echo isset($contact_details['email'])?$contact_details['email']:$user_details['email'];?></a></div>
                                
                    </div>
                </div>
                
            </div>
            <div class="lower">
                <div class="side-piller"></div>
                <div class="share-options">
                    <div class="whatsapp-input">
                        <div class="input-wrapper">
                            <input type="tel" id="whatsapp-input" class="input" placeholder="Enter whatsapp number" />
                        </div>
                         <a class="whatsapp-button"
                            target="_blank"
                            href="https://wa.me/<?php echo $contact_details['whatsapp1'];?>?text='<?php echo $base_url.$card_id;?>'"
                            id="share-on-whatsapp-button"
                            data-fullurl=<?php echo $base_url.$card_id;?>>
                            <i class="fab fa-whatsapp"></i>Share on Whatsapp
                        </a>
                    </div>

                    <div class="p-10"></div>

                    <div class="shadow-buttons">
                        <form action="" method="POST" class="form-inline shadow-button"> 
                            <button type="submit" name="download_vcard" id="download_vcard" class="vcard"> 
                                <a style="color: #fff;">
                                    <i class="fas fa-download shadow-button-icon"></i>Add to Phone Book
                                </a>
                            </button>
                        </form>
                        <a class="shadow-button" id="share-button"><i class="fas fa-share-alt shadow-button-icon"></i>Share</a>
                        <a class="shadow-button save-card-button"><i class="fas fa-cloud-download-alt shadow-button-icon"></i>Save Card</a>
                    </div>

                    <div class="p-10"></div>

                    <ul class="inprofile share-buttons align-center">
                    <?php while ($social_links = mysqli_fetch_array($social_link_users)) {   ?>
                        <li class="share-button">
                            <a target="_blank" href="<?php echo $social_links['link'];?>" ><i class="<?php echo $social_links['social_class'];?>"></i></a>
                        </li>
                    <?php } ?>   
                       
                    </ul>

                    <div class="p-20"></div>
                </div>
            </div>
        </div>
        
        <div class="section-container" id="about-us-section">
            <div class="section-separator">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
            <h2 class="section-header"><?php echo ($user_details['type']==2)?'About Us':'About';?></h2>
            <table class="about-us-table">
                <tbody>
                    <tr>
                        <td class="table-row-label">
                            <h3 class="table-row-label-text"> <?php echo ($user_details['type']==2)?'Company Name':'Name';?></h3><b class="table-row-label-separator">:</b>
                        <td>
                        <td class="table-row-value">
                            <?php echo ($user_details['type']==2)?$company_details['company_name']:$user_details['name']; ?>
                        <td>
                    </tr>
                   <?php /* <tr>
                            <td class="table-row-label">
                                <h3 class="table-row-label-text">Category</h3><b class="table-row-label-separator">:</b>
                            <td>
                            <td class="table-row-value">
                                Industrial
                            <td>
                        </tr>*/ ?>
                    <tr>
                            <td class="table-row-label">
                                <h3 class="table-row-label-text"> <?php echo ($user_details['type']==2)?'Year of Establishment':'Profession'; ?></h3><b class="table-row-label-separator">:</b>
                            <td>
                            <td class="table-row-value">
                                <?php echo ($user_details['type']==2)?$company_details['year_start']:$user_details['profession']; ?>
                            <td>
                        </tr>
                    <tr>
                            <td class="table-row-label">
                                <h3 class="table-row-label-text"> <?php echo ($user_details['type']==2)?'Nature Of Business':'About';?></h3><b class="table-row-label-separator">:</b>
                            <td>
                            <td class="table-row-value">
                                <?php  if($user_details['type']==2) { echo $company_details['business_nature']!=''?$company_details['business_nature']:''; }else{ echo $user_details['about']!=''?$user_details['about']:''; } ?>
                            <td>
                        </tr>
                </tbody>
            </table>
          
            
        </div>
        <?php if($product_count>0){ ?>
        <div class="section-container" id="products-services-section">
                <div class="section-separator">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <h2 class="section-header">PRODUCTS</h2>
                <div class="p-10"></div>
                
<div>
<?php while ($product = mysqli_fetch_array($product_details)) {  ?>

    <div class="card">
        <h3 class="card-title"><?php echo $product['product_name']; ?></h3>
        <?php /*<div class="product-download-wrapper">
            <button onclick="downloadImage(this, 'gasco-tec-engineering', '', '../vcard-bucket.s3.us-east-2.amazonaws.com/A7/5406/1632068965855.jpeg')">
                <span id="download-label"><i class="fa fa-download"></i> Download Product Card</span>
                <span id="downloading">Downloading...</span>
            </button>
        </div>*/ ?>
         <div class="product-description"><p><?php echo $product['description']; ?></p></div>
        <img onclick="openImageModal(this)" alt="" src="<?php echo $base_url;?>erp/uploads/product_images/<?php echo ($product['product_image'])?$product['product_image']:'default_product_image.png'; ?>" style="width:100%;margin-bottom: 15px;">
        <div class="product-enquiry-section">
            <div class="product-price">
                <?php echo $product['price']; ?>
            </div>
            <a href="https://wa.me/<?php echo isset($contact_details['mob1'])?$contact_details['mob1']:$user_details['phone'];?>?text=Hi,%20I%20am%20interested%20in%20your%20product/service.%20Please%20provide%20more%20details." target="blank" class="product-enquiry-btn">Enquiry</a>
        </div>
    </div>
    
 <?php  } ?> 

</div>

                <div class="section-close"></div>

            </div>
<?php } 

if($services_count>0){ ?>
        <div class="section-container" id="products-services-section">
                <div class="section-separator">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <h2 class="section-header">SERVICES</h2>
                <div class="p-10"></div>
                
<div>
<?php while ($service = mysqli_fetch_array($service_details)) {  ?>

    <div class="card">
        <h3 class="card-title"><?php echo $service['service']; ?></h3>
         <div class="product-description"><p><?php echo $service['description']; ?></p></div>
    </div>
    
 <?php  } ?> 

</div>

                <div class="section-close"></div>

            </div>
<?php } 

if($payment_account>0 || $payment_wallet>0) {
?>

        <div class="section-container" id="payment-options-section">
                <div class="section-separator">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <h2 class="section-header">Payment</h2>
                <div class="p-10"></div>
                
    <div>
       
     <table class="about-us-table">
        <tbody>  
          <?php if($payment_wallet>0)
            { ?>
                <th colspan="2"><h3>Wallets</h3></th>
            <?php }

        while ($payment_wallet = mysqli_fetch_array($wallet_payment_details)) {
            $payment_type = $payment_wallet['payment_type'];
            $app_id = $payment_wallet['app_id'];
            $app_name = mysqli_fetch_assoc(mysqli_query($con, "select app_name from payment_app where app_id='$app_id'"));
            if($payment_type=='Wallet')
            { ?>
                <tr>
                    <td class="table-row-label">
                        <h3 class="table-row-label-text"><?php echo ucwords($app_name['app_name']);?> Number</h3><b class="table-row-label-separator">:</b>
                    </td>
                    <td class="table-row-value">
                    <?php echo $payment_wallet['handle'];?>
                    </td>
                </tr>
            <?php }
        } ?>
    
        </tbody>
    </table>
    <table class="about-us-table">
        <tbody>  
            <?php
            if($payment_account>0)
            { ?>
                <th colspan="2"><h3>Account Details:</h3></th>
            <?php }

            while ($payment = mysqli_fetch_array($account_payment_details)) {
            $payment_type = $payment['payment_type'];
            
           // $app_name = mysqli_fetch_assoc(mysqli_query($con, "select app_name from payment_app where app_id=$payment['app_id']"));
            if($payment_type=='Account')
            { ?>
           
            <tr>
                <td class="table-row-label">
                    <h3 class="table-row-label-text">Account No:</h3><b class="table-row-label-separator">:</b>
                </td>
                <td class="table-row-value">
                <?php echo $payment['account_no'];?>
                </td>
            </tr>
             <tr>
                <td class="table-row-label">
                    <h3 class="table-row-label-text">IFSC Code</h3><b class="table-row-label-separator">:</b>
                </td>
                <td class="table-row-value">
                <?php echo $payment['ifsc'];?>
                </td>
            </tr>
             <tr>
                <td class="table-row-label">
                    <h3 class="table-row-label-text">Bank Name</h3><b class="table-row-label-separator">:</b>
                </td>
                <td class="table-row-value">
                <?php echo $payment['bank_name'];?>
                </td>
            </tr>
             <tr>
                <td class="table-row-label">
                    <h3 class="table-row-label-text">Branch</h3><b class="table-row-label-separator">:</b>
                </td>
                <td class="table-row-value">
                <?php echo $payment['bank_branch'];?>
                </td>
            </tr>
           <tr><td colspan="2"></td></tr>
     
        <?php }
        } ?>
</tbody>
    </table>
</div>
    
            </div>

        <?php } 
if($gallery_images_count > 0) { 
        ?>
        <div class="section-container" id="gallery-section">
                <div class="section-separator">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <h2 class="section-header">Gallery</h2>
                <div class="p-10"></div>
                <div class="images-container">
                <?php while($gallery = mysqli_fetch_array($gallery_images))
                { ?>
                    <div class="image-wrapper">
                        <img onclick="openImageModal(this)" alt="Image 1" src="<?php echo $base_url;?>erp/uploads/files/<?php echo $gallery['file_name'];?>" style="width:100%">
                    </div>
                <?php } ?>
                    
                </div>
                <div class="section-close"></div>
            </div>
        <?php } 
if($testimonials_count>0){ ?>
        <div class="section-container" id="products-services-section">
                <div class="section-separator">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <h2 class="section-header">TESTIMONIALS</h2>
                <div class="p-10"></div>
                
<div>
<?php while ($testimonials = mysqli_fetch_array($testimonials_details)) {  ?>

    <div class="card">
        <h3 class="card-title"><?php echo $testimonials['message']; ?></h3>
         <div class="product-description">
            <p><?php echo $testimonials['name']; ?></p>
            <p><?php echo $testimonials['designation']; ?></p>
            <p><?php echo $testimonials['company']; ?></p>
         </div>
    </div>
    
 <?php  } ?> 

</div>

                <div class="section-close"></div>

            </div>
<?php } 

if($achievements_count>0){ ?>
        <div class="section-container" id="products-services-section">
                <div class="section-separator">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <h2 class="section-header">ACHIEVEMENTS</h2>
                <div class="p-10"></div>
                
<div>
<?php while ($achievements = mysqli_fetch_array($achievements_details)) {  ?>

    <div class="card">
        <h3 class="card-title"><?php echo $achievements['name']; ?></h3>
         <div class="product-description">
            <p><?php echo $achievements['description']; ?></p>
         </div>
    </div>
    
 <?php  } ?> 

</div>

                <div class="section-close"></div>

            </div>
<?php } 

if($education_count>0){ ?>
        <div class="section-container" id="products-services-section">
                <div class="section-separator">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <h2 class="section-header">EDUCATION</h2>
                <div class="p-10"></div>
                
<div>
<?php while ($education = mysqli_fetch_array($education_details)) {  ?>

    <div class="card">
        <h3 class="card-title"><?php echo $education['name']; ?></h3>
         <div class="product-description">
            <p><?php echo $education['university']; ?></p>
            <p><?php echo $education['start_date']; ?></p>
            <p><?php echo $education['end_date']; ?></p>
            <p><?php echo $education['description']; ?></p>
         </div>
    </div>
    
 <?php  } ?>
</div>

                <div class="section-close"></div>

            </div>
<?php } 

 if($experience_count>0){ ?>
        <div class="section-container" id="products-services-section">
                <div class="section-separator">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <h2 class="section-header">EXPERIENCE</h2>
                <div class="p-10"></div>
                
<div>
<?php while ($experiences = mysqli_fetch_array($experience_details)) {  ?>

    <div class="card">
        <h3 class="card-title"><?php echo $experiences['position']; ?></h3>
         <div class="product-description">
            <p><?php echo $experiences['company']; ?></p>
            <p><?php echo $experiences['start_date']; ?></p>
            <p><?php echo $experiences['end_date']; ?></p>
            <p><?php echo $experiences['description']; ?></p>
         </div>
    </div>
    
 <?php  } ?> 

</div>

                <div class="section-close"></div>

            </div>
<?php } 
        ?>
    
            <div class="section-container" id="enquiry-section">
                <div class="section-separator">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <h2 class="section-header">Enquiry Form</h2>
                <form class="enquiry-form" action="" method="post" id="contactform">
                    <!-- Full Name:<br/> -->
                    <input type="text" name="enquiryName" id="enquiryName" placeholder="Enter Full Name"/><br/>
                    <div class="flex">
                        <div class="enquiry-phoneNumber">
                            <!-- Phone Number:<br/> -->
                            <input type="text" name="phoneNumber" id="phoneNumber" placeholder="Enter Phone Number"/><br/>
                        </div>
                        <div class="enquiry-email">
                            <!-- Email:<br/> -->
                            <input type="text" name="email" id="email" placeholder="Enter Email"/><br/>
                        </div>
                    </div>
                    <!-- Message:<br/> -->
                    <textarea name="message" id="message" placeholder="Enter Message"></textarea><br/>
                    <input type="submit" name="submit" value="Submit">
                </form>
            </div>
            
        <div class="copyright-wrapper">
            <div class="copyright-wrapper-inner">
                © 2022 <a href="index.php" target="_blank"><b>hiconnect.co.in</b></a>
            </div>
        </div>
        <?php } ?>
        <!-- Footer Menu -->
<?php include('t1/includes/footer.php'); ?>
<style type="text/css">
    .vcard{
        background: rgb(150 150 150) !important;
        font-size: 13px;
        color: #F1F1F1;
        border: none;
    }
    .form-inline{
        margin: 0px;
    }
    button#download_vcard:hover {
        cursor: pointer;
    }
</style>


    