<button id="rzp-button1" style="display:none;">Pay</button>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    "key": "<?php echo $key;?>", // Enter the Key ID generated from the Dashboard
    "amount": "<?php echo $order['amount']*100;?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Hicoonect",
    "description": "Test Transaction",
    "image": "<?php echo base_url() ?>css1/images/logo.png",
    "order_id": "<?php echo $order['order_id'];?>", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "callback_url": "<?php echo base_url()."payment/payment_status/".$order['order_id']; ?>",
    "prefill": {
        "name": "<?php echo $customer_data->name;?>",
        "email": "<?php echo $customer_data->email;?>",
        "contact": "<?php echo $customer_data->phone;?>"
    },
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
document.getElementById('rzp-button1').onclick();
</script>
