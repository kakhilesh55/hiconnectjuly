
<br><br><br>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" -->
rel="stylesheet" id="bootstrap-css">
    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container col-xl-9" data-aos="fade-up">
	<div class="pricing-header-wrapper text-center">
	<h1>Subscription plans</h1>
	<p class="subheading">Choose the subscription that works for 
	<strong>you</strong>
	 or your 
	 <strong>team/business</strong>.<br>If you have any questions, email us at 
	 <a href="mailto:support@hiconnect.com" class="bold-link">support@hiconnect.com</a>
	 .</p>
</div>
        <div class="row">
		<?php /*<div class="col-lg-4 col-md-6">
            <div class="box" data-aos="fade-up" data-aos-delay="100">
			<div class="pricing-card-header">
				<div class="pricing-plan-name">Free</div>
				<div class="pricing-plan-type">FOR Individuals</div>
			</div>
			<div class="pricing-card-price">
				<div class="price-per-month team">
					<div class="price-tag">$0.00</div>
					<div class="full-black team">per card<br>per month</div>
				</div>
					<?php /*<div class="trialz">30-day free trial included<br>3 card minimum, billed annually<br></div> ?>
			</div>
			<div class="pricing-card-button">
				<a href="<?php echo $backend_url."auth/registration?package=".$free_package_id;?>" target="_blank" class="button light w-button">Get Started</a>
				</div>
    <?php /*onboarding.php?package=<?php echo $free_package_id;?>"?>
				
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
          </div><!-- ===========================-->*/?>

<?php foreach($packages as $package)
    {
       ?>
		  <div class="col-lg-4 col-md-6 pricebox">
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
          </div><!-- ===========================-->
        <?php } 
        /* ?>
		  <div class="col-lg-4 col-md-6">
            <div class="box" data-aos="fade-up" data-aos-delay="100">
			<div class="pricing-card-header">
				<div class="pricing-plan-name">Premium</div>
				<div class="pricing-plan-type">FOR Individuals</div>
			</div>
			<div class="pricing-card-price">
				<div class="price-per-month team">
					<div class="price-tag">$2.99</div>
					<div class="full-black team">per card<br>per month</div>
				</div>
					<div class="trialz">30-day free trial included<br>3 card minimum, billed annually<br></div>
			</div>
			<div class="pricing-card-button">
				<a href="onboarding.php" target="_blank" class="button w-button">Start 7-day free trial</a>
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
          </div><!-- ===========================-->
          
<?php */?>
         

        </div>

      </div>
    </section><!-- End Pricing Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq pt-0">
      <div class="container col-xl-9" data-aos="fade-up">

        <div class="section-header">
          <h2>Frequently Asked Questions</h2>

        </div>
    
            <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="200">
          <div class="col-lg-12">

            <div class="accordion accordion-flush" id="faqlist">

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                    <i class="bi bi-question-circle question-icon"></i>
                    Is Hi Connect available for free?
                  </button>
                </h3>
                <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    Yes, absolutely! With Hi Connect you can create free basic accounts for a lifetime.
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                    <i class="bi bi-question-circle question-icon"></i>
                    How to create free digital business cards? 
                  </button>
                </h3>
                <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                     1. Sign up with Hi Connect to create your FREE digital business card.
                   <br>         
2. Customize your digital business card to add the details.
<br>
3. Share your digital business card using QR Code, unique URL, and more to enjoy easy networking.
<br>
4. You can also upgrade your account to get access to more features and get a Hi Connect SMART CARD.  
 </i>
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                    <i class="bi bi-question-circle question-icon"></i>
                     Who is it for?
                  </button>
                </h3>
                <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                     Hi Connect is for companies, professionals, and people that required a digital, real-time solution for staying in touch with the ever-changing contact details of external customers, suppliers, and business relations.
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-4">
                    <i class="bi bi-question-circle question-icon"></i>
                    What phones can my Hi Connect product and Hi Connect QR code share too?
                  </button>
                </h3>
                <div id="faq-content-4" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    <i class="bi bi-question-circle question-icon"></i>
                    Hi Connect products use NFC technology and can share with any iPhone XR, XS, 11, 12, 13, or SE (2nd generation) with just a single tap.
          <br>
          Hi Connect products can also share with most Androids on the market today, as long as the Android has NFC turned on.
<br>  
Hi Connect QR codes can share with all iPhones and every Android that can read QR codes. Hi Connect QR Codes are very consistent, have unlimited scans, and can be customized.
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-5">
                    <i class="bi bi-question-circle question-icon"></i>
                     Can a Hi Connect card be sent to people that do not have the app installed?
                  </button>
                </h3>
                <div id="faq-content-5" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                   Yes. That’s why we call it easy networking. Hi Connect cards can be shared with anyone, regardless of whether they are a Hi Connect user themselves. Your profile opens in their browser, which every smartphone has.
                  </div>
                </div>
              </div><!-- # Faq item-->

            </div>

          </div>
        </div>
    

      </div>
    </section><!-- End Frequently Asked Questions Section -->

    <script type="text/javascript">
    function addtocart(p_id)
    {
  
        var price = $('.price'+p_id).attr('rel');
        var image = $('.image'+p_id).attr('rel');
       var price1 = $('.price1'+p_id).attr('rel');
     var des = $('.des'+p_id).attr('rel');
        var name  = $('.name'+p_id).text();
        var id    = $('.name'+p_id).attr('rel');
        var qty   = 1;
       
            $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('welcome/add');?>",
                    data: "id="+id+"&image="+image+"&name="+name+"&price="+price+"&qty="+qty+"&price1="+price1+"&des="+des,
                    success: function (response) {
                       $(".cartcount").text(response);
                    }
                });
    }


  function opencart()
  {
      $.ajax({
                  type: "POST",
                  url: "<?php echo site_url('welcome/opencart');?>",
                  data: "",
                  success: function (response) {
            //  redirect('frontend/onbording');
              window.location="welcome/opencart";
                  }
              });
  }

</script>

