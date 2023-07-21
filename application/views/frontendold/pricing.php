<div class="top-space"></div><script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
rel="stylesheet" id="bootstrap-css">-->
    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container col-xl-9" data-aos="fade-up">
	<div class="pricing-header-wrapper text-center">
	<h1>Subscription plans</h1>
	<p class="subheading">
	Don't miss out on this <strong>risk-free</strong> opportunity - try it for 30 days and get <strong>your money back</strong> if it's not for you.
	<!--Choose the subscription that works for 
	<strong>you</strong>
	 or your 
	 <strong>team/business</strong>.<br>If you have any questions, email us at 
	 <a href="mailto:support@hiconnect.com" class="bold-link">support@hiconnect.com</a>-->
</p>
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







					<div class="full-black team">Per<br>Year</div>
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
                    <span>1</span> What happens after I sign up for a paid subscription?
                  </button>
                </h3>
                <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                   Once you sign up for a paid subscription, you will gain access to all of the features and benefits of our digital business card platform. This includes the ability to create and customize your digital business card, manage leads, and easily share your card with others.
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                    <i class="bi bi-question-circle question-icon"></i>
                    <span>2</span> What is your refund policy?
                </h3>
                <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                     We offer a 30-day money-back guarantee for all paid subscriptions. If for any reason you are not satisfied with our service within the first 30 days of your subscription, you can request a full refund. After 30 days, we do not offer refunds.
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                    <i class="bi bi-question-circle question-icon"></i>
                    <span>3</span> How do I cancel my subscription?
                  </button>
                </h3>
                <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                     If you wish to cancel your subscription, simply log in to your account and navigate to the "Renewals & Billing" section. From there, you can choose to cancel your subscription. Please note that if you cancel your subscription, you will lose access to all of the features and benefits of our digital business card platform.
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-4">
                    <i class="bi bi-question-circle question-icon"></i>
                   <span>4</span> Will I be charged if I cancel my subscription?
                  </button>
                </h3>
                <div id="faq-content-4" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    <i class="bi bi-question-circle question-icon"></i>
                    No, you will not be charged if you cancel your subscription before the end of your billing cycle. However, please note that we do not offer prorated refunds for unused portions of your subscription.
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-5">
                    <i class="bi bi-question-circle question-icon"></i>
                     <span>5</span> How long does it take to process a refund?
                  </button>
                </h3>
                <div id="faq-content-5" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                   Refunds are typically processed within 5-7 business days from the date of your refund request. However, it may take longer for the refund to appear on your credit card or bank statement, depending on your financial institution.
                  </div>
                </div>
              </div><!-- # Faq item-->
			  
			  <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-6">
                    <i class="bi bi-question-circle question-icon"></i>
                     <span>6</span> Can I switch to a different subscription plan?
                  </button>
                </h3>
                <div id="faq-content-6" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                   Yes, you can upgrade or downgrade your subscription plan at any time. Simply log in to your account and navigate to the "Renewals & Billing" section. From there, you can choose to upgrade or downgrade your subscription plan. Please note that if you upgrade your plan, you will be charged the difference in price between your current plan and the new plan. If you downgrade your plan, you will not receive a refund for the difference in price.
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

