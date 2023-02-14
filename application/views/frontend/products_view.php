
<br><br>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" -->
rel="stylesheet" id="bootstrap-css">

    <section id="hi-products"> 
      <div class="container col-xl-9" data-aos="fade-up" data-aos-delay="100">
      <!--<button class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal" 
onclick="javascript:opencart()" >
    <span>
      Cart ( <span class="cartcount"><?php echo count($this->cart->contents());  ?></span> )
      
    </span>
</button>-->
	  <div class="pricing-header-wrapper text-center">
	<h1>Our products</h1>
<div class="ratingz d-flex justify-content-center align-items-start">
          <div class="starz d-flex align-items-center">
            <img src="css/images/starss.png" alt="" class="stars">
          </div>
          <div class="hi-rew d-flex align-items-center ps-4">224 Reviews</div>
        </div>
	<p>If the objective is to save your contact details into someone's phone</p>
</div>
<div class="row"> 
    
    <?php   foreach ($products as $key => $data) { 
    
      $id=$data['id'];
       ?>
    
             <div class="col-6 col-md-4 col-lg-4">
               <div class="card mb-4 text-center border-0">
                 <div class="card-img hi-product-img">
                 <a href="<?php echo base_url()."/Products/product_details_view/".$id ?>">
                   <img class="image<?php echo $data['id'] ?>" src="<?php echo base_url(); ?>uploads/manage_products/<?php echo $data['image'];?>" alt="" name="image" rel="<?php echo $data['image'] ?>" ></a>
                 </div>
                 <div class="card-body">
                 
                   <p class="name<?php echo $data['id'] ?>" 
rel="<?php echo $data['id'] ?>"><?php echo $data['product_name'] ?></p>

<button type="button" class="hi-add-cart align-items-center" data-label="Add to Cart" onclick="javascript:addtocart(<?php echo $data['id'] ?>)"> 
          <span class="hi-add-txt">Add to Cart </span>     
          <span class="hi-add-price price<?php echo $data['id'] ?>" 
rel="<?php echo $data['sale_price'] ?>"> <?php echo $data['sale_price'];?></span>
 <span style="display:none;" class="hi-add-price1 price1<?php echo $data['id'] ?>" 
rel="<?php echo $data['regular_price'] ?>"> <?php echo $data['regular_price'];?></span>
        </button>


            <div style="display:none;" class="price-tag des<?php echo $data['id'] ?>" 
rel="<?php echo $data['long_description'] ?>"><?php echo $data['long_description	'];?></div>
                 </div><!-- Card -->
               </div>
               </div>
               <?php
    }
   ?>
        
              
               
           </div>
         </div>         
        
    </section>
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


