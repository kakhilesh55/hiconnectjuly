<?php

foreach($orderid as $order)
{
    
}

foreach($su as $to)
{
    
}

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<img src="<?php echo base_url()?>images//order-confirmed.png" style="margin-left: 32%;">
<p style="margin-left: 47%;font-size:18px">orderid:<?php echo $order['order_id'];?></p>
<p style="margin-left: 47%;font-size:18px">Total amount:<?php echo $to['k'];?></p>
<a href="https://www.shiprocket.in/shipment-tracking/" style="margin-left: 47%;font-size:18px">Track Your Order</a>
<br>
<form method="post" action="<?php echo base_url();?>Auth/login">
  <button type="submit" class="btn btn-primary" style="margin-left: 47%;">Go To Dashboard</button>
</form>