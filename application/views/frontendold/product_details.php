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
            <li><img  src="<?php echo base_url()?>uploads/manage_products/<?php echo $products->image;?>" /></li>
            <li><img src="<?php echo base_url()?>uploads/manage_products/<?php echo $products->image;?>"  /></li>
            <li><img src="<?php echo base_url()?>uploads/manage_products/<?php echo $products->image;?>" /></li>
            <li><img src="<?php echo base_url()?>uploads/manage_products/<?php echo $products->image;?>" /></li>
            <li><img src="<?php echo base_url()?>uploads/manage_products/<?php echo $products->image;?>"  /></li>
            <li><img src="<?php echo base_url()?>uploads/manage_products/<?php echo $products->image;?>"  /></li>
            <li><img src="<?php echo base_url()?>uploads/manage_products/<?php echo $products->image;?>"  /></li>
            <li><img src="<?php echo base_url()?>uploads/manage_products/<?php echo $products->image;?>"  /></li>
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
		 <div class="prdt-price d-flex">
     <img style="display:none;" class="imagee<?php echo  $products->id; ?>" src="<?php echo base_url()?>uploads/manage_products/<?php echo $products->image;?>"  rel="<?php echo $products->image; ?>" name="image" />
	  <h5 class="hi-add-price price<?php echo $products->id; ?>"   rel="<?php echo $products->sale_price;?>"><?php echo $products->sale_price;?></h5>
	   <span style="display:none;" class="hi-add-price1 price1<?php echo $products->id; ?>" 
rel="<?php echo $products->regular_price;  ?>"> <?php echo $products->regular_price;?></span>
	  </div><br><br>
	  
      <div class="d-flex just-md">
         <!--<button class="btn-minus"> – </button>
         <div class="hi-inptp"><input type="text" class="hi-nos" value="2"></div>
      // echo base_url()."/Products/onbord/".$products->id ?>/product
         <button class="btn-plus"> + </button>-->
		 <a onclick="javascript:addtocart(<?php echo $products->id; ?>)" href="#" class="btn-red btn-hi bx-sh-n btn-sm-red m-0">Add To Cart</a>
      </div>
      </div>
      <div class="hi-more-details">
         <h4>Description</h4>
         <p class="price-tag des<?php echo $products->id; ?>"  rel="<?php echo $products->long_description; ?>"><?php echo $products->long_description;?></p>
         
          
      </div>
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
</div>



















			
	    <script type="text/javascript">
    function addtocart(p_id)
    {
  
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
                       $(".cartcount").text(response);
                       
                       
                       
            
           $("#result").html('<div class="alert alert-success">Successfully Added!</div>');
          window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove(); 
                });
            }, 5000);
          $('.alert .close').on("click", function(e){
                $(this).parent().fadeTo(500, 0).slideUp(500);
             });
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












			
			
