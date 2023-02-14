<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shiping extends CI_Controller {

    private $url = 'https://apiv2.shiprocket.in/v1/external/';
    private $username = 'weblyconnect@gmail.com';
    private $password = 'Qrfsd$W#R#322rs';
    private $token;
  
    function __construct()
    {
        /*
        Constructor to generate Token
        */
        $this->token = $this->generateToken();
    }
    public function index()
    {
    }
 public function ab()
    {
        
    }
    public function get_username()
    {
        /*
        Returns Username
        */
        return $this->username;
    }
    public function get_password()
    {
        /*
        Returns Password
        */
        return $this->password;
    }
    public function get_token()
    {
        /*
        Returns Token
        */
        return $this->token;
    }

    /*
      Generate Token
    */
    public function generateToken()
    {
      $products=[
        
          "name"=>"Product1",
          "sku"=>"skucode",
          "units"=>"kg",
          "selling_price"=>100,
          "discount"=>"",
          "tax"=>"",
          "hsn"=>"123456",
          
        
      
        
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
      $post=[
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
        $post['email'] = $this->get_username();
        $post['password'] = $this->get_password();
        $data_string = json_encode($post);
        $url = $this->url . 'auth/login';
        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string)
        );
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $jsonObj = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

     
        $response = curl_exec($ch);
        curl_close($curl);
        #if order placed, response contains order details for modify or track order.(order_id,shipment_id,status)
        $res=json_decode($response);
     // echo "<pre>";
      //print_r($res);
      //echo "</pre>";
      
      if($res->status_code==1){
        $msg="Order Placed Successfully";
      }else{
        $msg="Order Placed Failed. Try Again";
      }
        if ($this->isJson($jsonObj) == 1 && $jsonObj != '' && $jsonObj != 'null')
        {
            $dataArr = json_decode($jsonObj, true);
            return $dataArr['token'];
            echo "hhh";
        }
        return false;
    }

    /*
      Get Pickup address details from shiprcket
    */
    public function getPickupAddress()
    {

        $url = $this->url . 'settings/company/pickup';

        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->get_token() . ''
        );
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        //print_r($headers); exit();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $jsonObj = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);
        if ($this->isJson($jsonObj) == 1 && $jsonObj != '' && $jsonObj != 'null')
        {
            $dataArr = json_decode($jsonObj, true);
            return $dataArr;
        }
        return false;
    }

    /*
      Check pincode is servicable
    */
    public function serviceability()
    {
      //$post=67331;
      $post['pickup_postcode'] = 560072;
      $post['delivery_postcode']=$this->input->post('id');
$post['cod'] = 0;
$post['weight'] = 1;

      $data_string = json_encode($post);

      $url = $this->url . 'courier/serviceability';
      $headers = array(
          'Accept: application/json',
          'Content-Type: application/json',
          'Authorization: Bearer ' . $this->get_token() . ''
      );
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $jsonObj = curl_exec($ch);

      $response = curl_exec($ch);
      curl_close($curl);
      #if order placed, response contains order details for modify or track order.(order_id,shipment_id,status)
      $res=json_decode($response);
   // echo "<pre>";
   // print_r($res);
  
 echo $res->message;

 
    //echo "</pre>";







      $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

      curl_close($ch);
      if ($this->isJson($jsonObj) == 1 && $jsonObj != '' && $jsonObj != 'null')
      {
          $dataArr = json_decode($jsonObj, true);
          return $dataArr;
      }
      return false;
  }

    /*
      Generate Order 
    */
    public function generateOrder()
    {
      $products=[
        [
          "name"=>"Product1",
          "sku"=>"skucode",
          "units"=>"10",
          "selling_price"=>100,
          "discount"=>"",
          "tax"=>"",
          "hsn"=>"123456",
          
        ],
        [
          "name"=>"Product2",
          "sku"=>"skucode1",
          "units"=>"10",
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
      $post=[
        "order_id"=>$order_no,
        "order_date"=>$order_date,
        "pickup_location"=> "Webly",
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

        $data_string = json_encode($post);

        $url = $this->url . 'orders/create/adhoc';
        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->get_token() . ''
        );
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $jsonObj = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        
        $response = curl_exec($ch);
        curl_close($curl);
        #if order placed, response contains order details for modify or track order.(order_id,shipment_id,status)
        $res=json_decode($response);
      echo "<pre>";
      print_r($res);
      echo "</pre>";
        if ($this->isJson($jsonObj) == 1 && $jsonObj != '' && $jsonObj != 'null')
        {
            $dataArr = json_decode($jsonObj, true);
            return $dataArr;
        }
        return false;
    }
    /*
      Generate AWB No.
    */
    public function generateAwbNo($post)
    {

        $data_string = json_encode($post);

        $url = $this->url . 'courier/assign/awb';
        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->get_token() . ''
        );
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $jsonObj = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);
        if ($this->isJson($jsonObj) == 1 && $jsonObj != '' && $jsonObj != 'null')
        {
            $dataArr = json_decode($jsonObj, true);
            return $dataArr;
        }
        return false;
    }

    /*
      Generate Pickup Request
    */
    public function generatePickup($post)
    {

        $data_string = json_encode($post);

        $url = $this->url . 'courier/generate/pickup';
        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->get_token() . ''
        );
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $jsonObj = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);
        if ($this->isJson($jsonObj) == 1 && $jsonObj != '' && $jsonObj != 'null')
        {
            $dataArr = json_decode($jsonObj, true);
            return $dataArr;
        }
        return false;
    }

    /*
      Track Courier by AWB No
    */
    public function trackByAwbNo($awbNo)
    {

        $url = $this->url . 'courier/track/awb/' . $awbNo;
        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->get_token() . ''
        );
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $jsonObj = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);
        if ($this->isJson($jsonObj) == 1 && $jsonObj != '' && $jsonObj != 'null')
        {
            $dataArr = json_decode($jsonObj, true);
            return $dataArr;
        }
        return false;
    }

    /*
      Track Courier by Shipment Id
    */
    public function trackByShipmentId($shipmentId)
    {

        $url = $this->url . 'courier/track/shipment/' . $shipmentId;
        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->get_token() . ''
        );
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $jsonObj = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);
        if ($this->isJson($jsonObj) == 1 && $jsonObj != '' && $jsonObj != 'null')
        {
            $dataArr = json_decode($jsonObj, true);
            return $dataArr;
        }
        return false;
    }

    /*
      Track Courier by Order ID
    */
    public function trackByOrderId($orderId)
    {

        $url = $this->url . 'courier/track?order_id=' . $orderId;
        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->get_token() . ''
        );
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $jsonObj = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);
        if ($this->isJson($jsonObj) == 1 && $jsonObj != '' && $jsonObj != 'null')
        {
            $dataArr = json_decode($jsonObj, true);
            return $dataArr;
        }
        return false;
    }

    /*
      Track Multiple Courier by Shipment Id
    */
    public function trackByMulipleShipmentId($post)
    {

        $data_string = json_encode($post);

        $url = $this->url . 'courier/track/awbs';
        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->get_token() . ''
        );
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $jsonObj = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);
        if ($this->isJson($jsonObj) == 1 && $jsonObj != '' && $jsonObj != 'null')
        {
            $dataArr = json_decode($jsonObj, true);
            return $dataArr;
        }
        return false;
    }

    /*
      Check if string is JSON
    */
    function isJson($string)
    {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);

    }
    /*
      Writes logs in the server
    */
    function writeLog($data)
    {
        $fileName = date("Y-m-d") . ".txt";
        $fp = fopen(dirname($_SERVER["SCRIPT_FILENAME"]) . "/logs/" . $fileName, 'a+');
        $data = date("Y-m-d H:i:s") . " - " . $data;
        fwrite($fp, $data);
        fwrite($fp, "\n");
        fclose($fp);
    }
}

