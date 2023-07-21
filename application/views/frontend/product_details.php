<div class="top-space"></div><div id="wrapper">

<section id="content">
<div class="container col-xl-9">
<div class="row">
<div class="col-md-12">
<div class="row">
  <div class="col-md-6 col-sm-12 col-xs-12 product-viewer clearfix">
  <section id="product-zzoomz" class="pt-0">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
<script src="<?php echo base_url()?>products1/jquery.exzoom.js"></script>
<link href="<?php echo base_url()?>products1/jquery.exzoom.css" rel="stylesheet" type="text/css"/>

<script type="text/javascript">

    $('.containerz').imagesLoaded( function() {
  $("#exzoom").exzoom({
        autoPlay: false,
    });
  $("#exzoom").removeClass('hidden')
});

</script>

 <div class="container containerz">
<div class="exzoom hidden" id="exzoom">
    <div class="exzoom_img_box">

    <?php
   
    
    
    ?>
            <ul class='exzoom_img_ul'>
                <?php 
             
                foreach($product_img as $img)
                {
                    ?>
            <li><img  src="<?php echo base_url()?>uploads/manage_products/<?php echo $img['file_name'];?>" /></li>
           <?php
                }
                ?>
        </ul>
    </div>
    <div class="exzoom_nav"></div>
    <p class="exzoom_btn">
        <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
        <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
    </p>
</div>
</div> 
	 </section>
  </div>
<div class="col-md-6 col-sm-12 col-xs-12 product-viewer clearfix">
                                 
<section id="hi-detailed"  class="pt-0">
   <div class="hi-detailed">
      <div class="hi-purchase">
         <h2 class="name<?php echo $products->id; ?>" 
rel="<?php echo $products->id; ?>"><?php echo $products->product_name;?></h2>
		 <div class="prdt-price prdt-not d-flex">
		 <div>
     <img style="display:none;" class="imagee<?php echo  $products->id; ?>" src="<?php echo base_url()?>uploads/manage_products/<?php echo $products->image;?>"  rel="<?php echo $products->image; ?>" name="image" />
	  <h5 class="hi-add-prce price<?php echo $products->id; ?>"   rel="<?php echo $products->sale_price;?>">&#8377;<?php echo $products->sale_price;?> <span class="hi-mrp">MRP</span><span class="lineth">&#8377;<?php echo $products->regular_price;?></span> <span class="hic-discount"> <?php $d=$products->regular_price-$products->sale_price;
      if($d==0)
      {
          $disct=0.00; 
      }
      else
      {
      $ds=$d/$products->regular_price;
      $disct=$ds*100;
      }
     echo round($disct); ?>% Off</span></h5>
	   <span style="display:none;" class="hi-add-price1 price1<?php echo $products->id; ?>" 
rel="<?php echo $products->regular_price;  ?>"> <?php echo $products->regular_price;?></span>
<p style="color:#2c4bff">Inclusive of all taxes</p>
<p>Quantity:<?php echo $products->units;?> Pcs</p>
<p>Dimension: <?php echo $products->length;?>x<?php echo $products->breadth;?>x<?php echo $products->height;?></p>
<p>Colour: <?php echo $products->colour;?></p>
<p class="free-delvy"><i class="ri-truck-line"></i> Free Delivery</p>
<p><?php echo $products->short_description;?></p>
	  </div></div><br><br>
	  
      <div class="d-flex just-md">
         <!--<button class="btn-minus"> – </button>
         <div class="hi-inptp"><input type="text" class="hi-nos" value="2"></div>
      // echo base_url()."/Products/onbord/".$products->id ?>/product
         <button class="btn-plus"> + </button>-->
		 <!--<a onclick="javascript:addtocart(<?php echo $products->id; ?>)" href="#" class="hi-atcr btn-red btn-hi bx-sh-n btn-sm-red m-0"><div id="spinner name<?php echo $data['id'] ?>" class="spinner-border namee<?php echo $data['id'] ?>" role="status" style="display:none" rel="<?php echo $data['id'] ?>">
  <span class="sr-only"></span>
</div>Add To Cart</a>-->
<button type="button" class="hi-add-cart align-items-center" data-label="Add to Cart" onclick="javascript:addtocart(<?php echo $products->id ?>)"> 
<div id="spinner name<?php echo $products->id ?>" class="spinner-border namee<?php echo $products->id ?>" role="status" style="display:none" rel="<?php echo $products->id ?>">
  <span class="sr-only"></span>
