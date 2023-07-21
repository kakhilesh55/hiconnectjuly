<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
private $url = 'https://apiv2.shiprocket.in/v1/external/';
    private $username = 'weblyconnect@gmail.com';
    private $password = 'Qrfsd$W#R#322rs';
    private $token;
    public function __construct()
    {
           $this->token = $this->generateToken();
    parent::__construct();
    //Load Library and model.
    $this->load->library('cart');
    $this->load->model('cart_model');
       $this->load->model('Package_Model');
       $this->load->model('User_Model');
       
    }
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
        "billing_customer_name"=>"asa",
        "billing_last_name"=>"fgh",
        "billing_address"=>"gfg",
        "billing_address_2"=>"gfhg",
        "billing_city"=> "gfhy",
        "billing_pincode"=>"673631",
        "billing_state"=>"kerala",
        "billing_country"=>"india",
        "billing_email"=>"k@gmail.com",
        "billing_phone"=>8943700900,
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
    public function index()
    {
        
        //Get all data from database
        $data['products'] = $this->cart_model->get_all();
        //send all product data to "welcome_message", which fetch from database.
        $this->load->view('frontend/header');
       
        $this->load->view('frontend/products_view',$data);
        $this->load->view('frontend/footer');
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
    function add()
    {
    // Set array for send data.
    
    if (count($this->cart->contents())>0){
    foreach ($this->cart->contents() as $item){
  
                        if ($item['id']==$this->input->post('id')){
                         //echo "df";
                         echo $this->input->post('id');
                        echo $item['id'];
                        echo "no";
                        $data = array(
        'id' => $item['id'],
      
        'qty' => 1
        );
    $this->cart->update($data);
                        
                        }
                        else
                        {
    $insert_data = array(
                'id' => $this->input->post('id'),
                'name' => $this->input->post('name'),
                'price' => $this->input->post('price'),
                'image' => $this->input->post('image'),
                'qty' => 1,
                'price1' => $this->input->post('price1'),
                  'des' => $this->input->post('des'),
                );
         
    // This function add items into cart.
      $data = array(
        'id' => $item['id'],
      
        'qty' => 1
        );
    $this->cart->update($data);
    $this->cart->insert($insert_data);
                        }
    }
    }
    else
    {
         $insert_data = array(
                'id' => $this->input->post('id'),
                'name' => $this->input->post('name'),
                'price' => $this->input->post('price'),
                'image' => $this->input->post('image'),
                'qty' => 1,
                'price1' => $this->input->post('price1'),
                  'des' => $this->input->post('des'),
                );
         
    // This function add items into cart.
    $this->cart->insert($insert_data);
    }
    echo $fefe = count($this->cart->contents());
    // This will show insert data in cart.
    }

    
 function add1()
    {
    // Set array for send data.
   
      $post['pickup_postcode'] = 560072;
      $post['delivery_postcode']=$this->input->post('id1');
    //$post['delivery_postcode']=673631;
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

    function remove() {
    $rowid = $this->input->post('rowid');
    // Check rowid value.
    if ($rowid==="all"){
    // Destroy data which store in session.
        $this->cart->destroy();
    }else{
    // Destroy selected rowid in session.
    $data = array(
            'rowid' => $rowid,
            'qty' => 0
            );
    // Update cart data, after cancel.
    $this->cart->update($data);
    }
    echo $fefe = count($this->cart->contents());
    // This will show cancel data in cart.
     $data['cart']  = $this->cart->contents();
        $this->load->view("frontend/onbording", $data);
    }




    function update_cart(){
    // Recieve post values,calcute them and update
    $rowid = $_POST['rowid'];
    $price = $_POST['price'];
    $amount = $price * $_POST['qty'];
    $qty = $_POST['qty'];

    $data = array(
        'rowid' => $rowid,
        'price' => $price,
        'amount' => $amount,
        'qty' => $qty
        );
    $this->cart->update($data);
    echo $data['amount'];
    }

    function billing_view(){
    // Load "billing_view".
    $this->load->view('billing_view');
    }

    public function save_order()
    {
    // This will store all values which inserted from user.
    $customer = array(
        'name' => $this->input->post('name'),
        'email' => $this->input->post('email'),
        'address' => $this->input->post('address'),
        'phone' => $this->input->post('phone')
        );
    // And store user information in database.
    $cust_id = $this->cart_model->insert_customer($customer);
    $order = array(
        'date' => date('Y-m-d'),
        'customerid' => $cust_id
        );
      //  $order_detail[];
    $ord_id = $this->cart_model->insert_order($order);
    if ($cart = $this->cart->contents()){
    foreach ($cart as $item){
      
    $order_detail = array(
        'orderid' => $ord_id,
       // 'productid' => $item['id'],
        'quantity' => $item['qty'],
        'price' => $item['price']
        );
       
    // Insert product imformation with order detail, store in cart also store in database.
    $cust_id = $this->cart_model->insert_order_detail($order_detail);
        }
    }
    $this->cart->destroy();
    // After storing all imformation in database load "billing_success".
    $this->load->view('billing_success');
    }



    public function opencart()
    {
        $data['cart']  = $this->cart->contents();
     $data['packages'] = $this->Package_Model->get_packages();
     $data['cpn'] = $this->Package_Model->get_cpn();

        $this->load->view("frontend/onbording", $data);
    }





    }