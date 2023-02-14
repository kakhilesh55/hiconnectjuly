<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Shopping cart</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
rel="stylesheet" id="bootstrap-css">
</head>
<body>

<div class="container">

<button class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal" 
onclick="javascript:opencart()" >
    <span>
      Cart ( <span class="cartcount"><?php echo count($this->cart->contents());  ?></span> )
    </span>
</button>
</div>


<div class="container catalog-grid">
<div class="row">
      <?php 
      if(isset($products) && is_array($products) && count($products)){
      $i=1;
      foreach ($products as $key => $data) { 
      ?>
        <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="tile">
            <div class="price-label price<?php echo $data['id'] ?>" 
rel="<?php echo $data['price'] ?>">INR <?php echo $data['price'] ?></div>
            <img class="image<?php echo $data['id'] ?>" rel="<?php echo $data['image'] ?>" 
src="<?php echo base_url(); ?>/images/<?php echo $data['image'] ?>" 
alt="<?php echo $data['id'] ?>">
            <span class="tile-overlay"></span>
          <div class="footer">
            <p class="name<?php echo $data['id'] ?>" 
rel="<?php echo $data['id'] ?>"><?php echo $data['name'] ?></p>
            <button class="btn btn-primary" 
onclick="javascript:addtocart(<?php echo $data['id'] ?>)">Add to Cart</button>
          </div>
        </div>
      </div>
      <?php
        $i++;
          } }
        ?>
</div>
</div>


<script type="text/javascript">
    function addtocart(p_id)
    {
        var price = $('.price'+p_id).attr('rel');
        alert(price);
        var image = $('.image'+p_id).attr('rel');
        var name  = $('.name'+p_id).text();
        var id    = $('.name'+p_id).attr('rel');
            $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('welcome/add');?>",
                    data: "id="+id+"&image="+image+"&name="+name+"&price="+price,
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
                  $(".displaycontent").html(response);
                  }
              });
  }

</script>

<div class="modal fade bs-example-modal-lg displaycontent" id="exampleModal" tabindex="-1" >

</body>
</html>