</div>
        <span class="hi-add-txt add<?php echo $products->id ?>" rel="<?php echo $products->id ?>">ADD </span>     
      <span class="hi-add-price price<?php echo $products->id ?>" 
rel="<?php echo $data['sale_price'] ?>"> </span>
<svg class="_1KOMV2 bt bt<?php echo $products->id ?>" width="16" height="16" viewBox="0 0 16 15" xmlns="http://www.w3.org/2000/svg"><path class="" d="M15.32 2.405H4.887C3 2.405 2.46.805 2.46.805L2.257.21C2.208.085 2.083 0 1.946 0H.336C.1 0-.064.24.024.46l.644 1.945L3.11 9.767c.047.137.175.23.32.23h8.418l-.493 1.958H3.768l.002.003c-.017 0-.033-.003-.05-.003-1.06 0-1.92.86-1.92 1.92s.86 1.92 1.92 1.92c.99 0 1.805-.75 1.91-1.712l5.55.076c.12.922.91 1.636 1.867 1.636 1.04 0 1.885-.844 1.885-1.885 0-.866-.584-1.593-1.38-1.814l2.423-8.832c.12-.433-.206-.86-.655-.86" fill="#fff"></path></svg>
      </button>
      </div>
               <p style="display:none;" class="price-tag des<?php echo $products->id; ?>"  rel="<?php echo $products->short_description; ?>"><?php echo $products->short_description;?></p>  

      </div>
	  <!--
      <div class="hi-more-details">
         <h4>Description</h4>
         <p class="price-tag des<?php echo $products->id; ?>"  rel="<?php echo $products->long_description; ?>"><?php echo $products->long_description;?></p>  
      </div>
	  -->
      <!-- <div class="hi-share-social pt-4">
         <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
         <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
         <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
         <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
         <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
       </div> -->

</div>
</section>                      
</div>
</div>
</div>
</div>
</div>
</section>




<section id="tabs" class="tabs col-xl-9 container pt-0">
      <div class="container aos-init aos-animate hi-product-tabs" data-aos="fade-up">

        <ul class="nav nav-tabs d-flex tablee">
          <li class="nav-item">
            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-1">
              <i class="ri-article-line"></i>
              <h4 class="d-none d-lg-block">Product Description</h4>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-2">
              <i class="ri-truck-line"></i>
              <h4 class="d-none d-lg-block">Shipping & Returns</h4>
            </a>
          </li>
        </ul>

        <div class="tab-content">
          <div class="tab-pane active show hi-tabs" id="tab-1">
            <div class="row">
              <div class="col-lg-12 order-2 order-lg-1 mt-3 mt-lg-0 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
			  <div class="vdo-tab d-flex justify-content-center">
			  <video id="ccc" class="hic-vdo" autoplay="true" muted="true" preload="auto" loop=""> <source src="<?php echo $products->video;?>" type="video/webm"></video>
			  </div>
                <div class="tab-infos mb-5">
                    <iframe width="420" height="345" src="<?php echo $products->video;?>?autoplay=1&mute=1" alt="https://youtu.be/PCwL3-hkKrg">
</iframe>

                  <p><?php echo $products->long_description;?></p>
                </div>
                <div style="display:none;" class="price-tag des<?php echo $data['id'] ?>" 
rel="<?php echo $products->long_description; ?>"><?php echo $products->long_description;?></div>
                 </div>
              </div>
            </div>
          </div>


          <div class="tab-pane hi-tabs" id="tab-2">
            <div class="row">
              <div class="col-lg-12 order-2 order-lg-1 mt-3 mt-lg-0 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                <div class="tab-infos mb-5">
                  <h2>Share Easily</h2>
                  <p>Instantly share your info with a tap, scan, or send to anyone through WhatsApp, text, email, and more.</p>
                </div>
              </div>
            </div>
            </div>
			
			
          </div>
		  </div>
    </section>






</div>



















			
	    <script type="text/javascript">
    function addtocart(p_id)
    {
       var spinn   = $('.namee'+p_id).show();
       var bt   = $('.bt'+p_id).hide();
        var bt   = $('.add'+p_id).hide();
        var price = $('.price'+p_id).attr('rel');
     
        var image = $('.imagee'+p_id).attr('rel');
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
                      
        var spinn   = $('.namee'+p_id).hide();
         var bt   = $('.add'+p_id).show();
          var bt   = $('.bt'+p_id).show();
                       $(".cartcount").text(response);
                       
                       
                       
        
          //});
   
      


                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
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
              window.location="<?php echo base_url();?>/welcome/opencart";
                  }
              });
  }

</script>












			
			
