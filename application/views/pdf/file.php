 
    <table>
        <tr>
            <td><img src="<?php echo base_url('uploads/logo/logo.png');?>" width="200px" height="100px"></td>
            <td><br/><p style="text-align: right;font-size: 24px;color: #666;">INVOICE</p></td>
        </tr>
    </table>
<table style="line-height: 1.5;">
    <tr>
        <td><b>Sold By:</b><br/> #<?php echo  nl2br('Webly Connect Tech Solutions Private Limited
Building No. 5/206 A, 1st Floor
Sincere Building
Vengalloor P O
Thodupuzha, Idukki-685585
Kerala'); ?>
        </td>
        <?php 
        $total=0;
        foreach ($getInfo as $dat)
        {
            $address=$dat['address'];
            $saddress=$dat['shipping_address'];
            $user=$dat['user_id'];
            $rdate=$dat['register_date'];
            $total=$total+$dat['price'];
            $coupon_amount = $dat['cpn_amt'];
            $state=$dat['state'];
        }
            ?>
        <td style="text-align:right;"><b>Billing Address:</b><br/><?php echo $getInfo->name; ?><br/><?php echo nl2br($address); ?><br/></td>
    </tr>
    <tr>
        <td><b>PAN No:</b> AADCW0497R<br/>
        <b>GST No:</b> 32AADCW0497R1ZQ
        </td>
        <td style="text-align:right;"><b>Shipping Address:</b><br/><?php echo $getInfo->name; ?><br/><?php echo nl2br($saddress); ?></td>
    </tr>
    <tr>
        <td><b>Order No:</b> <?php echo $user; ?><br/>
        <b>Order Date:</b> <?php echo $rdate; ?></td>
        <td style="text-align:right;"><b>Invoice No:</b><?php echo $user; ?><br/>
        <b>Invoice Date:</b> <?php echo $rate; ?></td>
    </tr>
    <?php /* <tr>
        <td><b>Invoice:</b> #<?php echo $getInfo->user_id; ?>
        </td>
    </tr>*/?>
</table>

<div></div>
    <div style="border-bottom:1px solid #000;">
        <?php
      // print_r($dat);
    //   $this->load->model('Coupon_Model');
     
           
        
        
        
       // $coupon_price = ($sub_tot*$coupon_percent)/100;
        $sub_total = $total - $coupon_amount;
        $tax_price = ($sub_total*18)/100;
        $grand_total = $sub_total+$tax_price;
        $amountinwords = $this->numbertowordconvertsconver->convert_number($sub_total);
        ?>
        <table style="line-height: 2;">
       
        
            <tr style="font-weight: bold;border:1px solid #cccccc;background-color:#f2f2f2;">
                <td style="border:1px solid #cccccc;width:50px;">Sl. No.</td>
                <td style="border:1px solid #cccccc;width:160px;">Item Details</td>
               <!-- <td style = "border:1px solid #cccccc;width:105px">Package</td>-->
                <td style = "border:1px solid #cccccc;width:100px;">Amount</td>
                <td style = "border:1px solid #cccccc;width:95px;">Discount</td>
                <td style = "text-align:right;border:1px solid #cccccc;width:120px;">Subtotal</td>
            </tr>
          
            <?php 
            
            $i=1;
            foreach ($getInfo as $dat)
        {
            if($dat['product_name']!="")
            {
                $item=$dat['product_name'];
            }
else if($dat['pk']!="")
{
    $item=$dat['pk'];
}
          
            ?>
            <tr> 
                <td style="border:1px solid #cccccc;"><?php echo $i;?></td>
                <td style="border:1px solid #cccccc;"><?php echo $item; ?></td>
               <!-- <td style="border:1px solid #cccccc;"><?php echo $dat['pk']; ?></td>-->
                <td style = "text-align:right; border:1px solid #cccccc;"><?php echo number_format($sub_total-$tax_price, 2); ?></td>
                <td style = "text-align:right; border:1px solid #cccccc;"><?php echo $coupon_amount; ?></td>
                <td style = "text-align:right; border:1px solid #cccccc;"><?php echo number_format($sub_total-$tax_price-$coupon_amount, 2); $sub_total; ?></td>
            </tr>
            <?php $i++;}?>
<?php /*
$total = 0;
$productModel = new Order();
foreach ($orderItemResult as $k => $v) {
    $price = $orderItemResult[$k]["item_price"] * $orderItemResult[$k]["quantity"];
    $total += $price;
    $productResult = $productModel->getProduct($orderItemResult[$k]["product_id"]);
    ?>
    <tr> <td style="border:1px solid #cccccc;"><?php echo $productResult[0]["product_title"]; ?></td>
                    <td style = "text-align:right; border:1px solid #cccccc;"><?php echo number_format($orderItemResult[$k]["item_price"], 2); ?></td>
                    <td style = "text-align:right; border:1px solid #cccccc;"><?php echo $orderItemResult[$k]["quantity"]; ?></td>
                    <td style = "text-align:right; border:1px solid #cccccc;"><?php echo number_format($price, 2); ?></td>
               </tr>
<?php
} */
?>
<tr style = "font-weight: bold;">
    <td colspan="4" style = "border:1px solid #cccccc;text-align:left;">Total</td>
    <td style = "border:1px solid #cccccc;text-align:right;"><?php echo  number_format($sub_total-$tax_price-$coupon_amount, 2) ?></td>
</tr>


<?php if($state=="Kerala")
{
    
?>
<tr style="font-weight:bold;">
    <td colspan="4" style = "border:1px solid #cccccc;text-align:left;">CGST </td>
    <td style = "border:1px solid #cccccc;text-align:right;"><?php echo number_format($tax_price, 2)/2; ?></td>
</tr>
<tr style="font-weight:bold;">
    <td colspan="4" style = "border:1px solid #cccccc;text-align:left;">SGST </td>
    <td style = "border:1px solid #cccccc;text-align:right;"><?php echo number_format($tax_price, 2)/2; ?></td>
</tr>
<?php
}
else
{
    ?>
   <tr style="font-weight:bold;">
    <td colspan="4" style = "border:1px solid #cccccc;text-align:left;">IGST(18%) </td>
    <td style = "border:1px solid #cccccc;text-align:right;"><?php echo number_format($tax_price, 2); ?></td>
</tr> 
<?php
}
?>
<tr style="font-weight:bold;">
    <td colspan="4" style = "border:1px solid #cccccc;text-align:left;">Grand Total </td>
    <td style = "border:1px solid #cccccc;text-align:right;"><?php echo number_format($sub_total-$tax_price-$coupon_amount+$tax_price, 2) ?></td>
</tr>
<tr style = "font-weight: bold;">
    <td colspan="2" style = "border:1px solid #cccccc;text-align:left">Amount in Words: </td>
    <td colspan="4" style="border:1px solid #cccccc;text-align:right"><?php echo $amountinwords;?></td>
</tr>
<tr><td colspan="6" >&nbsp;</td></tr>
<tr><td colspan="6" >&nbsp;</td></tr>
<tr><td colspan="6" style="text-align:right">Authorized Signatory</td></tr>
</table></div>
<?php /*<p><u>Kindly make your payment to</u>:<br/>
Bank: American Bank of Commerce<br/>
A/C: 05346346543634563423<br/>
BIC: 23141434<br/>
</p>


    <div class="row">   
    <div class="col-lg-12">
        <div> 
            <strong>Last Updated :</strong>  <?php print $getInfo->register_date;?>   
            <strong>Author :</strong>  <?php print $getInfo->user_id;?> 
        </div>
        <?php print $getInfo->total;?>
    </div>
</div>*/?>
