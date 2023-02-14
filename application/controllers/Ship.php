<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ship extends CI_Controller {

    public function index()
	{
    	

  $products=[
    [
      "name"=>"Product1",
      "sku"=>"skucode",
      "units"=>"kg",
      "selling_price"=>100,
      "discount"=>"",
      "tax"=>"",
      "hsn"=>"123456",
      
    ],
    [
      "name"=>"Product2",
      "sku"=>"skucode",
      "units"=>"kg",
      "selling_price"=>150,
      "discount"=>"",
      "tax"=>"",
      "hsn"=>"123456",
      
    ],
    
  ];
  
  #Delivery Customer Details
  $customer=[
    "name"=>"Ram",
    "last_name"=>"R",
    "land_mark"=>"4th cross",
    "address"=>"122, west street",
    "city"=>"salem",
    "pincode"=>"636008",
    "state"=>"Tamilnadu",
    "country"=>"india",
    "email"=>"ram@gmail.com",
    "phone"=>"9876543210",
  ];
  
  #Order Details
  $order_no=date("Ymdhis");
  $order_date=date("Y-m-d h:i");
  $total_amount=250;
  $order_type="code";#cod or online
  
  #order data
  $order_data=[
    "order_id"=>$order_no,
    "order_date"=>$order_date,
    "pickup_location"=> "Primary",
    "comment"=> "",
    "billing_customer_name"=>$customer["name"],
    "billing_last_name"=>$customer["last_name"],
    "billing_address"=>$customer["land_mark"],
    "billing_address_2"=>$customer["address"],
    "billing_city"=> $customer["city"],
    "billing_pincode"=>$customer["pincode"],
    "billing_state"=>$customer["state"],
    "billing_country"=>$customer["country"],
    "billing_email"=>$customer["email"],
    "billing_phone"=>$customer["phone"],
    "shipping_is_billing"=> true,
    "shipping_customer_name"=> "",
    "shipping_last_name"=> "",
    "shipping_address"=> "",
    "shipping_address_2"=> "",
    "shipping_city"=> "",
    "shipping_pincode"=> "",
    "shipping_country"=> "",
    "shipping_state"=> "",
    "shipping_email"=> "",
    "shipping_phone"=> "",
    "order_items"=>$products,
    "payment_method"=>$order_type,
    "shipping_charges"=> 0,
    "giftwrap_charges"=> 0,
    "transaction_charges"=> 0,
    "total_discount"=>0,
    "sub_total"=> $total_amount,
    "length"=> 1,
    "breadth"=> 1,
    "height"=> 1,
    "weight"=> 1,
  ];

  try
  {
    #Login information
    $arr=[
      "email"=>"weblyconnect@gmail.com", # Enter Registered Username in Shiprocket
      "password"=>"Qrfsd$W#R#322rs",
    ];
    $login_data=json_encode($arr);
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://apiv2.shiprocket.in/v1/external/auth/login",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS =>$login_data,
      CURLOPT_HTTPHEADER => array(
      "Content-Type: application/json"
      ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $res=json_decode($response);
    $token = null;
    #Get login Authentication token
    $token=$res->token;
    if($res->token){
      
      #Place order
      $order_data=json_encode($order_data); 
      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://apiv2.shiprocket.in/v1/external/orders/create/adhoc",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS =>$order_data,
        CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json",
        "Authorization: Bearer {$token}"
        ),
      ));
      $response = curl_exec($curl);
      curl_close($curl);
      #if order placed, response contains order details for modify or track order.(order_id,shipment_id,status)
      $res=json_decode($response);
    echo "<pre>";
    print_r($res);
    echo "</pre>";
    }
    if($res->status_code==1){
      $msg="Order Placed Successfully";
    }else{
      $msg="Order Placed Failed. Try Again";
    }
  }catch(Exception $e){
    echo $e;
  }

	}

}

?>
